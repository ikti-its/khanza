package entity

type Entity struct {
	No_upmk      string   `json:"no_upmk"      db:"no_upmk"`
	Masa_kerja   float64  `json:"masa_kerja"   db:"masa_kerja"`
	Pengali_upah float64  `json:"pengali_upah" db:"pengali_upah"`
}
