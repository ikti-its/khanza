package model

type RujukanMasuk struct {
	NomorRujuk    string  `json:"nomor_rujuk" validate:"required"`
	Perujuk       string  `json:"perujuk"`
	AlamatPerujuk string  `json:"alamat_perujuk"`
	NomorRawat    string  `json:"nomor_rawat" validate:"required"` // PRIMARY KEY
	NomorRM       string  `json:"nomor_rm"`
	NamaPasien    string  `json:"nama_pasien"`
	Alamat        string  `json:"alamat"`
	Umur          string  `json:"umur"`
	TanggalMasuk  string  `json:"tanggal_masuk"`  // Use time.Time if you're parsing dates
	TanggalKeluar *string `json:"tanggal_keluar"` // Use time.Time if you're parsing dates
	DiagnosaAwal  string  `json:"diagnosa_awal"`
}

type RujukanMasukRequest struct {
	NomorRujuk    string  `json:"nomor_rujuk" validate:"required"`
	Perujuk       string  `json:"perujuk"`
	AlamatPerujuk string  `json:"alamat_perujuk"`
	NomorRawat    string  `json:"nomor_rawat" validate:"required"`
	NomorRM       string  `json:"nomor_rm"`
	NamaPasien    string  `json:"nama_pasien"`
	Alamat        string  `json:"alamat"`
	Umur          string  `json:"umur"`
	TanggalMasuk  string  `json:"tanggal_masuk"`
	TanggalKeluar *string `json:"tanggal_keluar"`
	DiagnosaAwal  string  `json:"diagnosa_awal"`
}

type RujukanMasukResponse struct {
	NomorRujuk    string  `json:"nomor_rujuk"`
	Perujuk       string  `json:"perujuk"`
	AlamatPerujuk string  `json:"alamat_perujuk"`
	NomorRawat    string  `json:"nomor_rawat"`
	NomorRM       string  `json:"nomor_rm"`
	NamaPasien    string  `json:"nama_pasien"`
	Alamat        string  `json:"alamat"`
	Umur          string  `json:"umur"`
	TanggalMasuk  string  `json:"tanggal_masuk"`
	TanggalKeluar *string `json:"tanggal_keluar"`
	DiagnosaAwal  string  `json:"diagnosa_awal"`
}

type RujukanMasukPageResponse struct {
	Page  int                    `json:"page"`
	Size  int                    `json:"size"`
	Total int                    `json:"total"`
	Data  []RujukanMasukResponse `json:"data"`
}
