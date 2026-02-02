package entity

import "time"

type UGD struct {
	NomorReg        string    `json:"nomor_reg" db:"nomor_reg"`
	NomorRawat      string    `json:"nomor_rawat" db:"nomor_rawat"`
	Tanggal         time.Time `json:"tanggal" db:"tanggal"`
	Jam             time.Time `json:"jam" db:"jam"`
	KodeDokter      string    `json:"kode_dokter" db:"kode_dokter"`
	DokterDituju    string    `json:"dokter_dituju" db:"dokter_dituju"`
	NomorRM         string    `json:"nomor_rm" db:"nomor_rm"`
	NamaPasien      string    `json:"nama_pasien" db:"nama_pasien"`
	JenisKelamin    string    `json:"jenis_kelamin" db:"jenis_kelamin"`
	Umur            string    `json:"umur" db:"umur"`
	Poliklinik      string    `json:"poliklinik" db:"poliklinik"`
	PenanggungJawab string    `json:"penanggung_jawab" db:"penanggung_jawab"`
	AlamatPJ        string    `json:"alamat_pj" db:"alamat_pj"`
	HubunganPJ      string    `json:"hubungan_pj" db:"hubungan_pj"`
	BiayaRegistrasi float64   `json:"biaya_registrasi" db:"biaya_registrasi"`
	Status          string    `json:"status" db:"status"`
	JenisBayar      string    `json:"jenis_bayar" db:"jenis_bayar"`
	StatusRawat     string    `json:"status_rawat" db:"status_rawat"`
	StatusBayar     string    `json:"status_bayar" db:"status_bayar"`
}
