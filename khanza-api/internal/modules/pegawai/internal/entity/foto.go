package entity

import (
	"github.com/google/uuid"
)

type Foto struct {
	IdPegawai uuid.UUID `db:"id_pegawai"`
	Foto      string    `db:"foto"`
	Updater   uuid.UUID `db:"updater"`
}
