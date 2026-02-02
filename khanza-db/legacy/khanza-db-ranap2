--
-- PostgreSQL database dump
--

-- Dumped from database version 17.4
-- Dumped by pg_dump version 17.4

-- Started on 2025-06-02 11:41:12

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 7 (class 2615 OID 16602)
-- Name: ref; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA ref;


ALTER SCHEMA ref OWNER TO postgres;

--
-- TOC entry 6 (class 2615 OID 16601)
-- Name: sik; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA sik;


ALTER SCHEMA sik OWNER TO postgres;

--
-- TOC entry 2 (class 3079 OID 50639)
-- Name: pgcrypto; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pgcrypto WITH SCHEMA sik;


--
-- TOC entry 5697 (class 0 OID 0)
-- Dependencies: 2
-- Name: EXTENSION pgcrypto; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgcrypto IS 'cryptographic functions';


--
-- TOC entry 1071 (class 1247 OID 17052)
-- Name: agama; Type: TYPE; Schema: sik; Owner: postgres
--

CREATE TYPE sik.agama AS ENUM (
    'Islam',
    'Kristen',
    'Katolik',
    'Hindu',
    'Buddha',
    'Konghucu',
    'Lainnya'
);


ALTER TYPE sik.agama OWNER TO postgres;

--
-- TOC entry 1224 (class 1247 OID 50721)
-- Name: cara_keluar_enum; Type: TYPE; Schema: sik; Owner: postgres
--

CREATE TYPE sik.cara_keluar_enum AS ENUM (
    'Atas Izin Dokter',
    'Pulang Sendiri',
    'Dirujuk',
    'Meninggal',
    'Lain-lain'
);


ALTER TYPE sik.cara_keluar_enum OWNER TO postgres;

--
-- TOC entry 1230 (class 1247 OID 50742)
-- Name: dilanjutkan_enum; Type: TYPE; Schema: sik; Owner: postgres
--

CREATE TYPE sik.dilanjutkan_enum AS ENUM (
    'Kembali Ke RS',
    'Kontrol di RS',
    'Puskesmas',
    'Lain-lain'
);


ALTER TYPE sik.dilanjutkan_enum OWNER TO postgres;

--
-- TOC entry 1059 (class 1247 OID 16976)
-- Name: jenis_kelamin; Type: TYPE; Schema: sik; Owner: postgres
--

CREATE TYPE sik.jenis_kelamin AS ENUM (
    'L',
    'P'
);


ALTER TYPE sik.jenis_kelamin OWNER TO postgres;

--
-- TOC entry 1062 (class 1247 OID 16982)
-- Name: jenis_pegawai; Type: TYPE; Schema: sik; Owner: postgres
--

CREATE TYPE sik.jenis_pegawai AS ENUM (
    'Tetap',
    'Kontrak',
    'Magang',
    'Istimewa'
);


ALTER TYPE sik.jenis_pegawai OWNER TO postgres;

--
-- TOC entry 1227 (class 1247 OID 50732)
-- Name: keadaan_enum; Type: TYPE; Schema: sik; Owner: postgres
--

CREATE TYPE sik.keadaan_enum AS ENUM (
    'Membaik',
    'Sembuh',
    'Meninggal',
    'Lain-lain'
);


ALTER TYPE sik.keadaan_enum OWNER TO postgres;

--
-- TOC entry 1074 (class 1247 OID 17068)
-- Name: pendidikan; Type: TYPE; Schema: sik; Owner: postgres
--

CREATE TYPE sik.pendidikan AS ENUM (
    'Tidak Sekolah',
    'SD',
    'SMP',
    'SMA',
    'D3',
    'D4',
    'S1',
    'S2',
    'S3'
);


ALTER TYPE sik.pendidikan OWNER TO postgres;

--
-- TOC entry 1131 (class 1247 OID 17461)
-- Name: status_asal; Type: TYPE; Schema: sik; Owner: postgres
--

CREATE TYPE sik.status_asal AS ENUM (
    'Penerimaan',
    'Pengadaan',
    'Hibah'
);


ALTER TYPE sik.status_asal OWNER TO postgres;

--
-- TOC entry 1095 (class 1247 OID 17218)
-- Name: status_cuti; Type: TYPE; Schema: sik; Owner: postgres
--

CREATE TYPE sik.status_cuti AS ENUM (
    'Ditolak',
    'Diproses',
    'Diterima'
);


ALTER TYPE sik.status_cuti OWNER TO postgres;

--
-- TOC entry 1215 (class 1247 OID 50706)
-- Name: status_enum; Type: TYPE; Schema: sik; Owner: postgres
--

CREATE TYPE sik.status_enum AS ENUM (
    'Ralan',
    'Ranap'
);


ALTER TYPE sik.status_enum OWNER TO postgres;

--
-- TOC entry 1218 (class 1247 OID 50712)
-- Name: status_penyakit_enum; Type: TYPE; Schema: sik; Owner: postgres
--

CREATE TYPE sik.status_penyakit_enum AS ENUM (
    'Lama',
    'Baru'
);


ALTER TYPE sik.status_penyakit_enum OWNER TO postgres;

--
-- TOC entry 1086 (class 1247 OID 17154)
-- Name: status_tukar; Type: TYPE; Schema: sik; Owner: postgres
--

CREATE TYPE sik.status_tukar AS ENUM (
    'Ditolak',
    'Menunggu',
    'Diterima'
);


ALTER TYPE sik.status_tukar OWNER TO postgres;

--
-- TOC entry 1125 (class 1247 OID 17429)
-- Name: status_ubah_master; Type: TYPE; Schema: sik; Owner: postgres
--

CREATE TYPE sik.status_ubah_master AS ENUM (
    '0',
    '1'
);


ALTER TYPE sik.status_ubah_master OWNER TO postgres;

--
-- TOC entry 298 (class 1255 OID 17540)
-- Name: default_jadwal_pegawai(uuid); Type: FUNCTION; Schema: sik; Owner: postgres
--

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

--
-- TOC entry 299 (class 1255 OID 17541)
-- Name: trigger_init_jadwal_pegawai(); Type: FUNCTION; Schema: sik; Owner: postgres
--

CREATE FUNCTION sik.trigger_init_jadwal_pegawai() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    PERFORM default_jadwal_pegawai(NEW.id);
    RETURN NEW;
END;
$$;


ALTER FUNCTION sik.trigger_init_jadwal_pegawai() OWNER TO postgres;

--
-- TOC entry 301 (class 1255 OID 17543)
-- Name: trigger_update_jadwal_pegawai_on_delete(); Type: FUNCTION; Schema: sik; Owner: postgres
--

CREATE FUNCTION sik.trigger_update_jadwal_pegawai_on_delete() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    PERFORM update_jadwal_pegawai_on_delete(OLD.id);
    RETURN NEW;
END;
$$;


ALTER FUNCTION sik.trigger_update_jadwal_pegawai_on_delete() OWNER TO postgres;

--
-- TOC entry 300 (class 1255 OID 17542)
-- Name: update_jadwal_pegawai_on_delete(uuid); Type: FUNCTION; Schema: sik; Owner: postgres
--

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

--
-- TOC entry 226 (class 1259 OID 16782)
-- Name: alasan_cuti; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.alasan_cuti (
    id character varying(2) NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.alasan_cuti OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 16754)
-- Name: departemen; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.departemen (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.departemen OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 16821)
-- Name: golongan_barang_medis; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.golongan_barang_medis (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.golongan_barang_medis OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 16775)
-- Name: hari; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.hari (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.hari OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 16789)
-- Name: industri_farmasi; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.industri_farmasi (
    id integer NOT NULL,
    kode character varying(20) NOT NULL,
    nama character varying(50) NOT NULL,
    alamat character varying(255) NOT NULL,
    kota character varying(255) NOT NULL,
    telepon character varying(255) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.industri_farmasi OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 16747)
-- Name: jabatan; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.jabatan (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.jabatan OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 16807)
-- Name: jenis_barang_medis; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.jenis_barang_medis (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.jenis_barang_medis OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 16814)
-- Name: kategori_barang_medis; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.kategori_barang_medis (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.kategori_barang_medis OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 16737)
-- Name: organisasi; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.organisasi (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    nama character varying(255) NOT NULL,
    alamat character varying(255) NOT NULL,
    latitude numeric NOT NULL,
    longitude numeric NOT NULL,
    radius numeric NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.organisasi OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16730)
-- Name: role; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.role (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.role OWNER TO postgres;

--
-- TOC entry 232 (class 1259 OID 16828)
-- Name: ruangan; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.ruangan (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.ruangan OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 16800)
-- Name: satuan_barang_medis; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.satuan_barang_medis (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.satuan_barang_medis OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 16768)
-- Name: shift; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.shift (
    id character varying(2) NOT NULL,
    nama character varying(50) NOT NULL,
    jam_masuk time with time zone NOT NULL,
    jam_pulang time with time zone NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.shift OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 16761)
-- Name: status_aktif_pegawai; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.status_aktif_pegawai (
    id character varying(2) NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.status_aktif_pegawai OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 16835)
-- Name: supplier_barang_medis; Type: TABLE; Schema: ref; Owner: postgres
--

CREATE TABLE ref.supplier_barang_medis (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    alamat character varying(255) NOT NULL,
    no_telp character varying(20) NOT NULL,
    kota character varying(50) NOT NULL,
    nama_bank character varying(100) NOT NULL,
    no_rekening character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE ref.supplier_barang_medis OWNER TO postgres;

--
-- TOC entry 249 (class 1259 OID 16958)
-- Name: akun; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.akun (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    foto character varying(255) NOT NULL,
    role integer NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp with time zone,
    updater uuid
);


ALTER TABLE sik.akun OWNER TO postgres;

--
-- TOC entry 251 (class 1259 OID 17030)
-- Name: alamat; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.alamat (
    id_akun uuid NOT NULL,
    alamat character varying(255) NOT NULL,
    alamat_lat numeric DEFAULT 7.2575 NOT NULL,
    alamat_lon numeric DEFAULT 112.7521 NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp with time zone,
    updater uuid
);


ALTER TABLE sik.alamat OWNER TO postgres;

--
-- TOC entry 241 (class 1259 OID 16896)
-- Name: alasan_cuti; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.alasan_cuti (
    id character varying(2) NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.alasan_cuti OWNER TO postgres;

--
-- TOC entry 274 (class 1259 OID 25985)
-- Name: ambulans; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.ambulans (
    no_ambulans character varying(20) NOT NULL,
    status character varying(20) DEFAULT 'available'::character varying NOT NULL,
    supir character varying(50)
);


ALTER TABLE sik.ambulans OWNER TO postgres;

--
-- TOC entry 259 (class 1259 OID 17269)
-- Name: barang_medis; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.barang_medis (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    kode_barang character varying(20) NOT NULL,
    kandungan character varying(100) NOT NULL,
    id_industri integer NOT NULL,
    nama character varying(80) NOT NULL,
    id_satbesar integer NOT NULL,
    id_satuan integer NOT NULL,
    h_dasar double precision DEFAULT 0 NOT NULL,
    h_beli double precision DEFAULT 0 NOT NULL,
    h_ralan double precision DEFAULT 0 NOT NULL,
    h_kelas1 double precision DEFAULT 0 NOT NULL,
    h_kelas2 double precision DEFAULT 0 NOT NULL,
    h_kelas3 double precision DEFAULT 0 NOT NULL,
    h_utama double precision DEFAULT 0 NOT NULL,
    h_vip double precision DEFAULT 0 NOT NULL,
    h_vvip double precision DEFAULT 0 NOT NULL,
    h_beliluar double precision DEFAULT 0 NOT NULL,
    h_jualbebas double precision DEFAULT 0 NOT NULL,
    h_karyawan double precision DEFAULT 0 NOT NULL,
    stok_minimum integer DEFAULT 0 NOT NULL,
    id_jenis integer NOT NULL,
    isi integer DEFAULT 0 NOT NULL,
    kapasitas integer DEFAULT 0 NOT NULL,
    kadaluwarsa date,
    id_kategori integer,
    id_golongan integer
);


ALTER TABLE sik.barang_medis OWNER TO postgres;

--
-- TOC entry 252 (class 1259 OID 17087)
-- Name: berkas_pegawai; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.berkas_pegawai (
    id_pegawai uuid NOT NULL,
    nik character varying(16) NOT NULL,
    tempat_lahir character varying(255) NOT NULL,
    tanggal_lahir date NOT NULL,
    agama sik.agama NOT NULL,
    pendidikan sik.pendidikan NOT NULL,
    ktp character varying(255) NOT NULL,
    kk character varying(255) NOT NULL,
    npwp character varying(255) NOT NULL,
    bpjs character varying(255),
    ijazah character varying(255),
    skck character varying(255),
    str character varying(255),
    serkom character varying(255),
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp with time zone,
    updater uuid
);


ALTER TABLE sik.berkas_pegawai OWNER TO postgres;

--
-- TOC entry 293 (class 1259 OID 50702)
-- Name: catatan_observasi_ranap; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.catatan_observasi_ranap (
    no_rawat character varying(17) NOT NULL,
    tgl_perawatan date NOT NULL,
    jam_rawat time without time zone NOT NULL,
    gcs character varying(10),
    td character varying(8) NOT NULL,
    hr character varying(5),
    rr character varying(5),
    suhu character varying(5),
    spo2 character varying(3) NOT NULL,
    nip character varying(20) NOT NULL
);


ALTER TABLE sik.catatan_observasi_ranap OWNER TO postgres;

--
-- TOC entry 291 (class 1259 OID 50694)
-- Name: catatan_observasi_ranap_kebidanan; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.catatan_observasi_ranap_kebidanan (
    no_rawat character varying(17) NOT NULL,
    tgl_perawatan date NOT NULL,
    jam_rawat time without time zone NOT NULL,
    gcs character varying(10),
    td character varying(8),
    hr character varying(5),
    rr character varying(5),
    suhu character varying(5),
    spo2 character varying(3),
    kontraksi character varying(15) NOT NULL,
    bjj character varying(5) NOT NULL,
    ppv character varying(15) NOT NULL,
    vt character varying(30) NOT NULL,
    nip character varying(20) NOT NULL
);


ALTER TABLE sik.catatan_observasi_ranap_kebidanan OWNER TO postgres;

--
-- TOC entry 292 (class 1259 OID 50699)
-- Name: catatan_observasi_ranap_postpartum; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.catatan_observasi_ranap_postpartum (
    no_rawat character varying(17) NOT NULL,
    tgl_perawatan date NOT NULL,
    jam_rawat time without time zone NOT NULL,
    gcs character varying(10),
    td character varying(8) NOT NULL,
    hr character varying(5),
    rr character varying(5),
    suhu character varying(5),
    spo2 character varying(3) NOT NULL,
    tfu character varying(15) NOT NULL,
    kontraksi character varying(15) NOT NULL,
    perdarahan character varying(15) NOT NULL,
    keterangan character varying(30) NOT NULL,
    nip character varying(20) NOT NULL
);


ALTER TABLE sik.catatan_observasi_ranap_postpartum OWNER TO postgres;

--
-- TOC entry 257 (class 1259 OID 17225)
-- Name: cuti; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.cuti (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    id_pegawai uuid NOT NULL,
    tanggal_mulai date NOT NULL,
    tanggal_selesai date NOT NULL,
    id_alasan_cuti character varying(2) NOT NULL,
    status sik.status_cuti DEFAULT 'Diproses'::sik.status_cuti,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp with time zone,
    updater uuid
);


ALTER TABLE sik.cuti OWNER TO postgres;

--
-- TOC entry 267 (class 1259 OID 17467)
-- Name: data_batch; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.data_batch (
    no_batch character varying(20) NOT NULL,
    no_faktur character varying(20) NOT NULL,
    id_barang_medis uuid NOT NULL,
    tanggal_datang date NOT NULL,
    kadaluwarsa date,
    asal sik.status_asal NOT NULL,
    h_dasar double precision DEFAULT 0 NOT NULL,
    h_beli double precision DEFAULT 0 NOT NULL,
    h_ralan double precision DEFAULT 0 NOT NULL,
    h_kelas1 double precision DEFAULT 0 NOT NULL,
    h_kelas2 double precision DEFAULT 0 NOT NULL,
    h_kelas3 double precision DEFAULT 0 NOT NULL,
    h_utama double precision DEFAULT 0 NOT NULL,
    h_vip double precision DEFAULT 0 NOT NULL,
    h_vvip double precision DEFAULT 0 NOT NULL,
    h_beliluar double precision DEFAULT 0 NOT NULL,
    h_jualbebas double precision DEFAULT 0 NOT NULL,
    h_karyawan double precision DEFAULT 0 NOT NULL,
    jumlahbeli integer NOT NULL,
    sisa integer NOT NULL
);


ALTER TABLE sik.data_batch OWNER TO postgres;

--
-- TOC entry 282 (class 1259 OID 34241)
-- Name: databarang; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.databarang (
    kode_brng character varying(15) DEFAULT ''::character varying NOT NULL,
    nama_brng character varying(80),
    kode_satbesar character(4) NOT NULL,
    kode_sat character(4),
    letak_barang character varying(100),
    dasar double precision NOT NULL,
    h_beli double precision,
    ralan double precision,
    kelas1 double precision,
    kelas2 double precision,
    kelas3 double precision,
    utama double precision,
    vip double precision,
    vvip double precision,
    beliluar double precision,
    jualbebas double precision,
    karyawan double precision,
    stokminimal double precision,
    kdjns character(4),
    isi double precision NOT NULL,
    kapasitas double precision NOT NULL,
    expire date,
    status character varying(1) NOT NULL,
    kode_industri character(5),
    kode_kategori character(4),
    kode_golongan character(4)
);


ALTER TABLE sik.databarang OWNER TO postgres;

--
-- TOC entry 237 (class 1259 OID 16868)
-- Name: departemen; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.departemen (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.departemen OWNER TO postgres;

--
-- TOC entry 266 (class 1259 OID 17433)
-- Name: detail_penerimaan_barang_medis; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.detail_penerimaan_barang_medis (
    id_penerimaan uuid NOT NULL,
    id_barang_medis character varying NOT NULL,
    id_satuan integer NOT NULL,
    ubah_master sik.status_ubah_master DEFAULT '0'::sik.status_ubah_master NOT NULL,
    jumlah integer NOT NULL,
    h_pesan double precision DEFAULT 0 NOT NULL,
    subtotal_per_item double precision DEFAULT 0 NOT NULL,
    diskon_persen double precision DEFAULT 0 NOT NULL,
    diskon_jumlah double precision DEFAULT 0 NOT NULL,
    total_per_item double precision DEFAULT 0 NOT NULL,
    jumlah_diterima integer DEFAULT 0 NOT NULL,
    kadaluwarsa date,
    no_batch character varying(20)
);


ALTER TABLE sik.detail_penerimaan_barang_medis OWNER TO postgres;

--
-- TOC entry 294 (class 1259 OID 50717)
-- Name: diagnosa_pasien; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.diagnosa_pasien (
    no_rawat character varying(17) NOT NULL,
    kd_penyakit character varying(10) NOT NULL,
    status sik.status_enum NOT NULL,
    prioritas smallint NOT NULL,
    status_penyakit sik.status_penyakit_enum
);


ALTER TABLE sik.diagnosa_pasien OWNER TO postgres;

--
-- TOC entry 268 (class 1259 OID 17754)
-- Name: dokter; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.dokter (
    kode_dokter character varying(10) NOT NULL,
    nama_dokter character varying(50) NOT NULL,
    jenis_kelamin character varying(1) NOT NULL,
    alamat_tinggal character varying(255) NOT NULL,
    no_telp character varying(15) NOT NULL,
    spesialis character varying(50) NOT NULL,
    izin_praktik character varying(50) NOT NULL
);


ALTER TABLE sik.dokter OWNER TO postgres;

--
-- TOC entry 277 (class 1259 OID 34195)
-- Name: dokter_jaga; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.dokter_jaga (
    kode_dokter character varying(20),
    nama_dokter character varying(50),
    hari_kerja character varying(50),
    jam_mulai time without time zone,
    jam_selesai time without time zone,
    poliklinik character varying(50),
    status character varying(50)
);


ALTER TABLE sik.dokter_jaga OWNER TO postgres;

--
-- TOC entry 253 (class 1259 OID 17108)
-- Name: foto_pegawai; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.foto_pegawai (
    id_pegawai uuid NOT NULL,
    foto character varying(255) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp with time zone,
    updater uuid
);


ALTER TABLE sik.foto_pegawai OWNER TO postgres;

--
-- TOC entry 246 (class 1259 OID 16935)
-- Name: golongan_barang_medis; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.golongan_barang_medis (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.golongan_barang_medis OWNER TO postgres;

--
-- TOC entry 261 (class 1259 OID 17341)
-- Name: gudang_barang; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.gudang_barang (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    id_barang_medis character varying,
    id_ruangan integer NOT NULL,
    stok integer NOT NULL,
    no_batch character varying(20),
    no_faktur character varying(20)
);


ALTER TABLE sik.gudang_barang OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 16889)
-- Name: hari; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.hari (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.hari OWNER TO postgres;

--
-- TOC entry 242 (class 1259 OID 16903)
-- Name: industri_farmasi; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.industri_farmasi (
    id integer NOT NULL,
    kode character varying(20) NOT NULL,
    nama character varying(50) NOT NULL,
    alamat character varying(255) NOT NULL,
    kota character varying(255) NOT NULL,
    telepon character varying(255) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.industri_farmasi OWNER TO postgres;

--
-- TOC entry 236 (class 1259 OID 16861)
-- Name: jabatan; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.jabatan (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.jabatan OWNER TO postgres;

--
-- TOC entry 254 (class 1259 OID 17125)
-- Name: jadwal_pegawai; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.jadwal_pegawai (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    id_pegawai uuid NOT NULL,
    id_hari integer NOT NULL,
    id_shift character varying(2) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp with time zone,
    updater uuid
);


ALTER TABLE sik.jadwal_pegawai OWNER TO postgres;

--
-- TOC entry 244 (class 1259 OID 16921)
-- Name: jenis_barang_medis; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.jenis_barang_medis (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.jenis_barang_medis OWNER TO postgres;

--
-- TOC entry 280 (class 1259 OID 34214)
-- Name: jenis_tindakan; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.jenis_tindakan (
    kode text NOT NULL,
    nama_tindakan text,
    kode_kategori text,
    material numeric,
    bhp numeric,
    tarif_tindakan_dokter numeric,
    tarif_tindakan_perawat numeric,
    kso numeric,
    manajemen numeric,
    total_bayar_dokter numeric,
    total_bayar_perawat numeric,
    total_bayar_dokter_perawat numeric,
    kode_pj text,
    kode_bangsal text,
    status text,
    kelas text
);


ALTER TABLE sik.jenis_tindakan OWNER TO postgres;

--
-- TOC entry 279 (class 1259 OID 34208)
-- Name: jns_perawatan_inap; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.jns_perawatan_inap (
);


ALTER TABLE sik.jns_perawatan_inap OWNER TO postgres;

--
-- TOC entry 270 (class 1259 OID 25942)
-- Name: kamar; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.kamar (
    nomor_bed character varying(20) NOT NULL,
    kode_kamar character varying(20),
    nama_kamar character varying(50),
    kelas character varying(50),
    tarif_kamar numeric,
    status_kamar character varying(20)
);


ALTER TABLE sik.kamar OWNER TO postgres;

--
-- TOC entry 245 (class 1259 OID 16928)
-- Name: kategori_barang_medis; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.kategori_barang_medis (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.kategori_barang_medis OWNER TO postgres;

--
-- TOC entry 262 (class 1259 OID 17357)
-- Name: mutasi_barang; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.mutasi_barang (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    id_barang_medis uuid,
    jumlah integer NOT NULL,
    harga double precision NOT NULL,
    id_ruangandari integer NOT NULL,
    id_ruanganke integer NOT NULL,
    tanggal timestamp without time zone NOT NULL,
    keterangan character varying(60) DEFAULT '-'::character varying NOT NULL,
    no_batch character varying(20),
    no_faktur character varying(20)
);


ALTER TABLE sik.mutasi_barang OWNER TO postgres;

--
-- TOC entry 258 (class 1259 OID 17249)
-- Name: notifikasi; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.notifikasi (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    sender uuid NOT NULL,
    recipient uuid NOT NULL,
    tanggal date DEFAULT CURRENT_DATE,
    judul character varying(255) NOT NULL,
    pesan character varying(255) NOT NULL,
    read boolean DEFAULT false
);


ALTER TABLE sik.notifikasi OWNER TO postgres;

--
-- TOC entry 260 (class 1259 OID 17322)
-- Name: opname; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.opname (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    id_barang_medis uuid,
    id_ruangan integer NOT NULL,
    h_beli double precision DEFAULT 0 NOT NULL,
    tanggal date NOT NULL,
    "real" integer NOT NULL,
    stok integer DEFAULT 0 NOT NULL,
    keterangan character varying(60) DEFAULT '-'::character varying NOT NULL,
    no_batch character varying(20),
    no_faktur character varying(20)
);


ALTER TABLE sik.opname OWNER TO postgres;

--
-- TOC entry 235 (class 1259 OID 16851)
-- Name: organisasi; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.organisasi (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    nama character varying(255) NOT NULL,
    alamat character varying(255) NOT NULL,
    latitude numeric NOT NULL,
    longitude numeric NOT NULL,
    radius numeric NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.organisasi OWNER TO postgres;

--
-- TOC entry 290 (class 1259 OID 50676)
-- Name: pasien; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.pasien (
    no_rkm_medis character varying(15) NOT NULL,
    nm_pasien character varying(40),
    no_ktp character varying(20),
    jk character(1),
    tmp_lahir character varying(15),
    tgl_lahir date,
    nm_ibu character varying(40),
    alamat character varying(200),
    gol_darah character varying(2),
    pekerjaan character varying(60),
    stts_nikah character varying(20),
    agama character varying(12),
    tgl_daftar date,
    no_tlp character varying(40),
    umur character varying(30),
    pnd character varying(10),
    keluarga character varying(10),
    namakeluarga character varying(50),
    kd_pj character(4),
    no_peserta character varying(25),
    kd_kel integer,
    kd_kec integer,
    kd_kab integer,
    pekerjaanpj character varying(35),
    alamatpj character varying(100),
    kelurahanpj character varying(60),
    kecamatanpj character varying(60),
    kabupatenpj character varying(60),
    perusahaan_pasien character varying(8),
    suku_bangsa integer,
    bahasa_pasien integer,
    cacat_fisik integer,
    email character varying(50),
    nip character varying(30),
    kd_prop integer,
    propinsipj character varying(30),
    CONSTRAINT pasien_gol_darah_check CHECK (((gol_darah)::text = ANY ((ARRAY['A'::character varying, 'B'::character varying, 'O'::character varying, 'AB'::character varying, '-'::character varying])::text[]))),
    CONSTRAINT pasien_jk_check CHECK ((jk = ANY (ARRAY['L'::bpchar, 'P'::bpchar]))),
    CONSTRAINT pasien_keluarga_check CHECK (((keluarga)::text = ANY ((ARRAY['AYAH'::character varying, 'IBU'::character varying, 'ISTRI'::character varying, 'SUAMI'::character varying, 'KAKAK'::character varying, 'ADIK'::character varying, 'PAMAN'::character varying, 'BIBI'::character varying, 'KAKEK'::character varying, 'NENEK'::character varying, 'LAINNYA'::character varying, 'SAUDARA'::character varying])::text[]))),
    CONSTRAINT pasien_pnd_check CHECK (((pnd)::text = ANY ((ARRAY['TS'::character varying, 'TK'::character varying, 'SD'::character varying, 'SMP'::character varying, 'SMA'::character varying, 'D1'::character varying, 'D2'::character varying, 'D3'::character varying, 'S1'::character varying, 'S2'::character varying, 'S3'::character varying, '-'::character varying, 'SLTA'::character varying, 'PAUD'::character varying, 'TIDAK TAMAT SD'::character varying])::text[]))),
    CONSTRAINT pasien_stts_nikah_check CHECK (((stts_nikah)::text = ANY ((ARRAY['BELUM MENIKAH'::character varying, 'MENIKAH'::character varying, 'DUDA'::character varying, 'JANDA'::character varying])::text[])))
);


ALTER TABLE sik.pasien OWNER TO postgres;

--
-- TOC entry 250 (class 1259 OID 16991)
-- Name: pegawai; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.pegawai (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    id_akun uuid NOT NULL,
    nip character varying(10) NOT NULL,
    nama character varying(255) NOT NULL,
    jenis_kelamin sik.jenis_kelamin NOT NULL,
    id_jabatan integer NOT NULL,
    id_departemen integer NOT NULL,
    id_status_aktif character varying(2) NOT NULL,
    jenis_pegawai sik.jenis_pegawai NOT NULL,
    telepon character varying(255) NOT NULL,
    tanggal_masuk date NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp with time zone,
    updater uuid
);


ALTER TABLE sik.pegawai OWNER TO postgres;

--
-- TOC entry 281 (class 1259 OID 34223)
-- Name: pemberian_obat; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.pemberian_obat (
    tanggal_beri date,
    jam_beri time without time zone,
    nomor_rawat character varying(20),
    nama_pasien character varying(50),
    kode_obat character varying(20),
    nama_obat character varying(50),
    embalase character varying(20),
    tuslah character varying(20),
    jumlah character varying(20),
    biaya_obat numeric,
    total numeric,
    gudang character varying(50),
    no_batch character varying(50),
    no_faktur character varying(50),
    kelas character varying(20) DEFAULT 'kelas1'::character varying
);


ALTER TABLE sik.pemberian_obat OWNER TO postgres;

--
-- TOC entry 289 (class 1259 OID 42447)
-- Name: pemeriksaan_ranap; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.pemeriksaan_ranap (
    no_rawat character varying(17) NOT NULL,
    tgl_perawatan date NOT NULL,
    jam_rawat time without time zone NOT NULL,
    suhu_tubuh character varying(5),
    tensi character varying(8),
    nadi character varying(3),
    respirasi character varying(3),
    tinggi character varying(5),
    berat character varying(5),
    spo2 character varying(3),
    gcs character varying(10),
    kesadaran character varying(20),
    keluhan character varying(2000),
    pemeriksaan character varying(2000),
    alergi character varying(50),
    penilaian character varying(2000),
    rtl character varying(2000),
    instruksi character varying(2000),
    evaluasi character varying(2000),
    nip character varying(20) NOT NULL
);


ALTER TABLE sik.pemeriksaan_ranap OWNER TO postgres;

--
-- TOC entry 265 (class 1259 OID 17412)
-- Name: penerimaan_barang_medis; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.penerimaan_barang_medis (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    no_faktur character varying(20) NOT NULL,
    no_pemesanan character varying(20) NOT NULL,
    id_supplier integer NOT NULL,
    tanggal_datang date NOT NULL,
    tanggal_faktur date NOT NULL,
    tanggal_jthtempo date NOT NULL,
    id_pegawai uuid NOT NULL,
    id_ruangan integer NOT NULL,
    pajak_persen double precision NOT NULL,
    pajak_jumlah double precision NOT NULL,
    tagihan double precision NOT NULL,
    materai double precision NOT NULL
);


ALTER TABLE sik.penerimaan_barang_medis OWNER TO postgres;

--
-- TOC entry 285 (class 1259 OID 42398)
-- Name: permintaan_resep_pulang; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.permintaan_resep_pulang (
    no_permintaan character varying(20) NOT NULL,
    tgl_permintaan date,
    jam time without time zone NOT NULL,
    no_rawat character varying(17) NOT NULL,
    kd_dokter character varying(20) NOT NULL,
    status character varying(10) NOT NULL,
    tgl_validasi date NOT NULL,
    jam_validasi time without time zone NOT NULL,
    kode_brng character varying(80),
    jumlah integer,
    aturan_pakai text,
    CONSTRAINT permintaan_resep_pulang_status_check CHECK (((status)::text = ANY ((ARRAY['Sudah'::character varying, 'Belum'::character varying])::text[])))
);


ALTER TABLE sik.permintaan_resep_pulang OWNER TO postgres;

--
-- TOC entry 287 (class 1259 OID 42411)
-- Name: permintaan_stok_obat; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.permintaan_stok_obat (
    no_permintaan character varying(30) NOT NULL,
    tgl_permintaan date,
    jam time without time zone NOT NULL,
    no_rawat character varying(17) NOT NULL,
    kd_dokter character varying(20) NOT NULL,
    status character varying(10) NOT NULL,
    tgl_validasi date,
    jam_validasi time without time zone
);


ALTER TABLE sik.permintaan_stok_obat OWNER TO postgres;

--
-- TOC entry 256 (class 1259 OID 17193)
-- Name: presensi; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.presensi (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    id_pegawai uuid NOT NULL,
    id_jadwal_pegawai uuid NOT NULL,
    tanggal date DEFAULT CURRENT_DATE,
    jam_masuk time with time zone,
    jam_pulang time with time zone,
    keterangan character varying(50),
    foto character varying(255),
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp with time zone,
    updater uuid
);


ALTER TABLE sik.presensi OWNER TO postgres;

--
-- TOC entry 273 (class 1259 OID 25963)
-- Name: rawat_inap; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.rawat_inap (
    nomor_rawat character varying(20) NOT NULL,
    nomor_rm character varying(20),
    nama_pasien character varying(50),
    alamat_pasien character varying(255),
    penanggung_jawab character varying(20),
    hubungan_pj character varying(20),
    jenis_bayar character varying(20),
    kamar character varying(20),
    tarif_kamar numeric,
    diagnosa_awal character varying(255),
    diagnosa_akhir character varying(255),
    tanggal_masuk date,
    tanggal_keluar date,
    jam_keluar date,
    total_biaya numeric,
    status_pulang character varying(20),
    lama_ranap numeric,
    dokter_pj character varying(50),
    status_bayar character varying(20),
    jam_masuk time without time zone
);


ALTER TABLE sik.rawat_inap OWNER TO postgres;

--
-- TOC entry 269 (class 1259 OID 17759)
-- Name: registrasi; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.registrasi (
    nomor_reg character varying(20) NOT NULL,
    nomor_rawat character varying(20),
    tanggal date,
    jam time without time zone,
    kode_dokter character varying(10),
    nama_dokter character varying(50),
    nomor_rm character varying(20),
    nama_pasien character varying(50),
    jenis_kelamin character varying(1),
    umur character varying(3),
    poliklinik character varying(255),
    jenis_bayar character varying(50),
    penanggung_jawab character varying(50),
    alamat_pj character varying(255),
    hubungan_pj character varying(50),
    biaya_registrasi numeric,
    status_registrasi character varying(50),
    no_telepon character varying(50),
    status_rawat character varying(50),
    status_poli character varying(50),
    status_bayar character varying(50),
    status_kamar text DEFAULT true,
    nomor_bed character varying(20)
);


ALTER TABLE sik.registrasi OWNER TO postgres;

--
-- TOC entry 283 (class 1259 OID 42376)
-- Name: resep_dokter; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.resep_dokter (
    no_resep character varying(20),
    kode_barang character varying(20),
    jumlah numeric,
    aturan_pakai character varying(150),
    embalase numeric DEFAULT 0,
    tuslah numeric DEFAULT 0
);


ALTER TABLE sik.resep_dokter OWNER TO postgres;

--
-- TOC entry 296 (class 1259 OID 50783)
-- Name: resep_dokter_racikan; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.resep_dokter_racikan (
    no_resep character varying(20) NOT NULL,
    no_racik character varying(20) NOT NULL,
    nama_racik character varying(100) NOT NULL,
    kd_racik character varying(3) NOT NULL,
    jml_dr integer NOT NULL,
    aturan_pakai character varying(150) NOT NULL,
    keterangan character varying(50) NOT NULL
);


ALTER TABLE sik.resep_dokter_racikan OWNER TO postgres;

--
-- TOC entry 297 (class 1259 OID 50788)
-- Name: resep_dokter_racikan_detail; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.resep_dokter_racikan_detail (
    no_resep character varying(20) NOT NULL,
    no_racik character varying(20) NOT NULL,
    kode_brng character varying(15) NOT NULL,
    p1 double precision,
    p2 double precision,
    kandungan character varying(10),
    jml double precision
);


ALTER TABLE sik.resep_dokter_racikan_detail OWNER TO postgres;

--
-- TOC entry 284 (class 1259 OID 42381)
-- Name: resep_obat; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.resep_obat (
    no_resep character varying(20) DEFAULT ''::character varying NOT NULL,
    tgl_perawatan date,
    jam time without time zone NOT NULL,
    no_rawat character varying(17) DEFAULT ''::character varying NOT NULL,
    kd_dokter character varying(20) NOT NULL,
    tgl_peresepan date,
    jam_peresepan time without time zone,
    status character varying(5),
    tgl_penyerahan date NOT NULL,
    jam_penyerahan time without time zone NOT NULL,
    validasi boolean DEFAULT false,
    CONSTRAINT resep_obat_status_check CHECK (((status)::text = ANY ((ARRAY['ralan'::character varying, 'ranap'::character varying])::text[])))
);


ALTER TABLE sik.resep_obat OWNER TO postgres;

--
-- TOC entry 286 (class 1259 OID 42406)
-- Name: resep_pulang; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.resep_pulang (
    no_rawat character varying(17) NOT NULL,
    kode_brng character varying(15) NOT NULL,
    jml_barang double precision NOT NULL,
    harga double precision NOT NULL,
    total double precision NOT NULL,
    dosis character varying(150) NOT NULL,
    tanggal date NOT NULL,
    jam time without time zone NOT NULL,
    kd_bangsal character varying(20) NOT NULL,
    no_batch character varying(20) NOT NULL,
    no_faktur character varying(20) NOT NULL
);


ALTER TABLE sik.resep_pulang OWNER TO postgres;

--
-- TOC entry 295 (class 1259 OID 50751)
-- Name: resume_pasien_ranap; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.resume_pasien_ranap (
    no_rawat character varying(17) NOT NULL,
    kd_dokter character varying(20) NOT NULL,
    diagnosa_awal character varying(100) NOT NULL,
    alasan character varying(100) NOT NULL,
    keluhan_utama text NOT NULL,
    pemeriksaan_fisik text NOT NULL,
    jalannya_penyakit text NOT NULL,
    pemeriksaan_penunjang text NOT NULL,
    hasil_laborat text NOT NULL,
    tindakan_dan_operasi text NOT NULL,
    obat_di_rs text NOT NULL,
    diagnosa_utama character varying(80) NOT NULL,
    kd_diagnosa_utama character varying(10) NOT NULL,
    diagnosa_sekunder character varying(80) NOT NULL,
    kd_diagnosa_sekunder character varying(10) NOT NULL,
    diagnosa_sekunder2 character varying(80) NOT NULL,
    kd_diagnosa_sekunder2 character varying(10) NOT NULL,
    diagnosa_sekunder3 character varying(80) NOT NULL,
    kd_diagnosa_sekunder3 character varying(10) NOT NULL,
    diagnosa_sekunder4 character varying(80) NOT NULL,
    kd_diagnosa_sekunder4 character varying(10) NOT NULL,
    prosedur_utama character varying(80) NOT NULL,
    kd_prosedur_utama character varying(8) NOT NULL,
    prosedur_sekunder character varying(80) NOT NULL,
    kd_prosedur_sekunder character varying(8) NOT NULL,
    prosedur_sekunder2 character varying(80) NOT NULL,
    kd_prosedur_sekunder2 character varying(8) NOT NULL,
    prosedur_sekunder3 character varying(80) NOT NULL,
    kd_prosedur_sekunder3 character varying(8) NOT NULL,
    alergi character varying(100) NOT NULL,
    diet text NOT NULL,
    lab_belum text NOT NULL,
    edukasi text NOT NULL,
    cara_keluar sik.cara_keluar_enum NOT NULL,
    ket_keluar character varying(50),
    keadaan sik.keadaan_enum NOT NULL,
    ket_keadaan character varying(50),
    dilanjutkan sik.dilanjutkan_enum NOT NULL,
    ket_dilanjutkan character varying(50),
    kontrol timestamp without time zone,
    obat_pulang text NOT NULL
);


ALTER TABLE sik.resume_pasien_ranap OWNER TO postgres;

--
-- TOC entry 234 (class 1259 OID 16844)
-- Name: role; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.role (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.role OWNER TO postgres;

--
-- TOC entry 247 (class 1259 OID 16942)
-- Name: ruangan; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.ruangan (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.ruangan OWNER TO postgres;

--
-- TOC entry 272 (class 1259 OID 25956)
-- Name: rujukan_keluar; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.rujukan_keluar (
    nomor_rujuk character varying(20),
    nomor_rawat character varying(20) NOT NULL,
    nomor_rm character varying(20),
    nama_pasien character varying(60),
    tempat_rujuk character varying(255),
    tanggal_rujuk date,
    jam_rujuk date,
    keterangan_diagnosa character varying(255),
    dokter_perujuk character varying(60),
    kategori_rujuk character varying(60),
    pengantaran character varying(60),
    keterangan character varying(60)
);


ALTER TABLE sik.rujukan_keluar OWNER TO postgres;

--
-- TOC entry 271 (class 1259 OID 25949)
-- Name: rujukan_masuk; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.rujukan_masuk (
    nomor_rujuk character varying(20),
    perujuk character varying(255),
    alamat_perujuk character varying(255),
    nomor_rawat character varying(20) NOT NULL,
    nomor_rm character varying(20),
    nama_pasien character varying(60),
    alamat character varying(255),
    umur character varying(20),
    tanggal_masuk date,
    tanggal_keluar date,
    diagnosa_awal character varying(255)
);


ALTER TABLE sik.rujukan_masuk OWNER TO postgres;

--
-- TOC entry 243 (class 1259 OID 16914)
-- Name: satuan_barang_medis; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.satuan_barang_medis (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.satuan_barang_medis OWNER TO postgres;

--
-- TOC entry 239 (class 1259 OID 16882)
-- Name: shift; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.shift (
    id character varying(2) NOT NULL,
    nama character varying(50) NOT NULL,
    jam_masuk time with time zone NOT NULL,
    jam_pulang time with time zone NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.shift OWNER TO postgres;

--
-- TOC entry 238 (class 1259 OID 16875)
-- Name: status_aktif_pegawai; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.status_aktif_pegawai (
    id character varying(2) NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.status_aktif_pegawai OWNER TO postgres;

--
-- TOC entry 263 (class 1259 OID 17379)
-- Name: stok_keluar_barang_medis; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.stok_keluar_barang_medis (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    no_keluar character varying(20) NOT NULL,
    id_pegawai uuid NOT NULL,
    tanggal_stok_keluar date DEFAULT CURRENT_DATE NOT NULL,
    id_ruangan integer NOT NULL,
    keterangan character varying(255)
);


ALTER TABLE sik.stok_keluar_barang_medis OWNER TO postgres;

--
-- TOC entry 288 (class 1259 OID 42416)
-- Name: stok_obat_pasien; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.stok_obat_pasien (
    no_permintaan character varying(30) NOT NULL,
    tanggal date NOT NULL,
    jam time without time zone NOT NULL,
    no_rawat character varying(17) NOT NULL,
    kode_brng character varying(15) NOT NULL,
    jumlah double precision NOT NULL,
    kd_bangsal character(5) NOT NULL,
    no_batch character varying(20),
    no_faktur character varying(30),
    aturan_pakai character varying(150),
    jam00 boolean DEFAULT false NOT NULL,
    jam01 boolean DEFAULT false NOT NULL,
    jam02 boolean DEFAULT false NOT NULL,
    jam03 boolean DEFAULT false NOT NULL,
    jam04 boolean DEFAULT false NOT NULL,
    jam05 boolean DEFAULT false NOT NULL,
    jam06 boolean DEFAULT false NOT NULL,
    jam07 boolean DEFAULT false NOT NULL,
    jam08 boolean DEFAULT false NOT NULL,
    jam09 boolean DEFAULT false NOT NULL,
    jam10 boolean DEFAULT false NOT NULL,
    jam11 boolean DEFAULT false NOT NULL,
    jam12 boolean DEFAULT false NOT NULL,
    jam13 boolean DEFAULT false NOT NULL,
    jam14 boolean DEFAULT false NOT NULL,
    jam15 boolean DEFAULT false NOT NULL,
    jam16 boolean DEFAULT false NOT NULL,
    jam17 boolean DEFAULT false NOT NULL,
    jam18 boolean DEFAULT false NOT NULL,
    jam19 boolean DEFAULT false NOT NULL,
    jam20 boolean DEFAULT false NOT NULL,
    jam21 boolean DEFAULT false NOT NULL,
    jam22 boolean DEFAULT false NOT NULL,
    jam23 boolean DEFAULT false NOT NULL
);


ALTER TABLE sik.stok_obat_pasien OWNER TO postgres;

--
-- TOC entry 248 (class 1259 OID 16949)
-- Name: supplier_barang_medis; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.supplier_barang_medis (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    alamat character varying(255) NOT NULL,
    no_telp character varying(20) NOT NULL,
    kota character varying(50) NOT NULL,
    nama_bank character varying(100) NOT NULL,
    no_rekening character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sik.supplier_barang_medis OWNER TO postgres;

--
-- TOC entry 278 (class 1259 OID 34198)
-- Name: tarif_tindakan; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.tarif_tindakan (
    kode character varying(20) NOT NULL,
    nama_perawatan character varying(255),
    kategori_perawatan character varying(50),
    tarif numeric,
    kelas character varying(20)
);


ALTER TABLE sik.tarif_tindakan OWNER TO postgres;

--
-- TOC entry 276 (class 1259 OID 26005)
-- Name: tindakan; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.tindakan (
    nomor_rawat character varying(20) NOT NULL,
    nomor_rm character varying(20),
    nama_pasien character varying(50),
    tindakan character varying(255),
    kode_dokter character varying(10),
    nama_dokter character varying(50),
    nip character varying(10),
    nama_petugas character varying(50),
    tanggal_rawat date,
    jam_rawat time without time zone,
    biaya numeric
);


ALTER TABLE sik.tindakan OWNER TO postgres;

--
-- TOC entry 264 (class 1259 OID 17396)
-- Name: transaksi_keluar_barang_medis; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.transaksi_keluar_barang_medis (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    id_stok_keluar uuid NOT NULL,
    id_barang_medis uuid NOT NULL,
    no_batch character varying(20),
    no_faktur character varying(20),
    jumlah_keluar integer NOT NULL
);


ALTER TABLE sik.transaksi_keluar_barang_medis OWNER TO postgres;

--
-- TOC entry 255 (class 1259 OID 17161)
-- Name: tukar_jadwal; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.tukar_jadwal (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    id_sender uuid NOT NULL,
    id_recipient uuid NOT NULL,
    id_hari integer NOT NULL,
    id_shift_sender character varying(2) NOT NULL,
    id_shift_recipient character varying(2) NOT NULL,
    status sik.status_tukar DEFAULT 'Menunggu'::sik.status_tukar
);


ALTER TABLE sik.tukar_jadwal OWNER TO postgres;

--
-- TOC entry 275 (class 1259 OID 25998)
-- Name: ugd; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.ugd (
    nomor_reg character varying(20) NOT NULL,
    nomor_rawat character varying(20),
    tanggal date,
    jam time without time zone,
    kode_dokter character varying(10),
    dokter_dituju character varying(50),
    nomor_rm character varying(20),
    nama_pasien character varying(50),
    jenis_kelamin character varying(1),
    umur character varying(3),
    poliklinik character varying(255),
    penanggung_jawab character varying(50),
    alamat_pj character varying(255),
    hubungan_pj character varying(50),
    biaya_registrasi numeric,
    status character varying(50),
    jenis_bayar character varying(50),
    status_rawat character varying(50),
    status_bayar character varying(50)
);


ALTER TABLE sik.ugd OWNER TO postgres;

--
-- TOC entry 5620 (class 0 OID 16782)
-- Dependencies: 226
-- Data for Name: alasan_cuti; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.alasan_cuti (id, nama, created_at, updated_at) FROM stdin;
S	Sakit	2025-05-15 23:07:10.313595+07	2025-05-15 23:07:10.313595+07
I	Izin	2025-05-15 23:07:10.313595+07	2025-05-15 23:07:10.313595+07
CT	Cuti Tahunan	2025-05-15 23:07:10.313595+07	2025-05-15 23:07:10.313595+07
CB	Cuti Besar	2025-05-15 23:07:10.313595+07	2025-05-15 23:07:10.313595+07
CM	Cuti Melahirkan	2025-05-15 23:07:10.313595+07	2025-05-15 23:07:10.313595+07
CU	Cuti karena Alasan Penting	2025-05-15 23:07:10.313595+07	2025-05-15 23:07:10.313595+07
\.


--
-- TOC entry 5616 (class 0 OID 16754)
-- Dependencies: 222
-- Data for Name: departemen; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.departemen (id, nama, created_at, updated_at) FROM stdin;
2	Petugas	2025-05-15 18:33:07.921616+07	2025-05-15 18:33:07.921616+07
3	Dokter	2025-05-15 18:33:15.989844+07	2025-05-15 18:33:15.989844+07
1	Admin	2025-05-15 20:00:58.872706+07	2025-05-15 20:00:58.872706+07
1000	Testing	2025-05-20 15:23:03.025262+07	2025-05-20 15:23:03.025262+07
\.


--
-- TOC entry 5625 (class 0 OID 16821)
-- Dependencies: 231
-- Data for Name: golongan_barang_medis; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.golongan_barang_medis (id, nama, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 5619 (class 0 OID 16775)
-- Dependencies: 225
-- Data for Name: hari; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.hari (id, nama, created_at, updated_at) FROM stdin;
1	Senin	2025-05-15 20:05:08.34462+07	2025-05-15 20:05:08.34462+07
2	Selasa	2025-05-15 20:05:08.34462+07	2025-05-15 20:05:08.34462+07
3	Rabu	2025-05-15 20:05:08.34462+07	2025-05-15 20:05:08.34462+07
4	Kamis	2025-05-15 20:05:08.34462+07	2025-05-15 20:05:08.34462+07
5	Jumat	2025-05-15 20:05:08.34462+07	2025-05-15 20:05:08.34462+07
6	Sabtu	2025-05-15 20:05:08.34462+07	2025-05-15 20:05:08.34462+07
7	Minggu	2025-05-15 20:05:08.34462+07	2025-05-15 20:05:08.34462+07
\.


--
-- TOC entry 5621 (class 0 OID 16789)
-- Dependencies: 227
-- Data for Name: industri_farmasi; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.industri_farmasi (id, kode, nama, alamat, kota, telepon, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 5615 (class 0 OID 16747)
-- Dependencies: 221
-- Data for Name: jabatan; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.jabatan (id, nama, created_at, updated_at) FROM stdin;
2	Petugas	2025-05-15 18:31:32.497043+07	2025-05-15 18:31:32.497043+07
3	Dokter	2025-05-15 18:31:43.12515+07	2025-05-15 18:31:43.12515+07
1	Admin	2025-05-15 20:00:48.601557+07	2025-05-15 20:00:48.601557+07
1000	Testing	2025-05-20 15:23:30.917849+07	2025-05-20 15:23:30.917849+07
\.


--
-- TOC entry 5623 (class 0 OID 16807)
-- Dependencies: 229
-- Data for Name: jenis_barang_medis; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.jenis_barang_medis (id, nama, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 5624 (class 0 OID 16814)
-- Dependencies: 230
-- Data for Name: kategori_barang_medis; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.kategori_barang_medis (id, nama, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 5614 (class 0 OID 16737)
-- Dependencies: 220
-- Data for Name: organisasi; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.organisasi (id, nama, alamat, latitude, longitude, radius, created_at, updated_at) FROM stdin;
2e8ecec0-5f4d-4dbe-a74d-0f014718b68d	Apartemen Puncak Kertajaya	apartemen puncak kertajaya, Kertajaya Indah Regency, Keputih, Kec. Sukolilo, Surabaya, Jawa Timur 60111	-7.288022143772514	112.78670386466561	50	2025-05-24 19:39:07.031719+07	2025-05-24 19:39:07.031719+07
\.


--
-- TOC entry 5613 (class 0 OID 16730)
-- Dependencies: 219
-- Data for Name: role; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.role (id, nama, created_at, updated_at) FROM stdin;
1	Admin	2025-03-17 20:07:31.216018+07	2025-03-17 20:07:31.216018+07
2	Pegawai	2025-03-17 20:07:31.216018+07	2025-03-17 20:07:31.216018+07
1337	Developer	2025-03-17 20:07:31.216018+07	2025-03-17 20:07:31.216018+07
3	Dokter	2025-05-15 18:28:20.633803+07	2025-05-15 18:28:20.633803+07
\.


--
-- TOC entry 5626 (class 0 OID 16828)
-- Dependencies: 232
-- Data for Name: ruangan; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.ruangan (id, nama, created_at, updated_at) FROM stdin;
1000	Gudang	2025-05-29 13:09:48.514221+07	2025-05-29 13:09:48.514221+07
\.


--
-- TOC entry 5622 (class 0 OID 16800)
-- Dependencies: 228
-- Data for Name: satuan_barang_medis; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.satuan_barang_medis (id, nama, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 5618 (class 0 OID 16768)
-- Dependencies: 224
-- Data for Name: shift; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.shift (id, nama, jam_masuk, jam_pulang, created_at, updated_at) FROM stdin;
1	Pagi	07:00:00+07	15:00:00+07	2025-05-15 20:07:39.729729+07	2025-05-15 20:07:39.729729+07
2	Siang	15:00:00+07	23:00:00+07	2025-05-15 20:07:39.729729+07	2025-05-15 20:07:39.729729+07
3	Malam	23:00:00+07	07:00:00+07	2025-05-15 20:07:39.729729+07	2025-05-15 20:07:39.729729+07
\.


--
-- TOC entry 5617 (class 0 OID 16761)
-- Dependencies: 223
-- Data for Name: status_aktif_pegawai; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.status_aktif_pegawai (id, nama, created_at, updated_at) FROM stdin;
1	Aktif	2025-05-15 18:34:01.681741+07	2025-05-15 18:34:01.681741+07
2	Tidak Aktif	2025-05-15 18:34:14.510827+07	2025-05-15 18:34:14.510827+07
A	Aktif	2025-05-20 15:24:09.796286+07	2025-05-20 15:24:09.796286+07
\.


--
-- TOC entry 5627 (class 0 OID 16835)
-- Dependencies: 233
-- Data for Name: supplier_barang_medis; Type: TABLE DATA; Schema: ref; Owner: postgres
--

COPY ref.supplier_barang_medis (id, nama, alamat, no_telp, kota, nama_bank, no_rekening, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 5643 (class 0 OID 16958)
-- Dependencies: 249
-- Data for Name: akun; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.akun (id, email, password, foto, role, created_at, updated_at, deleted_at, updater) FROM stdin;
83e0f2ba-9b19-439e-a448-97338eea7ff8	admin123@fathoor.dev	$2a$10$LcvwwjdpGUz3LmKLOa9Yy.Oqs0DAsquurYYMAWA8n0eO3uPX0ibrW	/img/default.png	1	2025-03-17 20:35:20.555048+07	2025-03-17 20:35:20.555048+07	\N	\N
933568d5-982a-43c3-a4aa-3177bab10f07	eric@fathoor.dev	$2a$12$GmKnyhdJVTC424cvJFgiC.fiQjFm18IN587OIq/puCLg5ab1abnEm	/img/default.png	2	2025-05-15 18:28:32.325395+07	2025-05-15 18:28:32.325395+07	\N	933568d5-982a-43c3-a4aa-3177bab10f07
9de502cb-2cd5-46cb-a717-97f2bb1f85c5	fathoor@fathoor.dev	$2a$10$Yg78XjsfHtvpiZHzxjhtBeauNRpK928c1zKSXjPdV.jOE0q21qXgq	/img/default.png	1337	2025-03-17 20:07:40.473102+07	2025-03-17 20:07:40.473102+07	\N	\N
b9b1ad6c-c41b-446a-b00e-f56684663c56	aziz@fathoor.dev	$2a$12$GmKnyhdJVTC424cvJFgiC.fiQjFm18IN587OIq/puCLg5ab1abnEm	/img/default.png	3	2025-05-15 18:28:32.325395+07	2025-05-15 18:28:32.325395+07	\N	b9b1ad6c-c41b-446a-b00e-f56684663c56
bd0b4833-510c-4c29-a3a4-e08e9a0a5955	admin@fathoor.dev	$2a$10$8jI.qKrVbXQjNzYX6KOIvukkYkNcmfYyPWiv9tuHE8vdg5EhjQBzy	/img/default.png	1	2025-03-17 20:07:40.473102+07	2025-03-17 20:07:40.473102+07	\N	bd0b4833-510c-4c29-a3a4-e08e9a0a5955
\.


--
-- TOC entry 5645 (class 0 OID 17030)
-- Dependencies: 251
-- Data for Name: alamat; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.alamat (id_akun, alamat, alamat_lat, alamat_lon, created_at, updated_at, deleted_at, updater) FROM stdin;
bd0b4833-510c-4c29-a3a4-e08e9a0a5955	Jl. Mawar No. 123, Surabaya	-7.257472	112.752088	2025-05-15 20:12:31.655792+07	2025-05-15 20:12:31.655792+07	\N	\N
933568d5-982a-43c3-a4aa-3177bab10f07	Jl. Kertajaya No. 5	-7.257472	112.752088	2025-05-19 20:18:04.722652+07	2025-05-19 20:18:04.722652+07	\N	\N
b9b1ad6c-c41b-446a-b00e-f56684663c56	Jl. Keputih Tegal Timur II	-7.257472	112.752088	2025-05-19 20:18:43.649155+07	2025-05-19 20:18:43.649155+07	\N	\N
\.


--
-- TOC entry 5635 (class 0 OID 16896)
-- Dependencies: 241
-- Data for Name: alasan_cuti; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.alasan_cuti (id, nama, created_at, updated_at) FROM stdin;
S	Sakit	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
I	Izin	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
CT	Cuti Tahunan	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
CB	Cuti Besar	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
CM	Cuti Melahirkan	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
CU	Cuti Karena Alasan Penting	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
\.


--
-- TOC entry 5668 (class 0 OID 25985)
-- Dependencies: 274
-- Data for Name: ambulans; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.ambulans (no_ambulans, status, supir) FROM stdin;
AMB-003	accepted	Supri
AMB-010	accepted	Supri
AMB-004	pending	Supri
AMB-005	available	agus
1	accepted	supri
AMB-001	accepted	Sopir Uji
AMB-002	pending	Supri
\.


--
-- TOC entry 5653 (class 0 OID 17269)
-- Dependencies: 259
-- Data for Name: barang_medis; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.barang_medis (id, kode_barang, kandungan, id_industri, nama, id_satbesar, id_satuan, h_dasar, h_beli, h_ralan, h_kelas1, h_kelas2, h_kelas3, h_utama, h_vip, h_vvip, h_beliluar, h_jualbebas, h_karyawan, stok_minimum, id_jenis, isi, kapasitas, kadaluwarsa, id_kategori, id_golongan) FROM stdin;
\.


--
-- TOC entry 5646 (class 0 OID 17087)
-- Dependencies: 252
-- Data for Name: berkas_pegawai; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.berkas_pegawai (id_pegawai, nik, tempat_lahir, tanggal_lahir, agama, pendidikan, ktp, kk, npwp, bpjs, ijazah, skck, str, serkom, created_at, updated_at, deleted_at, updater) FROM stdin;
bd0b4833-510c-4c29-a3a4-e08e9a0a5955	3210112345678901	Jakarta	1995-01-01	Islam	S1	ktp_admin.pdf	kk_admin.pdf	npwp_admin.pdf	bpjs_admin.pdf	ijazah_admin.pdf	skck_admin.pdf	str_admin.pdf	serkom_admin.pdf	2025-05-19 22:27:04.917087+07	2025-05-19 22:27:04.917087+07	\N	bd0b4833-510c-4c29-a3a4-e08e9a0a5955
b9b1ad6c-c41b-446a-b00e-f56684663c56	3210223456789012	Bandung	1994-02-02	Kristen	S2	ktp_aziz.pdf	kk_aziz.pdf	npwp_aziz.pdf	bpjs_aziz.pdf	ijazah_aziz.pdf	skck_aziz.pdf	str_aziz.pdf	serkom_aziz.pdf	2025-05-19 22:27:04.917087+07	2025-05-19 22:27:04.917087+07	\N	b9b1ad6c-c41b-446a-b00e-f56684663c56
933568d5-982a-43c3-a4aa-3177bab10f07	3210334567890123	Surabaya	1993-03-03	Hindu	D3	ktp_eric.pdf	kk_eric.pdf	npwp_eric.pdf	bpjs_eric.pdf	ijazah_eric.pdf	skck_eric.pdf	str_eric.pdf	serkom_eric.pdf	2025-05-19 22:27:04.917087+07	2025-05-19 22:27:04.917087+07	\N	933568d5-982a-43c3-a4aa-3177bab10f07
\.


--
-- TOC entry 5687 (class 0 OID 50702)
-- Dependencies: 293
-- Data for Name: catatan_observasi_ranap; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.catatan_observasi_ranap (no_rawat, tgl_perawatan, jam_rawat, gcs, td, hr, rr, suhu, spo2, nip) FROM stdin;
20240501000001	2025-05-25	08:00:00	15-15-15	120/80	78	20	36.8	98	1234567890
20240501000002	2025-05-25	12:00:00	14-14-14	110/70	82	22	37.2	97	2234567890
20240501000003	2025-05-26	07:45:00	13-13-13	118/76	76	19	36.5	99	3234567890
20240501000004	2025-05-26	13:30:00	12-12-12	130/85	88	24	37.5	96	4234567890
20240501000005	2025-05-27	09:15:00	14-13-15	125/80	80	21	37.0	95	5234567890
202505284371	2025-05-31	16:49:27	1	2	3	4	5	6	1987123456
\.


--
-- TOC entry 5685 (class 0 OID 50694)
-- Dependencies: 291
-- Data for Name: catatan_observasi_ranap_kebidanan; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.catatan_observasi_ranap_kebidanan (no_rawat, tgl_perawatan, jam_rawat, gcs, td, hr, rr, suhu, spo2, kontraksi, bjj, ppv, vt, nip) FROM stdin;
20240501000001	2025-05-26	08:00:00	15-15-15	120/80	80	18	36.5	98	3x/10mnt	140	tidak ada	5cm	1234567890
20240501000002	2025-05-26	09:30:00	14-14-14	110/70	78	20	36.8	97	2x/10mnt	135	manual	4cm	1987654321
20240501000003	2025-05-26	10:45:00	13-13-13	130/85	85	22	37.1	99	4x/10mnt	150	ventilasi	6cm	2020011122
20240501000004	2025-05-26	11:15:00	15-14-13	115/75	76	19	36.7	96	2x/10mnt	138	tidak ada	3cm	6677889900
20240501000005	2025-05-26	12:00:00	14-13-15	118/76	82	21	37.0	95	1x/10mnt	132	manual	4.5cm	4455667788
202505284371	2025-05-31	17:26:19	1	2	3	4	5	6	7	8	9	10	1987123457
\.


--
-- TOC entry 5686 (class 0 OID 50699)
-- Dependencies: 292
-- Data for Name: catatan_observasi_ranap_postpartum; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.catatan_observasi_ranap_postpartum (no_rawat, tgl_perawatan, jam_rawat, gcs, td, hr, rr, suhu, spo2, tfu, kontraksi, perdarahan, keterangan, nip) FROM stdin;
20240501000011	2025-05-25	06:30:00	15-15-15	120/80	78	20	36.8	98	2j bawah pusat	baik	sedikit	Kondisi stabil	10000000001
20240501000012	2025-05-25	09:00:00	14-14-14	110/70	82	22	37.1	97	1j bawah pusat	sedang	normal	Tidak ada keluhan	10000000002
20240501000013	2025-05-26	11:15:00	13-13-13	118/76	76	19	36.5	99	setinggi pusat	lemah	banyak	Observasi ketat	10000000003
20240501000014	2025-05-26	15:00:00	12-12-12	130/85	88	24	37.5	96	3j bawah pusat	baik	normal	Perlu edukasi ASI	10000000004
20240501000015	2025-05-27	08:45:00	14-13-15	125/80	80	21	37.0	95	setinggi pusat	kuat	sedikit	Kontrol tekanan	10000000005
202505284371	2025-05-31	18:10:46	1	2	3	4	5	6	7	8	9	10	1987123456
\.


--
-- TOC entry 5651 (class 0 OID 17225)
-- Dependencies: 257
-- Data for Name: cuti; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.cuti (id, id_pegawai, tanggal_mulai, tanggal_selesai, id_alasan_cuti, status, created_at, updated_at, deleted_at, updater) FROM stdin;
cb38e8cb-cbbe-4708-b9fe-8fb2cb06d7b0	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	2025-05-16	2025-05-17	S	Ditolak	2025-05-15 23:07:43.915708+07	2025-06-01 17:25:17.032598+07	\N	bd0b4833-510c-4c29-a3a4-e08e9a0a5955
fda80261-207d-4afc-bc9f-e8cd0d49771e	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	2025-06-02	2025-06-03	CT	Diproses	2025-06-01 17:26:20.331472+07	2025-06-01 17:26:20.331472+07	\N	\N
\.


--
-- TOC entry 5661 (class 0 OID 17467)
-- Dependencies: 267
-- Data for Name: data_batch; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.data_batch (no_batch, no_faktur, id_barang_medis, tanggal_datang, kadaluwarsa, asal, h_dasar, h_beli, h_ralan, h_kelas1, h_kelas2, h_kelas3, h_utama, h_vip, h_vvip, h_beliluar, h_jualbebas, h_karyawan, jumlahbeli, sisa) FROM stdin;
\.


--
-- TOC entry 5676 (class 0 OID 34241)
-- Dependencies: 282
-- Data for Name: databarang; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.databarang (kode_brng, nama_brng, kode_satbesar, kode_sat, letak_barang, dasar, h_beli, ralan, kelas1, kelas2, kelas3, utama, vip, vvip, beliluar, jualbebas, karyawan, stokminimal, kdjns, isi, kapasitas, expire, status, kode_industri, kode_kategori, kode_golongan) FROM stdin;
2018001	AB-Vask 10mg (Otsus)	AMP5	AMP5		21259	21259	25511	25511	25511	25511	25511	25511	25511	40392	25511	25511	0	JB02	1	10	2020-02-27	1	-    	-   	-   
2018003	AB-Vask 10mg (APBK)	BKS 	AMP5		191871	191871	230246	230246	230246	230246	230246	230246	230246	364555	230246	230246	0	JB02	14	10	2024-12-27	1	I0005	K04 	G03 
A000000004	Alkohol 95% 20 liter OM	GLN 	GLN 		880000	880000	1056000	1056000	1056000	1056000	1056000	1056000	1056000	1672000	1056000	1056000	0	JB03	1	0	\N	1	-    	-   	-   
A000000025	Stomach Tube 18 fr (125 cm)	PCS 	PCS 		29000	29000	34800	34800	34800	34800	34800	34800	34800	55100	34800	34800	0	JB03	1	0	\N	1	-    	-   	-   
A000000001	Alkohol 70% 5 liter OM	GLN 	GLN 		132000	132000	158400	158400	158400	158400	158400	158400	158400	250800	158400	158400	0	JB03	1	0	\N	1	-    	-   	-   
A000000002	Alkohol 70% 1 Liter	BTL 	BTL 		63800	70000	84000	84000	84000	84000	84000	84000	84000	133000	84000	84000	0	JB03	1	0	\N	1	-    	-   	-   
A000000003	Alkohol 95% 5 liter OM	GLN 	GLN 		236500	236500	283800	283800	283800	283800	283800	283800	283800	449350	283800	283800	0	JB03	1	0	\N	1	-    	-   	-   
A000000005	Surflo IV Catheter 14 G Terumo 	PCS 	PCS 		29700	29700	35640	35640	35640	35640	35640	35640	35640	56430	35640	35640	0	JB03	1	0	\N	1	-    	-   	-   
A000000006	Surflo IV Catheter 16 G Terumo 	PCS 	PCS 		29700	29700	35640	35640	35640	35640	35640	35640	35640	56430	35640	35640	0	JB03	1	0	\N	1	-    	-   	-   
A000000007	Surflo IV Catheter 18 G Terumo 	PCS 	PCS 		29700	29700	35640	35640	35640	35640	35640	35640	35640	56430	35640	35640	0	JB03	1	0	\N	1	-    	-   	-   
A000000008	Surflo IV Catheter 20 G Terumo 	PCS 	PCS 		29700	29700	35640	35640	35640	35640	35640	35640	35640	56430	35640	35640	0	JB03	1	0	\N	1	-    	-   	-   
A000000009	Surflo IV Catheter 22 G Terumo 	PCS 	PCS 		29700	29700	35640	35640	35640	35640	35640	35640	35640	56430	35640	35640	0	JB03	1	0	\N	1	-    	-   	-   
A000000010	Surflo IV Catheter 24 G Terumo 	PCS 	PCS 		29700	29700	35640	35640	35640	35640	35640	35640	35640	56430	35640	35640	0	JB03	1	0	\N	1	-    	-   	-   
A000000011	Venflon Terumo 18 G (New)  	PCS 	PCS 		32120	32120	38544	38544	38544	38544	38544	38544	38544	61028	38544	38544	0	JB03	1	0	\N	1	-    	-   	-   
A000000012	Venflon Terumo 20 G (new)	PCS 	PCS 		30000	30000	36000	36000	36000	36000	36000	36000	36000	57000	36000	36000	0	JB03	1	0	\N	1	-    	-   	-   
A000000013	Surflo W Port IV Catheter 22 G Terumo 	PCS 	PCS 		29150	29150	34980	34980	34980	34980	34980	34980	34980	55385	34980	34980	0	JB03	1	0	\N	1	-    	-   	-   
A000000014	Venflon Terumo 24 G (New)	PCS 	PCS 		33000	33000	39600	39600	39600	39600	39600	39600	39600	62700	39600	39600	0	JB03	1	0	\N	1	-    	-   	-   
A000000015	Venflon Terumo 26 G (New)	PCS 	PCS 		42150	42150	50580	50580	50580	50580	50580	50580	50580	80085	50580	50580	0	JB03	1	0	\N	1	-    	-   	-   
A000000016	Surflo Blood FlashBack IV Cat 14 G	PCS 	PCS 		28710	28710	34452	34452	34452	34452	34452	34452	34452	54549	34452	34452	0	JB03	1	0	\N	1	-    	-   	-   
A000000017	Surflo Blood FlashBack IV Cat 16 G	PCS 	PCS 		28710	28710	34452	34452	34452	34452	34452	34452	34452	54549	34452	34452	0	JB03	1	0	\N	1	-    	-   	-   
A000000018	Surflo Blood FlashBack IV Cat 18 G	PCS 	PCS 		28710	28710	34452	34452	34452	34452	34452	34452	34452	54549	34452	34452	0	JB03	1	0	\N	1	-    	-   	-   
A000000019	Surflo Blood FlashBack IV Cat 20 G	PCS 	PCS 		28710	28710	34452	34452	34452	34452	34452	34452	34452	54549	34452	34452	0	JB03	1	0	\N	1	-    	-   	-   
A000000020	Surflo Blood FlashBack IV Cat 22 G	PCS 	PCS 		28710	28710	34452	34452	34452	34452	34452	34452	34452	54549	34452	34452	0	JB03	1	0	\N	1	-    	-   	-   
A000000021	Surflo Blood FlashBack IV Cat 24 G	PCS 	PCS 		28710	28710	34452	34452	34452	34452	34452	34452	34452	54549	34452	34452	0	JB03	1	0	\N	1	-    	-   	-   
A000000022	Stomach Tube 12 fr (125 cm)	PCS 	PCS 		22110	22110	26532	26532	26532	26532	26532	26532	26532	42009	26532	26532	0	JB03	1	0	\N	1	-    	-   	-   
A000000023	Stomach Tube 14 fr (125 cm)	PCS 	PCS 		22110	22110	26532	26532	26532	26532	26532	26532	26532	42009	26532	26532	0	JB03	1	0	\N	1	-    	-   	-   
A000000024	Stomach Tube 16 fr (125 cm)	PCS 	PCS 		22110	22110	26532	26532	26532	26532	26532	26532	26532	42009	26532	26532	0	JB03	1	0	\N	1	-    	-   	-   
A000000026	Feeding Tube 3,5 fr (35 cm)	PCS 	PCS 		18810	18810	22572	22572	22572	22572	22572	22572	22572	35739	22572	22572	0	JB03	1	0	\N	1	-    	-   	-   
A000000027	Feeding Tube 5 fr (40 cm)	PCS 	PCS 		18810	18810	22572	22572	22572	22572	22572	22572	22572	35739	22572	22572	0	JB03	1	0	\N	1	-    	-   	-   
A000000064	Needle 21 G	PCS 	PCS 		720	720	864	864	864	864	864	864	864	1368	864	864	0	JB03	1	0	\N	1	-    	-   	-   
A000000028	Feeding Tube 5 fr (100 cm)	PCS 	PCS 		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB03	1	0	\N	1	-    	-   	-   
A000000029	Feeding Tube 8 fr (40 cm)	PCS 	PCS 		18810	18810	22572	22572	22572	22572	22572	22572	22572	35739	22572	22572	0	JB03	1	0	\N	1	-    	-   	-   
A000000030	Feeding Tube 8 fr (100 cm)	PCS 	PCS 		18810	18810	22572	22572	22572	22572	22572	22572	22572	35739	22572	22572	0	JB03	1	0	\N	1	-    	-   	-   
A000000031	Extention Tube 150 cm (1.5 ml)	PCS 	PCS 		37290	37290	44748	44748	44748	44748	44748	44748	44748	70851	44748	44748	0	JB03	1	0	\N	1	-    	-   	-   
A000000032	Extention Tube 75 cm (2.5 cc)	PCS 	PCS 		13090	13090	15708	15708	15708	15708	15708	15708	15708	24871	15708	15708	0	JB03	1	0	\N	1	-    	-   	-   
A000000033	Guedel No : 40	PCS 	PCS 		31500	31500	37800	37800	37800	37800	37800	37800	37800	59850	37800	37800	0	JB03	1	0	\N	1	-    	-   	-   
A000000034	Guedel No : 50	PCS 	PCS 		31500	31500	37800	37800	37800	37800	37800	37800	37800	59850	37800	37800	0	JB03	1	0	\N	1	-    	-   	-   
A000000035	Guedel No : 60	PCS 	PCS 		31500	31500	37800	37800	37800	37800	37800	37800	37800	59850	37800	37800	0	JB03	1	0	\N	1	-    	-   	-   
A000000036	Guedel No : 70	PCS 	PCS 		31500	31500	37800	37800	37800	37800	37800	37800	37800	59850	37800	37800	0	JB03	1	0	\N	1	-    	-   	-   
A000000037	Guedel No : 80	PCS 	PCS 		31500	31500	37800	37800	37800	37800	37800	37800	37800	59850	37800	37800	0	JB03	1	0	\N	1	-    	-   	-   
A000000038	Guedel No : 90	PCS 	PCS 		31500	31500	37800	37800	37800	37800	37800	37800	37800	59850	37800	37800	0	JB03	1	0	\N	1	-    	-   	-   
A000000039	Guedel No : 100	PCS 	PCS 		31500	31500	37800	37800	37800	37800	37800	37800	37800	59850	37800	37800	0	JB03	1	0	\N	1	-    	-   	-   
A000000040	Guedel No : 110	PCS 	PCS 		31500	31500	37800	37800	37800	37800	37800	37800	37800	59850	37800	37800	0	JB03	1	0	\N	1	-    	-   	-   
A000000041	Aseptic Gel 5 lt	BTL 	BTL 		176000	176000	211200	211200	211200	211200	211200	211200	211200	334400	211200	211200	0	JB03	1	0	\N	1	-    	-   	-   
A000000042	Aseptic Gel 500 cc + Dispenser	BTL 	BTL 		26400	26400	31680	31680	31680	31680	31680	31680	31680	50160	31680	31680	0	JB03	1	0	\N	1	-    	-   	-   
A000000044	Gentian Violet 10 cc	PCS 	PCS 		1210	1210	1452	1452	1452	1452	1452	1452	1452	2299	1452	1452	0	JB03	1	0	\N	1	-    	-   	-   
A000000045	Povidone Yodine 1 lt	BTL 	BTL 		110000	110000	132000	132000	132000	132000	132000	132000	132000	209000	132000	132000	0	JB03	1	0	\N	1	-    	-   	-   
A000000046	Povidone Yodine 5 lt	GLN 	GLN 		242000	242000	290400	290400	290400	290400	290400	290400	290400	459800	290400	290400	0	JB03	1	0	\N	1	-    	-   	-   
A000000047	H2O2 35% 5 lt	GLN 	GLN 		71500	71500	85800	85800	85800	85800	85800	85800	85800	135850	85800	85800	0	JB03	1	0	\N	1	-    	-   	-   
A000000048	Sabun Cair Anti Bakteri 500 cc+ Dispenser	BTL 	BTL 		19250	19250	23100	23100	23100	23100	23100	23100	23100	36575	23100	23100	0	JB03	1	0	\N	1	-    	-   	-   
A000000049	Sabun Cair Anti Bakteri 5 lt	BTL 	BTL 		126500	126500	151800	151800	151800	151800	151800	151800	151800	240350	151800	151800	0	JB03	1	0	\N	1	-    	-   	-   
A000000050	One clean 1 lt	BTL 	BTL 		9900	9900	11880	11880	11880	11880	11880	11880	11880	18810	11880	11880	0	JB03	1	0	\N	1	-    	-   	-   
A000000051	Sikat Operasi Reusable	PCS 	PCS 		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB03	1	0	\N	1	-    	-   	-   
A000000052	Syringe Terumo 1 cc	PCS 	PCS 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB03	1	0	\N	1	-    	-   	-   
A000000054	Syringe Terumo 3 cc	PCS 	PCS 		3520	3520	4224	4224	4224	4224	4224	4224	4224	6688	4224	4224	0	JB03	1	0	\N	1	-    	-   	-   
A000000055	Syringe OM 3 cc	PCS 	PCS 		2000	2000	2400	2400	2400	2400	2400	2400	2400	3800	2400	2400	0	JB03	1	0	\N	1	-    	-   	-   
A000000056	Syringe Terumo 5 cc	PCS 	PCS 		4290	4290	5148	5148	5148	5148	5148	5148	5148	8151	5148	5148	0	JB03	1	0	\N	1	-    	-   	-   
A000000057	Syringe OM 5 cc	PCS 	PCS 		2000	2000	2400	2400	2400	2400	2400	2400	2400	3800	2400	2400	0	JB03	1	0	\N	1	-    	-   	-   
A000000058	Syringe Terumo 10 cc	PCS 	PCS 		5610	5610	6732	6732	6732	6732	6732	6732	6732	10659	6732	6732	0	JB03	1	0	\N	1	-    	-   	-   
A000000059	Syringe OM 10 cc	PCS 	PCS 		3500	3500	4200	4200	4200	4200	4200	4200	4200	6650	4200	4200	0	JB03	1	0	\N	1	-    	-   	-   
A000000060	Syringe Terumo 20 cc	PCS 	PCS 		8800	8800	10560	10560	10560	10560	10560	10560	10560	16720	10560	10560	0	JB03	1	0	\N	1	-    	-   	-   
A000000061	Syringe OM 20 cc	PCS 	PCS 		6500	6500	7800	7800	7800	7800	7800	7800	7800	12350	7800	7800	0	JB03	1	0	\N	1	-    	-   	-   
A000000062	Syringe OM 50 cc	PCS 	PCS 		12000	12000	14400	14400	14400	14400	14400	14400	14400	22800	14400	14400	0	JB03	1	0	\N	1	-    	-   	-   
A000000063	Syringe Enema Onemed	PCS 	PCS 		17050	17050	20460	20460	20460	20460	20460	20460	20460	32395	20460	20460	0	JB03	1	0	\N	1	-    	-   	-   
A000000065	Needle 23 G	PCS 	PCS 		720	720	864	864	864	864	864	864	864	1368	864	864	0	JB03	1	0	\N	1	-    	-   	-   
A000000066	Needle 25 G	PCS 	PCS 		720	720	864	864	864	864	864	864	864	1368	864	864	0	JB03	1	0	\N	1	-    	-   	-   
A000000067	Needle 27 G	PCS 	PCS 		720	720	864	864	864	864	864	864	864	1368	864	864	0	JB03	1	0	\N	1	-    	-   	-   
A000000068	Combo One set no 18	PCS 	PCS 		27500	27500	33000	33000	33000	33000	33000	33000	33000	52250	33000	33000	0	JB03	1	0	\N	1	-    	-   	-   
A000000069	Suction Catheter no. 8	PCS 	PCS 		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB03	1	0	\N	1	-    	-   	-   
A000000070	Transfusi Set Terumo	PCS 	PCS 		25410	25410	30492	30492	30492	30492	30492	30492	30492	48279	30492	30492	0	JB03	1	0	\N	1	-    	-   	-   
A000000071	Kapsul Kosong	PCS 	PCS 		2500	2500	3000	3000	3000	3000	3000	3000	3000	4750	3000	3000	0	JB03	1	0	\N	1	-    	-   	-   
A000000072	Suction Chateter	PCS 	PCS 		10500	10500	12600	12600	12600	12600	12600	12600	12600	19950	12600	12600	0	JB03	1	0	\N	1	-    	-   	-   
A000000073	Threeway Stop cock	PCS 	PCS 		10000	10000	12000	12000	12000	12000	12000	12000	12000	19000	12000	12000	0	JB03	1	0	\N	1	-    	-   	-   
A000000074	Tranfusion Set/ Blood set	PCS 	PCS 		38500	38500	46200	46200	46200	46200	46200	46200	46200	73150	46200	46200	0	JB03	1	0	\N	1	-    	-   	-   
A000000075	Dot Bayi	PCS 	PCS 		30000	30000	36000	36000	36000	36000	36000	36000	36000	57000	36000	36000	0	JB05	1	0	\N	1	-    	-   	-   
A000000076	ECG Elektrode	PCS 	PCS 		4500	4500	5400	5400	5400	5400	5400	5400	5400	8550	5400	5400	0	JB05	1	0	\N	1	-    	-   	-   
A000000077	El	PCS 	PCS 		36000	36000	43200	43200	43200	43200	43200	43200	43200	68400	43200	43200	0	JB05	1	0	\N	1	-    	-   	-   
A000000078	El	PCS 	PCS 		48000	48000	57600	57600	57600	57600	57600	57600	57600	91200	57600	57600	0	JB05	1	0	\N	1	-    	-   	-   
A000000079	El	PCS 	PCS 		29500	29500	35400	35400	35400	35400	35400	35400	35400	56050	35400	35400	0	JB05	1	0	\N	1	-    	-   	-   
A000000080	Endotracheal tube all size	PCS 	PCS 		45000	45000	54000	54000	54000	54000	54000	54000	54000	85500	54000	54000	0	JB03	1	0	\N	1	-    	-   	-   
A000000081	Enema Syringe	PCS 	PCS 		25500	25500	30600	30600	30600	30600	30600	30600	30600	48450	30600	30600	0	JB03	1	0	\N	1	-    	-   	-   
A000000085	Flashback I.V. Cannula no. 24	PCS 	PCS 		20000	20000	24000	24000	24000	24000	24000	24000	24000	38000	24000	24000	0	JB03	1	0	\N	1	-    	-   	-   
A000000087	Folley Cateter/Norta 2 Way No (10, 16,18)	PCS 	PCS 		15594	15594	18713	18713	18713	18713	18713	18713	18713	29629	18713	18713	0	JB03	1	0	\N	1	-    	-   	-   
A000000088	ID Band Bayi	PCS 	PCS 		2000	2000	2400	2400	2400	2400	2400	2400	2400	3800	2400	2400	0	JB03	1	0	\N	1	-    	-   	-   
A000000089	ID Band Dewasa	PCS 	PCS 		2500	2500	3000	3000	3000	3000	3000	3000	3000	4750	3000	3000	0	JB03	1	0	\N	1	-    	-   	-   
A000000090	Surflo 18 Terumo (New)	PCS 	PCS 		14500	14500	17400	17400	17400	17400	17400	17400	17400	27550	17400	17400	0	JB03	1	0	\N	1	-    	-   	-   
A000000091	Surflo 20 Terumo (New)	PCS 	PCS 		14500	14500	17400	17400	17400	17400	17400	17400	17400	27550	17400	17400	0	JB03	1	0	\N	1	-    	-   	-   
A000000092	Surflo 22 Terumo (New)	PCS 	PCS 		14500	14500	17400	17400	17400	17400	17400	17400	17400	27550	17400	17400	0	JB03	1	0	\N	1	-    	-   	-   
A000000093	Surflo 24 Terumo (New)	PCS 	PCS 		14500	14500	17400	17400	17400	17400	17400	17400	17400	27550	17400	17400	0	JB03	1	0	\N	1	-    	-   	-   
A000000094	Infusion Set Makro	PCS 	PCS 		12500	12500	15000	15000	15000	15000	15000	15000	15000	23750	15000	15000	0	JB03	1	0	\N	1	-    	-   	-   
A000000095	Infusion Set Mikro	PCS 	PCS 		30000	30000	36000	36000	36000	36000	36000	36000	36000	57000	36000	36000	0	JB03	1	0	\N	1	-    	-   	-   
A000000096	Jarum Spinocan no. 23	PCS 	PCS 		49000	49000	58800	58800	58800	58800	58800	58800	58800	93100	58800	58800	0	JB03	1	0	\N	1	-    	-   	-   
A000000097	Jarum Spinocan no. 25	PCS 	PCS 		49000	49000	58800	58800	58800	58800	58800	58800	58800	93100	58800	58800	0	JB03	1	0	\N	1	-    	-   	-   
A000000098	Jarum Spinocan no. 27	PCS 	PCS 		59500	59500	71400	71400	71400	71400	71400	71400	71400	113050	71400	71400	0	JB03	1	0	\N	1	-    	-   	-   
A000000099	Kapsul Kosong	PCS 	PCS 		1500	1500	1800	1800	1800	1800	1800	1800	1800	2850	1800	1800	0	JB03	1	0	\N	1	-    	-   	-   
A000000100	Kasa Steril 1 box	PCS 	PCS 		6000	6000	7200	7200	7200	7200	7200	7200	7200	11400	7200	7200	0	JB03	1	0	\N	1	-    	-   	-   
A000000101	Kondom Catheter	PCS 	PCS 		7500	7500	9000	9000	9000	9000	9000	9000	9000	14250	9000	9000	0	JB03	1	0	\N	1	-    	-   	-   
A000000102	Masker	PCS 	PCS 		1500	1500	1800	1800	1800	1800	1800	1800	1800	2850	1800	1800	0	JB03	1	0	\N	1	-    	-   	-   
A000000103	Maxiflow/ Masker Nebulizer (anak/ Dewasa)	PCS 	PCS 		35000	35000	42000	42000	42000	42000	42000	42000	42000	66500	42000	42000	0	JB03	1	0	\N	1	-    	-   	-   
A000000104	Nebulizer Mask (Sungkup oksigen) all size	PCS 	PCS 		30000	30000	36000	36000	36000	36000	36000	36000	36000	57000	36000	36000	0	JB03	1	0	\N	1	-    	-   	-   
A000000105	Oxygen Nasal Cannula dewasa	PCS 	PCS 		10500	10500	12600	12600	12600	12600	12600	12600	12600	19950	12600	12600	0	JB03	1	0	\N	1	-    	-   	-   
A000000106	Pampers New Born	PCS 	PCS 		5000	5000	6000	6000	6000	6000	6000	6000	6000	9500	6000	6000	0	JB03	1	0	\N	1	-    	-   	-   
A000000107	Sarung Tangan non Steril ( Sensi Gloves)	PCS 	PCS 		2500	2500	3000	3000	3000	3000	3000	3000	3000	4750	3000	3000	0	JB03	1	0	\N	1	-    	-   	-   
A000000108	Sarung Tangan Gamex all size	PCS 	PCS 		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB03	1	0	\N	1	-    	-   	-   
A000000109	Under Pad	PCS 	PCS 		10500	10500	12600	12600	12600	12600	12600	12600	12600	19950	12600	12600	0	JB03	1	0	\N	1	-    	-   	-   
A000000110	Urine Bag	PCS 	PCS 		8000	8000	9600	9600	9600	9600	9600	9600	9600	15200	9600	9600	0	JB03	1	0	\N	1	-    	-   	-   
A000000111	Wing Needle no. 19	PCS 	PCS 		3800	3800	4560	4560	4560	4560	4560	4560	4560	7220	4560	4560	0	JB03	1	0	\N	1	-    	-   	-   
A000000112	Wing Needle no. 23	PCS 	PCS 		3800	3800	4560	4560	4560	4560	4560	4560	4560	7220	4560	4560	0	JB03	1	0	\N	1	-    	-   	-   
A000000113	Wing Needle no. 25	PCS 	PCS 		3800	3800	4560	4560	4560	4560	4560	4560	4560	7220	4560	4560	0	JB03	1	0	\N	1	-    	-   	-   
A000000114	Wing Needle no. 27	PCS 	PCS 		3800	3800	4560	4560	4560	4560	4560	4560	4560	7220	4560	4560	0	JB03	1	0	\N	1	-    	-   	-   
A000000115	Umbilical Cord Klem	PCS 	PCS 		4000	4000	4800	4800	4800	4800	4800	4800	4800	7600	4800	4800	0	JB03	1	0	\N	1	-    	-   	-   
A000000116	Masker Oksigen Bayi	PCS 	PCS 		78000	78000	93600	93600	93600	93600	93600	93600	93600	148200	93600	93600	0	JB03	1	0	\N	1	-    	-   	-   
A000000117	Venflon Terumo 22 G (New)	PCS 	PCS 		32120	32120	38544	38544	38544	38544	38544	38544	38544	61028	38544	38544	0	JB03	1	0	\N	1	-    	-   	-   
A000000118	Soffband 3 inci(7.5cmx2.7m)	PCS 	PCS 		16356	16356	19627	19627	19627	19627	19627	19627	19627	31076	19627	19627	0	JB03	1	0	\N	1	-    	-   	-   
A000000119	Soffband 4 inci(10cmx2.7m)	PCS 	PCS 		20634	20634	24761	24761	24761	24761	24761	24761	24761	39205	24761	24761	0	JB03	1	0	\N	1	-    	-   	-   
A000000120	Softband 6 inci	PCS 	PCS 		29662	29662	35594	35594	35594	35594	35594	35594	35594	56358	35594	35594	0	JB03	1	0	\N	1	-    	-   	-   
A000000121	Elasticband/Tensocrepe 3 inci (7.5cmx4.55m)	PCS 	PCS 		57833	57833	69400	69400	69400	69400	69400	69400	69400	109883	69400	69400	0	JB03	1	0	\N	1	-    	-   	-   
A000000122	Elasticband/Tensocrepe 4 inci(10cmx4.55m)	PCS 	PCS 		69616	69616	83539	83539	83539	83539	83539	83539	83539	132270	83539	83539	0	JB03	1	0	\N	1	-    	-   	-   
A000000123	Elasticband/Tensocrepe 6 inc(15cmx4.55m)i	PCS 	PCS 		112500	112500	135000	135000	135000	135000	135000	135000	135000	213750	135000	135000	0	JB03	1	0	2017-02-14	1	-    	-   	-   
A000000124	Gypsona 4 inci (Kecil)	PCS 	PCS 		34667	34667	41600	41600	41600	41600	41600	41600	41600	65867	41600	41600	0	JB03	1	0	\N	1	-    	-   	-   
A000000125	Amiosin 500 mg inj	AMP5	AMP5		173800	173800	208560	208560	208560	208560	208560	208560	208560	330220	208560	208560	0	JB02	1	0	\N	1	-    	-   	-   
A000000483	Bactigras 10x10 cm	BOX 	BOX 		12705	12705	15246	15246	15246	15246	15246	15246	15246	24140	15246	15246	0	JB03	1	0	\N	1	-    	-   	-   
A000000780	PGA 4-0, TP 26 mm, 70 cm	SET 	SET 		82500	82500	99000	99000	99000	99000	99000	99000	99000	156750	99000	99000	0	JB03	1	0	\N	1	-    	-   	-   
A000000787	Hypafix (20 cm x 5 m)	PCS 	PCS 		202468	202468	242962	242962	242962	242962	242962	242962	242962	384689	242962	242962	0	JB03	1	0	\N	1	-    	-   	-   
A000000788	Hypafix (5 cm x 5 m)	PCS 	PCS 		58578	58578	70294	70294	70294	70294	70294	70294	70294	111298	70294	70294	0	JB03	1	0	\N	1	-    	-   	-   
A000000789	Hypafix (5 cm x 1 m)	PCS 	PCS 		12011	12011	14413	14413	14413	14413	14413	14413	14413	22821	14413	14413	0	JB03	1	0	\N	1	-    	-   	-   
A000000791	Easycare (Isi 4)	PCS 	PCS 		20350	20350	24420	24420	24420	24420	24420	24420	24420	38665	24420	24420	0	JB04	1	0	\N	1	-    	-   	-   
A000000792	Baju Operasi Disposible M	PCS 	PCS 		97130	97130	116556	116556	116556	116556	116556	116556	116556	184547	116556	116556	0	JB04	1	0	\N	1	-    	-   	-   
A000000793	Baju Operasi Disposible L	PCS 	PCS 		94710	94710	113652	113652	113652	113652	113652	113652	113652	179949	113652	113652	0	JB04	1	0	\N	1	-    	-   	-   
A000000794	Epidural Minipack syst 18G	PCS 	PCS 		209000	209000	250800	250800	250800	250800	250800	250800	250800	397100	250800	250800	0	JB04	1	0	\N	1	-    	-   	-   
A000000795	Nebulizer C-28 Amron	SET 	SET 		1400000	1400000	1680000	1680000	1680000	1680000	1680000	1680000	1680000	2660000	1680000	1680000	0	JB04	1	0	\N	1	-    	-   	-   
A000000796	Gol Darah Anti A & Anti B	SET 	SET 		330000	330000	396000	396000	396000	396000	396000	396000	396000	627000	396000	396000	0	JB04	1	0	\N	1	-    	-   	-   
A000000797	Kasa Lipat 7x7 cm	SET 	SET 		715	715	858	858	858	858	858	858	858	1358	858	858	0	JB03	1	0	\N	1	-    	-   	-   
A000000798	Pot Feaces	PCS 	PCS 		5000	5000	6000	6000	6000	6000	6000	6000	6000	9500	6000	6000	0	JB03	1	0	\N	1	-    	-   	-   
A000000799	Kasa Steril 16x16	BOX 	BOX 		11000	11000	13200	13200	13200	13200	13200	13200	13200	20900	13200	13200	0	JB03	1	0	\N	1	-    	-   	-   
A000000800	NGT no.5 Terumo	PCS 	PCS 		25000	25000	30000	30000	30000	30000	30000	30000	30000	47500	30000	30000	0	JB03	1	0	\N	1	-    	-   	-   
A000000801	Feeding Tube / NGT no.16 Terumo	PCS 	PCS 		36400	36400	43680	43680	43680	43680	43680	43680	43680	69160	43680	43680	0	JB03	1	0	\N	1	-    	-   	-   
A000000802	Specimen Container M	PCS 	PCS 		3520	3520	4224	4224	4224	4224	4224	4224	4224	6688	4224	4224	0	JB03	1	0	\N	1	-    	-   	-   
A000000803	Surgical Blades no. 11 BBraun	PCS 	PCS 		3300	3300	3960	3960	3960	3960	3960	3960	3960	6270	3960	3960	0	JB03	1	0	\N	1	-    	-   	-   
A000000804	Syringe Terumo 50 cc	PCS 	PCS 		39930	39930	47916	47916	47916	47916	47916	47916	47916	75867	47916	47916	0	JB03	1	0	\N	1	-    	-   	-   
A000000805	XXX	PCS 	PCS 		8000	8000	9600	9600	9600	9600	9600	9600	9600	15200	9600	9600	0	JB03	1	0	\N	1	-    	-   	-   
A000000807	Glycerin 1 lt	BTL 	BTL 		49500	49500	59400	59400	59400	59400	59400	59400	59400	94050	59400	59400	0	JB03	1	0	\N	1	-    	-   	-   
A000000808	Paha Polypropylene Mesh (Hernia Mesh)	PAC 	PAC 		180000	180000	216000	216000	216000	216000	216000	216000	216000	342000	216000	216000	0	JB03	1	0	\N	1	-    	-   	-   
B000000001	Paracetamol	-   	-   		17569	17569	21083	21083	21083	21083	21083	21083	21083	33381	21083	21083	0	J001	1	300	2017-01-20	1	-    	-   	-   
B000000002	Amoxili	S02 	S02 		12100	12100	14520	14520	14520	14520	14520	14520	14520	22990	14520	14520	0	J013	1	0	2017-02-20	1	I0001	-   	-   
B000000003	Abbocath	-   	-   		40040	57200	68640	68640	68640	68640	68640	68640	68640	108680	68640	68640	0	-   	1	0	2019-05-02	1	-    	-   	-   
B000000090	Osteonate OD Tablet	TAB 	TAB 		11220	11220	13464	13464	13464	13464	13464	13464	13464	21318	13464	13464	0	JB01	1	0	\N	1	-    	-   	-   
B000000091	Otolin Ear Drops	DRP 	DRP 		23650	23650	28380	28380	28380	28380	28380	28380	28380	44935	28380	28380	0	JB01	1	0	\N	1	-    	-   	-   
B000000092	Pepzol Injeksi	AMP5	AMP5		154000	154000	184800	184800	184800	184800	184800	184800	184800	292600	184800	184800	0	JB02	1	0	2018-05-31	1	-    	-   	-   
B000000093	Phyllocontin tab	TAB 	TAB 		2090	2090	2508	2508	2508	2508	2508	2508	2508	3971	2508	2508	0	JB01	1	0	\N	1	-    	-   	-   
B000000094	Phytomenadion tab	TAB 	TAB 		75	75	90	90	90	90	90	90	90	142	90	90	0	JB01	1	0	\N	1	-    	-   	-   
B000000095	Polygran 5 ml 	BTL 	BTL 		34788	34788	41746	41746	41746	41746	41746	41746	41746	66097	41746	41746	0	JB02	1	0	2019-04-30	1	-    	-   	-   
B000000096	Pletaal tab	TAB 	TAB 		8064	8064	9677	9677	9677	9677	9677	9677	9677	15322	9677	9677	0	JB01	1	0	\N	1	-    	-   	-   
B000000097	Pronalges Suppositoria	SUP 	SUP 		13090	13090	15708	15708	15708	15708	15708	15708	15708	24871	15708	15708	0	JB01	1	0	2020-10-31	1	-    	-   	-   
B000000098	Provital Tablet*	TAB 	TAB 		3025	3025	3630	3630	3630	3630	3630	3630	3630	5748	3630	3630	0	JB01	1	0	\N	1	-    	-   	-   
B000000099	Puresco 300 mg tab	TAB 	TAB 		3575	3575	4290	4290	4290	4290	4290	4290	4290	6792	4290	4290	0	JB01	1	0	\N	1	-    	-   	-   
B000000101	Renax 50 Kap	KAP 	KAP 		7150	7150	8580	8580	8580	8580	8580	8580	8580	13585	8580	8580	0	JB01	1	0	\N	1	-    	-   	-   
B000000102	Retaphyl SR tab	TAB 	TAB 		1948	1948	2338	2338	2338	2338	2338	2338	2338	3701	2338	2338	0	JB01	1	0	\N	1	-    	-   	-   
B000000103	Rhinatiol Kapsul	TAB 	TAB 		2310	2310	2772	2772	2772	2772	2772	2772	2772	4389	2772	2772	0	JB01	1	0	\N	1	-    	-   	-   
B000000104	Romicef Injeksi	AMP5	AMP5		275000	275000	330000	330000	330000	330000	330000	330000	330000	522500	330000	330000	0	JB02	1	0	\N	1	-    	-   	-   
B000000105	Ryzo Kap	KAP 	KAP 		3465	3465	4158	4158	4158	4158	4158	4158	4158	6584	4158	4158	0	JB01	1	0	\N	1	-    	-   	-   
B000000106	Stesolid syr	SYR 	SYR 		34100	34100	40920	40920	40920	40920	40920	40920	40920	64790	40920	40920	0	JB01	1	0	\N	1	-    	-   	-   
B000000107	Sanmol Infus	INF 	INF 		62260	62260	74712	74712	74712	74712	74712	74712	74712	118294	74712	74712	0	JB02	1	0	2018-05-31	1	-    	-   	-   
B000000108	Scopamin tab	TAB 	TAB 		1210	1210	1452	1452	1452	1452	1452	1452	1452	2299	1452	1452	0	JB01	1	0	\N	1	-    	-   	-   
B000000109	Simzen tab	TAB 	TAB 		2750	2750	3300	3300	3300	3300	3300	3300	3300	5225	3300	3300	0	JB01	1	0	\N	1	-    	-   	-   
B000000110	Sirplus tablet	TAB 	TAB 		181	181	217	217	217	217	217	217	217	344	217	217	0	JB01	1	0	2019-11-01	1	-    	-   	-   
B000000111	Susu Danstar 400 gr	BOX 	BOX 		33697	33697	40436	40436	40436	40436	40436	40436	40436	64024	40436	40436	0	J007	1	0	\N	1	-    	-   	-   
B000000112	Susu Enfamil A+ 400 gr Box	BOX 	BOX 		123400	123400	148080	148080	148080	148080	148080	148080	148080	234460	148080	148080	0	J007	1	0	2018-01-31	1	-    	-   	-   
B000000113	Susu Enfamil A+ HA 400 gr	BOX 	BOX 		119160	119160	142992	142992	142992	142992	142992	142992	142992	226404	142992	142992	0	J007	1	0	\N	1	-    	-   	-   
B000000114	Susu Enfamil A+ O-Lac 400 gr	BOX 	BOX 		124300	124300	149160	149160	149160	149160	149160	149160	149160	236170	149160	149160	0	J007	1	0	\N	1	-    	-   	-   
B000000115	Susu Enfamil A+ PF 400 gr Premature Kaleng	KAL 	KAL 		155040	155040	186048	186048	186048	186048	186048	186048	186048	294576	186048	186048	0	J007	1	0	\N	1	-    	-   	-   
B000000117	Susu Enfamil Gentle Care Kaleng	BOX 	BOX 		137720	137720	165264	165264	165264	165264	165264	165264	165264	261668	165264	165264	0	J007	1	0	\N	1	-    	-   	-   
B000000118	Susu Pregistimil	BOX 	BOX 		246691	246691	296029	296029	296029	296029	296029	296029	296029	468713	296029	296029	0	J007	1	0	\N	1	-    	-   	-   
B000000119	Susu Enfamil-Nutramigen 400 gr	BOX 	BOX 		216240	216240	259488	259488	259488	259488	259488	259488	259488	410856	259488	259488	0	J007	1	0	\N	1	-    	-   	-   
B000000120	Tapros Injeksi 3,75 mg	AMP5	AMP5		1566428.6	1566428.6	1879714	1879714	1879714	1879714	1879714	1879714	1879714	2976214	1879714	1879714	0	JB02	1	0	\N	1	-    	-   	-   
B000000121	Taxegram 1 gr Injeksi	AMP5	AMP5		145695	145695	174834	174834	174834	174834	174834	174834	174834	276820	174834	174834	0	JB02	1	0	\N	1	-    	-   	-   
B000000122	Tensilo Injeksi	AMP5	AMP5		176000	176000	211200	211200	211200	211200	211200	211200	211200	334400	211200	211200	0	JB02	1	0	\N	1	-    	-   	-   
B000000123	Thrombogel 10 gram	GEL 	GEL 		34650	34650	41580	41580	41580	41580	41580	41580	41580	65835	41580	41580	0	JB02	1	0	\N	1	-    	-   	-   
B000000125	Tineuron Tablet	KAP 	KAP 		9350	9350	11220	11220	11220	11220	11220	11220	11220	17765	11220	11220	0	JB01	1	0	\N	1	-    	-   	-   
B000000126	Tonicard Tablet*	KAP 	KAP 		165000	165000	198000	198000	198000	198000	198000	198000	198000	313500	198000	198000	0	JB01	1	0	2019-10-31	1	-    	-   	-   
B000000127	Tremenza Tablet	TAB 	TAB 		1155	1155	1386	1386	1386	1386	1386	1386	1386	2194	1386	1386	0	JB01	1	0	\N	1	-    	-   	-   
B000000128	Triamcort tab	TAB 	TAB 		3025	3025	3630	3630	3630	3630	3630	3630	3630	5748	3630	3630	0	JB01	1	0	\N	1	-    	-   	-   
B000000129	Tripenem Injeksi	AMP5	AMP5		484000	484000	580800	580800	580800	580800	580800	580800	580800	919600	580800	580800	0	JB02	1	0	\N	1	-    	-   	-   
B000000130	Vectrine 300 mg Kapsul	TAB 	TAB 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	2020-07-31	1	-    	-   	-   
B000000131	Vioquin 500 mg Tablet	TAB 	TAB 		13750	13750	16500	16500	16500	16500	16500	16500	16500	26125	16500	16500	0	JB01	1	0	\N	1	-    	-   	-   
B000000132	Vit A 6000 IU tab	TAB 	TAB 		207	207	248	248	248	248	248	248	248	393	248	248	0	JB01	1	0	\N	1	-    	-   	-   
B000000133	Vit B12 59 mcg tab	TAB 	TAB 		13	13	16	16	16	16	16	16	16	25	16	16	0	JB01	1	0	\N	1	-    	-   	-   
B000000134	Vit B complex	TAB 	TAB 		22	22	26	26	26	26	26	26	26	42	26	26	0	JB01	1	0	\N	1	-    	-   	-   
B000000135	Vit C 50 mg tab	TAB 	TAB 		31	31	37	37	37	37	37	37	37	59	37	37	0	JB01	1	0	\N	1	-    	-   	-   
B000000136	Vometa drop 5 mg	DRP 	DRP 		43450	43450	52140	52140	52140	52140	52140	52140	52140	82555	52140	52140	0	JB01	1	0	2019-09-30	1	-    	-   	-   
B000000137	Vometa 60 ml Sirup	SYR 	SYR 		43450	43450	52140	52140	52140	52140	52140	52140	52140	82555	52140	52140	0	JB01	1	0	\N	1	-    	-   	-   
B000000138	Vometron 4 mg inj	AMP5	AMP5		27500	27500	33000	33000	33000	33000	33000	33000	33000	52250	33000	33000	0	JB02	1	0	\N	1	-    	-   	-   
B000000139	Zegren 50 mg Tablet	TAB 	TAB 		1100	1100	1320	1320	1320	1320	1320	1320	1320	2090	1320	1320	0	JB01	1	0	\N	1	-    	-   	-   
B000000140	Zibramax 500 mg tab inj	TAB 	TAB 		31900	31900	38280	38280	38280	38280	38280	38280	38280	60610	38280	38280	0	JB01	1	0	\N	1	-    	-   	-   
B000000141	Scabimite 10 gram cream	CRM 	CRM 		41250	41250	49500	49500	49500	49500	49500	49500	49500	78375	49500	49500	0	JB02	1	0	2021-11-30	1	-    	-   	-   
B000000142	Scabimite 30 gram cream	CRM 	CRM 		77550	77550	93060	93060	93060	93060	93060	93060	93060	147345	93060	93060	0	JB02	1	0	2021-11-04	1	-    	-   	-   
B000000143	Dilantin 250 mg/ 5 ml Inj	AMP5	AMP5		34081	34081	40897	40897	40897	40897	40897	40897	40897	64754	40897	40897	0	JB02	1	0	\N	1	-    	-   	-   
B000000144	Ped	SYR 	SYR 		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB01	1	0	\N	1	-    	-   	-   
B000000145	Pediagrow Sirup	SYR 	SYR 		46200	46200	55440	55440	55440	55440	55440	55440	55440	87780	55440	55440	0	JB01	1	0	\N	1	-    	-   	-   
B000000146	Biocef Injeksi	AMP5	AMP5		137500	137500	165000	165000	165000	165000	165000	165000	165000	261250	165000	165000	0	JB02	1	0	\N	1	-    	-   	-   
B000000147	Ardium HD tab	TAB 	TAB 		7738	7738	9286	9286	9286	9286	9286	9286	9286	14702	9286	9286	0	JB01	1	0	2020-09-30	1	-    	-   	-   
B000000148	Zidifec Injeksi	AMP5	AMP5		265980	265980	319176	319176	319176	319176	319176	319176	319176	505362	319176	319176	0	JB02	1	0	\N	1	-    	-   	-   
B000000149	Nospirinal tab	TAB 	TAB 		495	495	594	594	594	594	594	594	594	940	594	594	0	JB01	1	0	\N	1	-    	-   	-   
B000000150	Q10 Plus Kapsul*	TAB 	TAB 		16368	16368	19642	19642	19642	19642	19642	19642	19642	31099	19642	19642	0	JB01	1	0	2020-02-29	1	-    	-   	-   
B000000151	Hepa Q kap*	KAP 	KAP 		4950	4950	5940	5940	5940	5940	5940	5940	5940	9405	5940	5940	0	JB01	1	0	\N	1	-    	-   	-   
B000000152	Flagyl Forte tab	TAB 	TAB 		5982	5982	7178	7178	7178	7178	7178	7178	7178	11366	7178	7178	0	JB01	1	0	\N	1	-    	-   	-   
B000000153	Flagyl Suppositoria	SUP 	SUP 		12282	12282	14738	14738	14738	14738	14738	14738	14738	23336	14738	14738	0	JB01	1	0	\N	1	-    	-   	-   
B000000154	Lotasbat cream	CRM 	CRM 		35640	35640	42768	42768	42768	42768	42768	42768	42768	67716	42768	42768	0	JB02	1	0	\N	1	-    	-   	-   
B000000155	Trizedon MR tab	TAB 	TAB 		3593	3593	4312	4312	4312	4312	4312	4312	4312	6827	4312	4312	0	JB01	1	0	\N	1	-    	-   	-   
B000000156	Alovell 10 mg tab	TAB 	TAB 		10000	10000	12000	12000	12000	12000	12000	12000	12000	19000	12000	12000	0	JB01	1	0	\N	1	-    	-   	-   
B000000157	Alovell 70 mg Tablet	TAB 	TAB 		100650	100650	120780	120780	120780	120780	120780	120780	120780	191235	120780	120780	0	JB01	1	0	\N	1	-    	-   	-   
B000000158	Aminophylline 200 mg tab	TAB 	TAB 		120	120	144	144	144	144	144	144	144	228	144	144	0	JB01	1	0	\N	1	-    	-   	-   
B000000159	Analtram Tablet	TAB 	TAB 		10989	10989	13187	13187	13187	13187	13187	13187	13187	20879	13187	13187	0	JB01	1	0	2020-10-01	1	-    	-   	-   
B000000160	Biocombin inj	AMP5	AMP5		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB02	1	0	\N	1	-    	-   	-   
B000000161	Bisoprolol 5 mg Tablet	TAB 	TAB 		2554	2554	3065	3065	3065	3065	3065	3065	3065	4853	3065	3065	0	JB01	1	0	\N	1	-    	-   	-   
B000000162	Coloma Plus tab	TAB 	TAB 		1613	1613	1936	1936	1936	1936	1936	1936	1936	3065	1936	1936	0	JB01	1	0	\N	1	-    	-   	-   
B000000163	Cefat Sirup 125 mg	SYR 	SYR 		43670	43670	52404	52404	52404	52404	52404	52404	52404	82973	52404	52404	0	JB01	1	0	2019-09-30	1	-    	-   	-   
B000000164	Cholestate 10 mg tab	TAB 	TAB 		3850	3850	4620	4620	4620	4620	4620	4620	4620	7315	4620	4620	0	JB01	1	0	\N	1	-    	-   	-   
B000000165	Chloramfecort 10 g cream	CRM 	CRM 		14774	14774	17729	17729	17729	17729	17729	17729	17729	28071	17729	17729	0	JB02	1	0	\N	1	-    	-   	-   
B000000166	Combivent 2,5 ml UDV	AMP5	AMP5		14968	14968	17962	17962	17962	17962	17962	17962	17962	28439	17962	17962	0	JB02	1	0	\N	1	-    	-   	-   
B000000167	CTM tab	TAB 	TAB 		175	175	210	210	210	210	210	210	210	332	210	210	0	JB01	1	4	\N	1	-    	-   	-   
B000000168	Detrusitol 2 mg tab	TAB 	TAB 		9777	9777	11732	11732	11732	11732	11732	11732	11732	18576	11732	11732	0	JB01	1	0	\N	1	-    	-   	-   
B000000169	Engerix B 0,5 ml Vaksin Bayi	AMP5	AMP5		67100	67100	80520	80520	80520	80520	80520	80520	80520	127490	80520	80520	0	JB02	1	0	2018-10-31	1	-    	-   	-   
B000000170	Epocaldi tab*	TAB 	TAB 		3410	3410	4092	4092	4092	4092	4092	4092	4092	6479	4092	4092	0	JB01	1	0	\N	1	-    	-   	-   
B000000171	Furosemid tab	TAB 	TAB 		125	125	150	150	150	150	150	150	150	238	150	150	0	JB01	1	0	\N	1	-    	-   	-   
B000000172	Hydrocortison Cream GNR	CRM 	CRM 		3206	3206	3847	3847	3847	3847	3847	3847	3847	6091	3847	3847	0	JB02	1	0	2020-08-01	1	-    	-   	-   
B000000173	I	SYR 	SYR 		30250	30250	36300	36300	36300	36300	36300	36300	36300	57475	36300	36300	0	JB01	1	0	\N	1	-    	-   	-   
B000000174	INH 100 mg tab	TAB 	TAB 		154	154	185	185	185	185	185	185	185	293	185	185	0	JB01	1	0	\N	1	-    	-   	-   
B000000175	Listerine 80 ml	BTL 	BTL 		7600	7600	9120	9120	9120	9120	9120	9120	9120	14440	9120	9120	0	JB02	1	0	\N	1	-    	-   	-   
B000000177	Susu Diabetasol Vita Digest Van 180	BOX 	BOX 		37943	37943	45532	45532	45532	45532	45532	45532	45532	72092	45532	45532	0	J007	1	0	\N	1	-    	-   	-   
B000000178	Kalitake Sachet	SAC 	SAC 		17325	17325	20790	20790	20790	20790	20790	20790	20790	32918	20790	20790	0	JB01	1	0	\N	1	-    	-   	-   
B000000179	Methyl Prednisolon Injeksi	AMP5	AMP5		39023	39023	46828	46828	46828	46828	46828	46828	46828	74144	46828	46828	0	JB02	1	0	2018-07-31	1	-    	-   	-   
B000000180	Ostobone Sach	SAC 	SAC 		4950	4950	5940	5940	5940	5940	5940	5940	5940	9405	5940	5940	0	JB01	1	0	\N	1	-    	-   	-   
B000000181	Pehacain Injeksi	AMP5	AMP5		3111	3111	3733	3733	3733	3733	3733	3733	3733	5911	3733	3733	0	JB02	1	0	\N	1	-    	-   	-   
B000000182	Prednison tab	TAB 	TAB 		182	182	218	218	218	218	218	218	218	346	218	218	0	JB01	1	0	2019-10-31	1	-    	-   	-   
B000000183	Progistimin inj	TAB 	TAB 		15400	15400	18480	18480	18480	18480	18480	18480	18480	29260	18480	18480	0	JB01	1	0	\N	1	-    	-   	-   
B000000184	Rizonax 50 mg tab	TAB 	TAB 		3630	3630	4356	4356	4356	4356	4356	4356	4356	6897	4356	4356	0	JB01	1	0	\N	1	-    	-   	-   
B000000185	Sangobion Kapsul*	TAB 	TAB 		998	998	1198	1198	1198	1198	1198	1198	1198	1896	1198	1198	0	JB01	1	0	\N	1	-    	-   	-   
B000000186	Teosal Tab	TAB 	TAB 		209	209	251	251	251	251	251	251	251	397	251	251	0	JB01	1	0	\N	1	-    	-   	-   
B000000187	Tismalin tab	TAB 	TAB 		1100	1100	1320	1320	1320	1320	1320	1320	1320	2090	1320	1320	0	JB01	1	0	\N	1	-    	-   	-   
B000000188	Tramadol Injeksi	AMP5	AMP5		6914	6914	8297	8297	8297	8297	8297	8297	8297	13137	8297	8297	0	JB02	1	0	\N	1	-    	-   	-   
B000000189	XX	TAB 	TAB 		1650	1650	1980	1980	1980	1980	1980	1980	1980	3135	1980	1980	0	JB01	1	0	\N	1	-    	-   	-   
B000000190	Vomceran 4 mg inj	AMP5	AMP5		31900	31900	38280	38280	38280	38280	38280	38280	38280	60610	38280	38280	0	JB02	1	0	\N	1	-    	-   	-   
B000000191	Vometa Tablet	TAB 	TAB 		3960	3960	4752	4752	4752	4752	4752	4752	4752	7524	4752	4752	0	JB01	1	0	2019-09-30	1	-    	-   	-   
B000000192	Glutrop Tab*	TAB 	TAB 		17050	17050	20460	20460	20460	20460	20460	20460	20460	32395	20460	20460	0	JB01	1	0	2019-11-30	1	-    	-   	-   
B000000193	Betadine salep	SAL 	SAL 		12980	12980	15576	15576	15576	15576	15576	15576	15576	24662	15576	15576	0	JB02	1	0	\N	1	-    	-   	-   
B000000194	Tribestan tab	TAB 	TAB 		11660	11660	13992	13992	13992	13992	13992	13992	13992	22154	13992	13992	0	JB01	1	0	\N	1	-    	-   	-   
B000000195	Cendo Asthenof MiniDose	MIN 	MIN 		22550	22550	27060	27060	27060	27060	27060	27060	27060	42845	27060	27060	0	J008	1	0	2019-11-30	1	-    	-   	-   
B000000196	Fetavita Kapsul*	CAP 	CAP 		7920	7920	9504	9504	9504	9504	9504	9504	9504	15048	9504	9504	0	JB01	1	0	2018-10-01	1	-    	-   	-   
B000000197	Daxet Tab	TAB 	TAB 		10450	10450	12540	12540	12540	12540	12540	12540	12540	19855	12540	12540	0	JB01	1	0	\N	1	-    	-   	-   
B000000198	Pumpitor Injeksi	TAB 	TAB 		153120	153120	183744	183744	183744	183744	183744	183744	183744	290928	183744	183744	0	JB01	1	0	2018-07-01	1	-    	-   	-   
B000000199	xxx	CRM 	CRM 		16973	16973	20368	20368	20368	20368	20368	20368	20368	32249	20368	20368	0	JB02	1	0	\N	1	-    	-   	-   
B000000200	Ottopan syr	SYR 	SYR 		12100	12100	14520	14520	14520	14520	14520	14520	14520	22990	14520	14520	0	JB01	1	0	\N	1	-    	-   	-   
B000000201	Flamar 50 mg tab	TAB 	TAB 		1815	1815	2178	2178	2178	2178	2178	2178	2178	3448	2178	2178	0	JB01	1	0	\N	1	-    	-   	-   
B000000202	Tonar	KAP 	KAP 		6490	6490	7788	7788	7788	7788	7788	7788	7788	12331	7788	7788	0	JB01	1	0	\N	1	-    	-   	-   
B000000203	Trolip 100 mg cap	CAP 	CAP 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	2019-04-01	1	-    	-   	-   
B000000204	Lanadexon tab	TAB 	TAB 		116	116	139	139	139	139	139	139	139	220	139	139	0	JB01	1	0	\N	1	-    	-   	-   
B000000205	Natto-10 Tablet*	TAB 	TAB 		8800	8800	10560	10560	10560	10560	10560	10560	10560	16720	10560	10560	0	JB01	1	0	2019-09-01	1	-    	-   	-   
B000000206	xxx	SYR 	SYR 		34001	34001	40801	40801	40801	40801	40801	40801	40801	64602	40801	40801	0	JB01	1	0	\N	1	-    	-   	-   
B000000207	Elkana Sirup*	SYR 	SYR 		21835	21835	26202	26202	26202	26202	26202	26202	26202	41486	26202	26202	3	JB01	1	0	2018-04-30	1	-    	-   	-   
B000000208	xxx	SYR 	SYR 		18700	18700	22440	22440	22440	22440	22440	22440	22440	35530	22440	22440	0	JB01	1	0	\N	1	-    	-   	-   
B000000209	Mucopect Drop	DRP 	DRP 		64287	64287	77144	77144	77144	77144	77144	77144	77144	122145	77144	77144	0	JB01	1	0	\N	1	-    	-   	-   
B000000210	Dulcolax 5 mg Supp	DRP 	DRP 		14337	14337	17204	17204	17204	17204	17204	17204	17204	27240	17204	17204	0	JB01	1	0	\N	1	-    	-   	-   
B000000211	Pantozol 40 mg Injeksi	AMP5	AMP5		168190	168190	201828	201828	201828	201828	201828	201828	201828	319561	201828	201828	0	JB01	1	0	\N	1	-    	-   	-   
B000000212	Merislon 6 mg Tablet	TAB 	TAB 		4639	4639	5567	5567	5567	5567	5567	5567	5567	8814	5567	5567	0	JB01	1	0	2019-10-31	1	-    	-   	-   
B000000213	Merislon 12 mg Tablet	TAB 	TAB 		6677	6677	8012	8012	8012	8012	8012	8012	8012	12686	8012	8012	0	JB01	1	0	\N	1	-    	-   	-   
B000000214	Entrocare	TAB 	TAB 		9350	9350	11220	11220	11220	11220	11220	11220	11220	17765	11220	11220	0	JB01	1	0	\N	1	-    	-   	-   
B000000215	Xantia Kapsul*	CAP 	CAP 		7700	7700	9240	9240	9240	9240	9240	9240	9240	14630	9240	9240	0	JB01	1	0	2017-07-01	1	-    	-   	-   
B000000216	Betadine  Obat Kumur 100 ml*	BTL 	BTL 		10450	10450	12540	12540	12540	12540	12540	12540	12540	19855	12540	12540	0	JB02	1	0	2019-06-30	1	-    	-   	-   
B000000217	Betadin Obat Kumur 190 ml*	BTL 	BTL 		14850	14850	17820	17820	17820	17820	17820	17820	17820	28215	17820	17820	0	JB02	1	0	\N	1	-    	-   	-   
B000000218	Clindamycin 150 mg tab	TAB 	TAB 		797	797	956	956	956	956	956	956	956	1514	956	956	0	JB01	1	0	2020-12-31	1	-    	-   	-   
B000000219	Griseofulvin 125 mg tab	TAB 	TAB 		240	240	288	288	288	288	288	288	288	456	288	288	0	JB01	1	0	\N	1	-    	-   	-   
B000000220	Decadryl syr	SYR 	SYR 		10577	10577	12692	12692	12692	12692	12692	12692	12692	20096	12692	12692	0	JB01	1	0	\N	1	-    	-   	-   
B000000221	Ofloxacin 200 mg tab	TAB 	TAB 		590	590	708	708	708	708	708	708	708	1121	708	708	0	JB01	1	0	\N	1	-    	-   	-   
B000000222	Ondansetron 4 mg Tablet	TAB 	TAB 		1767	1767	2120	2120	2120	2120	2120	2120	2120	3357	2120	2120	0	JB01	1	0	2018-10-31	1	-    	-   	-   
B000000223	Propanolol 10 mg tab	TAB 	TAB 		85	85	102	102	102	102	102	102	102	162	102	102	0	JB01	1	0	\N	1	-    	-   	-   
B000000224	Vip Albumin Kapsul*	TAB 	TAB 		7700	7700	9240	9240	9240	9240	9240	9240	9240	14630	9240	9240	0	JB01	1	0	2018-12-31	1	-    	-   	-   
B000000225	Trichodazol 500 mg Tablet	TAB 	TAB 		1694	1694	2033	2033	2033	2033	2033	2033	2033	3219	2033	2033	0	JB01	1	0	2018-12-01	1	-    	-   	-   
B000000226	Dansera Tablet*	TAB 	TAB 		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB01	1	0	\N	1	-    	-   	-   
B000000227	Susu Entrasol Gold Vanila 185 g	BOX 	BOX 		30030	30030	36036	36036	36036	36036	36036	36036	36036	57057	36036	36036	0	J007	1	0	2018-05-17	1	-    	-   	-   
B000000228	Lacidofil Kapsul	CAP 	CAP 		4235	4235	5082	5082	5082	5082	5082	5082	5082	8046	5082	5082	0	JB01	1	0	\N	1	-    	-   	-   
B000000229	Narfoz 8 mg	TAB 	TAB 		27500	27500	33000	33000	33000	33000	33000	33000	33000	52250	33000	33000	0	JB01	1	0	\N	1	-    	-   	-   
B000000230	Metilat tab	TAB 	TAB 		2200	2200	2640	2640	2640	2640	2640	2640	2640	4180	2640	2640	0	JB01	1	0	\N	1	-    	-   	-   
B000000231	Inbion tab	TAB 	TAB 		1210	1210	1452	1452	1452	1452	1452	1452	1452	2299	1452	1452	0	JB01	1	0	\N	1	-    	-   	-   
B000000232	Silax inj	AMP5	AMP5		8250	8250	9900	9900	9900	9900	9900	9900	9900	15675	9900	9900	0	JB02	1	0	\N	1	-    	-   	-   
B000000233	Letonal 25 mg Tablet	TAB 	TAB 		1650	1650	1980	1980	1980	1980	1980	1980	1980	3135	1980	1980	0	JB01	1	0	2017-12-01	1	-    	-   	-   
B000000234	Mirena inj	AMP5	AMP5		2541000	2541000	3049200	3049200	3049200	3049200	3049200	3049200	3049200	4827900	3049200	3049200	0	JB02	1	0	2018-10-31	1	-    	-   	-   
B000000235	Biosan Tablet*	TAB 	TAB 		15400	15400	18480	18480	18480	18480	18480	18480	18480	29260	18480	18480	0	JB01	1	0	2022-04-01	1	-    	-   	-   
B000000236	Phaminov inj	VL  	VL  		17050	17050	20460	20460	20460	20460	20460	20460	20460	32395	20460	20460	0	JB02	1	0	\N	1	-    	-   	-   
B000000237	Novel Smooting Cream	CRM 	CRM 		242000	242000	290400	290400	290400	290400	290400	290400	290400	459800	290400	290400	0	JB02	1	0	\N	1	-    	-   	-   
B000000238	Flamicort 40 mg/ml inj	AMP5	AMP5		104500	104500	125400	125400	125400	125400	125400	125400	125400	198550	125400	125400	0	JB02	1	0	2020-06-30	1	-    	-   	-   
B000000239	Simprofen Tablet	TAB 	TAB 		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB01	1	0	\N	1	-    	-   	-   
B000000240	Sanmag Sirup	SYR 	SYR 		24860	24860	29832	29832	29832	29832	29832	29832	29832	47234	29832	29832	0	JB01	1	0	\N	1	-    	-   	-   
B000000241	Moxic 7,5 mg Tab	TAB 	TAB 		4950	4950	5940	5940	5940	5940	5940	5940	5940	9405	5940	5940	0	JB01	1	0	\N	1	-    	-   	-   
B000000242	Rocer Injeksi	AMP5	AMP5		137500	137500	165000	165000	165000	165000	165000	165000	165000	261250	165000	165000	0	JB02	1	0	\N	1	-    	-   	-   
B000000243	ONDANSETRON 8 INJ	AMP5	AMP5		9680	9680	11616	11616	11616	11616	11616	11616	11616	18392	11616	11616	0	JB02	1	0	\N	1	-    	-   	-   
B000000244	xxx	AMP5	AMP5		50000	50000	60000	60000	60000	60000	60000	60000	60000	95000	60000	60000	0	JB02	1	0	\N	1	-    	-   	-   
B000000245	Aqua for Irigasi 1 L Otsuka (new)	BTL 	BTL 		19800	19800	23760	23760	23760	23760	23760	23760	23760	37620	23760	23760	0	JB02	1	0	\N	1	-    	-   	-   
B000000246	Becom-C Kaplet*	KAP 	KAP 		1760	1760	2112	2112	2112	2112	2112	2112	2112	3344	2112	2112	0	JB01	1	0	\N	1	-    	-   	-   
B000000247	Neuciti 250 mg/ 2 ml inj	AMP5	AMP5		31900	31900	38280	38280	38280	38280	38280	38280	38280	60610	38280	38280	0	JB02	1	0	\N	1	-    	-   	-   
B000000248	Infus Ka En 3 B 	INF 	INF 		20350	20350	24420	24420	24420	24420	24420	24420	24420	38665	24420	24420	0	JB02	1	0	\N	1	-    	-   	-   
B000000249	NaCL 0,9% infus	INF 	INF 		5390	5390	6468	6468	6468	6468	6468	6468	6468	10241	6468	6468	0	JB02	1	0	\N	1	-    	-   	-   
B000000250	Neurosanbe Plus Tablet	CAP 	CAP 		1045	1045	1254	1254	1254	1254	1254	1254	1254	1986	1254	1254	0	JB01	1	0	\N	1	-    	-   	-   
B000000251	Formuno Kap*	KAP 	KAP 		6105	6105	7326	7326	7326	7326	7326	7326	7326	11600	7326	7326	0	JB01	1	0	\N	1	-    	-   	-   
B000000252	Neurobion 5000 Injeksi*	AMP5	AMP5		9322.5	9322.5	11187	11187	11187	11187	11187	11187	11187	17713	11187	11187	0	JB02	1	0	\N	1	-    	-   	-   
B000000253	Imunos Tablet*	CAP 	CAP 		7150	7150	8580	8580	8580	8580	8580	8580	8580	13585	8580	8580	0	JB01	1	0	2019-12-01	1	-    	-   	-   
B000000254	Tricker inj	AMP5	AMP5		19800	19800	23760	23760	23760	23760	23760	23760	23760	37620	23760	23760	0	JB02	1	0	\N	1	-    	-   	-   
B000000255	Tutofusin Ops infus	INF 	INF 		51700	51700	62040	62040	62040	62040	62040	62040	62040	98230	62040	62040	0	JB02	1	0	\N	1	-    	-   	-   
B000000256	Obdhamin Cap	CAP 	CAP 		2750	2750	3300	3300	3300	3300	3300	3300	3300	5225	3300	3300	0	JB01	1	0	\N	1	-    	-   	-   
B000000257	Interpec tab	TAB 	TAB 		1320	1320	1584	1584	1584	1584	1584	1584	1584	2508	1584	1584	0	JB01	1	0	2020-10-31	1	-    	-   	-   
B000000258	Levofloxacin infus	INF 	INF 		88000	88000	105600	105600	105600	105600	105600	105600	105600	167200	105600	105600	0	JB02	1	0	2018-09-30	1	-    	-   	-   
B000000259	Trixexyphenidyl 2 mg tab	TAB 	TAB 		41	41	49	49	49	49	49	49	49	78	49	49	0	JB01	1	0	\N	1	-    	-   	-   
B000000260	Granon 1 inj	AMP5	AMP5		56100	56100	67320	67320	67320	67320	67320	67320	67320	106590	67320	67320	0	JB02	1	0	\N	1	-    	-   	-   
B000000261	Kalitake Sachet	SAC 	SAC 		17325	17325	20790	20790	20790	20790	20790	20790	20790	32918	20790	20790	0	JB01	1	0	\N	1	-    	-   	-   
B000000262	xxx	TAB 	TAB 		1331	1331	1597	1597	1597	1597	1597	1597	1597	2529	1597	1597	0	JB01	1	0	\N	1	-    	-   	-   
B000000263	Engerix B inj 1 ml (20 mcg)	AMP5	AMP5		88000	88000	105600	105600	105600	105600	105600	105600	105600	167200	105600	105600	0	JB02	1	0	\N	1	-    	-   	-   
B000000264	SNMC	VL  	VL  		104500	104500	125400	125400	125400	125400	125400	125400	125400	198550	125400	125400	0	JB02	1	0	\N	1	-    	-   	-   
B000000265	Tutopusin ops infus	INF 	INF 		51700	51700	62040	62040	62040	62040	62040	62040	62040	98230	62040	62040	0	JB02	1	0	\N	1	-    	-   	-   
B000000266	Ob	CAP 	CAP 		2750	2750	3300	3300	3300	3300	3300	3300	3300	5225	3300	3300	0	JB01	1	0	\N	1	-    	-   	-   
B000000267	Oxcal Caps*	CAP 	CAP 		2673	2673	3208	3208	3208	3208	3208	3208	3208	5079	3208	3208	0	JB01	1	0	\N	1	-    	-   	-   
B000000268	Miniten 5 mg tab	TAB 	TAB 		5775	5775	6930	6930	6930	6930	6930	6930	6930	10972	6930	6930	0	JB01	1	0	\N	1	-    	-   	-   
B000000269	Fungasol Scalp Solution	TAB 	TAB 		41800	41800	50160	50160	50160	50160	50160	50160	50160	79420	50160	50160	0	JB01	1	0	\N	1	-    	-   	-   
B000000270	Forcanox 100 mg kaps	KAP 	KAP 		21450	21450	25740	25740	25740	25740	25740	25740	25740	40755	25740	25740	0	JB01	1	0	\N	1	-    	-   	-   
B000000271	Aloclair Plus Oral Rinse	TAB 	TAB 		88000	88000	105600	105600	105600	105600	105600	105600	105600	167200	105600	105600	0	JB01	1	0	\N	1	-    	-   	-   
B000000272	T	DRP 	DRP 		55000	55000	66000	66000	66000	66000	66000	66000	66000	104500	66000	66000	0	JB01	1	0	\N	1	-    	-   	-   
B000000273	Simzen Drops	DRP 	DRP 		55000	55000	66000	66000	66000	66000	66000	66000	66000	104500	66000	66000	0	JB01	1	0	\N	1	-    	-   	-   
B000000274	L-core sachet	SAC 	SAC 		19250	19250	23100	23100	23100	23100	23100	23100	23100	36575	23100	23100	0	JB01	1	0	\N	1	-    	-   	-   
B000000275	Zitadime Injeksi	AMP5	AMP5		203500	203500	244200	244200	244200	244200	244200	244200	244200	386650	244200	244200	0	JB02	1	0	\N	1	-    	-   	-   
B000000276	Anvomer B6 tab	TAB 	TAB 		2145	2145	2574	2574	2574	2574	2574	2574	2574	4076	2574	2574	0	JB01	1	0	\N	1	-    	-   	-   
B000000277	Opigran 1 inj	AMP5	AMP5		56100	56100	67320	67320	67320	67320	67320	67320	67320	106590	67320	67320	0	JB02	1	0	\N	1	-    	-   	-   
B000000278	Opigran 3 inj	AMP5	AMP5		118800	118800	142560	142560	142560	142560	142560	142560	142560	225720	142560	142560	0	JB02	1	0	2018-06-30	1	-    	-   	-   
B000000279	Tofedex inj	AMP5	AMP5		42900	42900	51480	51480	51480	51480	51480	51480	51480	81510	51480	51480	0	JB02	1	0	\N	1	-    	-   	-   
B000000280	Amadiab-1	TAB 	TAB 		2090	2090	2508	2508	2508	2508	2508	2508	2508	3971	2508	2508	0	JB01	1	0	\N	1	-    	-   	-   
B000000281	Betametason Cream GNR	CRM 	CRM 		2050	2050	2460	2460	2460	2460	2460	2460	2460	3895	2460	2460	0	JB01	1	0	\N	1	-    	-   	-   
B000000282	Simvastatin 20 mg tab	TAB 	TAB 		924	1320	1584	1584	1584	1584	1584	1584	1584	2508	1584	1584	0	JB01	1	0	2022-03-29	1	-    	-   	-   
B000000283	Forgesic inj	AMP5	AMP5		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB02	1	0	\N	1	-    	-   	-   
B000000284	Erythromycin 500 mg tab	TAB 	TAB 		930	930	1116	1116	1116	1116	1116	1116	1116	1767	1116	1116	0	JB01	1	0	\N	1	-    	-   	-   
B000000285	Narfoz 4 mg tab	TAB 	TAB 		15125	15125	18150	18150	18150	18150	18150	18150	18150	28738	18150	18150	0	JB01	1	0	\N	1	-    	-   	-   
B000000286	Amitriptylin 25 mg tab	TAB 	TAB 		120	120	144	144	144	144	144	144	144	228	144	144	0	JB01	1	0	\N	1	-    	-   	-   
B000000287	Arixtra Injeksi	AMP5	AMP5		360525	360525	432630	432630	432630	432630	432630	432630	432630	684998	432630	432630	0	JB01	1	0	\N	1	-    	-   	-   
B000000288	Supralysin 100 ml syr*	SYR 	SYR 		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB01	1	0	\N	1	-    	-   	-   
B000000289	Supralysin 60 ml Sirup*	SYR 	SYR 		24200	24200	29040	29040	29040	29040	29040	29040	29040	45980	29040	29040	0	JB01	1	0	2018-03-01	1	-    	-   	-   
B000000290	Tiaryt tab	TAB 	TAB 		4180	4180	5016	5016	5016	5016	5016	5016	5016	7942	5016	5016	0	JB01	1	0	\N	1	-    	-   	-   
B000000291	Opilax Sirup	SYR 	SYR 		44000	44000	52800	52800	52800	52800	52800	52800	52800	83600	52800	52800	0	JB01	1	0	2018-08-01	1	-    	-   	-   
B000000292	Haloperidol 1,5 mg tab	TAB 	TAB 		83	83	100	100	100	100	100	100	100	158	100	100	0	JB01	1	0	\N	1	-    	-   	-   
B000000293	Gratizin 5 mg Tablet	TAB 	TAB 		4626	4626	5551	5551	5551	5551	5551	5551	5551	8789	5551	5551	0	JB01	1	0	\N	1	-    	-   	-   
B000000294	Bisovell tab	TAB 	TAB 		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB01	1	0	\N	1	-    	-   	-   
B000000295	Angintriz MR Tablet	TAB 	TAB 		3300	3300	3960	3960	3960	3960	3960	3960	3960	6270	3960	3960	0	JB01	1	0	2018-10-01	1	-    	-   	-   
B000000296	Hepa Merz Granulate	TAB 	TAB 		39930	39930	47916	47916	47916	47916	47916	47916	47916	75867	47916	47916	0	JB01	1	0	\N	1	-    	-   	-   
B000000297	Neurobion Forte 5000 Tablet*	TAB 	TAB 		2475	2475	2970	2970	2970	2970	2970	2970	2970	4702	2970	2970	0	JB01	1	0	\N	1	-    	-   	-   
B000000298	Hemapo 3000 IU inj	AMP5	AMP5		251900	251900	302280	302280	302280	302280	302280	302280	302280	478610	302280	302280	0	JB02	1	0	\N	1	-    	-   	-   
B000000299	ATP Dankos Tab	TAB 	TAB 		1375	1375	1650	1650	1650	1650	1650	1650	1650	2612	1650	1650	0	JB01	1	0	\N	1	-    	-   	-   
B000000300	Zegavit Tab*	TAB 	TAB 		2530	2530	3036	3036	3036	3036	3036	3036	3036	4807	3036	3036	0	JB01	1	0	\N	1	-    	-   	-   
B000000301	Paraco syr	SYR 	SYR 		13750	13750	16500	16500	16500	16500	16500	16500	16500	26125	16500	16500	0	JB01	1	0	\N	1	-    	-   	-   
B000000302	Syneclav Forte syr	SYR 	SYR 		60500	60500	72600	72600	72600	72600	72600	72600	72600	114950	72600	72600	0	JB01	1	0	\N	1	-    	-   	-   
B000000303	Syneclav syr	SYR 	SYR 		44000	44000	52800	52800	52800	52800	52800	52800	52800	83600	52800	52800	0	JB01	1	0	\N	1	-    	-   	-   
B000000304	NaCl infus Otsuka	INF 	INF 		9100	9100	10920	10920	10920	10920	10920	10920	10920	17290	10920	10920	0	JB02	1	0	\N	1	-    	-   	-   
B000000305	Acetensa tab	B010	TAB 		133	133	160	160	160	160	160	160	160	253	160	160	0	JB01	100	70	2022-02-21	1	-    	-   	-   
B000000306	Inviclot inj (Heparin)	AMP5	AMP5		66000	66000	79200	79200	79200	79200	79200	79200	79200	125400	79200	79200	0	JB02	1	0	\N	1	-    	-   	-   
B000000307	Fuladic 2% cream 5 gram	CRM 	CRM 		49500	49500	59400	59400	59400	59400	59400	59400	59400	94050	59400	59400	0	JB02	1	0	\N	1	-    	-   	-   
B000000308	Pronalges 50 mg tab	TAB 	TAB 		2750	2750	3300	3300	3300	3300	3300	3300	3300	5225	3300	3300	0	JB01	1	0	2019-12-01	1	-    	-   	-   
B000000309	Pronalges 100 mg tab	TAB 	TAB 		4950	4950	5940	5940	5940	5940	5940	5940	5940	9405	5940	5940	0	JB01	1	0	\N	1	-    	-   	-   
B000000310	Spasmomen FC tab	TAB 	TAB 		6820	6820	8184	8184	8184	8184	8184	8184	8184	12958	8184	8184	0	JB01	1	0	\N	1	-    	-   	-   
B000000311	Harnal 0,2 mg Disp Tablet	TAB 	TAB 		14073	14073	16888	16888	16888	16888	16888	16888	16888	26739	16888	16888	0	JB01	1	0	\N	1	-    	-   	-   
B000000312	Ferriz 100 ml syr*	SYR 	SYR 		33000	33000	39600	39600	39600	39600	39600	39600	39600	62700	39600	39600	0	JB01	1	0	2019-08-31	1	-    	-   	-   
B000000314	Extrace 1000 mg inj	AMP5	AMP5		33000	33000	39600	39600	39600	39600	39600	39600	39600	62700	39600	39600	0	JB02	1	0	\N	1	-    	-   	-   
B000000315	Flamicort 10 mg/ml 5 ml inj	AMP5	AMP5		110000	110000	132000	132000	132000	132000	132000	132000	132000	209000	132000	132000	0	JB02	1	0	2020-08-31	1	-    	-   	-   
B000000316	Cortidex Tablet	TAB 	TAB 		286	286	343	343	343	343	343	343	343	543	343	343	0	JB01	1	0	\N	1	-    	-   	-   
B000000317	Flamar 25 mg tab	TAB 	TAB 		825	825	990	990	990	990	990	990	990	1568	990	990	0	JB01	1	0	\N	1	-    	-   	-   
B000000318	Extrace 500 mg Injeksi	AMP5	AMP5		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB02	1	0	\N	1	-    	-   	-   
B000000319	Microgynon Pil KB	BOX 	BOX 		12320	12320	14784	14784	14784	14784	14784	14784	14784	23408	14784	14784	0	JB01	1	0	\N	1	-    	-   	-   
B000000320	Pregnolin tab	TAB 	TAB 		3190	3190	3828	3828	3828	3828	3828	3828	3828	6061	3828	3828	0	JB01	1	0	\N	1	-    	-   	-   
B000000321	Nutriflam Kapsul	KAP 	KAP 		9900	9900	11880	11880	11880	11880	11880	11880	11880	18810	11880	11880	0	JB01	1	0	\N	1	-    	-   	-   
B000000322	Bufect 200 mg tab	TAB 	TAB 		770	770	924	924	924	924	924	924	924	1463	924	924	0	JB01	1	0	2021-02-20	1	-    	-   	-   
B000000323	Rindopump inj	AMP5	AMP5		82500	82500	99000	99000	99000	99000	99000	99000	99000	156750	99000	99000	0	JB02	1	0	\N	1	-    	-   	-   
B000000324	Triaminic Batuk & Pilek 60 ml Syr	SYR 	SYR 		36410	36410	43692	43692	43692	43692	43692	43692	43692	69179	43692	43692	0	JB01	1	0	\N	1	-    	-   	-   
B000000325	Triaminic Ekspektoran 60 ml Syr	SYR 	SYR 		36410	36410	43692	43692	43692	43692	43692	43692	43692	69179	43692	43692	0	JB01	1	0	\N	1	-    	-   	-   
B000000326	Neurotam Infus 12 Gr/60 ml	INF 	INF 		231000	231000	277200	277200	277200	277200	277200	277200	277200	438900	277200	277200	0	JB02	1	0	2020-08-31	1	-    	-   	-   
B000000327	Kloderma 5 gram Cream	CRM 	CRM 		18500	18500	22200	22200	22200	22200	22200	22200	22200	35150	22200	22200	0	JB02	1	0	\N	1	-    	-   	-   
B000000328	Venosmil Kapsul	CAP 	CAP 		7975	7975	9570	9570	9570	9570	9570	9570	9570	15152	9570	9570	0	JB01	1	0	\N	1	-    	-   	-   
B000000329	Cendantron 4 mg inj	AMP5	AMP5		31900	31900	38280	38280	38280	38280	38280	38280	38280	60610	38280	38280	0	JB02	1	0	\N	1	-    	-   	-   
B000000330	Susu Entrasol Gold Vanila 370 gr	BOX 	BOX 		57924	57924	69509	69509	69509	69509	69509	69509	69509	110056	69509	69509	0	J007	1	0	\N	1	-    	-   	-   
B000000331	Livalo Tablet	TAB 	TAB 		7920	7920	9504	9504	9504	9504	9504	9504	9504	15048	9504	9504	0	JB01	1	0	\N	1	-    	-   	-   
B000000332	Natrium Diklofenak 50 mg Tablet	TAB 	TAB 		271.7	271.7	326	326	326	326	326	326	326	516	326	326	0	JB01	1	0	2019-06-01	1	-    	-   	-   
B000000333	Postovit Tablet*	TAB 	TAB 		2970	2970	3564	3564	3564	3564	3564	3564	3564	5643	3564	3564	0	JB01	1	0	2018-04-01	1	-    	-   	-   
B000000334	Cendo Vitrolenta 0,6 ml MD	TAB 	TAB 		31488	31488	37786	37786	37786	37786	37786	37786	37786	59827	37786	37786	0	JB01	1	0	\N	1	-    	-   	-   
B000000335	xxx	CAP 	CAP 		4236	4236	5083	5083	5083	5083	5083	5083	5083	8048	5083	5083	0	JB01	1	0	\N	1	-    	-   	-   
B000000336	Norelut tab 5 mg tab	TAB 	TAB 		4125	4125	4950	4950	4950	4950	4950	4950	4950	7838	4950	4950	0	JB01	1	0	\N	1	-    	-   	-   
B000000337	Ondansetron 8 mg Tablet	TAB 	TAB 		2816	2816	3379	3379	3379	3379	3379	3379	3379	5350	3379	3379	0	JB01	1	0	2018-09-30	1	-    	-   	-   
B000000338	Nystin Drop	DRP 	DRP 		35200	35200	42240	42240	42240	42240	42240	42240	42240	66880	42240	42240	0	JB01	1	0	\N	1	-    	-   	-   
B000000339	Onetic 8 mg tab	TAB 	TAB 		16500	16500	19800	19800	19800	19800	19800	19800	19800	31350	19800	19800	0	JB01	1	0	\N	1	-    	-   	-   
B000000340	Infus RL Pipih GENERIK Widatra	INF 	INF 		7150	7150	8580	8580	8580	8580	8580	8580	8580	13585	8580	8580	0	JB02	1	0	2018-10-31	1	-    	-   	-   
B000000341	Provelyn 75 mg Capsul	CAP 	CAP 		10450	10450	12540	12540	12540	12540	12540	12540	12540	19855	12540	12540	0	JB01	1	0	2018-10-31	1	-    	-   	-   
B000000342	Hustab Tablet	TAB 	TAB 		312	312	374	374	374	374	374	374	374	593	374	374	0	JB01	1	0	\N	1	-    	-   	-   
B000000343	Ephinephrine inj	AMP5	AMP5		8910	8910	10692	10692	10692	10692	10692	10692	10692	16929	10692	10692	0	JB02	1	0	\N	1	-    	-   	-   
B000000344	Ketoconazole 2% Cream	CRM 	CRM 		4666	4666	5599	5599	5599	5599	5599	5599	5599	8865	5599	5599	0	JB02	1	0	2019-04-30	1	-    	-   	-   
B000000345	Forres 50 mg tab	TAB 	TAB 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	\N	1	-    	-   	-   
B000000346	Constipen 120 ml Syr	SYR 	SYR 		73810	73810	88572	88572	88572	88572	88572	88572	88572	140239	88572	88572	0	JB01	1	0	\N	1	-    	-   	-   
B000000347	Dexyclav Forte Syr	SYR 	SYR 		84150	84150	100980	100980	100980	100980	100980	100980	100980	159885	100980	100980	0	JB01	1	0	\N	1	-    	-   	-   
B000000348	Mycostatin Drop	DRP 	DRP 		51150	51150	61380	61380	61380	61380	61380	61380	61380	97185	61380	61380	0	JB01	1	0	\N	1	-    	-   	-   
B000000349	Longcef 125 mg syr	SYR 	SYR 		46200	46200	55440	55440	55440	55440	55440	55440	55440	87780	55440	55440	0	JB01	1	0	\N	1	-    	-   	-   
B000000350	Stelazine 1 mg Tablet	TAB 	TAB 		484	484	581	581	581	581	581	581	581	920	581	581	0	JB01	1	0	\N	1	-    	-   	-   
B000000351	Phenobarbital 30 mg tab	TAB 	TAB 		144	144	173	173	173	173	173	173	173	274	173	173	0	JB01	1	0	\N	1	-    	-   	-   
B000000352	Euvax-B 0,5 ml (Pediatri)	AMP5	AMP5		55660	55660	66792	66792	66792	66792	66792	66792	66792	105754	66792	66792	0	JB02	1	0	\N	1	-    	-   	-   
B000000353	Sanadryl DMP 60 ml Sirup	SYR 	SYR 		10670	10670	12804	12804	12804	12804	12804	12804	12804	20273	12804	12804	0	JB01	1	0	2019-05-01	1	-    	-   	-   
B000000354	San-B-Plex Drop	DRP 	DRP 		16335	16335	19602	19602	19602	19602	19602	19602	19602	31036	19602	19602	0	JB01	1	0	\N	1	-    	-   	-   
B000000355	Sporax Cap	CAP 	CAP 		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB01	1	0	\N	1	-    	-   	-   
B000000356	Lameson 8 mg Tablet	TAB 	TAB 		5060	5060	6072	6072	6072	6072	6072	6072	6072	9614	6072	6072	0	JB01	1	0	\N	1	-    	-   	-   
B000000357	Tramadol tab	TAB 	TAB 		435	435	522	522	522	522	522	522	522	826	522	522	0	JB01	1	0	\N	1	-    	-   	-   
B000000358	Curvit Cl Sirup*	SYR 	SYR 		49500	49500	59400	59400	59400	59400	59400	59400	59400	94050	59400	59400	0	JB01	1	0	\N	1	-    	-   	-   
B000000359	Forumen Ear Drop	DRP 	DRP 		26015	26015	31218	31218	31218	31218	31218	31218	31218	49428	31218	31218	0	JB01	1	0	2018-08-01	1	-    	-   	-   
B000000360	Imboost Tablet*	TAB 	TAB 		3117.4	3117.4	3741	3741	3741	3741	3741	3741	3741	5923	3741	3741	0	JB01	1	0	2019-06-01	1	-    	-   	-   
B000000361	Otopain Ear Drop 8 ml	DRP 	DRP 		49500	49500	59400	59400	59400	59400	59400	59400	59400	94050	59400	59400	0	JB01	1	0	2018-06-01	1	-    	-   	-   
B000000362	Centabiogel 20 gr	GEL 	GEL 		15054	15054	18065	18065	18065	18065	18065	18065	18065	28603	18065	18065	0	JB02	1	0	\N	1	-    	-   	-   
B000000363	Neo Mercazole tab	TAB 	TAB 		1282	1282	1538	1538	1538	1538	1538	1538	1538	2436	1538	1538	0	JB01	1	0	\N	1	-    	-   	-   
B000000364	XXX	TAB 	TAB 		3025	3025	3630	3630	3630	3630	3630	3630	3630	5748	3630	3630	0	JB01	1	0	\N	1	-    	-   	-   
B000000365	Lapiflox 500 mg Tablet	TAB 	TAB 		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB01	1	0	2021-02-01	1	-    	-   	-   
B000000366	Vomceran 8 mg inj	AMP5	AMP5		60500	60500	72600	72600	72600	72600	72600	72600	72600	114950	72600	72600	0	JB02	1	0	\N	1	-    	-   	-   
B000000367	Torasic 30 mg inj	AMP5	AMP5		36667	36667	44000	44000	44000	44000	44000	44000	44000	69667	44000	44000	0	JB02	1	0	\N	1	-    	-   	-   
B000000368	Kalnex 250 mg inj	AMP5	AMP5		9900	9900	11880	11880	11880	11880	11880	11880	11880	18810	11880	11880	0	JB02	1	0	\N	1	-    	-   	-   
B000000369	Lactamor Cap*	CAP 	CAP 		2126.663	2126.663	2552	2552	2552	2552	2552	2552	2552	4041	2552	2552	0	JB01	1	0	2018-08-31	1	-    	-   	-   
B000000370	HP Pro Kapsul	CAP 	CAP 		4956	4956	5947	5947	5947	5947	5947	5947	5947	9416	5947	5947	0	JB01	1	0	\N	1	-    	-   	-   
B000000371	Betadine Solution 5 ml	GAR 	GAR 		3135	3135	3762	3762	3762	3762	3762	3762	3762	5956	3762	3762	0	JB01	1	0	\N	1	-    	-   	-   
B000000372	Miconazole 2% cream-	CRM 	CRM 		3000	3000	3600	3600	3600	3600	3600	3600	3600	5700	3600	3600	0	JB01	1	0	\N	1	-    	-   	-   
B000000373	Imboost Sirup 60 ml* (KIDS)	SYR 	SYR 		32230	32230	38676	38676	38676	38676	38676	38676	38676	61237	38676	38676	0	JB01	1	0	2018-09-30	1	-    	-   	-   
B000000374	Cefspan Sirup	SYR 	SYR 		101200	101200	121440	121440	121440	121440	121440	121440	121440	192280	121440	121440	0	JB01	1	0	\N	1	-    	-   	-   
B000000376	Ibuprofen syr 100 mg	SYR 	SYR 		3497	3497	4196	4196	4196	4196	4196	4196	4196	6644	4196	4196	0	JB01	1	0	\N	1	-    	-   	-   
B000000377	Valvir Kaplet	KAP 	KAP 		13750	13750	16500	16500	16500	16500	16500	16500	16500	26125	16500	16500	0	JB01	1	0	2017-11-01	1	-    	-   	-   
B000000378	Flamoxi Kapsul	CAP 	CAP 		7700	7700	9240	9240	9240	9240	9240	9240	9240	14630	9240	9240	0	JB01	1	0	2019-01-01	1	-    	-   	-   
B000000379	Droxal Dry Syr	SYR 	SYR 		42350	42350	50820	50820	50820	50820	50820	50820	50820	80465	50820	50820	0	JB01	1	0	\N	1	-    	-   	-   
B000000380	Droxal Kapsul	CAP 	CAP 		9790	9790	11748	11748	11748	11748	11748	11748	11748	18601	11748	11748	0	JB01	1	0	2019-01-01	1	-    	-   	-   
B000000381	Pantogar cap*	CAP 	CAP 		5646	5646	6775	6775	6775	6775	6775	6775	6775	10727	6775	6775	0	JB01	1	0	\N	1	-    	-   	-   
B000000382	Tarivid Otic Solution	CAP 	CAP 		84700	84700	101640	101640	101640	101640	101640	101640	101640	160930	101640	101640	0	JB01	1	0	2019-01-31	1	-    	-   	-   
B000000383	Rhinofed tab	TAB 	TAB 		1694	1694	2033	2033	2033	2033	2033	2033	2033	3219	2033	2033	0	JB01	1	0	\N	1	-    	-   	-   
B000000384	Starcef 200 mg Kapsul	TAB 	TAB 		30250	30250	36300	36300	36300	36300	36300	36300	36300	57475	36300	36300	0	JB01	1	0	\N	1	-    	-   	-   
B000000385	Hexilon inj 125 mg	AMP5	AMP5		85800	85800	102960	102960	102960	102960	102960	102960	102960	163020	102960	102960	0	JB02	1	0	\N	1	-    	-   	-   
B000000386	Iliadin drop	DRP 	DRP 		48638	48638	58366	58366	58366	58366	58366	58366	58366	92412	58366	58366	0	JB01	1	0	2018-07-31	1	-    	-   	-   
B000000387	Infus Otsu Salin/ NS 3%	INF 	INF 		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB03	1	0	\N	1	-    	-   	-   
B000000388	Maxtan tab	TAB 	TAB 		847	847	1016	1016	1016	1016	1016	1016	1016	1609	1016	1016	0	JB01	1	0	\N	1	-    	-   	-   
B000000389	Yaz Pil KB	TAB 	TAB 		222915	222915	267498	267498	267498	267498	267498	267498	267498	423538	267498	267498	0	JB01	1	0	2018-12-31	1	-    	-   	-   
B000000390	Yasmin Pil KB	TAB 	TAB 		182479	182479	218975	218975	218975	218975	218975	218975	218975	346710	218975	218975	0	JB01	1	0	\N	1	-    	-   	-   
B000000391	Diane Pil KB	TAB 	TAB 		102597	102597	123116	123116	123116	123116	123116	123116	123116	194934	123116	123116	0	JB01	1	0	2019-04-30	1	-    	-   	-   
B000000392	Cendo Tropin 1% ED 5 ml	BTL 	BTL 		13750	13750	16500	16500	16500	16500	16500	16500	16500	26125	16500	16500	0	JB01	1	0	\N	1	-    	-   	-   
B000000393	Novaldo inj	AMP5	AMP5		8800	8800	10560	10560	10560	10560	10560	10560	10560	16720	10560	10560	0	JB02	1	0	\N	1	-    	-   	-   
B000000394	LQ-500 Tablet	TAB 	TAB 		33000	33000	39600	39600	39600	39600	39600	39600	39600	62700	39600	39600	0	JB01	1	0	\N	1	-    	-   	-   
B000000395	Atovar 40 mg tab	TAB 	TAB 		9900	9900	11880	11880	11880	11880	11880	11880	11880	18810	11880	11880	0	JB01	1	0	\N	1	-    	-   	-   
B000000396	Alco Oral Drop 15 ml	DRP 	DRP 		69300.456	69300.456	83161	83161	83161	83161	83161	83161	83161	131671	83161	83161	0	JB01	1	0	2018-08-30	1	-    	-   	-   
B000000397	Nu Q-Ten Com	TAB 	TAB 		8800	8800	10560	10560	10560	10560	10560	10560	10560	16720	10560	10560	0	JB01	1	0	\N	1	-    	-   	-   
B000000398	Pregnolin tab	TAB 	TAB 		3740	3740	4488	4488	4488	4488	4488	4488	4488	7106	4488	4488	0	JB01	1	0	\N	1	-    	-   	-   
B000000400	Rativol 30 mg inj	BTL 	BTL 		35541	35541	42649	42649	42649	42649	42649	42649	42649	67528	42649	42649	0	JB01	1	0	\N	1	-    	-   	-   
B000000401	Sanadryl Expect 60 ml syr	BTL 	BTL 		9955	9955	11946	11946	11946	11946	11946	11946	11946	18914	11946	11946	0	JB01	1	0	\N	1	-    	-   	-   
B000000402	Curcuma Film Coated Tablet*	TAB 	TAB 		924	924	1109	1109	1109	1109	1109	1109	1109	1756	1109	1109	0	JB01	1	0	2018-11-30	1	-    	-   	-   
B000000403	xxx	SYR 	SYR 		46255	46255	55506	55506	55506	55506	55506	55506	55506	87884	55506	55506	0	JB01	1	0	\N	1	-    	-   	-   
B000000404	Ovidrel syringe 250 mcg inj	AMP5	AMP5		636950	636950	764340	764340	764340	764340	764340	764340	764340	1210205	764340	764340	0	JB02	1	0	\N	1	-    	-   	-   
B000000405	Codein 20 mg tab	AMP5	AMP5		1331	1331	1597	1597	1597	1597	1597	1597	1597	2529	1597	1597	0	JB02	1	0	\N	1	-    	-   	-   
B000000406	Codipront syr 60 ml	SYR 	SYR 		51150	51150	61380	61380	61380	61380	61380	61380	61380	97185	61380	61380	0	JB01	1	0	\N	1	-    	-   	-   
B000000407	Codipront cum expect syr 60 ml	SYR 	SYR 		55550	55550	66660	66660	66660	66660	66660	66660	66660	105545	66660	66660	0	JB01	1	0	\N	1	-    	-   	-   
B000000408	Neurotam Tablet 1200 mg	TAB 	TAB 		5830	5830	6996	6996	6996	6996	6996	6996	6996	11077	6996	6996	0	JB01	1	0	2018-04-30	1	-    	-   	-   
B000000409	Caladine powder 100 gr	BTL 	BTL 		10450	10450	12540	12540	12540	12540	12540	12540	12540	19855	12540	12540	0	JB03	1	0	\N	1	-    	-   	-   
B000000410	Bedak Salicyl Fresh 60 gr*	BTL 	BTL 		12100	12100	14520	14520	14520	14520	14520	14520	14520	22990	14520	14520	0	JB03	1	0	\N	1	-    	-   	-   
B000000411	Flamar 20 gr Emulgel	TAB 	TAB 		16720	16720	20064	20064	20064	20064	20064	20064	20064	31768	20064	20064	0	JB01	1	0	\N	1	-    	-   	-   
B000000412	MST continus 10 mg Tablet	TAB 	TAB 		15620	15620	18744	18744	18744	18744	18744	18744	18744	29678	18744	18744	0	JB01	1	0	\N	1	-    	-   	-   
B000000413	Celebrex 200 mg cap	TAB 	TAB 		13092	13092	15710	15710	15710	15710	15710	15710	15710	24875	15710	15710	0	JB01	1	0	\N	1	-    	-   	-   
B000000414	Viostin X Tablet*	TAB 	TAB 		6380	6380	7656	7656	7656	7656	7656	7656	7656	12122	7656	7656	0	JB01	1	0	2019-11-30	1	-    	-   	-   
B000000415	Viostin DS Tablet*	TAB 	TAB 		5866	5866	7039	7039	7039	7039	7039	7039	7039	11145	7039	7039	0	JB01	1	0	\N	1	-    	-   	-   
B000000416	Nipe Drops 15 ml	DRP 	DRP 		63360	63360	76032	76032	76032	76032	76032	76032	76032	120384	76032	76032	0	JB01	1	0	2018-05-31	1	-    	-   	-   
B000000417	Zinkid Syr 100 ml*	SYR 	SYR 		22550	22550	27060	27060	27060	27060	27060	27060	27060	42845	27060	27060	0	JB01	1	0	\N	1	-    	-   	-   
B000000418	Ericaf tab	TAB 	TAB 		4984	4984	5981	5981	5981	5981	5981	5981	5981	9470	5981	5981	0	JB01	1	0	\N	1	-    	-   	-   
B000000419	Cefadroxil 125 mg/ 5 ml Sirup	SYR 	SYR 		8201	8201	9841	9841	9841	9841	9841	9841	9841	15582	9841	9841	0	JB01	1	0	2019-05-31	1	-    	-   	-   
B000000420	xxx	CAP 	CAP 		5676	5676	6811	6811	6811	6811	6811	6811	6811	10784	6811	6811	0	JB01	1	0	\N	1	-    	-   	-   
B000000421	Mucopect 15 mg/ 5 ml syr pediatric	SYR 	SYR 		51429.4	51429.4	61715	61715	61715	61715	61715	61715	61715	97716	61715	61715	0	JB01	1	0	2019-08-31	1	-    	-   	-   
B000000422	Mucopect 30 mg/ 5 ml syr Dewasa	SYR 	SYR 		51480	51480	61776	61776	61776	61776	61776	61776	61776	97812	61776	61776	0	JB01	1	0	\N	1	-    	-   	-   
B000000423	XXX	GAR 	GAR 		8470	8470	10164	10164	10164	10164	10164	10164	10164	16093	10164	10164	0	JB01	1	0	\N	1	-    	-   	-   
B000000424	Cedantron 8 mg inj (soho)	AMP5	AMP5		60500	60500	72600	72600	72600	72600	72600	72600	72600	114950	72600	72600	0	JB02	1	0	\N	1	-    	-   	-   
B000000425	Cester tab (soho)*	TAB 	TAB 		2420	2420	2904	2904	2904	2904	2904	2904	2904	4598	2904	2904	0	JB01	1	0	\N	1	-    	-   	-   
B000000426	Levopar tab	TAB 	TAB 		4654	4654	5585	5585	5585	5585	5585	5585	5585	8843	5585	5585	0	JB01	1	0	\N	1	-    	-   	-   
B000000427	Susu Danstar 135 gr	BOX 	BOX 		16061	16061	19273	19273	19273	19273	19273	19273	19273	30516	19273	19273	0	J007	1	0	\N	1	-    	-   	-   
B000000428	Zink Dispersible tab	TAB 	TAB 		476	476	571	571	571	571	571	571	571	904	571	571	0	JB01	1	0	\N	1	-    	-   	-   
B000000429	Lesifit Kapsul	KAP 	KAP 		5489	5489	6587	6587	6587	6587	6587	6587	6587	10429	6587	6587	0	JB01	1	0	\N	1	-    	-   	-   
B000000430	Lapraz Kapsul	CAP 	CAP 		12232	12232	14678	14678	14678	14678	14678	14678	14678	23241	14678	14678	0	JB01	1	0	\N	1	-    	-   	-   
B000000432	Dulcolax 10 mg Supp	DRP 	DRP 		16033	16033	19240	19240	19240	19240	19240	19240	19240	30463	19240	19240	0	JB01	1	0	2019-02-28	1	-    	-   	-   
B000000433	Dulcolactol syr 60 ml	SYR 	SYR 		61710	61710	74052	74052	74052	74052	74052	74052	74052	117249	74052	74052	0	JB01	1	0	\N	1	-    	-   	-   
B000000434	C	SYR 	SYR 		54379	54379	65255	65255	65255	65255	65255	65255	65255	103320	65255	65255	0	JB01	1	0	\N	1	-    	-   	-   
B000000435	Cinolon Cream	CRM 	CRM 		16280	16280	19536	19536	19536	19536	19536	19536	19536	30932	19536	19536	0	JB02	1	0	\N	1	-    	-   	-   
B000000436	Febogrel Tablet	TAB 	TAB 		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB01	1	0	\N	1	-    	-   	-   
B000000437	Sterox gargle 190 ml 	GAR 	GAR 		14500	14500	17400	17400	17400	17400	17400	17400	17400	27550	17400	17400	0	JB02	1	0	\N	1	-    	-   	-   
B000000438	Cairan Discaler	GLN 	GLN 		30000	30000	36000	36000	36000	36000	36000	36000	36000	57000	36000	36000	0	JB03	1	0	\N	1	-    	-   	-   
B000000439	Stelazine 5 mg Tablet	TAB 	TAB 		1098	1098	1318	1318	1318	1318	1318	1318	1318	2086	1318	1318	0	JB01	1	0	\N	1	-    	-   	-   
B000000440	Progina Transvagina gel 220 ml	GEL 	GEL 		33000	33000	39600	39600	39600	39600	39600	39600	39600	62700	39600	39600	0	JB03	1	0	\N	1	-    	-   	-   
B000000441	s	TAB 	TAB 		4854	4854	5825	5825	5825	5825	5825	5825	5825	9223	5825	5825	0	JB01	1	0	\N	1	-    	-   	-   
B000000442	Xanda DS 120 ml syr	SYR 	SYR 		40480	40480	48576	48576	48576	48576	48576	48576	48576	76912	48576	48576	0	JB01	1	0	\N	1	-    	-   	-   
B000000443	Plasminex 500 mg Tablet	TAB 	TAB 		2761	2761	3313	3313	3313	3313	3313	3313	3313	5246	3313	3313	0	JB01	1	0	\N	1	-    	-   	-   
B000000444	Trihexyphenidyl tab	TAB 	TAB 		41	41	49	49	49	49	49	49	49	78	49	49	0	JB01	1	0	\N	1	-    	-   	-   
B000000445	Infusan D10	INF 	INF 		19360	19360	23232	23232	23232	23232	23232	23232	23232	36784	23232	23232	0	JB03	1	0	\N	1	-    	-   	-   
B000000446	Infus Futrolit	INF 	INF 		56815	56815	68178	68178	68178	68178	68178	68178	68178	107948	68178	68178	0	JB03	1	0	\N	1	-    	-   	-   
B000000447	Cendo Lubricen MD	GEL 	GEL 		44550	44550	53460	53460	53460	53460	53460	53460	53460	84645	53460	53460	0	JB03	1	0	\N	1	-    	-   	-   
B000000448	Starcef 100 mg Kapsul	CAP 	CAP 		19250	19250	23100	23100	23100	23100	23100	23100	23100	36575	23100	23100	0	JB01	1	0	2019-04-01	1	-    	-   	-   
B000000449	Susu Hepatosol Vanila 185 gr	BOX 	BOX 		80850	80850	97020	97020	97020	97020	97020	97020	97020	153615	97020	97020	0	J007	1	0	\N	1	-    	-   	-   
B000000450	Vib Albumin Plus Sachet	SAC 	SAC 		60500	60500	72600	72600	72600	72600	72600	72600	72600	114950	72600	72600	0	JB01	1	0	\N	1	-    	-   	-   
B000000452	Glucovance 500/ 2,5 mg tab	TAB 	TAB 		3501	3501	4201	4201	4201	4201	4201	4201	4201	6652	4201	4201	0	JB01	1	0	\N	1	-    	-   	-   
B000000453	Kalmoxilin 125 mg Sirup	CAP 	CAP 		20900	20900	25080	25080	25080	25080	25080	25080	25080	39710	25080	25080	0	JB01	1	0	\N	1	-    	-   	-   
B000000454	Vectrin Sirup	SYR 	SYR 		39600	39600	47520	47520	47520	47520	47520	47520	47520	75240	47520	47520	0	JB01	1	0	2018-08-31	1	-    	-   	-   
B000000455	Ikaphen Cap	CAP 	CAP 		1320	1320	1584	1584	1584	1584	1584	1584	1584	2508	1584	1584	0	JB01	1	0	\N	1	-    	-   	-   
B000000456	Neo Triaminic Drop	DRP 	DRP 		56100	56100	67320	67320	67320	67320	67320	67320	67320	106590	67320	67320	0	JB01	1	0	\N	1	-    	-   	-   
B000000457	Aminofusin L 600 infus Dewasa	INF 	INF 		83600	83600	100320	100320	100320	100320	100320	100320	100320	158840	100320	100320	0	JB02	1	0	\N	1	-    	-   	-   
B000000458	Alpentin 300 mg Kap	CAP 	CAP 		6930	6930	8316	8316	8316	8316	8316	8316	8316	13167	8316	8316	0	JB01	1	0	\N	1	-    	-   	-   
B000000460	Lupred Tab	TAB 	TAB 		2200	2200	2640	2640	2640	2640	2640	2640	2640	4180	2640	2640	0	JB01	1	0	\N	1	-    	-   	-   
B000000461	Bioplacenton 	GEL 	GEL 		15950	15950	19140	19140	19140	19140	19140	19140	19140	30305	19140	19140	0	JB03	1	0	2018-10-31	1	-    	-   	-   
B000000462	Daktarin Diaper 10 gr ointment	CRM 	CRM 		51500	51500	61800	61800	61800	61800	61800	61800	61800	97850	61800	61800	0	JB02	1	0	2019-08-31	1	-    	-   	-   
B000000463	Feldene gel 15 gram	GEL 	GEL 		70759	70759	84911	84911	84911	84911	84911	84911	84911	134442	84911	84911	0	JB03	1	0	\N	1	-    	-   	-   
B000000464	Hyperhep B 0,5 ml inj	AMP5	AMP5		1980000	1980000	2376000	2376000	2376000	2376000	2376000	2376000	2376000	3762000	2376000	2376000	0	JB02	1	0	\N	1	-    	-   	-   
B000000465	Osfit DHA Kapsul*	CAP 	CAP 		4217	4217	5060	5060	5060	5060	5060	5060	5060	8012	5060	5060	0	JB01	1	0	\N	1	-    	-   	-   
B000000466	Ocu-V Tablet	CAP 	CAP 		4950	4950	5940	5940	5940	5940	5940	5940	5940	9405	5940	5940	0	JB01	1	0	\N	1	-    	-   	-   
B000000467	Glucophage 850 mg Tablet	TAB 	TAB 		1702	1702	2042	2042	2042	2042	2042	2042	2042	3234	2042	2042	0	JB01	1	0	\N	1	-    	-   	-   
B000000468	Enystin  Drop	DRP 	DRP 		34100	34100	40920	40920	40920	40920	40920	40920	40920	64790	40920	40920	0	JB01	1	0	\N	1	-    	-   	-   
B000000469	Dexyclav Dry Syr	SYR 	SYR 		56100	56100	67320	67320	67320	67320	67320	67320	67320	106590	67320	67320	0	JB01	1	0	\N	1	-    	-   	-   
B000000470	Uriter Cap	CAP 	CAP 		3383	3383	4060	4060	4060	4060	4060	4060	4060	6428	4060	4060	0	JB01	1	0	\N	1	-    	-   	-   
B000000471	Inerson Salep	SAL 	SAL 		55000	55000	66000	66000	66000	66000	66000	66000	66000	104500	66000	66000	0	JB01	1	0	2020-06-30	1	-    	-   	-   
B000000472	Fluconazole 150 mg Kap	CAP 	CAP 		22001	22001	26401	26401	26401	26401	26401	26401	26401	41802	26401	26401	0	JB01	1	0	\N	1	-    	-   	-   
B000000473	Infus D40	INF 	INF 		8690	8690	10428	10428	10428	10428	10428	10428	10428	16511	10428	10428	0	JB03	1	0	2018-08-31	1	-    	-   	-   
B000000474	Gluvas 2 mg tab	TAB 	TAB 		4290	4290	5148	5148	5148	5148	5148	5148	5148	8151	5148	5148	0	JB01	1	0	\N	1	-    	-   	-   
B000000475	Syneclav 500 mg Kap	KAP 	KAP 		10450	10450	12540	12540	12540	12540	12540	12540	12540	19855	12540	12540	0	JB01	1	0	\N	1	-    	-   	-   
B000000476	Episan syr	SYR 	SYR 		49830	49830	59796	59796	59796	59796	59796	59796	59796	94677	59796	59796	0	JB01	1	0	\N	1	-    	-   	-   
B000000477	Interhistin Syr	SYR 	SYR 		21423	21423	25708	25708	25708	25708	25708	25708	25708	40704	25708	25708	0	JB01	1	0	\N	1	-    	-   	-   
B000000478	Sulcolon 500 mg tab	TAB 	TAB 		7700	7700	9240	9240	9240	9240	9240	9240	9240	14630	9240	9240	0	JB01	1	0	\N	1	-    	-   	-   
B000000479	Thrombophob gel 20 gr	TAB 	TAB 		51975	51975	62370	62370	62370	62370	62370	62370	62370	98752	62370	62370	0	JB03	1	0	\N	1	-    	-   	-   
B000000480	xxx	TAB 	TAB 		34650	34650	41580	41580	41580	41580	41580	41580	41580	65835	41580	41580	0	JB03	1	0	\N	1	-    	-   	-   
B000000481	Augentonic 0,6 ml MD	SYR 	SYR 		23788	23788	28546	28546	28546	28546	28546	28546	28546	45197	28546	28546	0	JB01	1	0	\N	1	-    	-   	-   
B000000482	Augentonic 5 ml	SYR 	SYR 		27637	27637	33164	33164	33164	33164	33164	33164	33164	52510	33164	33164	0	JB01	1	0	\N	1	-    	-   	-   
B000000552	AB-Vask 5mg	AMP5	AMP5	-	4392	14641	17569	17569	17569	17569	17569	17569	17569	27818	17569	17569	0	J008	1	5	2020-11-30	1	-    	-   	-   
B000000553	Acitral Sirup	SYR 	SYR 		56368	56368	67642	67642	67642	67642	67642	67642	67642	107100	67642	67642	0	JB01	1	1	2019-02-01	1	-    	-   	-   
B000000554	Acran 150 mg Tablet	TAB 	TAB 		11000	11000	13200	13200	13200	13200	13200	13200	13200	20900	13200	13200	0	JB01	1	150	\N	1	-    	-   	-   
B000000555	Acran Injeksi	AMP5	AMP5		35431	35431	42517	42517	42517	42517	42517	42517	42517	67319	42517	42517	0	JB02	1	0	2018-11-30	1	-    	-   	-   
B000000556	Acyclovir 200 mg Tablet	TAB 	TAB 		1025	1025	1230	1230	1230	1230	1230	1230	1230	1948	1230	1230	0	JB01	1	200	2025-04-06	1	-    	-   	-   
B000000557	Acyclovir 400 mg Tablet	TAB 	TAB 		926	926	1111	1111	1111	1111	1111	1111	1111	1759	1111	1111	0	JB01	1	400	\N	1	-    	-   	-   
B000000558	Acyclovir cream	SAL 	SAL 		6050	6050	7260	7260	7260	7260	7260	7260	7260	11495	7260	7260	0	JB02	1	0	2020-12-01	1	-    	-   	-   
B000000559	Adona Injeksi	AMP5	AMP5		24890	24890	29868	29868	29868	29868	29868	29868	29868	47290	29868	29868	0	JB02	1	0	\N	1	-    	-   	-   
B000000560	Afamed tab	CAP 	CAP 		8785	8785	10542	10542	10542	10542	10542	10542	10542	16691	10542	10542	0	JB01	1	0	2023-05-03	1	-    	-   	-   
B000000561	Albothyl 5 ml*	BTL 	BTL 		23100	23100	27720	27720	27720	27720	27720	27720	27720	43890	27720	27720	0	JB02	1	0	\N	1	-    	-   	-   
B000000562	Albuminar 25% infus	BTL 	BTL 		2462350	2462350	2954820	2954820	2954820	2954820	2954820	2954820	2954820	4678465	2954820	2954820	0	JB02	1	0	\N	1	-    	-   	-   
B000000563	Alganax 0,5 mg Tablet	TAB 	TAB 		3461	3461	4153	4153	4153	4153	4153	4153	4153	6576	4153	4153	0	JB01	1	0	\N	1	-    	-   	-   
B000000564	Alinamin F Inj*	AMP5	AMP5		16470	16470	19764	19764	19764	19764	19764	19764	19764	31293	19764	19764	0	JB02	1	0	\N	1	-    	-   	-   
B000000565	Allopurinol 100 mg	TAB 	TAB 		200	200	240	240	240	240	240	240	240	380	240	240	0	JB01	1	0	2020-10-01	1	-    	-   	-   
B000000566	Ambroxol 30 mg	TAB 	TAB 		363	363	436	436	436	436	436	436	436	690	436	436	0	JB01	1	0	2018-11-30	1	-    	-   	-   
B000000567	Aminefron Tablet	TAB 	TAB 		7150	7150	8580	8580	8580	8580	8580	8580	8580	13585	8580	8580	0	JB01	1	0	\N	1	-    	-   	-   
B000000568	Aminofillin Injeksi	AMP5	AMP5		3959.89	3959.89	4752	4752	4752	4752	4752	4752	4752	7524	4752	4752	0	JB02	1	0	2019-10-31	1	-    	-   	-   
B000000569	Aminofluid Infus	INF 	INF 		133100	133100	159720	159720	159720	159720	159720	159720	159720	252890	159720	159720	0	JB02	1	0	\N	1	-    	-   	-   
B000000570	Aminofusin Paed 250ml	INF 	INF 		101200	101200	121440	121440	121440	121440	121440	121440	121440	192280	121440	121440	0	JB02	1	0	\N	1	-    	-   	-   
B000000571	Amlodipine 10 mg	TAB 	TAB 		2271	2271	2725	2725	2725	2725	2725	2725	2725	4315	2725	2725	0	JB01	1	10	2018-05-16	1	-    	-   	-   
B000000572	Amlodipine 5 mg	TAB 	TAB 		1056	1056	1267	1267	1267	1267	1267	1267	1267	2006	1267	1267	0	JB01	1	0	\N	1	-    	-   	-   
B000000573	Amoxan forte dry	SYR 	SYR 		32488	32488	38986	38986	38986	38986	38986	38986	38986	61727	38986	38986	0	JB01	1	0	\N	1	-    	-   	-   
B000000574	Amoxan inj	AMP5	AMP5		22781	22781	27337	27337	27337	27337	27337	27337	27337	43284	27337	27337	0	JB02	1	0	2018-02-28	1	-    	-   	-   
B000000575	Amoxsan 500 mg 	CAP 	CAP 		3630	3630	4356	4356	4356	4356	4356	4356	4356	6897	4356	4356	0	JB01	1	0	\N	1	-    	-   	-   
B000000576	Amoxsan Dry Syr	DRP 	DRP 		25059	25059	30071	30071	30071	30071	30071	30071	30071	47612	30071	30071	0	JB01	1	0	2019-09-30	1	-    	-   	-   
B000000577	xxx	SYR 	SYR 		21688	21688	26026	26026	26026	26026	26026	26026	26026	41207	26026	26026	0	JB01	1	0	\N	1	-    	-   	-   
B000000578	Amoxycillin 250 mg	CAP 	CAP 		317	317	380	380	380	380	380	380	380	602	380	380	0	JB01	1	0	\N	1	-    	-   	-   
B000000579	Amoxycillin 500 mg	TAB 	TAB 		770	770	924	924	924	924	924	924	924	1463	924	924	0	JB01	1	0	\N	1	-    	-   	-   
B000000580	Amvar Tablet*	TAB 	TAB 		6050	6050	7260	7260	7260	7260	7260	7260	7260	11495	7260	7260	0	JB01	1	0	\N	1	-    	-   	-   
B000000581	Analsik tab	TAB 	TAB 		1243	1243	1492	1492	1492	1492	1492	1492	1492	2362	1492	1492	0	JB01	1	0	2019-12-31	1	-    	-   	-   
B000000582	Andonex Syr	SYR 	SYR 		11000	11000	13200	13200	13200	13200	13200	13200	13200	20900	13200	13200	0	JB01	1	0	\N	1	-    	-   	-   
B000000583	Androlon Tablet	TAB 	TAB 		8800	8800	10560	10560	10560	10560	10560	10560	10560	16720	10560	10560	0	JB01	1	0	\N	1	-    	-   	-   
B000000584	Antalgin 250 mg inj	AMP5	AMP5		1467	1467	1760	1760	1760	1760	1760	1760	1760	2787	1760	1760	0	JB02	1	0	\N	1	-    	-   	-   
B000000585	Macef inj	AMP5	AMP5		275000	275000	330000	330000	330000	330000	330000	330000	330000	522500	330000	330000	0	JB02	1	0	\N	1	-    	-   	-   
B000000586	Antrain Injeksi	AMP5	AMP5		10450	10450	12540	12540	12540	12540	12540	12540	12540	19855	12540	12540	0	JB02	1	0	2018-04-30	1	-    	-   	-   
B000000587	Antrain Tablet	TAB 	TAB 		1705	1705	2046	2046	2046	2046	2046	2046	2046	3240	2046	2046	0	JB01	1	0	2021-03-01	1	-    	-   	-   
B000000588	Apialys Drop*	DRP 	DRP 		27951	39930	47916	47916	47916	47916	47916	47916	47916	75867	47916	47916	0	JB01	1	0	2018-11-30	1	-    	-   	-   
B000000589	Apialys Sirup*	SYR 	SYR 		20790	29700	35640	35640	35640	35640	35640	35640	35640	56430	35640	35640	0	JB01	1	0	2023-01-11	1	-    	-   	-   
B000000590	Aqua P. I Otsuka 25 ML	VL  	VL  		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB02	1	0	2019-09-30	1	-    	-   	-   
B000000591	Artoflam	CAP 	CAP 		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB01	1	0	\N	1	-    	-   	-   
B000000592	Artrodar	CAP 	CAP 		8000	8000	9600	9600	9600	9600	9600	9600	9600	15200	9600	9600	0	JB01	1	0	\N	1	-    	-   	-   
B000000593	Asam Mefenamat 500 mg	TAB 	TAB 		220	220	264	264	264	264	264	264	264	418	264	264	0	JB01	1	0	\N	1	-    	-   	-   
B000000594	Aspilet Tablet	TAB 	TAB 		583	583	700	700	700	700	700	700	700	1108	700	700	0	JB01	1	0	\N	1	-    	-   	-   
B000000595	Astacor Kap*	CAP 	CAP 		8800	8800	10560	10560	10560	10560	10560	10560	10560	16720	10560	10560	0	JB01	1	0	\N	1	-    	-   	-   
B000000596	Astadiab Kap*	CAP 	CAP 		8800	8800	10560	10560	10560	10560	10560	10560	10560	16720	10560	10560	0	JB01	1	0	\N	1	-    	-   	-   
B000000597	Asta Plus Tablet*	TAB 	TAB 		8250	8250	9900	9900	9900	9900	9900	9900	9900	15675	9900	9900	0	JB01	1	0	2019-10-01	1	-    	-   	-   
B000000598	Asthin Force 6 mg Kapsul*	CAP 	CAP 		9350	9350	11220	11220	11220	11220	11220	11220	11220	17765	11220	11220	0	JB01	1	0	2018-08-31	1	-    	-   	-   
B000000599	Atropin Sulfat Injeksi	VL  	VL  		2000	2000	2400	2400	2400	2400	2400	2400	2400	3800	2400	2400	0	JB02	1	0	\N	1	-    	-   	-   
B000000600	Aungentonic 0,6 ml	BOX 	BOX 		18287	18287	21944	21944	21944	21944	21944	21944	21944	34745	21944	21944	0	JB02	1	0	\N	1	-    	-   	-   
B000000601	Axamed Kap	CAP 	CAP 		6050	6050	7260	7260	7260	7260	7260	7260	7260	11495	7260	7260	0	JB01	1	0	\N	1	-    	-   	-   
B000000602	Bactrigras 10x10 cm	BOX 	BOX 		12705	12705	15246	15246	15246	15246	15246	15246	15246	24140	15246	15246	0	JB02	1	0	\N	1	-    	-   	-   
B000000603	Baquinor Infus	BOX 	BTL 		236610	236610	283932	283932	283932	283932	283932	283932	283932	449559	283932	283932	0	JB02	20	0	2019-12-01	1	-    	-   	-   
B000000604	Becombion Syr 110 ml*	SYR 	SYR 		27500	27500	33000	33000	33000	33000	33000	33000	33000	52250	33000	33000	0	JB01	1	0	2018-09-30	1	-    	-   	-   
B000000605	Betrix Injeksi	AMP5	AMP5		203500	203500	244200	244200	244200	244200	244200	244200	244200	386650	244200	244200	0	JB02	1	0	2018-07-31	1	-    	-   	-   
B000000606	Bio Cal 95 Tablet*	TAB 	TAB 		4004	5720	6864	6864	6864	6864	6864	6864	6864	10868	6864	6864	0	JB01	1	0	2019-10-31	1	-    	-   	-   
B000000607	Biocream 20 gr 	TUB 	TUB 		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB01	1	0	\N	1	-    	-   	-   
B000000608	Biodiar Tablet	TAB 	TAB 		1650	1650	1980	1980	1980	1980	1980	1980	1980	3135	1980	1980	0	JB01	1	0	\N	1	-    	-   	-   
B000000610	Bioxon Injeksi	AMP5	AMP5		217800	217800	261360	261360	261360	261360	261360	261360	261360	413820	261360	261360	0	JB02	1	0	\N	1	-    	-   	-   
B000000611	Blistra inj	AMP5	AMP5		187000	187000	224400	224400	224400	224400	224400	224400	224400	355300	224400	224400	0	JB02	1	0	\N	1	-    	-   	-   
B000000612	Brainact 500 mg Injeksi	AMP5	AMP5		73260	73260	87912	87912	87912	87912	87912	87912	87912	139194	87912	87912	0	JB02	1	0	2018-08-31	1	-    	-   	-   
B000000613	Brainact 500 mg Tablet	TAB 	TAB 		10256	14652	17582	17582	17582	17582	17582	17582	17582	27839	17582	17582	0	JB01	1	0	2019-09-30	1	-    	-   	-   
B000000614	Braxidin Tab	TAB 	TAB 		902	902	1082	1082	1082	1082	1082	1082	1082	1714	1082	1082	0	JB01	1	0	2018-08-31	1	-    	-   	-   
B000000615	Bricasma inj	AMP5	AMP5		19728	19728	23674	23674	23674	23674	23674	23674	23674	37483	23674	23674	0	JB02	1	0	\N	1	-    	-   	-   
B000000616	Bricasma Tablet	TAB 	TAB 		2375	2375	2850	2850	2850	2850	2850	2850	2850	4512	2850	2850	0	JB01	1	0	\N	1	-    	-   	-   
B000000617	Burnazin cream 35 gr	CRM 	CRM 		48950	48950	58740	58740	58740	58740	58740	58740	58740	93005	58740	58740	0	JB02	1	0	2019-10-31	1	-    	-   	-   
B000000618	Bronchopront 100ml	SYR 	SYR 		53240	53240	63888	63888	63888	63888	63888	63888	63888	101156	63888	63888	0	JB01	1	0	2018-09-30	1	-    	-   	-   
B000000619	B	AMP5	AMP5		63800	63800	76560	76560	76560	76560	76560	76560	76560	121220	76560	76560	0	JB02	1	0	\N	1	-    	-   	-   
B000000620	Buscopan 10mg	TAB 	TAB 		2527	2527	3032	3032	3032	3032	3032	3032	3032	4801	3032	3032	0	JB01	1	0	\N	1	-    	-   	-   
B000000621	Ca gluconas inj	AMP5	AMP5		15000	15000	18000	18000	18000	18000	18000	18000	18000	28500	18000	18000	0	JB02	1	0	\N	1	-    	-   	-   
B000000622	Cal 95*	TAB 	TAB 		4840	4840	5808	5808	5808	5808	5808	5808	5808	9196	5808	5808	0	JB01	1	0	2020-05-01	1	-    	-   	-   
B000000623	Captopril 12.5 mg	TAB 	TAB 		99	99	119	119	119	119	119	119	119	188	119	119	0	JB01	1	0	\N	1	-    	-   	-   
B000000624	Captopril 25 mg	TAB 	TAB 		151.8	151.8	182	182	182	182	182	182	182	288	182	182	0	JB01	1	0	2020-09-01	1	-    	-   	-   
B000000625	Cataflam 50 mg FAST	TAB 	TAB 		7722	7722	9266	9266	9266	9266	9266	9266	9266	14672	9266	9266	0	JB01	1	0	2018-05-31	1	-    	-   	-   
B000000626	Catarlent cendo 15 ml	BTL 	BTL 		33688	33688	40426	40426	40426	40426	40426	40426	40426	64007	40426	40426	0	JB01	1	0	2019-05-31	1	-    	-   	-   
B000000627  	Cedocard 10 mg	TAB 	TAB 		1250	1786	2143	2143	2143	2143	2143	2143	2143	3393	2143	2143	0	JB01	1	0	2025-04-22	1	-    	-   	-   
B000000628	Cedocard 5 mg	TAB 	TAB 		757	1262	1514	1514	1514	1514	1514	1514	1514	2398	1514	1514	0	JB01	1	0	2026-04-22	1	-    	-   	-   
B000000629	Cefadroxyl 500 mg Kapsul	CAP 	CAP 		840	840	1008	1008	1008	1008	1008	1008	1008	1596	1008	1008	0	JB01	1	0	2020-04-30	1	-    	-   	-   
B000000630	Cefat Kapsul 500 mg	TAB 	TAB 		10615	10615	12738	12738	12738	12738	12738	12738	12738	20168	12738	12738	0	JB01	1	0	2019-02-01	1	-    	-   	-   
B000000631	Cefat Forte Sirup 250 mg	SYR 	SYR 		75130	75130	90156	90156	90156	90156	90156	90156	90156	142747	90156	90156	0	JB01	1	0	2019-11-30	1	-    	-   	-   
B000000632	Cefila 100 mg Kapsul	CAP 	CAP 		19250	19250	23100	23100	23100	23100	23100	23100	23100	36575	23100	23100	0	JB01	1	0	2020-08-31	1	-    	-   	-   
B000000633	Cefila Sirup	SYR 	SYR 		85800	85800	102960	102960	102960	102960	102960	102960	102960	163020	102960	102960	0	JB01	1	0	2018-08-31	1	-    	-   	-   
B000000634	Cefixime 100 mg Kapsul	TAB 	TAB 		2897.4	2897.4	3477	3477	3477	3477	3477	3477	3477	5505	3477	3477	0	JB01	1	0	2019-09-01	1	-    	-   	-   
B000000635	Cefotaxime inj	AMP5	AMP5		9350	9350	11220	11220	11220	11220	11220	11220	11220	17765	11220	11220	0	JB02	1	0	\N	1	-    	-   	-   
B000000636	Ceftamax Injeksi	AMP5	AMP5		192500	192500	231000	231000	231000	231000	231000	231000	231000	365750	231000	231000	0	JB02	1	0	2018-05-31	1	-    	-   	-   
B000000637	Ceftriaxone Injeksi	AMP5	AMP5		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB02	1	0	2019-04-30	1	-    	-   	-   
B000000638	Dumin Rectal 250 mg Suppositoria	REC 	REC 		17908	17908	21490	21490	21490	21490	21490	21490	21490	34025	21490	21490	0	JB02	1	0	\N	1	-    	-   	-   
B000000639	Cefxon Injeksi	AMP5	AMP5		209000	209000	250800	250800	250800	250800	250800	250800	250800	397100	250800	250800	0	JB02	1	0	2019-07-01	1	-    	-   	-   
B000000640	Cendo Asthenof 5 ml	BTL 	BTL 		23100	23100	27720	27720	27720	27720	27720	27720	27720	43890	27720	27720	0	JB01	1	0	2019-12-31	1	-    	-   	-   
B000000641	Cendo carpine 1% 5 ml	TAB 	TAB 		17050	17050	20460	20460	20460	20460	20460	20460	20460	32395	20460	20460	0	JB01	1	0	\N	1	-    	-   	-   
B000000642	Cendo Efrisel 10% ED	TAB 	TAB 		16775	16775	20130	20130	20130	20130	20130	20130	20130	31872	20130	20130	0	JB01	1	0	\N	1	-    	-   	-   
B000000643	Cendo Fenicol 0,5% 5 ml	TAB 	TAB 		33688	33688	40426	40426	40426	40426	40426	40426	40426	64007	40426	40426	0	JB01	1	0	\N	1	-    	-   	-   
B000000644	Cendo lyteers 0,6 ml 	MIN 	MIN 		16225	16225	19470	19470	19470	19470	19470	19470	19470	30828	19470	19470	0	JB01	1	0	\N	1	-    	-   	-   
B000000645	Cendo Lyteers 15 ml 	TAB 	TAB 		24750	24750	29700	29700	29700	29700	29700	29700	29700	47025	29700	29700	0	JB01	1	0	2019-11-01	1	-    	-   	-   
B000000646	Mycos Salep Mata 3,5 gr	TAB 	TAB 		28875	28875	34650	34650	34650	34650	34650	34650	34650	54862	34650	34650	0	JB01	1	0	\N	1	-    	-   	-   
B000000647	Cendo Mydriatyl 1% 5ml	TAB 	TAB 		42075	42075	50490	50490	50490	50490	50490	50490	50490	79942	50490	50490	0	JB01	1	0	\N	1	-    	-   	-   
B000000648	Cendo mydriatyl 0,5% 5mL	TAB 	TAB 		31763	31763	38116	38116	38116	38116	38116	38116	38116	60350	38116	38116	0	JB01	1	0	\N	1	-    	-   	-   
B000000649	Cendo statrol 5 Ml	TAB 	TAB 		20075	20075	24090	24090	24090	24090	24090	24090	24090	38142	24090	24090	0	JB01	1	0	\N	1	-    	-   	-   
B000000650	Cendo tropin 0,5% 5ml	TAB 	TAB 		12375	12375	14850	14850	14850	14850	14850	14850	14850	23512	14850	14850	0	JB01	1	0	\N	1	-    	-   	-   
B000000651	Tomit tab	TAB 	TAB 		660	660	792	792	792	792	792	792	792	1254	792	792	0	JB01	1	0	2018-03-01	1	-    	-   	-   
B000000652	Cendo xitrol 0,6ml MiniDose	MIN 	MIN 		26813	26813	32176	32176	32176	32176	32176	32176	32176	50945	32176	32176	0	JB01	1	0	\N	1	-    	-   	-   
B000000653	Cendo tropin ED	TUB 	TUB 		14300	14300	17160	17160	17160	17160	17160	17160	17160	27170	17160	17160	0	JB02	1	0	\N	1	-    	-   	-   
B000000654	Cenfresh 0,6ml Minidose	MIN 	MIN 		25300	25300	30360	30360	30360	30360	30360	30360	30360	48070	30360	30360	0	JB02	1	0	2019-12-31	1	-    	-   	-   
B000000655	Infus RL Pipih WIDA tutup Karet	INF 	INF 		12100	12100	14520	14520	14520	14520	14520	14520	14520	22990	14520	14520	0	JB03	1	0	2018-10-01	1	-    	-   	-   
B000000656	Cephaflox inj	AMP5	AMP5		192500	192500	231000	231000	231000	231000	231000	231000	231000	365750	231000	231000	0	JB02	1	0	\N	1	-    	-   	-   
B000000657	Fordesia tab	BOX 	BOX 		24129	24129	28955	28955	28955	28955	28955	28955	28955	45845	28955	28955	0	JB02	1	0	2018-02-28	1	-    	-   	-   
B000000658	Cernevit Injeksi	AMP5	AMP5		170500	170500	204600	204600	204600	204600	204600	204600	204600	323950	204600	204600	0	JB02	1	0	2018-05-31	1	-    	-   	-   
B000000659	Ceteron 4 mg inj	AMP5	AMP5		22095	22095	26514	26514	26514	26514	26514	26514	26514	41980	26514	26514	0	JB02	1	0	\N	1	-    	-   	-   
B000000660	Cetirizine 10mg	TAB 	TAB 		367	367	440	440	440	440	440	440	440	697	440	440	0	JB01	1	0	2019-10-31	1	-    	-   	-   
B000000661	Cholescor Kap*	CAP 	CAP 		7500	7500	9000	9000	9000	9000	9000	9000	9000	14250	9000	9000	0	JB01	1	0	\N	1	-    	-   	-   
B000000662	Ciprofloxacin 500 mg Tablet	TAB 	TAB 		473	473	568	568	568	568	568	568	568	899	568	568	0	JB01	1	0	\N	1	-    	-   	-   
B000000663	Ciprofloxacin Infus	INF 	INF 		28600	28600	34320	34320	34320	34320	34320	34320	34320	54340	34320	34320	0	JB02	1	0	\N	1	-    	-   	-   
B000000664	Citicolin 250 mg inj	AMP5	AMP5		18150	18150	21780	21780	21780	21780	21780	21780	21780	34485	21780	21780	0	JB02	1	0	2018-09-30	1	-    	-   	-   
B000000665	Cl	SYR 	SYR 		52360	52360	62832	62832	62832	62832	62832	62832	62832	99484	62832	62832	0	JB01	1	0	\N	1	-    	-   	-   
B000000666	Claneksi DS forte	SYR 	SYR 		71885	71885	86262	86262	86262	86262	86262	86262	86262	136582	86262	86262	0	JB01	1	0	2018-12-31	1	-    	-   	-   
B000000667	Claneksi Tablet	CAP 	CAP 		12292	12292	14750	14750	14750	14750	14750	14750	14750	23355	14750	14750	0	JB01	1	0	2018-10-31	1	-    	-   	-   
B000000668	Clindamycin 300 mg	CAP 	CAP 		1426	1426	1711	1711	1711	1711	1711	1711	1711	2709	1711	1711	0	JB01	1	0	2019-12-31	1	-    	-   	-   
B000000669	Clinmas 300mg Tab	CAP 	CAP 		6600	6600	7920	7920	7920	7920	7920	7920	7920	12540	7920	7920	0	JB01	1	0	\N	1	-    	-   	-   
B000000670	Clovertil Tablet	TAB 	TAB 		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB01	1	0	2019-08-01	1	-    	-   	-   
B000000671	Codein 10 mg Tablet	TAB 	TAB 		605	605	726	726	726	726	726	726	726	1150	726	726	0	JB01	1	0	\N	1	-    	-   	-   
B000000672	Codipront Kap	CAP 	CAP 		7216	7216	8659	8659	8659	8659	8659	8659	8659	13710	8659	8659	0	JB01	1	0	\N	1	-    	-   	-   
B000000673	Regrou Forte 30 ml	BTL 	BTL 		89843	89843	107812	107812	107812	107812	107812	107812	107812	170702	107812	107812	0	JB01	1	0	\N	1	-    	-   	-   
B000000674	Pantogar Kap*	KAP 	KAP 		5646	5646	6775	6775	6775	6775	6775	6775	6775	10727	6775	6775	0	JB01	1	0	\N	1	-    	-   	-   
B000000675	Combantrin 125 mg	TAB 	TAB 		2345	2345	2814	2814	2814	2814	2814	2814	2814	4456	2814	2814	0	JB01	1	0	\N	1	-    	-   	-   
B000000676	Comtusi Forte Kapsul	CAP 	CAP 		2200	2200	2640	2640	2640	2640	2640	2640	2640	4180	2640	2640	0	JB01	1	0	2018-11-30	1	-    	-   	-   
B000000677	Comtusi Anak  Strawberry 60 ml	SYR 	SYR 		37400	37400	44880	44880	44880	44880	44880	44880	44880	71060	44880	44880	0	JB01	1	0	2018-11-30	1	-    	-   	-   
B000000678	Cortamine tab	TAB 	TAB 		2057	2057	2468	2468	2468	2468	2468	2468	2468	3908	2468	2468	0	JB01	1	0	\N	1	-    	-   	-   
B000000679	Cortidex Injeksi	AMP5	AMP5		7006	7006	8407	8407	8407	8407	8407	8407	8407	13311	8407	8407	0	JB02	1	0	2019-06-30	1	-    	-   	-   
B000000681	Cravox 500 mg inf	INF 	INF 		192500	192500	231000	231000	231000	231000	231000	231000	231000	365750	231000	231000	0	JB02	1	0	\N	1	-    	-   	-   
B000000682	Criax Injeksi	AMP5	AMP5		203500	203500	244200	244200	244200	244200	244200	244200	244200	386650	244200	244200	0	JB02	1	0	2019-09-01	1	-    	-   	-   
B000000683	Cryptal 200 mg	TAB 	TAB 		63250	63250	75900	75900	75900	75900	75900	75900	75900	120175	75900	75900	0	JB01	1	0	2019-10-31	1	-    	-   	-   
B000000684	Curliv plus 	SYR 	SYR 		44000	44000	52800	52800	52800	52800	52800	52800	52800	83600	52800	52800	0	JB01	1	0	\N	1	-    	-   	-   
B000000685	Curvit Sirup*	TAB 	TAB 		24200	24200	29040	29040	29040	29040	29040	29040	29040	45980	29040	29040	0	JB01	1	0	2018-08-31	1	-    	-   	-   
B000000686	Cygest 200 Suppositoria	TAB 	TAB 		14641	14641	17569	17569	17569	17569	17569	17569	17569	27818	17569	17569	0	JB01	1	0	2017-12-31	1	-    	-   	-   
B000000687	Cygest 400 Suppositoria	TAB 	TAB 		26620	26620	31944	31944	31944	31944	31944	31944	31944	50578	31944	31944	0	JB01	1	0	2018-12-31	1	-    	-   	-   
B000000688	XXX	TAB 	TAB 		3080	3080	3696	3696	3696	3696	3696	3696	3696	5852	3696	3696	0	JB01	1	0	\N	1	-    	-   	-   
B000000689	Damaben	TAB 	TAB 		418	418	502	502	502	502	502	502	502	794	502	502	0	JB01	1	0	\N	1	-    	-   	-   
B000000690	Danstar 1.  400gr	TAB 	TAB 		33727	33727	40472	40472	40472	40472	40472	40472	40472	64081	40472	40472	0	JB01	1	0	\N	1	-    	-   	-   
B000000691	Dermakel gel	GEL 	GEL 		132000	132000	158400	158400	158400	158400	158400	158400	158400	250800	158400	158400	0	JB01	1	0	\N	1	-    	-   	-   
B000000692	Dexamethason Tablet	TAB 	TAB 		87	87	104	104	104	104	104	104	104	165	104	104	0	JB01	1	0	\N	1	-    	-   	-   
B000000693	Dexamethason inj	AMP5	AMP5		2417	2417	2900	2900	2900	2900	2900	2900	2900	4592	2900	2900	0	JB02	1	0	\N	1	-    	-   	-   
B000000694	Dextamine Tablet	TAB 	TAB 		1815	1815	2178	2178	2178	2178	2178	2178	2178	3448	2178	2178	0	JB01	1	0	\N	1	-    	-   	-   
B000000695	Diabex forte 850 mg	TAB 	TAB 		2057	2057	2468	2468	2468	2468	2468	2468	2468	3908	2468	2468	0	JB01	1	0	\N	1	-    	-   	-   
B000000696	Diazepam	TAB 	TAB 		31	31	37	37	37	37	37	37	37	59	37	37	0	JB01	1	0	\N	1	-    	-   	-   
B000000697	Plexion 50 mg tab	BOX 	BOX 		3300	3300	3960	3960	3960	3960	3960	3960	3960	6270	3960	3960	0	JB01	1	0	\N	1	-    	-   	-   
B000000698	Digoxin 0.25 mg	TAB 	TAB 		143	143	172	172	172	172	172	172	172	272	172	172	0	JB01	1	0	\N	1	-    	-   	-   
B000000699	Diphenhidramin Injeksi	AMP5	AMP5		1865	1865	2238	2238	2238	2238	2238	2238	2238	3544	2238	2238	0	JB02	1	0	\N	1	-    	-   	-   
B000000700	Disflatyl	TAB 	TAB 		556	556	667	667	667	667	667	667	667	1056	667	667	0	JB01	1	0	2019-08-31	1	-    	-   	-   
B000000701	Disolf Tablet*	TAB 	TAB 		7150	7150	8580	8580	8580	8580	8580	8580	8580	13585	8580	8580	0	JB01	1	0	\N	1	-    	-   	-   
B000000702	Diuvar inj	AMP5	AMP5		8800	8800	10560	10560	10560	10560	10560	10560	10560	16720	10560	10560	0	JB02	1	0	\N	1	-    	-   	-   
B000000703	Dogmatil 50 mg Kapsul	CAP 	CAP 		3300	3300	3960	3960	3960	3960	3960	3960	3960	6270	3960	3960	0	JB01	1	0	2020-08-31	1	-    	-   	-   
B000000704	Doksisiklin	TAB 	TAB 		370	370	444	444	444	444	444	444	444	703	444	444	0	JB01	1	0	\N	1	-    	-   	-   
B000000705	Dominic 5 ml	VL  	VL  		121000	121000	145200	145200	145200	145200	145200	145200	145200	229900	145200	145200	0	JB02	1	0	\N	1	-    	-   	-   
B000000706	Domperidone	TAB 	TAB 		403	403	484	484	484	484	484	484	484	766	484	484	0	JB01	1	0	\N	1	-    	-   	-   
B000000707	Dopac inj	TAB 	TAB 		46200	46200	55440	55440	55440	55440	55440	55440	55440	87780	55440	55440	0	JB01	1	0	\N	1	-    	-   	-   
B000000708	Dulcolax 5 mg	TAB 	TAB 		962	962	1154	1154	1154	1154	1154	1154	1154	1828	1154	1154	0	JB01	1	0	\N	1	-    	-   	-   
B000000709	Dumin Rectal 125 mg Suppositoria	SUP 	SUP 		14109	14109	16931	16931	16931	16931	16931	16931	16931	26807	16931	16931	0	JB02	1	0	2020-01-31	1	-    	-   	-   
B000000710	XXX	SUP 	SUP 		14960	14960	17952	17952	17952	17952	17952	17952	17952	28424	17952	17952	0	JB01	1	0	\N	1	-    	-   	-   
B000000711	Dumin 500 mg Kap	CAP 	CAP 		368	368	442	442	442	442	442	442	442	699	442	442	0	JB01	1	0	\N	1	-    	-   	-   
B000000712	Ostovell Kapsul*	CAP 	CAP 		7150	7150	8580	8580	8580	8580	8580	8580	8580	13585	8580	8580	0	JB01	1	0	\N	1	-    	-   	-   
B000000713	Durogesic 12.5 MU Pacth	PAC 	PAC 		125400	125400	150480	150480	150480	150480	150480	150480	150480	238260	150480	150480	0	JB01	1	0	\N	1	-    	-   	-   
B000000714	Efotax Injeksi	AMP5	AMP5		143000	143000	171600	171600	171600	171600	171600	171600	171600	271700	171600	171600	0	JB02	1	0	\N	1	-    	-   	-   
B000000715	Elox cream 5 gram	TUB 	TUB 		44000	44000	52800	52800	52800	52800	52800	52800	52800	83600	52800	52800	0	JB02	1	0	\N	1	-    	-   	-   
B000000716	Infus NS Pipih WIDA tutup karet	INF 	INF 		10010	10010	12012	12012	12012	12012	12012	12012	12012	19019	12012	12012	0	JB03	1	0	\N	1	-    	-   	-   
B000000717	Enercore Sachet*	BKS 	BKS 		19800	19800	23760	23760	23760	23760	23760	23760	23760	37620	23760	23760	0	JB01	1	0	\N	1	-    	-   	-   
B000000718	Digenta Cream 10 gr	INF 	INF 		77000	77000	92400	92400	92400	92400	92400	92400	92400	146300	92400	92400	0	JB03	1	0	2018-11-01	1	-    	-   	-   
B000000719	Nymiko Drop	DRP 	DRP 		33550	33550	40260	40260	40260	40260	40260	40260	40260	63745	40260	40260	0	JB01	1	0	\N	1	-    	-   	-   
B000000720	CPG 75 mg tab	TAB 	TAB 		15694	15694	18833	18833	18833	18833	18833	18833	18833	29819	18833	18833	0	JB01	1	0	\N	1	-    	-   	-   
B000000721	Entrasol Active Vanila Latte 160 gr	BOX 	BOX 		25122	25122	30146	30146	30146	30146	30146	30146	30146	47732	30146	30146	0	J007	1	0	2018-05-29	1	-    	-   	-   
B000000727	Epsonal tab	TAB 	TAB 		3630	3630	4356	4356	4356	4356	4356	4356	4356	6897	4356	4356	0	JB01	1	0	\N	1	-    	-   	-   
B000000728	Erysanbe 500 Tablet	KAP 	KAP 		2706	2706	3247	3247	3247	3247	3247	3247	3247	5141	3247	3247	0	JB01	1	0	2020-09-30	1	-    	-   	-   
B000000729	Esilgan 1 mg	TAB 	TAB 		3232	3232	3878	3878	3878	3878	3878	3878	3878	6141	3878	3878	0	JB01	1	0	\N	1	-    	-   	-   
B000000730	Esilgan 2 mg	TAB 	TAB 		5442	5442	6530	6530	6530	6530	6530	6530	6530	10340	6530	6530	0	JB01	1	0	\N	1	-    	-   	-   
B000000731	Exforge 10/160 Tablet	TAB 	TAB 		18315	18315	21978	21978	21978	21978	21978	21978	21978	34798	21978	21978	0	JB01	1	0	\N	1	-    	-   	-   
B000000732	Exforge 5/160	TAB 	TAB 		14822	14822	17786	17786	17786	17786	17786	17786	17786	28162	17786	17786	0	JB01	1	0	\N	1	-    	-   	-   
B000000733	Exforge 5/80 Tablet	TAB 	TAB 		14630	14630	17556	17556	17556	17556	17556	17556	17556	27797	17556	17556	0	JB01	1	0	2019-04-30	1	-    	-   	-   
B000000734	Eyefresh 5 ml	TAB 	TAB 		31763	31763	38116	38116	38116	38116	38116	38116	38116	60350	38116	38116	0	JB01	1	0	2019-11-30	1	-    	-   	-   
B000000735	Eyefresh Plus 0,6 ml	MIN 	MIN 		38363	38363	46036	46036	46036	46036	46036	46036	46036	72890	46036	46036	0	JB01	1	0	\N	1	-    	-   	-   
B000000736	Eyevit  Tablet*	TAB 	TAB 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	\N	1	-    	-   	-   
B000000737	Farmacrol Forte Sirup 100 ml	SYR 	SYR 		40700	40700	48840	48840	48840	48840	48840	48840	48840	77330	48840	48840	0	JB01	1	0	2019-05-01	1	-    	-   	-   
B000000738	Farmadol Infus	INF 	INF 		62700	62700	75240	75240	75240	75240	75240	75240	75240	119130	75240	75240	0	JB02	1	0	2018-04-30	1	-    	-   	-   
B000000739	Farnat inf	INF 	INF 		72600	72600	87120	87120	87120	87120	87120	87120	87120	137940	87120	87120	0	JB02	1	0	\N	1	-    	-   	-   
B000000740	Farsix tab	TAB 	TAB 		990	990	1188	1188	1188	1188	1188	1188	1188	1881	1188	1188	0	JB01	1	0	\N	1	-    	-   	-   
B000000741	Fartolin inhaler nebule	TUB 	TUB 		16500	16500	19800	19800	19800	19800	19800	19800	19800	31350	19800	19800	0	JB02	1	0	\N	1	-    	-   	-   
B000000742	Fenatic	SYR 	SYR 		15400	15400	18480	18480	18480	18480	18480	18480	18480	29260	18480	18480	0	JB01	1	0	\N	1	-    	-   	-   
B000000743	Fentanyl Injeksi	AMP5	AMP5		48400	48400	58080	58080	58080	58080	58080	58080	58080	91960	58080	58080	0	JB02	1	0	\N	1	-    	-   	-   
B000000744	FG Troches	TAB 	TAB 		1045	1045	1254	1254	1254	1254	1254	1254	1254	1986	1254	1254	0	JB01	1	0	\N	1	-    	-   	-   
B000000745	Fibrinase*	TAB 	TAB 		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB01	1	0	\N	1	-    	-   	-   
B000000746	Fita joint roller	TAB 	TAB 		80300	80300	96360	96360	96360	96360	96360	96360	96360	152570	96360	96360	0	JB01	1	0	\N	1	-    	-   	-   
B000000747	Flagyl Oral Suspension 60 ml syr	SYR 	SYR 		51520	51520	61824	61824	61824	61824	61824	61824	61824	97888	61824	61824	0	JB01	1	0	\N	1	-    	-   	-   
B000000748	Fleet Enema 	TAB 	TAB 		104181	104181	125017	125017	125017	125017	125017	125017	125017	197944	125017	125017	0	JB01	1	0	2019-01-27	1	-    	-   	-   
B000000749	Fleet phosposoda	SYR 	SYR 		72600	72600	87120	87120	87120	87120	87120	87120	87120	137940	87120	87120	0	JB01	1	0	\N	1	-    	-   	-   
B000000750	Floxa 0,6 ml MD	TAB 	TAB 		29425	29425	35310	35310	35310	35310	35310	35310	35310	55908	35310	35310	0	JB01	1	0	\N	1	-    	-   	-   
B000000751	Folacom tab	TAB 	TAB 		766	766	919	919	919	919	919	919	919	1455	919	919	0	JB01	1	0	\N	1	-    	-   	-   
B000000752	Folamil Genio Cap*	CAP 	CAP 		3410	3410	4092	4092	4092	4092	4092	4092	4092	6479	4092	4092	0	JB01	1	0	\N	1	-    	-   	-   
B000000753	Folaplus Tablet*	TAB 	TAB 		880	880	1056	1056	1056	1056	1056	1056	1056	1672	1056	1056	0	JB01	1	0	\N	1	-    	-   	-   
B000000754	Folda*	TAB 	TAB 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	2019-11-01	1	-    	-   	-   
B000000755	Forinfec gargle	TAB 	TAB 		15400	15400	18480	18480	18480	18480	18480	18480	18480	29260	18480	18480	0	JB01	1	0	\N	1	-    	-   	-   
B000000756	Forneuro Tablet*	TAB 	TAB 		5317	5317	6380	6380	6380	6380	6380	6380	6380	10102	6380	6380	0	JB01	1	0	2018-10-30	1	-    	-   	-   
B000000757	Frego 5 mg Tablet	TAB 	TAB 		6050	6050	7260	7260	7260	7260	7260	7260	7260	11495	7260	7260	0	JB01	1	0	2018-10-31	1	-    	-   	-   
B000000758	Fresh diab Kap*	KAP 	KAP 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	\N	1	-    	-   	-   
B000000759	Fucoidan 100 mg Kapsul*	KAP 	KAP 		11550	11550	13860	13860	13860	13860	13860	13860	13860	21945	13860	13860	0	JB01	1	0	\N	1	-    	-   	-   
B000000760	Fudanton 4 mg inj	AMP5	AMP5		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB01	1	0	\N	1	-    	-   	-   
B000000761	Fungasol 200 mg 	TAB 	TAB 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	\N	1	-    	-   	-   
B000000762	Furosemid inj	AMP5	AMP5		2058	2058	2470	2470	2470	2470	2470	2470	2470	3910	2470	2470	0	JB01	1	0	\N	1	-    	-   	-   
B000000763	Fuson cream	TUB 	TUB 		37950	37950	45540	45540	45540	45540	45540	45540	45540	72105	45540	45540	0	JB02	1	0	\N	1	-    	-   	-   
B000000764	Futamel 7.5 mg tab	TAB 	TAB 		3300	3300	3960	3960	3960	3960	3960	3960	3960	6270	3960	3960	0	JB01	1	0	\N	1	-    	-   	-   
B000000765	Futaxon inj	AMP5	AMP5		176000	176000	211200	211200	211200	211200	211200	211200	211200	334400	211200	211200	0	JB02	1	0	\N	1	-    	-   	-   
B000000767	Gastridin Injeksi	AMP5	AMP5		23100	23100	27720	27720	27720	27720	27720	27720	27720	43890	27720	27720	0	JB02	1	0	2018-08-01	1	-    	-   	-   
B000000768	Gastridin Tablet	TAB 	TAB 		4950	4950	5940	5940	5940	5940	5940	5940	5940	9405	5940	5940	0	JB01	1	0	\N	1	-    	-   	-   
B000000769	Gastrul tab	TAB 	TAB 		11000	11000	13200	13200	13200	13200	13200	13200	13200	20900	13200	13200	0	JB01	1	0	2018-06-30	1	-    	-   	-   
B000000770	Gavistal Sirup	BTL 	BTL 		9625	9625	11550	11550	11550	11550	11550	11550	11550	18288	11550	11550	0	J008	1	0	2019-10-31	1	-    	-   	-   
B000000771	Gentamicin Injeksi	AMP5	AMP5		3693	3693	4432	4432	4432	4432	4432	4432	4432	7017	4432	4432	0	JB02	1	0	\N	1	-    	-   	-   
B000000772	Gentamicin Salep Kulit GNR	SAL 	SAL 		2046	2046	2455	2455	2455	2455	2455	2455	2455	3887	2455	2455	0	JB02	1	0	2020-02-01	1	-    	-   	-   
B000000773	Gentamicin Salep Mata Cendo	SAL 	SAL 		40013	40013	48016	48016	48016	48016	48016	48016	48016	76025	48016	48016	0	JB02	1	0	\N	1	-    	-   	-   
B000000774	Gentamicin Tetes Mata Cendo	TUB 	TUB 		31213	31213	37456	37456	37456	37456	37456	37456	37456	59305	37456	37456	0	JB02	1	0	\N	1	-    	-   	-   
B000000775	Getidin inj	AMP5	AMP5		18700	18700	22440	22440	22440	22440	22440	22440	22440	35530	22440	22440	0	JB02	1	0	\N	1	-    	-   	-   
B000000776	Gitas Injeksi	AMP5	AMP5		24750	24750	29700	29700	29700	29700	29700	29700	29700	47025	29700	29700	0	JB02	1	0	\N	1	-    	-   	-   
B000000777	Gitas Plus Tablet	TAB 	TAB 		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB01	1	0	\N	1	-    	-   	-   
B000000778	Glibenclamid tab	TAB 	TAB 		79	79	95	95	95	95	95	95	95	150	95	95	0	JB01	1	0	\N	1	-    	-   	-   
B000000779	Gliseril guanikolat tab	TAB 	TAB 		100	100	120	120	120	120	120	120	120	190	120	120	0	JB01	1	0	\N	1	-    	-   	-   
B000000780	Govotil inj	AMP5	AMP5		20570	20570	24684	24684	24684	24684	24684	24684	24684	39083	24684	24684	0	JB02	1	0	\N	1	-    	-   	-   
B000000781	Granon 3 Injeksi	AMP5	AMP5		121000	121000	145200	145200	145200	145200	145200	145200	145200	229900	145200	145200	0	JB02	1	0	2018-06-01	1	-    	-   	-   
B000000782	Grazol 200 mg tab	TAB 	TAB 		3933	3933	4720	4720	4720	4720	4720	4720	4720	7473	4720	4720	0	JB01	1	0	\N	1	-    	-   	-   
B000000783	HB Vit Tablet*	TAB 	TAB 		2750	2750	3300	3300	3300	3300	3300	3300	3300	5225	3300	3300	0	JB01	1	0	2019-09-30	1	-    	-   	-   
B000000784	Herbesser 50 mg Injeksi	AMP5	AMP5		297000	297000	356400	356400	356400	356400	356400	356400	356400	564300	356400	356400	0	JB02	1	0	\N	1	-    	-   	-   
B000000785	Hezandra tab*	TAB 	TAB 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	\N	1	-    	-   	-   
B000000786	Homatro 2% 5 ml	TAB 	TAB 		39050	39050	46860	46860	46860	46860	46860	46860	46860	74195	46860	46860	0	JB01	1	0	\N	1	-    	-   	-   
B000000789	Ibukal Syr	SYR 	SYR 		15400	15400	18480	18480	18480	18480	18480	18480	18480	29260	18480	18480	0	JB01	1	0	2017-09-30	1	-    	-   	-   
B000000790	Ibuprofen 200 mg	SYR 	SYR 		4496	4496	5395	5395	5395	5395	5395	5395	5395	8542	5395	5395	0	JB01	1	0	\N	1	-    	-   	-   
B000000791	Ibuprofen 400 mg	TAB 	TAB 	-	2	2	3	3	3	3	3	3	3	4	3	3	0	JB01	1	400	\N	1	-    	-   	-   
B000000792	Imboost Force Sirup 60 ml*	SYR 	SYR 		57750	57750	69300	69300	69300	69300	69300	69300	69300	109725	69300	69300	0	JB01	1	0	\N	1	-    	-   	-   
B000000793	Imboost Force Tablet*	TAB 	TAB 		6234	6234	7481	7481	7481	7481	7481	7481	7481	11845	7481	7481	0	JB01	1	0	2019-10-31	1	-    	-   	-   
B000000794	Indexon Injeksi	AMP5	AMP5		10560	10560	12672	12672	12672	12672	12672	12672	12672	20064	12672	12672	0	JB02	1	0	2019-10-01	1	-    	-   	-   
B000000795	Indexon Tablet	TAB 	TAB 		506	506	607	607	607	607	607	607	607	961	607	607	0	JB01	1	0	2020-07-31	1	-    	-   	-   
B000000796	Induxin inj	AMP5	AMP5		8800	8800	10560	10560	10560	10560	10560	10560	10560	16720	10560	10560	0	JB02	1	0	\N	1	-    	-   	-   
B000000799	Infus D5 500 ml	INF 	INF 		19965	19965	23958	23958	23958	23958	23958	23958	23958	37934	23958	23958	0	JB02	1	0	2018-12-31	1	-    	-   	-   
B000000800	inf D5 1/2 NS	INF 	INF 		20405	20405	24486	24486	24486	24486	24486	24486	24486	38770	24486	24486	0	JB02	1	0	2020-01-31	1	-    	-   	-   
B000000801	Infus D5 1/4 NS	INF 	INF 		20815	20815	24978	24978	24978	24978	24978	24978	24978	39548	24978	24978	0	JB02	1	0	2019-12-31	1	-    	-   	-   
B000000802	Infus  D5 100 ml	INF 	INF 		17819	17819	21383	21383	21383	21383	21383	21383	21383	33856	21383	21383	0	JB02	1	0	2018-12-31	1	-    	-   	-   
B000000804	Infus NS 500 ml	INF 	INF 		19085	19085	22902	22902	22902	22902	22902	22902	22902	36262	22902	22902	0	JB02	1	0	2019-12-31	1	-    	-   	-   
B000000805	inf NS 100 ml	INF 	INF 		16995	16995	20394	20394	20394	20394	20394	20394	20394	32290	20394	20394	0	JB02	1	0	2018-12-31	1	-    	-   	-   
B000000806	Infus Ring As Sanbe	INF 	INF 		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB02	1	0	2019-10-31	1	-    	-   	-   
B000000807	Infus RL Sanbe	INF 	INF 		19580	19580	23496	23496	23496	23496	23496	23496	23496	37202	23496	23496	0	JB02	1	0	2019-10-01	1	-    	-   	-   
B000000808	Infus Sanbe Hest 	INF 	INF 		203940	203940	244728	244728	244728	244728	244728	244728	244728	387486	244728	244728	0	JB02	1	0	\N	1	-    	-   	-   
B000000809	Infus Tridex 27  B	INF 	INF 		20900	20900	25080	25080	25080	25080	25080	25080	25080	39710	25080	25080	0	JB02	1	0	\N	1	-    	-   	-   
B000000810	Inpepsa Sirup	SYR 	SYR 		52800	52800	63360	63360	63360	63360	63360	63360	63360	100320	63360	63360	0	JB01	1	0	2019-08-30	1	-    	-   	-   
B000000811	interhistin Tablet	TAB 	TAB 		770	770	924	924	924	924	924	924	924	1463	924	924	0	JB01	1	50	2020-09-30	1	-    	-   	-   
B000000812	Invomit 4 mg Injeksi	AMP5	AMP5		34447	34447	41336	41336	41336	41336	41336	41336	41336	65449	41336	41336	0	JB02	1	0	2018-06-01	1	-    	-   	-   
B000000813	Invomit 4  mg Tablet	TAB 	TAB 		15950	15950	19140	19140	19140	19140	19140	19140	19140	30305	19140	19140	0	JB01	1	0	\N	1	-    	-   	-   
B000000814	Invomit 8 mg Injeksi	AMP5	AMP5		70131	70131	84157	84157	84157	84157	84157	84157	84157	133249	84157	84157	0	JB02	1	0	2018-06-01	1	-    	-   	-   
B000000815	Iretensa 150 mg Tablet	TAB 	TAB 		8800	8800	10560	10560	10560	10560	10560	10560	10560	16720	10560	10560	0	JB01	1	0	\N	1	-    	-   	-   
B000000816	Iretensa 300 mg Tablet	TAB 	TAB 		12100	12100	14520	14520	14520	14520	14520	14520	14520	22990	14520	14520	0	JB01	1	0	\N	1	-    	-   	-   
B000000817	ISDN 10 mg	TAB 	TAB 		124	124	149	149	149	149	149	149	149	236	149	149	0	JB01	1	0	2021-02-28	1	-    	-   	-   
B000000818	Isofluran 250 ml	TAB 	TAB 		1787500	1787500	2145000	2145000	2145000	2145000	2145000	2145000	2145000	3396250	2145000	2145000	0	JB01	1	0	\N	1	-    	-   	-   
B000000819	J	PCS 	PCS 		572	572	686	686	686	686	686	686	686	1087	686	686	0	JB03	1	0	\N	1	-    	-   	-   
B000000820	Kadiflam 25 mg	TAB 	TAB 		1328	1328	1594	1594	1594	1594	1594	1594	1594	2523	1594	1594	0	JB01	1	0	\N	1	-    	-   	-   
B000000821	Kaflam 25 mg	TAB 	TAB 		1741	1741	2089	2089	2089	2089	2089	2089	2089	3308	2089	2089	0	JB01	1	0	\N	1	-    	-   	-   
B000000822	Kaflam 50 mg Tablet	TAB 	TAB 		3300	3300	3960	3960	3960	3960	3960	3960	3960	6270	3960	3960	0	JB01	1	0	\N	1	-    	-   	-   
B000000823	Kalium diklofenak 50 mg	TAB 	TAB 		778	778	934	934	934	934	934	934	934	1478	934	934	0	JB01	1	0	\N	1	-    	-   	-   
B000000824	Kalmethason 5 mg inj	AMP5	AMP5		7150	7150	8580	8580	8580	8580	8580	8580	8580	13585	8580	8580	0	JB02	1	0	\N	1	-    	-   	-   
B000000825	Kalmoxillin 500 mg tab	TAB 	TAB 		2420	2420	2904	2904	2904	2904	2904	2904	2904	4598	2904	2904	0	JB01	1	0	\N	1	-    	-   	-   
B000000826	Kalmoxillin 250 mg Sirup Forte	SYR 	SYR 		30800	30800	36960	36960	36960	36960	36960	36960	36960	58520	36960	36960	0	JB01	1	0	\N	1	-    	-   	-   
B000000827	Kalnex 500 mg inj	AMP5	AMP5		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB02	1	0	\N	1	-    	-   	-   
B000000828	Kalnex 500 mg Tablet	TAB 	TAB 		3300	3300	3960	3960	3960	3960	3960	3960	3960	6270	3960	3960	0	JB01	1	0	\N	1	-    	-   	-   
B000000829	Kalxetin 10 mg Tablet	CAP 	CAP 		4033	4033	4840	4840	4840	4840	4840	4840	4840	7663	4840	4840	0	JB01	1	0	\N	1	-    	-   	-   
B000000830	Kandistatin Sirup	SYR 	SYR 		38500	38500	46200	46200	46200	46200	46200	46200	46200	73150	46200	46200	0	JB01	1	0	2018-06-01	1	-    	-   	-   
B000000832	Ketamin 500 mg hameln inj	AMP5	AMP5		170500	170500	204600	204600	204600	204600	204600	204600	204600	323950	204600	204600	0	JB02	1	0	\N	1	-    	-   	-   
B000000833	Ketesse Injeksi	AMP5	AMP5		51700	51700	62040	62040	62040	62040	62040	62040	62040	98230	62040	62040	0	JB02	1	0	2018-07-01	1	-    	-   	-   
B000000834	Ketopain 30 mg inj	AMP5	AMP5		38500	38500	46200	46200	46200	46200	46200	46200	46200	73150	46200	46200	0	JB02	1	0	\N	1	-    	-   	-   
B000000835	Ketorolac 10 mg Injeksi	AMP5	AMP5		8250	8250	9900	9900	9900	9900	9900	9900	9900	15675	9900	9900	0	JB02	1	0	\N	1	-    	-   	-   
B000000836	Lactafar Kapsul*	CAP 	CAP 		4180	4180	5016	5016	5016	5016	5016	5016	5016	7942	5016	5016	0	JB01	1	0	2018-07-31	1	-    	-   	-   
B000000837	Lactamam Tablet*	TAB 	TAB 		3327.5	3327.5	3993	3993	3993	3993	3993	3993	3993	6322	3993	3993	0	JB01	1	0	2018-04-01	1	-    	-   	-   
B000000838	Lacto B Sacchet	SAC 	SAC 		5225	5225	6270	6270	6270	6270	6270	6270	6270	9928	6270	6270	0	JB01	1	0	2018-07-31	1	-    	-   	-   
B000000839	Lactopain 30 mg inj	AMP5	AMP5		38500	38500	46200	46200	46200	46200	46200	46200	46200	73150	46200	46200	0	JB02	1	0	\N	1	-    	-   	-   
B000000840	Lameson 16 mg Tablet	TAB 	TAB 		8250	8250	9900	9900	9900	9900	9900	9900	9900	15675	9900	9900	0	JB01	1	0	\N	1	-    	-   	-   
B000000841	Lameson 4 mg Tablet	TAB 	TAB 		3355	3355	4026	4026	4026	4026	4026	4026	4026	6374	4026	4026	0	JB01	1	0	2021-10-31	1	-    	-   	-   
B000000842	La	AMP5	AMP5		85800	85800	102960	102960	102960	102960	102960	102960	102960	163020	102960	102960	0	JB02	1	0	\N	1	-    	-   	-   
B000000843	Lansoprazole 30 mg	CAP 	CAP 		1000.01	1000.01	1200	1200	1200	1200	1200	1200	1200	1900	1200	1200	0	JB01	1	0	2018-11-30	1	-    	-   	-   
B000000844	Lapibal 500 mg Kapsul*	CAP 	CAP 		2035	2035	2442	2442	2442	2442	2442	2442	2442	3866	2442	2442	0	JB01	1	0	2020-11-20	1	-    	-   	-   
B000000845	Lapibal 500 mcg inj	AMP5	AMP5		26620	26620	31944	31944	31944	31944	31944	31944	31944	50578	31944	31944	0	JB02	1	0	2020-11-01	1	-    	-   	-   
B000000846	Lapicef 500 mg Kapsul	CAP 	CAP 		12100	12100	14520	14520	14520	14520	14520	14520	14520	22990	14520	14520	0	JB01	1	0	2021-04-01	1	-    	-   	-   
B000000847	Lapifed DM 100 ml Sirup	SYR 	SYR 		27500	27500	33000	33000	33000	33000	33000	33000	33000	52250	33000	33000	0	JB01	1	0	2019-12-31	1	-    	-   	-   
B000000848	Lapifed Tablet	TAB 	TAB 		2310	2310	2772	2772	2772	2772	2772	2772	2772	4389	2772	2772	0	JB01	1	0	\N	1	-    	-   	-   
B000000849	Lapimox 500 mg tab	TAB 	TAB 		2640	2640	3168	3168	3168	3168	3168	3168	3168	5016	3168	3168	0	JB01	1	0	2019-01-01	1	-    	-   	-   
B000000850	Lapibal inj*	AMP5	AMP5		19800	19800	23760	23760	23760	23760	23760	23760	23760	37620	23760	23760	0	JB02	1	0	\N	1	-    	-   	-   
B000000851	Lapistan 500 mg Tablet	TAB 	TAB 		1320	1320	1584	1584	1584	1584	1584	1584	1584	2508	1584	1584	0	JB01	1	0	2020-11-01	1	-    	-   	-   
B000000852	Lapixime inj	AMP5	AMP5		154000	154000	184800	184800	184800	184800	184800	184800	184800	292600	184800	184800	0	JB02	1	0	2019-08-01	1	-    	-   	-   
B000000853	XXX	CAP 	CAP 		11055	11055	13266	13266	13266	13266	13266	13266	13266	21004	13266	13266	0	JB01	1	0	\N	1	-    	-   	-   
B000000854	Lasgan Kapsul	CAP 	CAP 		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB01	1	0	2019-10-01	1	-    	-   	-   
B000000855	Lasix Injeksi	AMP5	AMP5		16208	16208	19450	19450	19450	19450	19450	19450	19450	30795	19450	19450	0	JB02	1	0	2018-04-30	1	-    	-   	-   
B000000856	Lasix tab	TAB 	TAB 		4663	4663	5596	5596	5596	5596	5596	5596	5596	8860	5596	5596	0	JB01	1	0	\N	1	-    	-   	-   
B000000857	Lentikular 0.6 ml MD	MIN 	MIN 		36575	36575	43890	43890	43890	43890	43890	43890	43890	69492	43890	43890	0	JB02	1	0	\N	1	-    	-   	-   
B000000858	Lentikular ED 5 ml	MIN 	MIN 		31625	31625	37950	37950	37950	37950	37950	37950	37950	60088	37950	37950	0	JB02	1	0	\N	1	-    	-   	-   
B000000859	Levemir Insulin 	VL  	VL  		189096	189096	226915	226915	226915	226915	226915	226915	226915	359282	226915	226915	0	JB02	1	0	2018-11-30	1	-    	-   	-   
B000000860	Levofloxacin 500 mg tab	TAB 	TAB 		1269	1269	1523	1523	1523	1523	1523	1523	1523	2411	1523	1523	0	JB01	1	0	\N	1	-    	-   	-   
B000000861	Levopront Sirup	SYR 	SYR 		62436	62436	74923	74923	74923	74923	74923	74923	74923	118628	74923	74923	0	JB01	1	0	\N	1	-    	-   	-   
B000000862	lidokain 2%  Injeksi	AMP5	AMP5		1205	1205	1446	1446	1446	1446	1446	1446	1446	2290	1446	1446	0	JB02	1	0	\N	1	-    	-   	-   
B000000863	lipofood Tab*	TAB 	TAB 		4620	4620	5544	5544	5544	5544	5544	5544	5544	8778	5544	5544	0	JB01	1	0	\N	1	-    	-   	-   
B000000864	lisinopril 5 mg tab	TAB 	TAB 		352	352	422	422	422	422	422	422	422	669	422	422	0	JB01	1	0	\N	1	-    	-   	-   
B000000865	litorcom 20 mg tab	TAB 	TAB 		9533	9533	11440	11440	11440	11440	11440	11440	11440	18113	11440	11440	0	JB01	1	0	\N	1	-    	-   	-   
B000000866	lodia 2 mg tab	TAB 	TAB 		611	611	733	733	733	733	733	733	733	1161	733	733	0	JB01	1	0	2020-12-31	1	-    	-   	-   
B000000867	Loratadin Tablet	TAB 	TAB 		333	333	400	400	400	400	400	400	400	633	400	400	0	JB01	1	0	\N	1	-    	-   	-   
B000000868	loremid 2mg	TAB 	TAB 		990	990	1188	1188	1188	1188	1188	1188	1188	1881	1188	1188	0	JB01	1	0	\N	1	-    	-   	-   
B000000869	Maintate 2,5 mg Tablet	TAB 	TAB 		5120	5120	6144	6144	6144	6144	6144	6144	6144	9728	6144	6144	0	JB01	1	0	\N	1	-    	-   	-   
B000000870	matoflam tab*	TAB 	TAB 		6050	6050	7260	7260	7260	7260	7260	7260	7260	11495	7260	7260	0	JB01	1	0	\N	1	-    	-   	-   
B000000871	matovit ax tab	TAB 	TAB 		7150	7150	8580	8580	8580	8580	8580	8580	8580	13585	8580	8580	0	JB01	1	0	\N	1	-    	-   	-   
B000000872	Max e Kap 	TAB 	TAB 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	\N	1	-    	-   	-   
B000000873	maxcef 500 Kap	CAP 	CAP 		9240	9240	11088	11088	11088	11088	11088	11088	11088	17556	11088	11088	0	JB01	1	0	\N	1	-    	-   	-   
B000000874	maxfit Kap	CAP 	CAP 		2750	2750	3300	3300	3300	3300	3300	3300	3300	5225	3300	3300	0	JB01	1	0	\N	1	-    	-   	-   
B000000875	maxstan tab	TAB 	TAB 		825	825	990	990	990	990	990	990	990	1568	990	990	0	JB01	1	0	\N	1	-    	-   	-   
B000000876	mebo salep 40gr	SAL 	SAL 		143000	143000	171600	171600	171600	171600	171600	171600	171600	271700	171600	171600	0	JB02	1	0	\N	1	-    	-   	-   
B000000877	Mediol Tablet	TAB 	TAB 		9625	9625	11550	11550	11550	11550	11550	11550	11550	18288	11550	11550	0	JB01	1	0	2019-03-31	1	-    	-   	-   
B000000878	Mefinal 500 mg Tablet	TAB 	TAB 		1353	1353	1624	1624	1624	1624	1624	1624	1624	2571	1624	1624	0	JB01	1	0	2021-08-31	1	-    	-   	-   
B000000879	Mefinter 500 mg tab	TAB 	TAB 		1925	1925	2310	2310	2310	2310	2310	2310	2310	3658	2310	2310	0	JB01	1	0	2018-08-01	1	-    	-   	-   
B000000880	meloxicam 15 mg	TAB 	TAB 		770	770	924	924	924	924	924	924	924	1463	924	924	0	JB01	1	0	2018-10-31	1	-    	-   	-   
B000000881	memoran 100 mg*	TAB 	TAB 		7333	7333	8800	8800	8800	8800	8800	8800	8800	13933	8800	8800	0	JB01	1	0	\N	1	-    	-   	-   
B000000882	Mercotin Drop	DRP 	DRP 		75920	75920	91104	91104	91104	91104	91104	91104	91104	144248	91104	91104	0	JB01	1	0	\N	1	-    	-   	-   
B000000884	merosan inj	AMP5	AMP5		510318	510318	612382	612382	612382	612382	612382	612382	612382	969604	612382	612382	0	JB02	1	0	\N	1	-    	-   	-   
B000000885	Merotik inj	AMP5	AMP5		242000	242000	290400	290400	290400	290400	290400	290400	290400	459800	290400	290400	0	JB02	1	0	\N	1	-    	-   	-   
B000000886	Mertigo tab	TAB 	TAB 		3245	3245	3894	3894	3894	3894	3894	3894	3894	6166	3894	3894	0	JB01	1	0	\N	1	-    	-   	-   
B000000887	Metformin 500 mg tab	TAB 	TAB 		200	200	240	240	240	240	240	240	240	380	240	240	0	JB01	1	0	\N	1	-    	-   	-   
B000000888	Methyl Prednisolon  4 mg Tablet	TAB 	TAB 		484	484	581	581	581	581	581	581	581	920	581	581	0	JB01	1	0	2020-12-31	1	-    	-   	-   
B000000889	Metoclopiramid 10 mg Tab	TAB 	TAB 		121	121	145	145	145	145	145	145	145	230	145	145	0	JB01	1	0	\N	1	-    	-   	-   
B000000890	Metronidazol 500mg tab	TAB 	TAB 		264	264	317	317	317	317	317	317	317	502	317	317	0	JB01	1	0	\N	1	-    	-   	-   
B000000891	mexylin syr	SYR 	SYR 		16500	16500	19800	19800	19800	19800	19800	19800	19800	31350	19800	19800	0	JB01	1	0	\N	1	-    	-   	-   
B000000895	Microlax Supp	SUP 	SUP 		16500	16500	19800	19800	19800	19800	19800	19800	19800	31350	19800	19800	0	JB02	1	0	\N	1	-    	-   	-   
B000000896	Midazolam Hameln inj	AMP5	AMP5		20328	20328	24394	24394	24394	24394	24394	24394	24394	38623	24394	24394	0	JB02	1	0	\N	1	-    	-   	-   
B000000897	Minosep Gargle	BTL 	BTL 		25300	25300	30360	30360	30360	30360	30360	30360	30360	48070	30360	30360	0	JB02	1	0	\N	1	-    	-   	-   
B000000898	Minyak kayu putih konicare 30 ml	BTL 	BTL 		8550	8550	10260	10260	10260	10260	10260	10260	10260	16245	10260	10260	0	JB02	1	0	\N	1	-    	-   	-   
B000000899	Minyak Telon	BTL 	BTL 		20000	20000	24000	24000	24000	24000	24000	24000	24000	38000	24000	24000	0	JB02	1	0	\N	1	-    	-   	-   
B000000900	Moloco+B12 tab	TAB 	TAB 		3352	3352	4022	4022	4022	4022	4022	4022	4022	6369	4022	4022	0	JB01	1	0	\N	1	-    	-   	-   
B000000901	Morphine 10 mg inj	AMP5	AMP5		10499	10499	12599	12599	12599	12599	12599	12599	12599	19948	12599	12599	0	JB02	1	0	\N	1	-    	-   	-   
B000000902	Moxic Forte 15 mg Tablet	TAB 	TAB 		8250	8250	9900	9900	9900	9900	9900	9900	9900	15675	9900	9900	0	JB01	1	0	\N	1	-    	-   	-   
B000000903	Morsadal 500 mg tab	TAB 	TAB 		33367	33367	40040	40040	40040	40040	40040	40040	40040	63397	40040	40040	0	JB01	1	0	\N	1	-    	-   	-   
B000000904	Mosix forte	TAB 	TAB 		7700	7700	9240	9240	9240	9240	9240	9240	9240	14630	9240	9240	0	JB01	1	0	\N	1	-    	-   	-   
B000000905	MST continus 15 mg	TAB 	TAB 		22990	22990	27588	27588	27588	27588	27588	27588	27588	43681	27588	27588	0	JB01	1	0	\N	1	-    	-   	-   
B000000906	Mucos Drop	DRP 	DRP 		36850	36850	44220	44220	44220	44220	44220	44220	44220	70015	44220	44220	0	JB01	1	0	2019-11-30	1	-    	-   	-   
B000000907	Mucos Sirup 	SYR 	SYR 		17600	17600	21120	21120	21120	21120	21120	21120	21120	33440	21120	21120	0	JB01	1	0	2019-12-31	1	-    	-   	-   
B000000908	Mucos tablet	TAB 	TAB 		880	880	1056	1056	1056	1056	1056	1056	1056	1672	1056	1056	0	JB01	1	0	2020-11-30	1	-    	-   	-   
B000000909	Mucotein tab	TAB 	TAB 		5143	5143	6172	6172	6172	6172	6172	6172	6172	9772	6172	6172	0	JB01	1	0	\N	1	-    	-   	-   
B000000910	Myonep tab	TAB 	TAB 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	\N	1	-    	-   	-   
B000000911	Myores tab	TAB 	TAB 		4950	4950	5940	5940	5940	5940	5940	5940	5940	9405	5940	5940	0	JB01	1	0	2019-11-30	1	-    	-   	-   
B000000912	Myotonic Tablet	TAB 	TAB 		2915	2915	3498	3498	3498	3498	3498	3498	3498	5538	3498	3498	0	JB01	1	0	\N	1	-    	-   	-   
B000000913	Myotonic inj	AMP5	AMP5		8250	8250	9900	9900	9900	9900	9900	9900	9900	15675	9900	9900	0	JB02	1	0	\N	1	-    	-   	-   
B000000914	Na Phenytoin 50 mg kapsul	AMP5	AMP5		26601	26601	31921	31921	31921	31921	31921	31921	31921	50542	31921	31921	0	JB02	1	0	\N	1	-    	-   	-   
B000000915	Nairet inj	AMP5	AMP5		15400	15400	18480	18480	18480	18480	18480	18480	18480	29260	18480	18480	0	JB02	1	0	\N	1	-    	-   	-   
B000000916	Natacen 50 mg	MIN 	MIN 		45787	45787	54944	54944	54944	54944	54944	54944	54944	86995	54944	54944	0	JB01	1	0	\N	1	-    	-   	-   
B000000917	Nebacetin powder 5 gr	TAB 	TAB 		20350	20350	24420	24420	24420	24420	24420	24420	24420	38665	24420	24420	0	JB01	1	0	\N	1	-    	-   	-   
B000000918	Neo K Injeksi	AMP5	AMP5		13640	13640	16368	16368	16368	16368	16368	16368	16368	25916	16368	16368	0	JB02	1	0	2018-10-31	1	-    	-   	-   
B000000919	Neostigmin Hameln inj	AMP5	AMP5		15400	15400	18480	18480	18480	18480	18480	18480	18480	29260	18480	18480	0	JB02	1	0	\N	1	-    	-   	-   
B000000920	Neuralgin Tablet	TAB 	TAB 		605	605	726	726	726	726	726	726	726	1150	726	726	0	JB01	1	0	\N	1	-    	-   	-   
B000000921	Neurobat forte inj	AMP5	AMP5		9350	9350	11220	11220	11220	11220	11220	11220	11220	17765	11220	11220	0	JB02	1	0	2018-02-01	1	-    	-   	-   
B000000922	Neurosanbe Injeksi*	AMP5	AMP5		4670	4670	5604	5604	5604	5604	5604	5604	5604	8873	5604	5604	0	JB02	1	0	\N	1	-    	-   	-   
B000000923	Neurotam 1 gr Injeksi	AMP5	AMP5		17600	17600	21120	21120	21120	21120	21120	21120	21120	33440	21120	21120	0	JB02	1	0	\N	1	-    	-   	-   
B000000924	Neurotam 3 gr inj	AMP5	AMP5		57200	57200	68640	68640	68640	68640	68640	68640	68640	108680	68640	68640	0	JB02	1	0	\N	1	-    	-   	-   
B000000925	Neurotam 400 mg Kapsul	CAP 	CAP 		2156	2156	2587	2587	2587	2587	2587	2587	2587	4096	2587	2587	0	JB01	1	0	\N	1	-    	-   	-   
B000000926	Nifedipine 10 mg Tablet	TAB 	TAB 		142	142	170	170	170	170	170	170	170	270	170	170	0	JB01	1	0	2020-07-31	1	-    	-   	-   
B000000927	Nifural Sirup 60 ml	SYR 	SYR 		57115	57115	68538	68538	68538	68538	68538	68538	68538	108518	68538	68538	0	JB01	1	0	\N	1	-    	-   	-   
B000000928	Nonflamin kap	CAP 	CAP 		4277	4277	5132	5132	5132	5132	5132	5132	5132	8126	5132	5132	0	JB01	1	0	\N	1	-    	-   	-   
B000000929	Noperten 10 mg tab	TAB 	TAB 		4785	4785	5742	5742	5742	5742	5742	5742	5742	9092	5742	5742	0	JB01	1	0	\N	1	-    	-   	-   
B000000930	Norages Drop	DRP 	DRP 		41250	41250	49500	49500	49500	49500	49500	49500	49500	78375	49500	49500	0	JB01	1	0	2019-11-30	1	-    	-   	-   
B000000931	Norages Injeksi	AMP5	AMP5		8800	8800	10560	10560	10560	10560	10560	10560	10560	16720	10560	10560	0	JB02	1	0	\N	1	-    	-   	-   
B000000932	Norages Sirup	SYR 	SYR 		34100	34100	40920	40920	40920	40920	40920	40920	40920	64790	40920	40920	0	JB01	1	0	2019-12-31	1	-    	-   	-   
B000000933	Noroid 40 ml cream	SAC 	SAC 		60000	60000	72000	72000	72000	72000	72000	72000	72000	114000	72000	72000	0	JB02	1	0	\N	1	-    	-   	-   
B000000934	Nosirax Kapsul	CAP 	CAP 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	\N	1	-    	-   	-   
B000000935	Notrixum 50 Injeksi	AMP5	AMP5		44000	44000	52800	52800	52800	52800	52800	52800	52800	83600	52800	52800	0	JB02	1	0	\N	1	-    	-   	-   
B000000936	Nova T 380	TAB 	TAB 		245003	245003	294004	294004	294004	294004	294004	294004	294004	465506	294004	294004	0	JB01	1	0	\N	1	-    	-   	-   
B000000937	Novalgin Drop	DRP 	DRP 		42136	42136	50563	50563	50563	50563	50563	50563	50563	80058	50563	50563	0	JB01	1	0	\N	1	-    	-   	-   
B000000938	Novalgin inj	AMP5	AMP5		9484	9484	11381	11381	11381	11381	11381	11381	11381	18020	11381	11381	0	JB02	1	0	\N	1	-    	-   	-   
B000000939	Novalgin Sirup	SYR 	SYR 		44960	44960	53952	53952	53952	53952	53952	53952	53952	85424	53952	53952	0	JB01	1	0	2018-05-31	1	-    	-   	-   
B000000940	Novalgin Tablet	TAB 	TAB 		1258	1258	1510	1510	1510	1510	1510	1510	1510	2390	1510	1510	0	JB01	1	0	\N	1	-    	-   	-   
B000000941	Novomix pen	TAB 	TAB 		168088	168088	201706	201706	201706	201706	201706	201706	201706	319367	201706	201706	0	JB01	1	0	\N	1	-    	-   	-   
B000000942	Novorapid Flexpen Insulin	TAB 	TAB 		168087	168087	201704	201704	201704	201704	201704	201704	201704	319365	201704	201704	0	JB01	1	0	2018-10-01	1	-    	-   	-   
B000000943	Nulacta plus licaps*	TAB 	TAB 		4730	4730	5676	5676	5676	5676	5676	5676	5676	8987	5676	5676	0	JB01	1	0	\N	1	-    	-   	-   
B000000944	Oestrogel cream	TUB 	TUB 		302500	302500	363000	363000	363000	363000	363000	363000	363000	574750	363000	363000	0	JB02	1	0	2018-09-30	1	-    	-   	-   
B000000945	Omeprazole 20 mg tab	CAP 	CAP 		409	409	491	491	491	491	491	491	491	777	491	491	0	JB01	1	0	2019-05-16	1	-    	-   	-   
B000000946	Omepros 30 Kap*	KAP 	KAP 		3483	3483	4180	4180	4180	4180	4180	4180	4180	6618	4180	4180	0	JB01	1	0	\N	1	-    	-   	-   
B000000947	Ondavell 4 mg tab	TAB 	TAB 		14300	14300	17160	17160	17160	17160	17160	17160	17160	27170	17160	17160	0	JB01	1	0	\N	1	-    	-   	-   
B000000948	Ondesco Injeksi 8 ml	AMP5	AMP5		33000	33000	39600	39600	39600	39600	39600	39600	39600	62700	39600	39600	0	JB02	1	0	2018-04-30	1	-    	-   	-   
B000000949	Onetic 4 mg Tablet	TAB 	TAB 		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB01	1	0	\N	1	-    	-   	-   
B000000950	Onfloxacin 200 mg tab	TAB 	TAB 		589	589	707	707	707	707	707	707	707	1119	707	707	0	JB01	1	0	\N	1	-    	-   	-   
B000000951	Opsite post op	TAB 	TAB 		38115	38115	45738	45738	45738	45738	45738	45738	45738	72418	45738	45738	0	JB01	1	0	\N	1	-    	-   	-   
B000000952	Oralit shaccet	SAC 	SAC 		401	401	481	481	481	481	481	481	481	762	481	481	0	JB01	1	0	\N	1	-    	-   	-   
B000000953	XXX	TAB 	TAB 		3080	3080	3696	3696	3696	3696	3696	3696	3696	5852	3696	3696	0	JB01	1	0	\N	1	-    	-   	-   
B000000954	Otsu KCI	TAB 	TAB 		3080	3080	3696	3696	3696	3696	3696	3696	3696	5852	3696	3696	0	JB01	1	0	\N	1	-    	-   	-   
B000000955	Ottozol Injeksi	AMP5	AMP5		151250	151250	181500	181500	181500	181500	181500	181500	181500	287375	181500	181500	0	JB02	1	0	2018-09-30	1	-    	-   	-   
B000000956	Oxan F-C cap*	CAP 	CAP 		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB01	1	0	\N	1	-    	-   	-   
B000000957	Oxoril Sirup 60 ml	SYR 	SYR 		27500	27500	33000	33000	33000	33000	33000	33000	33000	52250	33000	33000	0	JB01	1	0	\N	1	-    	-   	-   
B000000958	Oxyla inj	AMP5	AMP5		7920	7920	9504	9504	9504	9504	9504	9504	9504	15048	9504	9504	0	JB01	1	0	\N	1	-    	-   	-   
B000000959	Panso inj	AMP5	AMP5		143000	143000	171600	171600	171600	171600	171600	171600	171600	271700	171600	171600	0	JB02	1	0	\N	1	-    	-   	-   
B000000960	Pantocain 0,5% ED	TAB 	TAB 		13338	13338	16006	16006	16006	16006	16006	16006	16006	25342	16006	16006	0	JB01	1	0	\N	1	-    	-   	-   
B000000961	xxx	TAB 	TAB 		14575	14575	17490	17490	17490	17490	17490	17490	17490	27692	17490	17490	0	JB01	1	0	\N	1	-    	-   	-   
B000000962	Pantocain 2% 5 ml	BTL 	BTL 		14575	14575	17490	17490	17490	17490	17490	17490	17490	27692	17490	17490	0	JB02	1	0	\N	1	-    	-   	-   
B000000963	Pantopump Injeksi	AMP5	AMP5		137500	137500	165000	165000	165000	165000	165000	165000	165000	261250	165000	165000	0	JB02	1	0	2019-06-30	1	-    	-   	-   
B000000964	Pantozol 40 mg Tablet	TAB 	TAB 		20742.7	20742.7	24891	24891	24891	24891	24891	24891	24891	39411	24891	24891	0	JB01	1	0	2018-08-01	1	-    	-   	-   
B000000965	Paracetamol 500 mg	TAB 	TAB 		165	165	198	198	198	198	198	198	198	314	198	198	0	JB01	1	0	\N	1	-    	-   	-   
B000000966	Paracetamol Drop	DRP 	DRP 		5803	5803	6964	6964	6964	6964	6964	6964	6964	11026	6964	6964	0	JB01	1	0	\N	1	-    	-   	-   
B000000967	Paracetamol Syr	SYR 	SYR 		3300	3300	3960	3960	3960	3960	3960	3960	3960	6270	3960	3960	0	JB01	1	0	\N	1	-    	-   	-   
B000000968	Patral Tablet	TAB 	TAB 		7700	7700	9240	9240	9240	9240	9240	9240	9240	14630	9240	9240	0	JB01	1	0	2018-11-12	1	-    	-   	-   
B000000969	Pedimin Drop*	DRP 	DRP 		27500	27500	33000	33000	33000	33000	33000	33000	33000	52250	33000	33000	0	JB01	1	0	\N	1	-    	-   	-   
B000000970	Penmox 500 mg Tablet	TAB 	TAB 		2860	2860	3432	3432	3432	3432	3432	3432	3432	5434	3432	3432	0	JB01	1	0	\N	1	-    	-   	-   
B000000971	Pethidin 50 mg inj	AMP5	AMP5		13191	13191	15829	15829	15829	15829	15829	15829	15829	25063	15829	15829	0	JB02	1	0	\N	1	-    	-   	-   
B000000972	Phaproxin 500 mg	TAB 	TAB 		1652	1652	1982	1982	1982	1982	1982	1982	1982	3139	1982	1982	0	JB01	1	0	\N	1	-    	-   	-   
B000000973	Phental inj	AMP5	AMP5		9075	9075	10890	10890	10890	10890	10890	10890	10890	17242	10890	10890	0	JB02	1	0	\N	1	-    	-   	-   
B000000974	Piracetam 3 gr inj	AMP5	AMP5		17105	17105	20526	20526	20526	20526	20526	20526	20526	32500	20526	20526	0	JB02	1	0	\N	1	-    	-   	-   
B000000975	Piroxikam 10 mg tab	TAB 	TAB 		101	101	121	121	121	121	121	121	121	192	121	121	0	JB01	1	0	\N	1	-    	-   	-   
B000000976	Piroxikam 20 mg tab	TAB 	TAB 		104	104	125	125	125	125	125	125	125	198	125	125	0	JB01	1	0	\N	1	-    	-   	-   
B000000977	Plasminex Injeksi	AMP5	AMP5		12683	12683	15220	15220	15220	15220	15220	15220	15220	24098	15220	15220	0	JB02	1	750	2018-12-01	1	-    	-   	-   
B000000978	Plavos tab	TAB 	TAB 		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB01	1	0	\N	1	-    	-   	-   
B000000979	Eflagen 25 mg tab	TAB 	TAB 		1221	1221	1465	1465	1465	1465	1465	1465	1465	2320	1465	1465	0	JB01	1	0	\N	1	-    	-   	-   
B000000980	Polydex 0,6 ml minidose	MIN 	MIN 		29150	29150	34980	34980	34980	34980	34980	34980	34980	55385	34980	34980	0	JB01	1	0	2019-05-31	1	-    	-   	-   
B000000981	Polygran 0,6 ml minidose	MIN 	MIN 		19250	19250	23100	23100	23100	23100	23100	23100	23100	36575	23100	23100	0	JB01	1	0	\N	1	-    	-   	-   
B000000982	Polynel 0,6 ml minidose	MIN 	MIN 		19662	19662	23594	23594	23594	23594	23594	23594	23594	37358	23594	23594	0	JB01	1	0	\N	1	-    	-   	-   
B000000983	Polypred 0,6 ml minidose	MIN 	MIN 		19112	19112	22934	22934	22934	22934	22934	22934	22934	36313	22934	22934	0	JB01	1	0	\N	1	-    	-   	-   
B000000984	Polysilane Tablet	TAB 	TAB 		798	798	958	958	958	958	958	958	958	1516	958	958	0	JB01	1	0	\N	1	-    	-   	-   
B000000985	Ponalar forte 500 mg kap	KAP 	KAP 		1265	1265	1518	1518	1518	1518	1518	1518	1518	2404	1518	1518	0	JB01	1	0	\N	1	-    	-   	-   
B000000986	Pospargin inj	AMP5	AMP5		6050	6050	7260	7260	7260	7260	7260	7260	7260	11495	7260	7260	0	JB02	1	0	\N	1	-    	-   	-   
B000000987	Prazotec cap	CAP 	CAP 		10725	10725	12870	12870	12870	12870	12870	12870	12870	20378	12870	12870	0	JB01	1	0	\N	1	-    	-   	-   
B000000988	Prenamia Kapsul*	TAB 	TAB 		1128	1128	1354	1354	1354	1354	1354	1354	1354	2143	1354	1354	0	JB01	1	0	2019-05-01	1	-    	-   	-   
B000000989	Primolut N tab	TAB 	TAB 		5066	5066	6079	6079	6079	6079	6079	6079	6079	9625	6079	6079	0	JB01	1	0	2020-11-01	1	-    	-   	-   
B000000990	Proanes inj	TAB 	TAB 		80410	80410	96492	96492	96492	96492	96492	96492	96492	152779	96492	96492	0	JB01	1	0	2018-07-31	1	-    	-   	-   
B000000992	Proclozam	TAB 	TAB 		1925	1925	2310	2310	2310	2310	2310	2310	2310	3658	2310	2310	0	JB01	1	0	\N	1	-    	-   	-   
B000000993	Profecom Suppositoria	SUP 	SUP 		13420	13420	16104	16104	16104	16104	16104	16104	16104	25498	16104	16104	0	JB01	1	0	\N	1	-    	-   	-   
B000000994	Progesic Sirup	SYR 	SYR 		24200	24200	29040	29040	29040	29040	29040	29040	29040	45980	29040	29040	0	JB01	1	0	2019-01-01	1	-    	-   	-   
B000000995	Progina 100 ml	TAB 	TAB 		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB01	1	0	\N	1	-    	-   	-   
B000000996	Prolacta DHA Mother*	CAP 	CAP 		3575	3575	4290	4290	4290	4290	4290	4290	4290	6792	4290	4290	0	JB01	1	0	\N	1	-    	-   	-   
B000000997	Promactil 100 mg 	TAB 	TAB 		310	310	372	372	372	372	372	372	372	589	372	372	0	JB01	1	0	\N	1	-    	-   	-   
B000000998	Promavit Tablet*	TAB 	TAB 		2750	2750	3300	3300	3300	3300	3300	3300	3300	5225	3300	3300	0	JB01	1	0	2018-09-01	1	-    	-   	-   
B000000999	Promuba Syr 60 mL	SYR 	SYR 		40150	40150	48180	48180	48180	48180	48180	48180	48180	76285	48180	48180	0	JB01	1	0	2019-09-30	1	-    	-   	-   
B000001000	Proneuron Tablet	TAB 	TAB 		1100	1100	1320	1320	1320	1320	1320	1320	1320	2090	1320	1320	0	JB01	1	0	\N	1	-    	-   	-   
B000001001	Propepsa Suspensi 100 ml	SYR 	SYR 		55000	55000	66000	66000	66000	66000	66000	66000	66000	104500	66000	66000	0	JB01	1	0	2018-12-01	1	-    	-   	-   
B000001002	Proris Forte 60 ml Sirup	SYR 	SYR 		25300	25300	30360	30360	30360	30360	30360	30360	30360	48070	30360	30360	0	JB01	1	0	2018-11-30	1	-    	-   	-   
B000001003	Proris Sirup	SYR 	SYR 		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB01	1	0	2020-10-31	1	-    	-   	-   
B000001004	Prothyra 10 mg tab	TAB 	TAB 		5078	5078	6094	6094	6094	6094	6094	6094	6094	9648	6094	6094	0	JB01	1	0	\N	1	-    	-   	-   
B000001005	Provagin Ovula	TAB 	TAB 		14300	14300	17160	17160	17160	17160	17160	17160	17160	27170	17160	17160	0	JB01	1	0	2018-11-01	1	-    	-   	-   
B000001006	PTU tab	TAB 	TAB 		299	299	359	359	359	359	359	359	359	568	359	359	0	JB01	1	0	\N	1	-    	-   	-   
B000001007	Pulmicort resp 0,5 mg	TAB 	TAB 		20123	20123	24148	24148	24148	24148	24148	24148	24148	38234	24148	24148	0	JB01	1	0	\N	1	-    	-   	-   
B000001008	Pumpisel Injeksi	AMP5	AMP5		151030	151030	181236	181236	181236	181236	181236	181236	181236	286957	181236	181236	0	JB01	1	0	2018-05-01	1	-    	-   	-   
B000001009	Pumpitor Kapsul	KAP 	KAP 		13816	13816	16579	16579	16579	16579	16579	16579	16579	26250	16579	16579	0	JB01	1	0	2019-09-30	1	-    	-   	-   
B000001010	Qidrox 500 mg	TAB 	TAB 		9900	9900	11880	11880	11880	11880	11880	11880	11880	18810	11880	11880	0	JB01	1	0	\N	1	-    	-   	-   
B000001011	Radin Injeksi	AMP5	AMP5		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB01	1	0	2018-05-31	1	-    	-   	-   
B000001012	Raivas 4 ml inj	AMP5	AMP5		99000	99000	118800	118800	118800	118800	118800	118800	118800	188100	118800	118800	0	JB01	1	0	2017-11-30	1	-    	-   	-   
B000001013	Ranitidin Tablet AAM	TAB 	TAB 		242	242	290	290	290	290	290	290	290	460	290	290	0	JB01	1	0	\N	1	-    	-   	-   
B000001014	Ranitidin Injeksi	AMP5	AMP5		2567.136	2567.136	3081	3081	3081	3081	3081	3081	3081	4878	3081	3081	0	JB02	1	0	2019-08-30	1	-    	-   	-   
B000001016	Recolfar Tablet	TAB 	TAB 		4730	4730	5676	5676	5676	5676	5676	5676	5676	8987	5676	5676	0	JB01	1	0	2019-09-30	1	-    	-   	-   
B000001017	Remopain 10 mg inj	AMP5	AMP5		24200	24200	29040	29040	29040	29040	29040	29040	29040	45980	29040	29040	0	JB02	1	0	\N	1	-    	-   	-   
B000001055	Sohobion 5000 inj	AMP5	AMP5		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB02	1	0	\N	1	-    	-   	-   
B000001018	Remopain Prefilled Syringe Injeksi	AMP5	AMP5		44000	44000	52800	52800	52800	52800	52800	52800	52800	83600	52800	52800	0	JB02	1	0	2018-09-16	1	-    	-   	-   
B000001019	Renalyte Sirup	SYR 	SYR 		15400	15400	18480	18480	18480	18480	18480	18480	18480	29260	18480	18480	0	JB01	1	0	2018-10-31	1	-    	-   	-   
B000001021	Rephitel 0,6 ml MD	MIN 	MIN 		40425	40425	48510	48510	48510	48510	48510	48510	48510	76808	48510	48510	0	JB02	1	0	2019-05-31	1	-    	-   	-   
B000001022	Rhinos Junior Sirup	SYR 	SYR 		36300	36300	43560	43560	43560	43560	43560	43560	43560	68970	43560	43560	0	JB01	1	0	2018-08-01	1	-    	-   	-   
B000001023 	Rhinos Neo Drop	DRP 	DRP 		42900	42900	51480	51480	51480	51480	51480	51480	51480	81510	51480	51480	0	JB01	1	0	\N	1	-    	-   	-   
B000001024	Rhinos SR Kapsul	TAB 	TAB 		4950	4950	5940	5940	5940	5940	5940	5940	5940	9405	5940	5940	0	JB01	1	0	\N	1	-    	-   	-   
B000001025	Rifastar Kap	KAP 	KAP 		5115	5115	6138	6138	6138	6138	6138	6138	6138	9718	6138	6138	0	JB01	1	0	2019-06-01	1	-    	-   	-   
B000001026	Rimstar 4-FDC Tablet	TAB 	TAB 		6179	6179	7415	7415	7415	7415	7415	7415	7415	11740	7415	7415	0	JB01	1	0	\N	1	-    	-   	-   
B000001027	Rizodal	TAB 	TAB 		4840	4840	5808	5808	5808	5808	5808	5808	5808	9196	5808	5808	0	JB01	1	0	\N	1	-    	-   	-   
B000001028	Safe care	TAB 	TAB 		13600	13600	16320	16320	16320	16320	16320	16320	16320	25840	16320	16320	0	JB01	1	0	\N	1	-    	-   	-   
B000001029	Safol inj	AMP5	AMP5		93500	93500	112200	112200	112200	112200	112200	112200	112200	177650	112200	112200	0	JB02	1	0	\N	1	-    	-   	-   
B000001030	Sagestam cream	SAL 	SAL 		12485	12485	14982	14982	14982	14982	14982	14982	14982	23722	14982	14982	0	JB02	1	0	2019-05-01	1	-    	-   	-   
B000001031	Sagestam Eye Drop	DRP 	DRP 		28600	28600	34320	34320	34320	34320	34320	34320	34320	54340	34320	34320	12	JB02	1	12	2018-03-01	1	-    	-   	-   
B000001032	Sagestam inj	AMP5	AMP5		8784	8784	10541	10541	10541	10541	10541	10541	10541	16690	10541	10541	0	JB02	1	0	\N	1	-    	-   	-   
B000001033	Salbutamol 2 mg tab	TAB 	TAB 		110	110	132	132	132	132	132	132	132	209	132	132	0	JB01	1	0	\N	1	-    	-   	-   
B000001034	Salbutamol 4 mg tab	TAB 	TAB 		222	222	266	266	266	266	266	266	266	422	266	266	0	JB01	1	0	2024-02-22	1	-    	-   	-   
B000001035	San B Plex Drop*	DRP 	DRP 		17600	17600	21120	21120	21120	21120	21120	21120	21120	33440	21120	21120	0	JB01	1	0	\N	1	-    	-   	-   
B000001036	Sandryl DMP 60 ml syr	SYR 	SYR 		9653	9653	11584	11584	11584	11584	11584	11584	11584	18341	11584	11584	0	JB01	1	0	\N	1	-    	-   	-   
B000001037	Sandryl Expect 60 ml syr	SYR 	SYR 		8993	8993	10792	10792	10792	10792	10792	10792	10792	17087	10792	10792	0	JB01	1	0	\N	1	-    	-   	-   
B000001039	Sanmag tab	TAB 	TAB 		792	792	950	950	950	950	950	950	950	1505	950	950	0	JB01	1	0	2018-05-01	1	-    	-   	-   
B000001040	Sanmol Drop	DRP 	DRP 		15895	15895	19074	19074	19074	19074	19074	19074	19074	30200	19074	19074	0	JB01	1	0	2019-11-01	1	-    	-   	-   
B000001041	Sanmol Sirup	SYR 	SYR 		11825	11825	14190	14190	14190	14190	14190	14190	14190	22468	14190	14190	0	JB01	1	0	2019-01-31	1	-    	-   	-   
B000001042	Sanmol Tablet	TAB 	TAB 		286	286	343	343	343	343	343	343	343	543	343	343	0	JB01	1	0	2021-10-01	1	-    	-   	-   
B000001043	Sanoskin Oxy tube	TUB 	TUB 		236500	236500	283800	283800	283800	283800	283800	283800	283800	449350	283800	283800	0	JB01	1	0	\N	1	-    	-   	-   
B000001044	Sanprima Sirup	SYR 	SYR 		25960	25960	31152	31152	31152	31152	31152	31152	31152	49324	31152	31152	0	JB01	1	0	2019-04-01	1	-    	-   	-   
B000001045	Santagesik inj	AMP5	AMP5		9471	9471	11365	11365	11365	11365	11365	11365	11365	17995	11365	11365	0	JB02	1	0	\N	1	-    	-   	-   
B000001046	Sedacum Injeksi	AMP5	AMP5		24200	24200	29040	29040	29040	29040	29040	29040	29040	45980	29040	29040	0	JB02	1	0	\N	1	-    	-   	-   
B000001047	Sim-DHA syr	SYR 	SYR 		44000	44000	52800	52800	52800	52800	52800	52800	52800	83600	52800	52800	0	JB01	1	0	\N	1	-    	-   	-   
B000001048	Simfix 100 mg Kapsul	CAP 	CAP 		17600	17600	21120	21120	21120	21120	21120	21120	21120	33440	21120	21120	0	JB01	1	0	2020-05-31	1	-    	-   	-   
B000001049	Simflox 500 mg Tablet	KAP 	KAP 		10120	10120	12144	12144	12144	12144	12144	12144	12144	19228	12144	12144	0	JB01	1	0	\N	1	-    	-   	-   
B000001050	Simvastatin 10 mg Tablet	TAB 	TAB 		565	565	678	678	678	678	678	678	678	1074	678	678	0	JB01	1	0	\N	1	-    	-   	-   
B000001051	Sistenol Tablet	TAB 	TAB 		1650	1650	1980	1980	1980	1980	1980	1980	1980	3135	1980	1980	0	JB01	1	0	2019-09-30	1	-    	-   	-   
B000001052	Sodermix cream 15 g	KAL 	KAL 		88000	88000	105600	105600	105600	105600	105600	105600	105600	167200	105600	105600	0	JB01	1	0	\N	1	-    	-   	-   
B000001053	Sofratulle 10x10cm	TAB 	TAB 		20957	20957	25148	25148	25148	25148	25148	25148	25148	39818	25148	25148	0	JB01	1	0	\N	1	-    	-   	-   
B000001054	Sohobal inj	AMP5	AMP5		18700	18700	22440	22440	22440	22440	22440	22440	22440	35530	22440	22440	0	JB02	1	0	\N	1	-    	-   	-   
B000001056	Sohobion tab	TAB 	TAB 		1100	1100	1320	1320	1320	1320	1320	1320	1320	2090	1320	1320	0	JB01	1	0	\N	1	-    	-   	-   
B000001057	Soholin 500 mg tab*	TAB 	TAB 		12833	12833	15400	15400	15400	15400	15400	15400	15400	24383	15400	15400	0	JB01	1	0	\N	1	-    	-   	-   
B000001058	Soholin inj	AMP5	AMP5		39600	39600	47520	47520	47520	47520	47520	47520	47520	75240	47520	47520	0	JB02	1	0	\N	1	-    	-   	-   
B000001059	Solac Sirup 120 ml	SYR 	SYR 		79200	79200	95040	95040	95040	95040	95040	95040	95040	150480	95040	95040	0	JB01	1	0	2018-11-30	1	-    	-   	-   
B000001060	Somerol 125 mg inj	AMP5	AMP5		82500	82500	99000	99000	99000	99000	99000	99000	99000	156750	99000	99000	0	JB02	1	0	\N	1	-    	-   	-   
B000001061	Somerol 4 mg tab	TAB 	TAB 		2860	2860	3432	3432	3432	3432	3432	3432	3432	5434	3432	3432	0	JB01	1	0	\N	1	-    	-   	-   
B000001062	Sporetik 100 mg Kapsul	CAP 	CAP 		22203.5	22203.5	26644	26644	26644	26644	26644	26644	26644	42187	26644	26644	0	JB01	1	0	2018-08-01	1	-    	-   	-   
B000001063	Sporetik Sirup	SYR 	SYR 		85140	85140	102168	102168	102168	102168	102168	102168	102168	161766	102168	102168	0	JB01	1	0	2018-02-01	1	-    	-   	-   
B000001064	Starmuno Kids Sirup	SYR 	SYR 		71500	71500	85800	85800	85800	85800	85800	85800	85800	135850	85800	85800	0	JB01	1	0	2018-07-31	1	-    	-   	-   
B000001065	Starxon Injeksi	AMP5	AMP5		205700	205700	246840	246840	246840	246840	246840	246840	246840	390830	246840	246840	0	JB02	1	0	\N	1	-    	-   	-   
B000001066	Stator 10 mg tab	TAB 	TAB 		14080	14080	16896	16896	16896	16896	16896	16896	16896	26752	16896	16896	0	JB01	1	0	\N	1	-    	-   	-   
B000001067	Stator 20 mg tab	TAB 	TAB 		17600	17600	21120	21120	21120	21120	21120	21120	21120	33440	21120	21120	0	JB01	1	0	\N	1	-    	-   	-   
B000001068	Stenirol inj	AMP5	AMP5		74800	74800	89760	89760	89760	89760	89760	89760	89760	142120	89760	89760	0	JB02	1	0	\N	1	-    	-   	-   
B000001069	Stesolid 10 mg supp	SUP 	SUP 		39204	39204	47045	47045	47045	47045	47045	47045	47045	74488	47045	47045	0	JB01	1	0	\N	1	-    	-   	-   
B000001070	Stesolid 5 mg supp	SUP 	SUP 		26136	26136	31363	31363	31363	31363	31363	31363	31363	49658	31363	31363	0	JB01	1	0	\N	1	-    	-   	-   
B000001071	Stesolid	SYR 	SYR 		34100	34100	40920	40920	40920	40920	40920	40920	40920	64790	40920	40920	0	JB01	1	0	\N	1	-    	-   	-   
B000001072	Stesolid inj	AMP5	AMP5		11440	11440	13728	13728	13728	13728	13728	13728	13728	21736	13728	13728	0	JB02	1	0	\N	1	-    	-   	-   
B000001073	Stobled Tablet*	TAB 	TAB 		7425	7425	8910	8910	8910	8910	8910	8910	8910	14108	8910	8910	0	JB01	1	0	\N	1	-    	-   	-   
B000001074	Stomacain Tablet	TAB 	TAB 		1210	1210	1452	1452	1452	1452	1452	1452	1452	2299	1452	1452	0	JB01	1	0	\N	1	-    	-   	-   
B000001075	Sumagesic tab	TAB 	TAB 		374	374	449	449	449	449	449	449	449	711	449	449	0	JB01	1	0	\N	1	-    	-   	-   
B000001076	Suprafenid Supositoria 	SUP 	SUP 		12100	12100	14520	14520	14520	14520	14520	14520	14520	22990	14520	14520	0	JB01	1	0	2019-08-01	1	-    	-   	-   
B000001077	Supramox drop	DRP 	DRP 		21450	21450	25740	25740	25740	25740	25740	25740	25740	40755	25740	25740	0	JB01	1	0	\N	1	-    	-   	-   
B000001078	Taxegram 0,5 gr Injeksi	AMP5	AMP5		74250	74250	89100	89100	89100	89100	89100	89100	89100	141075	89100	89100	0	JB02	1	0	2018-02-01	1	-    	-   	-   
B000001079	TB rif syr	SYR 	SYR 		82500	82500	99000	99000	99000	99000	99000	99000	99000	156750	99000	99000	0	JB01	1	0	\N	1	-    	-   	-   
B000001080	TB Vit 6 syr	SYR 	SYR 		23100	23100	27720	27720	27720	27720	27720	27720	27720	43890	27720	27720	0	JB01	1	0	\N	1	-    	-   	-   
B000001081	Tensivask 10 mg Tablet	TAB 	TAB 		10450	10450	12540	12540	12540	12540	12540	12540	12540	19855	12540	12540	0	JB01	1	0	2020-10-31	1	-    	-   	-   
B000001082	Tensivask 5 mg Tablet	TAB 	TAB 		5720	5720	6864	6864	6864	6864	6864	6864	6864	10868	6864	6864	0	JB01	1	0	\N	1	-    	-   	-   
B000001084	Tetagam Injeksi	AMP5	AMP5		206800	206800	248160	248160	248160	248160	248160	248160	248160	392920	248160	248160	0	JB02	1	0	2018-02-01	1	-    	-   	-   
B000001085	Texorate Tablet	TAB 	TAB 		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB01	1	0	\N	1	-    	-   	-   
B000001086	TGF cendo kap	KAP 	KAP 		5900	5900	7080	7080	7080	7080	7080	7080	7080	11210	7080	7080	0	JB01	1	0	\N	1	-    	-   	-   
B000001087	Thiamycin Forte sirup	SYR 	SYR 		59400	59400	71280	71280	71280	71280	71280	71280	71280	112860	71280	71280	0	JB01	1	0	\N	1	-    	-   	-   
B000001088	Thiamycin Sirup	SYR 	SYR 		30800	30800	36960	36960	36960	36960	36960	36960	36960	58520	36960	36960	0	JB01	1	0	\N	1	-    	-   	-   
B000001089	Thrombo aspilet tab	TAB 	TAB 		900	900	1080	1080	1080	1080	1080	1080	1080	1710	1080	1080	0	JB01	1	0	\N	1	-    	-   	-   
B000001090	Tilflam 20 mg tab	TAB 	TAB 		10890	10890	13068	13068	13068	13068	13068	13068	13068	20691	13068	13068	0	JB01	1	0	2016-07-02	1	-    	-   	-   
B000001091	Timol 0,25% 0,6 ml MD	TAB 	TAB 		19388	19388	23266	23266	23266	23266	23266	23266	23266	36837	23266	23266	0	JB01	1	0	\N	1	-    	-   	-   
B000001092	Timol 0,25% 5 ml 	TAB 	TAB 		33550	33550	40260	40260	40260	40260	40260	40260	40260	63745	40260	40260	0	JB01	1	0	\N	1	-    	-   	-   
B000001093	Timol 0,5% 5 ml 	TAB 	TAB 		52525	52525	63030	63030	63030	63030	63030	63030	63030	99798	63030	63030	0	JB01	1	0	2020-01-31	1	-    	-   	-   
B000001094	Tismazol 500 mg tab	TAB 	TAB 		1925	1925	2310	2310	2310	2310	2310	2310	2310	3658	2310	2310	0	JB01	1	0	\N	1	-    	-   	-   
B000001095	Tobro 0,6 ml MD	MIN 	MIN 		21037	21037	25244	25244	25244	25244	25244	25244	25244	39970	25244	25244	0	JB01	1	0	\N	1	-    	-   	-   
B000001096	Tobroson 0,6 ml MD	TAB 	TAB 		31900	31900	38280	38280	38280	38280	38280	38280	38280	60610	38280	38280	0	JB01	1	0	2019-06-30	1	-    	-   	-   
B000001097	Tobroson 5 ml 	TAB 	TAB 		50875	50875	61050	61050	61050	61050	61050	61050	61050	96662	61050	61050	0	JB01	1	0	\N	1	-    	-   	-   
B000001098	Tomit Injeksi	AMP5	AMP5		9350	9350	11220	11220	11220	11220	11220	11220	11220	17765	11220	11220	0	JB02	1	0	\N	1	-    	-   	-   
B000001099	Tonoton tab	TAB 	TAB 		2530	2530	3036	3036	3036	3036	3036	3036	3036	4807	3036	3036	0	JB01	1	0	\N	1	-    	-   	-   
B000001100	Topazol Injeksi	AMP5	AMP5		151800	151800	182160	182160	182160	182160	182160	182160	182160	288420	182160	182160	0	JB02	1	0	2019-08-01	1	-    	-   	-   
B000001101	Tracetate Sirup	SYR 	SYR 		385000	385000	462000	462000	462000	462000	462000	462000	462000	731500	462000	462000	0	JB01	1	0	2018-09-30	1	-    	-   	-   
B000001102	Tradosik Injeksi	AMP5	AMP5		16462	16462	19754	19754	19754	19754	19754	19754	19754	31278	19754	19754	0	JB02	1	0	\N	1	-    	-   	-   
B000001103	Tradyl Injeksi	AMP5	AMP5		20108	20108	24130	24130	24130	24130	24130	24130	24130	38205	24130	24130	0	JB02	1	0	\N	1	-    	-   	-   
B000001104	Tramal Injeksi	AMP5	AMP5		36498	36498	43798	43798	43798	43798	43798	43798	43798	69346	43798	43798	0	JB02	1	0	\N	1	-    	-   	-   
B000001105	Tranec 500 mg tab	TAB 	TAB 		2475	2475	2970	2970	2970	2970	2970	2970	2970	4702	2970	2970	0	JB01	1	0	\N	1	-    	-   	-   
B000001106	Tranexid 10% inj	AMP5	AMP5		14300	14300	17160	17160	17160	17160	17160	17160	17160	27170	17160	17160	0	JB02	1	0	\N	1	-    	-   	-   
B000001107	Tranexid 250 mg inj	AMP5	AMP5		11000	11000	13200	13200	13200	13200	13200	13200	13200	20900	13200	13200	0	JB02	1	0	\N	1	-    	-   	-   
B000001108	Tranexid 500 mg inj	AMP5	AMP5		14300	14300	17160	17160	17160	17160	17160	17160	17160	27170	17160	17160	0	JB02	1	0	\N	1	-    	-   	-   
B000001109	Tricefin Injeksi	AMP5	AMP5		198000	198000	237600	237600	237600	237600	237600	237600	237600	376200	237600	237600	0	JB02	1	0	2019-03-01	1	-    	-   	-   
B000001110	Trichodazol Infus	INF 	INF 		91025	91025	109230	109230	109230	109230	109230	109230	109230	172948	109230	109230	0	JB02	1	0	2018-12-31	1	-    	-   	-   
B000001111	Trilac 10 mg Injeks 	AMP5	AMP5		110000	110000	132000	132000	132000	132000	132000	132000	132000	209000	132000	132000	0	JB02	1	0	\N	1	-    	-   	-   
B000001112	Trolit @ 6 Sachet	SAC 	SAC 		10633	10633	12760	12760	12760	12760	12760	12760	12760	20203	12760	12760	0	JB01	1	0	\N	1	-    	-   	-   
B000001113	Tronadex 4 mg inj	AMP5	AMP5		27500	27500	33000	33000	33000	33000	33000	33000	33000	52250	33000	33000	0	JB02	1	0	\N	1	-    	-   	-   
B000001114	Tyason inj	AMP5	AMP5		223850	223850	268620	268620	268620	268620	268620	268620	268620	425315	268620	268620	0	JB02	1	0	\N	1	-    	-   	-   
B000001115	Ulsikur 200 mg	TAB 	TAB 		412	412	494	494	494	494	494	494	494	783	494	494	0	JB01	1	0	\N	1	-    	-   	-   
B000001116	Uldafalk kap	CAP 	CAP 		9962	9962	11954	11954	11954	11954	11954	11954	11954	18928	11954	11954	0	JB01	1	0	\N	1	-    	-   	-   
B000001117	Urispas 200 mg tablet	TAB 	TAB 		5592	5592	6710	6710	6710	6710	6710	6710	6710	10625	6710	6710	0	JB01	1	0	2021-09-30	1	-    	-   	-   
B000001118	Utrogestan 100 mg Tablet	CAP 	CAP 		9900	9900	11880	11880	11880	11880	11880	11880	11880	18810	11880	11880	0	JB01	1	0	2019-02-01	1	-    	-   	-   
B000001119	Utrogestan 200 mg Tablet	CAP 	CAP 		18700	18700	22440	22440	22440	22440	22440	22440	22440	35530	22440	22440	0	JB01	1	0	2019-04-01	1	-    	-   	-   
B000001120	Vaclo 	TAB 	TAB 		13750	13750	16500	16500	16500	16500	16500	16500	16500	26125	16500	16500	0	JB01	1	0	\N	1	-    	-   	-   
B000001121	Valisanbe 2 mg	TAB 	TAB 		200	200	240	240	240	240	240	240	240	380	240	240	0	JB01	1	0	\N	1	-    	-   	-   
B000001122	Valisanbe 10 mg inj 	AMP5	AMP5		14410	14410	17292	17292	17292	17292	17292	17292	17292	27379	17292	17292	0	JB02	1	0	\N	1	-    	-   	-   
B000001123	Valos 500 mg Kapsul	TAB 	TAB 		9680	9680	11616	11616	11616	11616	11616	11616	11616	18392	11616	11616	0	JB01	1	0	\N	1	-    	-   	-   
B000001124	Vasacon 15 ml	TAB 	TAB 		17875	17875	21450	21450	21450	21450	21450	21450	21450	33962	21450	21450	0	JB01	1	0	\N	1	-    	-   	-   
B000001125	Venofer Injeksi	AMP5	AMP5		202400	202400	242880	242880	242880	242880	242880	242880	242880	384560	242880	242880	0	JB02	1	0	2019-02-28	1	-    	-   	-   
B000001126	Ventolin Nebule Injeksi	TAB 	TAB 		9886.8	9886.8	11864	11864	11864	11864	11864	11864	11864	18785	11864	11864	0	JB01	1	0	2019-10-19	1	-    	-   	-   
B000001127	Ventolin Tablet	TAB 	TAB 		2426	2426	2911	2911	2911	2911	2911	2911	2911	4609	2911	2911	0	JB01	1	0	\N	1	-    	-   	-   
B000001128	Vernacel 0,6 ml MD	TUB 	TUB 		22825	22825	27390	27390	27390	27390	27390	27390	27390	43368	27390	27390	0	JB02	1	0	\N	1	-    	-   	-   
B000001129	Vibranat tab	TAB 	TAB 		11000	11000	13200	13200	13200	13200	13200	13200	13200	20900	13200	13200	0	JB01	1	0	\N	1	-    	-   	-   
B000001130	Vioxy FM Tablet*	TAB 	TAB 		4070	4070	4884	4884	4884	4884	4884	4884	4884	7733	4884	4884	0	JB01	1	0	2018-04-30	1	-    	-   	-   
B000001131	Vitacur Sirup*	SYR 	SYR 		36300	36300	43560	43560	43560	43560	43560	43560	43560	68970	43560	43560	0	JB01	1	0	2019-11-01	1	-    	-   	-   
B000001132	Vitanorm tab	TAB 	TAB 		3663	3663	4396	4396	4396	4396	4396	4396	4396	6960	4396	4396	0	JB01	1	0	2018-02-24	1	-    	-   	-   
B000001133	Vitrolenta 5 ml	TAB 	TAB 		36025	36025	43230	43230	43230	43230	43230	43230	43230	68448	43230	43230	0	JB01	1	0	\N	1	-    	-   	-   
B000001134	Vocefa 500 mg	TAB 	TAB 		9350	9350	11220	11220	11220	11220	11220	11220	11220	17765	11220	11220	0	JB01	1	0	\N	1	-    	-   	-   
B000001135	Voltaren gel 10 gr	SAL 	SAL 		28820	28820	34584	34584	34584	34584	34584	34584	34584	54758	34584	34584	0	JB02	1	0	\N	1	-    	-   	-   
B000001136	Voltaren gel 5 gr	SAL 	SAL 		19690	19690	23628	23628	23628	23628	23628	23628	23628	37411	23628	23628	0	JB02	1	0	\N	1	-    	-   	-   
B000001137	Urdafalk Capsul	KAP 	KAP 		10426	10426	12511	12511	12511	12511	12511	12511	12511	19809	12511	12511	0	JB01	1	0	\N	1	-    	-   	-   
B000001138	Lipitor 20 mg Tablet	TAB 	TAB 		17869	17869	21443	21443	21443	21443	21443	21443	21443	33951	21443	21443	0	JB01	1	0	\N	1	-    	-   	-   
B000001139	C	TAB 	TAB 		2090	2090	2508	2508	2508	2508	2508	2508	2508	3971	2508	2508	0	JB01	1	0	\N	1	-    	-   	-   
B000001140	Vomistop FT tab	TAB 	TAB 		3630	3630	4356	4356	4356	4356	4356	4356	4356	6897	4356	4356	0	JB01	1	0	\N	1	-    	-   	-   
B000001141	Vomizole Injeksi	AMP5	AMP5		140250	140250	168300	168300	168300	168300	168300	168300	168300	266475	168300	168300	0	JB02	1	0	\N	1	-    	-   	-   
B000001143	Xanda 60 ml syr	SYR 	SYR 		26620	26620	31944	31944	31944	31944	31944	31944	31944	50578	31944	31944	0	JB01	1	0	\N	1	-    	-   	-   
B000001144	Zaldiar Tablet	TAB 	TAB 		10395	10395	12474	12474	12474	12474	12474	12474	12474	19750	12474	12474	0	JB01	1	0	2019-02-01	1	-    	-   	-   
B000001145	Zibac Injeksi	AMP5	AMP5		66000	66000	79200	79200	79200	79200	79200	79200	79200	125400	79200	79200	0	JB02	1	0	2019-03-01	1	-    	-   	-   
B000001146	Zinc Pro Drop 15 ml*	DRP 	DRP 		29040	29040	34848	34848	34848	34848	34848	34848	34848	55176	34848	34848	0	JB01	1	0	\N	1	-    	-   	-   
B000001147	Zinc Pro Sirup*	SYR 	SYR 		35200	35200	42240	42240	42240	42240	42240	42240	42240	66880	42240	42240	0	JB01	1	0	2019-12-31	1	-    	-   	-   
B000001148	Zinkid*	TAB 	TAB 		2750	2750	3300	3300	3300	3300	3300	3300	3300	5225	3300	3300	0	JB01	1	0	\N	1	-    	-   	-   
B000001149	Zolesco 30 mg Kapsul	CAP 	CAP 		15400	15400	18480	18480	18480	18480	18480	18480	18480	29260	18480	18480	0	JB01	1	0	2019-06-30	1	-    	-   	-   
B000001150	Clinjos 300 mg Kap	CAP 	CAP 		6600	6600	7920	7920	7920	7920	7920	7920	7920	12540	7920	7920	0	JB01	1	0	\N	1	-    	-   	-   
B000001151	Asam Traneksamat 250 mg inj	VL  	VL  		5808	5808	6970	6970	6970	6970	6970	6970	6970	11035	6970	6970	0	JB02	1	0	\N	1	-    	-   	-   
B000001152	Maxpro Syr	SYR 	SYR 		74250	74250	89100	89100	89100	89100	89100	89100	89100	141075	89100	89100	0	JB01	1	0	\N	1	-    	-   	-   
B000001153	Prohistin	TAB 	TAB 		4290	4290	5148	5148	5148	5148	5148	5148	5148	8151	5148	5148	0	JB01	1	0	\N	1	-    	-   	-   
B000001154	Rinocef	SYR 	SYR 		49500	49500	59400	59400	59400	59400	59400	59400	59400	94050	59400	59400	0	JB01	1	0	\N	1	-    	-   	-   
B000001155	Meproson	TAB 	TAB 		2530	2530	3036	3036	3036	3036	3036	3036	3036	4807	3036	3036	0	JB01	1	0	\N	1	-    	-   	-   
B000001156	Inoderm cream	TUB 	TUB 		15950	15950	19140	19140	19140	19140	19140	19140	19140	30305	19140	19140	0	JB02	1	0	\N	1	-    	-   	-   
B000001157	Lincomec 500 mg tab	TAB 	TAB 		4840	4840	5808	5808	5808	5808	5808	5808	5808	9196	5808	5808	0	JB01	1	0	\N	1	-    	-   	-   
B000001158	Brainact 250 mg Injeksi	AMP5	AMP5		47300	47300	56760	56760	56760	56760	56760	56760	56760	89870	56760	56760	0	JB02	1	0	2018-05-28	1	-    	-   	-   
B000001159	Ketorolac 30 mg Injeksi	AMP5	AMP5		14702	14702	17642	17642	17642	17642	17642	17642	17642	27934	17642	17642	0	JB02	1	0	2018-10-31	1	-    	-   	-   
B000001160	Beclov inj	AMP5	AMP5		64680	64680	77616	77616	77616	77616	77616	77616	77616	122892	77616	77616	0	JB02	1	0	\N	1	-    	-   	-   
B000001161	Nerilon 10 gr cream	TUB 	TUB 		44000	44000	52800	52800	52800	52800	52800	52800	52800	83600	52800	52800	0	JB02	1	0	2018-07-31	1	-    	-   	-   
B000001162	Ephedrine inj	AMP5	AMP5		17600	17600	21120	21120	21120	21120	21120	21120	21120	33440	21120	21120	0	JB02	1	0	\N	1	-    	-   	-   
B000001163	Tismamisin 500 mg kap	CAP 	CAP 		4125	4125	4950	4950	4950	4950	4950	4950	4950	7838	4950	4950	0	JB01	1	0	\N	1	-    	-   	-   
B000001164	Infus Livamin 500 ml	INF 	INF 		191250	191250	229500	229500	229500	229500	229500	229500	229500	363375	229500	229500	0	JB02	1	0	\N	1	-    	-   	-   
B000001165	Infus Valamin 500 ml	INF 	INF 		71885	71885	86262	86262	86262	86262	86262	86262	86262	136582	86262	86262	0	JB02	1	0	2018-05-01	1	-    	-   	-   
B000001166	Infus Enerton	INF 	INF 		71033	71033	85240	85240	85240	85240	85240	85240	85240	134963	85240	85240	0	JB02	1	0	\N	1	-    	-   	-   
B000001167	S	TUB 	TUB 		29150	29150	34980	34980	34980	34980	34980	34980	34980	55385	34980	34980	0	JB02	1	0	\N	1	-    	-   	-   
B000001168	Meloxicam 7,5 mg Tablet	TAB 	TAB 		459.8	459.8	552	552	552	552	552	552	552	874	552	552	0	JB01	1	0	2018-12-31	1	-    	-   	-   
B000001169	Pure baby rash cream 	BOX 	BOX 		35200	35200	42240	42240	42240	42240	42240	42240	42240	66880	42240	42240	0	JB02	1	0	\N	1	-    	-   	-   
B000001170	Antasida DEON 	TAB 	TAB 		162	162	194	194	194	194	194	194	194	308	194	194	0	JB01	1	0	\N	1	-    	-   	-   
B000001171	Ethica	TAB 	TAB 		1870	1870	2244	2244	2244	2244	2244	2244	2244	3553	2244	2244	0	JB01	1	0	\N	1	-    	-   	-   
B000001172	Azomax Tablet 500 mg	TAB 	TAB 		29915	42735	51282	51282	51282	51282	51282	51282	51282	81197	51282	51282	0	JB01	1	0	2018-07-31	1	-    	-   	-   
B000001173	Meflamin 50 mg tab	TAB 	TAB 		2000	2000	2400	2400	2400	2400	2400	2400	2400	3800	2400	2400	0	JB01	1	0	\N	1	-    	-   	-   
B000001174	Cefobactam Injeksi	AMP5	AMP5		205370	205370	246444	246444	246444	246444	246444	246444	246444	390203	246444	246444	0	JB02	1	0	2017-03-01	1	-    	-   	-   
B000001176	Herbesser CD 200 tab	TAB 	TAB 		12441	12441	14929	14929	14929	14929	14929	14929	14929	23638	14929	14929	0	JB01	1	0	\N	1	-    	-   	-   
B000001177	Ancefa Syr	SYR 	SYR 		40700	40700	48840	48840	48840	48840	48840	48840	48840	77330	48840	48840	0	JB01	1	0	\N	1	-    	-   	-   
B000001178	Bisolvon Flue 60 ml Syr	SYR 	SYR 		28072	28072	33686	33686	33686	33686	33686	33686	33686	53337	33686	33686	0	JB01	1	0	\N	1	-    	-   	-   
B000001179	Kalfoxim 1000 mg Injeksi	AMP5	AMP5		154000	154000	184800	184800	184800	184800	184800	184800	184800	292600	184800	184800	0	JB02	1	0	\N	1	-    	-   	-   
B000001180	Comtusi Sirup Dewasa 60 ml	SYR 	SYR 		37400	37400	44880	44880	44880	44880	44880	44880	44880	71060	44880	44880	0	JB01	1	0	2019-11-30	1	-    	-   	-   
B000001181	Efagrow A+ Stage 3 400 gr	BOX 	BOX 		116250	116250	139500	139500	139500	139500	139500	139500	139500	220875	139500	139500	0	J007	1	0	\N	1	-    	-   	-   
B000001182	Erysanbe Sirup	BTL 	BTL 		22440	22440	26928	26928	26928	26928	26928	26928	26928	42636	26928	26928	0	JB01	1	0	2020-09-30	1	-    	-   	-   
B000001183	Fenistil Drop 1 mg	DRP 	DRP 		49060	49060	58872	58872	58872	58872	58872	58872	58872	93214	58872	58872	0	JB01	1	0	\N	1	-    	-   	-   
B000001184	Sirplus Sirup	SYR 	SYR 		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB01	1	0	2018-10-01	1	-    	-   	-   
B000001185	Imunos Sirup  60 ml*	SYR 	SYR 		63250	63250	75900	75900	75900	75900	75900	75900	75900	120175	75900	75900	0	JB01	1	0	2019-01-31	1	-    	-   	-   
B000001186	Im	SYR 	SYR 		55000	55000	66000	66000	66000	66000	66000	66000	66000	104500	66000	66000	0	JB01	1	0	\N	1	-    	-   	-   
B000001187	Lapifed Expectoran Sirup 60 ml	SYR 	SYR 		23650	23650	28380	28380	28380	28380	28380	28380	28380	44935	28380	28380	0	JB01	1	0	2019-12-31	1	-    	-   	-   
B000001188	Laxadine Emulsi 60 ml Syr	SYR 	SYR 		36300	36300	43560	43560	43560	43560	43560	43560	43560	68970	43560	43560	0	JB01	1	0	2019-02-01	1	-    	-   	-   
B000001189	Maltofer Syr*	SYR 	SYR 		60500	60500	72600	72600	72600	72600	72600	72600	72600	114950	72600	72600	0	JB01	1	0	\N	1	-    	-   	-   
B000001190	Mucopect Syr	SYR 	SYR 		51429	51429	61715	61715	61715	61715	61715	61715	61715	97715	61715	61715	0	JB01	1	0	\N	1	-    	-   	-   
B000001191	XX	SYR 	SYR 		40150	40150	48180	48180	48180	48180	48180	48180	48180	76285	48180	48180	0	JB01	1	0	\N	1	-    	-   	-   
B000001192	xxxx	DRP 	DRP 		30360	30360	36432	36432	36432	36432	36432	36432	36432	57684	36432	36432	0	JB01	1	0	\N	1	-    	-   	-   
B000001193	Ottopan Syr	SYR 	SYR 		12100	12100	14520	14520	14520	14520	14520	14520	14520	22990	14520	14520	0	JB01	1	0	\N	1	-    	-   	-   
B000001194	Intunal Forte Tablet	TAB 	TAB 		726	726	871	871	871	871	871	871	871	1379	871	871	0	JB01	1	0	2020-02-01	1	-    	-   	-   
B000001195	Cotrimoxsazole Tablet	TAB 	TAB 		191	191	229	229	229	229	229	229	229	363	229	229	0	JB01	1	0	\N	1	-    	-   	-   
B000001196	Co Amoxiclav 625 mg Tablet	CAP 	CAP 		5809	5809	6971	6971	6971	6971	6971	6971	6971	11037	6971	6971	0	JB01	1	0	2019-08-31	1	-    	-   	-   
B000001197	Griseofulvin 125 mg Tab	TAB 	TAB 		240	240	288	288	288	288	288	288	288	456	288	288	0	JB01	1	0	\N	1	-    	-   	-   
B000001198	Furosemid Tab	TAB 	TAB 		125	125	150	150	150	150	150	150	150	238	150	150	0	JB01	1	0	\N	1	-    	-   	-   
B000001199	Decadryl Syr	SYR 	SYR 		10577	10577	12692	12692	12692	12692	12692	12692	12692	20096	12692	12692	0	JB01	1	0	\N	1	-    	-   	-   
B000001200	Turpan 160 mg syr	SYR 	SYR 		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB01	1	0	\N	1	-    	-   	-   
B000001202	Tiriz Drop	DRP 	DRP 		63800	63800	76560	76560	76560	76560	76560	76560	76560	121220	76560	76560	0	JB01	1	0	2020-03-01	1	-    	-   	-   
B000001203	Zink Pro Drop	SYR 	SYR 		29040	29040	34848	34848	34848	34848	34848	34848	34848	55176	34848	34848	0	JB01	1	0	\N	1	-    	-   	-   
B000001204	Zink Pro Sirup	DRP 	DRP 		35200	35200	42240	42240	42240	42240	42240	42240	42240	66880	42240	42240	0	JB01	1	0	\N	1	-    	-   	-   
B000001205	Epinephrine Injeksi	VL  	VL  		8910	8910	10692	10692	10692	10692	10692	10692	10692	16929	10692	10692	0	JB01	1	0	\N	1	-    	-   	-   
B000001206	Bufect Sirup	DRP 	DRP 		16275	16275	19529	19529	19529	19529	19529	19529	19529	30922	19529	19529	0	JB01	1	0	2019-11-01	1	-    	-   	-   
B000001207	Acrios 50 mg tab	TAB 	TAB 		2078	2750	3300	3300	3300	3300	3300	3300	3300	5225	3300	3300	0	JB01	1	50	\N	1	-    	-   	-   
B000001208	Lacedim inj	AMP5	AMP5		187000	187000	224400	224400	224400	224400	224400	224400	224400	355300	224400	224400	0	JB02	1	0	\N	1	-    	-   	-   
B000001209	Lasal 2 mg cap	CAP 	CAP 		1155	1155	1386	1386	1386	1386	1386	1386	1386	2194	1386	1386	0	JB01	1	0	2021-12-31	1	-    	-   	-   
B000001210	Dextral Forte tab	CAP 	CAP 		605	605	726	726	726	726	726	726	726	1150	726	726	0	JB01	1	0	\N	1	-    	-   	-   
B000001211	Vib Albumin Plus Sachet	SAC 	SAC 		60500	60500	72600	72600	72600	72600	72600	72600	72600	114950	72600	72600	0	JB01	1	0	\N	1	-    	-   	-   
B000001212	Torasic 10 mg tab	TAB 	TAB 		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB01	1	0	\N	1	-    	-   	-   
B000001213	Ceftien inj	AMP5	AMP5		184800	184800	221760	221760	221760	221760	221760	221760	221760	351120	221760	221760	0	JB02	1	0	\N	1	-    	-   	-   
B000001214	Givincef inj	AMP5	AMP5		258500	258500	310200	310200	310200	310200	310200	310200	310200	491150	310200	310200	0	JB02	1	0	\N	1	-    	-   	-   
B000001215	Rexamin infus	INF 	INF 		88000	88000	105600	105600	105600	105600	105600	105600	105600	167200	105600	105600	0	JB02	1	0	\N	1	-    	-   	-   
B000001216	Oscal 0,5 mg Kapsul*	CAP 	CAP 		11257	11257	13508	13508	13508	13508	13508	13508	13508	21388	13508	13508	0	JB01	1	0	2018-11-30	1	-    	-   	-   
B000001217	Cordarone 150 mg inj	AMP5	AMP5		30597	30597	36716	36716	36716	36716	36716	36716	36716	58134	36716	36716	0	JB02	1	0	\N	1	-    	-   	-   
B000001218	Truvaz 10 mg Tablet	TAB 	TAB 		13383	13383	16060	16060	16060	16060	16060	16060	16060	25428	16060	16060	0	JB01	1	0	\N	1	-    	-   	-   
B000001219	Truvaz 20 mg Tablet	TAB 	TAB 		13384	13384	16061	16061	16061	16061	16061	16061	16061	25430	16061	16061	0	JB01	1	0	\N	1	-    	-   	-   
B000001221	Clinimix N9G1SE 1 liter infus	INF 	INF 		353100	353100	423720	423720	423720	423720	423720	423720	423720	670890	423720	423720	0	JB02	1	0	\N	1	-    	-   	-   
B000001222	Clinoleic 20% 100 ml infus	INF 	INF 		193600	193600	232320	232320	232320	232320	232320	232320	232320	367840	232320	232320	0	JB02	1	0	\N	1	-    	-   	-   
B000001223	Mologit	TAB 	TAB 		368	368	442	442	442	442	442	442	442	699	442	442	0	JB01	1	0	\N	1	-    	-   	-   
B000001224	Interzol Cream 5 gr	CRM 	CRM 		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB02	1	0	\N	1	-    	-   	-   
B000001225	Siloxan 5 ml	BTL 	BTL 		58025	58025	69630	69630	69630	69630	69630	69630	69630	110248	69630	69630	0	JB02	1	0	\N	1	-    	-   	-   
B000001226	Good Life Biocal-95 Kaplet Salut*	KAP 	KAP 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	\N	1	-    	-   	-   
B000001228	La	AMP5	AMP5		34485	34485	41382	41382	41382	41382	41382	41382	41382	65522	41382	41382	0	JB02	1	0	\N	1	-    	-   	-   
B000001229	Hi-Bone 600 Kap Salut Selaput	KAP 	KAP 		3575	3575	4290	4290	4290	4290	4290	4290	4290	6792	4290	4290	0	JB01	1	0	\N	1	-    	-   	-   
B000001230	Kalxetin 20 mg Kapsul	KAP 	KAP 		6233	6233	7480	7480	7480	7480	7480	7480	7480	11843	7480	7480	0	JB01	1	0	\N	1	-    	-   	-   
B000001231	Amoxycillin Dry Syr 125 mg/ 5 ml	SYR 	SYR 		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB01	1	0	\N	1	-    	-   	-   
B000001232	Avamys Nasal Spray	BTL 	BTL 		132000	132000	158400	158400	158400	158400	158400	158400	158400	250800	158400	158400	0	JB01	1	0	\N	1	-    	-   	-   
B000001233	Starcef Dry Syr 30 ml	SYR 	SYR 		82500	82500	99000	99000	99000	99000	99000	99000	99000	156750	99000	99000	0	JB01	1	0	\N	1	-    	-   	-   
B000001234	Cefixime Sirup	SYR 	SYR 		19800	19800	23760	23760	23760	23760	23760	23760	23760	37620	23760	23760	0	JB01	1	0	\N	1	-    	-   	-   
B000001235	Renasistin Drop	DRP 	DRP 		55000	55000	66000	66000	66000	66000	66000	66000	66000	104500	66000	66000	0	JB01	1	0	2018-01-31	1	-    	-   	-   
B000001236	Naprex Drop	DRP 	DRP 		39500	39500	47400	47400	47400	47400	47400	47400	47400	75050	47400	47400	0	JB01	1	0	\N	1	-    	-   	-   
B000001237	Susu Peptisol Vanila 185 gr	BOX 	BOX 		56100	56100	67320	67320	67320	67320	67320	67320	67320	106590	67320	67320	0	J007	1	0	\N	1	-    	-   	-   
B000001238	Ceforim inj	VL  	VL  		306714	306714	368057	368057	368057	368057	368057	368057	368057	582757	368057	368057	0	JB02	1	0	\N	1	-    	-   	-   
B000001239	Na Phenytoin 100 mg Kapsul	CAP 	CAP 		605	605	726	726	726	726	726	726	726	1150	726	726	0	JB01	1	0	2020-02-29	1	-    	-   	-   
B000001240	Eyevit Sirup*	SYR 	SYR 		55000	55000	66000	66000	66000	66000	66000	66000	66000	104500	66000	66000	0	JB01	1	0	\N	1	-    	-   	-   
B000001241	Osteocal Tab*	TAB 	TAB 		954	954	1145	1145	1145	1145	1145	1145	1145	1813	1145	1145	0	JB01	1	0	\N	1	-    	-   	-   
B000001242	Hytrin 1 mg Tab	TAB 	TAB 		7707	7707	9248	9248	9248	9248	9248	9248	9248	14643	9248	9248	0	JB01	1	0	\N	1	-    	-   	-   
B000001243	Hi Bone 600 Tab*	TAB 	TAB 		3575	3575	4290	4290	4290	4290	4290	4290	4290	6792	4290	4290	0	JB01	1	0	\N	1	-    	-   	-   
B000001244	Cendo Siloxan 5 ml ED	TUB 	TUB 		75000	75000	90000	90000	90000	90000	90000	90000	90000	142500	90000	90000	0	JB02	1	0	\N	1	-    	-   	-   
B000001245	Cendo Hyalub 5 ml	TUB 	TUB 		58575	58575	70290	70290	70290	70290	70290	70290	70290	111292	70290	70290	0	JB02	1	0	2019-10-01	1	-    	-   	-   
B000001246	Berotec Inhaler	PCS 	PCS 		176485	176485	211782	211782	211782	211782	211782	211782	211782	335322	211782	211782	0	JB01	1	0	2018-11-30	1	-    	-   	-   
B000001247	Seretide Diskus 500 Inh	PCS 	PCS 		180659	180659	216791	216791	216791	216791	216791	216791	216791	343252	216791	216791	0	JB01	1	0	2018-03-31	1	-    	-   	-   
B000001248	Tizos Injeksi	AMP5	AMP5		221100	221100	265320	265320	265320	265320	265320	265320	265320	420090	265320	265320	0	JB02	1	0	2018-02-28	1	-    	-   	-   
B000001249	Renxamin Infus	BTL 	BTL 		88000	88000	105600	105600	105600	105600	105600	105600	105600	167200	105600	105600	0	JB02	1	0	\N	1	-    	-   	-   
B000001250	Nepatic Cap	CAP 	CAP 		10230	10230	12276	12276	12276	12276	12276	12276	12276	19437	12276	12276	0	JB01	1	0	\N	1	-    	-   	-   
B000001251	Vip Albumin Plus Sachet*	SAC 	SAC 		66000	66000	79200	79200	79200	79200	79200	79200	79200	125400	79200	79200	0	JB01	1	0	2018-10-31	1	-    	-   	-   
B000001252	Vesitab 6 mg Tab	TAB 	TAB 		2541	2541	3049	3049	3049	3049	3049	3049	3049	4828	3049	3049	0	JB01	1	0	\N	1	-    	-   	-   
B000001253	Tetagam Generik Anti Tetanus Serum 1500 IU	AMP5	AMP5		126500	126500	151800	151800	151800	151800	151800	151800	151800	240350	151800	151800	0	JB02	1	0	\N	1	-    	-   	-   
B000001254	Atovar 20 mg tab	TAB 	TAB 		10450	10450	12540	12540	12540	12540	12540	12540	12540	19855	12540	12540	0	JB01	1	0	\N	1	-    	-   	-   
B000001255	Sibro 20 gr Cream	PCS 	PCS 		84700	84700	101640	101640	101640	101640	101640	101640	101640	160930	101640	101640	0	JB02	1	0	\N	1	-    	-   	-   
B000001256	Nexium 20 mg Tab	TAB 	TAB 		18516.3	18516.3	22220	22220	22220	22220	22220	22220	22220	35181	22220	22220	0	JB01	1	0	2017-11-30	1	-    	-   	-   
B000001257	Psidii Syrup	SYR 	SYR 		36300	36300	43560	43560	43560	43560	43560	43560	43560	68970	43560	43560	0	JB01	1	0	\N	1	-    	-   	-   
B000001258	Volequin 500 mg tab	TAB 	TAB 		28600	28600	34320	34320	34320	34320	34320	34320	34320	54340	34320	34320	0	JB01	1	0	\N	1	-    	-   	-   
B000001259	Incetax 1 gr inj	AMP5	AMP5		124300	124300	149160	149160	149160	149160	149160	149160	149160	236170	149160	149160	0	JB02	1	0	\N	1	-    	-   	-   
B000001260	Clopidogrel 75 mg tab	TAB 	TAB 		9900	9900	11880	11880	11880	11880	11880	11880	11880	18810	11880	11880	0	JB01	1	0	\N	1	-    	-   	-   
B000001261	Terfacef Injeksi	AMP5	AMP5		215380	215380	258456	258456	258456	258456	258456	258456	258456	409222	258456	258456	0	JB02	1	0	2018-08-01	1	-    	-   	-   
B000001262	Amoxsan Injeksi	VL  	VL  		25059	25059	30071	30071	30071	30071	30071	30071	30071	47612	30071	30071	0	JB02	1	0	\N	1	-    	-   	-   
B000001264	Verorab Inj	AMP5	AMP5		174500	174500	209400	209400	209400	209400	209400	209400	209400	331550	209400	209400	0	JB02	1	0	\N	1	-    	-   	-   
B000001265	Nutribaby Royal Comfort 400 gr (Bayi muntah)	KAL 	KAL 		177708	177708	213250	213250	213250	213250	213250	213250	213250	337645	213250	213250	0	J007	1	0	\N	1	-    	-   	-   
B000001266	Nutribaby Royal Pronutra 1 400 gr(Bayi Normal)	KAL 	KAL 		97019	97019	116423	116423	116423	116423	116423	116423	116423	184336	116423	116423	0	J007	1	0	2018-07-20	1	-    	-   	-   
B000001267	Interom Inj	AMP5	AMP5		263835	263835	316602	316602	316602	316602	316602	316602	316602	501286	316602	316602	0	JB02	1	0	\N	1	-    	-   	-   
B000001268	Azomax syr	BTL 	BTL 		88000	88000	105600	105600	105600	105600	105600	105600	105600	167200	105600	105600	0	JB01	1	0	\N	1	-    	-   	-   
B000001269	Thidim Injeksi	AMP5	AMP5		220000	220000	264000	264000	264000	264000	264000	264000	264000	418000	264000	264000	0	JB02	1	0	2019-01-31	1	-    	-   	-   
B000001270	Nuzip 25 mg Tab	BOX 	BOX 		4000	4000	4800	4800	4800	4800	4800	4800	4800	7600	4800	4800	0	JB01	1	0	\N	1	-    	-   	-   
B000001271	Opimer inj	VL  	VL  		407000	407000	488400	488400	488400	488400	488400	488400	488400	773300	488400	488400	0	JB02	1	0	\N	1	-    	-   	-   
B000001272	Socef inj	VL  	VL  		192500	192500	231000	231000	231000	231000	231000	231000	231000	365750	231000	231000	0	JB02	1	0	\N	1	-    	-   	-   
B000001273	Zepe Injeksi	VL  	VL  		308000	308000	369600	369600	369600	369600	369600	369600	369600	585200	369600	369600	0	JB02	1	0	\N	1	-    	-   	-   
B000001274	Bactraz inj	VL  	VL  		181500	181500	217800	217800	217800	217800	217800	217800	217800	344850	217800	217800	0	JB02	1	0	\N	1	-    	-   	-   
B000001275	Zeyco	VL  	VL  		225000	225000	270000	270000	270000	270000	270000	270000	270000	427500	270000	270000	0	JB02	1	0	\N	1	-    	-   	-   
B000001276	Vometraz 8 mg inj	AMP5	AMP5		44000	44000	52800	52800	52800	52800	52800	52800	52800	83600	52800	52800	0	JB02	1	0	\N	1	-    	-   	-   
B000001277	Planibu inj	VL  	VL  		15125	15125	18150	18150	18150	18150	18150	18150	18150	28738	18150	18150	0	JB02	1	0	\N	1	-    	-   	-   
B000001278	Fladex Infus 5%	VL  	VL  		79750	79750	95700	95700	95700	95700	95700	95700	95700	151525	95700	95700	0	JB02	1	0	2018-10-31	1	-    	-   	-   
B000001279	Fluconazole inf	VL  	VL  		121000	121000	145200	145200	145200	145200	145200	145200	145200	229900	145200	145200	0	JB02	1	0	\N	1	-    	-   	-   
B000001280	Volequin	INF 	INF 		286000	286000	343200	343200	343200	343200	343200	343200	343200	543400	343200	343200	0	JB02	1	0	\N	1	-    	-   	-   
B000001281	Provital Plus Tablet*	TAB 	TAB 		4675	4675	5610	5610	5610	5610	5610	5610	5610	8882	5610	5610	0	JB01	1	0	\N	1	-    	-   	-   
B000001282	Promuba Infus	INF 	INF 		71500	71500	85800	85800	85800	85800	85800	85800	85800	135850	85800	85800	0	JB02	1	0	\N	1	-    	-   	-   
B000001283	Amoxsan Forte Sirup	Fle 	Fle 		39312	39312	47174	47174	47174	47174	47174	47174	47174	74693	47174	47174	0	JB01	1	0	\N	1	-    	-   	-   
B000001284	Interzinc Sirup 60 ml*	BTL 	BTL 		25482	25482	30578	30578	30578	30578	30578	30578	30578	48416	30578	30578	0	JB01	1	0	\N	1	-    	-   	-   
B000001285	Asthin Force 4mg  Kap*	CAP 	CAP 		7638	7638	9166	9166	9166	9166	9166	9166	9166	14512	9166	9166	0	JB01	1	0	2018-08-31	1	-    	-   	-   
B000001286	Oscal 0,25 mg Kapsul*	CAP 	CAP 		6967	6967	8360	8360	8360	8360	8360	8360	8360	13237	8360	8360	0	JB01	1	0	2018-09-30	1	-    	-   	-   
B000001287	Trovensis inj 4 ml	VL  	VL  		66792	66792	80150	80150	80150	80150	80150	80150	80150	126905	80150	80150	0	JB02	1	0	\N	1	-    	-   	-   
B000001288	Prolacta With DHA For Baby*	BOX 	BOX 		5280	5280	6336	6336	6336	6336	6336	6336	6336	10032	6336	6336	0	JB01	1	0	\N	1	-    	-   	-   
B000001289	xxx	TAB 	TAB 		16343	16343	19612	19612	19612	19612	19612	19612	19612	31052	19612	19612	0	JB01	1	0	\N	1	-    	-   	-   
B000001290	Seretide Diskus 250 Inh	PCS 	PCS 		166278	166278	199534	199534	199534	199534	199534	199534	199534	315928	199534	199534	0	JB01	1	0	\N	1	-    	-   	-   
B000001291	Cerini Caps	BOX 	BOX 		3498	3498	4198	4198	4198	4198	4198	4198	4198	6646	4198	4198	0	JB01	1	0	\N	1	-    	-   	-   
B000001292	Trovensis 4 mg Tablet	TAB 	TAB 		12463	12463	14956	14956	14956	14956	14956	14956	14956	23680	14956	14956	0	JB01	1	0	2018-09-01	1	-    	-   	-   
B000001293	Furesco 300 mg Kap	TAB 	TAB 		3575	3575	4290	4290	4290	4290	4290	4290	4290	6792	4290	4290	0	JB01	1	0	\N	1	-    	-   	-   
B000001294	ACARBOSE TAB 100MG(Box/100)	TAB 	TAB 		10688	14641	17569	17569	17569	17569	17569	17569	17569	27818	17569	17569	0	JB01	1	0	2019-10-19	1	-    	K02 	G03 
B000001295	ALBUMINAR 20% x 50ML	VL  	VL  		952875	952875	1143450	1143450	1143450	1143450	1143450	1143450	1143450	1810463	1143450	1143450	0	JB02	1	0	\N	1	-    	-   	-   
B000001296	Procalma Kapsul*	TAB 	TAB 		4015	4015	4818	4818	4818	4818	4818	4818	4818	7628	4818	4818	0	JB01	1	0	2019-02-28	1	-    	-   	-   
B000001297	Laktafit Tab*	TAB 	TAB 		2695	2695	3234	3234	3234	3234	3234	3234	3234	5120	3234	3234	0	JB01	1	0	\N	1	-    	-   	-   
B000001298	Trogyl 500 mg Tablet	TAB 	TAB 		1650	1650	1980	1980	1980	1980	1980	1980	1980	3135	1980	1980	0	JB01	1	0	\N	1	-    	-   	-   
B000001299	Apolar Cream 10 gr	TUB 	TUB 		34650	34650	41580	41580	41580	41580	41580	41580	41580	65835	41580	41580	0	JB02	1	0	\N	1	-    	-   	-   
B000001300	Claneksi Dry Syr	SYR 	SYR 		53680	53680	64416	64416	64416	64416	64416	64416	64416	101992	64416	64416	0	JB01	1	0	2018-11-30	1	-    	-   	-   
B000001301	Sanmag  Sirup	BTL 	BTL 		24860	24860	29832	29832	29832	29832	29832	29832	29832	47234	29832	29832	0	JB01	1	0	\N	1	-    	-   	-   
B000001302	Supramox 125 mg/ 5 ml	BTL 	BTL 		19800	19800	23760	23760	23760	23760	23760	23760	23760	37620	23760	23760	0	JB01	1	0	\N	1	-    	-   	-   
B000001303	Supralysin Baby Drop 15 ml*	BTL 	BTL 		24200	24200	29040	29040	29040	29040	29040	29040	29040	45980	29040	29040	0	JB01	1	0	2017-10-01	1	-    	-   	-   
B000001304	Infus KN-3B Sol	BTL 	BTL 		18480	18480	22176	22176	22176	22176	22176	22176	22176	35112	22176	22176	0	JB03	1	0	\N	1	-    	-   	-   
B000001305	Otsu- Manitol 20	BTL 	BTL 		88000	88000	105600	105600	105600	105600	105600	105600	105600	167200	105600	105600	0	JB03	1	0	2019-07-20	1	-    	-   	-   
B000001306	Lansoprazole  NOVELL	CAP 	CAP 		1000	1000	1200	1200	1200	1200	1200	1200	1200	1900	1200	1200	0	JB01	1	0	\N	1	-    	-   	-   
B000001308	Dexaflox 400 mg 	TAB 	TAB 		27500	27500	33000	33000	33000	33000	33000	33000	33000	52250	33000	33000	0	JB01	1	0	\N	1	-    	-   	-   
B000001309	Rillus (Biogaia) Tablet	TAB 	TAB 		7186.6674	7186.6674	8624	8624	8624	8624	8624	8624	8624	13655	8624	8624	0	JB01	1	0	2018-08-31	1	-    	-   	-   
B000001310	Sevodex Botol	BTL 	BTL 		2860000	2860000	3432000	3432000	3432000	3432000	3432000	3432000	3432000	5434000	3432000	3432000	0	JB04	1	0	\N	1	-    	-   	-   
B000001311	Stesolid Rec Tec 10 mg	TUB 	TUB 		39240	39240	47088	47088	47088	47088	47088	47088	47088	74556	47088	47088	0	JB02	1	0	2018-10-31	1	-    	-   	-   
B000001312	Cefomax 1 gr Injeksi	VL  	VL  		115500	115500	138600	138600	138600	138600	138600	138600	138600	219450	138600	138600	0	JB02	1	0	\N	1	-    	-   	-   
B000001313	Amoxsan Drops	Fle 	Fle 		25059	25059	30071	30071	30071	30071	30071	30071	30071	47612	30071	30071	0	JB01	1	0	2019-04-01	1	-    	-   	-   
B000001314	SPUIT 1 CC TERUMO	PCS 	PCS 		6050	6050	7260	7260	7260	7260	7260	7260	7260	11495	7260	7260	0	JB03	1	0	\N	1	-    	-   	-   
B000001315	Myonal Tablet	TAB 	TAB 		7165	7165	8598	8598	8598	8598	8598	8598	8598	13614	8598	8598	0	JB01	1	0	2021-10-19	1	-    	-   	-   
B000001316	COMAFUSIN HEPAR INFUS	PCS 	PCS 		231000	231000	277200	277200	277200	277200	277200	277200	277200	438900	277200	277200	0	JB03	1	0	2019-09-30	1	-    	-   	-   
B000001317	BUNASCAN SPINAL 	AMP5	AMP5		63800	63800	76560	76560	76560	76560	76560	76560	76560	121220	76560	76560	0	JB02	1	0	2018-09-30	1	-    	-   	-   
B000001318	Gelafusal Infus 500 ML	INF 	INF 		181500	181500	217800	217800	217800	217800	217800	217800	217800	344850	217800	217800	0	JB02	1	10	\N	1	-    	-   	-   
B000001319	Handscoon Non Steril / Box	BOX 	BOX 		79200	79200	95040	95040	95040	95040	95040	95040	95040	150480	95040	95040	0	JB03	1	0	\N	1	-    	-   	-   
B000001320	Ferriz Drop*	BTL 	BTL 		33000	33000	39600	39600	39600	39600	39600	39600	39600	62700	39600	39600	0	JB01	1	0	2018-08-31	1	-    	-   	-   
B000001321	KENALOG ORABASE SALEP	TUB 	TUB 		51590	51590	61908	61908	61908	61908	61908	61908	61908	98021	61908	61908	0	JB02	1	0	\N	1	-    	-   	-   
B000001322	Stabixin Injeksi	VL  	VL  		165000	165000	198000	198000	198000	198000	198000	198000	198000	313500	198000	198000	0	JB02	1	0	\N	1	-    	-   	-   
B000001323	xxx	CAP 	CAP 		10340	10340	12408	12408	12408	12408	12408	12408	12408	19646	12408	12408	0	JB01	1	0	\N	1	-    	-   	-   
B000001324	Formyco Cream 	TUB 	TUB 		18260	18260	21912	21912	21912	21912	21912	21912	21912	34694	21912	21912	0	JB02	1	0	\N	1	-    	-   	-   
B000001325	Glaucon 2x10 tablet	TAB 	TAB 		4180	4180	5016	5016	5016	5016	5016	5016	5016	7942	5016	5016	0	JB01	1	0	\N	1	-    	-   	-   
B000001326	Cravit Infus	INF 	INF 		297000	297000	356400	356400	356400	356400	356400	356400	356400	564300	356400	356400	0	JB02	1	0	\N	1	-    	-   	-   
B000001327	Lapimuc Tablet 30 mg@100	TAB 	TAB 		770	770	924	924	924	924	924	924	924	1463	924	924	0	JB01	1	0	\N	1	-    	-   	-   
B000001328	Frego 10 mg	TAB 	TAB 		8140	8140	9768	9768	9768	9768	9768	9768	9768	15466	9768	9768	0	JB01	1	0	2018-11-30	1	-    	-   	-   
B000001329	Plavix Tab 28	TAB 	TAB 		25905	25905	31086	31086	31086	31086	31086	31086	31086	49220	31086	31086	0	JB01	1	0	2018-11-30	1	-    	-   	-   
B000001330	Bio Save Serum Anti Bisa Ular	BOX 	BOX 		473000	473000	567600	567600	567600	567600	567600	567600	567600	898700	567600	567600	0	JB02	1	0	\N	1	-    	-   	-   
B000001331	L Bio Sachet*	BOX 	BOX 		6050	6050	7260	7260	7260	7260	7260	7260	7260	11495	7260	7260	0	JB01	1	0	\N	1	-    	-   	-   
B000001332	Cendo Statrol Minidose	BOX 	BOX 		18562	18562	22274	22274	22274	22274	22274	22274	22274	35268	22274	22274	0	JB02	1	0	\N	1	-    	-   	-   
B000001333	Cravox 500 mg Tab 10	TAB 	TAB 		33000	33000	39600	39600	39600	39600	39600	39600	39600	62700	39600	39600	0	JB01	1	0	\N	1	-    	-   	-   
B000001334	Santocyn Injeksi	VL  	VL  		11726	11726	14071	14071	14071	14071	14071	14071	14071	22279	14071	14071	0	JB02	1	0	2018-11-01	1	-    	-   	-   
B000001335	Prolic 300 mg (Clindamisin)	CAP 	CAP 		7332	7332	8798	8798	8798	8798	8798	8798	8798	13931	8798	8798	0	JB01	1	0	\N	1	-    	-   	-   
B000001336	Letonal 100 mg	TAB 	TAB 		4620	4620	5544	5544	5544	5544	5544	5544	5544	8778	5544	5544	0	JB01	1	0	\N	1	-    	-   	-   
B000001337	Maintate 5 mg Tab 30	TAB 	TAB 		7419	7419	8903	8903	8903	8903	8903	8903	8903	14096	8903	8903	0	JB01	1	0	\N	1	-    	-   	-   
B000001338	Dazolin Inf Metronidazole	BTL 	BTL 		68750	68750	82500	82500	82500	82500	82500	82500	82500	130625	82500	82500	0	JB02	1	0	\N	1	-    	-   	-   
B000001339	Renax Kapsul 	CAP 	CAP 		7590	7590	9108	9108	9108	9108	9108	9108	9108	14421	9108	9108	0	JB01	1	0	2020-02-29	1	-    	-   	-   
B000001340	Cefspan 100 mg Kapsul 30 	CAP 	CAP 		22550	22550	27060	27060	27060	27060	27060	27060	27060	42845	27060	27060	0	JB01	1	0	\N	1	-    	-   	-   
B000001341	Divask 5 mg	TAB 	TAB 		6600	6600	7920	7920	7920	7920	7920	7920	7920	12540	7920	7920	0	JB01	1	0	\N	1	-    	-   	-   
B000001342	Susu Nephrisol 185 gr	BOX 	BOX 		51150	51150	61380	61380	61380	61380	61380	61380	61380	97185	61380	61380	0	JB01	1	0	\N	1	-    	-   	-   
B000001343	Iliadin Moist	BOX 	BOX 		17479	17479	20975	20975	20975	20975	20975	20975	20975	33210	20975	20975	0	JB01	1	0	\N	1	-    	-   	-   
B000001344	Droxal Forte DS	BTL 	BTL 		66000	66000	79200	79200	79200	79200	79200	79200	79200	125400	79200	79200	0	JB01	1	3	\N	1	-    	-   	-   
B000001345	Atramat PGA 4/0 Tapper	PCS 	PCS 		110000	110000	132000	132000	132000	132000	132000	132000	132000	209000	132000	132000	0	JB02	1	0	\N	1	-    	-   	-   
B000001346	Atramat Polypropylene 6/0 Cutting	PCS 	PCS 		114000	114000	136800	136800	136800	136800	136800	136800	136800	216600	136800	136800	0	JB02	1	0	\N	1	-    	-   	-   
B000001347	Atramat PGA 2/0 Tapper	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB02	1	0	\N	1	-    	-   	-   
B000001348	COverplast Transparent 24mm	BOX 	BOX 		34375	34375	41250	41250	41250	41250	41250	41250	41250	65312	41250	41250	0	JB02	1	0	\N	1	-    	-   	-   
B000001349	Leukomed IV box 50"s	PCS 	PCS 		2800	2800	3360	3360	3360	3360	3360	3360	3360	5320	3360	3360	0	JB02	1	0	\N	1	-    	-   	-   
B000001350	Metronidazole Infus 	BTL 	BTL 		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB02	1	0	\N	1	-    	-   	-   
B000001350s	Suction Catheter All Size (New)	PCS 	PCS 		6600	6600	7920	7920	7920	7920	7920	7920	7920	12540	7920	7920	0	JB02	1	0	\N	1	-    	-   	-   
B000001351	Ventolin Inhaler	PCS 	PCS 		98868	98868	118642	118642	118642	118642	118642	118642	118642	187849	118642	118642	0	JB01	1	0	\N	1	-    	-   	-   
B000001352	Lapicef 125 mg Sirup	BTL 	BTL 		46200	46200	55440	55440	55440	55440	55440	55440	55440	87780	55440	55440	0	JB01	1	0	2019-09-30	1	-    	-   	-   
B000001353	Lapicef 250 Sirup Forte	BTL 	BTL 		74800	74800	89760	89760	89760	89760	89760	89760	89760	142120	89760	89760	0	JB01	1	0	2019-08-31	1	-    	-   	-   
B000001354	Molcin Infus 400mg/250mL	BTL 	BTL 		330000	330000	396000	396000	396000	396000	396000	396000	396000	627000	396000	396000	0	JB02	1	2	\N	1	-    	-   	-   
B000001355	Diamicron MR 	TAB 	TAB 		6237	6237	7484	7484	7484	7484	7484	7484	7484	11850	7484	7484	0	JB01	1	30	\N	1	-    	-   	-   
B000001356	Xepagel Cream	CRM 	CRM 		137500	137500	165000	165000	165000	165000	165000	165000	165000	261250	165000	165000	0	JB02	1	5	\N	1	-    	-   	-   
B000001358	Nutribaby Premature 400 gram	BOX 	BOX 		155902	155902	187082	187082	187082	187082	187082	187082	187082	296214	187082	187082	0	J007	1	2	\N	1	-    	-   	-   
B000001359	Brazine Tablet	TAB 	TAB 		1500	1500	1800	1800	1800	1800	1800	1800	1800	2850	1800	1800	0	JB01	1	0	\N	1	-    	-   	-   
B000001360	Folavicap 1000*	TAB 	TAB 		1447	1447	1736	1736	1736	1736	1736	1736	1736	2749	1736	1736	0	JB01	1	0	\N	1	-    	-   	-   
B000001361	Ostelox 7,5 mg Tablet	TAB 	TAB 		5753	5753	6904	6904	6904	6904	6904	6904	6904	10931	6904	6904	0	JB01	1	0	\N	1	-    	-   	-   
B000001362	Ceftrimax Injeksi	VL  	VL  		198000	198000	237600	237600	237600	237600	237600	237600	237600	376200	237600	237600	0	JB02	1	0	\N	1	-    	-   	-   
B000001363	Pantozol 20 mg Tablet	TAB 	TAB 		16343.8	16343.8	19613	19613	19613	19613	19613	19613	19613	31053	19613	19613	0	JB01	1	21	2017-10-01	1	-    	-   	-   
B000001364	Wundres B 10x20 5 Sachet/box	PCS 	PCS 		110000	110000	132000	132000	132000	132000	132000	132000	132000	209000	132000	132000	0	JB02	1	0	\N	1	-    	-   	-   
B000001365	Wundres N 10x20 5 sachet/box	PCS 	PCS 		126500	126500	151800	151800	151800	151800	151800	151800	151800	240350	151800	151800	0	JB02	1	0	\N	1	-    	-   	-   
B000001366	XXXXXX	AMP5	AMP5		9680	9680	11616	11616	11616	11616	11616	11616	11616	18392	11616	11616	0	JB02	1	0	\N	1	-    	-   	-   
B000001367	Solaneuron 100 tablet	TAB 	TAB 		990	990	1188	1188	1188	1188	1188	1188	1188	1881	1188	1188	0	JB01	1	0	\N	1	-    	-   	-   
B000001368	Clacef 1 gram Injeksi	VL  	VL  		132000	132000	158400	158400	158400	158400	158400	158400	158400	250800	158400	158400	0	JB02	1	20	\N	1	-    	-   	-   
B000001369	Nifudiar syr	SYR 	SYR 		39600	39600	47520	47520	47520	47520	47520	47520	47520	75240	47520	47520	0	JB01	1	8	2020-05-31	1	-    	-   	-   
B000001370	Depakene syr 250mg/5mL	SYR 	SYR 		172370	172370	206844	206844	206844	206844	206844	206844	206844	327503	206844	206844	0	JB01	1	3	\N	1	-    	-   	-   
B000001371	Osvion Plus Kapsul	CAP 	CAP 		6600	6600	7920	7920	7920	7920	7920	7920	7920	12540	7920	7920	0	JB01	1	100	\N	1	-    	-   	-   
B000001372	PRIMADOL TAB	TAB 	TAB 		1375	1375	1650	1650	1650	1650	1650	1650	1650	2612	1650	1650	0	JB01	1	0	\N	1	-    	-   	-   
B000001373	Infus Tridex 27 A	INF 	INF 		20900	20900	25080	25080	25080	25080	25080	25080	25080	39710	25080	25080	0	JB02	1	48	\N	1	-    	-   	-   
B000001374	Sanbe Water Irrigation 1 L (WFI)	INF 	INF 		17820	17820	21384	21384	21384	21384	21384	21384	21384	33858	21384	21384	0	JB02	1	2	\N	1	-    	-   	-   
B000001375	Neurodex tab	TAB 	TAB 		1210	1210	1452	1452	1452	1452	1452	1452	1452	2299	1452	1452	0	JB01	1	200	\N	1	-    	-   	-   
B000001376	Sincronik Tablet	TAB 	TAB 		8470	8470	10164	10164	10164	10164	10164	10164	10164	16093	10164	10164	0	JB01	1	40	2018-12-31	1	-    	-   	-   
B000001377	PGA 2-0 TP 26 mm 75cm	PCS 	PCS 		75000	75000	90000	90000	90000	90000	90000	90000	90000	142500	90000	90000	0	JB03	1	36	\N	1	-    	-   	-   
B000001449	Kapsul Ralan	PCS 	PCS 		426	426	511	511	511	511	511	511	511	809	511	511	0	JB01	1	0	\N	1	-    	-   	-   
B000001378	PGA 2-0 TP 37 mm 90 cm (dr. Hari)	PCS 	PCS 		80000	80000	96000	96000	96000	96000	96000	96000	96000	152000	96000	96000	0	JB03	1	36	\N	1	-    	-   	-   
B000001379	PGA 3-0 RC 24 mm 75 cm	PCS 	PCS 		75000	75000	90000	90000	90000	90000	90000	90000	90000	142500	90000	90000	0	JB03	1	24	\N	1	-    	-   	-   
B000001380	Cenfresh 5 ml	PCS 	PCS 		38362.5	38362.5	46035	46035	46035	46035	46035	46035	46035	72889	46035	46035	0	JB02	1	0	2020-01-01	1	-    	-   	-   
B000001381	Trovensis 8 mg Tablet	TAB 	TAB 		17589	17589	21107	21107	21107	21107	21107	21107	21107	33419	21107	21107	0	JB01	1	10	\N	1	-    	-   	-   
B000001382	Canderin 8 mg Tablet	TAB 	TAB 		6600	6600	7920	7920	7920	7920	7920	7920	7920	12540	7920	7920	0	JB01	1	30	2018-06-30	1	-    	-   	-   
B000001383	Canderin 16 mg Tablet	TAB 	TAB 		9350	9350	11220	11220	11220	11220	11220	11220	11220	17765	11220	11220	0	JB01	1	60	2018-06-30	1	-    	-   	-   
B000001384	Longcef Sirup Forte 250 mg	BTL 	BTL 		77000	77000	92400	92400	92400	92400	92400	92400	92400	146300	92400	92400	0	JB01	1	0	\N	1	-    	-   	-   
B000001385	Lactrin Kapsul	CAP 	CAP 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	\N	1	-    	-   	-   
B000001386	Isosorbide Dinitrat 5 mg	TAB 	TAB 		124	124	149	149	149	149	149	149	149	236	149	149	0	JB01	1	0	\N	1	-    	-   	-   
B000001387	Dexanta Tablet 	TAB 	TAB 		204	204	245	245	245	245	245	245	245	388	245	245	0	JB01	1	0	\N	1	-    	-   	-   
B000001389	OMZ Injeksi 10 ml	AMP5	AMP5		130900	130900	157080	157080	157080	157080	157080	157080	157080	248710	157080	157080	0	JB02	1	0	\N	1	-    	-   	-   
B000001390	Xylocain 10% Spray	PCS 	PCS 		298357	298357	358028	358028	358028	358028	358028	358028	358028	566878	358028	358028	0	JB02	1	0	\N	1	-    	-   	-   
B000001391	Pectocil Kapsul	CAP 	CAP 		2695	2695	3234	3234	3234	3234	3234	3234	3234	5120	3234	3234	0	JB01	1	0	\N	1	-    	-   	-   
B000001392	Rocer Kapsul	CAP 	CAP 		12100	12100	14520	14520	14520	14520	14520	14520	14520	22990	14520	14520	0	JB01	1	0	\N	1	-    	-   	-   
B000001393	Prolevox 500 mg Tablet	TAB 	TAB 		29150	29150	34980	34980	34980	34980	34980	34980	34980	55385	34980	34980	0	JB01	1	0	\N	1	-    	-   	-   
B000001394	SPUIT 1 CC ONEMED	PCS 	PCS 		2000	2000	2400	2400	2400	2400	2400	2400	2400	3800	2400	2400	0	JB03	1	0	\N	1	-    	-   	-   
B000001395	Polydex 5 ml	BTL 	BTL 		39325	39325	47190	47190	47190	47190	47190	47190	47190	74718	47190	47190	0	JB02	1	0	\N	1	-    	-   	-   
B000001396	Regumen	TAB 	TAB 		3410	3410	4092	4092	4092	4092	4092	4092	4092	6479	4092	4092	0	JB01	1	0	\N	1	-    	-   	-   
B000001397	Gratizin 10 mg Tablet	TAB 	TAB 		5390	5390	6468	6468	6468	6468	6468	6468	6468	10241	6468	6468	0	JB01	1	0	\N	1	-    	-   	-   
B000001398	Neurosanbe Tablet	TAB 	TAB 		11278.3	11278.3	13534	13534	13534	13534	13534	13534	13534	21429	13534	13534	0	JB01	1	0	2020-12-01	1	-    	-   	-   
B000001399	Iopamiro 300/50 ML	VL  	VL  		299200	299200	359040	359040	359040	359040	359040	359040	359040	568480	359040	359040	0	JB02	1	5	\N	1	-    	-   	-   
B000001400	Farsorbid 5 Tablet	TAB 	TAB 		224	224	269	269	269	269	269	269	269	426	269	269	0	JB01	1	500	\N	1	-    	-   	-   
B000001401	Rimactazid Tablet	CAP 	CAP 		8514	8514	10217	10217	10217	10217	10217	10217	10217	16177	10217	10217	0	JB01	1	0	\N	1	-    	-   	-   
B000001402	Syringe OM 1 cc	PCS 	PCS 		2000	2000	2400	2400	2400	2400	2400	2400	2400	3800	2400	2400	0	JB02	1	0	\N	1	-    	-   	-   
B000001403	Xylocain 1x semprot	AMP5	AMP5		17100	17100	20520	20520	20520	20520	20520	20520	20520	32490	20520	20520	0	JB01	1	0	\N	1	-    	-   	-   
B000001404	Catheter Jell	PCS 	PCS 		65000	65000	78000	78000	78000	78000	78000	78000	78000	123500	78000	78000	0	JB02	1	20	\N	1	-    	-   	-   
B000001405	Blecidex Ear / Eye Drop	DRP 	DRP 		41745	41745	50094	50094	50094	50094	50094	50094	50094	79316	50094	50094	0	JB02	1	7	\N	1	-    	-   	-   
B000001406	MASKER O2 NRM	PCS 	PCS 		38000	38000	45600	45600	45600	45600	45600	45600	45600	72200	45600	45600	0	JB03	1	0	\N	1	-    	-   	-   
B000001407	KASA GULUNG KECIL	PCS 	PCS 		1200	1200	1440	1440	1440	1440	1440	1440	1440	2280	1440	1440	0	JB03	1	0	\N	1	-    	-   	-   
B000001408	KASA GULUNG BESAR	PCS 	PCS 		2400	2400	2880	2880	2880	2880	2880	2880	2880	4560	2880	2880	0	JB03	1	0	\N	1	-    	-   	-   
B000001409	GELANG ID BAYI	PCS 	PCS 		4000	4000	4800	4800	4800	4800	4800	4800	4800	7600	4800	4800	0	JB03	1	0	\N	1	-    	-   	-   
B000001410	KAPAS CEBOK	PCS 	PCS 		8000	8000	9600	9600	9600	9600	9600	9600	9600	15200	9600	9600	0	JB03	1	0	\N	1	-    	-   	-   
B000001411	SABUN MANDI BAYI	MG  	MG  		8000	8000	9600	9600	9600	9600	9600	9600	9600	15200	9600	9600	0	JB02	1	0	\N	1	-    	-   	-   
B000001412	JARUM SPINOCAN NO 26	PCS 	PCS 		59500	59500	71400	71400	71400	71400	71400	71400	71400	113050	71400	71400	0	JB03	1	0	\N	1	-    	-   	-   
B000001413	MECOLA TAB	KAP 	KAP 		6400	6400	7680	7680	7680	7680	7680	7680	7680	12160	7680	7680	0	JB01	1	0	\N	1	-    	-   	-   
B000001414	Apolar N Cream 10 gram	PCS 	PCS 		39270	39270	47124	47124	47124	47124	47124	47124	47124	74613	47124	47124	0	JB02	1	0	\N	1	-    	-   	-   
B000001415	Handscoon Non Steril	PCS 	PCS 		1540	2200	2640	2640	2640	2640	2640	2640	2640	4180	2640	2640	0	JB02	1	0	\N	1	-    	-   	-   
B000001416	Vasacon A	PCS 	PCS 		24613	24613	29536	29536	29536	29536	29536	29536	29536	46765	29536	29536	0	JB02	1	0	\N	1	-    	-   	-   
B000001417	Amaryl 3 mg Tablet	TAB 	TAB 		4475	7458	8950	8950	8950	8950	8950	8950	8950	14170	8950	8950	0	JB01	1	0	\N	1	-    	-   	-   
B000001418	Handscoon Steril no 7,5	PCS 	PCS 		16000	16000	19200	19200	19200	19200	19200	19200	19200	30400	19200	19200	0	JB02	1	0	\N	1	-    	-   	-   
B000001419	Pampers  Dewasa L	PCS 	PCS 		7700	7700	9240	9240	9240	9240	9240	9240	9240	14630	9240	9240	0	JB03	1	20	\N	1	-    	-   	-   
B000001420	Buscopan Injeksi	AMP5	AMP5		22600	22600	27120	27120	27120	27120	27120	27120	27120	42940	27120	27120	0	JB02	1	10	\N	1	-    	-   	-   
B000001421	Susu Enfamil Step Up care Kaleng	KAL 	KAL 		137200	137200	164640	164640	164640	164640	164640	164640	164640	260680	164640	164640	0	JB01	1	0	\N	1	-    	-   	-   
B000001422	Susu Enfamil Lacto Free Kaleng	KAL 	KAL 		134730	134730	161676	161676	161676	161676	161676	161676	161676	255987	161676	161676	0	JB01	1	0	\N	1	-    	-   	-   
B000001423	Alat Cukur	PCS 	PCS 		8000	8000	9600	9600	9600	9600	9600	9600	9600	15200	9600	9600	0	JB02	1	0	\N	1	-    	-   	-   
B000001424	CALADIN LOTION	PCS 	PCS 		14575	14575	17490	17490	17490	17490	17490	17490	17490	27692	17490	17490	0	JB02	1	0	\N	1	-    	-   	-   
B000001425	KENDI	PCS 	PCS 		12000	12000	14400	14400	14400	14400	14400	14400	14400	22800	14400	14400	0	JB03	1	0	\N	1	-    	-   	-   
B000001426	GURITA	PCS 	PCS 		80000	80000	96000	96000	96000	96000	96000	96000	96000	152000	96000	96000	0	JB03	1	0	\N	1	-    	-   	-   
B000001427	Buku Kesehatan	PCS 	PCS 		4300	4300	5160	5160	5160	5160	5160	5160	5160	8170	5160	5160	0	JB05	1	20	\N	1	-    	-   	-   
B000001428	Salep Genta Bayi Lahir	PCS 	PCS 		4000	4000	4800	4800	4800	4800	4800	4800	4800	7600	4800	4800	0	JB02	1	0	\N	1	-    	-   	-   
B000001429	Ethambutol 500 mg	TAB 	TAB 		574	574	689	689	689	689	689	689	689	1091	689	689	0	JB01	1	100	\N	1	-    	-   	-   
B000001430	Plester Bulat (Bayi)	PCS 	PCS 		800	800	960	960	960	960	960	960	960	1520	960	960	0	JB03	1	20	\N	1	-    	-   	-   
B000001431	Novo Twist  (Jarum Insulin)	PCS 	PCS 		2310	2310	2772	2772	2772	2772	2772	2772	2772	4389	2772	2772	0	JB03	1	60	\N	1	-    	-   	-   
B000001432	MILMOR PLUS	TAB 	TAB 		2475	2475	2970	2970	2970	2970	2970	2970	2970	4702	2970	2970	0	JB01	1	0	\N	1	-    	-   	-   
B000001433	Rephitel Salep Mata	TUB 	TUB 		47850	47850	57420	57420	57420	57420	57420	57420	57420	90915	57420	57420	0	JB02	1	0	2019-06-30	1	-    	-   	-   
B000001434	Feeding tube / NGT NO 18	PCS 	PCS 		25000	25000	30000	30000	30000	30000	30000	30000	30000	47500	30000	30000	0	JB03	1	0	\N	1	-    	-   	-   
B000001435	Urdahex 250 mg Cap	CAP 	CAP 		10487.4	10487.4	12585	12585	12585	12585	12585	12585	12585	19926	12585	12585	0	JB01	1	0	2018-12-31	1	-    	-   	-   
B000001436	Tapih Bersalin	PCS 	PCS 		36000	36000	43200	43200	43200	43200	43200	43200	43200	68400	43200	43200	0	JB02	1	0	\N	1	-    	-   	-   
B000001437	Kacamata Phototherapy Bayi	PCS 	PCS 		55500	55500	66600	66600	66600	66600	66600	66600	66600	105450	66600	66600	0	JB02	1	0	\N	1	-    	-   	-   
B000001438	Feeding tube / NGT NO 14	PCS 	PCS 		25000	25000	30000	30000	30000	30000	30000	30000	30000	47500	30000	30000	0	JB03	1	0	\N	1	-    	-   	-   
B000001439	Kasa PAD Bundel Bayi	PCS 	PCS 		6000	6000	7200	7200	7200	7200	7200	7200	7200	11400	7200	7200	0	JB03	1	0	\N	1	-    	-   	-   
B000001440	Metrix 4 mg Tab (Kimia Farma)	TAB 	TAB 		7000	7000	8400	8400	8400	8400	8400	8400	8400	13300	8400	8400	0	JB01	1	0	\N	1	-    	-   	-   
B000001441	CUKURAN	PCS 	PCS 		4000	4000	4800	4800	4800	4800	4800	4800	4800	7600	4800	4800	0	JB03	1	0	\N	1	-    	-   	-   
B000001442	BABY OIL	BTL 	BTL 		24200	24200	29040	29040	29040	29040	29040	29040	29040	45980	29040	29040	0	JB05	1	0	\N	1	-    	-   	-   
B000001443	Neurobion tablet biasa*	TAB 	TAB 		1372	1372	1646	1646	1646	1646	1646	1646	1646	2607	1646	1646	0	JB01	1	250	\N	1	-    	-   	-   
B000001444	Nasacort AQ Spray	BOX 	BOX 		221246	221246	265495	265495	265495	265495	265495	265495	265495	420367	265495	265495	0	JB02	1	3	2018-07-31	1	-    	-   	-   
B000001445	SPALK BAYI	PCS 	PCS 		23800	23800	28560	28560	28560	28560	28560	28560	28560	45220	28560	28560	0	JB03	1	0	\N	1	-    	-   	-   
B000001446	Bisturi	PCS 	PCS 		12000	12000	14400	14400	14400	14400	14400	14400	14400	22800	14400	14400	0	JB02	1	0	\N	1	-    	-   	-   
B000001447	Bungkus Puyer Ranap	PCS 	PCS 		400	400	480	480	480	480	480	480	480	760	480	480	0	JB01	1	0	\N	1	-    	-   	-   
B000001448	Kapsul Kosong	PCS 	PCS 		400	400	480	480	480	480	480	480	480	760	480	480	0	JB01	1	0	\N	1	-    	-   	-   
B000001450	ARM SLING ALL SIZE	PCS 	PCS 		99600	99600	119520	119520	119520	119520	119520	119520	119520	189240	119520	119520	0	JB04	1	0	\N	1	-    	-   	-   
B000001451	Atramat PGA 1/0 Tapper	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB02	1	0	\N	1	-    	-   	-   
B000001452	Atramat PGA 3/0 Cutting	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB02	1	0	\N	1	-    	-   	-   
B000001453	Milmor Tablet	TAB 	TAB 		2585	2585	3102	3102	3102	3102	3102	3102	3102	4912	3102	3102	0	JB01	1	0	\N	1	-    	-   	-   
B000001454	AQUA	INF 	INF 		17400	17400	20880	20880	20880	20880	20880	20880	20880	33060	20880	20880	0	JB05	1	0	\N	1	-    	-   	-   
B000001455	Pembalut Hers Melahirkan	PCS 	PCS 		1200	1200	1440	1440	1440	1440	1440	1440	1440	2280	1440	1440	0	JB02	1	0	\N	1	-    	-   	-   
B000001456	Atramat USP 0 (Tapper)	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB02	1	0	\N	1	-    	-   	-   
B000001457	Ferriz drop (Kimia Farma)	SYR 	SYR 		40000	40000	48000	48000	48000	48000	48000	48000	48000	76000	48000	48000	0	JB01	1	0	\N	1	-    	-   	-   
B000001458	Echina C Eff (Deborah Farma,soho)	PCS 	PCS 		200000	200000	240000	240000	240000	240000	240000	240000	240000	380000	240000	240000	0	JB01	1	0	\N	1	-    	-   	-   
B000001459	Ewoma 18 Kapsul	CAP 	CAP 		122100	122100	146520	146520	146520	146520	146520	146520	146520	231990	146520	146520	0	JB01	1	0	\N	1	-    	-   	-   
B000001460	Urinter Kapsul	CAP 	CAP 		4730	4730	5676	5676	5676	5676	5676	5676	5676	8987	5676	5676	0	JB01	1	0	2020-09-30	1	-    	-   	-   
B000001461	Bungkus Puyer Ralan	PCS 	PCS 		426	426	511	511	511	511	511	511	511	809	511	511	0	-   	1	0	\N	1	-    	-   	-   
B000001462	Kapsul Ranap	PCS 	PCS 		400	400	480	480	480	480	480	480	480	760	480	480	0	-   	1	0	\N	1	-    	-   	-   
B000001463	TROPRIDOL	TAB 	TAB 		3200	3200	3840	3840	3840	3840	3840	3840	3840	6080	3840	3840	0	-   	1	0	\N	1	-    	-   	-   
B000001464	Oxoferin	BOX 	BOX 		71500	71500	85800	85800	85800	85800	85800	85800	85800	135850	85800	85800	0	JB02	1	2	\N	1	-    	-   	-   
B000001465	Bexce syr	BTL 	BTL 		42400	42400	50880	50880	50880	50880	50880	50880	50880	80560	50880	50880	0	JB01	1	1	\N	1	-    	-   	-   
B000001466	milmor tab ( kimia farma martapura )	TAB 	TAB 		3309	3309	3971	3971	3971	3971	3971	3971	3971	6287	3971	3971	0	JB01	1	0	\N	1	-    	-   	-   
B000001467	Q10 DS Kapsul*	TAB 	TAB 		19008	19008	22810	22810	22810	22810	22810	22810	22810	36115	22810	22810	0	JB01	1	10	2020-05-30	1	-    	-   	-   
B000001468	Tiniuron Tab	TAB 	TAB 		8800	8800	10560	10560	10560	10560	10560	10560	10560	16720	10560	10560	0	JB01	1	30	\N	1	-    	-   	-   
B000001469	Wundres N 10X10	PCS 	PCS 		76500	76500	91800	91800	91800	91800	91800	91800	91800	145350	91800	91800	0	JB03	1	0	\N	1	-    	-   	-   
B000001470	MILMOR SANA	KAP 	KAP 		1800	1800	2160	2160	2160	2160	2160	2160	2160	3420	2160	2160	0	JB01	1	0	\N	1	-    	-   	-   
B000001471	BYE-BYE  Fever Anak*	PAC 	PAC 		9085	9085	10902	10902	10902	10902	10902	10902	10902	17262	10902	10902	0	JB03	1	0	2019-10-31	1	-    	-   	-   
B000001472	Wundres B 10x10	PCS 	PCS 		76500	76500	91800	91800	91800	91800	91800	91800	91800	145350	91800	91800	0	JB02	1	0	\N	1	-    	-   	-   
B000001473	Susu Enfamil Human Milk Sachet (Prematur)	PCS 	PCS 		14000	14000	16800	16800	16800	16800	16800	16800	16800	26600	16800	16800	0	JB01	1	0	\N	1	-    	-   	-   
B000001474	Inlacin 100 mg Kapsul	CAP 	CAP 		6050	6050	7260	7260	7260	7260	7260	7260	7260	11495	7260	7260	0	JB01	1	0	2019-09-01	1	-    	-   	-   
B000001475	MILMOR KF	KAP 	KAP 		882	882	1058	1058	1058	1058	1058	1058	1058	1676	1058	1058	0	JB01	1	0	\N	1	-    	-   	-   
B000001476	PAKET BAYI	S32 	S32 		117452	117452	140942	140942	140942	140942	140942	140942	140942	223159	140942	140942	0	-   	1	0	\N	1	-    	-   	-   
B000001477	PAKET PARTUS NORMAL	S32 	S32 		628939	628939	754727	754727	754727	754727	754727	754727	754727	1194984	754727	754727	0	-   	1	0	\N	1	-    	-   	-   
B000001478	Paket Katarak	S32 	S32 		129036	129036	154843	154843	154843	154843	154843	154843	154843	245168	154843	154843	0	JB02	1	0	\N	1	-    	-   	-   
B000001479	CEFTAZIDIM Injeksi 	AMP5	AMP5		74488	74488	89386	89386	89386	89386	89386	89386	89386	141527	89386	89386	0	JB02	1	0	2019-09-30	1	-    	-   	-   
B000001480	KLIRAN	AMP5	AMP5		29000	29000	34800	34800	34800	34800	34800	34800	34800	55100	34800	34800	0	JB02	1	0	\N	1	-    	-   	-   
B000001481	Zyloric 300 mg	TAB 	TAB 		5090	5090	6108	6108	6108	6108	6108	6108	6108	9671	6108	6108	0	JB01	1	100	\N	1	-    	-   	-   
B000001482	Vometraz 4 Mg inj	AMP5	AMP5		24200	24200	29040	29040	29040	29040	29040	29040	29040	45980	29040	29040	0	JB02	1	0	\N	1	-    	-   	-   
B000001483	Isofluran per ml	INF 	INF 		7150	7150	8580	8580	8580	8580	8580	8580	8580	13585	8580	8580	0	JB02	1	0	\N	1	-    	-   	-   
B000001484	Caldece Effervescent*	TUB 	TUB 		28215	28215	33858	33858	33858	33858	33858	33858	33858	53608	33858	33858	0	JB01	1	0	2019-10-31	1	-    	-   	-   
B000001485	Glucophage XR 500 mg	TAB 	TAB 		2400	2400	2880	2880	2880	2880	2880	2880	2880	4560	2880	2880	0	JB01	1	0	\N	1	-    	-   	-   
B000001486	xxx	TAB 	TAB 		3025	3025	3630	3630	3630	3630	3630	3630	3630	5748	3630	3630	0	JB01	1	600	\N	1	-    	-   	-   
B000001487	Faktu Suppositoria	SUP 	SUP 		8250	8250	9900	9900	9900	9900	9900	9900	9900	15675	9900	9900	0	JB02	1	100	\N	1	-    	-   	-   
B000001488	Folavit 1000 mcg Tablet*	TAB 	TAB 		1804	1804	2165	2165	2165	2165	2165	2165	2165	3428	2165	2165	0	JB01	1	200	2019-08-31	1	-    	-   	-   
B000001489	Calnix Plus Tab (BELI)	TAB 	TAB 		0	0	0	0	0	0	0	0	0	0	0	0	0	JB01	1	0	\N	1	-    	-   	-   
B000001490	KLOROQUIN (PERSAMAAN)	TAB 	TAB 		325	325	390	390	390	390	390	390	390	618	390	390	0	JB01	1	0	\N	1	-    	-   	-   
B000001491	Venosmil Gel	TUB 	TUB 		148500	148500	178200	178200	178200	178200	178200	178200	178200	282150	178200	178200	0	JB02	1	0	\N	1	-    	-   	-   
B000001492	Alco Plus Sirup 100 mL	BTL 	BTL 		41140	41140	49368	49368	49368	49368	49368	49368	49368	78166	49368	49368	0	JB01	1	100	\N	1	-    	-   	-   
B000001493	Cervarix Vaksin	BOX 	BOX 		583000	583000	699600	699600	699600	699600	699600	699600	699600	1107700	699600	699600	0	JB02	1	0	2018-03-31	1	-    	-   	-   
B000001494	Valesco 80 mg Tablet	TAB 	TAB 		8800	8800	10560	10560	10560	10560	10560	10560	10560	16720	10560	10560	0	JB01	1	0	\N	1	-    	-   	-   
B000001495	Handscoon Steril no 7	PCS 	PCS 		17600	17600	21120	21120	21120	21120	21120	21120	21120	33440	21120	21120	0	JB02	1	0	\N	1	-    	-   	-   
B000001496	Handscoon Steril no 6	PCS 	PCS 		17600	17600	21120	21120	21120	21120	21120	21120	21120	33440	21120	21120	0	JB02	1	0	\N	1	-    	-   	-   
B000001497	Handscoon Steril no 6,5	PCS 	PCS 		17600	17600	21120	21120	21120	21120	21120	21120	21120	33440	21120	21120	0	JB02	1	0	\N	1	-    	-   	-   
B000001498	Handscoon Steril no 8	PCS 	PCS 		16000	16000	19200	19200	19200	19200	19200	19200	19200	30400	19200	19200	0	JB02	1	0	\N	1	-    	-   	-   
B000001499	Thyrozol 5 mg Tablet	TAB 	TAB 		1096	1096	1315	1315	1315	1315	1315	1315	1315	2082	1315	1315	0	JB01	1	0	\N	1	-    	-   	-   
B000001500	Lasal Ekpectoran Sirup	BTL 	BTL 		37950	37950	45540	45540	45540	45540	45540	45540	45540	72105	45540	45540	0	JB01	1	5	2019-10-01	1	-    	-   	-   
B000001501	Hesmin Kapsul	CAP 	CAP 		5440	5440	6528	6528	6528	6528	6528	6528	6528	10336	6528	6528	0	JB01	1	0	\N	1	-    	-   	-   
B000001502	Benang Vicril 8.0	PCS 	PCS 		246000	246000	295200	295200	295200	295200	295200	295200	295200	467400	295200	295200	0	JB02	1	0	\N	1	-    	-   	-   
B000001503	Atramat Silk	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB02	1	0	\N	1	-    	-   	-   
B000001504	hhhh	PCS 	PCS 		170000	170000	204000	204000	204000	204000	204000	204000	204000	323000	204000	204000	0	JB03	1	5	\N	1	-    	-   	-   
B000001505	Symbicort Turb 160/120 doses Inhaler	BOX 	BOX 		291205	291205	349446	349446	349446	349446	349446	349446	349446	553290	349446	349446	0	JB02	1	5	\N	1	-    	-   	-   
B000001506	HPMC (OK)	SET 	SET 		110000	110000	132000	132000	132000	132000	132000	132000	132000	209000	132000	132000	0	JB03	1	10	\N	1	-    	-   	-   
B000001507	Biothicol Forte Sirup	BTL 	BTL 		50179	70400	84480	84480	84480	84480	84480	84480	84480	133760	84480	84480	0	JB01	1	0	2025-08-29	1	-    	-   	-   
B000001508	NUPOVEL (Safol)  Injeksi	AMP5	AMP5		93500	93500	112200	112200	112200	112200	112200	112200	112200	177650	112200	112200	0	JB02	1	0	2018-04-01	1	-    	-   	-   
B000001509	Atramat Chromic 2/0	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB02	1	0	\N	1	-    	-   	-   
B000001510	Certofix ICU	PCS 	PCS 		720000	720000	864000	864000	864000	864000	864000	864000	864000	1368000	864000	864000	0	JB02	1	0	\N	1	-    	-   	-   
B000001511	Tegaderm Kecil	PCS 	PCS 		26000	26000	31200	31200	31200	31200	31200	31200	31200	49400	31200	31200	0	JB02	1	0	\N	1	-    	-   	-   
B000001512	Diabex 500 mg Tab	TAB 	TAB 		1331	1331	1597	1597	1597	1597	1597	1597	1597	2529	1597	1597	0	JB01	1	200	\N	1	-    	-   	-   
B000001513	Tylonic 100 mg Tab	TAB 	TAB 		1481	1481	1777	1777	1777	1777	1777	1777	1777	2814	1777	1777	0	JB01	1	0	2015-11-23	1	-    	-   	-   
B000001514	Vitamin B Complex*	TAB 	TAB 		120	120	144	144	144	144	144	144	144	228	144	144	0	JB01	1	0	\N	1	-    	-   	-   
B000001515	Meloxicam Suppositoria	PCS 	PCS 		6000	6000	7200	7200	7200	7200	7200	7200	7200	11400	7200	7200	0	JB02	1	0	\N	1	-    	-   	-   
B000001516	FARGOXIN INJEKSI	AMP5	AMP5		51340	51340	61608	61608	61608	61608	61608	61608	61608	97546	61608	61608	0	JB02	1	0	2015-11-24	1	-    	-   	-   
B000001517	KORSET DEWASA	PCS 	PCS 		32000	32000	38400	38400	38400	38400	38400	38400	38400	60800	38400	38400	0	JB04	1	0	2015-11-25	1	-    	-   	-   
B000001518	Lasal 4 mg Kapsul	TAB 	TAB 		1540	1540	1848	1848	1848	1848	1848	1848	1848	2926	1848	1848	0	JB01	1	100	2015-11-25	1	-    	-   	-   
B000001519	Atorvastatin 20 mg tab	TAB 	TAB 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	100	2018-07-01	1	-    	-   	-   
B000001520	Methotrexate Injeksi	VL  	VL  		38500	38500	46200	46200	46200	46200	46200	46200	46200	73150	46200	46200	0	JB02	1	0	2018-01-31	1	-    	-   	-   
B000001521	Farmacrol Forte Sirup 200 ml 	BTL 	BTL 		50600	50600	60720	60720	60720	60720	60720	60720	60720	96140	60720	60720	0	JB01	1	0	\N	1	-    	-   	-   
B000001522	Metformin 850 mg	TAB 	TAB 		2100	2100	2520	2520	2520	2520	2520	2520	2520	3990	2520	2520	0	JB01	1	120	2015-11-27	1	-    	-   	-   
B000001523	BYE-BYE  Fever Bayi*	PCS 	PCS 		6381	6381	7657	7657	7657	7657	7657	7657	7657	12124	7657	7657	0	JB02	1	0	2019-09-30	1	-    	-   	-   
B000001524	Atramat PGA 8/0	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB02	1	0	\N	1	-    	-   	-   
B000001525	Mediamer tab	TAB 	TAB 		2829	2829	3395	3395	3395	3395	3395	3395	3395	5375	3395	3395	0	JB01	1	80	2015-11-29	1	-    	-   	-   
B000001526	LFX 0,6 ML MD	MIN 	MIN 		75900	75900	91080	91080	91080	91080	91080	91080	91080	144210	91080	91080	0	JB02	1	10	\N	1	-    	-   	-   
B000001527	Sagestam Salep Mata	SAL 	SAL 		36300	36300	43560	43560	43560	43560	43560	43560	43560	68970	43560	43560	0	JB02	1	10	\N	1	-    	-   	-   
B000001528	DORNER	KAP 	KAP 		8000	8000	9600	9600	9600	9600	9600	9600	9600	15200	9600	9600	0	JB01	1	0	2015-12-02	1	-    	-   	-   
B000001529	Vivace 2,5 mg (Beli di KF BJB)	TAB 	TAB 		8600	8600	10320	10320	10320	10320	10320	10320	10320	16340	10320	10320	0	JB01	1	5	2015-12-05	1	-    	-   	-   
B000001530	Angintriz Tab ( Beli )	TAB 	TAB 		4000	4000	4800	4800	4800	4800	4800	4800	4800	7600	4800	4800	0	JB01	1	0	2015-12-06	1	-    	-   	-   
B000001531	Ramipril 5 mg Tab ( Beli )	TAB 	TAB 		800	800	960	960	960	960	960	960	960	1520	960	960	0	JB01	1	0	2015-12-06	1	-    	-   	-   
B000001532	Sevodex Per ML	INF 	INF 		11440	11440	13728	13728	13728	13728	13728	13728	13728	21736	13728	13728	0	JB02	1	0	2015-12-06	1	-    	-   	-   
B000001533	Crestor 20 mg Tab (Beli)	TAB 	TAB 		25666	25666	30799	30799	30799	30799	30799	30799	30799	48765	30799	30799	0	JB01	1	0	2015-12-06	1	-    	-   	-   
B000001534	Aminoleban Infus	INF 	INF 		205700	205700	246840	246840	246840	246840	246840	246840	246840	390830	246840	246840	0	JB02	1	0	\N	1	-    	-   	-   
B000001535	GELITA SPONS	PCS 	PCS 		50000	50000	60000	60000	60000	60000	60000	60000	60000	95000	60000	60000	0	JB03	1	0	2015-12-07	1	-    	-   	-   
B000001536	Erlaquine (beli di san a)	TAB 	TAB 		4600	4600	5520	5520	5520	5520	5520	5520	5520	8740	5520	5520	0	JB01	1	12	2015-12-07	1	-    	-   	-   
B000001537	KALMECO Kapsul	KAP 	KAP 		2046	2046	2455	2455	2455	2455	2455	2455	2455	3887	2455	2455	0	JB01	1	0	2015-12-07	1	-    	-   	-   
B000001538	PHENOBARBITAL INJ	AMP5	AMP5		1600	1600	1920	1920	1920	1920	1920	1920	1920	3040	1920	1920	0	JB02	1	0	2015-12-08	1	-    	-   	-   
B000001539	Vitamin B12*	TAB 	TAB 		16	16	19	19	19	19	19	19	19	30	19	19	0	JB01	1	100	\N	1	-    	-   	-   
B000001540	VITAMIN B1*	KAP 	KAP 		20	20	24	24	24	24	24	24	24	38	24	24	0	JB01	1	0	2015-12-08	1	-    	-   	-   
B000001541	Hypavix per cm	CM  	CM  		151	151	181	181	181	181	181	181	181	287	181	181	0	JB03	1	0	2015-12-10	1	-    	-   	-   
B000001542	Norit Tab	TAB 	TAB 		500	500	600	600	600	600	600	600	600	950	600	600	0	JB01	1	0	2015-12-10	1	-    	-   	-   
B000001543	Zyloric 100 mg	TAB 	TAB 		2319	2319	2783	2783	2783	2783	2783	2783	2783	4406	2783	2783	0	JB01	1	60	\N	1	-    	-   	-   
B000001544	NEW DIATAB TABLET	TAB 	TAB 		558	558	670	670	670	670	670	670	670	1060	670	670	0	JB01	1	0	2015-12-11	1	-    	-   	-   
B000001545	Propelin 3.0 (benang)	PCS 	PCS 		88000	88000	105600	105600	105600	105600	105600	105600	105600	167200	105600	105600	0	JB03	1	2	2015-12-11	1	-    	-   	-   
B000001546	Betadine Solution 1 Liter	S35 	S35 		192500	192500	231000	231000	231000	231000	231000	231000	231000	365750	231000	231000	0	JB03	1	2	2015-12-11	1	-    	-   	-   
B000001547	Alkohol 1L	S35 	S35 		133100	133100	159720	159720	159720	159720	159720	159720	159720	252890	159720	159720	0	JB03	1	2	2015-12-11	1	-    	-   	-   
B000001548	Sanpicillin Injeksi	VL  	VL  		16000	16000	19200	19200	19200	19200	19200	19200	19200	30400	19200	19200	0	JB02	1	10	\N	1	-    	-   	-   
B000001549	Na Phenytoin lInjeksi	AMP5	AMP5		26602	26602	31922	31922	31922	31922	31922	31922	31922	50544	31922	31922	0	JB02	1	100	2019-06-30	1	-    	-   	-   
B000001550	TERMOMETER	PCS 	PCS 		24000	24000	28800	28800	28800	28800	28800	28800	28800	45600	28800	28800	0	JB04	1	0	\N	1	-    	-   	-   
B000001551	Atramat PGC	PCS 	PCS 		141900	141900	170280	170280	170280	170280	170280	170280	170280	269610	170280	170280	0	JB02	1	0	\N	1	-    	-   	-   
B000001552	batugin elexir	SYR 	SYR 		18200	18200	21840	21840	21840	21840	21840	21840	21840	34580	21840	21840	0	JB01	1	0	2015-12-11	1	-    	-   	-   
B000001553	Valvir (Beli KF)	TAB 	TAB 		14617	14617	17540	17540	17540	17540	17540	17540	17540	27772	17540	17540	0	JB01	1	0	\N	1	-    	-   	-   
B000001554	DETTOL ( BELI DILUAR)	BTL 	BTL 		14000	14000	16800	16800	16800	16800	16800	16800	16800	26600	16800	16800	0	JB02	1	0	2015-12-11	1	-    	-   	-   
B000001555	Inf Martos	INF 	INF 		88000	88000	105600	105600	105600	105600	105600	105600	105600	167200	105600	105600	0	JB02	1	0	\N	1	-    	-   	-   
B000001556	Atramat Polypropylene 3/0	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB02	1	0	\N	1	-    	-   	-   
B000001557	Threeway Buntut	PCS 	PCS 		32000	32000	38400	38400	38400	38400	38400	38400	38400	60800	38400	38400	0	JB02	1	0	\N	1	-    	-   	-   
B000001558	Chlor ethyl spray kaleng	KAL 	KAL 		123750	123750	148500	148500	148500	148500	148500	148500	148500	235125	148500	148500	0	JB03	1	5	2015-12-15	1	-    	-   	-   
B000001559	Rifampicin 450 mg (San"a)	CAP 	CAP 		851	851	1021	1021	1021	1021	1021	1021	1021	1617	1021	1021	0	JB01	1	0	2015-12-16	1	-    	-   	-   
B000001560	ERICAP (BELI)	TAB 	TAB 		6000	6000	7200	7200	7200	7200	7200	7200	7200	11400	7200	7200	0	JB01	1	0	2015-12-16	1	-    	-   	-   
B000001561	THYROZOL 10 MG Tablet	TAB 	TAB 		1650	1650	1980	1980	1980	1980	1980	1980	1980	3135	1980	1980	0	JB01	1	0	2015-12-18	1	-    	-   	-   
B000001562	Simfix 200 mg	TAB 	TAB 		24750	24750	29700	29700	29700	29700	29700	29700	29700	47025	29700	29700	0	JB01	1	20	2019-06-01	1	-    	-   	-   
B000001563	Transpulmin Balsem Keluarga	PCS 	PCS 		40150	40150	48180	48180	48180	48180	48180	48180	48180	76285	48180	48180	0	JB02	1	2	2015-12-19	1	-    	-   	-   
B000001564	INTRASITE GEL (BELI)	GEL 	GEL 		127500	127500	153000	153000	153000	153000	153000	153000	153000	242250	153000	153000	0	JB02	1	0	2015-12-21	1	-    	-   	-   
B000001565	Eyefresh MiniDose	PCS 	PCS 		25438	25438	30526	30526	30526	30526	30526	30526	30526	48332	30526	30526	0	JB02	1	0	2019-11-30	1	-    	-   	-   
B000001566	VITAMIN B6*	TAB 	TAB 		200	200	240	240	240	240	240	240	240	380	240	240	0	JB01	1	0	2015-12-21	1	-    	-   	-   
B000001567	Racikan dr. Parlin (3B)	PUY 	PUY 		43020	43020	51624	51624	51624	51624	51624	51624	51624	81738	51624	51624	0	JB01	1	10	\N	1	-    	-   	-   
B000001568	PHYSIOGEL LOTION ( KF MTP )	CRM 	CRM 		128400	128400	154080	154080	154080	154080	154080	154080	154080	243960	154080	154080	0	JB02	1	0	2015-12-23	1	-    	-   	-   
B000001569	TOMIT INJ ( BELI )	AMP5	AMP5		10800	10800	12960	12960	12960	12960	12960	12960	12960	20520	12960	12960	0	JB02	1	0	\N	1	-    	-   	-   
B000001570	GITAS INJ ( BELI )	AMP5	AMP5		18300	18300	21960	21960	21960	21960	21960	21960	21960	34770	21960	21960	0	JB02	1	0	\N	1	-    	-   	-   
B000001571	xxx	BTL 	BTL 		29000	29000	34800	34800	34800	34800	34800	34800	34800	55100	34800	34800	0	JB01	1	0	\N	1	-    	-   	-   
B000001572	Scopamin Plus Tablet 	TAB 	TAB 		2200	2200	2640	2640	2640	2640	2640	2640	2640	4180	2640	2640	0	JB01	1	0	2015-12-18	1	-    	-   	-   
B000001573	Lasix Injeksi (Beli luar)	VL  	VL  		16000	16000	19200	19200	19200	19200	19200	19200	19200	30400	19200	19200	0	JB02	1	0	\N	1	-    	-   	-   
B000001574	ZITHRAX 500	CAP 	CAP 		31900	31900	38280	38280	38280	38280	38280	38280	38280	60610	38280	38280	0	JB01	1	0	2015-12-26	1	-    	-   	-   
B000001575	STREPTOMYCIN INJ	VL  	VL  		7444	7444	8933	8933	8933	8933	8933	8933	8933	14144	8933	8933	0	JB02	1	0	2015-12-27	1	-    	-   	-   
B000001576	DOPAMIN INJ	AMP5	AMP5		72457	72457	86948	86948	86948	86948	86948	86948	86948	137668	86948	86948	0	JB02	1	0	2015-12-27	1	-    	-   	-   
B000001577	Atramat Side	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB02	1	0	\N	1	-    	-   	-   
B000001578	Infus Ka en Mg 3	PCS 	PCS 		28000	28000	33600	33600	33600	33600	33600	33600	33600	53200	33600	33600	0	JB02	1	0	\N	1	-    	-   	-   
B000001579	Bisolvon Larutan untuk Nebu	BTL 	BTL 		79750	79750	95700	95700	95700	95700	95700	95700	95700	151525	95700	95700	0	JB02	1	0	\N	1	-    	-   	-   
B000001580	LEV	BTL 	BTL 		87900	87900	105480	105480	105480	105480	105480	105480	105480	167010	105480	105480	0	JB01	1	0	2015-12-30	1	-    	-   	-   
B000001581	Pr	SYR 	SYR 		29000	29000	34800	34800	34800	34800	34800	34800	34800	55100	34800	34800	0	JB01	1	0	\N	1	-    	-   	-   
B000001582	propiretik supp ( kf bjb )	SUP 	SUP 		7211	7211	8653	8653	8653	8653	8653	8653	8653	13701	8653	8653	0	JB02	1	0	2016-01-04	1	-    	-   	-   
B000001583	Atramat Chromic 0	PCS 	PCS 		141900	141900	170280	170280	170280	170280	170280	170280	170280	269610	170280	170280	0	JB02	1	0	2022-06-21	1	-    	-   	-   
B000001584	TONGKAT KRUK SEPASANG	PCS 	PCS 		222000	222000	266400	266400	266400	266400	266400	266400	266400	421800	266400	266400	0	JB02	1	0	\N	1	-    	-   	-   
B000001585	WALKER DEWASA UTK JALAN	PCS 	PCS 		500000	500000	600000	600000	600000	600000	600000	600000	600000	950000	600000	600000	0	JB02	1	0	\N	1	-    	-   	-   
B000001586	CALADIN LOTION KECIL (BELI)	BTL 	BTL 		12500	12500	15000	15000	15000	15000	15000	15000	15000	23750	15000	15000	0	JB02	1	0	2016-01-06	1	-    	-   	-   
B000001587	ALKOHOL PER ML	ML  	ML  		121	121	145	145	145	145	145	145	145	230	145	145	0	JB03	1	0	\N	1	-    	-   	-   
B000001588	BETADIN PER ML	ML  	ML  		58	58	70	70	70	70	70	70	70	110	70	70	0	JB03	1	0	2015-12-11	1	-    	-   	-   
B000001589	Concor 2,5 mg Tablet	TAB 	TAB 		5942	5942	7130	7130	7130	7130	7130	7130	7130	11290	7130	7130	0	JB01	1	0	\N	1	-    	-   	-   
B000001590	Protexin Infant Sachet	BKS 	BKS 		20000	20000	24000	24000	24000	24000	24000	24000	24000	38000	24000	24000	0	JB01	1	0	\N	1	-    	-   	-   
B000001591	Laprosin tab	TAB 	TAB 		9350	9350	11220	11220	11220	11220	11220	11220	11220	17765	11220	11220	0	JB01	1	200	\N	1	-    	-   	-   
B000001592	KSR (Beli di KF)	TAB 	TAB 		4300	4300	5160	5160	5160	5160	5160	5160	5160	8170	5160	5160	0	JB01	1	20	2016-01-09	1	-    	-   	-   
B000001593	Lactasin Kapsul	CAP 	CAP 		2400	2400	2880	2880	2880	2880	2880	2880	2880	4560	2880	2880	0	JB01	1	0	\N	1	-    	-   	-   
B000001594	TROLIP 300	TAB 	TAB 		9680	9680	11616	11616	11616	11616	11616	11616	11616	18392	11616	11616	0	JB01	1	0	2016-01-12	1	-    	-   	-   
B000001595	Atramat Chromic 3/0	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB02	1	0	\N	1	-    	-   	-   
B000001596	Ataroc Tablet	TAB 	TAB 		2000	2000	2400	2400	2400	2400	2400	2400	2400	3800	2400	2400	0	JB01	1	0	\N	1	-    	-   	-   
B000001597	Akilen 	BOX 	BOX 		72939	72939	87527	87527	87527	87527	87527	87527	87527	138584	87527	87527	0	JB02	1	5	\N	1	-    	-   	-   
B000001598	PROGESIC SYR (BELI)	BTL 	BTL 		28500	28500	34200	34200	34200	34200	34200	34200	34200	54150	34200	34200	0	JB01	1	0	\N	1	-    	-   	-   
B000001599	Gypsona 6 inci (Besar)	PCS 	PCS 		67500	67500	81000	81000	81000	81000	81000	81000	81000	128250	81000	81000	0	JB02	1	0	\N	1	-    	-   	-   
B000001600	Atramat Plain Gut	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB02	1	0	\N	1	-    	-   	-   
B000001601	RESEP 5505	S32 	S32 		248000	248000	297600	297600	297600	297600	297600	297600	297600	471200	297600	297600	0	JB02	1	0	\N	1	-    	-   	-   
B000001602	Diabetasol Sweetener	BOX 	BOX 		49030	49030	58836	58836	58836	58836	58836	58836	58836	93157	58836	58836	0	JB05	1	10	2016-01-18	1	-    	-   	-   
B000001603	Bisolvon Eliksir	BTL 	BTL 		29282	29282	35138	35138	35138	35138	35138	35138	35138	55636	35138	35138	0	JB01	1	0	\N	1	-    	-   	-   
B000001604	Resep Racikan	PCS 	PCS 		64000	64000	76800	76800	76800	76800	76800	76800	76800	121600	76800	76800	0	JB01	1	0	\N	1	-    	-   	-   
B000001605	lapifed dm beli	BTL 	BTL 		25000	25000	30000	30000	30000	30000	30000	30000	30000	47500	30000	30000	0	JB01	1	0	\N	1	-    	-   	-   
B000001606	XXXXXX	TAB 	TAB 		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB01	1	0	\N	1	-    	-   	-   
B000001607	Pantoprazole 40 mg Injeksi	VL  	VL  		37400	37400	44880	44880	44880	44880	44880	44880	44880	71060	44880	44880	0	JB02	1	0	2018-03-31	1	-    	-   	-   
B000001608	On	TAB 	TAB 		3300	3300	3960	3960	3960	3960	3960	3960	3960	6270	3960	3960	0	JB01	1	0	\N	1	-    	-   	-   
B000001609	Probenid (Beli)	TAB 	TAB 		2500	2500	3000	3000	3000	3000	3000	3000	3000	4750	3000	3000	0	JB01	1	0	\N	1	-    	-   	-   
B000001610	Psidii Kapsul 500 mg	TAB 	TAB 		4356	4356	5227	5227	5227	5227	5227	5227	5227	8276	5227	5227	0	JB01	1	100	\N	1	-    	-   	-   
B000001611	ONDANSETRON 4 MG INJ (Dexa)	AMP5	AMP5		6655	6655	7986	7986	7986	7986	7986	7986	7986	12644	7986	7986	0	JB02	1	0	2018-10-01	1	-    	-   	-   
B000001612	Curasponge (Sponge utk Operasi)	PCS 	PCS 		25000	25000	30000	30000	30000	30000	30000	30000	30000	47500	30000	30000	0	JB02	1	0	\N	1	-    	-   	-   
B000001613	Celocid Tablet (Beli)	TAB 	TAB 		20000	20000	24000	24000	24000	24000	24000	24000	24000	38000	24000	24000	0	JB01	1	0	\N	1	-    	-   	-   
B000001614	Nutri B (beli)	CAP 	CAP 		9000	9000	10800	10800	10800	10800	10800	10800	10800	17100	10800	10800	0	JB01	1	0	\N	1	-    	-   	-   
B000001615	NEUROAID (BELI)	TAB 	TAB 		20500	20500	24600	24600	24600	24600	24600	24600	24600	38950	24600	24600	0	JB01	1	0	2016-01-22	1	-    	-   	-   
B000001616	MICARDIS TAB (BELI)	TAB 	TAB 		16000	16000	19200	19200	19200	19200	19200	19200	19200	30400	19200	19200	0	JB01	1	0	2016-01-22	1	-    	-   	-   
B000001617	DECAIN SPINAL INJ (BELI)	AMP5	AMP5		91500	91500	109800	109800	109800	109800	109800	109800	109800	173850	109800	109800	0	JB02	1	0	2016-01-22	1	-    	-   	-   
B000001618	STARFOLAT (BELI RAZA)	TAB 	TAB 		400	400	480	480	480	480	480	480	480	760	480	480	0	JB01	1	0	\N	1	-    	-   	-   
B000001619	NEUROAID KAPSUL 	TAB 	TAB 		19250	19250	23100	23100	23100	23100	23100	23100	23100	36575	23100	23100	0	JB01	1	0	\N	1	-    	-   	-   
B000001620	CELOCID TAB ( KF MTP )	TAB 	TAB 		21000	21000	25200	25200	25200	25200	25200	25200	25200	39900	25200	25200	0	JB01	1	0	2016-01-24	1	-    	-   	-   
B000001621	Nutri B (Beli di San a)	TAB 	TAB 		10700	10700	12840	12840	12840	12840	12840	12840	12840	20330	12840	12840	0	JB01	1	5	2016-01-25	1	-    	-   	-   
B000001622	SUSU ENTRAMIC	PAC 	PAC 		55321	55321	66385	66385	66385	66385	66385	66385	66385	105110	66385	66385	0	J007	1	0	2016-01-26	1	-    	-   	-   
B000001623	SANFULIQ	CAP 	CAP 		4840	4840	5808	5808	5808	5808	5808	5808	5808	9196	5808	5808	0	JB01	1	0	\N	1	-    	-   	-   
B000001624	MYCOSTATIN DROP BELI	BTL 	BTL 		59200	59200	71040	71040	71040	71040	71040	71040	71040	112480	71040	71040	0	JB01	1	0	\N	1	-    	-   	-   
B000001625	Enervon-C syr (Beli)	BTL 	BTL 		20000	20000	24000	24000	24000	24000	24000	24000	24000	38000	24000	24000	0	JB01	1	1	2016-01-27	1	-    	-   	-   
B000001626	BERTHYCO INJ 	AMP5	AMP5		20000	20000	24000	24000	24000	24000	24000	24000	24000	38000	24000	24000	0	JB02	1	0	2016-01-28	1	-    	-   	-   
B000001627	MALTOFER BELI	TAB 	TAB 		2880	2880	3456	3456	3456	3456	3456	3456	3456	5472	3456	3456	0	JB01	1	0	2016-01-26	1	-    	-   	-   
B000001628	TISSUE BASAH ( BELI DI SEBELAH )	BKS 	BKS 		5700	5700	6840	6840	6840	6840	6840	6840	6840	10830	6840	6840	0	JB02	1	2	2016-02-01	1	-    	-   	-   
B000001629	Nitrokaf Retard 5 mg	TAB 	TAB 		3200	3200	3840	3840	3840	3840	3840	3840	3840	6080	3840	3840	0	JB01	1	0	\N	1	-    	-   	-   
B000001630	N-Ace	CAP 	CAP 		2783	2783	3340	3340	3340	3340	3340	3340	3340	5288	3340	3340	0	JB01	1	10	2016-02-01	1	-    	-   	-   
B000001631	TISU BASAH BELI	PCS 	PCS 		7000	7000	8400	8400	8400	8400	8400	8400	8400	13300	8400	8400	0	JB03	1	0	2016-02-03	1	-    	-   	-   
B000001632	BIOBRAN (BELI KF)	TAB 	TAB 		14500	14500	17400	17400	17400	17400	17400	17400	17400	27550	17400	17400	0	JB01	1	0	\N	1	-    	-   	-   
B000001633	SIBRO ZALF BELI	TUB 	TUB 		88000	88000	105600	105600	105600	105600	105600	105600	105600	167200	105600	105600	0	JB02	1	0	\N	1	-    	-   	-   
B000001634	MYLANTA SYR BELI	BTL 	BTL 		10160	10160	12192	12192	12192	12192	12192	12192	12192	19304	12192	12192	0	JB01	1	0	\N	1	-    	-   	-   
B000001635	Fixam Kapsul	TAB 	TAB 		16500	16500	19800	19800	19800	19800	19800	19800	19800	31350	19800	19800	0	JB01	1	0	\N	1	-    	-   	-   
B000001636	Qinox Kaplet	TAB 	TAB 		11550	11550	13860	13860	13860	13860	13860	13860	13860	21945	13860	13860	0	JB01	1	0	\N	1	-    	-   	-   
B000001637	NOROID KF BELI	TUB 	TUB 		121200	121200	145440	145440	145440	145440	145440	145440	145440	230280	145440	145440	0	JB02	1	0	\N	1	-    	-   	-   
B000001638	INTRACITE KF BELI BJB	GEL 	GEL 		99200	99200	119040	119040	119040	119040	119040	119040	119040	188480	119040	119040	0	JB02	1	0	\N	1	-    	-   	-   
B000001639	Diphenhidramin inj (beli)	AMP5	AMP5		2000	2000	2400	2400	2400	2400	2400	2400	2400	3800	2400	2400	0	JB02	1	15	2016-02-05	1	-    	-   	-   
B000001640	Solafexone Injeksi 1 g	VL  	VL  		154000	154000	184800	184800	184800	184800	184800	184800	184800	292600	184800	184800	0	JB02	1	5	2018-05-01	1	-    	-   	-   
B000001641	inf RING AS BELI	INF 	INF 		28400	28400	34080	34080	34080	34080	34080	34080	34080	53960	34080	34080	0	JB02	1	0	\N	1	-    	-   	-   
B000001642	Infus Ring As Otsuka	PCS 	PCS 		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB02	1	0	\N	1	-    	-   	-   
B000001643	Kursi Roda	S32 	S32 		1250000	1250000	1500000	1500000	1500000	1500000	1500000	1500000	1500000	2375000	1500000	1500000	0	JB02	1	0	\N	1	-    	-   	-   
B000001644	Kursi Roda	PCS 	PCS 		1250000	1250000	1500000	1500000	1500000	1500000	1500000	1500000	1500000	2375000	1500000	1500000	0	JB03	1	1	2016-02-10	1	-    	-   	-   
B000001645	Crutch (Tongkat)	PCS 	PCS 		222000	222000	266400	266400	266400	266400	266400	266400	266400	421800	266400	266400	0	JB03	1	1	2016-02-10	1	-    	-   	-   
B000001646	Easycare (Isi 12)	PCS 	PCS 		49610	49610	59532	59532	59532	59532	59532	59532	59532	94259	59532	59532	0	JB02	1	0	\N	1	-    	-   	-   
B000001647	CYTODROX	TAB 	TAB 		11011	11011	13213	13213	13213	13213	13213	13213	13213	20921	13213	13213	0	JB01	1	70	\N	1	-    	-   	-   
B000001648	Molagit Tablet	TAB 	TAB 		482	482	578	578	578	578	578	578	578	916	578	578	0	JB01	1	0	\N	1	-    	-   	-   
B000001649	Sanprima Tablet	TAB 	TAB 		2000	2000	2400	2400	2400	2400	2400	2400	2400	3800	2400	2400	0	JB01	1	0	2016-02-13	1	-    	-   	-   
B000001650	BISOLVON TAB	TAB 	TAB 		1200	1200	1440	1440	1440	1440	1440	1440	1440	2280	1440	1440	0	JB01	1	0	2016-02-16	1	-    	-   	-   
B000001651	Garam Inggris	PCS 	PCS 		1500	1500	1800	1800	1800	1800	1800	1800	1800	2850	1800	1800	0	JB01	1	0	\N	1	-    	-   	-   
B000001652	calnic sirup	BTL 	BTL 		52000	52000	62400	62400	62400	62400	62400	62400	62400	98800	62400	62400	0	JB01	1	1	2016-02-16	1	-    	-   	-   
B000001653	Pranza Injeksi	PCS 	PCS 		149600	149600	179520	179520	179520	179520	179520	179520	179520	284240	179520	179520	0	JB02	1	0	2018-05-31	1	-    	-   	-   
B000001654	Ceftazidim Dexa (new)	VL  	VL  		16500	16500	19800	19800	19800	19800	19800	19800	19800	31350	19800	19800	0	JB02	1	0	\N	1	-    	-   	-   
B000001655	BIOBRAZINE TAB	TAB 	TAB 		13000	13000	15600	15600	15600	15600	15600	15600	15600	24700	15600	15600	0	JB01	1	1	2016-02-17	1	-    	-   	-   
B000001656	CARDIOASPIRIN (BELI)	TAB 	TAB 		1600	1600	1920	1920	1920	1920	1920	1920	1920	3040	1920	1920	0	JB01	1	0	\N	1	-    	-   	-   
B000001657	SINRAL TAB	TAB 	TAB 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	2016-02-17	1	-    	-   	-   
B000001658	Colme Ear Drop	BTL 	BTL 		24750	24750	29700	29700	29700	29700	29700	29700	29700	47025	29700	29700	0	JB02	1	0	\N	1	-    	-   	-   
B000001659	Albendazole tab	TAB 	TAB 		486	486	583	583	583	583	583	583	583	923	583	583	0	JB01	1	60	2016-02-19	1	-    	-   	-   
B000001660	Depo Progestin	VL  	VL  		9240	9240	11088	11088	11088	11088	11088	11088	11088	17556	11088	11088	0	JB02	1	20	\N	1	-    	-   	-   
B000001661	Venosmil gel (beli di luar)	BOX 	BOX 		169500	169500	203400	203400	203400	203400	203400	203400	203400	322050	203400	203400	0	JB02	1	1	2016-02-23	1	-    	-   	-   
B000001662	Susu Enfamil Pregistimil 400 gr	KAL 	KAL 		227189	227189	272627	272627	272627	272627	272627	272627	272627	431659	272627	272627	0	J007	1	6	\N	1	-    	-   	-   
B000001663	Ketomed Shampoo	BTL 	BTL 		40040	40040	48048	48048	48048	48048	48048	48048	48048	76076	48048	48048	0	JB02	1	2	\N	1	-    	-   	-   
B000001664	Herbakof	BTL 	BTL 		19030	19030	22836	22836	22836	22836	22836	22836	22836	36157	22836	22836	0	JB01	1	0	\N	1	-    	-   	-   
B000001665	Tantum Verde (Beli)	BTL 	BTL 		47000	47000	56400	56400	56400	56400	56400	56400	56400	89300	56400	56400	0	JB02	1	1	2016-02-27	1	-    	-   	-   
B000001666	Human Albumin Behring 20% 100mL	BOX 	BOX 		1540000	1540000	1848000	1848000	1848000	1848000	1848000	1848000	1848000	2926000	1848000	1848000	0	JB02	1	2	\N	1	-    	-   	-   
B000001667	XEPHAMOL BELI	BTL 	BTL 		17000	17000	20400	20400	20400	20400	20400	20400	20400	32300	20400	20400	0	JB01	1	0	2016-03-03	1	-    	-   	-   
B000001668	LIPROLAC	SAC 	SAC 		7000	7000	8400	8400	8400	8400	8400	8400	8400	13300	8400	8400	0	JB01	1	0	2016-03-03	1	-    	-   	-   
B000001669	TISSUE BASAH (BELI)	PAC 	PAC 		5700	5700	6840	6840	6840	6840	6840	6840	6840	10830	6840	6840	0	JB02	1	0	\N	1	-    	-   	-   
B000001670	MKP LANG KECIL	BTL 	BTL 		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB02	1	0	\N	1	-    	-   	-   
B000001671	VITAMIN A IPI*	TAB 	TAB 		80	80	96	96	96	96	96	96	96	152	96	96	0	JB01	1	0	2016-03-04	1	-    	-   	-   
B000001672	TRIOSTE	TAB 	TAB 		8635	8635	10362	10362	10362	10362	10362	10362	10362	16406	10362	10362	0	JB01	1	0	2019-06-30	1	-    	-   	-   
B000001673	V-BLOCK 6,25MG	TAB 	TAB 		2500	2500	3000	3000	3000	3000	3000	3000	3000	4750	3000	3000	0	JB01	1	5	2016-03-04	1	-    	-   	-   
B000001674	Susu NL 33	KAL 	KAL 		90000	90000	108000	108000	108000	108000	108000	108000	108000	171000	108000	108000	0	JB01	1	0	\N	1	-    	-   	-   
B000001675	LORAN TABLET	TAB 	TAB 		4840	4840	5808	5808	5808	5808	5808	5808	5808	9196	5808	5808	0	JB01	1	0	\N	1	-    	-   	-   
B000001676	R/ DR INDRA	BKS 	BKS 		49600	49600	59520	59520	59520	59520	59520	59520	59520	94240	59520	59520	0	JB01	1	0	2016-03-06	1	-    	-   	-   
B000001677	Borraginol-S salep 	TUB 	TUB 		69122.9	69122.9	82947	82947	82947	82947	82947	82947	82947	131334	82947	82947	0	JB02	1	2	\N	1	-    	-   	-   
B000001678	Racikan Euthyrax	S32 	S32 		61000	61000	73200	73200	73200	73200	73200	73200	73200	115900	73200	73200	0	JB01	1	0	\N	1	-    	-   	-   
B000001679	Hyperheb (Hepatitis B Vaksin) New	S32 	S32 		2200000	2200000	2640000	2640000	2640000	2640000	2640000	2640000	2640000	4180000	2640000	2640000	0	JB02	1	0	2017-08-31	1	-    	-   	-   
B000001680	Aminofilin Tablet (Beli)	TAB 	TAB 		300	300	360	360	360	360	360	360	360	570	360	360	0	JB01	1	0	\N	1	-    	-   	-   
B000001681	CICA CARE ALKES	PCS 	PCS 		1050000	1050000	1260000	1260000	1260000	1260000	1260000	1260000	1260000	1995000	1260000	1260000	0	JB02	1	0	2016-01-06	1	-    	-   	-   
B000001682	Pampers Dewasa XL	PCS 	PCS 		12833	12833	15400	15400	15400	15400	15400	15400	15400	24383	15400	15400	0	JB02	1	0	\N	1	-    	-   	-   
B000001683	GABBRYL SYR (KF)	BTL 	BTL 		64900	64900	77880	77880	77880	77880	77880	77880	77880	123310	77880	77880	0	JB01	1	0	2016-03-21	1	-    	-   	-   
B000001684	TANAPRIL BELI RAZA	TAB 	TAB 		1667	1667	2000	2000	2000	2000	2000	2000	2000	3167	2000	2000	0	JB01	1	3	2016-03-21	1	-    	-   	-   
B000001685	RACIKAN DR INDRA (KF)	S36 	S36 		49600	49600	59520	59520	59520	59520	59520	59520	59520	94240	59520	59520	0	JB01	1	0	2016-03-22	1	-    	-   	-   
B000001686	CALNIC PLUS TAB ( BELI KF )	TAB 	TAB 		4680	4680	5616	5616	5616	5616	5616	5616	5616	8892	5616	5616	0	JB01	1	5	2016-03-25	1	-    	-   	-   
B000001687	Isoprinosine	SYR 	SYR 		103125	103125	123750	123750	123750	123750	123750	123750	123750	195938	123750	123750	0	JB01	1	1	2016-03-26	1	-    	-   	-   
B000001688	Glisodin per Botol	BTL 	BTL 		181500	181500	217800	217800	217800	217800	217800	217800	217800	344850	217800	217800	0	JB01	1	0	\N	1	-    	-   	-   
B000001689	CEFADROXIL (IGM)	TAB 	TAB 		1008	1008	1210	1210	1210	1210	1210	1210	1210	1915	1210	1210	0	JB01	1	0	2016-03-31	1	-    	-   	-   
B000001690	NONFLAMIN BELI 	CAP 	CAP 		5900	5900	7080	7080	7080	7080	7080	7080	7080	11210	7080	7080	0	JB01	1	0	2016-03-31	1	-    	-   	-   
B000001691	AMARYL 2 MG (BELI)	TAB 	TAB 		5800	5800	6960	6960	6960	6960	6960	6960	6960	11020	6960	6960	0	JB01	1	0	2016-04-01	1	-    	-   	-   
B000001692	Glucosamin (beli di KF bjb)	TAB 	TAB 		2200	2200	2640	2640	2640	2640	2640	2640	2640	4180	2640	2640	0	JB01	1	10	2016-04-02	1	-    	-   	-   
B000001693	pamper biasa ( beli )	BKS 	BKS 		1600	1600	1920	1920	1920	1920	1920	1920	1920	3040	1920	1920	0	JB03	1	5	2016-04-03	1	-    	-   	-   
B000001694	constipen syr ( beli diluar )	SYR 	SYR 		79600	79600	95520	95520	95520	95520	95520	95520	95520	151240	95520	95520	0	JB01	1	1	2016-04-05	1	-    	-   	-   
B000001695	Q 10 COM	TAB 	TAB 		8000	8000	9600	9600	9600	9600	9600	9600	9600	15200	9600	9600	0	JB01	1	0	\N	1	-    	-   	-   
B000001696	MOXAM SUPPO	REC 	REC 		11500	11500	13800	13800	13800	13800	13800	13800	13800	21850	13800	13800	0	JB02	1	0	2016-04-09	1	-    	-   	-   
B000001697	BENANG VICRYL 6-0	PCS 	PCS 		259000	259000	310800	310800	310800	310800	310800	310800	310800	492100	310800	310800	0	JB03	1	0	2016-04-14	1	-    	-   	-   
B000001698	BENANG SURGIPRO 6-0	PCS 	PCS 		650000	650000	780000	780000	780000	780000	780000	780000	780000	1235000	780000	780000	0	JB03	1	0	2016-04-14	1	-    	-   	-   
B000001699	OESTROGEL (DR.HARI)	PCS 	PCS 		302500	302500	363000	363000	363000	363000	363000	363000	363000	574750	363000	363000	0	JB02	1	0	\N	1	-    	-   	-   
B000001700	BESTALIM TAB BELI	TAB 	TAB 		3552	3552	4262	4262	4262	4262	4262	4262	4262	6749	4262	4262	0	JB01	1	0	\N	1	-    	-   	-   
B000001701	Bestalin tab BELI	TAB 	TAB 		4950	4950	5940	5940	5940	5940	5940	5940	5940	9405	5940	5940	0	JB01	1	10	2016-04-14	1	-    	-   	-   
B000001702	EMLA (BELI)	PCS 	PCS 		77000	77000	92400	92400	92400	92400	92400	92400	92400	146300	92400	92400	0	JB02	1	0	\N	1	-    	-   	-   
B000001703	VIVACE 2,5 BELI DI KF BJB	TAB 	TAB 		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB01	1	0	2016-04-17	1	-    	-   	-   
B000001704	Alloris Sirup	BTL 	BTL 		69340	69340	83208	83208	83208	83208	83208	83208	83208	131746	83208	83208	0	JB01	1	0	\N	1	-    	-   	-   
B000001705	Sagalon Cream	TUB 	TUB 		36630	36630	43956	43956	43956	43956	43956	43956	43956	69597	43956	43956	0	JB02	1	0	\N	1	-    	-   	-   
B000001706	Folley Catheter No. 12 (Beli di Mawar)	PCS 	PCS 		25500	25500	30600	30600	30600	30600	30600	30600	30600	48450	30600	30600	0	JB03	1	2	\N	1	-    	-   	-   
B000001707	RACIKAN DR INDRA	BKS 	BKS 		32000	32000	38400	38400	38400	38400	38400	38400	38400	60800	38400	38400	0	JB01	1	0	2016-04-22	1	-    	-   	-   
B000001708	dettol cair u/mandi	BTL 	BTL 		30500	30500	36600	36600	36600	36600	36600	36600	36600	57950	36600	36600	0	JB02	1	0	\N	1	-    	-   	-   
B000001709	XX	BTL 	BTL 		70132	70132	84158	84158	84158	84158	84158	84158	84158	133251	84158	84158	0	JB01	1	0	\N	1	-    	-   	-   
B000001710	Lasal Sirup	BTL 	BTL 		25300	25300	30360	30360	30360	30360	30360	30360	30360	48070	30360	30360	0	JB01	1	0	2019-11-06	1	-    	-   	-   
B000001711	jhonson bedak	BTL 	BTL 		10000	10000	12000	12000	12000	12000	12000	12000	12000	19000	12000	12000	0	JB02	1	0	\N	1	-    	-   	-   
B000001712	Histab	TAB 	TAB 		390	390	468	468	468	468	468	468	468	741	468	468	0	JB01	1	100	\N	1	-    	-   	-   
B000001713	CETIRIZIN SYR	SYR 	SYR 		14300	14300	17160	17160	17160	17160	17160	17160	17160	27170	17160	17160	0	JB01	1	0	2016-04-27	1	-    	-   	-   
B000001714	XXXXXX	TAB 	TAB 		0	0	0	0	0	0	0	0	0	0	0	0	0	JB01	1	0	2016-04-29	1	-    	-   	-   
B000001715	Herbesser CD 100 mg	CAP 	CAP 		8184	8184	9821	9821	9821	9821	9821	9821	9821	15550	9821	9821	0	JB01	1	0	\N	1	-    	-   	-   
B000001716	CARDISMO	TAB 	TAB 		2800	2800	3360	3360	3360	3360	3360	3360	3360	5320	3360	3360	0	JB01	1	0	2016-04-30	1	-    	-   	-   
B000001717	AMINOLEBAN (BELI DI LEMBAYUNG)	PCS 	PCS 		255000	255000	306000	306000	306000	306000	306000	306000	306000	484500	306000	306000	0	JB02	1	1	2016-05-02	1	-    	-   	-   
B000001718	METHYCOBAL 500 (BELI DI KF MTP)	CAP 	CAP 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	10	2016-05-02	1	-    	-   	-   
B000001719	Alloclair Kumur (Beli)	BTL 	BTL 		117000	117000	140400	140400	140400	140400	140400	140400	140400	222300	140400	140400	0	JB02	1	0	\N	1	-    	-   	-   
B000001720	NUTRIBREAST TAB	TAB 	TAB 		7900	7900	9480	9480	9480	9480	9480	9480	9480	15010	9480	9480	0	JB01	1	0	2016-05-05	1	-    	-   	-   
B000001721	TEMPRA DROP BELI	DRP 	DRP 		40000	40000	48000	48000	48000	48000	48000	48000	48000	76000	48000	48000	0	JB01	1	0	2016-05-08	1	-    	-   	-   
B000001722	VALVIR BELI	TAB 	TAB 		14400	14400	17280	17280	17280	17280	17280	17280	17280	27360	17280	17280	0	JB01	1	0	\N	1	-    	-   	-   
B000001723	NIPE DROP BELI	BTL 	BTL 		85800	85800	102960	102960	102960	102960	102960	102960	102960	163020	102960	102960	0	JB02	1	0	2018-06-30	1	-    	-   	-   
B000001724	Protexin Infant (beli di kf bjb)	BKS 	BKS 		19700	19700	23640	23640	23640	23640	23640	23640	23640	37430	23640	23640	0	JB01	1	9	\N	1	-    	-   	-   
B000001725	INTRIZIN BELI K 24	BTL 	BTL 		55000	55000	66000	66000	66000	66000	66000	66000	66000	104500	66000	66000	0	JB01	1	0	2016-05-11	1	-    	-   	-   
B000001726	IMUNOS PLUS BELI*	BTL 	BTL 		92000	92000	110400	110400	110400	110400	110400	110400	110400	174800	110400	110400	0	JB01	1	0	\N	1	-    	-   	-   
B000001727	LAXOBERON DROP BELI	BTL 	BTL 		97500	97500	117000	117000	117000	117000	117000	117000	117000	185250	117000	117000	0	JB01	1	0	\N	1	-    	-   	-   
B000001728	TROVENSIS 8 MG INJEKSI	AMP5	AMP5		65000	65000	78000	78000	78000	78000	78000	78000	78000	123500	78000	78000	0	JB02	1	2	2016-05-12	1	-    	-   	-   
B000001729	AMARYL 4 MG	TAB 	TAB 		8044	8044	9653	9653	9653	9653	9653	9653	9653	15284	9653	9653	0	JB01	1	0	2019-12-31	1	-    	-   	-   
B000001730	CAESARIAN DRUP	S32 	S32 		529650	529650	635580	635580	635580	635580	635580	635580	635580	1006335	635580	635580	0	JB03	1	0	2016-05-13	1	-    	-   	-   
B000001731	SURGICAL GOWN XL	S32 	S32 		102850	102850	123420	123420	123420	123420	123420	123420	123420	195415	123420	123420	0	JB03	1	0	2016-05-13	1	-    	-   	-   
B000001732	SURGICAL GOWN L	S32 	S32 		94710	94710	113652	113652	113652	113652	113652	113652	113652	179949	113652	113652	0	JB03	1	0	2016-05-13	1	-    	-   	-   
B000001733	INTRIZIN SYR KF	BTL 	BTL 		68800	68800	82560	82560	82560	82560	82560	82560	82560	130720	82560	82560	0	JB01	1	1	2016-05-14	1	-    	-   	-   
B000001734	CALADIN LOTION INDOMARET	BTL 	BTL 		13000	13000	15600	15600	15600	15600	15600	15600	15600	24700	15600	15600	0	JB02	1	1	2016-05-14	1	-    	-   	-   
B000001735	cataflam 50 mg tablet	TAB 	TAB 		5497	5497	6596	6596	6596	6596	6596	6596	6596	10444	6596	6596	0	JB01	1	0	2019-10-31	1	-    	-   	-   
B000001736	MINYAK KAYU PUTIH LANG	BTL 	BTL 		5000	5000	6000	6000	6000	6000	6000	6000	6000	9500	6000	6000	0	JB02	1	0	2016-05-19	1	-    	-   	-   
B000001737	Iopamiro 370/50 ML	BTL 	BTL 		358600	358600	430320	430320	430320	430320	430320	430320	430320	681340	430320	430320	0	JB02	1	0	\N	1	-    	-   	-   
B000001738	TRIDEX 27A BELI 	INF 	INF 		23200	23200	27840	27840	27840	27840	27840	27840	27840	44080	27840	27840	0	JB02	1	0	2016-05-21	1	-    	-   	-   
B000001739	KETESSE INJ BELI MAWAR	AMP5	AMP5		70300	70300	84360	84360	84360	84360	84360	84360	84360	133570	84360	84360	0	JB02	1	0	2016-05-21	1	-    	-   	-   
B000001740	XX	BTL 	BTL 		78000	78000	93600	93600	93600	93600	93600	93600	93600	148200	93600	93600	0	JB01	1	0	2016-05-21	1	-    	-   	-   
B000001741	Sanmino Sirup (beli Deborah,global health)	BTL 	BTL 		60000	60000	72000	72000	72000	72000	72000	72000	72000	114000	72000	72000	0	JB01	1	0	\N	1	-    	-   	-   
B000001742	OXOPECT SYR	BTL 	BTL 		41200	41200	49440	49440	49440	49440	49440	49440	49440	78280	49440	49440	0	JB01	1	1	2016-05-21	1	-    	-   	-   
B000001743	BAMGETOL 200 (SAN"A)	TAB 	TAB 		2045	2045	2454	2454	2454	2454	2454	2454	2454	3886	2454	2454	0	JB01	1	0	2016-05-22	1	-    	-   	-   
B000001744	Biodiar (beli di Mawar)	TAB 	TAB 		2500	2500	3000	3000	3000	3000	3000	3000	3000	4750	3000	3000	0	JB01	1	0	\N	1	-    	-   	-   
B000001745	MINYAK TELON PER ML	ML  	ML  		680	680	816	816	816	816	816	816	816	1292	816	816	0	JB02	1	0	2016-05-27	1	-    	-   	-   
B000001746	BABY OIL PER ML	ML  	ML  		680	680	816	816	816	816	816	816	816	1292	816	816	0	JB02	1	0	2016-05-27	1	-    	-   	-   
B000001747	Kalmeco Injeksi	VL  	VL  		25820	25820	30984	30984	30984	30984	30984	30984	30984	49058	30984	30984	0	JB02	1	0	\N	1	-    	-   	-   
B000001748	xxx	KAL 	KAL 		70500	70500	84600	84600	84600	84600	84600	84600	84600	133950	84600	84600	0	J007	1	0	\N	1	-    	-   	-   
B000001749	SANMINO SYR BELI KF MTP	SYR 	SYR 		55000	55000	66000	66000	66000	66000	66000	66000	66000	104500	66000	66000	0	JB01	1	2	2016-05-29	1	-    	-   	-   
B000001750	ZeroPain	TUB 	TUB 		10638	10638	12766	12766	12766	12766	12766	12766	12766	20212	12766	12766	0	JB02	1	0	\N	1	-    	-   	-   
B000001751	SIMARC 2	TAB 	TAB 		1500	1500	1800	1800	1800	1800	1800	1800	1800	2850	1800	1800	0	JB01	1	0	2016-06-01	1	-    	-   	-   
B000001752	Amaryl-M 2/500 (beli K24)	TAB 	TAB 		6400	6400	7680	7680	7680	7680	7680	7680	7680	12160	7680	7680	0	JB01	1	0	\N	1	-    	-   	-   
B000001753	KETAMIN/ML	VL  	VL  		16000	16000	19200	19200	19200	19200	19200	19200	19200	30400	19200	19200	0	JB02	1	0	\N	1	-    	-   	-   
B000001754	XXXXXXXX	CRM 	CRM 		42000	42000	50400	50400	50400	50400	50400	50400	50400	79800	50400	50400	0	JB02	1	0	2016-06-05	1	-    	-   	-   
B000001755	TOBROSON EO BELI	CRM 	CRM 		46000	46000	55200	55200	55200	55200	55200	55200	55200	87400	55200	55200	0	JB02	1	0	2016-06-05	1	-    	-   	-   
B000001756	Crestor 20mg (beli KF BJB)	TAB 	TAB 		26200	26200	31440	31440	31440	31440	31440	31440	31440	49780	31440	31440	0	JB01	1	0	\N	1	-    	-   	-   
B000001757	KETOCONAZOL SALEP	CRM 	CRM 		3560	3560	4272	4272	4272	4272	4272	4272	4272	6764	4272	4272	0	JB02	1	0	\N	1	-    	-   	-   
B000001758	Hepa Q (beli di K24)	TAB 	TAB 		4768	4768	5722	5722	5722	5722	5722	5722	5722	9059	5722	5722	0	JB01	1	0	\N	1	-    	-   	-   
B000001759	Kalfoxim 0,5g 	VL  	VL  		95400	95400	114480	114480	114480	114480	114480	114480	114480	181260	114480	114480	0	JB02	1	0	2019-03-31	1	-    	-   	-   
B000001760	TB VIT 6 KF	BTL 	BTL 		50000	50000	60000	60000	60000	60000	60000	60000	60000	95000	60000	60000	0	JB01	1	0	\N	1	-    	-   	-   
B000001761	THIAMYCIN 500	KAP 	KAP 		3630	3630	4356	4356	4356	4356	4356	4356	4356	6897	4356	4356	0	JB01	1	0	\N	1	-    	-   	-   
B000001762	BENANG SAFIL3-0 CATING	LBR 	LBR 		113000	113000	135600	135600	135600	135600	135600	135600	135600	214700	135600	135600	0	JB05	1	0	2016-06-25	1	-    	-   	-   
B000001763	Rinocet (beli di KF)	BTL 	BTL 		53000	53000	63600	63600	63600	63600	63600	63600	63600	100700	63600	63600	0	JB01	1	1	2016-06-27	1	-    	-   	-   
B000001764	OPTALVIT PLUS*	TAB 	TAB 		6050	6050	7260	7260	7260	7260	7260	7260	7260	11495	7260	7260	0	JB01	1	15	2016-06-28	1	-    	-   	-   
B000001765	EMPENG BELI	PCS 	PCS 		24400	24400	29280	29280	29280	29280	29280	29280	29280	46360	29280	29280	0	JB05	1	0	2016-06-29	1	-    	-   	-   
B000001766	PEMBALUT CHARM BELI	BKS 	BKS 		8900	8900	10680	10680	10680	10680	10680	10680	10680	16910	10680	10680	0	JB05	1	1	2018-05-01	1	-    	-   	-   
B000001767	BENAG SAFIL 2.0 	S35 	S35 		118000	118000	141600	141600	141600	141600	141600	141600	141600	224200	141600	141600	0	JB02	1	0	2016-07-04	1	-    	-   	-   
B000001768	BENANG SAFIL 1	Lus 	Lus 		113000	113000	135600	135600	135600	135600	135600	135600	135600	214700	135600	135600	0	JB02	1	0	2016-07-04	1	-    	-   	-   
B000001769	Tanapres	TAB 	TAB 		10298	10298	12358	12358	12358	12358	12358	12358	12358	19566	12358	12358	0	JB01	1	30	\N	1	-    	-   	-   
B000001770	Myores (beli di kf bjb)	TAB 	TAB 		5550	5550	6660	6660	6660	6660	6660	6660	6660	10545	6660	6660	0	JB01	1	0	\N	1	-    	-   	-   
B000001771	INTRIZIN SYR BELI K24	SYR 	SYR 		52800	52800	63360	63360	63360	63360	63360	63360	63360	100320	63360	63360	0	JB01	1	1	2016-07-10	1	-    	-   	-   
B000001772	DIUVAR (BELI)	S38 	S38 		19000	19000	22800	22800	22800	22800	22800	22800	22800	36100	22800	22800	0	JB01	1	0	2016-07-10	1	-    	-   	-   
B000001773	Farsix Injeksi	AMP5	AMP5		9066	9066	10879	10879	10879	10879	10879	10879	10879	17225	10879	10879	0	JB02	1	0	\N	1	-    	-   	-   
B000001774	PROVULA TAB BELI	TAB 	TAB 		16033	16033	19240	19240	19240	19240	19240	19240	19240	30463	19240	19240	0	JB01	1	0	\N	1	-    	-   	-   
B000001775	Voltaren Gel (beli di K24)	GEL 	GEL 		63000	63000	75600	75600	75600	75600	75600	75600	75600	119700	75600	75600	0	JB02	1	1	2016-07-14	1	-    	-   	-   
B000001776	OSTEONAT OAW	TAB 	TAB 		82500	82500	99000	99000	99000	99000	99000	99000	99000	156750	99000	99000	0	JB01	1	0	\N	1	-    	-   	-   
B000001777	Clovertil (beli)	TAB 	TAB 		14000	14000	16800	16800	16800	16800	16800	16800	16800	26600	16800	16800	0	JB01	1	0	\N	1	-    	-   	-   
B000001778	spalak tangan 80 cm	PCS 	PCS 		78000	78000	93600	93600	93600	93600	93600	93600	93600	148200	93600	93600	0	JB03	1	0	\N	1	-    	-   	-   
B000001779	LASIX BELI DI AVICIENA MEDIKA	AMP5	AMP5		16800	16800	20160	20160	20160	20160	20160	20160	20160	31920	20160	20160	0	JB02	1	2	\N	1	-    	-   	-   
B000001780	SPUIT 1 CC BD	PCS 	PCS 		2904	2904	3485	3485	3485	3485	3485	3485	3485	5518	3485	3485	0	JB03	1	0	\N	1	-    	-   	-   
B000001781	SPUIT 3 CC BD	PCS 	PCS 		3177	3177	3812	3812	3812	3812	3812	3812	3812	6036	3812	3812	0	JB03	1	0	\N	1	-    	-   	-   
B000001782	SPUIT 5 CC BD	PCS 	PCS 		3975	3975	4770	4770	4770	4770	4770	4770	4770	7552	4770	4770	0	JB03	1	0	\N	1	-    	-   	-   
B000001783	SPUIT 10 CC BD	PCS 	PCS 		5366	5366	6439	6439	6439	6439	6439	6439	6439	10195	6439	6439	0	JB03	1	0	2017-02-14	1	-    	-   	-   
B000001784	CEFOPERAZON SULBACTAM	S38 	S38 		120000	120000	144000	144000	144000	144000	144000	144000	144000	228000	144000	144000	0	JB02	1	0	2016-07-23	1	-    	-   	-   
B000001785	ceremax rz	BTL 	BTL 		316000	316000	379200	379200	379200	379200	379200	379200	379200	600400	379200	379200	0	JB02	1	0	2018-05-01	1	-    	-   	-   
B000001786	ceremax aviciena	BTL 	BTL 		385000	385000	462000	462000	462000	462000	462000	462000	462000	731500	462000	462000	0	JB02	1	0	\N	1	-    	-   	-   
B000001787	Sumagesic 600 (beli di kf sekumpul)	TAB 	TAB 		600	600	720	720	720	720	720	720	720	1140	720	720	0	JB01	1	0	2015-12-10	1	-    	-   	-   
B000001788	Tramadol (beli di RAZA)	TAB 	TAB 		1000	1000	1200	1200	1200	1200	1200	1200	1200	1900	1200	1200	0	JB01	1	0	2015-12-10	1	-    	-   	-   
B000001789	Retivit Caplet*	KAP 	KAP 		3894	3894	4673	4673	4673	4673	4673	4673	4673	7399	4673	4673	0	JB01	1	0	2018-02-01	1	-    	-   	-   
B000001790	URESIX INJ	AMP5	AMP5		8305	8305	9966	9966	9966	9966	9966	9966	9966	15780	9966	9966	0	JB02	1	0	\N	1	-    	-   	-   
B000001791	KETOROLAC 30 MG INJEKSI (ENSEVAL)	VL  	VL  		5000	5000	6000	6000	6000	6000	6000	6000	6000	9500	6000	6000	0	JB02	1	0	\N	1	-    	-   	-   
B000001792	OPTALVIT SYR*	BTL 	BTL 		66000	66000	79200	79200	79200	79200	79200	79200	79200	125400	79200	79200	0	JB01	1	5	2017-11-30	1	-    	-   	-   
B000001793	Ondansetron 8 mg Tab Novell	TAB 	TAB 		2530	2530	3036	3036	3036	3036	3036	3036	3036	4807	3036	3036	0	JB01	1	120	2018-06-01	1	-    	-   	-   
B000001794	Seloxy (Beli di kf bjb)	CAP 	CAP 		5550	5550	6660	6660	6660	6660	6660	6660	6660	10545	6660	6660	0	JB01	1	0	\N	1	-    	-   	-   
B000001795	Dermakel (beli di kf mtp)	SAL 	SAL 		135000	135000	162000	162000	162000	162000	162000	162000	162000	256500	162000	162000	0	JB02	1	0	\N	1	-    	-   	-   
B000001796	Thrombopob gel (beli di kf mtp)	SAL 	SAL 		53500	53500	64200	64200	64200	64200	64200	64200	64200	101650	64200	64200	0	JB02	1	0	\N	1	-    	-   	-   
B000001797	REGIVELL	S38 	S38 		60500	60500	72600	72600	72600	72600	72600	72600	72600	114950	72600	72600	0	JB02	1	0	2016-07-30	1	-    	-   	-   
B000001798	Bebelove FL	KAL 	KAL 		111000	111000	133200	133200	133200	133200	133200	133200	133200	210900	133200	133200	0	JB01	1	1	2024-07-30	1	-    	-   	-   
B000001799	Santagesik (beli di mawar)	AMP5	AMP5		12500	12500	15000	15000	15000	15000	15000	15000	15000	23750	15000	15000	0	JB02	1	0	2016-07-31	1	-    	-   	-   
B000001800	Dopamet (beli di kf mtp)	TAB 	TAB 		2250	2250	2700	2700	2700	2700	2700	2700	2700	4275	2700	2700	0	JB01	1	0	\N	1	-    	-   	-   
B000001801	BEBELOVE FL KF	KAL 	KAL 		104000	104000	124800	124800	124800	124800	124800	124800	124800	197600	124800	124800	0	J007	1	0	2016-07-30	1	-    	-   	-   
B000001802	NURILON SOYA	BOX 	BOX 		94600	94600	113520	113520	113520	113520	113520	113520	113520	179740	113520	113520	0	J007	1	0	2016-08-05	1	-    	-   	-   
B000001803	THORAX TUBE	S32 	S32 		1000000	1000000	1200000	1200000	1200000	1200000	1200000	1200000	1200000	1900000	1200000	1200000	0	JB03	1	0	\N	1	-    	-   	-   
B000001804	xx	SYR 	SYR 		39000	39000	46800	46800	46800	46800	46800	46800	46800	74100	46800	46800	0	JB01	1	0	2018-02-01	1	-    	-   	-   
B000001805	Cortamin Syr (Beli K24)	SYR 	SYR 		47520	47520	57024	57024	57024	57024	57024	57024	57024	90288	57024	57024	0	JB01	1	1	2016-07-14	1	-    	-   	-   
B000001806	Sendok Sirup	PCS 	PCS 		1000	1000	1200	1200	1200	1200	1200	1200	1200	1900	1200	1200	0	JB03	1	500	2016-08-09	1	-    	-   	-   
B000001807	GYNAECOLOGY SET	S32 	S32 		690360	690360	828432	828432	828432	828432	828432	828432	828432	1311684	828432	828432	0	JB03	1	0	\N	1	-    	-   	-   
B000001808	DAKTARIN SALEP BELI	CRM 	CRM 		23000	23000	27600	27600	27600	27600	27600	27600	27600	43700	27600	27600	0	JB02	1	0	\N	1	-    	-   	-   
B000001809	Alkohol Swab	BKS 	BKS 		400	400	480	480	480	480	480	480	480	760	480	480	0	JB03	1	0	2016-08-10	1	-    	-   	-   
B000001810	ONDANSETRON 4 MG NOVELL	TAB 	TAB 		1540	1540	1848	1848	1848	1848	1848	1848	1848	2926	1848	1848	0	JB01	1	0	\N	1	-    	-   	-   
B000001811	CARDACE BELI	TAB 	TAB 		7066	7066	8479	8479	8479	8479	8479	8479	8479	13425	8479	8479	0	JB01	1	0	\N	1	-    	-   	-   
B000001812	bisolvon mawar inj	AMP5	AMP5		30000	30000	36000	36000	36000	36000	36000	36000	36000	57000	36000	36000	0	JB02	1	0	2016-08-14	1	-    	-   	-   
B000001813	Laxadine Emulsi 30 ml Syr	BTL 	BTL 		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB01	1	0	2019-05-01	1	-    	-   	-   
B000001814	Cardace (beli di KF mtp)	TAB 	TAB 		7000	7000	8400	8400	8400	8400	8400	8400	8400	13300	8400	8400	0	JB01	1	0	2016-08-16	1	-    	-   	-   
B000001815	kanamicin injeksi	S38 	S38 		7411	7411	8893	8893	8893	8893	8893	8893	8893	14081	8893	8893	0	JB02	1	5	\N	1	-    	-   	-   
B000001816	MEROPENEM EVICIENNA	S38 	S38 		63500	63500	76200	76200	76200	76200	76200	76200	76200	120650	76200	76200	0	JB02	1	0	\N	1	-    	-   	-   
B000001817	Meropenem 1 gr injeksi Bernofarm	VL  	VL  		220000	220000	264000	264000	264000	264000	264000	264000	264000	418000	264000	264000	0	JB02	1	0	2018-12-01	1	-    	-   	-   
B000001818	KLODERMA 10 g OINTMENT	TUB 	TUB 		19000	19000	22800	22800	22800	22800	22800	22800	22800	36100	22800	22800	0	JB02	1	0	2016-08-23	1	-    	-   	-   
B000001819	Thromboflash 10 gr gel	GEL 	GEL 		30800	30800	36960	36960	36960	36960	36960	36960	36960	58520	36960	36960	0	JB02	1	0	2017-09-30	1	-    	-   	-   
B000001820	VITADION	AMP5	AMP5		12100	12100	14520	14520	14520	14520	14520	14520	14520	22990	14520	14520	0	JB02	1	0	2016-08-24	1	-    	-   	-   
B000001821	SGM LLM (beli di kf bjb)	BOX 	BOX 		48400	48400	58080	58080	58080	58080	58080	58080	58080	91960	58080	58080	0	J007	1	1	2016-08-25	1	-    	-   	-   
B000001822	Vascon Inj (Beli Diluar)	AMP5	AMP5		80000	80000	96000	96000	96000	96000	96000	96000	96000	152000	96000	96000	0	JB02	1	0	\N	1	-    	-   	-   
B000001823	RAIVAS INJ (BELI DI SARMUL)	AMP5	AMP5		110000	110000	132000	132000	132000	132000	132000	132000	132000	209000	132000	132000	0	JB02	1	0	\N	1	-    	-   	-   
B000001824	LEVERMIR BELI RAZA	PEN 	PEN 		102500	102500	123000	123000	123000	123000	123000	123000	123000	194750	123000	123000	0	JB02	1	0	2016-08-31	1	-    	-   	-   
B000001825	AMARYL BELI K24	TAB 	TAB 		5500	5500	6600	6600	6600	6600	6600	6600	6600	10450	6600	6600	0	JB01	1	0	2016-08-31	1	-    	-   	-   
B000001826	GENOINT	TUB 	TUB 		8000	8000	9600	9600	9600	9600	9600	9600	9600	15200	9600	9600	0	JB02	1	0	\N	1	-    	-   	-   
B000001827	Tempra Syr Beli	SYR 	SYR 		34700	34700	41640	41640	41640	41640	41640	41640	41640	65930	41640	41640	0	JB01	1	0	2016-09-03	1	-    	-   	-   
B000001828	Ardium tab beli	TAB 	TAB 		8150	8150	9780	9780	9780	9780	9780	9780	9780	15485	9780	9780	0	JB01	1	0	2016-09-04	1	-    	-   	-   
B000001829	b6 k24	TAB 	TAB 		30	30	36	36	36	36	36	36	36	57	36	36	0	JB01	1	0	\N	1	-    	-   	-   
B000001830	Leparson 	TAB 	TAB 		5000	5000	6000	6000	6000	6000	6000	6000	6000	9500	6000	6000	0	JB01	1	55	\N	1	-    	-   	-   
B000001831	LODOMER INJ SAMBANG LIHUM	AMP5	AMP5		15000	15000	18000	18000	18000	18000	18000	18000	18000	28500	18000	18000	0	JB02	1	0	2016-09-09	1	-    	-   	-   
B000001832	Levemir beli di San-a	PEN 	PEN 		150000	150000	180000	180000	180000	180000	180000	180000	180000	285000	180000	180000	0	JB02	1	0	2016-08-31	1	-    	-   	-   
B000001833	Minyak Telon Beli	BTL 	BTL 		18000	18000	21600	21600	21600	21600	21600	21600	21600	34200	21600	21600	0	JB02	1	0	2016-08-31	1	-    	-   	-   
B000001834	FASIDOL 650 MG	KAP 	KAP 		350	350	420	420	420	420	420	420	420	665	420	420	0	JB01	1	0	\N	1	-    	-   	-   
B000001835	BURNAZIN BELI DI KF	TUB 	TUB 		57000	57000	68400	68400	68400	68400	68400	68400	68400	108300	68400	68400	0	JB02	1	0	2016-09-13	1	-    	-   	-   
B000001836	diabetasol 630 mg	BOX 	BOX 		141000	141000	169200	169200	169200	169200	169200	169200	169200	267900	169200	169200	0	J007	1	0	2018-06-30	1	-    	-   	-   
B000001837	Epidural Set + Obat2an (dr. Mursyadad)	S32 	S32 		1440000	1440000	1728000	1728000	1728000	1728000	1728000	1728000	1728000	2736000	1728000	1728000	0	JB02	1	0	2016-09-15	1	-    	-   	-   
B000001838	Lodomer inj 5 mg	AMP5	AMP5		12524	12524	15029	15029	15029	15029	15029	15029	15029	23796	15029	15029	0	JB02	1	0	2016-12-19	1	-    	-   	-   
B000001839	KETTESE TABLET	TAB 	TAB 		8800	8800	10560	10560	10560	10560	10560	10560	10560	16720	10560	10560	0	JB01	1	0	2016-09-18	1	-    	-   	-   
B000001840	Nutri B	KAP 	KAP 		9000	9000	10800	10800	10800	10800	10800	10800	10800	17100	10800	10800	0	JB01	1	0	2016-09-22	1	-    	-   	-   
B000001841	Visanne 2 mg	TAB 	TAB 		16676	16676	20011	20011	20011	20011	20011	20011	20011	31684	20011	20011	0	JB01	1	0	2019-01-01	1	-    	-   	-   
B000001842	Racikan DR HARI	CAP 	CAP 		1200	1200	1440	1440	1440	1440	1440	1440	1440	2280	1440	1440	0	JB01	1	0	2016-09-25	1	-    	-   	-   
B000001843	Trilac 40 	VL  	VL  		102000	102000	122400	122400	122400	122400	122400	122400	122400	193800	122400	122400	0	JB02	1	5	2016-09-28	1	-    	-   	-   
B000001844	SUSU HEPATOSOL	BOX 	BOX 		96000	96000	115200	115200	115200	115200	115200	115200	115200	182400	115200	115200	0	JB01	1	0	2016-09-28	1	-    	-   	-   
B000001845	inlacin 50 mg	TAB 	TAB 		4400	4400	5280	5280	5280	5280	5280	5280	5280	8360	5280	5280	0	JB01	1	0	2019-09-30	1	-    	-   	-   
B000001846	TRAJENTA 5 MG TAB	TAB 	TAB 		15999.5	15999.5	19199	19199	19199	19199	19199	19199	19199	30399	19199	19199	0	JB01	1	0	2019-05-31	1	-    	-   	-   
B000001847	Tracetate Sirup (Beli di KF)	BTL 	BTL 		405000	405000	486000	486000	486000	486000	486000	486000	486000	769500	486000	486000	0	JB01	1	0	2016-10-04	1	-    	-   	-   
B000001848	CARDACE 2,5 MG	TAB 	TAB 		2600	2600	3120	3120	3120	3120	3120	3120	3120	4940	3120	3120	0	JB01	1	0	\N	1	-    	-   	-   
B000001849	SALIN 3 % INF	BTL 	BTL 		26650	26650	31980	31980	31980	31980	31980	31980	31980	50635	31980	31980	0	JB02	1	0	2016-10-07	1	-    	-   	-   
B000001850	SPALK ANAK	PCS 	PCS 		32500	32500	39000	39000	39000	39000	39000	39000	39000	61750	39000	39000	0	JB03	1	0	\N	1	-    	-   	-   
B000001851	FASORBID 5 MG TAB	TAB 	TAB 		223	223	268	268	268	268	268	268	268	424	268	268	0	JB01	1	0	2020-09-30	1	-    	-   	-   
B000001852	Novorapid insulin (Beli di KF mtp)	PEN 	PEN 		180000	180000	216000	216000	216000	216000	216000	216000	216000	342000	216000	216000	0	JB02	1	0	2016-10-12	1	-    	-   	-   
B000001853	Forxiga 10 mg	TAB 	TAB 		14076	14076	16891	16891	16891	16891	16891	16891	16891	26744	16891	16891	0	JB01	1	0	2016-10-14	1	-    	-   	-   
B000001854	Ceftazidim inj (Hexpharm)	VL  	VL  		24750	24750	29700	29700	29700	29700	29700	29700	29700	47025	29700	29700	0	JB02	1	10	2018-06-30	1	-    	-   	-   
B000001855	HANSALAST ROLL 1,25 CM X 5 M	SET 	SET 		4000	4000	4800	4800	4800	4800	4800	4800	4800	7600	4800	4800	0	JB03	1	1	2016-10-19	1	-    	-   	-   
B000001856	Calgae Kaplet*	KAP 	KAP 		4950	4950	5940	5940	5940	5940	5940	5940	5940	9405	5940	5940	0	JB01	1	0	2018-11-01	1	-    	-   	-   
B000001857	HESMIN SANA	TAB 	TAB 		7900	7900	9480	9480	9480	9480	9480	9480	9480	15010	9480	9480	0	JB01	1	0	2016-10-20	1	-    	-   	-   
B000001858	STOBLED SANA	TAB 	TAB 		7250	7250	8700	8700	8700	8700	8700	8700	8700	13775	8700	8700	0	JB01	1	0	2016-10-20	1	-    	-   	-   
B000001859	CALADIN LOTION INDOMART	BTL 	BTL 		14900	14900	17880	17880	17880	17880	17880	17880	17880	28310	17880	17880	0	JB02	1	0	2016-10-24	1	-    	-   	-   
B00000186	SYRING TERUMO 50 CC BELI DI LUAR	PCS 	PCS 		48000	48000	57600	57600	57600	57600	57600	57600	57600	91200	57600	57600	0	JB03	1	0	2020-03-01	1	-    	-   	-   
B000001860	Artoflam Tab	TAB 	TAB 		7333	7333	8800	8800	8800	8800	8800	8800	8800	13933	8800	8800	0	JB01	1	0	2016-10-23	1	-    	-   	-   
B000001861	PROBIOKID BELI DI KF SKUMPUL	BKS 	BKS 		16500	16500	19800	19800	19800	19800	19800	19800	19800	31350	19800	19800	0	JB01	1	1	2016-10-28	1	-    	-   	-   
B000001862	kloramfenicol salep mata	TUB 	TUB 		2110	2110	2532	2532	2532	2532	2532	2532	2532	4009	2532	2532	0	JB02	1	5	2016-10-30	1	-    	-   	-   
B000001863	NEBULIZER KIT	BOX 	BOX 		80000	80000	96000	96000	96000	96000	96000	96000	96000	152000	96000	96000	0	JB04	1	0	2016-11-02	1	-    	-   	-   
B000001864	SALEP BEPHANTEN	SAL 	SAL 		59000	59000	70800	70800	70800	70800	70800	70800	70800	112100	70800	70800	0	JB02	1	0	2016-11-02	1	-    	-   	-   
B000001865	TB VIT TABLET	TAB 	TAB 		900	900	1080	1080	1080	1080	1080	1080	1080	1710	1080	1080	0	JB01	1	0	2016-11-03	1	-    	-   	-   
B000001866	RIFAMPICIN 450 MG 	TAB 	TAB 		1400	1400	1680	1680	1680	1680	1680	1680	1680	2660	1680	1680	0	JB01	1	0	2016-11-04	1	-    	-   	-   
B000001867	Inf NS-OTSU 500ml	BTL 	BTL 		13200	13200	15840	15840	15840	15840	15840	15840	15840	25080	15840	15840	0	JB02	1	60	2019-05-01	1	-    	-   	-   
B000001868	DECUBAL CREAM (KF MTP)	GEL 	GEL 		27500	27500	33000	33000	33000	33000	33000	33000	33000	52250	33000	33000	0	JB02	1	0	2016-11-06	1	-    	-   	-   
B000001869	Fungares Cream 5 mg	TUB 	TUB 		17600	17600	21120	21120	21120	21120	21120	21120	21120	33440	21120	21120	0	JB02	1	0	\N	1	-    	-   	-   
B000001870	Microlax supp (Beli K24)	TUB 	TUB 		20000	20000	24000	24000	24000	24000	24000	24000	24000	38000	24000	24000	0	JB02	1	0	\N	1	-    	-   	-   
B000001871	BRONSOLVAN SIRUP	BTL 	BTL 		14300	14300	17160	17160	17160	17160	17160	17160	17160	27170	17160	17160	0	JB01	1	1	2016-11-08	1	-    	-   	-   
B000001872	DEPAKOTE ( BELI DI KF )	TAB 	TAB 		13125	13125	15750	15750	15750	15750	15750	15750	15750	24938	15750	15750	0	JB01	1	20	2016-11-08	1	-    	-   	-   
B000001873	Tensilo Inj (Beli di Aviciena)	VL  	VL  		227000	227000	272400	272400	272400	272400	272400	272400	272400	431300	272400	272400	0	JB02	1	8	2016-11-09	1	-    	-   	-   
B000001874	kanamycin inj san a	S38 	S38 		10000	10000	12000	12000	12000	12000	12000	12000	12000	19000	12000	12000	0	JB02	1	0	\N	1	-    	-   	-   
B000001875	Meropenem 1 g (Hexpharm)	VL  	VL  		110000	110000	132000	132000	132000	132000	132000	132000	132000	209000	132000	132000	0	JB02	1	0	\N	1	-    	-   	-   
B000001876	Meropenem 1 g inj 	VL  	VL  		242000	242000	290400	290400	290400	290400	290400	290400	290400	459800	290400	290400	0	JB02	1	0	2018-12-01	1	-    	-   	-   
B000001877	Avodart tab	TAB 	TAB 		8547	8547	10256	10256	10256	10256	10256	10256	10256	16239	10256	10256	0	JB01	1	0	2016-11-19	1	-    	-   	-   
B000001878	Albapure 20% 100 mL	BTL 	BTL 		1100000	2200000	2640000	2640000	2640000	2640000	2640000	2640000	2640000	4180000	2640000	2640000	0	JB02	1	0	\N	1	I0005	-   	-   
B000001879	RIFASTAR BELI	TAB 	TAB 		6800	6800	8160	8160	8160	8160	8160	8160	8160	12920	8160	8160	0	JB01	1	0	2016-11-25	1	-    	-   	-   
B000001880	ALBUMIN 20 % 100 cc LEMBAYUNG	BTL 	BTL 		1602000	1602000	1922400	1922400	1922400	1922400	1922400	1922400	1922400	3043800	1922400	1922400	0	JB02	1	0	\N	1	-    	-   	-   
B000001881	Dot HUKI Elephant 240 ml	BTL 	BTL 		30000	30000	36000	36000	36000	36000	36000	36000	36000	57000	36000	36000	0	JB04	1	0	\N	1	-    	-   	-   
B000001882	Dot HUKI with Handle 240 ml	BTL 	BTL 		31500	31500	37800	37800	37800	37800	37800	37800	37800	59850	37800	37800	0	JB02	1	0	\N	1	-    	-   	-   
B000001883	Dot HUKI with Handle 120 ml	BTL 	BTL 		33500	33500	40200	40200	40200	40200	40200	40200	40200	63650	40200	40200	0	JB04	1	0	\N	1	-    	-   	-   
B000001884	Empeng HUKI silicone	BOX 	BOX 		18500	18500	22200	22200	22200	22200	22200	22200	22200	35150	22200	22200	0	JB04	1	0	\N	1	-    	-   	-   
B000001885	Bronsolvon 150mg	TAB 	TAB 		390	390	468	468	468	468	468	468	468	741	468	468	0	JB01	1	0	2016-10-01	1	-    	-   	-   
B000001886	Maxprinol tab	TAB 	TAB 		10500	10500	12600	12600	12600	12600	12600	12600	12600	19950	12600	12600	0	JB01	1	0	2016-10-01	1	-    	-   	-   
B000001887	Nutrimama	TAB 	TAB 		9400	9400	11280	11280	11280	11280	11280	11280	11280	17860	11280	11280	0	JB01	1	0	2016-10-01	1	-    	-   	-   
B000001888	Nasalin spray (beli)	BTL 	BTL 		126500	126500	151800	151800	151800	151800	151800	151800	151800	240350	151800	151800	0	JB02	1	0	\N	1	-    	-   	-   
B000001889	Hepa balance (KF BJB ) beli	TAB 	TAB 		16000	16000	19200	19200	19200	19200	19200	19200	19200	30400	19200	19200	0	JB01	1	0	2016-12-02	1	-    	-   	-   
B000001890	TRIFED SAN A	TAB 	TAB 		2000	2000	2400	2400	2400	2400	2400	2400	2400	3800	2400	2400	0	JB01	1	0	2016-12-03	1	-    	-   	-   
B000001891	HYPAFIX 1/4	LBR 	LBR 		50617	50617	60740	60740	60740	60740	60740	60740	60740	96172	60740	60740	0	JB03	1	0	2016-12-03	1	-    	-   	-   
B000001892	PRIMAKUIN	TAB 	TAB 		400	400	480	480	480	480	480	480	480	760	480	480	0	JB01	1	0	2016-12-03	1	-    	-   	-   
B000001893	Trileptal 300mg	TAB 	TAB 		8980	8980	10776	10776	10776	10776	10776	10776	10776	17062	10776	10776	0	JB01	1	100	\N	1	-    	-   	-   
B000001894	DECUBAL	CRM 	CRM 		29000	29000	34800	34800	34800	34800	34800	34800	34800	55100	34800	34800	0	JB02	1	0	\N	1	-    	-   	-   
B000001895	Calnic syr (beli di kf mtp)	SYR 	SYR 		65000	65000	78000	78000	78000	78000	78000	78000	78000	123500	78000	78000	0	JB01	1	0	2016-12-11	1	-    	-   	-   
B000001896	Pediagrow syr (beli di kf mtp)	SYR 	SYR 		55000	55000	66000	66000	66000	66000	66000	66000	66000	104500	66000	66000	0	JB01	1	0	2016-12-11	1	-    	-   	-   
B000001897	TISMALIN SAN A	TAB 	TAB 		1200	1200	1440	1440	1440	1440	1440	1440	1440	2280	1440	1440	0	JB01	1	0	2016-12-20	1	-    	-   	-   
B000001898	Bebelov FL KF MTP	KAL 	KAL 		97000	97000	116400	116400	116400	116400	116400	116400	116400	184300	116400	116400	0	J007	1	0	2016-12-21	1	-    	-   	-   
B000001899	MEFLAM 15 MG	TAB 	TAB 		8938	8938	10726	10726	10726	10726	10726	10726	10726	16982	10726	10726	0	JB01	1	0	2016-12-23	1	-    	-   	-   
B000001900	Prostakur (Beli di San-A)	TAB 	TAB 		2600	2600	3120	3120	3120	3120	3120	3120	3120	4940	3120	3120	0	JB01	1	0	2016-12-24	1	-    	-   	-   
B000001901	CRIPSA	TAB 	TAB 		14432	14432	17318	17318	17318	17318	17318	17318	17318	27421	17318	17318	0	JB01	1	0	2016-12-24	1	-    	-   	-   
B000001902	MASKER N95	CM  	CM  		18000	18000	21600	21600	21600	21600	21600	21600	21600	34200	21600	21600	0	JB05	1	0	2016-12-24	1	-    	-   	-   
B000001903	CARBAZOCHROME INJ ( BELI DI RS BJB )	AMP5	AMP5		16000	16000	19200	19200	19200	19200	19200	19200	19200	30400	19200	19200	0	JB02	1	2	2016-12-25	1	-    	-   	-   
B000001904	DETRUSITOL TAB (BELI)	TAB 	TAB 		15000	15000	18000	18000	18000	18000	18000	18000	18000	28500	18000	18000	0	JB01	1	0	\N	1	-    	-   	-   
B000001905	NOROID CREAM K24	BTL 	BTL 		153100	153100	183720	183720	183720	183720	183720	183720	183720	290890	183720	183720	0	JB02	1	0	2016-12-26	1	-    	-   	-   
B000001906	tounge spatel	SET 	SET 		5600	5600	6720	6720	6720	6720	6720	6720	6720	10640	6720	6720	0	JB03	1	5	2016-12-30	1	-    	-   	-   
B000001907	Q10 BELI KF	CAP 	CAP 		20000	20000	24000	24000	24000	24000	24000	24000	24000	38000	24000	24000	0	JB01	1	0	\N	1	-    	-   	-   
B000001908	DERMOVATE	CRM 	CRM 		79000	79000	94800	94800	94800	94800	94800	94800	94800	150100	94800	94800	0	JB02	1	0	2016-12-31	1	-    	-   	-   
B000001909	Methotrexate tab (BELI)	TAB 	TAB 		7500	7500	9000	9000	9000	9000	9000	9000	9000	14250	9000	9000	0	JB01	1	0	2016-12-31	1	-    	-   	-   
B000001910	Larutan PK (beli)	PCS 	PCS 		7000	7000	8400	8400	8400	8400	8400	8400	8400	13300	8400	8400	0	JB02	1	0	2017-01-01	1	-    	-   	-   
B000001911	CELOCID 750 INJ (BELI)	VL  	VL  		76500	76500	91800	91800	91800	91800	91800	91800	91800	145350	91800	91800	0	JB02	1	0	2017-01-04	1	-    	-   	-   
B000001912	SULDOX	TAB 	TAB 		2500	2500	3000	3000	3000	3000	3000	3000	3000	4750	3000	3000	0	JB01	1	0	2017-01-04	1	-    	-   	-   
B000001913	Nasalin Nasal Spray	Fle 	Fle 		108900	108900	130680	130680	130680	130680	130680	130680	130680	206910	130680	130680	0	JB02	1	0	2017-08-01	1	-    	-   	-   
B000001914	FEMARA TAB	TAB 	TAB 		61783	61783	74140	74140	74140	74140	74140	74140	74140	117388	74140	74140	0	JB01	1	30	2017-01-06	1	-    	-   	-   
B000001915	TB VIT BELI KF BJB	SYR 	SYR 		48000	48000	57600	57600	57600	57600	57600	57600	57600	91200	57600	57600	0	JB01	1	0	2017-01-08	1	-    	-   	-   
B000001916	RACIKAN FIRAZINAMIDE	PUY 	PUY 		5000	5000	6000	6000	6000	6000	6000	6000	6000	9500	6000	6000	0	JB01	1	0	2016-11-03	1	-    	-   	-   
B000001917	Xanda syr 60 ml (beli San-A)	BTL 	BTL 		31500	31500	37800	37800	37800	37800	37800	37800	37800	59850	37800	37800	0	JB01	1	0	2017-01-10	1	-    	-   	-   
B000001918	benecol cereal vanila	BKS 	BKS 		7784	7784	9341	9341	9341	9341	9341	9341	9341	14790	9341	9341	0	J007	1	0	2018-01-31	1	-    	-   	-   
B000001919	Trihexyphenidil/ THP (beli Sambang Lihum)	TAB 	TAB 		200	200	240	240	240	240	240	240	240	380	240	240	0	JB01	1	0	2017-01-13	1	-    	-   	-   
B000001920	Haloperidol 5 mg tab	TAB 	TAB 		150	150	180	180	180	180	180	180	180	285	180	180	0	JB01	1	0	2017-01-13	1	-    	-   	-   
B000001921	Desolex Cream	TUB 	TUB 		23000	23000	27600	27600	27600	27600	27600	27600	27600	43700	27600	27600	0	JB02	1	0	2017-01-13	1	-    	-   	-   
B000001922	carbamazepine 200mg beli	TAB 	TAB 		2127	2127	2552	2552	2552	2552	2552	2552	2552	4041	2552	2552	0	JB01	1	0	2017-01-19	1	-    	-   	-   
B000001923	NIMOTOP INF BELI 	INF 	INF 		262000	262000	314400	314400	314400	314400	314400	314400	314400	497800	314400	314400	0	JB02	1	0	2016-01-22	1	-    	-   	-   
B000001924	MIOZIDINE (BELI DI KF MTP)	TAB 	TAB 		3833	3833	4600	4600	4600	4600	4600	4600	4600	7283	4600	4600	0	JB01	1	6	2017-01-20	1	-    	-   	-   
B000001925	Inerson cream (beli k24)	TUB 	TUB 		52000	52000	62400	62400	62400	62400	62400	62400	62400	98800	62400	62400	0	JB02	1	0	\N	1	-    	-   	-   
B000001926	OXYCAN 	BTL 	BTL 		35000	35000	42000	42000	42000	42000	42000	42000	42000	66500	42000	42000	0	JB03	1	3	2017-01-22	1	-    	-   	-   
B000001927	INFUS NS 500 WIDA TUTUP PUTAR (BELI)	BTL 	BTL 		12500	12500	15000	15000	15000	15000	15000	15000	15000	23750	15000	15000	0	JB02	1	0	2017-01-23	1	-    	-   	-   
B000001928	Racikan phenobarbital (beli San-A)	BKS 	BKS 		1200	1200	1440	1440	1440	1440	1440	1440	1440	2280	1440	1440	0	JB01	1	0	2017-01-24	1	-    	-   	-   
B000001929	Viagra Tab	TAB 	TAB 		110126	110126	132151	132151	132151	132151	132151	132151	132151	209239	132151	132151	0	JB01	1	0	2017-01-26	1	-    	-   	-   
B000001930	CAMELOC SUPP	SUP 	SUP 		15000	15000	18000	18000	18000	18000	18000	18000	18000	28500	18000	18000	0	JB02	1	3	2017-01-26	1	-    	-   	-   
B000001931	PLESTER COKLAT	PCS 	PCS 		7500	7500	9000	9000	9000	9000	9000	9000	9000	14250	9000	9000	0	JB03	1	0	2017-01-27	1	-    	-   	-   
B000001932	Leukoplast 7,5 cm x 4,5 m (Beli)	PCS 	PCS 		50000	50000	60000	60000	60000	60000	60000	60000	60000	95000	60000	60000	0	JB03	1	0	2017-01-27	1	-    	-   	-   
B000001933	Desdin sirup 60 ml (beli Medika)	Fle 	Fle 		78000	78000	93600	93600	93600	93600	93600	93600	93600	148200	93600	93600	0	JB01	1	0	2017-01-27	1	-    	-   	-   
B000001934	TIRIZ TAB BELI K24	TAB 	TAB 		9504	9504	11405	11405	11405	11405	11405	11405	11405	18058	11405	11405	0	JB01	1	0	\N	1	-    	-   	-   
B000001935	KETOMED CREM BELI K24	SAL 	SAL 		31416	31416	37699	37699	37699	37699	37699	37699	37699	59690	37699	37699	0	JB02	1	0	\N	1	-    	-   	-   
B000001936	LAMESON INJEKSI	AMP5	AMP5		95700	95700	114840	114840	114840	114840	114840	114840	114840	181830	114840	114840	0	JB02	1	0	2018-09-01	1	-    	-   	-   
B000001937	INF MGS04 20%	BTL 	BTL 		6200	6200	7440	7440	7440	7440	7440	7440	7440	11780	7440	7440	0	JB02	1	0	\N	1	-    	-   	-   
B000001938	Lisinopril 10 mg	TAB 	TAB 		800	800	960	960	960	960	960	960	960	1520	960	960	0	JB01	1	0	2017-02-01	1	-    	-   	-   
B000001939	Pyrazinamid 	TAB 	TAB 		316	316	379	379	379	379	379	379	379	600	379	379	0	JB01	1	0	2017-02-01	1	-    	-   	-   
B000001940	Diltiazem 	TAB 	TAB 		200	200	240	240	240	240	240	240	240	380	240	240	0	JB01	1	0	2017-02-01	1	-    	-   	-   
B000001941	Clonidine 0,15mg	TAB 	TAB 		270	270	324	324	324	324	324	324	324	513	324	324	0	JB01	1	0	2017-02-01	1	-    	-   	-   
B000001942	Interbi Salep	TUB 	TUB 		28000	28000	33600	33600	33600	33600	33600	33600	33600	53200	33600	33600	0	JB02	1	0	2016-08-23	1	-    	-   	-   
B000001943	Atramat Polypropilene 2-0	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB03	1	0	\N	1	-    	-   	-   
B000001944	Atramat Polypropilene 4-0	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB03	1	0	\N	1	-    	-   	-   
B000001945	Atramat Polypropilene 5-0	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB03	1	0	\N	1	-    	-   	-   
B000001946	Premilene 6-0	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB03	1	0	\N	1	-    	-   	-   
B000001947	Safil 4.0	PCS 	PCS 		120000	120000	144000	144000	144000	144000	144000	144000	144000	228000	144000	144000	0	JB03	1	0	\N	1	-    	-   	-   
B000001948	Surgipro 5.0	PCS 	PCS 		610000	610000	732000	732000	732000	732000	732000	732000	732000	1159000	732000	732000	0	JB03	1	0	\N	1	-    	-   	-   
B000001949	Nylon 6.0	PCS 	PCS 		171000	171000	205200	205200	205200	205200	205200	205200	205200	324900	205200	205200	0	JB03	1	0	\N	1	-    	-   	-   
B000001950	Atramat Chromic 1	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB03	1	0	\N	1	-    	-   	-   
B000001951	Atrama PGA 0	PCS 	PCS 		129000	129000	154800	154800	154800	154800	154800	154800	154800	245100	154800	154800	0	JB03	1	0	\N	1	-    	-   	-   
B000001952	Dermafix 	PCS 	PCS 		20000	20000	24000	24000	24000	24000	24000	24000	24000	38000	24000	24000	0	JB03	1	0	\N	1	-    	-   	-   
B000001953	Kasa Gulung Bunda 40 yard	PCS 	PCS 		250000	250000	300000	300000	300000	300000	300000	300000	300000	475000	300000	300000	0	JB03	1	0	\N	1	-    	-   	-   
B000001954	Colostomy Bag	PCS 	PCS 		50000	50000	60000	60000	60000	60000	60000	60000	60000	95000	60000	60000	0	JB03	1	0	\N	1	-    	-   	-   
B000001955	Gypsona 3 inci	PCS 	PCS 		49000	49000	58800	58800	58800	58800	58800	58800	58800	93100	58800	58800	0	JB03	1	0	\N	1	-    	-   	-   
B000001956	Softband 3 inci	PCS 	PCS 		22000	22000	26400	26400	26400	26400	26400	26400	26400	41800	26400	26400	0	JB03	1	0	\N	1	-    	-   	-   
B000001957	Softband 4 inci	PCS 	PCS 		28500	28500	34200	34200	34200	34200	34200	34200	34200	54150	34200	34200	0	JB03	1	0	\N	1	-    	-   	-   
B000001958	Feeding tube / NGT no. 12	PCS 	PCS 		25000	25000	30000	30000	30000	30000	30000	30000	30000	47500	30000	30000	0	JB03	1	0	\N	1	-    	-   	-   
B000001959	Feeding tube / NGT no. 10	PCS 	PCS 		25000	25000	30000	30000	30000	30000	30000	30000	30000	47500	30000	30000	0	JB03	1	0	\N	1	-    	-   	-   
B000001960	Fucoidan (beli San-A)	TAB 	TAB 		12600	12600	15120	15120	15120	15120	15120	15120	15120	23940	15120	15120	0	JB01	1	0	2017-02-03	1	-    	-   	-   
B000001961	SUSU SGM LLM (BELI)	BOX 	BOX 		58000	58000	69600	69600	69600	69600	69600	69600	69600	110200	69600	69600	0	J007	1	0	2017-02-05	1	-    	-   	-   
B000001962	HERNIA MESH (DR ASNAL)	PAC 	PAC 		800000	800000	960000	960000	960000	960000	960000	960000	960000	1520000	960000	960000	0	JB03	1	0	2017-02-05	1	-    	-   	-   
B000001963	Terfacef (beli dimawar)	S38 	S38 		229600	229600	275520	275520	275520	275520	275520	275520	275520	436240	275520	275520	0	JB02	1	0	2017-02-10	1	-    	-   	-   
B000001964	SANMINO SIRUP 	BTL 	BTL 		54400	54400	65280	65280	65280	65280	65280	65280	65280	103360	65280	65280	0	JB01	1	1	2016-05-29	1	-    	-   	-   
B000001965	TERFACEF INJ ( RAZA )	S38 	S38 		221300	221300	265560	265560	265560	265560	265560	265560	265560	420470	265560	265560	0	JB02	1	1	2016-05-29	1	-    	-   	-   
B000001966	LEVOFLOXACIN INFUS ( AVICIENA )	BTL 	BTL 		125111	125111	150133	150133	150133	150133	150133	150133	150133	237711	150133	150133	0	JB02	1	1	2016-05-29	1	-    	-   	-   
B000001967	MEROPENEM MAWAR	S38 	S38 		135000	135000	162000	162000	162000	162000	162000	162000	162000	256500	162000	162000	0	JB02	1	0	2017-02-12	1	-    	-   	-   
B000001968	PROSOGAN INJ BELI (NIRWANA)	S38 	S38 		153600	153600	184320	184320	184320	184320	184320	184320	184320	291840	184320	184320	0	JB02	1	0	2018-05-01	1	-    	-   	-   
B000001969	PUMPISEL INJ (BELI) NIRWANA	S38 	S38 		195000	195000	234000	234000	234000	234000	234000	234000	234000	370500	234000	234000	0	JB02	1	0	2018-05-01	1	-    	-   	-   
B000001970	pampers dewasa M	LBR 	LBR 		9425	9425	11310	11310	11310	11310	11310	11310	11310	17908	11310	11310	0	JB03	1	0	2017-12-03	1	-    	-   	-   
B000001971	hypafix 15cm x 5m	CM  	CM  		140236	140236	168283	168283	168283	168283	168283	168283	168283	266448	168283	168283	0	JB03	1	0	2016-12-03	1	-    	-   	-   
B000001972	oxygen nasal canula baby	PCS 	PCS 		21000	21000	25200	25200	25200	25200	25200	25200	25200	39900	25200	25200	0	JB03	1	0	\N	1	-    	-   	-   
B000001973	CELEMEK	LBR 	LBR 		8000	8000	9600	9600	9600	9600	9600	9600	9600	15200	9600	9600	0	JB03	1	0	2017-02-14	1	-    	-   	-   
B000001974	PROSOGAN INJ	VL  	VL  		146410	146410	175692	175692	175692	175692	175692	175692	175692	278179	175692	175692	0	JB02	1	0	2019-06-14	1	-    	-   	-   
B000001975	RL WIDA BELI	BTL 	BTL 		9300	9300	11160	11160	11160	11160	11160	11160	11160	17670	11160	11160	0	JB02	1	0	2017-02-14	1	-    	-   	-   
B000001976	KALNEX INJ BELI (NIRWANA)	AMP5	AMP5		17500	17500	21000	21000	21000	21000	21000	21000	21000	33250	21000	21000	0	JB02	1	0	2017-02-14	1	-    	-   	-   
B000001977	NUTRI BABY BELI	BOX 	BOX 		97500	97500	117000	117000	117000	117000	117000	117000	117000	185250	117000	117000	0	JB01	1	0	2017-02-14	1	-    	-   	-   
B000001978	Tranexid inj beli (lembayung)	AMP5	AMP5		19500	19500	23400	23400	23400	23400	23400	23400	23400	37050	23400	23400	0	JB02	1	0	2017-02-14	1	-    	-   	-   
B000001979	Infus RL Widatra (SAN"A)	BTL 	BTL 		8000	8000	9600	9600	9600	9600	9600	9600	9600	15200	9600	9600	0	JB02	1	0	2017-02-14	1	-    	-   	-   
B000001980	Infus RL Widatra (ALISAH) 	BTL 	BTL 		14500	14500	17400	17400	17400	17400	17400	17400	17400	27550	17400	17400	0	JB02	1	0	2017-02-14	1	-    	-   	-   
B000001981	PUMPISEL	S38 	S38 		196500	196500	235800	235800	235800	235800	235800	235800	235800	373350	235800	235800	0	JB02	1	0	2017-02-16	1	-    	-   	-   
B000001982	Aminosteril Infant	BTL 	BTL 		75900	75900	91080	91080	91080	91080	91080	91080	91080	144210	91080	91080	0	JB02	1	2	2018-07-21	1	-    	-   	-   
B000001983	VIP ALBUMIN SACHET BELI	BKS 	BKS 		63000	63000	75600	75600	75600	75600	75600	75600	75600	119700	75600	75600	0	JB01	1	0	2017-02-16	1	-    	-   	-   
B000001984	RACIKAN PHENOBARBITAL	BKS 	BKS 		10000	10000	12000	12000	12000	12000	12000	12000	12000	19000	12000	12000	0	JB01	1	0	2017-02-16	1	-    	-   	-   
B000001985	DEXANTA SYR KF SEKUMPUL	BTL 	BTL 		16873	16873	20248	20248	20248	20248	20248	20248	20248	32059	20248	20248	0	JB01	1	0	2017-02-16	1	-    	-   	-   
B000001986	TRICEFIN INJ MAWAR	AMP5	AMP5		256000	256000	307200	307200	307200	307200	307200	307200	307200	486400	307200	307200	0	JB02	1	0	2017-02-16	1	-    	-   	-   
B000001987	TERFACEF MAWAR	AMP5	AMP5		278000	278000	333600	333600	333600	333600	333600	333600	333600	528200	333600	333600	0	JB02	1	0	2017-02-16	1	-    	-   	-   
B000001988	DULCOLAX 10MG MAWAR	SUP 	SUP 		23250	23250	27900	27900	27900	27900	27900	27900	27900	44175	27900	27900	0	JB02	1	0	2017-02-16	1	-    	-   	-   
B000001989	TEMPRA 60 ML	BTL 	BTL 		38000	38000	45600	45600	45600	45600	45600	45600	45600	72200	45600	45600	0	JB01	1	0	2017-02-17	1	-    	-   	-   
B000001990	CANDERIN 8 (BELI KF)	TAB 	TAB 		8000	8000	9600	9600	9600	9600	9600	9600	9600	15200	9600	9600	0	JB01	1	0	2017-02-19	1	-    	-   	-   
B000001991	KALNEX 500 MAWAR	TAB 	TAB 		5000	5000	6000	6000	6000	6000	6000	6000	6000	9500	6000	6000	0	JB01	1	0	2017-02-19	1	-    	-   	-   
B000001992	SPORETIK KF SEKUMPUL	BTL 	BTL 		86000	86000	103200	103200	103200	103200	103200	103200	103200	163400	103200	103200	0	JB01	1	0	2017-02-20	1	-    	-   	-   
B000001993	ELKANA SYR (BELI) KF	BTL 	BTL 		24000	24000	28800	28800	28800	28800	28800	28800	28800	45600	28800	28800	0	JB01	1	0	\N	1	-    	-   	-   
B000001994	Kutoin 100 mg cap (Beli Mawar)	CAP 	CAP 		2800	2800	3360	3360	3360	3360	3360	3360	3360	5320	3360	3360	0	JB01	1	0	\N	1	-    	-   	-   
B000001995	VECTRIN K24	CAP 	CAP 		4200	4200	5040	5040	5040	5040	5040	5040	5040	7980	5040	5040	0	JB01	1	0	\N	1	-    	-   	-   
B000001996	TANTUM VERDE (BELI K24)	BTL 	BTL 		25000	25000	30000	30000	30000	30000	30000	30000	30000	47500	30000	30000	0	J008	1	0	2017-02-23	1	-    	-   	-   
B000001997	Progesic tab (K24)	TAB 	TAB 		550	550	660	660	660	660	660	660	660	1045	660	660	0	JB01	1	0	2017-02-16	1	-    	-   	-   
B000001998	Kasa gulung bunda 40yard (1/4)	PCS 	PCS 		65000	65000	78000	78000	78000	78000	78000	78000	78000	123500	78000	78000	0	JB03	1	0	2017-02-24	1	-    	-   	-   
B000001999	Eraphage 500mg	KAP 	KAP 		1430	1430	1716	1716	1716	1716	1716	1716	1716	2717	1716	1716	0	JB01	1	0	2018-06-30	1	-    	-   	-   
B000002000	Q 10 PLUS (BELI KF)	CAP 	CAP 		15500	15500	18600	18600	18600	18600	18600	18600	18600	29450	18600	18600	0	JB01	1	0	2017-02-26	1	-    	-   	-   
B000002001	ns 100 cc/ml	ML  	ML  		170	170	204	204	204	204	204	204	204	323	204	204	0	JB02	1	0	2017-02-26	1	-    	-   	-   
B000002002	PRANZA INJ MAWAR	S38 	S38 		195000	195000	234000	234000	234000	234000	234000	234000	234000	370500	234000	234000	0	JB02	1	0	2017-02-27	1	-    	-   	-   
B000002003	LAMINARIA ( BELI DI LEMBAYUNG )	SET 	SET 		200000	200000	240000	240000	240000	240000	240000	240000	240000	380000	240000	240000	0	JB03	1	1	2017-02-28	1	-    	-   	-   
B000002004	Johnson"s baby top to toe	BKS 	BKS 		17203	17203	20644	20644	20644	20644	20644	20644	20644	32686	20644	20644	0	JB05	1	0	2017-02-28	1	-    	-   	-   
B000002005	Laminaria uk M	PCS 	PCS 		183000	183000	219600	219600	219600	219600	219600	219600	219600	347700	219600	219600	0	JB04	1	1	2017-02-28	1	-    	-   	-   
B000002006	PEMBALUT BELI	BKS 	BKS 		8000	8000	9600	9600	9600	9600	9600	9600	9600	15200	9600	9600	0	JB03	1	0	2017-02-28	1	-    	-   	-   
B000002007	THROMBOPOP K24	GEL 	GEL 		50000	50000	60000	60000	60000	60000	60000	60000	60000	95000	60000	60000	0	J008	1	0	2017-02-28	1	-    	-   	-   
B000002008	RACIKAN DR DYAH	BKS 	BKS 		42500	42500	51000	51000	51000	51000	51000	51000	51000	80750	51000	51000	0	JB01	1	0	2017-03-01	1	-    	-   	-   
B000002009	MEBO  BELI KF MTP	CRM 	CRM 		100952	100952	121142	121142	121142	121142	121142	121142	121142	191809	121142	121142	0	J008	1	1	2017-03-03	1	-    	-   	-   
B000002010	Sanmol Infus (Beli MutBun)	Fle 	Fle 		66000	66000	79200	79200	79200	79200	79200	79200	79200	125400	79200	79200	0	JB02	1	0	2017-03-03	1	-    	-   	-   
B000002011	Mebo salep (beli di KF BJB)	CRM 	CRM 		100952	100952	121142	121142	121142	121142	121142	121142	121142	191809	121142	121142	0	JB02	1	0	\N	1	-    	-   	-   
B000002012	LATROPIL SYR BELI D KF	BTL 	BTL 		50000	50000	60000	60000	60000	60000	60000	60000	60000	95000	60000	60000	0	JB01	1	0	2017-03-04	1	-    	-   	-   
B000002013	Ataroc syrup (Beli K-24)	Fle 	Fle 		48000	48000	57600	57600	57600	57600	57600	57600	57600	91200	57600	57600	0	JB01	1	0	2018-11-30	1	-    	-   	-   
B000002014	Asthin Force 4mg (BELI)	CAP 	CAP 		11500	11500	13800	13800	13800	13800	13800	13800	13800	21850	13800	13800	0	JB01	1	0	\N	1	-    	-   	-   
B000002015	NEFROFER INJ (BELI ULIN)	AMP5	AMP5		53000	53000	63600	63600	63600	63600	63600	63600	63600	100700	63600	63600	0	JB02	1	0	2018-05-31	1	-    	-   	-   
B000002016	enfamil A+ Gentle Care 900g 	BOX 	BOX 		345000	345000	414000	414000	414000	414000	414000	414000	414000	655500	414000	414000	0	JB01	1	0	2018-05-31	1	-    	-   	-   
B000002017	PROGESIC,TIRIZ	TAB 	TAB 		8900	8900	10680	10680	10680	10680	10680	10680	10680	16910	10680	10680	0	JB01	1	0	2017-03-10	1	-    	-   	-   
B000002018	SARI KURMA	BTL 	BTL 		20000	20000	24000	24000	24000	24000	24000	24000	24000	38000	24000	24000	0	JB01	1	1	2017-03-10	1	-    	-   	-   
B000002019	OMEGA SQUA	BTL 	BTL 		140000	140000	168000	168000	168000	168000	168000	168000	168000	266000	168000	168000	0	JB01	1	1	2017-03-10	1	-    	-   	-   
B000002020	nebacetin ointment 	TUB 	TUB 		18700	18700	22440	22440	22440	22440	22440	22440	22440	35530	22440	22440	0	J008	1	0	2019-06-30	1	-    	-   	-   
B000002021	Latipress 2,5ml	BTL 	BTL 		165000	165000	198000	198000	198000	198000	198000	198000	198000	313500	198000	198000	0	J008	1	0	2017-03-15	1	-    	-   	-   
B000002022	glauseta tab	TAB 	TAB 		4625	4625	5550	5550	5550	5550	5550	5550	5550	8788	5550	5550	0	JB01	1	0	2017-03-15	1	-    	-   	-   
B000002023	DUROLANE INJEKSI	BOX 	BOX 		2365000	2365000	2838000	2838000	2838000	2838000	2838000	2838000	2838000	4493500	2838000	2838000	0	JB02	1	0	2019-01-31	1	-    	-   	-   
B000002024	FLAMICORT INJ MAWAR	S38 	S38 		138000	138000	165600	165600	165600	165600	165600	165600	165600	262200	165600	165600	0	JB02	1	0	2017-03-15	1	-    	-   	-   
B000002025	Mediflex cream (beli KF)	CRM 	CRM 		80000	80000	96000	96000	96000	96000	96000	96000	96000	152000	96000	96000	0	J008	1	0	2017-03-17	1	-    	-   	-   
B000002026	ADONA TAB (BELI NIRWANA)	TAB 	TAB 		3661	3661	4393	4393	4393	4393	4393	4393	4393	6956	4393	4393	0	JB01	1	0	2017-03-19	1	-    	-   	-   
B000002027	PHYSIOGEL LOTION KF BJB	BTL 	BTL 		198000	198000	237600	237600	237600	237600	237600	237600	237600	376200	237600	237600	0	J008	1	0	2017-03-19	1	-    	-   	-   
B000002028	KETOMED CREAM KF BJB	CRM 	CRM 		35000	35000	42000	42000	42000	42000	42000	42000	42000	66500	42000	42000	0	J008	1	0	2017-03-19	1	-    	-   	-   
B000002029	TRICHODAZOLE (BELI)	TAB 	TAB 		2200	2200	2640	2640	2640	2640	2640	2640	2640	4180	2640	2640	0	JB01	1	0	\N	1	-    	-   	-   
B000002030	skinfit strip 	CAP 	CAP 		2310	2310	2772	2772	2772	2772	2772	2772	2772	4389	2772	2772	0	JB01	1	0	2018-10-01	1	-    	-   	-   
B000002031	Nexium injeksi	VL  	VL  		191333	191333	229600	229600	229600	229600	229600	229600	229600	363533	229600	229600	0	JB02	1	5	2016-05-14	1	-    	-   	-   
B000002033	ALBOTHYL 10 BELI	BTL 	BTL 		36000	36000	43200	43200	43200	43200	43200	43200	43200	68400	43200	43200	0	J008	1	0	\N	1	-    	-   	-   
B000002034	RATIVOL INJ BELI NIR	AMP5	AMP5		49000	49000	58800	58800	58800	58800	58800	58800	58800	93100	58800	58800	0	JB02	1	0	2017-03-24	1	-    	-   	-   
B000002036	amoxan	KAP 	KAP 		4000	4000	4800	4800	4800	4800	4800	4800	4800	7600	4800	4800	200	JB01	1	2000	2017-09-14	1	I0003	-   	-   
B000002037	Uji COba	BTL 	BTL 		0	0	0	0	0	0	0	0	0	0	0	0	0	JB02	1	0	2017-12-26	1	I0001	K02 	-   
B000008002	Karbama	-   	-   		120000	120000	144000	144000	144000	144000	144000	144000	144000	228000	144000	144000	0	-   	1	0	2018-07-26	1	-    	-   	-   
B000008003	Penitoin	-   	-   		140000	140000	168000	168000	168000	168000	168000	168000	168000	266000	168000	168000	0	-   	1	0	2018-07-26	1	-    	-   	-   
B000008004	Riseperidon	-   	-   		200000	200000	240000	240000	240000	240000	240000	240000	240000	380000	240000	240000	0	-   	1	0	2018-07-26	1	-    	-   	-   
B000008005	RACIKAN VITAMIN	CAP 	CAP 		5000	5000	6000	6000	6000	6000	6000	6000	6000	9500	6000	6000	100	J009	1	0	2018-08-01	1	-    	K01 	G04 
B000008006	Betametason	-   	-   		100000	100000	120000	120000	120000	120000	120000	120000	120000	190000	120000	120000	0	-   	1	200	2018-11-13	1	-    	-   	-   
B000008007	Vaselin Salicyl	-   	-   		10000	10000	12000	12000	12000	12000	12000	12000	12000	19000	12000	12000	0	-   	1	10	2018-11-13	1	-    	-   	-   
B000008008	NATRIUM DICLOFENAC	TAB 	TAB 		12000	12000	14400	14400	14400	14400	14400	14400	14400	22800	14400	14400	0	J018	1	50	2019-02-27	1	I0005	K04 	G03 
B000008009	ALUPURINOL UJICOBA	TAB 	TAB 		550	550	660	660	660	660	660	660	660	1045	660	660	0	-   	1	0	2019-04-26	1	I0001	-   	-   
B000008010	Amiodaron 75 mg	-   	-   		10000	10000	12000	12000	12000	12000	12000	12000	12000	19000	12000	12000	0	-   	1	0	2019-07-01	1	-    	-   	-   
B000008011	Ranitidine	AMP5	AMP5		12000	12000	14400	14400	14400	14400	14400	14400	14400	22800	14400	14400	0	-   	1	0	2019-07-01	1	-    	-   	-   
B000008012	ATS  1500 IU	-   	-   		20000	20000	24000	24000	24000	24000	24000	24000	24000	38000	24000	24000	0	-   	1	0	2019-07-01	1	-    	-   	-   
B000008013	Certriaxon	-   	-   		13000	13000	15600	15600	15600	15600	15600	15600	15600	24700	15600	15600	0	-   	1	0	2021-02-28	1	-    	-   	-   
B000008014	marck	BTL 	BTL 		5000	5000	6000	6000	6000	6000	6000	6000	6000	9500	6000	6000	5	J008	1	0	2019-07-02	1	I0001	K05 	G04 
B000008015	antasida sirup	BTL 	BTL 		0	0	0	0	0	0	0	0	0	0	0	0	0	JB01	1	0	2019-11-13	1	-    	K04 	G04 
B000008016	folic acid tablet	TAB 	TAB 		0	0	0	0	0	0	0	0	0	0	0	0	0	JB01	1	1	2019-11-13	1	-    	K04 	G04 
B000008017	viagra	KAP 	KAP 		3000	3000	3600	3600	3600	3600	3600	3600	3600	5700	3600	3600	0	J018	1	0	2019-11-13	1	I0003	K05 	G03 
B000008018	OBAT COBA	-   	-   		1000	1100	1320	1320	1320	1320	1320	1320	1320	2090	1320	1320	10	J008	1	500	2020-07-08	1	-    	-   	-   
B000008019	TES LITER	GLN 	S35 		10000	10000	12000	12000	12000	12000	12000	12000	12000	19000	12000	12000	0	-   	20	0	2021-09-08	1	-    	-   	-   
B000008020	TES BARANG BARU	DRP 	DRP 		33000	33000	39600	39600	39600	39600	39600	39600	39600	62700	39600	39600	0	-   	0	0	2021-11-11	1	I0001	-   	-   
B000008021	OBAT TES PPN	TAB 	TAB 		60000	100000	120000	120000	120000	120000	120000	120000	120000	190000	120000	120000	0	-   	1	1	2022-04-09	1	I0006	-   	-   
B00001000	Amoxsan 500 mg 	CAP 	CAP 		4884	4884	5861	5861	5861	5861	5861	5861	5861	9280	5861	5861	100	JB01	1	200	\N	1	I0003	-   	-   
C000000001	Set Widal Fotres 4x5 ml 	SET 	SET 		800000	800000	960000	960000	960000	960000	960000	960000	960000	1520000	960000	960000	0	-   	1	0	\N	1	-    	-   	-   
C000000002	Uric Acid 50 ml	GLN 	GLN 		945000	945000	1134000	1134000	1134000	1134000	1134000	1134000	1134000	1795500	1134000	1134000	0	JB03	1	0	\N	1	-    	-   	-   
C000000003	Qualicheck Norm 1 x 5 ml	GLN 	GLN 		859000	859000	1030800	1030800	1030800	1030800	1030800	1030800	1030800	1632100	1030800	1030800	0	JB03	1	0	\N	1	-    	-   	-   
C000000004	Set Gol Dar Anti A & B 2x10 ml Fotress	SET 	SET 		330000	330000	396000	396000	396000	396000	396000	396000	396000	627000	396000	396000	0	-   	1	0	\N	1	-    	-   	-   
C000000005	Tourniquet EZ- Tight	PCS 	PCS 		40000	40000	48000	48000	48000	48000	48000	48000	48000	76000	48000	48000	0	JB04	1	0	\N	1	-    	-   	-   
C000000006	Nylon 10/0 FSSB	PCS 	PCS 		170834	170834	205001	205001	205001	205001	205001	205001	205001	324585	205001	205001	0	JB04	1	0	\N	1	-    	-   	-   
C000000007	Iol PMMA Power 20,5	PCS 	PCS 		195834	195834	235001	235001	235001	235001	235001	235001	235001	372085	235001	235001	0	JB04	1	0	\N	1	-    	-   	-   
VAK001	Vaksin Hepatitis B Recombinant 20 ug/1 mL Suspensi Injeksi (Umum)	-   	-   	-	1	1	1	1	1	1	1	1	1	1	1	1	0	-   	1	1	2023-01-23	1	-    	-   	-   
\.


--
-- TOC entry 5631 (class 0 OID 16868)
-- Dependencies: 237
-- Data for Name: departemen; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.departemen (id, nama, created_at, updated_at) FROM stdin;
1000	Testing	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
\.


--
-- TOC entry 5660 (class 0 OID 17433)
-- Dependencies: 266
-- Data for Name: detail_penerimaan_barang_medis; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.detail_penerimaan_barang_medis (id_penerimaan, id_barang_medis, id_satuan, ubah_master, jumlah, h_pesan, subtotal_per_item, diskon_persen, diskon_jumlah, total_per_item, jumlah_diterima, kadaluwarsa, no_batch) FROM stdin;
\.


--
-- TOC entry 5688 (class 0 OID 50717)
-- Dependencies: 294
-- Data for Name: diagnosa_pasien; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.diagnosa_pasien (no_rawat, kd_penyakit, status, prioritas, status_penyakit) FROM stdin;
\.


--
-- TOC entry 5662 (class 0 OID 17754)
-- Dependencies: 268
-- Data for Name: dokter; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.dokter (kode_dokter, nama_dokter, jenis_kelamin, alamat_tinggal, no_telp, spesialis, izin_praktik) FROM stdin;
D001	Dr. Ahmad	L	Keputih	081234565789	Jantung	123456789
D002	Dr. Budi	L	Darmo	08123456788	Anak	123456788
D003	Dr. Clara	P	Rungkut	08123456787	Kandungan	123456787
D004	Dr. Daniel	L	Tegalsari	08123456786	Saraf	123456786
D005	Dr. Elsa	P	Sukolilo	08123456785	Gigi	123456785
D006	Dr. Farhan	L	Ketintang	08123456784	Mata	123456784
D007	Dr. Gina	P	Nginden	08123456783	THT	123456783
D008	Dr. Hadi	L	Mulyorejo	08123456782	Kulit	123456782
D009	Dr. Intan	P	Wiyung	08123456781	Paru	123456781
D010	Dr. Johan	L	Gubeng	08123456780	Bedah	123456780
\.


--
-- TOC entry 5671 (class 0 OID 34195)
-- Dependencies: 277
-- Data for Name: dokter_jaga; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.dokter_jaga (kode_dokter, nama_dokter, hari_kerja, jam_mulai, jam_selesai, poliklinik, status) FROM stdin;
D001	Dr. Andi Wijaya	2025-04-15	08:00:00	14:00:00	Poli Umum	
D003	Dr. Budi Santoso	2025-04-16	10:00:00	16:00:00	Poli Gigi	
D004	Dr. Daniel	Senin	02:34:00	14:34:00	Jantung	
D005	Dr. Fahmi Rizal	2025-04-17	02:37:00	14:37:00	Poli Saraf	
D006	Dr. Hadi Permana	Senin	08:00:00	14:00:00	Poli Umum	
D007	Dr. Rina Lestari	Selasa	09:00:00	15:00:00	Poli Gigi	
D008	Dr. Joko Prabowo	Rabu	07:30:00	13:30:00	Poli Anak	
D009	Dr. Siti Aminah	Kamis	10:00:00	16:00:00	Poli Kandungan	
D010	Dr. Bambang Yuwono	Jumat	08:30:00	14:30:00	Poli Dalam	
D011	Dr. Maya Kusuma	Senin	07:45:00	13:45:00	Poli Saraf	
D012	Dr. Agus Riyanto	Selasa	08:15:00	14:15:00	Poli THT	
D013	Dr. Nina Fadhilah	Rabu	09:30:00	15:30:00	Poli Kulit	
D014	Dr. Wahyu Adi	Kamis	10:15:00	16:15:00	Poli Jantung	
D015	Dr. Lina Hartati	Jumat	07:00:00	13:00:00	Poli Gigi	
D016	Dr. Arif Setiawan	Senin	08:00:00	14:00:00	Poli Umum	aktif
D017	Dr. Bella Pratiwi	Senin	14:00:00	20:00:00	Poli Gigi	aktif
D018	Dr. Citra Ramadhan	Senin	20:00:00	08:00:00	Poli Anak	aktif
D019	Dr. Dimas Rasyid	Selasa	08:00:00	14:00:00	Poli Umum	aktif
D020	Dr. Erna Wahyuni	Selasa	14:00:00	20:00:00	Poli Kandungan	aktif
D021	Dr. Farhan Maulana	Selasa	20:00:00	08:00:00	Poli THT	aktif
D022	Dr. Gina Yuliana	Rabu	08:00:00	14:00:00	Poli Umum	aktif
D023	Dr. Hendra Saputra	Rabu	14:00:00	20:00:00	Poli Kulit	aktif
D024	Dr. Intan Saraswati	Rabu	20:00:00	08:00:00	Poli Gigi	aktif
D025	Dr. Joko Santosa	Kamis	08:00:00	14:00:00	Poli Umum	aktif
D026	Dr. Karina Dewi	Kamis	14:00:00	20:00:00	Poli Saraf	aktif
D027	Dr. Lukman Fadillah	Kamis	20:00:00	08:00:00	Poli Dalam	aktif
D028	Dr. Maya Rahmawati	Jumat	08:00:00	14:00:00	Poli Umum	aktif
D029	Dr. Niko Pradipta	Jumat	14:00:00	20:00:00	Poli THT	aktif
D030	Dr. Olivia Sari	Jumat	20:00:00	08:00:00	Poli Anak	aktif
D031	Dr. Putra Wijaya	Sabtu	08:00:00	14:00:00	Poli Umum	aktif
D032	Dr. Qory Nasution	Sabtu	14:00:00	20:00:00	Poli Gigi	aktif
D033	Dr. Rudi Hartanto	Sabtu	20:00:00	08:00:00	Poli Jantung	aktif
D034	Dr. Sinta Melati	Minggu	08:00:00	14:00:00	Poli Umum	aktif
D035	Dr. Taufik Hidayat	Minggu	14:00:00	20:00:00	Poli Dalam	aktif
D036	Dr. Umi Zakiyah	Minggu	20:00:00	08:00:00	Poli Saraf	aktif
\.


--
-- TOC entry 5647 (class 0 OID 17108)
-- Dependencies: 253
-- Data for Name: foto_pegawai; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.foto_pegawai (id_pegawai, foto, created_at, updated_at, deleted_at, updater) FROM stdin;
933568d5-982a-43c3-a4aa-3177bab10f07	/img/default.png	2025-05-19 20:20:06.601437+07	2025-05-19 20:20:06.601437+07	\N	\N
b9b1ad6c-c41b-446a-b00e-f56684663c56	/img/default.png	2025-05-19 20:20:06.601437+07	2025-05-19 20:20:06.601437+07	\N	\N
bd0b4833-510c-4c29-a3a4-e08e9a0a5955	/img/default.png	2025-05-15 20:14:12.663592+07	2025-05-15 20:14:12.663592+07	\N	\N
\.


--
-- TOC entry 5640 (class 0 OID 16935)
-- Dependencies: 246
-- Data for Name: golongan_barang_medis; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.golongan_barang_medis (id, nama, created_at, updated_at) FROM stdin;
1000	Analgesik	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
2000	Antibiotik	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
3000	Antijamur	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
4000	Antivirus	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
5000	Antasida	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
\.


--
-- TOC entry 5655 (class 0 OID 17341)
-- Dependencies: 261
-- Data for Name: gudang_barang; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.gudang_barang (id, id_barang_medis, id_ruangan, stok, no_batch, no_faktur) FROM stdin;
de82172e-80d6-4a06-95a0-cfce4f66d71c	B000000980	1000	1000	BATCH001	FAKTUR001
b11dcad6-d073-498e-9af9-11baabe41ab8	B000001758	1000	1000	BATCH001	FAKTUR001
b769fee0-ab77-45d4-bd24-3844094e7f26	B000001068	1000	1000	BATCH001	FAKTUR001
fe78ee84-1aca-4fe1-86db-8fab77813fa2	B000000997	1000	1000	BATCH001	FAKTUR001
c579834d-46b6-4832-bd07-5d6bfd377a1e	B000000322	1000	1000	BATCH001	FAKTUR001
bb09ce78-22d9-445d-880b-3d0b2e0d8cf0	B000000147	1000	1000	BATCH001	FAKTUR001
3598494b-de06-4b17-8324-b18baa7fb549	B000001535	1000	1000	BATCH001	FAKTUR001
321756a0-6de4-4d6c-a4ba-ae22f63a88c4	B000002028	1000	1000	BATCH001	FAKTUR001
1a47a897-22b6-46ff-a6ea-1200147971f7	B000001987	1000	1000	BATCH001	FAKTUR001
4779f181-d5a1-4ba5-a57e-a022ea75da69	A000000073	1000	1000	BATCH001	FAKTUR001
d31d8446-99b7-473d-a7d3-d65e4a35d1c2	B000000424	1000	1000	BATCH001	FAKTUR001
f9f5b847-a519-49d2-9dfd-6825eeaed132	B000002014	1000	1000	BATCH001	FAKTUR001
573cc0b8-0a17-4760-986c-19be5f7bcd8b	B000000735	1000	1000	BATCH001	FAKTUR001
8dda8bcf-1b86-4ff5-bff1-0422474f7216	B000000629	1000	1000	BATCH001	FAKTUR001
ea9f7cee-bc66-4dce-b064-d38046816dfc	B000001859	1000	1000	BATCH001	FAKTUR001
e4726c7b-0a61-4080-bbf2-311ad1173f80	B000001006	1000	1000	BATCH001	FAKTUR001
ef4aa7a3-1cd6-4e0a-9bf1-1f3b29e15a75	B000001091	1000	1000	BATCH001	FAKTUR001
7d4b9c56-af55-4ece-9ce3-2fdf317f0831	B000001764	1000	1000	BATCH001	FAKTUR001
169fe642-9ff5-4ca2-a57b-a79adf4063e8	B000001841	1000	1000	BATCH001	FAKTUR001
2513179f-1e29-4646-be42-f4d4e014d1b2	B000000653	1000	1000	BATCH001	FAKTUR001
ebb37678-9fed-4c54-9371-77a1849f6307	B000000315	1000	1000	BATCH001	FAKTUR001
6f108021-a69f-46b8-93a0-05fd7ba4505a	B000001792	1000	1000	BATCH001	FAKTUR001
996581b0-5bc7-430a-ba0e-75be6ee96fea	B000000604	1000	1000	BATCH001	FAKTUR001
62df33c2-5f7d-47c6-8f57-ddd5f28f0a6c	B000001735	1000	1000	BATCH001	FAKTUR001
b135b4e5-39d9-4655-a642-22369a9b03c2	B000000357	1000	1000	BATCH001	FAKTUR001
40ebadfd-6c3d-4dd0-ae3f-2c7ef09f952b	B000001730	1000	1000	BATCH001	FAKTUR001
3e98f125-a46f-423e-9431-e3dd3830a7cf	B000001472	1000	1000	BATCH001	FAKTUR001
e2b8bb8a-53cc-4442-a811-2388f7d9a52e	B000001293	1000	1000	BATCH001	FAKTUR001
e0ff231b-322f-4c9e-ae89-3cce5a1baea8	A000000056	1000	1000	BATCH001	FAKTUR001
1acedca2-c283-429e-9a41-2e7c706b0fa3	B000000261	1000	1000	BATCH001	FAKTUR001
e1ea0981-9c6a-4ce5-8b88-f676f1e76871	B000001554	1000	1000	BATCH001	FAKTUR001
6e62e421-a68c-4f6d-9269-d29fb3d9e189	B000000589	1000	1000	BATCH001	FAKTUR001
baf0d4d4-5bc5-4ee5-9e36-2cd280ef1246	B000000230	1000	1000	BATCH001	FAKTUR001
7772162a-5fc2-48c3-b4a1-184d24848571	B000001455	1000	1000	BATCH001	FAKTUR001
98ce3a7b-f780-41c8-b97d-8b90b08a92b8	B000001880	1000	1000	BATCH001	FAKTUR001
6a00251b-678e-4bf9-bd09-3fe7aa350468	A000000788	1000	1000	BATCH001	FAKTUR001
b572958d-d087-4b58-8818-9100aef2804d	B000000909	1000	1000	BATCH001	FAKTUR001
e21cc65e-8521-4ee0-a3f5-6a70ff9c84f7	B000000145	1000	1000	BATCH001	FAKTUR001
97cea792-fb5c-4252-941f-11a3b0da3982	B000000811	1000	1000	BATCH001	FAKTUR001
78ed53a8-f87d-42da-ba38-dd3c587bb403	B000001012	1000	1000	BATCH001	FAKTUR001
cda34083-1dd3-451b-8304-1a0e08a5e316	A000000050	1000	1000	BATCH001	FAKTUR001
672e69f4-5ed0-49a8-9ed2-5f3c7e6ae8e2	B000001228	1000	1000	BATCH001	FAKTUR001
66829ffd-271b-4c6d-b8ae-69b87752e5ad	B000001460	1000	1000	BATCH001	FAKTUR001
0fc9600a-4dd1-4c4b-9f51-6a82fe56c684	B000000669	1000	1000	BATCH001	FAKTUR001
3f40b1d9-2970-4707-9238-e530be0bb915	B000001518	1000	1000	BATCH001	FAKTUR001
7f03de46-d1dc-489c-88c9-c32c098dab3d	A000000115	1000	1000	BATCH001	FAKTUR001
6453181c-2a66-4463-9a8d-172ca010bc63	B000000283	1000	1000	BATCH001	FAKTUR001
a241f6c8-cd29-4895-8a9d-9c8ac6664342	B000001728	1000	1000	BATCH001	FAKTUR001
7766c2a4-6103-49ad-a606-388e4380b0df	B000001210	1000	1000	BATCH001	FAKTUR001
12f3a880-35be-43b4-b07a-9ae6af28daf3	B000001984	1000	1000	BATCH001	FAKTUR001
c9aa34a3-264a-4442-8ce2-ee7783ef813c	B000000971	1000	1000	BATCH001	FAKTUR001
fec07622-f5fb-4635-89db-f2c7987ca0d9	B000001241	1000	1000	BATCH001	FAKTUR001
ad13c9b8-30a7-4643-881d-25d223ff6c2b	B000001235	1000	1000	BATCH001	FAKTUR001
5bf9270b-8c16-4948-9695-d2abc334e1df	B000001419	1000	1000	BATCH001	FAKTUR001
f1514de6-3f97-4f15-a918-828a1fa168a4	B000000369	1000	1000	BATCH001	FAKTUR001
3d750b52-d0cf-4476-a476-3f16db0073a2	B000001335	1000	1000	BATCH001	FAKTUR001
1ae429ce-2492-4f53-bd77-2ad1a04aee07	B000001743	1000	1000	BATCH001	FAKTUR001
54c3d991-da02-4a9c-8d2b-3cf7be8a698d	B000000922	1000	1000	BATCH001	FAKTUR001
76c5dffd-293c-43a4-89d7-1290fc091ff9	B000000727	1000	1000	BATCH001	FAKTUR001
93cb462e-cdb3-4eb4-bece-fe5e538999f0	B000001215	1000	1000	BATCH001	FAKTUR001
14033f71-7968-4be6-964b-bd3b14ba403d	B000000943	1000	1000	BATCH001	FAKTUR001
54a04276-209a-49d0-bf4f-0425a11bb13f	B000000607	1000	1000	BATCH001	FAKTUR001
40c76a33-3b7b-4e0a-8f94-10665648f43c	B000001403	1000	1000	BATCH001	FAKTUR001
b2193c9d-b808-4ef7-98a9-834eb24d8d6a	B000000625	1000	1000	BATCH001	FAKTUR001
7d85e1da-874b-4ae7-9b72-8353badb0f4f	B000001685	1000	1000	BATCH001	FAKTUR001
61c7bf38-2af6-4574-9069-a9714ea90a59	B000000122	1000	1000	BATCH001	FAKTUR001
8f949ae4-6260-40d7-87ce-f8bcba11a93f	B000000331	1000	1000	BATCH001	FAKTUR001
e4576335-3cd7-423d-a0da-78e677bcf4c8	B000001192	1000	1000	BATCH001	FAKTUR001
23ae3adc-0570-48b7-b665-cd915e264686	B000000312	1000	1000	BATCH001	FAKTUR001
ebe0e668-681c-4667-8a1f-45e2c15e0805	B000001329	1000	1000	BATCH001	FAKTUR001
fe82c2b5-ce95-45fa-ae83-8b6d030f1593	B000001966	1000	1000	BATCH001	FAKTUR001
1664dbf9-aa37-4c5c-ab37-23bfb294fa92	A000000802	1000	1000	BATCH001	FAKTUR001
830c3b04-ec5d-42bc-9a40-fb25bf41a20c	B000000870	1000	1000	BATCH001	FAKTUR001
ccf64402-b486-443a-b3dc-2bfcaae1726c	B000001839	1000	1000	BATCH001	FAKTUR001
40b3d133-b928-4e60-a1de-f7c731c8b4cb	B000000645	1000	1000	BATCH001	FAKTUR001
c16bb18c-459a-4752-b771-29a8575d0136	B000000677	1000	1000	BATCH001	FAKTUR001
5139bfbb-7de0-495e-8491-4653dea49e3f	B000001327	1000	1000	BATCH001	FAKTUR001
ca225e71-3e8e-4121-bddd-bc02f652e599	B000000378	1000	1000	BATCH001	FAKTUR001
28bd6111-9dff-4bfe-8b9b-a4ae70d31af5	A000000046	1000	1000	BATCH001	FAKTUR001
64f8469c-ac52-4860-aab1-5951e85b59b1	B000001286	1000	1000	BATCH001	FAKTUR001
cee2980f-3dd2-4ee2-9b14-d1e42511676f	A000000089	1000	1000	BATCH001	FAKTUR001
7e4c1bf9-61cd-4400-b358-d5d086020c6f	B000001992	1000	1000	BATCH001	FAKTUR001
81b7472b-0be1-4955-a76b-34f01a1c405a	B000000327	1000	1000	BATCH001	FAKTUR001
64334f10-1393-4792-96f8-8dbaeb2f2032	B000001827	1000	1000	BATCH001	FAKTUR001
a39c595b-2915-408b-b5e4-a5855b4227ee	B000002003	1000	1000	BATCH001	FAKTUR001
d3ff5eb7-d32b-48a3-a228-fbd9bb669c80	B000000594	1000	1000	BATCH001	FAKTUR001
ed39eaf9-0b2f-4bee-94b1-3e1abf0c38e1	B000000467	1000	1000	BATCH001	FAKTUR001
2a631eca-4724-4b2e-85bc-1179b4283a38	B000001041	1000	1000	BATCH001	FAKTUR001
f18b5ef3-fd14-435c-b3c5-c66f3f7b20b2	B000001397	1000	1000	BATCH001	FAKTUR001
03faa153-ef3c-4c22-b05f-b0ae6d3942e3	B000008004	1000	1000	BATCH001	FAKTUR001
d726a5fd-c403-46e3-a274-bd9536758c01	B000001353	1000	1000	BATCH001	FAKTUR001
4a4315fc-d052-49bf-8f05-4c5558fc2802	B000001709	1000	1000	BATCH001	FAKTUR001
27562a3d-a5b1-4b63-be70-36b8592f52db	B000001028	1000	1000	BATCH001	FAKTUR001
7f5dc941-f21c-4839-b05f-dbb7165f10b5	B000000098	1000	1000	BATCH001	FAKTUR001
972d93b7-ffe5-46b0-8151-dba94f100af1	B000001723	1000	1000	BATCH001	FAKTUR001
e1cc953d-198f-446f-a54d-6f04a32bfd4c	B000001787	1000	1000	BATCH001	FAKTUR001
b773612c-2935-4606-971e-c6f58b294797	B000001795	1000	1000	BATCH001	FAKTUR001
ac7806ee-117e-4b08-a8e3-687dd0c3b8fc	B000000746	1000	1000	BATCH001	FAKTUR001
99a23831-bf8d-4fc4-8606-dda9efb13b41	B000001218	1000	1000	BATCH001	FAKTUR001
9f8ea6a8-b03a-4b21-8fa0-e5baddbe3e14	B000001722	1000	1000	BATCH001	FAKTUR001
b6b3104c-d0fa-4640-ab33-78ac3b5d15c2	B000000774	1000	1000	BATCH001	FAKTUR001
2de667ec-b647-4a42-966f-7f6d6abbb9a2	B000001604	1000	1000	BATCH001	FAKTUR001
d2405fd8-20e6-440d-984f-1e859110ced5	B000001426	1000	1000	BATCH001	FAKTUR001
07eff713-a371-4319-84c8-30abf79f68d3	B000001492	1000	1000	BATCH001	FAKTUR001
0cf053f1-b7af-477a-8791-3d5b1fc2713e	B000001661	1000	1000	BATCH001	FAKTUR001
5c467c70-92bb-45a9-88c0-224341fd8e25	B000001098	1000	1000	BATCH001	FAKTUR001
9fde5525-fda6-4dc4-84a2-d0500a0c4c3a	B000000415	1000	1000	BATCH001	FAKTUR001
d217a9fb-519e-4948-ada4-4dab75f3e21c	B000000846	1000	1000	BATCH001	FAKTUR001
d96518d1-46bb-4383-b2a7-d658685bfde6	B000001471	1000	1000	BATCH001	FAKTUR001
bc3aa883-7d4f-4095-b132-4448f24b3bcd	B000000094	1000	1000	BATCH001	FAKTUR001
ea297f74-e826-4c8f-9659-51e4fcdfe4ba	B000001026	1000	1000	BATCH001	FAKTUR001
7f8ac2ec-72ba-4fa3-8c0d-a20c43e9a07a	B000001444	1000	1000	BATCH001	FAKTUR001
d8385908-c198-448d-af60-f4a8449fc6da	B000001134	1000	1000	BATCH001	FAKTUR001
41ebf75d-0318-4e7e-8e53-edd137e8e82c	A000000028	1000	1000	BATCH001	FAKTUR001
457eee07-e06d-4b93-b0e1-26f204dddd98	B000000458	1000	1000	BATCH001	FAKTUR001
516b65b6-5ecd-4584-a8d4-bc24c7fc2122	A000000122	1000	1000	BATCH001	FAKTUR001
869b6375-b3a3-414f-801c-38a543ced0af	B000001815	1000	1000	BATCH001	FAKTUR001
6951b54c-d862-4b80-8991-ba818715da2d	B000001499	1000	1000	BATCH001	FAKTUR001
29f4ce55-03d6-4790-96e7-77304759f9df	B000001731	1000	1000	BATCH001	FAKTUR001
d16e3a13-5ea6-4f00-8501-454c18ceef43	B000002016	1000	1000	BATCH001	FAKTUR001
e3b558a7-aee9-400b-be8b-1a85e3626673	B000002029	1000	1000	BATCH001	FAKTUR001
40c845d2-aea9-4d11-b6f2-d3b686b0f873	B000000393	1000	1000	BATCH001	FAKTUR001
06dfb2e2-ec35-490e-a35a-8a9475406624	B000001908	1000	1000	BATCH001	FAKTUR001
22ee0066-4d1d-4fc8-9dc2-ac8c0f7dab78	B000000964	1000	1000	BATCH001	FAKTUR001
7d4a1bae-1ca1-458a-85e0-cbfdbfb3b4bc	B000000938	1000	1000	BATCH001	FAKTUR001
e67d6edd-caec-4a59-8a9f-69f9ec4b30c1	B000001008	1000	1000	BATCH001	FAKTUR001
54e62d74-af4f-45d8-b28e-2ff0ee579f06	B000000631	1000	1000	BATCH001	FAKTUR001
cccd9907-84e9-4f29-b200-fde2ed8e6729	B000002007	1000	1000	BATCH001	FAKTUR001
1355ba20-7640-49a6-a283-9105929dd006	B000000632	1000	1000	BATCH001	FAKTUR001
d5cfcb2d-7980-4ccd-9fe9-cdaa7acbbabd	B000001808	1000	1000	BATCH001	FAKTUR001
0c51b1ef-3f48-4407-a236-3db1d13ce394	B000001849	1000	1000	BATCH001	FAKTUR001
d88c60f8-aec4-4324-be1b-fec27ef12a39	B000000635	1000	1000	BATCH001	FAKTUR001
c50e8158-b4a6-4a25-804c-8c5553d2bd56	B000001615	1000	1000	BATCH001	FAKTUR001
c3c8690f-09d2-4f45-8fd3-12de875abd40	B000001549	1000	1000	BATCH001	FAKTUR001
d691bd5a-fea5-4e05-ac2f-77c320d75b1d	B000001258	1000	1000	BATCH001	FAKTUR001
540c9a05-3f58-43c9-9f20-12b2e5ee10d2	B000000622	1000	1000	BATCH001	FAKTUR001
fc3e3a4f-b7a4-4daf-b567-d320c354c7b1	B000000188	1000	1000	BATCH001	FAKTUR001
3bf77664-4da1-47aa-aec3-ff65422ca725	B000002012	1000	1000	BATCH001	FAKTUR001
3344c63c-a028-4690-aa48-064c2e8df5c0	B000000160	1000	1000	BATCH001	FAKTUR001
f5c75e3c-22b9-4bd9-a573-40a24e1fbd03	B000001358	1000	1000	BATCH001	FAKTUR001
3d3f94cc-394e-45e9-87b0-1c810090796d	B000000092	1000	1000	BATCH001	FAKTUR001
c460e84d-82da-465c-8443-6560adc4e689	B000001718	1000	1000	BATCH001	FAKTUR001
abbcf4d3-223b-4c25-bf2f-2f280dab01b9	B000000906	1000	1000	BATCH001	FAKTUR001
f5cf99e4-25dd-4a94-acb9-66f04c49201f	B000001704	1000	1000	BATCH001	FAKTUR001
a0c6beb1-0825-4bcc-b1d5-86e277cdef9e	B000001846	1000	1000	BATCH001	FAKTUR001
1a8b9f52-8284-4aaf-9bf1-e66597618448	B000000437	1000	1000	BATCH001	FAKTUR001
01c4ad6d-819a-43fc-a7f8-1df6c4310abc	B000001606	1000	1000	BATCH001	FAKTUR001
d382f436-589b-4280-8cdf-61e10b234f92	B000000382	1000	1000	BATCH001	FAKTUR001
287cfbd6-5170-453a-a938-6d5146b17c83	B000001019	1000	1000	BATCH001	FAKTUR001
67adb284-0e2f-4dd0-914d-11261cd541ca	B000000679	1000	1000	BATCH001	FAKTUR001
7de6eb9a-d173-4255-9ad5-09cbdcbbd02e	A000000099	1000	1000	BATCH001	FAKTUR001
c7668adc-2414-4408-bdb8-8cc2f46244b9	B000000921	1000	1000	BATCH001	FAKTUR001
73f81016-57bd-4442-99a9-7c30d8bd839c	B000000987	1000	1000	BATCH001	FAKTUR001
2ce91e08-848b-4258-ba22-e8abf13b090b	B000001682	1000	1000	BATCH001	FAKTUR001
f833611a-7af4-4a2f-add3-05b778b63c8f	B000000570	1000	1000	BATCH001	FAKTUR001
751c254f-e9b1-4d67-af10-dc2f229cdfb4	B000001789	1000	1000	BATCH001	FAKTUR001
19dec89e-6ec9-4b7e-a6a1-ef4483eeaeaa	A000000109	1000	1000	BATCH001	FAKTUR001
cb8f2987-95ab-45f5-8aff-318af4ead6db	B000000292	1000	1000	BATCH001	FAKTUR001
b4ccc7f6-bdd6-41ab-a22b-eca7e7f9fb8a	B000001768	1000	1000	BATCH001	FAKTUR001
9c40301b-ff1f-4cf7-a3c9-290afdad997f	B000001800	1000	1000	BATCH001	FAKTUR001
19cefc5a-17a6-43c5-8f60-0f0de095bfca	B000000462	1000	1000	BATCH001	FAKTUR001
da7d67d9-812b-49bf-9be8-f3fac4f616d6	B000000321	1000	1000	BATCH001	FAKTUR001
3025c3fe-586b-42d2-ad42-b1d1cfe41fba	A000000107	1000	1000	BATCH001	FAKTUR001
d5c40140-a6a1-452d-a119-500c134ef135	B000000827	1000	1000	BATCH001	FAKTUR001
17b895bf-750e-4e6c-a670-3c101c1c1d79	B000001304	1000	1000	BATCH001	FAKTUR001
61d45a54-53d0-455c-97a0-9edd91caa987	B000001309	1000	1000	BATCH001	FAKTUR001
0ce3007d-fd9c-4b93-a97e-9e69e086a23f	B000001325	1000	1000	BATCH001	FAKTUR001
6b8941e4-c2dc-4202-8cc6-8bd1fc235945	B000001890	1000	1000	BATCH001	FAKTUR001
e066f9a6-e47d-4b7d-b777-45f37c7d6751	B000000825	1000	1000	BATCH001	FAKTUR001
b2d6554b-4d82-4acb-a04f-3d3f92ad9e17	B000001835	1000	1000	BATCH001	FAKTUR001
d063f9cb-07d8-47ee-97fb-26410bdd0676	A000000069	1000	1000	BATCH001	FAKTUR001
77ef35f6-830b-458f-9ef0-44b97f43d3b1	B000001525	1000	1000	BATCH001	FAKTUR001
9aab43b0-e566-4de2-b497-dbd47b0640d6	B000000132	1000	1000	BATCH001	FAKTUR001
66e67d28-91f9-4eb1-9814-c7d4afab0ec3	B000001385	1000	1000	BATCH001	FAKTUR001
156e5ae6-1921-43d0-99a7-e3cf421e82e3	B000001591	1000	1000	BATCH001	FAKTUR001
25b3c5a5-6ac8-42ed-aab3-ab3074499c1c	B000001736	1000	1000	BATCH001	FAKTUR001
d4e8a841-149f-4dcc-a711-c2a7cb23a5c5	B000001206	1000	1000	BATCH001	FAKTUR001
5237f921-52e7-4644-8d87-77244c0210e4	B000001370	1000	1000	BATCH001	FAKTUR001
d0581b70-6399-4926-899f-71e4223f6af1	B000000137	1000	1000	BATCH001	FAKTUR001
b5d0780f-54aa-4936-acdc-13962236089e	B000000571	1000	1000	BATCH001	FAKTUR001
adc1faa5-de4b-411f-badc-fa4f870cf3ab	A000000090	1000	1000	BATCH001	FAKTUR001
1537678f-ef09-43d5-ba90-a3c3b884504e	B000000601	1000	1000	BATCH001	FAKTUR001
e1c3e9aa-ab24-42d0-9b38-0165bd84e709	B000000211	1000	1000	BATCH001	FAKTUR001
cfdfa15c-d825-4a2f-8448-bc7275a376d3	B000001703	1000	1000	BATCH001	FAKTUR001
b1d80d9a-1480-4769-a7b3-e85b0345911e	B000000219	1000	1000	BATCH001	FAKTUR001
517a04ce-8e41-4feb-af33-3cf656cece48	B000001976	1000	1000	BATCH001	FAKTUR001
5802a23c-cebb-434b-894e-10fa30c2fc78	B000000561	1000	1000	BATCH001	FAKTUR001
31144eb0-941e-41c1-96db-8436cc48e8cf	B000001686	1000	1000	BATCH001	FAKTUR001
6e846254-d096-4b90-b7cf-ded5938f1e57	B000001480	1000	1000	BATCH001	FAKTUR001
2570549e-20a5-43a5-8333-e02942a8afe2	B000000768	1000	1000	BATCH001	FAKTUR001
5984b7f6-56b2-4ae8-87ea-25b7f526c5f3	B000001075	1000	1000	BATCH001	FAKTUR001
5dd895db-07a2-47b7-9cbe-0f05735763c4	B000001110	1000	1000	BATCH001	FAKTUR001
9ea00a03-2fa5-410c-84f2-5ca26d926177	B000001756	1000	1000	BATCH001	FAKTUR001
a1758557-e341-42ad-9c9c-f9d6dfd4d420	B000000340	1000	1000	BATCH001	FAKTUR001
60da02c9-cecc-4a98-8e3a-77bbe89aebcd	B000000633	1000	1000	BATCH001	FAKTUR001
dc52b609-e202-4f03-af13-40cfdb8e5fd7	B000001672	1000	1000	BATCH001	FAKTUR001
cd39651a-aa19-42bd-a9f9-8b70e958fbbd	B000001805	1000	1000	BATCH001	FAKTUR001
8e2de541-f5fe-4903-968c-0d7a35ebc069	B000000616	1000	1000	BATCH001	FAKTUR001
32fc0ee7-9fb9-4272-9a4e-90c215d3a350	B000001955	1000	1000	BATCH001	FAKTUR001
4adc57dc-246b-422f-addc-76c99bd5574c	B000001761	1000	1000	BATCH001	FAKTUR001
41758e31-e21a-4f3d-8fd4-c87461ff1dea	B000000304	1000	1000	BATCH001	FAKTUR001
d243366f-b804-4ed8-8957-c850fe19d6f9	B000001618	1000	1000	BATCH001	FAKTUR001
9dfcf296-afcc-4e34-b50c-a07a304fe110	B000001182	1000	1000	BATCH001	FAKTUR001
81acb01c-9f5a-49d4-9678-c1e2b04d380b	B000000168	1000	1000	BATCH001	FAKTUR001
fba04802-83ec-45bc-94bd-1cba0bbc8f76	B000001180	1000	1000	BATCH001	FAKTUR001
c23d01e5-0016-475b-87f9-7ca6842772a2	B000000286	1000	1000	BATCH001	FAKTUR001
2d91d035-4cb3-4684-b60d-1246058d19fd	B000000837	1000	1000	BATCH001	FAKTUR001
28fee713-cff4-4972-a6c3-5ff2ac4d6025	B000000444	1000	1000	BATCH001	FAKTUR001
040a48ed-5dc1-44ea-9f7e-a828532308da	A000000095	1000	1000	BATCH001	FAKTUR001
4c5306c1-55c0-489f-828a-9e5c2573d1de	B000000618	1000	1000	BATCH001	FAKTUR001
37906f95-fa7a-485e-8eb4-6dc2df1f1eff	A000000036	1000	1000	BATCH001	FAKTUR001
225fe5dd-7006-49ba-bc5c-fa3619542878	A000000804	1000	1000	BATCH001	FAKTUR001
81ff3b89-5d04-4aa6-982e-a8b9e6a82d33	B000001957	1000	1000	BATCH001	FAKTUR001
06ce314b-6b69-4816-a203-98bc1a5a2e40	B000001323	1000	1000	BATCH001	FAKTUR001
a8ac2fbb-d894-439e-875a-7389b1844d07	B000000333	1000	1000	BATCH001	FAKTUR001
a374a08d-0c6a-4b80-827e-17521bdbbceb	B000000898	1000	1000	BATCH001	FAKTUR001
fbb0c020-d2e0-41e4-bc88-0e2754084b49	B000000986	1000	1000	BATCH001	FAKTUR001
60dd91c8-c755-4647-8580-150f3ffca5f4	B000001332	1000	1000	BATCH001	FAKTUR001
709135c6-a4b0-4705-84a9-ae9a0f0aa1f6	B000000685	1000	1000	BATCH001	FAKTUR001
39d6881e-c726-4495-b5c3-f0e6ec9a32f6	B000000833	1000	1000	BATCH001	FAKTUR001
16296a2a-7fd6-4621-8f3c-d84c7b6a4733	B000000667	1000	1000	BATCH001	FAKTUR001
a1d65b55-6da2-4fbe-aa02-6cacfe9cfbcf	B000001614	1000	1000	BATCH001	FAKTUR001
2453dcd9-5568-48e9-b762-d057a98189d3	B000000282	1000	1000	BATCH001	FAKTUR001
911b5e04-f30a-4cf0-9d32-5409fc326a13	B000000157	1000	1000	BATCH001	FAKTUR001
30b8c6ef-7c52-4710-bc37-5011da5ad9a3	B000001229	1000	1000	BATCH001	FAKTUR001
4423df29-ffa4-4c6c-88eb-112174a10cb0	B000001573	1000	1000	BATCH001	FAKTUR001
9b5ad94e-21ad-478f-b30c-aca9e1ac5980	A000000038	1000	1000	BATCH001	FAKTUR001
8ea7901c-623c-4d8c-886d-33638e052d32	B000001666	1000	1000	BATCH001	FAKTUR001
4c1bef21-7d52-4f89-92d8-753502b2a36c	B000000699	1000	1000	BATCH001	FAKTUR001
7e308357-f5dc-4361-842d-c03a81a8d9b7	B000001400	1000	1000	BATCH001	FAKTUR001
d4518c4f-b18a-4fac-91bf-2a91a39403c1	B000000108	1000	1000	BATCH001	FAKTUR001
1cc6e26c-6444-4e5b-8ca9-e6550e7b760e	B000001194	1000	1000	BATCH001	FAKTUR001
43895bce-8fef-4057-81de-535b47113b2a	B000008016	1000	1000	BATCH001	FAKTUR001
283b68f6-97b0-49bf-81f5-8e16b332ae73	B000000317	1000	1000	BATCH001	FAKTUR001
65efac70-d859-4c12-83e4-6bbcea62977a	B000000789	1000	1000	BATCH001	FAKTUR001
04dc400b-16f5-44ab-9610-cfe80e7239e7	A000000076	1000	1000	BATCH001	FAKTUR001
890a4e9a-f9f4-4118-aa7d-30cd34b8950b	B000001065	1000	1000	BATCH001	FAKTUR001
4bf513f5-c2e9-46e5-9143-ae9c4c8c0b9f	B000000649	1000	1000	BATCH001	FAKTUR001
62ed809b-4284-435f-8b93-29c9352b0f90	B000000899	1000	1000	BATCH001	FAKTUR001
bdf30d1c-b55d-4e55-9ec8-a78a0640490a	B000000221	1000	1000	BATCH001	FAKTUR001
9f2504c1-f9ae-4027-83b1-9210b6f2e5cb	B000000279	1000	1000	BATCH001	FAKTUR001
42ac7935-f283-45b4-be1f-b9742f05750b	B000001399	1000	1000	BATCH001	FAKTUR001
d33c449d-630c-42c3-bcc1-fcfda3c5c2d1	B000001398	1000	1000	BATCH001	FAKTUR001
92f84541-8c84-418f-bafe-098c00458a4c	B000000002	1000	1000	BATCH001	FAKTUR001
54f2d037-8b19-4315-a58b-747259bc0c12	B000000412	1000	1000	BATCH001	FAKTUR001
23d6ad41-6c17-4bf1-a8e8-66224ab8c5e8	B000000318	1000	1000	BATCH001	FAKTUR001
8f6d9716-92f1-4283-be75-d81ee82c4818	B000000425	1000	1000	BATCH001	FAKTUR001
bbc81863-ce4f-4955-ae3c-83c145833b8d	B000000872	1000	1000	BATCH001	FAKTUR001
de0eae80-a43f-4dd4-b7c6-ae8ea8063618	B000001191	1000	1000	BATCH001	FAKTUR001
b5011f2d-78ec-45bc-8c78-bf0ec8ea71de	B000001374	1000	1000	BATCH001	FAKTUR001
c6845da5-f78b-4dfe-96de-4da931ed5c0f	B000001383	1000	1000	BATCH001	FAKTUR001
a0a70748-35a7-41e0-8ece-c3590b9b19b6	B000000180	1000	1000	BATCH001	FAKTUR001
0e760c9b-6aa6-4cc5-8535-771d73e7b663	B000001726	1000	1000	BATCH001	FAKTUR001
ad15a376-da34-4e29-ba25-616744367b4e	B000000373	1000	1000	BATCH001	FAKTUR001
41833f35-9830-45c5-81eb-52cda88bc4c9	B000000252	1000	1000	BATCH001	FAKTUR001
3f8a9497-ddc6-41d5-bbce-8cf59b253ce8	B000000860	1000	1000	BATCH001	FAKTUR001
805cfc76-3ff2-414a-bda7-7894c87f40b7	B000001306	1000	1000	BATCH001	FAKTUR001
9a9f75b9-7cf6-46a6-a499-b2381b52321f	B000000606	1000	1000	BATCH001	FAKTUR001
b9be46b5-c14b-457b-88ee-07784f77e7a1	B000001924	1000	1000	BATCH001	FAKTUR001
62341f05-6f46-405e-8a54-54e01e0cb8f4	B000000569	1000	1000	BATCH001	FAKTUR001
249f793a-0bdb-4bd9-bf23-ab40e9effdea	B000001275	1000	1000	BATCH001	FAKTUR001
ffd7facd-dd1b-4e4e-afeb-b7afd92ce699	B000001223	1000	1000	BATCH001	FAKTUR001
8a8cbf59-0758-4fe2-b000-0f94a26f455e	A000000062	1000	1000	BATCH001	FAKTUR001
0711ffc2-4596-4052-8b2d-5058782ce808	B000001040	1000	1000	BATCH001	FAKTUR001
21fc56ce-ea4c-4cdb-b7c9-edf2002227a7	B000001242	1000	1000	BATCH001	FAKTUR001
d3a6232a-fd92-48c7-a7d8-378ac33ce580	B000001409	1000	1000	BATCH001	FAKTUR001
1a950695-47f7-4b0a-87b2-9f919a7ea685	B000000102	1000	1000	BATCH001	FAKTUR001
640dc500-18f0-43c5-bb5d-58b4950fac1e	B000000420	1000	1000	BATCH001	FAKTUR001
6f669119-ae62-4265-8943-1e246ccd228a	B000001254	1000	1000	BATCH001	FAKTUR001
c0339876-c59e-4a5c-ba1e-2c2f4040cc22	B000000578	1000	1000	BATCH001	FAKTUR001
4a561969-b5b3-41a6-8edd-72443d6b2e05	B000001689	1000	1000	BATCH001	FAKTUR001
9a4c04c6-783a-4f30-884c-e5393672455b	B000001405	1000	1000	BATCH001	FAKTUR001
f61d0be5-f6fd-4fd1-879e-5b53330cb72c	B000001002	1000	1000	BATCH001	FAKTUR001
51ceb1b6-4bec-49b5-a5b2-038f0f6e4f8a	B000001270	1000	1000	BATCH001	FAKTUR001
8ceac6ad-cced-40bd-9773-d1acf39593a2	A000000048	1000	1000	BATCH001	FAKTUR001
e48c358f-64a3-4bbd-927f-ceab551a69a3	B000000984	1000	1000	BATCH001	FAKTUR001
a9e971ca-ed00-4d11-a61a-a6f92cc0fc22	B000000711	1000	1000	BATCH001	FAKTUR001
1299aa06-38c0-432d-b576-bb24b8c15f39	B000000946	1000	1000	BATCH001	FAKTUR001
7c71c1a4-9a8e-4f14-96a0-30abbc466113	B000000348	1000	1000	BATCH001	FAKTUR001
ec13f168-4c28-4ed7-a287-a94a89af1663	B000000694	1000	1000	BATCH001	FAKTUR001
da28dacf-24f4-4d4c-b6ef-6f12e2e76458	B000001998	1000	1000	BATCH001	FAKTUR001
59821114-8702-4a85-92f4-8e552f5655ee	B000000923	1000	1000	BATCH001	FAKTUR001
18d8794d-6bdf-4e17-98a1-e85d4d2a612e	B000001174	1000	1000	BATCH001	FAKTUR001
f308f060-c340-438c-b215-604dd5069d8a	B000000656	1000	1000	BATCH001	FAKTUR001
c503d7a5-8bd0-4ad9-9535-d55924c77ce0	B000000423	1000	1000	BATCH001	FAKTUR001
5287fe94-a8bd-49ba-bba6-d7acd51e51d5	B000001526	1000	1000	BATCH001	FAKTUR001
7ebc3d04-0735-4552-8616-d12b3cbc2ba2	B000001697	1000	1000	BATCH001	FAKTUR001
2510462d-c809-4407-86d9-e21a11adca58	B000001101	1000	1000	BATCH001	FAKTUR001
6a460734-6577-4c9f-b672-dc640eef7350	B000001495	1000	1000	BATCH001	FAKTUR001
36e52fec-805d-4296-9a2d-8485ec19be05	B000008005	1000	1000	BATCH001	FAKTUR001
21cb3e10-7f00-4757-a611-2ebe2c3263f1	B000000127	1000	1000	BATCH001	FAKTUR001
817aa6e4-ca95-4a1b-950f-7eb57161e8b6	B000001694	1000	1000	BATCH001	FAKTUR001
38aaf76e-1c6d-451c-b0c9-e4bac1405317	B000000436	1000	1000	BATCH001	FAKTUR001
8ff40c94-5817-48eb-8c76-2c519f229141	B000000732	1000	1000	BATCH001	FAKTUR001
1035963f-c02e-469c-8d43-7ae670da5ce2	B000000159	1000	1000	BATCH001	FAKTUR001
715c7c0a-5f9b-400c-973b-d0b14f03c17c	B000000364	1000	1000	BATCH001	FAKTUR001
cb394648-974d-4695-b229-2ef535cd4b3c	B000000254	1000	1000	BATCH001	FAKTUR001
aabfb940-9e49-49b7-bf55-0da3fa53147e	B000001364	1000	1000	BATCH001	FAKTUR001
6b8c5e4d-9091-45f5-a6e3-4cd42ecccf30	B000001546	1000	1000	BATCH001	FAKTUR001
ca10004b-50b4-4eb7-924b-3b2b2ecb859c	B000000595	1000	1000	BATCH001	FAKTUR001
415db32b-905e-47c4-950e-edaf31221cc4	B000000757	1000	1000	BATCH001	FAKTUR001
83d8d87e-a632-4fc2-9b01-43974dd63ea2	B000001912	1000	1000	BATCH001	FAKTUR001
7cccb80d-0aa8-45f3-865e-7a98ed7bb81e	B000002036	1000	1000	BATCH001	FAKTUR001
4b8864e9-4052-45ea-835e-6ffe8caebdcc	B000000336	1000	1000	BATCH001	FAKTUR001
8fecdcaf-893b-462f-a20c-040d4a97e294	B000001261	1000	1000	BATCH001	FAKTUR001
8d629f90-847a-4ab7-a47b-09473578c73b	B000001975	1000	1000	BATCH001	FAKTUR001
07acfa4c-3d2f-4ae1-a5d6-4b4c11dddf8f	B000000804	1000	1000	BATCH001	FAKTUR001
f3d84288-854e-4d3b-950b-e3655152bec0	B000001100	1000	1000	BATCH001	FAKTUR001
b9b1045d-2b23-4cae-9dbc-6a530784116d	B000001856	1000	1000	BATCH001	FAKTUR001
e364dc4b-256e-4c5b-a519-3e760c1ed1cf	B000000634	1000	1000	BATCH001	FAKTUR001
dfab1897-5207-45a7-9277-527461368370	B000000887	1000	1000	BATCH001	FAKTUR001
c5fb654e-bfa1-4b1e-bbc6-76a360660c2e	B000001189	1000	1000	BATCH001	FAKTUR001
69d6ed6a-d198-48cc-9ccb-47be959c0522	B000000866	1000	1000	BATCH001	FAKTUR001
54982a74-c779-4dc4-9b92-d53fba6c401f	B000001605	1000	1000	BATCH001	FAKTUR001
94232a28-8e1c-4d32-b766-b7f859a2120f	B000008011	1000	1000	BATCH001	FAKTUR001
24777fcf-cf7a-4641-bc6c-16cda85b484d	B000000203	1000	1000	BATCH001	FAKTUR001
9673925f-0f19-48c6-b11f-834c17d7d70d	B000000707	1000	1000	BATCH001	FAKTUR001
77f17f50-62d7-4504-84c1-34c72763e842	B000001836	1000	1000	BATCH001	FAKTUR001
a1365d6f-d5c3-44a9-a4e6-c20a66ba9320	B000000231	1000	1000	BATCH001	FAKTUR001
3104f0d5-4f56-423f-9500-e68e2c3a3c58	B000000581	1000	1000	BATCH001	FAKTUR001
bacb571d-4c35-42af-95b6-c4f3135727ee	B000000814	1000	1000	BATCH001	FAKTUR001
77048ce0-dabb-4926-8c49-1aae23f09da0	B000001816	1000	1000	BATCH001	FAKTUR001
6c471c9a-8013-47d3-a5d3-2685eb03b483	A000000071	1000	1000	BATCH001	FAKTUR001
b2b09313-408d-4323-8c6c-608f22e0132c	B000001334	1000	1000	BATCH001	FAKTUR001
b6c5fc43-17ee-41ef-860d-ba10093fd8c0	B000001907	1000	1000	BATCH001	FAKTUR001
12bf2d26-3e99-4731-aaef-0effef64b254	B000001060	1000	1000	BATCH001	FAKTUR001
6451bc56-7ac5-4071-99fb-2fc04b5b9bce	B000001696	1000	1000	BATCH001	FAKTUR001
bc9440f1-44f4-4bfe-b190-7e35ae7d1599	B000000302	1000	1000	BATCH001	FAKTUR001
c9196652-2035-4d95-9ef4-45666aea37b6	B000000931	1000	1000	BATCH001	FAKTUR001
25bf58e2-140a-425a-b490-3bf457eebf99	B000001887	1000	1000	BATCH001	FAKTUR001
9e5d670b-7d21-4844-8b60-90a6c7d5d171	B000001659	1000	1000	BATCH001	FAKTUR001
b35aca0a-a439-46bc-8fdf-20052ce097b0	B000001706	1000	1000	BATCH001	FAKTUR001
bfcc8b56-5d3f-4fef-accd-907d26840a86	A000000092	1000	1000	BATCH001	FAKTUR001
75236966-ef52-4ba1-9d09-d0d3b04ba735	B000000968	1000	1000	BATCH001	FAKTUR001
cb664f1c-79c8-4084-a960-9c82014b2b86	B000001316	1000	1000	BATCH001	FAKTUR001
a00c33ea-1339-410f-be15-464e2aff7e05	B000001462	1000	1000	BATCH001	FAKTUR001
38ad91b1-f4ac-4a83-93ad-8bb16f10419c	A000000077	1000	1000	BATCH001	FAKTUR001
ceb968ea-7138-48bf-bfa5-9f4549e92a78	B000001478	1000	1000	BATCH001	FAKTUR001
7056edf9-4eae-4e0d-bb01-2731e312a823	A000000105	1000	1000	BATCH001	FAKTUR001
3ba74314-3c68-4d47-9cdc-244820b6eadc	B000000754	1000	1000	BATCH001	FAKTUR001
64e1f174-9abe-44ef-8396-339153a8be50	B000000562	1000	1000	BATCH001	FAKTUR001
2a4330a7-c295-423a-8dd9-d3e2597cc9ee	B000000975	1000	1000	BATCH001	FAKTUR001
7559a81b-8cf7-4d50-b940-a23e9a9cb9b1	B000001431	1000	1000	BATCH001	FAKTUR001
6607b8ce-b619-455a-9752-11c6921a605e	B000001561	1000	1000	BATCH001	FAKTUR001
688c4338-03f5-4f2c-9ae0-0d7cbea5be3f	B000001531	1000	1000	BATCH001	FAKTUR001
6e5ea2b2-d58c-407a-9337-3b5f05fb9812	B000000655	1000	1000	BATCH001	FAKTUR001
d7f5d7be-d1e8-41dc-be06-abfec20e2175	B000000781	1000	1000	BATCH001	FAKTUR001
c61293f9-3f97-4d61-8cae-bdd7f7a4b0ce	B000000610	1000	1000	BATCH001	FAKTUR001
ae5b42fe-dd58-462a-a8dc-5aab846d9650	B000001105	1000	1000	BATCH001	FAKTUR001
b2640b30-7b61-4fb6-9737-c29a3d4e9cd6	B000000126	1000	1000	BATCH001	FAKTUR001
9a988896-2b89-4934-bf3b-50a1ebbfd5f7	B000000958	1000	1000	BATCH001	FAKTUR001
70811f9c-5a60-4102-a5f4-eac78b36eb0f	B000000453	1000	1000	BATCH001	FAKTUR001
cec844a2-35c2-49c7-9aae-28ef0e09d49e	B000000767	1000	1000	BATCH001	FAKTUR001
f63437fe-f9bd-4eab-9d5c-af693de25b6f	B000001054	1000	1000	BATCH001	FAKTUR001
b29d98b5-cce7-462d-a40f-fd8ef9ace5dc	A000000113	1000	1000	BATCH001	FAKTUR001
f3a8465d-4f28-410b-bdd4-2769d5e4bb19	B000001664	1000	1000	BATCH001	FAKTUR001
0007ad87-fefd-4c0c-ab8b-6b9752b3e3a3	B000001177	1000	1000	BATCH001	FAKTUR001
ab4309e6-848b-4586-9f1f-ba38325057a0	B000001481	1000	1000	BATCH001	FAKTUR001
b30deaa4-e2a9-4967-9334-c8f680cb2d13	B000008010	1000	1000	BATCH001	FAKTUR001
54ae2c88-e38a-4f17-8bc7-6068376a32c7	B000000266	1000	1000	BATCH001	FAKTUR001
63d712ce-5693-4cab-bed3-c6bc5c154074	B000000912	1000	1000	BATCH001	FAKTUR001
77cd84e9-96a9-47d9-bc6e-30eef7f7f05e	B000000460	1000	1000	BATCH001	FAKTUR001
1ca679ad-a771-4d17-baf3-b5f8c939e00d	B000000830	1000	1000	BATCH001	FAKTUR001
ef2ae45c-b171-47ca-8854-f45774e0b9a0	B000001748	1000	1000	BATCH001	FAKTUR001
dfd27ebc-8af1-4854-be75-445afc0d24bd	B000001877	1000	1000	BATCH001	FAKTUR001
2c0f2c46-c445-414d-883b-058f20a910ef	B000001854	1000	1000	BATCH001	FAKTUR001
587d3a51-f5d9-42ab-9a5f-8a77fd95497a	B000001530	1000	1000	BATCH001	FAKTUR001
07fa6eb2-188d-44af-968e-fc8f2606b866	B000001913	1000	1000	BATCH001	FAKTUR001
bd91959b-2d7b-4bef-aaab-4ed8df30f1fa	B000000220	1000	1000	BATCH001	FAKTUR001
080b1c83-a066-4f1f-8018-95698186505a	B000001753	1000	1000	BATCH001	FAKTUR001
d2afba6d-0ea5-4bc7-8963-554e4aa5c2f1	B000000165	1000	1000	BATCH001	FAKTUR001
e37b7454-641c-406b-86c8-257ad5e90549	B000000310	1000	1000	BATCH001	FAKTUR001
eebcd55d-1058-43aa-8a6b-af7ff26f79c5	A000000031	1000	1000	BATCH001	FAKTUR001
1ed2735b-2f28-4368-9187-b361af61f2d0	B000001596	1000	1000	BATCH001	FAKTUR001
f5781924-95d0-4614-84ec-b0b2fb99dc6c	B000000646	1000	1000	BATCH001	FAKTUR001
43802a2d-74e5-4fd0-8b20-a29d3351a2c1	B000001193	1000	1000	BATCH001	FAKTUR001
fb0ce68d-4d14-4d34-b51d-08f2ac0a890c	B000000824	1000	1000	BATCH001	FAKTUR001
dded33f5-81d9-45af-9320-31f06c29720f	B000001487	1000	1000	BATCH001	FAKTUR001
7b3b405d-782a-4765-8a67-8fc1ad68be66	B000000151	1000	1000	BATCH001	FAKTUR001
d3878de7-649b-41a5-b20e-bf2ef146f3e2	B000001491	1000	1000	BATCH001	FAKTUR001
9a629e3e-e3c6-41a0-954b-6f68fe1f8f9a	B000001212	1000	1000	BATCH001	FAKTUR001
d031d28c-202a-4b26-a1bf-0be138b77b72	B000000118	1000	1000	BATCH001	FAKTUR001
fab16514-67cd-4009-88c5-3d988e1a99bb	B000001558	1000	1000	BATCH001	FAKTUR001
b1b19441-d0a4-4f28-9ec6-651ae8151732	B000001082	1000	1000	BATCH001	FAKTUR001
5eac4358-a6ec-45c8-bce6-fae5f7d1369c	A000000037	1000	1000	BATCH001	FAKTUR001
ec269da1-d724-49eb-9921-24679258fc29	B000001918	1000	1000	BATCH001	FAKTUR001
b80acbab-6264-45cf-baf3-2252919a98e8	B000001319	1000	1000	BATCH001	FAKTUR001
d96556e7-3992-420a-9ac0-6a5cc50eb271	B000001322	1000	1000	BATCH001	FAKTUR001
70760a0f-7d6c-43f5-b933-4f70c582f185	B000001441	1000	1000	BATCH001	FAKTUR001
8ced582d-df63-442d-8a67-c5b2d9a61f03	B000000966	1000	1000	BATCH001	FAKTUR001
9acae796-8319-4382-bda1-31be666dc298	B000001875	1000	1000	BATCH001	FAKTUR001
5b71bd67-e494-4b46-8305-1a852cf7fd6c	B000001137	1000	1000	BATCH001	FAKTUR001
70c63556-3dfc-4cd2-a903-b0efe8119371	B000000478	1000	1000	BATCH001	FAKTUR001
e19bc964-da4f-4618-8fc6-ba5da3ba6022	B000001578	1000	1000	BATCH001	FAKTUR001
e7b2ec6b-6e2d-4c25-9734-fc99deb6e8f6	B000000792	1000	1000	BATCH001	FAKTUR001
7c424eb6-3d67-4e79-bbe0-04028aab5f51	B000000763	1000	1000	BATCH001	FAKTUR001
d1f21997-a37c-4716-a017-bb05987c0fb1	B000001132	1000	1000	BATCH001	FAKTUR001
8b7fb814-1450-483e-a4d0-c124a9b98267	B000001128	1000	1000	BATCH001	FAKTUR001
779f26ac-5ca0-43c1-87c7-5302be1a5b05	B000000105	1000	1000	BATCH001	FAKTUR001
089a9bcb-d7b0-4635-bdbf-c8d10e417896	B000001493	1000	1000	BATCH001	FAKTUR001
238e83c9-362a-404c-9f50-4359a26a7a3a	B000001036	1000	1000	BATCH001	FAKTUR001
a7cde8ef-24f6-4734-a664-2b7c5735a9ca	B000001772	1000	1000	BATCH001	FAKTUR001
c56f7b34-23f9-42d7-b429-a689db1c03df	B000001042	1000	1000	BATCH001	FAKTUR001
37659458-8d84-4407-a8c8-88bac95e64bb	B000000614	1000	1000	BATCH001	FAKTUR001
c2550269-7747-4203-99fd-453aada0f714	B000001884	1000	1000	BATCH001	FAKTUR001
c501b746-21bd-44e1-b597-694d90cd14bb	B000001584	1000	1000	BATCH001	FAKTUR001
56d72b26-be0b-4bbc-8ff0-b766812095d5	A000000787	1000	1000	BATCH001	FAKTUR001
75f5a478-4e32-4523-bf49-bfcdf10cc16f	B000001547	1000	1000	BATCH001	FAKTUR001
751ae43e-3d01-43d1-9e51-34a98ebdea1e	B000001025	1000	1000	BATCH001	FAKTUR001
9b06a1e3-4ec7-4f73-b684-1de9965b2309	B000000249	1000	1000	BATCH001	FAKTUR001
214413a6-d5d5-4479-a4b5-0b84b3b08753	B000001576	1000	1000	BATCH001	FAKTUR001
098d7297-8c87-4962-b7ad-65d9fe2e0a8b	B000001693	1000	1000	BATCH001	FAKTUR001
a90a6e95-7151-4ad9-b388-ca6491718882	B000000413	1000	1000	BATCH001	FAKTUR001
813572b1-79a1-47ae-a47b-fc82fbae35cf	B000000916	1000	1000	BATCH001	FAKTUR001
b660814d-eb73-438c-8bc6-847aa240bdf3	B000000654	1000	1000	BATCH001	FAKTUR001
ce279b98-0b80-40d0-9c31-81dd38d43f88	B000001821	1000	1000	BATCH001	FAKTUR001
acb33be3-1073-4494-bd4e-03951b7198e8	B000001198	1000	1000	BATCH001	FAKTUR001
48a72d8b-1a00-4013-8313-d3c9a9c82710	B000001892	1000	1000	BATCH001	FAKTUR001
dafd117e-757a-47ad-bea7-97f82d114521	B000000246	1000	1000	BATCH001	FAKTUR001
e35e9629-4016-464a-a36d-3affb457511e	B000001170	1000	1000	BATCH001	FAKTUR001
61db8dce-5f2c-48bd-9515-d14a963b488a	B000000580	1000	1000	BATCH001	FAKTUR001
5240485a-7ef4-484e-930a-0efcd6a10ffb	B000000358	1000	1000	BATCH001	FAKTUR001
91f4b320-d0e1-49ab-9867-c2cee59613b9	B000000988	1000	1000	BATCH001	FAKTUR001
24c96322-8e6c-404c-89cb-ea835ed982d9	B000001866	1000	1000	BATCH001	FAKTUR001
f594d8c3-d9d8-44d5-b912-e8bdb035b05e	B000000276	1000	1000	BATCH001	FAKTUR001
69776765-49f7-4bd1-8e5a-6f0922e10302	B000000197	1000	1000	BATCH001	FAKTUR001
ff8a2604-1593-418f-8841-2fc180a765b8	B000001876	1000	1000	BATCH001	FAKTUR001
eb386c08-fce0-4492-8a42-41828db1d9f6	B000000446	1000	1000	BATCH001	FAKTUR001
f1aca0f0-8ede-4860-ad82-605cf14001bc	B000001338	1000	1000	BATCH001	FAKTUR001
e0859b11-b0fc-4c6c-912c-1d83f0ccfcaf	B000000758	1000	1000	BATCH001	FAKTUR001
421ddef3-28f1-49a7-b4a0-30a35daebe37	B000001523	1000	1000	BATCH001	FAKTUR001
ef911723-540c-4b78-b2ac-6675a8b6bafe	B000001651	1000	1000	BATCH001	FAKTUR001
eb3c5b57-13f9-4b18-a395-6b774737e158	B000001684	1000	1000	BATCH001	FAKTUR001
33aae989-0a9f-44d2-9e2f-63000f8c5b50	B000001553	1000	1000	BATCH001	FAKTUR001
9e250333-c98e-4066-9542-11d079659cf2	A000000026	1000	1000	BATCH001	FAKTUR001
6f4ab618-0c6b-4519-ac87-24c6a040e448	B000001168	1000	1000	BATCH001	FAKTUR001
b14e34bb-09b9-4106-a101-86519d6e72be	B000000750	1000	1000	BATCH001	FAKTUR001
0011243c-ac88-4e78-ae89-774a881ccc15	B000001777	1000	1000	BATCH001	FAKTUR001
f4637b68-d6ad-4fec-8e3f-89305d01bb89	B000000563	1000	1000	BATCH001	FAKTUR001
6f480ebc-c8a9-4644-94a2-c34b1920709d	B000001213	1000	1000	BATCH001	FAKTUR001
55058fbf-256a-476d-83a3-f72e7cedc968	A000000030	1000	1000	BATCH001	FAKTUR001
51c5c688-cd16-4afc-9c47-34c99b4589c7	B000002022	1000	1000	BATCH001	FAKTUR001
ef1aed3b-7612-4754-a6e1-209dc0812b51	B000000346	1000	1000	BATCH001	FAKTUR001
4d289efd-2c38-4a2d-94cc-5ae503b04781	A000000011	1000	1000	BATCH001	FAKTUR001
3828edcc-5e7f-4756-8e35-e79d41e4a1de	B000001538	1000	1000	BATCH001	FAKTUR001
0a0fa204-9503-44b1-adfe-172bc7efba90	B000001765	1000	1000	BATCH001	FAKTUR001
d8a084f7-e65a-4b1b-936f-0c51f81b0e21	B000000402	1000	1000	BATCH001	FAKTUR001
248d91e2-0008-43b2-991a-fc7f7bbf1fa3	B000000615	1000	1000	BATCH001	FAKTUR001
009f1815-2514-41bc-b228-ab7a8bfe0fb0	B000001809	1000	1000	BATCH001	FAKTUR001
684a7c2c-5b0e-4779-94f2-ecc574ddbe94	B000001600	1000	1000	BATCH001	FAKTUR001
b21769f5-8024-4fd2-b789-6810601b463b	B000000223	1000	1000	BATCH001	FAKTUR001
cf53b4c1-a70b-4597-82b7-30379ab750aa	C000000002	1000	1000	BATCH001	FAKTUR001
61fcf125-f846-4e90-a2ac-78e17f900199	B000001070	1000	1000	BATCH001	FAKTUR001
0435cd0e-a1ca-4c3c-8d24-2e2e027f56de	B000000736	1000	1000	BATCH001	FAKTUR001
d36a85f5-4960-45de-aeb7-b9313d65ed2d	B000000970	1000	1000	BATCH001	FAKTUR001
2571ad88-1c40-4ab1-b4de-6ec2c0198975	B000001301	1000	1000	BATCH001	FAKTUR001
84a8a184-f200-45b7-8a78-fe57e9158b3c	B000001926	1000	1000	BATCH001	FAKTUR001
f793dc82-b665-456e-8582-06ac37f30d67	B000001797	1000	1000	BATCH001	FAKTUR001
f561402e-3b19-424d-a81d-bede3cd22a4f	B000000218	1000	1000	BATCH001	FAKTUR001
a0a9b62b-213b-4850-a70f-f1ad9922e687	B000000985	1000	1000	BATCH001	FAKTUR001
e0fa576d-ffc7-4732-b6d0-4cefabf1132d	B000001847	1000	1000	BATCH001	FAKTUR001
be40ad82-a0bc-4aa2-bc11-f6d8ab015430	B000000416	1000	1000	BATCH001	FAKTUR001
63585c19-aa6a-4003-823d-6ec793fec3eb	B000001185	1000	1000	BATCH001	FAKTUR001
e32a6c3e-82b1-4755-ab10-ce2d7b4b01b1	B000001620	1000	1000	BATCH001	FAKTUR001
c65e82c9-8d33-458f-a26d-8b6dc15d47eb	B000000963	1000	1000	BATCH001	FAKTUR001
83e27fd8-525c-413e-b995-b5a3c0c78200	B000000782	1000	1000	BATCH001	FAKTUR001
50bd39ea-c7c4-45f7-b9db-6822f9f4285c	B000000433	1000	1000	BATCH001	FAKTUR001
4c76dbc6-2856-4f37-aab4-2b54eebacd2c	B000001283	1000	1000	BATCH001	FAKTUR001
50afec42-ab1e-4633-9375-d9acfcab33dc	B000000471	1000	1000	BATCH001	FAKTUR001
6eb6e3aa-c482-426a-9041-0710b19966a8	A000000108	1000	1000	BATCH001	FAKTUR001
caefb8f5-172c-4d62-b930-f06b8fc0cd49	B000001878	1000	1000	BATCH001	FAKTUR001
8ec5c6ea-ba8c-4822-a6e2-8486802cd4cc	B000001782	1000	1000	BATCH001	FAKTUR001
86c404ae-275a-48a6-ae5f-c0cbbf878f8d	B000000171	1000	1000	BATCH001	FAKTUR001
28c35c0b-3798-4fa5-950a-e353d90dfcb7	B000000868	1000	1000	BATCH001	FAKTUR001
2800e1f2-cebd-4779-a532-7199532f97bc	B000001336	1000	1000	BATCH001	FAKTUR001
3367c98c-aaba-4064-a4c4-b401da9a3ce3	B000001430	1000	1000	BATCH001	FAKTUR001
0d13cec0-bfa6-4061-9af6-4c4c85915a6a	B000001989	1000	1000	BATCH001	FAKTUR001
7770355a-cf7b-46df-a173-8439b6273b96	A000000795	1000	1000	BATCH001	FAKTUR001
fc03563c-96c8-44bb-a0b8-2fe939730a9c	B000001652	1000	1000	BATCH001	FAKTUR001
232e70fd-eb88-4ae5-bb48-9de8a0a1ae22	B000000884	1000	1000	BATCH001	FAKTUR001
447bfe53-fc62-4c56-ba96-14570396de65	B000001346	1000	1000	BATCH001	FAKTUR001
7823c3b1-2cfc-4733-a195-e63768892fc8	B000001825	1000	1000	BATCH001	FAKTUR001
e0c66d68-a00e-4fb0-b4a5-27bc35a44a43	B000000149	1000	1000	BATCH001	FAKTUR001
01603d62-d837-4faf-88f8-eb57ceaad63c	B000000300	1000	1000	BATCH001	FAKTUR001
8a45b0c6-5127-4db4-a18b-dd5c076d962c	B000000599	1000	1000	BATCH001	FAKTUR001
959ea7e4-d816-4cb2-8022-88e588f4069f	B000000691	1000	1000	BATCH001	FAKTUR001
60b0b973-48bb-4cdc-a937-82dd047f7e49	B000001886	1000	1000	BATCH001	FAKTUR001
1e0f4b94-f663-4d3f-b430-6d88674b164b	B000001001	1000	1000	BATCH001	FAKTUR001
fa18831b-965b-4340-9bf7-f2db324588b2	B000000405	1000	1000	BATCH001	FAKTUR001
10fd1877-2344-43f0-9bae-91c1c73688e4	B000000167	1000	1000	BATCH001	FAKTUR001
a0f36a8e-c5a8-438a-b56d-dd1192e2f82b	B000000730	1000	1000	BATCH001	FAKTUR001
ce9e660e-84d6-405d-8d26-bea8c638a0d5	B000001972	1000	1000	BATCH001	FAKTUR001
cff9dec4-2092-4de1-8600-2a1a49769411	B000001830	1000	1000	BATCH001	FAKTUR001
c2c6e77d-d6b2-4ebb-bc02-dd7943d0d8dd	B000000737	1000	1000	BATCH001	FAKTUR001
155945ae-8424-41a3-b1d3-a47117a73834	B000000673	1000	1000	BATCH001	FAKTUR001
d1b465d3-3be6-485d-abfc-ca4e2a3977e7	B000000113	1000	1000	BATCH001	FAKTUR001
34a5d10e-a0ba-4e87-8b4e-2f26b28cc3e7	B000001324	1000	1000	BATCH001	FAKTUR001
7a4a519b-9fc0-4c75-8707-cfb0e0600e88	B000000404	1000	1000	BATCH001	FAKTUR001
22f22ace-3cac-40d8-b2d0-30d86a4badc0	B000000572	1000	1000	BATCH001	FAKTUR001
1780e809-50dc-42a9-ba95-3316c2400143	B000000805	1000	1000	BATCH001	FAKTUR001
b8154ef9-3133-49ce-b05f-22ef2d10ecd7	B000001881	1000	1000	BATCH001	FAKTUR001
708c24a5-0f23-4ada-ad29-ab00eabc641e	B000001249	1000	1000	BATCH001	FAKTUR001
2e780d60-8951-4595-993c-893ed31b5ad4	B000001414	1000	1000	BATCH001	FAKTUR001
38ad84d0-86a2-409f-a688-250b0869b4b6	A000000049	1000	1000	BATCH001	FAKTUR001
2afee33c-0739-4939-91d3-fdde1bbd7ee0	B000001872	1000	1000	BATCH001	FAKTUR001
97cee058-1364-48f3-99fd-e9833a872d2a	B000001089	1000	1000	BATCH001	FAKTUR001
ca525ced-0498-4c1f-a161-aa48837e699e	B000000262	1000	1000	BATCH001	FAKTUR001
ffadc38c-7573-4916-be0a-2a80f0967aa7	B000001114	1000	1000	BATCH001	FAKTUR001
33911395-be4e-481d-86b5-dc6c5ac22490	B000001135	1000	1000	BATCH001	FAKTUR001
3826c08e-d233-4d12-bb93-1e582960dffa	B000001274	1000	1000	BATCH001	FAKTUR001
32850e94-8183-4585-96bc-2de93fd2ef57	B000000733	1000	1000	BATCH001	FAKTUR001
f9dafb8f-da36-4d59-8f2a-16c6dc26379f	B000001597	1000	1000	BATCH001	FAKTUR001
8b5f2e43-7c54-4aeb-be58-b550b965d1ee	B000001339	1000	1000	BATCH001	FAKTUR001
cfc1dca1-f9b2-43e1-a0ac-4e4dd9429bcf	B000000953	1000	1000	BATCH001	FAKTUR001
c3f545cc-1d4b-4bc6-a7da-d4b3235a4da7	B000001079	1000	1000	BATCH001	FAKTUR001
5859021f-52be-4222-936a-f921071e5e40	B000001013	1000	1000	BATCH001	FAKTUR001
447cd6e5-c9fb-480e-b002-66cbba821f9a	B000000908	1000	1000	BATCH001	FAKTUR001
c6742dde-93ec-411c-85ef-4f320f96886b	B000000477	1000	1000	BATCH001	FAKTUR001
7e2e79e7-5075-4a6d-8f0b-5b7a1ac03f4e	B000001372	1000	1000	BATCH001	FAKTUR001
6a13be3a-16c1-417f-ae50-9c797d8c46fb	B000000662	1000	1000	BATCH001	FAKTUR001
cbad02f7-b9f2-4872-82dc-051899b5c83d	B000001658	1000	1000	BATCH001	FAKTUR001
725553f9-bd12-4c16-8a09-b37046695fde	B000000890	1000	1000	BATCH001	FAKTUR001
32877f0c-ab57-4049-838b-a2d96b322bb0	B000000917	1000	1000	BATCH001	FAKTUR001
ae416c12-334d-49a3-ae8d-b8efdd93c1b9	B000001937	1000	1000	BATCH001	FAKTUR001
e098b8c5-327e-4f4a-a560-fffcfad0d60d	B000000676	1000	1000	BATCH001	FAKTUR001
da15047a-54a3-4fd2-8255-8010e8db56ce	A000000032	1000	1000	BATCH001	FAKTUR001
6db0799a-f31f-49e0-9618-ed3d5b10bd26	B000001699	1000	1000	BATCH001	FAKTUR001
95f60a14-7d3e-4b35-ad71-53078bac1101	B000001144	1000	1000	BATCH001	FAKTUR001
23fc3fe8-f8ac-4fa9-8e71-28ad4085fd35	B000001251	1000	1000	BATCH001	FAKTUR001
7273ba98-83e4-4283-96e2-8d8d622351bd	B000000876	1000	1000	BATCH001	FAKTUR001
8d0877b8-a548-4cb1-88af-e2d91cff5d73	B000001124	1000	1000	BATCH001	FAKTUR001
e519244c-8d26-4201-92f5-fc54aff95194	B000001845	1000	1000	BATCH001	FAKTUR001
8153535b-7bbf-4650-b732-caa7c93251c6	B000000834	1000	1000	BATCH001	FAKTUR001
d2710236-edc2-424c-9db8-aa4bf5857b18	B000001935	1000	1000	BATCH001	FAKTUR001
98e2c91a-19f3-44c5-9c94-a3c87ae3fa63	B000000305	1000	1000	BATCH001	FAKTUR001
b0a24cdd-7e00-4dce-a7f4-c111921e138d	B000001920	1000	1000	BATCH001	FAKTUR001
a157205b-ad69-4610-bace-8af799ea4426	B000000817	1000	1000	BATCH001	FAKTUR001
6fa5236e-d406-4633-90fa-bbad511d230c	B000000700	1000	1000	BATCH001	FAKTUR001
d93d8409-f221-4e51-aff9-50bb4edef813	B000001149	1000	1000	BATCH001	FAKTUR001
190fe7d6-db7c-4b3b-acbb-4ab6fb33aef7	B000000421	1000	1000	BATCH001	FAKTUR001
f262e96f-91df-4a35-92ad-55c9e7ca4fa4	A000000102	1000	1000	BATCH001	FAKTUR001
5ae60834-b649-4c06-8a5f-52dc5bfc6d81	B000000773	1000	1000	BATCH001	FAKTUR001
bff51467-a42d-481f-8486-b00df8e08587	B000000784	1000	1000	BATCH001	FAKTUR001
61bffcba-377b-43df-87b5-d908faa94adf	B000001048	1000	1000	BATCH001	FAKTUR001
a71ed0fb-45fb-4ca4-b8fc-39222c901138	B000000979	1000	1000	BATCH001	FAKTUR001
c677da49-cd84-4f80-9acd-8241f06dc3cb	B000000294	1000	1000	BATCH001	FAKTUR001
79349e86-23ab-460c-99ca-770af202606f	B000001018	1000	1000	BATCH001	FAKTUR001
c92c5e3a-26e3-4a95-bfb5-77fdf1b6b777	B000001465	1000	1000	BATCH001	FAKTUR001
f3141011-0969-4fc2-8f56-865d68b5d337	B000001577	1000	1000	BATCH001	FAKTUR001
7c8ba6ff-a8cc-4d46-9552-85344a7803b7	B000000390	1000	1000	BATCH001	FAKTUR001
b9c4db4b-e3cb-465f-ad33-9712ac2aaa24	B000000841	1000	1000	BATCH001	FAKTUR001
0f034ea1-954a-41e0-acb4-4bd4ab649977	B000001113	1000	1000	BATCH001	FAKTUR001
2596ff25-7e11-42ba-85a9-d60299c1ba6c	B000001390	1000	1000	BATCH001	FAKTUR001
6790c54f-efb2-492b-894c-c5b1a9fdcad6	B000001238	1000	1000	BATCH001	FAKTUR001
b7206122-ba7c-4942-9ea6-5eca4b87e7d2	B000001230	1000	1000	BATCH001	FAKTUR001
e71521a0-cb57-47d7-9652-334a020915f2	A000000063	1000	1000	BATCH001	FAKTUR001
8953b485-9401-4383-86b9-f9ead012c1e0	B000001066	1000	1000	BATCH001	FAKTUR001
753d0f3e-0f98-41e7-a9cb-7052872a82e2	B000001330	1000	1000	BATCH001	FAKTUR001
2f3e9e05-3477-41c7-bb08-ea4ddaaa4e72	B000001925	1000	1000	BATCH001	FAKTUR001
43d5f02d-ce3e-44e0-9f45-838799780fb1	B000001160	1000	1000	BATCH001	FAKTUR001
a75ac69c-6817-4585-aa22-cf4794ad8023	B000000806	1000	1000	BATCH001	FAKTUR001
05c3f09d-ba9a-4ead-a08f-78206fc11018	B000001265	1000	1000	BATCH001	FAKTUR001
eec79abb-f1db-4b0f-a769-afd4c5e699dc	B000000158	1000	1000	BATCH001	FAKTUR001
c86a3eb6-c58f-43b9-8185-1651735a32db	B000001739	1000	1000	BATCH001	FAKTUR001
6c226437-722d-4fc6-b1ec-46b8f8be3149	B000000874	1000	1000	BATCH001	FAKTUR001
0212566b-2e25-49e3-91aa-1811da4029f8	B000000992	1000	1000	BATCH001	FAKTUR001
221c797f-5d99-4be4-b9ae-700485e04995	B000000238	1000	1000	BATCH001	FAKTUR001
99a02bc0-645c-41a1-a1b0-50d143ebe419	B000000359	1000	1000	BATCH001	FAKTUR001
79b150c6-00b8-4b65-993c-b1372da10f3b	B000000370	1000	1000	BATCH001	FAKTUR001
1e46d295-f5c2-4371-ad04-44e90828f11c	B000001813	1000	1000	BATCH001	FAKTUR001
ec65afac-893d-4261-b3c6-7abc8a510324	B000000914	1000	1000	BATCH001	FAKTUR001
6a7e11d6-22fe-4293-919f-8160285ff5fa	B000001253	1000	1000	BATCH001	FAKTUR001
da8dd7da-dc26-470c-a1a5-4ace59273d4b	B000001108	1000	1000	BATCH001	FAKTUR001
ef6ea777-4fca-468a-a6c3-ebcad5cd1aae	B000001429	1000	1000	BATCH001	FAKTUR001
e7858062-b527-47d8-aa95-ccf71d3f74b8	B000000838	1000	1000	BATCH001	FAKTUR001
54f25654-eea0-4526-b295-724a0b42485d	B000000567	1000	1000	BATCH001	FAKTUR001
c1caf07c-5265-4b44-9def-620f0f97932b	B000001120	1000	1000	BATCH001	FAKTUR001
45cfad83-bfec-48c7-a01d-1eda11918714	B000001402	1000	1000	BATCH001	FAKTUR001
e1e60c16-56a4-464c-a43e-841d77e0f7d8	B000000780	1000	1000	BATCH001	FAKTUR001
769f9dbe-557d-4053-b436-7061f931520c	B000000783	1000	1000	BATCH001	FAKTUR001
92ce45bb-2c83-4fc1-91fb-c07a76700d10	B000000553	1000	1000	BATCH001	FAKTUR001
603671e7-86bd-46e1-8735-5f2797fb61e9	B000001613	1000	1000	BATCH001	FAKTUR001
4f9c7f42-afab-4465-8587-e1741d12e0fb	B000001933	1000	1000	BATCH001	FAKTUR001
2596ed1f-0a4c-4b08-ae7f-57bba4908bd9	B000000194	1000	1000	BATCH001	FAKTUR001
bfd7d39c-0cb6-4117-bcdd-24ee0d178902	B000001675	1000	1000	BATCH001	FAKTUR001
b2a6e260-4250-4739-acbf-691016389262	B000000363	1000	1000	BATCH001	FAKTUR001
fa82ad48-1c88-4195-825a-8e4c6b1b8ab9	B000001812	1000	1000	BATCH001	FAKTUR001
b4abcd5a-6f47-4fb7-a1a0-a694ed6f1080	B000000111	1000	1000	BATCH001	FAKTUR001
2d31435b-06a9-4ac1-bb74-fba141332fde	B000001979	1000	1000	BATCH001	FAKTUR001
fb21eaa8-18c5-4bf2-a21a-826baf50fd2a	B000001950	1000	1000	BATCH001	FAKTUR001
fa6a7d2c-6219-40a1-bf9e-0d183ce5ef0e	B000001381	1000	1000	BATCH001	FAKTUR001
b3c82895-3a5c-49bd-8664-c282a494355c	B000001378	1000	1000	BATCH001	FAKTUR001
6b8883b4-e377-43c0-9c52-5d8bb500a0ad	B000002034	1000	1000	BATCH001	FAKTUR001
10d244ce-7d1a-4f88-a4a5-616455a9c180	B000000989	1000	1000	BATCH001	FAKTUR001
86e2a9e9-7115-41e3-99f2-3a671200f803	B000000001	1000	1000	BATCH001	FAKTUR001
94374167-fa1e-47b1-9fe7-f634ee9dce81	B000001533	1000	1000	BATCH001	FAKTUR001
5e298bc1-9e68-4dc3-b820-be739847c7cc	B000000339	1000	1000	BATCH001	FAKTUR001
0475cc7c-c4f1-44d7-b247-885d94c7cc4e	B00000186	1000	1000	BATCH001	FAKTUR001
72760fef-8a72-461d-a3a7-443c2854f055	B000000793	1000	1000	BATCH001	FAKTUR001
d9029aa4-83d7-4248-98c8-dc9ee96416d7	B000000617	1000	1000	BATCH001	FAKTUR001
9f53f431-91bd-4f2f-b895-b1ed61dbbf1f	B000001136	1000	1000	BATCH001	FAKTUR001
fc9d12bd-3298-4490-afdb-df50d0599c2f	B000000743	1000	1000	BATCH001	FAKTUR001
d766e403-3deb-4bf4-9208-59872d841aae	A000000088	1000	1000	BATCH001	FAKTUR001
125547cf-e9f8-40ae-92d3-45baedbb30bb	B000001757	1000	1000	BATCH001	FAKTUR001
402b70b7-1b6d-46ad-a52b-d8a20197165a	B000000125	1000	1000	BATCH001	FAKTUR001
40dd4a2e-085e-4fd4-9003-02536a82925b	B000000434	1000	1000	BATCH001	FAKTUR001
0cc28aac-fe5b-47f7-99ce-17f850e321b4	B000001951	1000	1000	BATCH001	FAKTUR001
22f720a1-1b4d-420c-871e-2ee2a6244577	B000008008	1000	1000	BATCH001	FAKTUR001
d703852f-b9e6-4675-808e-0207d2a60e74	B000000350	1000	1000	BATCH001	FAKTUR001
e7d9a785-f5c0-4fb0-bccc-e14e1838ccb2	B000001449	1000	1000	BATCH001	FAKTUR001
53fb86ad-f961-4f36-a375-b811286e8ce5	B000001282	1000	1000	BATCH001	FAKTUR001
5d6b505a-916a-4307-a59d-dbe521db30c1	B000001719	1000	1000	BATCH001	FAKTUR001
470f5919-3028-4844-b751-f833ec51c691	B000000164	1000	1000	BATCH001	FAKTUR001
4ed40da0-16be-44e2-a131-fc44634ff78d	B000000320	1000	1000	BATCH001	FAKTUR001
aa0db888-4f0c-4389-ae00-e41874cbc494	B000001488	1000	1000	BATCH001	FAKTUR001
21c6909b-ac21-4326-9ba6-173415dd9f87	A000000054	1000	1000	BATCH001	FAKTUR001
372f160f-c276-406d-952c-b42f8e47d945	B000001633	1000	1000	BATCH001	FAKTUR001
46b8ba54-14a0-43ac-a010-16f3416b0d76	B000001855	1000	1000	BATCH001	FAKTUR001
0a1aa256-1bc2-4ea9-9db4-d42f1dc0ea12	B000000642	1000	1000	BATCH001	FAKTUR001
6cf2de1b-3f54-4443-90dc-87257a0f178e	A000000052	1000	1000	BATCH001	FAKTUR001
e4ad35ea-6750-4e89-9239-44476eeb0faa	B000000871	1000	1000	BATCH001	FAKTUR001
79058a24-0778-42fc-b685-f0ee2e4ee03a	A000000013	1000	1000	BATCH001	FAKTUR001
a4c636ca-2f76-47bb-8071-03a5465bf475	B000001116	1000	1000	BATCH001	FAKTUR001
78e7c614-f8a5-4681-b212-69acb6076d26	B000001447	1000	1000	BATCH001	FAKTUR001
b0da50c3-7cda-4629-8511-fe40f827815d	B000001628	1000	1000	BATCH001	FAKTUR001
8abf196e-ea00-49c6-8092-11498963f8c7	B000000250	1000	1000	BATCH001	FAKTUR001
cf167095-ce3b-44c0-9ad4-51af032436f5	B000001391	1000	1000	BATCH001	FAKTUR001
d5272251-bd9c-47d3-a10f-0955b8049a6d	B000001181	1000	1000	BATCH001	FAKTUR001
f6001882-bcd9-4d62-babd-7152dbd69d2c	B000001971	1000	1000	BATCH001	FAKTUR001
4061d561-c730-4b43-b010-67447511519a	B000000734	1000	1000	BATCH001	FAKTUR001
ba9f34b5-fe0b-43b4-a0a6-5c9169c468c0	B000000465	1000	1000	BATCH001	FAKTUR001
4e9dce5a-a32d-445e-a418-aa95d3698e3a	B000001085	1000	1000	BATCH001	FAKTUR001
90fbb036-a0b3-4599-998c-aeeb5ccfdb8f	B000001778	1000	1000	BATCH001	FAKTUR001
6fc41abc-465d-48a9-9441-f30cdbd849ee	B000001840	1000	1000	BATCH001	FAKTUR001
40fd620c-8999-4b87-9682-b476f344845f	B000001352	1000	1000	BATCH001	FAKTUR001
c362e738-e037-49a0-a99c-76923bbb3dca	B000001007	1000	1000	BATCH001	FAKTUR001
d406aa1d-5895-4f02-a1ed-e2b8c72da3a1	B000000939	1000	1000	BATCH001	FAKTUR001
a2259ccb-004e-49a4-bae3-b41d0b060bf1	B000001580	1000	1000	BATCH001	FAKTUR001
7292a167-434d-443b-8eab-27ba9056f019	B000001905	1000	1000	BATCH001	FAKTUR001
becee91c-66e0-43a2-b67d-f47bf3f4423e	B000001516	1000	1000	BATCH001	FAKTUR001
1f264280-6003-4f80-b526-578132bda4b7	B000001087	1000	1000	BATCH001	FAKTUR001
486b970f-01a7-4c3f-9dc2-6551769c16af	B000000802	1000	1000	BATCH001	FAKTUR001
a93ea931-4e15-40b6-84a5-b42cd8ca5a1e	B000001285	1000	1000	BATCH001	FAKTUR001
0df82f31-ca44-48e0-89a3-96f0f92de42e	B000001497	1000	1000	BATCH001	FAKTUR001
05f3f7a3-e12b-4a50-add9-507059835d05	B000001619	1000	1000	BATCH001	FAKTUR001
c434381b-1c3e-411c-8a71-722578319684	B000001059	1000	1000	BATCH001	FAKTUR001
9b1c7e95-fe43-4477-8b7d-831d67944d8c	B000001209	1000	1000	BATCH001	FAKTUR001
521f9c62-49ee-4e98-b700-5b092d23d181	B000001585	1000	1000	BATCH001	FAKTUR001
9e29f307-ccef-4bff-8f15-f979aa548aea	B000002002	1000	1000	BATCH001	FAKTUR001
ebbb0cd6-2afb-44d3-8395-53f9cf37c1e3	B000001030	1000	1000	BATCH001	FAKTUR001
0c9d55fa-06c8-4a55-b7d3-a33e59038013	B000001867	1000	1000	BATCH001	FAKTUR001
25d27af9-2fc4-40ed-b0ea-82601c1955d4	B000000258	1000	1000	BATCH001	FAKTUR001
36158412-a914-4b66-8d24-3c28e73bcca3	B000001051	1000	1000	BATCH001	FAKTUR001
800d2a82-3ea4-4cb5-91a2-c621859c8e71	A000000016	1000	1000	BATCH001	FAKTUR001
21b39151-5244-4b90-b5bf-aff601fce06d	B000000091	1000	1000	BATCH001	FAKTUR001
4448ed25-126d-440c-83b8-4c4a58c0d395	A000000039	1000	1000	BATCH001	FAKTUR001
4941129a-78c4-4fd0-bdb3-1b48cf9f3bc2	B000001247	1000	1000	BATCH001	FAKTUR001
c8ebc5f4-b3fd-4173-a42a-e634f638e143	B000000155	1000	1000	BATCH001	FAKTUR001
0b873d92-e0b3-4a9d-88d5-2273814559de	B000001451	1000	1000	BATCH001	FAKTUR001
c8686593-6c1a-4ed0-8863-434f29b7b107	B000001355	1000	1000	BATCH001	FAKTUR001
850f6279-7005-49f7-bdc0-4e8268d9e31d	B000001234	1000	1000	BATCH001	FAKTUR001
c51ad9e2-884d-48b0-9dac-aa3b59921f88	B000001046	1000	1000	BATCH001	FAKTUR001
f315863b-9ca6-4f0b-a775-d03bee1cab74	B000001297	1000	1000	BATCH001	FAKTUR001
b8c3162e-1bd1-4dde-b098-21a77db6e6ce	A000000021	1000	1000	BATCH001	FAKTUR001
3192ffdc-1e3c-4d4e-b3ac-c44b5cf7fd3f	B000001320	1000	1000	BATCH001	FAKTUR001
f7c0655c-986a-4ef8-bfad-a4f338ea9062	B000001392	1000	1000	BATCH001	FAKTUR001
3d26c331-b2cd-4d48-8fdb-9cc937942f4f	B000001425	1000	1000	BATCH001	FAKTUR001
ef2e9a71-d309-446a-9799-8cf2c4cdc454	B000000419	1000	1000	BATCH001	FAKTUR001
40b86938-cb4f-418f-a205-3d25aa70fa7b	B000001389	1000	1000	BATCH001	FAKTUR001
e64f7a7a-ea93-4260-9234-46e900d6245f	B000000280	1000	1000	BATCH001	FAKTUR001
10c26b37-f9e0-4779-a96f-774b0d9ba9ef	A000000064	1000	1000	BATCH001	FAKTUR001
0b9ad53d-3dc1-4a5e-88da-9f9f8d7dcdea	B000001138	1000	1000	BATCH001	FAKTUR001
828d7640-ff44-4ba7-8799-05385579071d	B000000903	1000	1000	BATCH001	FAKTUR001
98690f77-6bdf-4f91-8af6-1fb5f693d51c	B000001044	1000	1000	BATCH001	FAKTUR001
ac715361-5c9e-40c9-8a83-efd1d8e98584	B000001373	1000	1000	BATCH001	FAKTUR001
d5b9314e-1239-41a8-8630-28b38b370349	B000001566	1000	1000	BATCH001	FAKTUR001
59ae2fb3-756e-4755-8aa0-4c21884480b5	B000001300	1000	1000	BATCH001	FAKTUR001
ac8d51c8-3ab3-4fb7-93fd-a7ffb0a68841	A000000022	1000	1000	BATCH001	FAKTUR001
e99b7573-cc62-43cc-a62a-3007314fe5f0	A000000080	1000	1000	BATCH001	FAKTUR001
892e3a30-74e2-4607-852f-eb65bc0a66f8	B000001705	1000	1000	BATCH001	FAKTUR001
3d25700a-84f6-45e7-9ab8-27e5aebf017a	B000000119	1000	1000	BATCH001	FAKTUR001
d2077be1-5354-4e26-a639-5733a8a70422	B000001883	1000	1000	BATCH001	FAKTUR001
7384e589-2f8e-405e-95fd-0a28b915828f	B000001273	1000	1000	BATCH001	FAKTUR001
4c7f0ea4-0ce6-4b92-b17e-295ec8e4e4ac	A000000797	1000	1000	BATCH001	FAKTUR001
3e2dfd74-a08c-492a-b3c7-0e1912f58227	B000000628	1000	1000	BATCH001	FAKTUR001
570af4e1-3a63-43ee-ac31-4552001134de	B000000974	1000	1000	BATCH001	FAKTUR001
0b25f5f9-0213-4142-99f9-704c5dbb0c41	B000001252	1000	1000	BATCH001	FAKTUR001
7701ae16-0c14-4996-9c55-8f1dd08ea715	B000001458	1000	1000	BATCH001	FAKTUR001
a50822f9-d51f-4689-8e50-bc044d601bd0	B000000740	1000	1000	BATCH001	FAKTUR001
ccea237c-8bec-48fb-ba03-c86a31260a50	B000001386	1000	1000	BATCH001	FAKTUR001
75b451fd-b713-46da-ac9d-597b9d04602b	B000001004	1000	1000	BATCH001	FAKTUR001
dfe10b1e-7e10-4349-8688-ae0bba7503cd	B000001473	1000	1000	BATCH001	FAKTUR001
0b9d733e-5b2a-44cc-b543-bb57629354f7	B000000440	1000	1000	BATCH001	FAKTUR001
36a98555-60dd-4398-8da4-4f0cb6fbc125	B000001099	1000	1000	BATCH001	FAKTUR001
b7462664-b195-4839-a3e4-2e0cfb4c72f6	B000000245	1000	1000	BATCH001	FAKTUR001
d8f6ddad-b44a-45b8-8ae3-2c0b6714743e	B000000668	1000	1000	BATCH001	FAKTUR001
1b1fdd34-1d9f-4edc-ac16-eabbc2988059	B000000169	1000	1000	BATCH001	FAKTUR001
36cc9599-9edf-4de5-9916-688568a73e1b	B000000807	1000	1000	BATCH001	FAKTUR001
aa28d294-13f4-4338-8feb-5b76ef01b0f5	A000000044	1000	1000	BATCH001	FAKTUR001
b49ea603-bac1-4aa9-9b10-d547e104ebfb	B000000461	1000	1000	BATCH001	FAKTUR001
a4533f32-0b6e-410d-82ad-2fc4ada001e4	B000000941	1000	1000	BATCH001	FAKTUR001
1f7c9b15-716c-471b-b11e-8d6e7be14c5e	B000001078	1000	1000	BATCH001	FAKTUR001
f1771dfb-1e6c-4b10-8894-4238e39e1a7e	B000002008	1000	1000	BATCH001	FAKTUR001
438c5fac-cfbc-46aa-8468-d2ea7eede162	B000001368	1000	1000	BATCH001	FAKTUR001
b6983d71-3ef3-4c8b-924e-a0cb896a6727	B000000338	1000	1000	BATCH001	FAKTUR001
fb8f3a7f-864e-413f-97cf-99300ae1f4e6	B000001873	1000	1000	BATCH001	FAKTUR001
2cbfe570-dccc-4d5d-a228-70f6b9ff4ade	C000000007	1000	1000	BATCH001	FAKTUR001
693affe8-73c7-4787-9a2c-464f754787f3	B000001171	1000	1000	BATCH001	FAKTUR001
4934787a-d79d-4729-b8c1-66457b7ecd32	B000001365	1000	1000	BATCH001	FAKTUR001
1dc6df10-d6e9-432a-a28b-750ce6043450	B000001850	1000	1000	BATCH001	FAKTUR001
9dbbf499-4dc1-477e-87d9-86e3af8439ac	B000001166	1000	1000	BATCH001	FAKTUR001
15aed5a6-151b-473b-a7be-dfacf09847ae	B000001674	1000	1000	BATCH001	FAKTUR001
bc566101-dfcb-471f-b737-ec6a57ae04fc	B000000823	1000	1000	BATCH001	FAKTUR001
967ed427-d5c2-41d5-9fc9-4437c3f4e883	B000001216	1000	1000	BATCH001	FAKTUR001
537c91fe-2f80-41db-a8b6-0baf6d708d3a	B000001962	1000	1000	BATCH001	FAKTUR001
31675021-1a59-4357-b98b-86bab30c0697	B000000862	1000	1000	BATCH001	FAKTUR001
9cd97d62-92e6-44ad-a92b-c42f68071ea5	B000000101	1000	1000	BATCH001	FAKTUR001
87523089-d598-4502-9cb8-add7ab94f56a	B000000640	1000	1000	BATCH001	FAKTUR001
8fea08d8-aecf-4efc-a630-b372d4bc315f	B000000448	1000	1000	BATCH001	FAKTUR001
b21d54ed-6970-4a6a-aa1c-09d54a2fdc75	B000001279	1000	1000	BATCH001	FAKTUR001
926c30f3-929d-49dc-b4f4-59bac6af00e8	B000001741	1000	1000	BATCH001	FAKTUR001
e0f1d9e0-233b-4da5-ac36-ef9ecfa124a6	B000000778	1000	1000	BATCH001	FAKTUR001
c94885f1-e0d9-4b18-bbcc-40afc61cecd5	B000000957	1000	1000	BATCH001	FAKTUR001
363c7bf0-a13d-4ee1-bdfc-70837a610ff4	B000001903	1000	1000	BATCH001	FAKTUR001
e4186cea-0bea-4c4c-8eac-28c38883d1cb	B000000237	1000	1000	BATCH001	FAKTUR001
20c7534a-c26a-4d8e-8c02-c195f5486e01	B000001186	1000	1000	BATCH001	FAKTUR001
0852f7fc-3c40-4297-ba40-90ea35a2a07b	B000001485	1000	1000	BATCH001	FAKTUR001
0bf026f5-e4db-4e21-abae-82673c3c321d	B000001889	1000	1000	BATCH001	FAKTUR001
04860a37-857a-412c-ba37-0768eeac466f	A000000015	1000	1000	BATCH001	FAKTUR001
0a8d209b-9e9d-4e8c-9c98-0038bd906af6	B000001621	1000	1000	BATCH001	FAKTUR001
5483732c-c9a1-4da3-a533-5695253731bb	B000001021	1000	1000	BATCH001	FAKTUR001
87320575-86da-4a47-9939-ca4037de5fd2	B000001717	1000	1000	BATCH001	FAKTUR001
5ed8df2a-beee-4999-b7d3-13b720b25967	B000000366	1000	1000	BATCH001	FAKTUR001
3542a0dc-fa22-42f6-994f-517836861ebb	B000001581	1000	1000	BATCH001	FAKTUR001
010c9d1e-a2de-46a1-a747-54efe61883d0	B000001140	1000	1000	BATCH001	FAKTUR001
a54e0e18-74d1-4319-aafc-8e9b60ca7dab	B000000368	1000	1000	BATCH001	FAKTUR001
1d317c77-833c-4060-8ea6-258729787dde	B000001394	1000	1000	BATCH001	FAKTUR001
7edd86e1-5525-4721-9b88-9edce4dc81fb	B000001476	1000	1000	BATCH001	FAKTUR001
0abe5cdf-8dc1-4c2a-be4f-ade0127f75fc	B000000664	1000	1000	BATCH001	FAKTUR001
ae847a5d-f7d2-437e-b7b7-64828c0a73df	B000001557	1000	1000	BATCH001	FAKTUR001
5644f4e7-d34a-4bc0-abc5-bed524298273	B000000090	1000	1000	BATCH001	FAKTUR001
07cd435f-b522-4875-b8c6-197a109fa16e	B000001655	1000	1000	BATCH001	FAKTUR001
bada005d-8d9e-4b5f-9881-af32f4437578	B000000926	1000	1000	BATCH001	FAKTUR001
083e9abb-0cb0-4e98-ae85-4fdda004da8e	B000000299	1000	1000	BATCH001	FAKTUR001
8278be93-c0db-41c2-ac03-a0461a4fadb8	B000000120	1000	1000	BATCH001	FAKTUR001
15fc617b-e3f1-4917-b3c4-c8fac68574b8	B000000152	1000	1000	BATCH001	FAKTUR001
60864140-50da-4ea3-be9b-4195257c0ede	B000000719	1000	1000	BATCH001	FAKTUR001
d071b7cd-6e0e-418e-8f7a-738b40b2613b	B000000352	1000	1000	BATCH001	FAKTUR001
3aaa5b38-b81b-4d6d-8fe2-223edd4f4fd3	B000001214	1000	1000	BATCH001	FAKTUR001
359c9a76-0023-4f12-916d-a66d4864f5c1	B000001490	1000	1000	BATCH001	FAKTUR001
2a79b252-afd8-4f58-a013-c05f94528282	B000000597	1000	1000	BATCH001	FAKTUR001
4f05abc2-aeb0-4e88-859d-fee0fafd7ef4	B000001295	1000	1000	BATCH001	FAKTUR001
2b96e3f5-1121-46e8-9857-ef4bfd56f0fe	B000001296	1000	1000	BATCH001	FAKTUR001
26d90bb6-fbbe-4ba6-aef1-6cb23b4c4853	B000000309	1000	1000	BATCH001	FAKTUR001
0b5e2bf8-3b12-4f66-b201-5a106e792816	B000001337	1000	1000	BATCH001	FAKTUR001
6d0389d7-6c78-4145-9116-fb4747b0b02d	B000001804	1000	1000	BATCH001	FAKTUR001
e4d90cdc-6be0-4989-b68b-de2b29053114	B000001687	1000	1000	BATCH001	FAKTUR001
0c7cb128-7822-4839-9ec9-6bdb302b51f3	C000000006	1000	1000	BATCH001	FAKTUR001
6cab91d4-baa3-48d6-a6bd-bfae237c59f1	B000001544	1000	1000	BATCH001	FAKTUR001
ed6e688c-1f48-438f-9d48-3074d907332b	B000001710	1000	1000	BATCH001	FAKTUR001
b806f026-2c0b-4a74-abeb-d7cefce9f60d	B000001438	1000	1000	BATCH001	FAKTUR001
9e9fcac4-4261-41a5-8ac6-da0120f0442c	B000001226	1000	1000	BATCH001	FAKTUR001
0b4238cf-c1b5-4c24-87b3-9036ed42d968	B000000396	1000	1000	BATCH001	FAKTUR001
5a990e13-4457-4f70-95da-377478bf6833	B000001486	1000	1000	BATCH001	FAKTUR001
17900566-34fa-4a0a-b453-975cc05fcda3	B000001571	1000	1000	BATCH001	FAKTUR001
cb5986e4-aec6-4d01-84e5-1c1dc5b18eb4	B000000701	1000	1000	BATCH001	FAKTUR001
6a66415d-ad3e-498d-9d66-b0bb23f33306	B000001276	1000	1000	BATCH001	FAKTUR001
8168c5cc-1908-4eb2-b243-278ffe061aa5	B000001401	1000	1000	BATCH001	FAKTUR001
d5883e42-1084-4cdf-9826-e23c31daec66	B000000456	1000	1000	BATCH001	FAKTUR001
33024103-b66a-46b3-ad90-0cd8b73c354e	B000000136	1000	1000	BATCH001	FAKTUR001
10c5ef5a-c125-4ad5-ae5b-620445d7a091	B000000843	1000	1000	BATCH001	FAKTUR001
c285fab3-756e-4494-b4ef-0a7f50d76648	B000000337	1000	1000	BATCH001	FAKTUR001
8eef774d-f07b-4e5a-b412-e17f747699ee	B000000204	1000	1000	BATCH001	FAKTUR001
3f637b69-b144-4bd7-aefc-371dcc5628fb	B000000956	1000	1000	BATCH001	FAKTUR001
61186d2f-4c52-4250-b03c-871ebb88d60f	B000000626	1000	1000	BATCH001	FAKTUR001
c3ffeaf5-c2c4-4482-a320-ab7cf316d45b	B000001500	1000	1000	BATCH001	FAKTUR001
12e49ab8-73df-479d-8a32-13560ee18abc	B000000728	1000	1000	BATCH001	FAKTUR001
54ca33b8-12cc-449b-978d-6ed7ef7551a5	B000001088	1000	1000	BATCH001	FAKTUR001
1c91d6c9-6e8e-47a1-bc65-415e3cc3a173	B000001178	1000	1000	BATCH001	FAKTUR001
6389018b-f96d-4d94-9ef0-5eb9f0b8e1ee	B000001418	1000	1000	BATCH001	FAKTUR001
e3d02833-4de1-4a39-8006-500775f9771f	B000001550	1000	1000	BATCH001	FAKTUR001
48e8fdf3-3c0a-4b71-8cf9-4e7bf20c075e	B000001796	1000	1000	BATCH001	FAKTUR001
8b43862a-07ab-4e72-9b97-9ae72645d541	B000000812	1000	1000	BATCH001	FAKTUR001
6313ce92-be1a-47f8-9939-14ff84f261d8	B000000739	1000	1000	BATCH001	FAKTUR001
d5318640-434f-4665-9730-498ea45f085b	B000000329	1000	1000	BATCH001	FAKTUR001
9655cedf-3616-41d1-8583-614153542abd	B000000799	1000	1000	BATCH001	FAKTUR001
a4253c24-78ee-4668-9f0a-16b7f4be321b	B000000443	1000	1000	BATCH001	FAKTUR001
05c93804-a9ae-4a3c-b00b-9c9bc0b45e00	B000001200	1000	1000	BATCH001	FAKTUR001
bd0364cb-84e8-46d4-9c77-eb4123de2b86	B000000624	1000	1000	BATCH001	FAKTUR001
83495bd2-063c-4557-a31b-69223f2a8020	B000000162	1000	1000	BATCH001	FAKTUR001
56dc39ee-7108-46ef-ac0a-557b779a7111	B000001522	1000	1000	BATCH001	FAKTUR001
7969e07b-9066-4cb9-a466-63b4070b7bf3	B000000627  	1000	1000	BATCH001	FAKTUR001
2798fdb0-4724-4f18-b3d5-344d32b89f6e	B000000715	1000	1000	BATCH001	FAKTUR001
1ccbde62-0429-44b9-8aac-f2c35785acc2	B000001942	1000	1000	BATCH001	FAKTUR001
3c0fb220-df24-4a48-be05-6b8201fa3a61	B000000579	1000	1000	BATCH001	FAKTUR001
5b167f45-3d31-43db-be24-260b634478f1	B000001384	1000	1000	BATCH001	FAKTUR001
06f7a407-9919-4fd0-b298-5fe76c5402ac	B000001511	1000	1000	BATCH001	FAKTUR001
b2ebc92c-b3a4-4326-8b41-aee29f0da0ab	B000000314	1000	1000	BATCH001	FAKTUR001
9450f1c6-846d-47ef-938f-91c63b415130	B000000935	1000	1000	BATCH001	FAKTUR001
08c28bfa-8072-4262-8b3a-4a5c2b7bfa77	B000001080	1000	1000	BATCH001	FAKTUR001
7ab69643-09c5-4f32-9ad5-1aa1f6dbdd9e	B000000146	1000	1000	BATCH001	FAKTUR001
ed0b1f50-05ce-478b-baaa-da41c1d09048	B000000334	1000	1000	BATCH001	FAKTUR001
349d35a0-284b-4083-9335-efc38dc4b15e	B000000377	1000	1000	BATCH001	FAKTUR001
49bdbd42-303c-4f9e-99c1-6f179478d6b3	B000001344	1000	1000	BATCH001	FAKTUR001
192477fb-6739-4cbd-bd3c-f3b7ff8c4583	B000002017	1000	1000	BATCH001	FAKTUR001
d3a3ecd9-1a70-4782-9f69-5afa8f2a697c	VAK001	1000	1000	BATCH001	FAKTUR001
d734e123-e7c5-4e23-b885-181e5dc08ea5	B000001879	1000	1000	BATCH001	FAKTUR001
18f94e21-2a61-40e8-96d7-f68717966143	B000001746	1000	1000	BATCH001	FAKTUR001
890f6263-f7e7-493b-9281-a4b412ce0f15	B000001233	1000	1000	BATCH001	FAKTUR001
7050064d-3d17-45a2-8735-8b2149bda8b6	B000001540	1000	1000	BATCH001	FAKTUR001
4c3c5e22-8506-418f-88b0-da04abda1918	B000008015	1000	1000	BATCH001	FAKTUR001
39a7f75e-3267-4565-9998-a31d56f71765	B000001271	1000	1000	BATCH001	FAKTUR001
f7fb6951-7874-4ede-8137-bc0d88a99a7b	B000000983	1000	1000	BATCH001	FAKTUR001
f187e4ff-678a-43c1-a033-dd37766434e6	B000001656	1000	1000	BATCH001	FAKTUR001
338f93a6-81f4-42b5-b785-0eda1b39f027	B000000978	1000	1000	BATCH001	FAKTUR001
6f12d07c-8c51-4c07-9eb4-2b6d847b143d	B000002009	1000	1000	BATCH001	FAKTUR001
5adfb536-b974-4bb5-8ae0-04a97b384613	B000000847	1000	1000	BATCH001	FAKTUR001
d0b7b606-aa37-4fd1-a6d4-2da3f94fdacf	B000001179	1000	1000	BATCH001	FAKTUR001
e30fa56f-705d-411c-8abd-08cc7fe84e1b	B000001985	1000	1000	BATCH001	FAKTUR001
f811cd27-ce11-4809-82b2-1539b2f4ccba	B000000927	1000	1000	BATCH001	FAKTUR001
b8954e03-cb11-42b8-997e-0051a174f372	B000001724	1000	1000	BATCH001	FAKTUR001
dbe18dab-fa97-4809-954e-9cff99e0be4e	B000000885	1000	1000	BATCH001	FAKTUR001
b239e830-2194-40f0-a36a-e8d783ba6443	B000001785	1000	1000	BATCH001	FAKTUR001
fedae3dd-0eb9-4005-b0da-56de88999a6e	B000000417	1000	1000	BATCH001	FAKTUR001
9426576c-3d84-4677-82c8-7e87486c5010	B000000291	1000	1000	BATCH001	FAKTUR001
3e3848f9-c0e4-4d9e-9d1f-0191eb72549a	B000001199	1000	1000	BATCH001	FAKTUR001
8de64313-d9aa-402b-9b7c-5f7c336f7cd5	B000001211	1000	1000	BATCH001	FAKTUR001
c2e425e5-72af-440e-8936-a89c7a6a1d2a	B000001995	1000	1000	BATCH001	FAKTUR001
1830109b-6656-4650-967d-c9b7958d5869	B000002006	1000	1000	BATCH001	FAKTUR001
3f8a07f9-68e9-429f-bb07-ca17d0c97a95	B000001929	1000	1000	BATCH001	FAKTUR001
308a24d9-aa9c-4284-a6f3-ac5e6cab9cef	B000000110	1000	1000	BATCH001	FAKTUR001
cc0c7776-bd17-4b87-94df-63796659a552	B000000703	1000	1000	BATCH001	FAKTUR001
a1a2c548-5345-4570-957b-2fb8eee75b95	B000001560	1000	1000	BATCH001	FAKTUR001
b9749416-365f-4ea4-b6cc-41552ecbb651	2018003	1000	1000	BATCH001	FAKTUR001
033006c9-f09d-43b9-9e49-43b48834dbaf	B000000896	1000	1000	BATCH001	FAKTUR001
b9c9e562-8759-458c-84b0-847333626353	B000000995	1000	1000	BATCH001	FAKTUR001
548f4330-b87e-4e05-b857-1a96997b312a	B000001164	1000	1000	BATCH001	FAKTUR001
cd70eb93-d147-4f7a-be80-4c86c5aa4b66	B000001437	1000	1000	BATCH001	FAKTUR001
10f11cf0-0714-41ad-82d9-b5212cafcafd	B000000556	1000	1000	BATCH001	FAKTUR001
bba70080-2c55-46b6-8b69-c02176ee4ec5	B000001067	1000	1000	BATCH001	FAKTUR001
bcad3221-40b8-4c75-b273-bd2058c0ada7	B000001536	1000	1000	BATCH001	FAKTUR001
ea66b829-4950-49ad-a49b-caf6920100d9	B000000177	1000	1000	BATCH001	FAKTUR001
ced98c82-866c-4604-a05d-6a6c3c12a249	B000000619	1000	1000	BATCH001	FAKTUR001
c87699ed-bf18-4c48-b3ac-a20cdc1dd6c2	B000001646	1000	1000	BATCH001	FAKTUR001
43bfe099-412a-4e4b-9156-c67632c14542	B000000387	1000	1000	BATCH001	FAKTUR001
b7c892ca-d4ac-4191-89f2-2deeefbf4884	B000001513	1000	1000	BATCH001	FAKTUR001
36b49ada-e904-41da-87be-9a3f5b247fe9	B000001073	1000	1000	BATCH001	FAKTUR001
b465682c-2095-4f61-ab31-11b96cc0e0bf	B000000173	1000	1000	BATCH001	FAKTUR001
2565d2c5-5cb8-48e5-a437-8c469ee31043	B000001517	1000	1000	BATCH001	FAKTUR001
9494694a-d757-42d2-a664-2c7a7bf01d6d	B000001882	1000	1000	BATCH001	FAKTUR001
ee57b035-4711-4b5b-9d1d-c240248d115a	B000000161	1000	1000	BATCH001	FAKTUR001
7eff097c-e7af-48d1-a5e0-54f94867aa98	B000000178	1000	1000	BATCH001	FAKTUR001
8d76a477-0a74-4a7f-8c07-761013a22c01	B000001412	1000	1000	BATCH001	FAKTUR001
fd3e76cb-1186-48d1-9307-d001664d409c	B000001245	1000	1000	BATCH001	FAKTUR001
d460c185-e8bf-40d3-b161-de365fa8be35	B000001255	1000	1000	BATCH001	FAKTUR001
ce8a7658-a6ac-4a96-b233-9f4f2da3aeeb	B000001858	1000	1000	BATCH001	FAKTUR001
00be692f-0c45-423b-92e1-6996650ddd9e	B000001333	1000	1000	BATCH001	FAKTUR001
86c3eda2-2bd9-4e89-8a85-91f94a4d08b4	B000001427	1000	1000	BATCH001	FAKTUR001
28a1de6d-f5c4-4c9c-a6e3-7f8da1f0e00b	B000001637	1000	1000	BATCH001	FAKTUR001
a2ff7529-d849-45e0-84c6-b949e23f5aed	B000001045	1000	1000	BATCH001	FAKTUR001
6962c8d1-01c6-4c4c-a1d2-16421d630bbd	B000000759	1000	1000	BATCH001	FAKTUR001
5e3f6c59-d331-4158-9986-4249b7ae7596	B000000840	1000	1000	BATCH001	FAKTUR001
133e53d6-1974-4155-af23-75fde4420f2e	B000001919	1000	1000	BATCH001	FAKTUR001
c50971f4-8c04-443d-a7c8-f3c32a126c37	A000000078	1000	1000	BATCH001	FAKTUR001
f055205c-2c75-48f0-8498-cc0786e4e4bf	B000001302	1000	1000	BATCH001	FAKTUR001
6fcfec56-832f-4e76-a036-1a695fe9155f	B000002005	1000	1000	BATCH001	FAKTUR001
d7709c82-5a71-46a1-b061-c565d7af9c74	B000000790	1000	1000	BATCH001	FAKTUR001
aff192ad-88c1-4ec8-8c5f-fbd9aec830c3	B000000684	1000	1000	BATCH001	FAKTUR001
0357bb16-371a-4a55-a612-4e29c904368e	B000001837	1000	1000	BATCH001	FAKTUR001
f4052add-44e6-4581-abd2-3116f505ed29	B000000263	1000	1000	BATCH001	FAKTUR001
58d31536-94b9-4ec6-ba04-63ae03a67404	B000000660	1000	1000	BATCH001	FAKTUR001
502ad031-748b-45d7-a0cb-110600f64c55	B000001442	1000	1000	BATCH001	FAKTUR001
aa0fbbf1-e8c7-49d1-835c-4d8858e40a3c	B000001716	1000	1000	BATCH001	FAKTUR001
8adedfd2-d7e0-4c99-8f73-832fdeafc0fa	A000000004	1000	1000	BATCH001	FAKTUR001
1f706a32-0e4a-4341-b693-74a60dedcfcc	B000000401	1000	1000	BATCH001	FAKTUR001
fee0a44c-7cc0-416b-a7e3-9b7b951b6f92	A000000805	1000	1000	BATCH001	FAKTUR001
fbef8f76-3e1f-4ac6-9604-e59b2480635d	B000001534	1000	1000	BATCH001	FAKTUR001
4b82717f-3605-4421-86f6-c1f86cb9f027	B000000307	1000	1000	BATCH001	FAKTUR001
9917ddf5-92aa-49ee-a003-7cf6462a2620	B000000650	1000	1000	BATCH001	FAKTUR001
a3c21254-dbee-4d5c-b2a1-376701c37982	B000001914	1000	1000	BATCH001	FAKTUR001
ea67f605-1f3f-4371-9923-3bb61c6a64f0	B000001641	1000	1000	BATCH001	FAKTUR001
872fef07-82cb-489b-8cbb-c60a06c19cd8	B000000234	1000	1000	BATCH001	FAKTUR001
fe8fccd6-5e66-4539-8856-6d56b8a07cb6	B000001037	1000	1000	BATCH001	FAKTUR001
b0b7c8a9-684f-45cd-a13c-2c48ae012a7a	B000000863	1000	1000	BATCH001	FAKTUR001
085d2077-3a37-4475-b268-a0385ffcb829	B000000474	1000	1000	BATCH001	FAKTUR001
51ed2e5b-fcb8-4233-9775-b451c1dac8c3	B000001321	1000	1000	BATCH001	FAKTUR001
6a414f69-880d-4a01-b563-8f0408feda3e	B000002023	1000	1000	BATCH001	FAKTUR001
364bfc1e-7dd5-4989-af8d-268a6fb34be0	B000001527	1000	1000	BATCH001	FAKTUR001
f4a4c308-9bfa-4426-9f71-390a5d1f6117	B000001669	1000	1000	BATCH001	FAKTUR001
5735cfc9-b514-4e56-9289-aefe6b071498	B000001773	1000	1000	BATCH001	FAKTUR001
e3edde9b-fdf4-4a1b-b01e-16cb4ec04adc	B000001737	1000	1000	BATCH001	FAKTUR001
8cb7f31f-c06f-4c12-bb00-0089b13a1cd5	B000002033	1000	1000	BATCH001	FAKTUR001
36846620-f13b-4911-ba6a-4a271133950f	B000000557	1000	1000	BATCH001	FAKTUR001
c06ec54d-c15c-40f0-b045-1a07929c316f	B000001567	1000	1000	BATCH001	FAKTUR001
0927dd26-3122-4801-b229-19c9491999e7	B000000675	1000	1000	BATCH001	FAKTUR001
2392b07e-fb35-4eb9-9a2b-cf5a001bdc75	B000001842	1000	1000	BATCH001	FAKTUR001
e2425f91-ea27-42dd-80c0-e0f7e82c71fd	A000000106	1000	1000	BATCH001	FAKTUR001
cf87fecf-e5eb-44b1-97e5-8d5107c54c06	B000000344	1000	1000	BATCH001	FAKTUR001
4ab912a6-027d-4849-a6f3-f788d9b3ffe2	B000002015	1000	1000	BATCH001	FAKTUR001
2267ffa8-8635-4d03-8ee4-6037ffcda1e8	B000008020	1000	1000	BATCH001	FAKTUR001
ff580375-a016-4577-9d40-9c646a2a1d0d	B000001862	1000	1000	BATCH001	FAKTUR001
789f6757-734e-4820-ad53-95d73fe7a771	B000000259	1000	1000	BATCH001	FAKTUR001
fbf3dba0-ab62-492f-8e10-1dfb9041fa14	B000002018	1000	1000	BATCH001	FAKTUR001
2b2cce90-a364-45ec-8874-8bccfc6baac3	B000000918	1000	1000	BATCH001	FAKTUR001
59d1aca0-424a-46e7-8405-4ae276e81879	B000001895	1000	1000	BATCH001	FAKTUR001
2b263b84-ad3f-4a5b-8925-b9a7e428467b	B000000777	1000	1000	BATCH001	FAKTUR001
02e85f05-4c92-4018-92e4-01afc3e57549	B000000360	1000	1000	BATCH001	FAKTUR001
9310b788-7080-4d6b-a09f-6555f210d06b	B000000269	1000	1000	BATCH001	FAKTUR001
1abe2381-b3f1-407e-bb78-e4290d5186e6	B000001204	1000	1000	BATCH001	FAKTUR001
3d991aa8-1733-414e-9fc8-c061a761c3dc	B000000196	1000	1000	BATCH001	FAKTUR001
7d1613e4-f977-42b4-8027-1cb9c6dc8376	B000001096	1000	1000	BATCH001	FAKTUR001
da8e8e80-b1a6-49a0-80b7-3d6c75c73efd	B000001156	1000	1000	BATCH001	FAKTUR001
ae0ecc29-2d95-4a4b-b3fb-ad420f5c088d	A000000124	1000	1000	BATCH001	FAKTUR001
92f0fba7-e3f6-4f00-aa96-53cd6bd1dbd8	B000000875	1000	1000	BATCH001	FAKTUR001
13bd9c65-1bc6-4aa9-9c26-a89130e802db	B000000372	1000	1000	BATCH001	FAKTUR001
791dea0e-4816-4b98-a1ab-365cf8e8c2a4	B000001983	1000	1000	BATCH001	FAKTUR001
41100f4f-6f36-489f-b104-72a80120f98f	B000000170	1000	1000	BATCH001	FAKTUR001
71f72e0a-ba9d-4e1e-a104-fcf395b81c28	B000001555	1000	1000	BATCH001	FAKTUR001
10fcbf95-1d6f-4df9-b7f4-71b62ed3a644	B000001714	1000	1000	BATCH001	FAKTUR001
287e440e-261b-43ac-aa8b-87a60883bd33	B000001421	1000	1000	BATCH001	FAKTUR001
c5cd388b-8ed1-4406-9a5d-51a19919010a	B000001744	1000	1000	BATCH001	FAKTUR001
4c8323c4-2fd2-4c25-ae08-c296a34541bf	B000000764	1000	1000	BATCH001	FAKTUR001
a6b7b293-2a92-4bf2-a1e4-af7a999636e6	B000000659	1000	1000	BATCH001	FAKTUR001
0c4aca7b-00b2-4297-8558-72b10904919d	C000000005	1000	1000	BATCH001	FAKTUR001
4769489d-fded-41a1-9295-7d1a5248bb46	B000001348	1000	1000	BATCH001	FAKTUR001
bf1e24ff-f092-49f6-8901-628eb7b41a20	B000001948	1000	1000	BATCH001	FAKTUR001
da75fb22-86b3-41a9-bea1-9cff047f38cd	B000001788	1000	1000	BATCH001	FAKTUR001
a404abd6-6fb2-4872-a075-fab577398862	B000001379	1000	1000	BATCH001	FAKTUR001
3d63615d-6fde-4378-8672-a9493045a018	B000000877	1000	1000	BATCH001	FAKTUR001
e88ee042-c2ba-43c9-8350-73867693b6c4	B000000612	1000	1000	BATCH001	FAKTUR001
37fa30f9-e663-4609-a5ac-3d1d18244bb2	B000001443	1000	1000	BATCH001	FAKTUR001
d2cf1477-b384-424b-b843-ac1ff0739c97	B000001683	1000	1000	BATCH001	FAKTUR001
6a014a29-7888-4016-a30b-8eb125a3909f	B000001848	1000	1000	BATCH001	FAKTUR001
549b18b5-98e2-480f-ae25-88559b707e9e	B000001673	1000	1000	BATCH001	FAKTUR001
20b9d861-a2ca-44e8-b919-e9090bb78681	C000000001	1000	1000	BATCH001	FAKTUR001
36e4d36f-828f-490a-9a5c-f9311cef9555	B000001058	1000	1000	BATCH001	FAKTUR001
5b453c2a-363a-4580-848b-66005f114fd8	B000000796	1000	1000	BATCH001	FAKTUR001
a8b953a4-188c-4c78-92db-284d4e4c991d	B000001677	1000	1000	BATCH001	FAKTUR001
5bc93b46-e27b-4ac5-8bc5-81e416d8ed81	B000000130	1000	1000	BATCH001	FAKTUR001
00259379-ae1b-43e5-9015-2fa78e19e10e	B000000565	1000	1000	BATCH001	FAKTUR001
46d5f23b-98af-4731-acac-864a74042ec1	A000000796	1000	1000	BATCH001	FAKTUR001
cf6df217-f0bf-4ab6-98aa-5e06439c4743	B000000384	1000	1000	BATCH001	FAKTUR001
9d4d4213-748a-4cf6-bf14-1550acd02278	C000000003	1000	1000	BATCH001	FAKTUR001
c9b1d671-88d1-48ce-80e7-a17a61a3b2f9	B000000114	1000	1000	BATCH001	FAKTUR001
108dbcf2-0fd6-48c4-99cb-a0f9240b35aa	B000001515	1000	1000	BATCH001	FAKTUR001
742a0caa-d228-485a-9241-1453c1acd73b	B000001393	1000	1000	BATCH001	FAKTUR001
a6f8a62a-8389-4712-b4e2-48d214c60a32	B000001207	1000	1000	BATCH001	FAKTUR001
1f4cb95c-2abd-48c3-9a91-ab44e200f44a	B000000859	1000	1000	BATCH001	FAKTUR001
4cf2f51d-b8f5-45f5-9154-03c3c8de2dc0	B000001928	1000	1000	BATCH001	FAKTUR001
d7105260-ab9a-4d61-97e9-5ebcc801a875	B000000755	1000	1000	BATCH001	FAKTUR001
c7a6e61b-3d8b-4d11-a369-ca7086bf4e63	A000000075	1000	1000	BATCH001	FAKTUR001
b29fe3e6-636c-4b8f-a0f6-29e1a9560c03	B000000692	1000	1000	BATCH001	FAKTUR001
c842d352-50b7-48be-a987-9be5863d536c	B000000623	1000	1000	BATCH001	FAKTUR001
53490b9a-32ff-4648-8b16-3784b3d50e23	B000000430	1000	1000	BATCH001	FAKTUR001
f4b356f0-de04-4d5c-9c58-bbb242917b82	B000000822	1000	1000	BATCH001	FAKTUR001
2406c6e9-9159-4007-95f2-5a12b23d621c	B000008018	1000	1000	BATCH001	FAKTUR001
29f20076-bff0-4d8c-83cf-3f0597fc6aa4	B000000236	1000	1000	BATCH001	FAKTUR001
374e2ed2-08af-4f3a-8d1d-aae89750879d	B000001496	1000	1000	BATCH001	FAKTUR001
bb784e9d-e2c0-47b5-a036-dc50061837d5	B000000636	1000	1000	BATCH001	FAKTUR001
b444a778-f960-431a-a087-d0984e8f68b2	B000001439	1000	1000	BATCH001	FAKTUR001
03be8c76-5264-45aa-838d-647165d924c0	B000001732	1000	1000	BATCH001	FAKTUR001
3fc4cc85-903c-4510-9e20-12827e7e6e85	B000000816	1000	1000	BATCH001	FAKTUR001
972f4776-2608-4fb0-8fb6-f430e4194389	A000000123	1000	1000	BATCH001	FAKTUR001
3346dcd6-511e-4020-83f6-b25be1a0b18e	B000001315	1000	1000	BATCH001	FAKTUR001
968063c9-4e52-43f1-8381-8f1519d30b03	B000001823	1000	1000	BATCH001	FAKTUR001
363b2f6b-eddb-480e-a4c5-d3c51525fa36	B000001221	1000	1000	BATCH001	FAKTUR001
53d8ce29-7b3c-45a6-8b68-dafc801d2801	B000000156	1000	1000	BATCH001	FAKTUR001
ff06de74-478a-4fcd-8b7a-80c55c471e37	B000000470	1000	1000	BATCH001	FAKTUR001
0d6bdd31-cf0a-4dd1-b093-605a2eb1d148	B000000744	1000	1000	BATCH001	FAKTUR001
190d358d-3584-4b51-8264-e800595c2f1f	A000000002	1000	1000	BATCH001	FAKTUR001
aadb7a84-0d34-429c-9b5c-f5154e66b188	B000000335	1000	1000	BATCH001	FAKTUR001
12763ad1-1f82-4426-8fb0-d687324624bc	B000001176	1000	1000	BATCH001	FAKTUR001
85a266ea-6b33-4e08-a213-ad2accd14362	B000000144	1000	1000	BATCH001	FAKTUR001
73ad02d6-3185-44fa-881c-9fb5703a2d0c	A000000125	1000	1000	BATCH001	FAKTUR001
a53e0213-b33f-4554-9706-356cdc57e51f	B000001432	1000	1000	BATCH001	FAKTUR001
a856f03d-5103-466c-89a7-a709984d9556	B000000683	1000	1000	BATCH001	FAKTUR001
152e8886-2b41-4be8-aa40-77feb313c993	B000001354	1000	1000	BATCH001	FAKTUR001
86cdaec3-bb7b-47ec-86ca-83d7fc52ffa6	B000001947	1000	1000	BATCH001	FAKTUR001
630a8a98-2600-48cd-bd64-93c021346e03	B000001653	1000	1000	BATCH001	FAKTUR001
2646b4d1-5724-4579-8667-d3ff9db80d6b	B000001349	1000	1000	BATCH001	FAKTUR001
5126e17b-d66a-4adc-a4b9-7dd5c4d24f98	B000001311	1000	1000	BATCH001	FAKTUR001
9b6fa633-b5ed-4138-9056-ddd2ba636ed4	B000000990	1000	1000	BATCH001	FAKTUR001
b9a82c90-80f2-4047-85ca-02ef1164bd76	A000000085	1000	1000	BATCH001	FAKTUR001
4ef2f104-8f0f-45a9-8128-1acc679c44cb	B000001569	1000	1000	BATCH001	FAKTUR001
aacb5788-18a4-42da-95a1-43741deab398	B000002030	1000	1000	BATCH001	FAKTUR001
71268ec4-4f35-43ad-83eb-491e1ea2c2c2	B000001064	1000	1000	BATCH001	FAKTUR001
200418fe-26b5-4360-ae5b-ab71dac749e7	B000000138	1000	1000	BATCH001	FAKTUR001
a0d15675-5118-4335-b0c8-d7e2c3ba5a43	B000000394	1000	1000	BATCH001	FAKTUR001
ffdefad7-11ed-45db-93ed-eda54688c595	B000000697	1000	1000	BATCH001	FAKTUR001
bbd4d507-71c8-4a60-a596-2baeb633f18c	B000000328	1000	1000	BATCH001	FAKTUR001
0380b192-8969-45f6-b480-55ae30f488fd	B000000274	1000	1000	BATCH001	FAKTUR001
209cbdc8-941a-41c9-9170-c41f68db3d69	B000000226	1000	1000	BATCH001	FAKTUR001
96f2481b-91aa-4a5f-b46f-81f532712cc0	B000001475	1000	1000	BATCH001	FAKTUR001
6123f339-973d-4970-947e-f4242d916f0a	B000000951	1000	1000	BATCH001	FAKTUR001
008f9f5e-87a5-410b-87b1-65d8a8803e1a	A000000807	1000	1000	BATCH001	FAKTUR001
59c91773-20c3-4b66-829f-ea9e77c93297	B000000815	1000	1000	BATCH001	FAKTUR001
0ec8b0a7-f728-423a-9d40-ff65c3cdf5e0	B000001545	1000	1000	BATCH001	FAKTUR001
4250be2e-5f9a-47a4-898f-02187375ee5b	B000000745	1000	1000	BATCH001	FAKTUR001
e68d0f29-9ee0-4cfa-873f-c4046942dab6	B000000445	1000	1000	BATCH001	FAKTUR001
3d0f11fd-b646-47ae-a451-968b2a680bbd	B000001988	1000	1000	BATCH001	FAKTUR001
d9bc4bec-b83c-4f27-9fed-72cec476eee8	B000000771	1000	1000	BATCH001	FAKTUR001
8216a9a7-9d99-4cdd-8408-1b1b23aebe88	B000001626	1000	1000	BATCH001	FAKTUR001
e7224c8f-86ce-44c4-aa6e-418cfc332b16	B000000657	1000	1000	BATCH001	FAKTUR001
9acbbcd3-5711-4b85-bbff-81b6b2e21145	B000000379	1000	1000	BATCH001	FAKTUR001
9226eaf1-30ed-4954-b8fd-f7db9e1a356a	B000000839	1000	1000	BATCH001	FAKTUR001
27985401-2207-4cf8-aa05-ad678e8fe6a8	B000001484	1000	1000	BATCH001	FAKTUR001
d51cfcb0-08bc-4b1b-8c6d-6db32d0297ae	B000000753	1000	1000	BATCH001	FAKTUR001
deca88df-90db-43ee-80d3-13258663eee9	B000001701	1000	1000	BATCH001	FAKTUR001
c9db48e2-8a06-41a9-9fce-60f78d0a8d5d	B000001173	1000	1000	BATCH001	FAKTUR001
c91fb3f0-0bc4-4879-a0d4-4dae4b7802b8	B000000354	1000	1000	BATCH001	FAKTUR001
cf53557a-b647-4106-b2a1-c4df190dbfae	B000001155	1000	1000	BATCH001	FAKTUR001
eeed03ce-34e5-4c76-97cd-dd8bac2a0562	B000001939	1000	1000	BATCH001	FAKTUR001
9dc712b9-8658-4d94-aeed-ea088db73985	A000000017	1000	1000	BATCH001	FAKTUR001
5efd675f-1e0b-4bc0-9397-921d5a51c422	B000000389	1000	1000	BATCH001	FAKTUR001
e5ade5b0-7c29-43aa-bcc1-9176735f2e5f	B000001679	1000	1000	BATCH001	FAKTUR001
35e0ec25-4a18-4b30-b6ea-1ad71b81597e	B000001139	1000	1000	BATCH001	FAKTUR001
73cc7a1a-aeeb-4482-83a6-67cc67ef59d2	B000001081	1000	1000	BATCH001	FAKTUR001
f26e1c3d-c369-4854-9518-65b7fe427b25	B000000278	1000	1000	BATCH001	FAKTUR001
7da5319e-2a32-4980-9e7b-d973df392291	B000001956	1000	1000	BATCH001	FAKTUR001
7c49136c-6e1b-4511-a7ca-5b149af1a570	B000001603	1000	1000	BATCH001	FAKTUR001
19b3dbd0-cc92-4fd8-890c-23406532d7e4	A000000010	1000	1000	BATCH001	FAKTUR001
03ec70e2-2347-4609-9acb-55c8ef1e3039	A000000098	1000	1000	BATCH001	FAKTUR001
127bca22-1d5e-4c02-b0d7-5e47128da9bc	B000000212	1000	1000	BATCH001	FAKTUR001
319860d3-86fd-45d8-ad02-ac861e81d99d	B000001698	1000	1000	BATCH001	FAKTUR001
147ed2de-e12d-46ab-ae8d-38eedbd589de	B000001644	1000	1000	BATCH001	FAKTUR001
e8a723d1-9e37-49c2-82da-9c2d025b52ab	B000001239	1000	1000	BATCH001	FAKTUR001
6df6d58b-5420-4b99-92e1-56e63c19a4f9	B000001469	1000	1000	BATCH001	FAKTUR001
4a785e73-6412-4ea8-a852-72a914114223	B000001123	1000	1000	BATCH001	FAKTUR001
48a1dbcb-c80e-41a8-8c59-cffc5389880b	B000001551	1000	1000	BATCH001	FAKTUR001
82b7c313-90f5-4397-90d1-6ec75f5844ce	A000000112	1000	1000	BATCH001	FAKTUR001
7f76ea88-bc79-42ee-b055-f9e172f4e278	B000000593	1000	1000	BATCH001	FAKTUR001
e7fb9d5c-8d50-4d08-a520-f0e20e4e1c1e	B000001387	1000	1000	BATCH001	FAKTUR001
881a1f76-d64b-4eed-8b63-2b6e54e2c78c	B000001411	1000	1000	BATCH001	FAKTUR001
407cf72b-b56e-4672-a3b9-e8cf95223579	B000000343	1000	1000	BATCH001	FAKTUR001
7807bdfc-5d9b-4cba-a628-d6ffa2d96247	B000000355	1000	1000	BATCH001	FAKTUR001
6e5748f7-e1d5-435b-9663-9911f03c26fe	B000000427	1000	1000	BATCH001	FAKTUR001
fbbb3d98-6623-40fb-809e-276878470a84	B000001408	1000	1000	BATCH001	FAKTUR001
b11ccb80-b421-4311-9fe6-0a21b2633a8a	A000000047	1000	1000	BATCH001	FAKTUR001
8acd86e8-e54b-48ad-bcd5-be7116b82903	B000001640	1000	1000	BATCH001	FAKTUR001
2dd1f005-c2a2-4bdd-8c2c-cdcd8e961e6a	B000001963	1000	1000	BATCH001	FAKTUR001
6f689387-cf0e-4210-8f60-1eb13dd46a83	B000001102	1000	1000	BATCH001	FAKTUR001
0ad458eb-76c4-4e75-b974-da04ba183df8	B000000442	1000	1000	BATCH001	FAKTUR001
62292946-0a31-41dc-b153-f24889e2bfe3	A000000116	1000	1000	BATCH001	FAKTUR001
7dca430a-7eda-4c75-b220-f139ad717ab3	B000000855	1000	1000	BATCH001	FAKTUR001
77d7a2b0-0744-4978-98b6-c944a6e6ea84	B000000361	1000	1000	BATCH001	FAKTUR001
19d26d79-cac1-44aa-80fa-6657738dfa28	B000001781	1000	1000	BATCH001	FAKTUR001
103053d5-c1fc-4ba6-ae13-d93093d91381	B000001910	1000	1000	BATCH001	FAKTUR001
e52067b9-0c35-4ee8-88e1-b7d2552fafdd	B000000947	1000	1000	BATCH001	FAKTUR001
f4019c90-41a9-49d9-83fc-222f08f50fc6	B000000267	1000	1000	BATCH001	FAKTUR001
71642516-2d7d-4081-8043-0eec3d452bef	B000000882	1000	1000	BATCH001	FAKTUR001
7a949572-1e75-4c34-9f06-8bfc23fe6549	B000000588	1000	1000	BATCH001	FAKTUR001
958a4d8e-c66e-436b-9969-0251673bdec6	B000001069	1000	1000	BATCH001	FAKTUR001
54c5a1cc-dc2b-44bb-b434-a4a92681112e	B000000878	1000	1000	BATCH001	FAKTUR001
6b1a9d2a-1ea7-41f5-97a7-c1ee0863d0e5	B000000821	1000	1000	BATCH001	FAKTUR001
6cee69aa-2c33-4e36-ada2-338346fe9b7e	B000000568	1000	1000	BATCH001	FAKTUR001
25a366c2-932c-4e0a-9af1-a0bc90fe3bfd	B000000696	1000	1000	BATCH001	FAKTUR001
7de22139-752b-4d15-869a-8b54e22742ec	B000000731	1000	1000	BATCH001	FAKTUR001
caff1abd-5cb6-478e-b947-29b41b5900a8	B000000772	1000	1000	BATCH001	FAKTUR001
f297e07b-1d49-41de-b76e-d399467f8995	B000001833	1000	1000	BATCH001	FAKTUR001
b6747b3a-b2de-4418-9711-c316f892a2f9	B000001949	1000	1000	BATCH001	FAKTUR001
9cbddddc-8ea1-4655-ba85-0b68a4a8385e	B000001806	1000	1000	BATCH001	FAKTUR001
87340f2e-5ad9-46c7-adf7-ca5348b38d11	B000000582	1000	1000	BATCH001	FAKTUR001
8853a265-7310-4136-ad57-345d63e9beb4	B000001133	1000	1000	BATCH001	FAKTUR001
a273805b-2382-471d-b544-fe74782d33eb	B000008013	1000	1000	BATCH001	FAKTUR001
561ddc70-c96e-4248-ad90-3e987de02006	B000000552	1000	1000	BATCH001	FAKTUR001
64057371-5b56-4643-b145-1301a6abaa33	B000001583	1000	1000	BATCH001	FAKTUR001
d077e7dc-767b-4fc5-950d-0248f5650375	B000001639	1000	1000	BATCH001	FAKTUR001
8d84f938-9f49-40eb-b657-e21d8bfc4aff	B000001852	1000	1000	BATCH001	FAKTUR001
fbe40657-a3a8-4301-98f9-6b1365a9b588	B000001284	1000	1000	BATCH001	FAKTUR001
a2d935e5-d24f-435b-8a5b-35e4e7777f3c	B000000574	1000	1000	BATCH001	FAKTUR001
73192591-8501-4d97-bbd6-b1a6d5228fc3	B000001298	1000	1000	BATCH001	FAKTUR001
fa609d9c-f2aa-4af5-a9d2-af5a267cf22b	B000000257	1000	1000	BATCH001	FAKTUR001
33297065-9243-4a4e-9d2e-a7a5bfa17e4c	B000001811	1000	1000	BATCH001	FAKTUR001
6740bc93-7ad4-40d2-bad4-d2536a5b9514	B000001507	1000	1000	BATCH001	FAKTUR001
9eadf997-45d6-4dc1-992c-a2710a1f1409	A000000094	1000	1000	BATCH001	FAKTUR001
e08b19d0-ff88-40f7-8753-90ec9a0c85b8	B000001196	1000	1000	BATCH001	FAKTUR001
a352cbee-b2e6-46c9-a8e8-8b2f860f9fcf	B000001676	1000	1000	BATCH001	FAKTUR001
8e96de4b-5f46-4dc4-a754-e4f4c6871b1a	B000000141	1000	1000	BATCH001	FAKTUR001
6860e54b-b6f1-4c80-9684-26cd192a857f	B000000247	1000	1000	BATCH001	FAKTUR001
aa4b0cd1-fa70-4014-95ab-0a616266417b	B000001061	1000	1000	BATCH001	FAKTUR001
3df467be-cd68-445b-82c0-fb9d34ab0089	B000001980	1000	1000	BATCH001	FAKTUR001
40a71b81-e091-47e5-8f3f-f9ea422ee239	B000000103	1000	1000	BATCH001	FAKTUR001
ead27d6d-ea1e-4211-8cf5-7f2b2e2a173e	B000000845	1000	1000	BATCH001	FAKTUR001
1aea0830-5d34-429f-a5f8-c422fd9e67e4	A000000103	1000	1000	BATCH001	FAKTUR001
8160fe14-0667-4f67-9eac-fa6126c11bf0	B000001010	1000	1000	BATCH001	FAKTUR001
4135a055-7c28-48fd-b030-022b48729368	B000001931	1000	1000	BATCH001	FAKTUR001
7d13bf4b-989e-4857-aae5-400bea72d849	B000000200	1000	1000	BATCH001	FAKTUR001
feed7d73-2d8a-4f15-b9b8-2985df30f0c6	A000000008	1000	1000	BATCH001	FAKTUR001
4fcc9e0d-b5bb-4f76-bf97-77e2afcb3017	B000000142	1000	1000	BATCH001	FAKTUR001
adbe4812-3fe1-4fc6-9c87-de5de064653b	B000001369	1000	1000	BATCH001	FAKTUR001
a7cb7660-40de-4310-a8b3-2ddd9af4dde3	B000001417	1000	1000	BATCH001	FAKTUR001
b549ac7c-7a97-4d28-8b64-21df7e723f4f	B000001541	1000	1000	BATCH001	FAKTUR001
1ec75fee-c9a3-4590-9bfd-ab35b66bc425	B000000277	1000	1000	BATCH001	FAKTUR001
e3f6fc29-5cf6-4b5a-a2a6-0dc923ab6665	B000000643	1000	1000	BATCH001	FAKTUR001
9ac79094-f24e-4045-9c85-83f461151c2e	B000001917	1000	1000	BATCH001	FAKTUR001
fdf69d5b-e0b0-4f31-8bab-4dec94f1986f	B000000981	1000	1000	BATCH001	FAKTUR001
239816bc-0488-4169-8902-03ff4b6ca484	B000001657	1000	1000	BATCH001	FAKTUR001
659a2729-e5dd-49f2-8aa6-cd56050b3512	B000001407	1000	1000	BATCH001	FAKTUR001
3f69f63c-dc99-4459-87e5-815500873214	B000000481	1000	1000	BATCH001	FAKTUR001
fc4112e1-91a1-4c6f-9aa7-c5e54c7c45b3	B000000720	1000	1000	BATCH001	FAKTUR001
c52a83b1-2dce-4278-8e5e-04b3a2f6b68c	B000001009	1000	1000	BATCH001	FAKTUR001
ccbf70e8-8e10-4526-a8c6-49b21977bc12	B000001436	1000	1000	BATCH001	FAKTUR001
67e2bf0f-621e-448c-87a4-cf0f1813ea65	A000000005	1000	1000	BATCH001	FAKTUR001
37a13972-e8bf-430c-80a5-de52df4d354b	A000000798	1000	1000	BATCH001	FAKTUR001
5c3787e3-65d3-471e-bd80-ac349930dd00	B000000224	1000	1000	BATCH001	FAKTUR001
d401da96-777f-477b-8129-85c888a883bc	B000000303	1000	1000	BATCH001	FAKTUR001
550bf429-9270-48c8-9a99-e754a4806274	B000000003	1000	1000	BATCH001	FAKTUR001
8274c34d-428f-41c1-bbb1-ce23ad12edad	B000000936	1000	1000	BATCH001	FAKTUR001
95df3cb2-3651-4823-92be-b21c360501b5	B000001415	1000	1000	BATCH001	FAKTUR001
509475e5-784b-47cf-9064-49b020c3c8aa	B000000301	1000	1000	BATCH001	FAKTUR001
c61fa321-8ff1-4ba5-84aa-c6533403617c	B000002021	1000	1000	BATCH001	FAKTUR001
70e57b96-5469-4af0-abe6-9530a0bdc968	B000002011	1000	1000	BATCH001	FAKTUR001
9533e672-52e5-49cc-8a74-30a6456744f8	B000000271	1000	1000	BATCH001	FAKTUR001
eb6a5e12-007f-4c9e-a60f-796a3adb0f06	B000000208	1000	1000	BATCH001	FAKTUR001
d70f2801-99d7-42d0-adf2-8de7c082e80a	B000001126	1000	1000	BATCH001	FAKTUR001
57640fa1-5574-472d-9149-143c702252e1	B000001936	1000	1000	BATCH001	FAKTUR001
30e9561a-0b14-4975-ab71-0ba6e7a7ca80	B000000590	1000	1000	BATCH001	FAKTUR001
f240e6b0-8978-45a0-83c8-fc9680e19b30	B000000376	1000	1000	BATCH001	FAKTUR001
ac959d78-5656-4052-aea4-394b9693dce4	B000000933	1000	1000	BATCH001	FAKTUR001
c5c91773-44fc-4f7a-8a2a-0f1bab81e119	B000000306	1000	1000	BATCH001	FAKTUR001
4017f780-5a85-48c7-8493-df703ee98ae3	B000001967	1000	1000	BATCH001	FAKTUR001
dc4d7d0a-3b38-47f7-9f51-2594643819e8	B000000651	1000	1000	BATCH001	FAKTUR001
8a802e29-785a-4426-92d4-4572992a99ad	B000000174	1000	1000	BATCH001	FAKTUR001
db56c1a8-9301-4298-a1f2-4326ac489ede	B000001119	1000	1000	BATCH001	FAKTUR001
499b4fe2-dcb0-4456-8330-f09fef57078d	B000000106	1000	1000	BATCH001	FAKTUR001
f5e242bf-b750-41a2-af7d-bcedc6b8a98b	B000000242	1000	1000	BATCH001	FAKTUR001
34755340-0816-4c65-9114-66b70073d601	B000001668	1000	1000	BATCH001	FAKTUR001
ae4d5641-cafe-4973-9b83-1a30600fb761	B000001665	1000	1000	BATCH001	FAKTUR001
6a38b261-e968-451d-bb02-6af375713302	B000000709	1000	1000	BATCH001	FAKTUR001
f923d411-05bd-476f-866d-37d61ec4ca71	B000001483	1000	1000	BATCH001	FAKTUR001
b0396a26-793f-4482-b487-98c7d4f1e2ea	B000000889	1000	1000	BATCH001	FAKTUR001
c7cf7022-f5ea-485a-bbfe-070b60e35887	B000001148	1000	1000	BATCH001	FAKTUR001
4473f163-2cae-480f-8f5e-fcde4d92f774	B000000391	1000	1000	BATCH001	FAKTUR001
da092eaf-a619-421d-ba7e-416d5b7d9074	B000001587	1000	1000	BATCH001	FAKTUR001
2a59a896-26a9-4527-b864-98f7f671a811	B000001592	1000	1000	BATCH001	FAKTUR001
616ff99a-c0d0-4fd2-8330-0705de1b0fc1	B000000281	1000	1000	BATCH001	FAKTUR001
5c769ee4-ac95-4a1f-ac2b-206dba003056	B000001237	1000	1000	BATCH001	FAKTUR001
6d8e8a00-13c3-4e2f-9bf5-6e717d852a9a	B000001779	1000	1000	BATCH001	FAKTUR001
c5ad5c75-27db-4374-9fb5-cf7e17a0a30b	B000000139	1000	1000	BATCH001	FAKTUR001
0973930f-34b6-4ddb-bf07-6f9cf32c6ca2	B000001670	1000	1000	BATCH001	FAKTUR001
ea406360-cdab-4bcb-bc5a-3f2aca5ed46e	B000000576	1000	1000	BATCH001	FAKTUR001
03e74b30-3f37-4e04-ab55-0a89ad44c23d	B000001774	1000	1000	BATCH001	FAKTUR001
815c21c5-a925-4072-89f4-17227e4558ff	B000000794	1000	1000	BATCH001	FAKTUR001
7bdce400-d570-4fba-a15b-567f1027d33f	B000001312	1000	1000	BATCH001	FAKTUR001
b811a0d2-7973-4a61-bd73-673702b768d2	B000000241	1000	1000	BATCH001	FAKTUR001
8432fef7-0143-4bfc-ae43-8cb9809d83dc	B000002013	1000	1000	BATCH001	FAKTUR001
49e1b9f4-0427-4e1f-98ae-c70ef7e3c311	B000000383	1000	1000	BATCH001	FAKTUR001
43a29978-1b6d-4cda-bfa7-b88a53a45459	B000000131	1000	1000	BATCH001	FAKTUR001
287cb4bb-2fb2-4818-b6e9-935e07e300c2	B000000426	1000	1000	BATCH001	FAKTUR001
6c17ac1a-18de-48bf-b533-46c2b4c5db19	B000001624	1000	1000	BATCH001	FAKTUR001
84504151-d5b2-45cb-82a4-de4f3831739a	B000001946	1000	1000	BATCH001	FAKTUR001
2611b553-b817-4c26-96e2-c3240a7c6bf5	B000000828	1000	1000	BATCH001	FAKTUR001
6782df44-42bc-4c8c-94f7-99188709a6eb	B000000272	1000	1000	BATCH001	FAKTUR001
e85839b1-0063-452f-9b40-7b0de6809604	B000001183	1000	1000	BATCH001	FAKTUR001
034c9516-520a-4799-9b95-dfd903f4f700	B000001991	1000	1000	BATCH001	FAKTUR001
9230056f-ee58-4a26-95c7-5729b2d711f8	B000001236	1000	1000	BATCH001	FAKTUR001
4be7dcf0-4944-4f8d-8fcf-af6324f619f3	B000000672	1000	1000	BATCH001	FAKTUR001
14531691-b24c-4dbb-9691-e4579af2ec32	B000001011	1000	1000	BATCH001	FAKTUR001
f4b82643-4d74-4605-9bb0-03baf78f7486	B000001945	1000	1000	BATCH001	FAKTUR001
9c943aa8-dc5b-4115-8462-917fe50fadc2	B000001974	1000	1000	BATCH001	FAKTUR001
47e74147-d68c-45a7-927f-e33856becca5	B000001625	1000	1000	BATCH001	FAKTUR001
b8894220-718d-46e2-ba0b-4f23f1404631	B000001831	1000	1000	BATCH001	FAKTUR001
672f158e-0c83-4074-81bb-bcbf4726a8f0	B000001671	1000	1000	BATCH001	FAKTUR001
42dbf65c-5eab-46e4-abc2-1ef0da9780b2	B000000952	1000	1000	BATCH001	FAKTUR001
d26390e7-ab26-440e-90a1-74bb9775c7a6	2018001	1000	1000	BATCH001	FAKTUR001
1dc93295-7ba1-4472-9a88-94236bd93ce6	B000001750	1000	1000	BATCH001	FAKTUR001
5038b8c0-93c3-423f-b269-d65341fc1dab	B00001000	1000	1000	BATCH001	FAKTUR001
0225c3cb-e1b9-474d-9898-c062d8cf2568	B000000756	1000	1000	BATCH001	FAKTUR001
dc1d8673-4cfe-4ac4-8dd6-59577cd57f26	B000001294	1000	1000	BATCH001	FAKTUR001
e5f457c3-54cd-423a-9533-48951f3b1879	B000001742	1000	1000	BATCH001	FAKTUR001
a2352e4e-f1d7-4bf0-9381-5a4dc103988e	B000001770	1000	1000	BATCH001	FAKTUR001
990464bc-7067-48ab-be80-e1f0361ab222	B000001512	1000	1000	BATCH001	FAKTUR001
b2f4061b-d154-4eac-9caa-a7054f67709b	B000001695	1000	1000	BATCH001	FAKTUR001
710cc702-2d35-4e44-858c-83a7a6abecf3	B000000463	1000	1000	BATCH001	FAKTUR001
b0cc8eb3-6bcd-443a-8c7c-a5cd552e224a	B000002010	1000	1000	BATCH001	FAKTUR001
915bf513-23f2-4949-825b-dae6ccec1ea4	B000001996	1000	1000	BATCH001	FAKTUR001
b521b335-4b73-488e-a393-dd23d59b7e43	B000000819	1000	1000	BATCH001	FAKTUR001
521cdd2e-2b09-428f-8031-1c239ad1c281	B000000967	1000	1000	BATCH001	FAKTUR001
c5869335-eb1a-4c75-97ca-7e84e4c272ac	B000000742	1000	1000	BATCH001	FAKTUR001
91ec0a68-0942-48bc-8bea-cb0db4474a84	B000000285	1000	1000	BATCH001	FAKTUR001
3a69914c-8f05-43c4-96d9-7ef0eb036055	B000000559	1000	1000	BATCH001	FAKTUR001
4bd2a60a-de01-4d3d-817e-4648190c74d6	B000001217	1000	1000	BATCH001	FAKTUR001
5a81c278-38c0-4763-a4c1-d9aba2a85dbd	B000000342	1000	1000	BATCH001	FAKTUR001
0012e313-fc6a-4899-87eb-575d819c12b0	B000000586	1000	1000	BATCH001	FAKTUR001
4f72adb7-031e-48b0-8f38-648f00ac7f61	B000001834	1000	1000	BATCH001	FAKTUR001
43b801a6-ad25-4e5a-ab78-e6f637cae5f1	B000001829	1000	1000	BATCH001	FAKTUR001
49e00c59-4d24-449a-ba94-643e830bd2ef	B000001844	1000	1000	BATCH001	FAKTUR001
ff7b7181-8c51-44a3-a56c-0f58451c0276	B000001807	1000	1000	BATCH001	FAKTUR001
63aadfb7-7e28-4d86-a6a2-dc19d5ff4b71	B000000801	1000	1000	BATCH001	FAKTUR001
0138976f-1683-4bf8-ba9f-2def5a418854	B000001608	1000	1000	BATCH001	FAKTUR001
4ba3ca2e-2eb0-4636-886b-7d67f0e28d2c	B000001509	1000	1000	BATCH001	FAKTUR001
40857e2c-6a3a-4f88-90ca-c94b939484cd	B000001643	1000	1000	BATCH001	FAKTUR001
2734d36b-527f-4c6c-8f25-5f2741f64cec	B000001999	1000	1000	BATCH001	FAKTUR001
aa2ac358-33ce-41df-87ea-fa44b854e2ed	A000000792	1000	1000	BATCH001	FAKTUR001
c22aafe1-2358-4307-babd-8a72d261ac9e	B000001729	1000	1000	BATCH001	FAKTUR001
3dddbab7-96c8-4be8-a91c-253111d1f1c4	B000000560	1000	1000	BATCH001	FAKTUR001
e4d748e7-3b1f-4367-bb1a-ea596932a72b	B000001556	1000	1000	BATCH001	FAKTUR001
679206ce-0508-48db-92f6-bc4917ff3778	B000001222	1000	1000	BATCH001	FAKTUR001
deb27a5d-fc67-45f4-962d-e70df65ef6d6	B000001272	1000	1000	BATCH001	FAKTUR001
d7798336-acfa-416b-9bab-31216d6a9fbf	B000000099	1000	1000	BATCH001	FAKTUR001
97b248bf-b74e-4c9f-8f54-210fd4be3329	B000001861	1000	1000	BATCH001	FAKTUR001
218712d1-6658-4031-aee7-5fa30bc73ad5	B000000924	1000	1000	BATCH001	FAKTUR001
66ca98db-1da2-4ec3-afb5-b29fe8962839	B000001097	1000	1000	BATCH001	FAKTUR001
36e4c13b-2aad-43bb-9f26-2007e2fde691	B000001559	1000	1000	BATCH001	FAKTUR001
592abdab-a5d5-4372-8d95-cd5566305332	B000001968	1000	1000	BATCH001	FAKTUR001
34c03c73-fd9a-4507-af6a-a97b91a51df3	B000001289	1000	1000	BATCH001	FAKTUR001
9137a1fb-1d09-4800-bfe2-5b5e92f1a742	B000000233	1000	1000	BATCH001	FAKTUR001
d2283512-ba10-4619-9434-a7d097fc3d9d	B000000406	1000	1000	BATCH001	FAKTUR001
1cad821c-d819-488a-a44f-b3173e9abfa3	B000001579	1000	1000	BATCH001	FAKTUR001
fb47784b-3e10-4985-a413-d3ada5fd6ffa	B000001052	1000	1000	BATCH001	FAKTUR001
9cea0624-58d7-42ee-860f-4eff8254e17f	B000000182	1000	1000	BATCH001	FAKTUR001
064b4918-28fa-4e61-8a2b-2879b2c67d65	B000008021	1000	1000	BATCH001	FAKTUR001
97729b33-3270-4d5f-a2f9-0f0df7545cab	B000001428	1000	1000	BATCH001	FAKTUR001
479c4e92-0a3d-4490-90d7-b126e7410d06	B000000895	1000	1000	BATCH001	FAKTUR001
afb576fb-c125-4422-aabf-9f63e8bd53c7	B000000225	1000	1000	BATCH001	FAKTUR001
f36f70ef-dfb2-40b8-8053-5dd6125c3f5c	A000000093	1000	1000	BATCH001	FAKTUR001
c2b306de-ce59-49ab-94a7-3735af5cce78	B000001092	1000	1000	BATCH001	FAKTUR001
7853811b-b8c2-457b-914c-6fcbe3c69595	B000000961	1000	1000	BATCH001	FAKTUR001
f82e68b3-682c-4bcc-85a4-12607d6c23f0	B000000587	1000	1000	BATCH001	FAKTUR001
df360c14-1d7c-4973-a6eb-2a8fa4c78feb	B000001818	1000	1000	BATCH001	FAKTUR001
e45e3e7c-245c-4b4e-a921-0b2d6b1d5127	A000000034	1000	1000	BATCH001	FAKTUR001
0365d3a6-9c72-4dfb-a67b-0baa44b8efdf	B000000104	1000	1000	BATCH001	FAKTUR001
e672b801-04d3-4b2a-b5c0-80f9c0b12895	B000000856	1000	1000	BATCH001	FAKTUR001
ef651f60-9972-48a8-bba9-7ce76d515603	B000001738	1000	1000	BATCH001	FAKTUR001
55a11066-01c8-47d1-8b1e-cb52eb37dcd0	B000000706	1000	1000	BATCH001	FAKTUR001
d934813e-acc0-49a6-a81d-1a07c204e51c	B000001147	1000	1000	BATCH001	FAKTUR001
a33055f7-f208-4ac0-b530-ee20456097bc	B000000201	1000	1000	BATCH001	FAKTUR001
c7364bf0-4c1b-4aff-9a23-1beae737612c	B000001784	1000	1000	BATCH001	FAKTUR001
c78653d3-3cc7-4e85-96d0-6570b5874359	B000000901	1000	1000	BATCH001	FAKTUR001
e0cf844b-29bf-43ae-b3e7-fb8cc5e986b0	A000000003	1000	1000	BATCH001	FAKTUR001
48da5061-8e23-4751-a66e-3f32b4e5893c	B000000977	1000	1000	BATCH001	FAKTUR001
f3700610-6972-45c0-a426-30f86f9e006b	B000000765	1000	1000	BATCH001	FAKTUR001
b826dc7d-d395-403f-a33b-6b6be1b3c178	B000000472	1000	1000	BATCH001	FAKTUR001
a8bb2b3a-9826-412d-a849-7284ad55c513	B000001303	1000	1000	BATCH001	FAKTUR001
934dc821-43d0-415d-898c-12fe503e2753	B000001376	1000	1000	BATCH001	FAKTUR001
23a93d51-476f-4f93-b70f-b02f6e17b5ee	B000000835	1000	1000	BATCH001	FAKTUR001
3b0ccebd-ab52-487c-9139-3b23c9ed37e6	B000000849	1000	1000	BATCH001	FAKTUR001
3942d70e-b9a1-4f2c-a5c6-1ff25e815f33	B000001371	1000	1000	BATCH001	FAKTUR001
37957932-1352-4919-9e5d-0b549674e7c7	B000000293	1000	1000	BATCH001	FAKTUR001
f4bdb372-3f21-4496-a09e-d65f3d9c35a2	B000001231	1000	1000	BATCH001	FAKTUR001
a7254818-801d-4c9e-a944-d0303df5db1f	B000000749	1000	1000	BATCH001	FAKTUR001
fead2b0a-d52e-4ae4-9f22-0b1d20e57c70	B000001521	1000	1000	BATCH001	FAKTUR001
7cc376e5-bed9-4e17-b0e8-dd56ab5ffaa7	B000000229	1000	1000	BATCH001	FAKTUR001
c01633c5-1b06-4717-ab36-769be66343d2	B000001029	1000	1000	BATCH001	FAKTUR001
186e1142-c264-4dbb-88d5-77e1a6fcec28	A000000014	1000	1000	BATCH001	FAKTUR001
d1df70a0-2465-467e-9937-b35c91bc6c82	B000000232	1000	1000	BATCH001	FAKTUR001
ff9da52f-f7f5-4a33-ab75-2486c51c6d03	B000001461	1000	1000	BATCH001	FAKTUR001
b64a924f-4aed-458f-bd08-325a8fe0ad98	B000001434	1000	1000	BATCH001	FAKTUR001
be733de6-6a2e-4aa1-91e1-7d7f7a1fa8c1	B000000751	1000	1000	BATCH001	FAKTUR001
9a759c97-baee-4ba1-82ae-59ff370e022e	B000000239	1000	1000	BATCH001	FAKTUR001
e8c8d82e-c6c5-4cac-8818-f8ea98c913a5	B000000852	1000	1000	BATCH001	FAKTUR001
9da23240-2484-451d-970f-94bb3eb07a1b	B000001528	1000	1000	BATCH001	FAKTUR001
97344813-dd99-4aa0-9585-d8d1b6757b36	B000000949	1000	1000	BATCH001	FAKTUR001
a83f7aee-bae3-4090-a286-ddd057b8af1c	B000001720	1000	1000	BATCH001	FAKTUR001
151f304f-79b4-4976-af7c-a116edd7db57	B000001154	1000	1000	BATCH001	FAKTUR001
28865921-7e7d-4069-8bb4-f049f83b9d4b	B000001109	1000	1000	BATCH001	FAKTUR001
55831820-fcd2-4428-ae73-879164513292	B000001326	1000	1000	BATCH001	FAKTUR001
8334a01e-558c-490d-9b48-02d7b1a65e68	B000000873	1000	1000	BATCH001	FAKTUR001
5199457d-a679-47bc-9086-cd187c61dd75	B000000770	1000	1000	BATCH001	FAKTUR001
de884cd4-3e0e-4026-8493-955bf75c2c88	B000000295	1000	1000	BATCH001	FAKTUR001
f00d8613-bd0f-40e2-b808-ba9552c57803	B000001404	1000	1000	BATCH001	FAKTUR001
0c80ce85-374a-4655-b180-abb5ae5439df	B000001712	1000	1000	BATCH001	FAKTUR001
bc4df4e4-4524-455d-af7e-ced4f99ad62e	B000000397	1000	1000	BATCH001	FAKTUR001
cd6dd2d1-dd15-4969-8719-765b02b46377	B000000256	1000	1000	BATCH001	FAKTUR001
0c08b2c5-5cf1-47b4-a376-02372c5da6fe	B000000554	1000	1000	BATCH001	FAKTUR001
c0e2e4e4-ec33-4ac1-9aee-6c66918188aa	B000001708	1000	1000	BATCH001	FAKTUR001
66bb8784-3794-458c-892e-87c5b40ccc5c	B000000332	1000	1000	BATCH001	FAKTUR001
6029be9d-346f-4945-b6bf-45a774ac9f61	B000001504	1000	1000	BATCH001	FAKTUR001
086e5278-3481-449b-bf58-a4825cdd96c0	B000000268	1000	1000	BATCH001	FAKTUR001
11500dc1-4521-4ef5-a307-7c12e929e4df	B000000476	1000	1000	BATCH001	FAKTUR001
37d32b1d-bcec-4b06-8de0-19da14d4212b	B000000356	1000	1000	BATCH001	FAKTUR001
8627377a-940b-4e4f-bfb1-bb4d2c7bad66	B000001961	1000	1000	BATCH001	FAKTUR001
499ae751-71eb-46a5-9084-ca5ec288f19e	B000000738	1000	1000	BATCH001	FAKTUR001
5a4c1019-f156-45a6-b8d8-73a294eaf4a8	B000001167	1000	1000	BATCH001	FAKTUR001
d736337d-f3ed-40cd-91d4-d828d474c177	B000001445	1000	1000	BATCH001	FAKTUR001
1f5cb425-f634-4778-addf-ac0b9a2e83d8	B000000414	1000	1000	BATCH001	FAKTUR001
45097c25-423d-42dd-a9e2-69a5d78475d0	B000000600	1000	1000	BATCH001	FAKTUR001
dc4e3660-3a31-43f4-84de-e54aa6eb9047	B000000575	1000	1000	BATCH001	FAKTUR001
2e1765bc-7701-43f8-b326-bfe3c4271204	B000001635	1000	1000	BATCH001	FAKTUR001
acccfab5-4c9a-4924-bc4d-d7fac98161b6	B000000836	1000	1000	BATCH001	FAKTUR001
8b24d04d-d905-4ce8-ad5a-c54acf77a83d	B000000240	1000	1000	BATCH001	FAKTUR001
cc50d9ba-f1d3-4c0d-8a39-243d4cf07cf7	B000001277	1000	1000	BATCH001	FAKTUR001
1c505880-9581-4238-9eb6-09bc66cdd727	B000000761	1000	1000	BATCH001	FAKTUR001
6e9b95f9-9cd3-4a6b-98e3-513093713097	B000001125	1000	1000	BATCH001	FAKTUR001
edc933d4-e44a-4903-a3d8-0a9feaa30f08	B000000583	1000	1000	BATCH001	FAKTUR001
6611e2d2-b382-43a8-991a-b9132894d34b	B000000566	1000	1000	BATCH001	FAKTUR001
c3621922-78a6-41a1-9e2b-6f05dfe361de	B000001331	1000	1000	BATCH001	FAKTUR001
0b66a8a1-8e45-4e2a-87cb-f8b41ca15e32	B000001514	1000	1000	BATCH001	FAKTUR001
e983902f-577d-43b3-acd7-1dc97b3baa98	B000000584	1000	1000	BATCH001	FAKTUR001
485bb485-6bc5-4fe3-a0ab-3277a014e365	B000001648	1000	1000	BATCH001	FAKTUR001
f8b53f1f-51bb-4fc2-89e0-8318020ab964	B000000143	1000	1000	BATCH001	FAKTUR001
27b627fb-bac7-4e99-ab29-706882d325d7	B000001053	1000	1000	BATCH001	FAKTUR001
c069d2b0-61a0-4924-a2ef-dcdfcac0c8c4	B000000864	1000	1000	BATCH001	FAKTUR001
05756501-d3e9-4069-a11e-f621734d2c5a	B000001589	1000	1000	BATCH001	FAKTUR001
8a999b8c-ddfd-46d1-a81b-e678fd7c7108	B000001318	1000	1000	BATCH001	FAKTUR001
abeb7a0a-780f-4682-a2a3-c87b8a3afb36	B000000330	1000	1000	BATCH001	FAKTUR001
c764bcd4-7a06-45cb-a9de-52d75b6262bd	B000000296	1000	1000	BATCH001	FAKTUR001
270de3d6-052d-41be-99fa-d81f46df089f	B000001520	1000	1000	BATCH001	FAKTUR001
664c815d-d8b1-458f-8247-332919bf053d	B000001257	1000	1000	BATCH001	FAKTUR001
c7a23f38-185b-4e91-928f-2f15dd4d6025	B000001721	1000	1000	BATCH001	FAKTUR001
03c0bcca-8f21-4460-8a50-80ffbc0e9b55	B000001801	1000	1000	BATCH001	FAKTUR001
399af8c9-0788-46ef-ab8b-4a3f83070f06	B000001888	1000	1000	BATCH001	FAKTUR001
6b17c73f-02f6-44c9-bc25-a59586a67bc1	B000001049	1000	1000	BATCH001	FAKTUR001
729b37fe-87bb-4d93-8c45-9f5694d85774	B000001977	1000	1000	BATCH001	FAKTUR001
876d712f-23ea-4d5c-b713-690b7bbcb8b6	B000001027	1000	1000	BATCH001	FAKTUR001
2523317b-912b-4ba6-a4ee-df4d1df236f9	B000000411	1000	1000	BATCH001	FAKTUR001
e0f97a9d-ca78-4ea9-92d0-5611cccdd83d	B000008017	1000	1000	BATCH001	FAKTUR001
e09a7e1c-7598-4790-b2f5-a8f2894c39eb	B000000198	1000	1000	BATCH001	FAKTUR001
1eda9a59-3982-4654-acbb-8d3278d9f28b	B000000930	1000	1000	BATCH001	FAKTUR001
7813fd31-8318-4142-a62b-b388d58b9073	B000001810	1000	1000	BATCH001	FAKTUR001
05bd9703-f033-472d-b26e-1184e58c3dc7	B000001868	1000	1000	BATCH001	FAKTUR001
398e6b1b-d1ad-4a38-9431-c8f1b77a8dc5	B000001990	1000	1000	BATCH001	FAKTUR001
1ebb71ef-474f-46ab-808b-f5c497dfb14a	B000000779	1000	1000	BATCH001	FAKTUR001
484f5d0d-4578-4cc2-a901-bacb6687e8db	B000000638	1000	1000	BATCH001	FAKTUR001
d779d745-0bb7-48ee-8874-27eb2796af97	B000000716	1000	1000	BATCH001	FAKTUR001
2acbacb2-aeb8-4bf0-b82f-844f182ebc61	B000000209	1000	1000	BATCH001	FAKTUR001
8dab7a0a-0bb6-4a57-ae2c-1a9109557b1d	B000000867	1000	1000	BATCH001	FAKTUR001
b40a3b7d-24ed-4f90-89f6-c027851f43c6	B000001563	1000	1000	BATCH001	FAKTUR001
510b622c-ac32-4527-9e08-ff18a2c27cde	A000000111	1000	1000	BATCH001	FAKTUR001
bc8e3086-7992-4a9f-bba4-fa7bebb43421	B000000207	1000	1000	BATCH001	FAKTUR001
0221af5e-97f0-4881-ac60-a7ea3c974355	B000001047	1000	1000	BATCH001	FAKTUR001
76c96306-e1bf-4589-9dfd-eaaffb78b694	B000000374	1000	1000	BATCH001	FAKTUR001
decbd9ba-e938-43d9-8b67-77d4959a8871	B000001224	1000	1000	BATCH001	FAKTUR001
336690a8-366e-4ce7-8b76-5fc29524c4c7	B000000191	1000	1000	BATCH001	FAKTUR001
f16b1b2a-dd0e-4a07-b4fc-3b188c0bca22	B000001280	1000	1000	BATCH001	FAKTUR001
0db566f8-8840-4bd0-aeb4-fae71e0301cf	B000000205	1000	1000	BATCH001	FAKTUR001
4fd86718-9a60-4d7b-98d2-750674ae0739	A000000483	1000	1000	BATCH001	FAKTUR001
0a9128f2-6865-4bb2-bb96-1671d8633bbd	B000001680	1000	1000	BATCH001	FAKTUR001
234676e0-d40f-4103-9597-2e519ecdf40c	B000000591	1000	1000	BATCH001	FAKTUR001
2db50acd-60f2-4a74-829b-f1219e0b6563	B000000994	1000	1000	BATCH001	FAKTUR001
db4cb837-81fd-4e5d-b291-5d84769cbedf	B000000705	1000	1000	BATCH001	FAKTUR001
9da84f73-a76a-4517-a526-ec6e159679dc	B000000371	1000	1000	BATCH001	FAKTUR001
ac4c79a4-3b24-4f0e-9810-2de2c148e879	B000000455	1000	1000	BATCH001	FAKTUR001
91383eb2-89f5-44bb-9af9-1b67f4301883	B000001978	1000	1000	BATCH001	FAKTUR001
3b201b87-ed28-4ada-8063-52500afd1091	B000000429	1000	1000	BATCH001	FAKTUR001
d7fa7ad8-e4e6-466c-80be-c0afc3c31445	B000000942	1000	1000	BATCH001	FAKTUR001
649c08d3-35f4-448c-97dc-9f3f91a3f12b	B000000192	1000	1000	BATCH001	FAKTUR001
2d135e38-6efa-483f-b4c8-da1b257556ff	B000000928	1000	1000	BATCH001	FAKTUR001
91c726bd-9527-4e4a-914f-532e6ebc36cb	B000001468	1000	1000	BATCH001	FAKTUR001
d44ebd0d-a310-40cb-8c52-9766640ea586	B000001647	1000	1000	BATCH001	FAKTUR001
a6f39701-77ef-4d64-9521-bced52165936	B000001749	1000	1000	BATCH001	FAKTUR001
0cada707-768d-4863-af56-5b190ff12e78	B000000386	1000	1000	BATCH001	FAKTUR001
01ff472d-415e-493e-80bb-f7fc05fc3300	B000001250	1000	1000	BATCH001	FAKTUR001
71b1e065-e9c4-46ef-851f-050bff800860	B000000475	1000	1000	BATCH001	FAKTUR001
b5543451-a50f-4a8a-a8b0-b63034ad584a	B000001063	1000	1000	BATCH001	FAKTUR001
780a5207-6554-4df2-b5c0-47ea218938d8	B000001798	1000	1000	BATCH001	FAKTUR001
ada6768d-9526-4e6d-8bd7-dc226e3e683c	B000000115	1000	1000	BATCH001	FAKTUR001
4736fcdc-a83d-49ec-add6-43131611d2ca	B000000641	1000	1000	BATCH001	FAKTUR001
30ee3bff-39f8-4b15-b768-daeffbae714b	B000000473	1000	1000	BATCH001	FAKTUR001
e687050a-7fcf-4d43-b22e-b47e3305e953	A000000096	1000	1000	BATCH001	FAKTUR001
0c1dc8b1-ee6d-4246-8d33-eb8eedd3c9de	B000000319	1000	1000	BATCH001	FAKTUR001
150fb5fd-3f9b-4b64-9278-4c7eb038ea1f	B000001763	1000	1000	BATCH001	FAKTUR001
1c216e24-b75f-4832-89cb-2f649b6fdeeb	B000001921	1000	1000	BATCH001	FAKTUR001
a8602b6f-5a09-4eea-b52e-5b3b7ae2c16a	B000000199	1000	1000	BATCH001	FAKTUR001
9347219b-ccfa-43b2-800d-083a2aa12a7d	B000008014	1000	1000	BATCH001	FAKTUR001
aa8857f3-b0c9-40ad-9a39-637d06bd858b	B000001733	1000	1000	BATCH001	FAKTUR001
ee8fbaf7-1a5c-4f20-a58a-3ff7b1624e96	A000000780	1000	1000	BATCH001	FAKTUR001
8aae0ccc-f02a-4874-8b35-07cdeb7496c9	B000000850	1000	1000	BATCH001	FAKTUR001
4233ef7d-2a6b-42a3-9e8a-642c3cbeb227	B000000713	1000	1000	BATCH001	FAKTUR001
99a85dcb-5d34-4601-9501-5219ada0dd08	A000000020	1000	1000	BATCH001	FAKTUR001
6934f5c7-b08d-4153-9f07-0ce332d781f3	B000001305	1000	1000	BATCH001	FAKTUR001
4be85850-8f72-41b3-b257-cbe103797830	B000001288	1000	1000	BATCH001	FAKTUR001
ff96a64b-85e3-4206-bede-cbd8b9555264	B000000323	1000	1000	BATCH001	FAKTUR001
45238f8c-a3bc-45b3-bee5-937134448b01	B000000422	1000	1000	BATCH001	FAKTUR001
f0ec95ca-8c3e-4ad3-b317-ae09fbfd8230	B000001700	1000	1000	BATCH001	FAKTUR001
f2bbd9f2-3018-4673-9295-6763322bd6ab	B000001803	1000	1000	BATCH001	FAKTUR001
0948526c-047c-4db2-80ad-918ff8ab12c9	B000000900	1000	1000	BATCH001	FAKTUR001
a9eb518c-a3dc-4613-81d1-a49ef57406f6	B000001382	1000	1000	BATCH001	FAKTUR001
ea63045d-9772-49ff-af5b-38ad8358ad50	B000001453	1000	1000	BATCH001	FAKTUR001
7ab5f768-9192-4953-905d-b23b61a3a190	B000000248	1000	1000	BATCH001	FAKTUR001
b616d13d-31f3-49b5-b3a9-4ad733dc9a97	B000000708	1000	1000	BATCH001	FAKTUR001
0c295a20-d5f4-4157-af4f-e7ccb0ee4c58	B000001127	1000	1000	BATCH001	FAKTUR001
d52488d8-fe52-4cf8-a65f-5278f27283d7	B000001310	1000	1000	BATCH001	FAKTUR001
35ceb487-66c4-4a1e-ac59-f7e13951e4be	B000001894	1000	1000	BATCH001	FAKTUR001
334b9eee-eee4-41db-ac9e-9c6c026bdc39	B000000688	1000	1000	BATCH001	FAKTUR001
988b41a8-5e71-4d4b-ae37-6fdda34fe099	B000000886	1000	1000	BATCH001	FAKTUR001
56725a2b-02f9-4efe-af70-f834223ff39d	B000000786	1000	1000	BATCH001	FAKTUR001
ce223781-4c9e-4d24-ace5-26315a9894df	B000001960	1000	1000	BATCH001	FAKTUR001
37ec9b35-f75c-4214-867a-173e35d60f4a	B000001456	1000	1000	BATCH001	FAKTUR001
d762127d-362b-4408-87c3-640eea201540	B000000558	1000	1000	BATCH001	FAKTUR001
8ba687ed-55b4-4a09-a02e-7ebabf95c21a	B000000665	1000	1000	BATCH001	FAKTUR001
5a9ba311-4745-4f4b-a0ff-33baec54e245	B000000573	1000	1000	BATCH001	FAKTUR001
45444ed8-734e-470f-9c77-f2bcaa739544	B000001032	1000	1000	BATCH001	FAKTUR001
d38dd289-4de1-4e0d-ab6f-ec931e66b6a5	B000001356	1000	1000	BATCH001	FAKTUR001
5cb7a7bd-1038-4bca-8057-e1eaa8a99fbe	B000001363	1000	1000	BATCH001	FAKTUR001
c3c07576-5503-4e67-b7ab-a70af6cb2796	B000000879	1000	1000	BATCH001	FAKTUR001
75e01b33-f088-4a43-941e-653d50542037	B000001225	1000	1000	BATCH001	FAKTUR001
566ec420-090a-42fd-b7b4-d4900cf2b1f0	B000000693	1000	1000	BATCH001	FAKTUR001
766602aa-770c-4233-bea8-5c5cad10a8e0	B000000297	1000	1000	BATCH001	FAKTUR001
3a78c873-9cc0-4256-9d20-677afcd783c7	B000000215	1000	1000	BATCH001	FAKTUR001
f92bc04a-7c7e-4b2c-a2fc-e69fd10f21ff	B000001208	1000	1000	BATCH001	FAKTUR001
d363a1be-7408-4e85-a4b8-172549964c54	B000001828	1000	1000	BATCH001	FAKTUR001
01c26ea9-83fc-447f-b34f-cbb20cdf9ca9	B000000172	1000	1000	BATCH001	FAKTUR001
66f461f1-2447-4eef-8382-867cd10105f8	B000001678	1000	1000	BATCH001	FAKTUR001
7b2b3675-7be1-4027-b3e0-b0e8d609db67	B000000275	1000	1000	BATCH001	FAKTUR001
271cc32e-cccf-4daa-ab0f-88a34cf69503	B000000107	1000	1000	BATCH001	FAKTUR001
b2614fd7-7b5a-4851-b282-89387318ddc7	B000001343	1000	1000	BATCH001	FAKTUR001
290dd1b2-f913-4025-934a-00be64c2dcc7	A000000081	1000	1000	BATCH001	FAKTUR001
be366207-92d0-4807-b19d-849f4aa037f1	B000001636	1000	1000	BATCH001	FAKTUR001
ac0ebe40-c8ef-4a51-be2f-861a66b10f8f	B000001084	1000	1000	BATCH001	FAKTUR001
020fdb60-3f27-4325-8e77-24dab836354b	A000000059	1000	1000	BATCH001	FAKTUR001
9e461bc2-fb72-4596-b6f9-68dcedb5a4fd	B000001377	1000	1000	BATCH001	FAKTUR001
228a4d5f-6360-4aa5-a1c7-5aee65225a79	B000000365	1000	1000	BATCH001	FAKTUR001
e5348972-eb65-48e4-97f3-54dcbe6925b2	B000000934	1000	1000	BATCH001	FAKTUR001
631bae17-2556-4487-bb8b-769d83db1cc4	B000001564	1000	1000	BATCH001	FAKTUR001
558b9802-da5f-4fbe-b578-7d1ab7d6e4fe	B000000133	1000	1000	BATCH001	FAKTUR001
10865e52-d1cb-49d7-83da-01f452641610	B000001145	1000	1000	BATCH001	FAKTUR001
44563267-b4f0-431d-9b22-0b6c8e9da435	B000000095	1000	1000	BATCH001	FAKTUR001
332ecf0b-cadc-4a72-a052-cff0d93a95e8	B000001871	1000	1000	BATCH001	FAKTUR001
97e3d407-8cb2-4805-b8e0-42882fbd9308	B000000385	1000	1000	BATCH001	FAKTUR001
218a9f52-8226-4fff-aaf8-1bc7ea1e7769	B000001902	1000	1000	BATCH001	FAKTUR001
fb137444-e6ee-4561-a81f-2d8156a7e683	B000000826	1000	1000	BATCH001	FAKTUR001
bb437c4e-23c5-45b8-bfc2-79eca56f26c2	B000001896	1000	1000	BATCH001	FAKTUR001
a4dfff2a-600c-4125-9083-8c89f4ef88c7	B000000661	1000	1000	BATCH001	FAKTUR001
e3e2f296-94ee-43fa-83d9-85b3be748fc8	B000001762	1000	1000	BATCH001	FAKTUR001
fb3b594e-5a28-4e06-b562-9700ed8436c0	B000001313	1000	1000	BATCH001	FAKTUR001
842c63dc-60f4-4371-bb01-bf16cee122a2	B000002037	1000	1000	BATCH001	FAKTUR001
b205a942-3782-4323-a2d5-2c7e62371e06	B000000689	1000	1000	BATCH001	FAKTUR001
32dddabf-2974-42b2-ab7b-cd4c77d84c96	B000000409	1000	1000	BATCH001	FAKTUR001
aa5d4c9d-8631-411d-87f3-be2546f83e02	B000000775	1000	1000	BATCH001	FAKTUR001
0d6c3a53-30d5-4c04-8a29-17eb6b046f79	B000000353	1000	1000	BATCH001	FAKTUR001
c8bc997e-ef4f-4aa4-8b4f-b3544b2c7135	B000001973	1000	1000	BATCH001	FAKTUR001
900ec6c1-207e-479e-875b-fb18ef9a3595	B000001832	1000	1000	BATCH001	FAKTUR001
60960a21-e7db-4722-a1ab-cf48137cedca	B000001690	1000	1000	BATCH001	FAKTUR001
bc9a7503-04c6-4665-882f-de3e48a1ddc6	B000000398	1000	1000	BATCH001	FAKTUR001
f6a7b8b9-41ae-4956-93c4-2c1ff327a9a8	A000000074	1000	1000	BATCH001	FAKTUR001
b5d159ec-4c7d-483a-b6dc-eb1484377170	B000000910	1000	1000	BATCH001	FAKTUR001
e1816fff-d0e0-4fb8-9f75-478bf5090162	B000000687	1000	1000	BATCH001	FAKTUR001
6f72d797-7e2e-453a-aeaa-ee4d28b971c5	B000001375	1000	1000	BATCH001	FAKTUR001
0b8e446f-eb5f-47dd-94f8-d4dd3abf7862	B000000154	1000	1000	BATCH001	FAKTUR001
24a144de-993e-4eb1-8341-b49d93390eb8	B000001860	1000	1000	BATCH001	FAKTUR001
b53ceb63-2d79-4512-8d35-ea2b6c46e1b4	B000000441	1000	1000	BATCH001	FAKTUR001
b3a02997-ab25-4d0e-9be7-5c722e1ac308	B000001814	1000	1000	BATCH001	FAKTUR001
5b594834-4231-4885-92b5-ba73935e87ce	B000001362	1000	1000	BATCH001	FAKTUR001
b0be8a0d-d428-4fad-8237-52136823f528	B000001899	1000	1000	BATCH001	FAKTUR001
fa2c7eb3-78bd-49dc-a1a6-4d58bce3a0e0	B000001909	1000	1000	BATCH001	FAKTUR001
a977d276-ad93-42f2-9d75-892ceff25fb4	B000001017	1000	1000	BATCH001	FAKTUR001
bfd64ac8-0918-4660-b7ba-3c7a8e5dd638	B000001692	1000	1000	BATCH001	FAKTUR001
34308a37-f02c-4679-ab03-b9a3cfbc91a9	B000000686	1000	1000	BATCH001	FAKTUR001
90bb6589-dbf5-4dd6-a94c-73d1dffbd6cd	B000001898	1000	1000	BATCH001	FAKTUR001
9b5e48bd-f00f-4412-bbaf-9a6f9943a478	B000001467	1000	1000	BATCH001	FAKTUR001
b5ba8bf0-373f-4517-b31f-f6d66560030d	B000000195	1000	1000	BATCH001	FAKTUR001
e3d461ec-c5bc-431c-adcf-166fb27a0562	B000001775	1000	1000	BATCH001	FAKTUR001
717f2829-04e9-4502-bdf3-dcc606814ac8	B000000945	1000	1000	BATCH001	FAKTUR001
12d0f856-3310-4485-b54b-5212fd78d034	B000000674	1000	1000	BATCH001	FAKTUR001
0c98af1e-95d2-42c3-bfe1-97180e9e2c69	B000001074	1000	1000	BATCH001	FAKTUR001
ae84ab45-958d-4ed9-94e8-4857b3a4a27f	B000000620	1000	1000	BATCH001	FAKTUR001
10c57e61-4c12-4da7-a6d3-a696cbbfec42	B000001755	1000	1000	BATCH001	FAKTUR001
1cdaaf31-9c14-45a2-9dba-ddc40355b89e	B000001865	1000	1000	BATCH001	FAKTUR001
9cc2087c-730b-4e4b-aef7-268fb1906b47	B000001715	1000	1000	BATCH001	FAKTUR001
008d1956-da88-4248-93fc-3b727b197e67	B000000920	1000	1000	BATCH001	FAKTUR001
7dd6312b-0472-4348-8fba-fef84b0faf89	B000000762	1000	1000	BATCH001	FAKTUR001
7c1a0986-8c95-447f-9aca-bb5dae42408e	B000000181	1000	1000	BATCH001	FAKTUR001
e3ae163d-732d-4db6-bdc0-1a65fdce3748	B000000865	1000	1000	BATCH001	FAKTUR001
456bd495-2364-4519-845a-26f3638f01e6	B000000308	1000	1000	BATCH001	FAKTUR001
bd97560a-77fe-4457-ad7a-9cdd00b67d6c	B000001197	1000	1000	BATCH001	FAKTUR001
1f5d05fb-1ddf-463c-b0c3-b4dc86bd4b92	B000001416	1000	1000	BATCH001	FAKTUR001
9a5a005a-d2fd-4c9d-bcae-66d890529a29	B000000800	1000	1000	BATCH001	FAKTUR001
09186313-1d47-4728-bdcf-9e5258a4e307	B000001851	1000	1000	BATCH001	FAKTUR001
8ef7d7aa-dc37-4413-a9d6-615355818cf4	B000001172	1000	1000	BATCH001	FAKTUR001
79f5491e-3ab3-44a2-95f9-d7ebd1e23ff3	B000001982	1000	1000	BATCH001	FAKTUR001
7394619a-2461-4ca4-bf1a-dc1e31372a9c	B000001508	1000	1000	BATCH001	FAKTUR001
779db99b-7431-42c1-a2b1-30214d369bd6	B000001997	1000	1000	BATCH001	FAKTUR001
5c04c91e-3914-4621-b894-95161fdf7c71	B000001863	1000	1000	BATCH001	FAKTUR001
c5bd20ef-bc3a-45a5-9904-82e6dc96d187	B000001281	1000	1000	BATCH001	FAKTUR001
a119e413-4024-4261-b10c-83947f7b8d69	B000000408	1000	1000	BATCH001	FAKTUR001
805eb216-a786-4cd9-b86e-586134ec6e59	A000000024	1000	1000	BATCH001	FAKTUR001
4d4a3ac9-8462-4cc8-b0ae-4aeab01f9c83	A000000057	1000	1000	BATCH001	FAKTUR001
16302ec6-3616-4b20-91b1-ebec72c4db0f	B000000447	1000	1000	BATCH001	FAKTUR001
2cd1a474-05f7-4bef-b9c4-507178ffaab2	B000000097	1000	1000	BATCH001	FAKTUR001
b1ba4c01-5ecc-47cc-83a1-694b6123afc2	B000000123	1000	1000	BATCH001	FAKTUR001
154aaa7c-44cd-48af-b2d2-7ad2fd2c49d2	A000000055	1000	1000	BATCH001	FAKTUR001
38a95e2d-d2fb-4c5f-8705-a1b9f8dcdf57	A000000803	1000	1000	BATCH001	FAKTUR001
a45e6924-8903-4fb8-902e-68765a9e13a5	B000001893	1000	1000	BATCH001	FAKTUR001
f9dc30c7-3fff-4db1-bc4d-73d79ce6aa99	B000001291	1000	1000	BATCH001	FAKTUR001
6f0b2fb8-ce8f-48a5-9a9c-701ed3a5fca2	B000001440	1000	1000	BATCH001	FAKTUR001
139e0ae2-e04e-4a02-b3a4-cb414337de73	B000001151	1000	1000	BATCH001	FAKTUR001
f0ca0026-cc4c-4fab-9a5f-cde50f8faf1b	B000001572	1000	1000	BATCH001	FAKTUR001
03b4c638-2b2d-46dc-b56c-b12a08d22ff4	B000001457	1000	1000	BATCH001	FAKTUR001
688a7eab-56bb-46c5-81c3-39c58d1d0b19	B000000891	1000	1000	BATCH001	FAKTUR001
05de8463-436f-4623-8dfd-0d4bed8c1b98	B000000450	1000	1000	BATCH001	FAKTUR001
90075463-82ba-412c-bba0-ca15ca6fb08a	B000001056	1000	1000	BATCH001	FAKTUR001
1e304d1b-0bf3-428e-8eaa-8ccb61aacb45	B000001435	1000	1000	BATCH001	FAKTUR001
ae702ccc-55d5-44a7-89c4-8d806b9553ab	B000001188	1000	1000	BATCH001	FAKTUR001
3e38297d-754a-41b5-868b-500dabb0d01e	B000001629	1000	1000	BATCH001	FAKTUR001
af7d4669-968f-421b-8542-b85883b9b8b3	B000000592	1000	1000	BATCH001	FAKTUR001
1b3a6623-fd0c-42ea-998e-2d5510a3596b	B000000718	1000	1000	BATCH001	FAKTUR001
2fc7cfd4-b2d2-4aac-b400-748e566b4b5b	B000001904	1000	1000	BATCH001	FAKTUR001
6d495f2f-0027-4f50-8f0e-11281da2bd22	A000000029	1000	1000	BATCH001	FAKTUR001
8d403567-555e-4a81-b373-f92caeb073fe	B000001611	1000	1000	BATCH001	FAKTUR001
125a71d3-7d7f-42c9-910c-3eb3dfb00592	B000000613	1000	1000	BATCH001	FAKTUR001
ca32aac1-b45d-40ff-a640-3da3124aece7	B000001062	1000	1000	BATCH001	FAKTUR001
ddfae8a0-9437-41eb-810c-fcf3295e589e	B000002026	1000	1000	BATCH001	FAKTUR001
c51ec653-6c59-4aff-96ce-510176f2485f	B000000959	1000	1000	BATCH001	FAKTUR001
177c6ebc-d605-47da-9789-d09b9879e7b1	B000000644	1000	1000	BATCH001	FAKTUR001
5c877e5d-dcbb-4b68-80b5-38422f09730a	B000001093	1000	1000	BATCH001	FAKTUR001
7c7f7bea-f4b6-4ab6-b415-1565b4da1954	B000000808	1000	1000	BATCH001	FAKTUR001
a79ff59e-185c-4835-9b4e-748a9aa7ba01	B000001780	1000	1000	BATCH001	FAKTUR001
8df20ff9-1d6b-4890-9623-4ec58b4e0e90	B000001107	1000	1000	BATCH001	FAKTUR001
73bb93d5-7b7e-432e-9ead-81b999e88195	B000001413	1000	1000	BATCH001	FAKTUR001
f818dcbb-a7ec-494e-9168-5976b02bdc92	B000001747	1000	1000	BATCH001	FAKTUR001
b1de705b-81ed-4abf-bf7e-e7f73077ae82	B000000134	1000	1000	BATCH001	FAKTUR001
dcaf4932-4d18-4ec5-9b9b-f10f0485cf63	B000000367	1000	1000	BATCH001	FAKTUR001
13bcc46f-12b5-45a7-817d-d4510b51c8ab	B000001169	1000	1000	BATCH001	FAKTUR001
38a26d65-18eb-44f6-9fee-cd2f9bf96f76	B000001938	1000	1000	BATCH001	FAKTUR001
8b2a135f-23da-441f-9a0b-b2c5e7ac434d	B000000809	1000	1000	BATCH001	FAKTUR001
4d522415-3381-4c3c-b8fe-1ab2ac6fb41e	B000001649	1000	1000	BATCH001	FAKTUR001
90d3b8a8-4485-4334-9eda-6321d1dda30e	B000001519	1000	1000	BATCH001	FAKTUR001
be272257-ff94-49f4-928b-35b1f7f38b43	A000000119	1000	1000	BATCH001	FAKTUR001
a8eb5db3-1ba2-4657-8715-7b4cd6fc4381	B000001005	1000	1000	BATCH001	FAKTUR001
3c534171-e1ac-4fb9-9fd0-d96be983d9b7	B000001361	1000	1000	BATCH001	FAKTUR001
b2f7ed82-4e3a-4218-84c7-c7866d306ed5	B000000270	1000	1000	BATCH001	FAKTUR001
ec7f0026-7cec-4874-b24b-e6baed38bda6	B000001610	1000	1000	BATCH001	FAKTUR001
4f93ff09-4aea-4627-8b06-96670f9c8bc2	B000000464	1000	1000	BATCH001	FAKTUR001
8cfb3b5f-44e5-43ce-bde3-806687a333ef	B000000351	1000	1000	BATCH001	FAKTUR001
bc711509-c460-4e82-82c7-4e93d9416a17	B000000663	1000	1000	BATCH001	FAKTUR001
d00e440e-38fe-4b10-b759-88a7db7b2d91	B000001745	1000	1000	BATCH001	FAKTUR001
9fd33fde-f953-4a3a-a176-f4d1dbef0a78	B000000969	1000	1000	BATCH001	FAKTUR001
ea616fcd-32ca-4eda-93e6-09b8555d9ab2	B000001482	1000	1000	BATCH001	FAKTUR001
2aab1b7f-205c-498b-9037-3013bbd2cddc	B000000468	1000	1000	BATCH001	FAKTUR001
f7cc4fee-7e16-4962-aa15-84b361d65958	B000000972	1000	1000	BATCH001	FAKTUR001
50d4b2f6-cfab-4c8a-9944-57e272e5872a	B000001964	1000	1000	BATCH001	FAKTUR001
8153e766-7f48-4510-8226-27cbc80f3db3	B000000905	1000	1000	BATCH001	FAKTUR001
fb0ddc0f-04fd-4584-94f9-a0e522c42bc5	B000001740	1000	1000	BATCH001	FAKTUR001
339e7c55-f185-4be6-b4cf-a9b017c1a328	B000000290	1000	1000	BATCH001	FAKTUR001
94504219-307b-4941-868d-b3f2c8d65634	B000001539	1000	1000	BATCH001	FAKTUR001
2fca6cf7-cc34-486f-ace1-72edb23e40c9	B000001943	1000	1000	BATCH001	FAKTUR001
200026a9-5608-483e-9d1e-dc9e2eb42304	B000001954	1000	1000	BATCH001	FAKTUR001
2ec12adf-3ab4-487b-a3b7-8db5b5ce7aec	B000001769	1000	1000	BATCH001	FAKTUR001
f2d819ae-08e1-4563-a2f0-ff50d6ec4f66	B000001817	1000	1000	BATCH001	FAKTUR001
721888c3-ceee-492e-a7cc-415e7de60801	B000000858	1000	1000	BATCH001	FAKTUR001
95322f58-4399-44dd-b708-68792b9604ed	B000001267	1000	1000	BATCH001	FAKTUR001
307e5c21-fef3-4525-be9f-59dd813d1d9a	B000001650	1000	1000	BATCH001	FAKTUR001
9c782fe2-e5dd-48ad-82c7-aaf6b9698ef2	B000001003	1000	1000	BATCH001	FAKTUR001
863740f9-c6b7-4c2f-8cdd-0b7c637e2388	B000001117	1000	1000	BATCH001	FAKTUR001
a2c3d52c-7b25-4123-9bb9-45a92215842f	A000000104	1000	1000	BATCH001	FAKTUR001
24d20068-dfa8-4c48-8f7f-8093a55598a0	B000001420	1000	1000	BATCH001	FAKTUR001
5fd68c5d-5cb6-48b7-916f-66f76349cc2c	B000000729	1000	1000	BATCH001	FAKTUR001
20a27834-5d5b-4872-b7be-3f1dc2e99375	B000001869	1000	1000	BATCH001	FAKTUR001
640bc1ca-3146-45a4-828b-96b7d01ed524	B000000857	1000	1000	BATCH001	FAKTUR001
8b44bb8a-1c76-4731-aa93-7d4638f0d38e	B000001396	1000	1000	BATCH001	FAKTUR001
21fb84d0-21f0-4e5f-a273-a47cb260c003	B000000265	1000	1000	BATCH001	FAKTUR001
e743ea03-1daa-486d-9b7c-1798aa2b4767	B000001278	1000	1000	BATCH001	FAKTUR001
b51c5349-4653-4302-a93d-19b05479ed86	B000001118	1000	1000	BATCH001	FAKTUR001
9c402021-b87c-4c11-8ecf-19771c8a6b1c	B000001510	1000	1000	BATCH001	FAKTUR001
140a673f-7302-4274-9ca2-919d108a6261	B000000395	1000	1000	BATCH001	FAKTUR001
bc9d5b94-0d91-434b-9b28-177af1538e21	B000000710	1000	1000	BATCH001	FAKTUR001
b9fc1eb6-9b1a-40fb-9643-c2f334390ce6	B000001071	1000	1000	BATCH001	FAKTUR001
a30c78fd-91f6-4144-aa90-aefb4d561c59	B000000648	1000	1000	BATCH001	FAKTUR001
aeb8fd4a-3d9a-4088-806c-96e63f7ad03e	B000000184	1000	1000	BATCH001	FAKTUR001
919e1a83-a3cf-4c06-a242-2d2fe44ed21b	B000000813	1000	1000	BATCH001	FAKTUR001
8f5f3b61-9884-404c-b720-74fd9f7b514a	B000000166	1000	1000	BATCH001	FAKTUR001
20581e2e-1b0b-4eca-9af6-bb011bb301ff	B000000630	1000	1000	BATCH001	FAKTUR001
b910f905-67bb-49a6-82d2-abd710bfc7f8	B000001767	1000	1000	BATCH001	FAKTUR001
00664139-6153-426c-bb9f-5fa6040ae361	B000000193	1000	1000	BATCH001	FAKTUR001
f92b8c95-a343-48ff-9e8c-65c48714b37f	B000001588	1000	1000	BATCH001	FAKTUR001
312da969-22b0-4342-811f-c5f23501df77	A000000120	1000	1000	BATCH001	FAKTUR001
49750627-4dea-4a99-8a9e-72e9b0ca716f	B000008006	1000	1000	BATCH001	FAKTUR001
41b047ff-35c0-478c-8d93-588050888ad2	A000000060	1000	1000	BATCH001	FAKTUR001
dd611dd9-1fd0-4c9b-bb88-5c880404a592	B000000682	1000	1000	BATCH001	FAKTUR001
0b46edfb-b329-404c-8a8d-eddeb2387649	B000002001	1000	1000	BATCH001	FAKTUR001
55a41520-3719-4cbb-bea8-50bdcce06d09	A000000019	1000	1000	BATCH001	FAKTUR001
907713aa-a3a0-4f26-a0b5-533d8d794ace	B000001857	1000	1000	BATCH001	FAKTUR001
a8e891d0-8a48-48ef-9041-d07188d83114	B000001941	1000	1000	BATCH001	FAKTUR001
c120ac25-9244-4331-acde-561c3b71440c	B000001259	1000	1000	BATCH001	FAKTUR001
625312d1-3e8b-4845-b807-e268a53935fd	B000001150	1000	1000	BATCH001	FAKTUR001
bea61fa2-6ea6-445a-aebd-8ce04735e4df	B000000932	1000	1000	BATCH001	FAKTUR001
002a699d-5cb2-4646-b969-251e9c847ea4	B000001260	1000	1000	BATCH001	FAKTUR001
a5869ff5-983d-422d-b12f-6c8bf1cddfef	B000000244	1000	1000	BATCH001	FAKTUR001
28ef28bb-0542-4c3d-b044-e80c655f69b2	B000001802	1000	1000	BATCH001	FAKTUR001
0189a04e-3c00-4b9e-a5b5-a60464f98651	B000001474	1000	1000	BATCH001	FAKTUR001
991283da-24fe-4c25-a53c-1b447579a20c	B000000222	1000	1000	BATCH001	FAKTUR001
04706cf1-f1b3-44c9-9d1b-bea6aefc218b	B000001568	1000	1000	BATCH001	FAKTUR001
5ba5aa12-c4d0-4a0b-b132-80e8f9487612	B000001244	1000	1000	BATCH001	FAKTUR001
74915024-d317-4794-b5cc-251f0416c379	B000000418	1000	1000	BATCH001	FAKTUR001
21af0e05-d383-4434-9cfa-c7c0629be4d6	B000001350s	1000	1000	BATCH001	FAKTUR001
345b0158-7a82-478a-b783-c26fcebbc223	B000002004	1000	1000	BATCH001	FAKTUR001
d766f889-6645-4d88-b52e-8d4236077437	B000001707	1000	1000	BATCH001	FAKTUR001
7690d799-f733-4fbf-9453-bc08d2ffbc7f	B000000175	1000	1000	BATCH001	FAKTUR001
119e7a52-2940-49ea-bc80-7b423c929fc1	B000000621	1000	1000	BATCH001	FAKTUR001
904597d0-084f-45c6-8a5a-7fb0881771ca	B000001667	1000	1000	BATCH001	FAKTUR001
5e15a33a-bd2f-40e5-9702-55de6aada78b	A000000072	1000	1000	BATCH001	FAKTUR001
e5fbc530-4243-4263-b36f-06c0e39cbf8b	B000000851	1000	1000	BATCH001	FAKTUR001
f01bb7e0-3f91-4ff4-be47-a6a2a2307cef	B000001927	1000	1000	BATCH001	FAKTUR001
bedb2085-fca1-4fe1-8ee2-fb9201d3c205	B000001452	1000	1000	BATCH001	FAKTUR001
23b01f8d-3318-4e20-babc-bdb28009ade2	A000000025	1000	1000	BATCH001	FAKTUR001
133af122-824f-4f5a-af06-ad917847dbf8	B000000388	1000	1000	BATCH001	FAKTUR001
2addad7b-c712-4ccd-a124-d94e9374ba8e	A000000793	1000	1000	BATCH001	FAKTUR001
9a735e18-649d-459e-8fb7-d263a52b60f8	B000000251	1000	1000	BATCH001	FAKTUR001
86518791-8270-44c5-ac39-b59f44e90699	B000001039	1000	1000	BATCH001	FAKTUR001
b64e8dc3-e2e9-4a5f-a211-97829cc901e6	A000000027	1000	1000	BATCH001	FAKTUR001
0ee542e6-9124-4ff5-a5c7-cdc3bb8da4ec	B000001590	1000	1000	BATCH001	FAKTUR001
59197357-a7b0-4d68-ad90-2d2202562e07	B000002031	1000	1000	BATCH001	FAKTUR001
39009360-0ac4-4964-9628-faf26311f504	B000001595	1000	1000	BATCH001	FAKTUR001
41cffe1e-7862-4380-b6f3-69921637af55	B000000907	1000	1000	BATCH001	FAKTUR001
277b0aa9-cfe1-4d50-b6ad-56f4a9589882	B000001076	1000	1000	BATCH001	FAKTUR001
8f2c93ea-c936-458b-86bc-a25a10cdc0c4	A000000070	1000	1000	BATCH001	FAKTUR001
59e5ac30-f379-41c3-85b9-f8d997ae3280	B000002025	1000	1000	BATCH001	FAKTUR001
e60fd49e-e942-460f-8937-3d65e3a88945	B000000937	1000	1000	BATCH001	FAKTUR001
bbd7aefc-db46-4b98-85d9-3bed0c58b10e	B000001601	1000	1000	BATCH001	FAKTUR001
fcddb3ff-97a9-47e8-9799-90605b537e7d	B000000210	1000	1000	BATCH001	FAKTUR001
8b8ecf74-6bd5-47bb-ad8c-404ea8e53ea1	B000001292	1000	1000	BATCH001	FAKTUR001
35d9b6fa-39ec-45d7-894c-962915b48dbb	A000000079	1000	1000	BATCH001	FAKTUR001
bb495b49-8c3f-4a19-a08e-66ad26a6545c	B000001351	1000	1000	BATCH001	FAKTUR001
e10c5d3f-b6f4-40ab-81b3-1cf097f38231	B000001095	1000	1000	BATCH001	FAKTUR001
2e2e47ac-6e4c-4dbb-9cf9-0e1f7d0f323b	C000000004	1000	1000	BATCH001	FAKTUR001
cf2fc670-385d-4af2-a90c-77a903f0a30a	B000001838	1000	1000	BATCH001	FAKTUR001
32fc5541-aa01-4105-90ca-78fd1f79820c	B000000407	1000	1000	BATCH001	FAKTUR001
d5fe0286-ca10-4e9a-ab5f-bf9305d9d9c6	A000000058	1000	1000	BATCH001	FAKTUR001
7f80eeeb-3938-45a6-873a-7cf9c46158f6	B000001593	1000	1000	BATCH001	FAKTUR001
ea459ed7-96ef-46cf-a1ef-7fd13df0a770	B000001489	1000	1000	BATCH001	FAKTUR001
784d2aee-980c-4bea-a7ce-1241789971a3	A000000800	1000	1000	BATCH001	FAKTUR001
418dc86c-e0d2-429d-9c68-c5f53a2f4680	B000000555	1000	1000	BATCH001	FAKTUR001
8e4d7998-cb1c-4ae2-8d3d-9c76f4fbb85d	B000000670	1000	1000	BATCH001	FAKTUR001
e8abc680-9e19-4454-84d5-ee45e071b99a	B000001986	1000	1000	BATCH001	FAKTUR001
478bf205-9cf5-4e38-a761-4fd1b500542d	B000001268	1000	1000	BATCH001	FAKTUR001
491b0258-1366-4402-9b0a-745e0776b403	B000002024	1000	1000	BATCH001	FAKTUR001
8cf0e889-6c7a-4edf-a94c-0e67c6867cee	B000001542	1000	1000	BATCH001	FAKTUR001
3277d15c-e549-430d-b09c-b099acea0c2c	B000000577	1000	1000	BATCH001	FAKTUR001
4c8a4938-e1f5-46d1-85eb-a0308aaad6bd	A000000100	1000	1000	BATCH001	FAKTUR001
fa6e7dfd-e8ad-4aba-b937-d556895a253a	B000000096	1000	1000	BATCH001	FAKTUR001
e0ea8a53-d2e0-41ad-bc3c-617344e0c256	A000000097	1000	1000	BATCH001	FAKTUR001
df8536a6-37f7-4bcc-a967-96a765a06085	B000001031	1000	1000	BATCH001	FAKTUR001
404b416f-a2a9-41ef-a107-94ee7c2ec081	B000000253	1000	1000	BATCH001	FAKTUR001
c363ef2b-5771-4d7e-a79c-0f6c00802653	B000001529	1000	1000	BATCH001	FAKTUR001
cfcd422a-5ef4-490b-9bc5-c35aa23f4ced	B000001616	1000	1000	BATCH001	FAKTUR001
9bcbd6db-fe8d-4d99-9c2f-71acb7929567	B000000288	1000	1000	BATCH001	FAKTUR001
49fab062-8e15-497a-80ec-412b42561624	B000000214	1000	1000	BATCH001	FAKTUR001
8631653c-8c08-4f96-bf5e-a04156b7b9d9	B000000911	1000	1000	BATCH001	FAKTUR001
b016ecf3-07c8-47eb-b91c-dc7704c1900e	A000000061	1000	1000	BATCH001	FAKTUR001
3df4e189-9e8b-4cfc-8ea7-489ff087c7cb	B000001477	1000	1000	BATCH001	FAKTUR001
338d32f6-e605-4e62-8f61-9dca86d21c1a	B000001219	1000	1000	BATCH001	FAKTUR001
57578b16-8193-4248-842b-0143a507d11b	B000001548	1000	1000	BATCH001	FAKTUR001
8676d325-68d6-4a50-9e3d-39f510f71a1a	A000000033	1000	1000	BATCH001	FAKTUR001
c584a7b3-ee32-4a34-bbb7-8addac33ce5d	A000000110	1000	1000	BATCH001	FAKTUR001
c8c5abc2-4c4a-484c-8bae-25106f873fd0	B000001033	1000	1000	BATCH001	FAKTUR001
ceed29de-347e-454f-8eee-0992370b74be	B000001479	1000	1000	BATCH001	FAKTUR001
445a6ee1-a022-476c-ab4b-b30fe4bc04e7	B000001506	1000	1000	BATCH001	FAKTUR001
6d340240-ac3b-4c52-b2fa-d95686501fc8	A000000040	1000	1000	BATCH001	FAKTUR001
7df39fa1-d96d-4f59-9449-f01673261011	B000000869	1000	1000	BATCH001	FAKTUR001
b6e29ab6-0dd1-44a7-ad05-64d9c20c4341	B000001328	1000	1000	BATCH001	FAKTUR001
f491a703-ad9e-4277-a029-6edcafefb5d5	B000001524	1000	1000	BATCH001	FAKTUR001
7525df1b-dcaa-4999-b3b5-aaaa174df90d	B000000260	1000	1000	BATCH001	FAKTUR001
bed15187-5438-433b-b9ba-99d0802320bd	B000000284	1000	1000	BATCH001	FAKTUR001
dfc69acf-5e95-42d9-949d-e8d70f7b2035	B000001901	1000	1000	BATCH001	FAKTUR001
6461de03-37f5-480b-b82f-282781f7664e	B000001660	1000	1000	BATCH001	FAKTUR001
87eedc1c-0a0a-4a73-b413-093fb5fca59f	B000001711	1000	1000	BATCH001	FAKTUR001
7760e025-c414-478b-b21b-c185a1b2ea2a	B000001623	1000	1000	BATCH001	FAKTUR001
69ddcf84-2335-4afa-bcff-c4f9a68ea657	B000000602	1000	1000	BATCH001	FAKTUR001
8e55d4b9-271c-4488-bd2c-991c1452c5d1	B000001463	1000	1000	BATCH001	FAKTUR001
cba2bf3e-f5af-481b-8587-b7092593f59b	B000001043	1000	1000	BATCH001	FAKTUR001
0ee601fc-2499-4eb1-b4f2-5ac4a53ce749	B000001256	1000	1000	BATCH001	FAKTUR001
5027fa1c-cc9b-491e-bf74-9932a657d439	B000000217	1000	1000	BATCH001	FAKTUR001
f803bb98-e4e5-4993-af12-ecf5d1feaf7f	B000000264	1000	1000	BATCH001	FAKTUR001
67f289e0-3612-4fa2-86e7-726060295479	B000001793	1000	1000	BATCH001	FAKTUR001
1b0b2092-200a-4a93-9132-4f20eac1df62	B000002020	1000	1000	BATCH001	FAKTUR001
29bb1a65-e1df-4b59-9b14-5b757be25d6e	B000001532	1000	1000	BATCH001	FAKTUR001
2dd041db-b221-496a-b8f9-139b3d1c5a4a	B000001034	1000	1000	BATCH001	FAKTUR001
5e106660-e97a-4014-97a2-5eecdb1b130e	B000001308	1000	1000	BATCH001	FAKTUR001
fcc29046-fa7d-4708-a745-cb00f1a0abca	B000000666	1000	1000	BATCH001	FAKTUR001
36ecc2b6-008e-449a-940e-1b69abf7bb2a	B000001565	1000	1000	BATCH001	FAKTUR001
ce86d197-c62b-40d5-9c9d-1085cae235ab	A000000114	1000	1000	BATCH001	FAKTUR001
732394a3-5dde-4175-be1a-3993db12a1f0	B000000950	1000	1000	BATCH001	FAKTUR001
5c555c71-0861-4004-85fd-ffe8815cdc59	B000001582	1000	1000	BATCH001	FAKTUR001
081438d8-6713-4cc0-b3cd-02ec1e75fe56	B000001367	1000	1000	BATCH001	FAKTUR001
9cb1238a-f1fa-4fd3-b000-059c161ccd0d	B000001537	1000	1000	BATCH001	FAKTUR001
4c7c4258-d1ed-4394-822a-1a4ed0efa7af	B000001609	1000	1000	BATCH001	FAKTUR001
eacbe236-fa04-4b0d-bbf4-b0d29489fdaa	B000001262	1000	1000	BATCH001	FAKTUR001
2e4f7a50-d955-4bd6-96ae-22bd4ab3ad69	B000001269	1000	1000	BATCH001	FAKTUR001
d28a989f-d457-432f-addf-0e983d61480b	B000000712	1000	1000	BATCH001	FAKTUR001
da86ce53-3004-4b3b-92a1-2bf2016ab451	B000002000	1000	1000	BATCH001	FAKTUR001
44e3fe1a-7901-4195-afbd-508c034ac541	B000000153	1000	1000	BATCH001	FAKTUR001
291e50b2-b3f3-4af8-b1e8-eed09d4d5b54	B000001035	1000	1000	BATCH001	FAKTUR001
f19ff68a-2a02-4c13-a2bf-7f609ae2491f	B000000163	1000	1000	BATCH001	FAKTUR001
24b95e57-617d-4022-8afe-a96d5412ff26	B000001543	1000	1000	BATCH001	FAKTUR001
01f8bb61-6a0a-4a45-a53d-3e99c48a3a20	B000001232	1000	1000	BATCH001	FAKTUR001
ca494dc1-ddf7-42f3-93ef-a817b7a10a2f	B000001077	1000	1000	BATCH001	FAKTUR001
d5fb88b5-1d0c-46c9-ac78-1abe335b6589	B000001290	1000	1000	BATCH001	FAKTUR001
00782575-eef9-4d37-acb3-df8fbfea881e	B000000439	1000	1000	BATCH001	FAKTUR001
0f5c4313-43ca-43d5-9f5a-e7c51b495a5a	B000001570	1000	1000	BATCH001	FAKTUR001
f2d982dd-e8e6-4c22-9ec7-28fdffaaf6a8	A000000006	1000	1000	BATCH001	FAKTUR001
cd2e4751-6442-4b35-814f-9e7b6cfb190f	B000001195	1000	1000	BATCH001	FAKTUR001
0a2505b7-d971-40c3-800d-423145fd155c	A000000045	1000	1000	BATCH001	FAKTUR001
de34ec42-8b3a-4ef5-989e-e444ef30fdc9	B000001448	1000	1000	BATCH001	FAKTUR001
2a7a06a4-d5d2-401b-a60e-e1d4021625ca	B000000187	1000	1000	BATCH001	FAKTUR001
22d349e4-2db6-498d-a11f-ccf2977b98bd	B000001922	1000	1000	BATCH001	FAKTUR001
650a41c0-4b40-4eb2-b22e-a7689bc46861	B000001612	1000	1000	BATCH001	FAKTUR001
c19c465f-2a2d-4f9b-97e0-61e14c5bbfa2	B000001819	1000	1000	BATCH001	FAKTUR001
552501e2-928c-48f3-a178-64f97303ba81	B000000996	1000	1000	BATCH001	FAKTUR001
64831920-935e-4e6d-8c7e-af3d59d62ca6	B000001380	1000	1000	BATCH001	FAKTUR001
49fd5229-5138-4fc7-a24e-2b75dfefab70	B000000452	1000	1000	BATCH001	FAKTUR001
1d42fa92-e8ac-417c-8a56-ff1460455eeb	B000000216	1000	1000	BATCH001	FAKTUR001
c2ac19ad-6be6-4bec-a43f-a55dd64bc67f	B000000769	1000	1000	BATCH001	FAKTUR001
35d92385-c99d-4c5e-ba79-4b974ae58f41	B000001932	1000	1000	BATCH001	FAKTUR001
fd80c910-ce3d-40aa-986f-51fb70e4a08d	B000001598	1000	1000	BATCH001	FAKTUR001
5ad23259-4f85-40cc-afd5-5336ea2cf0eb	B000001450	1000	1000	BATCH001	FAKTUR001
04616e3f-289a-40d0-9ce0-2cbca1045369	B000001502	1000	1000	BATCH001	FAKTUR001
a742f883-1b21-4d5e-8097-e8b0e85d05ba	B000000228	1000	1000	BATCH001	FAKTUR001
f98761ee-25c7-4e34-9363-310c90881ee4	B000000449	1000	1000	BATCH001	FAKTUR001
71eae6a9-005b-4990-8fb7-c4e6d99a53fd	B000000881	1000	1000	BATCH001	FAKTUR001
cd696fe8-f75e-4b90-99e4-ef19b567b3b5	B000001000	1000	1000	BATCH001	FAKTUR001
c24d59d9-32b7-461c-8c44-835e0895c559	B000000129	1000	1000	BATCH001	FAKTUR001
32f0e431-0092-40fa-aed1-5a4b93020e79	B000001552	1000	1000	BATCH001	FAKTUR001
f0897bd8-e98b-4720-9ca2-933070028bdd	B000000795	1000	1000	BATCH001	FAKTUR001
d871e7a7-ddd4-4104-a530-50231fb914b1	B000000482	1000	1000	BATCH001	FAKTUR001
3bfaf26f-23ac-46e7-bb94-4c249be89fe8	B000000637	1000	1000	BATCH001	FAKTUR001
ff3639fc-3a22-46af-a1b7-3440383e3e68	B000000752	1000	1000	BATCH001	FAKTUR001
533fc91d-f93b-4076-b651-3140aaffd824	B000001790	1000	1000	BATCH001	FAKTUR001
a8cae32f-556a-49e6-bb84-4f4764ba7a30	B000001994	1000	1000	BATCH001	FAKTUR001
dfcacee5-930f-4641-966c-9977506e8273	B000001464	1000	1000	BATCH001	FAKTUR001
b1a6d939-36ab-488e-93c0-6a601a50aa8d	B000000748	1000	1000	BATCH001	FAKTUR001
0f141d0e-150c-40b6-ac98-c86d73368aba	B000000596	1000	1000	BATCH001	FAKTUR001
90d0a74d-b793-4f53-b0ec-08df7a90c53e	B000000741	1000	1000	BATCH001	FAKTUR001
f3e8bf6d-b9b6-449c-a03b-9366c54f9a70	B000001958	1000	1000	BATCH001	FAKTUR001
a4da31a5-d654-40ab-a2a7-b47541349f54	B000000121	1000	1000	BATCH001	FAKTUR001
0dadb530-b512-4e45-814f-adc10181de25	A000000012	1000	1000	BATCH001	FAKTUR001
8084f18f-aca1-4baf-a084-d2a2c60d4163	B000000639	1000	1000	BATCH001	FAKTUR001
67f72cfe-4b4d-48af-ab22-b74686eb4cce	B000000392	1000	1000	BATCH001	FAKTUR001
40528f86-a3a7-404f-a65c-2885c661d06c	B000001158	1000	1000	BATCH001	FAKTUR001
4997a6c5-2bfe-4062-ac4a-84993141eb35	B000001153	1000	1000	BATCH001	FAKTUR001
139fee38-be7a-41a4-9dce-b007496f604b	B000001820	1000	1000	BATCH001	FAKTUR001
227a6e39-1731-40e6-9133-53b9e8902908	B000001163	1000	1000	BATCH001	FAKTUR001
8632f488-4d98-4d3f-8211-263230baa836	B000001783	1000	1000	BATCH001	FAKTUR001
4d5a4684-77a0-4857-873b-c386cccf82a3	A000000001	1000	1000	BATCH001	FAKTUR001
ce186635-bc6f-4343-a48c-a92aa12fb695	B000000362	1000	1000	BATCH001	FAKTUR001
f73cea0a-5507-428a-89ba-c230236b2bbb	B000000888	1000	1000	BATCH001	FAKTUR001
5b51cb8a-9856-42b2-8196-959afe3aa818	B000001969	1000	1000	BATCH001	FAKTUR001
25db22b2-fba1-43be-8a1a-b34849dd518d	B000001023 	1000	1000	BATCH001	FAKTUR001
932a8fbd-22a3-4397-8dcd-6c77831451f7	B000000585	1000	1000	BATCH001	FAKTUR001
36db4f4a-16c1-4494-a295-11ee9374edba	B000000818	1000	1000	BATCH001	FAKTUR001
dd6e05da-7bba-4e34-8f5e-7d88269da446	B000000913	1000	1000	BATCH001	FAKTUR001
fa82c54b-8201-4a70-98c0-2ecdab0caecd	B000001734	1000	1000	BATCH001	FAKTUR001
030b9912-363d-437c-92b4-6f2096c0e91c	B000001586	1000	1000	BATCH001	FAKTUR001
da6dd586-6fbf-4f23-9b3d-22b92d15e055	B000001725	1000	1000	BATCH001	FAKTUR001
076be55c-4add-4bca-9c1a-9645304f2b46	B000000695	1000	1000	BATCH001	FAKTUR001
69d16af3-cf69-4211-907c-963111066069	B000001104	1000	1000	BATCH001	FAKTUR001
d22889e0-5896-4f56-a80a-2e4e9387b2f3	B000000714	1000	1000	BATCH001	FAKTUR001
f18b93dd-d5dc-462c-ab9c-579d0139bc46	B000001141	1000	1000	BATCH001	FAKTUR001
85997e63-6761-4044-8b63-7be0fc8c3e54	B000008002	1000	1000	BATCH001	FAKTUR001
01e7d0aa-de3b-4db9-a92e-61312ea0eff4	B000000325	1000	1000	BATCH001	FAKTUR001
c1215696-1ab9-4657-b7ab-dd2e25be7bdf	B000000185	1000	1000	BATCH001	FAKTUR001
a7ca422b-175c-429e-8759-1c56f2a29cb6	B000001681	1000	1000	BATCH001	FAKTUR001
b8226d9d-c0e1-4f5e-969d-e58f1245af8a	B000000880	1000	1000	BATCH001	FAKTUR001
bf886ccf-a0e7-4dbb-b30e-6a96ddbf07f9	B000000944	1000	1000	BATCH001	FAKTUR001
8415f91f-91a0-4c69-a4a9-4901b238fb80	B000001203	1000	1000	BATCH001	FAKTUR001
83d8c912-9b38-47fe-8b63-448124dae00e	B000001843	1000	1000	BATCH001	FAKTUR001
0dc772db-b214-4451-8735-0cf5ea49cfa6	B000001340	1000	1000	BATCH001	FAKTUR001
36f3070b-4473-46f6-ac39-70848018292f	B000000832	1000	1000	BATCH001	FAKTUR001
b876b27e-0755-450e-bcfa-aaaaf292fff5	B000000381	1000	1000	BATCH001	FAKTUR001
571ad913-b059-46e9-b4e4-0e8aed046c23	A000000035	1000	1000	BATCH001	FAKTUR001
ea6f9bdf-3c68-45dd-bf3a-4dd93fb664b8	B000001602	1000	1000	BATCH001	FAKTUR001
84f6cd8b-abd6-49a7-8715-42f95dbf8193	B000001347	1000	1000	BATCH001	FAKTUR001
c0f5edb7-6925-4782-903d-9c5d49b7f6e7	B000001751	1000	1000	BATCH001	FAKTUR001
03750eee-54b6-45d8-9fa2-b233e91b5f3f	B000001713	1000	1000	BATCH001	FAKTUR001
cc7c13ee-e8b9-4111-88d8-99d3181a610b	B000001395	1000	1000	BATCH001	FAKTUR001
b860c1e7-9231-413b-9174-f8ba31b1e767	B000001446	1000	1000	BATCH001	FAKTUR001
557130ab-edb6-4b40-953f-32947394dbe9	B000000955	1000	1000	BATCH001	FAKTUR001
4b0e3d2d-bea0-4888-aad0-d965f884497e	B000000671	1000	1000	BATCH001	FAKTUR001
ce0ec342-827e-43ed-942c-6851f49427fe	B000000915	1000	1000	BATCH001	FAKTUR001
c3fd0e35-811f-4189-97fa-ed6b501899bf	B000001264	1000	1000	BATCH001	FAKTUR001
1e8263c6-984d-4b84-9df9-10ad0b0de19a	A000000794	1000	1000	BATCH001	FAKTUR001
3bf12a7f-50bc-45ce-80e2-a4f321ab115b	B000000704	1000	1000	BATCH001	FAKTUR001
ab41efb2-8bcd-4db8-873b-250172a227ba	B000001205	1000	1000	BATCH001	FAKTUR001
9a78a47d-80d6-45a9-8ab1-2552eeef25f3	B000000603	1000	1000	BATCH001	FAKTUR001
f4780af5-244e-458a-9511-7afb819fc345	B000001157	1000	1000	BATCH001	FAKTUR001
58b6d9aa-fe6c-45ee-ad42-291e0683e609	B000000117	1000	1000	BATCH001	FAKTUR001
e4b6f7d0-d285-468d-8e69-cfb40a81d6ba	B000000255	1000	1000	BATCH001	FAKTUR001
107dfce5-b605-4138-8721-12bb047b909d	B000001162	1000	1000	BATCH001	FAKTUR001
925a8220-b998-44ad-9be8-ab384da9cce2	B000000954	1000	1000	BATCH001	FAKTUR001
592088c0-dc56-45cc-a7e4-154284d72af1	B000001342	1000	1000	BATCH001	FAKTUR001
915c8b9c-18d9-46f0-830e-9fb3995c43c4	B000001024	1000	1000	BATCH001	FAKTUR001
6f01acd3-c29b-44ed-aca1-a009f68899cc	B000000897	1000	1000	BATCH001	FAKTUR001
76773711-dd3e-42ed-ae5b-044c1ca5d543	B000000189	1000	1000	BATCH001	FAKTUR001
a64edb8d-978c-481e-bb57-a39910a2e2a8	B000000148	1000	1000	BATCH001	FAKTUR001
662ad5c2-1e94-4661-a82f-368dbfd76520	B000000410	1000	1000	BATCH001	FAKTUR001
762650e1-2db0-483c-8b2b-b60dfb8387cb	B000000345	1000	1000	BATCH001	FAKTUR001
aa19bb32-5d7a-4c0e-9fd3-3c1d96e5d31b	B000000347	1000	1000	BATCH001	FAKTUR001
a60d135c-9597-43cd-a58e-48411d53a0ec	B000001752	1000	1000	BATCH001	FAKTUR001
f5f7b0dd-94ff-498c-babd-394a7897830f	B000000316	1000	1000	BATCH001	FAKTUR001
e0dd3ad5-700b-4246-8b1f-1c5ba4bc1f46	B000001944	1000	1000	BATCH001	FAKTUR001
067d1cfc-5ff4-4987-9c2c-cd432ddb684a	B000000150	1000	1000	BATCH001	FAKTUR001
fdb9886c-2be9-4410-9b7c-640f630b0a5e	B000001424	1000	1000	BATCH001	FAKTUR001
79c6ea33-7524-4a04-a255-3f48ade25582	B000001111	1000	1000	BATCH001	FAKTUR001
45098d08-d4f9-4d65-bd6e-b3f4e6c26b96	B000000273	1000	1000	BATCH001	FAKTUR001
8b01880e-4355-43ea-a9de-5ce2398cf716	B000001702	1000	1000	BATCH001	FAKTUR001
e48ddf62-8335-4bf6-8b3e-f504e61f54cf	B000002027	1000	1000	BATCH001	FAKTUR001
6f869f45-aa2c-4716-b54a-e06a0ca953a4	B000001766	1000	1000	BATCH001	FAKTUR001
44591ad4-2b07-41d5-82e2-f7a77274e57e	B000001129	1000	1000	BATCH001	FAKTUR001
c8cf586d-5a61-4058-b710-35cb6a2b5481	B000000190	1000	1000	BATCH001	FAKTUR001
11f41648-7998-4b01-a1b5-eb2b3dfb0bb0	B000001934	1000	1000	BATCH001	FAKTUR001
e1df321f-8752-4d30-8af2-eeb6ca054b3b	B000000854	1000	1000	BATCH001	FAKTUR001
6b2fb290-4eca-4f15-b01f-c45ea9f16761	B000001891	1000	1000	BATCH001	FAKTUR001
61cd6367-fdbb-4dea-897b-d0310ee705d9	B000000112	1000	1000	BATCH001	FAKTUR001
c8f45f64-ef40-406d-86b7-3be0c4a0f0d8	B000000948	1000	1000	BATCH001	FAKTUR001
cead8db7-1a97-419f-85fd-088c60924294	B000000647	1000	1000	BATCH001	FAKTUR001
ae5a1215-421e-4096-a9db-7f8e84098bce	B000000469	1000	1000	BATCH001	FAKTUR001
0baf0dd9-c334-436d-b393-fcf49e072c6f	B000001022	1000	1000	BATCH001	FAKTUR001
36a1662b-caf2-4f61-8327-7b1dc8832e9a	B000001159	1000	1000	BATCH001	FAKTUR001
1f7e6d27-b207-4da0-8086-9b9a8b5595d2	A000000091	1000	1000	BATCH001	FAKTUR001
7d25f285-75e3-4ec0-93d1-20bfe949befc	B000001143	1000	1000	BATCH001	FAKTUR001
47e41f3c-a285-44c7-b6a4-592896dacd6e	B000001630	1000	1000	BATCH001	FAKTUR001
633b4286-5634-4d69-9af3-64a9b160611b	B000001459	1000	1000	BATCH001	FAKTUR001
9ef7eb34-6bf5-44ea-8068-f286433266c4	B000001727	1000	1000	BATCH001	FAKTUR001
6ce1488f-7a45-498e-bcb9-ed3dc01fbbce	B000001663	1000	1000	BATCH001	FAKTUR001
549ba4f7-9b7d-4e6d-9f9f-6f13738ded17	B000001959	1000	1000	BATCH001	FAKTUR001
ae159ad2-22a3-4983-88d6-f196272d10fd	B000001981	1000	1000	BATCH001	FAKTUR001
2a68245e-f5ff-459c-abb6-772b9dcf8a59	A000000067	1000	1000	BATCH001	FAKTUR001
36cf7d0b-c032-4349-8f9d-a254b9bfc405	B000001505	1000	1000	BATCH001	FAKTUR001
cf0d3667-0350-4f03-8291-c7ada8a0e8e2	B000000976	1000	1000	BATCH001	FAKTUR001
ca557919-a564-42ea-b63b-86283bcee282	B000001916	1000	1000	BATCH001	FAKTUR001
0770b040-7a45-4518-9a14-9603dda1f597	B000001359	1000	1000	BATCH001	FAKTUR001
c763d7ab-b64e-4a4b-9ae6-757b6e4238a2	B000000652	1000	1000	BATCH001	FAKTUR001
a81a0add-a896-4372-bad6-238dac30e331	B000000698	1000	1000	BATCH001	FAKTUR001
a4971bae-3a61-4522-93fd-116436509ab8	B000000721	1000	1000	BATCH001	FAKTUR001
3a978e5e-6972-453b-a7db-12fb21e27c15	B000001248	1000	1000	BATCH001	FAKTUR001
928fa665-13c1-4574-a5e1-41d4f1cd7f6f	B000001794	1000	1000	BATCH001	FAKTUR001
5dd44c5b-08fc-46bb-b5a1-1425a0183392	B000000243	1000	1000	BATCH001	FAKTUR001
d3931d8c-6bab-4a04-9a48-49ba80e4e20e	B000001299	1000	1000	BATCH001	FAKTUR001
fcf6f487-1721-4d34-a2c8-5d544cd7d873	B000000186	1000	1000	BATCH001	FAKTUR001
2b2efff4-7eb4-4663-ac16-50bb16fed0c0	B000000428	1000	1000	BATCH001	FAKTUR001
dac3731e-4199-49da-9904-9ac55f46e188	B000000810	1000	1000	BATCH001	FAKTUR001
82c6f7f9-98ea-4bd5-8c29-68408ccae9f6	A000000087	1000	1000	BATCH001	FAKTUR001
bdadf46b-a658-4405-b160-b3fa6a53bd4d	A000000007	1000	1000	BATCH001	FAKTUR001
6cd8dc69-a20d-487b-8020-5f94916aeea2	B000001645	1000	1000	BATCH001	FAKTUR001
9dc1d54e-accb-44c9-af8f-bf6128cd3edd	B000001266	1000	1000	BATCH001	FAKTUR001
4a50a429-d917-41fe-969e-92f526138850	B000001754	1000	1000	BATCH001	FAKTUR001
68f31e4d-b014-4036-b24d-63c08da4d460	B000000776	1000	1000	BATCH001	FAKTUR001
38a0ef22-d9b5-4b9e-a5e2-568448bf12c2	B000000902	1000	1000	BATCH001	FAKTUR001
7266d300-a78d-4559-a536-3336ffd9f066	B000001930	1000	1000	BATCH001	FAKTUR001
566d3082-fb74-486e-ab32-e285b32ccfab	B000001503	1000	1000	BATCH001	FAKTUR001
3129911f-c3fe-4e66-b8bf-746e49792d3e	B000001350	1000	1000	BATCH001	FAKTUR001
03d1ca71-013f-41b6-9fc9-4af6caa651fa	A000000789	1000	1000	BATCH001	FAKTUR001
3edba306-3eca-48b1-a741-a4a15ae0c9de	B000001161	1000	1000	BATCH001	FAKTUR001
7efcec0b-62cd-4718-9376-0c6fa683d0b2	B000000844	1000	1000	BATCH001	FAKTUR001
d1137edd-e7a9-42bc-bd86-628e6e79c16d	B000001406	1000	1000	BATCH001	FAKTUR001
b171ecc6-fb3f-44b6-bcd0-773c1656dc58	B000000457	1000	1000	BATCH001	FAKTUR001
d6893164-ea64-4b19-a938-a959ffc7c3d1	B000000400	1000	1000	BATCH001	FAKTUR001
71bf0fce-850a-4d86-89db-7ccac26d4974	B000001826	1000	1000	BATCH001	FAKTUR001
c4e0d816-702b-4a2f-9215-97a8f5d764a2	A000000018	1000	1000	BATCH001	FAKTUR001
a227dfbe-0415-4b64-a2a4-2f0e313452f8	A000000023	1000	1000	BATCH001	FAKTUR001
3362d6d3-a1ad-4200-8153-d961a2b4d381	B000001072	1000	1000	BATCH001	FAKTUR001
db18111c-cfd2-48d4-8a22-18873a5cf529	B000000853	1000	1000	BATCH001	FAKTUR001
fef13c3a-ba79-4435-a144-f892efd898a0	B000000785	1000	1000	BATCH001	FAKTUR001
36606e05-5ac2-4fbb-ad1d-5188d6583b76	B000001423	1000	1000	BATCH001	FAKTUR001
b897ef0f-0da0-421f-916e-9692c7434d77	B000001470	1000	1000	BATCH001	FAKTUR001
00c890bd-b2c0-43c2-bfff-21bd48f187cc	B000000289	1000	1000	BATCH001	FAKTUR001
c19cb8f4-a915-4f5d-9540-354ad05b1558	B000001885	1000	1000	BATCH001	FAKTUR001
0db9bdaa-6b23-4aa1-8d51-ee3df569c331	B000000962	1000	1000	BATCH001	FAKTUR001
72b76768-ac18-428e-b2c5-3a88cce91adb	B000001915	1000	1000	BATCH001	FAKTUR001
abd9d63d-503c-4cba-bf9e-325a847a01c3	B000001466	1000	1000	BATCH001	FAKTUR001
2d6753ee-723b-4464-8e73-d799f5ee0253	B000000747	1000	1000	BATCH001	FAKTUR001
89ba5de0-ed81-4025-8e15-4fab47dff5e9	B000000940	1000	1000	BATCH001	FAKTUR001
5a307317-0dee-4946-9ffe-c24461293b92	B000001599	1000	1000	BATCH001	FAKTUR001
69703281-61fd-4c01-ba5e-18945dcc743f	B000001897	1000	1000	BATCH001	FAKTUR001
dde31dac-bcff-4f4c-826c-dbef90fc5b47	B000000202	1000	1000	BATCH001	FAKTUR001
682cbbcb-ada7-48e4-a99b-43f1d8bf2605	B000001433	1000	1000	BATCH001	FAKTUR001
3ea6ba12-0ca1-470f-ba5d-909c4929310c	B000000999	1000	1000	BATCH001	FAKTUR001
3782f6ea-47a4-4f9c-8c86-22f7f8cd4f6b	B000001410	1000	1000	BATCH001	FAKTUR001
0a813bbc-c403-479b-b2bf-5e5ecc642aa4	A000000117	1000	1000	BATCH001	FAKTUR001
3875bc84-745f-40c7-ae87-7e7b9714af69	B000000605	1000	1000	BATCH001	FAKTUR001
e52d939e-0544-4e0b-be05-15f8f516bcb9	B000001965	1000	1000	BATCH001	FAKTUR001
f867765c-840d-4f8d-883f-d3cdda50c462	B000000982	1000	1000	BATCH001	FAKTUR001
352162e5-c892-4bb6-a930-f066eb6b1cdd	B000000435	1000	1000	BATCH001	FAKTUR001
fa0b688a-22b4-4f1d-8a47-e9de0fe052c9	B000000960	1000	1000	BATCH001	FAKTUR001
86b856cb-2501-41d3-a6f6-916179f326e3	B000001121	1000	1000	BATCH001	FAKTUR001
f9dfc310-5cf0-4a48-a5a3-2257628e9181	B000001317	1000	1000	BATCH001	FAKTUR001
84fb5733-c5d5-4993-a048-bdc846d7bf96	B000000135	1000	1000	BATCH001	FAKTUR001
324856b0-0b09-49e4-8be6-1fa906766c0d	B000000925	1000	1000	BATCH001	FAKTUR001
bef51a34-9c6e-473a-97af-b817d2439116	B000001575	1000	1000	BATCH001	FAKTUR001
5b92b654-1c4d-4e20-b2cd-a618fdc181a2	B000000861	1000	1000	BATCH001	FAKTUR001
743ab6bf-2847-4557-96b9-c122c492ae14	B000000678	1000	1000	BATCH001	FAKTUR001
dfc5176f-4a1f-449e-a87c-fe5de7c0964c	B000001246	1000	1000	BATCH001	FAKTUR001
1ff71610-f7c4-42f6-a925-46d8bf713b16	B000001953	1000	1000	BATCH001	FAKTUR001
cc9e0592-3a19-4f3c-85c2-708c9fce0f8d	B000001360	1000	1000	BATCH001	FAKTUR001
255e9aae-6263-4810-8e07-8030a75e5ef1	B000001345	1000	1000	BATCH001	FAKTUR001
17eedd16-03bd-4f0b-8494-961d0aa5df79	B000001055	1000	1000	BATCH001	FAKTUR001
db98b3c8-36a0-45f0-9b6c-ed3a7216cf86	B000001900	1000	1000	BATCH001	FAKTUR001
afea075b-aea3-442e-9247-d546e3e6cfe4	B000001574	1000	1000	BATCH001	FAKTUR001
900162c1-7d6d-4364-bdf1-c2a7eb23df6f	B000001791	1000	1000	BATCH001	FAKTUR001
85431eed-753f-4fd4-b2df-311190a768a2	B000000848	1000	1000	BATCH001	FAKTUR001
29bf904e-181c-41b8-83b2-51e550f857cf	B000001786	1000	1000	BATCH001	FAKTUR001
96fc434b-93be-4a25-a938-d55ce8b7c293	B000001594	1000	1000	BATCH001	FAKTUR001
799494e7-61f1-4ea1-97be-8cf601ae70e3	B000001952	1000	1000	BATCH001	FAKTUR001
b4290b67-a823-4bd1-893c-f95697454bf4	A000000121	1000	1000	BATCH001	FAKTUR001
40078b97-f814-4697-8f2f-b922ed552dbc	B000000998	1000	1000	BATCH001	FAKTUR001
a6e9c5d2-43d5-4a4b-a7bc-97e46693245b	B000001165	1000	1000	BATCH001	FAKTUR001
05ffb576-6701-4537-83ac-e512378ac6bf	B000001057	1000	1000	BATCH001	FAKTUR001
e72465f4-2eb8-4d74-ab15-0ac27d02bc2b	B000000479	1000	1000	BATCH001	FAKTUR001
8e7dd0c3-98e7-49fe-9376-43f0f04ea6ef	B000000791	1000	1000	BATCH001	FAKTUR001
536c2644-01d6-457d-b15d-b4ee5966519b	B000001103	1000	1000	BATCH001	FAKTUR001
295dec1e-2a6d-4acf-9539-4c93b372aea6	B000001906	1000	1000	BATCH001	FAKTUR001
63809584-18ab-4bf9-87d0-53e419e5dcd9	B000000466	1000	1000	BATCH001	FAKTUR001
d063055f-c61a-45c7-9556-d860171492fc	B000001632	1000	1000	BATCH001	FAKTUR001
aa20fd68-f50a-4bb3-98be-418b9b0d8067	B000001240	1000	1000	BATCH001	FAKTUR001
4f5dfe04-6a5c-4f2b-bdee-f748114260cf	B000001691	1000	1000	BATCH001	FAKTUR001
bf300c5b-8136-4482-869a-615fbc59dab5	B000001970	1000	1000	BATCH001	FAKTUR001
2aef1e97-bc6d-4c8c-b333-81dfe2557924	B000000598	1000	1000	BATCH001	FAKTUR001
e72afcd0-f512-43a7-805f-80f99dc2b697	B000000760	1000	1000	BATCH001	FAKTUR001
c2f33e0b-e97e-44dc-a64a-9ebdefe42f07	B000001771	1000	1000	BATCH001	FAKTUR001
7f3f007a-c92b-4476-bf0d-5b43013d1d43	B000001940	1000	1000	BATCH001	FAKTUR001
18f8ddf4-c5c0-4b25-aaf1-d449dd9add0b	B000000183	1000	1000	BATCH001	FAKTUR001
da169795-a74a-4130-af64-9fdff18acb24	B000000179	1000	1000	BATCH001	FAKTUR001
6be9fb87-4c42-45c7-ac42-fe903306007f	B000000658	1000	1000	BATCH001	FAKTUR001
4017e125-c8a5-43a6-a69e-bea109565923	A000000041	1000	1000	BATCH001	FAKTUR001
9d1c7066-8ee0-4c13-88a2-36c6c085c9db	A000000791	1000	1000	BATCH001	FAKTUR001
a44dd996-f88d-4860-9b63-b2b93634e362	B000001760	1000	1000	BATCH001	FAKTUR001
4eb47d27-ee7c-4f77-9c02-eab65b54a48b	A000000808	1000	1000	BATCH001	FAKTUR001
f4058de4-124e-4d51-9e5f-221f65cf10e0	B000000919	1000	1000	BATCH001	FAKTUR001
ad1dd88a-cf03-4a28-8087-f787e7b706e1	B000001314	1000	1000	BATCH001	FAKTUR001
34652ac0-bd32-4220-9731-76c7d2957b63	B000001187	1000	1000	BATCH001	FAKTUR001
97ac0d3f-8759-4f25-a8a0-f6c8ff320b3b	B000001638	1000	1000	BATCH001	FAKTUR001
28112de3-3409-432c-b421-45a630a443c8	B000001654	1000	1000	BATCH001	FAKTUR001
a73c52b4-a7cb-4f36-9e7b-cfbdfd7a8d98	B000000904	1000	1000	BATCH001	FAKTUR001
1a0483ba-f663-406d-8cdd-6281fbf793d0	B000001870	1000	1000	BATCH001	FAKTUR001
f59af699-4e82-4cfd-839f-c17cbcbba2c0	B000000093	1000	1000	BATCH001	FAKTUR001
9f551236-836a-4c8b-bf7a-18e1b1051536	B000001016	1000	1000	BATCH001	FAKTUR001
628e2f16-1fe0-4993-9972-eb3a3f30bec2	B000001824	1000	1000	BATCH001	FAKTUR001
bcf2e4f1-ddd2-4b60-adb8-2003082c7695	B000001634	1000	1000	BATCH001	FAKTUR001
56d48d42-46da-43ed-8e7a-08f4183e276a	B000000109	1000	1000	BATCH001	FAKTUR001
24200200-b68a-4d04-b9a7-5927a9d810cb	B000001759	1000	1000	BATCH001	FAKTUR001
b9f35fd5-c640-455f-941c-e1854e867296	A000000799	1000	1000	BATCH001	FAKTUR001
f0d9495d-9fa0-4b41-85bf-c06239435fb4	B000000480	1000	1000	BATCH001	FAKTUR001
bb222a83-9d6b-4132-a3ed-b0d3191ad8f4	B000000438	1000	1000	BATCH001	FAKTUR001
e990dbf9-552a-448b-be9d-034b2cf71052	B000001184	1000	1000	BATCH001	FAKTUR001
28a91c48-bd78-4cdb-a372-0ee0c08ca3fc	A000000066	1000	1000	BATCH001	FAKTUR001
6fd26058-4c44-4eba-b582-24b707c65ad5	B000001152	1000	1000	BATCH001	FAKTUR001
10fcdb54-c7ed-443a-ab5a-a065358cee32	B000000140	1000	1000	BATCH001	FAKTUR001
7b35ebc8-ec3d-4abe-9176-54b0f5b77024	B000000965	1000	1000	BATCH001	FAKTUR001
45eeba17-6fd7-4202-8836-5606f3baf46b	B000008019	1000	1000	BATCH001	FAKTUR001
54df80f5-cace-4f6e-abce-7f4da7722e02	A000000042	1000	1000	BATCH001	FAKTUR001
bdd2ecfd-1e8d-4adb-a34c-c0c4ab5ebe22	B000008012	1000	1000	BATCH001	FAKTUR001
b5ab7da5-6095-4c88-8ca8-7e979e0ece7f	B000001622	1000	1000	BATCH001	FAKTUR001
f0285e9b-2ef9-4c55-8c40-bd5dc97cb9e9	B000001014	1000	1000	BATCH001	FAKTUR001
3ba30f36-55c2-403d-972f-85a793ab2b1d	B000000702	1000	1000	BATCH001	FAKTUR001
3d72abfe-43c9-4849-a1dd-7a17e75265a5	B000001498	1000	1000	BATCH001	FAKTUR001
6834d1bb-daa2-4042-953f-b20b1725d6e5	B000000403	1000	1000	BATCH001	FAKTUR001
2ebfa144-bb0c-4c27-9f73-2e3c45f8a100	B000001688	1000	1000	BATCH001	FAKTUR001
481a6bfa-4309-40b4-8aaf-8619b2c22171	B000000349	1000	1000	BATCH001	FAKTUR001
b8f8b3d6-1830-4a1f-a0f4-a3f8dd77fc6c	B000001562	1000	1000	BATCH001	FAKTUR001
25c9f565-b34d-44ab-a107-07a3462e0f85	B000000341	1000	1000	BATCH001	FAKTUR001
a0de94f9-5e09-425f-97e2-863b77aef9f6	B000001094	1000	1000	BATCH001	FAKTUR001
6eb7a87d-10f5-45b8-b3aa-71c4e5284476	A000000009	1000	1000	BATCH001	FAKTUR001
d576b829-eddd-4317-9fb9-a6acea4ef9d4	B000001366	1000	1000	BATCH001	FAKTUR001
e398d403-7697-4c97-97e2-cd50d4ef6a1b	B000000287	1000	1000	BATCH001	FAKTUR001
74de0c59-33ed-49d7-9a43-64264b29f1bc	A000000068	1000	1000	BATCH001	FAKTUR001
be363ff9-f9db-4a62-98e6-85b2d297188b	B000008003	1000	1000	BATCH001	FAKTUR001
d3b98763-8ee7-4cab-b7ec-88f89f0783b2	B000001494	1000	1000	BATCH001	FAKTUR001
61b7e044-815b-48c6-a36e-e2ef1f1d8ede	B000000820	1000	1000	BATCH001	FAKTUR001
9ff87348-ef3a-424d-8ff4-d8314e7493ae	A000000101	1000	1000	BATCH001	FAKTUR001
0b04fb56-ac06-454c-be15-bac811c8526c	B000000227	1000	1000	BATCH001	FAKTUR001
dcbcc649-61e3-4f9a-9baf-bd032f91b5a6	B000000235	1000	1000	BATCH001	FAKTUR001
1810e70d-2bcb-438c-bff1-4eb89e449938	B000001090	1000	1000	BATCH001	FAKTUR001
0b40bdac-ca73-47af-9728-f043a0ebd094	B000001993	1000	1000	BATCH001	FAKTUR001
f8f368d5-afd2-4470-8528-329908b15219	B000001243	1000	1000	BATCH001	FAKTUR001
d242a07f-5ec3-46c5-81cc-a6004e6d1ee9	B000001115	1000	1000	BATCH001	FAKTUR001
f7fc5752-eec6-452e-b8d5-3da8636f1ac7	B000008009	1000	1000	BATCH001	FAKTUR001
0c867a56-b64a-43ac-a9d5-fdc3e7a9dbab	B000008007	1000	1000	BATCH001	FAKTUR001
2f99dd77-ce16-4de9-ae86-0909ad9f15bd	B000000973	1000	1000	BATCH001	FAKTUR001
3f5251ae-7dbd-48ed-906b-8bfe0bb6f04e	B000001106	1000	1000	BATCH001	FAKTUR001
99a3fda4-20c4-4802-be23-3a744b768f99	B000001454	1000	1000	BATCH001	FAKTUR001
7862a6b9-4843-41ca-89e7-5e4cd94efdf8	B000001122	1000	1000	BATCH001	FAKTUR001
c693a7aa-d840-4478-a01b-67c072574b81	B000001501	1000	1000	BATCH001	FAKTUR001
69a178a4-482b-4bcc-88df-68f2b75ac025	B000000206	1000	1000	BATCH001	FAKTUR001
d87fe9a3-0ce9-42b7-982c-a1debbc1c264	B000001050	1000	1000	BATCH001	FAKTUR001
f00e2080-3dbf-4783-9b88-2e5a5b6b65c1	B000000681	1000	1000	BATCH001	FAKTUR001
5bb80655-4b38-47e0-affd-91eeae867f67	B000000829	1000	1000	BATCH001	FAKTUR001
42d8f4c2-42e2-4a31-9072-d18c6ff5714e	B000001617	1000	1000	BATCH001	FAKTUR001
9c2a26ce-b24c-4de6-927d-85de1c8b4728	B000001853	1000	1000	BATCH001	FAKTUR001
a177a18e-c039-4215-a143-310b8e7f67e3	B000001631	1000	1000	BATCH001	FAKTUR001
324bb85d-ebc4-4ee2-8ca3-f4587ccd379d	B000001341	1000	1000	BATCH001	FAKTUR001
513ccd6b-41a8-41fc-93e9-353885ceef77	B000001822	1000	1000	BATCH001	FAKTUR001
a23b53a3-c01d-44e2-b2c8-64db163d455a	B000000454	1000	1000	BATCH001	FAKTUR001
6253f765-8750-49d3-83a9-547912d26c65	B000000128	1000	1000	BATCH001	FAKTUR001
2c5bee0c-847d-44a7-b5a4-9852c1a73f36	B000000717	1000	1000	BATCH001	FAKTUR001
790c00df-4510-419e-b292-e4fe937e430f	B000001190	1000	1000	BATCH001	FAKTUR001
48bd78f4-3cba-459a-a366-ef1c0ee70ab0	A000000118	1000	1000	BATCH001	FAKTUR001
4d8f1187-db73-49f8-aca8-e80ba1cf3db8	A000000065	1000	1000	BATCH001	FAKTUR001
efa48a07-d7fd-424d-a4c5-974ac5af7aaa	B000000432	1000	1000	BATCH001	FAKTUR001
c28638c3-0689-4448-9912-3dce781da05d	B000001202	1000	1000	BATCH001	FAKTUR001
4befd371-3f59-4a95-a4ac-590678f8f3a2	B000000993	1000	1000	BATCH001	FAKTUR001
5c6df1fc-36f9-40b4-a7ce-3c2e3d8a2593	B000000298	1000	1000	BATCH001	FAKTUR001
7d585f53-c881-479b-b006-8ba690986be8	A000000051	1000	1000	BATCH001	FAKTUR001
52d07544-5e58-4c6c-acb2-f9b1202afdf0	B000000311	1000	1000	BATCH001	FAKTUR001
cd80c58e-ad9a-4918-ad82-f59efeca6ab4	B000000380	1000	1000	BATCH001	FAKTUR001
33b81f78-73e9-41bd-b424-d919012bff7a	B000001130	1000	1000	BATCH001	FAKTUR001
81e20397-8109-4a9a-bd97-128523868712	B000001146	1000	1000	BATCH001	FAKTUR001
cb72975c-a916-49ee-80c4-e28de0009124	B000001086	1000	1000	BATCH001	FAKTUR001
5807ae65-34a5-4809-99da-f1d9df201a4c	B000001799	1000	1000	BATCH001	FAKTUR001
baeff1ec-60f4-42db-acfe-be144f6f8841	B000001874	1000	1000	BATCH001	FAKTUR001
569a0fe4-9cbf-4484-b71e-6a046170d138	B000000324	1000	1000	BATCH001	FAKTUR001
251ae5e3-0cd5-4d63-8ce1-bd371ab80415	B000000608	1000	1000	BATCH001	FAKTUR001
e789b047-65fe-4563-bcde-a6ee197a271a	B000000842	1000	1000	BATCH001	FAKTUR001
65e88809-ca95-421e-835b-ec5963216508	B000001627	1000	1000	BATCH001	FAKTUR001
d36951fe-c83f-4bb9-b4df-523dd1cebb44	B000000690	1000	1000	BATCH001	FAKTUR001
77b700e7-8f65-47ad-9cef-2eafa3a5fb92	B000001776	1000	1000	BATCH001	FAKTUR001
77aad859-895f-4e16-a7ea-4901703137c4	B000001923	1000	1000	BATCH001	FAKTUR001
703c60fc-7c6f-464b-8c86-f71a1a090684	B000000326	1000	1000	BATCH001	FAKTUR001
da065a66-b45c-49c1-b832-eb9452e35a8b	B000001112	1000	1000	BATCH001	FAKTUR001
678bb0c8-ac18-470a-bdb5-5d608c2d1d62	B000000929	1000	1000	BATCH001	FAKTUR001
417d90e0-0682-470e-a59b-eb19389969af	B000001911	1000	1000	BATCH001	FAKTUR001
bd49a1df-93b9-43cd-b7c8-46ee838226ac	B000001864	1000	1000	BATCH001	FAKTUR001
f30e0a56-f242-4de3-a4b5-c102cd794a19	B000002019	1000	1000	BATCH001	FAKTUR001
42206c7b-ba74-4bc6-91e2-c6bc33128471	B000001131	1000	1000	BATCH001	FAKTUR001
d4151978-a16e-4fca-a8a9-70d592e92370	B000000213	1000	1000	BATCH001	FAKTUR001
2ee61b50-97a0-485c-b898-2cfbd58989bd	B000001607	1000	1000	BATCH001	FAKTUR001
26a6bcbb-aff8-4447-86a3-2a500ebde02d	B000001642	1000	1000	BATCH001	FAKTUR001
5d03ad01-a07d-4a46-9be0-b223b313292a	B000000564	1000	1000	BATCH001	FAKTUR001
691365a2-e6f1-490a-a499-b4d64ba38c01	B000001662	1000	1000	BATCH001	FAKTUR001
d3545eba-6474-456e-81d3-9808f58708fc	B000000611	1000	1000	BATCH001	FAKTUR001
9dc79045-e0da-4b94-a6c1-0969d78c444b	B000001287	1000	1000	BATCH001	FAKTUR001
266f7ef9-8669-4cc8-8300-3129b7b759fb	B000001422	1000	1000	BATCH001	FAKTUR001
202321fd-7d1f-42f3-a9a4-0d1b069e899b	A000000801	1000	1000	BATCH001	FAKTUR001
\.


--
-- TOC entry 5634 (class 0 OID 16889)
-- Dependencies: 240
-- Data for Name: hari; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.hari (id, nama, created_at, updated_at) FROM stdin;
1	Senin	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
2	Selasa	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
3	Rabu	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
4	Kamis	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
5	Jumat	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
6	Sabtu	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
7	Minggu	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
\.


--
-- TOC entry 5636 (class 0 OID 16903)
-- Dependencies: 242
-- Data for Name: industri_farmasi; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.industri_farmasi (id, kode, nama, alamat, kota, telepon, created_at, updated_at) FROM stdin;
1000	KLBF	Kalbe Farma	Jln. jalan	Jakarta	0812312312	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
\.


--
-- TOC entry 5630 (class 0 OID 16861)
-- Dependencies: 236
-- Data for Name: jabatan; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.jabatan (id, nama, created_at, updated_at) FROM stdin;
1000	Testing	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
\.


--
-- TOC entry 5648 (class 0 OID 17125)
-- Dependencies: 254
-- Data for Name: jadwal_pegawai; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.jadwal_pegawai (id, id_pegawai, id_hari, id_shift, created_at, updated_at, deleted_at, updater) FROM stdin;
c951ca8b-9879-4188-810c-36f9924fd7c5	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	1	1	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
ef4471c6-6254-4895-97c9-a931d784659c	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	1	2	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
89cedec6-deb1-4f75-86c3-71c59b9200d6	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	1	3	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
318024fd-6f56-4f00-ac01-a4f08155535e	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	2	1	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
5412e5f7-0794-49ec-aa33-44e70d216561	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	2	2	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
33538ea0-c91a-4cd6-8e91-c2be83ef46a3	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	2	3	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
70a445de-6bbf-4066-9296-9749d9e32a1a	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	3	1	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
8b0f9ef6-56c3-4400-aaee-f12e6781fd4d	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	3	2	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
664c4863-22ce-495d-928a-87fe846937c2	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	3	3	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
9a845721-1247-4c6a-8c54-0c879a42c1db	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	4	1	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
fc6f1316-4288-4c3a-8023-25bfe6da15db	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	4	2	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
9e179bd9-58f5-40e6-b5d0-d850be2b7e6b	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	4	3	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
95a2604e-0f4e-4272-bea3-6d4c9f35dbd1	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	5	1	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
b8864871-ee39-463a-8d2f-0ba0ab69ecb9	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	5	2	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
18e1d494-956c-4064-8ee7-03068771eba1	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	5	3	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
6981e4a9-3fb9-4733-ae55-6527f167f6c2	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	6	1	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
17c55650-03ae-46c1-82d1-634c4c6a7ef8	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	6	2	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
ae26c35d-1e64-4680-9b28-9b71fc449a23	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	6	3	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
25a9fd65-d6ba-430d-9631-e1d924e8a10f	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	7	1	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
eadce2bb-55ae-45ff-884a-2b374c0e2dd6	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	7	2	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
1500dfea-e163-4c7e-85bb-165cdc9acefd	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	7	3	2025-05-15 20:08:17.888268+07	2025-05-15 20:08:17.888268+07	\N	\N
0cb4936d-3fcd-4f1c-8d80-63af9dbfdfa6	933568d5-982a-43c3-a4aa-3177bab10f07	1	1	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
568f5083-e014-4753-90b6-ae80364fcdef	933568d5-982a-43c3-a4aa-3177bab10f07	1	2	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
f10ffc0d-df32-46ee-a43b-2455783c4745	933568d5-982a-43c3-a4aa-3177bab10f07	1	3	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
3d7d30a8-712b-42b9-a1d2-681801e5e27a	933568d5-982a-43c3-a4aa-3177bab10f07	2	1	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
50451e8c-7562-4c35-bc6d-4153f4cf5cce	933568d5-982a-43c3-a4aa-3177bab10f07	2	2	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
5ff66544-a3bb-48e7-849f-f79626a1bbc6	933568d5-982a-43c3-a4aa-3177bab10f07	2	3	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
1532fe23-e7f6-4347-bd3a-cdfbf85aa0c4	933568d5-982a-43c3-a4aa-3177bab10f07	3	1	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
9051ce37-a6cd-47ed-8a44-ec0d78bcc438	933568d5-982a-43c3-a4aa-3177bab10f07	3	2	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
8c0ce7bd-344c-48ef-809f-78ffbc93d988	933568d5-982a-43c3-a4aa-3177bab10f07	3	3	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
670a4ef3-b98b-413b-a2b9-72d6b66a28b2	933568d5-982a-43c3-a4aa-3177bab10f07	4	1	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
dbb02638-0baf-44f8-b31f-eb9693087de6	933568d5-982a-43c3-a4aa-3177bab10f07	4	2	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
811b81da-4ddc-4de1-ba03-84a395377b87	933568d5-982a-43c3-a4aa-3177bab10f07	4	3	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
968a994d-dee6-4507-8b3c-4f1769cc0bfa	933568d5-982a-43c3-a4aa-3177bab10f07	5	1	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
dd939ae2-4e69-4df5-b974-0030c00477ae	933568d5-982a-43c3-a4aa-3177bab10f07	5	2	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
9242cb6b-0d7f-4215-9aef-33d7d896da23	933568d5-982a-43c3-a4aa-3177bab10f07	5	3	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
5dad8350-069a-4c88-ac86-6f740077fbe9	933568d5-982a-43c3-a4aa-3177bab10f07	6	1	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
2fdbedf3-ddc9-4136-a231-7e783421e0af	933568d5-982a-43c3-a4aa-3177bab10f07	6	2	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
9f868531-ff95-4146-a209-7a514dd6e72c	933568d5-982a-43c3-a4aa-3177bab10f07	6	3	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
9a731dc7-2241-4729-b829-c01b932f3fbd	933568d5-982a-43c3-a4aa-3177bab10f07	7	1	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
3868eac7-ee78-4c32-8d54-f2900cc9db8b	933568d5-982a-43c3-a4aa-3177bab10f07	7	2	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
f89e083a-b8a9-46c4-a100-6411232028e9	933568d5-982a-43c3-a4aa-3177bab10f07	7	3	2025-05-19 20:04:33.69813+07	2025-05-19 20:04:33.69813+07	\N	\N
0242f326-8e1f-4d5b-a80a-20f80bccfe26	b9b1ad6c-c41b-446a-b00e-f56684663c56	1	1	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
41b383c8-1383-45ea-8c96-9555d1410578	b9b1ad6c-c41b-446a-b00e-f56684663c56	1	2	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
7cf1515b-e8ce-4a10-884c-c5a5a9aac89b	b9b1ad6c-c41b-446a-b00e-f56684663c56	1	3	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
35c4d40f-8f90-42d8-b561-ed180c1b799d	b9b1ad6c-c41b-446a-b00e-f56684663c56	2	1	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
55db7ec7-3bf3-4b60-83d4-df0fbc37a8e9	b9b1ad6c-c41b-446a-b00e-f56684663c56	2	2	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
4534cd4e-6fb0-4e2e-82b1-99e72fc4db85	b9b1ad6c-c41b-446a-b00e-f56684663c56	2	3	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
3556f6bd-6d17-46c0-80aa-b89cb8f71b4d	b9b1ad6c-c41b-446a-b00e-f56684663c56	3	1	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
82f01a64-ca02-4803-ab6b-7971062c7469	b9b1ad6c-c41b-446a-b00e-f56684663c56	3	2	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
b7ac550b-b15e-4ffe-a4f3-7937d08ace70	b9b1ad6c-c41b-446a-b00e-f56684663c56	3	3	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
e62cf464-dc04-46b4-9ad5-ce67df369b66	b9b1ad6c-c41b-446a-b00e-f56684663c56	4	1	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
6feabee8-0382-4ed0-b089-f6c1e4275015	b9b1ad6c-c41b-446a-b00e-f56684663c56	4	2	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
da6b5f99-5ec9-4d24-9801-cefe94249da6	b9b1ad6c-c41b-446a-b00e-f56684663c56	4	3	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
eff4712b-c275-46f4-b3f7-8f7f6a63c2ac	b9b1ad6c-c41b-446a-b00e-f56684663c56	5	1	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
387a9eaf-fb04-4a9f-b77c-a7c39241e388	b9b1ad6c-c41b-446a-b00e-f56684663c56	5	2	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
6d703c28-0f32-4abe-aa54-357b8f707d43	b9b1ad6c-c41b-446a-b00e-f56684663c56	5	3	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
39538e05-2ee0-4a9b-b6c9-19c2c6142755	b9b1ad6c-c41b-446a-b00e-f56684663c56	6	1	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
62be9241-5617-4be8-9706-db606b4c37ed	b9b1ad6c-c41b-446a-b00e-f56684663c56	6	2	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
1fb69c05-2446-455e-9213-90a8bda545d8	b9b1ad6c-c41b-446a-b00e-f56684663c56	6	3	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
701e4777-92e4-4585-8eb9-2d4ea2f52360	b9b1ad6c-c41b-446a-b00e-f56684663c56	7	1	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
ca8eb8e3-9461-4e76-81c6-5fb00ef28d4c	b9b1ad6c-c41b-446a-b00e-f56684663c56	7	2	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
f819d5b5-cca3-446c-aab8-e13fa828ed00	b9b1ad6c-c41b-446a-b00e-f56684663c56	7	3	2025-05-19 20:06:58.501942+07	2025-05-19 20:06:58.501942+07	\N	\N
\.


--
-- TOC entry 5638 (class 0 OID 16921)
-- Dependencies: 244
-- Data for Name: jenis_barang_medis; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.jenis_barang_medis (id, nama, created_at, updated_at) FROM stdin;
1000	Obat Oral	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
2000	Obat Topikal	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
3000	Obat Injeksi	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
4000	Obat Sublingual	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
5000	Obat Infus	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
\.


--
-- TOC entry 5674 (class 0 OID 34214)
-- Dependencies: 280
-- Data for Name: jenis_tindakan; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.jenis_tindakan (kode, nama_tindakan, kode_kategori, material, bhp, tarif_tindakan_dokter, tarif_tindakan_perawat, kso, manajemen, total_bayar_dokter, total_bayar_perawat, total_bayar_dokter_perawat, kode_pj, kode_bangsal, status, kelas) FROM stdin;
001.ICU	Ruang Operasi	OP33	2200000	0	0	250000	0	0	0	2450000	2450000	A09	ICU	1	-
001.K.3	FISIOTERAPHY > 1	K3	15000	0	0	40000	0	0	0	55000	0	A09	K3	1	Kelas 2
002.ICU	Ruang Operasi	ok35	2200000	0	0	350000	0	0	0	2550000	2550000	A09	ICU	1	-
002.K.2	FISIOTERAPHY	K2	15000	0	0	40000	0	0	0	55000	0	A09	K2	1	-
003.ICU	Ruang Operasi	KP034	2200000	0	0	200000	0	0	0	2400000	2400000	A09	ICU	1	-
003.K.1	FISIOTERAPHY	K1	15000	0	0	50000	0	0	0	65000	0	A09	K1	1	-
004.ICU	Ruang Operasi	OK03	2200000	0	0	160000	0	0	0	2360000	2360000	A09	ICU	1	-
004.VIP	FISIOTERAPHY	KVIP	15000	0	0	60000	0	0	0	75000	0	A09	VIP	1	-
005.VVIP	FISIOTERAPHY	KVVIP	15000	0	0	70000	0	0	0	85000	0	A09	VVIP	1	-
007.ASS	FISIOTERAPHY	PK4	35000	0	0	60000	0	0	0	95000	0	A09	K1	1	-
012	Rawat Luka	-	20000	0	0	20000	0	0	0	40000	0	A09	-	1	-
019	Lepas Gibs Tangan	-	25000	0	30000	5000	0	0	0	60000	0	A09	-	1	-
020	Lepas Gibs Kaki	-	25000	0	40000	10000	0	0	0	75000	0	A09	-	1	-
021	Cirkumsisi ( Sirkumsisi )	KP	0	0	350000	0	0	0	350000	0	0	A09	-	1	-
024	Observasi Persalinan/ hari	-	0	0	0	50000	0	0	0	50000	0	A09	-	1	-
025	Observasi TTV	-	0	0	0	50000	0	0	0	50000	0	A09	-	1	-
026	Breast Care	K1	25000	0	0	25000	0	0	0	50000	50000	A09	K1	1	-
027.K.3	Konsultasi, Via Telpon Dokter Spesialis	K2	0	0	50000	0	0	0	50000	0	50000	A09	K2	0	-
028.K.2	Konsultasi, Via Telpon Dokter Spesialis	K1	0	0	75000	0	0	0	75000	0	75000	A09	K1	0	-
029.K.1	Konsultasi, Via Telpon Dokter Spesialis	K3	0	0	40000	10000	10000	10000	60000	30000	70000	A09	K3	1	-
030.NICU	Konsultasi, Via Telpon Dokter Spesialis	K.BY	0	0	75000	0	0	0	75000	0	75000	A09	NICU	0	-
032.VVIP	Konsultasi, Via Telpon Dokter Spesialis	KVIP	0	0	80000	0	0	0	80000	0	80000	A09	VIP	1	-
033.ICU	Konsultasi, Via Telpon Dokter Spesialis	-	0	0	100000	0	0	0	100000	0	100000	A09	ICU	1	-
An.I.1	Konsultasi ICU Non emergensi (Pertama Kali)	-	0	0	200000	0	0	0	200000	0	0	A09	-	0	-
An.I.2	Konsultasi ICU Emergensi (Pertama Kali)	-	0	0	200000	0	0	0	200000	0	0	A09	-	0	-
An.I.3	Konsultasi ICU Perhari (Follow Up)	-	0	0	200000	0	0	0	200000	0	0	A09	-	0	-
An.II.1	Konsultasi ICU Non emergensi (Pertama Kali)	-	0	0	170000	0	0	0	170000	0	0	A09	-	0	-
An.II.2	Konsultasi ICU Emergensi (Pertama Kali)	-	0	0	170000	0	0	0	170000	0	0	A09	-	0	-
An.II.3	Konsultasi ICU Perhari (Follow Up)	-	0	0	170000	0	0	0	170000	0	0	A09	-	0	-
An.III.1	Konsultasi ICU Non emergensi (Pertama Kali)	-	0	0	144500	0	0	0	144500	0	0	A09	-	0	-
An.III.2	Konsultasi ICU Emergensi (Pertama Kali)	-	0	0	144500	0	0	0	144500	0	0	A09	-	0	-
An.III.3	Konsultasi ICU Perhari (Follow Up)	-	0	0	144500	0	0	0	144500	0	0	A09	-	0	-
An.ODC.1	Konsultasi ICU Non emergensi (Pertama Kali)	-	0	0	122825	0	0	0	122825	0	0	A09	-	0	-
An.ODC.2	Konsultasi ICU Emergensi (Pertama Kali)	-	0	0	122825	0	0	0	122825	0	0	A09	-	0	-
An.ODC.3	Konsultasi ICU Perhari (Follow Up)	-	0	0	122825	0	0	0	122825	0	0	A09	-	0	-
An.VIP.1	Konsultasi ICU Non emergensi (Pertama Kali)	-	0	0	230000	0	0	0	230000	0	0	A09	-	0	-
An.VIP.2	Konsultasi ICU Emergensi (Pertama Kali)	-	0	0	230000	0	0	0	230000	0	0	A09	-	0	-
An.VIP.3	Konsultasi ICU Perhari (Follow Up)	-	0	0	230000	0	0	0	230000	0	0	A09	-	0	-
An.VVIP.1	Konsultasi ICU Non emergensi (Pertama Kali)	-	0	0	264500	0	0	0	264500	0	0	A09	-	0	-
An.VVIP.2	Konsultasi ICU Emergensi (Pertama Kali)	-	0	0	264500	0	0	0	264500	0	0	A09	-	0	-
An.VVIP.3	Konsultasi ICU Perhari (Follow Up)	-	0	0	264500	0	0	0	264500	0	0	A09	-	0	-
BHP.001	Perlengkapan Partus Lengkap	KVIP	235000	0	0	0	0	0	0	235000	235000	A09	VIP	1	-
BHP.002	Perlengkapan Partus Lengkap	K2	185000	0	0	0	0	0	185000	0	185000	A09	K2	1	-
BU.I.1	Amputasi Above Knee	-	0	0	3100000	0	0	0	3100000	0	0	A09	-	1	-
BU.I.10	Bilateral repair of indirect inguinal hernia	-	0	0	2900000	0	0	0	2900000	0	0	A09	-	1	-
BU.I.11	Bilateral simple mastectomy	-	0	0	3300000	0	0	0	3300000	0	0	A09	-	1	-
BU.I.12	Cholecystectomy	-	0	0	3700000	0	0	0	3700000	0	0	A09	-	1	-
BU.I.13	Choledochoplasty	-	0	0	4300000	0	0	0	4300000	0	0	A09	-	1	-
BU.I.14	Dressing Combustio (Luka Bakar)	K1	0	0	0	40000	0	0	0	40000	40000	A09	K1	1	-
BU.I.15	Complete thyroidectomy	-	0	0	3700000	0	0	0	3700000	0	0	A09	-	1	-
BU.I.16	Debridement Mediastinum (Sternotomi)	-	0	0	3100000	0	0	0	3100000	0	0	A09	-	1	-
BU.I.17	Fraktur Cruris	-	0	0	3500000	0	0	0	3500000	0	0	A09	-	1	-
BU.I.18	Fraktur Femur	-	0	0	2800000	0	0	0	2800000	0	0	A09	-	1	-
BU.I.19	Fraktur Humerus	-	0	0	2400000	0	0	0	2400000	0	0	A09	-	1	-
BU.I.2	Amputasi Below Knee	-	0	0	3100000	0	0	0	3100000	0	0	A09	-	1	-
BU.I.20	Fraktur Klavikula	-	0	0	2700000	0	0	0	2700000	0	0	A09	-	1	-
BU.I.21	Insisi Abses dengan Anastesi Lokal	-	0	0	1300000	0	0	0	1300000	0	0	A09	-	1	-
BU.I.22	Pemasangan Peritoneal Sialysis (PD) Catheter (diluar alat)	-	0	0	2300000	0	0	0	2300000	0	0	A09	-	1	-
BU.I.23	Pleurodesis	-	0	0	1200000	0	0	0	1200000	0	0	A09	-	1	-
BU.I.24	Tiroidektomi Subtotal,Total Nodul Tiroid	-	0	0	2400000	0	0	0	2400000	0	0	A09	-	1	-
BU.I.25	Total Splenectomy	-	0	0	3400000	0	0	0	3400000	0	0	A09	-	1	-
BU.I.3	Amputasi Jari (Phalangs - Traumatik)	-	0	0	1300000	0	0	0	1300000	0	0	A09	-	1	-
BU.I.4	Arteriovenous shunt (AV Shunt) brakiosefalika	-	0	0	2700000	0	0	0	2700000	0	0	A09	-	1	-
BU.I.5	Arteriovenous shunt (AV Shunt) radiosefalika	-	0	0	2700000	0	0	0	2700000	0	0	A09	-	1	-
BU.I.6	Batu Saluran Kemih 	-	0	0	2700000	0	0	0	2700000	0	0	A09	-	1	-
BU.I.7	Bilateral excision of ectopic breast tissue (mama aberans)	-	0	0	3100000	0	0	0	3100000	0	0	A09	-	1	-
BU.I.8	Bilateral radical mastectomy	-	0	0	5000000	0	0	0	5000000	0	0	A09	-	1	-
BU.I.9	Bilateral repair of direct inguinal hernia	-	0	0	2900000	0	0	0	2900000	0	0	A09	-	1	-
BU.ICU.14	Dressing Combustio (Luka Bakar)	-	0	0	0	40000	0	0	0	40000	40000	A09	ICU	1	-
BU.II.1	Amputasi Above Knee	-	0	0	2635000	0	0	0	2635000	0	0	A09	-	1	-
BUR.I.113	Kauterisasi	-	0	0	2000000	0	0	0	2000000	0	0	A09	-	1	-
BU.II.10	Bilateral repair of indirect inguinal hernia	-	0	0	2465000	0	0	0	2465000	0	0	A09	-	1	-
BU.II.11	Bilateral simple mastectomy	-	0	0	2805000	0	0	0	2805000	0	0	A09	-	1	-
BU.II.12	Cholecystectomy	-	0	0	3145000	0	0	0	3145000	0	0	A09	-	1	-
BU.II.13	Choledochoplasty	-	0	0	3655000	0	0	0	3655000	0	0	A09	-	1	-
BU.II.14	Dressing Combustio (Luka Bakar)	-	300000	0	0	40000	0	0	300000	340000	340000	A09	-	1	-
BU.II.15	Complete thyroidectomy	-	0	0	3145000	0	0	0	3145000	0	0	A09	-	1	-
BU.II.16	Debridement Mediastinum (Sternotomi)	-	0	0	2635000	0	0	0	2635000	0	0	A09	-	1	-
BU.II.17	Fraktur Cruris	-	0	0	2975000	0	0	0	2975000	0	0	A09	-	1	-
BU.II.18	Fraktur Femur	-	0	0	2380000	0	0	0	2380000	0	0	A09	-	1	-
BU.II.19	Fraktur Humerus	-	0	0	2040000	0	0	0	2040000	0	0	A09	-	1	-
BU.II.2	Amputasi Below Knee	-	0	0	2635000	0	0	0	2635000	0	0	A09	-	1	-
BU.II.20	Fraktur Klavikula	-	0	0	2295000	0	0	0	2295000	0	0	A09	-	1	-
BU.II.21	Insisi Abses dengan Anastesi Lokal	-	0	0	1105000	0	0	0	1105000	0	0	A09	-	1	-
BU.II.22	Pemasangan Peritoneal Sialysis (PD) Catheter (diluar alat)	-	0	0	1955000	0	0	0	1955000	0	0	A09	-	1	-
BU.II.23	Pleurodesis	-	0	0	1020000	0	0	0	1020000	0	0	A09	-	1	-
BU.II.24	Tiroidektomi Subtotal,Total Nodul Tiroid	-	0	0	2040000	0	0	0	2040000	0	0	A09	-	1	-
BU.II.25	Total Splenectomy	-	0	0	2890000	0	0	0	2890000	0	0	A09	-	1	-
BU.II.3	Amputasi Jari (Phalangs - Traumatik)	-	0	0	1105000	0	0	0	1105000	0	0	A09	-	1	-
BU.II.4	Arteriovenous shunt (AV Shunt) brakiosefalika	-	0	0	2295000	0	0	0	2295000	0	0	A09	-	1	-
BU.II.5	Arteriovenous shunt (AV Shunt) radiosefalika	-	0	0	2295000	0	0	0	2295000	0	0	A09	-	1	-
BU.II.6	Batu Saluran Kemih 	-	0	0	2295000	0	0	0	2295000	0	0	A09	-	1	-
BU.II.7	Bilateral excision of ectopic breast tissue (mama aberans)	-	0	0	2635000	0	0	0	2635000	0	0	A09	-	1	-
BU.II.8	Bilateral radical mastectomy	-	0	0	4250000	0	0	0	4250000	0	0	A09	-	1	-
BU.II.9	Bilateral repair of direct inguinal hernia	-	0	0	2465000	0	0	0	2465000	0	0	A09	-	1	-
BU.III.1	Amputasi Above Knee	-	0	0	2239750	0	0	0	2239750	0	0	A09	-	1	-
BU.III.10	Bilateral repair of indirect inguinal hernia	-	0	0	2095250	0	0	0	2095250	0	0	A09	-	1	-
BU.III.11	Bilateral simple mastectomy	-	0	0	2384250	0	0	0	2384250	0	0	A09	-	1	-
BU.III.12	Cholecystectomy	-	0	0	2673250	0	0	0	2673250	0	0	A09	-	1	-
BU.III.13	Choledochoplasty	-	0	0	3106750	0	0	0	3106750	0	0	A09	-	1	-
BU.III.14	Dressing Combustio (Luka Bakar)	K3	0	0	0	40000	0	0	0	40000	40000	A09	K3	1	-
BU.III.15	Complete thyroidectomy	-	0	0	2673250	0	0	0	2673250	0	0	A09	-	1	-
BU.III.16	Debridement Mediastinum (Sternotomi)	-	0	0	2239750	0	0	0	2239750	0	0	A09	-	1	-
BU.III.17	Fraktur Cruris	-	0	0	2528750	0	0	0	2528750	0	0	A09	-	1	-
BU.III.18	Fraktur Femur	-	0	0	2023000	0	0	0	2023000	0	0	A09	-	1	-
BU.III.19	Fraktur Humerus	-	0	0	1734000	0	0	0	1734000	0	0	A09	-	1	-
BU.III.2	Amputasi Below Knee	-	0	0	2239750	0	0	0	2239750	0	0	A09	-	1	-
BU.III.20	Fraktur Klavikula	-	0	0	1950750	0	0	0	1950750	0	0	A09	-	1	-
BU.III.21	Insisi Abses dengan Anastesi Lokal	-	0	0	939250	0	0	0	939250	0	0	A09	-	1	-
BU.III.22	Pemasangan Peritoneal Sialysis (PD) Catheter (diluar alat)	-	0	0	1661750	0	0	0	1661750	0	0	A09	-	1	-
BU.III.23	Pleurodesis	-	0	0	867000	0	0	0	867000	0	0	A09	-	1	-
BU.III.24	Tiroidektomi Subtotal,Total Nodul Tiroid	-	0	0	1734000	0	0	0	1734000	0	0	A09	-	1	-
BU.III.25	Total Splenectomy	-	0	0	2456500	0	0	0	2456500	0	0	A09	-	1	-
BU.III.3	Amputasi Jari (Phalangs - Traumatik)	-	0	0	939250	0	0	0	939250	0	0	A09	-	1	-
BU.III.4	Arteriovenous shunt (AV Shunt) brakiosefalika	-	0	0	1950750	0	0	0	1950750	0	0	A09	-	1	-
BU.III.5	Arteriovenous shunt (AV Shunt) radiosefalika	-	0	0	1950750	0	0	0	1950750	0	0	A09	-	1	-
BU.III.6	Batu Saluran Kemih 	-	0	0	1950750	0	0	0	1950750	0	0	A09	-	1	-
BU.III.7	Bilateral excision of ectopic breast tissue (mama aberans)	-	0	0	2239750	0	0	0	2239750	0	0	A09	-	1	-
BU.III.8	Bilateral radical mastectomy	-	0	0	3612500	0	0	0	3612500	0	0	A09	-	1	-
BU.III.9	Bilateral repair of direct inguinal hernia	-	0	0	2095250	0	0	0	2095250	0	0	A09	-	1	-
BU.ODC.1	Amputasi Above Knee	-	0	0	1903787.5	0	0	0	1903787.5	0	0	A09	-	1	-
BU.ODC.10	Bilateral repair of indirect inguinal hernia	-	0	0	1780962.5	0	0	0	1780962.5	0	0	A09	-	1	-
BU.ODC.11	Bilateral simple mastectomy	-	0	0	2026612.5	0	0	0	2026612.5	0	0	A09	-	1	-
BU.ODC.12	Cholecystectomy	-	0	0	2272262.5	0	0	0	2272262.5	0	0	A09	-	1	-
BU.ODC.13	Choledochoplasty	-	0	0	2640737.5	0	0	0	2640737.5	0	0	A09	-	1	-
BU.ODC.15	Complete thyroidectomy	-	0	0	2272262.5	0	0	0	2272262.5	0	0	A09	-	1	-
BU.ODC.16	Debridement Mediastinum (Sternotomi)	-	0	0	1903787.5	0	0	0	1903787.5	0	0	A09	-	1	-
BU.ODC.17	Fraktur Cruris	-	0	0	2149437.5	0	0	0	2149437.5	0	0	A09	-	1	-
BU.ODC.18	Fraktur Femur	-	0	0	1719550	0	0	0	1719550	0	0	A09	-	1	-
BU.ODC.19	Fraktur Humerus	-	0	0	1473900	0	0	0	1473900	0	0	A09	-	1	-
BU.ODC.2	Amputasi Below Knee	-	0	0	1903787.5	0	0	0	1903787.5	0	0	A09	-	1	-
BU.ODC.20	Fraktur Klavikula	-	0	0	1658137.5	0	0	0	1658137.5	0	0	A09	-	1	-
BU.ODC.21	Insisi Abses dengan Anastesi Lokal	-	0	0	798362.5	0	0	0	798362.5	0	0	A09	-	1	-
BU.ODC.22	Pemasangan Peritoneal Sialysis (PD) Catheter (diluar alat)	-	0	0	1412487.5	0	0	0	1412487.5	0	0	A09	-	1	-
BU.ODC.23	Pleurodesis	-	0	0	736950	0	0	0	736950	0	0	A09	-	1	-
BU.ODC.24	Tiroidektomi Subtotal,Total Nodul Tiroid	-	0	0	1473900	0	0	0	1473900	0	0	A09	-	1	-
BU.ODC.25	Total Splenectomy	-	0	0	2088025	0	0	0	2088025	0	0	A09	-	1	-
BU.ODC.3	Amputasi Jari (Phalangs - Traumatik)	-	0	0	798362.5	0	0	0	798362.5	0	0	A09	-	1	-
BU.ODC.4	Arteriovenous shunt (AV Shunt) brakiosefalika	-	0	0	1658137.5	0	0	0	1658137.5	0	0	A09	-	1	-
BU.ODC.5	Arteriovenous shunt (AV Shunt) radiosefalika	-	0	0	1658137.5	0	0	0	1658137.5	0	0	A09	-	1	-
BU.ODC.6	Batu Saluran Kemih 	-	0	0	1658137.5	0	0	0	1658137.5	0	0	A09	-	1	-
BU.ODC.7	Bilateral excision of ectopic breast tissue (mama aberans)	-	0	0	1903787.5	0	0	0	1903787.5	0	0	A09	-	1	-
BU.ODC.8	Bilateral radical mastectomy	-	0	0	3070625	0	0	0	3070625	0	0	A09	-	1	-
BU.ODC.9	Bilateral repair of direct inguinal hernia	-	0	0	1780962.5	0	0	0	1780962.5	0	0	A09	-	1	-
BU.VIP.1	Amputasi Above Knee	-	0	0	3565000	0	0	0	3565000	0	0	A09	-	1	-
BU.VIP.10	Bilateral repair of indirect inguinal hernia	-	0	0	3335000	0	0	0	3335000	0	0	A09	-	1	-
BU.VIP.11	Bilateral simple mastectomy	-	0	0	3795000	0	0	0	3795000	0	0	A09	-	1	-
BU.VIP.12	Cholecystectomy	-	0	0	4255000	0	0	0	4255000	0	0	A09	-	1	-
BU.VIP.13	Choledochoplasty	-	0	0	4945000	0	0	0	4945000	0	0	A09	-	1	-
BU.VIP.14	Combustio (Luka Bakar)	KVIP	0	0	0	40000	0	0	0	40000	40000	A09	VVIP	1	-
BU.VIP.15	Complete thyroidectomy	-	0	0	4255000	0	0	0	4255000	0	0	A09	-	1	-
BU.VIP.16	Debridement Mediastinum (Sternotomi)	-	0	0	3565000	0	0	0	3565000	0	0	A09	-	1	-
BU.VIP.17	Fraktur Cruris	-	0	0	4025000	0	0	0	4025000	0	0	A09	-	1	-
BU.VIP.18	Fraktur Femur	-	0	0	3220000	0	0	0	3220000	0	0	A09	-	1	-
BU.VIP.19	Fraktur Humerus	-	0	0	2760000	0	0	0	2760000	0	0	A09	-	1	-
BU.VIP.2	Amputasi Below Knee	-	0	0	3565000	0	0	0	3565000	0	0	A09	-	1	-
BU.VIP.20	Fraktur Klavikula	-	0	0	3105000	0	0	0	3105000	0	0	A09	-	1	-
BU.VIP.21	Insisi Abses dengan Anastesi Lokal	-	0	0	1495000	0	0	0	1495000	0	0	A09	-	1	-
BU.VIP.22	Pemasangan Peritoneal Sialysis (PD) Catheter (diluar alat)	-	0	0	2645000	0	0	0	2645000	0	0	A09	-	1	-
BU.VIP.23	Pleurodesis	-	0	0	1380000	0	0	0	1380000	0	0	A09	-	1	-
BU.VIP.24	Tiroidektomi Subtotal,Total Nodul Tiroid	-	0	0	2760000	0	0	0	2760000	0	0	A09	-	1	-
BU.VIP.25	Total Splenectomy	-	0	0	3910000	0	0	0	3910000	0	0	A09	-	1	-
BU.VIP.3	Amputasi Jari (Phalangs - Traumatik)	-	0	0	1495000	0	0	0	1495000	0	0	A09	-	1	-
BU.VIP.4	Arteriovenous shunt (AV Shunt) brakiosefalika	-	0	0	3105000	0	0	0	3105000	0	0	A09	-	1	-
BU.VIP.5	Arteriovenous shunt (AV Shunt) radiosefalika	-	0	0	3105000	0	0	0	3105000	0	0	A09	-	1	-
BU.VIP.6	Batu Saluran Kemih 	-	0	0	3105000	0	0	0	3105000	0	0	A09	-	1	-
BU.VIP.7	Bilateral excision of ectopic breast tissue (mama aberans)	-	0	0	3565000	0	0	0	3565000	0	0	A09	-	1	-
BU.VIP.8	Bilateral radical mastectomy	-	0	0	5750000	0	0	0	5750000	0	0	A09	-	1	-
BU.VIP.9	Bilateral repair of direct inguinal hernia	-	0	0	3335000	0	0	0	3335000	0	0	A09	-	1	-
BU.VVIP.1	Amputasi Above Knee	-	0	0	4099750	0	0	0	4099750	0	0	A09	-	1	-
BU.VVIP.10	Bilateral repair of indirect inguinal hernia	-	0	0	3835250	0	0	0	3835250	0	0	A09	-	1	-
BU.VVIP.11	Bilateral simple mastectomy	-	0	0	4364250	0	0	0	4364250	0	0	A09	-	1	-
BU.VVIP.12	Cholecystectomy	-	0	0	4893250	0	0	0	4893250	0	0	A09	-	1	-
BU.VVIP.13	Choledochoplasty	-	0	0	5686750	0	0	0	5686750	0	0	A09	-	1	-
BU.VVIP.14	Dressing Combustio (Luka Bakar)	KVVIP	0	0	0	40000	0	0	0	40000	40000	A09	VVIP	1	-
BU.VVIP.15	Complete thyroidectomy	-	0	0	4893250	0	0	0	4893250	0	0	A09	-	1	-
BU.VVIP.16	Debridement Mediastinum (Sternotomi)	-	0	0	4099750	0	0	0	4099750	0	0	A09	-	1	-
BU.VVIP.17	Fraktur Cruris	-	0	0	4628750	0	0	0	4628750	0	0	A09	-	1	-
BU.VVIP.18	Fraktur Femur	-	0	0	3703000	0	0	0	3703000	0	0	A09	-	1	-
BU.VVIP.19	Fraktur Humerus	-	0	0	3174000	0	0	0	3174000	0	0	A09	-	1	-
BU.VVIP.2	Amputasi Below Knee	-	0	0	4099750	0	0	0	4099750	0	0	A09	-	1	-
BU.VVIP.20	Fraktur Klavikula	-	0	0	3570750	0	0	0	3570750	0	0	A09	-	1	-
BU.VVIP.21	Insisi Abses dengan Anastesi Lokal	-	0	0	1719250	0	0	0	1719250	0	0	A09	-	1	-
BU.VVIP.22	Pemasangan Peritoneal Sialysis (PD) Catheter (diluar alat)	-	0	0	3041750	0	0	0	3041750	0	0	A09	-	1	-
BU.VVIP.23	Pleurodesis	-	0	0	1587000	0	0	0	1587000	0	0	A09	-	1	-
BU.VVIP.24	Tiroidektomi Subtotal,Total Nodul Tiroid	-	0	0	3174000	0	0	0	3174000	0	0	A09	-	1	-
BU.VVIP.25	Total Splenectomy	-	0	0	4496500	0	0	0	4496500	0	0	A09	-	1	-
BU.VVIP.3	Amputasi Jari (Phalangs - Traumatik)	-	0	0	1719250	0	0	0	1719250	0	0	A09	-	1	-
BU.VVIP.4	Arteriovenous shunt (AV Shunt) brakiosefalika	-	0	0	3570750	0	0	0	3570750	0	0	A09	-	1	-
BU.VVIP.5	Arteriovenous shunt (AV Shunt) radiosefalika	-	0	0	3570750	0	0	0	3570750	0	0	A09	-	1	-
BU.VVIP.6	Batu Saluran Kemih 	-	0	0	3570750	0	0	0	3570750	0	0	A09	-	1	-
BU.VVIP.7	Bilateral excision of ectopic breast tissue (mama aberans)	-	0	0	4099750	0	0	0	4099750	0	0	A09	-	1	-
BU.VVIP.8	Bilateral radical mastectomy	-	0	0	6612500	0	0	0	6612500	0	0	A09	-	1	-
BU.VVIP.9	Bilateral repair of direct inguinal hernia	-	0	0	3835250	0	0	0	3835250	0	0	A09	-	1	-
BUR.I.1	Biopsi Ginjal Terbuka	-	0	0	3600000	0	0	0	3600000	0	0	A09	-	1	-
BUR.I.10	RPG, URS diagnostik	-	0	0	3500000	0	0	0	3500000	0	0	A09	-	1	-
BUR.I.100	Skrotoplasti	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
BUR.I.101	Spermatokelektomi	-	0	0	2900000	0	0	0	2900000	0	0	A09	-	1	-
BUR.I.102	Varikokelektomi (Palomo)	-	0	0	2200000	0	0	0	2200000	0	0	A09	-	1	-
BUR.I.103	Vasektomi (anastesi lokal)	-	0	0	2200000	0	0	0	2200000	0	0	A09	-	1	-
BUR.I.104	Vasektomi (narkose)	-	0	0	2800000	0	0	0	2800000	0	0	A09	-	1	-
BUR.I.105	Vasoepididimostomi	-	0	0	4100000	0	0	0	4100000	0	0	A09	-	1	-
BUR.I.106	Vasografi	-	0	0	2100000	0	0	0	2100000	0	0	A09	-	1	-
BUR.I.107	Eksisi Webbed Penis	-	0	0	3400000	0	0	0	3400000	0	0	A09	-	1	-
BUR.I.108	Burried Penis	-	0	0	2900000	0	0	0	2900000	0	0	A09	-	1	-
BUR.I.109	Diseksi Kelenjar Getah Bening Pelvis	-	0	0	3500000	0	0	0	3500000	0	0	A09	-	1	-
BUR.I.11	Tailoring Ureter	-	0	0	3800000	0	0	0	3800000	0	0	A09	-	1	-
BUR.I.110	Diseksi Kelenjar Getah Bening per laparaskopi	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
BUR.I.111	ESWL	-	0	0	2400000	0	0	0	2400000	0	0	A09	-	1	-
BUR.I.112	Holmium YaG laser	-	0	0	3900000	0	0	0	3900000	0	0	A09	-	1	-
BUR.I.114	Laparotomi Eksplorasi	-	0	0	3600000	0	0	0	3600000	0	0	A09	K1	1	-
BUR.I.115	Limfadenektomi Retroperitoneal, RPLND	-	0	0	3600000	0	0	0	3600000	0	0	A09	-	1	-
BUR.I.116	MMK, sling uretra	-	0	0	2900000	0	0	0	2900000	0	0	A09	-	1	-
BUR.I.117	Operasi Sistokel	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
BUR.I.118	Operasi Urakhus, Reseksi Urakhus	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
BUR.I.12	Transuretero-uterostomi	-	0	0	3800000	0	0	0	3800000	0	0	A09	-	1	-
BUR.I.121	Punksi dan sklerosing kista ginjal	-	0	0	2200000	0	0	0	2200000	0	0	A09	-	1	-
BUR.I.122	Tindakan pembedahan testis untuk pengambilan spermatozoa (TESA,TESE,PESA,MESA)	-	0	0	3700000	0	0	0	3700000	0	0	A09	-	1	-
BUR.I.13	Ureterolithotomi proksimal	-	0	0	3500000	0	0	0	3500000	0	0	A09	-	1	-
BUR.I.14	Ureterolithotomi distal	-	0	0	3800000	0	0	0	3800000	0	0	A09	-	1	-
BUR.I.15	Uretorolisis	-	0	0	3500000	0	0	0	3500000	0	0	A09	-	1	-
BUR.I.16	Ureterostomi	-	0	0	3600000	0	0	0	3600000	0	0	A09	-	1	-
BUR.I.17	Ureterouretostomi	-	0	0	3800000	0	0	0	3800000	0	0	A09	-	1	-
BUR.I.18	URS, Lithotripsi	-	0	0	3800000	0	0	0	3800000	0	0	A09	-	1	-
BUR.I.2	Nefrektomi	-	0	0	3800000	0	0	0	3800000	0	0	A09	-	1	-
BUR.I.20	Augmentasi Buli	-	0	0	7600000	0	0	0	7600000	0	0	A09	-	1	-
BUR.I.21	Bladder neck Rekonstruksi	-	0	0	4900000	0	0	0	4900000	0	0	A09	-	1	-
BUR.I.22	Divertikulektomi buli	-	0	0	3200000	0	0	0	3200000	0	0	A09	-	1	-
BUR.I.24	Ekstrofi buli rekonstruksi	-	0	0	7600000	0	0	0	7600000	0	0	A09	-	1	-
BUR.I.25	Evakuasi bekuan darah (Clot)	-	0	0	3500000	0	0	0	3500000	0	0	A09	-	1	-
BUR.I.26	Litholapaksi	-	0	0	3600000	0	0	0	3600000	0	0	A09	-	1	-
BUR.I.27	Lithotripsi	-	0	0	3600000	0	0	0	3600000	0	0	A09	-	1	-
BUR.I.28	Neobladder	-	0	0	7600000	0	0	0	7600000	0	0	A09	-	1	-
BUR.I.29	Psoas Hitch, Boari Flap	-	0	0	3800000	0	0	0	3800000	0	0	A09	-	1	-
BUR.I.3	Anastomosis end to end ureter	-	0	0	3600000	0	0	0	3600000	0	0	A09	-	1	-
BUR.I.30	Repair Fistel Enterovesika	-	0	0	7600000	0	0	0	7600000	0	0	A09	-	1	-
BUR.I.31	Repair Fistel Vesikokutan	-	0	0	3800000	0	0	0	3800000	0	0	A09	-	1	-
BUR.I.32	Rapair Fistel Vesikorektal	-	0	0	7600000	0	0	0	7600000	0	0	A09	-	1	-
BUR.I.33	Repair Fistel Vesikovagina	-	0	0	3800000	0	0	0	3800000	0	0	A09	-	1	-
BUR.I.34	Repair Fistel Vesikovagina kompleks	-	0	0	4900000	0	0	0	4900000	0	0	A09	-	1	-
BUR.I.35	Sectio Alta, Vesikolithoyomi	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
BUR.I.36	Sistokopi ODS	-	0	0	2800000	0	0	0	2800000	0	0	A09	-	1	-
BUR.I.37	Sistokopi	-	0	0	2200000	0	0	0	2200000	0	0	A09	-	1	-
BUR.I.38	Sistostomi perkutan	-	0	0	2200000	0	0	0	2200000	0	0	A09	-	1	-
BUR.I.39	Sistostomi terbuka	-	0	0	2900000	0	0	0	2900000	0	0	A09	-	1	-
BUR.I.4	Cabut DJ Stent	-	0	0	2100000	0	0	0	2100000	0	0	A09	-	1	-
BUR.I.40	Sistektomi total,radikal	-	0	0	5800000	0	0	0	5800000	0	0	A09	-	1	-
BUR.I.41	Sistektomi parsial, sistoplasti reduksi	-	0	0	3800000	0	0	0	3800000	0	0	A09	-	1	-
BUR.I.42	Sistektomi per laparaskopi	-	0	0	4900000	0	0	0	4900000	0	0	A09	-	1	-
BUR.I.43	TUR Tumor Buli	-	0	0	3700000	0	0	0	3700000	0	0	A09	-	1	-
BUR.I.44	Operasi Repair BULI Trauma	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
BUR.I.45	Businasi, Dilatasi Uretra	-	0	0	2100000	0	0	0	2100000	0	0	A09	-	1	-
BUR.I.46	Divertikulum uretra	-	0	0	2400000	0	0	0	2400000	0	0	A09	-	1	-
BUR.I.47	Epispadia	-	0	0	6800000	0	0	0	6800000	0	0	A09	-	1	-
BUR.I.48	Fistulektomi, Repair Fistel Uretra	-	0	0	2400000	0	0	0	2400000	0	0	A09	-	1	-
BUR.I.49	Uretroplastri Hipospadia	-	0	0	2600000	0	0	0	2600000	0	0	A09	-	1	-
BUR.I.5	Drainase Periureter	-	0	0	2200000	0	0	0	2200000	0	0	A09	-	1	-
BUR.I.50	Hispospadia Subkoronal	-	0	0	3800000	0	0	0	3800000	0	0	A09	-	1	-
BUR.I.51	Insisi Posterior Urethral Valve	-	0	0	3400000	0	0	0	3400000	0	0	A09	-	1	-
BUR.I.52	Uretrotomi Interna (Sachse)	-	0	0	2800000	0	0	0	2800000	0	0	A09	-	1	-
BUR.I.53	Johanson I	-	0	0	2900000	0	0	0	2900000	0	0	A09	-	1	-
BUR.I.54	Johanson II	-	0	0	3200000	0	0	0	3200000	0	0	A09	-	1	-
BUR.I.55	Kalibrasi Uretra	-	0	0	2100000	0	0	0	2100000	0	0	A09	-	1	-
BUR.I.56	Meatotomi	-	0	0	2100000	0	0	0	2100000	0	0	A09	-	1	-
BUR.I.57	Meatoplasti	-	0	0	2200000	0	0	0	2200000	0	0	A09	-	1	-
BUR.I.58	Pasang Kateter	K1	15000	0	0	25000	0	0	15000	40000	40000	A09	K1	1	-
BUR.I.6	Ekstraksi Batu	-	0	0	2800000	0	0	0	2800000	0	0	A09	-	1	-
BUR.I.60	Railroading Ruptur Uretra	-	0	0	3600000	0	0	0	3600000	0	0	A09	-	1	-
BUR.I.61	PER (Primary Endoscopic Realignment)	-	0	0	3500000	0	0	0	3500000	0	0	A09	-	1	-
BUR.I.62	Reseksi-Anastomosis Uretra	-	0	0	3600000	0	0	0	3600000	0	0	A09	-	1	-
BUR.I.63	Uretroskopi, Uretrosistoskopi	-	0	0	2100000	0	0	0	2100000	0	0	A09	-	1	-
BUR.I.64	Uretroplasti Bukal Graf	-	0	0	4000000	0	0	0	4000000	0	0	A09	-	1	-
BUR.I.65	Uretrotomi Eksterna	-	0	0	2300000	0	0	0	2300000	0	0	A09	-	1	-
BUR.I.66	Biopsi Prostrat	-	0	0	2100000	0	0	0	2100000	0	0	A09	-	1	-
BUR.I.67	Masasae Prostrat	-	0	0	2100000	0	0	0	2100000	0	0	A09	-	1	-
BUR.I.68	Prostatektomi Terbuka	-	0	0	2700000	0	0	0	2700000	0	0	A09	-	1	-
BUR.I.69	Prostatektomi Retropublik	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
BUR.I.7	Insersi DJ Stent	-	0	0	3400000	0	0	0	3400000	0	0	A09	-	1	-
BUR.I.70	Prostatektomi radikal	-	0	0	5800000	0	0	0	5800000	0	0	A09	-	1	-
BUR.I.71	TUR Prostat, TUIP, BNI	-	0	0	3700000	0	0	0	3700000	0	0	A09	-	1	-
BUR.I.72	TVP, TMP	-	0	0	2800000	0	0	0	2800000	0	0	A09	-	1	-
BUR.I.74	Biopsi Penis	-	0	0	2100000	0	0	0	2100000	0	0	A09	-	1	-
BUR.I.75	Biopsi Testis	-	0	0	2100000	0	0	0	2100000	0	0	A09	-	1	-
BUR.I.76	Diseksi Kelenjar Getah Bening	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
BUR.I.77	Sirkumsisi, Dorsumsisi	-	0	0	1100000	0	0	0	1100000	0	0	A09	-	1	-
BUR.I.78	Eksisi Chordae, Chordektomi	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
M.I.31	Reposisi Iris	-	0	0	750000	0	0	0	750000	0	0	A09	-	1	-
BUR.I.79	Eksisi Plaque (Peyronie Disease)	-	0	0	2800000	0	0	0	2800000	0	0	A09	-	1	-
BUR.I.8	Reimplantasi ureter unilateral, Ureteroneosistostomi	-	0	0	3600000	0	0	0	3600000	0	0	A09	-	1	-
BUR.I.80	Eksplorasi Testis (Microsurgery)	-	0	0	3900000	0	0	0	3900000	0	0	A09	-	1	-
BUR.I.81	Eksisi Fibroma, Rekonstruksi Penis	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
BUR.I.82	Funikokelektomi	-	0	0	2900000	0	0	0	2900000	0	0	A09	-	1	-
BUR.I.83	Hidrokel per skrotal	-	0	0	2900000	0	0	0	2900000	0	0	A09	-	1	-
BUR.I.84	Hidrokel per ingunial, Ligasi tinggi	-	0	0	3600000	0	0	0	3600000	0	0	A09	-	1	-
BUR.I.85	Insisi Abses Perineum	-	0	0	2100000	0	0	0	2100000	0	0	A09	-	1	-
BUR.I.86	Operasi Priapismus (Prosedur Winter)	-	0	0	3300000	0	0	0	3300000	0	0	A09	-	1	-
BUR.I.87	Koreksi Priapismus	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
BUR.I.88	Ligasi v. Spermatika Interna (Microsurgery)	-	0	0	2900000	0	0	0	2900000	0	0	A09	-	1	-
BUR.I.89	Limfadenektomi ilioinguinal	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
BUR.I.9	Reimplantasi ureter bilateral	-	0	0	4000000	0	0	0	4000000	0	0	A09	-	1	-
BUR.I.90	Orkhidektomi	-	0	0	2800000	0	0	0	2800000	0	0	A09	-	1	-
BUR.I.91	Orkhidektomi Extended	-	0	0	2800000	0	0	0	2800000	0	0	A09	-	1	-
BUR.I.92	Orkhidektomi Ligasi Tinggi	-	0	0	2900000	0	0	0	2900000	0	0	A09	-	1	-
BUR.I.93	Orkhidektomi Subkapsuler	-	0	0	2800000	0	0	0	2800000	0	0	A09	-	1	-
BUR.I.94	Orkhidopeksi (Torsio Testis)	-	0	0	3200000	0	0	0	3200000	0	0	A09	-	1	-
BUR.I.95	Orkhidopeksi (UDT)	-	0	0	3600000	0	0	0	3600000	0	0	A09	-	1	-
BUR.I.96	Orkhidopeksi per laparaskopi	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
BUR.I.97	Penektomi Parsial	-	0	0	2900000	0	0	0	2900000	0	0	A09	-	1	-
BUR.I.98	Penektomi total, amputasi penis	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
BUR.I.99	Reparasi penis	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
BUR.II.1	Biopsi Ginjal Terbuka	-	0	0	3060000	0	0	0	3060000	0	0	A09	-	1	-
BUR.II.10	RPG, URS diagnostik	-	0	0	2975000	0	0	0	2975000	0	0	A09	-	1	-
BUR.II.100	Skrotoplasti	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
BUR.II.101	Spermatokelektomi	-	0	0	2465000	0	0	0	2465000	0	0	A09	-	1	-
BUR.II.102	Varikokelektomi (Palomo)	-	0	0	1870000	0	0	0	1870000	0	0	A09	-	1	-
BUR.II.103	Vasektomi (anastesi lokal)	-	0	0	1870000	0	0	0	1870000	0	0	A09	-	1	-
BUR.II.104	Vasektomi (narkose)	-	0	0	2380000	0	0	0	2380000	0	0	A09	-	1	-
BUR.II.105	Vasoepididimostomi	-	0	0	3485000	0	0	0	3485000	0	0	A09	-	1	-
BUR.II.106	Vasografi	-	0	0	1785000	0	0	0	1785000	0	0	A09	-	1	-
BUR.II.107	Eksisi Webbed Penis	-	0	0	2890000	0	0	0	2890000	0	0	A09	-	1	-
BUR.II.108	Burried Penis	-	0	0	2465000	0	0	0	2465000	0	0	A09	-	1	-
BUR.II.109	Diseksi Kelenjar Getah Bening Pelvis	-	0	0	2975000	0	0	0	2975000	0	0	A09	-	1	-
BUR.II.11	Tailoring Ureter	-	0	0	3230000	0	0	0	3230000	0	0	A09	-	1	-
BUR.II.110	Diseksi Kelenjar Getah Bening per laparaskopi	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
BUR.II.111	ESWL	-	0	0	2040000	0	0	0	2040000	0	0	A09	-	1	-
BUR.II.112	Holmium YaG laser	-	0	0	3315000	0	0	0	3315000	0	0	A09	-	1	-
BUR.II.113	Kauterisasi	-	0	0	1700000	0	0	0	1700000	0	0	A09	-	1	-
BUR.II.114	Laparotomi Eksplorasi	-	0	0	3060000	0	0	0	3060000	0	0	A09	K2	1	-
BUR.II.115	Limfadenektomi Retroperitoneal, RPLND	-	0	0	3060000	0	0	0	3060000	0	0	A09	-	1	-
BUR.II.116	MMK, sling uretra	-	0	0	2465000	0	0	0	2465000	0	0	A09	-	1	-
BUR.II.117	Operasi Sistokel	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
BUR.II.118	Operasi Urakhus, Reseksi Urakhus	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
BUR.II.12	Transuretero-uterostomi	-	0	0	3230000	0	0	0	3230000	0	0	A09	-	1	-
BUR.II.121	Punksi dan sklerosing kista ginjal	-	0	0	1870000	0	0	0	1870000	0	0	A09	-	1	-
BUR.II.122	Tindakan pembedahan testis untuk pengambilan spermatozoa (TESA,TESE,PESA,MESA)	-	0	0	3145000	0	0	0	3145000	0	0	A09	-	1	-
BUR.II.13	Ureterolithotomi proksimal	-	0	0	2975000	0	0	0	2975000	0	0	A09	-	1	-
BUR.II.14	Ureterolithotomi distal	-	0	0	3230000	0	0	0	3230000	0	0	A09	-	1	-
BUR.II.15	Uretorolisis	-	0	0	2975000	0	0	0	2975000	0	0	A09	-	1	-
BUR.II.16	Ureterostomi	-	0	0	3060000	0	0	0	3060000	0	0	A09	-	1	-
BUR.II.17	Ureterouretostomi	-	0	0	3230000	0	0	0	3230000	0	0	A09	-	1	-
BUR.II.18	URS, Lithotripsi	-	0	0	3230000	0	0	0	3230000	0	0	A09	-	1	-
BUR.II.2	Nefrektomi	-	0	0	3230000	0	0	0	3230000	0	0	A09	-	1	-
BUR.II.20	Augmentasi Buli	-	0	0	6460000	0	0	0	6460000	0	0	A09	-	1	-
BUR.II.21	Bladder neck Rekonstruksi	-	0	0	4165000	0	0	0	4165000	0	0	A09	-	1	-
BUR.II.22	Divertikulektomi buli	-	0	0	2720000	0	0	0	2720000	0	0	A09	-	1	-
BUR.II.24	Ekstrofi buli rekonstruksi	-	0	0	6460000	0	0	0	6460000	0	0	A09	-	1	-
BUR.II.25	Evakuasi bekuan darah (Clot)	-	0	0	2975000	0	0	0	2975000	0	0	A09	-	1	-
BUR.II.26	Litholapaksi	-	0	0	3060000	0	0	0	3060000	0	0	A09	-	1	-
BUR.II.27	Lithotripsi	-	0	0	3060000	0	0	0	3060000	0	0	A09	-	1	-
BUR.II.28	Neobladder	-	0	0	6460000	0	0	0	6460000	0	0	A09	-	1	-
BUR.II.29	Psoas Hitch, Boari Flap	-	0	0	3230000	0	0	0	3230000	0	0	A09	-	1	-
BUR.II.3	Anastomosis end to end ureter	-	0	0	3060000	0	0	0	3060000	0	0	A09	-	1	-
BUR.II.30	Repair Fistel Enterovesika	-	0	0	6460000	0	0	0	6460000	0	0	A09	-	1	-
BUR.II.31	Repair Fistel Vesikokutan	-	0	0	3230000	0	0	0	3230000	0	0	A09	-	1	-
BUR.II.32	Rapair Fistel Vesikorektal	-	0	0	6460000	0	0	0	6460000	0	0	A09	-	1	-
BUR.II.33	Repair Fistel Vesikovagina	-	0	0	3230000	0	0	0	3230000	0	0	A09	-	1	-
BUR.II.34	Repair Fistel Vesikovagina kompleks	-	0	0	4165000	0	0	0	4165000	0	0	A09	-	1	-
BUR.II.35	Sectio Alta, Vesikolithoyomi	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
BUR.II.36	Sistokopi ODS	-	0	0	2380000	0	0	0	2380000	0	0	A09	-	1	-
BUR.II.37	Sistokopi	-	0	0	1870000	0	0	0	1870000	0	0	A09	-	1	-
BUR.II.38	Sistostomi perkutan	-	0	0	1870000	0	0	0	1870000	0	0	A09	-	1	-
BUR.II.39	Sistostomi terbuka	-	0	0	2465000	0	0	0	2465000	0	0	A09	-	1	-
BUR.II.4	Cabut DJ Stent	-	0	0	1785000	0	0	0	1785000	0	0	A09	-	1	-
BUR.II.40	Sistektomi total,radikal	-	0	0	4930000	0	0	0	4930000	0	0	A09	-	1	-
BUR.II.41	Sistektomi parsial, sistoplasti reduksi	-	0	0	3230000	0	0	0	3230000	0	0	A09	-	1	-
BUR.II.42	Sistektomi per laparaskopi	-	0	0	4165000	0	0	0	4165000	0	0	A09	-	1	-
BUR.II.43	TUR Tumor Buli	-	0	0	3145000	0	0	0	3145000	0	0	A09	-	1	-
BUR.II.44	Operasi Repair BULI Trauma	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
BUR.II.45	Businasi, Dilatasi Uretra	-	0	0	1785000	0	0	0	1785000	0	0	A09	-	1	-
BUR.II.46	Divertikulum uretra	-	0	0	2040000	0	0	0	2040000	0	0	A09	-	1	-
BUR.II.47	Epispadia	-	0	0	5780000	0	0	0	5780000	0	0	A09	-	1	-
BUR.II.48	Fistulektomi, Repair Fistel Uretra	-	0	0	2040000	0	0	0	2040000	0	0	A09	-	1	-
BUR.II.49	Uretroplastri Hipospadia	-	0	0	2210000	0	0	0	2210000	0	0	A09	-	1	-
BUR.II.5	Drainase Periureter	-	0	0	1870000	0	0	0	1870000	0	0	A09	-	1	-
BUR.II.50	Hispospadia Subkoronal	-	0	0	3230000	0	0	0	3230000	0	0	A09	-	1	-
BUR.II.51	Insisi Posterior Urethral Valve	-	0	0	2890000	0	0	0	2890000	0	0	A09	-	1	-
BUR.II.52	Uretrotomi Interna (Sachse)	-	0	0	2380000	0	0	0	2380000	0	0	A09	-	1	-
BUR.II.53	Johanson I	-	0	0	2465000	0	0	0	2465000	0	0	A09	-	1	-
BUR.II.54	Johanson II	-	0	0	2720000	0	0	0	2720000	0	0	A09	-	1	-
BUR.II.55	Kalibrasi Uretra	-	0	0	1785000	0	0	0	1785000	0	0	A09	-	1	-
BUR.II.56	Meatotomi	-	0	0	1785000	0	0	0	1785000	0	0	A09	-	1	-
BUR.II.57	Meatoplasti	-	0	0	1870000	0	0	0	1870000	0	0	A09	-	1	-
BUR.II.6	Ekstraksi Batu	-	0	0	2380000	0	0	0	2380000	0	0	A09	-	1	-
BUR.II.60	Railroading Ruptur Uretra	-	0	0	3060000	0	0	0	3060000	0	0	A09	-	1	-
BUR.II.61	PER (Primary Endoscopic Realignment)	-	0	0	2975000	0	0	0	2975000	0	0	A09	-	1	-
BUR.II.62	Reseksi-Anastomosis Uretra	-	0	0	3060000	0	0	0	3060000	0	0	A09	-	1	-
BUR.II.63	Uretroskopi, Uretrosistoskopi	-	0	0	1785000	0	0	0	1785000	0	0	A09	-	1	-
BUR.II.64	Uretroplasti Bukal Graf	-	0	0	3400000	0	0	0	3400000	0	0	A09	-	1	-
BUR.II.65	Uretrotomi Eksterna	-	0	0	1955000	0	0	0	1955000	0	0	A09	-	1	-
BUR.II.66	Biopsi Prostrat	-	0	0	1785000	0	0	0	1785000	0	0	A09	-	1	-
BUR.II.67	Masasae Prostrat	-	0	0	1785000	0	0	0	1785000	0	0	A09	-	1	-
BUR.II.68	Prostatektomi Terbuka	-	0	0	2295000	0	0	0	2295000	0	0	A09	-	1	-
BUR.II.69	Prostatektomi Retropublik	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
BUR.II.7	Insersi DJ Stent	-	0	0	2890000	0	0	0	2890000	0	0	A09	-	1	-
BUR.II.70	Prostatektomi radikal	-	0	0	4930000	0	0	0	4930000	0	0	A09	-	1	-
BUR.II.71	TUR Prostat, TUIP, BNI	-	0	0	3145000	0	0	0	3145000	0	0	A09	-	1	-
BUR.II.72	TVP, TMP	-	0	0	2380000	0	0	0	2380000	0	0	A09	-	1	-
BUR.II.74	Biopsi Penis	-	0	0	1785000	0	0	0	1785000	0	0	A09	-	1	-
BUR.II.75	Biopsi Testis	-	0	0	1785000	0	0	0	1785000	0	0	A09	-	1	-
BUR.II.76	Diseksi Kelenjar Getah Bening	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
BUR.II.77	Sirkumsisi, Dorsumsisi	-	0	0	935000	0	0	0	935000	0	0	A09	-	1	-
BUR.II.78	Eksisi Chordae, Chordektomi	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
BUR.II.79	Eksisi Plaque (Peyronie Disease)	-	0	0	2380000	0	0	0	2380000	0	0	A09	-	1	-
BUR.II.8	Reimplantasi ureter unilateral, Ureteroneosistostomi	-	0	0	3060000	0	0	0	3060000	0	0	A09	-	1	-
BUR.II.80	Eksplorasi Testis (Microsurgery)	-	0	0	3315000	0	0	0	3315000	0	0	A09	-	1	-
BUR.II.81	Eksisi Fibroma, Rekonstruksi Penis	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
BUR.II.82	Funikokelektomi	-	0	0	2465000	0	0	0	2465000	0	0	A09	-	1	-
BUR.II.83	Hidrokel per skrotal	-	0	0	2465000	0	0	0	2465000	0	0	A09	-	1	-
BUR.II.84	Hidrokel per ingunial, Ligasi tinggi	-	0	0	3060000	0	0	0	3060000	0	0	A09	-	1	-
BUR.II.85	Insisi Abses Perineum	-	0	0	1785000	0	0	0	1785000	0	0	A09	-	1	-
BUR.II.86	Operasi Priapismus (Prosedur Winter)	-	0	0	2805000	0	0	0	2805000	0	0	A09	-	1	-
BUR.II.87	Koreksi Priapismus	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
BUR.II.88	Ligasi v. Spermatika Interna (Microsurgery)	-	0	0	2465000	0	0	0	2465000	0	0	A09	-	1	-
BUR.II.89	Limfadenektomi ilioinguinal	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
BUR.II.9	Reimplantasi ureter bilateral	-	0	0	3400000	0	0	0	3400000	0	0	A09	-	1	-
BUR.II.90	Orkhidektomi	-	0	0	2380000	0	0	0	2380000	0	0	A09	-	1	-
BUR.II.91	Orkhidektomi Extended	-	0	0	2380000	0	0	0	2380000	0	0	A09	-	1	-
BUR.II.92	Orkhidektomi Ligasi Tinggi	-	0	0	2465000	0	0	0	2465000	0	0	A09	-	1	-
BUR.II.93	Orkhidektomi Subkapsuler	-	0	0	2380000	0	0	0	2380000	0	0	A09	-	1	-
BUR.II.94	Orkhidopeksi (Torsio Testis)	-	0	0	2720000	0	0	0	2720000	0	0	A09	-	1	-
BUR.II.95	Orkhidopeksi (UDT)	-	0	0	3060000	0	0	0	3060000	0	0	A09	-	1	-
BUR.II.96	Orkhidopeksi per laparaskopi	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
BUR.II.97	Penektomi Parsial	-	0	0	2465000	0	0	0	2465000	0	0	A09	-	1	-
BUR.II.98	Penektomi total, amputasi penis	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
BUR.II.99	Reparasi penis	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
BUR.III.1	Biopsi Ginjal Terbuka	-	0	0	2601000	0	0	0	2601000	0	0	A09	-	1	-
BUR.III.10	RPG, URS diagnostik	-	0	0	2528750	0	0	0	2528750	0	0	A09	-	1	-
BUR.III.100	Skrotoplasti	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
BUR.III.101	Spermatokelektomi	-	0	0	2095250	0	0	0	2095250	0	0	A09	-	1	-
BUR.III.102	Varikokelektomi (Palomo)	-	0	0	1589500	0	0	0	1589500	0	0	A09	-	1	-
BUR.III.103	Vasektomi (anastesi lokal)	-	0	0	1589500	0	0	0	1589500	0	0	A09	-	1	-
BUR.III.104	Vasektomi (narkose)	-	0	0	2023000	0	0	0	2023000	0	0	A09	-	1	-
BUR.III.105	Vasoepididimostomi	-	0	0	2962250	0	0	0	2962250	0	0	A09	-	1	-
BUR.III.106	Vasografi	-	0	0	1517250	0	0	0	1517250	0	0	A09	-	1	-
BUR.III.107	Eksisi Webbed Penis	-	0	0	2456500	0	0	0	2456500	0	0	A09	-	1	-
BUR.III.108	Burried Penis	-	0	0	2095250	0	0	0	2095250	0	0	A09	-	1	-
BUR.III.109	Diseksi Kelenjar Getah Bening Pelvis	-	0	0	2528750	0	0	0	2528750	0	0	A09	-	1	-
BUR.III.11	Tailoring Ureter	-	0	0	2745500	0	0	0	2745500	0	0	A09	-	1	-
BUR.III.110	Diseksi Kelenjar Getah Bening per laparaskopi	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
BUR.III.111	ESWL	-	0	0	1734000	0	0	0	1734000	0	0	A09	-	1	-
BUR.III.112	Holmium YaG laser	-	0	0	2817750	0	0	0	2817750	0	0	A09	-	1	-
BUR.III.113	Kauterisasi	-	0	0	1445000	0	0	0	1445000	0	0	A09	-	1	-
BUR.III.114	Jasa Laparotomi Eksplorasi	-	0	0	2000000	0	0	0	2000000	0	0	A09	K3	1	-
BUR.III.115	Limfadenektomi Retroperitoneal, RPLND	-	0	0	2601000	0	0	0	2601000	0	0	A09	-	1	-
BUR.III.116	MMK, sling uretra	-	0	0	2095250	0	0	0	2095250	0	0	A09	-	1	-
BUR.III.117	Operasi Sistokel	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
BUR.III.118	Operasi Urakhus, Reseksi Urakhus	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
BUR.III.12	Transuretero-uterostomi	-	0	0	2745500	0	0	0	2745500	0	0	A09	-	1	-
BUR.III.121	Punksi dan sklerosing kista ginjal	-	0	0	1589500	0	0	0	1589500	0	0	A09	-	1	-
BUR.III.122	Tindakan pembedahan testis untuk pengambilan spermatozoa (TESA,TESE,PESA,MESA)	-	0	0	2673250	0	0	0	2673250	0	0	A09	-	1	-
BUR.III.13	Ureterolithotomi proksimal	-	0	0	2528750	0	0	0	2528750	0	0	A09	-	1	-
BUR.III.14	Ureterolithotomi distal	-	0	0	2745500	0	0	0	2745500	0	0	A09	-	1	-
BUR.III.15	Uretorolisis	-	0	0	2528750	0	0	0	2528750	0	0	A09	-	1	-
BUR.III.16	Ureterostomi	-	0	0	2601000	0	0	0	2601000	0	0	A09	-	1	-
BUR.III.17	Ureterouretostomi	-	0	0	2745500	0	0	0	2745500	0	0	A09	-	1	-
BUR.III.18	URS, Lithotripsi	-	0	0	2745500	0	0	0	2745500	0	0	A09	-	1	-
BUR.III.2	Nefrektomi	-	0	0	2745500	0	0	0	2745500	0	0	A09	-	1	-
BUR.III.20	Augmentasi Buli	-	0	0	5491000	0	0	0	5491000	0	0	A09	-	1	-
BUR.III.21	Bladder neck Rekonstruksi	-	0	0	3540250	0	0	0	3540250	0	0	A09	-	1	-
BUR.III.22	Divertikulektomi buli	-	0	0	2312000	0	0	0	2312000	0	0	A09	-	1	-
BUR.III.24	Ekstrofi buli rekonstruksi	-	0	0	5491000	0	0	0	5491000	0	0	A09	-	1	-
BUR.III.25	Evakuasi bekuan darah (Clot)	-	0	0	2528750	0	0	0	2528750	0	0	A09	-	1	-
BUR.III.26	Litholapaksi	-	0	0	2601000	0	0	0	2601000	0	0	A09	-	1	-
BUR.III.27	Lithotripsi	-	0	0	2601000	0	0	0	2601000	0	0	A09	-	1	-
BUR.III.28	Neobladder	-	0	0	5491000	0	0	0	5491000	0	0	A09	-	1	-
BUR.III.29	Psoas Hitch, Boari Flap	-	0	0	2745500	0	0	0	2745500	0	0	A09	-	1	-
BUR.III.3	Anastomosis end to end ureter	-	0	0	2601000	0	0	0	2601000	0	0	A09	-	1	-
BUR.III.30	Repair Fistel Enterovesika	-	0	0	5491000	0	0	0	5491000	0	0	A09	-	1	-
BUR.III.31	Repair Fistel Vesikokutan	-	0	0	2745500	0	0	0	2745500	0	0	A09	-	1	-
BUR.III.32	Rapair Fistel Vesikorektal	-	0	0	5491000	0	0	0	5491000	0	0	A09	-	1	-
BUR.III.33	Repair Fistel Vesikovagina	-	0	0	2745500	0	0	0	2745500	0	0	A09	-	1	-
BUR.III.34	Repair Fistel Vesikovagina kompleks	-	0	0	3540250	0	0	0	3540250	0	0	A09	-	1	-
BUR.III.35	Sectio Alta, Vesikolithoyomi	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
BUR.III.36	Sistokopi ODS	-	0	0	2023000	0	0	0	2023000	0	0	A09	-	1	-
BUR.III.37	Sistokopi	-	0	0	1589500	0	0	0	1589500	0	0	A09	-	1	-
BUR.III.38	Sistostomi perkutan	-	0	0	1589500	0	0	0	1589500	0	0	A09	-	1	-
BUR.III.39	Sistostomi terbuka	-	0	0	2095250	0	0	0	2095250	0	0	A09	-	1	-
BUR.III.4	Cabut DJ Stent	-	0	0	1517250	0	0	0	1517250	0	0	A09	-	1	-
BUR.III.40	Sistektomi total,radikal	-	0	0	4190500	0	0	0	4190500	0	0	A09	-	1	-
BUR.III.41	Sistektomi parsial, sistoplasti reduksi	-	0	0	2745500	0	0	0	2745500	0	0	A09	-	1	-
BUR.III.42	Sistektomi per laparaskopi	-	0	0	3540250	0	0	0	3540250	0	0	A09	-	1	-
BUR.III.43	TUR Tumor Buli	-	0	0	2673250	0	0	0	2673250	0	0	A09	-	1	-
BUR.III.44	Operasi Repair BULI Trauma	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
BUR.III.45	Businasi, Dilatasi Uretra	-	0	0	1517250	0	0	0	1517250	0	0	A09	-	1	-
BUR.III.46	Divertikulum uretra	-	0	0	1734000	0	0	0	1734000	0	0	A09	-	1	-
BUR.III.47	Epispadia	-	0	0	4913000	0	0	0	4913000	0	0	A09	-	1	-
BUR.III.48	Fistulektomi, Repair Fistel Uretra	-	0	0	1734000	0	0	0	1734000	0	0	A09	-	1	-
BUR.III.49	Uretroplastri Hipospadia	-	0	0	1878500	0	0	0	1878500	0	0	A09	-	1	-
BUR.III.5	Drainase Periureter	-	0	0	1589500	0	0	0	1589500	0	0	A09	-	1	-
BUR.III.50	Hispospadia Subkoronal	-	0	0	2745500	0	0	0	2745500	0	0	A09	-	1	-
BUR.III.51	Insisi Posterior Urethral Valve	-	0	0	2456500	0	0	0	2456500	0	0	A09	-	1	-
BUR.III.52	Uretrotomi Interna (Sachse)	-	0	0	2023000	0	0	0	2023000	0	0	A09	-	1	-
BUR.III.53	Johanson I	-	0	0	2095250	0	0	0	2095250	0	0	A09	-	1	-
BUR.III.54	Johanson II	-	0	0	2312000	0	0	0	2312000	0	0	A09	-	1	-
BUR.III.55	Kalibrasi Uretra	-	0	0	1517250	0	0	0	1517250	0	0	A09	-	1	-
BUR.III.56	Meatotomi	-	0	0	1517250	0	0	0	1517250	0	0	A09	-	1	-
BUR.III.57	Meatoplasti	-	0	0	1589500	0	0	0	1589500	0	0	A09	-	1	-
BUR.III.6	Ekstraksi Batu	-	0	0	2023000	0	0	0	2023000	0	0	A09	-	1	-
BUR.III.60	Railroading Ruptur Uretra	-	0	0	2601000	0	0	0	2601000	0	0	A09	-	1	-
BUR.III.61	PER (Primary Endoscopic Realignment)	-	0	0	2528750	0	0	0	2528750	0	0	A09	-	1	-
BUR.III.62	Reseksi-Anastomosis Uretra	-	0	0	2601000	0	0	0	2601000	0	0	A09	-	1	-
BUR.III.63	Uretroskopi, Uretrosistoskopi	-	0	0	1517250	0	0	0	1517250	0	0	A09	-	1	-
BUR.III.64	Uretroplasti Bukal Graf	-	0	0	2890000	0	0	0	2890000	0	0	A09	-	1	-
BUR.III.65	Uretrotomi Eksterna	-	0	0	1661750	0	0	0	1661750	0	0	A09	-	1	-
BUR.III.66	Biopsi Prostrat	-	0	0	1517250	0	0	0	1517250	0	0	A09	-	1	-
BUR.III.67	Masasae Prostrat	-	0	0	1517250	0	0	0	1517250	0	0	A09	-	1	-
BUR.III.68	Prostatektomi Terbuka	-	0	0	1950750	0	0	0	1950750	0	0	A09	-	1	-
BUR.III.69	Prostatektomi Retropublik	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
BUR.III.7	Insersi DJ Stent	-	0	0	2456500	0	0	0	2456500	0	0	A09	-	1	-
BUR.III.70	Prostatektomi radikal	-	0	0	4190500	0	0	0	4190500	0	0	A09	-	1	-
BUR.III.71	TUR Prostat, TUIP, BNI	-	0	0	2673250	0	0	0	2673250	0	0	A09	-	1	-
BUR.III.72	TVP, TMP	-	0	0	2023000	0	0	0	2023000	0	0	A09	-	1	-
BUR.III.74	Biopsi Penis	-	0	0	1517250	0	0	0	1517250	0	0	A09	-	1	-
BUR.III.75	Biopsi Testis	-	0	0	1517250	0	0	0	1517250	0	0	A09	-	1	-
BUR.III.76	Diseksi Kelenjar Getah Bening	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
BUR.III.77	Sirkumsisi, Dorsumsisi	-	0	0	794750	0	0	0	794750	0	0	A09	-	1	-
BUR.III.78	Eksisi Chordae, Chordektomi	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
BUR.III.79	Eksisi Plaque (Peyronie Disease)	-	0	0	2023000	0	0	0	2023000	0	0	A09	-	1	-
BUR.III.8	Reimplantasi ureter unilateral, Ureteroneosistostomi	-	0	0	2601000	0	0	0	2601000	0	0	A09	-	1	-
BUR.III.80	Eksplorasi Testis (Microsurgery)	-	0	0	2817750	0	0	0	2817750	0	0	A09	-	1	-
BUR.III.81	Eksisi Fibroma, Rekonstruksi Penis	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
BUR.III.82	Funikokelektomi	-	0	0	2095250	0	0	0	2095250	0	0	A09	-	1	-
BUR.III.83	Hidrokel per skrotal	-	0	0	2095250	0	0	0	2095250	0	0	A09	-	1	-
BUR.III.84	Hidrokel per ingunial, Ligasi tinggi	-	0	0	2601000	0	0	0	2601000	0	0	A09	-	1	-
BUR.III.85	Insisi Abses Perineum	-	0	0	1517250	0	0	0	1517250	0	0	A09	-	1	-
BUR.III.86	Operasi Priapismus (Prosedur Winter)	-	0	0	2384250	0	0	0	2384250	0	0	A09	-	1	-
BUR.III.87	Koreksi Priapismus	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
BUR.III.88	Ligasi v. Spermatika Interna (Microsurgery)	-	0	0	2095250	0	0	0	2095250	0	0	A09	-	1	-
BUR.III.89	Limfadenektomi ilioinguinal	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
BUR.III.9	Reimplantasi ureter bilateral	-	0	0	2890000	0	0	0	2890000	0	0	A09	-	1	-
BUR.III.90	Orkhidektomi	-	0	0	2023000	0	0	0	2023000	0	0	A09	-	1	-
BUR.III.91	Orkhidektomi Extended	-	0	0	2023000	0	0	0	2023000	0	0	A09	-	1	-
BUR.III.92	Orkhidektomi Ligasi Tinggi	-	0	0	2095250	0	0	0	2095250	0	0	A09	-	1	-
BUR.III.93	Orkhidektomi Subkapsuler	-	0	0	2023000	0	0	0	2023000	0	0	A09	-	1	-
BUR.III.94	Orkhidopeksi (Torsio Testis)	-	0	0	2312000	0	0	0	2312000	0	0	A09	-	1	-
BUR.III.95	Orkhidopeksi (UDT)	-	0	0	2601000	0	0	0	2601000	0	0	A09	-	1	-
BUR.III.96	Orkhidopeksi per laparaskopi	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
BUR.III.97	Penektomi Parsial	-	0	0	2095250	0	0	0	2095250	0	0	A09	-	1	-
BUR.III.98	Penektomi total, amputasi penis	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
BUR.III.99	Reparasi penis	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
BUR.III.anas	Jasa dokter Anastesi Laparotomi Eksplorasi	-	0	0	600000	0	0	0	600000	0	0	A09	K3	1	-
BUR.III.anas.ci	Jasa dokter Anastesi Laparotomi Eksplorasi ( CITO )	-	0	0	750000	0	0	0	750000	0	0	A09	K3	1	-
BUR.III.cito	Jasa Laparotomi Eksplorasi ( CITO )	-	0	0	2500000	0	0	0	2500000	0	0	A09	K3	1	-
BUR.ODC.1	Biopsi Ginjal Terbuka	-	0	0	2210850	0	0	0	2210850	0	0	A09	-	1	-
BUR.ODC.10	RPG, URS diagnostik	-	0	0	2149437.5	0	0	0	2149437.5	0	0	A09	-	1	-
BUR.ODC.100	Skrotoplasti	-	0	0	1842375	0	0	0	1842375	0	0	A09	-	1	-
BUR.ODC.101	Spermatokelektomi	-	0	0	1780962.5	0	0	0	1780962.5	0	0	A09	-	1	-
BUR.ODC.102	Varikokelektomi (Palomo)	-	0	0	1351075	0	0	0	1351075	0	0	A09	-	1	-
BUR.ODC.103	Vasektomi (anastesi lokal)	-	0	0	1351075	0	0	0	1351075	0	0	A09	-	1	-
BUR.ODC.104	Vasektomi (narkose)	-	0	0	1719550	0	0	0	1719550	0	0	A09	-	1	-
BUR.ODC.105	Vasoepididimostomi	-	0	0	2517912.5	0	0	0	2517912.5	0	0	A09	-	1	-
BUR.ODC.106	Vasografi	-	0	0	1289662.5	0	0	0	1289662.5	0	0	A09	-	1	-
BUR.ODC.107	Eksisi Webbed Penis	-	0	0	2088025	0	0	0	2088025	0	0	A09	-	1	-
BUR.ODC.108	Burried Penis	-	0	0	1780962.5	0	0	0	1780962.5	0	0	A09	-	1	-
BUR.ODC.109	Diseksi Kelenjar Getah Bening Pelvis	-	0	0	2149437.5	0	0	0	2149437.5	0	0	A09	-	1	-
BUR.ODC.11	Tailoring Ureter	-	0	0	2333675	0	0	0	2333675	0	0	A09	-	1	-
BUR.ODC.110	Diseksi Kelenjar Getah Bening per laparaskopi	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
BUR.ODC.111	ESWL	-	0	0	1473900	0	0	0	1473900	0	0	A09	-	1	-
BUR.ODC.112	Holmium YaG laser	-	0	0	2395087.5	0	0	0	2395087.5	0	0	A09	-	1	-
BUR.ODC.113	Kauterisasi	-	0	0	1228250	0	0	0	1228250	0	0	A09	-	1	-
BUR.ODC.115	Limfadenektomi Retroperitoneal, RPLND	-	0	0	2210850	0	0	0	2210850	0	0	A09	-	1	-
BUR.ODC.116	MMK, sling uretra	-	0	0	1780962.5	0	0	0	1780962.5	0	0	A09	-	1	-
BUR.ODC.117	Operasi Sistokel	-	0	0	1842375	0	0	0	1842375	0	0	A09	-	1	-
BUR.ODC.118	Operasi Urakhus, Reseksi Urakhus	-	0	0	1842375	0	0	0	1842375	0	0	A09	-	1	-
BUR.ODC.12	Transuretero-uterostomi	-	0	0	2333675	0	0	0	2333675	0	0	A09	-	1	-
BUR.ODC.121	Punksi dan sklerosing kista ginjal	-	0	0	1351075	0	0	0	1351075	0	0	A09	-	1	-
BUR.ODC.122	Tindakan pembedahan testis untuk pengambilan spermatozoa (TESA,TESE,PESA,MESA)	-	0	0	2272262.5	0	0	0	2272262.5	0	0	A09	-	1	-
BUR.ODC.13	Ureterolithotomi proksimal	-	0	0	2149437.5	0	0	0	2149437.5	0	0	A09	-	1	-
BUR.ODC.14	Ureterolithotomi distal	-	0	0	2333675	0	0	0	2333675	0	0	A09	-	1	-
BUR.ODC.15	Uretorolisis	-	0	0	2149437.5	0	0	0	2149437.5	0	0	A09	-	1	-
BUR.ODC.16	Ureterostomi	-	0	0	2210850	0	0	0	2210850	0	0	A09	-	1	-
BUR.ODC.17	Ureterouretostomi	-	0	0	2333675	0	0	0	2333675	0	0	A09	-	1	-
BUR.ODC.18	URS, Lithotripsi	-	0	0	2333675	0	0	0	2333675	0	0	A09	-	1	-
BUR.ODC.2	Nefrektomi	-	0	0	2333675	0	0	0	2333675	0	0	A09	-	1	-
BUR.ODC.20	Augmentasi Buli	-	0	0	4667350	0	0	0	4667350	0	0	A09	-	1	-
BUR.ODC.21	Bladder neck Rekonstruksi	-	0	0	3009212.5	0	0	0	3009212.5	0	0	A09	-	1	-
BUR.ODC.22	Divertikulektomi buli	-	0	0	1965200	0	0	0	1965200	0	0	A09	-	1	-
OG.II.75	Reseksi Adenomiosis	-	0	0	2210000	0	0	0	2210000	0	0	A09	-	1	-
BUR.ODC.24	Ekstrofi buli rekonstruksi	-	0	0	4667350	0	0	0	4667350	0	0	A09	-	1	-
BUR.ODC.25	Evakuasi bekuan darah (Clot)	-	0	0	2149437.5	0	0	0	2149437.5	0	0	A09	-	1	-
BUR.ODC.26	Litholapaksi	-	0	0	2210850	0	0	0	2210850	0	0	A09	-	1	-
BUR.ODC.27	Lithotripsi	-	0	0	2210850	0	0	0	2210850	0	0	A09	-	1	-
BUR.ODC.28	Neobladder	-	0	0	4667350	0	0	0	4667350	0	0	A09	-	1	-
BUR.ODC.29	Psoas Hitch, Boari Flap	-	0	0	2333675	0	0	0	2333675	0	0	A09	-	1	-
BUR.ODC.3	Anastomosis end to end ureter	-	0	0	2210850	0	0	0	2210850	0	0	A09	-	1	-
BUR.ODC.30	Repair Fistel Enterovesika	-	0	0	4667350	0	0	0	4667350	0	0	A09	-	1	-
BUR.ODC.31	Repair Fistel Vesikokutan	-	0	0	2333675	0	0	0	2333675	0	0	A09	-	1	-
BUR.ODC.32	Rapair Fistel Vesikorektal	-	0	0	4667350	0	0	0	4667350	0	0	A09	-	1	-
BUR.ODC.33	Repair Fistel Vesikovagina	-	0	0	2333675	0	0	0	2333675	0	0	A09	-	1	-
BUR.ODC.34	Repair Fistel Vesikovagina kompleks	-	0	0	3009212.5	0	0	0	3009212.5	0	0	A09	-	1	-
BUR.ODC.35	Sectio Alta, Vesikolithoyomi	-	0	0	1842375	0	0	0	1842375	0	0	A09	-	1	-
BUR.ODC.36	Sistokopi ODS	-	0	0	1719550	0	0	0	1719550	0	0	A09	-	1	-
BUR.ODC.37	Sistokopi	-	0	0	1351075	0	0	0	1351075	0	0	A09	-	1	-
BUR.ODC.38	Sistostomi perkutan	-	0	0	1351075	0	0	0	1351075	0	0	A09	-	1	-
BUR.ODC.39	Sistostomi terbuka	-	0	0	1780962.5	0	0	0	1780962.5	0	0	A09	-	1	-
BUR.ODC.4	Cabut DJ Stent	-	0	0	1289662.5	0	0	0	1289662.5	0	0	A09	-	1	-
BUR.ODC.40	Sistektomi total,radikal	-	0	0	3561925	0	0	0	3561925	0	0	A09	-	1	-
BUR.ODC.41	Sistektomi parsial, sistoplasti reduksi	-	0	0	2333675	0	0	0	2333675	0	0	A09	-	1	-
BUR.ODC.42	Sistektomi per laparaskopi	-	0	0	3009212.5	0	0	0	3009212.5	0	0	A09	-	1	-
BUR.ODC.43	TUR Tumor Buli	-	0	0	2272262.5	0	0	0	2272262.5	0	0	A09	-	1	-
BUR.ODC.44	Operasi Repair BULI Trauma	-	0	0	1842375	0	0	0	1842375	0	0	A09	-	1	-
BUR.ODC.45	Businasi, Dilatasi Uretra	-	0	0	1289662.5	0	0	0	1289662.5	0	0	A09	-	1	-
BUR.ODC.46	Divertikulum uretra	-	0	0	1473900	0	0	0	1473900	0	0	A09	-	1	-
BUR.ODC.47	Epispadia	-	0	0	4176050	0	0	0	4176050	0	0	A09	-	1	-
BUR.ODC.48	Fistulektomi, Repair Fistel Uretra	-	0	0	1473900	0	0	0	1473900	0	0	A09	-	1	-
BUR.ODC.49	Uretroplastri Hipospadia	-	0	0	1596725	0	0	0	1596725	0	0	A09	-	1	-
BUR.ODC.5	Drainase Periureter	-	0	0	1351075	0	0	0	1351075	0	0	A09	-	1	-
BUR.ODC.50	Hispospadia Subkoronal	-	0	0	2333675	0	0	0	2333675	0	0	A09	-	1	-
BUR.ODC.51	Insisi Posterior Urethral Valve	-	0	0	2088025	0	0	0	2088025	0	0	A09	-	1	-
BUR.ODC.52	Uretrotomi Interna (Sachse)	-	0	0	1719550	0	0	0	1719550	0	0	A09	-	1	-
BUR.ODC.53	Johanson I	-	0	0	1780962.5	0	0	0	1780962.5	0	0	A09	-	1	-
BUR.ODC.54	Johanson II	-	0	0	1965200	0	0	0	1965200	0	0	A09	-	1	-
BUR.ODC.55	Kalibrasi Uretra	-	0	0	1289662.5	0	0	0	1289662.5	0	0	A09	-	1	-
BUR.ODC.56	Meatotomi	-	0	0	1289662.5	0	0	0	1289662.5	0	0	A09	-	1	-
BUR.ODC.57	Meatoplasti	-	0	0	1351075	0	0	0	1351075	0	0	A09	-	1	-
BUR.ODC.6	Ekstraksi Batu	-	0	0	1719550	0	0	0	1719550	0	0	A09	-	1	-
BUR.ODC.60	Railroading Ruptur Uretra	-	0	0	2210850	0	0	0	2210850	0	0	A09	-	1	-
BUR.ODC.61	PER (Primary Endoscopic Realignment)	-	0	0	2149437.5	0	0	0	2149437.5	0	0	A09	-	1	-
BUR.ODC.62	Reseksi-Anastomosis Uretra	-	0	0	2210850	0	0	0	2210850	0	0	A09	-	1	-
BUR.ODC.63	Uretroskopi, Uretrosistoskopi	-	0	0	1289662.5	0	0	0	1289662.5	0	0	A09	-	1	-
BUR.ODC.64	Uretroplasti Bukal Graf	-	0	0	2456500	0	0	0	2456500	0	0	A09	-	1	-
BUR.ODC.65	Uretrotomi Eksterna	-	0	0	1412487.5	0	0	0	1412487.5	0	0	A09	-	1	-
BUR.ODC.66	Biopsi Prostrat	-	0	0	1289662.5	0	0	0	1289662.5	0	0	A09	-	1	-
BUR.ODC.67	Masasae Prostrat	-	0	0	1289662.5	0	0	0	1289662.5	0	0	A09	-	1	-
BUR.ODC.68	Prostatektomi Terbuka	-	0	0	1658137.5	0	0	0	1658137.5	0	0	A09	-	1	-
BUR.ODC.69	Prostatektomi Retropublik	-	0	0	1842375	0	0	0	1842375	0	0	A09	-	1	-
BUR.ODC.7	Insersi DJ Stent	-	0	0	2088025	0	0	0	2088025	0	0	A09	-	1	-
BUR.ODC.70	Prostatektomi radikal	-	0	0	3561925	0	0	0	3561925	0	0	A09	-	1	-
BUR.ODC.71	TUR Prostat, TUIP, BNI	-	0	0	2272262.5	0	0	0	2272262.5	0	0	A09	-	1	-
BUR.ODC.72	TVP, TMP	-	0	0	1719550	0	0	0	1719550	0	0	A09	-	1	-
BUR.ODC.74	Biopsi Penis	-	0	0	1289662.5	0	0	0	1289662.5	0	0	A09	-	1	-
BUR.ODC.75	Biopsi Testis	-	0	0	1289662.5	0	0	0	1289662.5	0	0	A09	-	1	-
BUR.ODC.76	Diseksi Kelenjar Getah Bening	-	0	0	1842375	0	0	0	1842375	0	0	A09	-	1	-
BUR.ODC.77	Sirkumsisi, Dorsumsisi	-	0	0	675537.5	0	0	0	675537.5	0	0	A09	-	1	-
BUR.ODC.78	Eksisi Chordae, Chordektomi	-	0	0	1842375	0	0	0	1842375	0	0	A09	-	1	-
BUR.ODC.79	Eksisi Plaque (Peyronie Disease)	-	0	0	1719550	0	0	0	1719550	0	0	A09	-	1	-
BUR.ODC.8	Reimplantasi ureter unilateral, Ureteroneosistostomi	-	0	0	2210850	0	0	0	2210850	0	0	A09	-	1	-
BUR.ODC.80	Eksplorasi Testis (Microsurgery)	-	0	0	2395087.5	0	0	0	2395087.5	0	0	A09	-	1	-
BUR.ODC.81	Eksisi Fibroma, Rekonstruksi Penis	-	0	0	1842375	0	0	0	1842375	0	0	A09	-	1	-
BUR.ODC.82	Funikokelektomi	-	0	0	1780962.5	0	0	0	1780962.5	0	0	A09	-	1	-
BUR.ODC.83	Hidrokel per skrotal	-	0	0	1780962.5	0	0	0	1780962.5	0	0	A09	-	1	-
BUR.ODC.84	Hidrokel per ingunial, Ligasi tinggi	-	0	0	2210850	0	0	0	2210850	0	0	A09	-	1	-
BUR.ODC.85	Insisi Abses Perineum	-	0	0	1289662.5	0	0	0	1289662.5	0	0	A09	-	1	-
BUR.ODC.86	Operasi Priapismus (Prosedur Winter)	-	0	0	2026612.5	0	0	0	2026612.5	0	0	A09	-	1	-
BUR.ODC.87	Koreksi Priapismus	-	0	0	1842375	0	0	0	1842375	0	0	A09	-	1	-
BUR.ODC.88	Ligasi v. Spermatika Interna (Microsurgery)	-	0	0	1780962.5	0	0	0	1780962.5	0	0	A09	-	1	-
BUR.ODC.89	Limfadenektomi ilioinguinal	-	0	0	1842375	0	0	0	1842375	0	0	A09	-	1	-
BUR.ODC.9	Reimplantasi ureter bilateral	-	0	0	2456500	0	0	0	2456500	0	0	A09	-	1	-
BUR.ODC.90	Orkhidektomi	-	0	0	1719550	0	0	0	1719550	0	0	A09	-	1	-
BUR.ODC.91	Orkhidektomi Extended	-	0	0	1719550	0	0	0	1719550	0	0	A09	-	1	-
BUR.ODC.92	Orkhidektomi Ligasi Tinggi	-	0	0	1780962.5	0	0	0	1780962.5	0	0	A09	-	1	-
BUR.ODC.93	Orkhidektomi Subkapsuler	-	0	0	1719550	0	0	0	1719550	0	0	A09	-	1	-
BUR.ODC.94	Orkhidopeksi (Torsio Testis)	-	0	0	1965200	0	0	0	1965200	0	0	A09	-	1	-
BUR.ODC.95	Orkhidopeksi (UDT)	-	0	0	2210850	0	0	0	2210850	0	0	A09	-	1	-
BUR.ODC.96	Orkhidopeksi per laparaskopi	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
BUR.ODC.97	Penektomi Parsial	-	0	0	1780962.5	0	0	0	1780962.5	0	0	A09	-	1	-
BUR.ODC.98	Penektomi total, amputasi penis	-	0	0	1842375	0	0	0	1842375	0	0	A09	-	1	-
BUR.ODC.99	Reparasi penis	-	0	0	1842375	0	0	0	1842375	0	0	A09	-	1	-
BUR.VIP.1	Biopsi Ginjal Terbuka	-	0	0	4140000	0	0	0	4140000	0	0	A09	-	1	-
BUR.VIP.10	RPG, URS diagnostik	-	0	0	4025000	0	0	0	4025000	0	0	A09	-	1	-
BUR.VIP.100	Skrotoplasti	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
BUR.VIP.101	Spermatokelektomi	-	0	0	3335000	0	0	0	3335000	0	0	A09	-	1	-
BUR.VIP.102	Varikokelektomi (Palomo)	-	0	0	2530000	0	0	0	2530000	0	0	A09	-	1	-
BUR.VIP.103	Vasektomi (anastesi lokal)	-	0	0	2530000	0	0	0	2530000	0	0	A09	-	1	-
BUR.VIP.104	Vasektomi (narkose)	-	0	0	3220000	0	0	0	3220000	0	0	A09	-	1	-
BUR.VIP.105	Vasoepididimostomi	-	0	0	4715000	0	0	0	4715000	0	0	A09	-	1	-
BUR.VIP.106	Vasografi	-	0	0	2415000	0	0	0	2415000	0	0	A09	-	1	-
BUR.VIP.107	Eksisi Webbed Penis	-	0	0	3910000	0	0	0	3910000	0	0	A09	-	1	-
BUR.VIP.108	Burried Penis	-	0	0	3335000	0	0	0	3335000	0	0	A09	-	1	-
BUR.VIP.109	Diseksi Kelenjar Getah Bening Pelvis	-	0	0	4025000	0	0	0	4025000	0	0	A09	-	1	-
BUR.VIP.11	Tailoring Ureter	-	0	0	4370000	0	0	0	4370000	0	0	A09	-	1	-
BUR.VIP.110	Diseksi Kelenjar Getah Bening per laparaskopi	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
BUR.VIP.111	ESWL	-	0	0	2760000	0	0	0	2760000	0	0	A09	-	1	-
BUR.VIP.112	Holmium YaG laser	-	0	0	4485000	0	0	0	4485000	0	0	A09	-	1	-
BUR.VIP.113	Kauterisasi	-	0	0	2300000	0	0	0	2300000	0	0	A09	-	1	-
BUR.VIP.114	Laparotomi Eksplorasi	-	0	0	4140000	0	0	0	4140000	0	0	A09	VIP	1	-
BUR.VIP.115	Limfadenektomi Retroperitoneal, RPLND	-	0	0	4140000	0	0	0	4140000	0	0	A09	-	1	-
BUR.VIP.116	MMK, sling uretra	-	0	0	3335000	0	0	0	3335000	0	0	A09	-	1	-
BUR.VIP.117	Operasi Sistokel	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
BUR.VIP.118	Operasi Urakhus, Reseksi Urakhus	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
BUR.VIP.12	Transuretero-uterostomi	-	0	0	4370000	0	0	0	4370000	0	0	A09	-	1	-
BUR.VIP.121	Punksi dan sklerosing kista ginjal	-	0	0	2530000	0	0	0	2530000	0	0	A09	-	1	-
BUR.VIP.122	Tindakan pembedahan testis untuk pengambilan spermatozoa (TESA,TESE,PESA,MESA)	-	0	0	4255000	0	0	0	4255000	0	0	A09	-	1	-
BUR.VIP.13	Ureterolithotomi proksimal	-	0	0	4025000	0	0	0	4025000	0	0	A09	-	1	-
BUR.VIP.14	Ureterolithotomi distal	-	0	0	4370000	0	0	0	4370000	0	0	A09	-	1	-
BUR.VIP.15	Uretorolisis	-	0	0	4025000	0	0	0	4025000	0	0	A09	-	1	-
BUR.VIP.16	Ureterostomi	-	0	0	4140000	0	0	0	4140000	0	0	A09	-	1	-
BUR.VIP.17	Ureterouretostomi	-	0	0	4370000	0	0	0	4370000	0	0	A09	-	1	-
BUR.VIP.18	URS, Lithotripsi	-	0	0	4370000	0	0	0	4370000	0	0	A09	-	1	-
BUR.VIP.2	Nefrektomi	-	0	0	4370000	0	0	0	4370000	0	0	A09	-	1	-
BUR.VIP.20	Augmentasi Buli	-	0	0	8740000	0	0	0	8740000	0	0	A09	-	1	-
BUR.VIP.21	Bladder neck Rekonstruksi	-	0	0	5635000	0	0	0	5635000	0	0	A09	-	1	-
BUR.VIP.22	Divertikulektomi buli	-	0	0	3680000	0	0	0	3680000	0	0	A09	-	1	-
BUR.VIP.24	Ekstrofi buli rekonstruksi	-	0	0	8740000	0	0	0	8740000	0	0	A09	-	1	-
BUR.VIP.25	Evakuasi bekuan darah (Clot)	-	0	0	4025000	0	0	0	4025000	0	0	A09	-	1	-
BUR.VIP.26	Litholapaksi	-	0	0	4140000	0	0	0	4140000	0	0	A09	-	1	-
BUR.VIP.27	Lithotripsi	-	0	0	4140000	0	0	0	4140000	0	0	A09	-	1	-
BUR.VIP.28	Neobladder	-	0	0	8740000	0	0	0	8740000	0	0	A09	-	1	-
BUR.VIP.29	Psoas Hitch, Boari Flap	-	0	0	4370000	0	0	0	4370000	0	0	A09	-	1	-
BUR.VIP.3	Anastomosis end to end ureter	-	0	0	4140000	0	0	0	4140000	0	0	A09	-	1	-
BUR.VIP.30	Repair Fistel Enterovesika	-	0	0	8740000	0	0	0	8740000	0	0	A09	-	1	-
BUR.VIP.31	Repair Fistel Vesikokutan	-	0	0	4370000	0	0	0	4370000	0	0	A09	-	1	-
BUR.VIP.32	Rapair Fistel Vesikorektal	-	0	0	8740000	0	0	0	8740000	0	0	A09	-	1	-
BUR.VIP.33	Repair Fistel Vesikovagina	-	0	0	4370000	0	0	0	4370000	0	0	A09	-	1	-
BUR.VIP.34	Repair Fistel Vesikovagina kompleks	-	0	0	5635000	0	0	0	5635000	0	0	A09	-	1	-
BUR.VIP.35	Sectio Alta, Vesikolithoyomi	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
BUR.VIP.36	Sistokopi ODS	-	0	0	3220000	0	0	0	3220000	0	0	A09	-	1	-
BUR.VIP.37	Sistokopi	-	0	0	2530000	0	0	0	2530000	0	0	A09	-	1	-
BUR.VIP.38	Sistostomi perkutan	-	0	0	2530000	0	0	0	2530000	0	0	A09	-	1	-
BUR.VIP.39	Sistostomi terbuka	-	0	0	3335000	0	0	0	3335000	0	0	A09	-	1	-
BUR.VIP.4	Cabut DJ Stent	-	0	0	2415000	0	0	0	2415000	0	0	A09	-	1	-
BUR.VIP.40	Sistektomi total,radikal	-	0	0	6670000	0	0	0	6670000	0	0	A09	-	1	-
BUR.VIP.41	Sistektomi parsial, sistoplasti reduksi	-	0	0	4370000	0	0	0	4370000	0	0	A09	-	1	-
BUR.VIP.42	Sistektomi per laparaskopi	-	0	0	5635000	0	0	0	5635000	0	0	A09	-	1	-
BUR.VIP.43	TUR Tumor Buli	-	0	0	4255000	0	0	0	4255000	0	0	A09	-	1	-
BUR.VIP.44	Operasi Repair BULI Trauma	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
BUR.VIP.45	Businasi, Dilatasi Uretra	-	0	0	2415000	0	0	0	2415000	0	0	A09	-	1	-
BUR.VIP.46	Divertikulum uretra	-	0	0	2760000	0	0	0	2760000	0	0	A09	-	1	-
BUR.VIP.47	Epispadia	-	0	0	7820000	0	0	0	7820000	0	0	A09	-	1	-
BUR.VIP.48	Fistulektomi, Repair Fistel Uretra	-	0	0	2760000	0	0	0	2760000	0	0	A09	-	1	-
BUR.VIP.49	Uretroplastri Hipospadia	-	0	0	2990000	0	0	0	2990000	0	0	A09	-	1	-
BUR.VIP.5	Drainase Periureter	-	0	0	2530000	0	0	0	2530000	0	0	A09	-	1	-
OG.III.5	Kolposkopi	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
BUR.VIP.50	Hispospadia Subkoronal	-	0	0	4370000	0	0	0	4370000	0	0	A09	-	1	-
BUR.VIP.51	Insisi Posterior Urethral Valve	-	0	0	3910000	0	0	0	3910000	0	0	A09	-	1	-
BUR.VIP.52	Uretrotomi Interna (Sachse)	-	0	0	3220000	0	0	0	3220000	0	0	A09	-	1	-
BUR.VIP.53	Johanson I	-	0	0	3335000	0	0	0	3335000	0	0	A09	-	1	-
BUR.VIP.54	Johanson II	-	0	0	3680000	0	0	0	3680000	0	0	A09	-	1	-
BUR.VIP.55	Kalibrasi Uretra	-	0	0	2415000	0	0	0	2415000	0	0	A09	-	1	-
BUR.VIP.56	Meatotomi	-	0	0	2415000	0	0	0	2415000	0	0	A09	-	1	-
BUR.VIP.57	Meatoplasti	-	0	0	2530000	0	0	0	2530000	0	0	A09	-	1	-
BUR.VIP.58	Pasang Kateter	KVIP	16500	0	0	27500	0	0	16500	44000	44000	A09	VIP	1	-
BUR.VIP.6	Ekstraksi Batu	-	0	0	3220000	0	0	0	3220000	0	0	A09	-	1	-
BUR.VIP.60	Railroading Ruptur Uretra	-	0	0	4140000	0	0	0	4140000	0	0	A09	-	1	-
BUR.VIP.61	PER (Primary Endoscopic Realignment)	-	0	0	4025000	0	0	0	4025000	0	0	A09	-	1	-
BUR.VIP.62	Reseksi-Anastomosis Uretra	-	0	0	4140000	0	0	0	4140000	0	0	A09	-	1	-
BUR.VIP.63	Uretroskopi, Uretrosistoskopi	-	0	0	2415000	0	0	0	2415000	0	0	A09	-	1	-
BUR.VIP.64	Uretroplasti Bukal Graf	-	0	0	4600000	0	0	0	4600000	0	0	A09	-	1	-
BUR.VIP.65	Uretrotomi Eksterna	-	0	0	2645000	0	0	0	2645000	0	0	A09	-	1	-
BUR.VIP.66	Biopsi Prostrat	-	0	0	2415000	0	0	0	2415000	0	0	A09	-	1	-
BUR.VIP.67	Masasae Prostrat	-	0	0	2415000	0	0	0	2415000	0	0	A09	-	1	-
BUR.VIP.68	Prostatektomi Terbuka	-	0	0	3105000	0	0	0	3105000	0	0	A09	-	1	-
BUR.VIP.69	Prostatektomi Retropublik	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
BUR.VIP.7	Insersi DJ Stent	-	0	0	3910000	0	0	0	3910000	0	0	A09	-	1	-
BUR.VIP.70	Prostatektomi radikal	-	0	0	6670000	0	0	0	6670000	0	0	A09	-	1	-
BUR.VIP.71	TUR Prostat, TUIP, BNI	-	0	0	4255000	0	0	0	4255000	0	0	A09	-	1	-
BUR.VIP.72	TVP, TMP	-	0	0	3220000	0	0	0	3220000	0	0	A09	-	1	-
BUR.VIP.74	Biopsi Penis	-	0	0	2415000	0	0	0	2415000	0	0	A09	-	1	-
BUR.VIP.75	Biopsi Testis	-	0	0	2415000	0	0	0	2415000	0	0	A09	-	1	-
BUR.VIP.76	Diseksi Kelenjar Getah Bening	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
BUR.VIP.77	Sirkumsisi, Dorsumsisi	-	0	0	1265000	0	0	0	1265000	0	0	A09	-	1	-
BUR.VIP.78	Eksisi Chordae, Chordektomi	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
BUR.VIP.79	Eksisi Plaque (Peyronie Disease)	-	0	0	3220000	0	0	0	3220000	0	0	A09	-	1	-
BUR.VIP.8	Reimplantasi ureter unilateral, Ureteroneosistostomi	-	0	0	4140000	0	0	0	4140000	0	0	A09	-	1	-
BUR.VIP.80	Eksplorasi Testis (Microsurgery)	-	0	0	4485000	0	0	0	4485000	0	0	A09	-	1	-
BUR.VIP.81	Eksisi Fibroma, Rekonstruksi Penis	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
BUR.VIP.82	Funikokelektomi	-	0	0	3335000	0	0	0	3335000	0	0	A09	-	1	-
BUR.VIP.83	Hidrokel per skrotal	-	0	0	3335000	0	0	0	3335000	0	0	A09	-	1	-
BUR.VIP.84	Hidrokel per ingunial, Ligasi tinggi	-	0	0	4140000	0	0	0	4140000	0	0	A09	-	1	-
BUR.VIP.85	Insisi Abses Perineum	-	0	0	2415000	0	0	0	2415000	0	0	A09	-	1	-
BUR.VIP.86	Operasi Priapismus (Prosedur Winter)	-	0	0	3795000	0	0	0	3795000	0	0	A09	-	1	-
BUR.VIP.87	Koreksi Priapismus	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
BUR.VIP.88	Ligasi v. Spermatika Interna (Microsurgery)	-	0	0	3335000	0	0	0	3335000	0	0	A09	-	1	-
BUR.VIP.89	Limfadenektomi ilioinguinal	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
BUR.VIP.9	Reimplantasi ureter bilateral	-	0	0	4600000	0	0	0	4600000	0	0	A09	-	1	-
BUR.VIP.90	Orkhidektomi	-	0	0	3220000	0	0	0	3220000	0	0	A09	-	1	-
BUR.VIP.91	Orkhidektomi Extended	-	0	0	3220000	0	0	0	3220000	0	0	A09	-	1	-
BUR.VIP.92	Orkhidektomi Ligasi Tinggi	-	0	0	3335000	0	0	0	3335000	0	0	A09	-	1	-
BUR.VIP.93	Orkhidektomi Subkapsuler	-	0	0	3220000	0	0	0	3220000	0	0	A09	-	1	-
BUR.VIP.94	Orkhidopeksi (Torsio Testis)	-	0	0	3680000	0	0	0	3680000	0	0	A09	-	1	-
BUR.VIP.95	Orkhidopeksi (UDT)	-	0	0	4140000	0	0	0	4140000	0	0	A09	-	1	-
BUR.VIP.96	Orkhidopeksi per laparaskopi	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
BUR.VIP.97	Penektomi Parsial	-	0	0	3335000	0	0	0	3335000	0	0	A09	-	1	-
BUR.VIP.98	Penektomi total, amputasi penis	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
BUR.VIP.99	Reparasi penis	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
BUR.VVIP.1	Biopsi Ginjal Terbuka	-	0	0	4761000	0	0	0	4761000	0	0	A09	-	1	-
BUR.VVIP.10	RPG, URS diagnostik	-	0	0	4628750	0	0	0	4628750	0	0	A09	-	1	-
BUR.VVIP.100	Skrotoplasti	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
BUR.VVIP.101	Spermatokelektomi	-	0	0	3835250	0	0	0	3835250	0	0	A09	-	1	-
BUR.VVIP.102	Varikokelektomi (Palomo)	-	0	0	2909500	0	0	0	2909500	0	0	A09	-	1	-
BUR.VVIP.103	Vasektomi (anastesi lokal)	-	0	0	2909500	0	0	0	2909500	0	0	A09	-	1	-
BUR.VVIP.104	Vasektomi (narkose)	-	0	0	3703000	0	0	0	3703000	0	0	A09	-	1	-
BUR.VVIP.105	Vasoepididimostomi	-	0	0	5422250	0	0	0	5422250	0	0	A09	-	1	-
BUR.VVIP.106	Vasografi	-	0	0	2777250	0	0	0	2777250	0	0	A09	-	1	-
BUR.VVIP.107	Eksisi Webbed Penis	-	0	0	4496500	0	0	0	4496500	0	0	A09	-	1	-
BUR.VVIP.108	Burried Penis	-	0	0	3835250	0	0	0	3835250	0	0	A09	-	1	-
BUR.VVIP.109	Diseksi Kelenjar Getah Bening Pelvis	-	0	0	4628750	0	0	0	4628750	0	0	A09	-	1	-
BUR.VVIP.11	Tailoring Ureter	-	0	0	5025500	0	0	0	5025500	0	0	A09	-	1	-
BUR.VVIP.110	Diseksi Kelenjar Getah Bening per laparaskopi	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
BUR.VVIP.111	ESWL	-	0	0	3174000	0	0	0	3174000	0	0	A09	-	1	-
BUR.VVIP.112	Holmium YaG laser	-	0	0	5157750	0	0	0	5157750	0	0	A09	-	1	-
BUR.VVIP.113	Kauterisasi	-	0	0	2645000	0	0	0	2645000	0	0	A09	-	1	-
BUR.VVIP.114	Laparotomi Eksplorasi	-	0	0	4761000	0	0	0	4761000	0	0	A09	VVIP	1	-
BUR.VVIP.115	Limfadenektomi Retroperitoneal, RPLND	-	0	0	4761000	0	0	0	4761000	0	0	A09	-	1	-
BUR.VVIP.116	MMK, sling uretra	-	0	0	3835250	0	0	0	3835250	0	0	A09	-	1	-
BUR.VVIP.117	Operasi Sistokel	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
BUR.VVIP.118	Operasi Urakhus, Reseksi Urakhus	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
BUR.VVIP.12	Transuretero-uterostomi	-	0	0	5025500	0	0	0	5025500	0	0	A09	-	1	-
BUR.VVIP.121	Punksi dan sklerosing kista ginjal	-	0	0	2909500	0	0	0	2909500	0	0	A09	-	1	-
BUR.VVIP.122	Tindakan pembedahan testis untuk pengambilan spermatozoa (TESA,TESE,PESA,MESA)	-	0	0	4893250	0	0	0	4893250	0	0	A09	-	1	-
BUR.VVIP.13	Ureterolithotomi proksimal	-	0	0	4628750	0	0	0	4628750	0	0	A09	-	1	-
BUR.VVIP.14	Ureterolithotomi distal	-	0	0	5025500	0	0	0	5025500	0	0	A09	-	1	-
BUR.VVIP.15	Uretorolisis	-	0	0	4628750	0	0	0	4628750	0	0	A09	-	1	-
BUR.VVIP.16	Ureterostomi	-	0	0	4761000	0	0	0	4761000	0	0	A09	-	1	-
BUR.VVIP.17	Ureterouretostomi	-	0	0	5025500	0	0	0	5025500	0	0	A09	-	1	-
BUR.VVIP.18	URS, Lithotripsi	-	0	0	5025500	0	0	0	5025500	0	0	A09	-	1	-
BUR.VVIP.2	Nefrektomi	-	0	0	5025500	0	0	0	5025500	0	0	A09	-	1	-
BUR.VVIP.20	Augmentasi Buli	-	0	0	10051000	0	0	0	10051000	0	0	A09	-	1	-
BUR.VVIP.21	Bladder neck Rekonstruksi	-	0	0	6480250	0	0	0	6480250	0	0	A09	-	1	-
BUR.VVIP.22	Divertikulektomi buli	-	0	0	4232000	0	0	0	4232000	0	0	A09	-	1	-
BUR.VVIP.24	Ekstrofi buli rekonstruksi	-	0	0	10051000	0	0	0	10051000	0	0	A09	-	1	-
BUR.VVIP.25	Evakuasi bekuan darah (Clot)	-	0	0	4628750	0	0	0	4628750	0	0	A09	-	1	-
BUR.VVIP.26	Litholapaksi	-	0	0	4761000	0	0	0	4761000	0	0	A09	-	1	-
BUR.VVIP.27	Lithotripsi	-	0	0	4761000	0	0	0	4761000	0	0	A09	-	1	-
BUR.VVIP.28	Neobladder	-	0	0	10051000	0	0	0	10051000	0	0	A09	-	1	-
BUR.VVIP.29	Psoas Hitch, Boari Flap	-	0	0	5025500	0	0	0	5025500	0	0	A09	-	1	-
BUR.VVIP.3	Anastomosis end to end ureter	-	0	0	4761000	0	0	0	4761000	0	0	A09	-	1	-
BUR.VVIP.30	Repair Fistel Enterovesika	-	0	0	10051000	0	0	0	10051000	0	0	A09	-	1	-
BUR.VVIP.31	Repair Fistel Vesikokutan	-	0	0	5025500	0	0	0	5025500	0	0	A09	-	1	-
BUR.VVIP.32	Rapair Fistel Vesikorektal	-	0	0	10051000	0	0	0	10051000	0	0	A09	-	1	-
BUR.VVIP.33	Repair Fistel Vesikovagina	-	0	0	5025500	0	0	0	5025500	0	0	A09	-	1	-
BUR.VVIP.34	Repair Fistel Vesikovagina kompleks	-	0	0	6480250	0	0	0	6480250	0	0	A09	-	1	-
BUR.VVIP.35	Sectio Alta, Vesikolithoyomi	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
BUR.VVIP.36	Sistokopi ODS	-	0	0	3703000	0	0	0	3703000	0	0	A09	-	1	-
BUR.VVIP.37	Sistokopi	-	0	0	2909500	0	0	0	2909500	0	0	A09	-	1	-
BUR.VVIP.38	Sistostomi perkutan	-	0	0	2909500	0	0	0	2909500	0	0	A09	-	1	-
BUR.VVIP.39	Sistostomi terbuka	-	0	0	3835250	0	0	0	3835250	0	0	A09	-	1	-
BUR.VVIP.4	Cabut DJ Stent	-	0	0	2777250	0	0	0	2777250	0	0	A09	-	1	-
BUR.VVIP.40	Sistektomi total,radikal	-	0	0	7670500	0	0	0	7670500	0	0	A09	-	1	-
BUR.VVIP.41	Sistektomi parsial, sistoplasti reduksi	-	0	0	5025500	0	0	0	5025500	0	0	A09	-	1	-
BUR.VVIP.42	Sistektomi per laparaskopi	-	0	0	6480250	0	0	0	6480250	0	0	A09	-	1	-
BUR.VVIP.43	TUR Tumor Buli	-	0	0	4893250	0	0	0	4893250	0	0	A09	-	1	-
BUR.VVIP.44	Operasi Repair BULI Trauma	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
BUR.VVIP.45	Businasi, Dilatasi Uretra	-	0	0	2777250	0	0	0	2777250	0	0	A09	-	1	-
BUR.VVIP.46	Divertikulum uretra	-	0	0	3174000	0	0	0	3174000	0	0	A09	-	1	-
BUR.VVIP.47	Epispadia	-	0	0	8993000	0	0	0	8993000	0	0	A09	-	1	-
BUR.VVIP.48	Fistulektomi, Repair Fistel Uretra	-	0	0	3174000	0	0	0	3174000	0	0	A09	-	1	-
BUR.VVIP.49	Uretroplastri Hipospadia	-	0	0	3438500	0	0	0	3438500	0	0	A09	-	1	-
BUR.VVIP.5	Drainase Periureter	-	0	0	2909500	0	0	0	2909500	0	0	A09	-	1	-
BUR.VVIP.50	Hispospadia Subkoronal	-	0	0	5025500	0	0	0	5025500	0	0	A09	-	1	-
BUR.VVIP.51	Insisi Posterior Urethral Valve	-	0	0	4496500	0	0	0	4496500	0	0	A09	-	1	-
BUR.VVIP.52	Uretrotomi Interna (Sachse)	-	0	0	3703000	0	0	0	3703000	0	0	A09	-	1	-
BUR.VVIP.53	Johanson I	-	0	0	3835250	0	0	0	3835250	0	0	A09	-	1	-
BUR.VVIP.54	Johanson II	-	0	0	4232000	0	0	0	4232000	0	0	A09	-	1	-
BUR.VVIP.55	Kalibrasi Uretra	-	0	0	2777250	0	0	0	2777250	0	0	A09	-	1	-
BUR.VVIP.56	Meatotomi	-	0	0	2777250	0	0	0	2777250	0	0	A09	-	1	-
BUR.VVIP.57	Meatoplasti	-	0	0	2909500	0	0	0	2909500	0	0	A09	-	1	-
BUR.VVIP.58	Pasang Kateter	KVVIP	16500	0	0	27500	0	0	16500	44000	44000	A09	VVIP	1	-
BUR.VVIP.6	Ekstraksi Batu	-	0	0	3703000	0	0	0	3703000	0	0	A09	-	1	-
BUR.VVIP.60	Railroading Ruptur Uretra	-	0	0	4761000	0	0	0	4761000	0	0	A09	-	1	-
BUR.VVIP.61	PER (Primary Endoscopic Realignment)	-	0	0	4628750	0	0	0	4628750	0	0	A09	-	1	-
BUR.VVIP.62	Reseksi-Anastomosis Uretra	-	0	0	4761000	0	0	0	4761000	0	0	A09	-	1	-
BUR.VVIP.63	Uretroskopi, Uretrosistoskopi	-	0	0	2777250	0	0	0	2777250	0	0	A09	-	1	-
BUR.VVIP.64	Uretroplasti Bukal Graf	-	0	0	5290000	0	0	0	5290000	0	0	A09	-	1	-
BUR.VVIP.65	Uretrotomi Eksterna	-	0	0	3041750	0	0	0	3041750	0	0	A09	-	1	-
BUR.VVIP.66	Biopsi Prostrat	-	0	0	2777250	0	0	0	2777250	0	0	A09	-	1	-
BUR.VVIP.67	Masasae Prostrat	-	0	0	2777250	0	0	0	2777250	0	0	A09	-	1	-
BUR.VVIP.68	Prostatektomi Terbuka	-	0	0	3570750	0	0	0	3570750	0	0	A09	-	1	-
BUR.VVIP.69	Prostatektomi Retropublik	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
BUR.VVIP.7	Insersi DJ Stent	-	0	0	4496500	0	0	0	4496500	0	0	A09	-	1	-
BUR.VVIP.70	Prostatektomi radikal	-	0	0	7670500	0	0	0	7670500	0	0	A09	-	1	-
BUR.VVIP.71	TUR Prostat, TUIP, BNI	-	0	0	4893250	0	0	0	4893250	0	0	A09	-	1	-
BUR.VVIP.72	TVP, TMP	-	0	0	3703000	0	0	0	3703000	0	0	A09	-	1	-
BUR.VVIP.74	Biopsi Penis	-	0	0	2777250	0	0	0	2777250	0	0	A09	-	1	-
BUR.VVIP.75	Biopsi Testis	-	0	0	2777250	0	0	0	2777250	0	0	A09	-	1	-
BUR.VVIP.76	Diseksi Kelenjar Getah Bening	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
BUR.VVIP.77	Sirkumsisi, Dorsumsisi	-	0	0	1454750	0	0	0	1454750	0	0	A09	-	1	-
BUR.VVIP.78	Eksisi Chordae, Chordektomi	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
BUR.VVIP.79	Eksisi Plaque (Peyronie Disease)	-	0	0	3703000	0	0	0	3703000	0	0	A09	-	1	-
BUR.VVIP.8	Reimplantasi ureter unilateral, Ureteroneosistostomi	-	0	0	4761000	0	0	0	4761000	0	0	A09	-	1	-
BUR.VVIP.80	Eksplorasi Testis (Microsurgery)	-	0	0	5157750	0	0	0	5157750	0	0	A09	-	1	-
BUR.VVIP.81	Eksisi Fibroma, Rekonstruksi Penis	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
BUR.VVIP.82	Funikokelektomi	-	0	0	3835250	0	0	0	3835250	0	0	A09	-	1	-
BUR.VVIP.83	Hidrokel per skrotal	-	0	0	3835250	0	0	0	3835250	0	0	A09	-	1	-
BUR.VVIP.84	Hidrokel per ingunial, Ligasi tinggi	-	0	0	4761000	0	0	0	4761000	0	0	A09	-	1	-
BUR.VVIP.85	Insisi Abses Perineum	-	0	0	2777250	0	0	0	2777250	0	0	A09	-	1	-
BUR.VVIP.86	Operasi Priapismus (Prosedur Winter)	-	0	0	4364250	0	0	0	4364250	0	0	A09	-	1	-
BUR.VVIP.87	Koreksi Priapismus	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
BUR.VVIP.88	Ligasi v. Spermatika Interna (Microsurgery)	-	0	0	3835250	0	0	0	3835250	0	0	A09	-	1	-
BUR.VVIP.89	Limfadenektomi ilioinguinal	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
BUR.VVIP.9	Reimplantasi ureter bilateral	-	0	0	5290000	0	0	0	5290000	0	0	A09	-	1	-
BUR.VVIP.90	Orkhidektomi	-	0	0	3703000	0	0	0	3703000	0	0	A09	-	1	-
BUR.VVIP.91	Orkhidektomi Extended	-	0	0	3703000	0	0	0	3703000	0	0	A09	-	1	-
BUR.VVIP.92	Orkhidektomi Ligasi Tinggi	-	0	0	3835250	0	0	0	3835250	0	0	A09	-	1	-
BUR.VVIP.93	Orkhidektomi Subkapsuler	-	0	0	3703000	0	0	0	3703000	0	0	A09	-	1	-
BUR.VVIP.94	Orkhidopeksi (Torsio Testis)	-	0	0	4232000	0	0	0	4232000	0	0	A09	-	1	-
BUR.VVIP.95	Orkhidopeksi (UDT)	-	0	0	4761000	0	0	0	4761000	0	0	A09	-	1	-
BUR.VVIP.96	Orkhidopeksi per laparaskopi	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
BUR.VVIP.97	Penektomi Parsial	-	0	0	3835250	0	0	0	3835250	0	0	A09	-	1	-
BUR.VVIP.98	Penektomi total, amputasi penis	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
BUR.VVIP.99	Reparasi penis	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
CTG.VIP	CTG	KVIP	250000	0	100000	0	0	0	350000	250000	350000	A09	VIP	1	-
DR.001	Baca Slide	K1	0	0	50000	0	0	0	50000	0	50000	A09	K1	1	-
DR.002	Baca Slide 	K2	0	0	50000	0	0	0	50000	0	50000	A09	K2	1	-
DR.003	Baca Slide	K3	0	0	50000	0	0	0	50000	0	50000	A09	K3	1	-
DR.004	Baca Slide	KVIP	0	0	75000	0	0	0	75000	0	75000	A09	VIP	1	-
DR.005	Baca Slide	KVVIP	0	0	100000	0	0	0	100000	0	100000	A09	VIP	1	-
Gz.VIP01	Asuhan Gizi	KVIP	45000	0	0	0	0	0	45000	45000	45000	A09	VIP	1	-
Gz.VIP02	Asuhan Gizi	KVVIP	49500	0	0	0	0	0	49500	49500	49500	A09	VVIP	1	-
Gz.VIP03	Asuhan Gizi	K3	27500	0	0	0	0	0	27500	27500	27500	A09	K3	1	-
Gz.VIP04	Asuhan Gizi	K2	33000	0	0	0	0	0	33000	33000	33000	A09	K2	1	-
ICU.001	FISIOTERAPHY	-	0	0	0	65000	0	0	0	65000	65000	A09	ICU	1	-
ICU.002	Lepas Kateter	-	10000	0	0	15000	0	0	0	25000	25000	A09	ICU	1	-
ICU.003	Nebulizer 4-7 kali	-	45000	0	0	45000	0	0	45000	90000	90000	A09	ICU	1	-
ICU.I.123	Visite dr. Spesialis 	-	0	0	200000	0	0	0	200000	0	200000	A09	ICU	1	-
INF.I.II.001	Pasang Infus Dewasa 4-7	K1	30000	0	0	35000	0	0	30000	65000	65000	A09	K1	1	-
INF.I.II.002	Pasang Infus Dewasa 4-7	K3	27000	0	0	31500	0	0	27000	58500	58500	A09	K3	1	-
INF.I.II.003	Pasang Infus Dewasa 4-7	K2	30000	0	0	35000	0	0	30000	65000	65000	A09	K2	1	-
INF.I.II.004	Pasang Infus Dewasa 4-7	KVIP	33000	0	0	38500	0	0	33000	71500	71500	A09	VIP	1	-
INF.I.II.005	Pasang Infus Dewasa 4-7	KVVIP	33000	0	0	38500	0	0	33000	71500	71500	A09	VVIP	1	-
J.Anast.01	Jasa Dokter Anastesi SC ( Cito )_	K3	0	0	750000	0	0	0	750000	0	750000	A09	K3	1	-
J.Anast.02	Jasa Dokter Anastesi SC ( Cito )_	K2	0	0	843750	0	0	0	843750	0	843750	A09	K2	1	-
J.Anast.03	Jasa Dokter Anastesi SC ( Cito )_	K1	0	0	937500	0	0	0	937500	0	937500	A09	K1	1	-
J.Anast.04	Jasa Dokter Anastesi SC ( Cito )_	KVVIP	0	0	1312500	0	0	0	1312500	0	1312500	A09	VVIP	1	-
J.Anast.05	Jasa Dokter Anastesi SC ( Cito )_	KVIP	0	0	1125000	0	0	0	1125000	0	1125000	A09	VIP	1	-
J000572	Observasi 2 jam	KP022	20000	0	30000	0	0	0	50000	0	0	-	-	1	-
J000573	Pasang Infus Dewasa 2-3	RI1	27000	0	0	27000	0	0	27000	54000	54000	A09	K3	1	-
J000574	Pasang Infus Dewasa 2-3	RI2	33000	0	0	33000	0	0	33000	66000	66000	A09	VIP	1	-
J000575	DokterJaga/ UGD 	KP022	30000	0	30000	0	0	0	60000	30000	60000	A09	VIP	1	-
J000576	Jasa perawatan Bayi	K.BY	120000	0	0	0	0	0	120000	120000	120000	A09	NICU	1	-
J000577	Pasang Infus Anak	KVIP	0	0	0	25000	0	0	0	25000	25000	A09	VIP	1	-
J000578	Visite Dokter Spesialis	KVIP	120000	0	180000	0	0	0	300000	0	0	A09	VIP	1	-
J000579	Breast Care	K2	25000	0	0	25000	0	0	0	50000	50000	A09	K2	1	-
J000580	Breast Care	K3	22500	0	0	22500	0	0	0	45000	45000	A09	K3	1	-
J000581	Breast Care	KVIP	27500	0	0	27500	0	0	0	55000	55000	A09	VIP	1	-
J000582	Visite Dokter Spesialis	-	0	0	200000	0	0	0	200000	0	200000	A09	ICU	1	-
J000587	Pasang Infus Pump (Syring Pump) perhari	-	125000	0	0	35000	0	0	125000	160000	160000	A09	K2	1	-
J000588	Pasang Infus Pump (Syring Pump) perhari	-	137500	0	0	38500	0	0	137500	176000	176000	A09	VIP	1	-
J000589	Resusitasi Bayi Lahir Spontan/VE Dgn Dokter	K1	0	0	525000	0	0	0	525000	0	525000	A09	K1	1	-
J000590	Resusitasi Bayi Lahir Spontan/VE Dgn Dokter	K2	0	0	450000	0	0	0	450000	0	450000	A09	K2	1	-
J000591	Resusitasi Bayi Lahir Spontan/VE Dgn Dokter	K3	0	0	375000	0	0	0	375000	0	375000	A09	K3	1	-
J000592	Resusitasi Bayi Lahir Spontan/VE Dgn Dokter	KVIP	0	0	600000	0	0	0	600000	0	600000	A09	VIP	1	-
J000593	Resusitasi Bayi Lahir Spontan/VE Dgn Dokter	KVVIP	0	0	675000	0	0	0	675000	0	675000	A09	VVIP	1	-
J000594	Jasa Dokter Anak Section Caesaria	K1	0	0	750000	0	0	0	750000	0	750000	A09	K1	1	-
J000595	Jasa Dokter Anak Section Caesaria	K2	0	0	675000	0	0	0	675000	0	675000	A09	K2	1	-
J000596	Jasa Dokter Anak Section Caesaria	K3	0	0	600000	0	0	0	600000	0	600000	A09	K3	1	-
OG.III.50	Ekstirpasi	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
J000597	Jasa Dokter Anak Section Caesaria	KVIP	0	0	900000	0	0	0	900000	0	900000	A09	VIP	1	-
J000598	Jasa Dokter Anak Section Caesaria	KVVIP	0	0	1050000	0	0	0	1050000	0	1050000	A09	VVIP	1	-
J000599	Pasang Infus Pump (Syring Pump) perhari	-	137500	0	0	38500	0	0	137500	176000	176000	A09	VVIP	1	-
J000604	Nebulizer 1-3 kali	KVVIP	38500	0	0	38500	0	0	38500	77000	77000	A09	VVIP	1	-
J000605	Nebulizer 1-3 kali	K1	35000	0	0	35000	0	0	35000	70000	70000	A09	K1	1	-
J000606	Nebulizer 1-3 kali	K2	35000	0	0	35000	0	0	35000	70000	70000	A09	K2	1	-
J000607	Nebulizer 1-3 kali	K3	31500	0	0	31500	0	0	31500	63000	63000	A09	K3	1	-
J000608	Syiringe Pump	-	125000	0	0	35000	0	0	0	160000	160000	A09	ICU	1	-
J000609	Pasang Infus Pump	K.BY	125000	0	0	35000	0	0	0	160000	160000	A09	NICU	1	-
J000612	Syiringe Pump	K.BY	125000	0	0	35000	0	0	0	160000	160000	A09	NICU	1	-
J000613	Syiringe Pump	-	150000	0	0	0	0	0	150000	150000	150000	A09	K1	1	-
J000614	Syiringe Pump	-	150000	0	0	0	0	0	150000	150000	150000	A09	K2	1	-
J000615	Syiringe Pump	-	150000	0	0	0	0	0	150000	150000	150000	A09	K3	1	-
J000616	Syiringe Pump	-	150000	0	0	0	0	0	150000	150000	150000	A09	VIP	1	-
J000617	Syiringe Pump	-	150000	0	0	0	0	0	150000	150000	150000	A09	VVIP	1	-
J000618	Resusitasi Bayi Lahir Section Caesaria	-	0	0	750000	0	0	0	750000	0	750000	A09	K1	1	-
J000619	Resusitasi Bayi Lahir Section Caesaria	-	0	0	675000	0	0	0	675000	0	675000	A09	K2	1	-
J000620	Resusitasi Bayi Lahir Section Caesaria	-	0	0	600000	0	0	0	600000	0	600000	A09	K3	1	-
J000621	Resusitasi Bayi Lahir Section Caesaria	-	0	0	900000	0	0	0	900000	0	900000	A09	VIP	1	-
J000622	Resusitasi Bayi Lahir Section Caesaria	-	0	0	1050000	0	0	0	1050000	0	1050000	A09	VVIP	1	-
J000623	Visite (dr. RULLY NOVIYAN, Sp. PD)	K3	0	0	150000	0	0	0	150000	0	150000	A09	K3	0	-
J000624	Visite Dokter Spesialis	K1	30000	0	160000	0	0	0	190000	0	0	A09	K1	1	-
J000625	Visite Dokter Spesialis	K2	0	0	130000	0	0	0	130000	0	130000	A09	K2	1	-
J000626	Visite Dokter Spesialis	K3	0	0	90000	0	0	0	90000	0	90000	A09	K3	1	-
J000627	Sewa alat CPAP	K1	1300000	0	0	0	0	0	1300000	1300000	1300000	A09	K1	1	-
J000628	Sewa alat CPAP	K2	900000	0	0	0	0	0	900000	900000	900000	A09	K2	1	-
J000629	Sewa alat CPAP	K3	750000	0	0	0	0	0	750000	750000	750000	A09	K3	1	-
J000630	Sewa alat CPAP	KVIP	1500000	0	0	0	0	0	1500000	1500000	1500000	A09	VIP	1	-
J000631	Sewa alat CPAP	KVVIP	1500000	0	0	0	0	0	1500000	1500000	1500000	A09	VVIP	1	-
J000632	Sewa alat CPAP Pertama	-	1500000	0	0	0	0	0	1500000	1500000	1500000	A09	NICU	1	-
J000633	Sewa Alat Ventilator	-	450000	0	0	0	0	0	450000	450000	450000	A09	ICU	1	-
J000634	Pasang infus Dewasa 2-3	K2	30000	0	0	30000	0	0	30000	60000	60000	A09	K2	1	-
J000635	Cukur pubis	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
J000636	Cukur pubis	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000637	Cukur pubis	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000638	Cukur pubis	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000639	Cukur pubis	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000641	Observasi DJJ	K1	25000	0	0	0	0	0	25000	25000	25000	A09	K1	1	-
J000642	Observasi DJJ	K2	25000	0	0	0	0	0	25000	25000	25000	A09	K2	1	-
J000643	Observasi DJJ	K3	25000	0	0	0	0	0	25000	25000	25000	A09	K3	1	-
J000644	Observasi DJJ	KVIP	25000	0	0	0	0	0	25000	25000	25000	A09	VIP	1	-
J000645	Observasi DJJ	KVVIP	25000	0	0	0	0	0	25000	25000	25000	A09	VVIP	1	-
J000647	Periksa Dalam Oleh Bidan	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
J000648	Periksa Dalam Oleh Bidan	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000649	Periksa Dalam Oleh Bidan	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000650	Periksa Dalam Oleh Bidan	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000651	Periksa Dalam Oleh Bidan	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000653	Partus Normal Oleh Dokter +  Hecting	K1	0	0	2200000	0	0	0	2200000	0	2200000	A09	K1	1	-
J000654	Partus Normal Oleh Dokter +  Hecting	K2	0	0	1850000	0	0	0	1850000	0	1850000	A09	K2	1	-
J000655	Partus Normal Oleh Dokter +  Hecting	K3	0	0	1500000	0	0	0	1500000	0	1500000	A09	K3	1	-
J000656	Partus Normal Oleh Dokter +  Hecting	KVIP	0	0	2550000	0	0	0	2550000	0	2550000	A09	VIP	1	-
J000657	Partus Normal Oleh Dokter +  Hecting	KVVIP	0	0	2900000	0	0	0	2900000	0	2900000	A09	VVIP	1	-
J000658	periksa dalam oleh dokter	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
J000659	periksa dalam oleh dokter	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000660	periksa dalam oleh dokter	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000661	periksa dalam oleh dokter	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000662	periksa dalam oleh dokter	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000664	Partus VE Oleh Dokter	K1	0	0	2187500	0	0	0	2187500	0	2187500	A09	K1	1	-
J000665	Partus VE Oleh Dokter	K2	0	0	1875000	0	0	0	1875000	0	1875000	A09	K2	1	-
J000666	Partus VE Oleh Dokter	K3	0	0	1562500	0	0	0	1562500	0	1562500	A09	K3	1	-
J000667	Partus VE Oleh Dokter	KVIP	0	0	2500000	0	0	0	2500000	0	2500000	A09	VIP	1	-
J000668	Partus VE Oleh Dokter	KVVIP	0	0	2812500	0	0	0	2812500	0	2812500	A09	VVIP	1	-
J000669	Partus Letak Sungsang Oleh Dokter	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
J000670	Partus Letak Sungsang Oleh Dokter	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000671	Partus Letak Sungsang Oleh Dokter	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000672	Partus Letak Sungsang Oleh Dokter	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000673	Partus Letak Sungsang Oleh Dokter	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000674	Hecting Perinium Oleh Bidan	K1	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000675	Hecting Perinium Oleh Bidan	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000676	Hecting Perinium Oleh Bidan	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000677	Hecting Perinium Oleh Bidan	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000678	Hecting Perinium Oleh Bidan	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
OG.VVIP.58	Vaginoplasti	-	0	0	3438500	0	0	0	3438500	0	0	A09	-	1	-
J000679	Resusitas Bayi Lahir Spontan/VE Oleh Bidan	K1	0	0	367500	157500	0	0	367500	157500	525000	A09	K1	1	-
J000680	Resusitas Bayi Lahir Spontan/VE Oleh Bidan	K2	0	0	315000	135000	0	0	315000	135000	450000	A09	K2	1	-
J000681	Resusitas Bayi Lahir Spontan/VE Oleh Bidan	K3	0	0	262500	112500	0	0	262500	112500	375000	A09	K3	1	-
J000682	Resusitas Bayi Lahir Spontan/VE Oleh Bidan	KVIP	0	0	420000	180000	0	0	420000	180000	600000	A09	VIP	1	-
J000683	Resusitas Bayi Lahir Spontan/VE Oleh Bidan	KVVIP	0	0	472500	202500	0	0	472500	202500	675000	A09	VVIP	1	-
J000684	Puls Oximetri	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
J000685	Puls Oximetri	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000686	Puls Oximetri	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000687	Puls Oximetri	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000688	Puls Oximetri	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000689	Puls Oximetri	K.BY	150000	0	0	0	0	0	150000	150000	150000	A09	NICU	1	-
J000692	Ambil Sampel Darah	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
J000693	Ambil Sampel Darah	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000694	Ambil Sampel Darah	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000695	Ambil Sampel Darah	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000696	Ambil Sampel Darah	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000697	Ambil Sampel Darah	K.BY	0	0	0	0	0	0	0	0	0	A09	NICU	1	-
J000701	Ambil Sampel Darah	-	0	0	0	0	0	0	0	0	0	A09	KO	1	-
J000702	Ambil Sampel Darah	-	0	0	0	0	0	0	0	0	0	A09	ICU	1	-
J000703	Cuci Plasenta	K1	15000	0	0	35000	0	0	0	50000	50000	A09	K1	1	-
J000704	Cuci Plasenta	K2	15000	0	0	35000	0	0	0	50000	50000	A09	K2	1	-
J000705	Cuci Plasenta	K3	13500	0	0	31500	0	0	0	45000	45000	A09	K3	1	-
J000706	Cuci Plasenta	KVIP	16500	0	0	38500	0	0	0	55000	55000	A09	VIP	1	-
J000707	Cuci Plasenta	KVVIP	16500	0	0	38500	0	0	0	55000	55000	A09	VVIP	1	-
J000711	Cuci Plasenta	-	0	0	0	0	0	0	0	0	0	A09	KO	1	-
J000712	Cuci Plasenta	-	0	0	0	0	0	0	0	0	0	A09	ICU	1	-
J000713	Pasang Kateter	K2	15000	0	0	25000	0	0	15000	40000	40000	A09	K2	1	-
J000714	Pasang Kateter	K3	13500	0	0	22500	0	0	13500	36000	36000	A09	K3	1	-
J000715	Pasang Kateter	-	15000	0	0	25000	0	0	0	40000	40000	A09	ICU	1	-
J000716	Lepas Kateter	K1	10000	0	0	15000	0	0	0	25000	25000	A09	K1	1	-
J000717	Lepas Kateter	K2	10000	0	0	15000	0	0	0	25000	25000	A09	K2	1	-
J000718	Lepas Kateter	K3	9000	0	0	13500	0	0	0	22500	22500	A09	K3	1	-
J000719	Lepas Kateter	KVIP	11000	0	0	16500	0	0	0	27500	27500	A09	VIP	1	-
J000720	Lepas Kateter	KVVIP	11000	0	0	16500	0	0	0	27500	27500	A09	VIP	1	-
J000722	Lepas Kateter	-	0	0	0	0	0	0	0	0	0	A09	KO	1	-
J000724	Injeksi Intra Muskular	K1	30000	0	0	0	0	0	30000	30000	30000	A09	K1	1	-
J000725	Injeksi Intra Muskular	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000726	Injeksi Intra Muskular	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000727	Injeksi Intra Muskular	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000728	Injeksi Intra Muskular	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000730	Injeksi Intra Muskular	-	0	0	0	0	0	0	0	0	0	A09	ICU	1	-
J000731	Injeksi Intra Muskular	-	0	0	0	0	0	0	0	0	0	A09	KO	1	-
J000733	Pemeriksaan Fisik Oleh Bidan	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
J000734	Pemeriksaan Fisik Oleh Bidan	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000735	Pemeriksaan Fisik Oleh Bidan	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000736	Pemeriksaan Fisik Oleh Bidan	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000737	Pemeriksaan Fisik Oleh Bidan	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000739	Pemeriksaan Fisik Oleh Bidan	-	0	0	0	0	0	0	0	0	0	A09	ICU	1	-
J000740	Tindakan Kandiloma	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
J000741	Tindakan Kandiloma	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000742	Tindakan Kandiloma	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000743	Tindakan Kandiloma	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000744	Tindakan Kandiloma	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000746	Tindakan Kandiloma	-	0	0	0	0	0	0	0	0	0	A09	ICU	1	-
J000747	Ikat Portio Oleh Dokter	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
J000748	Ikat Portio Oleh Dokter	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000749	Ikat Portio Oleh Dokter	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000750	Ikat Portio Oleh Dokter	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000751	Ikat Portio Oleh Dokter	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000753	Ikat Portio Oleh Dokter	-	0	0	0	0	0	0	0	0	0	A09	ICU	1	-
J000754	Lepas Ikat Portio Oleh Dokter	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
J000755	Lepas Ikat Portio Oleh Dokter	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000756	Lepas Ikat Portio Oleh Dokter	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000757	Lepas Ikat Portio Oleh Dokter	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000758	Lepas Ikat Portio Oleh Dokter	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000760	Lepas Ikat Portio Oleh Dokter	-	0	0	0	0	0	0	0	0	0	A09	ICU	1	-
J000761	Asisten Lepas Ikat Portio Oleh Dokter	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
J000762	Asisten Lepas Ikat Portio Oleh Dokter	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000763	Asisten Lepas Ikat Portio Oleh Dokter	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000764	Asisten Lepas Ikat Portio Oleh Dokter	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000765	Asisten Lepas Ikat Portio Oleh Dokter	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000767	Asisten Lepas Ikat Portio Oleh Dokter	-	0	0	0	0	0	0	0	0	0	A09	ICU	1	-
J000768	Asisten Ikat Portio Oleh Dokter	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
J000769	Asisten Ikat Portio Oleh Dokter	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000770	Asisten Ikat Portio Oleh Dokter	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000771	Asisten Ikat Portio Oleh Dokter	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000772	Asisten Ikat Portio Oleh Dokter	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000774	Asisten Ikat Portio Oleh Dokter	-	0	0	0	0	0	0	0	0	0	A09	ICU	1	-
J000775	Manual Plasenta	-	0	0	0	0	0	0	0	0	0	A09	KO	1	-
J000776	Manual Plasenta	-	0	0	0	0	0	0	0	0	0	A09	ICU	1	-
J000777	lepas IUD	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000778	lepas IUD	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
J000779	lepas IUD	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000780	lepas IUD	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000781	lepas IUD	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000783	Dressing Luka Operasi	-	0	0	264500	0	0	0	264500	0	0	A09	KO	1	-
J000784	Visite Dokter Spesialis	KVVIP	0	0	180000	0	0	0	180000	0	180000	A09	VVIP	1	-
J000785	Konsultasi, Via Telpon Dokter Spesialiss	KVVIP	0	0	100000	0	0	0	100000	0	100000	A09	VVIP	1	-
J000786	Konsultasi Via Telp Dokter Spesialis	RI1	0	0	75000	0	0	0	75000	0	75000	A09	K1	1	-
J000787	Anel Test	-	0	0	30000	0	0	0	30000	0	30000	A09	KO	1	-
J000788	Irigasi Mata	-	0	0	100000	0	0	0	100000	0	100000	A09	KO	1	-
J000789	Evaluasi Sensoris Penglihatan + Lapang Pandang	-	0	0	100000	0	0	0	100000	0	100000	A09	KO	1	-
J000790	Schirmer Test	-	0	0	25000	0	0	0	25000	0	25000	A09	KO	1	-
J000791	Fluorasein Test	-	0	0	25000	0	0	0	25000	0	25000	A09	KO	1	-
J000792	USG Mata	-	0	0	100000	0	0	0	100000	0	100000	A09	KO	1	-
J000793	Gonioskopi	-	0	0	150000	0	0	0	0	0	0	A09	KO	1	-
J000794	Incisi Hordeolum / Kalazion / Abses Palpebra	-	0	0	500000	0	0	0	500000	0	500000	A09	KO	1	-
J000795	Exterpasi Pterygium Bare Sclera	-	0	0	600000	0	0	0	600000	0	600000	A09	KO	1	-
J000796	Endotracheal tube ( ETT )	-	0	0	400000	0	0	0	400000	0	400000	A09	KO	1	-
J000797	Excisi Tumor Conjungtiva / limbus Palpebra	-	0	0	0	0	0	0	0	0	0	A09	KO	1	-
J000798	Parasentesa Bilik Mata Depan (BMD)	-	0	0	1000000	0	0	0	1000000	0	1000000	A09	KO	1	-
J000799	Iridektomi	-	0	0	1000000	0	0	0	1000000	0	1000000	A09	KO	1	-
J000800	Eviscerasi / Enukleasi + Implan	-	0	0	2500000	0	0	0	2500000	0	2500000	A09	KO	1	-
J000801	Katarak ( Ekek / Icce)	-	0	0	2000000	0	0	0	2000000	0	2000000	A09	KO	1	-
J000802	Ptosis Ringan	-	0	0	2000000	0	0	0	2000000	0	2000000	A09	KO	1	-
J000803	Enteropion	-	0	0	2000000	0	0	0	2000000	0	2000000	A09	KO	1	-
J000804	Ektopion	-	0	0	2000000	0	0	0	2000000	0	2000000	A09	KO	1	-
J000805	Symblefaron	-	0	0	2000000	0	0	0	2000000	0	2000000	A09	KO	1	-
J000806	Blefaroplasti	-	0	0	2500000	0	0	0	2500000	0	2500000	A09	KO	1	-
J000807	Eviscerasi / Enukleasi	-	0	0	2000000	0	0	0	2000000	0	2000000	A09	KO	1	-
J000808	Eviscerasi / Enukleasi + Implan	K1	0	0	2875000	0	0	0	2875000	0	2875000	A09	K1	1	-
J000809	Eviscerasi / Enukleasi + Implan	K2	0	0	2750000	0	0	0	2750000	0	2750000	A09	K2	1	-
J000810	Eviscerasi / Enukleasi + Implan	K3	0	0	2625000	0	0	0	2625000	0	2625000	A09	K3	1	-
J000811	Eviscerasi / Enukleasi + Implan	KVIP	0	0	3000000	0	0	0	3000000	0	3000000	A09	VIP	1	-
J000812	Eviscerasi / Enukleasi + Implan	KVVIP	0	0	3125000	0	0	0	3125000	0	3125000	A09	VVIP	1	-
J000813	Eviscerasi / Enukleasi	K1	0	0	2300000	0	0	0	2300000	0	2300000	A09	K1	1	-
J000814	Eviscerasi / Enukleasi	K2	0	0	2200000	0	0	0	2200000	0	2200000	A09	K2	1	-
J000815	Eviscerasi / Enukleasi	K3	0	0	2100000	0	0	0	2100000	0	2100000	A09	K3	1	-
J000816	Eviscerasi / Enukleasi	KVIP	0	0	2400000	0	0	0	2400000	0	2400000	A09	VIP	1	-
J000817	Eviscerasi / Enukleasi	KVVIP	0	0	2500000	0	0	0	2500000	0	2500000	A09	VVIP	1	-
J000818	Blood Warmer	K1	50000	0	0	0	0	0	50000	50000	50000	A09	K1	1	-
J000819	Blood Warmer	K2	50000	0	0	0	0	0	50000	50000	50000	A09	K2	1	-
J000820	Blood Warmer	K3	50000	0	0	0	0	0	50000	50000	50000	A09	K3	1	-
J000821	Blood Warmer	KVIP	50000	0	0	0	0	0	50000	50000	50000	A09	VIP	1	-
J000822	Blood Warmer	KVVIP	50000	0	0	0	0	0	50000	50000	50000	A09	VVIP	1	-
J000824	Blood Warmer	K.BY	50000	0	0	0	0	0	50000	50000	50000	A09	NICU	1	-
J000827	Blood Warmer	-	50000	0	0	0	0	0	50000	50000	50000	A09	ICU	1	-
J000828	Blood Warmer	-	50000	0	0	0	0	0	50000	50000	50000	A09	KO	1	-
J000829	Debridement Gangrene	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
J000830	Debridement Gangrene	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
J000831	Debridement Gangrene	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
J000832	Debridement Gangrene	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
J000833	Debridement Gangrene	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
J000834	Debridement Gangrene	-	0	0	0	0	0	0	0	0	0	A09	KO	1	-
J000835	Debridement Gangrene	-	0	0	0	0	0	0	0	0	0	A09	ICU	1	-
J000836	Dressing Gangrene	K1	0	0	0	40000	0	0	0	40000	40000	A09	K1	1	-
J000837	Dressing Gangrene	K2	0	0	0	40000	0	0	0	40000	40000	A09	K2	1	-
J000838	Dressing Gangrene	K3	0	0	0	40000	0	0	0	40000	40000	A09	K3	1	-
J000839	Dressing Gangrene	KVIP	0	0	0	40000	0	0	0	40000	40000	A09	VIP	1	-
J000840	Dressing Gangrene	KVVIP	0	0	0	40000	0	0	0	40000	40000	A09	VVIP	1	-
J000841	Dressing Gangrene	-	0	0	0	40000	0	0	0	40000	40000	A09	KO	1	-
J000842	Dressing Gangrene	-	0	0	0	40000	0	0	0	40000	40000	A09	ICU	1	-
J000843	Assesment Fungsi Luhur	-	0	0	75000	0	0	0	75000	0	75000	A09	KO	1	-
J000845	Jasa Asisten Operasi Orthopedi	K1	0	0	0	550000	0	0	0	550000	550000	A09	K1	1	-
J000846	Jasa Asisten Operasi Orthopedi	K2	0	0	0	450000	0	0	0	450000	450000	A09	K2	1	-
J000847	Jasa Asisten Operasi Orthopedi	K3	0	0	0	350000	0	0	0	350000	350000	A09	K3	1	-
J000848	Jasa Asisten Operasi Orthopedi	KVIP	0	0	0	650000	0	0	0	650000	650000	A09	VIP	1	-
J000849	Jasa Asisten Operasi Orthopedi	KVVIP	0	0	0	750000	0	0	0	750000	750000	A09	VVIP	1	-
J000850	Jasa Asisten Operasi Orthopedi	-	0	0	0	150000	0	0	0	150000	150000	A09	KO	1	-
J000851	Jasa Dokter/Operator Katarak 	K1	0	0	2500000	0	0	0	2500000	0	2500000	A09	K1	1	-
J000852	Jasa Dokter/Operator Katarak 	K2	0	0	2250000	0	0	0	2250000	0	2250000	A09	K2	1	-
J000853	Jasa Dokter/Operator Katarak 	K3	0	0	2000000	0	0	0	2000000	0	2000000	A09	K3	1	-
J000854	Jasa Dokter/Operator Katarak 	KVIP	0	0	2700000	0	0	0	2700000	0	2700000	A09	VIP	1	-
J000855	Jasa Dokter/Operator Katarak 	KVVIP	0	0	3000000	0	0	0	3000000	0	3000000	A09	VVIP	1	-
J000856	Jasa Dokter/Operator Katarak 	-	0	0	2000000	0	0	0	2000000	0	2000000	A09	KO	1	-
J000857	Jasa Asisten Anastesi Section Caesaria	K1	0	0	0	300000	0	0	0	300000	300000	A09	K1	1	-
J000858	Jasa Asisten Anastesi Section Caesaria	K2	0	0	0	250000	0	0	0	250000	250000	A09	K2	1	-
J000859	Jasa Asisten Anastesi Section Caesaria	K3	0	0	0	200000	0	0	0	200000	200000	A09	K3	1	-
J000860	Jasa Asisten Anastesi Section Caesaria	KVIP	0	0	0	400000	0	0	0	400000	400000	A09	VIP	1	-
J000861	Jasa Asisten Anastesi Section Caesaria	KVVIP	0	0	0	500000	0	0	0	500000	500000	A09	VVIP	1	-
J000862	Jasa Asisten Anastesi Section Caesaria	-	0	0	0	150000	0	0	0	150000	150000	A09	KO	1	-
J000863	Jasa Asisten Anastesi Bedah & Orthopedi	K1	0	0	0	300000	0	0	0	300000	300000	A09	K1	1	-
J000864	Jasa Asisten Anastesi Bedah & Orthopedi	K2	0	0	0	250000	0	0	0	250000	250000	A09	K2	1	-
J000865	Jasa Asisten Anastesi Bedah & Orthopedi	K3	0	0	0	200000	0	0	0	200000	200000	A09	K3	1	-
J000866	Jasa Asisten Anastesi Bedah & Orthopedi	KVIP	0	0	0	400000	0	0	0	400000	400000	A09	VIP	1	-
J000867	Jasa Asisten Anastesi Bedah & Orthopedi	KVVIP	0	0	0	500000	0	0	0	500000	500000	A09	VVIP	1	-
J000868	Jasa Asisten Anastesi Bedah & Orthopedi	-	0	0	0	150000	0	0	0	150000	150000	A09	KO	1	-
J000870	Tindik Bayi	K.BY	100000	0	0	0	0	0	0	100000	0	A09	NICU	1	-
J000874	jasa Anastesi Operasi Miomektomi/Kista	K2	0	0	750000	0	0	0	750000	0	750000	A09	K2	1	-
J000875	Jasa Anastesi Operasi Miomektomi/Kista	K1	0	0	900000	0	0	0	900000	0	900000	A09	K1	1	-
J000876	Jasa Anastesi Operasi Miomektomi/Kista	K2	0	0	750000	0	0	0	750000	0	750000	A09	K2	1	-
J000877	Jasa Anastesi Operasi Miomektomi/Kista	K3	0	0	600000	0	0	0	600000	0	600000	A09	K3	1	-
J000878	Jasa Anastesi Operasi Miomektomi/Kista	KVIP	0	0	1050000	0	0	0	1050000	0	1050000	A09	VIP	1	-
J000879	Jasa Anastesi Operasi Miomektomi/Kista	KVVIP	0	0	1200000	0	0	0	1200000	0	1200000	A09	VVIP	1	-
J000880	Jasa Asisten Operasi Miomektomi/Kista	K1	0	0	0	450000	0	0	0	450000	450000	A09	K1	1	-
J000881	Jasa Asisten Operasi Miomektomi/Kista	K2	0	0	0	300000	0	0	0	300000	300000	A09	K2	1	-
J000882	Jasa Asisten Operasi Miomektomi/Kista	K3	0	0	0	200000	0	0	0	200000	200000	A09	K3	1	-
J000883	Jasa Asisten Operasi Miomektomi/Kista	KVIP	0	0	0	550000	0	0	0	550000	550000	A09	VIP	1	-
J000884	Jasa Asisten Operasi Miomektomi/Kista	KVVIP	0	0	0	600000	0	0	0	600000	600000	A09	VVIP	1	-
J000885	Jasa Asisten Anastesi Operasi Miomektomi/Kista	K1	0	0	0	300000	0	0	0	300000	300000	A09	K1	1	-
J000886	Jasa Asisten Anastesi Operasi Miomektomi/Kista	K2	0	0	0	300000	0	0	0	300000	300000	A09	K2	1	-
J000887	Jasa Asisten Anastesi Operasi Miomektomi/Kista	K3	0	0	0	200000	0	0	0	200000	200000	A09	K3	1	-
J000888	Jasa Asisten Anastesi Operasi Miomektomi/Kista	KVIP	0	0	0	350000	0	0	0	350000	350000	A09	VIP	1	-
J000889	Jasa Asisten Anastesi Operasi Miomektomi/Kista	KVVIP	0	0	0	400000	0	0	0	400000	400000	A09	VVIP	1	-
J000890	Nebulizer 1-3 kali	-	35000	0	0	35000	0	0	0	70000	70000	A09	ICU	1	-
J000891	Pasang Infus Dewasa	-	33000	0	0	33000	0	0	33000	66000	66000	A09	ICU	1	-
J000892	Pasang OGT/ NGT	-	0	0	0	50000	0	0	0	50000	50000	A09	ICU	1	-
J000895	RJP Pasien Anak / Dewasa	K1	50000	0	0	75000	0	0	0	125000	125000	A09	K1	1	-
J000896	RJP Pasien Anak / Dewasa	K2	50000	0	0	75000	0	0	0	125000	125000	A09	K2	1	-
J000897	RJP Pasien Anak / Dewasa	K3	45000	0	0	67500	0	0	0	112500	112500	A09	K3	1	-
J000898	RJP Pasien Anak / Dewasa	KVIP	55000	0	0	82500	0	0	0	137500	137500	A09	VIP	1	-
J000899	RJP Pasien Anak / Dewasa	KVVIP	55000	0	0	82500	0	0	0	137500	137500	A09	VVIP	1	-
J000900	Tindakan RJP Pasien Anak / Dewasa	K.BY	250000	0	0	0	0	0	250000	250000	250000	A09	NICU	1	-
J000903	Tindakan RJP Pasien Anak / Dewasa	-	250000	0	0	0	0	0	250000	250000	250000	A09	ICU	1	-
J000904	Tindakan Lavement 	K1	40000	0	0	0	0	0	40000	40000	40000	A09	K2	1	-
J000905	Tindakan Lavement 	K2	40000	0	0	0	0	0	40000	40000	40000	A09	K2	1	-
J000906	Tindakan Lavement 	K3	40000	0	0	0	0	0	40000	40000	40000	A09	K3	1	-
J000907	Tindakan Lavement 	KVIP	40000	0	0	0	0	0	40000	40000	40000	A09	VIP	1	-
J000908	Tindakan Lavement 	KVVIP	40000	0	0	0	0	0	40000	40000	40000	A09	VVIP	1	-
J000909	Tindakan Lavement 	-	40000	0	0	0	0	0	40000	40000	40000	A09	ICU	1	-
J000910	Pasang infus Dewasa	KVVIP	33000	0	0	33000	0	0	33000	66000	66000	A09	VVIP	1	-
J000911	DokterJaga/ UGD 	K1	30000	0	30000	0	0	0	60000	30000	60000	A09	K1	1	-
J000912	DokterJaga/ UGD 	K2	30000	0	30000	0	0	0	60000	30000	60000	A09	K2	1	-
J000913	DokterJaga/ UGD 	K3	30000	0	30000	0	0	0	60000	30000	60000	A09	K3	1	-
J000914	DokterJaga/ UGD 	KVVIP	30000	0	30000	0	0	0	60000	30000	60000	A09	VVIP	1	-
J000915	Suction	-	25000	0	0	30000	0	0	0	55000	55000	A09	ICU	1	-
J000916	Partus + VE + Hecting	KVIP	0	0	3187500	0	0	0	3187500	0	3187500	A09	VIP	1	-
J000917	Usg Ruang Bersalin	K1	25000	0	75000	0	0	0	100000	25000	100000	A09	K1	1	-
J000918	Usg Ruang Bersalin	KVIP	25000	0	75000	0	0	0	100000	25000	100000	A09	VIP	1	-
J000919	Usg Ruang Bersalin	KVVIP	25000	0	75000	0	0	0	100000	25000	100000	A09	VVIP	1	-
J000920	Usg Ruang Bersalin	K3	25000	0	75000	0	0	0	100000	25000	100000	A09	K3	1	-
J000921	Usg Ruang Bersalin	K2	25000	0	75000	0	0	0	100000	25000	100000	A09	K2	1	-
J000922	Ruang Bersalin	K1	700000	0	0	0	0	0	700000	700000	700000	A09	K1	1	-
J000923	Ruang Bersalin	K2	600000	0	0	0	0	0	600000	600000	600000	A09	K2	1	-
J000924	Ruang Bersalin	K3	500000	0	0	0	0	0	500000	500000	500000	A09	K3	1	-
J000925	Ruang Bersalin	KVIP	800000	0	0	0	0	0	800000	800000	800000	A09	VIP	1	-
J000926	Ruang Bersalin	KVVIP	850000	0	0	0	0	0	850000	850000	850000	A09	VVIP	1	-
J000927	Dressing Luka Operasi oleh perawat	K1	0	0	0	40000	0	0	0	40000	40000	A09	K1	1	-
J000928	Dressing Luka Operasi oleh perawat	K2	0	0	0	40000	0	0	0	40000	40000	A09	K2	1	-
J000929	Dressing Luka Operasi oleh perawat	K3	0	0	0	40000	0	0	0	40000	40000	A09	K3	1	-
J000930	Dressing Luka Operasi oleh perawat	KVVIP	0	0	0	40000	0	0	0	40000	40000	A09	VVIP	1	-
J000931	Dressing Luka Operasi oleh perawat	KVIP	0	0	0	40000	0	0	0	40000	40000	A09	VIP	1	-
J000932	Sewa alat CPAP Lanjutan	K.BY	450000	0	0	0	0	0	450000	450000	450000	A09	NICU	1	-
J000933	Visite Dokter jaga/ Umum	K1	0	0	160000	0	0	0	160000	0	160000	A09	K1	1	-
J000934	Visite Dokter jaga/ Umum	K2	0	0	130000	0	0	0	130000	0	130000	A09	K2	1	-
J000935	Visite Dokter jaga/ Umum	K3	0	0	90000	0	0	0	90000	0	90000	A09	K3	1	-
J000936	Visite Dokter jaga/ Umum	KVIP	0	0	180000	0	0	0	180000	0	180000	A09	VIP	1	-
J000937	Visite Dokter jaga/ Umum	KVVIP	0	0	180000	0	0	0	180000	0	180000	A09	VVIP	1	-
J000938	Visite Dokter jaga/ Umum	K.BY	0	0	150000	0	0	0	150000	0	150000	A09	NICU	0	-
J000941	Nebulizer	K.BY	60000	0	0	0	0	0	60000	60000	60000	A09	NICU	1	-
J000945	Visite dokter spesialis  (Hari Libur/Cito)	K2	0	0	162500	0	0	0	162500	0	162500	A09	K2	1	-
J000946	Visite dokter spesialis  (Hari Libur/Cito)	K3	0	0	112500	0	0	0	112500	0	112500	A09	K3	1	-
J000947	Visite dokter spesialis  (Hari Libur/Cito)	-	0	0	250000	0	0	0	250000	0	250000	A09	ICU	1	-
J000949	Visite dokter spesialis  (Hari Libur/Cito)	K.BY	0	0	200000	0	0	0	200000	0	200000	A09	NICU	1	-
J000951	FISIOTERAPHY	K.BY	15000	0	0	50000	0	0	0	65000	0	A09	NICU	1	-
J000954	Ruang Operasi	ok35	2200000	0	0	350000	0	0	2200000	2550000	2550000	A09	K1	1	-
J000955	Ruang Operasi	OK03	2200000	0	0	160000	0	0	2200000	2360000	2360000	A09	K1	1	-
J000956	Ruang Operasi	OP33	2200000	0	0	250000	0	0	2200000	2450000	2450000	A09	K1	1	-
J000957	Ruang Operasi	OK03	1650000	0	0	160000	0	0	1650000	1810000	1810000	A09	K2	1	-
J000958	Ruang Operasi	ok35	1650000	0	0	350000	0	0	1650000	2000000	2000000	A09	K2	1	-
J000959	Ruang Operasi	KP034	1650000	0	0	200000	0	0	1650000	1850000	1850000	A09	K2	1	-
J000960	Ruang Operasi	OK03	1200000	0	0	160000	0	0	1200000	1360000	1360000	A09	K3	1	-
J000961	Ruang Operasi	ok35	1200000	0	0	350000	0	0	1200000	1550000	1550000	A09	K3	1	-
J000962	Ruang Operasi	KP034	1200000	0	0	200000	0	0	1200000	1400000	1400000	A09	K3	1	-
J000963	Ruang Operasi	OK03	2750000	0	0	160000	0	0	2750000	2910000	2910000	A09	VVIP	1	-
J000964	Ruang Operasi	ok35	2500000	0	0	350000	0	0	2500000	2850000	2850000	A09	VIP	1	-
J000965	Ruang Operasi	KP034	2500000	0	0	200000	0	0	2500000	2700000	2700000	A09	VIP	1	-
J000966	Ruang Operasi	OK03	2500000	0	0	160000	0	0	2500000	2660000	2660000	A09	VIP	1	-
J000967	Ruang Operasi	ok35	2750000	0	0	350000	0	0	2750000	3100000	3100000	A09	VVIP	1	-
J000968	Ruang Operasi	KP034	2750000	0	0	200000	0	0	2750000	2950000	2950000	A09	VVIP	1	-
J000969	Ruang Operasi	-	750000	0	0	350000	0	0	750000	1100000	1100000	A09	KO	1	-
J000970	Jasa Operator Section Caesaria + MOW	K1	0	0	3125000	0	0	0	3125000	0	3125000	A09	K1	1	-
J000971	Jasa Operator Section Caesaria + MOW	K2	0	0	2812500	0	0	0	2812500	0	2812500	A09	K2	1	-
J000972	Jasa Operator Section Caesaria + MOW	K3	0	0	2500000	0	0	0	2500000	0	2500000	A09	K3	1	-
J000973	Jasa Operator Section Caesaria + MOW	KVIP	0	0	3750000	0	0	0	3750000	0	3750000	A09	VIP	1	-
J000974	Jasa Operator Section Caesaria + MOW	KVVIP	0	0	4375000	0	0	0	4375000	0	4375000	A09	VVIP	1	-
J000975	DokterJaga/ UGD	K.BY	30000	0	30000	0	0	0	60000	30000	60000	A09	NICU	1	-
J000978	DokterJaga/ UGD	-	30000	0	30000	0	0	0	60000	30000	60000	A09	ICU	1	-
J000979	Ruang Operasi Tubectomy	K1	950000	0	0	350000	0	0	950000	1300000	1300000	A09	K1	1	-
J000980	Ruang Operasi Tubectomy	K2	850000	0	0	350000	0	0	850000	1200000	1200000	A09	K2	1	-
J000981	Ruang Operasi Tubectomy	K3	750000	0	0	350000	0	0	750000	1100000	1100000	A09	K3	1	-
J000982	Ruang Operasi Tubectomy	KVIP	1050000	0	0	350000	0	0	1050000	1400000	1400000	A09	VIP	1	-
J000983	Ruang Operasi Tubectomy	KVVIP	1150000	0	0	350000	0	0	1150000	1500000	1500000	A09	VVIP	1	-
J000984	Jasa Operator Prostatectomy	K1	0	0	3000000	0	0	0	3000000	0	3000000	A09	K1	1	-
J000985	Jasa Operator Prostatectomy	K2	0	0	2500000	0	0	0	2500000	0	2500000	A09	K2	1	-
J000986	Jasa Operator Prostatectomy	K3	0	0	2000000	0	0	0	2000000	0	2000000	A09	K3	1	-
J000987	Jasa Operator Prostatectomy	KVIP	0	0	3500000	0	0	0	3500000	0	3500000	A09	VIP	1	-
J000988	Jasa Operator Prostatectomy	KVVIP	0	0	4500000	0	0	0	4500000	0	4500000	A09	VVIP	1	-
J000989	Jasa Operator Appendectomy	K1	0	0	2250000	0	0	0	2250000	0	2250000	A09	K1	1	-
J000990	Jasa Operator Appendectomy	K2	0	0	2000000	0	0	0	2000000	0	2000000	A09	K2	1	-
J000991	Jasa Operator Appendectomy	K3	0	0	1750000	0	0	0	1750000	0	1750000	A09	K3	1	-
J000992	Jasa Operator Appendectomy	KVIP	0	0	2500000	0	0	0	2500000	0	2500000	A09	VIP	1	-
J000993	Jasa Operator Appendectomy	KVVIP	0	0	2750000	0	0	0	2750000	0	2750000	A09	VVIP	1	-
J000994	Jasa Operasi dr. Asnal. Sp.B ( Besar / Kecil )	K1	0	0	1750000	0	0	0	1750000	0	1750000	A09	K1	1	-
J000995	Jasa Operasi dr. Asnal. Sp.B ( Besar / Kecil )	K2	0	0	1500000	0	0	0	1500000	0	1500000	A09	K2	1	-
J000996	Jasa Operasi dr. Asnal. Sp.B ( Besar / Kecil )	K3	0	0	1250000	0	0	0	1250000	0	1250000	A09	K3	1	-
J000997	Jasa Operasi dr. Asnal. Sp.B ( Besar / Kecil )	KVIP	0	0	2000000	0	0	0	2000000	0	2000000	A09	VIP	1	-
J000998	Jasa Operasi dr. Asnal. Sp.B ( Besar / Kecil )	KVVIP	0	0	2250000	0	0	0	2250000	0	2250000	A09	VVIP	1	-
J000999	Jasa Operasi dr. Asnal. Sp.B ( Besar / Kecil ) CITO	K1	0	0	2187500	0	0	0	2187500	0	2187500	A09	K1	1	-
J001000	Jasa Operasi dr. Asnal. Sp.B ( Besar / Kecil ) CITO	K2	0	0	1875000	0	0	0	1875000	0	1875000	A09	K2	1	-
J001001	Jasa Operasi dr. Asnal. Sp.B ( Besar / Kecil ) CITO	K3	0	0	1562500	0	0	0	1562500	0	1562500	A09	K3	1	-
J001002	Jasa Operasi dr. Asnal. Sp.B ( Besar / Kecil ) CITO	KVIP	0	0	2500000	0	0	0	2500000	0	2500000	A09	VIP	1	-
J001003	Jasa Operasi dr. Asnal. Sp.B ( Besar / Kecil ) CITO	KVVIP	0	0	2250000	0	0	0	2250000	0	2250000	A09	VVIP	1	-
J001022	Visite Dokter Spesialis	K.BY	0	0	160000	0	0	0	160000	0	160000	A09	NICU	1	-
J001100	Suction	K1	60000	0	0	0	0	0	60000	60000	60000	A09	K1	1	-
J00112	Ruang Operasi	OP33	1200000	0	0	250000	0	0	1200000	1450000	1450000	A09	K3	1	-
J11000	Resusitasi Bayi Lahir Section Caesaria Cito	K3	0	0	750000	0	0	0	750000	0	750000	A09	K3	1	-
J12000	Resusitasi Bayi Lahir Section Caesaria Cito	K1	0	0	937500	0	0	0	937500	0	937500	A09	K1	1	-
J131000	Resusitasi Bayi Lahir Section Caesaria Cito	K2	0	0	843750	0	0	0	843750	0	843750	A09	K2	1	-
J141000	Resusitasi Bayi Lahir Section Caesaria Cito	KVIP	0	0	1125000	0	0	0	1125000	0	1125000	A09	VIP	1	-
J151000	Resusitasi Bayi Lahir Section Caesaria Cito	KVVIP	0	0	1312500	0	0	0	1312500	0	1312500	A09	VVIP	1	-
JP.I.1	Konsultasi Awal Pasien baru < 10 Menit	-	0	0	100000	0	0	0	100000	0	0	A09	-	0	-
JP.I.3	Treadmill Test	-	0	0	400000	0	0	0	400000	0	0	A09	-	1	-
JP.I.4	MRI, MRA	-	0	0	600000	0	0	0	600000	0	0	A09	-	1	-
JP.I.5	Echocardiografi Stress, Dobutamin Stress	-	0	0	800000	0	0	0	800000	0	0	A09	-	1	-
JP.II.1	Konsultasi Awal Pasien baru < 10 Menit	-	0	0	85000	0	0	0	85000	0	0	A09	-	0	-
JP.II.3	Treadmill Test	-	0	0	340000	0	0	0	340000	0	0	A09	-	1	-
JP.II.4	MRI, MRA	-	0	0	510000	0	0	0	510000	0	0	A09	-	1	-
JP.II.5	Echocardiografi Stress, Dobutamin Stress	-	0	0	680000	0	0	0	680000	0	0	A09	-	1	-
JP.III.1	Konsultasi Awal Pasien baru < 10 Menit	-	0	0	72250	0	0	0	72250	0	0	A09	-	0	-
JP.III.3	Treadmill Test	-	0	0	289000	0	0	0	289000	0	0	A09	-	1	-
JP.III.4	MRI, MRA	-	0	0	433500	0	0	0	433500	0	0	A09	-	1	-
JP.III.5	Echocardiografi Stress, Dobutamin Stress	-	0	0	578000	0	0	0	578000	0	0	A09	-	1	-
JP.ODC.1	Konsultasi Awal Pasien baru < 10 Menit	-	0	0	61412.5	0	0	0	61412.5	0	0	A09	-	0	-
JP.ODC.3	Treadmill Test	-	0	0	245650	0	0	0	245650	0	0	A09	-	1	-
JP.ODC.4	MRI, MRA	-	0	0	368475	0	0	0	368475	0	0	A09	-	1	-
JP.ODC.5	Echocardiografi Stress, Dobutamin Stress	-	0	0	491300	0	0	0	491300	0	0	A09	-	1	-
JP.VIP.1	Konsultasi Awal Pasien baru < 10 Menit	-	0	0	115000	0	0	0	115000	0	0	A09	-	0	-
JP.VIP.3	Treadmill Test	-	0	0	460000	0	0	0	460000	0	0	A09	-	1	-
JP.VIP.4	MRI, MRA	-	0	0	690000	0	0	0	690000	0	0	A09	-	1	-
JP.VIP.5	Echocardiografi Stress, Dobutamin Stress	-	0	0	920000	0	0	0	920000	0	0	A09	-	1	-
JP.VVIP.1	Konsultasi Awal Pasien baru < 10 Menit	-	0	0	132250	0	0	0	132250	0	0	A09	-	0	-
JP.VVIP.3	Treadmill Test	-	0	0	529000	0	0	0	529000	0	0	A09	-	1	-
JP.VVIP.4	MRI, MRA	-	0	0	793500	0	0	0	793500	0	0	A09	-	1	-
JP.VVIP.5	Echocardiografi Stress, Dobutamin Stress	-	0	0	1058000	0	0	0	1058000	0	0	A09	-	1	-
k001000	Kartu Pendaftaran	K1	10000	0	0	0	0	0	10000	10000	10000	A09	K1	1	-
k001001	Kartu Pendaftaran	KVIP	10000	0	0	0	0	0	10000	10000	10000	A09	VIP	1	-
K001002	Kartu Pendaftaran	KVVIP	10000	0	0	0	0	0	10000	10000	10000	A09	VVIP	1	-
K001003	Kartu Pendaftaran	K3	10000	0	0	0	0	0	10000	10000	10000	A09	K3	1	-
K001004	Kartu Pendaftaran	K2	10000	0	0	0	0	0	10000	10000	10000	A09	K2	1	-
KK.I.1	Konsultasi(Kulit Kelamin)	-	0	0	150000	0	0	0	150000	0	0	A09	-	0	-
KK.II.1	Konsultasi(Kulit Kelamin)	-	0	0	127500	0	0	0	127500	0	0	A09	-	0	-
KK.III.1	Konsultasi(Kulit Kelamin)	-	0	0	108375	0	0	0	108375	0	0	A09	-	0	-
KK.ODC.1	Konsultasi(Kulit Kelamin)	KK	0	0	92119	0	0	0	92119	0	0	A09	-	0	-
KK.VIP.1	Konsultasi(Kulit Kelamin)	-	0	0	172500	0	0	0	172500	0	0	A09	-	0	-
KK.VVIP.1	Konsultasi(Kulit Kelamin)	-	0	0	198375	0	0	0	198375	0	0	A09	-	0	-
KN.001	Tindakan ICU	K.BY	0	0	0	0	0	0	0	0	0	-	NICU	1	-
KO.001	Ruang Operasi	KVVIP	2750000	0	0	0	0	0	2750000	2750000	2750000	A09	VVIP	1	-
L.I.1	Tarif Loundry	K1	20000	0	0	0	0	0	0	20000	0	A09	K1	1	-
L.II.1	Tarif Loundry	K2	15000	0	0	0	0	0	0	15000	0	A09	K2	1	-
L.III.1	Tarif Loundry	K3	8000	0	0	0	0	0	0	8000	0	A09	K3	1	-
L.VIP.1	Tarif Loundry	KVIP	25000	0	0	0	0	0	0	25000	0	A09	VIP	1	-
L.VVIP.1	Tarif Loundry	KVVIP	35000	0	0	0	0	0	0	35000	0	A09	VVIP	1	-
M.I.03	Encrasi/Enuklasi + Implant	K1	0	0	2875000	0	0	0	2875000	0	2875000	A09	K1	1	-
M.I.08	Encrasi/Enuklasi	K1	0	0	2300000	0	0	0	2300000	0	2300000	A09	K1	1	-
M.I.1	Biometri	-	0	0	25000	0	0	0	25000	0	0	A09	-	1	-
M.I.10	Laser	-	0	0	1000000	0	0	0	1000000	0	0	A09	-	1	-
M.I.11	Laser Irodotomy	-	0	0	600000	0	0	0	600000	0	0	A09	-	1	-
M.I.12	Angkat Jahitan Kornea	-	0	0	700000	0	0	0	700000	0	0	A09	-	1	-
M.I.13	Aspirasi, Irigasi, Reformasi COA	-	0	0	700000	0	0	0	700000	0	0	A09	-	1	-
M.I.14	Eksisi Pterigium	-	0	0	1300000	0	0	0	1300000	0	0	A09	-	1	-
M.I.15	Ektraksi Corpus Alienum Segmen Anterior	-	0	0	1900000	0	0	0	1900000	0	0	A09	-	1	-
M.I.16	Extirpasi corpus conjuntita,korneaq	-	0	0	150000	0	0	0	150000	0	0	A09	-	1	-
M.I.17	Linasi hordoolum	-	0	0	300000	0	0	0	300000	0	0	A09	-	1	-
M.I.18	Irigasi spooling	-	0	0	150000	0	0	0	150000	0	0	A09	-	1	-
M.I.19	Copius irigasi	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
M.I.2	Foto Fundus	-	0	0	25000	0	0	0	25000	0	0	A09	-	1	-
M.I.20	Injeksi subconjuntivita	-	0	0	150000	0	0	0	150000	0	0	A09	-	1	-
M.I.21	E.Bulumata	-	0	0	100000	0	0	0	100000	0	0	A09	-	1	-
M.I.22	Extirpasi pterigium	-	0	0	600000	0	0	0	600000	0	0	A09	-	1	-
M.I.23	Screpping conjuntiva,kornea	-	0	0	150000	0	0	0	150000	0	0	A09	-	1	-
M.I.24	Extirpasi benda asing conjuntiva	-	0	0	500000	0	0	0	500000	0	0	A09	-	1	-
M.I.25	Insisi hordeolum , abses palpebra	-	0	0	750000	0	0	0	750000	0	0	A09	-	1	-
M.I.26	Tarso rafi	-	0	0	1000000	0	0	0	1000000	0	0	A09	-	1	-
M.I.27	Exsisi pterigym b skelra	-	0	0	600000	0	0	0	600000	0	0	A09	-	1	-
M.I.28	Paraseentese BM	-	0	0	1000000	0	0	0	1000000	0	0	A09	-	1	-
M.I.29	Iredektomi	-	0	0	1000000	0	0	0	1000000	0	0	A09	-	1	-
M.I.3	Refraksi	-	0	0	25000	0	0	0	25000	0	0	A09	-	1	-
M.I.30	Laserasi palpebra simple ( < 20 % )	-	0	0	700000	0	0	0	700000	0	0	A09	-	1	-
M.I.32	Aspirasi sisa massa lensa	-	0	0	750000	0	0	0	750000	0	0	A09	-	1	-
M.I.33	Aspirasi hipopion	-	0	0	750000	0	0	0	750000	0	0	A09	-	1	-
M.I.34	Biopsi tumor	-	0	0	1000000	0	0	0	1000000	0	0	A09	-	1	-
M.I.35	Ekstirpasi kista ,granuloma	-	0	0	1000000	0	0	0	1000000	0	0	A09	-	1	-
M.I.36	Enukleasi	-	0	0	2000000	0	0	0	2000000	0	0	A09	-	1	-
M.I.38	Trabekuloktomi	-	0	0	2500000	0	0	0	2500000	0	0	A09	-	1	-
M.I.39	Buckle	-	0	0	2000000	0	0	0	2000000	0	0	A09	-	1	-
M.I.40	Rekonstrksi sederhana	-	0	0	2000000	0	0	0	2000000	0	0	A09	-	1	-
M.I.41	Konjuntiolplasti , Flap	-	0	0	1500000	0	0	0	1500000	0	0	A09	-	1	-
M.I.42	Jahit kornea	-	0	0	1500000	0	0	0	1500000	0	0	A09	-	1	-
M.I.43	Insersi OL sekunder	-	0	0	1000000	0	0	0	1000000	0	0	A09	-	1	-
M.I.44	Operasi strabismus per otot	-	0	0	2500000	0	0	0	2500000	0	0	A09	-	1	-
M.I.45	Sics	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
M.I.46	Fekomilkfisi	-	0	0	2500000	0	0	0	2500000	0	0	A09	-	1	-
M.I.47	Bleparoplasty	-	0	0	2500000	0	0	0	2500000	0	0	A09	-	1	-
M.I.48	Insisi,Enukleasi, inplant	-	0	0	2500000	0	0	0	2500000	0	0	A09	-	1	-
M.I.49	Ptosis berat	-	0	0	3000000	0	0	0	3000000	0	0	A09	-	1	-
M.I.5	Pemeriksaan Follow up Lensa Kontak	-	0	0	150000	0	0	0	150000	0	0	A09	-	1	-
M.I.50	Rekonstruksi palpebra > 50 %	-	0	0	1000000	0	0	0	1000000	0	0	A09	-	1	-
M.I.7	Oklusi Punctum dengan Silicone Plug	-	0	0	300000	0	0	0	300000	0	0	A09	-	1	-
M.I.8	Eksisi Chalazion,Hordeolum	-	0	0	750000	0	0	0	750000	0	0	A09	-	1	-
M.I.9	Corpus Alineum dengan Operaring Microsope	-	0	0	750000	0	0	0	750000	0	0	A09	-	1	-
M.II.04	Encrasi/Enuklasi + Implant	K2	0	0	2750000	0	0	0	2750000	0	2750000	A09	K2	1	-
M.II.09	Encrasi/Enuklasi	K2	0	0	2200000	0	0	0	2200000	0	2200000	A09	K2	1	-
M.II.1	Biometri	-	0	0	21250	0	0	0	21250	0	0	A09	-	1	-
M.II.10	Laser	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
M.II.11	Laser Irodotomy	-	0	0	510000	0	0	0	510000	0	0	A09	-	1	-
M.II.12	Angkat Jahitan Kornea	-	0	0	595000	0	0	0	595000	0	0	A09	-	1	-
M.II.13	Aspirasi, Irigasi, Reformasi COA	-	0	0	595000	0	0	0	595000	0	0	A09	-	1	-
M.II.14	Eksisi Pterigium	-	0	0	1105000	0	0	0	1105000	0	0	A09	-	1	-
M.II.15	Ektraksi Corpus Alienum Segmen Anterior	-	0	0	1615000	0	0	0	1615000	0	0	A09	-	1	-
M.II.16	Extirpasi corpus conjuntita,korneaq	-	0	0	127500	0	0	0	127500	0	0	A09	-	1	-
M.II.17	Linasi hordoolum	-	0	0	255000	0	0	0	255000	0	0	A09	-	1	-
M.II.18	Irigasi spooling	-	0	0	127500	0	0	0	127500	0	0	A09	-	1	-
M.II.19	Copius irigasi	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
M.II.2	Foto Fundus	-	0	0	21250	0	0	0	21250	0	0	A09	-	1	-
M.II.20	Injeksi subconjuntivita	-	0	0	127500	0	0	0	127500	0	0	A09	-	1	-
M.II.21	E.Bulumata	-	0	0	85000	0	0	0	85000	0	0	A09	-	1	-
M.II.22	Extirpasi pterigium	-	0	0	510000	0	0	0	510000	0	0	A09	-	1	-
M.II.23	Screpping conjuntiva,kornea	-	0	0	127500	0	0	0	127500	0	0	A09	-	1	-
M.II.24	Extirpasi benda asing conjuntiva	-	0	0	425000	0	0	0	425000	0	0	A09	-	1	-
M.II.25	Insisi hordeolum , abses palpebra	-	0	0	637500	0	0	0	637500	0	0	A09	-	1	-
M.II.26	Tarso rafi	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
M.II.27	Exsisi pterigym b skelra	-	0	0	510000	0	0	0	510000	0	0	A09	-	1	-
M.II.28	Paraseentese BM	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
M.II.29	Iredektomi	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
M.II.3	Refraksi	-	0	0	21250	0	0	0	21250	0	0	A09	-	1	-
M.II.30	Laserasi palpebra simple ( < 20 % )	-	0	0	595000	0	0	0	595000	0	0	A09	-	1	-
M.II.31	Reposisi Iris	-	0	0	637500	0	0	0	637500	0	0	A09	-	1	-
M.II.32	Aspirasi sisa massa lensa	-	0	0	637500	0	0	0	637500	0	0	A09	-	1	-
M.II.33	Aspirasi hipopion	-	0	0	637500	0	0	0	637500	0	0	A09	-	1	-
M.II.34	Biopsi tumor	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
M.II.35	Ekstirpasi kista ,granuloma	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
M.II.36	Enukleasi	-	0	0	1700000	0	0	0	1700000	0	0	A09	-	1	-
M.II.38	Trabekuloktomi	-	0	0	2125000	0	0	0	2125000	0	0	A09	-	1	-
M.II.39	Buckle	-	0	0	1700000	0	0	0	1700000	0	0	A09	-	1	-
M.II.40	Rekonstrksi sederhana	-	0	0	1700000	0	0	0	1700000	0	0	A09	-	1	-
M.II.41	Konjuntiolplasti , Flap	-	0	0	1275000	0	0	0	1275000	0	0	A09	-	1	-
M.II.42	Jahit kornea	-	0	0	1275000	0	0	0	1275000	0	0	A09	-	1	-
M.II.43	Insersi OL sekunder	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
M.II.44	Operasi strabismus per otot	-	0	0	2125000	0	0	0	2125000	0	0	A09	-	1	-
M.II.45	Sics	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
M.II.46	Fekomilkfisi	-	0	0	2125000	0	0	0	2125000	0	0	A09	-	1	-
M.II.47	Bleparoplasty	-	0	0	2125000	0	0	0	2125000	0	0	A09	-	1	-
M.II.48	Insisi,Enukleasi, inplant	-	0	0	2125000	0	0	0	2125000	0	0	A09	-	1	-
M.II.49	Ptosis berat	-	0	0	2550000	0	0	0	2550000	0	0	A09	-	1	-
M.II.5	Pemeriksaan Follow up Lensa Kontak	-	0	0	127500	0	0	0	127500	0	0	A09	-	1	-
M.II.50	Rekonstruksi palpebra > 50 %	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
M.II.7	Oklusi Punctum dengan Silicone Plug	-	0	0	255000	0	0	0	255000	0	0	A09	-	1	-
M.II.8	Eksisi Chalazion,Hordeolum	-	0	0	637500	0	0	0	637500	0	0	A09	-	1	-
M.II.9	Corpus Alineum dengan Operaring Microsope	-	0	0	637500	0	0	0	637500	0	0	A09	-	1	-
M.III.010	Encrasi/Enuklasi	K3	0	0	2100000	0	0	0	2100000	0	2100000	A09	K3	1	-
M.III.05	Encrasi/Enuklasi + Implant	K3	0	0	2625000	0	0	0	2625000	0	2625000	A09	K3	1	-
M.III.1	Biometri	-	0	0	18062.5	0	0	0	18062.5	0	0	A09	-	1	-
M.III.10	Laser	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
M.III.11	Laser Irodotomy	-	0	0	433500	0	0	0	433500	0	0	A09	-	1	-
M.III.12	Angkat Jahitan Kornea	-	0	0	505750	0	0	0	505750	0	0	A09	-	1	-
M.III.13	Aspirasi, Irigasi, Reformasi COA	-	0	0	505750	0	0	0	505750	0	0	A09	-	1	-
M.III.14	Eksisi Pterigium	-	0	0	939250	0	0	0	939250	0	0	A09	-	1	-
M.III.15	Ektraksi Corpus Alienum Segmen Anterior	-	0	0	1372750	0	0	0	1372750	0	0	A09	-	1	-
M.III.16	Extirpasi corpus conjuntita,korneaq	-	0	0	108375	0	0	0	108375	0	0	A09	-	1	-
M.III.17	Linasi hordoolum	-	0	0	216750	0	0	0	216750	0	0	A09	-	1	-
M.III.18	Irigasi spooling	-	0	0	108375	0	0	0	108375	0	0	A09	-	1	-
M.III.19	Copius irigasi	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
M.III.2	Foto Fundus	-	0	0	18062.5	0	0	0	18062.5	0	0	A09	-	1	-
M.III.20	Injeksi subconjuntivita	-	0	0	108375	0	0	0	108375	0	0	A09	-	1	-
M.III.21	E.Bulumata	-	0	0	72250	0	0	0	72250	0	0	A09	-	1	-
M.III.22	Extirpasi pterigium	-	0	0	433500	0	0	0	433500	0	0	A09	-	1	-
M.III.23	Screpping conjuntiva,kornea	-	0	0	108375	0	0	0	108375	0	0	A09	-	1	-
M.III.24	Extirpasi benda asing conjuntiva	-	0	0	361250	0	0	0	361250	0	0	A09	-	1	-
M.III.25	Insisi hordeolum , abses palpebra	-	0	0	541875	0	0	0	541875	0	0	A09	-	1	-
M.III.26	Tarso rafi	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
M.III.27	Exsisi pterigym b skelra	-	0	0	433500	0	0	0	433500	0	0	A09	-	1	-
M.III.28	Paraseentese BM	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
M.III.29	Iredektomi	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
M.III.3	Refraksi	-	0	0	18062.5	0	0	0	18062.5	0	0	A09	-	1	-
M.III.30	Laserasi palpebra simple ( < 20 % )	-	0	0	505750	0	0	0	505750	0	0	A09	-	1	-
M.III.31	Reposisi Iris	-	0	0	541875	0	0	0	541875	0	0	A09	-	1	-
M.III.32	Aspirasi sisa massa lensa	-	0	0	541875	0	0	0	541875	0	0	A09	-	1	-
M.III.33	Aspirasi hipopion	-	0	0	541875	0	0	0	541875	0	0	A09	-	1	-
M.III.34	Biopsi tumor	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
M.III.35	Ekstirpasi kista ,granuloma	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
M.III.36	Enukleasi	-	0	0	1445000	0	0	0	1445000	0	0	A09	-	1	-
M.III.38	Trabekuloktomi	-	0	0	1806250	0	0	0	1806250	0	0	A09	-	1	-
M.III.39	Buckle	-	0	0	1445000	0	0	0	1445000	0	0	A09	-	1	-
M.III.40	Rekonstrksi sederhana	-	0	0	1445000	0	0	0	1445000	0	0	A09	-	1	-
M.III.41	Konjuntiolplasti , Flap	-	0	0	1083750	0	0	0	1083750	0	0	A09	-	1	-
M.III.42	Jahit kornea	-	0	0	1083750	0	0	0	1083750	0	0	A09	-	1	-
M.III.43	Insersi OL sekunder	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
M.III.44	Operasi strabismus per otot	-	0	0	1806250	0	0	0	1806250	0	0	A09	-	1	-
M.III.45	Sics	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
M.III.46	Fekomilkfisi	-	0	0	1806250	0	0	0	1806250	0	0	A09	-	1	-
M.III.47	Bleparoplasty	-	0	0	1806250	0	0	0	1806250	0	0	A09	-	1	-
M.III.48	Insisi,Enukleasi, inplant	-	0	0	1806250	0	0	0	1806250	0	0	A09	-	1	-
M.III.49	Ptosis berat	-	0	0	2167500	0	0	0	2167500	0	0	A09	-	1	-
M.III.5	Pemeriksaan Follow up Lensa Kontak	-	0	0	108375	0	0	0	108375	0	0	A09	-	1	-
M.III.50	Rekonstruksi palpebra > 50 %	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
M.III.7	Oklusi Punctum dengan Silicone Plug	-	0	0	216750	0	0	0	216750	0	0	A09	-	1	-
M.III.8	Eksisi Chalazion,Hordeolum	-	0	0	541875	0	0	0	541875	0	0	A09	-	1	-
M.III.9	Corpus Alineum dengan Operaring Microsope	-	0	0	541875	0	0	0	541875	0	0	A09	-	1	-
M.ODC.001	Irislektomi	OV	0	0	1000000	0	0	0	1000000	0	1000000	A09	KO	1	-
M.ODC.1	Biometri	-	0	0	150000	0	0	0	150000	0	150000	A09	KO	1	-
M.ODC.10	Laser	-	0	0	614125	0	0	0	614125	0	0	A09	-	1	-
M.ODC.11	Laser Irodotomy	-	0	0	368475	0	0	0	368475	0	0	A09	-	1	-
M.ODC.12	Angkat Jahitan Kornea	-	0	0	429887.5	0	0	0	429887.5	0	0	A09	-	1	-
M.ODC.13	Aspirasi, Irigasi, Reformasi COA	-	0	0	429887.5	0	0	0	429887.5	0	0	A09	-	1	-
M.ODC.14	Eksisi Pterigium	-	0	0	798362.5	0	0	0	798362.5	0	0	A09	-	1	-
M.ODC.15	Ektraksi Katarak ECCE/ICCE	-	0	0	2000000	0	0	0	2000000	0	2000000	A09	KO	1	-
M.ODC.16	Extirpasi corpus conjuntita,korneaq	-	0	0	92118.75	0	0	0	92118.75	0	0	A09	-	1	-
M.ODC.17	Linasi hordoolum	-	0	0	184237.5	0	0	0	184237.5	0	0	A09	-	1	-
M.ODC.18	Irigasi spooling	-	0	0	92118.75	0	0	0	92118.75	0	0	A09	-	1	-
M.ODC.19	Copius irigasi	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
M.ODC.2	Foto Fundus	-	0	0	15353.125	0	0	0	15353.125	0	0	A09	-	1	-
M.ODC.20	Injeksi subconjuntivita	-	0	0	150000	0	0	0	150000	0	150000	A09	KO	1	-
M.ODC.21	E.Bulumata	-	0	0	61412.5	0	0	0	61412.5	0	0	A09	-	1	-
M.ODC.22	Extirpasi pterigium	-	0	0	368475	0	0	0	368475	0	0	A09	-	1	-
M.ODC.23	Screpping conjuntiva,kornea	-	0	0	92118.75	0	0	0	92118.75	0	0	A09	-	1	-
M.ODC.24	Exterpasi benda asing conjuntiva / Kornea	-	0	0	150000	0	0	0	150000	0	150000	A09	KO	1	-
M.ODC.25	Insisi hordeolum , abses palpebra	-	0	0	460593.75	0	0	0	460593.75	0	0	A09	-	1	-
M.ODC.26	Tarso rafi	-	0	0	1000000	0	0	0	1000000	0	1000000	A09	KO	1	-
M.ODC.27	Exsisi pterigym b skelra	-	0	0	368475	0	0	0	368475	0	0	A09	-	1	-
M.ODC.28	Paraseentese BM	-	0	0	614125	0	0	0	614125	0	0	A09	-	1	-
M.ODC.29	Iredektomi	-	0	0	614125	0	0	0	614125	0	0	A09	-	1	-
M.ODC.3	Refraksi	-	0	0	15353.125	0	0	0	15353.125	0	0	A09	-	1	-
M.ODC.30	Laserasi Palpebra  ( > 20 % / < 50 % )	-	0	0	2000000	0	0	0	2000000	0	2000000	A09	KO	1	-
M.ODC.31	Reposisi Iris (Post Operasi)	-	0	0	750000	0	0	0	750000	0	750000	A09	KO	1	-
M.ODC.32	Aspirasi sisa massa lensa (Post operasi)	-	0	0	750000	0	0	0	750000	0	750000	A09	KO	1	-
M.ODC.33	Aspirasi hipopion / Hifema	-	0	0	750000	0	0	0	750000	0	750000	A09	KO	1	-
M.ODC.34	Biopsi tumor	-	0	0	1000000	0	0	0	1000000	0	1000000	A09	KO	1	-
M.ODC.35	Ekstirpasi kista ,granuloma	-	0	0	614125	0	0	0	614125	0	0	A09	-	1	-
M.ODC.36	Enukleasi	-	0	0	2000000	0	0	0	2000000	0	2000000	A09	KO	1	-
M.ODC.38	Trobekuloktomi	-	0	0	1500000	0	0	0	1500000	0	1500000	A09	KO	1	-
M.ODC.39	Operasi Sederhana Ablatio Retina (Ensirkling/Buckle)	-	0	0	2500000	0	0	0	2500000	0	2500000	A09	KO	1	-
M.ODC.4	Funduscopy	-	0	0	100000	0	0	0	100000	0	100000	A09	KO	1	-
M.ODC.40	Rekonstrksi sederhana	-	0	0	2500000	0	0	0	2500000	0	2500000	A09	KO	1	-
M.ODC.41	Konjuntiolplasti , Flap	-	0	0	921187.5	0	0	0	921187.5	0	0	A09	-	1	-
M.ODC.42	Jahit kornea	-	0	0	921187.5	0	0	0	921187.5	0	0	A09	-	1	-
M.ODC.43	Insersi OL sekunder	-	0	0	614125	0	0	0	614125	0	0	A09	-	1	-
M.ODC.44	Operasi strabismus per otot	-	0	0	1535312.5	0	0	0	1535312.5	0	0	A09	-	1	-
M.ODC.45	Ekstripasi Kista / Gronuloma	OV	0	0	1500000	0	0	0	1500000	0	1500000	A09	KO	1	-
M.ODC.46	Fekomilkfisi	-	0	0	1535312.5	0	0	0	1535312.5	0	0	A09	-	1	-
M.ODC.47	Bleparoplasty	-	0	0	1535312.5	0	0	0	1535312.5	0	0	A09	-	1	-
M.ODC.48	Insisi,Enukleasi, inplant	-	0	0	1535312.5	0	0	0	1535312.5	0	0	A09	-	1	-
M.ODC.49	Ptosis berat	-	0	0	3000000	0	0	0	3000000	0	3000000	A09	KO	1	-
M.ODC.5	Pemeriksaan Follow up Lensa Kontak	-	0	0	92118.75	0	0	0	92118.75	0	0	A09	-	1	-
M.ODC.50	Rekonstruksi Palpebra > 50 %	-	0	0	3000000	0	0	0	3000000	0	3000000	A09	KO	1	-
M.ODC.6	Epilasi Bulu Mata	-	0	0	150000	0	0	0	150000	0	150000	A09	KO	1	-
M.ODC.7	Oklusi Punctum dengan Silicone Plug	-	0	0	184237.5	0	0	0	184237.5	0	0	A09	-	1	-
M.ODC.8	Eksisi Chalazion,Hordeolum	-	0	0	460593.75	0	0	0	460593.75	0	0	A09	-	1	-
M.ODC.9	Corpus Alineum dengan Operaring Microsope	-	0	0	460593.75	0	0	0	460593.75	0	0	A09	-	1	-
M.VIP.02	Encrasi/Enuklasi + Implant	KVIP	0	0	3000000	0	0	0	3000000	0	3000000	A09	VIP	1	-
M.VIP.07	Encrasi/Enuklasi	KVIP	0	0	2400000	0	0	0	2400000	0	2400000	A09	VIP	1	-
M.VIP.1	Biometri	-	0	0	28750	0	0	0	28750	0	0	A09	-	1	-
M.VIP.10	Laser	-	0	0	1150000	0	0	0	1150000	0	0	A09	-	1	-
M.VIP.11	Laser Irodotomy	-	0	0	690000	0	0	0	690000	0	0	A09	-	1	-
M.VIP.12	Angkat Jahitan Kornea	-	0	0	805000	0	0	0	805000	0	0	A09	-	1	-
M.VIP.13	Aspirasi, Irigasi, Reformasi COA	-	0	0	805000	0	0	0	805000	0	0	A09	-	1	-
M.VIP.14	Eksisi Pterigium	-	0	0	1495000	0	0	0	1495000	0	0	A09	-	1	-
M.VIP.15	Ektraksi Corpus Alienum Segmen Anterior	-	0	0	2185000	0	0	0	2185000	0	0	A09	-	1	-
M.VIP.16	Extirpasi corpus conjuntita,korneaq	-	0	0	172500	0	0	0	172500	0	0	A09	-	1	-
M.VIP.17	Linasi hordoolum	-	0	0	345000	0	0	0	345000	0	0	A09	-	1	-
M.VIP.18	Irigasi spooling	-	0	0	172500	0	0	0	172500	0	0	A09	-	1	-
M.VIP.19	Copius irigasi	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
M.VIP.2	Foto Fundus	-	0	0	28750	0	0	0	28750	0	0	A09	-	1	-
M.VIP.20	Injeksi subconjuntivita	-	0	0	172500	0	0	0	172500	0	0	A09	-	1	-
M.VIP.21	E.Bulumata	-	0	0	115000	0	0	0	115000	0	0	A09	-	1	-
M.VIP.22	Extirpasi pterigium	-	0	0	690000	0	0	0	690000	0	0	A09	-	1	-
M.VIP.23	Screpping conjuntiva,kornea	-	0	0	172500	0	0	0	172500	0	0	A09	-	1	-
M.VIP.24	Extirpasi benda asing conjuntiva	-	0	0	575000	0	0	0	575000	0	0	A09	-	1	-
M.VIP.25	Insisi hordeolum , abses palpebra	-	0	0	862500	0	0	0	862500	0	0	A09	-	1	-
M.VIP.26	Tarso rafi	-	0	0	1150000	0	0	0	1150000	0	0	A09	-	1	-
M.VIP.27	Exsisi pterigym b skelra	-	0	0	690000	0	0	0	690000	0	0	A09	-	1	-
M.VIP.28	Paraseentese BM	-	0	0	1150000	0	0	0	1150000	0	0	A09	-	1	-
M.VIP.29	Iredektomi	-	0	0	1150000	0	0	0	1150000	0	0	A09	-	1	-
M.VIP.3	Refraksi	-	0	0	28750	0	0	0	28750	0	0	A09	-	1	-
M.VIP.30	Laserasi palpebra simple ( < 20 % )	-	0	0	805000	0	0	0	805000	0	0	A09	-	1	-
M.VIP.31	Reposisi Iris	-	0	0	862500	0	0	0	862500	0	0	A09	-	1	-
M.VIP.32	Aspirasi sisa massa lensa	-	0	0	862500	0	0	0	862500	0	0	A09	-	1	-
M.VIP.33	Aspirasi hipopion	-	0	0	862500	0	0	0	862500	0	0	A09	-	1	-
M.VIP.34	Biopsi tumor	-	0	0	1150000	0	0	0	1150000	0	0	A09	-	1	-
M.VIP.35	Ekstirpasi kista ,granuloma	-	0	0	1150000	0	0	0	1150000	0	0	A09	-	1	-
M.VIP.36	Enukleasi	-	0	0	2300000	0	0	0	2300000	0	0	A09	-	1	-
M.VIP.38	Trabekuloktomi	-	0	0	2875000	0	0	0	2875000	0	0	A09	-	1	-
M.VIP.39	Buckle	-	0	0	2300000	0	0	0	2300000	0	0	A09	-	1	-
M.VIP.40	Rekonstrksi sederhana	-	0	0	2300000	0	0	0	2300000	0	0	A09	-	1	-
M.VIP.41	Konjuntiolplasti , Flap	-	0	0	1725000	0	0	0	1725000	0	0	A09	-	1	-
M.VIP.42	Jahit kornea	-	0	0	1725000	0	0	0	1725000	0	0	A09	-	1	-
M.VIP.43	Insersi OL sekunder	-	0	0	1150000	0	0	0	1150000	0	0	A09	-	1	-
M.VIP.44	Operasi strabismus per otot	-	0	0	2875000	0	0	0	2875000	0	0	A09	-	1	-
M.VIP.45	Sics	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
M.VIP.46	Fekomilkfisi	-	0	0	2875000	0	0	0	2875000	0	0	A09	-	1	-
M.VIP.47	Bleparoplasty	-	0	0	2875000	0	0	0	2875000	0	0	A09	-	1	-
M.VIP.48	Insisi,Enukleasi, inplant	-	0	0	2875000	0	0	0	2875000	0	0	A09	-	1	-
M.VIP.49	Ptosis berat	-	0	0	3450000	0	0	0	3450000	0	0	A09	-	1	-
M.VIP.5	Pemeriksaan Follow up Lensa Kontak	-	0	0	172500	0	0	0	172500	0	0	A09	-	1	-
M.VIP.50	Rekonstruksi palpebra > 50 %	-	0	0	1150000	0	0	0	1150000	0	0	A09	-	1	-
M.VIP.7	Oklusi Punctum dengan Silicone Plug	-	0	0	345000	0	0	0	345000	0	0	A09	-	1	-
M.VIP.8	Eksisi Chalazion,Hordeolum	-	0	0	862500	0	0	0	862500	0	0	A09	-	1	-
M.VIP.9	Corpus Alineum dengan Operaring Microsope	-	0	0	862500	0	0	0	862500	0	0	A09	-	1	-
M.VVIP.01	Encrasi/Enuklasi + Implant	KVVIP	0	0	3125000	0	0	0	3125000	0	3125000	A09	VVIP	1	-
M.VVIP.06	Encrasi/Enuklasi	KVVIP	0	0	2500000	0	0	0	2500000	0	2500000	A09	VVIP	1	-
M.VVIP.1	Biometri	-	0	0	33062.5	0	0	0	33062.5	0	0	A09	-	1	-
M.VVIP.10	Laser	-	0	0	1322500	0	0	0	1322500	0	0	A09	-	1	-
M.VVIP.11	Laser Irodotomy	-	0	0	793500	0	0	0	793500	0	0	A09	-	1	-
M.VVIP.12	Angkat Jahitan Kornea	-	0	0	925750	0	0	0	925750	0	0	A09	-	1	-
M.VVIP.13	Aspirasi, Irigasi, Reformasi COA	-	0	0	925750	0	0	0	925750	0	0	A09	-	1	-
M.VVIP.14	Eksisi Pterigium	-	0	0	1719250	0	0	0	1719250	0	0	A09	-	1	-
M.VVIP.15	Ektraksi Corpus Alienum Segmen Anterior	-	0	0	2512750	0	0	0	2512750	0	0	A09	-	1	-
M.VVIP.16	Extirpasi corpus conjuntita,korneaq	-	0	0	198375	0	0	0	198375	0	0	A09	-	1	-
M.VVIP.17	Linasi hordoolum	-	0	0	396750	0	0	0	396750	0	0	A09	-	1	-
M.VVIP.18	Irigasi spooling	-	0	0	198375	0	0	0	198375	0	0	A09	-	1	-
M.VVIP.19	Copius irigasi	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
M.VVIP.2	Foto Fundus	-	0	0	33062.5	0	0	0	33062.5	0	0	A09	-	1	-
M.VVIP.20	Injeksi subconjuntivita	-	0	0	198375	0	0	0	198375	0	0	A09	-	1	-
M.VVIP.21	E.Bulumata	-	0	0	132250	0	0	0	132250	0	0	A09	-	1	-
M.VVIP.22	Extirpasi pterigium	-	0	0	793500	0	0	0	793500	0	0	A09	-	1	-
M.VVIP.23	Screpping conjuntiva,kornea	-	0	0	198375	0	0	0	198375	0	0	A09	-	1	-
M.VVIP.24	Extirpasi benda asing conjuntiva	-	0	0	661250	0	0	0	661250	0	0	A09	-	1	-
M.VVIP.25	Insisi hordeolum , abses palpebra	-	0	0	991875	0	0	0	991875	0	0	A09	-	1	-
M.VVIP.26	Tarso rafi	-	0	0	1322500	0	0	0	1322500	0	0	A09	-	1	-
M.VVIP.27	Exsisi pterigym b skelra	-	0	0	793500	0	0	0	793500	0	0	A09	-	1	-
M.VVIP.28	Paraseentese BM	-	0	0	1322500	0	0	0	1322500	0	0	A09	-	1	-
M.VVIP.29	Iredektomi	-	0	0	1322500	0	0	0	1322500	0	0	A09	-	1	-
M.VVIP.3	Refraksi	-	0	0	33062.5	0	0	0	33062.5	0	0	A09	-	1	-
M.VVIP.30	Laserasi palpebra simple ( < 20 % )	-	0	0	925750	0	0	0	925750	0	0	A09	-	1	-
M.VVIP.31	Reposisi Iris	-	0	0	991875	0	0	0	991875	0	0	A09	-	1	-
M.VVIP.32	Aspirasi sisa massa lensa	-	0	0	991875	0	0	0	991875	0	0	A09	-	1	-
M.VVIP.33	Aspirasi hipopion	-	0	0	991875	0	0	0	991875	0	0	A09	-	1	-
M.VVIP.34	Biopsi tumor	-	0	0	1322500	0	0	0	1322500	0	0	A09	-	1	-
M.VVIP.35	Ekstirpasi kista ,granuloma	-	0	0	1322500	0	0	0	1322500	0	0	A09	-	1	-
M.VVIP.36	Enukleasi	-	0	0	2645000	0	0	0	2645000	0	0	A09	-	1	-
M.VVIP.38	Trabekuloktomi	-	0	0	3306250	0	0	0	3306250	0	0	A09	-	1	-
M.VVIP.39	Buckle	-	0	0	2645000	0	0	0	2645000	0	0	A09	-	1	-
M.VVIP.40	Rekonstrksi sederhana	-	0	0	2645000	0	0	0	2645000	0	0	A09	-	1	-
M.VVIP.41	Konjuntiolplasti , Flap	-	0	0	1983750	0	0	0	1983750	0	0	A09	-	1	-
M.VVIP.42	Jahit kornea	-	0	0	1983750	0	0	0	1983750	0	0	A09	-	1	-
M.VVIP.43	Insersi OL sekunder	-	0	0	1322500	0	0	0	1322500	0	0	A09	-	1	-
M.VVIP.44	Operasi strabismus per otot	-	0	0	3306250	0	0	0	3306250	0	0	A09	-	1	-
M.VVIP.45	Sics	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
M.VVIP.46	Fekomilkfisi	-	0	0	3306250	0	0	0	3306250	0	0	A09	-	1	-
M.VVIP.47	Bleparoplasty	-	0	0	3306250	0	0	0	3306250	0	0	A09	-	1	-
M.VVIP.48	Insisi,Enukleasi, inplant	-	0	0	3306250	0	0	0	3306250	0	0	A09	-	1	-
M.VVIP.49	Ptosis berat	-	0	0	3967500	0	0	0	3967500	0	0	A09	-	1	-
M.VVIP.5	Pemeriksaan Follow up Lensa Kontak	-	0	0	198375	0	0	0	198375	0	0	A09	-	1	-
M.VVIP.50	Rekonstruksi palpebra > 50 %	-	0	0	1322500	0	0	0	1322500	0	0	A09	-	1	-
M.VVIP.7	Oklusi Punctum dengan Silicone Plug	-	0	0	396750	0	0	0	396750	0	0	A09	-	1	-
M.VVIP.8	Eksisi Chalazion,Hordeolum	-	0	0	991875	0	0	0	991875	0	0	A09	-	1	-
M.VVIP.9	Corpus Alineum dengan Operaring Microsope	-	0	0	991875	0	0	0	991875	0	0	A09	-	1	-
NICU.001	Pasang Infus Tali Pusat	K.BY	60000	0	0	50000	0	0	0	110000	110000	A09	NICU	1	-
NICU.002	Pasang OGT/ NGT	K.BY	35000	0	0	40000	0	0	0	75000	75000	A09	NICU	1	-
NICU.003	Pasang CPAP	-	100000	0	0	0	0	0	100000	100000	100000	A09	ICU	1	-
NICU.005	Imunisasi Hyperheb 	K.BY	75000	0	125000	0	0	0	200000	75000	200000	A09	NICU	1	-
NICU.006	Suction Bayi	K.BY	60000	0	0	0	0	0	60000	60000	60000	A09	NICU	1	-
NICU.007	Pasang CPAP	-	100000	0	0	0	0	0	100000	100000	100000	A09	NICU	1	-
NICU.008	Imunisasi Hepatitis B	K.BY	75000	0	125000	0	0	0	200000	75000	200000	A09	NICU	1	-
NICU.013	Konsultasi, Via Telpon Dokter Spesialis	K.BY	0	0	75000	0	0	0	75000	0	75000	A09	NICU	1	-
ODC.OK.01	Paket lensa 1 	OV	0	0	1200000	0	0	0	1200000	0	1200000	A09	KO	1	-
ODC.OK.02	Paket lensa 2	OV	0	0	2400000	0	0	0	2400000	0	2400000	A09	KO	1	-
ODC.OK.03	Jasa Asisten Operasi Mata	OV	0	0	0	350000	0	0	0	350000	350000	A09	KO	1	-
ODC.OK.04	Visite Dokter Spesialis	OV	0	0	90000	0	0	0	90000	0	90000	A09	KO	1	-
OG.I.001	Jasa Operasi Miomektomi/Kista ( CITO )	K1	0	0	3750000	0	0	0	3750000	0	3750000	A09	K1	1	-
OG.I.002	jasa Anastesi Operasi Miomektomi/Kista ( CITO )	K1	0	0	1125000	0	0	0	1125000	0	1125000	A09	K1	1	-
OG.I.1	Pasang IUD	K1	0	0	0	0	0	0	0	0	0	A09	K1	1	-
OG.I.10	Inseminasi	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
OG.I.100	Jasa Operator Operasi Histerektomi	K1	0	0	3250000	0	0	0	3250000	0	3250000	A09	K1	1	-
OG.I.101	Jasa Operasi Miomektomi/Kista	K1	0	0	3000000	0	0	0	3000000	0	3000000	A09	K1	1	-
OG.I.102	Adhesiolisis Perlekatan Berat   	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.103	Reseksi Endometriosis	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.104	Reseksi Adenomiosis	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.105	Histeroskopi Operatif	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.106	Rekanalisasi Tuba	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.107	Laparaskopi Histerektomi Radikal	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.108	Laparaskopi Histerektomi, Kistektomi, Adesiolisis Berat	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.109	Onkologi	-	0	0	5100000	0	0	0	5100000	0	0	A09	-	1	-
OG.I.11	Swim Up Sperma + Inseminasi	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
OG.I.12	Histeroskopi Office	-	0	0	500000	0	0	0	500000	0	0	A09	-	1	-
OG.I.13	Kriosurgery	-	0	0	225000	0	0	0	225000	0	0	A09	-	1	-
OG.I.14	Irigasi, Vaginal Toilet	-	0	0	150000	0	0	0	150000	0	0	A09	-	1	-
OG.I.16	Punksi Cavum Douglas	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
OG.I.17	Pasang + Laminaria	-	0	0	150000	0	0	0	150000	0	0	A09	-	1	-
OG.I.18	Dressing Luka Operasi	K1	0	0	200000	0	0	0	200000	0	0	A09	K1	1	-
OG.I.19	Podofilin	-	0	0	75000	0	0	0	75000	0	0	A09	-	1	-
OG.I.2	Ektraksi IUD	-	0	0	75000	0	0	0	75000	0	0	A09	-	1	-
OG.I.20	Pasang Pesarium	-	0	0	150000	0	0	0	150000	0	0	A09	-	1	-
OG.I.21	Swab Vagina	-	0	0	75000	0	0	0	75000	0	0	A09	-	1	-
OG.I.22	Ektripasi Polip	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
OG.I.23	Pasang, Angkat Tampon	-	0	0	75000	0	0	0	75000	0	0	A09	-	1	-
OG.I.24	Suntik KB,Obat,Vaksin	-	0	0	30000	0	0	0	30000	0	0	A09	-	1	-
OG.I.25	Dasar	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
OG.I.27	Khusus (Intervensi)	-	0	0	775000	0	0	0	775000	0	0	A09	-	1	-
OG.I.28	Induksi,Akselerasi Persalinan	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
OG.I.29	Partus Normal Oleh Dokter	K1	0	0	1750000	0	0	0	1750000	0	0	A09	K1	1	-
OG.I.3	Pasang Implant	-	0	0	75000	0	0	0	75000	0	0	A09	-	1	-
OG.I.31	Manual Plasenta Post Partum	-	0	0	350000	0	0	0	350000	0	0	A09	-	1	-
OG.I.32	Manual Plasenta	K1	0	0	450000	0	0	0	450000	0	450000	A09	K1	1	-
OG.I.33	Jahitan Ruptur Perineum Grade 3-4 Post Partum, Robekan Serviks	-	0	0	1000000	0	0	0	1000000	0	0	A09	-	1	-
OG.I.34	Persalinan dengan Embryotomi	-	0	0	0	0	0	0	0	0	0	A09	K1	1	-
OG.I.36	Sectio Caesaria tanpa penyulit	-	0	0	2500000	0	0	0	2500000	0	2500000	A09	K1	1	-
OG.I.38	Jasa Operator Section Caesaria cito	K1	0	0	3125000	0	0	0	3125000	0	3125000	A09	K1	1	-
OG.I.39	Operasi Obstetri Khusus (Plasenta Akreta)	-	0	0	3300000	0	0	0	3300000	0	0	A09	-	1	-
OG.I.4	Aff Implan	-	0	0	100000	0	0	0	100000	0	0	A09	-	1	-
OG.I.40	Sistoskopi LEETZ	-	0	0	750000	0	0	0	750000	0	0	A09	-	1	-
OG.I.41	Kista Bartholin, Kista Gartner	-	0	0	750000	0	0	0	750000	0	0	A09	-	1	-
OG.I.42	Konisasi	-	0	0	750000	0	0	0	750000	0	0	A09	-	1	-
OG.I.43	Ekstraksi IUD dengan anestesi	-	0	0	900000	0	0	0	900000	0	0	A09	-	1	-
OG.I.44	Polip serviks	-	0	0	900000	0	0	0	900000	0	0	A09	-	1	-
OG.I.45	Kauterisasi kondiloma akuminata	-	0	0	900000	0	0	0	900000	0	0	A09	-	1	-
OG.I.46	Penjahitan Laserasi ringan	-	0	0	900000	0	0	0	900000	0	0	A09	-	1	-
OG.I.47	Drainase Abses	-	0	0	900000	0	0	0	900000	0	0	A09	-	1	-
OG.I.48	Shirodkar	-	0	0	900000	0	0	0	900000	0	0	A09	-	1	-
OG.I.49	Kolpotomi pada abses cavum Douglas	-	0	0	900000	0	0	0	900000	0	0	A09	-	1	-
OG.I.5	Kolposkopi	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
OG.I.50	Ekstirpasi	-	0	0	1000000	0	0	0	1000000	0	0	A09	-	1	-
OG.I.52	Robekan Serviks, Forniks	-	0	0	1000000	0	0	0	1000000	0	0	A09	-	1	-
OG.I.53	Hematoma,Ruptur	-	0	0	1000000	0	0	0	1000000	0	0	A09	-	1	-
OG.I.54	Histerorafi	-	0	0	1000000	0	0	0	1000000	0	0	A09	-	1	-
OG.I.55	Kolporafi Anterior	-	0	0	1800000	0	0	0	1800000	0	0	A09	-	1	-
OG.I.56	Kolporafi Posterior	-	0	0	1800000	0	0	0	1800000	0	0	A09	-	1	-
OG.I.57	Repair Fistula	-	0	0	2600000	0	0	0	2600000	0	0	A09	-	1	-
OG.I.58	Vaginoplasti	-	0	0	2600000	0	0	0	2600000	0	0	A09	-	1	-
OG.I.59	Rekonstruksi Vagina	-	0	0	2600000	0	0	0	2600000	0	0	A09	-	1	-
OG.I.6	Kardiotokografi	-	0	0	150000	0	0	0	150000	0	0	A09	-	1	-
OG.I.60	Histerektomi Pervaginam + Kolpoperineoplasti	-	0	0	2600000	0	0	0	2600000	0	0	A09	-	1	-
OG.I.61	Purandare	-	0	0	2600000	0	0	0	2600000	0	0	A09	-	1	-
OG.I.62	Penyulit + 50%	-	0	0	2600000	0	0	0	2600000	0	0	A09	-	1	-
OG.I.63	Jasa Operator Tubectomy	K1	0	0	1750000	0	0	0	1750000	0	1750000	A09	K1	1	-
OG.I.64	Kemoterapi	-	0	0	350000	0	0	0	350000	0	0	A09	-	1	-
OG.I.65	Kehamilan Ektopik	-	0	0	1955000	0	0	0	1955000	0	0	A09	-	1	-
OG.I.67	Kistektomi	-	0	0	1955000	0	0	0	1955000	0	0	A09	-	1	-
OG.I.68	Salpingo-ooforektomi	-	0	0	1955000	0	0	0	1955000	0	0	A09	-	1	-
OG.I.69	Pemasangan Implan Tableport	-	0	0	1955000	0	0	0	1955000	0	0	A09	-	1	-
OG.I.7	Papsmear	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
OG.I.71	Ligasi Arteri Hipogastrica, Uterina	-	0	0	1955000	0	0	0	1955000	0	0	A09	-	1	-
OG.I.72	Ekstripasi Giant Condiloma	-	0	0	1955000	0	0	0	1955000	0	0	A09	-	1	-
OG.I.73	Jasa Anastesi Operasi Histerektomi	K1	0	0	975000	0	0	0	975000	0	975000	A09	K1	1	-
OG.I.75	Reseksi Adenomiosis	-	0	0	2600000	0	0	0	2600000	0	0	A09	-	1	-
OG.I.76	Infeksi Panggul, PUS dengan perlekatan	-	0	0	2600000	0	0	0	2600000	0	0	A09	-	1	-
OG.I.77	Adhesiolisis perlekatan berat pelvik	-	0	0	2600000	0	0	0	2600000	0	0	A09	-	1	-
OG.I.78	Repair Tuba (Tubaplasti)	-	0	0	2600000	0	0	0	2600000	0	0	A09	-	1	-
OG.I.79	Transposisi Ovarium	-	0	0	2600000	0	0	0	2600000	0	0	A09	-	1	-
OG.I.8	Biopsi	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
OG.I.80	Histerektomi Radikal	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.82	Trachelectomy Radical Servix	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.83	Eksenterasi (Anterior Posterior)	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.84	Vulvektomi Radikal	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.85	Debulking Kanker Ovarium Lanjut	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.86	Ultra Radikal Histerektomi	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.87	Operasi Frozen Pelvic	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.88	Relaparatomi High Risk Complication	-	0	0	4500000	0	0	0	4500000	0	0	A09	-	1	-
OG.I.9	Hidrotubasi	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
OG.I.90	Second Look	-	0	0	1800000	0	0	0	1800000	0	0	A09	-	1	-
OG.I.91	Histeroskopi Diagnostik	-	0	0	1800000	0	0	0	1800000	0	0	A09	-	1	-
OG.I.92	Laparaskopi Diagnostik	-	0	0	1800000	0	0	0	1800000	0	0	A09	-	1	-
OG.I.93	Kistektomi	-	0	0	3500000	0	0	0	3500000	0	0	A09	-	1	-
OG.I.94	Ooforektomi,salpingektomi	-	0	0	3500000	0	0	0	3500000	0	0	A09	-	1	-
OG.I.95	Salpingoooforektomi	-	0	0	3500000	0	0	0	3500000	0	0	A09	-	1	-
OG.I.96	Eksplorasi - ektraksi IUD translokasi	-	0	0	3500000	0	0	0	3500000	0	0	A09	-	1	-
OG.I.97	Adhesiolisis perlekatan ringan	-	0	0	3500000	0	0	0	3500000	0	0	A09	-	1	-
OG.I.98	Transposisi Ovarium	-	0	0	3500000	0	0	0	3500000	0	0	A09	-	1	-
OG.I.99	Ovareksi	-	0	0	3500000	0	0	0	3500000	0	0	A09	-	1	-
OG.II.1	Pasang IUD	K2	0	0	0	0	0	0	0	0	0	A09	K2	1	-
OG.II.10	Inseminasi	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
OG.II.100	Jasa Operator Operasi Histerektomi	K2	0	0	3000000	0	0	0	3000000	0	3000000	A09	K2	1	-
OG.II.101	Jasa Operasi Miomektomi/Kista	K2	0	0	2500000	0	0	0	2500000	0	2500000	A09	K2	1	-
OG.II.102	Adhesiolisis Perlekatan Berat   	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.103	Reseksi Endometriosis	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.104	Reseksi Adenomiosis	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.105	Histeroskopi Operatif	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.106	Rekanalisasi Tuba	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.107	Laparaskopi Histerektomi Radikal	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.108	Laparaskopi Histerektomi, Kistektomi, Adesiolisis Berat	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.109	Onkologi	-	0	0	4335000	0	0	0	4335000	0	0	A09	-	1	-
OG.II.11	Swim Up Sperma + Inseminasi	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
OG.II.12	Histeroskopi Office	-	0	0	425000	0	0	0	425000	0	0	A09	-	1	-
OG.II.13	Kriosurgery	-	0	0	191250	0	0	0	191250	0	0	A09	-	1	-
OG.II.14	Irigasi, Vaginal Toilet	-	0	0	127500	0	0	0	127500	0	0	A09	-	1	-
OG.II.16	Punksi Cavum Douglas	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
OG.II.17	Pasang + Laminaria	-	0	0	127500	0	0	0	127500	0	0	A09	-	1	-
OG.II.18	Dressing Luka Operasi	K2	0	0	170000	0	0	0	170000	0	0	A09	K2	1	-
OG.II.19	Podofilin	-	0	0	63750	0	0	0	63750	0	0	A09	-	1	-
OG.II.2	Ektraksi IUD	-	0	0	63750	0	0	0	63750	0	0	A09	-	1	-
OG.II.20	Pasang Pesarium	-	0	0	127500	0	0	0	127500	0	0	A09	-	1	-
OG.II.21	Swab Vagina	-	0	0	63750	0	0	0	63750	0	0	A09	-	1	-
OG.II.22	Ektripasi Polip	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
OG.II.23	Pasang, Angkat Tampon	-	0	0	63750	0	0	0	63750	0	0	A09	-	1	-
OG.II.24	Suntik KB,Obat,Vaksin	-	0	0	25500	0	0	0	25500	0	0	A09	-	1	-
OG.II.25	Dasar	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
OG.II.27	Khusus (Intervensi)	-	0	0	658750	0	0	0	658750	0	0	A09	-	1	-
OG.II.28	Induksi,Akselerasi Persalinan	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
OG.II.29	Partus Normal Oleh Dokter	K2	0	0	1500000	0	0	0	1500000	0	0	A09	K2	1	-
OG.II.3	Pasang Implant	-	0	0	63750	0	0	0	63750	0	0	A09	-	1	-
OG.II.31	Manual Plasenta Post Partum	-	0	0	297500	0	0	0	297500	0	0	A09	-	1	-
OG.II.32	Manual Plasenta	K2	0	0	350000	0	0	0	350000	0	350000	A09	K2	1	-
OG.II.33	Jahitan Ruptur Perineum Grade 3-4 Post Partum, Robekan Serviks	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
OG.II.34	Persalinan dengan Embryotomi	-	0	0	0	0	0	0	0	0	0	A09	K2	1	-
OG.II.36	Sectio Caesaria tanpa penyulit	K2	0	0	2250000	0	0	0	2250000	0	2250000	A09	K2	1	-
OG.II.38	Jasa Operator Section Caesaria cito	K2	0	0	2812500	0	0	0	2812500	0	2812500	A09	K2	1	-
OG.II.39	Operasi Obstetri Khusus (Plasenta Akreta)	-	0	0	2805000	0	0	0	2805000	0	0	A09	-	1	-
OG.II.4	Aff Implan	-	0	0	85000	0	0	0	85000	0	0	A09	-	1	-
OG.II.40	Sistoskopi LEETZ	-	0	0	637500	0	0	0	637500	0	0	A09	-	1	-
OG.II.41	Kista Bartholin, Kista Gartner	-	0	0	637500	0	0	0	637500	0	0	A09	-	1	-
OG.II.42	Konisasi	-	0	0	637500	0	0	0	637500	0	0	A09	-	1	-
OG.II.43	Ekstraksi IUD dengan anestesi	-	0	0	765000	0	0	0	765000	0	0	A09	-	1	-
OG.II.44	Polip serviks	-	0	0	765000	0	0	0	765000	0	0	A09	-	1	-
OG.II.45	Kauterisasi kondiloma akuminata	-	0	0	765000	0	0	0	765000	0	0	A09	-	1	-
OG.II.47	Drainase Abses	-	0	0	765000	0	0	0	765000	0	0	A09	-	1	-
OG.II.48	Shirodkar	-	0	0	765000	0	0	0	765000	0	0	A09	-	1	-
OG.II.49	Kolpotomi pada abses cavum Douglas	-	0	0	765000	0	0	0	765000	0	0	A09	-	1	-
OG.II.5	Kolposkopi	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
OG.II.50	Ekstirpasi	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
OG.II.52	Robekan Serviks, Forniks	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
OG.II.53	Hematoma,Ruptur	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
OG.II.54	Histerorafi	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
OG.II.55	Kolporafi Anterior	-	0	0	1530000	0	0	0	1530000	0	0	A09	-	1	-
OG.II.56	Kolporafi Posterior	-	0	0	1530000	0	0	0	1530000	0	0	A09	-	1	-
OG.II.57	Repair Fistula	-	0	0	2210000	0	0	0	2210000	0	0	A09	-	1	-
OG.II.58	Vaginoplasti	-	0	0	2210000	0	0	0	2210000	0	0	A09	-	1	-
OG.II.59	Rekonstruksi Vagina	-	0	0	2210000	0	0	0	2210000	0	0	A09	-	1	-
OG.II.6	Kardiotokografi	-	0	0	127500	0	0	0	127500	0	0	A09	-	1	-
OG.II.60	Histerektomi Pervaginam + Kolpoperineoplasti	-	0	0	2210000	0	0	0	2210000	0	0	A09	-	1	-
OG.II.61	Purandare	-	0	0	2210000	0	0	0	2210000	0	0	A09	-	1	-
OG.II.62	Penyulit + 50%	-	0	0	2210000	0	0	0	2210000	0	0	A09	-	1	-
OG.II.63	Jasa Operator Tubectomy	K2	0	0	1500000	0	0	0	1500000	0	1500000	A09	K2	1	-
OG.II.64	Kemoterapi	-	0	0	297500	0	0	0	297500	0	0	A09	-	1	-
OG.II.65	Kehamilan Ektopik	-	0	0	1661750	0	0	0	1661750	0	0	A09	-	1	-
OG.II.67	Kistektomi	-	0	0	1661750	0	0	0	1661750	0	0	A09	-	1	-
OG.II.68	Salpingo-ooforektomi	-	0	0	1661750	0	0	0	1661750	0	0	A09	-	1	-
OG.II.69	Pemasangan Implan Tableport	-	0	0	1661750	0	0	0	1661750	0	0	A09	-	1	-
OG.II.7	Papsmear	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
OG.II.71	Ligasi Arteri Hipogastrica, Uterina	-	0	0	1661750	0	0	0	1661750	0	0	A09	-	1	-
OG.II.72	Ekstripasi Giant Condiloma	-	0	0	1661750	0	0	0	1661750	0	0	A09	-	1	-
OG.II.73	Jasa Anastesi Operasi Histerektomi	K2	0	0	900000	0	0	0	900000	0	900000	A09	K2	1	-
OG.II.76	Infeksi Panggul, PUS dengan perlekatan	-	0	0	2210000	0	0	0	2210000	0	0	A09	-	1	-
OG.II.77	Adhesiolisis perlekatan berat pelvik	-	0	0	2210000	0	0	0	2210000	0	0	A09	-	1	-
OG.II.78	Repair Tuba (Tubaplasti)	-	0	0	2210000	0	0	0	2210000	0	0	A09	-	1	-
OG.II.79	Transposisi Ovarium	-	0	0	2210000	0	0	0	2210000	0	0	A09	-	1	-
OG.II.8	Biopsi	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
OG.II.80	Histerektomi Radikal	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.82	Trachelectomy Radical Servix	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.83	Eksenterasi (Anterior Posterior)	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.84	Vulvektomi Radikal	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.85	Debulking Kanker Ovarium Lanjut	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.86	Ultra Radikal Histerektomi	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.87	Operasi Frozen Pelvic	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.88	Relaparatomi High Risk Complication	-	0	0	3825000	0	0	0	3825000	0	0	A09	-	1	-
OG.II.9	Hidrotubasi	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
OG.II.90	Second Look	-	0	0	1530000	0	0	0	1530000	0	0	A09	-	1	-
OG.II.91	Histeroskopi Diagnostik	-	0	0	1530000	0	0	0	1530000	0	0	A09	-	1	-
OG.II.92	Laparaskopi Diagnostik	-	0	0	1530000	0	0	0	1530000	0	0	A09	-	1	-
OG.II.93	Kistektomi	-	0	0	2975000	0	0	0	2975000	0	0	A09	-	1	-
OG.II.94	Ooforektomi,salpingektomi	-	0	0	2975000	0	0	0	2975000	0	0	A09	-	1	-
OG.II.95	Salpingoooforektomi	-	0	0	2975000	0	0	0	2975000	0	0	A09	-	1	-
OG.II.96	Eksplorasi - ektraksi IUD translokasi	-	0	0	2975000	0	0	0	2975000	0	0	A09	-	1	-
OG.II.97	Adhesiolisis perlekatan ringan	-	0	0	2975000	0	0	0	2975000	0	0	A09	-	1	-
OG.II.98	Transposisi Ovarium	-	0	0	2975000	0	0	0	2975000	0	0	A09	-	1	-
OG.II.99	Ovareksi	-	0	0	2975000	0	0	0	2975000	0	0	A09	-	1	-
OG.III.1	Pasang IUD	K3	0	0	0	0	0	0	0	0	0	A09	K3	1	-
OG.III.10	Inseminasi	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
OG.III.100	Jasa Operator Operasi Histerektomi	K3	0	0	2500000	0	0	0	2500000	0	2500000	A09	K3	1	-
OG.III.101	Jasa Operasi Miomektomi/Kista	K3	0	0	2000000	0	0	0	2000000	0	2000000	A09	K3	1	-
OG.III.102	Adhesiolisis Perlekatan Berat   	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.103	Reseksi Endometriosis	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.104	Reseksi Adenomiosis	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.105	Histeroskopi Operatif	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.106	Rekanalisasi Tuba	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.107	Laparaskopi Histerektomi Radikal	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.108	Laparaskopi Histerektomi, Kistektomi, Adesiolisis Berat	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.109	Onkologi	-	0	0	3684750	0	0	0	3684750	0	0	A09	-	1	-
OG.III.11	Swim Up Sperma + Inseminasi	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
OG.III.12	Histeroskopi Office	-	0	0	361250	0	0	0	361250	0	0	A09	-	1	-
OG.III.13	Kriosurgery	-	0	0	162562.5	0	0	0	162562.5	0	0	A09	-	1	-
OG.III.14	Irigasi, Vaginal Toilet	-	0	0	108375	0	0	0	108375	0	0	A09	-	1	-
OG.III.16	Punksi Cavum Douglas	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
OG.III.17	Pasang + Laminaria	-	0	0	108375	0	0	0	108375	0	0	A09	-	1	-
OG.III.18	Dressing Luka Operasi	K3	0	0	144500	0	0	0	144500	0	0	A09	K3	1	-
OG.III.19	Podofilin	-	0	0	54187.5	0	0	0	54187.5	0	0	A09	-	1	-
OG.III.2	Ektraksi IUD	-	0	0	54187.5	0	0	0	54187.5	0	0	A09	-	1	-
OG.III.20	Pasang Pesarium	-	0	0	108375	0	0	0	108375	0	0	A09	-	1	-
OG.III.21	Swab Vagina	-	0	0	54187.5	0	0	0	54187.5	0	0	A09	-	1	-
OG.III.22	Ektripasi Polip	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
OG.III.23	Pasang, Angkat Tampon	-	0	0	54187.5	0	0	0	54187.5	0	0	A09	-	1	-
OG.III.24	Suntik KB,Obat,Vaksin	-	0	0	21675	0	0	0	21675	0	0	A09	-	1	-
OG.III.25	Dasar	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
OG.III.27	Khusus (Intervensi)	-	0	0	559937.5	0	0	0	559937.5	0	0	A09	-	1	-
OG.III.28	Induksi,Akselerasi Persalinan	-	0	0	614125	0	0	0	614125	0	0	A09	-	1	-
OG.III.29	Partus Normal Oleh Dokter	K3	0	0	1250000	0	0	0	1250000	0	0	A09	K3	1	-
OG.III.3	Pasang Implant	-	0	0	54187.5	0	0	0	54187.5	0	0	A09	-	1	-
OG.III.31	Manual Plasenta Post Partum	-	0	0	252875	0	0	0	252875	0	0	A09	-	1	-
OG.III.32	Manual Plasenta 	K3	0	0	250000	0	0	0	250000	0	250000	A09	K3	1	-
OG.III.33	Jahitan Ruptur Perineum Grade 3-4 Post Partum, Robekan Serviks	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
OG.III.34	Persalinan dengan Embryotomi	-	0	0	0	0	0	0	0	0	0	A09	K3	1	-
OG.III.36	Sectio Caesaria tanpa penyulit	K3	0	0	2000000	0	0	0	2000000	0	2000000	A09	K3	1	-
OG.III.38	Jasa Operator Section Caesaria cito	K3	0	0	2500000	0	0	0	2500000	0	2500000	A09	K3	1	-
OG.III.39	Operasi Obstetri Khusus (Plasenta Akreta)	-	0	0	2384250	0	0	0	2384250	0	0	A09	-	1	-
OG.III.4	Aff Implan	-	0	0	72250	0	0	0	72250	0	0	A09	-	1	-
OG.III.40	Sistoskopi LEETZ	-	0	0	541875	0	0	0	541875	0	0	A09	-	1	-
OG.III.41	Kista Bartholin, Kista Gartner	-	0	0	541875	0	0	0	541875	0	0	A09	-	1	-
OG.III.42	Konisasi	-	0	0	541875	0	0	0	541875	0	0	A09	-	1	-
OG.III.43	Ekstraksi IUD dengan anestesi	-	0	0	650250	0	0	0	650250	0	0	A09	-	1	-
OG.III.44	Polip serviks	-	0	0	650250	0	0	0	650250	0	0	A09	-	1	-
OG.III.45	Kauterisasi kondiloma akuminata	-	0	0	650250	0	0	0	650250	0	0	A09	-	1	-
OG.III.46	Penjahitan Laserasi ringan	-	0	0	650250	0	0	0	650250	0	0	A09	-	1	-
OG.III.47	Drainase Abses	-	0	0	650250	0	0	0	650250	0	0	A09	-	1	-
OG.III.48	Shirodkar	-	0	0	650250	0	0	0	650250	0	0	A09	-	1	-
OG.III.49	Kolpotomi pada abses cavum Douglas	-	0	0	650250	0	0	0	650250	0	0	A09	-	1	-
OG.III.52	Robekan Serviks, Forniks	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
OG.III.53	Hematoma,Ruptur	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
OG.III.54	Histerorafi	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
OG.III.55	Kolporafi Anterior	-	0	0	1300500	0	0	0	1300500	0	0	A09	-	1	-
OG.III.56	Kolporafi Posterior	-	0	0	1300500	0	0	0	1300500	0	0	A09	-	1	-
OG.III.57	Repair Fistula	-	0	0	1878500	0	0	0	1878500	0	0	A09	-	1	-
OG.III.58	Vaginoplasti	-	0	0	1878500	0	0	0	1878500	0	0	A09	-	1	-
OG.III.59	Rekonstruksi Vagina	-	0	0	1878500	0	0	0	1878500	0	0	A09	-	1	-
OG.III.6	Kardiotokografi	-	0	0	108375	0	0	0	108375	0	0	A09	-	1	-
OG.III.60	Histerektomi Pervaginam + Kolpoperineoplasti	-	0	0	1878500	0	0	0	1878500	0	0	A09	-	1	-
OG.III.61	Purandare	-	0	0	1878500	0	0	0	1878500	0	0	A09	-	1	-
OG.III.62	Penyulit + 50%	-	0	0	1878500	0	0	0	1878500	0	0	A09	-	1	-
OG.III.63	Jasa Operator Tubectomy	K3	0	0	1250000	0	0	0	1250000	0	1250000	A09	K3	1	-
OG.III.64	Kemoterapi	-	0	0	252875	0	0	0	252875	0	0	A09	-	1	-
OG.III.65	Kehamilan Ektopik	-	0	0	1412487.5	0	0	0	1412487.5	0	0	A09	-	1	-
OG.III.67	Kistektomi	-	0	0	1412487.5	0	0	0	1412487.5	0	0	A09	-	1	-
OG.III.68	Salpingo-ooforektomi	-	0	0	1412487.5	0	0	0	1412487.5	0	0	A09	-	1	-
OG.III.69	Pemasangan Implan Tableport	-	0	0	1412487.5	0	0	0	1412487.5	0	0	A09	-	1	-
OG.III.7	Papsmear	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
OG.III.71	Ligasi Arteri Hipogastrica, Uterina	-	0	0	1412487.5	0	0	0	1412487.5	0	0	A09	-	1	-
OG.III.72	Ekstripasi Giant Condiloma	-	0	0	1412487.5	0	0	0	1412487.5	0	0	A09	-	1	-
OG.III.73	Jasa Anastesi Operasi Histerektomi	K3	0	0	750000	0	0	0	750000	0	750000	A09	K3	1	-
OG.III.75	Reseksi Adenomiosis	-	0	0	1878500	0	0	0	1878500	0	0	A09	-	1	-
OG.III.76	Infeksi Panggul, PUS dengan perlekatan	-	0	0	1878500	0	0	0	1878500	0	0	A09	-	1	-
OG.III.77	Adhesiolisis perlekatan berat pelvik	-	0	0	1878500	0	0	0	1878500	0	0	A09	-	1	-
OG.III.78	Repair Tuba (Tubaplasti)	-	0	0	1878500	0	0	0	1878500	0	0	A09	-	1	-
OG.III.79	Transposisi Ovarium	-	0	0	1878500	0	0	0	1878500	0	0	A09	-	1	-
OG.III.8	Biopsi	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
OG.III.80	Histerektomi Radikal	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.82	Trachelectomy Radical Servix	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.83	Eksenterasi (Anterior Posterior)	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.84	Vulvektomi Radikal	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.85	Debulking Kanker Ovarium Lanjut	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.86	Ultra Radikal Histerektomi	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.87	Operasi Frozen Pelvic	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.88	Relaparatomi High Risk Complication	-	0	0	3251250	0	0	0	3251250	0	0	A09	-	1	-
OG.III.9	Hidrotubasi	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
OG.III.90	Second Look	-	0	0	1300500	0	0	0	1300500	0	0	A09	-	1	-
OG.III.91	Histeroskopi Diagnostik	-	0	0	1300500	0	0	0	1300500	0	0	A09	-	1	-
OG.III.92	Laparaskopi Diagnostik	-	0	0	1300500	0	0	0	1300500	0	0	A09	-	1	-
OG.III.93	Kistektomi	-	0	0	2528750	0	0	0	2528750	0	0	A09	-	1	-
OG.III.94	Ooforektomi,salpingektomi	-	0	0	2528750	0	0	0	2528750	0	0	A09	-	1	-
OG.III.95	Salpingoooforektomi	-	0	0	2528750	0	0	0	2528750	0	0	A09	-	1	-
OG.III.96	Eksplorasi - ektraksi IUD translokasi	-	0	0	2528750	0	0	0	2528750	0	0	A09	-	1	-
OG.III.97	Adhesiolisis perlekatan ringan	-	0	0	2528750	0	0	0	2528750	0	0	A09	-	1	-
OG.III.98	Transposisi Ovarium	-	0	0	2528750	0	0	0	2528750	0	0	A09	-	1	-
OG.III.99	Ovareksi	-	0	0	2528750	0	0	0	2528750	0	0	A09	-	1	-
OG.ODC.10	Inseminasi	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
OG.ODC.102	Adhesiolisis Perlekatan Berat   	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.103	Reseksi Endometriosis	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.104	Reseksi Adenomiosis	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.105	Histeroskopi Operatif	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.106	Rekanalisasi Tuba	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.107	Laparaskopi Histerektomi Radikal	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.108	Laparaskopi Histerektomi, Kistektomi, Adesiolisis Berat	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.109	Onkologi	-	0	0	3132037.5	0	0	0	3132037.5	0	0	A09	-	1	-
OG.ODC.11	Swim Up Sperma + Inseminasi	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
OG.ODC.12	Histeroskopi Office	-	0	0	307062.5	0	0	0	307062.5	0	0	A09	-	1	-
OG.ODC.13	Kriosurgery	-	0	0	138178.125	0	0	0	138178.125	0	0	A09	-	1	-
OG.ODC.14	Irigasi, Vaginal Toilet	-	0	0	92118.75	0	0	0	92118.75	0	0	A09	-	1	-
OG.ODC.15	Mikrokuret	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
OG.ODC.16	Punksi Cavum Douglas	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
OG.ODC.17	Pasang + Laminaria	-	0	0	92118.75	0	0	0	92118.75	0	0	A09	-	1	-
OG.ODC.19	Podofilin	-	0	0	46059.375	0	0	0	46059.375	0	0	A09	-	1	-
OG.ODC.2	Ektraksi IUD	-	0	0	46059.375	0	0	0	46059.375	0	0	A09	-	1	-
OG.ODC.20	Pasang Pesarium	-	0	0	92118.75	0	0	0	92118.75	0	0	A09	-	1	-
OG.ODC.21	Swab Vagina	-	0	0	46059.375	0	0	0	46059.375	0	0	A09	-	1	-
OG.ODC.22	Ektripasi Polip	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
OG.ODC.23	Pasang, Angkat Tampon	-	0	0	46059.375	0	0	0	46059.375	0	0	A09	-	1	-
OG.ODC.24	Suntik KB,Obat,Vaksin	-	0	0	18423.75	0	0	0	18423.75	0	0	A09	-	1	-
OG.ODC.25	Dasar	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
OG.ODC.27	Khusus (Intervensi)	-	0	0	475946.875	0	0	0	475946.875	0	0	A09	-	1	-
OG.ODC.28	Induksi,Akselerasi Persalinan	-	0	0	522006.25	0	0	0	522006.25	0	0	A09	-	1	-
OG.ODC.3	Pasang Implant	-	0	0	46059.375	0	0	0	46059.375	0	0	A09	-	1	-
OG.ODC.31	Manual Plasenta Post Partum	-	0	0	214943.75	0	0	0	214943.75	0	0	A09	-	1	-
OG.ODC.33	Jahitan Ruptur Perineum Grade 3-4 Post Partum, Robekan Serviks	-	0	0	614125	0	0	0	614125	0	0	A09	-	1	-
OG.ODC.39	Operasi Obstetri Khusus (Plasenta Akreta)	-	0	0	2026612.5	0	0	0	2026612.5	0	0	A09	-	1	-
OG.ODC.4	Aff Implan	-	0	0	61412.5	0	0	0	61412.5	0	0	A09	-	1	-
OG.ODC.40	Sistoskopi LEETZ	-	0	0	460593.75	0	0	0	460593.75	0	0	A09	-	1	-
OG.ODC.41	Kista Bartholin, Kista Gartner	-	0	0	460593.75	0	0	0	460593.75	0	0	A09	-	1	-
OG.ODC.42	Konisasi	-	0	0	460593.75	0	0	0	460593.75	0	0	A09	-	1	-
OG.ODC.43	Ekstraksi IUD dengan anestesi	-	0	0	552712.5	0	0	0	552712.5	0	0	A09	-	1	-
OG.ODC.44	Polip serviks	-	0	0	552712.5	0	0	0	552712.5	0	0	A09	-	1	-
OG.ODC.45	Kauterisasi kondiloma akuminata	-	0	0	552712.5	0	0	0	552712.5	0	0	A09	-	1	-
OG.ODC.46	Penjahitan Laserasi ringan	-	0	0	552712.5	0	0	0	552712.5	0	0	A09	-	1	-
OG.ODC.47	Drainase Abses	-	0	0	552712.5	0	0	0	552712.5	0	0	A09	-	1	-
OG.ODC.48	Shirodkar	-	0	0	552712.5	0	0	0	552712.5	0	0	A09	-	1	-
OG.ODC.49	Kolpotomi pada abses cavum Douglas	-	0	0	552712.5	0	0	0	552712.5	0	0	A09	-	1	-
OG.ODC.5	Kolposkopi	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
OG.ODC.50	Ekstirpasi	-	0	0	614125	0	0	0	614125	0	0	A09	-	1	-
OG.ODC.52	Robekan Serviks, Forniks	-	0	0	614125	0	0	0	614125	0	0	A09	-	1	-
OG.ODC.53	Hematoma,Ruptur	-	0	0	614125	0	0	0	614125	0	0	A09	-	1	-
OG.ODC.54	Histerorafi	-	0	0	614125	0	0	0	614125	0	0	A09	-	1	-
OG.ODC.55	Kolporafi Anterior	-	0	0	1105425	0	0	0	1105425	0	0	A09	-	1	-
OG.ODC.56	Kolporafi Posterior	-	0	0	1105425	0	0	0	1105425	0	0	A09	-	1	-
OG.ODC.57	Repair Fistula	-	0	0	1596725	0	0	0	1596725	0	0	A09	-	1	-
OG.ODC.58	Vaginoplasti	-	0	0	1596725	0	0	0	1596725	0	0	A09	-	1	-
OG.ODC.59	Rekonstruksi Vagina	-	0	0	1596725	0	0	0	1596725	0	0	A09	-	1	-
OG.ODC.6	Kardiotokografi	-	0	0	92118.75	0	0	0	92118.75	0	0	A09	-	1	-
OG.ODC.60	Histerektomi Pervaginam + Kolpoperineoplasti	-	0	0	1596725	0	0	0	1596725	0	0	A09	-	1	-
OG.ODC.61	Purandare	-	0	0	1596725	0	0	0	1596725	0	0	A09	-	1	-
OG.ODC.62	Penyulit + 50%	-	0	0	1596725	0	0	0	1596725	0	0	A09	-	1	-
OG.ODC.63	Jasa Operator Tubectomy	-	0	0	0	0	0	0	0	0	0	A09	-	1	-
OG.ODC.64	Kemoterapi	-	0	0	214943.75	0	0	0	214943.75	0	0	A09	-	1	-
OG.ODC.65	Kehamilan Ektopik	-	0	0	1228250	0	0	0	1228250	0	0	A09	-	1	-
OG.ODC.67	Kistektomi	-	0	0	1228250	0	0	0	1228250	0	0	A09	-	1	-
OG.ODC.68	Salpingo-ooforektomi	-	0	0	1228250	0	0	0	1228250	0	0	A09	-	1	-
OG.ODC.69	Pemasangan Implan Tableport	-	0	0	1228250	0	0	0	1228250	0	0	A09	-	1	-
OG.ODC.7	Papsmear	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
OG.ODC.71	Ligasi Arteri Hipogastrica, Uterina	-	0	0	1228250	0	0	0	1228250	0	0	A09	-	1	-
OG.ODC.72	Ekstripasi Giant Condiloma	-	0	0	1228250	0	0	0	1228250	0	0	A09	-	1	-
OG.ODC.73	Histerektomi 	-	0	0	1596725	0	0	0	1596725	0	0	A09	-	1	-
OG.ODC.75	Reseksi Adenomiosis	-	0	0	1596725	0	0	0	1596725	0	0	A09	-	1	-
OG.ODC.76	Infeksi Panggul, PUS dengan perlekatan	-	0	0	1596725	0	0	0	1596725	0	0	A09	-	1	-
OG.ODC.77	Adhesiolisis perlekatan berat pelvik	-	0	0	1596725	0	0	0	1596725	0	0	A09	-	1	-
OG.ODC.78	Repair Tuba (Tubaplasti)	-	0	0	1596725	0	0	0	1596725	0	0	A09	-	1	-
OG.ODC.79	Transposisi Ovarium	-	0	0	1596725	0	0	0	1596725	0	0	A09	-	1	-
OG.ODC.8	Biopsi	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
OG.ODC.80	Histerektomi Radikal	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.82	Trachelectomy Radical Servix	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.83	Eksenterasi (Anterior Posterior)	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.84	Vulvektomi Radikal	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.85	Debulking Kanker Ovarium Lanjut	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.86	Ultra Radikal Histerektomi	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.87	Operasi Frozen Pelvic	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.88	Relaparatomi High Risk Complication	-	0	0	2763562.5	0	0	0	2763562.5	0	0	A09	-	1	-
OG.ODC.9	Hidrotubasi	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
OG.ODC.90	Second Look	-	0	0	1105425	0	0	0	1105425	0	0	A09	-	1	-
OG.ODC.91	Histeroskopi Diagnostik	-	0	0	1105425	0	0	0	1105425	0	0	A09	-	1	-
OG.ODC.92	Laparaskopi Diagnostik	-	0	0	1105425	0	0	0	1105425	0	0	A09	-	1	-
OG.ODC.93	Kistektomi	-	0	0	2149437.5	0	0	0	2149437.5	0	0	A09	-	1	-
OG.ODC.94	Ooforektomi,salpingektomi	-	0	0	2149437.5	0	0	0	2149437.5	0	0	A09	-	1	-
OG.ODC.95	Salpingoooforektomi	-	0	0	2149437.5	0	0	0	2149437.5	0	0	A09	-	1	-
OG.ODC.96	Eksplorasi - ektraksi IUD translokasi	-	0	0	2149437.5	0	0	0	2149437.5	0	0	A09	-	1	-
OG.ODC.97	Adhesiolisis perlekatan ringan	-	0	0	2149437.5	0	0	0	2149437.5	0	0	A09	-	1	-
OG.ODC.98	Transposisi Ovarium	-	0	0	2149437.5	0	0	0	2149437.5	0	0	A09	-	1	-
OG.ODC.99	Ovareksi	-	0	0	2149437.5	0	0	0	2149437.5	0	0	A09	-	1	-
OG.VIP.1	Pasang IUD	KVIP	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
OG.VIP.10	Inseminasi	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
OG.VIP.100	Jasa Operator Operasi Histerektomi	KVIP	0	0	3500000	0	0	0	3500000	0	3500000	A09	VIP	1	-
OG.VIP.101	Jasa Operasi Miomektomi/Kista	KVIP	0	0	3500000	0	0	0	3500000	0	3500000	A09	VIP	1	-
OG.VIP.102	Adhesiolisis Perlekatan Berat   	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.103	Reseksi Endometriosis	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.104	Reseksi Adenomiosis	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.105	Histeroskopi Operatif	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.106	Rekanalisasi Tuba	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.107	Laparaskopi Histerektomi Radikal	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.108	Laparaskopi Histerektomi, Kistektomi, Adesiolisis Berat	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.109	Onkologi	-	0	0	5865000	0	0	0	5865000	0	0	A09	-	1	-
OG.VIP.11	Swim Up Sperma + Inseminasi	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
OG.VIP.12	Histeroskopi Office	-	0	0	575000	0	0	0	575000	0	0	A09	-	1	-
OG.VIP.13	Kriosurgery	-	0	0	258750	0	0	0	258750	0	0	A09	-	1	-
OG.VIP.14	Irigasi, Vaginal Toilet	-	0	0	172500	0	0	0	172500	0	0	A09	-	1	-
OG.VIP.16	Punksi Cavum Douglas	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
OG.VIP.17	Pasang + Laminaria	-	0	0	172500	0	0	0	172500	0	0	A09	-	1	-
OG.VIP.18	Dressing Luka Operasi	KVIP	0	0	230000	0	0	0	230000	0	0	A09	VIP	1	-
OG.VIP.19	Podofilin	-	0	0	86250	0	0	0	86250	0	0	A09	-	1	-
OG.VIP.2	Ektraksi IUD	-	0	0	86250	0	0	0	86250	0	0	A09	-	1	-
OG.VIP.20	Pasang Pesarium	-	0	0	172500	0	0	0	172500	0	0	A09	-	1	-
OG.VIP.21	Swab Vagina	-	0	0	86250	0	0	0	86250	0	0	A09	-	1	-
OG.VIP.22	Ektripasi Polip	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
OG.VIP.23	Pasang, Angkat Tampon	-	0	0	86250	0	0	0	86250	0	0	A09	-	1	-
OG.VIP.24	Suntik KB,Obat,Vaksin	-	0	0	34500	0	0	0	34500	0	0	A09	-	1	-
OG.VIP.25	Dasar	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
OG.VIP.27	Khusus (Intervensi)	-	0	0	891250	0	0	0	891250	0	0	A09	-	1	-
OG.VIP.28	Induksi,Akselerasi Persalinan	-	0	0	977500	0	0	0	977500	0	0	A09	-	1	-
OG.VIP.29	Partus Normal Oleh Dokter	KVIP	0	0	2000000	0	0	0	2000000	0	0	A09	VIP	1	-
OG.VIP.3	Pasang Implant	-	0	0	86250	0	0	0	86250	0	0	A09	-	1	-
OG.VIP.31	Manual Plasenta Post Partum	-	0	0	402500	0	0	0	402500	0	0	A09	-	1	-
OG.VIP.32	Manual Plasenta	KVIP	0	0	550000	0	0	0	550000	0	550000	A09	VIP	1	-
OG.VIP.33	Jahitan Ruptur Perineum Grade 3-4 Post Partum, Robekan Serviks	-	0	0	1150000	0	0	0	1150000	0	0	A09	-	1	-
OG.VIP.34	Persalinan dengan Embryotomi	-	0	0	0	0	0	0	0	0	0	A09	VIP	1	-
OG.VIP.36	Sectio Caesaria tanpa penyulit	KVIP	0	0	3000000	0	0	0	3000000	0	3000000	A09	VIP	1	-
OG.VIP.38	Jasa Operator Section Caesaria cito	KVIP	0	0	3750000	0	0	0	3750000	0	3750000	A09	VIP	1	-
OG.VIP.39	Operasi Obstetri Khusus (Plasenta Akreta)	-	0	0	3795000	0	0	0	3795000	0	0	A09	-	1	-
OG.VIP.4	Aff Implan	-	0	0	115000	0	0	0	115000	0	0	A09	-	1	-
OG.VIP.40	Sistoskopi LEETZ	-	0	0	862500	0	0	0	862500	0	0	A09	-	1	-
OG.VIP.41	Kista Bartholin, Kista Gartner	-	0	0	862500	0	0	0	862500	0	0	A09	-	1	-
OG.VIP.42	Konisasi	-	0	0	862500	0	0	0	862500	0	0	A09	-	1	-
OG.VIP.43	Ekstraksi IUD dengan anestesi	-	0	0	1035000	0	0	0	1035000	0	0	A09	-	1	-
OG.VIP.44	Polip serviks	-	0	0	1035000	0	0	0	1035000	0	0	A09	-	1	-
OG.VIP.45	Kauterisasi kondiloma akuminata	-	0	0	1035000	0	0	0	1035000	0	0	A09	-	1	-
OG.VIP.46	Penjahitan Laserasi ringan	-	0	0	1035000	0	0	0	1035000	0	0	A09	-	1	-
OG.VIP.47	Drainase Abses	-	0	0	1035000	0	0	0	1035000	0	0	A09	-	1	-
OG.VIP.48	Shirodkar	-	0	0	1035000	0	0	0	1035000	0	0	A09	-	1	-
OG.VIP.49	Kolpotomi pada abses cavum Douglas	-	0	0	1035000	0	0	0	1035000	0	0	A09	-	1	-
OG.VIP.5	Kolposkopi	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
OG.VIP.50	Ekstirpasi	-	0	0	1150000	0	0	0	1150000	0	0	A09	-	1	-
OG.VIP.52	Robekan Serviks, Forniks	-	0	0	1150000	0	0	0	1150000	0	0	A09	-	1	-
OG.VIP.53	Hematoma,Ruptur	-	0	0	1150000	0	0	0	1150000	0	0	A09	-	1	-
OG.VIP.54	Histerorafi	-	0	0	1150000	0	0	0	1150000	0	0	A09	-	1	-
OG.VIP.55	Kolporafi Anterior	-	0	0	2070000	0	0	0	2070000	0	0	A09	-	1	-
OG.VIP.56	Kolporafi Posterior	-	0	0	2070000	0	0	0	2070000	0	0	A09	-	1	-
OG.VIP.57	Repair Fistula	-	0	0	2990000	0	0	0	2990000	0	0	A09	-	1	-
OG.VIP.58	Vaginoplasti	-	0	0	2990000	0	0	0	2990000	0	0	A09	-	1	-
OG.VIP.59	Rekonstruksi Vagina	-	0	0	2990000	0	0	0	2990000	0	0	A09	-	1	-
OG.VIP.6	Kardiotokografi	-	0	0	172500	0	0	0	172500	0	0	A09	-	1	-
OG.VIP.60	Histerektomi Pervaginam + Kolpoperineoplasti	-	0	0	2990000	0	0	0	2990000	0	0	A09	-	1	-
OG.VIP.61	Purandare	-	0	0	2990000	0	0	0	2990000	0	0	A09	-	1	-
OG.VIP.62	Penyulit + 50%	-	0	0	2990000	0	0	0	2990000	0	0	A09	-	1	-
OG.VIP.64	Kemoterapi	-	0	0	402500	0	0	0	402500	0	0	A09	-	1	-
OG.VIP.65	Kehamilan Ektopik	-	0	0	2300000	0	0	0	2300000	0	0	A09	-	1	-
OG.VIP.67	Kistektomi	-	0	0	2300000	0	0	0	2300000	0	0	A09	-	1	-
OG.VIP.68	Salpingo-ooforektomi	-	0	0	2300000	0	0	0	2300000	0	0	A09	-	1	-
OG.VIP.69	Pemasangan Implan Tableport	-	0	0	2300000	0	0	0	2300000	0	0	A09	-	1	-
OG.VIP.7	Papsmear	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
OG.VIP.71	Ligasi Arteri Hipogastrica, Uterina	-	0	0	2300000	0	0	0	2300000	0	0	A09	-	1	-
OG.VIP.72	Ekstripasi Giant Condiloma	-	0	0	2300000	0	0	0	2300000	0	0	A09	-	1	-
OG.VIP.73	Jasa Anastesi Operasi Histerektomi	KVIP	0	0	1050000	0	0	0	1050000	0	1050000	A09	VIP	1	-
OG.VIP.75	Reseksi Adenomiosis	-	0	0	2990000	0	0	0	2990000	0	0	A09	-	1	-
OG.VIP.76	Infeksi Panggul, PUS dengan perlekatan	-	0	0	2990000	0	0	0	2990000	0	0	A09	-	1	-
OG.VIP.77	Adhesiolisis perlekatan berat pelvik	-	0	0	2990000	0	0	0	2990000	0	0	A09	-	1	-
OG.VIP.78	Repair Tuba (Tubaplasti)	-	0	0	2990000	0	0	0	2990000	0	0	A09	-	1	-
OG.VIP.79	Transposisi Ovarium	-	0	0	2990000	0	0	0	2990000	0	0	A09	-	1	-
OG.VIP.8	Biopsi	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
OG.VIP.80	Histerektomi Radikal	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.82	Trachelectomy Radical Servix	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.83	Eksenterasi (Anterior Posterior)	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.84	Vulvektomi Radikal	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.85	Debulking Kanker Ovarium Lanjut	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.86	Ultra Radikal Histerektomi	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.87	Operasi Frozen Pelvic	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.88	Relaparatomi High Risk Complication	-	0	0	5175000	0	0	0	5175000	0	0	A09	-	1	-
OG.VIP.89	Jasa Operator Tubectomy	KVIP	0	0	2000000	0	0	0	2000000	0	2000000	A09	VIP	1	-
OG.VIP.9	Hidrotubasi	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
OG.VIP.90	Second Look	-	0	0	2070000	0	0	0	2070000	0	0	A09	-	1	-
OG.VIP.91	Histeroskopi Diagnostik	-	0	0	2070000	0	0	0	2070000	0	0	A09	-	1	-
OG.VIP.92	Laparaskopi Diagnostik	-	0	0	2070000	0	0	0	2070000	0	0	A09	-	1	-
OG.VIP.93	Kistektomi	-	0	0	4025000	0	0	0	4025000	0	0	A09	-	1	-
OG.VIP.94	Ooforektomi,salpingektomi	-	0	0	4025000	0	0	0	4025000	0	0	A09	-	1	-
OG.VIP.95	Salpingoooforektomi	-	0	0	4025000	0	0	0	4025000	0	0	A09	-	1	-
OG.VIP.96	Eksplorasi - ektraksi IUD translokasi	-	0	0	4025000	0	0	0	4025000	0	0	A09	-	1	-
OG.VIP.97	Adhesiolisis perlekatan ringan	-	0	0	4025000	0	0	0	4025000	0	0	A09	-	1	-
OG.VIP.98	Transposisi Ovarium	-	0	0	4025000	0	0	0	4025000	0	0	A09	-	1	-
OG.VIP.99	Ovareksi	-	0	0	4025000	0	0	0	4025000	0	0	A09	-	1	-
OG.VVIP.1	Pasang IUD	KVVIP	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
OG.VVIP.10	Inseminasi	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
OG.VVIP.100	Jasa Operator Operasi Histerektomi	KVVIP	0	0	4000000	0	0	0	4000000	0	4000000	A09	VVIP	1	-
OG.VVIP.101	Jasa Operasi Miomektomi/Kista	KVVIP	0	0	4000000	0	0	0	4000000	0	4000000	A09	VVIP	1	-
OG.VVIP.102	Adhesiolisis Perlekatan Berat   	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.103	Reseksi Endometriosis	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.104	Reseksi Adenomiosis	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.105	Histeroskopi Operatif	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.106	Rekanalisasi Tuba	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.107	Laparaskopi Histerektomi Radikal	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.108	Laparaskopi Histerektomi, Kistektomi, Adesiolisis Berat	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.109	Onkologi	-	0	0	6744750	0	0	0	6744750	0	0	A09	-	1	-
OG.VVIP.11	Swim Up Sperma + Inseminasi	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
OG.VVIP.12	Histeroskopi Office	-	0	0	661250	0	0	0	661250	0	0	A09	-	1	-
OG.VVIP.13	Kriosurgery	-	0	0	297562.5	0	0	0	297562.5	0	0	A09	-	1	-
OG.VVIP.14	Irigasi, Vaginal Toilet	-	0	0	198375	0	0	0	198375	0	0	A09	-	1	-
OG.VVIP.16	Punksi Cavum Douglas	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
OG.VVIP.17	Pasang + Laminaria	-	0	0	198375	0	0	0	198375	0	0	A09	-	1	-
OG.VVIP.18	Dressing Luka Operasi	KVVIP	0	0	264500	0	0	0	264500	0	0	A09	VVIP	1	-
OG.VVIP.19	Podofilin	-	0	0	99187.5	0	0	0	99187.5	0	0	A09	-	1	-
OG.VVIP.2	Ektraksi IUD	-	0	0	99187.5	0	0	0	99187.5	0	0	A09	-	1	-
OG.VVIP.20	Pasang Pesarium	-	0	0	198375	0	0	0	198375	0	0	A09	-	1	-
OG.VVIP.21	Swab Vagina	-	0	0	99187.5	0	0	0	99187.5	0	0	A09	-	1	-
OG.VVIP.22	Ektripasi Polip	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
OG.VVIP.23	Pasang, Angkat Tampon	-	0	0	99187.5	0	0	0	99187.5	0	0	A09	-	1	-
OG.VVIP.24	Suntik KB,Obat,Vaksin	-	0	0	39675	0	0	0	39675	0	0	A09	-	1	-
OG.VVIP.25	Dasar	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
OG.VVIP.27	Khusus (Intervensi)	-	0	0	1024938	0	0	0	1024938	0	0	A09	-	1	-
OG.VVIP.28	Induksi,Akselerasi Persalinan	-	0	0	1124125	0	0	0	1124125	0	0	A09	-	1	-
OG.VVIP.3	Pasang Implant	-	0	0	99187.5	0	0	0	99187.5	0	0	A09	-	1	-
OG.VVIP.30	Partus Normal Oleh Dokter	KVVIP	0	0	2250000	0	0	0	2250000	0	0	A09	VVIP	1	-
OG.VVIP.31	Manual Plasenta Post Partum	-	0	0	462875	0	0	0	462875	0	0	A09	-	1	-
OG.VVIP.32	Manual Plasenta	KVVIP	0	0	650000	0	0	0	650000	0	650000	A09	VVIP	1	-
OG.VVIP.33	Jahitan Ruptur Perineum Grade 3-4 Post Partum, Robekan Serviks	-	0	0	1322500	0	0	0	1322500	0	0	A09	-	1	-
OG.VVIP.34	Persalinan dengan Embryotomi	-	0	0	0	0	0	0	0	0	0	A09	VVIP	1	-
OG.VVIP.36	Sectio Caesaria tanpa penyulit	KVVIP	0	0	3500000	0	0	0	3500000	0	3500000	A09	VVIP	1	-
OG.VVIP.38	Jasa Operator Section Caesaria cito	KVVIP	0	0	4375000	0	0	0	4375000	0	4375000	A09	VVIP	1	-
OG.VVIP.39	Operasi Obstetri Khusus (Plasenta Akreta)	-	0	0	4364250	0	0	0	4364250	0	0	A09	-	1	-
OG.VVIP.4	Aff Implan	-	0	0	132250	0	0	0	132250	0	0	A09	-	1	-
OG.VVIP.40	Sistoskopi LEETZ	-	0	0	991875	0	0	0	991875	0	0	A09	-	1	-
OG.VVIP.41	Kista Bartholin, Kista Gartner	-	0	0	991875	0	0	0	991875	0	0	A09	-	1	-
OG.VVIP.42	Konisasi	-	0	0	991875	0	0	0	991875	0	0	A09	-	1	-
OG.VVIP.43	Ekstraksi IUD dengan anestesi	-	0	0	1190250	0	0	0	1190250	0	0	A09	-	1	-
OG.VVIP.44	Polip serviks	-	0	0	1190250	0	0	0	1190250	0	0	A09	-	1	-
OG.VVIP.45	Kauterisasi kondiloma akuminata	-	0	0	1190250	0	0	0	1190250	0	0	A09	-	1	-
OG.VVIP.46	Penjahitan Laserasi ringan	-	0	0	1190250	0	0	0	1190250	0	0	A09	-	1	-
OG.VVIP.47	Drainase Abses	-	0	0	1190250	0	0	0	1190250	0	0	A09	-	1	-
OG.VVIP.48	Shirodkar	-	0	0	1190250	0	0	0	1190250	0	0	A09	-	1	-
OG.VVIP.49	Kolpotomi pada abses cavum Douglas	-	0	0	1190250	0	0	0	1190250	0	0	A09	-	1	-
OG.VVIP.5	Kolposkopi	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
OG.VVIP.50	Ekstirpasi	-	0	0	1322500	0	0	0	1322500	0	0	A09	-	1	-
OG.VVIP.52	Robekan Serviks, Forniks	-	0	0	1322500	0	0	0	1322500	0	0	A09	-	1	-
OG.VVIP.53	Hematoma,Ruptur	-	0	0	1322500	0	0	0	1322500	0	0	A09	-	1	-
OG.VVIP.54	Histerorafi	-	0	0	1322500	0	0	0	1322500	0	0	A09	-	1	-
OG.VVIP.55	Kolporafi Anterior	-	0	0	2380500	0	0	0	2380500	0	0	A09	-	1	-
OG.VVIP.56	Kolporafi Posterior	-	0	0	2380500	0	0	0	2380500	0	0	A09	-	1	-
OG.VVIP.57	Repair Fistula	-	0	0	3438500	0	0	0	3438500	0	0	A09	-	1	-
OG.VVIP.59	Rekonstruksi Vagina	-	0	0	3438500	0	0	0	3438500	0	0	A09	-	1	-
OG.VVIP.6	Kardiotokografi	-	0	0	198375	0	0	0	198375	0	0	A09	-	1	-
OG.VVIP.60	Histerektomi Pervaginam + Kolpoperineoplasti	-	0	0	3438500	0	0	0	3438500	0	0	A09	-	1	-
OG.VVIP.61	Purandare	-	0	0	3438500	0	0	0	3438500	0	0	A09	-	1	-
OG.VVIP.62	Penyulit + 50%	-	0	0	3438500	0	0	0	3438500	0	0	A09	-	1	-
OG.VVIP.63	Jasa Operator Tubectomy	KVVIP	0	0	2250000	0	0	0	2250000	0	2250000	A09	VVIP	1	-
OG.VVIP.64	Kemoterapi	-	0	0	462875	0	0	0	462875	0	0	A09	-	1	-
OG.VVIP.65	Kehamilan Ektopik	-	0	0	2645000	0	0	0	2645000	0	0	A09	-	1	-
OG.VVIP.67	Kistektomi	-	0	0	2645000	0	0	0	2645000	0	0	A09	-	1	-
OG.VVIP.68	Salpingo-ooforektomi	-	0	0	2645000	0	0	0	2645000	0	0	A09	-	1	-
OG.VVIP.69	Pemasangan Implan Tableport	-	0	0	2645000	0	0	0	2645000	0	0	A09	-	1	-
OG.VVIP.7	Papsmear	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
OG.VVIP.71	Ligasi Arteri Hipogastrica, Uterina	-	0	0	2645000	0	0	0	2645000	0	0	A09	-	1	-
OG.VVIP.72	Ekstripasi Giant Condiloma	-	0	0	2645000	0	0	0	2645000	0	0	A09	-	1	-
OG.VVIP.73	Jasa Anastesi Operasi Histerektomi	KVVIP	0	0	1200000	0	0	0	1200000	0	1200000	A09	VVIP	1	-
OG.VVIP.75	Reseksi Adenomiosis	-	0	0	3438500	0	0	0	3438500	0	0	A09	-	1	-
OG.VVIP.76	Infeksi Panggul, PUS dengan perlekatan	-	0	0	3438500	0	0	0	3438500	0	0	A09	-	1	-
OG.VVIP.77	Adhesiolisis perlekatan berat pelvik	-	0	0	3438500	0	0	0	3438500	0	0	A09	-	1	-
OG.VVIP.78	Repair Tuba (Tubaplasti)	-	0	0	3438500	0	0	0	3438500	0	0	A09	-	1	-
OG.VVIP.79	Transposisi Ovarium	-	0	0	3438500	0	0	0	3438500	0	0	A09	-	1	-
OG.VVIP.8	Biopsi	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
OG.VVIP.80	Histerektomi Radikal	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.82	Trachelectomy Radical Servix	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.83	Eksenterasi (Anterior Posterior)	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.84	Vulvektomi Radikal	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.85	Debulking Kanker Ovarium Lanjut	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.86	Ultra Radikal Histerektomi	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.87	Operasi Frozen Pelvic	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.88	Relaparatomi High Risk Complication	-	0	0	5951250	0	0	0	5951250	0	0	A09	-	1	-
OG.VVIP.9	Hidrotubasi	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
OG.VVIP.90	Second Look	-	0	0	2380500	0	0	0	2380500	0	0	A09	-	1	-
OG.VVIP.91	Histeroskopi Diagnostik	-	0	0	2380500	0	0	0	2380500	0	0	A09	-	1	-
OG.VVIP.92	Laparaskopi Diagnostik	-	0	0	2380500	0	0	0	2380500	0	0	A09	-	1	-
OG.VVIP.93	Kistektomi	-	0	0	4628750	0	0	0	4628750	0	0	A09	-	1	-
OG.VVIP.94	Ooforektomi,salpingektomi	-	0	0	4628750	0	0	0	4628750	0	0	A09	-	1	-
OG.VVIP.95	Salpingoooforektomi	-	0	0	4628750	0	0	0	4628750	0	0	A09	-	1	-
OG.VVIP.96	Eksplorasi - ektraksi IUD translokasi	-	0	0	4628750	0	0	0	4628750	0	0	A09	-	1	-
OG.VVIP.97	Adhesiolisis perlekatan ringan	-	0	0	4628750	0	0	0	4628750	0	0	A09	-	1	-
OG.VVIP.98	Transposisi Ovarium	-	0	0	4628750	0	0	0	4628750	0	0	A09	-	1	-
OG.VVIP.99	Ovareksi	-	0	0	4628750	0	0	0	4628750	0	0	A09	-	1	-
PD.I.1	Ligasi VE termasuk Ligator	-	0	0	1400000	0	0	0	1400000	0	0	A09	-	1	-
PD.I.10	Pemakaian C-arm	-	0	0	350000	0	0	0	350000	0	0	A09	-	1	-
PD.I.11	Injeksi Intra Arkuler + Jar Lunak	-	0	0	400000	0	0	0	400000	0	0	A09	-	1	-
PD.I.12	Pungsi Sendi Kecil	-	0	0	400000	0	0	0	400000	0	0	A09	-	1	-
PD.I.13	Pungsi Sendi Besar	-	0	0	500000	0	0	0	500000	0	0	A09	-	1	-
PD.I.14	Bronkoskopi	-	0	0	500000	0	0	0	500000	0	0	A09	-	1	-
PD.I.15	Bronkoskopi + Biopsi	-	0	0	650000	0	0	0	650000	0	0	A09	-	1	-
PD.I.16	ERCP Diagnostik	-	0	0	1500000	0	0	0	1500000	0	0	A09	-	1	-
PD.I.17	TTP Guided USG	-	0	0	275000	0	0	0	275000	0	0	A09	-	1	-
PD.I.18	Fungsi Cairan Pleura	K1	100000	0	0	350000	0	0	0	450000	450000	A09	K1	1	-
PD.I.19	Pungsi Pleura Guided USG	-	0	0	250000	0	0	0	250000	0	0	A09	-	1	-
PD.I.20	FNAB 	-	0	0	250000	0	0	0	250000	0	0	A09	-	1	-
PD.I.21	Biopsi Pleura	-	0	0	250000	0	0	0	250000	0	0	A09	-	1	-
PD.I.22	Spirometri	-	0	0	250000	0	0	0	250000	0	0	A09	-	1	-
PD.I.23	FNAB + USG Guided	-	0	0	250000	0	0	0	250000	0	0	A09	-	1	-
PD.I.24	USG Hepar	-	0	0	350000	0	0	0	350000	0	0	A09	-	1	-
PD.I.25	Biopsi Hepar	-	0	0	800000	0	0	0	800000	0	0	A09	-	1	-
PD.I.26	Aspirasi Abses Hepar	-	0	0	1000000	0	0	0	1000000	0	0	A09	-	1	-
PD.I.27	Pungsi Ascites Guided USG	-	0	0	800000	0	0	0	800000	0	0	A09	-	1	-
PD.I.28	Fungsi Ascites (Dokter Spesialis)	K1	100000	0	0	300000	0	0	0	400000	400000	A09	K1	1	-
PD.I.29	Alergi Imunologi Skin Prick Test	-	0	0	150000	0	0	0	150000	0	0	A09	-	1	-
PD.I.3	Jasa Operasi Hemorhoid	K1	0	0	2900000	0	0	0	2900000	0	2900000	A09	K1	1	-
PD.I.30	EKG	-	50000	0	70000	0	0	0	120000	50000	120000	A09	K1	1	-
PD.I.31	Treadmill (Pendampingan)	-	0	0	350000	0	0	0	350000	0	0	A09	-	1	-
PD.I.32	Echocardiografi Dasar	-	0	0	500000	0	0	0	500000	0	0	A09	-	1	-
PD.I.33	Biopsi Ginjal	-	0	0	600000	0	0	0	600000	0	0	A09	-	1	-
PD.I.34	USG Ginjal	-	0	0	350000	0	0	0	350000	0	0	A09	-	1	-
PD.I.35	Peritoneal Dialisa Transfer Set	-	0	0	900000	0	0	0	900000	0	0	A09	-	1	-
PD.I.36	Pungsi Kista Ginjal	-	0	0	800000	0	0	0	800000	0	0	A09	-	1	-
PD.I.4	Polipektomi SCBA	-	0	0	1700000	0	0	0	1700000	0	0	A09	-	1	-
PD.I.9	Kapsul Endoskopi	-	0	0	1650000	0	0	0	1650000	0	0	A09	-	1	-
PD.II.1	Ligasi VE termasuk Ligator	-	0	0	1190000	0	0	0	1190000	0	0	A09	-	1	-
PD.II.10	Pemakaian C-arm	-	0	0	297500	0	0	0	297500	0	0	A09	-	1	-
PD.II.11	Injeksi Intra Arkuler + Jar Lunak	-	0	0	340000	0	0	0	340000	0	0	A09	-	1	-
PD.II.12	Pungsi Sendi Kecil	-	0	0	340000	0	0	0	340000	0	0	A09	-	1	-
PD.II.13	Pungsi Sendi Besar	-	0	0	425000	0	0	0	425000	0	0	A09	-	1	-
PD.II.14	Bronkoskopi	-	0	0	425000	0	0	0	425000	0	0	A09	-	1	-
PD.II.15	Bronkoskopi + Biopsi	-	0	0	552500	0	0	0	552500	0	0	A09	-	1	-
PD.II.16	ERCP Diagnostik	-	0	0	1275000	0	0	0	1275000	0	0	A09	-	1	-
PD.II.17	TTP Guided USG	-	0	0	233750	0	0	0	233750	0	0	A09	-	1	-
PD.II.18	Fungsi Cairan Pleura	K2	100000	0	0	350000	0	0	0	450000	450000	A09	K2	1	-
PD.II.19	Pungsi Pleura Guided USG	-	0	0	212500	0	0	0	212500	0	0	A09	-	1	-
PD.II.2	Hemorhoid Kontrol (Anuskopi)	-	0	0	255000	0	0	0	255000	0	0	A09	-	1	-
PD.II.20	FNAB 	-	0	0	212500	0	0	0	212500	0	0	A09	-	1	-
PD.II.21	Biopsi Pleura	-	0	0	212500	0	0	0	212500	0	0	A09	-	1	-
PD.II.22	Spirometri	-	0	0	212500	0	0	0	212500	0	0	A09	-	1	-
PD.II.23	FNAB + USG Guided	-	0	0	212500	0	0	0	212500	0	0	A09	-	1	-
PD.II.24	USG Hepar	-	0	0	297500	0	0	0	297500	0	0	A09	-	1	-
PD.II.25	Biopsi Hepar	-	0	0	680000	0	0	0	680000	0	0	A09	-	1	-
PD.II.26	Aspirasi Abses Hepar	-	0	0	850000	0	0	0	850000	0	0	A09	-	1	-
PD.II.27	Pungsi Ascites Guided USG	-	0	0	680000	0	0	0	680000	0	0	A09	-	1	-
PD.II.28	Fungsi Ascites (Dokter Spesialis)	K2	100000	0	0	300000	0	0	0	400000	400000	A09	K2	1	-
PD.II.29	Alergi Imunologi Skin Prick Test	-	0	0	127500	0	0	0	127500	0	0	A09	-	1	-
PD.II.3	Jasa Operasi Hemorhoid	K2	0	0	2400000	0	0	0	2400000	0	2400000	A09	K2	1	-
PD.II.30	EKG	-	50000	0	70000	0	0	0	120000	50000	120000	A09	K2	1	-
PD.II.31	Treadmill (Pendampingan)	-	0	0	297500	0	0	0	297500	0	0	A09	-	1	-
PD.II.32	Echocardiografi Dasar	-	0	0	425000	0	0	0	425000	0	0	A09	-	1	-
PD.II.33	Biopsi Ginjal	-	0	0	510000	0	0	0	510000	0	0	A09	-	1	-
PD.II.34	USG Ginjal	-	0	0	297500	0	0	0	297500	0	0	A09	-	1	-
PD.II.35	Peritoneal Dialisa Transfer Set	-	0	0	765000	0	0	0	765000	0	0	A09	-	1	-
PD.II.36	Pungsi Kista Ginjal	-	0	0	680000	0	0	0	680000	0	0	A09	-	1	-
PD.II.4	Polipektomi SCBA	-	0	0	1445000	0	0	0	1445000	0	0	A09	-	1	-
PD.II.9	Kapsul Endoskopi	-	0	0	1402500	0	0	0	1402500	0	0	A09	-	1	-
PD.III.1	Ligasi VE termasuk Ligator	-	0	0	1011500	0	0	0	1011500	0	0	A09	-	1	-
PD.III.10	Pemakaian C-arm	-	0	0	252875	0	0	0	252875	0	0	A09	-	1	-
PD.III.11	Injeksi Intra Arkuler + Jar Lunak	-	0	0	289000	0	0	0	289000	0	0	A09	-	1	-
PD.III.12	Pungsi Sendi Kecil	-	0	0	289000	0	0	0	289000	0	0	A09	-	1	-
PD.III.13	Pungsi Sendi Besar	-	0	0	361250	0	0	0	361250	0	0	A09	-	1	-
PD.III.14	Bronkoskopi	-	0	0	361250	0	0	0	361250	0	0	A09	-	1	-
PD.III.15	Bronkoskopi + Biopsi	-	0	0	469625	0	0	0	469625	0	0	A09	-	1	-
PD.III.16	ERCP Diagnostik	-	0	0	1083750	0	0	0	1083750	0	0	A09	-	1	-
PD.III.17	TTP Guided USG	-	0	0	198687.5	0	0	0	198687.5	0	0	A09	-	1	-
PD.III.18	Fungsi Cairan Pleura	K3	90000	0	0	315000	0	0	0	405000	405000	A09	K3	1	-
PD.III.19	Pungsi Pleura Guided USG	-	0	0	180625	0	0	0	180625	0	0	A09	-	1	-
PD.III.2	Hemorhoid Kontrol (Anuskopi)	-	0	0	216750	0	0	0	216750	0	0	A09	-	1	-
PD.III.20	FNAB 	-	0	0	180625	0	0	0	180625	0	0	A09	-	1	-
PD.III.21	Biopsi Pleura	-	0	0	180625	0	0	0	180625	0	0	A09	-	1	-
PD.III.22	Spirometri	-	0	0	180625	0	0	0	180625	0	0	A09	-	1	-
PD.III.23	FNAB + USG Guided	-	0	0	180625	0	0	0	180625	0	0	A09	-	1	-
PD.III.24	USG Hepar	-	0	0	252875	0	0	0	252875	0	0	A09	-	1	-
PD.III.25	Biopsi Hepar	-	0	0	578000	0	0	0	578000	0	0	A09	-	1	-
PD.III.26	Aspirasi Abses Hepar	-	0	0	722500	0	0	0	722500	0	0	A09	-	1	-
PD.III.27	Pungsi Ascites Guided USG	-	0	0	578000	0	0	0	578000	0	0	A09	-	1	-
PD.III.28	Fungsi Ascites (Dokter Spesialis)	K3	90000	0	0	270000	0	0	0	360000	360000	A09	K3	1	-
PD.III.29	Alergi Imunologi Skin Prick Test	-	0	0	108375	0	0	0	108375	0	0	A09	-	1	-
PD.III.3	Jasa Operasi Hemorhoid	K3	0	0	1900000	0	0	0	1900000	0	1900000	A09	K3	1	-
PD.III.30	EKG	-	45000	0	63000	0	0	0	108000	45000	108000	A09	K3	1	-
PD.III.31	Treadmill (Pendampingan)	-	0	0	252875	0	0	0	252875	0	0	A09	-	1	-
PD.III.32	Echocardiografi Dasar	-	0	0	361250	0	0	0	361250	0	0	A09	-	1	-
PD.III.33	Biopsi Ginjal	-	0	0	433500	0	0	0	433500	0	0	A09	-	1	-
PD.III.34	USG Ginjal	-	0	0	252875	0	0	0	252875	0	0	A09	-	1	-
PD.III.35	Peritoneal Dialisa Transfer Set	-	0	0	650250	0	0	0	650250	0	0	A09	-	1	-
PD.III.36	Pungsi Kista Ginjal	-	0	0	578000	0	0	0	578000	0	0	A09	-	1	-
PD.III.4	Polipektomi SCBA	-	0	0	1228250	0	0	0	1228250	0	0	A09	-	1	-
PD.III.9	Kapsul Endoskopi	-	0	0	1192125	0	0	0	1192125	0	0	A09	-	1	-
PD.ODC.1	Ligasi VE termasuk Ligator	-	0	0	859775	0	0	0	859775	0	0	A09	-	1	-
PD.ODC.10	Pemakaian C-arm	-	0	0	214943.75	0	0	0	214943.75	0	0	A09	-	1	-
PD.ODC.11	Injeksi Intra Arkuler + Jar Lunak	-	0	0	245650	0	0	0	245650	0	0	A09	-	1	-
PD.ODC.12	Pungsi Sendi Kecil	-	0	0	245650	0	0	0	245650	0	0	A09	-	1	-
PD.ODC.13	Pungsi Sendi Besar	-	0	0	307062.5	0	0	0	307062.5	0	0	A09	-	1	-
PD.ODC.14	Bronkoskopi	-	0	0	307062.5	0	0	0	307062.5	0	0	A09	-	1	-
PD.ODC.15	Bronkoskopi + Biopsi	-	0	0	399181.25	0	0	0	399181.25	0	0	A09	-	1	-
PD.ODC.16	ERCP Diagnostik	-	0	0	921187.5	0	0	0	921187.5	0	0	A09	-	1	-
PD.ODC.17	TTP Guided USG	-	0	0	168884.375	0	0	0	168884.375	0	0	A09	-	1	-
PD.ODC.18	Pungsi Pleura	-	0	0	500000	0	0	0	500000	0	500000	A09	KO	1	-
PD.ODC.19	Pungsi Pleura Guided USG	-	0	0	153531.25	0	0	0	153531.25	0	0	A09	-	1	-
PD.ODC.2	Hemorhoid Kontrol (Anuskopi)	-	0	0	184237.5	0	0	0	184237.5	0	0	A09	-	1	-
PD.ODC.20	FNAB 	-	0	0	153531.25	0	0	0	153531.25	0	0	A09	-	1	-
PD.ODC.21	Biopsi Pleura	-	0	0	153531.25	0	0	0	153531.25	0	0	A09	-	1	-
PD.ODC.22	Spirometri	-	0	0	153531.25	0	0	0	153531.25	0	0	A09	-	1	-
PD.ODC.23	FNAB + USG Guided	-	0	0	153531.25	0	0	0	153531.25	0	0	A09	-	1	-
PD.ODC.24	USG Hepar	-	0	0	214943.75	0	0	0	214943.75	0	0	A09	-	1	-
PD.ODC.25	Biopsi Hepar	-	0	0	491300	0	0	0	491300	0	0	A09	-	1	-
PD.ODC.26	Aspirasi Abses Hepar	-	0	0	614125	0	0	0	614125	0	0	A09	-	1	-
PD.ODC.27	Pungsi Ascites Guided USG	-	0	0	491300	0	0	0	491300	0	0	A09	-	1	-
PD.ODC.28	Pungsi Ascites 	-	0	0	368475	0	0	0	368475	0	0	A09	-	1	-
PD.ODC.29	Alergi Imunologi Skin Prick Test	-	0	0	92118.75	0	0	0	92118.75	0	0	A09	-	1	-
PD.ODC.3	STE Hemorhoid (Termasuk Obat)	-	0	0	245650	0	0	0	245650	0	0	A09	-	1	-
PD.ODC.31	Treadmill (Pendampingan)	-	0	0	214943.75	0	0	0	214943.75	0	0	A09	-	1	-
PD.ODC.32	Echocardiografi Dasar	-	0	0	307062.5	0	0	0	307062.5	0	0	A09	-	1	-
PD.ODC.33	Biopsi Ginjal	-	0	0	368475	0	0	0	368475	0	0	A09	-	1	-
PD.ODC.34	USG Ginjal	-	0	0	214943.75	0	0	0	214943.75	0	0	A09	-	1	-
PD.ODC.35	Peritoneal Dialisa Transfer Set	-	0	0	552712.5	0	0	0	552712.5	0	0	A09	-	1	-
PD.ODC.36	Pungsi Kista Ginjal	-	0	0	491300	0	0	0	491300	0	0	A09	-	1	-
PD.ODC.4	Polipektomi SCBA	-	0	0	1044012.5	0	0	0	1044012.5	0	0	A09	-	1	-
PD.ODC.9	Kapsul Endoskopi	-	0	0	1013306.25	0	0	0	1013306.25	0	0	A09	-	1	-
PD.VIP.1	Ligasi VE termasuk Ligator	-	0	0	1610000	0	0	0	1610000	0	0	A09	-	1	-
PD.VIP.10	Pemakaian C-arm	-	0	0	402500	0	0	0	402500	0	0	A09	-	1	-
PD.VIP.11	Injeksi Intra Arkuler + Jar Lunak	-	0	0	460000	0	0	0	460000	0	0	A09	-	1	-
PD.VIP.12	Pungsi Sendi Kecil	-	0	0	460000	0	0	0	460000	0	0	A09	-	1	-
PD.VIP.13	Pungsi Sendi Besar	-	0	0	575000	0	0	0	575000	0	0	A09	-	1	-
PD.VIP.14	Bronkoskopi	-	0	0	575000	0	0	0	575000	0	0	A09	-	1	-
PD.VIP.15	Bronkoskopi + Biopsi	-	0	0	747500	0	0	0	747500	0	0	A09	-	1	-
PD.VIP.16	ERCP Diagnostik	-	0	0	1725000	0	0	0	1725000	0	0	A09	-	1	-
PD.VIP.17	TTP Guided USG	-	0	0	316250	0	0	0	316250	0	0	A09	-	1	-
PD.VIP.18	Fungsi Cairan Pleura	KVIP	110000	0	0	385000	0	0	0	495000	495000	A09	VIP	1	-
PD.VIP.19	Pungsi Pleura Guided USG	-	0	0	287500	0	0	0	287500	0	0	A09	-	1	-
PD.VIP.2	Hemorhoid Kontrol (Anuskopi)	-	0	0	345000	0	0	0	345000	0	0	A09	-	1	-
PD.VIP.20	FNAB 	-	0	0	287500	0	0	0	287500	0	0	A09	-	1	-
PD.VIP.21	Biopsi Pleura	-	0	0	287500	0	0	0	287500	0	0	A09	-	1	-
PD.VIP.22	Spirometri	-	0	0	287500	0	0	0	287500	0	0	A09	-	1	-
PD.VIP.23	FNAB + USG Guided	-	0	0	287500	0	0	0	287500	0	0	A09	-	1	-
PD.VIP.24	USG Hepar	-	0	0	402500	0	0	0	402500	0	0	A09	-	1	-
PD.VIP.25	Biopsi Hepar	-	0	0	920000	0	0	0	920000	0	0	A09	-	1	-
PD.VIP.26	Aspirasi Abses Hepar	-	0	0	1150000	0	0	0	1150000	0	0	A09	-	1	-
PD.VIP.27	Pungsi Ascites Guided USG	-	0	0	920000	0	0	0	920000	0	0	A09	-	1	-
PD.VIP.28	Fungsi Ascites (Dokter Spesialis)	KVIP	110000	0	0	330000	0	0	0	440000	440000	A09	VIP	1	-
PD.VIP.29	Alergi Imunologi Skin Prick Test	-	0	0	172500	0	0	0	172500	0	0	A09	-	1	-
PD.VIP.3	Jasa Operasi Hemorhoid	KVIP	0	0	3400000	0	0	0	3400000	0	3400000	A09	VIP	1	-
PD.VIP.30	EKG	-	55000	0	77000	0	0	0	132000	55000	132000	A09	VIP	1	-
PD.VIP.31	Treadmill (Pendampingan)	-	0	0	402500	0	0	0	402500	0	0	A09	-	1	-
PD.VIP.32	Echocardiografi Dasar	-	0	0	575000	0	0	0	575000	0	0	A09	-	1	-
PD.VIP.33	Biopsi Ginjal	-	0	0	690000	0	0	0	690000	0	0	A09	-	1	-
PD.VIP.34	USG Ginjal	-	0	0	402500	0	0	0	402500	0	0	A09	-	1	-
PD.VIP.35	Peritoneal Dialisa Transfer Set	-	0	0	1035000	0	0	0	1035000	0	0	A09	-	1	-
PD.VIP.36	Pungsi Kista Ginjal	-	0	0	920000	0	0	0	920000	0	0	A09	-	1	-
PD.VIP.4	Polipektomi SCBA	-	0	0	1955000	0	0	0	1955000	0	0	A09	-	1	-
PD.VIP.9	Kapsul Endoskopi	-	0	0	1897500	0	0	0	1897500	0	0	A09	-	1	-
PD.VVIP.1	Ligasi VE termasuk Ligator	-	0	0	1851500	0	0	0	1851500	0	0	A09	-	1	-
PD.VVIP.10	Pemakaian C-arm	-	0	0	462875	0	0	0	462875	0	0	A09	-	1	-
PD.VVIP.11	Injeksi Intra Arkuler + Jar Lunak	-	0	0	529000	0	0	0	529000	0	0	A09	-	1	-
PD.VVIP.12	Pungsi Sendi Kecil	-	0	0	529000	0	0	0	529000	0	0	A09	-	1	-
PD.VVIP.13	Pungsi Sendi Besar	-	0	0	661250	0	0	0	661250	0	0	A09	-	1	-
PD.VVIP.14	Bronkoskopi	-	0	0	661250	0	0	0	661250	0	0	A09	-	1	-
PD.VVIP.15	Bronkoskopi + Biopsi	-	0	0	859625	0	0	0	859625	0	0	A09	-	1	-
PD.VVIP.16	ERCP Diagnostik	-	0	0	1983750	0	0	0	1983750	0	0	A09	-	1	-
PD.VVIP.17	TTP Guided USG	-	0	0	363687.5	0	0	0	363687.5	0	0	A09	-	1	-
PD.VVIP.18	Fungsi Cairan Pleura	KVVIP	110000	0	0	385000	0	0	0	495000	495000	A09	VVIP	1	-
PD.VVIP.19	Pungsi Pleura Guided USG	-	0	0	330625	0	0	0	330625	0	0	A09	-	1	-
PD.VVIP.2	Hemorhoid Kontrol (Anuskopi)	-	0	0	396750	0	0	0	396750	0	0	A09	-	1	-
PD.VVIP.20	FNAB 	-	0	0	330625	0	0	0	330625	0	0	A09	-	1	-
PD.VVIP.21	Biopsi Pleura	-	0	0	330625	0	0	0	330625	0	0	A09	-	1	-
PD.VVIP.22	Spirometri	-	0	0	330625	0	0	0	330625	0	0	A09	-	1	-
PD.VVIP.23	FNAB + USG Guided	-	0	0	330625	0	0	0	330625	0	0	A09	-	1	-
PD.VVIP.24	USG Hepar	-	0	0	462875	0	0	0	462875	0	0	A09	-	1	-
PD.VVIP.25	Biopsi Hepar	-	0	0	1058000	0	0	0	1058000	0	0	A09	-	1	-
PD.VVIP.26	Aspirasi Abses Hepar	-	0	0	1322500	0	0	0	1322500	0	0	A09	-	1	-
PD.VVIP.27	Pungsi Ascites Guided USG	-	0	0	1058000	0	0	0	1058000	0	0	A09	-	1	-
PD.VVIP.28	Fungsi Ascites (Dokter Spesialis)	KVVIP	110000	0	0	330000	0	0	0	440000	440000	A09	VVIP	1	-
PD.VVIP.29	Alergi Imunologi Skin Prick Test	-	0	0	198375	0	0	0	198375	0	0	A09	-	1	-
PD.VVIP.3	Jasa Operasi Hemorhoid	KVVIP	0	0	3900000	0	0	0	3900000	0	3900000	A09	VVIP	1	-
PD.VVIP.30	EKG	-	55000	0	77000	0	0	0	132000	55000	132000	A09	VVIP	1	-
PD.VVIP.31	Treadmill (Pendampingan)	-	0	0	462875	0	0	0	462875	0	0	A09	-	1	-
PD.VVIP.32	Echocardiografi Dasar	-	0	0	661250	0	0	0	661250	0	0	A09	-	1	-
PD.VVIP.33	Biopsi Ginjal	-	0	0	793500	0	0	0	793500	0	0	A09	-	1	-
PD.VVIP.34	USG Ginjal	-	0	0	462875	0	0	0	462875	0	0	A09	-	1	-
PD.VVIP.35	Peritoneal Dialisa Transfer Set	-	0	0	1190250	0	0	0	1190250	0	0	A09	-	1	-
PD.VVIP.36	Pungsi Kista Ginjal	-	0	0	1058000	0	0	0	1058000	0	0	A09	-	1	-
PD.VVIP.4	Polipektomi SCBA	-	0	0	2248250	0	0	0	2248250	0	0	A09	-	1	-
PD.VVIP.9	Kapsul Endoskopi	-	0	0	2182125	0	0	0	2182125	0	0	A09	-	1	-
PR.01	Pasang Infus Tali Pusat	K1	60000	0	0	50000	0	0	0	110000	110000	A09	K1	1	-
PR.02	Pasang Infus Tali Pusat	K2	60000	0	0	50000	0	0	0	110000	110000	A09	K2	1	-
PR.03	Pasang Infus Tali Pusat	K2	54000	0	0	45000	0	0	0	99000	99000	A09	K3	1	-
PR.VIP	Pasang Infus Tali Pusat	KVIP	66000	0	0	55000	0	0	0	121000	121000	A09	VIP	1	-
PR.VVIP	Pasang Infus Tali Pusat	KVVIP	66000	0	0	55000	0	0	0	121000	121000	A09	VVIP	1	-
RI01000	lelah	KP1	10000	10000	10000	10000	10000	10000	50000	50000	60000	B00	K2	0	-
RI01003	Tindakan Uji Coba	-	10000	20000	60000	50000	40000	30000	160000	150000	210000	A09	-	1	-
RI01004	Tindakan Uji Coba 2	-	10000	20000	30000	25000	20000	30000	110000	105000	135000	A09	-	1	-
RI51001	1111111111111	PK4	0	111	0	0	0	0	111	111	111	B1	ICU	0	-
RI51002	11111111111111111111111111	KP026	0	0	0	0	0	0	0	0	0	B00	ICU	0	Kelas 2
RI51003	Asuhan Keperawatan	-	30000	0	0	20000	0	0	0	50000	0	-	-	1	-
RI51004	USG Poli	-	300000	0	0	0	0	0	300000	300000	300000	-	-	1	-
RI51005	Uji Coba	KP026	10000	10000	10000	0	10000	10000	50000	0	0	-	-	1	-
RI51006	Persalinan	KP026	300000	0	0	0	0	0	300000	300000	300000	-	-	1	-
RI51007	HEMODIALISA	KP026	300000	0	0	0	0	0	300000	300000	300000	-	-	1	-
RI51008	TES TARIF	-	1	2	6	5	4	3	16	15	21	-	-	1	-
S.I.1	Tindakan Punksi Lumbal	K1	0	0	250000	0	0	0	250000	0	250000	A09	K1	1	-
S.I.2	Biopsi Saraf Kutaneus, Otot	K1	0	0	300000	0	0	0	300000	0	300000	A09	K1	1	-
S.I.3	Punksi Cairan Otak dengan Narkose	K1	0	0	900000	0	0	0	900000	0	900000	A09	K1	1	-
S.I.4	MTPS	K1	0	0	150000	0	0	0	150000	0	150000	A09	K1	1	-
S.I.5	Pemeriksaan Funduskopi	K1	0	0	75000	0	0	0	75000	0	75000	A09	K1	1	-
S.II.1	Tindakan Punksi Lumbal	K2	0	0	250000	0	0	0	250000	0	250000	A09	K2	1	-
S.II.2	Biopsi Saraf Kutaneus, Otot	K2	0	0	250000	0	0	0	250000	0	250000	A09	K2	1	-
S.II.3	Punksi Cairan Otak dengan Narkose	K2	0	0	800000	0	0	0	800000	0	800000	A09	K2	1	-
S.II.4	MTPS	K2	0	0	100000	0	0	0	100000	0	100000	A09	K2	1	-
S.II.5	Pemeriksaan Funduskopi	K2	0	0	50000	0	0	0	50000	0	50000	A09	K2	1	-
S.III.1	Tindakan Punksi Lumbal	K3	0	0	200000	0	0	0	200000	0	200000	A09	K3	1	-
S.III.2	Biopsi Saraf Kutaneus, Otot	K3	0	0	200000	0	0	0	200000	0	200000	A09	K3	1	-
S.III.3	Punksi Cairan Otak dengan Narkose	K3	0	0	800000	0	0	0	800000	0	800000	A09	K3	1	-
S.III.4	MTPS	K3	0	0	75000	0	0	0	75000	0	75000	A09	K3	1	-
S.III.5	Pemeriksaan Funduskopi	K3	0	0	50000	0	0	0	50000	0	50000	A09	K3	1	-
S.ODC.1	Tindakan Punksi Lumbal	-	0	0	0	0	0	0	0	0	0	A09	-	1	-
S.ODC.2	Biopsi Saraf Kutaneus, Otot	-	0	0	0	0	0	0	0	0	0	A09	-	1	-
S.ODC.3	Punksi Cairan Otak dengan Narkose	-	0	0	0	0	0	0	0	0	0	A09	-	1	-
S.ODC.4	MTPS	-	0	0	75000	0	0	0	75000	0	75000	A09	KO	1	-
S.ODC.5	Pemeriksaan Funduskopi	-	0	0	50000	0	0	0	50000	0	50000	A09	KO	1	-
S.VIP.1	Tindakan Punksi Lumbal	KVIP	0	0	300000	0	0	0	300000	0	300000	A09	VIP	1	-
S.VIP.2	Biopsi Saraf Kutaneus, Otot	KVIP	0	0	350000	0	0	0	350000	0	350000	A09	VIP	1	-
S.VIP.3	Punksi Cairan Otak dengan Narkose	KVIP	0	0	1000000	0	0	0	1000000	0	1000000	A09	VIP	1	-
S.VIP.4	MTPS	KVIP	0	0	150000	0	0	0	150000	0	150000	A09	VIP	1	-
S.VIP.5	Pemeriksaan Funduskopi	KVIP	0	0	75000	0	0	0	75000	0	75000	A09	VIP	1	-
S.VVIP.1	Tindakan Punksi Lumbal	KVVIP	0	0	500000	0	0	0	500000	0	500000	A09	VVIP	1	-
S.VVIP.2	Biopsi Saraf Kutaneus, Otot	KVVIP	0	0	400000	0	0	0	400000	0	400000	A09	VVIP	1	-
S.VVIP.3	Punksi Cairan Otak dengan Narkose	KVVIP	0	0	1500000	0	0	0	1500000	0	1500000	A09	VVIP	1	-
S.VVIP.4	MTPS	KVVIP	0	0	200000	0	0	0	200000	0	200000	A09	VVIP	1	-
S.VVIP.5	Pemeriksaan Funduskopi	KVVIP	0	0	75000	0	0	0	75000	0	75000	A09	VVIP	1	-
THT.001	Jasa Operator Operasi Sinusitis	K1	0	0	4000000	0	0	0	4000000	0	4000000	A09	K1	1	-
THT.002	Jasa Operator Operasi Sinusitis	K2	0	0	3500000	0	0	0	3500000	0	3500000	A09	K2	1	-
THT.003	Jasa Operator Operasi Sinusitis	K3	0	0	3000000	0	0	0	3000000	0	3000000	A09	K3	1	-
THT.004	Jasa Operator Operasi Sinusitis	KVIP	0	0	4500000	0	0	0	4500000	0	4500000	A09	VIP	1	-
THT.005	Jasa Operator Operasi Sinusitis	KVVIP	0	0	4500000	0	0	0	4500000	0	4500000	A09	VVIP	1	-
THT.006	Jasa Asisten Operasi Sinusitis	K1	0	0	0	500000	0	0	0	500000	500000	A09	K1	1	-
THT.007	Jasa Asisten Operasi Sinusitis	K2	0	0	0	500000	0	0	0	500000	500000	A09	K2	1	-
THT.008	Jasa Asisten Operasi Sinusitis	K3	0	0	0	500000	0	0	0	500000	500000	A09	K3	1	-
THT.009	Jasa Asisten Operasi Sinusitis	KVIP	0	0	0	500000	0	0	0	500000	500000	A09	VIP	1	-
THT.010	Jasa Asisten Operasi Sinusitis	KVVIP	0	0	0	500000	0	0	0	500000	500000	A09	VVIP	1	-
THT.I.1	Audiologi Nada Murni	-	0	0	185000	0	0	0	185000	0	0	A09	-	1	-
THT.I.10	Pasang Tampon Posterior	-	0	0	175000	0	0	0	175000	0	0	A09	-	1	-
THT.I.11	Angkat Tampon Anterior	-	0	0	100000	0	0	0	100000	0	0	A09	-	1	-
THT.I.12	Angkat Tampon Posterior	-	0	0	175000	0	0	0	175000	0	0	A09	-	1	-
THT.I.13	Kaustik Hidung	-	0	0	100000	0	0	0	100000	0	0	A09	-	1	-
THT.I.14	Kausterisasi Hidung	-	0	0	125000	0	0	0	125000	0	0	A09	-	1	-
THT.I.15	Biopsi Tumor Oval Cavity LF	-	0	0	600000	0	0	0	600000	0	0	A09	-	1	-
THT.I.16	Ganti Perban Laringektomi	-	0	0	225000	0	0	0	225000	0	0	A09	-	1	-
THT.I.17	Reposisi Hidung THT	-	0	0	600000	0	0	0	600000	0	0	A09	-	1	-
THT.I.18	Tes Alergi: Skin Prick Test	-	0	0	350000	0	0	0	350000	0	0	A09	-	1	-
THT.I.19	Tampon Hidung Anterior Onko	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
THT.I.2	Audiometri Tutur	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
THT.I.20	Tampon Hidung Posterior	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
THT.I.21	Angkat Tampon Anterior	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
THT.I.22	Debridement	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
THT.I.23	Pasang OGT/ NGT	-	35000	0	0	40000	0	0	35000	75000	75000	A09	K1	1	-
THT.I.24	Speech Assement	-	0	0	150000	0	0	0	150000	0	0	A09	-	1	-
THT.I.25	Tes Psikolog	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
THT.I.26	Eksplorasi Abses Submandibula	-	0	0	550000	0	0	0	550000	0	0	A09	-	1	-
THT.I.27	Laringektomi + RND	-	0	0	4200000	0	0	0	4200000	0	0	A09	-	1	-
THT.I.28	Tiroidektomi Total	-	0	0	2400000	0	0	0	2400000	0	0	A09	-	1	-
THT.I.29	Mastoidektomi Sederhana	-	0	0	3300000	0	0	0	3300000	0	0	A09	-	1	-
THT.I.3	Tes Keseimbangan dengan Frezels	-	0	0	250000	0	0	0	250000	0	0	A09	-	1	-
THT.I.30	Mastoidektomi Radikal	-	0	0	4100000	0	0	0	4100000	0	0	A09	-	1	-
THT.I.31	Mastoidektomi Radikal dengan Penyulit	-	0	0	5000000	0	0	0	5000000	0	0	A09	-	1	-
THT.I.4	Irigasi Liang Telinga	-	0	0	150000	0	0	0	150000	0	0	A09	-	1	-
THT.I.5	Ektrasi Benda Asing Telinga	-	0	0	150000	0	0	0	150000	0	0	A09	-	1	-
THT.I.6	Insisi Abses	-	0	0	75000	0	0	0	75000	0	0	A09	-	1	-
THT.I.7	Biopsi (Biopsi Otologi)	-	0	0	200000	0	0	0	200000	0	0	A09	-	1	-
THT.I.8	Parasintesis	-	0	0	125000	0	0	0	125000	0	0	A09	-	1	-
THT.I.9	Pasang Tampon Anterior	-	0	0	100000	0	0	0	100000	0	0	A09	-	1	-
THT.II.1	Audiologi Nada Murni	-	0	0	157250	0	0	0	157250	0	0	A09	-	1	-
THT.II.10	Pasang Tampon Posterior	-	0	0	148750	0	0	0	148750	0	0	A09	-	1	-
THT.II.11	Angkat Tampon Anterior	-	0	0	85000	0	0	0	85000	0	0	A09	-	1	-
THT.II.12	Angkat Tampon Posterior	-	0	0	148750	0	0	0	148750	0	0	A09	-	1	-
THT.II.13	Kaustik Hidung	-	0	0	85000	0	0	0	85000	0	0	A09	-	1	-
THT.II.14	Kausterisasi Hidung	-	0	0	106250	0	0	0	106250	0	0	A09	-	1	-
THT.II.15	Biopsi Tumor Oval Cavity LF	-	0	0	510000	0	0	0	510000	0	0	A09	-	1	-
THT.II.16	Ganti Perban Laringektomi	-	0	0	191250	0	0	0	191250	0	0	A09	-	1	-
THT.II.17	Reposisi Hidung THT	-	0	0	510000	0	0	0	510000	0	0	A09	-	1	-
THT.II.18	Tes Alergi: Skin Prick Test	-	0	0	297500	0	0	0	297500	0	0	A09	-	1	-
THT.II.19	Tampon Hidung Anterior Onko	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
THT.II.2	Audiometri Tutur	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
THT.II.20	Tampon Hidung Posterior	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
THT.II.21	Angkat Tampon Anterior	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
THT.II.22	Debridement	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
THT.II.23	Pasang OGT/ NGT	-	40000	0	0	35000	0	0	40000	75000	75000	A09	K2	1	-
THT.II.24	Speech Assement	-	0	0	127500	0	0	0	127500	0	0	A09	-	1	-
THT.II.25	Tes Psikolog	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
THT.II.26	Eksplorasi Abses Submandibula	-	0	0	467500	0	0	0	467500	0	0	A09	-	1	-
THT.II.27	Laringektomi + RND	-	0	0	3570000	0	0	0	3570000	0	0	A09	-	1	-
THT.II.28	Tiroidektomi Total	-	0	0	2040000	0	0	0	2040000	0	0	A09	-	1	-
THT.II.29	Mastoidektomi Sederhana	-	0	0	2805000	0	0	0	2805000	0	0	A09	-	1	-
THT.II.3	Tes Keseimbangan dengan Frezels	-	0	0	212500	0	0	0	212500	0	0	A09	-	1	-
THT.II.30	Mastoidektomi Radikal	-	0	0	3485000	0	0	0	3485000	0	0	A09	-	1	-
THT.II.31	Mastoidektomi Radikal dengan Penyulit	-	0	0	4250000	0	0	0	4250000	0	0	A09	-	1	-
THT.II.4	Irigasi Liang Telinga	-	0	0	127500	0	0	0	127500	0	0	A09	-	1	-
THT.II.5	Ektrasi Benda Asing Telinga	-	0	0	127500	0	0	0	127500	0	0	A09	-	1	-
THT.II.6	Insisi Abses	-	0	0	63750	0	0	0	63750	0	0	A09	-	1	-
THT.II.7	Biopsi (Biopsi Otologi)	-	0	0	170000	0	0	0	170000	0	0	A09	-	1	-
THT.II.8	Parasintesis	-	0	0	106250	0	0	0	106250	0	0	A09	-	1	-
THT.II.9	Pasang Tampon Anterior	-	0	0	85000	0	0	0	85000	0	0	A09	-	1	-
THT.III.1	Audiologi Nada Murni	-	0	0	133662.5	0	0	0	133662.5	0	0	A09	-	1	-
THT.III.10	Pasang Tampon Posterior	-	0	0	126437.5	0	0	0	126437.5	0	0	A09	-	1	-
THT.III.11	Angkat Tampon Anterior	-	0	0	72250	0	0	0	72250	0	0	A09	-	1	-
THT.III.12	Angkat Tampon Posterior	-	0	0	126437.5	0	0	0	126437.5	0	0	A09	-	1	-
THT.III.13	Kaustik Hidung	-	0	0	72250	0	0	0	72250	0	0	A09	-	1	-
THT.III.14	Kausterisasi Hidung	-	0	0	90312.5	0	0	0	90312.5	0	0	A09	-	1	-
THT.III.15	Biopsi Tumor Oval Cavity LF	-	0	0	433500	0	0	0	433500	0	0	A09	-	1	-
THT.III.16	Ganti Perban Laringektomi	-	0	0	162562.5	0	0	0	162562.5	0	0	A09	-	1	-
THT.III.17	Reposisi Hidung THT	-	0	0	433500	0	0	0	433500	0	0	A09	-	1	-
THT.III.18	Tes Alergi: Skin Prick Test	-	0	0	252875	0	0	0	252875	0	0	A09	-	1	-
THT.III.19	Tampon Hidung Anterior Onko	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
THT.III.2	Audiometri Tutur	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
THT.III.20	Tampon Hidung Posterior	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
THT.III.21	Angkat Tampon Anterior	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
THT.III.22	Debridement	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
THT.III.23	Pasang OGT/ NGT	-	31500	0	0	36000	0	0	31500	67500	67500	A09	K3	1	-
THT.III.24	Speech Assement	-	0	0	108375	0	0	0	108375	0	0	A09	-	1	-
THT.III.25	Tes Psikolog	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
THT.III.26	Eksplorasi Abses Submandibula	-	0	0	397375	0	0	0	397375	0	0	A09	-	1	-
THT.III.27	Laringektomi + RND	-	0	0	3034500	0	0	0	3034500	0	0	A09	-	1	-
THT.III.28	Tiroidektomi Total	-	0	0	1734000	0	0	0	1734000	0	0	A09	-	1	-
THT.III.29	Mastoidektomi Sederhana	-	0	0	2384250	0	0	0	2384250	0	0	A09	-	1	-
THT.III.3	Tes Keseimbangan dengan Frezels	-	0	0	180625	0	0	0	180625	0	0	A09	-	1	-
THT.III.30	Mastoidektomi Radikal	-	0	0	2962250	0	0	0	2962250	0	0	A09	-	1	-
THT.III.31	Mastoidektomi Radikal dengan Penyulit	-	0	0	3612500	0	0	0	3612500	0	0	A09	-	1	-
THT.III.4	Irigasi Liang Telinga	-	0	0	108375	0	0	0	108375	0	0	A09	-	1	-
THT.III.5	Ektrasi Benda Asing Telinga	-	0	0	108375	0	0	0	108375	0	0	A09	-	1	-
THT.III.6	Insisi Abses	-	0	0	54187.5	0	0	0	54187.5	0	0	A09	-	1	-
THT.III.7	Biopsi (Biopsi Otologi)	-	0	0	144500	0	0	0	144500	0	0	A09	-	1	-
THT.III.8	Parasintesis	-	0	0	90312.5	0	0	0	90312.5	0	0	A09	-	1	-
THT.III.9	Pasang Tampon Anterior	-	0	0	72250	0	0	0	72250	0	0	A09	-	1	-
THT.ODC.1	Audiologi Nada Murni	-	0	0	113613.125	0	0	0	113613.125	0	0	A09	-	1	-
THT.ODC.10	Pasang Tampon Posterior	-	0	0	107471.875	0	0	0	107471.875	0	0	A09	-	1	-
THT.ODC.11	Angkat Tampon Anterior	-	0	0	61412.5	0	0	0	61412.5	0	0	A09	-	1	-
THT.ODC.12	Angkat Tampon Posterior	-	0	0	107471.875	0	0	0	107471.875	0	0	A09	-	1	-
THT.ODC.13	Kaustik Hidung	-	0	0	61412.5	0	0	0	61412.5	0	0	A09	-	1	-
THT.ODC.14	Kausterisasi Hidung	-	0	0	76765.625	0	0	0	76765.625	0	0	A09	-	1	-
THT.ODC.15	Biopsi Tumor Oval Cavity LF	-	0	0	368475	0	0	0	368475	0	0	A09	-	1	-
THT.ODC.16	Ganti Perban Laringektomi	-	0	0	138178.125	0	0	0	138178.125	0	0	A09	-	1	-
THT.ODC.17	Reposisi Hidung THT	-	0	0	368475	0	0	0	368475	0	0	A09	-	1	-
THT.ODC.18	Tes Alergi: Skin Prick Test	-	0	0	214943.75	0	0	0	214943.75	0	0	A09	-	1	-
THT.ODC.19	Tampon Hidung Anterior Onko	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
THT.ODC.2	Audiometri Tutur	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
THT.ODC.20	Tampon Hidung Posterior	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
THT.ODC.21	Angkat Tampon Anterior	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
THT.ODC.22	Debridement	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
THT.ODC.24	Speech Assement	-	0	0	92118.75	0	0	0	92118.75	0	0	A09	-	1	-
THT.ODC.25	Tes Psikolog	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
THT.ODC.26	Eksplorasi Abses Submandibula	-	0	0	337768.75	0	0	0	337768.75	0	0	A09	-	1	-
THT.ODC.27	Laringektomi + RND	-	0	0	2579325	0	0	0	2579325	0	0	A09	-	1	-
THT.ODC.28	Tiroidektomi Total	-	0	0	1473900	0	0	0	1473900	0	0	A09	-	1	-
THT.ODC.29	Mastoidektomi Sederhana	-	0	0	2026612.5	0	0	0	2026612.5	0	0	A09	-	1	-
THT.ODC.3	Tes Keseimbangan dengan Frezels	-	0	0	153531.25	0	0	0	153531.25	0	0	A09	-	1	-
THT.ODC.30	Mastoidektomi Radikal	-	0	0	2517912.5	0	0	0	2517912.5	0	0	A09	-	1	-
THT.ODC.31	Mastoidektomi Radikal dengan Penyulit	-	0	0	3070625	0	0	0	3070625	0	0	A09	-	1	-
THT.ODC.4	Irigasi Liang Telinga	-	0	0	92118.75	0	0	0	92118.75	0	0	A09	-	1	-
THT.ODC.5	Ektrasi Benda Asing Telinga	-	0	0	92118.75	0	0	0	92118.75	0	0	A09	-	1	-
THT.ODC.6	Insisi Abses	-	0	0	46059.375	0	0	0	46059.375	0	0	A09	-	1	-
THT.ODC.7	Biopsi (Biopsi Otologi)	-	0	0	122825	0	0	0	122825	0	0	A09	-	1	-
THT.ODC.8	Parasintesis	-	0	0	76765.625	0	0	0	76765.625	0	0	A09	-	1	-
THT.ODC.9	Pasang Tampon Anterior	-	0	0	61412.5	0	0	0	61412.5	0	0	A09	-	1	-
THT.VIP.1	Audiologi Nada Murni	-	0	0	212750	0	0	0	212750	0	0	A09	-	1	-
THT.VIP.10	Pasang Tampon Posterior	-	0	0	201250	0	0	0	201250	0	0	A09	-	1	-
THT.VIP.11	Angkat Tampon Anterior	-	0	0	115000	0	0	0	115000	0	0	A09	-	1	-
THT.VIP.12	Angkat Tampon Posterior	-	0	0	201250	0	0	0	201250	0	0	A09	-	1	-
THT.VIP.13	Kaustik Hidung	-	0	0	115000	0	0	0	115000	0	0	A09	-	1	-
THT.VIP.14	Kausterisasi Hidung	-	0	0	143750	0	0	0	143750	0	0	A09	-	1	-
THT.VIP.15	Biopsi Tumor Oval Cavity LF	-	0	0	690000	0	0	0	690000	0	0	A09	-	1	-
THT.VIP.16	Ganti Perban Laringektomi	-	0	0	258750	0	0	0	258750	0	0	A09	-	1	-
THT.VIP.17	Reposisi Hidung THT	-	0	0	690000	0	0	0	690000	0	0	A09	-	1	-
THT.VIP.18	Tes Alergi: Skin Prick Test	-	0	0	402500	0	0	0	402500	0	0	A09	-	1	-
THT.VIP.19	Tampon Hidung Anterior Onko	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
THT.VIP.2	Audiometri Tutur	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
THT.VIP.20	Tampon Hidung Posterior	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
THT.VIP.21	Angkat Tampon Anterior	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
THT.VIP.22	Debridement oleh Perawat	-	0	0	0	230000	0	0	0	230000	230000	A09	VIP	1	-
THT.VIP.23	Pasang OGT/ NGT	-	38500	0	0	44000	0	0	38500	82500	82500	A09	VIP	1	-
THT.VIP.24	Speech Assement	-	0	0	172500	0	0	0	172500	0	0	A09	-	1	-
THT.VIP.25	Tes Psikolog	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
THT.VIP.26	Eksplorasi Abses Submandibula	-	0	0	632500	0	0	0	632500	0	0	A09	-	1	-
THT.VIP.27	Laringektomi + RND	-	0	0	4830000	0	0	0	4830000	0	0	A09	-	1	-
THT.VIP.28	Tiroidektomi Total	-	0	0	2760000	0	0	0	2760000	0	0	A09	-	1	-
THT.VIP.29	Mastoidektomi Sederhana	-	0	0	3795000	0	0	0	3795000	0	0	A09	-	1	-
THT.VIP.3	Tes Keseimbangan dengan Frezels	-	0	0	287500	0	0	0	287500	0	0	A09	-	1	-
THT.VIP.30	Mastoidektomi Radikal	-	0	0	4715000	0	0	0	4715000	0	0	A09	-	1	-
THT.VIP.31	Mastoidektomi Radikal dengan Penyulit	-	0	0	5750000	0	0	0	5750000	0	0	A09	-	1	-
THT.VIP.4	Irigasi Liang Telinga	-	0	0	172500	0	0	0	172500	0	0	A09	-	1	-
THT.VIP.5	Ektrasi Benda Asing Telinga	-	0	0	172500	0	0	0	172500	0	0	A09	-	1	-
THT.VIP.6	Insisi Abses	-	0	0	86250	0	0	0	86250	0	0	A09	-	1	-
THT.VIP.7	Biopsi (Biopsi Otologi)	-	0	0	230000	0	0	0	230000	0	0	A09	-	1	-
THT.VIP.8	Parasintesis	-	0	0	143750	0	0	0	143750	0	0	A09	-	1	-
THT.VIP.9	Pasang Tampon Anterior	-	0	0	115000	0	0	0	115000	0	0	A09	-	1	-
THT.VVIP.1	Audiologi Nada Murni	-	0	0	244662.5	0	0	0	244662.5	0	0	A09	-	1	-
THT.VVIP.10	Pasang Tampon Posterior	-	0	0	231437.5	0	0	0	231437.5	0	0	A09	-	1	-
THT.VVIP.11	Angkat Tampon Anterior	-	0	0	132250	0	0	0	132250	0	0	A09	-	1	-
THT.VVIP.12	Angkat Tampon Posterior	-	0	0	231437.5	0	0	0	231437.5	0	0	A09	-	1	-
THT.VVIP.13	Kaustik Hidung	-	0	0	132250	0	0	0	132250	0	0	A09	-	1	-
THT.VVIP.14	Kausterisasi Hidung	-	0	0	165312.5	0	0	0	165312.5	0	0	A09	-	1	-
THT.VVIP.15	Biopsi Tumor Oval Cavity LF	-	0	0	793500	0	0	0	793500	0	0	A09	-	1	-
THT.VVIP.16	Ganti Perban Laringektomi	-	0	0	297562.5	0	0	0	297562.5	0	0	A09	-	1	-
THT.VVIP.17	Reposisi Hidung THT	-	0	0	793500	0	0	0	793500	0	0	A09	-	1	-
THT.VVIP.18	Tes Alergi: Skin Prick Test	-	0	0	462875	0	0	0	462875	0	0	A09	-	1	-
THT.VVIP.19	Tampon Hidung Anterior Onko	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
THT.VVIP.2	Audiometri Tutur	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
THT.VVIP.20	Tampon Hidung Posterior	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
THT.VVIP.21	Angkat Tampon Anterior	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
THT.VVIP.22	Debridement	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
THT.VVIP.23	Pasang OGT/ NGT	-	38500	0	0	44000	0	0	38500	82500	82500	A09	VVIP	1	-
THT.VVIP.24	Speech Assement	-	0	0	198375	0	0	0	198375	0	0	A09	-	1	-
THT.VVIP.25	Tes Psikolog	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
THT.VVIP.26	Eksplorasi Abses Submandibula	-	0	0	727375	0	0	0	727375	0	0	A09	-	1	-
THT.VVIP.27	Laringektomi + RND	-	0	0	5554500	0	0	0	5554500	0	0	A09	-	1	-
THT.VVIP.28	Tiroidektomi Total	-	0	0	3174000	0	0	0	3174000	0	0	A09	-	1	-
THT.VVIP.29	Mastoidektomi Sederhana	-	0	0	4364250	0	0	0	4364250	0	0	A09	-	1	-
THT.VVIP.3	Tes Keseimbangan dengan Frezels	-	0	0	330625	0	0	0	330625	0	0	A09	-	1	-
THT.VVIP.30	Mastoidektomi Radikal	-	0	0	5422250	0	0	0	5422250	0	0	A09	-	1	-
THT.VVIP.31	Mastoidektomi Radikal dengan Penyulit	-	0	0	6612500	0	0	0	6612500	0	0	A09	-	1	-
THT.VVIP.4	Irigasi Liang Telinga	-	0	0	198375	0	0	0	198375	0	0	A09	-	1	-
THT.VVIP.5	Ektrasi Benda Asing Telinga	-	0	0	198375	0	0	0	198375	0	0	A09	-	1	-
THT.VVIP.6	Insisi Abses	-	0	0	99187.5	0	0	0	99187.5	0	0	A09	-	1	-
THT.VVIP.7	Biopsi (Biopsi Otologi)	-	0	0	264500	0	0	0	264500	0	0	A09	-	1	-
THT.VVIP.8	Parasintesis	-	0	0	165312.5	0	0	0	165312.5	0	0	A09	-	1	-
THT.VVIP.9	Pasang Tampon Anterior	-	0	0	132250	0	0	0	132250	0	0	A09	-	1	-
UM.B.0026	Breast Care	KVVIP	27500	0	0	27500	0	0	0	55000	55000	A09	VVIP	1	-
UM.B.01	Begging 1-3 jam	K1	25000	0	0	25000	0	0	0	25000	25000	A09	K2	1	-
UM.B.02	Begging 1-3 jam	K2	25000	0	0	25000	0	0	0	50000	50000	A09	K2	1	-
UM.B.03	Begging 1-3 jam	PK3	22500	0	0	22500	0	0	0	45000	45000	A09	K3	1	-
UM.B.04	Begging 1-3 jam	KVIP	27500	0	0	27500	0	0	0	55000	55000	A09	VIP	1	-
UM.B.05	Begging 1-3 jam	KVVIP	27500	0	0	27500	0	0	0	55000	55000	A09	VVIP	1	-
UM.B.06	Begging 4-8 jam	K1	30000	0	0	35000	0	0	0	65000	65000	A09	K1	1	-
UM.B.07	Begging 4-8 jam	K2	30000	0	0	35000	0	0	0	65000	65000	A09	K2	1	-
UM.B.08	Begging 4-8 jam	K3	27000	0	0	31500	0	0	0	58500	58500	A09	K3	1	-
UM.B.09	Begging 4-8 jam	KVIP	33000	0	0	38500	0	0	0	71500	71500	A09	VIP	1	-
UM.B.10	Begging 4-8 jam	KVVIP	33000	0	0	38500	0	0	0	71500	71500	A09	VVIP	1	-
UM.B.11	Begging > 8  jam	K1	50000	0	0	50000	0	0	0	100000	100000	A09	K1	1	-
UM.B.12	Begging > 8 jam	K2	50000	0	0	50000	0	0	0	100000	100000	A09	K2	1	-
UM.B.13	Begging > 8 jam	K3	45000	0	0	45000	0	0	0	90000	90000	A09	K3	1	-
UM.B.14	Begging > 8 jam	KVIP	55000	0	0	55000	0	0	0	110000	110000	A09	VIP	1	-
UM.B.15	Begging > 8 jam	KVVIP	55000	0	0	55000	0	0	0	110000	110000	A09	VVIP	1	-
UM.BID.01	Bidai	K1	30000	0	0	20000	0	0	0	50000	50000	A09	K1	1	-
UM.BID.02	Bidai	K2	30000	0	0	20000	0	0	0	50000	50000	A09	K2	1	-
UM.BID.03	Bidai	K3	27000	0	0	18000	0	0	0	45000	45000	A09	K3	1	-
UM.BID.04	Bidai	KVIP	33000	0	0	22000	0	0	0	55000	55000	A09	VIP	1	-
UM.BID.05	Bidai	KVVIP	33000	0	0	22000	0	0	0	55000	55000	A09	VVIP	1	-
UM.C/L.01	Clisma/Lavement	K1	35000	0	0	35000	0	0	0	70000	70000	A09	K1	1	-
UM.C/L.02	Clisma/Lavement	K2	35000	0	0	35000	0	0	0	70000	70000	A09	K2	1	-
UM.C/L.03	Clisma/Lavement	K3	31500	0	0	31500	0	0	0	63000	63000	A09	K3	1	-
UM.C/L.05	Clisma/Lavement	KVIP	38500	0	0	38500	0	0	0	77000	77000	A09	VIP	1	-
UM.C/L.06	Clisma/Lavement	KVVIP	38500	0	0	38500	0	0	0	77000	77000	A09	VVIP	1	-
UM.DS.01	Dj Shock	K1	150000	0	0	100000	0	0	0	250000	250000	A09	K1	1	-
UM.DS.02	Dj Shock	K2	150000	0	0	100000	0	0	0	250000	250000	A09	K2	1	-
UM.DS.03	Dj Shock	K3	135000	0	0	90000	0	0	0	225000	225000	A09	K3	1	-
UM.DS.04	Dj Shock	KVIP	165000	0	0	110000	0	0	0	275000	275000	A09	VIP	1	-
UM.DS.05	Dj Shock	KVVIP	165000	0	0	110000	0	0	0	275000	275000	A09	VVIP	1	-
UM.EKS.01	Ekstraksi	K1	30000	0	0	20000	0	0	0	50000	50000	A09	K1	1	-
UM.EKS.02	Ekstraksi	K2	30000	0	0	20000	0	0	0	50000	50000	A09	K2	1	-
UM.EKS.03	Ekstraksi	K3	27000	0	0	18000	0	0	0	45000	45000	A09	K3	1	-
UM.EKS.04	Ekstraksi	KVIP	33000	0	0	22000	0	0	0	55000	55000	A09	VIP	1	-
UM.EKS.05	Ekstraksi	KVVIP	33000	0	0	22000	0	0	0	55000	55000	A09	VVIP	1	-
UM.EKS.06	Ekstraksi Copral (Dokter)	K1	60000	0	0	40000	0	0	0	100000	100000	A09	K1	1	-
UM.EKS.07	Ekstraksi Copral (Dokter)	K2	60000	0	0	40000	0	0	0	100000	100000	A09	K2	1	-
UM.EKS.08	Ekstraksi Copral (Dokter)	K3	54000	0	0	36000	0	0	0	90000	90000	A09	K3	1	-
UM.EKS.09	Ekstraksi Copral (Dokter)	KVIP	66000	0	0	44000	0	0	0	110000	110000	A09	VIP	1	-
UM.EKS.10	Ekstraksi Copral (Dokter)	KVVIP	66000	0	0	44000	0	0	0	110000	110000	A09	VVIP	1	-
UM.ETT.01	Pasang Endotracheal Tube (ETT)	K1	50000	0	0	75000	0	0	0	125000	125000	A09	K1	1	-
UM.ETT.02	Pasang Endotracheal Tube (ETT)	K2	50000	0	0	75000	0	0	0	125000	125000	A09	K2	1	-
UM.ETT.03	Pasang Endotracheal Tube (ETT)	K3	45000	0	0	67500	0	0	0	112500	112500	A09	K3	1	-
UM.ETT.04	Pasang Endotracheal Tube (ETT)	KVIP	55000	0	0	82500	0	0	0	137500	137500	A09	VIP	1	-
UM.ETT.05	Pasang Endotracheal Tube (ETT)	KVVIP	55000	0	0	82500	0	0	0	137500	137500	A09	VVIP	1	-
UM.GVB.01	Ganti Perban Besar	K1	25000	0	0	35000	0	0	0	60000	60000	A09	K1	1	-
UM.GVB.02	Ganti Perban Besar	K2	25000	0	0	35000	0	0	0	60000	60000	A09	K2	1	-
UM.GVB.03	Ganti Perban Besar	K3	22500	0	0	31500	0	0	0	54000	54000	A09	K3	1	-
UM.GVB.04	Ganti Perban Besar	KVIP	27500	0	0	38500	0	0	0	66000	66000	A09	VIP	1	-
UM.GVB.05	Ganti Perban Besar	KVVIP	27500	0	0	38500	0	0	0	66000	66000	A09	VVIP	1	-
UM.GVK.01	Ganti Perban Kecil	K1	20000	0	0	20000	0	0	0	40000	40000	A09	K1	1	-
UM.GVK.02	Ganti Perban Kecil	K2	20000	0	0	20000	0	0	0	40000	40000	A09	K2	1	-
UM.GVK.03	Ganti Perban Kecil	K3	18000	0	0	18000	0	0	0	36000	36000	A09	K3	1	-
UM.GVK.04	Ganti Perban Kecil	KVIP	22000	0	0	22000	0	0	0	44000	44000	A09	VIP	1	-
UM.GVK.05	Ganti Perban Kecil	KVVIP	22000	0	0	22000	0	0	0	44000	44000	A09	VVIP	1	-
UM.HT.013	Heating 1-5 cm	K1	36000	0	0	24000	0	0	36000	60000	60000	A09	K1	1	-
UM.HT.014	Heating 1-5 cm	K2	36000	0	0	24000	0	0	36000	60000	60000	A09	K2	1	-
UM.HT.015	Heating 1-5 cm	K3	32400	0	0	21600	0	0	32400	54000	54000	A09	K3	1	-
UM.HT.016	Heating 1-5 cm	KVIP	39600	0	0	26400	0	0	39600	66000	66000	A09	VIP	1	-
UM.HT.017	Heating 1-5 cm	KVVIP	39600	0	0	26400	0	0	39600	66000	66000	A09	VVIP	1	-
UM.HT.018	Heating 6-15 cm	K1	48000	0	0	32000	0	0	48000	80000	80000	A09	K1	1	-
UM.HT.019	Heating 6-15 cm	K2	48000	0	0	32000	0	0	48000	80000	80000	A09	K2	1	-
UM.HT.020	Heating 6-15 cm	K3	43200	0	0	28800	0	0	43200	72000	72000	A09	K3	1	-
UM.HT.021	Heating 6-16 cm	KVIP	35200	0	0	52800	0	0	35200	88000	88000	A09	VIP	1	-
UM.HT.022	Heating 6-15 cm	KVVIP	52800	0	0	35200	0	0	52800	88000	88000	A09	VVIP	1	-
UM.HT.023	Heating >15 	K1	60000	0	0	40000	0	0	60000	100000	100000	A09	K1	1	-
UM.HT.024	Heating >15 	K2	60000	0	0	40000	0	0	60000	100000	100000	A09	K2	1	-
UM.HT.025	Heating >15 	K3	54000	0	0	36000	0	0	54000	90000	90000	A09	K3	1	-
UM.HT.026	Heating >15	KVIP	66000	0	0	44000	0	0	66000	110000	110000	A09	VIP	1	-
UM.HT.027	Heating >15	KVVIP	66000	0	0	44000	0	0	66000	110000	110000	A09	VVIP	1	-
UM.HT.028	Aff Heating 1-5 cm	K1	24000	0	0	36000	0	0	0	60000	60000	A09	K1	1	-
UM.HT.029	Aff Heating 1-5 cm	K2	36000	0	0	24000	0	0	0	60000	60000	A09	K2	1	-
UM.HT.030	Aff Heating 1-5 cm	K3	32400	0	0	21600	0	0	0	54000	54000	A09	K3	1	-
UM.HT.031	Aff Heating 1-5 cm	KVIP	39600	0	0	26400	0	0	0	66000	66000	A09	VIP	1	-
UM.HT.032	Aff Heating 1-5 cm	KVVIP	39600	0	0	26400	0	0	0	66000	66000	A09	VVIP	1	-
UM.HT.033	Aff Heating 6-15 cm	K1	48000	0	0	32000	0	0	0	80000	80000	A09	K1	1	-
UM.HT.034	Aff Heating 6-15 cm	K2	48000	0	0	32000	0	0	0	80000	80000	A09	K2	1	-
UM.HT.035	Aff Heating 6-15 cm	K3	43200	0	0	28800	0	0	0	72000	72000	A09	K3	1	-
UM.HT.036	Aff Heating 6-15 cm	KVIP	52800	0	0	35200	0	0	0	88000	88000	A09	VIP	1	-
UM.HT.037	Aff Heating 6-15 cm	KVVIP	60000	0	0	40000	0	0	0	100000	100000	A09	VVIP	1	-
UM.HT.038	Aff Heating >15 cm	K1	60000	0	0	40000	0	0	0	100000	100000	A09	K1	1	-
UM.HT.039	Aff Heating >15 cm	K2	60000	0	0	40000	0	0	0	60000	60000	A09	K2	1	-
UM.HT.040	Aff Heating >15 cm	K3	54000	0	0	36000	0	0	0	90000	90000	A09	K3	1	-
UM.HT.041	Aff Heating >15 cm	KVIP	66000	0	0	44000	0	0	0	110000	110000	A09	VIP	1	-
UM.HT.042	Aff Heating >15 cm	KVVIP	66000	0	0	44000	0	0	0	110000	110000	A09	VVIP	1	-
UM.I.002	Pasang Vemplon	K1	30000	0	0	30000	0	0	30000	60000	60000	A09	K1	1	-
UM.I.003	Ventilator	K1	225000	0	0	175000	0	0	225000	400000	400000	A09	K1	1	-
UM.I.01	Nebulizer 4-7 kali	K1	45000	0	0	45000	0	0	45000	90000	90000	A09	K1	1	-
UM.I.012	Dressing (R.Luka) Perhari	K1	24000	0	0	30000	0	0	24000	54000	54000	A09	K1	1	-
UM.II.002	Pasang Vemplon	K2	30000	0	0	30000	0	0	30000	60000	60000	A09	K2	1	-
UM.II.003	Ventilator	K2	225000	0	0	175000	0	0	225000	400000	400000	A09	K2	1	-
UM.II.012	Dressing (R.Luka) Perhari	K2	24000	0	0	30000	0	0	24000	54000	54000	A09	K2	1	-
UM.II.02	Nebulizer 4-7 kali	K2	45000	0	0	45000	0	0	45000	90000	90000	A09	K2	1	-
UM.III.002	Pasang Vemplon	K3	27000	0	0	27000	0	0	27000	54000	54000	A09	K3	1	-
UM.III.003	Ventilator	K3	202500	0	0	157500	0	0	202500	360000	360000	A09	K3	1	-
UM.III.012	Dressing (R.Luka) Perhari	K3	21600	0	0	27000	0	0	21600	48600	48600	A09	K3	1	-
UM.III.03	Nebulizer 4-7 kali	K3	40500	0	0	40500	0	0	40500	81000	81000	A09	K3	1	-
UM.INK.01	Incisi Kecil	K1	30000	0	0	30000	0	0	0	60000	60000	A09	K1	1	-
UM.INK.02	Incisi Kecil	K2	30000	0	0	30000	0	0	0	60000	60000	A09	K2	1	-
UM.INK.03	Incisi Kecil	K3	27000	0	0	27000	0	0	0	54000	54000	A09	K3	1	-
UM.INK.04	Incisi Kecil	KVIP	33000	0	0	33000	0	0	0	66000	66000	A09	VIP	1	-
UM.INK.05	Incisi Kecil	KVVIP	33000	0	0	33000	0	0	0	66000	66000	A09	VVIP	1	-
UM.INK.06	Incisi Besar	K1	30000	0	0	40000	0	0	0	70000	70000	A09	K1	1	-
UM.INK.07	Incisi Besar	K2	30000	0	0	40000	0	0	0	70000	70000	A09	K2	1	-
UM.INK.08	Incisi Besar	K3	27000	0	0	36000	0	0	0	63000	63000	A09	K3	1	-
UM.INK.09	Incisi Besar	KVIP	33000	0	0	44000	0	0	0	77000	77000	A09	VIP	1	-
UM.INK.10	Incisi Besar	KVVIP	33000	0	0	44000	0	0	0	77000	77000	A09	VVIP	1	-
UM.IRMT.01	Irigasi Mata	K1	36000	0	0	24000	0	0	0	60000	60000	A09	K1	1	-
UM.IRMT.02	Irigasi Mata	K2	36000	0	0	24000	0	0	0	60000	60000	A09	K2	1	-
UM.IRMT.03	Irigasi Mata	K3	32400	0	0	21600	0	0	0	54000	54000	A09	K3	1	-
UM.IRMT.04	Irigasi Mata	KVIP	39600	0	0	26400	0	0	0	66000	66000	A09	VIP	1	-
UM.IRMT.05	Irigasi Mata	KVVIP	39600	0	0	26400	0	0	0	66000	66000	A09	VVIP	1	-
UM.IRTL.01	Irigasi Telinga	K1	36000	0	0	24000	0	0	0	60000	60000	A09	K1	1	-
UM.IRTL.02	Irigasi Telinga	K2	36000	0	0	24000	0	0	0	60000	60000	A09	K2	1	-
UM.IRTL.03	Irigasi Telinga	K3	32400	0	0	21600	0	0	0	54000	54000	A09	K3	1	-
UM.IRTL.04	Irigasi Telinga	KVIP	39600	0	0	26400	0	0	0	66000	66000	A09	VIP	1	-
UM.IRTL.05	Irigasi Telinga	KVVIP	39600	0	0	26400	0	0	0	66000	66000	A09	VVIP	1	-
UM.KL.01	Kumbah Lambung	K1	35000	0	0	55000	0	0	0	90000	90000	A09	K1	1	-
UM.KL.02	Kumbah Lambung	K2	35000	0	0	55000	0	0	0	90000	90000	A09	K2	1	-
UM.KL.03	Kumbah Lambung	K3	27000	0	0	49500	0	0	0	76500	76500	A09	K3	1	-
UM.KL.04	Kumbah Lambung	KVIP	33000	0	0	60500	0	0	0	93500	93500	A09	VIP	1	-
UM.KL.05	Kumbah Lambung	KVVIP	33000	0	0	60500	0	0	0	93500	93500	A09	VVIP	1	-
UM.OH/V.01	Oral Hygein/Vulva	K1	25000	0	0	25000	0	0	0	50000	50000	A09	K1	1	-
UM.OH/V.02	Oral Hygein/Vulva	K2	25000	0	0	25000	0	0	0	50000	50000	A09	K2	1	-
UM.OH/V.03	Oral Hygein/Vulva	K3	22500	0	0	22500	0	0	0	45000	45000	A09	K3	1	-
UM.OH/V.04	Oral Hygein/Vulva	KVIP	27500	0	0	27500	0	0	0	55000	55000	A09	VIP	1	-
UM.OH/V.05	Oral Hygein/Vulva	KVVIP	27500	0	0	27500	0	0	0	55000	55000	A09	VVIP	1	-
UM.PKOF.01	Penatalaksanaan Keracunan O Fosfat	K1	40000	0	0	75000	0	0	0	115000	115000	A09	K1	1	-
UM.PKOF.02	Penatalaksanaan Keracunan O Fosfat	K2	40000	0	0	75000	0	0	0	115000	115000	A09	K2	1	-
UM.PKOF.03	Penatalaksanaan Keracunan O Fosfat	K3	36000	0	0	67500	0	0	0	103500	103500	A09	K3	1	-
UM.PKOF.04	Penatalaksanaan Keracunan O Fosfat	KVIP	44000	0	0	82500	0	0	0	126500	126500	A09	VIP	1	-
UM.PKOF.05	Penatalaksanaan Keracunan O Fosfat	KVVIP	44000	0	0	82500	0	0	0	126500	126500	A09	VVIP	1	-
UM.PLK.01	Perawatan Luka Kotor	K1	50000	0	0	50000	0	0	0	100000	100000	A09	K1	1	-
UM.PLK.02	Perawatan Luka Kotor	K2	50000	0	0	50000	0	0	0	100000	100000	A09	K2	1	-
UM.PLK.03	Perawatan Luka Kotor	K3	45000	0	0	45000	0	0	0	90000	90000	A09	K3	1	-
UM.PLK.04	Perawatan Luka Kotor	KVIP	55000	0	0	55000	0	0	0	110000	110000	A09	VIP	1	-
UM.PLK.05	Perawatan Luka Kotor	KVVIP	55000	0	0	55000	0	0	0	110000	110000	A09	VVIP	1	-
UM.PLP.01	Perawatan Luka Perinieum	K1	50000	0	0	50000	0	0	0	100000	100000	A09	K1	1	-
UM.PLP.02	Perawatan Luka Perinieum	K2	50000	0	0	50000	0	0	0	100000	100000	A09	K2	1	-
UM.PLP.03	Perawatan Luka Perinieum	K3	45000	0	0	45000	0	0	0	90000	90000	A09	K3	1	-
UM.PLP.04	Perawatan Luka Perinieum	KVIP	55000	0	0	55000	0	0	0	110000	110000	A09	VIP	1	-
UM.PLP.05	Perawatan Luka Perinieum	KVVIP	55000	0	0	55000	0	0	0	0	0	A09	VVIP	1	-
UM.PR.01	Pasang infus Dewasa 2-3	K1	30000	0	0	30000	0	0	30000	60000	60000	A09	K1	1	-
UM.PSP.01	Pasang Syringe Pump	K1	125000	0	0	35000	0	0	0	160000	160000	A09	K1	1	-
UM.PSP.02	Pasang Syringe Pump	K2	125000	0	0	35000	0	0	0	160000	160000	A09	K2	1	-
UM.PSP.03	Pasang Syringe Pump	K3	112500	0	0	31500	0	0	0	144000	144000	A09	K3	1	-
UM.PSP.04	Pasang Syringe Pump	KVIP	137500	0	0	38500	0	0	0	176000	176000	A09	VIP	1	-
UM.PSP.05	Pasang Syringe Pump	KVVIP	137500	0	0	38500	0	0	0	176000	176000	A09	VVIP	1	-
UM.RP.01	Roser Plasty	K1	60000	0	0	40000	0	0	0	100000	100000	A09	K1	1	-
UM.RP.02	Roser Plasty	K2	60000	0	0	40000	0	0	0	100000	100000	A09	K2	1	-
UM.RP.03	Roser Plasty	K3	54000	0	0	36000	0	0	0	90000	90000	A09	K3	1	-
UM.RP.04	Roser Plasty	KVIP	66000	0	0	44000	0	0	0	110000	110000	A09	VIP	1	-
UM.RP.06	Roser Plasty	KVVIP	66000	0	0	44000	0	0	0	110000	110000	A09	VVIP	1	-
UM.SCP.011	Suction Perhari	K1	25000	0	0	30000	0	0	0	55000	55000	A09	K1	1	-
UM.SCP.012	Suction Perhari	K2	25000	0	0	30000	0	0	0	55000	55000	A09	K2	1	-
UM.SCP.013	Suction Perhari	K3	22500	0	0	27000	0	0	0	49500	49500	A09	K3	1	-
UM.SCP.014	Suction Perhari	KVIP	27500	0	0	33000	0	0	0	60500	60500	A09	VIP	1	-
UM.SCP.015	Suction Perhari	KVVIP	27500	0	0	33000	0	0	0	60500	60500	A09	VVIP	1	-
UM.SIRKUM.01	Sirkumsisi (IGD)	K1	140000	0	0	210000	0	0	0	350000	350000	A09	K1	1	-
UM.SIRKUM.02	Sirkumsisi (IGD)	K2	140000	0	0	210000	0	0	0	350000	350000	A09	K2	1	-
UM.SIRKUM.03	Sirkumsisi (IGD)	K3	126000	0	0	189000	0	0	0	315000	315000	A09	K3	1	-
UM.SIRKUM.04	Sirkumsisi (IGD)	KVIP	154000	0	0	231000	0	0	0	385000	385000	A09	VIP	1	-
UM.SIRKUM.05	Sirkumsisi (IGD)	KVVIP	154000	0	0	231000	0	0	0	385000	385000	A09	VVIP	1	-
UM.T.01	Aff Tampon	K1	90000	0	0	60000	0	0	0	150000	150000	A09	K1	1	-
UM.T.02	Aff Tampon	K2	90000	0	0	60000	0	0	0	150000	150000	A09	K2	1	-
UM.T.03	Aff Tampon	K3	81000	0	0	54000	0	0	0	135000	135000	A09	K3	1	-
UM.T.04	Aff Tampon	KVIP	99000	0	0	66000	0	0	0	165000	165000	A09	VIP	1	-
UM.T.05	Aff Tampon	KVVIP	99000	0	0	66000	0	0	0	165000	165000	A09	VVIP	1	-
UM.TB.01	Tindik Bayi	K1	50000	0	0	50000	0	0	0	100000	100000	A09	K1	1	-
UM.TB.02	Tindik Bayi	K2	50000	0	0	50000	0	0	50000	100000	100000	A09	K2	1	-
UM.TB.03	Tindik bayi	K3	45000	0	0	45000	0	0	0	90000	90000	A09	K3	1	-
UM.TB.04	Tindik Bayi	KVIP	55000	0	0	55000	0	0	0	110000	110000	A09	VIP	1	-
UM.TB.05	Tindik Bayi	KVVIP	55000	0	0	55000	0	0	0	110000	110000	A09	VVIP	1	-
UM.TD.01	Pasang Tranfusi Darah	K1	20000	0	0	30000	0	0	0	50000	50000	A09	K1	1	-
UM.TD.02	Pasang Tranfusi Darah	K2	20000	0	0	30000	0	0	0	50000	50000	A09	K2	1	-
UM.TD.03	Pasang Tranfusi Darah	K3	18000	0	0	27000	0	0	0	45000	45000	A09	K3	1	-
UM.TD.04	Pasang Tranfusi Darah	KVIP	22000	0	0	33000	0	0	0	55000	55000	A09	VIP	1	-
UM.TD.05	Pasang Tranfusi Darah	KVVIP	22000	0	0	33000	0	0	0	55000	55000	A09	VVIP	1	-
UM.TD.06	Tranfusi darah 1 Kolf	K1	400000	0	0	0	0	0	400000	400000	400000	A09	K1	1	-
UM.TD.07	Tranfusi darah 2 Kolf	K1	800000	0	0	0	0	0	800000	800000	800000	A09	K1	1	-
UM.TD.08	Tranfusi darah 1 Kolf	K2	400000	0	0	0	0	0	400000	400000	400000	A09	K2	1	-
UM.TD.09	Tranfusi darah 2 Kolf	K2	800000	0	0	0	0	0	800000	800000	800000	A09	K2	1	-
UM.TD.10	Tranfusi darah 1 Kolf	K3	400000	0	0	0	0	0	400000	400000	400000	A09	K3	1	-
UM.TD.11	Tranfusi darah 2 Kolf	K3	800000	0	0	0	0	0	800000	800000	800000	A09	K3	1	-
UM.TD.12	Tranfusi darah 1 Kolf	KVIP	400000	0	0	0	0	0	400000	400000	400000	A09	VIP	1	-
UM.TD.13	Tranfusi darah 2 Kolf	KVIP	800000	0	0	0	0	0	800000	800000	800000	A09	VIP	1	-
UM.TD.14	Tranfusi darah 1 Kolf	KVVIP	400000	0	0	0	0	0	400000	400000	400000	A09	VVIP	1	-
UM.TD.15	Tranfusi darah 2  Kolf	KVVIP	800000	0	0	0	0	0	800000	800000	800000	A09	VVIP	1	-
UM.VIP.002	Pasang Vemplon	KVIP	33000	0	0	33000	0	0	33000	66000	66000	A09	VIP	1	-
UM.VIP.003	Ventilator	KVIP	247500	0	0	192500	0	0	247500	440000	440000	A09	VIP	1	-
UM.VIP.01	Nebulizer 4-7 kali	KVIP	49500	0	0	49500	0	0	49500	99000	99000	A09	VIP	1	-
UM.VIP.012	Dressing (R.Luka) Perhari	KVIP	26400	0	0	33000	0	0	26400	59400	59400	A09	VIP	1	-
UM.VIS.01	Visum	K1	45000	0	0	50000	0	0	0	95000	95000	A09	K1	1	-
UM.VIS.02	Visum	K2	45000	0	0	50000	0	0	0	95000	95000	A09	K2	1	-
UM.VIS.03	Visum	K3	40500	0	0	45000	0	0	0	85500	85500	A09	K3	1	-
UM.VIS.04	Visum	KVIP	49500	0	0	55000	0	0	0	104500	104500	A09	VIP	1	-
UM.VIS.05	Visum	KVVIP	49500	0	0	55000	0	0	0	104500	104500	A09	VVIP	1	-
UM.VVIP.002	Pasang Vemplon	KVVIP	33000	0	0	33000	0	0	33000	66000	66000	A09	VVIP	1	-
UM.VVIP.003	Ventilator	KVVIP	247500	0	0	192500	0	0	247500	440000	440000	A09	VVIP	1	-
UM.VVIP.012	Dressing (R.Luka) Perhari	KVVIP	26400	0	0	33000	0	0	26400	59400	59400	A09	VVIP	1	-
UM.VVIP.02	Nebulizer 4-7 kali	KVVIP	49500	0	0	49500	0	0	49500	99000	99000	A09	VVIP	1	-
UM.WSD.01	WSD	K1	200000	0	0	350000	0	0	0	550000	550000	A09	K1	1	-
UM.WSD.02	WSD	K2	200000	0	0	350000	0	0	0	550000	550000	A09	K2	1	-
UM.WSD.03	WSD	K3	180000	0	0	315000	0	0	0	495000	495000	A09	K3	1	-
UM.WSD.04	WSD	KVIP	220000	0	0	385000	0	0	0	605000	605000	A09	VIP	1	-
UM.WSD.05	WSD	KVVIP	220000	0	0	385000	0	0	0	605000	605000	A09	VVIP	1	-
UMM.I.1	Konsultasi Via Telp (dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.10	Konsultasi Via Telp (dr. H. NANANG MIFTAH FAJARI, Sp.PD)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.100	Visite(dr. Nurdianasari Dewi, Sp.Og)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.101	Visite (dr. Hendy Buana Vijaya)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.102	Visite (dr. Nur Janah, Sp.P)	RI1	0	0	150000	0	0	0	150000	0	150000	A09	K1	0	-
UMM.I.103	Visite dokter spesialis (dr. Akhmad Noval Denny Irawan)	RI1	0	0	150000	0	0	0	150000	0	150000	A09	K1	0	-
UMM.I.104	Visite dokter spesialis (dr. H. Fathurrahman, SpOG.M.Kes)	RI1	0	0	150000	0	0	0	150000	0	150000	A09	K1	0	-
UMM.I.105	Jasa Perawatan	RI1	120000	0	0	0	0	0	120000	120000	120000	A09	K1	1	-
UMM.I.106	Jasa Operator Section Caesaria	OV	0	0	2500000	0	0	0	2500000	0	2500000	A09	K1	1	-
UMM.I.107	Ruang Operasi	KP034	2200000	0	0	200000	0	0	2200000	2400000	2400000	A09	K1	1	-
UMM.I.108	Jasa Dokter Anastesi SC	OV	0	0	750000	0	0	0	750000	0	0	A09	K1	1	-
UMM.I.109	Jasa Dokter Anastesi Kuret	OV	0	0	525000	0	0	0	525000	0	525000	A09	K1	1	-
UMM.I.11	Konsultasi Via Telp (dr. RAMLI YUNUS, Sp. PD)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.110	Jasa Dokter Kuret	OV	0	0	1750000	0	0	0	1750000	0	1750000	A09	K1	1	-
UMM.I.111	Jasa Asisten Operasi Bedah Umum	K1	0	0	0	400000	0	0	0	400000	400000	A09	K1	1	-
UMM.I.112	Jasa Asisten Operasi	OV	0	0	0	400000	0	0	400000	400000	800000	A09	K1	1	-
UMM.I.113	Jasa Asisten Anestesi	OV	0	0	0	300000	0	0	0	300000	0	A09	K1	1	-
UMM.I.12	Konsultasi Via Telp (dr. I.MADE DWI JAYANTARA, Sp.S)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.13	Konsultasi Via Telp (dr. WINNY MARTALINA SIMANJUNTAK, Sp.S, M)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.14	Konsultasi Via Telp (dr. FATMAWATI, Sp. S)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.15	Konsultasi Via Telp (dr. DIANA HARYATI KUSUMASTUTI, Sp.M)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.16	Konsultasi Via Telp (dr. RINNY SAID, Sp.M)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.17	Konsultasi Via Telp (dr. ANJAS ASMARA, Sp.KK)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.18	Konsultasi Via Telp (dr. SURYANTO LAUW, Sp.Rad)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.19	Konsultasi Via Telp (dr. YURNIAH TANZIL, Sp.PK)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.2	Konsultasi Via Telp (dr. Hari Suparjo, SpOG.M.Kes)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.20	Konsultasi Via Telp (dr. BUDI ZULHARDI, M.Kes. SpOG.)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.201	Jasa Asisten kebidanan	K1	0	0	0	250000	0	0	0	250000	250000	A09	K1	1	-
UMM.I.202	Jasa Asisten kebidanan	K2	0	0	0	250000	0	0	0	250000	250000	A09	K2	1	-
UMM.I.203	Jasa Asisten kebidanan	K3	0	0	0	250000	0	0	0	250000	250000	A09	K3	1	-
UMM.I.204	Jasa Asisten kebidanan	KVVIP	0	0	0	250000	0	0	0	250000	250000	A09	VVIP	1	-
UMM.I.205	Jasa Asisten kebidanan	KVIP	0	0	0	250000	0	0	0	250000	250000	A09	VIP	1	-
UMM.I.21	Konsultasi Via Telp (dr. ATJO ADHMART P, SpOG)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.22	Konsultasi Via Telp (dr. FIRRAR ARTMI RAHAYU, SpOG. M.Kes)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.23	Konsultasi Via Telp (dr. I WAYAN SUMANDYASA, Sp.OG)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.24	Konsultasi Via Telp (dr. DHARMA PRAVATHANA TATONDO RM, Sp. BP)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.25	Konsultasi Via Telp (dr. M. IQBAL, Sp. OT)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.26	Konsultasi Via Telp (dr. MUHAMMAD ADIJAYANSYAH, Sp.OT)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.27	Konsultasi Via Telp (dr. MUSYADDAD, Sp.An)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.28	Konsultasi Via Telp (dr. H. RANATA AGRIANTO, Sp.An)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.29	Konsultasi Via Telp (dr. M. YAMSUN, Sp. B. FINA.CS)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.3	Konsultasi Via Telp (dr. H. SYIHAB FAYUMI, Sp.A)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.30	Konsultasi Via Telp (dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.31	Konsultasi Via Telp (dr. RUSINA HAYATI, Sp. THT-KL)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.32	Konsultasi Via Telp (dr. ACHMAD ROFII, Sp. THT)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.33	Konsultasi Via Telp (dr. NUR QAMARIAH, M. Kes. Sp. THT)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.34	Konsultasi Via Telp (dr. IDA BAGUS NGURAH SWABAWA, Sp. THT)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.35	Konsultasi Via Telp (dr. Gt. RIFANSYAH, Sp. JP)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.36	Konsultasi Via Telp (Dr.dr. ADI PUTRO, Sp.JP, FIHA)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.37	Konsultasi Via Telp (dr. ANA KHAIRINA)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.38	Konsultasi Via Telp (dr. MAHFUZAH)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.39	Konsultasi Via Telp (dr. KARTIKA PURNAMA SARI)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.4	Konsultasi Via Telp (dr. INDRA WIDJAJA HIMAWAN, Sp.A)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.40	Konsultasi Via Telp (dr. NI LUH NITA NATALIA)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.41	Konsultasi Via Telp (dr. R. WIKEN PRAMUDITA S.)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.42	Konsultasi Via Telp (dr. BADRIATUNNOR)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.43	Konsultasi Via Telp (dr. NOVI RESISTANTIE, SpOG, KFM)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.44	Konsultasi Via Telp (dr. H. M. ADI jAYANSYAH, Sp. OT)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.45	Konsultasi Via Telp (dr. Alex Syamsuddin Sp.THT-K)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.46	Konsultasi Via Telp (dr. Mubarok Latieef, Sp. B)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.47	Konsultasi Via Telp (dr. REITINE CIPTADANI)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.48	Konsultasi Via Telp (dr. NURDIANASARI DEWI, SpOG)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.49	Konsultasi Via Telp (dr. Ni Luh Wita Astari W)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.5	Konsultasi Via Telp (dr. DYAH ROSELINA, Sp.A)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.50	Konsultasi Via Telp (dr. Nurdianasari Dewi, Sp.Og)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.51	Konsultasi Via Telp (dr. Hendy Buana Vijaya)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.52	Konsultasi Via Telp (dr. Nur Janah, Sp.P)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.53	Konsultasi Via Telp (dr. Akhmad Noval Denny Irawan)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.54	Konsultasi Via Telp (dr. H. Fathurrahman, SpOG.M.Kes)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.55	Visite dokter spesialis (dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI1	0	0	150000	0	0	0	150000	0	150000	A09	K1	0	-
UMM.I.550	Visite dokter spesialis  (Hari Libur/Cito)	K1	0	0	200000	0	0	0	200000	0	200000	A09	K1	1	-
UMM.I.551	Visite dokter spesialis  (Hari Libur/Cito)	KVIP	0	0	225000	0	0	0	225000	0	225000	A09	VIP	1	-
UMM.I.56	Visite dokter spesialis (dr. H. NANANG MIFTAH FAJARI, Sp.PD)	RI1	0	0	150000	0	0	0	150000	0	150000	A09	K1	0	-
UMM.I.560	Visite dokter spesialis (Hari Biasa)	RI1	0	0	160000	0	0	0	160000	0	160000	A09	K1	1	-
UMM.I.57	Visite dokter spesialis (dr. RAMLI YUNUS, Sp. PD)	RI1	0	0	150000	0	0	0	150000	0	150000	A09	K1	0	-
UMM.I.570	Visite dokter spesialis ( dr. H. RANATA AGRIANTO, Sp.An) (Hari Biasa)	RI1	0	0	150000	0	0	0	150000	0	150000	A09	K1	0	-
UMM.I.58	Konsultasi, Visite(dr. I.MADE DWI JAYANTARA, Sp.S)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.59	Konsultasi, Visite(dr. WINNY MARTALINA SIMANJUNTAK, Sp.S, M)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.6	Konsultasi Via Telp (Dr. dr. H.PARLINDUNGAN)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.62	Konsultasi, Visite(dr. RINNY SAID, Sp.M)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.63	Visite dokter spesialis (dr. ANJAS ASMARA, Sp.KK)	RI1	0	0	150000	0	0	0	150000	0	150000	A09	K1	0	-
UMM.I.64	Konsultasi, Visite(dr. SURYANTO LAUW, Sp.Rad)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.65	Konsultasi, Visite(dr. YURNIAH TANZIL, Sp.PK)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.66	Konsultasi, Visite(dr. Hari Suparjo, SpOG.M.Kes)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.68	Visite dokter spesialis (dr. ATJO ADHMART P, SpOG)	RI1	0	0	150000	0	0	0	150000	0	150000	A09	K1	0	-
UMM.I.7	Konsultasi Via Telp (dr. H. GABRIL TAUFIQ B. Sp.PD. FINASIM)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.70	Konsultasi, Visite(dr. I WAYAN SUMANDYASA, Sp.OG)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.72	Konsultasi, Visite(dr. M. IQBAL, Sp. OT)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.73	Konsultasi, Visite(dr. MUHAMMAD ADIJAYANSYAH, Sp.OT)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.74	Konsultasi, Visite(dr. MUSYADDAD, Sp.An)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.75	Konsultasi, Visite(dr. H. RANATA AGRIANTO, Sp.An)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.76	Konsultasi, Visite(dr. M. YAMSUN, Sp. B. FINA.CS)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.77	Konsultasi, Visite(dr. H. SYIHAB FAYUMI, Sp.A)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.78	Konsultasi, Visite(dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.79	Konsultasi, Visite(dr. RUSINA HAYATI, Sp. THT-KL)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.8	Konsultasi Via Telp (dr. H. RISWAN ARISANDI, M.Sc. Sp. PD)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.80	Visite dokter spesialis (dr. ACHMAD ROFII, Sp. THT)	RI1	0	0	150000	0	0	0	150000	0	150000	A09	K1	0	-
UMM.I.81	Konsultasi, Visite(dr. NUR QAMARIAH, M. Kes. Sp. THT)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.82	Konsultasi, Visite(dr. IDA BAGUS NGURAH SWABAWA, Sp. THT)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.85	Konsultasi, Visite(dr. ANA KHAIRINA)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.86	Konsultasi, Visite(dr. MAHFUZAH)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.87	Konsultasi, Visite(dr. KARTIKA PURNAMA SARI)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.88	Konsultasi, Visite(dr. INDRA WIDJAJA HIMAWAN, Sp.A)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.89	Konsultasi, Visite(dr. NI LUH NITA NATALIA)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.9	Konsultasi Via Telp (dr. RULLY NOVIYAN, Sp. PD)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K1	0	-
UMM.I.90	Konsultasi, Visite(dr. R. WIKEN PRAMUDITA S.)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.92	Konsultasi, Visite(dr. NOVI RESISTANTIE, SpOG, KFM)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.94	Visite dokter spesialis (dr. Alex Syamsuddin Sp.THT-K)	RI1	0	0	150000	0	0	0	150000	0	150000	A09	K1	0	-
UMM.I.95	Konsultasi, Visite(dr. Mubarok Latieef, Sp. B)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.96	Konsultasi, Visite(dr. REITINE CIPTADANI)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.97	Konsultasi, Visite(dr. NURDIANASARI DEWI, SpOG)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.98	Konsultasi, Visite(dr. Ni Luh Wita Astari W)	RI1	0	0	150000	0	0	0	150000	0	0	A09	K1	0	-
UMM.I.99	Visite dokter spesialis (dr. DYAH ROSELINA, Sp.A)	RI1	0	0	150000	0	0	0	150000	0	150000	A09	K1	0	-
UMM.ICU.106	Jasa Perawatan	-	160000	0	0	0	0	0	160000	160000	160000	A09	ICU	1	-
UMM.II.1	Konsultasi Via Telp (dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.10	Konsultasi Via Telp (dr. H. NANANG MIFTAH FAJARI, Sp.PD)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.100	Konsultasi, Visite(dr. Nurdianasari Dewi, Sp.Og)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.101	Konsultasi, Visite(dr. Hendy Buana Vijaya)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.102	Konsultasi, Visite(dr. Nur Janah, Sp.P)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.103	Visite dokter spesialis (dr. Akhmad Noval Denny Irawan)	RI1	0	0	125000	0	0	0	125000	0	125000	A09	K2	0	-
UMM.II.105	Jasa Perawatan	RI1	100000	0	0	0	0	0	100000	100000	100000	A09	K2	1	-
UMM.II.106	Jasa Operator Section Caesaria	OV	0	0	2250000	0	0	0	2250000	0	2250000	A09	K2	1	-
UMM.II.107	Ruang Operasi	OP33	1650000	0	0	250000	0	0	1650000	1900000	1900000	A09	K2	1	-
UMM.II.108	Jasa Dokter Anastesi SC	OV	0	0	675000	0	0	0	675000	0	0	A09	K2	1	-
UMM.II.109	Jasa Dokter Anastesi Kuret	OV	0	0	450000	0	0	0	450000	0	450000	A09	K2	1	-
UMM.II.11	Konsultasi Via Telp (dr. RAMLI YUNUS, Sp. PD)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.110	Jasa Dokter Kuret	OV	0	0	1500000	0	0	0	1500000	0	1500000	A09	K2	1	-
UMM.II.111	Jasa Asisten Operasi Bedah Umum	K2	0	0	0	350000	0	0	0	350000	350000	A09	K2	1	-
UMM.II.112	Jasa Asisten Operasi	OV	0	0	0	300000	0	0	300000	300000	300000	A09	K2	1	-
UMM.II.113	Jasa Asisten Anestesi	OV	0	0	0	250000	0	0	0	250000	0	A09	K2	1	-
UMM.II.12	Konsultasi Via Telp (dr. I.MADE DWI JAYANTARA, Sp.S)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.13	Konsultasi Via Telp (dr. WINNY MARTALINA SIMANJUNTAK, Sp.S, M)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.14	Konsultasi Via Telp (dr. FATMAWATI, Sp. S)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.15	Konsultasi Via Telp (dr. DIANA HARYATI KUSUMASTUTI, Sp.M)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.16	Konsultasi Via Telp (dr. RINNY SAID, Sp.M)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.17	Konsultasi Via Telp (dr. ANJAS ASMARA, Sp.KK)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.18	Konsultasi Via Telp (dr. SURYANTO LAUW, Sp.Rad)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.19	Konsultasi Via Telp (dr. YURNIAH TANZIL, Sp.PK)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.2	Konsultasi Via Telp (dr. Hari Suparjo, SpOG.M.Kes)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.20	Konsultasi Via Telp (dr. BUDI ZULHARDI, M.Kes. SpOG.)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.21	Konsultasi Via Telp (dr. ATJO ADHMART P, SpOG)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.22	Konsultasi Via Telp (dr. FIRRAR ARTMI RAHAYU, SpOG. M.Kes)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.23	Konsultasi Via Telp (dr. I WAYAN SUMANDYASA, Sp.OG)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.24	Konsultasi Via Telp (dr. DHARMA PRAVATHANA TATONDO RM, Sp. BP)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.25	Konsultasi Via Telp (dr. M. IQBAL, Sp. OT)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.26	Konsultasi Via Telp (dr. MUHAMMAD ADIJAYANSYAH, Sp.OT)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.27	Konsultasi Via Telp (dr. MUSYADDAD, Sp.An)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.28	Konsultasi Via Telp (dr. H. RANATA AGRIANTO, Sp.An)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.29	Konsultasi Via Telp (dr. M. YAMSUN, Sp. B. FINA.CS)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.3	Konsultasi Via Telp (dr. H. SYIHAB FAYUMI, Sp.A)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.30	Konsultasi Via Telp (dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.31	Konsultasi Via Telp (dr. RUSINA HAYATI, Sp. THT-KL)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.32	Konsultasi Via Telp (dr. ACHMAD ROFII, Sp. THT)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.33	Konsultasi Via Telp (dr. NUR QAMARIAH, M. Kes. Sp. THT)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.34	Konsultasi Via Telp (dr. IDA BAGUS NGURAH SWABAWA, Sp. THT)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.35	Konsultasi Via Telp Dokter spesialis	RI1	0	0	50000	0	0	0	50000	0	50000	A09	K2	1	-
UMM.II.36	Konsultasi Via Telp (Dr.dr. ADI PUTRO, Sp.JP, FIHA)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.37	Konsultasi Via Telp (dr. ANA KHAIRINA)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.38	Konsultasi Via Telp (dr. MAHFUZAH)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.39	Konsultasi Via Telp (dr. KARTIKA PURNAMA SARI)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.4	Konsultasi Via Telp (dr. INDRA WIDJAJA HIMAWAN, Sp.A)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.40	Konsultasi Via Telp (dr. NI LUH NITA NATALIA)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.41	Konsultasi Via Telp (dr. R. WIKEN PRAMUDITA S.)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.42	Konsultasi Via Telp (dr. BADRIATUNNOR)	RI1	0	0	55000	0	0	0	55000	0	0	A09	K2	0	-
UMM.II.43	Konsultasi Via Telp (dr. NOVI RESISTANTIE, SpOG, KFM)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.44	Konsultasi Via Telp (dr. H. M. ADI jAYANSYAH, Sp. OT)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.45	Konsultasi Via Telp (dr. Alex Syamsuddin Sp.THT-K)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.46	Konsultasi Via Telp (dr. Mubarok Latieef, Sp. B)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.47	Konsultasi Via Telp (dr. REITINE CIPTADANI)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.48	Konsultasi Via Telp (dr. NURDIANASARI DEWI, SpOG)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.49	Konsultasi Via Telp (dr. Ni Luh Wita Astari W)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.5	Konsultasi Via Telp (dr. DYAH ROSELINA, Sp.A)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.50	Konsultasi Via Telp (dr. Nurdianasari Dewi, Sp.Og)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.51	Konsultasi Via Telp (dr. Hendy Buana Vijaya)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.52	Konsultasi Via Telp (dr. Nur Janah, Sp.P)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.53	Konsultasi Via Telp (dr. Akhmad Noval Denny Irawan)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.54	Konsultasi Via Telp (dr. H. Fathurrahman, SpOG.M.Kes)	RI1	0	0	50000	0	0	0	50000	0	0	A09	K2	0	-
UMM.II.55	Konsultasi, Visite(dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.56	Konsultasi, Visite(dr. H. NANANG MIFTAH FAJARI, Sp.PD)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.57	Konsultasi, Visite(dr. RAMLI YUNUS, Sp. PD)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.58	Konsultasi, Visite(dr. I.MADE DWI JAYANTARA, Sp.S)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.59	Konsultasi, Visite(dr. WINNY MARTALINA SIMANJUNTAK, Sp.S, M)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.62	Konsultasi, Visite(dr. RINNY SAID, Sp.M)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.63	Visite dokter spesialis (dr. ANJAS ASMARA, Sp.KK)	RI1	0	0	125000	0	0	0	125000	0	125000	A09	K2	0	-
UMM.II.64	Konsultasi, Visite(dr. SURYANTO LAUW, Sp.Rad)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.65	Konsultasi, Visite(dr. YURNIAH TANZIL, Sp.PK)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.66	Konsultasi, Visite(dr. Hari Suparjo, SpOG.M.Kes)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.68	Visite dokter spesialis (dr. ATJO ADHMART P, SpOG)	RI1	0	0	125000	0	0	0	125000	0	125000	A09	K2	0	-
UMM.II.70	Konsultasi, Visite(dr. I WAYAN SUMANDYASA, Sp.OG)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.72	Konsultasi, Visite(dr. M. IQBAL, Sp. OT)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.73	Konsultasi, Visite(dr. MUHAMMAD ADIJAYANSYAH, Sp.OT)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.74	Konsultasi, Visite(dr. MUSYADDAD, Sp.An)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.75	Konsultasi, Visite(dr. H. RANATA AGRIANTO, Sp.An)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.76	Konsultasi, Visite(dr. M. YAMSUN, Sp. B. FINA.CS)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.77	Konsultasi, Visite(dr. H. SYIHAB FAYUMI, Sp.A)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.78	Konsultasi, Visite(dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.79	Konsultasi, Visite(dr. RUSINA HAYATI, Sp. THT-KL)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.80	Visite dokter spesialis (dr. ACHMAD ROFII, Sp. THT)	RI1	0	0	125000	0	0	0	125000	0	125000	A09	K2	0	-
UMM.II.81	Konsultasi, Visite(dr. NUR QAMARIAH, M. Kes. Sp. THT)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.82	Konsultasi, Visite(dr. IDA BAGUS NGURAH SWABAWA, Sp. THT)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.85	Konsultasi, Visite(dr. ANA KHAIRINA)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.86	Konsultasi, Visite(dr. MAHFUZAH)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.87	Konsultasi, Visite(dr. KARTIKA PURNAMA SARI)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.88	Konsultasi, Visite(dr. INDRA WIDJAJA HIMAWAN, Sp.A)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.89	Konsultasi, Visite(dr. NI LUH NITA NATALIA)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.90	Konsultasi, Visite(dr. R. WIKEN PRAMUDITA S.)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.91	Konsultasi, Visite(dr. BADRIATUNNOR)	RI1	0	0	55000	0	0	0	55000	0	0	A09	K2	0	-
UMM.II.92	Konsultasi, Visite(dr. NOVI RESISTANTIE, SpOG, KFM)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.94	Visite dokter spesialis (dr. Alex Syamsuddin Sp.THT-K)	RI1	0	0	125000	0	0	0	125000	0	125000	A09	K2	0	-
UMM.II.95	Konsultasi, Visite(dr. Mubarok Latieef, Sp. B)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.96	Konsultasi, Visite(dr. REITINE CIPTADANI)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.97	Konsultasi, Visite(dr. NURDIANASARI DEWI, SpOG)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.98	Konsultasi, Visite(dr. Ni Luh Wita Astari W)	RI1	0	0	125000	0	0	0	125000	0	0	A09	K2	0	-
UMM.II.99	Visite dokter spesialis (dr. DYAH ROSELINA, Sp.A)	RI1	0	0	125000	0	0	0	125000	0	125000	A09	K2	0	-
UMM.III.1	Konsultasi Via Telp (dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.10	Konsultasi Via Telp (dr. H. NANANG MIFTAH FAJARI, Sp.PD)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.100	Konsultasi, Visite(dr. Nurdianasari Dewi, Sp.Og)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.101	Konsultasi, Visite(dr. Hendy Buana Vijaya)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.102	Konsultasi, Visite(dr. Nur Janah, Sp.P)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.103	Visite dokter Jaga (dr. Akhmad Noval Denny Irawan)	RI1	0	0	75000	0	0	0	75000	0	75000	A09	K3	0	-
UMM.III.105	Jasa Perawatan	RI1	60000	0	0	0	0	0	60000	60000	60000	A09	K3	1	-
UMM.III.106	Jasa Operator Section Caesaria	OV	0	0	2000000	0	0	0	2000000	0	2000000	A09	K3	1	-
UMM.III.107	Ruang Operasi	OP33	1100000	0	0	200000	0	0	1100000	1300000	1300000	A09	K3	1	-
UMM.III.108	Jasa Dokter Anastesi SC	OV	0	0	600000	0	0	0	600000	0	0	A09	K3	1	-
UMM.III.109	Jasa Dokter Anastesi Kuret	OV	0	0	375000	0	0	0	375000	0	375000	A09	K3	1	-
UMM.III.11	Konsultasi Via Telp (dr. RAMLI YUNUS, Sp. PD)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.110	Jasa Dokter Kuret	OV	0	0	1250000	0	0	0	1250000	0	1250000	A09	K3	1	-
UMM.III.111	Jasa Asisten Operasi Bedah Umum	K3	0	0	0	300000	0	0	0	300000	300000	A09	K3	1	-
UMM.III.112	Jasa Asisten Operasi	OV	0	0	0	200000	0	0	200000	200000	200000	A09	K3	1	-
UMM.III.113	Jasa Asisten Anestesi	OV	0	0	0	200000	0	0	0	200000	0	A09	K3	1	-
UMM.III.12	Konsultasi Via Telp (dr. I.MADE DWI JAYANTARA, Sp.S)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.13	Konsultasi Via Telp (dr. WINNY MARTALINA SIMANJUNTAK, Sp.S, M)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.14	Konsultasi Via Telp (dr. FATMAWATI, Sp. S)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.15	Konsultasi Via Telp (dr. DIANA HARYATI KUSUMASTUTI, Sp.M)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.16	Konsultasi Via Telp (dr. RINNY SAID, Sp.M)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.17	Konsultasi Via Telp (dr. ANJAS ASMARA, Sp.KK)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.18	Konsultasi Via Telp (dr. SURYANTO LAUW, Sp.Rad)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.19	Konsultasi Via Telp (dr. YURNIAH TANZIL, Sp.PK)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.2	Konsultasi Via Telp (dr. Hari Suparjo, SpOG.M.Kes)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.20	Konsultasi Via Telp (dr. BUDI ZULHARDI, M.Kes. SpOG.)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.21	Konsultasi Via Telp (dr. ATJO ADHMART P, SpOG)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.22	Konsultasi Via Telp (dr. FIRRAR ARTMI RAHAYU, SpOG. M.Kes)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.23	Konsultasi Via Telp (dr. I WAYAN SUMANDYASA, Sp.OG)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.24	Konsultasi Via Telp (dr. DHARMA PRAVATHANA TATONDO RM, Sp. BP)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.25	Konsultasi Via Telp (dr. M. IQBAL, Sp. OT)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.26	Konsultasi Via Telp (dr. MUHAMMAD ADIJAYANSYAH, Sp.OT)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.27	Konsultasi Via Telp (dr. MUSYADDAD, Sp.An)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.28	Konsultasi Via Telp (dr. H. RANATA AGRIANTO, Sp.An)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.29	Konsultasi Via Telp (dr. M. YAMSUN, Sp. B. FINA.CS)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.3	Konsultasi Via Telp (dr. H. SYIHAB FAYUMI, Sp.A)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.30	Konsultasi Via Telp (dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.31	Konsultasi Via Telp (dr. RUSINA HAYATI, Sp. THT-KL)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.32	Konsultasi Via Telp (dr. ACHMAD ROFII, Sp. THT)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.33	Konsultasi Via Telp (dr. NUR QAMARIAH, M. Kes. Sp. THT)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.34	Konsultasi Via Telp (dr. IDA BAGUS NGURAH SWABAWA, Sp. THT)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.35	Konsultasi Via Telp (dr. Gt. RIFANSYAH, Sp. JP)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.36	Konsultasi Via Telp (Dr.dr. ADI PUTRO, Sp.JP, FIHA)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.37	Konsultasi Via Telp (dr. ANA KHAIRINA)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.38	Konsultasi Via Telp (dr. MAHFUZAH)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.39	Konsultasi Via Telp (dr. KARTIKA PURNAMA SARI)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.4	Konsultasi Via Telp (dr. INDRA WIDJAJA HIMAWAN, Sp.A)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.40	Konsultasi Via Telp (dr. NI LUH NITA NATALIA)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.41	Konsultasi Via Telp (dr. R. WIKEN PRAMUDITA S.)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.42	Konsultasi Via Telp (dr. BADRIATUNNOR)	RI1	0	0	55000	0	0	0	55000	0	0	A09	K3	0	-
UMM.III.43	Konsultasi Via Telp (dr. NOVI RESISTANTIE, SpOG, KFM)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.44	Konsultasi Via Telp (dr. H. M. ADI jAYANSYAH, Sp. OT)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.45	Konsultasi Via Telp (dr. Alex Syamsuddin Sp.THT-K)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.46	Konsultasi Via Telp (dr. Mubarok Latieef, Sp. B)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.47	Konsultasi Via Telp (dr. REITINE CIPTADANI)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.48	Konsultasi Via Telp (dr. NURDIANASARI DEWI, SpOG)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.49	Konsultasi Via Telp (dr. Ni Luh Wita Astari W)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.5	Konsultasi Via Telp (dr. DYAH ROSELINA, Sp.A)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.50	Konsultasi Via Telp (dr. Nurdianasari Dewi, Sp.Og)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.51	Konsultasi Via Telp (dr. Hendy Buana Vijaya)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.52	Konsultasi Via Telp (dr. Nur Janah, Sp.P)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.53	Konsultasi Via Telp (dr. Akhmad Noval Denny Irawan)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	0	-
UMM.III.54	Konsultasi Via Telp (dr. H. Fathurrahman, SpOG.M.Kes)	RI1	0	0	40000	0	0	0	40000	0	0	A09	K3	1	-
UMM.III.55	Konsultasi, Visite(dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.56	Konsultasi, Visite(dr. H. NANANG MIFTAH FAJARI, Sp.PD)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.57	Konsultasi, Visite(dr. RAMLI YUNUS, Sp. PD)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.58	Konsultasi, Visite(dr. I.MADE DWI JAYANTARA, Sp.S)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.59	Konsultasi, Visite(dr. WINNY MARTALINA SIMANJUNTAK, Sp.S, M)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.62	Konsultasi, Visite(dr. RINNY SAID, Sp.M)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.63	Visite dokter spesialis (dr. ANJAS ASMARA, Sp.KK)	RI1	0	0	75000	0	0	0	75000	0	75000	A09	K3	0	-
UMM.III.64	Konsultasi, Visite(dr. SURYANTO LAUW, Sp.Rad)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.65	Konsultasi, Visite(dr. YURNIAH TANZIL, Sp.PK)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.66	Konsultasi, Visite(dr. Hari Suparjo, SpOG.M.Kes)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.67	Visite dokter spesialis (dr. BUDI ZULHARDI, M.Kes. SpOG.)	RI1	0	0	75000	0	0	0	75000	0	75000	A09	K3	0	-
UMM.III.68	Visite dokter spesialis (dr. ATJO ADHMART P, SpOG)	RI1	0	0	75000	0	0	0	75000	0	75000	A09	K3	0	-
UMM.III.70	Konsultasi, Visite(dr. I WAYAN SUMANDYASA, Sp.OG)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.72	Konsultasi, Visite(dr. M. IQBAL, Sp. OT)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.73	Konsultasi, Visite(dr. MUHAMMAD ADIJAYANSYAH, Sp.OT)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.74	Konsultasi, Visite(dr. MUSYADDAD, Sp.An)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.75	Konsultasi, Visite(dr. H. RANATA AGRIANTO, Sp.An)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.76	Konsultasi, Visite(dr. M. YAMSUN, Sp. B. FINA.CS)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.77	Konsultasi, Visite(dr. H. SYIHAB FAYUMI, Sp.A)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.78	Konsultasi, Visite(dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.79	Konsultasi, Visite(dr. RUSINA HAYATI, Sp. THT-KL)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.80	Visite dokter spesialis (dr. ACHMAD ROFII, Sp. THT)	RI1	0	0	75000	0	0	0	75000	0	75000	A09	K3	0	-
UMM.III.81	Konsultasi, Visite(dr. NUR QAMARIAH, M. Kes. Sp. THT)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.82	Konsultasi, Visite(dr. IDA BAGUS NGURAH SWABAWA, Sp. THT)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.85	Konsultasi, Visite(dr. ANA KHAIRINA)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.86	Konsultasi, Visite(dr. MAHFUZAH)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.87	Konsultasi, Visite(dr. KARTIKA PURNAMA SARI)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.88	Konsultasi, Visite(dr. INDRA WIDJAJA HIMAWAN, Sp.A)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.89	Konsultasi, Visite(dr. NI LUH NITA NATALIA)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.90	Konsultasi, Visite(dr. R. WIKEN PRAMUDITA S.)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.91	Konsultasi, Visite(dr. BADRIATUNNOR)	RI1	0	0	55000	0	0	0	55000	0	0	A09	K3	0	-
UMM.III.92	Konsultasi, Visite(dr. NOVI RESISTANTIE, SpOG, KFM)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.94	Visite dokter spesialis (dr. Alex Syamsuddin Sp.THT-K)	RI1	0	0	75000	0	0	0	75000	0	75000	A09	K3	0	-
UMM.III.95	Konsultasi, Visite(dr. Mubarok Latieef, Sp. B)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.96	Konsultasi, Visite(dr. REITINE CIPTADANI)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.97	Konsultasi, Visite(dr. NURDIANASARI DEWI, SpOG)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.98	Konsultasi, Visite(dr. Ni Luh Wita Astari W)	RI1	0	0	75000	0	0	0	75000	0	0	A09	K3	0	-
UMM.III.99	Visite dokter spesialis (dr. DYAH ROSELINA, Sp.A)	RI1	0	0	75000	0	0	0	75000	0	75000	A09	K3	0	-
UMM.ODC.111	Jasa Asisten Operasi Bedah Umum	-	0	0	0	250000	0	0	0	250000	250000	A09	KO	1	-
UMM.ok.01	Jasa Perawatan kamar Operasi	OV	0	0	0	200000	0	0	0	200000	200000	A09	KO	1	-
UMM.SM.03	Pasang Infus Pump (Syring Pump) perhari	-	112500	0	0	31500	0	0	112500	112500	112500	A09	K3	1	-
UMM.SM.1	Pasang Infus Bayi	-	30000	0	0	30000	0	0	0	60000	60000	A09	NICU	1	-
UMM.SM.3	Pasang Infus Pump	-	125000	0	0	35000	0	0	0	160000	160000	A09	ICU	1	-
UMM.SM.4	Sewa Monitor ICU	-	300000	0	0	0	0	0	300000	300000	300000	A09	ICU	1	-
UMM.SM.5	Nebulizer 1-3 kali	KVIP	38500	0	0	38500	0	0	38500	77000	77000	A09	VIP	1	-
UMM.SM.6	EKG	-	70000	0	50000	0	0	0	120000	50000	120000	A09	ICU	1	-
UMM.SM.9	Asuhan Gizi 	K1	37500	0	0	10000	0	0	0	47500	0	A09	K1	1	-
UMM.VIP.1	Konsultasi Via Telp (dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.10	Konsultasi Via Telp (dr. H. NANANG MIFTAH FAJARI, Sp.PD)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.100	Konsultasi, Visite(dr. Nurdianasari Dewi, Sp.Og)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.101	Konsultasi, Visite(dr. Hendy Buana Vijaya)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.102	Konsultasi, Visite(dr. Nur Janah, Sp.P)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.103	Visite dokter spesialis Jaga (dr. Akhmad Noval Denny Irawan)	RI2	0	0	175000	0	0	0	175000	0	175000	A09	VIP	0	-
UMM.VIP.105	Jasa Perawatan	KVIP	140000	0	0	0	0	0	140000	140000	140000	A09	VIP	1	-
UMM.VIP.106	Jasa Operator Section Caesaria	OV	0	0	3000000	0	0	0	3000000	0	3000000	A09	VIP	1	-
UMM.VIP.107	Ruang Operasi	OP33	2500000	0	0	250000	0	0	2500000	2750000	2750000	A09	VIP	1	-
UMM.VIP.108	Jasa Dokter Anastesi SC	OV	0	0	900000	0	0	0	900000	0	0	A09	VIP	1	-
UMM.VIP.109	Jasa Dokter Anastesi Kuret	OV	0	0	600000	0	0	0	600000	0	600000	A09	VIP	1	-
UMM.VIP.11	Konsultasi Via Telp (dr. RAMLI YUNUS, Sp. PD)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.110	Jasa Dokter Kuret	OV	0	0	2000000	0	0	0	2000000	0	2000000	A09	VIP	1	-
UMM.VIP.111	Jasa Asisten Operasi Bedah Umum	KVIP	0	0	0	500000	0	0	0	500000	500000	A09	VIP	1	-
UMM.VIP.112	Jasa Asisten Operasi	OV	0	0	0	500000	0	0	500000	500000	1000000	A09	VIP	1	-
UMM.VIP.113	Jasa Asisten Anestesi	OV	0	0	0	400000	0	0	0	400000	0	A09	VIP	1	-
UMM.VIP.12	Konsultasi Via Telp (dr. I.MADE DWI JAYANTARA, Sp.S)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.13	Konsultasi Via Telp (dr. WINNY MARTALINA SIMANJUNTAK, Sp.S, M)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.14	Konsultasi Via Telp (dr. FATMAWATI, Sp. S)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.15	Konsultasi Via Telp (dr. DIANA HARYATI KUSUMASTUTI, Sp.M)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.16	Konsultasi Via Telp (dr. RINNY SAID, Sp.M)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.17	Konsultasi Via Telp (dr. ANJAS ASMARA, Sp.KK)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.18	Konsultasi Via Telp (dr. SURYANTO LAUW, Sp.Rad)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.19	Konsultasi Via Telp (dr. YURNIAH TANZIL, Sp.PK)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.2	Konsultasi Via Telp (dr. Hari Suparjo, SpOG.M.Kes)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.20	Konsultasi Via Telp (dr. BUDI ZULHARDI, M.Kes. SpOG.)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.21	Konsultasi Via Telp (dr. ATJO ADHMART P, SpOG)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.22	Konsultasi Via Telp (dr. FIRRAR ARTMI RAHAYU, SpOG. M.Kes)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.23	Konsultasi Via Telp (dr. I WAYAN SUMANDYASA, Sp.OG)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.24	Konsultasi Via Telp (dr. DHARMA PRAVATHANA TATONDO RM, Sp. BP)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.25	Konsultasi Via Telp (dr. M. IQBAL, Sp. OT)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.26	Konsultasi Via Telp (dr. MUHAMMAD ADIJAYANSYAH, Sp.OT)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.27	Konsultasi Via Telp (dr. MUSYADDAD, Sp.An)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.28	Konsultasi Via Telp (dr. H. RANATA AGRIANTO, Sp.An)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.29	Konsultasi Via Telp (dr. M. YAMSUN, Sp. B. FINA.CS)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.3	Konsultasi Via Telp (dr. H. SYIHAB FAYUMI, Sp.A)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.30	Konsultasi Via Telp (dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.31	Konsultasi Via Telp (dr. RUSINA HAYATI, Sp. THT-KL)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.32	Konsultasi Via Telp (dr. ACHMAD ROFII, Sp. THT)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.33	Konsultasi Via Telp (dr. NUR QAMARIAH, M. Kes. Sp. THT)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.34	Konsultasi Via Telp (dr. IDA BAGUS NGURAH SWABAWA, Sp. THT)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.35	Konsultasi Via Telp (dr. Gt. RIFANSYAH, Sp. JP)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.36	Konsultasi Via Telp (Dr.dr. ADI PUTRO, Sp.JP, FIHA)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.37	Konsultasi Via Telp (dr. ANA KHAIRINA)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.38	Konsultasi Via Telp (dr. MAHFUZAH)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.39	Konsultasi Via Telp (dr. KARTIKA PURNAMA SARI)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.4	Konsultasi Via Telp (dr. INDRA WIDJAJA HIMAWAN, Sp.A)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.40	Konsultasi Via Telp (dr. NI LUH NITA NATALIA)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.41	Konsultasi Via Telp (dr. R. WIKEN PRAMUDITA S.)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.42	Konsultasi Via Telp (dr. BADRIATUNNOR)	RI2	0	0	55000	0	0	0	55000	0	0	A09	VIP	0	-
UMM.VIP.43	Konsultasi Via Telp (dr. NOVI RESISTANTIE, SpOG, KFM)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.44	Konsultasi Via Telp (dr. H. M. ADI jAYANSYAH, Sp. OT)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.45	Konsultasi Via Telp (dr. Alex Syamsuddin Sp.THT-K)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.46	Konsultasi Via Telp (dr. Mubarok Latieef, Sp. B)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.47	Konsultasi Via Telp (dr. REITINE CIPTADANI)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.48	Konsultasi Via Telp (dr. NURDIANASARI DEWI, SpOG)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.49	Konsultasi Via Telp (dr. Ni Luh Wita Astari W)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.5	Konsultasi Via Telp (dr. DYAH ROSELINA, Sp.A)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.50	Konsultasi Via Telp (dr. Nurdianasari Dewi, Sp.Og)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.51	Konsultasi Via Telp (dr. Hendy Buana Vijaya)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.52	Konsultasi Via Telp (dr. Nur Janah, Sp.P)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.53	Konsultasi Via Telp (dr. Akhmad Noval Denny Irawan)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.54	Konsultasi Via Telp (dr. H. Fathurrahman, SpOG.M.Kes)	RI2	0	0	80000	0	0	0	80000	0	0	A09	VIP	1	-
UMM.VIP.55	Konsultasi, Visite(dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.57	Visite dokter spesialis (dr. RAMLI YUNUS, Sp. PD)	RI2	0	0	175000	0	0	0	175000	0	175000	A09	VIP	0	-
UMM.VIP.58	Konsultasi, Visite(dr. I.MADE DWI JAYANTARA, Sp.S)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.59	Konsultasi, Visite(dr. WINNY MARTALINA SIMANJUNTAK, Sp.S, M)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.62	Konsultasi, Visite(dr. RINNY SAID, Sp.M)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.63	Visite dokter spesialis (dr. ANJAS ASMARA, Sp.KK)	RI2	0	0	175000	0	0	0	175000	0	175000	A09	VIP	0	-
UMM.VIP.64	Konsultasi, Visite(dr. SURYANTO LAUW, Sp.Rad)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.65	Konsultasi, Visite(dr. YURNIAH TANZIL, Sp.PK)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.66	Konsultasi, Visite(dr. Hari Suparjo, SpOG.M.Kes)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.67	Visite dokter spesialis (dr. BUDI ZULHARDI, M.Kes. SpOG.)	RI2	0	0	175000	0	0	0	175000	0	175000	A09	VIP	0	-
UMM.VIP.68	Visite dokter spesialis (dr. ATJO ADHMART P, SpOG)	RI2	0	0	175000	0	0	0	175000	0	175000	A09	VIP	0	-
UMM.VIP.70	Konsultasi, Visite(dr. I WAYAN SUMANDYASA, Sp.OG)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.72	Konsultasi, Visite(dr. M. IQBAL, Sp. OT)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.73	Konsultasi, Visite(dr. MUHAMMAD ADIJAYANSYAH, Sp.OT)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.74	Konsultasi, Visite(dr. MUSYADDAD, Sp.An)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.75	Konsultasi, Visite(dr. H. RANATA AGRIANTO, Sp.An)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.76	Konsultasi, Visite(dr. M. YAMSUN, Sp. B. FINA.CS)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.77	Konsultasi, Visite(dr. H. SYIHAB FAYUMI, Sp.A)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.78	Konsultasi, Visite(dr. MUHAMMAD ASNAL, Sp.B, FINA.CS)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.79	Konsultasi, Visite(dr. RUSINA HAYATI, Sp. THT-KL)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.80	Visite dokter spesialis (dr. ACHMAD ROFII, Sp. THT)	RI2	0	0	175000	0	0	0	175000	0	175000	A09	VIP	0	-
UMM.VIP.81	Konsultasi, Visite(dr. NUR QAMARIAH, M. Kes. Sp. THT)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.82	Konsultasi, Visite(dr. IDA BAGUS NGURAH SWABAWA, Sp. THT)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.85	Konsultasi, Visite(dr. ANA KHAIRINA)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.86	Konsultasi, Visite(dr. MAHFUZAH)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.87	Konsultasi, Visite(dr. KARTIKA PURNAMA SARI)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.88	Konsultasi, Visite(dr. INDRA WIDJAJA HIMAWAN, Sp.A)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.89	Konsultasi, Visite(dr. NI LUH NITA NATALIA)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.90	Konsultasi, Visite(dr. R. WIKEN PRAMUDITA S.)	RI2	0	0	175000	0	0	0	175000	0	0	A09	VIP	0	-
UMM.VIP.91	Konsultasi, Visite(dr. BADRIATUNNOR)	RI2	0	0	55000	0	0	0	55000	0	0	A09	VIP	0	-
UMM.VVIP.01	Visite Dokter Spesialis CITO	KVVIP	0	0	225000	0	0	0	225000	0	225000	A09	VVIP	1	-
UMM.VVIP.105	Jasa Perawatan	KVVIP	160000	0	0	0	0	0	160000	160000	160000	A09	VVIP	1	-
UMM.VVIP.106	Jasa Operator Section Caesaria	OV	0	0	3500000	0	0	0	3500000	0	3500000	A09	VVIP	1	-
UMM.VVIP.107	Ruang Operasi	OP33	2750000	0	0	250000	0	0	2750000	3000000	3000000	A09	VVIP	1	-
UMM.VVIP.108	Jasa Dokter Anastesi SC	OV	0	0	1050000	0	0	0	1050000	0	0	A09	VVIP	1	-
UMM.VVIP.109	Jasa Dokter Anastesi Kuret	OV	0	0	675000	0	0	0	675000	0	675000	A09	VVIP	1	-
UMM.VVIP.11	Konsultasi Via Telp (dr. RAMLI YUNUS, Sp. PD)	RI2	0	0	100000	0	0	0	100000	0	0	A09	VVIP	1	-
UMM.VVIP.110	Jasa Dokter Kuret	OV	0	0	2250000	0	0	0	2250000	0	2250000	A09	VVIP	1	-
UMM.VVIP.111	Jasa Asisten Operasi Bedah Umum	KVVIP	0	0	0	600000	0	0	0	600000	600000	A09	VVIP	1	-
UMM.VVIP.112	Jasa Asisten Operasi	OV	0	0	0	600000	0	0	600000	600000	600000	A09	VVIP	1	-
UMM.VVIP.113	Jasa Asisten Anestesi	OV	0	0	0	500000	0	0	0	500000	0	A09	VVIP	1	-
UMM.VVIP.68	Visite dokter spesialis (dr. ATJO ADHMART P, SpOG)	RI2	0	0	200000	0	0	0	200000	0	200000	A09	VVIP	1	-
\.


--
-- TOC entry 5673 (class 0 OID 34208)
-- Dependencies: 279
-- Data for Name: jns_perawatan_inap; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.jns_perawatan_inap  FROM stdin;
\.


--
-- TOC entry 5664 (class 0 OID 25942)
-- Dependencies: 270
-- Data for Name: kamar; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.kamar (nomor_bed, kode_kamar, nama_kamar, kelas, tarif_kamar, status_kamar) FROM stdin;
1	bcd	anggrek	1	50000	available
2	1	anggrek	2	50000	penuh
3	bcd	anggrek	VIP	100000	penuh
Gudang	Gudang	Gudang	Gudang	0	penuh
ICU-01	ICU	ICU A	ICU	800000	available
ICU-02	ICU	ICU B	ICU	800000	available
K1-01	K1	anggrek	1	200000	available
K1-02	K1	anggrek 2	1	200000	available
K1-03	K1	anggrek 3	1	200000	available
K2-01	K2	tulip	2	150000	available
K2-02	K2	dahlia	2	150000	available
K3-01	K3	teratai	3	100000	available
K3-02	K3	lili	3	100000	available
VUP-01	VIP	mawar	VIP	500000	available
VUP-02	VIP	melati	VIP	500000	available
VUP-03	VIP	kenanga	VIP	500000	available
\.


--
-- TOC entry 5639 (class 0 OID 16928)
-- Dependencies: 245
-- Data for Name: kategori_barang_medis; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.kategori_barang_medis (id, nama, created_at, updated_at) FROM stdin;
1000	Obat Paten	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
2000	Obat Generik	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
3000	Obat Merek	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
4000	Obat Eksklusif	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
5000	Obat Bebas Paten	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
\.


--
-- TOC entry 5656 (class 0 OID 17357)
-- Dependencies: 262
-- Data for Name: mutasi_barang; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.mutasi_barang (id, id_barang_medis, jumlah, harga, id_ruangandari, id_ruanganke, tanggal, keterangan, no_batch, no_faktur) FROM stdin;
\.


--
-- TOC entry 5652 (class 0 OID 17249)
-- Dependencies: 258
-- Data for Name: notifikasi; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.notifikasi (id, sender, recipient, tanggal, judul, pesan, read) FROM stdin;
2eb3e845-f0d2-4ab3-b599-dd91a6799438	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	933568d5-982a-43c3-a4aa-3177bab10f07	2025-06-01	INI JUDUL	INI PESAN	f
\.


--
-- TOC entry 5654 (class 0 OID 17322)
-- Dependencies: 260
-- Data for Name: opname; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.opname (id, id_barang_medis, id_ruangan, h_beli, tanggal, "real", stok, keterangan, no_batch, no_faktur) FROM stdin;
\.


--
-- TOC entry 5629 (class 0 OID 16851)
-- Dependencies: 235
-- Data for Name: organisasi; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.organisasi (id, nama, alamat, latitude, longitude, radius, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 5684 (class 0 OID 50676)
-- Dependencies: 290
-- Data for Name: pasien; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.pasien (no_rkm_medis, nm_pasien, no_ktp, jk, tmp_lahir, tgl_lahir, nm_ibu, alamat, gol_darah, pekerjaan, stts_nikah, agama, tgl_daftar, no_tlp, umur, pnd, keluarga, namakeluarga, kd_pj, no_peserta, kd_kel, kd_kec, kd_kab, pekerjaanpj, alamatpj, kelurahanpj, kecamatanpj, kabupatenpj, perusahaan_pasien, suku_bangsa, bahasa_pasien, cacat_fisik, email, nip, kd_prop, propinsipj) FROM stdin;
000002	Siti Nurhaliza	3175080101010002	P	Bandung	1992-06-15	Rina Marlina	Jl. Cendana No.2	A	Guru	MENIKAH	ISLAM	2025-05-21	082345678901	32 Th 0 Bl 0 Hr	S2	IBU	Maman Sutarman	A01 	BPJS0002	2	2	2	PNS	Jl. Melati No. 20	Kelurahan B	Kecamatan B	Kabupaten B	PRSH002	2	2	0	siti@example.com	1989002	2	Propinsi B
000003	Budi Santoso	3175080101010003	L	Surabaya	1985-09-12	Sri Wahyuni	Jl. Mawar No.3	B	Petani	BELUM MENIKAH	KRISTEN	2025-05-21	083456789012	39 Th 0 Bl 0 Hr	SMA	KAKAK	Anto Santoso	A02 	BPJS0003	3	3	3	Petani	Jl. Kebun No. 45	Kelurahan C	Kecamatan C	Kabupaten C	PRSH003	3	3	0	budi@example.com	1989003	3	Propinsi C
300	Ahmad Fauzi	3175080101010001	L	Jakarta	1990-01-01	Siti Aminah	Jl. Merdeka No.1	O	Karyawan	MENIKAH	ISLAM	2025-05-21	081234567890	34 Th 0 Bl 0 Hr	S1	AYAH	Ridwan Fauzi	A01 	BPJS0001	1	1	1	Wiraswasta	Jl. Pahlawan 10	Kelurahan A	Kecamatan A	Kabupaten A	PRSH001	1	1	0	ahmad@example.com	1989001	1	Propinsi A
2025052212345	Ahmad Fauzi	1234567890123456	L	Jakarta	1990-01-01	Ibu Fauzi	Jl. Merdeka	O	Karyawan	MENIKAH	ISLAM	2025-05-22	081234567890	34 Th 0 Bl 0 Hr	S1	AYAH	Ridwan	BPJS	0001234567890	1	1	1	PNS	Jl. Pahlawan	Kebon Jeruk	Kebon Jeruk	Jakarta Barat	PT Aman	1	1	0	fauzi@example.com	1234567890	1	DKI Jakarta
RW001	Sugianto Utomo	3175080101010005	L	Solo	1980-11-30	Sulastri	Jl. Cemara No.5	-	Pengusaha	MENIKAH	BUDDHA	2025-05-21	085678901234	44 Th 0 Bl 0 Hr	SMA	SUAMI	Megawati	A03 	BPJS0005	5	5	5	Pengusaha	Jl. Cemara No. 77	Kelurahan E	Kecamatan E	Kabupaten E	PRSH005	5	5	0	jokowi@example.com	1989005	5	Propinsi E
202504164239	Dewi Lestari	3175080101010004	P	Yogyakarta	2000-03-21	Tini Astuti	Jl. Kenanga No.4	AB	Mahasiswa	BELUM MENIKAH	HINDU	2025-05-21	084567890123	24 Th 0 Bl 0 Hr	D3	IBU	Surya Lesmana	A03 	BPJS0004	4	4	4	Wiraswasta	Jl. Mawar No. 9	Kelurahan D	Kecamatan D	Kabupaten D	PRSH004	4	4	0	dewi@example.com	1989004	4	Propinsi D
RM2025052859642	Indira	15	P	Bandung	2004-01-01	Seruni	Jakarta	O	14	BELUM MENIKAH	ISLAM	2025-05-28	08123456789	21 Th 4 Bl 27 Hr	SMA	SAUDARA	Putri	9   	10	17	18	19	5	21	22	23	24	26	6	7	8	indira@gmail.com	27	20	25
RM2025052882024	Indira	15	P	Bandung	2004-01-01	Seruni	Jakarta	O	14	BELUM MENIKAH	ISLAM	2025-05-28	08123456789	21 Th 4 Bl 27 Hr	SMA	SAUDARA	Putri	9   	10	17	18	19	5	21	22	23	24	26	6	7	8	indira@gmail.com	27	20	25
\.


--
-- TOC entry 5644 (class 0 OID 16991)
-- Dependencies: 250
-- Data for Name: pegawai; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.pegawai (id, id_akun, nip, nama, jenis_kelamin, id_jabatan, id_departemen, id_status_aktif, jenis_pegawai, telepon, tanggal_masuk, created_at, updated_at, deleted_at, updater) FROM stdin;
933568d5-982a-43c3-a4aa-3177bab10f07	933568d5-982a-43c3-a4aa-3177bab10f07	1987123456	Eric	L	2	2	1	Tetap	081234567890	2020-01-01	2025-05-15 18:35:47.617694+07	2025-05-15 18:35:47.617694+07	\N	933568d5-982a-43c3-a4aa-3177bab10f07
b9b1ad6c-c41b-446a-b00e-f56684663c56	b9b1ad6c-c41b-446a-b00e-f56684663c56	1987123457	Aziz	L	3	3	1	Kontrak	082345678901	2021-05-15	2025-05-15 18:35:47.617694+07	2025-05-15 18:35:47.617694+07	\N	b9b1ad6c-c41b-446a-b00e-f56684663c56
bd0b4833-510c-4c29-a3a4-e08e9a0a5955	bd0b4833-510c-4c29-a3a4-e08e9a0a5955	1987123455	Admin	L	1000	1000	A	Tetap	081234567890	2020-01-01	2025-05-15 20:01:08.381723+07	2025-05-20 15:24:14.18878+07	\N	bd0b4833-510c-4c29-a3a4-e08e9a0a5955
\.


--
-- TOC entry 5675 (class 0 OID 34223)
-- Dependencies: 281
-- Data for Name: pemberian_obat; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.pemberian_obat (tanggal_beri, jam_beri, nomor_rawat, nama_pasien, kode_obat, nama_obat, embalase, tuslah, jumlah, biaya_obat, total, gudang, no_batch, no_faktur, kelas) FROM stdin;
2025-04-16	09:15:00	RW002	Siti Aminah	OB002	Amoxicillin 250mg	1500	2500	1	7000.00	11000.00	Gudang B	BATCH002	FAKTUR002	kelas1
2025-04-16	10:00:00	RW003	Ahmad Fauzi	OB003	Ibuprofen 200mg	500	1000	3	4000.00	13500.00	Gudang C	BATCH003	FAKTUR003	kelas1
2025-04-19	15:57:46	RW202504169001	Eric	2018001	AB-Vask 10mg (Otsus)	\N	\N	5	25511	127555	Gudang A	1	1	\N
2025-04-19	18:28:05	RW001	Budi Santoso	B000002026	ADONA TAB (BELI NIRWANA)	\N	\N	5	4393	21965	Gudang A	1	1	\N
2025-04-21	19:07:52	RW202504169001	Eric	2018003	AB-Vask 10mg (APBK)	\N	\N	2	191871	383742	Gudang A	1	1	\N
2025-04-26	09:14:59	202504254997	Mae	B000001295	ALBUMINAR 20% x 50ML	\N	\N	5	952875	4764375	Gudang A	1	1	\N
2025-04-27	11:58:25	2025-04-27	11:56:48			\N	\N	\N	\N	\N	\N	\N	\N	\N
2025-05-28	19:38:57	202504164239	Andi			\N	\N	\N	\N	\N	1	\N	\N	\N
2025-05-31	16:24:17		Indira			\N	\N	\N	\N	\N	\N	\N	\N	\N
2025-05-31	18:10:03		Indira			\N	\N	\N	\N	\N	\N	\N	\N	\N
\.


--
-- TOC entry 5683 (class 0 OID 42447)
-- Dependencies: 289
-- Data for Name: pemeriksaan_ranap; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.pemeriksaan_ranap (no_rawat, tgl_perawatan, jam_rawat, suhu_tubuh, tensi, nadi, respirasi, tinggi, berat, spo2, gcs, kesadaran, keluhan, pemeriksaan, alergi, penilaian, rtl, instruksi, evaluasi, nip) FROM stdin;
202504244462	2025-05-12	08:30:00	36.5	120/80	75	16	170	65	98	15	Compos Mentis	Headache	Normal	None	Stable	Follow up in 2 weeks	Take paracetamol	Satisfactory	1987123456
202504167258	2025-05-12	09:00:00	37.2	130/85	80	18	165	70	97	15	Compos Mentis	Fever and cough	Inflamed throat	Penicillin	Needs rest	Monitor symptoms	Take rest and fluids	Improvement expected	1987123456
456	2025-05-13	11:30:00	36.9	120/90	78	16	175	75	98	15	Compos Mentis	Fatigue	Normal	Aspirin	Stable	Normal follow up	Rest and hydration	Satisfactory	1987123456
RW001	2025-05-14	14:00:00	37.0	140/90	85	19	160	60	96	15	Compos Mentis	Abdominal pain	Gastritis	None	Needs treatment	Follow up with specialist	Take antacids	Relief expected	1987123456
202505284545	2025-05-28	20:15:59	5	2	3	4	7	8	6	1	9			10			13	14	1987123456
202505284371	2025-05-29	19:39:12	37.0	2	3	4	7	8	6	1	11	9	10	12	13	14	15	16	1987123456
\.


--
-- TOC entry 5659 (class 0 OID 17412)
-- Dependencies: 265
-- Data for Name: penerimaan_barang_medis; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.penerimaan_barang_medis (id, no_faktur, no_pemesanan, id_supplier, tanggal_datang, tanggal_faktur, tanggal_jthtempo, id_pegawai, id_ruangan, pajak_persen, pajak_jumlah, tagihan, materai) FROM stdin;
\.


--
-- TOC entry 5679 (class 0 OID 42398)
-- Dependencies: 285
-- Data for Name: permintaan_resep_pulang; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.permintaan_resep_pulang (no_permintaan, tgl_permintaan, jam, no_rawat, kd_dokter, status, tgl_validasi, jam_validasi, kode_brng, jumlah, aturan_pakai) FROM stdin;
PRP202505071001	2025-05-07	10:00:00	RW20250427001	D001	Sudah	2025-05-07	10:05:00	OBT001	10	3x1 sesudah makan
PRP202505060901	2025-05-06	10:00:00	RW202505060001	D001	Belum	2025-05-06	10:30:00	OB001	5	3x1 sesudah makan
PRP202505060902	2025-05-06	10:10:00	RW202505060002	D002	Belum	2025-05-06	10:40:00	OB002	10	2x1 sebelum makan
PRP202505063041	2025-05-06	22:07:31	202504232512		Sudah	2025-05-06	22:07:31	B000000003	10	2x2
PRP202505065708	2025-05-06	22:06:12	202504232512	D005	Sudah	2025-05-06	22:06:12	2018001	30	3x1
PRP202505065709	2025-05-06	22:06:12	202504232512	D005	Sudah	2025-05-06	22:06:12	2018001	30	3x1
PRP202505068616	2025-05-06	21:57:12	202504232512		Sudah	2025-05-06	21:57:12	B000000552	15	3x1
PRP202505062704	2025-05-06	23:32:40	202504254997	D003	Sudah	2025-05-06	23:32:40	B000000396	15	3x1
PRP202505069177	2025-05-06	21:57:54	202504232512	D008	Sudah	2025-05-06	21:57:54	B000001294	100	2x1
PRP202505311745	2025-05-31	00:23:07	202504232661		Sudah	2025-05-31	00:23:07	2018003	1	3x1
\.


--
-- TOC entry 5681 (class 0 OID 42411)
-- Dependencies: 287
-- Data for Name: permintaan_stok_obat; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.permintaan_stok_obat (no_permintaan, tgl_permintaan, jam, no_rawat, kd_dokter, status, tgl_validasi, jam_validasi) FROM stdin;
P001202504	2025-04-29	08:30:00	RW20250429001	D001	Belum	2025-04-29	09:00:00
P001202506	2025-04-29	10:00:00	RW20250429003	D003	Belum	2025-04-29	10:30:00
P001202507	2025-04-29	10:45:00	RW20250429004	D001	Sudah	2025-04-29	11:00:00
P001202508	2025-04-29	11:30:00	RW20250429005	D004	Belum	2025-04-29	12:00:00
P20250503001	2025-05-03	09:00:00	RW20250503001	D001	Belum	\N	\N
RSP202505021734	2025-05-02	22:26:49	202504254997	D004	Belum	2025-05-02	22:27:04
SOP202505025054	2025-05-02	22:32:33	202504254997	D004	Belum	2025-05-02	22:32:55
SOP202505025712	2025-05-02	22:36:22	202504254997	D004	Belum	2025-05-02	22:36:45
SOP202505028058	2025-05-02	22:40:02	202504254997	D004	Belum	2025-05-02	22:40:15
RSP202505021234	2025-05-02	22:45:00	202504254997	D004	Belum	\N	\N
RSP202505021235	2025-05-02	22:45:00	202504254997	D004	Belum	\N	\N
SOP202505029678	2025-05-02	22:56:38	202504232512	D004	Belum	2025-05-02	22:57:09
SOP202505025516	2025-05-02	23:00:37	202504254997	D004	Belum	2025-05-02	23:01:00
SOP202505027152	2025-05-02	23:18:44	202504254997	D004	Belum	\N	\N
SOP202505029321	2025-05-02	23:37:41	202504254997	D004	Belum	\N	\N
SOP202505029322	2025-05-02	23:37:41	202504254997	D004	Belum	\N	\N
SOP202505031426	2025-05-03	12:15:04	202504232512	D004	Belum	\N	\N
SOP202505057213	2025-05-05	14:23:38	202504254997	D004	Belum	\N	\N
SOP202505316071	2025-05-31	00:03:50	202505284371	D004	Belum	\N	\N
SOP202506011656	2025-06-01	15:21:57	202504164239	D001	Belum	2025-06-01	15:22:22
\.


--
-- TOC entry 5650 (class 0 OID 17193)
-- Dependencies: 256
-- Data for Name: presensi; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.presensi (id, id_pegawai, id_jadwal_pegawai, tanggal, jam_masuk, jam_pulang, keterangan, foto, created_at, updated_at, deleted_at, updater) FROM stdin;
\.


--
-- TOC entry 5667 (class 0 OID 25963)
-- Dependencies: 273
-- Data for Name: rawat_inap; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.rawat_inap (nomor_rawat, nomor_rm, nama_pasien, alamat_pasien, penanggung_jawab, hubungan_pj, jenis_bayar, kamar, tarif_kamar, diagnosa_awal, diagnosa_akhir, tanggal_masuk, tanggal_keluar, jam_keluar, total_biaya, status_pulang, lama_ranap, dokter_pj, status_bayar, jam_masuk) FROM stdin;
202504254997	300	Mae	Jl. Merpati	Meri	Diri Sendiri	BPJS	VUP.01	500	Diare	\N	2025-04-06	0001-01-01	0001-01-01	0	\N	0	Dr. Elsa	\N	14:55:32
202504164239	123	Andi	Jl. Merpati	Eric	Diri Sendiri	BPJS	VUP.03	0	DBD	\N	2025-04-19	0001-01-01	0001-01-01 BC	0	Belum	0	Dr. Ahmad	Belum Bayar	15:10:48
202504232661	125	Don	Jl. Merpati	Budi	Diri Sendiri	BPJS	K1.02	200	Sakit	\N	2025-04-06	0001-01-01	0001-01-01 BC	0	Belum	0	Dr. Intan	Belum Bayar	15:13:07
202504232512	123	Andi	Jl. Merpati	Eric	Diri Sendiri	BPJS	VUP.02	500	Diare	\N	2025-04-06	0001-01-01	0001-01-01 BC	0	Belum	0	Dr. Fahmi	Belum Bayar	15:13:29
202504199396	123	Eric	kampung	Budi	Saudara	BPJS	K01	50000	Sakit	\N	2025-04-06	0001-01-01	0001-01-01 BC	0	Belum	0	Dr. Budi	Belum Bayar	15:13:45
202504193859	125	Don	Jl. Merpati	Budi	Diri Sendiri	BPJS	K01	50000	Sakit	\N	2025-04-06	0001-01-01	0001-01-01 BC	0	Belum	0	Dr. Gina	Belum Bayar	15:14:04
202505284545	202504164239	Dewi Lestari	Jl. Mawar No. 9	Surya Lesmana	IBU	BPJS	K3-02	100	Sakit	\N	2025-04-06	0001-01-01	0001-01-01	0	\N	0	Dr. Intan	\N	20:15:39
202505284371	RM2025052859642	Indira	21	Putri	SAUDARA	BPJS	K3-02	100	DBD	\N	2025-04-04	0001-01-01	0001-01-01	0	\N	0	Dr. Intan	\N	21:23:04
202504168143	123	Andi	Jl. Merpati	Eric	Diri Sendiri	BPJS	VUP.04	0	Influenza	\N	2025-04-19	0001-01-01	0001-01-01 BC	0	Belum	0	Dr. Ahmad	Belum Bayar	16:59:25
\.


--
-- TOC entry 5663 (class 0 OID 17759)
-- Dependencies: 269
-- Data for Name: registrasi; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.registrasi (nomor_reg, nomor_rawat, tanggal, jam, kode_dokter, nama_dokter, nomor_rm, nama_pasien, jenis_kelamin, umur, poliklinik, jenis_bayar, penanggung_jawab, alamat_pj, hubungan_pj, biaya_registrasi, status_registrasi, no_telepon, status_rawat, status_poli, status_bayar, status_kamar, nomor_bed) FROM stdin;
19	RW001	2024-03-26	00:00:00	D001		RM001	John Doe	L	30	Poli Umum	BPJS	Jane Doe	Jl. Test No. 1	Istri	50000	pending	08123456789	rawat jalan	aktif	belum bayar	true	\N
22	RW001	2024-03-26	00:00:00	D001		RM001	John Doe	L	30	Poli Umum	BPJS	Jane Doe	Jl. Test No. 1	Istri	50000	pending	08123456789	rawat jalan	aktif	belum bayar	true	\N
29	RW001	2024-03-26	00:00:00	D001		RM001	John Doe	L	30	Poli Umum	BPJS	Jane Doe	Jl. Test No. 1	Istri	50000	pending	08123456789	rawat jalan	aktif	belum bayar	true	\N
16	RW001	2024-03-26	00:00:00	D001		RM001	Don	L	30	Poli Umum	BPJS	Jane Doe	Jl. Test No. 1	Istri	50000	pending	08123456789	rawat jalan	aktif	belum bayar	true	\N
REG202505227163	202505221473	2025-05-22	00:00:00	D007	Dr. Gina	2025052212345	Ahmad Fauzi	L	34	Poli Umum	BPJS	Ridwan	Jl. Pahlawan	AYAH	0	Baru	081234567890	Belum	Baru	Belum Bayar		\N
REG202505282074	202505284545	2025-05-28	00:00:00	D009	Dr. Intan	202504164239	Dewi Lestari	P	24	Poli Umum	BPJS	Surya Lesmana	Jl. Mawar No. 9	IBU	10000	Baru	084567890123	Belum	Baru	Belum Bayar		\N
REG202505288501	202505284371	2025-05-28	00:00:00	D009	Dr. Intan	RM2025052859642	Indira	P	21	Poli Umum	BPJS	Putri	21	SAUDARA	50000	Baru	08123456789	Belum	Baru	Belum Bayar		\N
REG202504044123	345	2025-04-04	00:00:00	D001	Dr. Ahmad	123	Eric	L	22	Poli Umum	BPJS	Jaya	c	Diri Sendiri	100000	Baru	08123456789	Belum	Baru	Belum Bayar	diterima	3
REG202504026882	456	2025-04-02	00:00:00	D001	Dr. Ahmad	123	Eric	L	22	Poli Umum	BPJS	Eric	c	Diri Sendiri	10000	Baru	08123456789	Belum	Baru	Belum Bayar	diterima	3
17	RW001	2024-03-26	00:00:00	D001		RM001	John Doe	L	30	Poli Umum	BPJS	Jane Doe	Jl. Test No. 1	Istri	50000	pending	08123456789	rawat jalan	aktif	belum bayar	diterima	3
REG202504026883	202504069396	2025-04-06	00:00:00	D001	Dr. Ahmad	123	Eric	L	22	Poli Umum	BPJS	Jaya	c	Diri Sendiri	123000	Baru	08123456789	Belum	Baru	Belum Bayar	diterima	1
REG202504049127	456	2025-04-04	00:00:00	D001	Dr. Ahmad	123	Eric	L	22	Poli Umum	BPJS	Jaya	c	Diri Sendiri	123000	Baru	08123456789	Belum	Baru	Belum Bayar	diterima	1
21	RW001	2024-03-26	00:00:00	D001		RM001	John Doe	L	30	Poli Umum	BPJS	Jane Doe	Jl. Test No. 1	Istri	50000	pending	08123456789	rawat jalan	aktif	belum bayar	diterima	1
23	RW001	2024-03-26	00:00:00	D001	Dr. Jane Doe	RM001	John Doe	L	30	Poli Umum	BPJS	Jane Doe	Jl. Test No. 1	Istri	50000	baru	+6281234567890	Rawat Jalan	Antrian	Belum Lunas	menunggu	\N
REG202504167709	202504167258	2025-04-16	00:00:00	D009	Dr. Intan	125	Don	L	35	Poli Umum	BPJS	Budi	Jl. Merpati	Diri Sendiri	123000	Baru	08123456789	Belum	Baru	Belum Bayar	menunggu	\N
REG202504247426	202504244462	2025-04-24	00:00:00	D008	Dr. Hadi	300	Mae	L	35	Poli Umum	BPJS	Meri	Jl. Merpati	Diri Sendiri	123000	Baru	08123456789	Belum	Baru	Belum Bayar		\N
\.


--
-- TOC entry 5677 (class 0 OID 42376)
-- Dependencies: 283
-- Data for Name: resep_dokter; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.resep_dokter (no_resep, kode_barang, jumlah, aturan_pakai, embalase, tuslah) FROM stdin;
RSP20250421001	OBT001	22.17	3x1 sesudah makan	0	0
RSP20250421002	OBT002	29.33	2x1 sebelum makan	0	0
RSP20250421003	OBT003	6.70	1x1 malam hari	0	0
RSP20250421004	OBT004	22.69	3x1 pagi, siang, malam	0	0
RSP20250421005	OBT005	20.70	2x2 pagi dan malam	0	0
RSP20250421006	OBT006	13.18	1x3 setiap 8 jam	0	0
RSP20250421007	OBT007	15.87	1x2 pagi dan sore	0	0
RSP20250421008	OBT008	7.28	3x1 sebelum makan	0	0
RSP20250421009	OBT009	25.97	1x1 sesudah makan	0	0
RSP20250421010	OBT010	24.62	2x1 setiap 12 jam	0	0
RSP20250421001	2018001	10	1x sehari sebelum makan	0	0
RSP20250421001	2018003	5	2x sehari setelah makan	0	0
RSP20250421002	A000000001	2	1x sehari	0	0
RSP20250421002	A000000002	3	2x pagi dan malam	0	0
RSP20250421003	A000000003	1	sehabis makan	0	0
RSP20250421003	A000000004	7	3x sebelum tidur	0	0
RSP20250421004	A000000005	12	setiap pagi	0	0
RSP20250421005	A000000006	20	pagi dan sore	0	0
	2018001	2	2	0	0
	B000002033	10	10	0	0
	B000000003	4	2x2	0	0
	B000000552	5	2x2	0	0
RSP202504221998	B000000552	16	2x2	0	0
RSP202504229734	B000000552	5	3x1	0	0
RSP202504237598	B000000003	10	2x2	0	0
RSP202504238226	B000000552	5	3x1	0	0
RSP202504255047	B000000552	5	2x2	0	0
RSP202504256269	2018003	10	3x1	0	0
RSP202505027694	2018003	10	3x1	0	0
RSP202505065592	B000000562	25	2x2	0	0
RSP202505065592	B000001729	40	4x1	0	0
RSP202505297487	B000001798	10	3x1	0	0
RSP202505297487	B000000374	5	3x1	0	0
RSP202505304793	B000001729	4	3x1	0	0
RSP202505304793	B000000572	5	3x1	0	0
RSP202505308319	2018003	1	2x1	0	0
RSP202505316952	B000000003	10	3x1	0	0
RSP202505316952	B000001547	20	3x1	0	0
\.


--
-- TOC entry 5690 (class 0 OID 50783)
-- Dependencies: 296
-- Data for Name: resep_dokter_racikan; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.resep_dokter_racikan (no_resep, no_racik, nama_racik, kd_racik, jml_dr, aturan_pakai, keterangan) FROM stdin;
RSP202505294923	RC01	Racikan Batuk	PCT	10	3x1 sesudah makan	Obat campuran batuk
RSP202505297596	1	Flu	PCT	10	3x1	Sesudah makan
RSP202505292188	2	Flu	PCT	10	3x1	Sesudah makan
RSP202505297487	3	Flu	PCT	10	3x1	Sesudah makan
RSP202505304793	4	Flu	PCT	10	3x1	Sesudah makan
RSP202505316952	5	Flu	PCT	10	3x1	Sesudah makan
\.


--
-- TOC entry 5691 (class 0 OID 50788)
-- Dependencies: 297
-- Data for Name: resep_dokter_racikan_detail; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.resep_dokter_racikan_detail (no_resep, no_racik, kode_brng, p1, p2, kandungan, jml) FROM stdin;
RSP202505294923	RC01	2018001	1	2	250	3
RSP202505297596	1	2018003	1	2	200	4
RSP202505297596	1	B000000003	1	2	250	5
RSP202505292188	2	B000000003	1	2	500	5
RSP202505292188	2	B000008006	1	2	100	10
RSP202505297487	3	B000001798	1	2	100	10
RSP202505297487	3	B000000374	1	2	200	5
RSP202505304793	4	B000001729	1	2	400	4
RSP202505304793	4	B000000572	1	2	500	5
RSP202505316952	5	B000000003	1	2	100	10
RSP202505316952	5	B000001547	1	2	200	20
\.


--
-- TOC entry 5678 (class 0 OID 42381)
-- Dependencies: 284
-- Data for Name: resep_obat; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.resep_obat (no_resep, tgl_perawatan, jam, no_rawat, kd_dokter, tgl_peresepan, jam_peresepan, status, tgl_penyerahan, jam_penyerahan, validasi) FROM stdin;
RSP202504229734	2025-04-22	15:08:55	RW202504169001	D004	2025-04-22	15:08:55	ranap	2025-04-22	15:08:55	t
RSP20250421002	2025-04-20	09:30:00	RW20250420002	D001	2025-04-20	09:35:00	ranap	2025-04-20	10:15:00	f
RSP20250421003	2025-04-19	13:00:00	RW20250419001	D001	2025-04-19	13:10:00	ralan	2025-04-19	14:00:00	f
RSP20250421004	2025-04-18	10:45:00	RW20250418001	D001	2025-04-18	10:50:00	ranap	2025-04-18	11:30:00	f
RSP20250421005	2025-04-17	11:15:00	RW20250417001	D001	2025-04-17	11:20:00	ralan	2025-04-17	12:00:00	t
RSP202504256269	2025-04-25	15:28:47	202504254997	D004	2025-04-25	15:28:47	ranap	2025-04-25	15:28:47	f
RSP202505027694	2025-05-02	15:20:52	202504254997	D004	2025-05-02	15:20:52	ranap	2025-05-02	15:20:52	f
RSP202505065592	2025-05-06	22:09:40	202504232512	D004	2025-05-06	22:09:40	ranap	2025-05-06	22:09:40	f
RSP202504255047	2025-04-25	15:20:42	202504254997	D004	2025-04-25	15:20:42	ranap	2025-04-25	15:20:42	t
RSP202505304793	2025-05-30	00:02:10	RW001	D001	2025-05-30	00:02:10	ranap	2025-05-30	00:02:10	f
RSP202505308319	2025-05-30	14:37:15	202505284371	D001	2025-05-30	14:37:15	ranap	2025-05-30	14:37:15	t
RSP202505316952	2025-05-31	13:51:06	202504168143	D003	2025-05-31	13:51:06	ranap	2025-05-31	13:51:06	f
RSP20250421001	2025-04-20	08:15:00	RW20250420001	D001	2025-04-20	08:20:00	ralan	2025-04-20	09:00:00	t
RSP202504238226	2025-04-23	16:26:25	202504199396	D004	2025-04-23	16:26:25	ranap	2025-04-23	16:26:25	t
RSP202504237598	2025-04-23	16:24:18	202504199396	D004	2025-04-23	16:24:18	ranap	2025-04-23	16:24:18	t
\.


--
-- TOC entry 5680 (class 0 OID 42406)
-- Dependencies: 286
-- Data for Name: resep_pulang; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.resep_pulang (no_rawat, kode_brng, jml_barang, harga, total, dosis, tanggal, jam, kd_bangsal, no_batch, no_faktur) FROM stdin;
RW20250428001	OBT001	2	15000	30000	3x1 sesudah makan	2025-04-28	08:00:00	B001	BT001	FKT001
RW20250428002	OBT002	1	20000	20000	2x1 sebelum makan	2025-04-28	09:30:00	B002	BT002	FKT002
RW20250428004	OBT004	3	5000	15000	1x1 malam hari	2025-04-28	11:45:00	B004	BT004	FKT004
RW20250428005	OBT005	4	12000	48000	3x1 setelah makan	2025-04-28	13:00:00	B005	BT005	FKT005
202504254997	B000001294	6	10688	64128	3x1 	2025-04-28	11:35:18	VUP.01	1	1
202504232661	B000001294	6	10688	64128	3x1 	2025-04-28	11:36:04	K1.02	1	1
202504254997	B000001294	10	10688	106880	3x1 	2025-04-16	23:01:37	VUP.01	1	1
202504232512	2018001	30	21259	637770	3x1 	2025-04-16	23:01:37	VUP.02	1	1
202504232512	B000001294	100	10688	21965	3x1 	2025-04-16	23:01:37	VUP.02	1	1
202504254997	B000000396	15	0	0	3x1	2025-04-16	23:01:37	VUP.01	1	1
202504232661	2018003	1	0	0	3x1	2025-04-16	23:01:37	K1.02	1	1
\.


--
-- TOC entry 5689 (class 0 OID 50751)
-- Dependencies: 295
-- Data for Name: resume_pasien_ranap; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.resume_pasien_ranap (no_rawat, kd_dokter, diagnosa_awal, alasan, keluhan_utama, pemeriksaan_fisik, jalannya_penyakit, pemeriksaan_penunjang, hasil_laborat, tindakan_dan_operasi, obat_di_rs, diagnosa_utama, kd_diagnosa_utama, diagnosa_sekunder, kd_diagnosa_sekunder, diagnosa_sekunder2, kd_diagnosa_sekunder2, diagnosa_sekunder3, kd_diagnosa_sekunder3, diagnosa_sekunder4, kd_diagnosa_sekunder4, prosedur_utama, kd_prosedur_utama, prosedur_sekunder, kd_prosedur_sekunder, prosedur_sekunder2, kd_prosedur_sekunder2, prosedur_sekunder3, kd_prosedur_sekunder3, alergi, diet, lab_belum, edukasi, cara_keluar, ket_keluar, keadaan, ket_keadaan, dilanjutkan, ket_dilanjutkan, kontrol, obat_pulang) FROM stdin;
RW001	D001	Demam Berdarah	Panas tinggi dan lemas	Demam selama 3 hari	TD: 120/80, N: 90x/mnt	Demam disertai nyeri kepala dan mual	USG Abdomen, Rontgen Thorax	Trombosit menurun	Transfusi cairan	Paracetamol, Ringer Laktat	Dengue Fever	A91	Dehidrasi Ringan	E86	Hipotensi	I95	Nyeri Perut	R10	Batuk Ringan	R05	Infus Cairan	99.15	Pemberian Obat	99.29	Pemantauan Vital Sign	89.52	Konsultasi Gizi	88.78	Tidak ada	Cair, rendah garam	Sedang diproses	Telah diberikan	Atas Izin Dokter	\N	Membaik	\N	Kembali Ke RS	\N	2024-08-01 10:00:00	Parasetamol 3x sehari
RW002	D002	Asma Akut	Sesak napas mendadak	Sesak berat	Wheezing terdengar jelas	Riwayat asma sejak kecil	Spirometri, Foto Thorax	Normal, eosinofil meningkat	Inhalasi bronkodilator	Salbutamol, Oksigen	Asma	J45	Infeksi Saluran Nafas Atas	J00	Alergi Debu	T78	Bronkospasme	J98	Hipoksia	R09	Nebulizer	93.93	Oksigenasi	93.94	Pemeriksaan Darah	90.59	Pendidikan Pasien	94.01	Alergi debu rumah	Tinggi kalori, rendah lemak	Sudah dilakukan	Edukasi penggunaan inhaler	Atas Izin Dokter	\N	Sembuh	\N	Kontrol di RS	Poli Paru	2024-08-03 14:00:00	Salbutamol 2x sehari
RW003	D003	Hipertensi Berat	Pusing dan mimisan	Tekanan darah tinggi	TD: 180/110, N: 88x/mnt	Hipertensi tidak terkontrol	EKG, Urinalisis	Proteinuria, hipertrofi ventrikel kiri	Pemberian antihipertensi	Captopril, Amlodipine	Hipertensi	I10	Nefropati	N08	Retinopati	H35	Gangguan Kognitif	F06	Hiperkolesterolemia	E78	Pemeriksaan EKG	89.52	CT Scan	87.03	Pemeriksaan Laboratorium	90.59	Psikologi	94.08	Tidak ada	Rendah garam	Pending	Konseling keluarga	Pulang Sendiri	Atas permintaan pasien	Membaik	Masih perlu kontrol	Puskesmas	Faskes terdekat	2024-08-07 08:00:00	Captopril 2x sehari
RW004	D004	Demensia	Penurunan daya ingat	Lupa nama anak sendiri	TD: 130/80, MMSE: 18/30	Progresif selama 1 tahun	CT Head, Pemeriksaan Neuro	Atrofi otak	Rawat suportif dan pengawasan	Vitamin B, Donepezil	Demensia Alzheimer	G30	Depresi	F32	Delirium	F05	Insomnia	G47	Nutrisi Buruk	E46	MRI Kepala	88.91	Tes Neurokognitif	94.10	Kunjungan Homecare	94.04	Psikoterapi	94.11	Tidak ada	Makanan lunak bergizi	Sudah lengkap	Keluarga diberi edukasi	Atas Izin Dokter	\N	Lain-lain	Stabil	Kontrol di RS	Poli Jiwa	\N	Donepezil malam hari
RW005	D005	TBC Paru	Batuk lama dan berat badan turun	Batuk >2 minggu, BB turun	Ronki basah bilateral	Didiagnosis TBC sejak 1 bulan lalu	Rontgen Thorax, Sputum BTA	BTA positif	Terapi OAT	HRZE, vitamin B6	Tuberculosis Paru	A15	Anemia Ringan	D50	Malnutrisi	E46	Gastritis	K29	Hipoglikemia	E16	Terapi OAT	99.24	Konseling	94.12	Tes HIV	90.61	Pendidikan TB	94.01	Tidak ada	Tinggi protein	Pending pengambilan ulang	Edukasi kepatuhan OAT	Atas Izin Dokter	\N	Membaik	\N	Kembali Ke RS	\N	2024-08-10 10:00:00	HRZE selama 2 bulan
\.


--
-- TOC entry 5628 (class 0 OID 16844)
-- Dependencies: 234
-- Data for Name: role; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.role (id, nama, created_at, updated_at) FROM stdin;
1337	Developer	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
1	Admin	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
2	Pegawai	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
3	Dokter	2025-05-15 18:24:16.375191+07	2025-05-15 18:24:16.375191+07
\.


--
-- TOC entry 5641 (class 0 OID 16942)
-- Dependencies: 247
-- Data for Name: ruangan; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.ruangan (id, nama, created_at, updated_at) FROM stdin;
1000	Gudang	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
2000	Apotek	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
3000	LABORAT	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
4000	HCU	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
5000	ICU	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
6000	IGD	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
7000	Kelas 1	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
8000	Kelas 2	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
9000	Kelas 3	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
10000	Operasi	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
11000	NICU	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
12000	VIP	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
13000	VVIP	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
\.


--
-- TOC entry 5666 (class 0 OID 25956)
-- Dependencies: 272
-- Data for Name: rujukan_keluar; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.rujukan_keluar (nomor_rujuk, nomor_rawat, nomor_rm, nama_pasien, tempat_rujuk, tanggal_rujuk, jam_rujuk, keterangan_diagnosa, dokter_perujuk, kategori_rujuk, pengantaran, keterangan) FROM stdin;
1	2	3	eric	rsud	2025-05-05	2025-05-05	sakit	eric	bedah	ambulans	-
50	202504066965	789	Jaya	rsud	2025-04-06	0001-01-01 BC	sakit	ahmad	bedah	sendiri	
\.


--
-- TOC entry 5665 (class 0 OID 25949)
-- Dependencies: 271
-- Data for Name: rujukan_masuk; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.rujukan_masuk (nomor_rujuk, perujuk, alamat_perujuk, nomor_rawat, nomor_rm, nama_pasien, alamat, umur, tanggal_masuk, tanggal_keluar, diagnosa_awal) FROM stdin;
1	RSUD	keputih	456	789	Eric	keputih	22	2025-04-04	2025-04-05	Sakit
50	RSUD	keputih	750	15615635	Jaya	keputih	23	2025-04-06	2025-04-10	Sakit
51	RSUD	keputih	202504066408	15615634	Jaya	keputih	23	2025-04-06	2025-04-05	Sakit
			202504148176	55	Don			2025-04-06	2025-04-10	Sakit
\.


--
-- TOC entry 5637 (class 0 OID 16914)
-- Dependencies: 243
-- Data for Name: satuan_barang_medis; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.satuan_barang_medis (id, nama, created_at, updated_at) FROM stdin;
1	-	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
2	pcs	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
3	tablet	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
4	kapsul	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
5	ampul	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
6	botol	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
7	tube	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
8	pasang	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
9	kotak	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
10	item	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
\.


--
-- TOC entry 5633 (class 0 OID 16882)
-- Dependencies: 239
-- Data for Name: shift; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.shift (id, nama, jam_masuk, jam_pulang, created_at, updated_at) FROM stdin;
NA	Belum Ditentukan	07:00:00+07	07:00:00+07	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
P	Pagi	07:00:00+07	15:00:00+07	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
S	Sore	15:00:00+07	23:00:00+07	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
M	Malam	23:00:00+07	07:00:00+07	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
\.


--
-- TOC entry 5632 (class 0 OID 16875)
-- Dependencies: 238
-- Data for Name: status_aktif_pegawai; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.status_aktif_pegawai (id, nama, created_at, updated_at) FROM stdin;
A	Aktif	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
BH	Berhenti dengan Hormat	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
C	Cuti	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
R	Resign	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
BT	Berhenti dengan Tidak Hormat	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
P	Pensiun	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
W	Wafat	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
\.


--
-- TOC entry 5657 (class 0 OID 17379)
-- Dependencies: 263
-- Data for Name: stok_keluar_barang_medis; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.stok_keluar_barang_medis (id, no_keluar, id_pegawai, tanggal_stok_keluar, id_ruangan, keterangan) FROM stdin;
\.


--
-- TOC entry 5682 (class 0 OID 42416)
-- Dependencies: 288
-- Data for Name: stok_obat_pasien; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.stok_obat_pasien (no_permintaan, tanggal, jam, no_rawat, kode_brng, jumlah, kd_bangsal, no_batch, no_faktur, aturan_pakai, jam00, jam01, jam02, jam03, jam04, jam05, jam06, jam07, jam08, jam09, jam10, jam11, jam12, jam13, jam14, jam15, jam16, jam17, jam18, jam19, jam20, jam21, jam22, jam23) FROM stdin;
SP202504290001	2025-04-29	08:00:00	2025/04/29/000001	B000000556	3	101  	B123	F001	3x1	f	f	f	f	f	f	f	f	t	f	f	f	f	f	t	f	f	f	f	f	t	f	f	f
SP202504290003	2025-04-29	08:00:00	2025/04/29/000003	B000000556	2	103  	B125	F003	2x1	f	f	f	f	f	f	f	f	t	f	f	f	f	f	t	f	f	f	f	f	f	f	f	f
SP202504290004	2025-04-29	07:30:00	2025/04/29/000004	2018001	1	104  	B126	F004	1x1	f	f	f	f	f	f	f	f	t	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f
SP202504290005	2025-04-29	16:30:00	2025/04/29/000005	B000001207	2	105  	B127	F005	2x1	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	t	f	f	f
SP202504290002	2025-04-29	21:00:00	202504069396	B000002030	1	102  	B124	F002	1x1 ml	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	t	f	f	f
P20250503001	2025-05-03	09:00:00	RW20250503001	2018001	2	B001 	B123	F001	3x1	t	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f
RSP202505021235	2025-05-02	22:45:00	202504254997	OBT001	2	B001 	BTCH001	FKT20250502	3x sehari	f	f	f	f	f	f	f	f	t	f	f	f	f	f	t	f	f	f	f	f	t	f	f	f
RSP202505021235	2025-05-02	22:45:00	202504254997	OBT002	1	B001 	BTCH002	FKT20250502	2x sehari	f	f	f	f	f	f	f	f	f	t	f	f	f	f	f	f	f	f	t	f	f	f	f	f
SOP202505029321	2025-05-02	23:37:41	202504254997	B000000003	0	B001 	BTCH001	FKT20250502	2x2	f	f	f	f	f	f	f	t	t	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f
SOP202505029322	2025-05-02	23:37:41	202504254997	B000000003	10	B001 	BTCH001	FKT20250502	2x2	f	f	f	f	f	f	f	t	t	f	f	f	f	f	f	f	f	f	f	f	f	f	f	f
SOP202505031426	2025-05-03	12:15:04	202504232512	B000002033	10	B001 	BTCH001	FKT20250502	2x2	f	f	f	f	f	f	t	f	f	f	f	f	t	f	f	f	f	f	f	f	f	f	f	f
SOP202505057213	2025-05-05	14:23:38	202504254997	B000002026	50	B001 	BTCH001	FKT20250502	2x2	f	f	f	f	f	f	f	f	f	f	f	f	t	f	f	f	f	f	t	f	f	f	f	f
SOP202505316071	2025-05-31	00:03:50	202505284371	2018003	10	B001 	BTCH001	FKT20250502	3x1	f	f	f	f	f	f	f	f	f	f	t	f	t	f	f	f	f	f	f	f	f	f	f	f
\.


--
-- TOC entry 5642 (class 0 OID 16949)
-- Dependencies: 248
-- Data for Name: supplier_barang_medis; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.supplier_barang_medis (id, nama, alamat, no_telp, kota, nama_bank, no_rekening, created_at, updated_at) FROM stdin;
1	Mitra	Jln. Benar	08234234	Jakarta	BCA	8123123	2025-03-17 19:59:47.012224+07	2025-03-17 19:59:47.012224+07
\.


--
-- TOC entry 5672 (class 0 OID 34198)
-- Dependencies: 278
-- Data for Name: tarif_tindakan; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.tarif_tindakan (kode, nama_perawatan, kategori_perawatan, tarif, kelas) FROM stdin;
\.


--
-- TOC entry 5670 (class 0 OID 26005)
-- Dependencies: 276
-- Data for Name: tindakan; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.tindakan (nomor_rawat, nomor_rm, nama_pasien, tindakan, kode_dokter, nama_dokter, nip, nama_petugas, tanggal_rawat, jam_rawat, biaya) FROM stdin;
40	2	Aziz	suntik	D001	Dr. Ahmad	75	Agus	2025-06-01	20:20:00	100000
41	3	Don	cuci darah	D001	Dr. Ahmad	55	Mae	2025-05-08	18:00:00	500000
40	2	Aziz	OG.I.102	D001	Dr. Rina Kusuma	\N	Acil	2025-04-16	20:06:47	5000
40	2	Aziz	BU.VIP.4	D001	Dr. Rina Kusuma	\N	Mae	2025-04-18	20:55:10	\N
RSP202504223984	123	Eric	\N	D001	Dr. Rina Kusuma	\N	\N	2025-04-22	11:24:58	\N
202504244462	300	Mae	THT.II.12	D001	D008	\N	Acil	2025-04-25	15:03:07	148750
RW001	RM001	John Doe	PD.VVIP.29	D001	D001	\N	Acil	2025-04-25	20:56:41	198375
20250412256	1	Aziz	PD.VVIP.29	D001	D001	\N	Acil	2025-04-25	21:08:40	198375
RW202504169001	123	Eric	OG.I.102	D001	D001	\N	Acil	2025-05-18	14:04:27	4500000
RW202504169001	123	Eric	OG.I.102	D001	D001	\N	\N	2025-05-26	18:50:23	4500000
202505284371	RM2025052859642	Indira	PD.III.29	D001	D001	\N	\N	2025-05-29	18:43:49	108375
202504254997	300	Mae	UM.HT.041	\N	D001	\N	Acil	2025-05-31	12:39:29	\N
\.


--
-- TOC entry 5658 (class 0 OID 17396)
-- Dependencies: 264
-- Data for Name: transaksi_keluar_barang_medis; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.transaksi_keluar_barang_medis (id, id_stok_keluar, id_barang_medis, no_batch, no_faktur, jumlah_keluar) FROM stdin;
\.


--
-- TOC entry 5649 (class 0 OID 17161)
-- Dependencies: 255
-- Data for Name: tukar_jadwal; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.tukar_jadwal (id, id_sender, id_recipient, id_hari, id_shift_sender, id_shift_recipient, status) FROM stdin;
\.


--
-- TOC entry 5669 (class 0 OID 25998)
-- Dependencies: 275
-- Data for Name: ugd; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.ugd (nomor_reg, nomor_rawat, tanggal, jam, kode_dokter, dokter_dituju, nomor_rm, nama_pasien, jenis_kelamin, umur, poliklinik, penanggung_jawab, alamat_pj, hubungan_pj, biaya_registrasi, status, jenis_bayar, status_rawat, status_bayar) FROM stdin;
1	20250412256	2025-04-12	20:20:20	D001	Dr. Ahmad	1	Aziz	L	22	Poli Jantung	Jaya	Keputih	Diri Sendiri	100000	Lama	BPJS	Belum	Belum Bayar
UGD1001	RW1001	2025-04-12	14:00:00	D001	dr. Rina	RM1001	Andi	L	35	Poli Umum	Budi	Jl. Merpati	Suami	50000		Tunai	rawat	belum
\.


--
-- TOC entry 5226 (class 2606 OID 16788)
-- Name: alasan_cuti alasan_cuti_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.alasan_cuti
    ADD CONSTRAINT alasan_cuti_pkey PRIMARY KEY (id);


--
-- TOC entry 5218 (class 2606 OID 16760)
-- Name: departemen departemen_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.departemen
    ADD CONSTRAINT departemen_pkey PRIMARY KEY (id);


--
-- TOC entry 5238 (class 2606 OID 16827)
-- Name: golongan_barang_medis golongan_barang_medis_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.golongan_barang_medis
    ADD CONSTRAINT golongan_barang_medis_pkey PRIMARY KEY (id);


--
-- TOC entry 5224 (class 2606 OID 16781)
-- Name: hari hari_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.hari
    ADD CONSTRAINT hari_pkey PRIMARY KEY (id);


--
-- TOC entry 5228 (class 2606 OID 16799)
-- Name: industri_farmasi industri_farmasi_kode_key; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.industri_farmasi
    ADD CONSTRAINT industri_farmasi_kode_key UNIQUE (kode);


--
-- TOC entry 5230 (class 2606 OID 16797)
-- Name: industri_farmasi industri_farmasi_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.industri_farmasi
    ADD CONSTRAINT industri_farmasi_pkey PRIMARY KEY (id);


--
-- TOC entry 5216 (class 2606 OID 16753)
-- Name: jabatan jabatan_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.jabatan
    ADD CONSTRAINT jabatan_pkey PRIMARY KEY (id);


--
-- TOC entry 5234 (class 2606 OID 16813)
-- Name: jenis_barang_medis jenis_barang_medis_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.jenis_barang_medis
    ADD CONSTRAINT jenis_barang_medis_pkey PRIMARY KEY (id);


--
-- TOC entry 5236 (class 2606 OID 16820)
-- Name: kategori_barang_medis kategori_barang_medis_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.kategori_barang_medis
    ADD CONSTRAINT kategori_barang_medis_pkey PRIMARY KEY (id);


--
-- TOC entry 5214 (class 2606 OID 16746)
-- Name: organisasi organisasi_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.organisasi
    ADD CONSTRAINT organisasi_pkey PRIMARY KEY (id);


--
-- TOC entry 5212 (class 2606 OID 16736)
-- Name: role role_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.role
    ADD CONSTRAINT role_pkey PRIMARY KEY (id);


--
-- TOC entry 5240 (class 2606 OID 16834)
-- Name: ruangan ruangan_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.ruangan
    ADD CONSTRAINT ruangan_pkey PRIMARY KEY (id);


--
-- TOC entry 5232 (class 2606 OID 16806)
-- Name: satuan_barang_medis satuan_barang_medis_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.satuan_barang_medis
    ADD CONSTRAINT satuan_barang_medis_pkey PRIMARY KEY (id);


--
-- TOC entry 5222 (class 2606 OID 16774)
-- Name: shift shift_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.shift
    ADD CONSTRAINT shift_pkey PRIMARY KEY (id);


--
-- TOC entry 5220 (class 2606 OID 16767)
-- Name: status_aktif_pegawai status_aktif_pegawai_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.status_aktif_pegawai
    ADD CONSTRAINT status_aktif_pegawai_pkey PRIMARY KEY (id);


--
-- TOC entry 5242 (class 2606 OID 16843)
-- Name: supplier_barang_medis supplier_barang_medis_pkey; Type: CONSTRAINT; Schema: ref; Owner: postgres
--

ALTER TABLE ONLY ref.supplier_barang_medis
    ADD CONSTRAINT supplier_barang_medis_pkey PRIMARY KEY (id);


--
-- TOC entry 5276 (class 2606 OID 16969)
-- Name: akun akun_email_key; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.akun
    ADD CONSTRAINT akun_email_key UNIQUE (email);


--
-- TOC entry 5278 (class 2606 OID 16967)
-- Name: akun akun_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.akun
    ADD CONSTRAINT akun_pkey PRIMARY KEY (id);


--
-- TOC entry 5298 (class 2606 OID 17040)
-- Name: alamat alamat_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.alamat
    ADD CONSTRAINT alamat_pkey PRIMARY KEY (id_akun);


--
-- TOC entry 5258 (class 2606 OID 16902)
-- Name: alasan_cuti alasan_cuti_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.alasan_cuti
    ADD CONSTRAINT alasan_cuti_pkey PRIMARY KEY (id);


--
-- TOC entry 5386 (class 2606 OID 25989)
-- Name: ambulans ambulans_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.ambulans
    ADD CONSTRAINT ambulans_pkey PRIMARY KEY (no_ambulans);


--
-- TOC entry 5354 (class 2606 OID 17291)
-- Name: barang_medis barang_medis_kode_barang_key; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_kode_barang_key UNIQUE (kode_barang);


--
-- TOC entry 5356 (class 2606 OID 17289)
-- Name: barang_medis barang_medis_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_pkey PRIMARY KEY (id);


--
-- TOC entry 5305 (class 2606 OID 17097)
-- Name: berkas_pegawai berkas_pegawai_nik_key; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.berkas_pegawai
    ADD CONSTRAINT berkas_pegawai_nik_key UNIQUE (nik);


--
-- TOC entry 5307 (class 2606 OID 17095)
-- Name: berkas_pegawai berkas_pegawai_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.berkas_pegawai
    ADD CONSTRAINT berkas_pegawai_pkey PRIMARY KEY (id_pegawai);


--
-- TOC entry 5410 (class 2606 OID 50698)
-- Name: catatan_observasi_ranap_kebidanan catatan_observasi_ranap_kebidanan_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.catatan_observasi_ranap_kebidanan
    ADD CONSTRAINT catatan_observasi_ranap_kebidanan_pkey PRIMARY KEY (no_rawat, tgl_perawatan, jam_rawat);


--
-- TOC entry 5343 (class 2606 OID 17233)
-- Name: cuti cuti_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.cuti
    ADD CONSTRAINT cuti_pkey PRIMARY KEY (id);


--
-- TOC entry 5372 (class 2606 OID 17483)
-- Name: data_batch data_batch_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.data_batch
    ADD CONSTRAINT data_batch_pkey PRIMARY KEY (no_batch, id_barang_medis, no_faktur);


--
-- TOC entry 5396 (class 2606 OID 34246)
-- Name: databarang databarang_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.databarang
    ADD CONSTRAINT databarang_pkey PRIMARY KEY (kode_brng);


--
-- TOC entry 5250 (class 2606 OID 16874)
-- Name: departemen departemen_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.departemen
    ADD CONSTRAINT departemen_pkey PRIMARY KEY (id);


--
-- TOC entry 5370 (class 2606 OID 50778)
-- Name: detail_penerimaan_barang_medis detail_penerimaan_barang_medis_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.detail_penerimaan_barang_medis
    ADD CONSTRAINT detail_penerimaan_barang_medis_pkey PRIMARY KEY (id_penerimaan, id_barang_medis);


--
-- TOC entry 5412 (class 2606 OID 50757)
-- Name: resume_pasien_ranap discharge_summary_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.resume_pasien_ranap
    ADD CONSTRAINT discharge_summary_pkey PRIMARY KEY (no_rawat);


--
-- TOC entry 5374 (class 2606 OID 17758)
-- Name: dokter dokter_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.dokter
    ADD CONSTRAINT dokter_pkey PRIMARY KEY (kode_dokter);


--
-- TOC entry 5319 (class 2606 OID 17114)
-- Name: foto_pegawai foto_pegawai_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.foto_pegawai
    ADD CONSTRAINT foto_pegawai_pkey PRIMARY KEY (id_pegawai);


--
-- TOC entry 5270 (class 2606 OID 16941)
-- Name: golongan_barang_medis golongan_barang_medis_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.golongan_barang_medis
    ADD CONSTRAINT golongan_barang_medis_pkey PRIMARY KEY (id);


--
-- TOC entry 5360 (class 2606 OID 17346)
-- Name: gudang_barang gudang_barang_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.gudang_barang
    ADD CONSTRAINT gudang_barang_pkey PRIMARY KEY (id);


--
-- TOC entry 5256 (class 2606 OID 16895)
-- Name: hari hari_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.hari
    ADD CONSTRAINT hari_pkey PRIMARY KEY (id);


--
-- TOC entry 5260 (class 2606 OID 16913)
-- Name: industri_farmasi industri_farmasi_kode_key; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.industri_farmasi
    ADD CONSTRAINT industri_farmasi_kode_key UNIQUE (kode);


--
-- TOC entry 5262 (class 2606 OID 16911)
-- Name: industri_farmasi industri_farmasi_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.industri_farmasi
    ADD CONSTRAINT industri_farmasi_pkey PRIMARY KEY (id);


--
-- TOC entry 5248 (class 2606 OID 16867)
-- Name: jabatan jabatan_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.jabatan
    ADD CONSTRAINT jabatan_pkey PRIMARY KEY (id);


--
-- TOC entry 5329 (class 2606 OID 17132)
-- Name: jadwal_pegawai jadwal_pegawai_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.jadwal_pegawai
    ADD CONSTRAINT jadwal_pegawai_pkey PRIMARY KEY (id);


--
-- TOC entry 5266 (class 2606 OID 16927)
-- Name: jenis_barang_medis jenis_barang_medis_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.jenis_barang_medis
    ADD CONSTRAINT jenis_barang_medis_pkey PRIMARY KEY (id);


--
-- TOC entry 5392 (class 2606 OID 34220)
-- Name: jenis_tindakan jenis_tindakan_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.jenis_tindakan
    ADD CONSTRAINT jenis_tindakan_pkey PRIMARY KEY (kode);


--
-- TOC entry 5378 (class 2606 OID 25948)
-- Name: kamar kamar_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.kamar
    ADD CONSTRAINT kamar_pkey PRIMARY KEY (nomor_bed);


--
-- TOC entry 5268 (class 2606 OID 16934)
-- Name: kategori_barang_medis kategori_barang_medis_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.kategori_barang_medis
    ADD CONSTRAINT kategori_barang_medis_pkey PRIMARY KEY (id);


--
-- TOC entry 5362 (class 2606 OID 17363)
-- Name: mutasi_barang mutasi_barang_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.mutasi_barang
    ADD CONSTRAINT mutasi_barang_pkey PRIMARY KEY (id);


--
-- TOC entry 5352 (class 2606 OID 17258)
-- Name: notifikasi notifikasi_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.notifikasi
    ADD CONSTRAINT notifikasi_pkey PRIMARY KEY (id);


--
-- TOC entry 5358 (class 2606 OID 17330)
-- Name: opname opname_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.opname
    ADD CONSTRAINT opname_pkey PRIMARY KEY (id);


--
-- TOC entry 5246 (class 2606 OID 16860)
-- Name: organisasi organisasi_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.organisasi
    ADD CONSTRAINT organisasi_pkey PRIMARY KEY (id);


--
-- TOC entry 5408 (class 2606 OID 50687)
-- Name: pasien pasien_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.pasien
    ADD CONSTRAINT pasien_pkey PRIMARY KEY (no_rkm_medis);


--
-- TOC entry 5292 (class 2606 OID 17002)
-- Name: pegawai pegawai_id_akun_key; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_id_akun_key UNIQUE (id_akun);


--
-- TOC entry 5294 (class 2606 OID 17004)
-- Name: pegawai pegawai_nip_key; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_nip_key UNIQUE (nip);


--
-- TOC entry 5296 (class 2606 OID 17000)
-- Name: pegawai pegawai_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_pkey PRIMARY KEY (id);


--
-- TOC entry 5406 (class 2606 OID 42453)
-- Name: pemeriksaan_ranap pemeriksaan_ranap_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.pemeriksaan_ranap
    ADD CONSTRAINT pemeriksaan_ranap_pkey PRIMARY KEY (no_rawat, tgl_perawatan, jam_rawat);


--
-- TOC entry 5368 (class 2606 OID 17417)
-- Name: penerimaan_barang_medis penerimaan_barang_medis_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.penerimaan_barang_medis
    ADD CONSTRAINT penerimaan_barang_medis_pkey PRIMARY KEY (id);


--
-- TOC entry 5400 (class 2606 OID 42405)
-- Name: permintaan_resep_pulang permintaan_resep_pulang_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.permintaan_resep_pulang
    ADD CONSTRAINT permintaan_resep_pulang_pkey PRIMARY KEY (no_permintaan);


--
-- TOC entry 5404 (class 2606 OID 42444)
-- Name: permintaan_stok_obat permintaan_stok_obat_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.permintaan_stok_obat
    ADD CONSTRAINT permintaan_stok_obat_pkey PRIMARY KEY (no_permintaan);


--
-- TOC entry 5341 (class 2606 OID 17201)
-- Name: presensi presensi_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.presensi
    ADD CONSTRAINT presensi_pkey PRIMARY KEY (id);


--
-- TOC entry 5384 (class 2606 OID 25969)
-- Name: rawat_inap rawat_inap_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.rawat_inap
    ADD CONSTRAINT rawat_inap_pkey PRIMARY KEY (nomor_rawat);


--
-- TOC entry 5376 (class 2606 OID 17765)
-- Name: registrasi registrasi_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.registrasi
    ADD CONSTRAINT registrasi_pkey PRIMARY KEY (nomor_reg);


--
-- TOC entry 5416 (class 2606 OID 50800)
-- Name: resep_dokter_racikan_detail resep_dokter_racikan_d_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.resep_dokter_racikan_detail
    ADD CONSTRAINT resep_dokter_racikan_d_pkey PRIMARY KEY (no_resep, no_racik, kode_brng);


--
-- TOC entry 5414 (class 2606 OID 50798)
-- Name: resep_dokter_racikan resep_dokter_racikan_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.resep_dokter_racikan
    ADD CONSTRAINT resep_dokter_racikan_pkey PRIMARY KEY (no_resep, no_racik);


--
-- TOC entry 5398 (class 2606 OID 42393)
-- Name: resep_obat resep_obat_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.resep_obat
    ADD CONSTRAINT resep_obat_pkey PRIMARY KEY (no_resep);


--
-- TOC entry 5402 (class 2606 OID 42410)
-- Name: resep_pulang resep_pulang_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.resep_pulang
    ADD CONSTRAINT resep_pulang_pkey PRIMARY KEY (no_rawat, kode_brng, tanggal, jam);


--
-- TOC entry 5244 (class 2606 OID 16850)
-- Name: role role_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.role
    ADD CONSTRAINT role_pkey PRIMARY KEY (id);


--
-- TOC entry 5272 (class 2606 OID 16948)
-- Name: ruangan ruangan_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.ruangan
    ADD CONSTRAINT ruangan_pkey PRIMARY KEY (id);


--
-- TOC entry 5382 (class 2606 OID 25962)
-- Name: rujukan_keluar rujukan_keluar_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.rujukan_keluar
    ADD CONSTRAINT rujukan_keluar_pkey PRIMARY KEY (nomor_rawat);


--
-- TOC entry 5380 (class 2606 OID 25955)
-- Name: rujukan_masuk rujukan_masuk_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.rujukan_masuk
    ADD CONSTRAINT rujukan_masuk_pkey PRIMARY KEY (nomor_rawat);


--
-- TOC entry 5264 (class 2606 OID 16920)
-- Name: satuan_barang_medis satuan_barang_medis_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.satuan_barang_medis
    ADD CONSTRAINT satuan_barang_medis_pkey PRIMARY KEY (id);


--
-- TOC entry 5254 (class 2606 OID 16888)
-- Name: shift shift_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.shift
    ADD CONSTRAINT shift_pkey PRIMARY KEY (id);


--
-- TOC entry 5252 (class 2606 OID 16881)
-- Name: status_aktif_pegawai status_aktif_pegawai_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.status_aktif_pegawai
    ADD CONSTRAINT status_aktif_pegawai_pkey PRIMARY KEY (id);


--
-- TOC entry 5364 (class 2606 OID 17385)
-- Name: stok_keluar_barang_medis stok_keluar_barang_medis_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.stok_keluar_barang_medis
    ADD CONSTRAINT stok_keluar_barang_medis_pkey PRIMARY KEY (id);


--
-- TOC entry 5274 (class 2606 OID 16957)
-- Name: supplier_barang_medis supplier_barang_medis_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.supplier_barang_medis
    ADD CONSTRAINT supplier_barang_medis_pkey PRIMARY KEY (id);


--
-- TOC entry 5390 (class 2606 OID 34204)
-- Name: tarif_tindakan tarif_tindakan_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.tarif_tindakan
    ADD CONSTRAINT tarif_tindakan_pkey PRIMARY KEY (kode);


--
-- TOC entry 5366 (class 2606 OID 17401)
-- Name: transaksi_keluar_barang_medis transaksi_keluar_barang_medis_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.transaksi_keluar_barang_medis
    ADD CONSTRAINT transaksi_keluar_barang_medis_pkey PRIMARY KEY (id);


--
-- TOC entry 5331 (class 2606 OID 17167)
-- Name: tukar_jadwal tukar_jadwal_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.tukar_jadwal
    ADD CONSTRAINT tukar_jadwal_pkey PRIMARY KEY (id);


--
-- TOC entry 5388 (class 2606 OID 26004)
-- Name: ugd ugd_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.ugd
    ADD CONSTRAINT ugd_pkey PRIMARY KEY (nomor_reg);


--
-- TOC entry 5394 (class 2606 OID 42375)
-- Name: pemberian_obat unique_nomor_rawat_tanggal_jam; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.pemberian_obat
    ADD CONSTRAINT unique_nomor_rawat_tanggal_jam UNIQUE (nomor_rawat, tanggal_beri, jam_beri);


--
-- TOC entry 5279 (class 1259 OID 17700)
-- Name: idx_akun_deleted_at; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_akun_deleted_at ON sik.akun USING btree (deleted_at);


--
-- TOC entry 5280 (class 1259 OID 17697)
-- Name: idx_akun_foto; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_akun_foto ON sik.akun USING btree (foto);


--
-- TOC entry 5281 (class 1259 OID 17698)
-- Name: idx_akun_role; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_akun_role ON sik.akun USING btree (role);


--
-- TOC entry 5282 (class 1259 OID 17699)
-- Name: idx_akun_updated_at; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_akun_updated_at ON sik.akun USING btree (updated_at);


--
-- TOC entry 5299 (class 1259 OID 17709)
-- Name: idx_alamat_alamat; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_alamat_alamat ON sik.alamat USING btree (alamat);


--
-- TOC entry 5300 (class 1259 OID 17710)
-- Name: idx_alamat_alamat_lat; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_alamat_alamat_lat ON sik.alamat USING btree (alamat_lat);


--
-- TOC entry 5301 (class 1259 OID 17711)
-- Name: idx_alamat_alamat_lon; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_alamat_alamat_lon ON sik.alamat USING btree (alamat_lon);


--
-- TOC entry 5302 (class 1259 OID 17713)
-- Name: idx_alamat_deleted_at; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_alamat_deleted_at ON sik.alamat USING btree (deleted_at);


--
-- TOC entry 5303 (class 1259 OID 17712)
-- Name: idx_alamat_updated_at; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_alamat_updated_at ON sik.alamat USING btree (updated_at);


--
-- TOC entry 5308 (class 1259 OID 17714)
-- Name: idx_berkas_pegawai_agama; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_berkas_pegawai_agama ON sik.berkas_pegawai USING btree (agama);


--
-- TOC entry 5309 (class 1259 OID 17719)
-- Name: idx_berkas_pegawai_bpjs; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_berkas_pegawai_bpjs ON sik.berkas_pegawai USING btree (bpjs);


--
-- TOC entry 5310 (class 1259 OID 17720)
-- Name: idx_berkas_pegawai_ijazah; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_berkas_pegawai_ijazah ON sik.berkas_pegawai USING btree (ijazah);


--
-- TOC entry 5311 (class 1259 OID 17717)
-- Name: idx_berkas_pegawai_kk; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_berkas_pegawai_kk ON sik.berkas_pegawai USING btree (kk);


--
-- TOC entry 5312 (class 1259 OID 17716)
-- Name: idx_berkas_pegawai_ktp; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_berkas_pegawai_ktp ON sik.berkas_pegawai USING btree (ktp);


--
-- TOC entry 5313 (class 1259 OID 17718)
-- Name: idx_berkas_pegawai_npwp; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_berkas_pegawai_npwp ON sik.berkas_pegawai USING btree (npwp);


--
-- TOC entry 5314 (class 1259 OID 17715)
-- Name: idx_berkas_pegawai_pendidikan; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_berkas_pegawai_pendidikan ON sik.berkas_pegawai USING btree (pendidikan);


--
-- TOC entry 5315 (class 1259 OID 17723)
-- Name: idx_berkas_pegawai_serkom; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_berkas_pegawai_serkom ON sik.berkas_pegawai USING btree (serkom);


--
-- TOC entry 5316 (class 1259 OID 17721)
-- Name: idx_berkas_pegawai_skck; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_berkas_pegawai_skck ON sik.berkas_pegawai USING btree (skck);


--
-- TOC entry 5317 (class 1259 OID 17722)
-- Name: idx_berkas_pegawai_str; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_berkas_pegawai_str ON sik.berkas_pegawai USING btree (str);


--
-- TOC entry 5344 (class 1259 OID 17746)
-- Name: idx_cuti_deleted_at; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_cuti_deleted_at ON sik.cuti USING btree (deleted_at);


--
-- TOC entry 5345 (class 1259 OID 17743)
-- Name: idx_cuti_id_alasan_cuti; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_cuti_id_alasan_cuti ON sik.cuti USING btree (id_alasan_cuti);


--
-- TOC entry 5346 (class 1259 OID 17740)
-- Name: idx_cuti_id_pegawai; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_cuti_id_pegawai ON sik.cuti USING btree (id_pegawai);


--
-- TOC entry 5347 (class 1259 OID 17744)
-- Name: idx_cuti_status; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_cuti_status ON sik.cuti USING btree (status);


--
-- TOC entry 5348 (class 1259 OID 17741)
-- Name: idx_cuti_tanggal_mulai; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_cuti_tanggal_mulai ON sik.cuti USING btree (tanggal_mulai);


--
-- TOC entry 5349 (class 1259 OID 17742)
-- Name: idx_cuti_tanggal_selesai; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_cuti_tanggal_selesai ON sik.cuti USING btree (tanggal_selesai);


--
-- TOC entry 5350 (class 1259 OID 17745)
-- Name: idx_cuti_updated_at; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_cuti_updated_at ON sik.cuti USING btree (updated_at);


--
-- TOC entry 5320 (class 1259 OID 17726)
-- Name: idx_foto_pegawai_deleted_at; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_foto_pegawai_deleted_at ON sik.foto_pegawai USING btree (deleted_at);


--
-- TOC entry 5321 (class 1259 OID 17724)
-- Name: idx_foto_pegawai_foto; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_foto_pegawai_foto ON sik.foto_pegawai USING btree (foto);


--
-- TOC entry 5322 (class 1259 OID 17725)
-- Name: idx_foto_pegawai_updated_at; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_foto_pegawai_updated_at ON sik.foto_pegawai USING btree (updated_at);


--
-- TOC entry 5323 (class 1259 OID 17731)
-- Name: idx_jadwal_pegawai_deleted_at; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_jadwal_pegawai_deleted_at ON sik.jadwal_pegawai USING btree (deleted_at);


--
-- TOC entry 5324 (class 1259 OID 17729)
-- Name: idx_jadwal_pegawai_id_hari; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_jadwal_pegawai_id_hari ON sik.jadwal_pegawai USING btree (id_hari);


--
-- TOC entry 5325 (class 1259 OID 17727)
-- Name: idx_jadwal_pegawai_id_pegawai; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_jadwal_pegawai_id_pegawai ON sik.jadwal_pegawai USING btree (id_pegawai);


--
-- TOC entry 5326 (class 1259 OID 17728)
-- Name: idx_jadwal_pegawai_id_shift; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_jadwal_pegawai_id_shift ON sik.jadwal_pegawai USING btree (id_shift);


--
-- TOC entry 5327 (class 1259 OID 17730)
-- Name: idx_jadwal_pegawai_updated_at; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_jadwal_pegawai_updated_at ON sik.jadwal_pegawai USING btree (updated_at);


--
-- TOC entry 5283 (class 1259 OID 17708)
-- Name: idx_pegawai_deleted_at; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_pegawai_deleted_at ON sik.pegawai USING btree (deleted_at);


--
-- TOC entry 5284 (class 1259 OID 17703)
-- Name: idx_pegawai_id_departemen; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_pegawai_id_departemen ON sik.pegawai USING btree (id_departemen);


--
-- TOC entry 5285 (class 1259 OID 17702)
-- Name: idx_pegawai_id_jabatan; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_pegawai_id_jabatan ON sik.pegawai USING btree (id_jabatan);


--
-- TOC entry 5286 (class 1259 OID 17704)
-- Name: idx_pegawai_id_status_aktif; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_pegawai_id_status_aktif ON sik.pegawai USING btree (id_status_aktif);


--
-- TOC entry 5287 (class 1259 OID 17701)
-- Name: idx_pegawai_jenis_kelamin; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_pegawai_jenis_kelamin ON sik.pegawai USING btree (jenis_kelamin);


--
-- TOC entry 5288 (class 1259 OID 17705)
-- Name: idx_pegawai_jenis_pegawai; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_pegawai_jenis_pegawai ON sik.pegawai USING btree (jenis_pegawai);


--
-- TOC entry 5289 (class 1259 OID 17706)
-- Name: idx_pegawai_tanggal_masuk; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_pegawai_tanggal_masuk ON sik.pegawai USING btree (tanggal_masuk);


--
-- TOC entry 5290 (class 1259 OID 17707)
-- Name: idx_pegawai_updated_at; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_pegawai_updated_at ON sik.pegawai USING btree (updated_at);


--
-- TOC entry 5332 (class 1259 OID 17739)
-- Name: idx_presensi_deleted_at; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_presensi_deleted_at ON sik.presensi USING btree (deleted_at);


--
-- TOC entry 5333 (class 1259 OID 17733)
-- Name: idx_presensi_id_jadwal_pegawai; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_presensi_id_jadwal_pegawai ON sik.presensi USING btree (id_jadwal_pegawai);


--
-- TOC entry 5334 (class 1259 OID 17732)
-- Name: idx_presensi_id_pegawai; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_presensi_id_pegawai ON sik.presensi USING btree (id_pegawai);


--
-- TOC entry 5335 (class 1259 OID 17735)
-- Name: idx_presensi_jam_masuk; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_presensi_jam_masuk ON sik.presensi USING btree (jam_masuk);


--
-- TOC entry 5336 (class 1259 OID 17736)
-- Name: idx_presensi_jam_pulang; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_presensi_jam_pulang ON sik.presensi USING btree (jam_pulang);


--
-- TOC entry 5337 (class 1259 OID 17737)
-- Name: idx_presensi_keterangan; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_presensi_keterangan ON sik.presensi USING btree (keterangan);


--
-- TOC entry 5338 (class 1259 OID 17734)
-- Name: idx_presensi_tanggal; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_presensi_tanggal ON sik.presensi USING btree (tanggal);


--
-- TOC entry 5339 (class 1259 OID 17738)
-- Name: idx_presensi_updated_at; Type: INDEX; Schema: sik; Owner: postgres
--

CREATE INDEX idx_presensi_updated_at ON sik.presensi USING btree (updated_at);


--
-- TOC entry 5466 (class 2620 OID 17544)
-- Name: pegawai init_jadwal_pegawai; Type: TRIGGER; Schema: sik; Owner: postgres
--

CREATE TRIGGER init_jadwal_pegawai AFTER INSERT ON sik.pegawai FOR EACH ROW EXECUTE FUNCTION sik.trigger_init_jadwal_pegawai();


--
-- TOC entry 5467 (class 2620 OID 17545)
-- Name: pegawai update_jadwal_pegawai_on_delete; Type: TRIGGER; Schema: sik; Owner: postgres
--

CREATE TRIGGER update_jadwal_pegawai_on_delete BEFORE UPDATE ON sik.pegawai FOR EACH ROW WHEN (((old.deleted_at IS NULL) AND (new.deleted_at IS NOT NULL))) EXECUTE FUNCTION sik.trigger_update_jadwal_pegawai_on_delete();


--
-- TOC entry 5417 (class 2606 OID 16970)
-- Name: akun akun_role_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.akun
    ADD CONSTRAINT akun_role_fkey FOREIGN KEY (role) REFERENCES ref.role(id);


--
-- TOC entry 5423 (class 2606 OID 17041)
-- Name: alamat alamat_id_akun_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.alamat
    ADD CONSTRAINT alamat_id_akun_fkey FOREIGN KEY (id_akun) REFERENCES sik.akun(id);


--
-- TOC entry 5424 (class 2606 OID 17046)
-- Name: alamat alamat_updater_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.alamat
    ADD CONSTRAINT alamat_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun(id);


--
-- TOC entry 5446 (class 2606 OID 17317)
-- Name: barang_medis barang_medis_id_golongan_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_id_golongan_fkey FOREIGN KEY (id_golongan) REFERENCES ref.golongan_barang_medis(id);


--
-- TOC entry 5447 (class 2606 OID 17292)
-- Name: barang_medis barang_medis_id_industri_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_id_industri_fkey FOREIGN KEY (id_industri) REFERENCES ref.industri_farmasi(id);


--
-- TOC entry 5448 (class 2606 OID 17307)
-- Name: barang_medis barang_medis_id_jenis_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_id_jenis_fkey FOREIGN KEY (id_jenis) REFERENCES ref.jenis_barang_medis(id);


--
-- TOC entry 5449 (class 2606 OID 17312)
-- Name: barang_medis barang_medis_id_kategori_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_id_kategori_fkey FOREIGN KEY (id_kategori) REFERENCES ref.kategori_barang_medis(id);


--
-- TOC entry 5450 (class 2606 OID 17297)
-- Name: barang_medis barang_medis_id_satbesar_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_id_satbesar_fkey FOREIGN KEY (id_satbesar) REFERENCES ref.satuan_barang_medis(id);


--
-- TOC entry 5451 (class 2606 OID 17302)
-- Name: barang_medis barang_medis_id_satuan_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_id_satuan_fkey FOREIGN KEY (id_satuan) REFERENCES ref.satuan_barang_medis(id);


--
-- TOC entry 5425 (class 2606 OID 17098)
-- Name: berkas_pegawai berkas_pegawai_id_pegawai_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.berkas_pegawai
    ADD CONSTRAINT berkas_pegawai_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai(id);


--
-- TOC entry 5426 (class 2606 OID 17103)
-- Name: berkas_pegawai berkas_pegawai_updater_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.berkas_pegawai
    ADD CONSTRAINT berkas_pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun(id);


--
-- TOC entry 5441 (class 2606 OID 17239)
-- Name: cuti cuti_id_alasan_cuti_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.cuti
    ADD CONSTRAINT cuti_id_alasan_cuti_fkey FOREIGN KEY (id_alasan_cuti) REFERENCES ref.alasan_cuti(id);


--
-- TOC entry 5442 (class 2606 OID 17234)
-- Name: cuti cuti_id_pegawai_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.cuti
    ADD CONSTRAINT cuti_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai(id);


--
-- TOC entry 5443 (class 2606 OID 17244)
-- Name: cuti cuti_updater_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.cuti
    ADD CONSTRAINT cuti_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun(id);


--
-- TOC entry 5464 (class 2606 OID 17484)
-- Name: data_batch data_batch_id_barang_medis_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.data_batch
    ADD CONSTRAINT data_batch_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis(id);


--
-- TOC entry 5465 (class 2606 OID 17766)
-- Name: registrasi fk_kode_dokter; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.registrasi
    ADD CONSTRAINT fk_kode_dokter FOREIGN KEY (kode_dokter) REFERENCES sik.dokter(kode_dokter);


--
-- TOC entry 5427 (class 2606 OID 17115)
-- Name: foto_pegawai foto_pegawai_id_pegawai_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.foto_pegawai
    ADD CONSTRAINT foto_pegawai_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai(id);


--
-- TOC entry 5428 (class 2606 OID 17120)
-- Name: foto_pegawai foto_pegawai_updater_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.foto_pegawai
    ADD CONSTRAINT foto_pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun(id);


--
-- TOC entry 5454 (class 2606 OID 17352)
-- Name: gudang_barang gudang_barang_id_ruangan_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.gudang_barang
    ADD CONSTRAINT gudang_barang_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan(id);


--
-- TOC entry 5429 (class 2606 OID 17138)
-- Name: jadwal_pegawai jadwal_pegawai_id_hari_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.jadwal_pegawai
    ADD CONSTRAINT jadwal_pegawai_id_hari_fkey FOREIGN KEY (id_hari) REFERENCES ref.hari(id);


--
-- TOC entry 5430 (class 2606 OID 17133)
-- Name: jadwal_pegawai jadwal_pegawai_id_pegawai_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.jadwal_pegawai
    ADD CONSTRAINT jadwal_pegawai_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai(id);


--
-- TOC entry 5431 (class 2606 OID 17143)
-- Name: jadwal_pegawai jadwal_pegawai_id_shift_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.jadwal_pegawai
    ADD CONSTRAINT jadwal_pegawai_id_shift_fkey FOREIGN KEY (id_shift) REFERENCES ref.shift(id);


--
-- TOC entry 5432 (class 2606 OID 17148)
-- Name: jadwal_pegawai jadwal_pegawai_updater_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.jadwal_pegawai
    ADD CONSTRAINT jadwal_pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun(id);


--
-- TOC entry 5455 (class 2606 OID 17364)
-- Name: mutasi_barang mutasi_barang_id_barang_medis_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.mutasi_barang
    ADD CONSTRAINT mutasi_barang_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis(id);


--
-- TOC entry 5456 (class 2606 OID 17369)
-- Name: mutasi_barang mutasi_barang_id_ruangandari_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.mutasi_barang
    ADD CONSTRAINT mutasi_barang_id_ruangandari_fkey FOREIGN KEY (id_ruangandari) REFERENCES ref.ruangan(id);


--
-- TOC entry 5457 (class 2606 OID 17374)
-- Name: mutasi_barang mutasi_barang_id_ruanganke_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.mutasi_barang
    ADD CONSTRAINT mutasi_barang_id_ruanganke_fkey FOREIGN KEY (id_ruanganke) REFERENCES ref.ruangan(id);


--
-- TOC entry 5444 (class 2606 OID 17264)
-- Name: notifikasi notifikasi_recipient_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.notifikasi
    ADD CONSTRAINT notifikasi_recipient_fkey FOREIGN KEY (recipient) REFERENCES sik.akun(id);


--
-- TOC entry 5445 (class 2606 OID 17259)
-- Name: notifikasi notifikasi_sender_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.notifikasi
    ADD CONSTRAINT notifikasi_sender_fkey FOREIGN KEY (sender) REFERENCES sik.akun(id);


--
-- TOC entry 5452 (class 2606 OID 17331)
-- Name: opname opname_id_barang_medis_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.opname
    ADD CONSTRAINT opname_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis(id);


--
-- TOC entry 5453 (class 2606 OID 17336)
-- Name: opname opname_id_ruangan_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.opname
    ADD CONSTRAINT opname_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan(id);


--
-- TOC entry 5418 (class 2606 OID 17005)
-- Name: pegawai pegawai_id_akun_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_id_akun_fkey FOREIGN KEY (id_akun) REFERENCES sik.akun(id);


--
-- TOC entry 5419 (class 2606 OID 17015)
-- Name: pegawai pegawai_id_departemen_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_id_departemen_fkey FOREIGN KEY (id_departemen) REFERENCES ref.departemen(id);


--
-- TOC entry 5420 (class 2606 OID 17010)
-- Name: pegawai pegawai_id_jabatan_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_id_jabatan_fkey FOREIGN KEY (id_jabatan) REFERENCES ref.jabatan(id);


--
-- TOC entry 5421 (class 2606 OID 17020)
-- Name: pegawai pegawai_id_status_aktif_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_id_status_aktif_fkey FOREIGN KEY (id_status_aktif) REFERENCES ref.status_aktif_pegawai(id);


--
-- TOC entry 5422 (class 2606 OID 17025)
-- Name: pegawai pegawai_updater_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun(id);


--
-- TOC entry 5462 (class 2606 OID 17418)
-- Name: penerimaan_barang_medis penerimaan_barang_medis_id_pegawai_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.penerimaan_barang_medis
    ADD CONSTRAINT penerimaan_barang_medis_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai(id);


--
-- TOC entry 5463 (class 2606 OID 17423)
-- Name: penerimaan_barang_medis penerimaan_barang_medis_id_ruangan_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.penerimaan_barang_medis
    ADD CONSTRAINT penerimaan_barang_medis_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan(id);


--
-- TOC entry 5438 (class 2606 OID 17207)
-- Name: presensi presensi_id_jadwal_pegawai_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.presensi
    ADD CONSTRAINT presensi_id_jadwal_pegawai_fkey FOREIGN KEY (id_jadwal_pegawai) REFERENCES sik.jadwal_pegawai(id);


--
-- TOC entry 5439 (class 2606 OID 17202)
-- Name: presensi presensi_id_pegawai_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.presensi
    ADD CONSTRAINT presensi_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai(id);


--
-- TOC entry 5440 (class 2606 OID 17212)
-- Name: presensi presensi_updater_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.presensi
    ADD CONSTRAINT presensi_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun(id);


--
-- TOC entry 5458 (class 2606 OID 17386)
-- Name: stok_keluar_barang_medis stok_keluar_barang_medis_id_pegawai_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.stok_keluar_barang_medis
    ADD CONSTRAINT stok_keluar_barang_medis_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai(id);


--
-- TOC entry 5459 (class 2606 OID 17391)
-- Name: stok_keluar_barang_medis stok_keluar_barang_medis_id_ruangan_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.stok_keluar_barang_medis
    ADD CONSTRAINT stok_keluar_barang_medis_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan(id);


--
-- TOC entry 5460 (class 2606 OID 17407)
-- Name: transaksi_keluar_barang_medis transaksi_keluar_barang_medis_id_barang_medis_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.transaksi_keluar_barang_medis
    ADD CONSTRAINT transaksi_keluar_barang_medis_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis(id);


--
-- TOC entry 5461 (class 2606 OID 17402)
-- Name: transaksi_keluar_barang_medis transaksi_keluar_barang_medis_id_stok_keluar_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.transaksi_keluar_barang_medis
    ADD CONSTRAINT transaksi_keluar_barang_medis_id_stok_keluar_fkey FOREIGN KEY (id_stok_keluar) REFERENCES sik.stok_keluar_barang_medis(id);


--
-- TOC entry 5433 (class 2606 OID 17178)
-- Name: tukar_jadwal tukar_jadwal_id_hari_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.tukar_jadwal
    ADD CONSTRAINT tukar_jadwal_id_hari_fkey FOREIGN KEY (id_hari) REFERENCES ref.hari(id);


--
-- TOC entry 5434 (class 2606 OID 17173)
-- Name: tukar_jadwal tukar_jadwal_id_recipient_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.tukar_jadwal
    ADD CONSTRAINT tukar_jadwal_id_recipient_fkey FOREIGN KEY (id_recipient) REFERENCES sik.pegawai(id);


--
-- TOC entry 5435 (class 2606 OID 17168)
-- Name: tukar_jadwal tukar_jadwal_id_sender_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.tukar_jadwal
    ADD CONSTRAINT tukar_jadwal_id_sender_fkey FOREIGN KEY (id_sender) REFERENCES sik.pegawai(id);


--
-- TOC entry 5436 (class 2606 OID 17188)
-- Name: tukar_jadwal tukar_jadwal_id_shift_recipient_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.tukar_jadwal
    ADD CONSTRAINT tukar_jadwal_id_shift_recipient_fkey FOREIGN KEY (id_shift_recipient) REFERENCES ref.shift(id);


--
-- TOC entry 5437 (class 2606 OID 17183)
-- Name: tukar_jadwal tukar_jadwal_id_shift_sender_fkey; Type: FK CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.tukar_jadwal
    ADD CONSTRAINT tukar_jadwal_id_shift_sender_fkey FOREIGN KEY (id_shift_sender) REFERENCES ref.shift(id);


-- Completed on 2025-06-02 11:41:13

--
-- PostgreSQL database dump complete
--

