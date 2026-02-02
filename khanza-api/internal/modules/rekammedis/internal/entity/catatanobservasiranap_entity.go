package entity

import "time"

type CatatanObservasiRanap struct {
	NoRawat      string     `db:"no_rawat" json:"no_rawat"`
	TglPerawatan *time.Time `db:"tgl_perawatan" json:"tgl_perawatan"` // YYYY-MM-DD
	JamRawat     string     `db:"jam_rawat" json:"jam_rawat"`         // HH:MM:SS

	GCS  *string `db:"gcs" json:"gcs,omitempty"`
	TD   string  `db:"td" json:"td"` // Tekanan darah
	HR   *string `db:"hr" json:"hr,omitempty"`
	RR   *string `db:"rr" json:"rr,omitempty"`
	Suhu *string `db:"suhu" json:"suhu,omitempty"`
	Spo2 string  `db:"spo2" json:"spo2"` // Saturasi oksigen
	NIP  string  `db:"nip" json:"nip"`   // Petugas pencatat
}
