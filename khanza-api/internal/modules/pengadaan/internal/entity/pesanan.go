package entity

import (
	"time"

	"github.com/google/uuid"
)

type Pesanan struct {
	Id             uuid.UUID `db:"id"`
	IdPengajuan    uuid.UUID `db:"id_pengajuan"`
	IdMedis        uuid.UUID `db:"id_barang_medis"`
	Satuan         int       `db:"id_satuan"`
	HargaPengajuan float64   `db:"harga_satuan_pengajuan"`
	HargaPemesanan float64   `db:"harga_satuan_pemesanan"`
	Pesanan        int       `db:"jumlah_pesanan"`
	Total          float64   `db:"total_per_item"`
	Subtotal       float64   `db:"subtotal_per_item"`
	DiskonPersen   float64   `db:"diskon_persen"`
	DiskonJumlah   float64   `db:"diskon_jumlah"`
	Diterima       int       `db:"jumlah_diterima"`
	Kadaluwarsa    time.Time `db:"kadaluwarsa"`
	Batch          string    `db:"no_batch"`
	Updater        uuid.UUID `db:"updater"`
}
