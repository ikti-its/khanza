package model

type RoleResponse struct {
	Id   int    `json:"id"`
	Nama string `json:"nama"`
}

type JabatanResponse struct {
	Id   int    `json:"id"`
	Nama string `json:"nama"`
}

type DepartemenResponse struct {
	Id   int    `json:"id"`
	Nama string `json:"nama"`
}

type StatusAktifResponse struct {
	Id   string `json:"id"`
	Nama string `json:"nama"`
}

type ShiftRequest struct {
	Id        string `json:"id"`
	Nama      string `json:"nama"`
	JamMasuk  string `json:"jam_masuk"`
	JamPulang string `json:"jam_pulang"`
}

type ShiftResponse struct {
	Id        string `json:"id"`
	Nama      string `json:"nama"`
	JamMasuk  string `json:"jam_masuk"`
	JamPulang string `json:"jam_pulang"`
}

type AlasanCutiResponse struct {
	Id   string `json:"id"`
	Nama string `json:"nama"`
}

type KodePresensiResponse struct {
	Kode string `json:"kode"`
}

type IndustriFarmasiResponse struct {
	Id      int    `json:"id"`
	Kode    string `json:"kode"`
	Nama    string `json:"nama"`
	Alamat  string `json:"alamat"`
	Kota    string `json:"kota"`
	Telepon string `json:"telepon"`
}

type SatuanBarangMedisResponse struct {
	Id   int    `json:"id"`
	Nama string `json:"nama"`
}

type JenisBarangMedisResponse struct {
	Id   int    `json:"id"`
	Nama string `json:"nama"`
}

type KategoriBarangMedisResponse struct {
	Id   int    `json:"id"`
	Nama string `json:"nama"`
}

type GolonganBarangMedisResponse struct {
	Id   int    `json:"id"`
	Nama string `json:"nama"`
}

type RuanganResponse struct {
	Id   int    `json:"id"`
	Nama string `json:"nama"`
}

type SupplierBarangMedisResponse struct {
	Id         int    `json:"id"`
	Nama       string `json:"nama"`
	Alamat     string `json:"alamat"`
	NoTelp     string `json:"no_telp"`
	Kota       string `json:"kota"`
	NamaBank   string `json:"nama_bank"`
	NoRekening string `json:"no_rekening"`
}
