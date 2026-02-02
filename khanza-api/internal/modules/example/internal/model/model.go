package model

type Model struct {
	NomorBed    string  `json:"nomor_bed" db:"nomor_bed"`       // Primary Key, VARCHAR(20)
	KodeKamar   string  `json:"kode_kamar" db:"kode_kamar"`     // VARCHAR(20)
	NamaKamar   string  `json:"nama_kamar" db:"nama_kamar"`     // VARCHAR(50)
	Kelas       string  `json:"kelas" db:"kelas"`               // VARCHAR(50)
	TarifKamar  float64 `json:"tarif_kamar" db:"tarif_kamar"`   // NUMERIC
	StatusKamar string  `json:"status_kamar" db:"status_kamar"` // VARCHAR(20)
}

type Request struct {
	NomorBed    string  `json:"nomor_bed" db:"nomor_bed"`       // Primary Key, VARCHAR(20)
	KodeKamar   string  `json:"kode_kamar" db:"kode_kamar"`     // VARCHAR(20)
	NamaKamar   string  `json:"nama_kamar" db:"nama_kamar"`     // VARCHAR(50)
	Kelas       string  `json:"kelas" db:"kelas"`               // VARCHAR(50)
	TarifKamar  float64 `json:"tarif_kamar" db:"tarif_kamar"`   // NUMERIC
	StatusKamar string  `json:"status_kamar" db:"status_kamar"` // VARCHAR(20)
}

type Response struct {
	NomorBed    string  `json:"nomor_bed" db:"nomor_bed"`       // Primary Key, VARCHAR(20)
	KodeKamar   string  `json:"kode_kamar" db:"kode_kamar"`     // VARCHAR(20)
	NamaKamar   string  `json:"nama_kamar" db:"nama_kamar"`     // VARCHAR(50)
	Kelas       string  `json:"kelas" db:"kelas"`               // VARCHAR(50)
	TarifKamar  float64 `json:"tarif_kamar" db:"tarif_kamar"`   // NUMERIC
	StatusKamar string  `json:"status_kamar" db:"status_kamar"` // VARCHAR(20)
}
