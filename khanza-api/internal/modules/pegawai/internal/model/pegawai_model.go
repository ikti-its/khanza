package model

type PegawaiRequest struct {
	IdAkun       string `json:"id_akun" validate:"required,uuid4"`
	NIP          string `json:"nip" validate:"required,numeric,max=10"`
	Nama         string `json:"nama" validate:"required"`
	JenisKelamin string `json:"jenis_kelamin" validate:"required,oneof=L P"`
	Jabatan      int    `json:"jabatan" validate:"required,numeric"`
	Departemen   int    `json:"departemen" validate:"required,numeric"`
	StatusAktif  string `json:"status_aktif" validate:"required,alpha,max=2"`
	JenisPegawai string `json:"jenis_pegawai" validate:"required,alpha,oneof=Tetap Kontrak Magang Istimewa"`
	Telepon      string `json:"telepon" validate:"required,numeric"`
	TanggalMasuk string `json:"tanggal_masuk" validate:"required"`
}

type PegawaiResponse struct {
	Id           string `json:"id"`
	IdAkun       string `json:"id_akun"`
	NIP          string `json:"nip"`
	Nama         string `json:"nama"`
	JenisKelamin string `json:"jenis_kelamin"`
	Jabatan      int    `json:"jabatan"`
	Departemen   int    `json:"departemen"`
	StatusAktif  string `json:"status_aktif"`
	JenisPegawai string `json:"jenis_pegawai"`
	Telepon      string `json:"telepon"`
	TanggalMasuk string `json:"tanggal_masuk"`
}

type PegawaiPageResponse struct {
	Page    int               `json:"page"`
	Size    int               `json:"size"`
	Total   int               `json:"total"`
	Pegawai []PegawaiResponse `json:"pegawai"`
}
