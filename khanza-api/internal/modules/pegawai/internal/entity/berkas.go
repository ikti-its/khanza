package entity

import (
	"time"

	"github.com/google/uuid"
)

type Berkas struct {
	IdPegawai    uuid.UUID `db:"id_pegawai"`
	NIK          string    `db:"nik"`
	TempatLahir  string    `db:"tempat_lahir"`
	TanggalLahir time.Time `db:"tanggal_lahir"`
	Agama        string    `db:"agama"`
	Pendidikan   string    `db:"pendidikan"`
	KTP          string    `db:"ktp"`
	KK           string    `db:"kk"`
	NPWP         string    `db:"npwp"`
	BPJS         string    `db:"bpjs"`
	Ijazah       string    `db:"ijazah"`
	SKCK         string    `db:"skck"`
	STR          string    `db:"str"`
	SerKom       string    `db:"serkom"`
	Updater      uuid.UUID `db:"updater"`
}
