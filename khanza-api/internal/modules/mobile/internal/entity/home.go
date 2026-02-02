package entity

import (
	"time"

	"github.com/google/uuid"
)

type Home struct {
	Akun      uuid.UUID `db:"akun"`
	Pegawai   uuid.UUID `db:"pegawai"`
	Nama      string    `db:"nama"`
	NIP       string    `db:"nip"`
	Role      string    `db:"role"`
	Email     string    `db:"email"`
	Telepon   string    `db:"telepon"`
	Profil    string    `db:"profil"`
	Alamat    string    `db:"alamat"`
	AlamatLat float64   `db:"alamat_lat"`
	AlamatLon float64   `db:"alamat_lon"`
	Foto      string    `db:"foto"`
	Jadwal    uuid.UUID `db:"jadwal"`
	Shift     string    `db:"shift"`
	JamMasuk  time.Time `db:"jam_masuk"`
	JamPulang time.Time `db:"jam_pulang"`
}
