package model

type PemberianObat struct {
	TanggalBeri string  `json:"tanggal_beri"` // format: yyyy-mm-dd
	JamBeri     string  `json:"jam_beri"`     // format: HH:mm:ss
	NomorRawat  string  `json:"nomor_rawat"`
	NamaPasien  string  `json:"nama_pasien"`
	KodeObat    string  `json:"kode_obat"`
	NamaObat    string  `json:"nama_obat"`
	Embalase    string  `json:"embalase"`
	Tuslah      string  `json:"tuslah"`
	Jumlah      string  `json:"jumlah"`
	BiayaObat   float64 `json:"biaya_obat"`
	Total       float64 `json:"total"`
	Gudang      string  `json:"gudang"`
	NoBatch     string  `json:"no_batch"`
	NoFaktur    string  `json:"no_faktur"`
	Kelas       string  `json:"kelas"`
}

type PemberianObatRequest struct {
	TanggalBeri string  `json:"tanggal_beri" validate:"required"` // format: yyyy-mm-dd
	JamBeri     string  `json:"jam_beri" validate:"required"`     // format: HH:mm:ss
	NomorRawat  string  `json:"nomor_rawat" validate:"required"`
	NamaPasien  string  `json:"nama_pasien"`
	KodeObat    string  `json:"kode_obat"`
	NamaObat    string  `json:"nama_obat"`
	Embalase    string  `json:"embalase"`
	Tuslah      string  `json:"tuslah"`
	Jumlah      string  `json:"jumlah"`
	BiayaObat   float64 `json:"biaya_obat"`
	Total       float64 `json:"total"`
	Gudang      string  `json:"gudang"`
	NoBatch     string  `json:"no_batch"`
	NoFaktur    string  `json:"no_faktur"`
	Kelas       string  `json:"kelas"`
}

type PemberianObatResponse struct {
	TanggalBeri string  `json:"tanggal_beri"`
	JamBeri     string  `json:"jam_beri"`
	NomorRawat  string  `json:"nomor_rawat"`
	NamaPasien  string  `json:"nama_pasien"`
	KodeObat    string  `json:"kode_obat"`
	NamaObat    string  `json:"nama_obat"`
	Embalase    string  `json:"embalase"`
	Tuslah      string  `json:"tuslah"`
	Jumlah      string  `json:"jumlah"`
	BiayaObat   float64 `json:"biaya_obat"`
	Total       float64 `json:"total"`
	Gudang      string  `json:"gudang"`
	NoBatch     string  `json:"no_batch"`
	NoFaktur    string  `json:"no_faktur"`
	Kelas       string  `json:"kelas"`
}

type ObatWithTarif struct {
	KodeObat  string  `json:"kode_obat"`
	NamaObat  string  `json:"nama_obat"`
	BiayaObat float64 `json:"biaya_obat"`
}

type PemberianObatPageResponse struct {
	Page          int                     `json:"page"`
	Size          int                     `json:"size"`
	Total         int                     `json:"total"`
	PemberianObat []PemberianObatResponse `json:"pemberian_obat"`
}
