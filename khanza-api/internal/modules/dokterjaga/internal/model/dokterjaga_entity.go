package model

import "time"

type DokterJaga struct {
	KodeDokter string    `json:"kode_dokter" db:"kode_dokter"` // VARCHAR(20)
	NamaDokter string    `json:"nama_dokter" db:"nama_dokter"` // VARCHAR(50)
	HariKerja  string    `json:"hari_kerja" db:"hari_kerja"`   // DATE in "2006-01-02" format
	JamMulai   time.Time `json:"jam_mulai" db:"jam_mulai"`     // TIME in "15:04:05" format
	JamSelesai time.Time `json:"jam_selesai" db:"jam_selesai"` // TIME in "15:04:05" format
	Poliklinik string    `json:"poliklinik" db:"poliklinik"`   // VARCHAR(50)
	Status     string    `json:"status" db:"status"`           // VARCHAR(50)
}

type DokterJagaRequest struct {
	KodeDokter string `json:"kode_dokter" db:"kode_dokter"`
	NamaDokter string `json:"nama_dokter" db:"nama_dokter"`
	HariKerja  string `json:"hari_kerja" db:"hari_kerja"`
	JamMulai   string `json:"jam_mulai" db:"jam_mulai"`     // ✅ ubah jadi string
	JamSelesai string `json:"jam_selesai" db:"jam_selesai"` // ✅ ubah jadi string
	Poliklinik string `json:"poliklinik" db:"poliklinik"`
	Status     string `json:"status" db:"status"`
}

type DokterJagaResponse struct {
	KodeDokter string      `json:"kode_dokter" db:"kode_dokter"`
	NamaDokter string      `json:"nama_dokter" db:"nama_dokter"`
	HariKerja  string      `json:"hari_kerja" db:"hari_kerja"`
	JamMulai   string      `json:"jam_mulai" db:"jam_mulai"`
	JamSelesai string      `json:"jam_selesai" db:"jam_selesai"`
	Poliklinik string      `json:"poliklinik" db:"poliklinik"`
	Status     string      `json:"status" db:"status"`
	Code       int         `json:"code"`
	Data       interface{} `json:"data"`
}

type DokterJagaPageResponse struct {
	Page  int                  `json:"page"`
	Size  int                  `json:"size"`
	Total int                  `json:"total"`
	Data  []DokterJagaResponse `json:"data"`
}
