package entity

import (
	"github.com/google/uuid"
)

type Transaksi struct {
	Id            uuid.UUID `db:"id"`
	IdStokKeluar  uuid.UUID `db:"id_stok_keluar"`
	IdBarangMedis uuid.UUID `db:"id_barang_medis"`
	NoBatch       string    `db:"no_batch"`
	NoFaktur      string    `db:"no_faktur"`
	JumlahKeluar  int       `db:"jumlah_keluar"`
}
