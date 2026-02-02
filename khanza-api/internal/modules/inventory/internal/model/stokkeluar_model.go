package model

type StokKeluarRequest struct {
	NoKeluar   string `json:"no_keluar"`
	IdPegawai  string `json:"id_pegawai"`
	Tanggal    string `json:"tanggal_stok_keluar"`
	IdRuangan  int    `json:"id_ruangan"`
	Keterangan string `json:"keterangan"`
}

type StokKeluarResponse struct {
	Id         string `json:"id"`
	NoKeluar   string `json:"no_keluar"`
	IdPegawai  string `json:"id_pegawai"`
	Tanggal    string `json:"tanggal_stok_keluar"`
	IdRuangan  int    `json:"id_ruangan"`
	Keterangan string `json:"keterangan"`
}
