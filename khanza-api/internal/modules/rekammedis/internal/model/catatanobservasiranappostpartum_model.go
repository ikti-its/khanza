package model

// CatatanObservasiRanapPostpartum is the full record as stored in the DB (and returned by SQLx).
type CatatanObservasiRanapPostpartum struct {
	NoRawat      string `json:"no_rawat" db:"no_rawat" validate:"required"`
	TglPerawatan string `json:"tgl_perawatan" db:"tgl_perawatan" validate:"required,datetime=2006-01-02"`
	JamRawat     string `json:"jam_rawat" db:"jam_rawat" validate:"required,datetime=15:04:05"`

	GCS        string `json:"gcs,omitempty" db:"gcs"`
	TD         string `json:"td" db:"td" validate:"required"`
	HR         string `json:"hr,omitempty" db:"hr"`
	RR         string `json:"rr,omitempty" db:"rr"`
	Suhu       string `json:"suhu,omitempty" db:"suhu"`
	Spo2       string `json:"spo2" db:"spo2" validate:"required"`
	TFU        string `json:"tfu" db:"tfu" validate:"required"`
	Kontraksi  string `json:"kontraksi" db:"kontraksi" validate:"required"`
	Perdarahan string `json:"perdarahan" db:"perdarahan" validate:"required"`
	Keterangan string `json:"keterangan" db:"keterangan" validate:"required"`
	NIP        string `json:"nip" db:"nip" validate:"required"`
}

// CatatanObservasiRanapPostpartumRequest is used to bind/validate incoming JSON payloads.
type CatatanObservasiRanapPostpartumRequest struct {
	NoRawat      string `json:"no_rawat" validate:"required"`
	TglPerawatan string `json:"tgl_perawatan" validate:"required,datetime=2006-01-02"`
	JamRawat     string `json:"jam_rawat" validate:"required,datetime=15:04:05"`

	GCS        string `json:"gcs,omitempty"`
	TD         string `json:"td" validate:"required"`
	HR         string `json:"hr,omitempty"`
	RR         string `json:"rr,omitempty"`
	Suhu       string `json:"suhu,omitempty"`
	Spo2       string `json:"spo2" validate:"required"`
	TFU        string `json:"tfu" validate:"required"`
	Kontraksi  string `json:"kontraksi" validate:"required"`
	Perdarahan string `json:"perdarahan" validate:"required"`
	Keterangan string `json:"keterangan" validate:"required"`
	NIP        string `json:"nip" validate:"required"`
}

// CatatanObservasiRanapPostpartumResponse is the shape sent back in API responses.
type CatatanObservasiRanapPostpartumResponse struct {
	NoRawat      string `json:"no_rawat"`
	TglPerawatan string `json:"tgl_perawatan"` // YYYY-MM-DD
	JamRawat     string `json:"jam_rawat"`     // HH:MM:SS

	GCS        string `json:"gcs,omitempty"`
	TD         string `json:"td"`
	HR         string `json:"hr,omitempty"`
	RR         string `json:"rr,omitempty"`
	Suhu       string `json:"suhu,omitempty"`
	Spo2       string `json:"spo2"`
	TFU        string `json:"tfu"`
	Kontraksi  string `json:"kontraksi"`
	Perdarahan string `json:"perdarahan"`
	Keterangan string `json:"keterangan"`
	NIP        string `json:"nip"`
}

// CatatanObservasiRanapPostpartumPageResponse wraps paginated results.
type CatatanObservasiRanapPostpartumPageResponse struct {
	Page  int                                       `json:"page"`
	Size  int                                       `json:"size"`
	Total int                                       `json:"total"`
	Data  []CatatanObservasiRanapPostpartumResponse `json:"data"`
}
