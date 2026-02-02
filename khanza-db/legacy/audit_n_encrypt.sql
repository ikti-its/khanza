-- This block generates audit tables, encrypted tables, and views with INSTEAD OF triggers for all base tables
-- It ensures encrypted tables only contain actual data columns, not audit columns
-- Views allow transparent SELECT, INSERT, UPDATE, DELETE

DO
$$
DECLARE
    tbl RECORD;
    col RECORD;

    audit_table_name text;
    audit_function_name text;
    audit_trigger_name text;

    encrypted_table_name text;
    encrypted_function_name text;
    encrypted_trigger_name text;

    schema_name text;
    pk_columns text[];
    audit_table_exists bool;
    encrypt_select text;
    decrypt_select text;

    current_column_defs text;
    audit_column_defs text;
    encrypted_column_defs text;

    insert_columns text;
    insert_values_new text;
    insert_values_old text;
    extra_audit_values text;
    update_assignments text;
    pk_conditions text;

    encrypted_insert_columns text;
    encrypted_insert_values text;
    encrypted_update_assignments text;
BEGIN
    -- 1. Loop through all tables in the database 
    FOR tbl IN
        SELECT table_schema, table_name
        FROM information_schema.tables
        WHERE table_type = 'BASE TABLE'
            AND table_schema NOT IN ('pg_catalog', 'information_schema') -- exclude system tables
            AND table_name NOT LIKE '%_audit'     -- exclude audit tables
            AND table_name NOT LIKE '%_encrypted' -- exclude encrypted tables 
    LOOP
        -- 2. Find the primary keys in each table
        SELECT ARRAY_AGG(kcu.column_name)
        INTO pk_columns
        FROM information_schema.table_constraints tc
            JOIN information_schema.key_column_usage kcu
            ON tc.constraint_name = kcu.constraint_name
            AND tc.table_schema = kcu.table_schema
            AND tc.table_name = kcu.table_name
        WHERE tc.table_schema = tbl.table_schema
            AND tc.table_name = tbl.table_name
            AND tc.constraint_type = 'PRIMARY KEY';
        
        -- 3. Build the column definitions for audit table by copying from base table
        current_column_defs   := '';
        audit_column_defs     := '';
        encrypted_column_defs := '';
        encrypt_select := '';
        decrypt_select := '';
        encryption_key := 'BismillahSidangNilaiA';

        -- 4. Loop through all columns in the database
        FOR col IN
            SELECT column_name, data_type, udt_name,
                   character_maximum_length, numeric_precision, numeric_scale
            FROM information_schema.columns
            WHERE table_schema = tbl.table_schema AND table_name = tbl.table_name
            ORDER BY ordinal_position
        LOOP
            -- 5. Get current column definition
            current_column_defs := format('%I %s, ',
                col.column_name,
                CASE
                    WHEN col.data_type = 'character varying' THEN
                        CASE 
							WHEN col.character_maximum_length IS NULL THEN format('VARCHAR')
							ELSE format('VARCHAR(%s)', col.character_maximum_length)
						END
                    WHEN col.data_type = 'character' THEN format('CHAR(%s)', col.character_maximum_length)
                    WHEN col.data_type = 'numeric' THEN
                        CASE
                            WHEN col.numeric_precision IS NULL THEN 'NUMERIC'
                            WHEN col.numeric_scale IS NULL THEN format('NUMERIC(%s)', col.numeric_precision)
                            ELSE format('NUMERIC(%s,%s)', col.numeric_precision, col.numeric_scale)
                        END
                    WHEN col.data_type = 'USER-DEFINED' THEN col.udt_name
                    ELSE col.data_type
                END);
            -- 6. Define audit column values
            audit_insert_columns    := audit_insert_columns    || format('%I, '    , col.column_name);
            audit_insert_values_new := audit_insert_values_new || format('NEW.%I, ', col.column_name);
            audit_insert_values_old := audit_insert_values_old || format('OLD.%I, ', col.column_name);

            -- 7. Check if current col is a primary key
            IF pk_columns IS NOT NULL AND col.column_name = ANY(pk_columns) THEN
                -- 8. Get column definitions
                audit_column_defs := audit_column_defs         || current_column_defs;
                encrypted_column_defs := encrypted_column_defs || current_column_defs;
                -- 9. Handle SELECTs
                encrypt_select := encrypt_select || format('%I, ', col.column_name);
                decrypt_select := decrypt_select || format('%I, ', col.column_name);
                -- 10. Handle INSERTs
                encrypted_insert_columns     := encrypted_insert_columns     || format('%I, ', col.column_name);
                encrypted_insert_values      := encrypted_insert_values      || format('NEW.%I, ', col.column_name);
                -- 11. Handle UPDATEs
                pk_conditions := pk_conditions || format('%I = NEW.%I AND ', col.column_name, col.column_name);
                encrypted_update_assignments := encrypted_update_assignments || format('%I = NEW.%I, ', col.column_name, col.column_name);
            -- 12. Handle the general case where the current col is not a primary key
            ELSE
                -- 13. Get column definitions
                audit_column_defs := audit_column_defs         || format('%I BYTEA, ', col.column_name);
                encrypted_column_defs := encrypted_column_defs || format('%I BYTEA, ', col.column_name);
                -- 14. Handle SELECTs
                encrypt_select := encrypt_select || format('pgp_sym_encrypt(%I::text, 'encryption_key'), ', col.column_name);
                decrypt_select := decrypt_select || format('pgp_sym_decrypt(%I, 'encryption_key')::%s AS %I, ',
                    col.column_name,
                    CASE WHEN col.data_type = 'USER-DEFINED' THEN col.udt_name ELSE col.data_type END,
                    col.column_name);
                -- 15. Handle INSERTs
                encrypted_insert_columns     := encrypted_insert_columns     || format('%I, ', col.column_name);
                encrypted_insert_values      := encrypted_insert_values      || format('pgp_sym_encrypt(NEW.%I::text, 'encryption_key'), ', col.column_name);
                -- 16. Handle UPDATEs
                encrypted_update_assignments := encrypted_update_assignments || format('%I = pgp_sym_encrypt(NEW.%I::text, 'encryption_key'), ', col.column_name, col.column_name);
            END IF;
        END LOOP;

        -- 17. Add audit columns and values at the end
        extra_audit_values :=
            'pgp_sym_encrypt(COALESCE(current_setting(''my.user_id'', true)::UUID, ''00000000-0000-0000-0000-000000000000''::UUID)::text, 'encryption_key'),'
            'pgp_sym_encrypt(COALESCE(current_setting(''my.ip_address'', true))::text, 'encryption_key'),'
            'pgp_sym_encrypt(TG_OP::text, 'encryption_key'),'
            'pgp_sym_encrypt(CURRENT_TIMESTAMP::text, 'encryption_key')';
        extra_audit_column_defs := 'changed_by UUID NOT NULL, user_ip TEXT, action VARCHAR(10) NOT NULL, changed_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP, ';
	    audit_column_defs := audit_column_defs || extra_audit_column_defs;
        audit_insert_columns     := audit_insert_columns    || 'changed_by, user_ip, action, changed_at';
        audit_insert_values_new  := audit_insert_values_new || extra_audit_values
        audit_insert_values_old  := audit_insert_values_old || extra_audit_values
        
        -- 18. Trim trailing commas
        audit_column_defs     := left(audit_column_defs,     length(audit_column_defs) - 2);
        encrypted_column_defs := left(encrypted_column_defs, length(encrypted_column_defs) - 2);
        
        encrypt_select := left(encrypt_select, length(encrypt_select) - 2);
        decrypt_select := left(decrypt_select, length(decrypt_select) - 2);

        encrypted_insert_columns := left(encrypted_insert_columns, length(encrypted_insert_columns) - 2);
        encrypted_insert_values  := left(encrypted_insert_values,  length(encrypted_insert_values) - 2);
        
        audit_update_assignments     := left(audit_update_assignments,     length(update_assignments) - 2);
        pk_conditions                := left(pk_conditions,                length(pk_conditions) - 5);
        encrypted_update_assignments := left(encrypted_update_assignments, length(encrypted_update_assignments) - 2);
        
        -- 19. Define encrypted & audit table, trigger, and function names
        schema_name := tbl.table_schema;
        audit_table_name     := tbl.table_name || '_audit';
        audit_function_name  := tbl.table_name || '_audit_function';
        audit_trigger_name   := tbl.table_name || '_audit_trigger';
        encrypted_table_name := tbl.table_name || '_encrypted';

        -- 20. Drop existing trigger/function if any in encrypted table
        EXECUTE format('DROP TRIGGER IF EXISTS %I ON %I.%I', audit_trigger_name, schema_name, encrypted_table_name);
        EXECUTE format('DROP FUNCTION IF EXISTS %I.%I()', schema_name, audit_function_name);

        -- 21. Drop or truncate encrypted table if exists
        -- WARNING: Do not run this when your database has been built
        -- EXECUTE format('TRUNCATE TABLE %I.%I', schema_name, encrypted_table_name);
        EXECUTE format('DROP TABLE IF EXISTS %I.%I CASCADE', schema_name, encrypted_table_name);

        -- 22. Rebuild the encrypted table with columns defs
        EXECUTE format('CREATE TABLE IF NOT EXISTS %I.%I (%s)', schema_name, encrypted_table_name, encrypted_column_defs);
        RAISE NOTICE 'Created encrypted table %.%', schema_name, encrypted_table_name;        

        -- 23. Copy data from unencrypted table to encrypted table
        EXECUTE format(
            'INSERT INTO %I.%I SELECT %s FROM %I.%I;',
            schema_name, encrypted_table_name,
            encrypt_select,
            schema_name, tbl.table_name);
        RAISE NOTICE 'Copied data to %I.%I', schema_name, encrypted_table_name;

        -- 24. Drop audit table if exists
		EXECUTE format('DROP TABLE IF EXISTS %I.%I', schema_name, audit_table_name);

	    -- 25. Build the audit table with columns defs
	    EXECUTE format('CREATE TABLE %I.%I (%s)', schema_name, audit_table_name, audit_column_defs);

        -- 26. Create or replace audit function
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
            END
            $body$ LANGUAGE plpgsql;
            $func$,
                schema_name, audit_function_name,
                schema_name, audit_table_name, insert_columns, insert_values_new,
                schema_name, audit_table_name, insert_columns, insert_values_old
        );

        -- 27. Create or replace audit trigger
        EXECUTE format('
            CREATE TRIGGER %I
            AFTER INSERT OR UPDATE OR DELETE ON %I.%I
            FOR EACH ROW EXECUTE FUNCTION %I.%I()
        ', audit_trigger_name, schema_name, encrypted_table_name, schema_name, audit_function_name);

        -- 28. Rename old unencrypted table
        EXECUTE format('ALTER TABLE IF EXISTS %I.%I RENAME TO %I_struktur;
        ', schema_name, tbl.table_name, tbl.table_name);

        -- 29. Drop existing trigger/function if any in views
        EXECUTE format('DROP TRIGGER IF EXISTS %I_view_trigger ON %I.%I;', tbl.table_name, schema_name, tbl.table_name);
        EXECUTE format('DROP FUNCTION IF EXISTS %I.%I_view_function()', schema_name, tbl.table_name);

        -- 30. Create view over encrypted table with decryption
        EXECUTE format('
            CREATE OR REPLACE VIEW %I.%I AS SELECT %s FROM %I.%I;
        ', schema_name, tbl.table_name, decrypt_select, schema_name, encrypted_table_name);

        -- 31. Create INSTEAD OF function for CRUD via view
        EXECUTE format(
            $func$
            CREATE OR REPLACE FUNCTION %I.%I_view_function()
            RETURNS trigger AS
                $body$
                BEGIN
                    IF TG_OP = 'INSERT' THEN
                        INSERT INTO %I.%I (%s) VALUES (%s);
                        RETURN NEW;
                    ELSIF TG_OP = 'UPDATE' THEN
                        UPDATE %I.%I SET %s WHERE %s;
                        RETURN NEW;
                    ELSIF TG_OP = 'DELETE' THEN
                        DELETE FROM %I.%I WHERE %s;
                        RETURN OLD;
                    END IF;
                    RETURN NULL;
                END
                $body$ LANGUAGE plpgsql;
            $func$,
                schema_name, tbl.table_name,
                schema_name, encrypted_table_name, encrypted_insert_columns, encrypted_insert_values,
                schema_name, encrypted_table_name, encrypted_update_assignments, pk_conditions,
                schema_name, encrypted_table_name, pk_conditions
        );

        -- 32. Create or replace view trigger
        EXECUTE format('
            CREATE TRIGGER %I_view_trigger 
            INSTEAD OF INSERT OR UPDATE OR DELETE ON %I.%I 
            FOR EACH ROW EXECUTE FUNCTION %I.%I_view_trigger_fn();',
            tbl.table_name, schema_name, tbl.table_name, schema_name, tbl.table_name
        );
        RAISE NOTICE 'Completed table %.%: encrypted table, audit, view with CRUD', schema_name, tbl.table_name;
    END LOOP;
END
$$;
