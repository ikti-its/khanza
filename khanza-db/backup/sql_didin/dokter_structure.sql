--
-- PostgreSQL database dump
--

-- Dumped from database version 17.5
-- Dumped by pg_dump version 17.5

-- Started on 2025-08-20 14:51:48

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
-- TOC entry 311 (class 1259 OID 28905)
-- Name: dokter_structure; Type: TABLE; Schema: sik; Owner: postgres
--

CREATE TABLE sik.dokter_structure (
    kode_dokter character varying(10) NOT NULL,
    nama_dokter character varying(50) NOT NULL,
    jenis_kelamin character varying(1),
    alamat_tinggal character varying(255),
    no_telp character varying(15),
    spesialis character varying(50),
    izin_praktik character varying(50)
);


ALTER TABLE sik.dokter_structure OWNER TO postgres;

--
-- TOC entry 6815 (class 0 OID 28905)
-- Dependencies: 311
-- Data for Name: dokter_structure; Type: TABLE DATA; Schema: sik; Owner: postgres
--

COPY sik.dokter_structure (kode_dokter, nama_dokter, jenis_kelamin, alamat_tinggal, no_telp, spesialis, izin_praktik) FROM stdin;
D011	Dr. Maya Kusuma	P	Jl. Bougenville No.4, Palembang	084812345678	Saraf	SIP-05724
D012	Dr. Agus Riyanto	L	Jl. Kamboja No.6, Balikpapan	085345678901	THT	SIP-18586
D004	Dr. Daniel	L	Jl. Anggrek No.33, Bandung	082112345678	Anak	SIP-90407
D005	Dr. Fahmi Rizal	L	Jl. Melati No.7, Yogyakarta	083812345678	Penyakit Dalam	SIP-18895
D006	Dr. Hadi Permana	L	Jl. Cemara No.91, Semarang	085212345678	Saraf	SIP-76972
D007	Dr. Rina Lestari	P	Jl. Mawar No.3A, Malang	085612345432	Mata	SIP-36832
D008	Dr. Joko Prabowo	L	Jl. Flamboyan No.17B, Medan	081345678901	THT	SIP-39631
D009	Dr. Siti Aminah	P	Jl. Teratai No.29, Denpasar	082245678901	Kandungan	SIP-88406
D010	Dr. Bambang Yuwono	L	Jl. Dahlia No.11, Makassar	083145678901	Kulit	SIP-55215
D013	Dr. Nina Fadhilah	P	Jl. Wijaya Kusuma No.22, Pontianak	081876543210	Kulit	SIP-92379
D014	Dr. Wahyu Adi	L	Jl. Kemuning No.15, Banjarmasin	082334455667	Jantung	SIP-61586
D015	Dr. Lina Hartati	P	Jl. Sawo No.88, Serang	083812349876	Gigi	SIP-50643
D016	Dr. Arif Setiawan	L	Jl. Durian No.5, Solo	085698765432	Umum	SIP-92510
D017	Dr. Bella Pratiwi	P	Jl. Rambutan No.9, Batam	081367890123	Gigi	SIP-38525
D018	Dr. Citra Ramadhan	P	Jl. Alpukat No.18, Cirebon	082289765432	Anak	SIP-73606
D019	Dr. Dimas Rasyid	L	Jl. Nangka No.30, Pekanbaru	083199887766	Umum	SIP-87714
D020	Dr. Erna Wahyuni	P	Jl. Jambu No.101, Padang	084733344455	Kandungan	SIP-07141
D021	Dr. Farhan Maulana	L	Jl. Pisang No.202, Bandar Lampung	085223344556	THT	SIP-96975
D022	Dr. Gina Yuliana	P	Jl. Pepaya No.12, Palu	081223344556	Umum	SIP-75293
D023	Dr. Hendra Saputra	L	Jl. Apel No.66, Manado	082244556677	Kulit	SIP-63906
D024	Dr. Intan Saraswati	P	Jl. Manggis No.44, Jayapura	083866778899	Gigi	SIP-28565
D025	Dr. Joko Santosa	L	Jl. Cempaka No.14, Mataram	084877788899	Umum	SIP-30063
D026	Dr. Karina Dewi	P	Jl. Beringin No.77, Kupang	085288899900	Saraf	SIP-47565
D027	Dr. Lukman Fadillah	L	Jl. Sengon No.55, Ternate	081399988877	Penyakit Dalam	SIP-05522
D028	Dr. Maya Rahmawati	P	Jl. Ketapang No.23, Ambon	082311223344	Umum	SIP-53369
D029	Dr. Niko Pradipta	L	Jl. Jati No.9, Cimahi	083822334455	THT	SIP-46937
D030	Dr. Olivia Sari	P	Jl. Akasia No.3, Tasikmalaya	084833445566	Anak	SIP-54591
D031	Dr. Putra Wijaya	L	Jl. Kayu Manis No.7, Depok	085244556688	Umum	SIP-76626
D032	Dr. Qory Nasution	P	Jl. Pinus No.100, Bogor	081255667788	Gigi	SIP-24809
D033	Dr. Rudi Hartanto	L	Jl. Palem No.88, Bekasi	082266778899	Jantung	SIP-93916
D034	Dr. Sinta Melati	P	Jl. Waru No.61, Tangerang	083277889900	Umum	SIP-23813
D035	Dr. Taufik Hidayat	L	Jl. Gandaria No.50, Jakarta Timur	084288990011	Penyakit Dalam	SIP-25794
D036	Dr. Umi Zakiyah	P	Jl. Seruni No.28, Jakarta Utara	085299001122	Saraf	SIP-10147
D002	Dr. Andi Wicaksana	L	JL. Sistem Informasi	082337441736	Umum	SIP-63691
D001	Dr. Andi Wijaya	L	Jl. Merpati No.12, Surabaya	081234567890	Umum	SIP-63670
D003	Dr. Budi Santoso	L	Jl. Kenanga No.45, Jakarta Selatan	081298765432	Gigi	SIP-63430
\.


--
-- TOC entry 6475 (class 2606 OID 28909)
-- Name: dokter_structure dokter_pkey; Type: CONSTRAINT; Schema: sik; Owner: postgres
--

ALTER TABLE ONLY sik.dokter_structure
    ADD CONSTRAINT dokter_pkey PRIMARY KEY (kode_dokter);


-- Completed on 2025-08-20 14:51:48

--
-- PostgreSQL database dump complete
--

