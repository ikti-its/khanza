CREATE TABLE public.akun (
    id uuid NOT NULL,
    nama character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    foto character varying(255) NOT NULL,
    akses integer NOT NULL,
    verified boolean NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE dashboard.analitika_data (
    id uuid NOT NULL PRIMARY KEY,
    ad_layanan_kinerja boolean NOT NULL,
    ad_layanan_jumlah_pengguna boolean NOT NULL,
    ad_layanan_trend_pemberian_layanan boolean NOT NULL,
    ad_layanan_hasil_survey_pengguna boolean NOT NULL,
    ad_layanan_akses_ppkblu boolean NOT NULL,
    ad_keuangan_realisasi_pb boolean NOT NULL,
    ad_keuangan_jumlah_kas boolean NOT NULL,
    ad_keuangan_saldo_rekening_blu boolean NOT NULL,
    ad_keuangan_analisis_data_keuangan boolean NOT NULL,
    ad_keuangan_akses_ppkblu boolean NOT NULL,
    ad_sdm_komposisi_sdm boolean NOT NULL,
    ad_sdm_profil_sdm boolean NOT NULL,
    ad_sdm_analisis_kebutuhan_pegawai boolean NOT NULL,
    ad_sdm_analisis_beban_kerja boolean NOT NULL,
    ad_sdm_analisis_kinerja_pegawai boolean NOT NULL,
    ad_sdm_training_need_analysis boolean NOT NULL,
    ad_jumlah_dashboard_pendukung integer NOT NULL
);
CREATE TABLE dashboard.integrasi_data (
    id uuid NOT NULL PRIMARY KEY,
    id_secret_key_dev boolean NOT NULL,
    id_pengiriman_data_dev boolean NOT NULL,
    id_otomasi_pengiriman boolean NOT NULL,
    id_secret_key_prod boolean NOT NULL,
    id_pengiriman_data_prod boolean NOT NULL,
    id_jumlah_pengiriman_data_harian integer NOT NULL,
    id_jumlah_data_keuangan integer NOT NULL,
    id_jumlah_data_layanan integer NOT NULL,
    id_jumlah_data_sdm integer NOT NULL,
    id_jumlah_total_data integer NOT NULL
);
CREATE TABLE dashboard.modernisasi_pengelolaan_blu (
    entry_id uuid NOT NULL PRIMARY KEY,
    periode date NOT NULL,
    semester integer NOT NULL,
    id_user uuid NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE dashboard.sistem_informasi_manajemen (
    id uuid NOT NULL PRIMARY KEY,
    sim_keuangan_penerimaan_blu boolean NOT NULL,
    sim_keuangan_pengeluaran_blu boolean NOT NULL,
    sim_keuangan_pencatatan_saldo_blu boolean NOT NULL,
    sim_layanan_pencatatan_blu boolean NOT NULL,
    sim_layanan_integrasi_keuangan boolean NOT NULL,
    sim_sdm_pencatatan_sdm boolean NOT NULL,
    sim_sdm_kinerja_sdm boolean NOT NULL

);
CREATE TABLE dashboard.website (
    id uuid NOT NULL PRIMARY KEY,
    web_uji_performa_akses numeric(5,2) NOT NULL,
    web_informasi_profil_blu boolean NOT NULL,
    web_informasi_layanan_blu boolean NOT NULL,
    web_fitur_pengaduan boolean NOT NULL,
    web_survey_layanan boolean NOT NULL,
    web_tata_kelola_blu boolean NOT NULL
);

CREATE TABLE dashboard.extramiles (
    id uuid NOT NULL PRIMARY KEY,
    id_pengiriman_data integer NOT NULL,
    ad_sdm_khusus boolean NOT NULL,
    ad_analisis_prediktif boolean NOT NULL,
    sim_mobile_layanan boolean NOT NULL,
    web_seo boolean NOT NULL
);

CREATE TABLE dashboard.extramiles (
    id uuid NOT NULL PRIMARY KEY,
    id_pengiriman_data integer NOT NULL,
    ad_sdm_khusus boolean NOT NULL,
    ad_analisis_prediktif boolean NOT NULL,
    sim_mobile_layanan boolean NOT NULL,
    web_seo boolean NOT NULL
);

CREATE TABLE dashboard.rasio_pnbp_operasional  (
    entry_id uuid NOT NULL PRIMARY KEY,
    periode date NOT NULL,
    id_user uuid NOT NULL,
    pendapatan_jasa_layanan_masyarakat integer NOT NULL,
    pendapatan_jasa_layanan_entitas_lain integer NOT NULL,
    beban_operasional integer NOT NULL,
    beban_penyusutan integer NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE ONLY dashboard.rasio_pnbp_operasional
    ADD CONSTRAINT rasio_pnbp_operasional_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.akun(id);




ALTER TABLE ONLY public.akun
    ADD CONSTRAINT akun_pkey PRIMARY KEY (id);

ALTER TABLE ONLY dashboard.analitika_data
    ADD CONSTRAINT analitika_data_id_fkey FOREIGN KEY (id) REFERENCES dashboard.modernisasi_pengelolaan_blu(entry_id);

ALTER TABLE ONLY dashboard.integrasi_data
    ADD CONSTRAINT integrasi_data_id_fkey FOREIGN KEY (id) REFERENCES dashboard.modernisasi_pengelolaan_blu(entry_id);

ALTER TABLE ONLY dashboard.modernisasi_pengelolaan_blu
    ADD CONSTRAINT modernisasi_pengelolaan_blu_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.akun(id);

ALTER TABLE ONLY dashboard.sistem_informasi_manajemen
    ADD CONSTRAINT sistem_informasi_manajemen_id_fkey FOREIGN KEY (id) REFERENCES dashboard.modernisasi_pengelolaan_blu(entry_id);

ALTER TABLE ONLY dashboard.website
    ADD CONSTRAINT website_id_fkey FOREIGN KEY (id) REFERENCES dashboard.modernisasi_pengelolaan_blu(entry_id);
ALTER TABLE ONLY dashboard.extramiles
    ADD CONSTRAINT extramiles_id_fkey FOREIGN KEY (id) REFERENCES dashboard.modernisasi_pengelolaan_blu(entry_id);
