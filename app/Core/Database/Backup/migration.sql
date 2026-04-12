CREATE SCHEMA IF NOT EXISTS sik;
CREATE SCHEMA IF NOT EXISTS ref;

CREATE TYPE sik.cara_keluar_enum AS ENUM (
    'Atas Izin Dokter',
    'Pulang Sendiri',
    'Dirujuk',
    'Meninggal',
    'Lain-lain'
);

CREATE TYPE sik.dilanjutkan_enum AS ENUM (
    'Kembali Ke RS',
    'Kontrol di RS',
    'Puskesmas',
    'Lain-lain'
);

CREATE TYPE sik.jenis_kelamin AS ENUM (
    'L',
    'P'
);

CREATE TYPE sik.jenis_pegawai AS ENUM (
    'Tetap',
    'Kontrak',
    'Magang',
    'Istimewa'
);

CREATE TYPE sik.keadaan_enum AS ENUM (
    'Membaik',
    'Sembuh',
    'Meninggal',
    'Lain-lain'
);

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

CREATE TYPE sik.status_asal AS ENUM (
    'Penerimaan',
    'Pengadaan',
    'Hibah'
);

CREATE TYPE sik.agama AS ENUM (
    'Islam',
    'Kristen',
    'Katholik',
    'Hindu',
    'Buddha',
    'Konghucu',
    'Lain-lain'
);
CREATE TYPE sik.status_cuti AS ENUM (
    'Ditolak',
    'Diproses',
    'Diterima'
);

CREATE TYPE sik.status_enum AS ENUM (
    'Ralan',
    'Ranap'
);

CREATE TYPE sik.status_penyakit_enum AS ENUM (
    'Lama',
    'Baru'
);

CREATE TYPE sik.status_tukar AS ENUM (
    'Ditolak',
    'Menunggu',
    'Diterima'
);

CREATE TYPE sik.status_ubah_master AS ENUM (
    '0',
    '1'
);

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

CREATE TABLE sik.alasan_cuti (
    id character varying(2) NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE sik.departemen (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE sik.golongan_barang_medis (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ref.hari (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);

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

CREATE TABLE ref.jabatan (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ref.kategori_barang_medis (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);

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

CREATE TABLE ref.role (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ref.ruangan (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ref.satuan_barang_medis (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ref.shift (
    id character varying(2) NOT NULL,
    nama character varying(50) NOT NULL,
    jam_masuk time with time zone NOT NULL,
    jam_pulang time with time zone NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ref.status_aktif_pegawai (
    id character varying(2) NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);

-- Akun Bayar
-- CREATE TABLE IF NOT EXISTS akun (
--     id INT PRIMARY KEY,
--     nama_akun VARCHAR(100) NOT NULL,
--     nomor_rekening VARCHAR(50) NOT NULL,
--     nama_rekening VARCHAR(50) NOT NULL,
--     ppn FLOAT NOT NULL DEFAULT 0,
--     created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
--     updated_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
-- );

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


CREATE TABLE sik.ambulans (
    no_ambulans character varying(20) NOT NULL,
    status character varying(20) DEFAULT 'available'::character varying NOT NULL,
    supir character varying(50)
);

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

CREATE TABLE sik.data_phk (
    no_pegawai uuid NOT NULL,
    lama_bekerja integer NOT NULL,
    pesangon integer NOT NULL,
    upmk integer NOT NULL,
    nominal integer NOT NULL,
    status text NOT NULL
);

CREATE TABLE sik.data_thr (
    no_pegawai uuid NOT NULL,
    lama_bekerja integer NOT NULL,
    tahun integer NOT NULL,
    nominal integer NOT NULL,
    status text NOT NULL
);

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

CREATE TABLE sik.dokter (
    kode_dokter character varying(10) NOT NULL,
    nama_dokter character varying(50) NOT NULL,
    jenis_kelamin character varying(1) NOT NULL,
    alamat_tinggal character varying(255) NOT NULL,
    no_telp character varying(15) NOT NULL,
    spesialis character varying(50) NOT NULL,
    izin_praktik character varying(50) NOT NULL
);

CREATE TABLE sik.foto_pegawai (
    id_pegawai uuid NOT NULL,
    foto character varying(255) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp with time zone,
    updater uuid
);

CREATE TABLE sik.gudang_barang (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    id_barang_medis character varying,
    id_ruangan integer NOT NULL,
    stok integer NOT NULL,
    no_batch character varying(20),
    no_faktur character varying(20)
);

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

CREATE TABLE sik.kamar (
    nomor_bed character varying(20) NOT NULL,
    kode_kamar character varying(20),
    nama_kamar character varying(50),
    kelas character varying(50),
    tarif_kamar numeric,
    status_kamar character varying(20)
);

CREATE TABLE sik.kepegawaian (
    no_pegawai uuid NOT NULL,
    status text NOT NULL,
    golongan text NOT NULL,
    jabatan text NOT NULL,
    jkn text NOT NULL,
    jkk text NOT NULL,
    jkm text NOT NULL,
    jht text NOT NULL,
    jp text NOT NULL,
    jkp text NOT NULL,
    ptkp text NOT NULL,
    bank text NOT NULL,
    rekening text NOT NULL
);

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

CREATE TABLE sik.notifikasi (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    sender uuid NOT NULL,
    recipient uuid NOT NULL,
    tanggal date DEFAULT CURRENT_DATE,
    judul character varying(255) NOT NULL,
    pesan character varying(255) NOT NULL,
    read boolean DEFAULT false
);

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
    CONSTRAINT pasien_gol_darah_check CHECK (((gol_darah)::text = ANY (ARRAY[('A'::character varying)::text, ('B'::character varying)::text, ('O'::character varying)::text, ('AB'::character varying)::text, ('-'::character varying)::text]))),
    CONSTRAINT pasien_jk_check CHECK ((jk = ANY (ARRAY['L'::bpchar, 'P'::bpchar]))),
    CONSTRAINT pasien_keluarga_check CHECK (((keluarga)::text = ANY (ARRAY[('AYAH'::character varying)::text, ('IBU'::character varying)::text, ('ISTRI'::character varying)::text, ('SUAMI'::character varying)::text, ('KAKAK'::character varying)::text, ('ADIK'::character varying)::text, ('PAMAN'::character varying)::text, ('BIBI'::character varying)::text, ('KAKEK'::character varying)::text, ('NENEK'::character varying)::text, ('LAINNYA'::character varying)::text, ('SAUDARA'::character varying)::text]))),
    CONSTRAINT pasien_pnd_check CHECK (((pnd)::text = ANY (ARRAY[('TS'::character varying)::text, ('TK'::character varying)::text, ('SD'::character varying)::text, ('SMP'::character varying)::text, ('SMA'::character varying)::text, ('D1'::character varying)::text, ('D2'::character varying)::text, ('D3'::character varying)::text, ('S1'::character varying)::text, ('S2'::character varying)::text, ('S3'::character varying)::text, ('-'::character varying)::text, ('SLTA'::character varying)::text, ('PAUD'::character varying)::text, ('TIDAK TAMAT SD'::character varying)::text]))),
    CONSTRAINT pasien_stts_nikah_check CHECK (((stts_nikah)::text = ANY (ARRAY[('BELUM MENIKAH'::character varying)::text, ('MENIKAH'::character varying)::text, ('DUDA'::character varying)::text, ('JANDA'::character varying)::text])))
);

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

CREATE TABLE sik.penggajian (
    no_pegawai uuid NOT NULL,
    tahun integer NOT NULL,
    bulan integer NOT NULL,
    gaji_pokok integer NOT NULL,
    tunjangan integer NOT NULL,
    bpjs integer NOT NULL,
    pajak integer NOT NULL,
    nominal integer NOT NULL,
    status text NOT NULL
);

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
    CONSTRAINT permintaan_resep_pulang_status_check CHECK (((status)::text = ANY (ARRAY[('Sudah'::character varying)::text, ('Belum'::character varying)::text])))
);

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

CREATE TABLE sik.resep_dokter_racikan_detail (
    no_resep character varying(20) NOT NULL,
    no_racik character varying(20) NOT NULL,
    kode_brng character varying(15) NOT NULL,
    p1 double precision,
    p2 double precision,
    kandungan character varying(10),
    jml double precision
);

CREATE TABLE sik.resep_dokter_racikan (
    no_resep character varying(20) NOT NULL,
    no_racik character varying(20) NOT NULL,
    nama_racik character varying(100) NOT NULL,
    kd_racik character varying(3) NOT NULL,
    jml_dr integer NOT NULL,
    aturan_pakai character varying(150) NOT NULL,
    keterangan character varying(50) NOT NULL
);

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
    CONSTRAINT resep_obat_status_check CHECK (((status)::text = ANY (ARRAY[('ralan'::character varying)::text, ('ranap'::character varying)::text])))
);

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

CREATE TABLE sik.stok_keluar_barang_medis (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    no_keluar character varying(20) NOT NULL,
    id_pegawai uuid NOT NULL,
    tanggal_stok_keluar date DEFAULT CURRENT_DATE NOT NULL,
    id_ruangan integer NOT NULL,
    keterangan character varying(255)
);

-- -- Bayar Tagihan Barang Medis
-- CREATE TABLE IF NOT EXISTS tagihan_barang_medis (
--     id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
--     id_pengajuan UUID NOT NULL,
--     id_pemesanan UUID NOT NULL,
--     id_penerimaan UUID NOT NULL,
--     tanggal_bayar DATE NOT NULL,
--     jumlah_bayar FLOAT NOT NULL,
--     id_pegawai UUID NOT NULL, 
--     keterangan VARCHAR(255),
--     no_bukti VARCHAR(50) NOT NULL,
--     id_akun_bayar INT NOT NULL,
--     created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
--     updated_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
--     deleted_at TIMESTAMP WITH TIME ZONE,
--     updater UUID, 
--     FOREIGN KEY (id_pengajuan) REFERENCES pengajuan_barang_medis (id),
--     FOREIGN KEY (id_pemesanan) REFERENCES pemesanan_barang_medis (id),
--     FOREIGN KEY (id_penerimaan) REFERENCES penerimaan_barang_medis (id),
--     FOREIGN KEY (id_pegawai) REFERENCES pegawai (id),
--     FOREIGN KEY (id_akun_bayar) REFERENCES ref.akun_bayar (id),
--     FOREIGN KEY (updater) REFERENCES akun (id)
-- );

CREATE TABLE sik.tarif_tindakan (
    kode character varying(20) NOT NULL,
    nama_perawatan character varying(255),
    kategori_perawatan character varying(50),
    tarif numeric,
    kelas character varying(20)
);

CREATE TABLE sik.transaksi_keluar_barang_medis (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    id_stok_keluar uuid NOT NULL,
    id_barang_medis uuid NOT NULL,
    no_batch character varying(20),
    no_faktur character varying(20),
    jumlah_keluar integer NOT NULL
);

CREATE TABLE sik.tukar_jadwal (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    id_sender uuid NOT NULL,
    id_recipient uuid NOT NULL,
    id_hari integer NOT NULL,
    id_shift_sender character varying(2) NOT NULL,
    id_shift_recipient character varying(2) NOT NULL,
    status sik.status_tukar DEFAULT 'Menunggu'::sik.status_tukar
);

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

CREATE TABLE sik.data_instansi (
    kode_instansi character varying(30) NOT NULL,
    nama_instansi character varying(255) NOT NULL,
    alamat_instansi character varying(255),
    kota character varying(100),
    no_telp character varying(20)
);

CREATE TABLE sik.dokter_jaga (
    kode_dokter character varying(20) NOT NULL,
    nama_dokter character varying(50),
    hari_kerja character varying(50),
    jam_mulai time without time zone,
    jam_selesai time without time zone,
    poliklinik character varying(50),
    status character varying(50)
);

CREATE TABLE sik.kelahiran_bayi (
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

CREATE TABLE sik.pasien_meninggal (
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
    nomor_bed character varying(20),
    pekerjaanpj character varying(35),
    kelurahanpj character varying(15),
    kecamatanpj character varying(15),
    kabupatenpj character varying(15),
    propinsipj character varying(15),
    notelp_pj character varying(40),
    no_asuransi character varying(25)
);

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

CREATE TABLE sik.jenis_barang_medis (
    id integer NOT NULL,
    nama character varying(50) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE sik.kelahiran_bayi2 (
    no_rkm_medis character varying(15) NOT NULL,
    nm_pasien character varying(100),
    jk character varying(1),
    tmp_lahir character varying(15),
    tgl_lahir date,
    jam time without time zone,
    umur character varying(20),
    tgl_daftar date,
    nm_ibu character varying(100),
    umur_ibu character varying(10),
    nm_ayah character varying(100),
    umur_ayah character varying(10),
    alamat text,
    bb integer,
    pb numeric(5,2),
    proses_lahir character varying(100),
    kelahiran_ke integer,
    keterangan text,
    diagnosa character varying(100),
    penyulit_kehamilan character varying(100),
    ketuban character varying(100),
    lk_perut numeric(5,2),
    lk_kepala numeric(5,2),
    lk_dada numeric(5,2),
    penolong character varying(100),
    no_skl character varying(50),
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
    mikonium character varying(100)
);


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

CREATE TABLE sik.resep_dokter (
    no_resep character varying(20),
    kode_barang character varying(20),
    jumlah numeric,
    aturan_pakai character varying(150),
    embalase numeric DEFAULT 0,
    tuslah numeric DEFAULT 0
);

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

CREATE TABLE sik.diagnosa_pasien (
    no_rawat character varying(17) NOT NULL,
    kd_penyakit character varying(10) NOT NULL,
    status sik.status_enum NOT NULL,
    prioritas smallint NOT NULL,
    status_penyakit sik.status_penyakit_enum
);

CREATE TABLE sik.jns_perawatan_inap (
);

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
