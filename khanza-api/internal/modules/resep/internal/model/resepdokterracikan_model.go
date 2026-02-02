package model

type ResepDokterRacikan struct {
	NoResep     string `json:"no_resep"`
	NoRacik     string `json:"no_racik"`
	NamaRacik   string `json:"nama_racik"`
	KdRacik     string `json:"kd_racik"`
	JmlDr       int    `json:"jml_dr"`
	AturanPakai string `json:"aturan_pakai"`
	Keterangan  string `json:"keterangan"`
}

type ResepDokterRacikanRequest struct {
	NoResep     string `json:"no_resep" validate:"required"`
	NoRacik     string `json:"no_racik" validate:"required"`
	NamaRacik   string `json:"nama_racik" validate:"required"`
	KdRacik     string `json:"kd_racik" validate:"required"`
	JmlDr       int    `json:"jml_dr" validate:"required"`
	AturanPakai string `json:"aturan_pakai" validate:"required"`
	Keterangan  string `json:"keterangan"`
}

type ResepDokterRacikanResponse struct {
	NoResep     string `json:"no_resep"`
	NoRacik     string `json:"no_racik"`
	NamaRacik   string `json:"nama_racik"`
	KdRacik     string `json:"kd_racik"`
	JmlDr       int    `json:"jml_dr"`
	AturanPakai string `json:"aturan_pakai"`
	Keterangan  string `json:"keterangan"`
}

type ResepDokterRacikanPageResponse struct {
	Page                int                          `json:"page"`
	Size                int                          `json:"size"`
	Total               int                          `json:"total"`
	ResepDokterRacikans []ResepDokterRacikanResponse `json:"resep_dokter_racikan"`
}
