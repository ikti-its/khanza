package entity

import (
	"time"

	"github.com/google/uuid"
)

type Cuti struct {
	Id             uuid.UUID `db:"id"`
	IdPegawai      uuid.UUID `db:"id_pegawai"`
	TanggalMulai   time.Time `db:"tanggal_mulai"`
	TanggalSelesai time.Time `db:"tanggal_selesai"`
	IdAlasan       string    `db:"id_alasan_cuti"`
	Status         string    `db:"status"`
	Updater        uuid.UUID `db:"updater"`
}
