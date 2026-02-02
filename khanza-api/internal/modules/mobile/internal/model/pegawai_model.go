package model

type PegawaiResponse struct {
	Pegawai      string `json:"pegawai"`
	Akun         string `json:"akun"`
	NIP          string `json:"nip"`
	NIK          string `json:"nik"`
	Nama         string `json:"nama"`
	JenisKelamin string `json:"jenis_kelamin"`
	TempatLahir  string `json:"tempat_lahir"`
	TanggalLahir string `json:"tanggal_lahir"`
	Agama        string `json:"agama"`
	Pendidikan   string `json:"pendidikan"`
	Jabatan      string `json:"jabatan"`
	Departemen   string `json:"departemen"`
	Status       string `json:"status"`
	JenisPegawai string `json:"jenis_pegawai"`
	Telepon      string `json:"telepon"`
	TanggalMasuk string `json:"tanggal_masuk"`
}
