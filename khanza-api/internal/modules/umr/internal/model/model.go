package model

type Model struct {
	No_umr       string  `json:"no_umr"       db:"no_umr"`
	Provinsi     string  `json:"provinsi"     db:"provinsi"`
	Kotakab      string  `json:"kotakab"      db:"kotakab"`
	Jenis        string  `json:"jenis"        db:"jenis"`
	Upah_minimum float64 `json:"upah_minimum" db:"upah_minimum"`
}

type Request struct {
	No_umr       string  `json:"no_umr"       db:"no_umr"`
	Provinsi     string  `json:"provinsi"     db:"provinsi"`
	Kotakab      string  `json:"kotakab"      db:"kotakab"`
	Jenis        string  `json:"jenis"        db:"jenis"`
	Upah_minimum float64 `json:"upah_minimum" db:"upah_minimum"`
}

type Response struct {
	No_umr       string  `json:"no_umr"       db:"no_umr"`
	Provinsi     string  `json:"provinsi"     db:"provinsi"`
	Kotakab      string  `json:"kotakab"      db:"kotakab"`
	Jenis        string  `json:"jenis"        db:"jenis"`
	Upah_minimum float64 `json:"upah_minimum" db:"upah_minimum"`
}
