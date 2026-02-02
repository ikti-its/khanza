package entity

import (
	"time"

	"github.com/google/uuid"
)

type Pemesanan struct {
	Id          uuid.UUID `db:"id"`
	Tanggal     time.Time `db:"tanggal_pesan"`
	Nomor       string    `db:"no_pemesanan"`
	IdPengajuan uuid.UUID `db:"id_pengajuan"`
	Supplier    int       `db:"id_supplier"`
	IdPegawai   uuid.UUID `db:"id_pegawai"`
	PajakPersen float64   `db:"pajak_persen"`
	PajakJumlah float64   `db:"pajak_jumlah"`
	Materai     float64   `db:"materai"`
	Total       float64   `db:"total_pemesanan"`
	Updater     uuid.UUID `db:"updater"`
}
