package model

import "time"

type PasienRequest struct {
	NoRkmMedis       string    `db:"no_rkm_medis" json:"no_rkm_medis"`
	NmPasien         string    `db:"nm_pasien" json:"nm_pasien"`
	NoKTP            string    `db:"no_ktp" json:"no_ktp"`
	JK               string    `db:"jk" json:"jk"` // L atau P
	TmpLahir         string    `db:"tmp_lahir" json:"tmp_lahir"`
	TglLahir         time.Time `db:"tgl_lahir" json:"tgl_lahir"`
	NmIbu            string    `db:"nm_ibu" json:"nm_ibu"`
	Alamat           string    `db:"alamat" json:"alamat"`
	GolDarah         string    `db:"gol_darah" json:"gol_darah"` // A, B, O, AB, -
	Pekerjaan        string    `db:"pekerjaan" json:"pekerjaan"`
	SttsNikah        string    `db:"stts_nikah" json:"stts_nikah"`
	Agama            string    `db:"agama" json:"agama"`
	TglDaftar        time.Time `db:"tgl_daftar" json:"tgl_daftar"`
	NoTelp           string    `db:"no_tlp" json:"no_tlp"`
	Umur             string    `db:"umur" json:"umur"`         // format string, e.g., "30 Th 0 Bl 0 Hr"
	Pnd              string    `db:"pnd" json:"pnd"`           // pendidikan
	Keluarga         string    `db:"keluarga" json:"keluarga"` // relasi dengan pasien
	NamaKeluarga     string    `db:"namakeluarga" json:"namakeluarga"`
	KdPJ             string    `db:"kd_pj" json:"kd_pj"`
	NoPeserta        string    `db:"no_peserta" json:"no_peserta"`
	KdKel            string    `db:"kd_kel" json:"kd_kel"`
	KdKec            string    `db:"kd_kec" json:"kd_kec"`
	KdKab            string    `db:"kd_kab" json:"kd_kab"`
	PekerjaanPJ      string    `db:"pekerjaanpj" json:"pekerjaanpj"`
	AlamatPJ         string    `db:"alamatpj" json:"alamatpj"`
	KelurahanPJ      string    `db:"kelurahanpj" json:"kelurahanpj"`
	KecamatanPJ      string    `db:"kecamatanpj" json:"kecamatanpj"`
	KabupatenPJ      string    `db:"kabupatenpj" json:"kabupatenpj"`
	PerusahaanPasien string    `db:"perusahaan_pasien" json:"perusahaan_pasien"`
	SukuBangsa       string    `db:"suku_bangsa" json:"suku_bangsa"`
	BahasaPasien     string    `db:"bahasa_pasien" json:"bahasa_pasien"`
	CacatFisik       string    `db:"cacat_fisik" json:"cacat_fisik"`
	Email            string    `db:"email" json:"email"`
	NIP              string    `db:"nip" json:"nip"`
	KdProp           string    `db:"kd_prop" json:"kd_prop"`
	PropinsiPJ       string    `db:"propinsipj" json:"propinsipj"`
}

type PasienResponse struct {
	NoRkmMedis       string    `db:"no_rkm_medis" json:"no_rkm_medis"`
	NmPasien         string    `db:"nm_pasien" json:"nm_pasien"`
	NoKTP            string    `db:"no_ktp" json:"no_ktp"`
	JK               string    `db:"jk" json:"jk"` // L atau P
	TmpLahir         string    `db:"tmp_lahir" json:"tmp_lahir"`
	TglLahir         time.Time `db:"tgl_lahir" json:"tgl_lahir"`
	NmIbu            string    `db:"nm_ibu" json:"nm_ibu"`
	Alamat           string    `db:"alamat" json:"alamat"`
	GolDarah         string    `db:"gol_darah" json:"gol_darah"` // A, B, O, AB, -
	Pekerjaan        string    `db:"pekerjaan" json:"pekerjaan"`
	SttsNikah        string    `db:"stts_nikah" json:"stts_nikah"`
	Agama            string    `db:"agama" json:"agama"`
	TglDaftar        time.Time `db:"tgl_daftar" json:"tgl_daftar"`
	NoTelp           string    `db:"no_tlp" json:"no_tlp"`
	Umur             string    `db:"umur" json:"umur"`         // format string, e.g., "30 Th 0 Bl 0 Hr"
	Pnd              string    `db:"pnd" json:"pnd"`           // pendidikan
	Keluarga         string    `db:"keluarga" json:"keluarga"` // relasi dengan pasien
	NamaKeluarga     string    `db:"namakeluarga" json:"namakeluarga"`
	KdPJ             string    `db:"kd_pj" json:"kd_pj"`
	NoPeserta        string    `db:"no_peserta" json:"no_peserta"`
	KdKel            string    `db:"kd_kel" json:"kd_kel"`
	KdKec            string    `db:"kd_kec" json:"kd_kec"`
	KdKab            string    `db:"kd_kab" json:"kd_kab"`
	PekerjaanPJ      string    `db:"pekerjaanpj" json:"pekerjaanpj"`
	AlamatPJ         string    `db:"alamatpj" json:"alamatpj"`
	KelurahanPJ      string    `db:"kelurahanpj" json:"kelurahanpj"`
	KecamatanPJ      string    `db:"kecamatanpj" json:"kecamatanpj"`
	KabupatenPJ      string    `db:"kabupatenpj" json:"kabupatenpj"`
	PerusahaanPasien string    `db:"perusahaan_pasien" json:"perusahaan_pasien"`
	SukuBangsa       string    `db:"suku_bangsa" json:"suku_bangsa"`
	BahasaPasien     string    `db:"bahasa_pasien" json:"bahasa_pasien"`
	CacatFisik       string    `db:"cacat_fisik" json:"cacat_fisik"`
	Email            string    `db:"email" json:"email"`
	NIP              string    `db:"nip" json:"nip"`
	KdProp           string    `db:"kd_prop" json:"kd_prop"`
	PropinsiPJ       string    `db:"propinsipj" json:"propinsipj"`
}

type PegawaiPageResponse struct {
	Page    int              `json:"page"`
	Size    int              `json:"size"`
	Total   int              `json:"total"`
	Pegawai []PasienResponse `json:"pegawai"`
}
