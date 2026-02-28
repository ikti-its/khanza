CREATE FUNCTION public.default_jadwal_pegawai(new_id uuid) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
    INSERT INTO jadwal_pegawai (id_pegawai, id_hari, id_shift)
    SELECT new_id, hari.id, 'NA'
    FROM ref.hari;
END;
$$;

CREATE FUNCTION public.trigger_init_jadwal_pegawai() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    PERFORM default_jadwal_pegawai(NEW.id);
    RETURN NEW;
END;
$$;

ALTER FUNCTION public.trigger_init_jadwal_pegawai() OWNER TO postgres;

CREATE FUNCTION public.trigger_update_jadwal_pegawai_on_delete() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    PERFORM update_jadwal_pegawai_on_delete(OLD.id);
    RETURN NEW;
END;
$$;

ALTER FUNCTION public.trigger_update_jadwal_pegawai_on_delete() OWNER TO postgres;

CREATE FUNCTION public.update_jadwal_pegawai_on_delete(pegawai_id uuid) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  UPDATE jadwal_pegawai
  SET deleted_at = CURRENT_TIMESTAMP
  WHERE id_pegawai = pegawai_id;
END;
$$;

ALTER FUNCTION public.update_jadwal_pegawai_on_delete(pegawai_id uuid) OWNER TO postgres;

CREATE FUNCTION sik.update_jadwal_pegawai_on_delete(pegawai_id uuid) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  UPDATE jadwal_pegawai
  SET deleted_at = CURRENT_TIMESTAMP
  WHERE id_pegawai = pegawai_id;
END;
$$;

ALTER FUNCTION sik.update_jadwal_pegawai_on_delete(pegawai_id uuid) OWNER TO postgres;



CREATE FUNCTION sik.default_jadwal_pegawai(new_id uuid) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
    INSERT INTO jadwal_pegawai (id_pegawai, id_hari, id_shift)
    SELECT new_id, hari.id, 'NA'
    FROM ref.hari;
END;
$$;


ALTER FUNCTION sik.default_jadwal_pegawai(new_id uuid) OWNER TO postgres;

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


CREATE FUNCTION sik.update_jadwal_pegawai_on_delete(pegawai_id uuid) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  UPDATE jadwal_pegawai
  SET deleted_at = CURRENT_TIMESTAMP
  WHERE id_pegawai = pegawai_id;
END;
$$;


ALTER FUNCTION sik.update_jadwal_pegawai_on_delete(pegawai_id uuid) OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;
