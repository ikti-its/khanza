package entity

type Entity struct {
	No_lembur    string  `json:"no_lembur"    db:"no_lembur"`
	Jenis_lembur string  `json:"jenis_lembur" db:"jenis_lembur"`
	Jam_lembur   float64 `json:"jam_lembur"   db:"jam_lembur"`
	Pengali_upah float64 `json:"pengali_upah" db:"pengali_upah"`
}
