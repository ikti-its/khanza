package entity

type Entity struct {
	No_pesangon  string   `json:"no_pesangon"  db:"no_pesangon"`
	Masa_kerja   float64  `json:"masa_kerja"   db:"masa_kerja"`
	Pengali_upah float64  `json:"pengali_upah" db:"pengali_upah"`
}
