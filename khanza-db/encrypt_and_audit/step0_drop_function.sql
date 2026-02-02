DO $$
DECLARE
    fn RECORD;
BEGIN
    FOR fn IN
        SELECT n.nspname AS schema_name,
               p.proname AS function_name,
               pg_get_function_identity_arguments(p.oid) AS args
        FROM pg_proc p
        JOIN pg_namespace n ON p.pronamespace = n.oid
        WHERE p.oid IN (
            SELECT tgfoid FROM pg_trigger WHERE NOT tgisinternal
        )
    LOOP
        EXECUTE format('DROP FUNCTION IF EXISTS %I.%I(%s) CASCADE;',
                       fn.schema_name, fn.function_name, fn.args);
        RAISE NOTICE 'Dropped function %.%(%)', fn.schema_name, fn.function_name, fn.args;
    END LOOP;
END $$;