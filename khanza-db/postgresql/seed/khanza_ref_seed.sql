-- Roles
INSERT INTO role (id, nama) VALUES (1337, 'Developer'), (1, 'Admin'), (2, 'Pegawai');

-- Modul C (Fathur, Ruben)
-- Jabatan
INSERT INTO jabatan (id, nama) VALUES (1000, 'Testing');

-- Departemen
INSERT INTO departemen (id, nama) VALUES (1000, 'Testing');

-- Status Aktif Pegawai
INSERT INTO status_aktif_pegawai (id, nama) VALUES ('A', 'Aktif'), ('BH', 'Berhenti dengan Hormat'), ('C', 'Cuti'), ('R', 'Resign'), ('BT', 'Berhenti dengan Tidak Hormat'), ('P', 'Pensiun'), ('W', 'Wafat');

-- Shift
INSERT INTO shift (id, nama, jam_masuk, jam_pulang) VALUES ('NA', 'Belum Ditentukan', '07:00:00 +07:00', '07:00:00 +07:00'), ('P', 'Pagi', '07:00:00 +07:00', '15:00:00 +07:00'), ('S', 'Sore', '15:00:00 +07:00', '23:00:00 +07:00'), ('M', 'Malam', '23:00:00 +07:00', '07:00:00 +07:00');

-- Hari
INSERT INTO hari (id, nama) VALUES (1, 'Senin'), (2, 'Selasa'), (3, 'Rabu'), (4, 'Kamis'), (5, 'Jumat'), (6, 'Sabtu'), (7, 'Minggu');

-- Alasan Cuti
INSERT INTO alasan_cuti (id, nama) VALUES ('S', 'Sakit'), ('I', 'Izin'), ('CT', 'Cuti Tahunan'), ('CB', 'Cuti Besar'), ('CM', 'Cuti Melahirkan'), ('CU', 'Cuti Karena Alasan Penting');

-- Modul D (Leo)
-- Industri Farmasi
INSERT INTO industri_farmasi (id, kode, nama, alamat, kota, telepon) VALUES ('1000', 'KLBF', 'Kalbe Farma', 'Jln. jalan', 'Jakarta','0812312312');

-- Satuan Barang Medis
INSERT INTO satuan_barang_medis (id, nama) VALUES (1, '-'), (2, 'pcs'), (3, 'tablet'), (4, 'kapsul'), (5, 'ampul'), (6, 'botol'), (7, 'tube'), (8, 'pasang'), (9, 'kotak'), (10, 'item');

-- Jenis Obat
INSERT INTO jenis_barang_medis (id, nama) VALUES ('1000', 'Obat Oral'), ('2000', 'Obat Topikal'), ('3000', 'Obat Injeksi'), ('4000', 'Obat Sublingual'), ('5000', 'Obat Infus');

-- Kategori Obat
INSERT INTO kategori_barang_medis (id, nama) VALUES ('1000', 'Obat Paten'), ('2000', 'Obat Generik'), ('3000', 'Obat Merek'), ('4000', 'Obat Eksklusif'), ('5000', 'Obat Bebas Paten');

-- Golongan Obat
INSERT INTO golongan_barang_medis (id, nama) VALUES ('1000', 'Analgesik'), ('2000', 'Antibiotik'), ('3000', 'Antijamur'), ('4000', 'Antivirus'), ('5000', 'Antasida');

-- Ruangan
INSERT INTO ruangan (id, nama) VALUES ('1000', 'Gudang'), ('2000', 'Apotek'), ('3000', 'LABORAT'), ('4000', 'HCU'), ('5000', 'ICU'), ('6000', 'IGD'), ('7000', 'Kelas 1'), ('8000', 'Kelas 2'), ('9000', 'Kelas 3'), ('10000', 'Operasi'), ('11000', 'NICU'), ('12000', 'VIP'), ('13000', 'VVIP');

-- Supplier Barang Medis
INSERT INTO supplier_barang_medis (id, nama, alamat, no_telp, kota, nama_bank, no_rekening) VALUES ('1', 'Mitra', 'Jln. Benar', '08234234','Jakarta', 'BCA','8123123');

-- Akun Bayar
-- INSERT INTO akun_bayar (id, nama_akun, nomor_rekening, nama_rekening, ppn) VALUES ('1000', 'Cash', '-', '-', '0'), ('2000', 'Transfer lewat Virtual Mandiri', '12308123123', 'Bank Mandiri', '1');
