package model

import (
	"time"

	"github.com/ikti-its/khanza-api/internal/modules/rawatinap/internal/entity"
)

type RawatInap struct {
	NomorRawat      string  `db:"nomor_rawat" json:"nomor_rawat"`
	NomorRM         string  `db:"nomor_rm" json:"nomor_rm"`
	NamaPasien      string  `db:"nama_pasien" json:"nama_pasien"`
	AlamatPasien    string  `db:"alamat_pasien" json:"alamat_pasien"`
	PenanggungJawab string  `db:"penanggung_jawab" json:"penanggung_jawab"`
	HubunganPJ      string  `db:"hubungan_pj" json:"hubungan_pj"`
	JenisBayar      string  `db:"jenis_bayar" json:"jenis_bayar"`
	Kamar           string  `db:"kamar" json:"kamar"`
	TarifKamar      float64 `db:"tarif_kamar" json:"tarif_kamar"`
	DiagnosaAwal    string  `db:"diagnosa_awal" json:"diagnosa_awal"`
	DiagnosaAkhir   string  `db:"diagnosa_akhir" json:"diagnosa_akhir"`
	TanggalMasuk    string  `db:"tanggal_masuk" json:"tanggal_masuk"`
	JamMasuk        string  `db:"jam_masuk" json:"jam_masuk"`
	TanggalKeluar   string  `db:"tanggal_keluar" json:"tanggal_keluar"`
	JamKeluar       string  `db:"jam_keluar" json:"jam_keluar"`
	TotalBiaya      float64 `db:"total_biaya" json:"total_biaya"`
	StatusPulang    string  `db:"status_pulang" json:"status_pulang"`
	LamaRanap       float64 `db:"lama_ranap" json:"lama_ranap"`
	DokterPJ        string  `db:"dokter_pj" json:"dokter_pj"`
	StatusBayar     string  `db:"status_bayar" json:"status_bayar"`
}

type RawatInapRequest struct {
	NomorRawat      string  `json:"nomor_rawat" validate:"required"`
	NomorRM         string  `json:"nomor_rm"`
	NamaPasien      string  `json:"nama_pasien"`
	AlamatPasien    string  `json:"alamat_pasien"`
	PenanggungJawab string  `json:"penanggung_jawab"`
	HubunganPJ      string  `json:"hubungan_pj"`
	JenisBayar      string  `json:"jenis_bayar"`
	Kamar           string  `json:"kamar"`
	TarifKamar      float64 `json:"tarif_kamar"`
	DiagnosaAwal    string  `json:"diagnosa_awal"`
	DiagnosaAkhir   string  `json:"diagnosa_akhir"`
	TanggalMasuk    string  `json:"tanggal_masuk"`
	JamMasuk        string  `json:"jam_masuk"`
	TanggalKeluar   string  `json:"tanggal_keluar"`
	JamKeluar       string  `json:"jam_keluar"`
	TotalBiaya      float64 `json:"total_biaya"`
	StatusPulang    string  `json:"status_pulang"`
	LamaRanap       float64 `json:"lama_ranap"`
	DokterPJ        string  `json:"dokter_pj"`
	StatusBayar     string  `json:"status_bayar"`
}

type RawatInapResponse struct {
	NomorRawat      string  `json:"nomor_rawat"`
	NomorRM         string  `json:"nomor_rm"`
	NamaPasien      string  `json:"nama_pasien"`
	AlamatPasien    string  `json:"alamat_pasien"`
	PenanggungJawab string  `json:"penanggung_jawab,omitempty"`
	HubunganPJ      string  `json:"hubungan_pj,omitempty"`
	JenisBayar      string  `json:"jenis_bayar"`
	Kamar           string  `json:"kamar"`
	TarifKamar      float64 `json:"tarif_kamar"`
	DiagnosaAwal    string  `json:"diagnosa_awal"`
	DiagnosaAkhir   string  `json:"diagnosa_akhir"`
	TanggalMasuk    string  `json:"tanggal_masuk"`
	JamMasuk        string  `json:"jam_masuk"`
	TanggalKeluar   string  `json:"tanggal_keluar"`
	JamKeluar       string  `json:"jam_keluar"`
	TotalBiaya      float64 `json:"total_biaya"`
	StatusPulang    string  `json:"status_pulang"`
	LamaRanap       float64 `json:"lama_ranap"`
	DokterPJ        string  `json:"dokter_pj"`
	StatusBayar     string  `json:"status_bayar"`
}

type RawatInapPageResponse struct {
	Page  int                 `json:"page"`
	Size  int                 `json:"size"`
	Total int                 `json:"total"`
	Data  []RawatInapResponse `json:"data"`
}

func FromEntity(e entity.RawatInap) RawatInapResponse {
	return RawatInapResponse{
		NomorRawat:      e.NomorRawat,
		NomorRM:         e.NomorRM,
		NamaPasien:      e.NamaPasien,
		AlamatPasien:    e.AlamatPasien.String,
		PenanggungJawab: e.PenanggungJawab.String,
		HubunganPJ:      e.HubunganPJ.String,
		JenisBayar:      e.JenisBayar.String,
		Kamar:           e.Kamar.String,
		TarifKamar:      e.TarifKamar.Float64,
		DiagnosaAwal:    e.DiagnosaAwal.String,
		DiagnosaAkhir:   e.DiagnosaAkhir.String,
		TanggalMasuk:    e.TanggalMasuk.Format("2006-01-02"),
		JamMasuk: func() string {
			if e.JamMasuk.Valid {
				return e.JamMasuk.Time.Format("15:04:05")
			}
			return ""
		}(),
		TanggalKeluar: e.TanggalKeluar.Time.Format("2006-01-02"),
		JamKeluar:     e.JamKeluar.Time.Format("15:04:05"),
		TotalBiaya:    e.TotalBiaya.Float64,
		StatusPulang:  e.StatusPulang.String,
		LamaRanap:     e.LamaRanap.Float64,
		DokterPJ:      e.DokterPJ.String,
		StatusBayar:   e.StatusBayar.String,
	}
}

// Helper to format time.Time or return empty string if zero
func formatTimeOrEmpty(t time.Time) string {
	if t.IsZero() {
		return ""
	}
	return t.Format("2006-01-02 15:04:05")
}
