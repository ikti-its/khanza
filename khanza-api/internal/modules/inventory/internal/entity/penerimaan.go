package entity

import (
	"database/sql"
	"time"

	"github.com/google/uuid"
)

type Penerimaan struct {
	Id                uuid.UUID `db:"id"`
	NoFaktur          string    `db:"no_faktur"`
	NoPemesanan       string    `db:"no_pemesanan"`
	IdSupplier        int       `db:"id_supplier"`
	TanggalDatang     time.Time `db:"tanggal_datang"`
	TanggalFaktur     time.Time `db:"tanggal_faktur"`
	TanggalJatuhTempo time.Time `db:"tanggal_jthtempo"`
	IdPegawai         uuid.UUID `db:"id_pegawai"`
	IdRuangan         int       `db:"id_ruangan"`
	PajakPersen       float64   `db:"pajak_persen"`
	PajakJumlah       float64   `db:"pajak_jumlah"`
	Tagihan           float64   `db:"tagihan"`
	Materai           float64   `db:"materai"`
}

type DetailPenerimaan struct {
	IdPenerimaan    uuid.UUID    `db:"id_penerimaan"`
	IdBarangMedis   uuid.UUID    `db:"id_barang_medis"`
	IdSatuan        int          `db:"id_satuan"`
	UbahMaster      string       `db:"ubah_master"`
	Jumlah          int          `db:"jumlah"`
	HPesan          float64      `db:"h_pesan"`
	SubtotalPerItem float64      `db:"subtotal_per_item"`
	DiskonPersen    float64      `db:"diskon_persen"`
	DiskonJumlah    float64      `db:"diskon_jumlah"`
	TotalPerItem    float64      `db:"total_per_item"`
	JumlahDiterima  int          `db:"jumlah_diterima"`
	Kadaluwarsa     sql.NullTime `db:"kadaluwarsa"`
	NoBatch         string       `db:"no_batch"`
}
