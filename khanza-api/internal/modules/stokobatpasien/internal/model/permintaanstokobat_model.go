package model

type StokObatRequest struct {
	KodeBarang  string   `json:"kode_barang"`
	Jumlah      int      `json:"jumlah"`
	AturanPakai string   `json:"aturan_pakai"`
	Embalase    *float64 `json:"embalase,omitempty"`
	Tuslah      *float64 `json:"tuslah,omitempty"`
	JamObat     []string `json:"jam_obat,omitempty"`
	KdBangsal   string   `json:"kd_bangsal"`
	NoBatch     string   `json:"no_batch"`
	NoFaktur    string   `json:"no_faktur"`
}

// Entity untuk Permintaan Stok Obat
type PermintaanStokObat struct {
	NoPermintaan  string  `json:"no_permintaan"`
	TglPermintaan string  `json:"tgl_permintaan"`
	Jam           string  `json:"jam"`
	NoRawat       string  `json:"no_rawat"`
	KdDokter      string  `json:"kd_dokter"`
	Status        string  `json:"status"`       // "Sudah" atau "Belum"
	TglValidasi   *string `json:"tgl_validasi"` // Bisa kosong jika belum validasi
	JamValidasi   *string `json:"jam_validasi"` // Bisa kosong jika belum validasi
}

// Request payload untuk Permintaan Stok Obat
type PermintaanStokObatRequest struct {
	NoPermintaan  string            `json:"no_permintaan"`
	TglPermintaan string            `json:"tgl_permintaan"`
	Jam           string            `json:"jam"`
	NoRawat       string            `json:"no_rawat"`
	KdDokter      string            `json:"kd_dokter"`
	Status        string            `json:"status"`                 // "Sudah" atau "Belum"
	TglValidasi   *string           `json:"tgl_validasi,omitempty"` // Optional
	JamValidasi   *string           `json:"jam_validasi,omitempty"` // Optional
	StokObat      []StokObatRequest `json:"stok_obat"`
}

// Response untuk 1 Data Permintaan
type PermintaanStokObatResponse struct {
	Code   int                `json:"code"`
	Status string             `json:"status"`
	Data   PermintaanStokObat `json:"data"`
}

// Response untuk List Data Permintaan
type PermintaanStokObatListResponse struct {
	Code   int                  `json:"code"`
	Status string               `json:"status"`
	Data   []PermintaanStokObat `json:"data"`
}
