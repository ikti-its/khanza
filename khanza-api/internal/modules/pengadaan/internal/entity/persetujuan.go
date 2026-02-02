package entity

import "github.com/google/uuid"

type Persetujuan struct {
	IdPengajuan    uuid.UUID `db:"id_pengajuan"`
	Status         string    `db:"status"`
	StatusApoteker string    `db:"status_apoteker"`
	StatusKeuangan string    `db:"status_keuangan"`
	Apoteker       uuid.UUID `db:"id_apoteker"`
	Keuangan       uuid.UUID `db:"id_keuangan"`
	Updater        uuid.UUID `db:"updater"`
}
