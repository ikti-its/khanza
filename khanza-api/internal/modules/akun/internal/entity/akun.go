package entity

import (
	"github.com/google/uuid"
)

type Akun struct {
	Id       uuid.UUID `db:"id"`
	Email    string    `db:"email"`
	Password string    `db:"password"`
	Foto     string    `db:"foto"`
	Role     int       `db:"role"`
	Updater  uuid.UUID `db:"updater"`
}
