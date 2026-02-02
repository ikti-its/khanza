package model

type PermintaanResepPulang struct {
	NoPermintaan  string `json:"no_permintaan"`  // varchar(14), primary key
	TglPermintaan string `json:"tgl_permintaan"` // format: yyyy-mm-dd, nullable
	Jam           string `json:"jam"`            // time format: HH:mm:ss
	NoRawat       string `json:"no_rawat"`       // varchar(17)
	KdDokter      string `json:"kd_dokter"`      // varchar(20)
	Status        string `json:"status"`         // values: "Sudah", "Belum"
	TglValidasi   string `json:"tgl_validasi"`   // format: yyyy-mm-dd
	JamValidasi   string `json:"jam_validasi"`   // time format: HH:mm:ss
	KodeBrng      string `json:"kode_brng" db:"kode_brng"`
	Jumlah        int    `json:"jumlah" db:"jumlah"`
	AturanPakai   string `json:"aturan_pakai" db:"aturan_pakai"`
}

type PermintaanResepPulangRequest struct {
	NoPermintaan  string `json:"no_permintaan"`
	TglPermintaan string `json:"tgl_permintaan" validate:"omitempty,datetime=2006-01-02"`
	Jam           string `json:"jam" validate:"required,datetime=15:04:05"`
	NoRawat       string `json:"no_rawat" validate:"required"`
	KdDokter      string `json:"kd_dokter" validate:"required"`
	Status        string `json:"status" validate:"required,oneof=Sudah Belum"`
	TglValidasi   string `json:"tgl_validasi" validate:"required,datetime=2006-01-02"`
	JamValidasi   string `json:"jam_validasi" validate:"required,datetime=15:04:05"`
	KodeBrng      string `json:"kode_brng"`
	Jumlah        int    `json:"jumlah"`
	AturanPakai   string `json:"aturan_pakai"`
}

type PermintaanResepPulangResponse struct {
	NoPermintaan  string  `json:"no_permintaan"`
	TglPermintaan string  `json:"tgl_permintaan"`
	Jam           string  `json:"jam"`
	NoRawat       string  `json:"no_rawat"`
	KdDokter      string  `json:"kd_dokter"`
	Status        string  `json:"status"`
	TglValidasi   *string `json:"tgl_validasi"`
	JamValidasi   *string `json:"jam_validasi"`
	KodeBrng      string  `json:"kode_brng" db:"kode_brng"`
	Jumlah        int     `json:"jumlah" db:"jumlah"`
	AturanPakai   string  `json:"aturan_pakai" db:"aturan_pakai"`
}

type PermintaanResepPulangPageResponse struct {
	Page  int                             `json:"page"`
	Size  int                             `json:"size"`
	Total int                             `json:"total"`
	Data  []PermintaanResepPulangResponse `json:"data"`
}
