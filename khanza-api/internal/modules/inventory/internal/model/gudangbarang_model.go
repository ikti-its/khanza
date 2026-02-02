package model

type GudangBarangRequest struct {
	IdBarangMedis string `json:"id_barang_medis"`
	IdRuangan     int    `json:"id_ruangan"`
	Stok          int    `json:"stok"`
	NoBatch       string `json:"no_batch"`
	NoFaktur      string `json:"no_faktur"`
}

type GudangBarangResponse struct {
	Id            string `json:"id"`
	IdBarangMedis string `json:"id_barang_medis"`
	IdRuangan     int    `json:"id_ruangan"`
	Stok          int    `json:"stok"`
	NoBatch       string `json:"no_batch"`
	NoFaktur      string `json:"no_faktur"`
}
