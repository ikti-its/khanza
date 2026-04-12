DO
$$
DECLARE
    view RECORD;
BEGIN
    FOR view IN
        SELECT table_schema, table_name
        FROM information_schema.tables
        WHERE table_type = 'VIEW' --only include views
            AND table_schema NOT IN ('pg_catalog', 'information_schema') -- exclude system tables
            AND table_name LIKE '%_audit_view' -- include _audit_view only
    LOOP
        -- Drop only the trigger
        EXECUTE format('DROP TRIGGER IF EXISTS %I ON %I.%I', 
            view.table_name || '_trigger', view.table_schema, view.table_name
        );
        -- Drop only the function
        -- Note: You must drop the trigger before dropping the function
        EXECUTE format('DROP FUNCTION IF EXISTS %I.%I()', 
            view.table_schema, view.table_name || '_function'
        );
        -- Drop the _audit_view view, trigger, and function
        EXECUTE format('DROP VIEW IF EXISTS %I.%I CASCADE', 
            view.table_schema, view.table_name
            );

        RAISE NOTICE 'Dropped view %.%: view of %.%', 
            view.table_schema, view.table_name, view.table_schema, REPLACE(view.table_name, '_view', '');
    END LOOP;
END
$$;
