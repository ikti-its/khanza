package entity

import "time"

type RujukanKeluar struct {
	NomorRujuk         string    `json:"nomor_rujuk" db:"nomor_rujuk"`
	NomorRawat         string    `json:"nomor_rawat" db:"nomor_rawat"` // PRIMARY KEY
	NomorRM            string    `json:"nomor_rm" db:"nomor_rm"`
	NamaPasien         string    `json:"nama_pasien" db:"nama_pasien"`
	TempatRujuk        string    `json:"tempat_rujuk" db:"tempat_rujuk"`
	TanggalRujuk       time.Time `json:"tanggal_rujuk" db:"tanggal_rujuk"`
	JamRujuk           time.Time `json:"jam_rujuk" db:"jam_rujuk"`
	KeteranganDiagnosa string    `json:"keterangan_diagnosa" db:"keterangan_diagnosa"`
	DokterPerujuk      string    `json:"dokter_perujuk" db:"dokter_perujuk"`
	KategoriRujuk      string    `json:"kategori_rujuk" db:"kategori_rujuk"`
	Pengantaran        string    `json:"pengantaran" db:"pengantaran"`
	Keterangan         string    `json:"keterangan" db:"keterangan"`
}
