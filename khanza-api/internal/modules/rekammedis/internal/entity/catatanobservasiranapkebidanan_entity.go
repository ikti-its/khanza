package entity

import "time"

type CatatanObservasiRanapKebidanan struct {
	NoRawat      string    `db:"no_rawat" json:"no_rawat"`
	TglPerawatan time.Time `db:"tgl_perawatan" json:"tgl_perawatan"`
	JamRawat     string    `db:"jam_rawat" json:"jam_rawat"`

	GCS  *string `db:"gcs" json:"gcs,omitempty"`
	TD   *string `db:"td" json:"td,omitempty"`
	HR   *string `db:"hr" json:"hr,omitempty"`
	RR   *string `db:"rr" json:"rr,omitempty"`
	Suhu *string `db:"suhu" json:"suhu,omitempty"`
	Spo2 *string `db:"spo2" json:"spo2,omitempty"`

	Kontraksi string `db:"kontraksi" json:"kontraksi"`
	BJJ       string `db:"bjj" json:"bjj"`
	PPV       string `db:"ppv" json:"ppv"`
	VT        string `db:"vt" json:"vt"`
	NIP       string `db:"nip" json:"nip"`
}
