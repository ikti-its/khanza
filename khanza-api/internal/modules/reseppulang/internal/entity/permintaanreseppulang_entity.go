package entity

import "time"

// PermintaanResepPulang maps to the permintaan_resep_pulang table
type PermintaanResepPulang struct {
	NoPermintaan  string     `db:"no_permintaan"`  // varchar(14), PK
	TglPermintaan *time.Time `db:"tgl_permintaan"` // nullable DATE
	Jam           time.Time  `db:"jam"`            // TIME (tidak nullable)
	NoRawat       string     `db:"no_rawat"`       // varchar(17)
	KdDokter      string     `db:"kd_dokter"`      // varchar(20)
	Status        string     `db:"status"`         // ENUM-like: 'Sudah', 'Belum'
	TglValidasi   *time.Time `db:"tgl_validasi"`   // ✅ nullable DATE
	JamValidasi   *time.Time `db:"jam_validasi"`   // ✅ nullable TIME
	KodeBrng      string     `json:"kode_brng" db:"kode_brng"`
	Jumlah        int        `json:"jumlah" db:"jumlah"`
	AturanPakai   string     `json:"aturan_pakai" db:"aturan_pakai"`
}

// ResepPulangObat maps obat-obatan dalam resep pulang
type ResepPulangObat struct {
	NoPermintaan string  `db:"no_permintaan" json:"no_permintaan"`
	KodeBrng     string  `db:"kode_brng" json:"kode_brng"`
	NamaObat     string  `db:"nama_obat" json:"nama_obat"`
	Jumlah       float64 `db:"jumlah" json:"jumlah"`
	AturanPakai  string  `json:"aturan_pakai" db:"aturan_pakai"`
	HargaDasar   float64 `db:"harga_dasar" json:"harga_dasar"`
	Kelas1       float64 `db:"kelas1" json:"kelas1"`
	Kelas2       float64 `db:"kelas2" json:"kelas2"`
	Kelas3       float64 `db:"kelas3" json:"kelas3"`
	Utama        float64 `db:"utama" json:"utama"`
	VIP          float64 `db:"vip" json:"vip"`
	VVIP         float64 `db:"vvip" json:"vvip"`
}
