package model

type PemesananRequest struct {
	Tanggal     string  `json:"tanggal_pesan" validate:"required"`
	Nomor       string  `json:"no_pemesanan" validate:"required"`
	IdPengajuan string  `json:"id_pengajuan" validate:"required,uuid4"`
	Supplier    int     `json:"id_supplier" validate:"required,numeric"`
	IdPegawai   string  `json:"id_pegawai" validate:"required,uuid4"`
	PajakPersen float64 `json:"pajak_persen"`
	PajakJumlah float64 `json:"pajak_jumlah"`
	Materai     float64 `json:"materai"`
	Total       float64 `json:"total_pemesanan"`
}

type PemesananResponse struct {
	Id          string  `json:"id"`
	Tanggal     string  `json:"tanggal_pesan"`
	Nomor       string  `json:"no_pemesanan"`
	IdPengajuan string  `json:"id_pengajuan"`
	Supplier    int     `json:"id_supplier"`
	IdPegawai   string  `json:"id_pegawai"`
	PajakPersen float64 `json:"pajak_persen"`
	PajakJumlah float64 `json:"pajak_jumlah"`
	Materai     float64 `json:"materai"`
	Total       float64 `json:"total_pemesanan"`
}

type PemesananPageResponse struct {
	Page      int                 `json:"page"`
	Size      int                 `json:"size"`
	Total     int                 `json:"total"`
	Pemesanan []PemesananResponse `json:"pemesanan_barang_medis"`
}
