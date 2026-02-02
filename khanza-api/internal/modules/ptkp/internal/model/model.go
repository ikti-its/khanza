package model

type Model struct {
	No_ptkp    string  `json:"no_ptkp"    db:"no_ptkp"`
	Kode_ptkp  string  `json:"kode_ptkp"  db:"kode_ptkp"`
	Perkawinan string  `json:"perkawinan" db:"perkawinan"`
	Tanggungan float64 `json:"tanggungan" db:"tanggungan"`
	Nilai_ptkp float64 `json:"nilai_ptkp" db:"nilai_ptkp"`
}

type Request struct {
	No_ptkp    string  `json:"no_ptkp"    db:"no_ptkp"`
	Kode_ptkp  string  `json:"kode_ptkp"  db:"kode_ptkp"`
	Perkawinan string  `json:"perkawinan" db:"perkawinan"`
	Tanggungan float64 `json:"tanggungan" db:"tanggungan"`
	Nilai_ptkp float64 `json:"nilai_ptkp" db:"nilai_ptkp"`
}

type Response struct {
	No_ptkp    string  `json:"no_ptkp"    db:"no_ptkp"`
	Kode_ptkp  string  `json:"kode_ptkp"  db:"kode_ptkp"`
	Perkawinan string  `json:"perkawinan" db:"perkawinan"`
	Tanggungan float64 `json:"tanggungan" db:"tanggungan"`
	Nilai_ptkp float64 `json:"nilai_ptkp" db:"nilai_ptkp"`
}
