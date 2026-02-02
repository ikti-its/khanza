package model

type JadwalRequest struct {
}

type JadwalResponse struct {
	Id        string `json:"id"`
	IdPegawai string `json:"id_pegawai"`
	IdHari    int    `json:"id_hari"`
	IdShift   string `json:"id_shift"`
	JamMasuk  string `json:"jam_masuk,omitempty"`
	JamPulang string `json:"jam_pulang,omitempty"`
}
