DO
$$
DECLARE
    tbl RECORD;
    col RECORD;
    current_column_defs TEXT;
    encrypted_column_defs TEXT;
    encrypt_select TEXT;
    pk_columns TEXT[];
    encryption_key TEXT := 'BismillahSidangNilaiA';
    encrypted_table_name TEXT;

    pk_name TEXT;
    pk_def TEXT;
BEGIN
    FOR tbl IN
        SELECT table_schema, table_name
        FROM information_schema.tables
        WHERE table_type = 'BASE TABLE' --only include tables
            AND table_schema NOT IN ('pg_catalog', 'information_schema') -- exclude system tables
            AND table_name LIKE '%_structure'-- include _structure only
    LOOP    
        -- Find the primary keys in each table
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

        current_column_defs   := '';
        encrypted_column_defs := '';
        encrypt_select        := '';

        FOR col IN
            SELECT column_name, data_type, udt_name,
                character_maximum_length, numeric_precision, numeric_scale,
                is_nullable, column_default
            FROM information_schema.columns
            WHERE table_schema = tbl.table_schema AND table_name = tbl.table_name
            ORDER BY ordinal_position
        LOOP
            current_column_defs := format('%I %s%s%s, ',
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
                END,
                CASE WHEN col.is_nullable = 'NO' THEN ' NOT NULL' ELSE '' END,
	            -- CASE WHEN col.column_default IS NOT NULL THEN ' DEFAULT ' || 
                --     format('pgp_sym_encrypt(%s::text, ''%s'')', col.column_default, encryption_key) ELSE '' END,
                CASE WHEN col.column_default IS NOT NULL THEN ' DEFAULT ' || col.column_default ELSE '' END
            );

            IF pk_columns IS NOT NULL AND col.column_name = ANY(pk_columns) THEN
                encrypted_column_defs := encrypted_column_defs || current_column_defs;
                encrypt_select := encrypt_select || format('%I, ', col.column_name);
            ELSE
                encrypted_column_defs := encrypted_column_defs || format('%I BYTEA, ', col.column_name);
                encrypt_select := encrypt_select || format('pgp_sym_encrypt(%I::text, ''%s''), ', col.column_name, encryption_key);
            END IF;
        END LOOP;
        
        encrypted_column_defs := left(encrypted_column_defs, length(encrypted_column_defs) - 2);
        encrypted_table_name := REPLACE(tbl.table_name, '_structure','_encrypted');
        encrypt_select := left(encrypt_select, length(encrypt_select) - 2);


        -- Create encrypted table
        EXECUTE format('CREATE TABLE IF NOT EXISTS %I.%I (%s);', 
            tbl.table_schema, encrypted_table_name, encrypted_column_defs
        );
        RAISE NOTICE 'Created encrypted table %.%', 
            tbl.table_schema, encrypted_table_name;   
        
        SELECT conname, pg_get_constraintdef(c.oid)
        INTO pk_name, pk_def
        FROM pg_constraint c
        JOIN pg_class t ON c.conrelid = t.oid
        JOIN pg_namespace n ON t.relnamespace = n.oid
        WHERE contype = 'p'
            AND n.nspname = tbl.table_schema
            AND t.relname = tbl.table_name;

        IF pk_name IS NOT NULL AND pk_def IS NOT NULL THEN
            EXECUTE format(
                'ALTER TABLE %I.%I ADD CONSTRAINT %I %s;',
                tbl.table_schema, encrypted_table_name, pk_name || '2', pk_def
            );
            RAISE NOTICE 'Applied PK %.%: %', tbl.table_schema, encrypted_table_name, pk_def;
        END IF;

        -- Copy from _structured to _encrypted
        EXECUTE format(
            'INSERT INTO %I.%I SELECT %s FROM %I.%I;',
            tbl.table_schema, encrypted_table_name,
            encrypt_select,
            tbl.table_schema, tbl.table_name);
        RAISE NOTICE 'Copied data to %.%', 
            tbl.table_schema, encrypted_table_name; 
        
    END LOOP;
END
$$;
