package entity

import "github.com/google/uuid"

type User struct {
	Id    uuid.UUID `db:"id"`
	Email string    `db:"email"`
	Foto  string    `db:"foto"`
	Role  int       `db:"role"`
}
