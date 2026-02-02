package entity

type ResepDokterRacikan struct {
	NoResep     string `db:"no_resep" json:"no_resep"`
	NoRacik     string `db:"no_racik" json:"no_racik"`
	NamaRacik   string `db:"nama_racik" json:"nama_racik"`
	KdRacik     string `db:"kd_racik" json:"kd_racik"`
	JmlDr       int    `db:"jml_dr" json:"jml_dr"`
	AturanPakai string `db:"aturan_pakai" json:"aturan_pakai"`
	Keterangan  string `db:"keterangan" json:"keterangan"`
}
