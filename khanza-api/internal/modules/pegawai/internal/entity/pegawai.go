package entity

import (
	"time"

	"github.com/google/uuid"
)

type Pegawai struct {
	Id           uuid.UUID `db:"id"`
	IdAkun       uuid.UUID `db:"id_akun"`
	NIP          string    `db:"nip"`
	Nama         string    `db:"nama"`
	JenisKelamin string    `db:"jenis_kelamin"`
	Jabatan      int       `db:"id_jabatan"`
	Departemen   int       `db:"id_departemen"`
	StatusAktif  string    `db:"id_status_aktif"`
	JenisPegawai string    `db:"jenis_pegawai"`
	Telepon      string    `db:"telepon"`
	TanggalMasuk time.Time `db:"tanggal_masuk"`
	Updater      uuid.UUID `db:"updater"`
}
