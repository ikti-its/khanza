package model

type ResepObat struct {
	NoResep       string `json:"no_resep"`
	TglPerawatan  string `json:"tgl_perawatan"`
	Jam           string `json:"jam"`
	NoRawat       string `json:"no_rawat"`
	KdDokter      string `json:"kd_dokter"`
	TglPeresepan  string `json:"tgl_peresepan"`
	JamPeresepan  string `json:"jam_peresepan"`
	Status        string `json:"status"` // should be "ralan" or "ranap"
	TglPenyerahan string `json:"tgl_penyerahan"`
	JamPenyerahan string `json:"jam_penyerahan"`
	Validasi      bool   `json:"validasi"`
}

type ResepObatRequest struct {
	NoResep       string `json:"no_resep"`
	TglPerawatan  string `json:"tgl_perawatan"`
	Jam           string `json:"jam"`
	NoRawat       string `json:"no_rawat"`
	KdDokter      string `json:"kd_dokter"`
	TglPeresepan  string `json:"tgl_peresepan"`
	JamPeresepan  string `json:"jam_peresepan"`
	Status        string `json:"status"` // "ralan" or "ranap"
	TglPenyerahan string `json:"tgl_penyerahan"`
	JamPenyerahan string `json:"jam_penyerahan"`
	Validasi      bool   `json:"validasi"`
}

type ResepObatResponse struct {
	Code   int       `json:"code"`
	Status string    `json:"status"`
	Data   ResepObat `json:"data"`
}

type ResepObatListResponse struct {
	Code   int         `json:"code"`
	Status string      `json:"status"`
	Data   []ResepObat `json:"data"`
}
