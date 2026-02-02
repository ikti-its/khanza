package entity

import "time"

type PemberianObat struct {
	TanggalBeri time.Time `db:"tanggal_beri"`
	JamBeri     time.Time `db:"jam_beri"`
	NomorRawat  string    `db:"nomor_rawat"`
	NamaPasien  string    `db:"nama_pasien"`
	KodeObat    string    `db:"kode_obat"`
	NamaObat    string    `db:"nama_obat"`
	Embalase    *string   `db:"embalase"`
	Tuslah      *string   `db:"tuslah"`
	Jumlah      *string   `db:"jumlah"`
	BiayaObat   *float64  `db:"biaya_obat"`
	Total       *float64  `db:"total"`
	Gudang      *string   `db:"gudang"`
	NoBatch     *string   `db:"no_batch"`
	NoFaktur    *string   `db:"no_faktur"`
	Kelas       *string   `db:"kelas"`
}

type DataBarang struct {
	KodeObat string `db:"kode_brng" json:"kode_obat"`
	NamaObat string `db:"nama_brng" json:"nama_obat"`

	Dasar       float64 `db:"dasar"`
	Kelas1      float64 `db:"kelas1"`
	Kelas2      float64 `db:"kelas2"`
	Kelas3      float64 `db:"kelas3"`
	Utama       float64 `db:"utama"`
	VIP         float64 `db:"vip"`
	VVIP        float64 `db:"vvip"`
	JualBebas   float64 `db:"jualbebas"`
	StokMinimal int     `db:"stokminimal" json:"stokminimal"`
	Kapasitas   int     `db:"kapasitas" json:"kapasitas"`
}
