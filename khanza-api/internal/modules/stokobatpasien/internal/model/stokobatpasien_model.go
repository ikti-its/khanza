package model

type StokObatPasien struct {
	NoPermintaan string  `json:"no_permintaan"`
	Tanggal      string  `json:"tanggal"`
	Jam          string  `json:"jam"`
	NoRawat      string  `json:"no_rawat"`
	KodeBrng     string  `json:"kode_brng"`
	Jumlah       float64 `json:"jumlah"`
	KdBangsal    string  `json:"kd_bangsal"`
	NoBatch      string  `json:"no_batch"`
	NoFaktur     string  `json:"no_faktur"`
	AturanPakai  string  `json:"aturan_pakai"`
	NamaPasien   string  `json:"nama_pasien"`
	NamaBrng     string  `json:"nama_brng"`

	Jam00 bool `json:"jam00"`
	Jam01 bool `json:"jam01"`
	Jam02 bool `json:"jam02"`
	Jam03 bool `json:"jam03"`
	Jam04 bool `json:"jam04"`
	Jam05 bool `json:"jam05"`
	Jam06 bool `json:"jam06"`
	Jam07 bool `json:"jam07"`
	Jam08 bool `json:"jam08"`
	Jam09 bool `json:"jam09"`
	Jam10 bool `json:"jam10"`
	Jam11 bool `json:"jam11"`
	Jam12 bool `json:"jam12"`
	Jam13 bool `json:"jam13"`
	Jam14 bool `json:"jam14"`
	Jam15 bool `json:"jam15"`
	Jam16 bool `json:"jam16"`
	Jam17 bool `json:"jam17"`
	Jam18 bool `json:"jam18"`
	Jam19 bool `json:"jam19"`
	Jam20 bool `json:"jam20"`
	Jam21 bool `json:"jam21"`
	Jam22 bool `json:"jam22"`
	Jam23 bool `json:"jam23"`
}

type StokObatPasienRequest struct {
	NoPermintaan string  `json:"no_permintaan"`
	Tanggal      string  `json:"tanggal"`
	Jam          string  `json:"jam"`
	NoRawat      string  `json:"no_rawat"`
	KodeBrng     string  `json:"kode_brng"`
	Jumlah       float64 `json:"jumlah"`
	KdBangsal    string  `json:"kd_bangsal"`
	NoBatch      string  `json:"no_batch"`
	NoFaktur     string  `json:"no_faktur"`
	AturanPakai  string  `json:"aturan_pakai"`
	NamaPasien   string  `json:"nama_pasien"`

	Jam00 bool `json:"jam00"`
	Jam01 bool `json:"jam01"`
	Jam02 bool `json:"jam02"`
	Jam03 bool `json:"jam03"`
	Jam04 bool `json:"jam04"`
	Jam05 bool `json:"jam05"`
	Jam06 bool `json:"jam06"`
	Jam07 bool `json:"jam07"`
	Jam08 bool `json:"jam08"`
	Jam09 bool `json:"jam09"`
	Jam10 bool `json:"jam10"`
	Jam11 bool `json:"jam11"`
	Jam12 bool `json:"jam12"`
	Jam13 bool `json:"jam13"`
	Jam14 bool `json:"jam14"`
	Jam15 bool `json:"jam15"`
	Jam16 bool `json:"jam16"`
	Jam17 bool `json:"jam17"`
	Jam18 bool `json:"jam18"`
	Jam19 bool `json:"jam19"`
	Jam20 bool `json:"jam20"`
	Jam21 bool `json:"jam21"`
	Jam22 bool `json:"jam22"`
	Jam23 bool `json:"jam23"`
}

type StokObatPasienResponse struct {
	Code   int            `json:"code"`
	Status string         `json:"status"`
	Data   StokObatPasien `json:"data"`
}

type StokObatPasienListResponse struct {
	Code   int              `json:"code"`
	Status string           `json:"status"`
	Data   []StokObatPasien `json:"data"`
}
