package model

type HomePegawaiResponse struct {
	Akun      string  `json:"akun"`
	Pegawai   string  `json:"pegawai"`
	Nama      string  `json:"nama"`
	NIP       string  `json:"nip"`
	Role      string  `json:"role"`
	Email     string  `json:"email"`
	Telepon   string  `json:"telepon"`
	Profil    string  `json:"profil"`
	Alamat    string  `json:"alamat"`
	AlamatLat float64 `json:"alamat_lat"`
	AlamatLon float64 `json:"alamat_lon"`
	Foto      string  `json:"foto"`
	Shift     string  `json:"shift"`
	JamMasuk  string  `json:"jam_masuk"`
	JamPulang string  `json:"jam_pulang"`
	Status    bool    `json:"status"`
}
