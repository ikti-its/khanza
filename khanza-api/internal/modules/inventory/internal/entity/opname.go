package entity

import (
	"time"

	"github.com/google/uuid"
)

type Opname struct {
	Id            uuid.UUID `db:"id"`
	IdBarangMedis uuid.UUID `db:"id_barang_medis"`
	IdRuangan     int       `db:"id_ruangan"`
	HBeli         float64   `db:"h_beli"`
	Tanggal       time.Time `db:"tanggal"`
	Real          int       `db:"real"`
	Stok          int       `db:"stok"`
	Keterangan    string    `db:"keterangan"`
	NoBatch       string    `db:"no_batch"`
	NoFaktur      string    `db:"no_faktur"`
}
