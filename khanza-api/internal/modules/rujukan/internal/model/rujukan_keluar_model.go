package model

type RujukanKeluar struct {
	NomorRujuk         string `json:"nomor_rujuk" validate:"required"`
	NomorRawat         string `json:"nomor_rawat" validate:"required"` // PRIMARY KEY
	NomorRM            string `json:"nomor_rm"`
	NamaPasien         string `json:"nama_pasien"`
	TempatRujuk        string `json:"tempat_rujuk"`
	TanggalRujuk       string `json:"tanggal_rujuk"` // Format: YYYY-MM-DD
	JamRujuk           string `json:"jam_rujuk"`     // Format: HH:mm
	KeteranganDiagnosa string `json:"keterangan_diagnosa"`
	DokterPerujuk      string `json:"dokter_perujuk"`
	KategoriRujuk      string `json:"kategori_rujuk"`
	Pengantaran        string `json:"pengantaran"`
	Keterangan         string `json:"keterangan"`
}

type RujukanKeluarRequest struct {
	NomorRujuk         string `json:"nomor_rujuk" validate:"required"`
	NomorRawat         string `json:"nomor_rawat" validate:"required"`
	NomorRM            string `json:"nomor_rm"`
	NamaPasien         string `json:"nama_pasien"`
	TempatRujuk        string `json:"tempat_rujuk"`
	TanggalRujuk       string `json:"tanggal_rujuk"`
	JamRujuk           string `json:"jam_rujuk"`
	KeteranganDiagnosa string `json:"keterangan_diagnosa"`
	DokterPerujuk      string `json:"dokter_perujuk"`
	KategoriRujuk      string `json:"kategori_rujuk"`
	Pengantaran        string `json:"pengantaran"`
	Keterangan         string `json:"keterangan"`
}

type RujukanKeluarResponse struct {
	NomorRujuk         string `json:"nomor_rujuk"`
	NomorRawat         string `json:"nomor_rawat"`
	NomorRM            string `json:"nomor_rm"`
	NamaPasien         string `json:"nama_pasien"`
	TempatRujuk        string `json:"tempat_rujuk"`
	TanggalRujuk       string `json:"tanggal_rujuk"`
	JamRujuk           string `json:"jam_rujuk"`
	KeteranganDiagnosa string `json:"keterangan_diagnosa"`
	DokterPerujuk      string `json:"dokter_perujuk"`
	KategoriRujuk      string `json:"kategori_rujuk"`
	Pengantaran        string `json:"pengantaran"`
	Keterangan         string `json:"keterangan"`
}

type RujukanKeluarPageResponse struct {
	Page  int                     `json:"page"`
	Size  int                     `json:"size"`
	Total int                     `json:"total"`
	Data  []RujukanKeluarResponse `json:"data"`
}
