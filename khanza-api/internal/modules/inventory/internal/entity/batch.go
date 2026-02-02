package entity

import (
	"database/sql"
	"time"

	"github.com/google/uuid"
)

type Batch struct {
	NoBatch       string       `db:"no_batch"`
	NoFaktur      string       `db:"no_faktur"`
	IdBarangMedis uuid.UUID    `db:"id_barang_medis"`
	TanggalDatang time.Time    `db:"tanggal_datang"`
	Kadaluwarsa   sql.NullTime `db:"kadaluwarsa"`
	Asal          string       `db:"asal"`
	HDasar        float64      `db:"h_dasar"`
	HBeli         float64      `db:"h_beli"`
	HRalan        float64      `db:"h_ralan"`
	HKelasI       float64      `db:"h_kelas1"`
	HKelasII      float64      `db:"h_kelas2"`
	HKelasIII     float64      `db:"h_kelas3"`
	HUtama        float64      `db:"h_utama"`
	HVIP          float64      `db:"h_vip"`
	HVVIP         float64      `db:"h_vvip"`
	HBeliLuar     float64      `db:"h_beliluar"`
	HJualBebas    float64      `db:"h_jualbebas"`
	HKaryawan     float64      `db:"h_karyawan"`
	JumlahBeli    int          `db:"jumlahbeli"`
	Sisa          int          `db:"sisa"`
}
