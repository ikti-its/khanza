package entity

import "time"

type CatatanObservasiRanapPostpartum struct {
	NoRawat      string    `db:"no_rawat" json:"no_rawat"`
	TglPerawatan time.Time `db:"tgl_perawatan" json:"tgl_perawatan"`
	JamRawat     string    `db:"jam_rawat" json:"jam_rawat"` // stored as TIME, but string is usually fine for time-only fields
	GCS          *string   `db:"gcs" json:"gcs,omitempty"`
	TD           string    `db:"td" json:"td"`
	HR           *string   `db:"hr" json:"hr,omitempty"`
	RR           *string   `db:"rr" json:"rr,omitempty"`
	Suhu         *string   `db:"suhu" json:"suhu,omitempty"`
	SPO2         string    `db:"spo2" json:"spo2"`
	TFU          string    `db:"tfu" json:"tfu"`
	Kontraksi    string    `db:"kontraksi" json:"kontraksi"`
	Perdarahan   string    `db:"perdarahan" json:"perdarahan"`
	Keterangan   string    `db:"keterangan" json:"keterangan"`
	NIP          string    `db:"nip" json:"nip"`
}
