package model

type OpnameRequest struct {
	IdBarangMedis string  `json:"id_barang_medis"`
	IdRuangan     int     `json:"id_ruangan"`
	HBeli         float64 `json:"h_beli"`
	Tanggal       string  `json:"tanggal"`
	Real          int     `json:"real"`
	Stok          int     `json:"stok"`
	Keterangan    string  `json:"keterangan"`
	NoBatch       string  `json:"no_batch"`
	NoFaktur      string  `json:"no_faktur"`
}

type OpnameResponse struct {
	Id            string  `json:"id"`
	IdBarangMedis string  `json:"id_barang_medis"`
	IdRuangan     int     `json:"id_ruangan"`
	HBeli         float64 `json:"h_beli"`
	Tanggal       string  `json:"tanggal"`
	Real          int     `json:"real"`
	Stok          int     `json:"stok"`
	Keterangan    string  `json:"keterangan"`
	NoBatch       string  `json:"no_batch"`
	NoFaktur      string  `json:"no_faktur"`
}
