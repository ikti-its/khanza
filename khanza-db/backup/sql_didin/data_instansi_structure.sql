CREATE TABLE sik.data_instansi_structure (
    kode_instansi character varying(30) NOT NULL,
    nama_instansi character varying(255) NOT NULL,
    alamat_instansi character varying(255),
    kota character varying(100),
    no_telp character varying(20)
);


COPY sik.data_instansi_structure (kode_instansi, nama_instansi, alamat_instansi, kota, no_telp) FROM stdin;
ITS	Institut Teknologi Sepuluh Nopember	Jl. Teknik Kimia, Keputih, Kec. Sukolilo, Surabaya, Jawa Timur 60111	Surabaya	(031) 5994251
PG	PT Petrokimia Gresik 	 Jl. Jend Ahmad Yani, Gresik 61119, Jawa Timur-Indonesia	Gresik	0811 9918 001
TELKOM	PT Telkom Indonesia (Persero) Tbk	Jl. Japati No.1, Bandung 40133, Jawa Barat, Indonesia	Bandung	(022) 4521451
PERTA	PT Pertamina (Persero)	Jl. Medan Merdeka Timur No.1A, Jakarta 10110	Jakarta	(021) 3815111
BRI	PT Bank Rakyat Indonesia (Persero) Tbk	Jl. Jend. Sudirman Kav. 44-46, Jakarta 10210	Jakarta	(021) 2510244
UNILEV	PT Unilever Indonesia Tbk	Jl. BSD Boulevard Barat, BSD Green Office Park, Tangerang 15345	Tangerang	(021) 80827000
ASTRA	PT Astra International Tbk	Jl. Gaya Motor Raya No.8, Sunter II, Jakarta Utara 14330	Jakarta Utara	(021) 65307000
\.

ALTER TABLE ONLY sik.data_instansi_structure
    ADD CONSTRAINT data_instansi_pkey PRIMARY KEY (kode_instansi);
