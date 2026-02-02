package entity

type Entity struct {
	NomorBed    string  `json:"nomor_bed"    db:"nomor_bed"`       // Primary Key
	KodeKamar   string  `json:"kode_kamar"   db:"kode_kamar"`     // Column: character varying(20)
	NamaKamar   string  `json:"nama_kamar"   db:"nama_kamar"`     // Column: character varying(50)
	Kelas       string  `json:"kelas"        db:"kelas"`               // Column: character varying(50)
	TarifKamar  float64 `json:"tarif_kamar"  db:"tarif_kamar"`   // Column: numeric
	StatusKamar string  `json:"status_kamar" db:"status_kamar"` // Column: character varying(20)
}
