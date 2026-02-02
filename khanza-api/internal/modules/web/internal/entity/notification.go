package entity

import (
	"time"

	"github.com/google/uuid"
)

type Notification struct {
	Id        uuid.UUID `db:"id"`
	Sender    uuid.UUID `db:"sender"`
	Recipient uuid.UUID `db:"recipient"`
	Tanggal   time.Time `db:"tanggal"`
	Judul     string    `db:"judul"`
	Pesan     string    `db:"pesan"`
	Read      bool      `db:"read"`
}
