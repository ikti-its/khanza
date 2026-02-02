DO
$$
DECLARE
    tbl RECORD;
BEGIN
    FOR tbl IN
        SELECT table_schema, table_name
        FROM information_schema.tables
        WHERE table_type = 'BASE TABLE' --only include tables
            AND table_schema NOT IN ('pg_catalog', 'information_schema') -- exclude system tables
            AND table_name LIKE '%_audit' -- include _audit only
    LOOP
        -- Drop only the trigger
        EXECUTE format('DROP TRIGGER IF EXISTS %I ON %I.%I', 
            tbl.table_name || '_trigger', tbl.table_schema, REPLACE(tbl.table_name, '_audit', '_encrypted')
        );
        -- Drop only the function
        -- Note: You must drop the trigger before dropping the function
        EXECUTE format('DROP FUNCTION IF EXISTS %I.%I()', 
            tbl.table_schema, tbl.table_name || '_function'
        );
        -- Drop the _audit table, trigger, and function
        EXECUTE format('DROP TABLE IF EXISTS %I.%I CASCADE', 
            tbl.table_schema, tbl.table_name
        );
        RAISE NOTICE 'Dropped table audit %.%', 
            tbl.table_schema, tbl.table_name;
    END LOOP;
END
$$;
