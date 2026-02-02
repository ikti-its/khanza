--
-- PostgreSQL database dump
--

-- Dumped from database version 17.5
-- Dumped by pg_dump version 17.5

-- Started on 2025-08-20 14:54:57

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 309 (class 1259 OID 28886)
-- Name: pasien_meninggal_structure; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.pasien_meninggal_structure (
    no_rkm_medis character varying(15) NOT NULL,
    nm_pasien character varying(40),
    jk character varying(12),
    tgl_lahir date,
    umur character varying(30),
    gol_darah character varying(2),
    stts_nikah character varying(15),
    agama character varying(12),
    tanggal date,
    jam time without time zone,
    icdx character varying(20),
    icdx_antara1 character varying(20),
    icdx_antara2 character varying(20),
    icdx_langsung character varying(20),
    keterangan text,
    nama_dokter character varying(50),
    kode_dokter character varying(20)
);


ALTER TABLE sik.pasien_meninggal_structure OWNER TO postgres;

--
-- TOC entry 6815 (class 0 OID 28886)
-- Dependencies: 309
-- Data for Name: pasien_meninggal_structure; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.pasien_meninggal_structure (no_rkm_medis, nm_pasien, jk, tgl_lahir, umur, gol_darah, stts_nikah, agama, tanggal, jam, icdx, icdx_antara1, icdx_antara2, icdx_langsung, keterangan, nama_dokter, kode_dokter) FROM stdin;
001234	Budi Santoso	L	1970-05-12	53 Tahun	O	Menikah	Islam	2025-07-03	13:45:00	I21.9	I20.0	I50.1	I46.1	Pasien meninggal karena gagal jantung setelah serangan jantung.	dr. Andi Subagio	D001
001999	Ani Wijaya	P	1980-10-15	43 Tahun	B	Menikah	Islam	2025-07-05	14:30:00	C34.1	J18.9	I50.0	R99	Meninggal karena komplikasi infeksi paru-paru.	dr. Budi Hermanto	D002
\.


--
-- TOC entry 6475 (class 2606 OID 28892)
-- Name: pasien_meninggal_structure pasien_meninggal_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.pasien_meninggal_structure
    ADD CONSTRAINT pasien_meninggal_pkey PRIMARY KEY (no_rkm_medis);


-- Completed on 2025-08-20 14:54:58

--
-- PostgreSQL database dump complete
--

