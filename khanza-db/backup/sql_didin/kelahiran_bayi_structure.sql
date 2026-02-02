--
-- PostgreSQL database dump
--

-- Dumped from database version 17.5
-- Dumped by pg_dump version 17.5

-- Started on 2025-08-20 14:54:19

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
-- TOC entry 316 (class 1259 OID 43897)
-- Name: kelahiran_bayi_structure; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.kelahiran_bayi_structure (
    no_rkm_medis character varying(15) NOT NULL,
    nm_pasien character varying(40),
    jk character varying(12),
    tmp_lahir character varying(15),
    tgl_lahir date,
    jam time without time zone,
    umur character varying(30),
    tgl_daftar date,
    nm_ibu character varying(40),
    umur_ibu character varying(30),
    nm_ayah character varying(40),
    umur_ayah character varying(30),
    alamat text,
    bb integer,
    pb numeric(5,2),
    proses_lahir character varying(100),
    kelahiran_ke integer,
    keterangan text,
    diagnosa character varying(100),
    penyulit_kehamilan character varying(100),
    ketuban character varying(30),
    lk_perut numeric(5,2),
    lk_kepala numeric(5,2),
    lk_dada numeric(5,2),
    penolong character varying(30),
    no_skl character varying(30),
    gravida integer,
    para integer,
    abortus integer,
    f1 integer,
    u1 integer,
    t1 integer,
    r1 integer,
    w1 integer,
    n1 integer,
    f5 integer,
    u5 integer,
    t5 integer,
    r5 integer,
    w5 integer,
    n5 integer,
    f10 integer,
    u10 integer,
    t10 integer,
    r10 integer,
    w10 integer,
    n10 integer,
    resusitas character varying(100),
    obat text,
    mikasi character varying(100),
    mikonium character varying(100),
    no_rm_ibu character varying(15)
);


ALTER TABLE sik.kelahiran_bayi_structure OWNER TO postgres;

--
-- TOC entry 6815 (class 0 OID 43897)
-- Dependencies: 316
-- Data for Name: kelahiran_bayi_structure; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.kelahiran_bayi_structure (no_rkm_medis, nm_pasien, jk, tmp_lahir, tgl_lahir, jam, umur, tgl_daftar, nm_ibu, umur_ibu, nm_ayah, umur_ayah, alamat, bb, pb, proses_lahir, kelahiran_ke, keterangan, diagnosa, penyulit_kehamilan, ketuban, lk_perut, lk_kepala, lk_dada, penolong, no_skl, gravida, para, abortus, f1, u1, t1, r1, w1, n1, f5, u5, t5, r5, w5, n5, f10, u10, t10, r10, w10, n10, resusitas, obat, mikasi, mikonium, no_rm_ibu) FROM stdin;
\.


--
-- TOC entry 6475 (class 2606 OID 43903)
-- Name: kelahiran_bayi_structure kelahiran_bayi_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.kelahiran_bayi_structure
    ADD CONSTRAINT kelahiran_bayi_pkey PRIMARY KEY (no_rkm_medis);


-- Completed on 2025-08-20 14:54:20

--
-- PostgreSQL database dump complete
--

