package model

type UGD struct {
	NomorReg        string  `json:"nomor_reg" validate:"required"`
	NomorRawat      string  `json:"nomor_rawat"`
	Tanggal         string  `json:"tanggal"` // Use string if handled as string in requests, otherwise use time.Time
	Jam             string  `json:"jam"`
	KodeDokter      string  `json:"kode_dokter"`
	DokterDituju    string  `json:"dokter_dituju"`
	NomorRM         string  `json:"nomor_rm"`
	NamaPasien      string  `json:"nama_pasien"`
	JenisKelamin    string  `json:"jenis_kelamin" validate:"oneof=L P"`
	Umur            string  `json:"umur"`
	Poliklinik      string  `json:"poliklinik"`
	PenanggungJawab string  `json:"penanggung_jawab"`
	AlamatPJ        string  `json:"alamat_pj"`
	HubunganPJ      string  `json:"hubungan_pj"`
	BiayaRegistrasi float64 `json:"biaya_registrasi"`
	Status          string  `json:"status"`
	JenisBayar      string  `json:"jenis_bayar"`
	StatusRawat     string  `json:"status_rawat"`
	StatusBayar     string  `json:"status_bayar"`
}

type UGDRequest struct {
	NomorReg        string  `json:"nomor_reg" validate:"required"`
	NomorRawat      string  `json:"nomor_rawat"`
	Tanggal         string  `json:"tanggal"`
	Jam             string  `json:"jam"`
	KodeDokter      string  `json:"kode_dokter"`
	DokterDituju    string  `json:"dokter_dituju"`
	NomorRM         string  `json:"nomor_rm"`
	NamaPasien      string  `json:"nama_pasien"`
	JenisKelamin    string  `json:"jenis_kelamin" validate:"oneof=L P"`
	Umur            string  `json:"umur"`
	Poliklinik      string  `json:"poliklinik"`
	PenanggungJawab string  `json:"penanggung_jawab"`
	AlamatPJ        string  `json:"alamat_pj"`
	HubunganPJ      string  `json:"hubungan_pj"`
	BiayaRegistrasi float64 `json:"biaya_registrasi"`
	Status          string  `json:"status"`
	JenisBayar      string  `json:"jenis_bayar"`
	StatusRawat     string  `json:"status_rawat"`
	StatusBayar     string  `json:"status_bayar"`
}

type UGDResponse struct {
	NomorReg        string  `json:"nomor_reg"`
	NomorRawat      string  `json:"nomor_rawat"`
	Tanggal         string  `json:"tanggal"`
	Jam             string  `json:"jam"`
	KodeDokter      string  `json:"kode_dokter"`
	DokterDituju    string  `json:"dokter_dituju"`
	NomorRM         string  `json:"nomor_rm"`
	NamaPasien      string  `json:"nama_pasien"`
	JenisKelamin    string  `json:"jenis_kelamin"`
	Umur            string  `json:"umur"`
	Poliklinik      string  `json:"poliklinik"`
	PenanggungJawab string  `json:"penanggung_jawab,omitempty"`
	AlamatPJ        string  `json:"alamat_pj,omitempty"`
	HubunganPJ      string  `json:"hubungan_pj,omitempty"`
	BiayaRegistrasi float64 `json:"biaya_registrasi"`
	Status          string  `json:"status"`
	JenisBayar      string  `json:"jenis_bayar"`
	StatusRawat     string  `json:"status_rawat"`
	StatusBayar     string  `json:"status_bayar"`
}

type UGDPageResponse struct {
	Page  int           `json:"page"`
	Size  int           `json:"size"`
	Total int           `json:"total"`
	UGD   []UGDResponse `json:"ugd"`
}
