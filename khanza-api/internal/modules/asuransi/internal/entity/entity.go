package entity

type Entity struct {
	Kode_asuransi        string  `json:"kode_asuransi"         db:"kode_asuransi"`
	Nama_asuransi        string  `json:"nama_asuransi"         db:"nama_asuransi"`
	Perusahaan_asuransi  string  `json:"perusahaan_asuransi"   db:"perusahaan_asuransi"`
	Alamat_asuransi      string  `json:"alamat_asuransi"       db:"alamat_asuransi"`
	No_telp              string  `json:"no_telp"               db:"no_telp"`
	Attn                 string  `json:"attn"                  db:"attn"`
	Tipe_asuransi        string  `json:"tipe_asuransi"         db:"tipe_asuransi"`
}
