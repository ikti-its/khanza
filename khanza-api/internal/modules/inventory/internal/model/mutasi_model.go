package model

type MutasiRequest struct {
	IdBarangMedis string  `json:"id_barang_medis"`
	Jumlah        int     `json:"jumlah"`
	Harga         float64 `json:"harga"`
	IdRuanganDari int     `json:"id_ruangandari"`
	IdRuanganKe   int     `json:"id_ruanganke"`
	Tanggal       string  `json:"tanggal"`
	Keterangan    string  `json:"keterangan"`
	NoBatch       string  `json:"no_batch"`
	NoFaktur      string  `json:"no_faktur"`
}

type MutasiResponse struct {
	Id            string  `json:"id"`
	IdBarangMedis string  `json:"id_barang_medis"`
	Jumlah        int     `json:"jumlah"`
	Harga         float64 `json:"harga"`
	IdRuanganDari int     `json:"id_ruangandari"`
	IdRuanganKe   int     `json:"id_ruanganke"`
	Tanggal       string  `json:"tanggal"`
	Keterangan    string  `json:"keterangan"`
	NoBatch       string  `json:"no_batch"`
	NoFaktur      string  `json:"no_faktur"`
}
