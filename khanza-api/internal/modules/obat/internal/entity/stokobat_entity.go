package entity

import "github.com/google/uuid"

type GudangBarang struct {
	ID            uuid.UUID `db:"id" json:"id"`                           // Primary Key (UUID)
	IDBarangMedis string    `db:"id_barang_medis" json:"id_barang_medis"` // VARCHAR
	IDRuangan     int       `db:"id_ruangan" json:"id_ruangan"`           // INTEGER
	Stok          int       `db:"stok" json:"stok"`                       // INTEGER
	NoBatch       string    `db:"no_batch" json:"no_batch"`               // VARCHAR(20)
	NoFaktur      string    `db:"no_faktur" json:"no_faktur"`             // VARCHAR(20)
	Kapasitas     int       `db:"kapasitas" json:"kapasitas"`
}
