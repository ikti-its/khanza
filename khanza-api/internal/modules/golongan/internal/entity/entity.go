package entity

type Entity struct {
	No_golongan   string  `json:"no_golongan"   db:"no_golongan"`
	Kode_golongan string  `json:"kode_golongan" db:"kode_golongan"`
	Nama_golongan string  `json:"nama_golongan" db:"nama_golongan"`
	Pendidikan    string  `json:"pendidikan"    db:"pendidikan"`
	Gaji_pokok    float64 `json:"gaji_pokok"    db:"gaji_pokok"`
}
