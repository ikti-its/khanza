-- Akun
CREATE TABLE IF NOT EXISTS akun (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    foto VARCHAR(255) NOT NULL,
    role INT NOT NULL
);

INSERT INTO akun (name, email, password, foto, role)
VALUES
('Admin', 'admin@fathoor.dev', '$2a$10$8jI.qKrVbXQjNzYX6KOIvukkYkNcmfYyPWiv9tuHE8vdg5EhjQBzy', 'https://api.fathoor.dev/v1/file/img/default.png', 1);

CREATE TABLE IF NOT EXISTS finansial (
    tahun INT NOT NULL,
    bulan INT NOT NULL,
    pendapatan_pnbp NUMERIC NOT NULL,
    beban_operasional NUMERIC NOT NULL,
    beban_penyusutan NUMERIC NOT NULL,
    target_pnbp_operasional FLOAT NOT NULL,
    pendapatan_blu NUMERIC NOT NULL,
    target_pendapatan_blu NUMERIC NOT NULL,
    lama_penyampaian_data_proyeksi INT NOT NULL,
    rasio FLOAT NOT NULL,
    laba_bersih NUMERIC NOT NULL,
    PRIMARY KEY (tahun, bulan)
);

INSERT INTO finansial (tahun, bulan, pendapatan_pnbp, beban_operasional, beban_penyusutan, target_pnbp_operasional, pendapatan_blu, target_pendapatan_blu, lama_penyampaian_data_proyeksi, rasio, laba_bersih)
VALUES
(2023, 7, 683638670, 892007950, 690607560, 67.17, 998755580, 900362300, 7, 66.34, 921277420),
(2023, 6, 554682850, 759674470, 457680440, 48.54, 919609800, 463713490, 7, 46.92, 685027930);

CREATE TABLE IF NOT EXISTS bisnis_internal (
    tahun INT NOT NULL,
    bulan INT NOT NULL,
    tata_kelola_rumah_sakit INT NOT NULL,
    kualifikasi_dan_pendidikan_staf INT NOT NULL,
    manajemen_fasilitas_dan_keselamatan INT NOT NULL,
    peningkatan_mutu_dan_keselamatan_pasien INT NOT NULL,
    manajemen_rekam_medik_dan_informasi_kesehatan INT NOT NULL,
    pencegahan_dan_pengendalian_infeksi INT NOT NULL,
    pendidikan_dalam_pelayanan_kesehatan INT NOT NULL,
    PRIMARY KEY (tahun, bulan)
);

INSERT INTO bisnis_internal (tahun, bulan, tata_kelola_rumah_sakit, kualifikasi_dan_pendidikan_staf, manajemen_fasilitas_dan_keselamatan, peningkatan_mutu_dan_keselamatan_pasien, manajemen_rekam_medik_dan_informasi_kesehatan, pencegahan_dan_pengendalian_infeksi, pendidikan_dalam_pelayanan_kesehatan)
VALUES (2023, 12, 1, 1, 1, 0, 0, 0, 1), (2023, 11, 1, 0, 1, 0, 0, 0, 1), (2023, 10, 1, 0, 1, 0, 0, 0, 1), (2023, 9, 1, 0, 1, 0, 0, 0, 1), (2023, 8, 1, 0, 1, 0, 0, 0, 1), (2023, 7, 1, 1, 1, 0, 0, 0, 1), (2023, 6, 1, 1, 1, 0, 0, 0, 1), (2023, 5, 1, 1, 1, 0, 0, 0, 1), (2023, 4, 1, 1, 1, 0, 0, 0, 1), (2023, 3, 1, 1, 1, 0, 0, 0, 1), (2023, 2, 1, 1, 1, 0, 0, 0, 1), (2023, 1, 0, 0, 1, 0, 0, 0, 1);


CREATE TABLE IF NOT EXISTS pelanggan (
    tahun INT NOT NULL,
    bulan INT NOT NULL,
    akses_dan_kontinuitas_pelayanan INT NOT NULL,
    hak_pasien_dan_keluarga INT NOT NULL,
    pengkajian_pasien INT NOT NULL,
    pelayanan_dan_asuhan_pasien INT NOT NULL,
    pelayanan_anestesi_dan_bedah INT NOT NULL,
    pelayanan_kefarmasian_dan_penggunaan_obat INT NOT NULL,
    komunikasi_dan_edukasi INT NOT NULL,
    PRIMARY KEY (tahun, bulan)
);

INSERT INTO pelanggan (tahun, bulan, akses_dan_kontinuitas_pelayanan, hak_pasien_dan_keluarga, pengkajian_pasien, pelayanan_dan_asuhan_pasien, pelayanan_anestesi_dan_bedah, pelayanan_kefarmasian_dan_penggunaan_obat, komunikasi_dan_edukasi)
VALUES (2023, 12, 1, 1, 1, 0, 0, 0, 1), (2023, 11, 1, 0, 1, 0, 0, 0, 1), (2023, 10, 1, 0, 1, 0, 0, 0, 1), (2023, 9, 1, 0, 1, 0, 0, 0, 1), (2023, 8, 1, 0, 1, 0, 0, 0, 1), (2023, 7, 1, 1, 1, 0, 0, 0, 1), (2023, 6, 1, 1, 1, 0, 0, 0, 1), (2023, 5, 1, 1, 1, 0, 0, 0, 1), (2023, 4, 1, 1, 1, 0, 0, 0, 1), (2023, 3, 1, 1, 1, 0, 0, 0, 1), (2023, 2, 1, 1, 1, 0, 0, 0, 1), (2023, 1, 0, 0, 1, 0, 0, 0, 1);

CREATE TABLE IF NOT EXISTS pembelajaran_dan_pertumbuhan (
    tahun INT NOT NULL,
    bulan INT NOT NULL,
    sasaran_keselamatan_pasien INT NOT NULL,
    program_nasional INT NOT NULL,
    PRIMARY KEY (tahun, bulan)
);

INSERT INTO pembelajaran_dan_pertumbuhan (tahun, bulan, sasaran_keselamatan_pasien, program_nasional)
VALUES (2023, 12, 1, 1), (2023, 11, 1, 0), (2023, 10, 1, 0), (2023, 9, 1, 0), (2023, 8, 1, 0), (2023, 7, 1, 1), (2023, 6, 1, 1), (2023, 5, 1, 1), (2023, 4, 1, 1), (2023, 3, 1, 1), (2023, 2, 1, 1), (2023, 1, 0, 0);
