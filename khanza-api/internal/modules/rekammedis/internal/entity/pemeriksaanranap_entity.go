package entity

import (
	"database/sql"
	"time"
)

// PemeriksaanRanap represents the data structure for inpatient examination (pemeriksaan rawat inap).
type PemeriksaanRanap struct {
	NoRawat           string         `json:"no_rawat" db:"no_rawat" validate:"required"`
	TglPerawatan      string         `json:"tgl_perawatan" db:"tgl_perawatan" validate:"required"` // Format: YYYY-MM-DD
	JamRawat          string         `json:"jam_rawat" db:"jam_rawat" validate:"required"`         // Format: HH:MM:SS
	NomorRM           string         `json:"nomor_rm" db:"nomor_rm"`
	NamaPasien        string         `json:"nama_pasien" db:"nama_pasien"`
	JenisKelamin      string         `json:"jenis_kelamin" db:"jenis_kelamin"`
	Umur              string         `json:"umur" db:"umur"`
	KodeDokter        string         `json:"kode_dokter" db:"kode_dokter"`
	NamaDokter        string         `json:"nama_dokter" db:"nama_dokter"`
	Kelas             string         `json:"kelas" db:"kelas"`
	NomorBed          sql.NullString `json:"nomor_bed" db:"nomor_bed"`
	DiagnosaAwal      string         `json:"diagnosa_awal" db:"diagnosa_awal"`
	CatatanDokter     string         `json:"catatan_dokter" db:"catatan_dokter"`
	StatusPemeriksaan string         `json:"status_pemeriksaan" db:"status_pemeriksaan"` // Example: "selesai", "menunggu"
	SuhuTubuh         string         `json:"suhu_tubuh,omitempty" db:"suhu_tubuh"`
	Tensi             string         `json:"tensi,omitempty" db:"tensi"`
	Nadi              string         `json:"nadi,omitempty" db:"nadi"`
	Respirasi         string         `json:"respirasi,omitempty" db:"respirasi"`
	Tinggi            string         `json:"tinggi,omitempty" db:"tinggi"`
	Berat             string         `json:"berat,omitempty" db:"berat"`
	Spo2              string         `json:"spo2,omitempty" db:"spo2"`
	GCS               string         `json:"gcs,omitempty" db:"gcs"`
	Kesadaran         string         `json:"kesadaran,omitempty" db:"kesadaran"` // Example: "Compos Mentis"
	Keluhan           string         `json:"keluhan,omitempty" db:"keluhan"`
	Pemeriksaan       string         `json:"pemeriksaan,omitempty" db:"pemeriksaan"`
	Alergi            string         `json:"alergi,omitempty" db:"alergi"`
	Penilaian         string         `json:"penilaian,omitempty" db:"penilaian"`
	RTL               string         `json:"rtl,omitempty" db:"rtl"`
	Instruksi         string         `json:"instruksi,omitempty" db:"instruksi"`
	Evaluasi          string         `json:"evaluasi,omitempty" db:"evaluasi"`
	NIP               string         `json:"nip" db:"nip" validate:"required"`
	CreatedAt         *time.Time     `json:"created_at,omitempty" db:"created_at"` // ✅ Added field
}
