package entity

import (
	"time"

	"github.com/google/uuid"
)

type Jadwal struct {
	Id        uuid.UUID `db:"id"`
	IdPegawai uuid.UUID `db:"id_pegawai"`
	IdHari    int       `db:"id_hari"`
	IdShift   string    `db:"id_shift"`
	JamMasuk  time.Time `db:"jam_masuk"`
	JamPulang time.Time `db:"jam_pulang"`
	Updater   uuid.UUID `db:"updater"`
}
