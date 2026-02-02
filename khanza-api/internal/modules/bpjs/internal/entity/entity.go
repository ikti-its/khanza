package entity

type Entity struct {
	No_bpjs       string  `json:"no_bpjs"       db:"no_bpjs"`
	Nama_program  string  `json:"nama_program"  db:"nama_program"`
	Penyelenggara string  `json:"penyelenggara" db:"penyelenggara"`
	Tarif         float64 `json:"tarif"         db:"tarif"`
	Batas_bawah   float64 `json:"batas_bawah"   db:"batas_bawah"`
	Batas_atas    float64 `json:"batas_atas"    db:"batas_atas"`
}
