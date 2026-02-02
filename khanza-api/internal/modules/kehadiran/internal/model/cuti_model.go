package model

type CutiRequest struct {
	IdPegawai      string `json:"id_pegawai" validate:"required,uuid4"`
	TanggalMulai   string `json:"tanggal_mulai" validate:"required"`
	TanggalSelesai string `json:"tanggal_selesai" validate:"required"`
	IdAlasan       string `json:"id_alasan_cuti" validate:"required,max=2,oneof=S I CT CB CM CU"`
	Status         string `json:"status" validate:"oneof=Ditolak Diproses Diterima"`
}

type CutiResponse struct {
	Id             string `json:"id"`
	IdPegawai      string `json:"id_pegawai"`
	TanggalMulai   string `json:"tanggal_mulai"`
	TanggalSelesai string `json:"tanggal_selesai"`
	IdAlasan       string `json:"id_alasan_cuti"`
	Status         string `json:"status"`
}

type CutiPageResponse struct {
	Page  int            `json:"page"`
	Size  int            `json:"size"`
	Total int            `json:"total"`
	Cuti  []CutiResponse `json:"cuti"`
}
