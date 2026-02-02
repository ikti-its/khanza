package model

type PesananRequest struct {
	IdPengajuan    string  `json:"id_pengajuan" validate:"required,uuid4"`
	IdMedis        string  `json:"id_barang_medis" validate:"required,uuid4"`
	Satuan         int     `json:"satuan" validate:"required,numeric"`
	HargaPengajuan float64 `json:"harga_satuan_pengajuan"`
	HargaPemesanan float64 `json:"harga_satuan_pemesanan"`
	Pesanan        int     `json:"jumlah_pesanan" validate:"required,numeric"`
	Total          float64 `json:"total_per_item"`
	Subtotal       float64 `json:"subtotal_per_item"`
	DiskonPersen   float64 `json:"diskon_persen"`
	DiskonJumlah   float64 `json:"diskon_jumlah"`
	Diterima       int     `json:"jumlah_diterima" validate:"numeric"`
	Kadaluwarsa    string  `json:"kadaluwarsa"`
	Batch          string  `json:"no_batch"`
}

type PesananResponse struct {
	Id             string  `json:"id"`
	IdPengajuan    string  `json:"id_pengajuan"`
	IdMedis        string  `json:"id_barang_medis"`
	Satuan         int     `json:"satuan"`
	HargaPengajuan float64 `json:"harga_satuan_pengajuan"`
	HargaPemesanan float64 `json:"harga_satuan_pemesanan"`
	Pesanan        int     `json:"jumlah_pesanan"`
	Total          float64 `json:"total_per_item"`
	Subtotal       float64 `json:"subtotal_per_item"`
	DiskonPersen   float64 `json:"diskon_persen"`
	DiskonJumlah   float64 `json:"diskon_jumlah"`
	Diterima       int     `json:"jumlah_diterima"`
	Kadaluwarsa    string  `json:"kadaluwarsa"`
	Batch          string  `json:"no_batch"`
}

type PesananPageResponse struct {
	Page    int               `json:"page"`
	Size    int               `json:"size"`
	Total   int               `json:"total"`
	Pesanan []PesananResponse `json:"pesanan_barang_medis"`
}
