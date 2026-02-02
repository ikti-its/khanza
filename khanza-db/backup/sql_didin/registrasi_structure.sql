--
-- PostgreSQL database dump
--

-- Dumped from database version 17.5
-- Dumped by pg_dump version 17.5

-- Started on 2025-08-20 14:53:34

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
-- TOC entry 313 (class 1259 OID 30511)
-- Name: registrasi_structure; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.registrasi_structure (
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
    nomor_bed character varying(20),
    pekerjaanpj character varying(35),
    kelurahanpj character varying(15),
    kecamatanpj character varying(15),
    kabupatenpj character varying(15),
    propinsipj character varying(15),
    notelp_pj character varying(40),
    no_asuransi character varying(25)
);


ALTER TABLE sik.registrasi_structure OWNER TO postgres;

--
-- TOC entry 6816 (class 0 OID 30511)
-- Dependencies: 313
-- Data for Name: registrasi_structure; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.registrasi_structure (nomor_reg, nomor_rawat, tanggal, jam, kode_dokter, nama_dokter, nomor_rm, nama_pasien, jenis_kelamin, umur, poliklinik, jenis_bayar, penanggung_jawab, alamat_pj, hubungan_pj, biaya_registrasi, status_registrasi, no_telepon, status_rawat, status_poli, status_bayar, status_kamar, nomor_bed, pekerjaanpj, kelurahanpj, kecamatanpj, kabupatenpj, propinsipj, notelp_pj, no_asuransi) FROM stdin;
REG202507147677	202507146641	2025-07-14	11:21:15	D1001	Dr. Ahmad Fauzi	RM000002	I Putu Adhitya Pratama Mangku Purnama	L	22	Poli Umum	BPJS	I Putu Adhitya Pratama Mangku Purnama	JL. Gebang Wetan 5b	DIRI SENDIRI	0	Lama	083192925747	Belum	Baru	Belum Bayar		\N	Mahasiswa	Gebang Putih	Sukolilo	Surabaya	Jawa Timur	083192925747	-
REG202507140503	202507140039	2025-07-14	11:22:22	D006	Dr. Farhan	RM000005	Muhammad Fatchu Rozaq	L	21	Poli Umum	BPJS	Rifqi Naufal Luthfyardy	Wisma Medokan, G/13	LAIN-LAIN	0	Lama	0895385132323	Belum	Baru	Belum Bayar		\N	Mahasiswa	Medokan Ayu	Rungkut	Surabaya	Jawa Timur	082764536475	-
REG202507143351	202507143148	2025-07-14	11:20:47	D006	Dr. Farhan	RM000001	Fitria Nur Azzahra	P	26	Poli Umum	BPJS	Ahmad Zulfikar	Jl. Kenanga Raya No.12, Surabaya	SUAMI	0	Lama	082145673829	Belum	Baru	Belum Bayar		\N	Dosen	Wonokromo	Wonokromo	Surabaya	Jawa Timur	087664758475	-
REG202507143821	202507145994	2025-07-14	11:23:32	D1001	Dr. Ahmad Fauzi	RM000008	Rayyan Maulana	L	25	Poli Umum	BPJS	Nanik Partiningrum	JL. Ruby No.5 PPS Gresik	IBU	0	Lama	086526746354	Belum	Baru	Belum Bayar		\N	Ibu Rumah Tangga	Suci	Manyar	Gresik	Jawa Timur	082374657465	-
REG202507144262	202507149548	2025-07-14	11:22:04	D1001	Dr. Ahmad Fauzi	RM000004	Zizi Wulandari	P	29	Poli Umum	BPJS	Maman Saptono	Gang Joyoboyo No. 799, Lamongan, Jawa Timur 80368	SUAMI	0	Lama	08788860561	Belum	Baru	Belum Bayar		\N	Karyawan Swasta	Paciran	Sukorejo	Lamongan	Jawa Timur	083764756453	-
REG202507147930	202507140838	2025-07-14	11:22:41	D006	Dr. Farhan	RM000006	Faris Santoso	L	22	Poli Umum	BPJS	Ade Maheswara	Jl. M.H Thamrin, Kel. Pare, Kabupaten Kediri, Jawa Timur	SAUDARA	0	Lama	08647855645	Belum	Baru	Belum Bayar		\N	Pedagang	Pare	Kediri	Kediri	Jawa Timur	082746354019	-
REG202507149203	202507144162	2025-07-14	11:21:42	D006	Dr. Farhan	RM000003	Rifqi Naufal Luthfyardy	L	22	Poli Umum	BPJS	Edi Hartono	Wisma Medokan, G/13	AYAH	0	Lama	087857097780	Belum	Baru	Belum Bayar		\N	Pengusaha	Medokan Ayu	Rungkut	Surabaya	Jawa Timur	082647163542	-
REG202507149717	202507143783	2025-07-14	11:23:09	D006	Dr. Farhan	RM000007	Sri Wahyuningsih	P	50	Poli Umum	BPJS	Rayyan Pangestu	Gg. Monginsidi, Kel. Manyar, Kabupaten Gresik, Jawa Timur	ANAK	0	Lama	085681331532	Belum	Baru	Belum Bayar		\N	Karyawan Swasta	Sidomukti	Manyar	Gresik	Jawa Timur	082746354675	-
\.


--
-- TOC entry 6476 (class 2606 OID 30518)
-- Name: registrasi_structure registrasi_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.registrasi_structure
    ADD CONSTRAINT registrasi_pkey PRIMARY KEY (nomor_reg);


-- Completed on 2025-08-20 14:53:34

--
-- PostgreSQL database dump complete
--

