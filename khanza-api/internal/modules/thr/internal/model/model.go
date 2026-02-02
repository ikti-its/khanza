package model

type Model struct {
	No_thr       string   `json:"no_thr"       db:"no_thr"`
	Masa_kerja   float64  `json:"masa_kerja"   db:"masa_kerja"`
	Pengali_upah float64  `json:"pengali_upah" db:"pengali_upah"`
}

type Request struct {
	No_thr       string   `json:"no_thr"       db:"no_thr"`
	Masa_kerja   float64  `json:"masa_kerja"   db:"masa_kerja"`
	Pengali_upah float64  `json:"pengali_upah" db:"pengali_upah"`
}

type Response struct {
	No_thr       string   `json:"no_thr"       db:"no_thr"`
	Masa_kerja   float64  `json:"masa_kerja"   db:"masa_kerja"`
	Pengali_upah float64  `json:"pengali_upah" db:"pengali_upah"`
}
