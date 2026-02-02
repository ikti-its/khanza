package model

type PenerimaanRequest struct {
	NoFaktur          string  `json:"no_faktur"`
	NoPemesanan       string  `json:"no_pemesanan"`
	IdSupplier        int     `json:"id_supplier"`
	TanggalDatang     string  `json:"tanggal_datang"`
	TanggalFaktur     string  `json:"tanggal_faktur"`
	TanggalJatuhTempo string  `json:"tanggal_jthtempo"`
	IdPegawai         string  `json:"id_pegawai"`
	IdRuangan         int     `json:"id_ruangan"`
	PajakPersen       float64 `json:"pajak_persen"`
	PajakJumlah       float64 `json:"pajak_jumlah"`
	Tagihan           float64 `json:"tagihan"`
	Materai           float64 `json:"materai"`
}

type PenerimaanResponse struct {
	Id                string  `json:"id"`
	NoFaktur          string  `json:"no_faktur"`
	NoPemesanan       string  `json:"no_pemesanan"`
	IdSupplier        int     `json:"id_supplier"`
	TanggalDatang     string  `json:"tanggal_datang"`
	TanggalFaktur     string  `json:"tanggal_faktur"`
	TanggalJatuhTempo string  `json:"tanggal_jthtempo"`
	IdPegawai         string  `json:"id_pegawai"`
	IdRuangan         int     `json:"id_ruangan"`
	PajakPersen       float64 `json:"pajak_persen"`
	PajakJumlah       float64 `json:"pajak_jumlah"`
	Tagihan           float64 `json:"tagihan"`
	Materai           float64 `json:"materai"`
}

type DetailPenerimaanRequest struct {
	IdPenerimaan    string  `json:"id_penerimaan"`
	IdBarangMedis   string  `json:"id_barang_medis"`
	IdSatuan        int     `json:"id_satuan"`
	UbahMaster      string  `json:"ubah_master"`
	Jumlah          int     `json:"jumlah"`
	HPesan          float64 `json:"h_pesan"`
	SubtotalPerItem float64 `json:"subtotal_per_item"`
	DiskonPersen    float64 `json:"diskon_persen"`
	DiskonJumlah    float64 `json:"diskon_jumlah"`
	TotalPerItem    float64 `json:"total_per_item"`
	JumlahDiterima  int     `json:"jumlah_diterima"`
	Kadaluwarsa     string  `json:"kadaluwarsa"`
	NoBatch         string  `json:"no_batch"`
}

type DetailPenerimaanResponse struct {
	IdPenerimaan    string  `json:"id_penerimaan"`
	IdBarangMedis   string  `json:"id_barang_medis"`
	IdSatuan        int     `json:"id_satuan"`
	UbahMaster      string  `json:"ubah_master"`
	Jumlah          int     `json:"jumlah"`
	HPesan          float64 `json:"h_pesan"`
	SubtotalPerItem float64 `json:"subtotal_per_item"`
	DiskonPersen    float64 `json:"diskon_persen"`
	DiskonJumlah    float64 `json:"diskon_jumlah"`
	TotalPerItem    float64 `json:"total_per_item"`
	JumlahDiterima  int     `json:"jumlah_diterima"`
	Kadaluwarsa     string  `json:"kadaluwarsa"`
	NoBatch         string  `json:"no_batch"`
}
