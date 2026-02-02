package entity

import "time"

type RujukanMasuk struct {
	NomorRujuk    string     `json:"nomor_rujuk" db:"nomor_rujuk"`
	Perujuk       string     `json:"perujuk" db:"perujuk"`
	AlamatPerujuk string     `json:"alamat_perujuk" db:"alamat_perujuk"`
	NomorRawat    string     `json:"nomor_rawat" db:"nomor_rawat"` // PRIMARY KEY
	NomorRM       string     `json:"nomor_rm" db:"nomor_rm"`
	NamaPasien    string     `json:"nama_pasien" db:"nama_pasien"`
	Alamat        string     `json:"alamat" db:"alamat"`
	Umur          string     `json:"umur" db:"umur"`
	TanggalMasuk  time.Time  `json:"tanggal_masuk" db:"tanggal_masuk"`
	TanggalKeluar *time.Time `json:"tanggal_keluar" db:"tanggal_keluar"`
	DiagnosaAwal  string     `json:"diagnosa_awal" db:"diagnosa_awal"`
}
