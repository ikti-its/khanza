--
-- PostgreSQL database dump
--

-- Dumped from database version 17.5
-- Dumped by pg_dump version 17.5

-- Started on 2025-08-20 14:53:10

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
-- TOC entry 314 (class 1259 OID 30520)
-- Name: pasien_structure; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.pasien_structure (
    no_rkm_medis character varying(15) NOT NULL,
    nm_pasien character varying(40),
    no_ktp character varying(20),
    jk character varying(12),
    tmp_lahir character varying(15),
    tgl_lahir date,
    nm_ibu character varying(40),
    alamat character varying(200),
    gol_darah character varying(2),
    pekerjaan character varying(40),
    stts_nikah character varying(15),
    agama character varying(12),
    tgl_daftar date,
    no_tlp character varying(40),
    umur character varying(30),
    pnd character varying(10),
    asuransi character varying(30),
    no_asuransi character varying(25),
    suku_bangsa character varying(30),
    bahasa_pasien character varying(30),
    perusahaan_pasien character varying(30),
    nip character varying(30),
    email character varying(50),
    cacat_fisik character varying(30),
    kd_kel character varying(15),
    kd_kec character varying(15),
    kd_kab character varying(15),
    kd_prop character varying(15),
    stts_pasien character varying(15)
);


ALTER TABLE sik.pasien_structure OWNER TO postgres;

--
-- TOC entry 6815 (class 0 OID 30520)
-- Dependencies: 314
-- Data for Name: pasien_structure; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.pasien_structure (no_rkm_medis, nm_pasien, no_ktp, jk, tmp_lahir, tgl_lahir, nm_ibu, alamat, gol_darah, pekerjaan, stts_nikah, agama, tgl_daftar, no_tlp, umur, pnd, asuransi, no_asuransi, suku_bangsa, bahasa_pasien, perusahaan_pasien, nip, email, cacat_fisik, kd_kel, kd_kec, kd_kab, kd_prop, stts_pasien) FROM stdin;
RM000001	Fitria Nur Azzahra	3512051806990003	P	Surabaya	1999-06-18	Sulastri	Jl. Kenanga Raya No.12, Surabaya	A	Pegawai Negeri Sipil	MENIKAH	ISLAM	2025-07-13	082145673829	26 Th 0 Bl 25 Hr	S2	UMUM		Jawa	Indonesia			fitria.azzahra99@gmail.com	Tidak Ada	Wonokromo	Wonokromo	Surabaya	Jawa Timur	Aktif
RM000002	I Putu Adhitya Pratama Mangku Purnama	5108061602030006	L	Singaraja	2003-02-16	Evi Tri Kustinawati	JL. Gebang Wetan 5b	O	Mahasiswa	BELUM MENIKAH	HINDU	2025-07-14	083192925747	22 Th 4 Bl 28 Hr	S1	UMUM		Bali	Indonesia	I003	5026211037	portodit@gmail.com	Tidak Ada	Gebang Putih	Sukolilo	Surabaya	Jawa Timur	Aktif
RM000003	Rifqi Naufal Luthfyardy	3578032804030003	L	Surabaya	2003-04-28	Ningsih	Wisma Medokan, G/13	A	Mahasiswa	BELUM MENIKAH	ISLAM	2025-07-14	087857097780	22 Th 2 Bl 16 Hr	S1	UMUM		Jawa	Indonesia	I003	5026211189	fyarrifqi5@gmail.com	Tidak Ada	Medokan Ayu	Rungkut	Surabaya	Jawa Timur	Aktif
RM000004	Zizi Wulandari	6485946319523453	P	Mojokerto	1995-11-25	Bahuwirya Nasyidah	 Gang Joyoboyo No. 799, Lamongan, Jawa Timur 80368	B	Notaris	MENIKAH	ISLAM	2025-07-14	08788860561	29 Th 7 Bl 19 Hr	S1	BPJS	44574832397951	Jawa	Indonesia	I001	19931003092	warsariyanti@gmail.com	Tidak Ada	Paciran	Sukorejo	Lamongan	Jawa TImur	Aktif
RM000005	Muhammad Fatchu Rozaq	3525160611030002	L	Gresik	2003-11-05	Ernita	Perum Banjarsari Permai Blok C	A	Mahasiswa	BELUM MENIKAH	ISLAM	2025-07-14	0895385132323	21 Th 8 Bl 9 Hr	S1	UMUM		Jawa	Indonesia			fatchu2003@gmail.com	Tidak Ada	Banjarsari	Manyar	Gresik	Jawa Timur	Aktif
RM000006	Faris Santoso	2406888874359694	L	Kediri	2003-06-29	Yani Wasita	Jl. M.H Thamrin, Kel. Pare, Kabupaten Kediri, Jawa Timur	AB	Tidak Bekerja	BELUM MENIKAH	ISLAM	2025-07-14	08647855645	22 Th 0 Bl 15 Hr	SMA	BPJS	57234694305207	Jawa	Indonesia			santosofaris25@gmail.com	Tidak Ada	Pare	Kediri	Kediri	Jawa Timur	Aktif
RM000007	Sri Wahyuningsih	8886210761972132	P	Malang	1975-02-16	Sarinah	Gg. Monginsidi, Kel. Manyar, Kabupaten Gresik, Jawa Timur	B	Ibu Rumah Tangga	MENIKAH	ISLAM	2025-07-14	085681331532	50 Th 4 Bl 28 Hr	D3	BPJS	23895314422088	Jawa	Indonesia			wahyuningsih75@gmail.com	Tidak Ada	Sidomukti	Manyar	Gresik	Jawa Timur	Aktif
RM000008	Rayyan Maulana	9986806623215593	L	Surabaya	2000-02-11	Nanik Partiningrum	JL. Ruby No.5 PPS Gresik	A	Karyawan	BELUM MENIKAH	ISLAM	2025-07-14	086526746354	25 Th 5 Bl 3 Hr	D4	BPJS	02119375947252	Jawa	Indonesia			rayyganss@gmail.com	Tidak Ada	Suci	Manyar	Gresik	Jawa Timur	Aktif
RM000009	Ucok Subejo	3525141404030001	L	Gresik	2003-04-14	Nurhayati	Perumahan Petrokimia Gresik	A	Mahasiswa	BELUM MENIKAH	ISLAM	2025-07-20	082337441736	22 Th 3 Bl 6 Hr	S1	UMUM		Jawa	Indonesia	PG	199310030924	didin6428@gmail.com	Tidak Ada	Sukodono	Gresik	Gresik	East Java	Aktif
\.


--
-- TOC entry 6475 (class 2606 OID 30526)
-- Name: pasien_structure pasien_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.pasien_structure
    ADD CONSTRAINT pasien_pkey PRIMARY KEY (no_rkm_medis);


-- Completed on 2025-08-20 14:53:10

--
-- PostgreSQL database dump complete
--

