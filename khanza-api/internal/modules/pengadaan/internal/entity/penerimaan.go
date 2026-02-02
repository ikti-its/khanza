package entity

import (
	"time"

	"github.com/google/uuid"
)

type Penerimaan struct {
	Id          uuid.UUID `db:"id"`
	IdPengajuan uuid.UUID `db:"id_pengajuan"`
	IdPemesanan uuid.UUID `db:"id_pemesanan"`
	Nomor       string    `db:"no_faktur"`
	Datang      time.Time `db:"tanggal_datang"`
	Faktur      time.Time `db:"tanggal_faktur"`
	JatuhTempo  time.Time `db:"tanggal_jthtempo"`
	IdPegawai   uuid.UUID `db:"id_pegawai"`
	Ruangan     int       `db:"id_ruangan"`
	Updater     uuid.UUID `db:"updater"`
}
