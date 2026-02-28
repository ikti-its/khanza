CREATE TABLE sik.dokter_jaga_structure (
    kode_dokter character varying(20) NOT NULL,
    nama_dokter character varying(50),
    hari_kerja character varying(50),
    jam_mulai time without time zone,
    jam_selesai time without time zone,
    poliklinik character varying(50),
    status character varying(50)
);


COPY sik.dokter_jaga_structure (kode_dokter, nama_dokter, hari_kerja, jam_mulai, jam_selesai, poliklinik, status) FROM stdin;
D001	Dr. Andi Wijaya	2025-04-15	08:00:00	14:00:00	Poli Umum	
D003	Dr. Budi Santoso	2025-04-16	10:00:00	16:00:00	Poli Gigi	
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
D005	Dr. Fahmi Rizal	Selasa	17:28:24	23:28:25	Poli Dalam	aktif
D002	Dr. Andi Wicaksana	Sabtu	13:30:13	19:30:16	Poli Umum	aktif
D004	Dr. Daniel	Selasa	21:17:21	03:17:23	Poli Umum	aktif
\.


ALTER TABLE ONLY sik.dokter_jaga_structure
    ADD CONSTRAINT dokter_jaga_structure_pkey PRIMARY KEY (kode_dokter);


ALTER TABLE ONLY sik.dokter_jaga_structure
    ADD CONSTRAINT fk_dokterjaga_kode FOREIGN KEY (kode_dokter) REFERENCES sik.dokter_structure(kode_dokter) ON UPDATE CASCADE ON DELETE CASCADE;
