package entity

type Entity struct {
	KodeInstansi   string `json:"kode_instansi"   db:"kode_instansi"`
	NamaInstansi   string `json:"nama_instansi"   db:"nama_instansi"`
	AlamatInstansi string `json:"alamat_instansi" db:"alamat_instansi"`
	Kota           string `json:"kota"             db:"kota"`
	NoTelp         string `json:"no_telp"          db:"no_telp"`
}
