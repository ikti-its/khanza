
ALTER TABLE ONLY ref.alasan_cuti_structure
    ADD CONSTRAINT alasan_cuti_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.departemen_structure
    ADD CONSTRAINT departemen_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.golongan_barang_medis_structure
    ADD CONSTRAINT golongan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.hari_structure
    ADD CONSTRAINT hari_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.industri_farmasi_structure
    ADD CONSTRAINT industri_farmasi_kode_key UNIQUE (kode);

ALTER TABLE ONLY ref.industri_farmasi_structure
    ADD CONSTRAINT industri_farmasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.jenis_barang_medis_structure
    ADD CONSTRAINT jenis_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.kategori_barang_medis_structure
    ADD CONSTRAINT kategori_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.organisasi_structure
    ADD CONSTRAINT organisasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.role_structure
    ADD CONSTRAINT role_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.ruangan_structure
    ADD CONSTRAINT ruangan_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.satuan_barang_medis_structure
    ADD CONSTRAINT satuan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.shift_structure
    ADD CONSTRAINT shift_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.status_aktif_pegawai_structure
    ADD CONSTRAINT status_aktif_pegawai_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.supplier_barang_medis_structure
    ADD CONSTRAINT supplier_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.akun_structure
    ADD CONSTRAINT akun_email_key UNIQUE (email);

ALTER TABLE ONLY sik.akun_structure
    ADD CONSTRAINT akun_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.alamat_structure
    ADD CONSTRAINT alamat_pkey PRIMARY KEY (id_akun);

ALTER TABLE ONLY sik.alasan_cuti_structure
    ADD CONSTRAINT alasan_cuti_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.ambulans_structure
    ADD CONSTRAINT ambulans_pkey PRIMARY KEY (no_ambulans);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_kode_barang_key UNIQUE (kode_barang);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.berkas_pegawai_structure
    ADD CONSTRAINT berkas_pegawai_nik_key UNIQUE (nik);

ALTER TABLE ONLY sik.berkas_pegawai_structure
    ADD CONSTRAINT berkas_pegawai_pkey PRIMARY KEY (id_pegawai);

ALTER TABLE ONLY sik.cuti_structure
    ADD CONSTRAINT cuti_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.data_batch_structure
    ADD CONSTRAINT data_batch_pkey PRIMARY KEY (no_batch, id_barang_medis, no_faktur);

ALTER TABLE ONLY sik.data_thr_structure
    ADD CONSTRAINT data_thr_pkey PRIMARY KEY (no_pegawai);

ALTER TABLE ONLY sik.databarang_structure
    ADD CONSTRAINT databarang_pkey PRIMARY KEY (kode_brng);

ALTER TABLE ONLY sik.departemen_structure
    ADD CONSTRAINT departemen_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.detail_penerimaan_barang_medis_structure
    ADD CONSTRAINT detail_penerimaan_barang_medis_pkey PRIMARY KEY (id_penerimaan, id_barang_medis);

ALTER TABLE ONLY sik.resume_pasien_ranap_structure
    ADD CONSTRAINT discharge_summary_pkey PRIMARY KEY (no_rawat);

ALTER TABLE ONLY sik.dokter_structure
    ADD CONSTRAINT dokter_pkey PRIMARY KEY (kode_dokter);

ALTER TABLE ONLY sik.foto_pegawai_structure
    ADD CONSTRAINT foto_pegawai_pkey PRIMARY KEY (id_pegawai);

ALTER TABLE ONLY sik.golongan_barang_medis_structure
    ADD CONSTRAINT golongan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.gudang_barang_structure
    ADD CONSTRAINT gudang_barang_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.hari_structure
    ADD CONSTRAINT hari_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.industri_farmasi_structure
    ADD CONSTRAINT industri_farmasi_kode_key UNIQUE (kode);

ALTER TABLE ONLY sik.industri_farmasi_structure
    ADD CONSTRAINT industri_farmasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.jabatan_pegawai_structure
    ADD CONSTRAINT jabatan_pegawai_pkey PRIMARY KEY (no_jabatan);

ALTER TABLE ONLY sik.jadwal_pegawai_structure
    ADD CONSTRAINT jadwal_pegawai_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.jenis_barang_medis_structure
    ADD CONSTRAINT jenis_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.jenis_tindakan_structure
    ADD CONSTRAINT jenis_tindakan_pkey PRIMARY KEY (kode);

ALTER TABLE ONLY sik.kamar_structure
    ADD CONSTRAINT kamar_pkey PRIMARY KEY (nomor_bed);

ALTER TABLE ONLY sik.kategori_barang_medis_structure
    ADD CONSTRAINT kategori_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.kepegawaian_structure
    ADD CONSTRAINT kepegawaian_pkey PRIMARY KEY (no_pegawai);

ALTER TABLE ONLY sik.mutasi_barang_structure
    ADD CONSTRAINT mutasi_barang_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.notifikasi_structure
    ADD CONSTRAINT notifikasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.opname_structure
    ADD CONSTRAINT opname_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.organisasi_structure
    ADD CONSTRAINT organisasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.pasien_structure
    ADD CONSTRAINT pasien_pkey PRIMARY KEY (no_rkm_medis);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_id_akun_key UNIQUE (id_akun);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_nip_key UNIQUE (nip);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.pemeriksaan_ranap_structure
    ADD CONSTRAINT pemeriksaan_ranap_pkey PRIMARY KEY (no_rawat, tgl_perawatan, jam_rawat);

ALTER TABLE ONLY sik.penerimaan_barang_medis_structure
    ADD CONSTRAINT penerimaan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.penggajian_structure
    ADD CONSTRAINT penggajian_pkey PRIMARY KEY (no_pegawai, tahun, bulan);

ALTER TABLE ONLY sik.permintaan_resep_pulang_structure
    ADD CONSTRAINT permintaan_resep_pulang_pkey PRIMARY KEY (no_permintaan);

ALTER TABLE ONLY sik.permintaan_stok_obat_structure
    ADD CONSTRAINT permintaan_stok_obat_pkey PRIMARY KEY (no_permintaan);

ALTER TABLE ONLY sik.pesangon_structure
    ADD CONSTRAINT pesangon_pkey PRIMARY KEY (no_pesangon);

ALTER TABLE ONLY sik.data_phk_structure
    ADD CONSTRAINT phk_pkey PRIMARY KEY (no_pegawai);

ALTER TABLE ONLY sik.pph21_structure
    ADD CONSTRAINT pph21_pkey PRIMARY KEY (no_pph21);

ALTER TABLE ONLY sik.presensi_structure
    ADD CONSTRAINT presensi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.ptkp_structure
    ADD CONSTRAINT ptkp_pkey PRIMARY KEY (no_ptkp);

ALTER TABLE ONLY sik.rawat_inap_structure
    ADD CONSTRAINT rawat_inap_pkey PRIMARY KEY (nomor_rawat);

ALTER TABLE ONLY sik.registrasi_structure
    ADD CONSTRAINT registrasi_pkey PRIMARY KEY (nomor_reg);

ALTER TABLE ONLY sik.resep_dokter_racikan_detail_structure
    ADD CONSTRAINT resep_dokter_racikan_d_pkey PRIMARY KEY (no_resep, no_racik, kode_brng);

ALTER TABLE ONLY sik.resep_dokter_racikan_structure
    ADD CONSTRAINT resep_dokter_racikan_pkey PRIMARY KEY (no_resep, no_racik);

ALTER TABLE ONLY sik.resep_obat_structure
    ADD CONSTRAINT resep_obat_pkey PRIMARY KEY (no_resep);

ALTER TABLE ONLY sik.resep_pulang_structure
    ADD CONSTRAINT resep_pulang_pkey PRIMARY KEY (no_rawat, kode_brng, tanggal, jam);

ALTER TABLE ONLY sik.role_structure
    ADD CONSTRAINT role_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.ruangan_structure
    ADD CONSTRAINT ruangan_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.rujukan_keluar_structure
    ADD CONSTRAINT rujukan_keluar_pkey PRIMARY KEY (nomor_rawat);

ALTER TABLE ONLY sik.rujukan_masuk_structure
    ADD CONSTRAINT rujukan_masuk_pkey PRIMARY KEY (nomor_rawat);

ALTER TABLE ONLY sik.satuan_barang_medis_structure
    ADD CONSTRAINT satuan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.shift_structure
    ADD CONSTRAINT shift_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.status_aktif_pegawai_structure
    ADD CONSTRAINT status_aktif_pegawai_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.stok_keluar_barang_medis_structure
    ADD CONSTRAINT stok_keluar_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.supplier_barang_medis_structure
    ADD CONSTRAINT supplier_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.tarif_tindakan_structure
    ADD CONSTRAINT tarif_tindakan_pkey PRIMARY KEY (kode);

ALTER TABLE ONLY sik.thr_structure
    ADD CONSTRAINT thr_pkey PRIMARY KEY (no_thr);

ALTER TABLE ONLY sik.transaksi_keluar_barang_medis_structure
    ADD CONSTRAINT transaksi_keluar_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.tukar_jadwal_structure
    ADD CONSTRAINT tukar_jadwal_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.ugd_structure
    ADD CONSTRAINT ugd_pkey PRIMARY KEY (nomor_reg);

ALTER TABLE ONLY sik.umr_structure
    ADD CONSTRAINT umr_pkey PRIMARY KEY (no_umr);

ALTER TABLE ONLY sik.upmk_structure
    ADD CONSTRAINT upmk_pkey PRIMARY KEY (no_upmk);

ALTER TABLE ONLY sik.akun_structure
    ADD CONSTRAINT akun_role_fkey FOREIGN KEY (role) REFERENCES ref.role_structure(id);

ALTER TABLE ONLY sik.alamat_structure
    ADD CONSTRAINT alamat_id_akun_fkey FOREIGN KEY (id_akun) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.alamat_structure
    ADD CONSTRAINT alamat_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_id_golongan_fkey FOREIGN KEY (id_golongan) REFERENCES ref.golongan_barang_medis_structure(id);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_id_industri_fkey FOREIGN KEY (id_industri) REFERENCES ref.industri_farmasi_structure(id);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_id_jenis_fkey FOREIGN KEY (id_jenis) REFERENCES ref.jenis_barang_medis_structure(id);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_id_kategori_fkey FOREIGN KEY (id_kategori) REFERENCES ref.kategori_barang_medis_structure(id);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_id_satbesar_fkey FOREIGN KEY (id_satbesar) REFERENCES ref.satuan_barang_medis_structure(id);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_id_satuan_fkey FOREIGN KEY (id_satuan) REFERENCES ref.satuan_barang_medis_structure(id);

ALTER TABLE ONLY sik.berkas_pegawai_structure
    ADD CONSTRAINT berkas_pegawai_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.berkas_pegawai_structure
    ADD CONSTRAINT berkas_pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.cuti_structure
    ADD CONSTRAINT cuti_id_alasan_cuti_fkey FOREIGN KEY (id_alasan_cuti) REFERENCES ref.alasan_cuti_structure(id);

ALTER TABLE ONLY sik.cuti_structure
    ADD CONSTRAINT cuti_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.cuti_structure
    ADD CONSTRAINT cuti_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.data_batch_structure
    ADD CONSTRAINT data_batch_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis_structure(id);

ALTER TABLE ONLY sik.registrasi_structure
    ADD CONSTRAINT fk_kode_dokter FOREIGN KEY (kode_dokter) REFERENCES sik.dokter_structure(kode_dokter);

ALTER TABLE ONLY sik.foto_pegawai_structure
    ADD CONSTRAINT foto_pegawai_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.foto_pegawai_structure
    ADD CONSTRAINT foto_pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.gudang_barang_structure
    ADD CONSTRAINT gudang_barang_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan_structure(id);

ALTER TABLE ONLY sik.jadwal_pegawai_structure
    ADD CONSTRAINT jadwal_pegawai_id_hari_fkey FOREIGN KEY (id_hari) REFERENCES ref.hari_structure(id);

ALTER TABLE ONLY sik.jadwal_pegawai_structure
    ADD CONSTRAINT jadwal_pegawai_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.jadwal_pegawai_structure
    ADD CONSTRAINT jadwal_pegawai_id_shift_fkey FOREIGN KEY (id_shift) REFERENCES ref.shift_structure(id);

ALTER TABLE ONLY sik.jadwal_pegawai_structure
    ADD CONSTRAINT jadwal_pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.mutasi_barang_structure
    ADD CONSTRAINT mutasi_barang_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis_structure(id);

ALTER TABLE ONLY sik.mutasi_barang_structure
    ADD CONSTRAINT mutasi_barang_id_ruangandari_fkey FOREIGN KEY (id_ruangandari) REFERENCES ref.ruangan_structure(id);

ALTER TABLE ONLY sik.mutasi_barang_structure
    ADD CONSTRAINT mutasi_barang_id_ruanganke_fkey FOREIGN KEY (id_ruanganke) REFERENCES ref.ruangan_structure(id);

ALTER TABLE ONLY sik.notifikasi_structure
    ADD CONSTRAINT notifikasi_recipient_fkey FOREIGN KEY (recipient) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.notifikasi_structure
    ADD CONSTRAINT notifikasi_sender_fkey FOREIGN KEY (sender) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.opname_structure
    ADD CONSTRAINT opname_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis_structure(id);

ALTER TABLE ONLY sik.opname_structure
    ADD CONSTRAINT opname_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan_structure(id);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_id_akun_fkey FOREIGN KEY (id_akun) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_id_departemen_fkey FOREIGN KEY (id_departemen) REFERENCES ref.departemen_structure(id);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_id_jabatan_fkey FOREIGN KEY (id_jabatan) REFERENCES ref.jabatan_structure(id);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_id_status_aktif_fkey FOREIGN KEY (id_status_aktif) REFERENCES ref.status_aktif_pegawai_structure(id);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.penerimaan_barang_medis_structure
    ADD CONSTRAINT penerimaan_barang_medis_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.penerimaan_barang_medis_structure
    ADD CONSTRAINT penerimaan_barang_medis_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan_structure(id);

ALTER TABLE ONLY sik.presensi_structure
    ADD CONSTRAINT presensi_id_jadwal_pegawai_fkey FOREIGN KEY (id_jadwal_pegawai) REFERENCES sik.jadwal_pegawai_structure(id);

ALTER TABLE ONLY sik.presensi_structure
    ADD CONSTRAINT presensi_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.presensi_structure
    ADD CONSTRAINT presensi_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.stok_keluar_barang_medis_structure
    ADD CONSTRAINT stok_keluar_barang_medis_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.stok_keluar_barang_medis_structure
    ADD CONSTRAINT stok_keluar_barang_medis_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan_structure(id);

ALTER TABLE ONLY sik.transaksi_keluar_barang_medis_structure
    ADD CONSTRAINT transaksi_keluar_barang_medis_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis_structure(id);

ALTER TABLE ONLY sik.transaksi_keluar_barang_medis_structure
    ADD CONSTRAINT transaksi_keluar_barang_medis_id_stok_keluar_fkey FOREIGN KEY (id_stok_keluar) REFERENCES sik.stok_keluar_barang_medis_structure(id);

ALTER TABLE ONLY sik.tukar_jadwal_structure
    ADD CONSTRAINT tukar_jadwal_id_hari_fkey FOREIGN KEY (id_hari) REFERENCES ref.hari_structure(id);

ALTER TABLE ONLY sik.tukar_jadwal_structure
    ADD CONSTRAINT tukar_jadwal_id_recipient_fkey FOREIGN KEY (id_recipient) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.tukar_jadwal_structure
    ADD CONSTRAINT tukar_jadwal_id_sender_fkey FOREIGN KEY (id_sender) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.tukar_jadwal_structure
    ADD CONSTRAINT tukar_jadwal_id_shift_recipient_fkey FOREIGN KEY (id_shift_recipient) REFERENCES ref.shift_structure(id);

ALTER TABLE ONLY sik.tukar_jadwal_structure
    ADD CONSTRAINT tukar_jadwal_id_shift_sender_fkey FOREIGN KEY (id_shift_sender) REFERENCES ref.shift_structure(id);

ALTER TABLE ONLY sik.data_instansi_structure
    ADD CONSTRAINT data_instansi_pkey PRIMARY KEY (kode_instansi);

ALTER TABLE ONLY sik.dokter_jaga_structure
    ADD CONSTRAINT dokter_jaga_structure_pkey PRIMARY KEY (kode_dokter);

ALTER TABLE ONLY sik.dokter_jaga_structure
    ADD CONSTRAINT fk_dokterjaga_kode FOREIGN KEY (kode_dokter) REFERENCES sik.dokter_structure(kode_dokter) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY sik.dokter_structure
    ADD CONSTRAINT dokter_pkey PRIMARY KEY (kode_dokter);

ALTER TABLE ONLY sik.kelahiran_bayi_structure
    ADD CONSTRAINT kelahiran_bayi_pkey PRIMARY KEY (no_rkm_medis);

ALTER TABLE ONLY sik.pasien_meninggal_structure
    ADD CONSTRAINT pasien_meninggal_pkey PRIMARY KEY (no_rkm_medis);

ALTER TABLE ONLY sik.pasien_structure
    ADD CONSTRAINT pasien_pkey PRIMARY KEY (no_rkm_medis);

ALTER TABLE ONLY sik.registrasi_structure
    ADD CONSTRAINT registrasi_pkey PRIMARY KEY (nomor_reg);

ALTER TABLE ONLY public.alasan_cuti_structure
    ADD CONSTRAINT alasan_cuti_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.departemen_structure
    ADD CONSTRAINT departemen_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.golongan_barang_medis_structure
    ADD CONSTRAINT golongan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.hari_structure
    ADD CONSTRAINT hari_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.industri_farmasi_structure
    ADD CONSTRAINT industri_farmasi_kode_key UNIQUE (kode);

ALTER TABLE ONLY public.industri_farmasi_structure
    ADD CONSTRAINT industri_farmasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.jenis_barang_medis_structure
    ADD CONSTRAINT jenis_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.kategori_barang_medis_structure
    ADD CONSTRAINT kategori_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.organisasi_structure
    ADD CONSTRAINT organisasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.role_structure
    ADD CONSTRAINT role_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.ruangan_structure
    ADD CONSTRAINT ruangan_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.satuan_barang_medis_structure
    ADD CONSTRAINT satuan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.shift_structure
    ADD CONSTRAINT shift_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.status_aktif_pegawai_structure
    ADD CONSTRAINT status_aktif_pegawai_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.supplier_barang_medis_structure
    ADD CONSTRAINT supplier_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.alasan_cuti_structure
    ADD CONSTRAINT alasan_cuti_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.departemen_structure
    ADD CONSTRAINT departemen_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.golongan_barang_medis_structure
    ADD CONSTRAINT golongan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.hari_structure
    ADD CONSTRAINT hari_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.industri_farmasi_structure
    ADD CONSTRAINT industri_farmasi_kode_key UNIQUE (kode);

ALTER TABLE ONLY ref.industri_farmasi_structure
    ADD CONSTRAINT industri_farmasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.jenis_barang_medis_structure
    ADD CONSTRAINT jenis_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.kategori_barang_medis_structure
    ADD CONSTRAINT kategori_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.organisasi_structure
    ADD CONSTRAINT organisasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.role_structure
    ADD CONSTRAINT role_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.ruangan_structure
    ADD CONSTRAINT ruangan_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.satuan_barang_medis_structure
    ADD CONSTRAINT satuan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.shift_structure
    ADD CONSTRAINT shift_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.status_aktif_pegawai_structure
    ADD CONSTRAINT status_aktif_pegawai_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.supplier_barang_medis_structure
    ADD CONSTRAINT supplier_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.akun_structure
    ADD CONSTRAINT akun_email_key UNIQUE (email);

ALTER TABLE ONLY sik.akun_structure
    ADD CONSTRAINT akun_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.alamat_structure
    ADD CONSTRAINT alamat_pkey PRIMARY KEY (id_akun);

ALTER TABLE ONLY sik.alasan_cuti_structure
    ADD CONSTRAINT alasan_cuti_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.ambulans_structure
    ADD CONSTRAINT ambulans_pkey PRIMARY KEY (no_ambulans);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_kode_barang_key UNIQUE (kode_barang);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.berkas_pegawai_structure
    ADD CONSTRAINT berkas_pegawai_nik_key UNIQUE (nik);

ALTER TABLE ONLY sik.berkas_pegawai_structure
    ADD CONSTRAINT berkas_pegawai_pkey PRIMARY KEY (id_pegawai);

ALTER TABLE ONLY sik.catatan_observasi_ranap_kebidanan_structure
    ADD CONSTRAINT catatan_observasi_ranap_kebidanan_pkey PRIMARY KEY (no_rawat, tgl_perawatan, jam_rawat);

ALTER TABLE ONLY sik.cuti_structure
    ADD CONSTRAINT cuti_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.data_batch_structure
    ADD CONSTRAINT data_batch_pkey PRIMARY KEY (no_batch, id_barang_medis, no_faktur);

ALTER TABLE ONLY sik.data_instansi_structure
    ADD CONSTRAINT data_instansi_pkey PRIMARY KEY (kode_instansi);

ALTER TABLE ONLY sik.databarang_structure
    ADD CONSTRAINT databarang_pkey PRIMARY KEY (kode_brng);

ALTER TABLE ONLY sik.departemen_structure
    ADD CONSTRAINT departemen_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.detail_penerimaan_barang_medis_structure
    ADD CONSTRAINT detail_penerimaan_barang_medis_pkey PRIMARY KEY (id_penerimaan, id_barang_medis);

ALTER TABLE ONLY sik.resume_pasien_ranap_structure
    ADD CONSTRAINT discharge_summary_pkey PRIMARY KEY (no_rawat);

ALTER TABLE ONLY sik.dokter_structure
    ADD CONSTRAINT dokter_pkey PRIMARY KEY (kode_dokter);

ALTER TABLE ONLY sik.foto_pegawai_structure
    ADD CONSTRAINT foto_pegawai_pkey PRIMARY KEY (id_pegawai);

ALTER TABLE ONLY sik.golongan_barang_medis_structure
    ADD CONSTRAINT golongan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.gudang_barang_structure
    ADD CONSTRAINT gudang_barang_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.hari_structure
    ADD CONSTRAINT hari_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.industri_farmasi_structure
    ADD CONSTRAINT industri_farmasi_kode_key UNIQUE (kode);

ALTER TABLE ONLY sik.industri_farmasi_structure
    ADD CONSTRAINT industri_farmasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.jadwal_pegawai_structure
    ADD CONSTRAINT jadwal_pegawai_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.jenis_barang_medis_structure
    ADD CONSTRAINT jenis_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.jenis_tindakan_structure
    ADD CONSTRAINT jenis_tindakan_pkey PRIMARY KEY (kode);

ALTER TABLE ONLY sik.kamar_structure
    ADD CONSTRAINT kamar_pkey PRIMARY KEY (nomor_bed);

ALTER TABLE ONLY sik.kategori_barang_medis_structure
    ADD CONSTRAINT kategori_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.mutasi_barang_structure
    ADD CONSTRAINT mutasi_barang_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.notifikasi_structure
    ADD CONSTRAINT notifikasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.opname_structure
    ADD CONSTRAINT opname_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.organisasi_structure
    ADD CONSTRAINT organisasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.pasien_meninggal_structure
    ADD CONSTRAINT pasien_meninggal_pkey PRIMARY KEY (no_rkm_medis);

ALTER TABLE ONLY sik.pasien_structure
    ADD CONSTRAINT pasien_pkey PRIMARY KEY (no_rkm_medis);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_id_akun_key UNIQUE (id_akun);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_nip_key UNIQUE (nip);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.pemeriksaan_ranap_structure
    ADD CONSTRAINT pemeriksaan_ranap_pkey PRIMARY KEY (no_rawat, tgl_perawatan, jam_rawat);

ALTER TABLE ONLY sik.penerimaan_barang_medis_structure
    ADD CONSTRAINT penerimaan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.permintaan_resep_pulang_structure
    ADD CONSTRAINT permintaan_resep_pulang_pkey PRIMARY KEY (no_permintaan);

ALTER TABLE ONLY sik.permintaan_stok_obat_structure
    ADD CONSTRAINT permintaan_stok_obat_pkey PRIMARY KEY (no_permintaan);

ALTER TABLE ONLY sik.presensi_structure
    ADD CONSTRAINT presensi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.rawat_inap_structure
    ADD CONSTRAINT rawat_inap_pkey PRIMARY KEY (nomor_rawat);

ALTER TABLE ONLY sik.registrasi_structure
    ADD CONSTRAINT registrasi_pkey PRIMARY KEY (nomor_reg);

ALTER TABLE ONLY sik.resep_dokter_racikan_detail_structure
    ADD CONSTRAINT resep_dokter_racikan_d_pkey PRIMARY KEY (no_resep, no_racik, kode_brng);

ALTER TABLE ONLY sik.resep_dokter_racikan_structure
    ADD CONSTRAINT resep_dokter_racikan_pkey PRIMARY KEY (no_resep, no_racik);

ALTER TABLE ONLY sik.resep_obat_structure
    ADD CONSTRAINT resep_obat_pkey PRIMARY KEY (no_resep);

ALTER TABLE ONLY sik.resep_pulang_structure
    ADD CONSTRAINT resep_pulang_pkey PRIMARY KEY (no_rawat, kode_brng, tanggal, jam);

ALTER TABLE ONLY sik.role_structure
    ADD CONSTRAINT role_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.ruangan_structure
    ADD CONSTRAINT ruangan_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.rujukan_keluar_structure
    ADD CONSTRAINT rujukan_keluar_pkey PRIMARY KEY (nomor_rawat);

ALTER TABLE ONLY sik.rujukan_masuk_structure
    ADD CONSTRAINT rujukan_masuk_pkey PRIMARY KEY (nomor_rawat);

ALTER TABLE ONLY sik.satuan_barang_medis_structure
    ADD CONSTRAINT satuan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.shift_structure
    ADD CONSTRAINT shift_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.status_aktif_pegawai_structure
    ADD CONSTRAINT status_aktif_pegawai_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.stok_keluar_barang_medis_structure
    ADD CONSTRAINT stok_keluar_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.supplier_barang_medis_structure
    ADD CONSTRAINT supplier_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.tarif_tindakan_structure
    ADD CONSTRAINT tarif_tindakan_pkey PRIMARY KEY (kode);

ALTER TABLE ONLY sik.transaksi_keluar_barang_medis_structure
    ADD CONSTRAINT transaksi_keluar_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.tukar_jadwal_structure
    ADD CONSTRAINT tukar_jadwal_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.ugd_structure
    ADD CONSTRAINT ugd_pkey PRIMARY KEY (nomor_reg);

ALTER TABLE ONLY sik.pemberian_obat_structure
    ADD CONSTRAINT unique_nomor_rawat_tanggal_jam UNIQUE (nomor_rawat, tanggal_beri, jam_beri);

ALTER TABLE ONLY sik.akun_structure
    ADD CONSTRAINT akun_role_fkey FOREIGN KEY (role) REFERENCES ref.role_structure(id);

ALTER TABLE ONLY sik.alamat_structure
    ADD CONSTRAINT alamat_id_akun_fkey FOREIGN KEY (id_akun) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.alamat_structure
    ADD CONSTRAINT alamat_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_id_golongan_fkey FOREIGN KEY (id_golongan) REFERENCES ref.golongan_barang_medis_structure(id);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_id_industri_fkey FOREIGN KEY (id_industri) REFERENCES ref.industri_farmasi_structure(id);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_id_jenis_fkey FOREIGN KEY (id_jenis) REFERENCES ref.jenis_barang_medis_structure(id);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_id_kategori_fkey FOREIGN KEY (id_kategori) REFERENCES ref.kategori_barang_medis_structure(id);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_id_satbesar_fkey FOREIGN KEY (id_satbesar) REFERENCES ref.satuan_barang_medis_structure(id);

ALTER TABLE ONLY sik.barang_medis_structure
    ADD CONSTRAINT barang_medis_id_satuan_fkey FOREIGN KEY (id_satuan) REFERENCES ref.satuan_barang_medis_structure(id);

ALTER TABLE ONLY sik.berkas_pegawai_structure
    ADD CONSTRAINT berkas_pegawai_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.berkas_pegawai_structure
    ADD CONSTRAINT berkas_pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.cuti_structure
    ADD CONSTRAINT cuti_id_alasan_cuti_fkey FOREIGN KEY (id_alasan_cuti) REFERENCES ref.alasan_cuti_structure(id);

ALTER TABLE ONLY sik.cuti_structure
    ADD CONSTRAINT cuti_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.cuti_structure
    ADD CONSTRAINT cuti_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.data_batch_structure
    ADD CONSTRAINT data_batch_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis_structure(id);

ALTER TABLE ONLY sik.dokter_jaga_structure
    ADD CONSTRAINT fk_dokterjaga_kode FOREIGN KEY (kode_dokter) REFERENCES sik.dokter_structure(kode_dokter) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY sik.foto_pegawai_structure
    ADD CONSTRAINT foto_pegawai_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.foto_pegawai_structure
    ADD CONSTRAINT foto_pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.gudang_barang_structure
    ADD CONSTRAINT gudang_barang_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan_structure(id);

ALTER TABLE ONLY sik.jadwal_pegawai_structure
    ADD CONSTRAINT jadwal_pegawai_id_hari_fkey FOREIGN KEY (id_hari) REFERENCES ref.hari_structure(id);

ALTER TABLE ONLY sik.jadwal_pegawai_structure
    ADD CONSTRAINT jadwal_pegawai_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.jadwal_pegawai_structure
    ADD CONSTRAINT jadwal_pegawai_id_shift_fkey FOREIGN KEY (id_shift) REFERENCES ref.shift_structure(id);

ALTER TABLE ONLY sik.jadwal_pegawai_structure
    ADD CONSTRAINT jadwal_pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.mutasi_barang_structure
    ADD CONSTRAINT mutasi_barang_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis_structure(id);

ALTER TABLE ONLY sik.mutasi_barang_structure
    ADD CONSTRAINT mutasi_barang_id_ruangandari_fkey FOREIGN KEY (id_ruangandari) REFERENCES ref.ruangan_structure(id);

ALTER TABLE ONLY sik.mutasi_barang_structure
    ADD CONSTRAINT mutasi_barang_id_ruanganke_fkey FOREIGN KEY (id_ruanganke) REFERENCES ref.ruangan_structure(id);

ALTER TABLE ONLY sik.notifikasi_structure
    ADD CONSTRAINT notifikasi_recipient_fkey FOREIGN KEY (recipient) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.notifikasi_structure
    ADD CONSTRAINT notifikasi_sender_fkey FOREIGN KEY (sender) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.opname_structure
    ADD CONSTRAINT opname_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis_structure(id);

ALTER TABLE ONLY sik.opname_structure
    ADD CONSTRAINT opname_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan_structure(id);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_id_akun_fkey FOREIGN KEY (id_akun) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_id_departemen_fkey FOREIGN KEY (id_departemen) REFERENCES ref.departemen_structure(id);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_id_jabatan_fkey FOREIGN KEY (id_jabatan) REFERENCES ref.jabatan_structure(id);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_id_status_aktif_fkey FOREIGN KEY (id_status_aktif) REFERENCES ref.status_aktif_pegawai_structure(id);

ALTER TABLE ONLY sik.pegawai_structure
    ADD CONSTRAINT pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.penerimaan_barang_medis_structure
    ADD CONSTRAINT penerimaan_barang_medis_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.penerimaan_barang_medis_structure
    ADD CONSTRAINT penerimaan_barang_medis_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan_structure(id);

ALTER TABLE ONLY sik.presensi_structure
    ADD CONSTRAINT presensi_id_jadwal_pegawai_fkey FOREIGN KEY (id_jadwal_pegawai) REFERENCES sik.jadwal_pegawai_structure(id);

ALTER TABLE ONLY sik.presensi_structure
    ADD CONSTRAINT presensi_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.presensi_structure
    ADD CONSTRAINT presensi_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun_structure(id);

ALTER TABLE ONLY sik.stok_keluar_barang_medis_structure
    ADD CONSTRAINT stok_keluar_barang_medis_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.stok_keluar_barang_medis_structure
    ADD CONSTRAINT stok_keluar_barang_medis_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan_structure(id);

ALTER TABLE ONLY sik.transaksi_keluar_barang_medis_structure
    ADD CONSTRAINT transaksi_keluar_barang_medis_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis_structure(id);

ALTER TABLE ONLY sik.transaksi_keluar_barang_medis_structure
    ADD CONSTRAINT transaksi_keluar_barang_medis_id_stok_keluar_fkey FOREIGN KEY (id_stok_keluar) REFERENCES sik.stok_keluar_barang_medis_structure(id);

ALTER TABLE ONLY sik.tukar_jadwal_structure
    ADD CONSTRAINT tukar_jadwal_id_hari_fkey FOREIGN KEY (id_hari) REFERENCES ref.hari_structure(id);

ALTER TABLE ONLY sik.tukar_jadwal_structure
    ADD CONSTRAINT tukar_jadwal_id_recipient_fkey FOREIGN KEY (id_recipient) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.tukar_jadwal_structure
    ADD CONSTRAINT tukar_jadwal_id_sender_fkey FOREIGN KEY (id_sender) REFERENCES sik.pegawai_structure(id);

ALTER TABLE ONLY sik.tukar_jadwal_structure
    ADD CONSTRAINT tukar_jadwal_id_shift_recipient_fkey FOREIGN KEY (id_shift_recipient) REFERENCES ref.shift_structure(id);

ALTER TABLE ONLY sik.tukar_jadwal_structure
    ADD CONSTRAINT tukar_jadwal_id_shift_sender_fkey FOREIGN KEY (id_shift_sender) REFERENCES ref.shift_structure(id);

ALTER TABLE ONLY ref.alasan_cuti
    ADD CONSTRAINT alasan_cuti_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.departemen
    ADD CONSTRAINT departemen_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.golongan_barang_medis
    ADD CONSTRAINT golongan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.hari
    ADD CONSTRAINT hari_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.industri_farmasi
    ADD CONSTRAINT industri_farmasi_kode_key UNIQUE (kode);

ALTER TABLE ONLY ref.industri_farmasi
    ADD CONSTRAINT industri_farmasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.jabatan
    ADD CONSTRAINT jabatan_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.jenis_barang_medis
    ADD CONSTRAINT jenis_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.kategori_barang_medis
    ADD CONSTRAINT kategori_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.organisasi
    ADD CONSTRAINT organisasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.role
    ADD CONSTRAINT role_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.ruangan
    ADD CONSTRAINT ruangan_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.satuan_barang_medis
    ADD CONSTRAINT satuan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.shift
    ADD CONSTRAINT shift_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.status_aktif_pegawai
    ADD CONSTRAINT status_aktif_pegawai_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ref.supplier_barang_medis
    ADD CONSTRAINT supplier_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.akun
    ADD CONSTRAINT akun_email_key UNIQUE (email);

ALTER TABLE ONLY sik.akun
    ADD CONSTRAINT akun_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.alamat
    ADD CONSTRAINT alamat_pkey PRIMARY KEY (id_akun);

ALTER TABLE ONLY sik.alasan_cuti
    ADD CONSTRAINT alasan_cuti_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.ambulans
    ADD CONSTRAINT ambulans_pkey PRIMARY KEY (no_ambulans);

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_kode_barang_key UNIQUE (kode_barang);

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.berkas_pegawai
    ADD CONSTRAINT berkas_pegawai_nik_key UNIQUE (nik);

ALTER TABLE ONLY sik.berkas_pegawai
    ADD CONSTRAINT berkas_pegawai_pkey PRIMARY KEY (id_pegawai);

ALTER TABLE ONLY sik.catatan_observasi_ranap_kebidanan
    ADD CONSTRAINT catatan_observasi_ranap_kebidanan_pkey PRIMARY KEY (no_rawat, tgl_perawatan, jam_rawat);

ALTER TABLE ONLY sik.cuti
    ADD CONSTRAINT cuti_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.data_batch
    ADD CONSTRAINT data_batch_pkey PRIMARY KEY (no_batch, id_barang_medis, no_faktur);

ALTER TABLE ONLY sik.databarang
    ADD CONSTRAINT databarang_pkey PRIMARY KEY (kode_brng);

ALTER TABLE ONLY sik.departemen
    ADD CONSTRAINT departemen_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.detail_penerimaan_barang_medis
    ADD CONSTRAINT detail_penerimaan_barang_medis_pkey PRIMARY KEY (id_penerimaan, id_barang_medis);

ALTER TABLE ONLY sik.resume_pasien_ranap
    ADD CONSTRAINT discharge_summary_pkey PRIMARY KEY (no_rawat);

ALTER TABLE ONLY sik.dokter
    ADD CONSTRAINT dokter_pkey PRIMARY KEY (kode_dokter);

ALTER TABLE ONLY sik.foto_pegawai
    ADD CONSTRAINT foto_pegawai_pkey PRIMARY KEY (id_pegawai);

ALTER TABLE ONLY sik.golongan_barang_medis
    ADD CONSTRAINT golongan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.gudang_barang
    ADD CONSTRAINT gudang_barang_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.hari
    ADD CONSTRAINT hari_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.industri_farmasi
    ADD CONSTRAINT industri_farmasi_kode_key UNIQUE (kode);

ALTER TABLE ONLY sik.industri_farmasi
    ADD CONSTRAINT industri_farmasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.jabatan
    ADD CONSTRAINT jabatan_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.jadwal_pegawai
    ADD CONSTRAINT jadwal_pegawai_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.jenis_barang_medis
    ADD CONSTRAINT jenis_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.jenis_tindakan
    ADD CONSTRAINT jenis_tindakan_pkey PRIMARY KEY (kode);

ALTER TABLE ONLY sik.kamar
    ADD CONSTRAINT kamar_pkey PRIMARY KEY (nomor_bed);

ALTER TABLE ONLY sik.kategori_barang_medis
    ADD CONSTRAINT kategori_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.mutasi_barang
    ADD CONSTRAINT mutasi_barang_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.notifikasi
    ADD CONSTRAINT notifikasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.opname
    ADD CONSTRAINT opname_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.organisasi
    ADD CONSTRAINT organisasi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.pasien
    ADD CONSTRAINT pasien_pkey PRIMARY KEY (no_rkm_medis);

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_id_akun_key UNIQUE (id_akun);

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_nip_key UNIQUE (nip);

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.pemeriksaan_ranap
    ADD CONSTRAINT pemeriksaan_ranap_pkey PRIMARY KEY (no_rawat, tgl_perawatan, jam_rawat);

ALTER TABLE ONLY sik.penerimaan_barang_medis
    ADD CONSTRAINT penerimaan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.permintaan_resep_pulang
    ADD CONSTRAINT permintaan_resep_pulang_pkey PRIMARY KEY (no_permintaan);

ALTER TABLE ONLY sik.permintaan_stok_obat
    ADD CONSTRAINT permintaan_stok_obat_pkey PRIMARY KEY (no_permintaan);

ALTER TABLE ONLY sik.presensi
    ADD CONSTRAINT presensi_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.rawat_inap
    ADD CONSTRAINT rawat_inap_pkey PRIMARY KEY (nomor_rawat);

ALTER TABLE ONLY sik.registrasi
    ADD CONSTRAINT registrasi_pkey PRIMARY KEY (nomor_reg);

ALTER TABLE ONLY sik.resep_dokter_racikan_detail
    ADD CONSTRAINT resep_dokter_racikan_d_pkey PRIMARY KEY (no_resep, no_racik, kode_brng);

ALTER TABLE ONLY sik.resep_dokter_racikan
    ADD CONSTRAINT resep_dokter_racikan_pkey PRIMARY KEY (no_resep, no_racik);

ALTER TABLE ONLY sik.resep_obat
    ADD CONSTRAINT resep_obat_pkey PRIMARY KEY (no_resep);

ALTER TABLE ONLY sik.resep_pulang
    ADD CONSTRAINT resep_pulang_pkey PRIMARY KEY (no_rawat, kode_brng, tanggal, jam);

ALTER TABLE ONLY sik.role
    ADD CONSTRAINT role_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.ruangan
    ADD CONSTRAINT ruangan_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.rujukan_keluar
    ADD CONSTRAINT rujukan_keluar_pkey PRIMARY KEY (nomor_rawat);

ALTER TABLE ONLY sik.rujukan_masuk
    ADD CONSTRAINT rujukan_masuk_pkey PRIMARY KEY (nomor_rawat);

ALTER TABLE ONLY sik.satuan_barang_medis
    ADD CONSTRAINT satuan_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.shift
    ADD CONSTRAINT shift_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.status_aktif_pegawai
    ADD CONSTRAINT status_aktif_pegawai_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.stok_keluar_barang_medis
    ADD CONSTRAINT stok_keluar_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.supplier_barang_medis
    ADD CONSTRAINT supplier_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.tarif_tindakan
    ADD CONSTRAINT tarif_tindakan_pkey PRIMARY KEY (kode);

ALTER TABLE ONLY sik.transaksi_keluar_barang_medis
    ADD CONSTRAINT transaksi_keluar_barang_medis_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.tukar_jadwal
    ADD CONSTRAINT tukar_jadwal_pkey PRIMARY KEY (id);

ALTER TABLE ONLY sik.ugd
    ADD CONSTRAINT ugd_pkey PRIMARY KEY (nomor_reg);

ALTER TABLE ONLY sik.pemberian_obat
    ADD CONSTRAINT unique_nomor_rawat_tanggal_jam UNIQUE (nomor_rawat, tanggal_beri, jam_beri);


CREATE TRIGGER init_jadwal_pegawai AFTER INSERT ON sik.pegawai FOR EACH ROW EXECUTE FUNCTION sik.trigger_init_jadwal_pegawai();

CREATE TRIGGER update_jadwal_pegawai_on_delete BEFORE UPDATE ON sik.pegawai FOR EACH ROW WHEN (((old.deleted_at IS NULL) AND (new.deleted_at IS NOT NULL))) EXECUTE FUNCTION sik.trigger_update_jadwal_pegawai_on_delete();

ALTER TABLE ONLY sik.akun
    ADD CONSTRAINT akun_role_fkey FOREIGN KEY (role) REFERENCES ref.role(id);

ALTER TABLE ONLY sik.alamat
    ADD CONSTRAINT alamat_id_akun_fkey FOREIGN KEY (id_akun) REFERENCES sik.akun(id);

ALTER TABLE ONLY sik.alamat
    ADD CONSTRAINT alamat_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun(id);

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_id_golongan_fkey FOREIGN KEY (id_golongan) REFERENCES ref.golongan_barang_medis(id);

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_id_industri_fkey FOREIGN KEY (id_industri) REFERENCES ref.industri_farmasi(id);

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_id_jenis_fkey FOREIGN KEY (id_jenis) REFERENCES ref.jenis_barang_medis(id);

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_id_kategori_fkey FOREIGN KEY (id_kategori) REFERENCES ref.kategori_barang_medis(id);

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_id_satbesar_fkey FOREIGN KEY (id_satbesar) REFERENCES ref.satuan_barang_medis(id);

ALTER TABLE ONLY sik.barang_medis
    ADD CONSTRAINT barang_medis_id_satuan_fkey FOREIGN KEY (id_satuan) REFERENCES ref.satuan_barang_medis(id);

ALTER TABLE ONLY sik.berkas_pegawai
    ADD CONSTRAINT berkas_pegawai_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai(id);

ALTER TABLE ONLY sik.berkas_pegawai
    ADD CONSTRAINT berkas_pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun(id);

ALTER TABLE ONLY sik.cuti
    ADD CONSTRAINT cuti_id_alasan_cuti_fkey FOREIGN KEY (id_alasan_cuti) REFERENCES ref.alasan_cuti(id);

ALTER TABLE ONLY sik.cuti
    ADD CONSTRAINT cuti_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai(id);

ALTER TABLE ONLY sik.cuti
    ADD CONSTRAINT cuti_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun(id);

ALTER TABLE ONLY sik.data_batch
    ADD CONSTRAINT data_batch_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis(id);

ALTER TABLE ONLY sik.registrasi
    ADD CONSTRAINT fk_kode_dokter FOREIGN KEY (kode_dokter) REFERENCES sik.dokter(kode_dokter);

ALTER TABLE ONLY sik.foto_pegawai
    ADD CONSTRAINT foto_pegawai_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai(id);

ALTER TABLE ONLY sik.foto_pegawai
    ADD CONSTRAINT foto_pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun(id);

ALTER TABLE ONLY sik.gudang_barang
    ADD CONSTRAINT gudang_barang_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan(id);

ALTER TABLE ONLY sik.jadwal_pegawai
    ADD CONSTRAINT jadwal_pegawai_id_hari_fkey FOREIGN KEY (id_hari) REFERENCES ref.hari(id);

ALTER TABLE ONLY sik.jadwal_pegawai
    ADD CONSTRAINT jadwal_pegawai_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai(id);

ALTER TABLE ONLY sik.jadwal_pegawai
    ADD CONSTRAINT jadwal_pegawai_id_shift_fkey FOREIGN KEY (id_shift) REFERENCES ref.shift(id);

ALTER TABLE ONLY sik.jadwal_pegawai
    ADD CONSTRAINT jadwal_pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun(id);

ALTER TABLE ONLY sik.mutasi_barang
    ADD CONSTRAINT mutasi_barang_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis(id);

ALTER TABLE ONLY sik.mutasi_barang
    ADD CONSTRAINT mutasi_barang_id_ruangandari_fkey FOREIGN KEY (id_ruangandari) REFERENCES ref.ruangan(id);

ALTER TABLE ONLY sik.mutasi_barang
    ADD CONSTRAINT mutasi_barang_id_ruanganke_fkey FOREIGN KEY (id_ruanganke) REFERENCES ref.ruangan(id);

ALTER TABLE ONLY sik.notifikasi
    ADD CONSTRAINT notifikasi_recipient_fkey FOREIGN KEY (recipient) REFERENCES sik.akun(id);

ALTER TABLE ONLY sik.notifikasi
    ADD CONSTRAINT notifikasi_sender_fkey FOREIGN KEY (sender) REFERENCES sik.akun(id);

ALTER TABLE ONLY sik.opname
    ADD CONSTRAINT opname_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis(id);

ALTER TABLE ONLY sik.opname
    ADD CONSTRAINT opname_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan(id);

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_id_akun_fkey FOREIGN KEY (id_akun) REFERENCES sik.akun(id);

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_id_departemen_fkey FOREIGN KEY (id_departemen) REFERENCES ref.departemen(id);

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_id_jabatan_fkey FOREIGN KEY (id_jabatan) REFERENCES ref.jabatan(id);

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_id_status_aktif_fkey FOREIGN KEY (id_status_aktif) REFERENCES ref.status_aktif_pegawai(id);

ALTER TABLE ONLY sik.pegawai
    ADD CONSTRAINT pegawai_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun(id);

ALTER TABLE ONLY sik.penerimaan_barang_medis
    ADD CONSTRAINT penerimaan_barang_medis_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai(id);

ALTER TABLE ONLY sik.penerimaan_barang_medis
    ADD CONSTRAINT penerimaan_barang_medis_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan(id);

ALTER TABLE ONLY sik.presensi
    ADD CONSTRAINT presensi_id_jadwal_pegawai_fkey FOREIGN KEY (id_jadwal_pegawai) REFERENCES sik.jadwal_pegawai(id);

ALTER TABLE ONLY sik.presensi
    ADD CONSTRAINT presensi_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai(id);

ALTER TABLE ONLY sik.presensi
    ADD CONSTRAINT presensi_updater_fkey FOREIGN KEY (updater) REFERENCES sik.akun(id);

ALTER TABLE ONLY sik.stok_keluar_barang_medis
    ADD CONSTRAINT stok_keluar_barang_medis_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES sik.pegawai(id);

ALTER TABLE ONLY sik.stok_keluar_barang_medis
    ADD CONSTRAINT stok_keluar_barang_medis_id_ruangan_fkey FOREIGN KEY (id_ruangan) REFERENCES ref.ruangan(id);

ALTER TABLE ONLY sik.transaksi_keluar_barang_medis
    ADD CONSTRAINT transaksi_keluar_barang_medis_id_barang_medis_fkey FOREIGN KEY (id_barang_medis) REFERENCES sik.barang_medis(id);

ALTER TABLE ONLY sik.transaksi_keluar_barang_medis
    ADD CONSTRAINT transaksi_keluar_barang_medis_id_stok_keluar_fkey FOREIGN KEY (id_stok_keluar) REFERENCES sik.stok_keluar_barang_medis(id);

ALTER TABLE ONLY sik.tukar_jadwal
    ADD CONSTRAINT tukar_jadwal_id_hari_fkey FOREIGN KEY (id_hari) REFERENCES ref.hari(id);

ALTER TABLE ONLY sik.tukar_jadwal
    ADD CONSTRAINT tukar_jadwal_id_recipient_fkey FOREIGN KEY (id_recipient) REFERENCES sik.pegawai(id);

ALTER TABLE ONLY sik.tukar_jadwal
    ADD CONSTRAINT tukar_jadwal_id_sender_fkey FOREIGN KEY (id_sender) REFERENCES sik.pegawai(id);

ALTER TABLE ONLY sik.tukar_jadwal
    ADD CONSTRAINT tukar_jadwal_id_shift_recipient_fkey FOREIGN KEY (id_shift_recipient) REFERENCES ref.shift(id);

ALTER TABLE ONLY sik.tukar_jadwal
    ADD CONSTRAINT tukar_jadwal_id_shift_sender_fkey FOREIGN KEY (id_shift_sender) REFERENCES ref.shift(id);
