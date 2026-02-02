package entity

type ResepDokter struct {
	NoResep     string  `db:"no_resep" json:"no_resep"`
	KodeBarang  string  `db:"kode_barang" json:"kode_barang"`
	Jumlah      float64 `db:"jumlah" json:"jumlah"`
	AturanPakai string  `db:"aturan_pakai" json:"aturan_pakai"`
	Embalase    float64 `db:"embalase"`
	Tuslah      float64 `db:"tuslah"`
}
