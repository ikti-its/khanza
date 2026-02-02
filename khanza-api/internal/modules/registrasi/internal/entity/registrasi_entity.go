package entity

import (
	"database/sql"
	"time"
)

type Registrasi struct {
	NomorReg         string         `json:"nomor_reg" db:"nomor_reg"`
	NomorRawat       string         `json:"nomor_rawat" db:"nomor_rawat"`
	Tanggal          time.Time      `json:"tanggal" db:"tanggal"`
	Jam              time.Time      `json:"jam" db:"jam"`
	KodeDokter       string         `json:"kode_dokter" db:"kode_dokter"`
	NamaDokter       string         `json:"nama_dokter" db:"nama_dokter"`
	NomorRM          string         `json:"nomor_rm" db:"nomor_rm"`
	Nama             string         `json:"nama_pasien" db:"nama_pasien"`
	JenisKelamin     string         `json:"jenis_kelamin" db:"jenis_kelamin"`
	Umur             string         `json:"umur" db:"umur"`
	Poliklinik       string         `json:"poliklinik" db:"poliklinik"`
	JenisBayar       string         `json:"jenis_bayar" db:"jenis_bayar"`
	PenanggungJawab  string         `json:"penanggung_jawab" db:"penanggung_jawab"`
	PekerjaanPJ      string         `json:"pekerjaan_pj" db:"pekerjaanpj"` // ✅ fix
	KelurahanPJ      string         `json:"kelurahan_pj" db:"kelurahanpj"`
	KecamatanPJ      string         `json:"kecamatan_pj" db:"kecamatanpj"`
	KabupatenPJ      string         `json:"kabupaten_pj" db:"kabupatenpj"`
	PropinsiPJ       string         `json:"propinsi_pj" db:"propinsipj"`
	NoTeleponPJ      string         `json:"notelp_pj" db:"notelp_pj"`
	Alamat           string         `json:"alamat_pj" db:"alamat_pj"`
	HubunganPJ       string         `json:"hubungan_pj" db:"hubungan_pj"`
	BiayaRegistrasi  float64        `json:"biaya_registrasi" db:"biaya_registrasi"`
	StatusRegistrasi string         `json:"status_registrasi" db:"status_registrasi"`
	NoTelepon        string         `json:"no_telepon" db:"no_telepon"`
	StatusRawat      string         `json:"status_rawat" db:"status_rawat"`
	StatusPoli       string         `json:"status_poli" db:"status_poli"`
	StatusBayar      string         `json:"status_bayar" db:"status_bayar"`
	StatusKamar      string         `db:"status_kamar" json:"status_kamar"`
	NomorBed         sql.NullString `db:"nomor_bed" json:"nomor_bed"`
	Kelas            string         `db:"kelas" json:"kelas"`
	NoTelpPJ         string         `json:"notelp_pj" db:"notelp_pj"`
	No_asuransi      string         `json:"no_asuransi" db:"no_asuransi"`
}
