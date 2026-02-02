package entity

type Entity struct {
	No_rkm_medis   string    `json:"no_rkm_medis" db:"no_rkm_medis"`
	Nm_pasien      string    `json:"nm_pasien" db:"nm_pasien"`
	Jk             string    `json:"jk" db:"jk"`
	Tgl_lahir      string    `json:"tgl_lahir" db:"tgl_lahir"`
	Umur           string    `json:"umur" db:"umur"`
	Gol_darah      string    `json:"gol_darah" db:"gol_darah"`
	Stts_nikah     string    `json:"stts_nikah" db:"stts_nikah"`
	Agama          string    `json:"agama" db:"agama"`
	Tanggal        string    `json:"tanggal" db:"tanggal"`
	Jam            string    `json:"jam" db:"jam"`
	Icdx           string    `json:"icdx" db:"icdx"`
	Icdx_antara1   string    `json:"icdx_antara1" db:"icdx_antara1"`
	Icdx_antara2   string    `json:"icdx_antara2" db:"icdx_antara2"`
	Icdx_langsung  string    `json:"icdx_langsung" db:"icdx_langsung"`
	Keterangan     string    `json:"keterangan" db:"keterangan"`
	Nama_dokter    string    `json:"nama_dokter" db:"nama_dokter"`
	Kode_dokter    string    `json:"kode_dokter" db:"kode_dokter"`
}
