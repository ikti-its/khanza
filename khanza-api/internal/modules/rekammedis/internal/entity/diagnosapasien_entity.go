package entity

type DiagnosaPasien struct {
	NoRawat        string  `db:"no_rawat" json:"no_rawat"`
	KodePenyakit   string  `db:"kd_penyakit" json:"kd_penyakit"`
	Status         string  `db:"status" json:"status"`                             // 'Ralan' or 'Ranap'
	Prioritas      int16   `db:"prioritas" json:"prioritas"`                       // TINYINT equivalent is int16
	StatusPenyakit *string `db:"status_penyakit" json:"status_penyakit,omitempty"` // 'Lama' or 'Baru', nullable
}
