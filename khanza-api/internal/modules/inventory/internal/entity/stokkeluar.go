package entity

import (
	"time"

	"github.com/google/uuid"
)

type StokKeluar struct {
	Id         uuid.UUID `db:"id"`
	NoKeluar   string    `db:"no_keluar"`
	IdPegawai  uuid.UUID `db:"id_pegawai"`
	Tanggal    time.Time `db:"tanggal_stok_keluar"`
	IdRuangan  int       `db:"id_ruangan"`
	Keterangan string    `db:"keterangan"`
}
