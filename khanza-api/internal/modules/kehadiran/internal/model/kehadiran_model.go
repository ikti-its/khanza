package model

type AttendKehadiranRequest struct {
	IdPegawai       string `json:"id_pegawai" validate:"required,uuid4"`
	IdJadwalPegawai string `json:"id_jadwal_pegawai" validate:"required,uuid4"`
	Tanggal         string `json:"tanggal" validate:"required"`
	Keterangan      string `json:"keterangan"`
	Foto            string `json:"foto"`
}

type LeaveKehadiranRequest struct {
	Id        string `json:"id" validate:"required,uuid4"`
	IdPegawai string `json:"id_pegawai" validate:"required,uuid4"`
}

type KehadiranResponse struct {
	Id         string `json:"id"`
	IdPegawai  string `json:"id_pegawai"`
	Tanggal    string `json:"tanggal"`
	JamMasuk   string `json:"jam_masuk"`
	JamPulang  string `json:"jam_pulang,omitempty"`
	Keterangan string `json:"keterangan,omitempty"`
	Foto       string `json:"foto,omitempty"`
}

type KehadiranPageResponse struct {
	Page      int                 `json:"page"`
	Size      int                 `json:"size"`
	Total     int                 `json:"total"`
	Kehadiran []KehadiranResponse `json:"presensi"`
}
