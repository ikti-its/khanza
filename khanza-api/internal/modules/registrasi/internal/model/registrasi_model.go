package model

type Registrasi struct {
	NomorReg         string  `json:"nomor_reg" validate:"required"`
	NomorRawat       string  `json:"nomor_rawat"`
	Tanggal          string  `json:"tanggal"`
	Jam              string  `json:"jam"`
	KodeDokter       string  `json:"kode_dokter"`
	NamaDokter       string  `json:"nama_dokter"`
	NomorRM          string  `json:"nomor_rm"`
	Nama             string  `json:"nama_pasien"`
	JenisKelamin     string  `json:"jenis_kelamin" validate:"oneof=L P"` // L (Laki-laki), P (Perempuan)
	Umur             string  `json:"umur"`
	Poliklinik       string  `json:"poliklinik"`
	JenisBayar       string  `json:"jenis_bayar"`
	PenanggungJawab  string  `json:"penanggung_jawab"`
	Alamat           string  `json:"alamat_pj"`
	HubunganPJ       string  `json:"hubungan_pj"`
	BiayaRegistrasi  float64 `json:"biaya_registrasi"`
	StatusRegistrasi string  `json:"status_registrasi" validate:"oneof=baru lama"`
	NoTelepon        string  `json:"no_telepon" validate:"e164"` // Validates phone number format
	StatusRawat      string  `json:"status_rawat"`
	StatusPoli       string  `json:"status_poli"`
	StatusBayar      string  `json:"status_bayar"`
	StatusKamar      string  `json:"status_kamar"`
	Kelas            string  `json:"kelas"`
	PekerjaanPJ      string  `json:"pekerjaanpj" db:"pekerjaanpj"`
    KelurahanPJ      string  `json:"kelurahanpj" db:"kelurahanpj"`
	KecamatanPJ      string  `json:"kecamatanpj" db:"kecamatanpj"`
	KabupatenPJ      string  `json:"kabupatenpj" db:"kabupatenpj"`
    PropinsiPJ       string  `json:"propinsipj" db:"propinsipj"`
	NoTelpPJ         string  `json:"notelp_pj" db:"notelp_pj"`
	No_asuransi      string  `json:"no_asuransi" db:"no_asuransi"`
}

type RegistrasiRequest struct {
	NomorReg         string  `json:"nomor_reg" validate:"required"`
	NomorRawat       string  `json:"nomor_rawat"`
	Tanggal          string  `json:"tanggal"`
	Jam              string  `json:"jam"`
	KodeDokter       string  `json:"kode_dokter"`
	NamaDokter       string  `json:"nama_dokter"`
	NomorRM          string  `json:"nomor_rm"`
	Nama             string  `json:"nama_pasien"`
	JenisKelamin     string  `json:"jenis_kelamin" validate:"oneof=L P"` // L (Laki-laki), P (Perempuan)
	Umur             string  `json:"umur"`
	Poliklinik       string  `json:"poliklinik"`
	JenisBayar       string  `json:"jenis_bayar"`
	PenanggungJawab  string  `json:"penanggung_jawab"`
	Alamat           string  `json:"alamat_pj"`
	HubunganPJ       string  `json:"hubungan_pj"`
	BiayaRegistrasi  float64 `json:"biaya_registrasi"`
	StatusRegistrasi string  `json:"status_registrasi" validate:"oneof=baru lama"`
	NoTelepon        string  `json:"no_telepon" validate:"e164"` // Validates phone number format
	StatusRawat      string  `json:"status_rawat"`
	StatusPoli       string  `json:"status_poli"`
	StatusBayar      string  `json:"status_bayar"`
	StatusKamar      string  `json:"status_kamar"`
	Kelas            string  `json:"kelas"`
	PekerjaanPJ      string  `json:"pekerjaanpj" db:"pekerjaanpj"`
    KelurahanPJ      string  `json:"kelurahanpj" db:"kelurahanpj"`
	KecamatanPJ      string  `json:"kecamatanpj" db:"kecamatanpj"`
	KabupatenPJ      string  `json:"kabupatenpj" db:"kabupatenpj"`
    PropinsiPJ       string  `json:"propinsipj" db:"propinsipj"`
	NoTelpPJ         string  `json:"notelp_pj" db:"notelp_pj"`
	No_asuransi      string  `json:"no_asuransi" db:"no_asuransi"`
}

type RegistrasiResponse struct {
	NomorReg         string  `db:"nomor_reg" json:"nomor_reg"`
	NomorRawat       string  `db:"nomor_rawat" json:"nomor_rawat"`
	Tanggal          string  `db:"tanggal" json:"tanggal"`
	Jam              string  `db:"jam" json:"jam"`
	KodeDokter       string  `db:"kode_dokter" json:"kode_dokter"`
	NamaDokter       string  `db:"nama_dokter" json:"nama_dokter"`
	NomorRM          string  `db:"nomor_rm" json:"nomor_rm"`
	Nama             string  `db:"nama_pasien" json:"nama_pasien"`
	JenisKelamin     string  `db:"jenis_kelamin" json:"jenis_kelamin"`
	Umur             string  `db:"umur" json:"umur"`
	Poliklinik       string  `db:"poliklinik" json:"poliklinik"`
	JenisBayar       string  `db:"jenis_bayar" json:"jenis_bayar"`
	PenanggungJawab  string  `db:"penanggung_jawab" json:"penanggung_jawab,omitempty"`
	Alamat           string  `db:"alamat_pj" json:"alamat_pj,omitempty"`
	HubunganPJ       string  `db:"hubungan_pj" json:"hubungan_pj,omitempty"`
	BiayaRegistrasi  float64 `db:"biaya_registrasi" json:"biaya_registrasi"`
	StatusRegistrasi string  `db:"status_registrasi" json:"status_registrasi"`
	NoTelepon        string  `db:"no_telepon" json:"no_telepon"`
	StatusRawat      string  `db:"status_rawat" json:"status_rawat"`
	StatusPoli       string  `db:"status_poli" json:"status_poli"`
	StatusBayar      string  `db:"status_bayar" json:"status_bayar"`
	StatusKamar      string  `db:"status_kamar" json:"status_kamar"`
	Kelas            string  `db:"kelas" json:"kelas"`
	PekerjaanPJ      string  `json:"pekerjaanpj" db:"pekerjaanpj"`
    KelurahanPJ      string  `json:"kelurahanpj" db:"kelurahanpj"`
	KecamatanPJ      string  `json:"kecamatanpj" db:"kecamatanpj"`
	KabupatenPJ      string  `json:"kabupatenpj" db:"kabupatenpj"`
    PropinsiPJ       string  `json:"propinsipj" db:"propinsipj"`
	NoTelpPJ         string  `json:"notelp_pj" db:"notelp_pj"`
	No_asuransi      string  `json:"no_asuransi" db:"no_asuransi"`
}

type PendingRoomRequest struct {
	NomorReg   string `db:"nomor_reg" json:"nomor_reg"`
	NamaPasien string `db:"nama_pasien" json:"nama_pasien"`
	Kelas      string `db:"kelas" json:"kelas"`
}

type DokterResponse struct {
	KodeDokter string `db:"kode_dokter" json:"kode_dokter"`
	NamaDokter string `db:"nama_dokter" json:"nama_dokter"`
}

type RegistrasiPageResponse struct {
	Page       int                  `json:"page"`
	Size       int                  `json:"size"`
	Total      int                  `json:"total"`
	Registrasi []RegistrasiResponse `json:"registrasi"`
}
