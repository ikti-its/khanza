package entity

import (
	"database/sql"

	"github.com/google/uuid"
)

type Brgmedis struct {
	Id          uuid.UUID    `db:"id"`
	KodeBarang  string       `db:"kode_barang"`
	Kandungan   string       `db:"kandungan"`
	IdIndustri  int          `db:"id_industri"`
	Nama        string       `db:"nama"`
	IdSatBesar  int          `db:"id_satbesar"`
	IdSatuan    int          `db:"id_satuan"`
	HDasar      float64      `db:"h_dasar"`
	HBeli       float64      `db:"h_beli"`
	HRalan      float64      `db:"h_ralan"`
	HKelasI     float64      `db:"h_kelas1"`
	HKelasII    float64      `db:"h_kelas2"`
	HKelasIII   float64      `db:"h_kelas3"`
	HUtama      float64      `db:"h_utama"`
	HVIP        float64      `db:"h_vip"`
	HVVIP       float64      `db:"h_vvip"`
	HBeliLuar   float64      `db:"h_beliluar"`
	HJualBebas  float64      `db:"h_jualbebas"`
	HKaryawan   float64      `db:"h_karyawan"`
	StokMinimum int          `db:"stok_minimum"`
	IdJenis     int          `db:"id_jenis"`
	Isi         int          `db:"isi"`
	Kapasitas   int          `db:"kapasitas"`
	Kadaluwarsa sql.NullTime `db:"kadaluwarsa"`
	IdKategori  int          `db:"id_kategori"`
	IdGolongan  int          `db:"id_golongan"`
}
