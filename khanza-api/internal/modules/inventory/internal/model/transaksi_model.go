package model

type TransaksiRequest struct {
	IdStokKeluar  string `json:"id_stok_keluar"`
	IdBarangMedis string `json:"id_barang_medis"`
	NoBatch       string `json:"no_batch"`
	NoFaktur      string `json:"no_faktur"`
	JumlahKeluar  int    `json:"jumlah_keluar"`
}

type TransaksiResponse struct {
	Id            string `json:"id"`
	IdStokKeluar  string `json:"id_stok_keluar"`
	IdBarangMedis string `json:"id_barang_medis"`
	NoBatch       string `json:"no_batch"`
	NoFaktur      string `json:"no_faktur"`
	JumlahKeluar  int    `json:"jumlah_keluar"`
}
