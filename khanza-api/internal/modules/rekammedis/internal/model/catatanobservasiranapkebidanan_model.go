package model

type CatatanObservasiRanapKebidanan struct {
	NoRawat      string `json:"no_rawat" db:"no_rawat" validate:"required"`
	TglPerawatan string `json:"tgl_perawatan" db:"tgl_perawatan" validate:"required"` // format YYYY-MM-DD
	JamRawat     string `json:"jam_rawat" db:"jam_rawat" validate:"required"`         // format HH:MM:SS

	GCS  string `json:"gcs,omitempty" db:"gcs"`
	TD   string `json:"td,omitempty" db:"td"`     // Tekanan darah
	HR   string `json:"hr,omitempty" db:"hr"`     // Heart rate
	RR   string `json:"rr,omitempty" db:"rr"`     // Respiratory rate
	Suhu string `json:"suhu,omitempty" db:"suhu"` // Suhu tubuh
	Spo2 string `json:"spo2,omitempty" db:"spo2"` // Saturasi oksigen

	Kontraksi string `json:"kontraksi" db:"kontraksi" validate:"required"`
	BJJ       string `json:"bjj" db:"bjj" validate:"required"` // Detak jantung janin
	PPV       string `json:"ppv" db:"ppv" validate:"required"` // Positive pressure ventilation
	VT        string `json:"vt" db:"vt" validate:"required"`   // Vaginal Touch
	NIP       string `json:"nip" db:"nip" validate:"required"` // Petugas pencatat
}

type CatatanObservasiRanapKebidananRequest struct {
	NoRawat string `json:"no_rawat" validate:"required"`
	Tanggal string `json:"tgl_perawatan" validate:"required,datetime=2006-01-02"`
	Jam     string `json:"jam_rawat" validate:"required,datetime=15:04:05"`

	GCS  string `json:"gcs,omitempty"`
	TD   string `json:"td,omitempty"`
	HR   string `json:"hr,omitempty"`
	RR   string `json:"rr,omitempty"`
	Suhu string `json:"suhu,omitempty"`
	Spo2 string `json:"spo2,omitempty"`

	Kontraksi string `json:"kontraksi" validate:"required"`
	BJJ       string `json:"bjj" validate:"required"`
	PPV       string `json:"ppv" validate:"required"`
	VT        string `json:"vt" validate:"required"`
	NIP       string `json:"nip" validate:"required"`
}

type CatatanObservasiRanapKebidananResponse struct {
	NoRawat string `json:"no_rawat"`
	Tanggal string `json:"tanggal"` // format YYYY-MM-DD
	Jam     string `json:"jam"`     // format HH:MM:SS

	GCS  string `json:"gcs,omitempty"`
	TD   string `json:"td,omitempty"`
	HR   string `json:"hr,omitempty"`
	RR   string `json:"rr,omitempty"`
	Suhu string `json:"suhu,omitempty"`
	Spo2 string `json:"spo2,omitempty"`

	Kontraksi string `json:"kontraksi"`
	BJJ       string `json:"bjj"`
	PPV       string `json:"ppv"`
	VT        string `json:"vt"`
	NIP       string `json:"nip"`
}

type CatatanObservasiRanapKebidananPageResponse struct {
	Page  int                                      `json:"page"`
	Size  int                                      `json:"size"`
	Total int                                      `json:"total"`
	Data  []CatatanObservasiRanapKebidananResponse `json:"data"`
}
