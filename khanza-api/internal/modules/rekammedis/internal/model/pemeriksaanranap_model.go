package model

type PemeriksaanRanap struct {
	NoRawat      string `json:"no_rawat" db:"no_rawat" validate:"required"`
	TglPerawatan string `json:"tgl_perawatan" db:"tgl_perawatan" validate:"required"` // format YYYY-MM-DD
	JamRawat     string `json:"jam_rawat" db:"jam_rawat" validate:"required"`         // format HH:MM:SS

	SuhuTubuh string `json:"suhu_tubuh,omitempty" db:"suhu_tubuh"`
	Tensi     string `json:"tensi,omitempty" db:"tensi"`
	Nadi      string `json:"nadi,omitempty" db:"nadi"`
	Respirasi string `json:"respirasi,omitempty" db:"respirasi"`
	Tinggi    string `json:"tinggi,omitempty" db:"tinggi"`
	Berat     string `json:"berat,omitempty" db:"berat"`
	Spo2      string `json:"spo2,omitempty" db:"spo2"`
	GCS       string `json:"gcs,omitempty" db:"gcs"`

	Kesadaran   string `json:"kesadaran,omitempty" db:"kesadaran"` // ex: "Compos Mentis"
	Keluhan     string `json:"keluhan,omitempty" db:"keluhan"`
	Pemeriksaan string `json:"pemeriksaan,omitempty" db:"pemeriksaan"`
	Alergi      string `json:"alergi,omitempty" db:"alergi"`

	Penilaian string `json:"penilaian,omitempty" db:"penilaian"`
	RTL       string `json:"rtl,omitempty" db:"rtl"`
	Instruksi string `json:"instruksi,omitempty" db:"instruksi"`
	Evaluasi  string `json:"evaluasi,omitempty" db:"evaluasi"`

	NIP string `json:"nip" db:"nip" validate:"required"`
}

type PemeriksaanRanapRequest struct {
	NoRawat string `json:"nomor_rawat" validate:"required"`
	Tanggal string `json:"tgl_perawatan" validate:"required,datetime=2006-01-02"` // string to receive date input
	Jam     string `json:"jam_rawat" validate:"required,datetime=15:04:05"`       // string to receive time input

	SuhuTubuh string `json:"suhu_tubuh,omitempty"`
	Tensi     string `json:"tensi,omitempty"`
	Nadi      string `json:"nadi,omitempty"`
	Respirasi string `json:"respirasi,omitempty"`
	Tinggi    string `json:"tinggi,omitempty"`
	Berat     string `json:"berat,omitempty"`
	Spo2      string `json:"spo2,omitempty"`
	GCS       string `json:"gcs,omitempty"`

	Kesadaran   string `json:"kesadaran,omitempty"`
	Keluhan     string `json:"keluhan,omitempty"`
	Pemeriksaan string `json:"pemeriksaan,omitempty"`
	Alergi      string `json:"alergi,omitempty"`

	Penilaian string `json:"penilaian,omitempty"`
	RTL       string `json:"rtl,omitempty"`
	Instruksi string `json:"instruksi,omitempty"`
	Evaluasi  string `json:"evaluasi,omitempty"`

	NIP string `json:"nip" validate:"required"`
}

type PemeriksaanRanapResponse struct {
	NoRawat string `json:"no_rawat" validate:"required"`
	Tanggal string `json:"tanggal" validate:"required,datetime=2006-01-02"` // string to receive date input
	Jam     string `json:"jam" validate:"required,datetime=15:04:05"`       // string to receive time input

	SuhuTubuh string `json:"suhu_tubuh,omitempty"`
	Tensi     string `json:"tensi,omitempty"`
	Nadi      string `json:"nadi,omitempty"`
	Respirasi string `json:"respirasi,omitempty"`
	Tinggi    string `json:"tinggi,omitempty"`
	Berat     string `json:"berat,omitempty"`
	Spo2      string `json:"spo2,omitempty"`
	GCS       string `json:"gcs,omitempty"`

	Kesadaran   string `json:"kesadaran,omitempty"`
	Keluhan     string `json:"keluhan,omitempty"`
	Pemeriksaan string `json:"pemeriksaan,omitempty"`
	Alergi      string `json:"alergi,omitempty"`

	Penilaian string `json:"penilaian,omitempty"`
	RTL       string `json:"rtl,omitempty"`
	Instruksi string `json:"instruksi,omitempty"`
	Evaluasi  string `json:"evaluasi,omitempty"`

	NIP string `json:"nip" validate:"required"`
}

type PemeriksaanRanapPageResponse struct {
	Page             int                        `json:"page"`
	Size             int                        `json:"size"`
	Total            int                        `json:"total"`
	PemeriksaanRanap []PemeriksaanRanapResponse `json:"pemeriksaan_ranap"`
}
