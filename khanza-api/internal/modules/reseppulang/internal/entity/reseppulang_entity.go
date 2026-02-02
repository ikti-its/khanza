package entity

import "time"

// ResepPulang maps to the resep_pulang table
type ResepPulang struct {
	NoRawat   string    `db:"no_rawat"`   // varchar(17), PK (part of composite key)
	KodeBrng  string    `db:"kode_brng"`  // varchar(15), PK (part of composite key)
	JmlBarang float64   `db:"jml_barang"` // double precision
	Harga     float64   `db:"harga"`      // double precision
	Total     float64   `db:"total"`      // double precision
	Dosis     string    `db:"dosis"`      // varchar(150)
	Tanggal   time.Time `db:"tanggal"`    // DATE
	Jam       time.Time `db:"jam"`        // TIME
	KdBangsal string    `db:"kd_bangsal"` // varchar(5)
	NoBatch   string    `db:"no_batch"`   // varchar(20)
	NoFaktur  string    `db:"no_faktur"`  // varchar(20)
}
