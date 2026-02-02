package entity

import (
	"time"

	"github.com/google/uuid"
)

type Pengajuan struct {
	Id      uuid.UUID `db:"id"`
	Tanggal time.Time `db:"tanggal_pengajuan"`
	Nomor   string    `db:"nomor_pengajuan"`
	Pegawai uuid.UUID `db:"id_pegawai"`
	Total   float64   `db:"total_pengajuan"`
	Catatan string    `db:"catatan"`
	Status  string    `db:"status_pesanan"`
	Updater uuid.UUID `db:"updater"`
}
