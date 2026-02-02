package entity

import "time"

type DokterJaga struct {
	KodeDokter string    `json:"kode_dokter" db:"kode_dokter"` // VARCHAR(20)
	NamaDokter string    `json:"nama_dokter" db:"nama_dokter"` // VARCHAR(50)
	HariKerja  string    `json:"hari_kerja" db:"hari_kerja"`   // DATE
	JamMulai   time.Time `json:"jam_mulai" db:"jam_mulai"`     // TIME (stored as string in format "HH:MM:SS")
	JamSelesai time.Time `json:"jam_selesai" db:"jam_selesai"` // TIME
	Poliklinik string    `json:"poliklinik" db:"poliklinik"`   // VARCHAR(50)
	Status     string    `json:"status" db:"status"`           // VARCHAR(50)
}
