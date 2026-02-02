package model

type ResepPulang struct {
	NoRawat   string  `json:"no_rawat"`   // varchar(17), part of composite key
	KodeBrng  string  `json:"kode_brng"`  // varchar(15), part of composite key
	JmlBarang float64 `json:"jml_barang"` // double precision
	Harga     float64 `json:"harga"`      // double precision
	Total     float64 `json:"total"`      // double precision
	Dosis     string  `json:"dosis"`      // varchar(150)
	Tanggal   string  `json:"tanggal"`    // format: yyyy-mm-dd
	Jam       string  `json:"jam"`        // format: HH:mm:ss
	KdBangsal string  `json:"kd_bangsal"` // varchar(5)
	NoBatch   string  `json:"no_batch"`   // varchar(20)
	NoFaktur  string  `json:"no_faktur"`  // varchar(20)
}

type ResepPulangRequest struct {
	NoRawat   string  `json:"no_rawat" validate:"required"`
	KodeBrng  string  `json:"kode_brng" validate:"required"`
	JmlBarang float64 `json:"jml_barang" validate:"required,gt=0"`
	Harga     float64 `json:"harga" validate:"required,gt=0"`
	Total     float64 `json:"total" validate:"required,gt=0"`
	Dosis     string  `json:"dosis" validate:"required"`
	Tanggal   string  `json:"tanggal" validate:"required,datetime=2006-01-02"`
	Jam       string  `json:"jam" validate:"required,datetime=15:04:05"`
	KdBangsal string  `json:"kd_bangsal" validate:"required"`
	NoBatch   string  `json:"no_batch" validate:"required"`
	NoFaktur  string  `json:"no_faktur" validate:"required"`
}

type ResepPulangResponse struct {
	NoRawat   string  `json:"no_rawat"`
	KodeBrng  string  `json:"kode_brng"`
	JmlBarang float64 `json:"jml_barang"`
	Harga     float64 `json:"harga"`
	Total     float64 `json:"total"`
	Dosis     string  `json:"dosis"`
	Tanggal   string  `json:"tanggal"`
	Jam       string  `json:"jam"`
	KdBangsal string  `json:"kd_bangsal"`
	NoBatch   string  `json:"no_batch"`
	NoFaktur  string  `json:"no_faktur"`
}

type ResepPulangPageResponse struct {
	Page  int                   `json:"page"`
	Size  int                   `json:"size"`
	Total int                   `json:"total"`
	Data  []ResepPulangResponse `json:"data"`
}
