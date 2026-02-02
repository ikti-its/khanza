package model

type PenerimaanRequest struct {
	IdPengajuan string `json:"id_pengajuan" validate:"required,uuid4"`
	IdPemesanan string `json:"id_pemesanan" validate:"required,uuid4"`
	Nomor       string `json:"no_faktur" validate:"required"`
	Datang      string `json:"tanggal_datang" validate:"required"`
	Faktur      string `json:"tanggal_faktur" validate:"required"`
	JatuhTempo  string `json:"tanggal_jthtempo" validate:"required"`
	IdPegawai   string `json:"id_pegawai" validate:"required"`
	Ruangan     int    `json:"id_ruangan" validate:"required,numeric"`
}

type PenerimaanResponse struct {
	Id          string `json:"id"`
	IdPengajuan string `json:"id_pengajuan"`
	IdPemesanan string `json:"id_pemesanan"`
	Nomor       string `json:"no_faktur"`
	Datang      string `json:"tanggal_datang"`
	Faktur      string `json:"tanggal_faktur"`
	JatuhTempo  string `json:"tanggal_jthtempo"`
	IdPegawai   string `json:"id_pegawai"`
	Ruangan     int    `json:"id_ruangan"`
}

type PenerimaanPageResponse struct {
	Page       int                  `json:"page"`
	Size       int                  `json:"size"`
	Total      int                  `json:"total"`
	Penerimaan []PenerimaanResponse `json:"penerimaan_barang_medis"`
}
