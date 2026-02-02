package entity

type Entity struct {
	No_jabatan    string  `json:"no_jabatan"    db:"no_jabatan"`
	Jenis_jabatan string  `json:"jenis_jabatan" db:"jenis_jabatan"`
	Nama_jabatan  string  `json:"nama_jabatan"  db:"nama_jabatan"`
	Jenjang       string  `json:"jenjang"       db:"jenjang"`
	Tunjangan     float64 `json:"tunjangan"     db:"tunjangan"`
}
