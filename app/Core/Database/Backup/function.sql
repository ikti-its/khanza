CREATE FUNCTION sik.trigger_init_jadwal_pegawai() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    PERFORM default_jadwal_pegawai(NEW.id);
    RETURN NEW;
END;
$$;


ALTER FUNCTION sik.trigger_init_jadwal_pegawai() OWNER TO postgres;

CREATE FUNCTION sik.trigger_update_jadwal_pegawai_on_delete() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    PERFORM update_jadwal_pegawai_on_delete(OLD.id);
    RETURN NEW;
END;
$$;


ALTER FUNCTION sik.trigger_update_jadwal_pegawai_on_delete() OWNER TO postgres;