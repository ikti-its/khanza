package entity

import "github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/model"

type PermintaanStokObat struct {
	NoPermintaan  string                  `db:"no_permintaan" json:"no_permintaan"`
	TglPermintaan string                  `db:"tgl_permintaan" json:"tgl_permintaan"` // date as string
	JamPermintaan string                  `db:"jam" json:"jam"`                       // time as string
	NoRawat       string                  `db:"no_rawat" json:"no_rawat"`
	KdDokter      string                  `db:"kd_dokter" json:"kd_dokter"`
	Status        string                  `db:"status" json:"status"`             // "Sudah" atau "Belum"
	TglValidasi   *string                 `db:"tgl_validasi" json:"tgl_validasi"` // date, bisa nullable jadi kosong
	JamValidasi   *string                 `db:"jam_validasi" json:"jam_validasi"` // time, bisa nullable jadi kosong
	StokObat      []model.StokObatRequest `json:"stok_obat"`
}
