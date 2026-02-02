package model

type TagihanRequest struct {
	IdPengajuan  string  `json:"id_pengajuan" validate:"required,uuid4"`
	IdPemesanan  string  `json:"id_pemesanan" validate:"required,uuid4"`
	IdPenerimaan string  `json:"id_penerimaan" validate:"required,uuid4"`
	Tanggal      string  `json:"tanggal_bayar" validate:"required"`
	Jumlah       float64 `json:"jumlah_bayar" validate:"required"`
	IdPegawai    string  `json:"id_pegawai" validate:"required,uuid4"`
	Keterangan   string  `json:"keterangan"`
	Nomor        string  `json:"no_bukti" validate:"required"`
	AkunBayar    int     `json:"id_akun_bayar" validate:"required,numeric"`
}

type TagihanResponse struct {
	Id           string  `json:"id"`
	IdPengajuan  string  `json:"id_pengajuan"`
	IdPemesanan  string  `json:"id_pemesanan"`
	IdPenerimaan string  `json:"id_penerimaan"`
	Tanggal      string  `json:"tanggal_bayar"`
	Jumlah       float64 `json:"jumlah_bayar"`
	IdPegawai    string  `json:"id_pegawai"`
	Keterangan   string  `json:"keterangan"`
	Nomor        string  `json:"no_bukti"`
	AkunBayar    int     `json:"id_akun_bayar"`
}

type TagihanPageResponse struct {
	Page    int               `json:"page"`
	Size    int               `json:"size"`
	Total   int               `json:"total"`
	Tagihan []TagihanResponse `json:"tagihan_barang_medis"`
}
