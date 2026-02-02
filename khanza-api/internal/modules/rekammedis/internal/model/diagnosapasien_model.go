package model

// Main struct for internal use (e.g., DB operations or service logic)
type DiagnosaPasien struct {
	NoRawat        string  `json:"no_rawat" db:"no_rawat" validate:"required"`
	KodePenyakit   string  `json:"kd_penyakit" db:"kd_penyakit" validate:"required"`
	Status         string  `json:"status" db:"status" validate:"required,oneof=Ralan Ranap"`
	Prioritas      int16   `json:"prioritas" db:"prioritas" validate:"required"`
	StatusPenyakit *string `json:"status_penyakit,omitempty" db:"status_penyakit"` // 'Lama' or 'Baru'
}

// Used for incoming POST/PUT requests
type DiagnosaPasienRequest struct {
	NoRawat        string `json:"no_rawat" validate:"required"`
	KodePenyakit   string `json:"kd_penyakit" validate:"required"`
	Status         string `json:"status" validate:"required,oneof=Ralan Ranap"`
	Prioritas      int16  `json:"prioritas" validate:"required"`
	StatusPenyakit string `json:"status_penyakit,omitempty" validate:"omitempty,oneof=Lama Baru"`
}

// Used for responses sent to frontend
type DiagnosaPasienResponse struct {
	NoRawat        string `json:"no_rawat"`
	KodePenyakit   string `json:"kd_penyakit"`
	Status         string `json:"status"`
	Prioritas      int16  `json:"prioritas"`
	StatusPenyakit string `json:"status_penyakit,omitempty"`
}

// For paginated responses
type DiagnosaPasienPageResponse struct {
	Page  int                      `json:"page"`
	Size  int                      `json:"size"`
	Total int                      `json:"total"`
	Data  []DiagnosaPasienResponse `json:"data"`
}
