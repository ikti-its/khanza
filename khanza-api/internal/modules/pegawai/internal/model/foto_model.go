package model

type FotoRequest struct {
	IdPegawai string `json:"id_pegawai" validate:"required,uuid4"`
	Foto      string `json:"foto" validate:"required"`
}

type FotoResponse struct {
	IdPegawai string `json:"id_pegawai"`
	Foto      string `json:"foto"`
}

type FotoPageResponse struct {
	Page  int            `json:"page"`
	Size  int            `json:"size"`
	Total int            `json:"total"`
	Foto  []FotoResponse `json:"foto_pegawai"`
}
