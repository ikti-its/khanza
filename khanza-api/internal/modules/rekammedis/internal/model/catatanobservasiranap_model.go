package model

type CatatanObservasiRanap struct {
	NoRawat      string `json:"no_rawat" db:"no_rawat" validate:"required"`
	TglPerawatan string `json:"tgl_perawatan" db:"tgl_perawatan" validate:"required"` // YYYY-MM-DD
	JamRawat     string `json:"jam_rawat" db:"jam_rawat" validate:"required"`         // HH:MM:SS

	GCS  string `json:"gcs,omitempty" db:"gcs"`
	TD   string `json:"td" db:"td" validate:"required"`
	HR   string `json:"hr,omitempty" db:"hr"`
	RR   string `json:"rr,omitempty" db:"rr"`
	Suhu string `json:"suhu,omitempty" db:"suhu"`
	Spo2 string `json:"spo2" db:"spo2" validate:"required"`
	NIP  string `json:"nip" db:"nip" validate:"required"`
}

// Used for incoming POST/PUT requests
type CatatanObservasiRanapRequest struct {
	NoRawat string `json:"no_rawat" validate:"required"`
	Tanggal string `json:"tgl_perawatan" validate:"required,datetime=2006-01-02"`
	Jam     string `json:"jam_rawat" validate:"required,datetime=15:04:05"`

	GCS  string `json:"gcs,omitempty"`
	TD   string `json:"td" validate:"required"`
	HR   string `json:"hr,omitempty"`
	RR   string `json:"rr,omitempty"`
	Suhu string `json:"suhu,omitempty"`
	Spo2 string `json:"spo2" validate:"required"`
	NIP  string `json:"nip" validate:"required"`
}

// Used for responses sent to frontend
type CatatanObservasiRanapResponse struct {
	NoRawat string `json:"no_rawat"`
	Tanggal string `json:"tanggal"` // YYYY-MM-DD
	Jam     string `json:"jam"`     // HH:MM:SS

	GCS  string `json:"gcs,omitempty"`
	TD   string `json:"td"`
	HR   string `json:"hr,omitempty"`
	RR   string `json:"rr,omitempty"`
	Suhu string `json:"suhu,omitempty"`
	Spo2 string `json:"spo2"`
	NIP  string `json:"nip"`
}

// For paginated results
type CatatanObservasiRanapPageResponse struct {
	Page  int                             `json:"page"`
	Size  int                             `json:"size"`
	Total int                             `json:"total"`
	Data  []CatatanObservasiRanapResponse `json:"data"`
}
