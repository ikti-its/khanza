package entity

import "github.com/google/uuid"

type Organisasi struct {
	Id        uuid.UUID `db:"id"`
	Nama      string    `db:"nama"`
	Alamat    string    `db:"alamat"`
	Latitude  float64   `db:"latitude"`
	Longitude float64   `db:"longitude"`
	Radius    float64   `db:"radius"`
}
