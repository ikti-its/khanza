package entity

type ResepDokterRacikanDetail struct {
	NoResep   string  `db:"no_resep" json:"no_resep"`
	NoRacik   string  `db:"no_racik" json:"no_racik"`
	KodeBrng  string  `db:"kode_brng" json:"kode_brng"`
	P1        float64 `db:"p1" json:"p1"`
	P2        float64 `db:"p2" json:"p2"`
	Kandungan string  `db:"kandungan" json:"kandungan"`
	Jml       float64 `db:"jml" json:"jml"`
}
