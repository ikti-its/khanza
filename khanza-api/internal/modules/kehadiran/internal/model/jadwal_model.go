package model

type UpdateJadwalRequest struct {
	Id        string `json:"id" validate:"required,uuid4"`
	IdPegawai string `json:"id_pegawai" validate:"required,uuid4"`
	IdHari    int    `json:"id_hari" validate:"required,oneof=1 2 3 4 5 6 7"`
	IdShift   string `json:"id_shift" validate:"required,max=2"`
}

type JadwalResponse struct {
	Id        string `json:"id"`
	IdPegawai string `json:"id_pegawai"`
	IdHari    int    `json:"id_hari"`
	IdShift   string `json:"id_shift"`
	JamMasuk  string `json:"jam_masuk,omitempty"`
	JamPulang string `json:"jam_pulang,omitempty"`
}

type JadwalPageResponse struct {
	Page   int              `json:"page"`
	Size   int              `json:"size"`
	Total  int              `json:"total"`
	Jadwal []JadwalResponse `json:"jadwal_pegawai"`
}
