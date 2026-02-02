package entity

import "github.com/google/uuid"

type Ketersediaan struct {
	Pegawai    uuid.UUID `db:"pegawai"`
	NIP        string    `db:"nip"`
	Telepon    string    `db:"telepon"`
	Jabatan    string    `db:"jabatan"`
	Departemen string    `db:"departemen"`
	Foto       string    `db:"foto"`
	Nama       string    `db:"nama"`
	Alamat     string    `db:"alamat"`
	Latitude   float64   `db:"latitude"`
	Longitude  float64   `db:"longitude"`
}
