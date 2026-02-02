package model

type ResepDokter struct {
	NoResep     string  `json:"no_resep"`
	KodeBarang  string  `json:"kode_barang"`
	Jumlah      float64 `json:"jumlah"`
	AturanPakai string  `json:"aturan_pakai"`
	Embalase    float64 `json:"embalase"`
	Tuslah      float64 `json:"tuslah"`
}

type ResepDokterRequest struct {
	NoResep     string  `json:"no_resep" validate:"required"`
	KodeBarang  string  `json:"kode_barang" validate:"required"`
	Jumlah      float64 `json:"jumlah" validate:"required"`
	AturanPakai string  `json:"aturan_pakai" validate:"required"`
	Embalase    float64 `json:"embalase"`
	Tuslah      float64 `json:"tuslah"`
}

type ResepDokterResponse struct {
	NoResep     string  `json:"no_resep"`
	KodeBarang  string  `json:"kode_barang"`
	Jumlah      float64 `json:"jumlah"`
	AturanPakai string  `json:"aturan_pakai"`
	Embalase    float64 `json:"embalase"`
	Tuslah      float64 `json:"tuslah"`
}

type ResepDokterPageResponse struct {
	Page         int                   `json:"page"`
	Size         int                   `json:"size"`
	Total        int                   `json:"total"`
	ResepDokters []ResepDokterResponse `json:"resep_dokter"`
}
