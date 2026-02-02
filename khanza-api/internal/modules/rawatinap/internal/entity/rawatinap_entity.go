package entity

import (
	"database/sql"
	"time"
)

type RawatInap struct {
	NomorRawat      string          `json:"nomor_rawat" db:"nomor_rawat"`
	NomorRM         string          `json:"nomor_rm" db:"nomor_rm"`
	NamaPasien      string          `json:"nama_pasien" db:"nama_pasien"`
	AlamatPasien    sql.NullString  `json:"alamat_pasien" db:"alamat_pasien"`
	PenanggungJawab sql.NullString  `json:"penanggung_jawab" db:"penanggung_jawab"`
	HubunganPJ      sql.NullString  `json:"hubungan_pj" db:"hubungan_pj"`
	JenisBayar      sql.NullString  `json:"jenis_bayar" db:"jenis_bayar"`
	Kamar           sql.NullString  `json:"kamar" db:"kamar"`
	TarifKamar      sql.NullFloat64 `json:"tarif_kamar" db:"tarif_kamar"`
	DiagnosaAwal    sql.NullString  `json:"diagnosa_awal" db:"diagnosa_awal"`
	DiagnosaAkhir   sql.NullString  `json:"diagnosa_akhir" db:"diagnosa_akhir"`
	TanggalMasuk    time.Time       `json:"tanggal_masuk" db:"tanggal_masuk"`
	JamMasuk        sql.NullTime    `json:"jam_masuk" db:"jam_masuk"`
	TanggalKeluar   sql.NullTime    `json:"tanggal_keluar" db:"tanggal_keluar"`
	JamKeluar       sql.NullTime    `json:"jam_keluar" db:"jam_keluar"`
	TotalBiaya      sql.NullFloat64 `json:"total_biaya" db:"total_biaya"`
	StatusPulang    sql.NullString  `json:"status_pulang" db:"status_pulang"`
	LamaRanap       sql.NullFloat64 `json:"lama_ranap" db:"lama_ranap"`
	DokterPJ        sql.NullString  `json:"dokter_pj" db:"dokter_pj"`
	StatusBayar     sql.NullString  `json:"status_bayar" db:"status_bayar"`
}
