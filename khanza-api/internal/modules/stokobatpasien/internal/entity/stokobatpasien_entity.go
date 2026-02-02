package entity

import "database/sql"

type StokObatPasien struct {
	NoPermintaan string         `db:"no_permintaan" json:"no_permintaan"`
	Tanggal      string         `db:"tanggal" json:"tanggal"` // format: YYYY-MM-DD
	Jam          string         `db:"jam" json:"jam"`         // format: HH:mm:ss
	NoRawat      string         `db:"no_rawat" json:"no_rawat"`
	KodeBrng     string         `db:"kode_brng" json:"kode_brng"`
	Jumlah       float64        `db:"jumlah" json:"jumlah"`
	KdBangsal    string         `db:"kd_bangsal" json:"kd_bangsal"`
	NoBatch      string         `db:"no_batch" json:"no_batch"`
	NoFaktur     string         `db:"no_faktur" json:"no_faktur"`
	AturanPakai  string         `db:"aturan_pakai" json:"aturan_pakai"`
	NamaPasien   sql.NullString `db:"nama_pasien" json:"nama_pasien"`
	NamaBrng     sql.NullString `db:"nama_brng"`

	// Pemakaian per jam
	Jam00 bool `db:"jam00" json:"jam00"`
	Jam01 bool `db:"jam01" json:"jam01"`
	Jam02 bool `db:"jam02" json:"jam02"`
	Jam03 bool `db:"jam03" json:"jam03"`
	Jam04 bool `db:"jam04" json:"jam04"`
	Jam05 bool `db:"jam05" json:"jam05"`
	Jam06 bool `db:"jam06" json:"jam06"`
	Jam07 bool `db:"jam07" json:"jam07"`
	Jam08 bool `db:"jam08" json:"jam08"`
	Jam09 bool `db:"jam09" json:"jam09"`
	Jam10 bool `db:"jam10" json:"jam10"`
	Jam11 bool `db:"jam11" json:"jam11"`
	Jam12 bool `db:"jam12" json:"jam12"`
	Jam13 bool `db:"jam13" json:"jam13"`
	Jam14 bool `db:"jam14" json:"jam14"`
	Jam15 bool `db:"jam15" json:"jam15"`
	Jam16 bool `db:"jam16" json:"jam16"`
	Jam17 bool `db:"jam17" json:"jam17"`
	Jam18 bool `db:"jam18" json:"jam18"`
	Jam19 bool `db:"jam19" json:"jam19"`
	Jam20 bool `db:"jam20" json:"jam20"`
	Jam21 bool `db:"jam21" json:"jam21"`
	Jam22 bool `db:"jam22" json:"jam22"`
	Jam23 bool `db:"jam23" json:"jam23"`
}
