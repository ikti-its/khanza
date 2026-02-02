package entity

import (
	"time"

	"github.com/google/uuid"
)

type Tagihan struct {
	Id           uuid.UUID `db:"id"`
	IdPengajuan  uuid.UUID `db:"id_pengajuan"`
	IdPemesanan  uuid.UUID `db:"id_pemesanan"`
	IdPenerimaan uuid.UUID `db:"id_penerimaan"`
	Tanggal      time.Time `db:"tanggal_bayar"`
	Jumlah       float64   `db:"jumlah_bayar"`
	IdPegawai    uuid.UUID `db:"id_pegawai"`
	Keterangan   string    `db:"keterangan"`
	Nomor        string    `db:"no_bukti"`
	AkunBayar    int       `db:"id_akun_bayar"`
	Updater      uuid.UUID `db:"updater"`
}
