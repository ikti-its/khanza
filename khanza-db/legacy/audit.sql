DO
$$
DECLARE
    tbl RECORD;
    col RECORD;
    audit_tbl_name text;
    audit_table_exists bool;
    trigger_fn_name text;
    trigger_name text;
    schema_name text;
    column_defs text;
    column_names text;
    insert_columns text;
    insert_values_new text;
    insert_values_old text;
BEGIN
    FOR tbl IN
        SELECT table_schema, table_name
        FROM information_schema.tables
        WHERE table_type = 'BASE TABLE'
          AND table_schema NOT IN ('pg_catalog', 'information_schema')
          AND table_name NOT LIKE '%_audit' -- exclude audit tables themselves
    LOOP
        schema_name := tbl.table_schema;
        audit_tbl_name := tbl.table_name || '_audit';
        trigger_fn_name := tbl.table_name || '_audit_trigger_fn';
        trigger_name := tbl.table_name || '_audit_trigger';

        -- Check if audit table exists
        SELECT EXISTS (
            SELECT 1 FROM information_schema.tables
            WHERE table_schema = schema_name
              AND table_name = audit_tbl_name
        ) INTO audit_table_exists;	
				
        IF audit_table_exists THEN
			EXECUTE format('DROP TABLE %I.%I', schema_name, audit_tbl_name);
		END IF;

		RAISE INFO '%', audit_tbl_name;
	    -- Build the column definitions for audit table by copying from base table
	    column_defs := '';
	    FOR col IN
	        SELECT column_name, data_type, udt_name, character_maximum_length, numeric_precision, numeric_scale
	        FROM information_schema.columns
	        WHERE table_schema = schema_name
	          AND table_name = tbl.table_name
	        ORDER BY ordinal_position
		LOOP
	        column_defs := column_defs || format('%I %s%s, ',
	            col.column_name,
	            -- Map information_schema data_type to PostgreSQL data types with length/precision
	            CASE
	                WHEN col.data_type = 'character varying' THEN
						CASE 
							WHEN col.character_maximum_length IS NULL  THEN format('VARCHAR')
							ELSE format('VARCHAR(%s)', col.character_maximum_length)
						END
	                WHEN col.data_type = 'character' THEN format('CHAR(%s)', col.character_maximum_length)
	                WHEN col.data_type = 'numeric' THEN
	                    CASE
	                        WHEN col.numeric_precision IS NULL THEN 'NUMERIC'
	                        WHEN col.numeric_scale IS NULL THEN format('NUMERIC(%s)', col.numeric_precision)
	                        ELSE format('NUMERIC(%s,%s)', col.numeric_precision, col.numeric_scale)
	                    END
					WHEN col.data_type = 'USER-DEFINED' THEN format('%s', col.udt_name)
	                ELSE col.data_type
	            END,
	            ''
	        );
	    END LOOP;
	    -- Add audit columns at the end
	    column_defs := column_defs || 'changed_by UUID NOT NULL, user_ip TEXT, action VARCHAR(10) NOT NULL, changed_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP';

	    -- Create audit table
	    EXECUTE format('CREATE TABLE %I.%I (%s)', schema_name, audit_tbl_name, column_defs);
 
        -- Drop existing trigger if any
        EXECUTE format('DROP TRIGGER IF EXISTS %I ON %I.%I', trigger_name, schema_name, tbl.table_name);

        -- Drop existing function if any
        EXECUTE format('DROP FUNCTION IF EXISTS %I.%I()', schema_name, trigger_fn_name);

        -- Build the column list for INSERT statement
        column_names := '';
        insert_columns := '';
        insert_values_new := '';
        insert_values_old := '';
        FOR col IN
    SELECT column_name
    FROM information_schema.columns
    WHERE table_schema = schema_name
      AND table_name = tbl.table_name
    ORDER BY ordinal_position
    LOOP
        column_names := column_names || format('%I, ', col.column_name);
        insert_columns := insert_columns || format('%I, ', col.column_name);
        insert_values_new := insert_values_new || format('NEW.%I, ', col.column_name);
        insert_values_old := insert_values_old || format('OLD.%I, ', col.column_name);
    END LOOP;


        -- Add audit columns to insert
        column_names   := column_names || 'changed_by, user_ip, action, changed_at';
        insert_columns := insert_columns || 'changed_by, user_ip, action, changed_at';
        insert_values_new := insert_values_new || 'COALESCE(current_setting(''my.user_id'', true)::UUID, ''00000000-0000-0000-0000-000000000000''::UUID),COALESCE(current_setting(''my.ip_address'', true))::text, TG_OP, CURRENT_TIMESTAMP';
        insert_values_old := insert_values_old || 'COALESCE(current_setting(''my.user_id'', true)::UUID, ''00000000-0000-0000-0000-000000000000''::UUID),COALESCE(current_setting(''my.ip_address'', true))::text, TG_OP, CURRENT_TIMESTAMP';


        -- Create or replace trigger function
        EXECUTE format($func$
        CREATE FUNCTION %I.%I() RETURNS trigger AS
        $body$
        BEGIN
            IF TG_OP = 'INSERT' OR TG_OP = 'UPDATE' THEN
                INSERT INTO %I.%I (%s) VALUES (%s);
                RETURN NEW;
            ELSIF TG_OP = 'DELETE' THEN
                INSERT INTO %I.%I (%s) VALUES (%s);
                RETURN OLD;
            END IF;
            RETURN NULL;
        END;
        $body$
        LANGUAGE plpgsql;
        $func$, 
            schema_name, trigger_fn_name,
            schema_name, audit_tbl_name, insert_columns, insert_values_new,  -- for INSERT/UPDATE
            schema_name, audit_tbl_name, insert_columns, insert_values_old   -- for DELETE
        );


        -- Create trigger
        EXECUTE format('
            CREATE TRIGGER %I
            AFTER INSERT OR UPDATE OR DELETE ON %I.%I
            FOR EACH ROW EXECUTE FUNCTION %I.%I()
        ', trigger_name, schema_name, tbl.table_name, schema_name, trigger_fn_name);

    END LOOP;
END
$$;