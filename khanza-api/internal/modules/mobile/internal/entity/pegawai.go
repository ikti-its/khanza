package entity

import (
	"time"

	"github.com/google/uuid"
)

type Pegawai struct {
	Pegawai      uuid.UUID `db:"pegawai"`
	Akun         uuid.UUID `db:"akun"`
	NIP          string    `db:"nip"`
	NIK          string    `db:"nik"`
	Nama         string    `db:"nama"`
	JenisKelamin string    `db:"jenis_kelamin"`
	TempatLahir  string    `db:"tempat_lahir"`
	TanggalLahir time.Time `db:"tanggal_lahir"`
	Agama        string    `db:"agama"`
	Pendidikan   string    `db:"pendidikan"`
	Jabatan      string    `db:"jabatan"`
	Departemen   string    `db:"departemen"`
	Status       string    `db:"status"`
	JenisPegawai string    `db:"jenis_pegawai"`
	Telepon      string    `db:"telepon"`
	TanggalMasuk time.Time `db:"tanggal_masuk"`
}
