-- Akun
CREATE INDEX IF NOT EXISTS idx_akun_foto ON akun (foto);
CREATE INDEX IF NOT EXISTS idx_akun_role ON akun (role);
CREATE INDEX IF NOT EXISTS idx_akun_updated_at ON akun (updated_at);
CREATE INDEX IF NOT EXISTS idx_akun_deleted_at ON akun (deleted_at);

-- Modul C (Fathur, Ruben)
-- Pegawai
CREATE INDEX IF NOT EXISTS idx_pegawai_jenis_kelamin ON pegawai (jenis_kelamin);
CREATE INDEX IF NOT EXISTS idx_pegawai_id_jabatan ON pegawai (id_jabatan);
CREATE INDEX IF NOT EXISTS idx_pegawai_id_departemen ON pegawai (id_departemen);
CREATE INDEX IF NOT EXISTS idx_pegawai_id_status_aktif ON pegawai (id_status_aktif);
CREATE INDEX IF NOT EXISTS idx_pegawai_jenis_pegawai ON pegawai (jenis_pegawai);
CREATE INDEX IF NOT EXISTS idx_pegawai_tanggal_masuk ON pegawai (tanggal_masuk);
CREATE INDEX IF NOT EXISTS idx_pegawai_updated_at ON pegawai (updated_at);
CREATE INDEX IF NOT EXISTS idx_pegawai_deleted_at ON pegawai (deleted_at);

-- Alamat
CREATE INDEX IF NOT EXISTS idx_alamat_alamat ON alamat (alamat);
CREATE INDEX IF NOT EXISTS idx_alamat_alamat_lat ON alamat (alamat_lat);
CREATE INDEX IF NOT EXISTS idx_alamat_alamat_lon ON alamat (alamat_lon);
CREATE INDEX IF NOT EXISTS idx_alamat_updated_at ON alamat (updated_at);
CREATE INDEX IF NOT EXISTS idx_alamat_deleted_at ON alamat (deleted_at);

-- Berkas Pegawai
CREATE INDEX IF NOT EXISTS idx_berkas_pegawai_agama ON berkas_pegawai (agama);
CREATE INDEX IF NOT EXISTS idx_berkas_pegawai_pendidikan ON berkas_pegawai (pendidikan);
CREATE INDEX IF NOT EXISTS idx_berkas_pegawai_ktp ON berkas_pegawai (ktp);
CREATE INDEX IF NOT EXISTS idx_berkas_pegawai_kk ON berkas_pegawai (kk);
CREATE INDEX IF NOT EXISTS idx_berkas_pegawai_npwp ON berkas_pegawai (npwp);
CREATE INDEX IF NOT EXISTS idx_berkas_pegawai_bpjs ON berkas_pegawai (bpjs);
CREATE INDEX IF NOT EXISTS idx_berkas_pegawai_ijazah ON berkas_pegawai (ijazah);
CREATE INDEX IF NOT EXISTS idx_berkas_pegawai_skck ON berkas_pegawai (skck);
CREATE INDEX IF NOT EXISTS idx_berkas_pegawai_str ON berkas_pegawai (str);
CREATE INDEX IF NOT EXISTS idx_berkas_pegawai_serkom ON berkas_pegawai (serkom);

-- Foto Pegawai
CREATE INDEX IF NOT EXISTS idx_foto_pegawai_foto ON foto_pegawai (foto);
CREATE INDEX IF NOT EXISTS idx_foto_pegawai_updated_at ON foto_pegawai (updated_at);
CREATE INDEX IF NOT EXISTS idx_foto_pegawai_deleted_at ON foto_pegawai (deleted_at);

-- Jadwal Pegawai
CREATE INDEX IF NOT EXISTS idx_jadwal_pegawai_id_pegawai ON jadwal_pegawai (id_pegawai);
CREATE INDEX IF NOT EXISTS idx_jadwal_pegawai_id_shift ON jadwal_pegawai (id_shift);
CREATE INDEX IF NOT EXISTS idx_jadwal_pegawai_id_hari ON jadwal_pegawai (id_hari);
CREATE INDEX IF NOT EXISTS idx_jadwal_pegawai_updated_at ON jadwal_pegawai (updated_at);
CREATE INDEX IF NOT EXISTS idx_jadwal_pegawai_deleted_at ON jadwal_pegawai (deleted_at);

-- Presensi
CREATE INDEX IF NOT EXISTS idx_presensi_id_pegawai ON presensi (id_pegawai);
CREATE INDEX IF NOT EXISTS idx_presensi_id_jadwal_pegawai ON presensi (id_jadwal_pegawai);
CREATE INDEX IF NOT EXISTS idx_presensi_tanggal ON presensi (tanggal);
CREATE INDEX IF NOT EXISTS idx_presensi_jam_masuk ON presensi (jam_masuk);
CREATE INDEX IF NOT EXISTS idx_presensi_jam_pulang ON presensi (jam_pulang);
CREATE INDEX IF NOT EXISTS idx_presensi_keterangan ON presensi (keterangan);
CREATE INDEX IF NOT EXISTS idx_presensi_updated_at ON presensi (updated_at);
CREATE INDEX IF NOT EXISTS idx_presensi_deleted_at ON presensi (deleted_at);

-- Cuti
CREATE INDEX IF NOT EXISTS idx_cuti_id_pegawai ON cuti (id_pegawai);
CREATE INDEX IF NOT EXISTS idx_cuti_tanggal_mulai ON cuti (tanggal_mulai);
CREATE INDEX IF NOT EXISTS idx_cuti_tanggal_selesai ON cuti (tanggal_selesai);
CREATE INDEX IF NOT EXISTS idx_cuti_id_alasan_cuti ON cuti (id_alasan_cuti);
CREATE INDEX IF NOT EXISTS idx_cuti_status ON cuti (status);
CREATE INDEX IF NOT EXISTS idx_cuti_updated_at ON cuti (updated_at);
CREATE INDEX IF NOT EXISTS idx_cuti_deleted_at ON cuti (deleted_at);

-- Notifikasi Hubungi Pegawai (Ruben)
CREATE INDEX IF NOT EXISTS idx_notifikasi_hubungi_pegawai_tanggal_notifikasi ON notifikasi_hubungi_pegawai (tanggal_notifikasi);
CREATE INDEX IF NOT EXISTS idx_notifikasi_hubungi_pegawai_updated_at ON notifikasi_hubungi_pegawai (updated_at);
CREATE INDEX IF NOT EXISTS idx_notifikasi_hubungi_pegawai_deleted_at ON notifikasi_hubungi_pegawai (deleted_at);

-- Modul D (Leo)
-- Barang Medis
CREATE INDEX IF NOT EXISTS idx_barang_medis_jenis ON barang_medis (jenis);
CREATE INDEX IF NOT EXISTS idx_barang_medis_satuan ON barang_medis (id_satuan);
CREATE INDEX IF NOT EXISTS idx_barang_medis_updated_at ON barang_medis (updated_at);
CREATE INDEX IF NOT EXISTS idx_barang_medis_deleted_at ON barang_medis (deleted_at);

-- Obat
CREATE INDEX IF NOT EXISTS idx_obat_id_barang_medis ON obat (id_barang_medis);
CREATE INDEX IF NOT EXISTS idx_obat_id_industri_farmasi ON obat (id_industri_farmasi);
CREATE INDEX IF NOT EXISTS idx_obat_kadaluwarsa ON obat (kadaluwarsa);
CREATE INDEX IF NOT EXISTS idx_obat_updated_at ON obat (updated_at);
CREATE INDEX IF NOT EXISTS idx_obat_deleted_at ON obat (deleted_at);

-- Alat Kesehatan
CREATE INDEX IF NOT EXISTS idx_alat_kesehatan_merek ON alat_kesehatan (merek);
CREATE INDEX IF NOT EXISTS idx_alat_kesehatan_updated_at ON alat_kesehatan (updated_at);
CREATE INDEX IF NOT EXISTS idx_alat_kesehatan_deleted_at ON alat_kesehatan (deleted_at);

-- Bahan Habis Pakai
CREATE INDEX IF NOT EXISTS idx_bahan_habis_pakai_updated_at ON bahan_habis_pakai (updated_at);
CREATE INDEX IF NOT EXISTS idx_bahan_habis_pakai_deleted_at ON bahan_habis_pakai (deleted_at);

-- Darah
CREATE INDEX IF NOT EXISTS idx_darah_updated_at ON darah (updated_at);
CREATE INDEX IF NOT EXISTS idx_darah_deleted_at ON darah (deleted_at);

-- Pengajuan Barang Medis
CREATE INDEX IF NOT EXISTS idx_pengajuan_barang_medis_tanggal_pengajuan ON pengajuan_barang_medis (tanggal_pengajuan);
CREATE INDEX IF NOT EXISTS idx_pengajuan_barang_medis_id_pegawai ON pengajuan_barang_medis (id_pegawai);
CREATE INDEX IF NOT EXISTS idx_pengajuan_barang_medis_updated_at ON pengajuan_barang_medis (updated_at);
CREATE INDEX IF NOT EXISTS idx_pengajuan_barang_medis_deleted_at ON pengajuan_barang_medis (deleted_at);

-- Persetujuan pengajuan
CREATE INDEX IF NOT EXISTS idx_persetujuan_pengajuan_status_keuangan ON persetujuan_pengajuan (status_keuangan);
CREATE INDEX IF NOT EXISTS idx_persetujuan_pengajuan_status_apoteker ON persetujuan_pengajuan (status_apoteker);
CREATE INDEX IF NOT EXISTS idx_persetujuan_pengajuan_id_apoteker ON persetujuan_pengajuan (id_apoteker);
CREATE INDEX IF NOT EXISTS idx_persetujuan_pengajuan_id_keuangan ON persetujuan_pengajuan (id_keuangan);
CREATE INDEX IF NOT EXISTS idx_persetujuan_pengajuan_updated_at ON persetujuan_pengajuan (updated_at);
CREATE INDEX IF NOT EXISTS idx_persetujuan_pengajuan_deleted_at ON persetujuan_pengajuan (deleted_at);

-- Pesanan Barang Medis
CREATE INDEX IF NOT EXISTS idx_pesanan_barang_medis_id_pengajuan ON pesanan_barang_medis (id_pengajuan);
CREATE INDEX IF NOT EXISTS idx_pesanan_barang_medis_id_barang_medis ON pesanan_barang_medis (id_barang_medis);
CREATE INDEX IF NOT EXISTS idx_pesanan_barang_medis_updated_at ON pesanan_barang_medis (updated_at);
CREATE INDEX IF NOT EXISTS idx_pesanan_barang_medis_deleted_at ON pesanan_barang_medis (deleted_at);


-- Pemesanan Barang Medis
CREATE INDEX IF NOT EXISTS idx_pemesanan_barang_medis_id_pengajuan ON pemesanan_barang_medis (id_pengajuan);
CREATE INDEX IF NOT EXISTS idx_pemesanan_barang_medis_id_supplier ON pemesanan_barang_medis (id_supplier);
CREATE INDEX IF NOT EXISTS idx_pemesanan_barang_medis_id_pegawai ON pemesanan_barang_medis (id_pegawai);
CREATE INDEX IF NOT EXISTS idx_pemesanan_barang_medis_id_updated_at ON pemesanan_barang_medis (updated_at);
CREATE INDEX IF NOT EXISTS idx_pemesanan_barang_medis_id_deleted_at ON pemesanan_barang_medis (deleted_at);

-- Penerimaan Barang Medis
CREATE INDEX IF NOT EXISTS idx_penerimaan_barang_medis_id_pengajuan ON penerimaan_barang_medis (id_pengajuan);
CREATE INDEX IF NOT EXISTS idx_penerimaan_barang_medis_id_pemesanan ON penerimaan_barang_medis (id_pemesanan);
CREATE INDEX IF NOT EXISTS idx_penerimaan_barang_medis_id_ruangan ON penerimaan_barang_medis (id_ruangan);
CREATE INDEX IF NOT EXISTS idx_penerimaan_barang_medis_id_pegawai ON penerimaan_barang_medis (id_pegawai);
CREATE INDEX IF NOT EXISTS idx_penerimaan_barang_medis_updated_at ON penerimaan_barang_medis (updated_at);
CREATE INDEX IF NOT EXISTS idx_penerimaan_barang_medis_deleted_at ON penerimaan_barang_medis (deleted_at);

-- Bayar Tagihan Barang Medis
CREATE INDEX IF NOT EXISTS idx_tagihan_barang_medis_id_pengajuan ON tagihan_barang_medis (id_pengajuan);
CREATE INDEX IF NOT EXISTS idx_tagihan_barang_medis_id_pemesanan ON tagihan_barang_medis (id_pemesanan);
CREATE INDEX IF NOT EXISTS idx_tagihan_barang_medis_id_penerimaan ON tagihan_barang_medis (id_penerimaan);
CREATE INDEX IF NOT EXISTS idx_tagihan_barang_medis_tanggal_bayar ON tagihan_barang_medis (tanggal_bayar);
CREATE INDEX IF NOT EXISTS idx_tagihan_barang_medis_id_pegawai ON tagihan_barang_medis (id_pegawai);
CREATE INDEX IF NOT EXISTS idx_tagihan_barang_medis_id_akun_bayar ON tagihan_barang_medis (id_akun_bayar);
CREATE INDEX IF NOT EXISTS idx_tagihan_barang_medis_updated_at ON tagihan_barang_medis (updated_at);
CREATE INDEX IF NOT EXISTS idx_tagihan_barang_medis_deleted_at ON tagihan_barang_medis (deleted_at);

-- Stok Keluar Barang Medis
CREATE INDEX IF NOT EXISTS idx_stok_keluar_barang_medis_tanggal_stok_keluar ON stok_keluar_barang_medis (tanggal_stok_keluar);
CREATE INDEX IF NOT EXISTS idx_stok_keluar_barang_medis_id_pegawai ON stok_keluar_barang_medis (id_pegawai);
CREATE INDEX IF NOT EXISTS idx_stok_keluar_barang_medis_asal_ruangan ON stok_keluar_barang_medis (asal_ruangan);
CREATE INDEX IF NOT EXISTS idx_stok_keluar_barang_medis_tujuan_ruangan ON stok_keluar_barang_medis (tujuan_ruangan);
CREATE INDEX IF NOT EXISTS idx_stok_keluar_barang_medis_updated_at ON stok_keluar_barang_medis (updated_at);
CREATE INDEX IF NOT EXISTS idx_stok_keluar_barang_medis_deleted_at ON stok_keluar_barang_medis (deleted_at);

CREATE INDEX IF NOT EXISTS idx_transaksi_keluar_barang_medis_id_stok_keluar ON transaksi_keluar_barang_medis (id_stok_keluar);
CREATE INDEX IF NOT EXISTS idx_transaksi_keluar_barang_medis_id_barang_medis ON transaksi_keluar_barang_medis (id_barang_medis);
CREATE INDEX IF NOT EXISTS idx_transaksi_keluar_barang_medis_updated_at ON transaksi_keluar_barang_medis (updated_at);
CREATE INDEX IF NOT EXISTS idx_transaksi_keluar_barang_medis_deleted_at ON transaksi_keluar_barang_medis (deleted_at);
