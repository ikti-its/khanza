package model

type PengajuanRequest struct {
	Tanggal string  `json:"tanggal_pengajuan" validate:"required"`
	Nomor   string  `json:"nomor_pengajuan" validate:"required"`
	Pegawai string  `json:"id_pegawai" validate:"required,uuid4"`
	Total   float64 `json:"total_pengajuan"`
	Catatan string  `json:"catatan"`
	Status  string  `json:"status_pesanan" validate:"required,oneof=0 1 2 3 4 5 6 7 8 9 10"`
}

type PengajuanResponse struct {
	Id      string  `json:"id"`
	Tanggal string  `json:"tanggal_pengajuan"`
	Nomor   string  `json:"nomor_pengajuan"`
	Pegawai string  `json:"id_pegawai"`
	Total   float64 `json:"total_pengajuan"`
	Catatan string  `json:"catatan"`
	Status  string  `json:"status_pesanan"`
}

type PengajuanPageResponse struct {
	Page      int                 `json:"page"`
	Size      int                 `json:"size"`
	Total     int                 `json:"total"`
	Pengajuan []PengajuanResponse `json:"pengajuan_barang_medis"`
}
