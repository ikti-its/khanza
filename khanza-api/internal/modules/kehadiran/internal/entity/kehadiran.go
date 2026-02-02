package entity

import (
	"database/sql"
	"time"

	"github.com/google/uuid"
)

type Kehadiran struct {
	Id              uuid.UUID    `db:"id"`
	IdPegawai       uuid.UUID    `db:"id_pegawai"`
	IdJadwalPegawai uuid.UUID    `db:"id_jadwal_pegawai"`
	Tanggal         time.Time    `db:"tanggal"`
	JamMasuk        time.Time    `db:"jam_masuk"`
	JamPulang       sql.NullTime `db:"jam_pulang"`
	Keterangan      string       `db:"keterangan"`
	Foto            string       `db:"foto"`
	Updater         uuid.UUID    `db:"updater"`
}

type KodePresensi struct {
	Kode string `db:"kode"`
}
