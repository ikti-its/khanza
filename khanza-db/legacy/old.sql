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
    update_assignments text;
    pk_conditions text;
BEGIN
    -- Loop through all tables in the database 
    FOR tbl IN
        SELECT table_schema, table_name
        FROM information_schema.tables
        WHERE table_type = 'BASE TABLE'
          AND table_schema NOT IN ('pg_catalog', 'information_schema') -- exclude system tables
          AND table_name NOT LIKE '%_audit'     -- exclude audit tables
          AND table_name NOT LIKE '%_encrypted' -- exclude encrypted tables \
          AND table_name LIKE '%_old'
    LOOP
        RAISE NOTICE '%', tbl.table_name;
        EXECUTE format('ALTER TABLE IF EXISTS %I.%I RENAME TO %I;', tbl.table_schema, tbl.table_name, left(tbl.table_name, length(tbl.table_name) -4));

    END LOOP;
END
$$;
