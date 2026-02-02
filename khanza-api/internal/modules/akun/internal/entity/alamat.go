package entity

import (
	"github.com/google/uuid"
)

type Alamat struct {
	IdAkun    uuid.UUID `db:"id_akun"`
	Alamat    string    `db:"alamat"`
	AlamatLat float64   `db:"alamat_lat"`
	AlamatLon float64   `db:"alamat_lon"`
	Updater   uuid.UUID `db:"updater"`
}
