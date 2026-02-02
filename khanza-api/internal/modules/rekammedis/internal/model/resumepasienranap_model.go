package model

import "time"

// Main internal model used in usecase/repository
type ResumePasienRanap struct {
	NoRawat              string `json:"no_rawat" db:"no_rawat" validate:"required"`
	KodeDokter           string `json:"kd_dokter" db:"kd_dokter" validate:"required"`
	DiagnosaAwal         string `json:"diagnosa_awal" db:"diagnosa_awal" validate:"required"`
	Alasan               string `json:"alasan" db:"alasan" validate:"required"`
	KeluhanUtama         string `json:"keluhan_utama" db:"keluhan_utama" validate:"required"`
	PemeriksaanFisik     string `json:"pemeriksaan_fisik" db:"pemeriksaan_fisik" validate:"required"`
	JalannyaPenyakit     string `json:"jalannya_penyakit" db:"jalannya_penyakit" validate:"required"`
	PemeriksaanPenunjang string `json:"pemeriksaan_penunjang" db:"pemeriksaan_penunjang" validate:"required"`
	HasilLaborat         string `json:"hasil_laborat" db:"hasil_laborat" validate:"required"`
	TindakanOperasi      string `json:"tindakan_dan_operasi" db:"tindakan_dan_operasi" validate:"required"`
	ObatDiRS             string `json:"obat_di_rs" db:"obat_di_rs" validate:"required"`

	DiagnosaUtama     string `json:"diagnosa_utama" db:"diagnosa_utama" validate:"required"`
	KodeDiagnosaUtama string `json:"kd_diagnosa_utama" db:"kd_diagnosa_utama" validate:"required"`

	DiagnosaSekunder     string `json:"diagnosa_sekunder" db:"diagnosa_sekunder"`
	KodeDiagnosaSekunder string `json:"kd_diagnosa_sekunder" db:"kd_diagnosa_sekunder"`

	DiagnosaSekunder2     string `json:"diagnosa_sekunder2" db:"diagnosa_sekunder2"`
	KodeDiagnosaSekunder2 string `json:"kd_diagnosa_sekunder2" db:"kd_diagnosa_sekunder2"`

	DiagnosaSekunder3     string `json:"diagnosa_sekunder3" db:"diagnosa_sekunder3"`
	KodeDiagnosaSekunder3 string `json:"kd_diagnosa_sekunder3" db:"kd_diagnosa_sekunder3"`

	DiagnosaSekunder4     string `json:"diagnosa_sekunder4" db:"diagnosa_sekunder4"`
	KodeDiagnosaSekunder4 string `json:"kd_diagnosa_sekunder4" db:"kd_diagnosa_sekunder4"`

	ProsedurUtama     string `json:"prosedur_utama" db:"prosedur_utama"`
	KodeProsedurUtama string `json:"kd_prosedur_utama" db:"kd_prosedur_utama"`

	ProsedurSekunder     string `json:"prosedur_sekunder" db:"prosedur_sekunder"`
	KodeProsedurSekunder string `json:"kd_prosedur_sekunder" db:"kd_prosedur_sekunder"`

	ProsedurSekunder2     string `json:"prosedur_sekunder2" db:"prosedur_sekunder2"`
	KodeProsedurSekunder2 string `json:"kd_prosedur_sekunder2" db:"kd_prosedur_sekunder2"`

	ProsedurSekunder3     string `json:"prosedur_sekunder3" db:"prosedur_sekunder3"`
	KodeProsedurSekunder3 string `json:"kd_prosedur_sekunder3" db:"kd_prosedur_sekunder3"`

	Alergi   string `json:"alergi" db:"alergi"`
	Diet     string `json:"diet" db:"diet"`
	LabBelum string `json:"lab_belum" db:"lab_belum"`
	Edukasi  string `json:"edukasi" db:"edukasi"`

	CaraKeluar     string     `json:"cara_keluar" db:"cara_keluar"`
	KetKeluar      *string    `json:"ket_keluar,omitempty" db:"ket_keluar"`
	Keadaan        string     `json:"keadaan" db:"keadaan"`
	KetKeadaan     *string    `json:"ket_keadaan,omitempty" db:"ket_keadaan"`
	Dilanjutkan    string     `json:"dilanjutkan" db:"dilanjutkan"`
	KetDilanjutkan *string    `json:"ket_dilanjutkan,omitempty" db:"ket_dilanjutkan"`
	Kontrol        *time.Time `json:"kontrol,omitempty" db:"kontrol"`
	ObatPulang     string     `json:"obat_pulang" db:"obat_pulang"`
}

// Request for API input
type ResumePasienRanapRequest struct {
	NoRawat              string `json:"no_rawat" db:"no_rawat" validate:"required"`
	KodeDokter           string `json:"kd_dokter" db:"kd_dokter" validate:"required"`
	DiagnosaAwal         string `json:"diagnosa_awal" db:"diagnosa_awal" validate:"required"`
	Alasan               string `json:"alasan" db:"alasan" validate:"required"`
	KeluhanUtama         string `json:"keluhan_utama" db:"keluhan_utama" validate:"required"`
	PemeriksaanFisik     string `json:"pemeriksaan_fisik" db:"pemeriksaan_fisik" validate:"required"`
	JalannyaPenyakit     string `json:"jalannya_penyakit" db:"jalannya_penyakit" validate:"required"`
	PemeriksaanPenunjang string `json:"pemeriksaan_penunjang" db:"pemeriksaan_penunjang" validate:"required"`
	HasilLaborat         string `json:"hasil_laborat" db:"hasil_laborat" validate:"required"`
	TindakanOperasi      string `json:"tindakan_dan_operasi" db:"tindakan_dan_operasi" validate:"required"`
	ObatDiRS             string `json:"obat_di_rs" db:"obat_di_rs" validate:"required"`

	DiagnosaUtama     string `json:"diagnosa_utama" db:"diagnosa_utama" validate:"required"`
	KodeDiagnosaUtama string `json:"kd_diagnosa_utama" db:"kd_diagnosa_utama" validate:"required"`

	DiagnosaSekunder     string `json:"diagnosa_sekunder" db:"diagnosa_sekunder"`
	KodeDiagnosaSekunder string `json:"kd_diagnosa_sekunder" db:"kd_diagnosa_sekunder"`

	DiagnosaSekunder2     string `json:"diagnosa_sekunder2" db:"diagnosa_sekunder2"`
	KodeDiagnosaSekunder2 string `json:"kd_diagnosa_sekunder2" db:"kd_diagnosa_sekunder2"`

	DiagnosaSekunder3     string `json:"diagnosa_sekunder3" db:"diagnosa_sekunder3"`
	KodeDiagnosaSekunder3 string `json:"kd_diagnosa_sekunder3" db:"kd_diagnosa_sekunder3"`

	DiagnosaSekunder4     string `json:"diagnosa_sekunder4" db:"diagnosa_sekunder4"`
	KodeDiagnosaSekunder4 string `json:"kd_diagnosa_sekunder4" db:"kd_diagnosa_sekunder4"`

	ProsedurUtama     string `json:"prosedur_utama" db:"prosedur_utama"`
	KodeProsedurUtama string `json:"kd_prosedur_utama" db:"kd_prosedur_utama"`

	ProsedurSekunder     string `json:"prosedur_sekunder" db:"prosedur_sekunder"`
	KodeProsedurSekunder string `json:"kd_prosedur_sekunder" db:"kd_prosedur_sekunder"`

	ProsedurSekunder2     string `json:"prosedur_sekunder2" db:"prosedur_sekunder2"`
	KodeProsedurSekunder2 string `json:"kd_prosedur_sekunder2" db:"kd_prosedur_sekunder2"`

	ProsedurSekunder3     string `json:"prosedur_sekunder3" db:"prosedur_sekunder3"`
	KodeProsedurSekunder3 string `json:"kd_prosedur_sekunder3" db:"kd_prosedur_sekunder3"`

	Alergi   string `json:"alergi" db:"alergi"`
	Diet     string `json:"diet" db:"diet"`
	LabBelum string `json:"lab_belum" db:"lab_belum"`
	Edukasi  string `json:"edukasi" db:"edukasi"`

	CaraKeluar     string     `json:"cara_keluar" db:"cara_keluar"`
	KetKeluar      *string    `json:"ket_keluar,omitempty" db:"ket_keluar"`
	Keadaan        string     `json:"keadaan" db:"keadaan"`
	KetKeadaan     *string    `json:"ket_keadaan,omitempty" db:"ket_keadaan"`
	Dilanjutkan    string     `json:"dilanjutkan" db:"dilanjutkan"`
	KetDilanjutkan *string    `json:"ket_dilanjutkan,omitempty" db:"ket_dilanjutkan"`
	Kontrol        *time.Time `json:"kontrol,omitempty" db:"kontrol"`
	ObatPulang     string     `json:"obat_pulang" db:"obat_pulang"`
}

// Response for API output
type ResumePasienRanapResponse struct {
	NoRawat              string `json:"no_rawat" db:"no_rawat" validate:"required"`
	KodeDokter           string `json:"kd_dokter" db:"kd_dokter" validate:"required"`
	DiagnosaAwal         string `json:"diagnosa_awal" db:"diagnosa_awal" validate:"required"`
	Alasan               string `json:"alasan" db:"alasan" validate:"required"`
	KeluhanUtama         string `json:"keluhan_utama" db:"keluhan_utama" validate:"required"`
	PemeriksaanFisik     string `json:"pemeriksaan_fisik" db:"pemeriksaan_fisik" validate:"required"`
	JalannyaPenyakit     string `json:"jalannya_penyakit" db:"jalannya_penyakit" validate:"required"`
	PemeriksaanPenunjang string `json:"pemeriksaan_penunjang" db:"pemeriksaan_penunjang" validate:"required"`
	HasilLaborat         string `json:"hasil_laborat" db:"hasil_laborat" validate:"required"`
	TindakanOperasi      string `json:"tindakan_dan_operasi" db:"tindakan_dan_operasi" validate:"required"`
	ObatDiRS             string `json:"obat_di_rs" db:"obat_di_rs" validate:"required"`

	DiagnosaUtama     string `json:"diagnosa_utama" db:"diagnosa_utama" validate:"required"`
	KodeDiagnosaUtama string `json:"kd_diagnosa_utama" db:"kd_diagnosa_utama" validate:"required"`

	DiagnosaSekunder     string `json:"diagnosa_sekunder" db:"diagnosa_sekunder"`
	KodeDiagnosaSekunder string `json:"kd_diagnosa_sekunder" db:"kd_diagnosa_sekunder"`

	DiagnosaSekunder2     string `json:"diagnosa_sekunder2" db:"diagnosa_sekunder2"`
	KodeDiagnosaSekunder2 string `json:"kd_diagnosa_sekunder2" db:"kd_diagnosa_sekunder2"`

	DiagnosaSekunder3     string `json:"diagnosa_sekunder3" db:"diagnosa_sekunder3"`
	KodeDiagnosaSekunder3 string `json:"kd_diagnosa_sekunder3" db:"kd_diagnosa_sekunder3"`

	DiagnosaSekunder4     string `json:"diagnosa_sekunder4" db:"diagnosa_sekunder4"`
	KodeDiagnosaSekunder4 string `json:"kd_diagnosa_sekunder4" db:"kd_diagnosa_sekunder4"`

	ProsedurUtama     string `json:"prosedur_utama" db:"prosedur_utama"`
	KodeProsedurUtama string `json:"kd_prosedur_utama" db:"kd_prosedur_utama"`

	ProsedurSekunder     string `json:"prosedur_sekunder" db:"prosedur_sekunder"`
	KodeProsedurSekunder string `json:"kd_prosedur_sekunder" db:"kd_prosedur_sekunder"`

	ProsedurSekunder2     string `json:"prosedur_sekunder2" db:"prosedur_sekunder2"`
	KodeProsedurSekunder2 string `json:"kd_prosedur_sekunder2" db:"kd_prosedur_sekunder2"`

	ProsedurSekunder3     string `json:"prosedur_sekunder3" db:"prosedur_sekunder3"`
	KodeProsedurSekunder3 string `json:"kd_prosedur_sekunder3" db:"kd_prosedur_sekunder3"`

	Alergi   string `json:"alergi" db:"alergi"`
	Diet     string `json:"diet" db:"diet"`
	LabBelum string `json:"lab_belum" db:"lab_belum"`
	Edukasi  string `json:"edukasi" db:"edukasi"`

	CaraKeluar     string     `json:"cara_keluar" db:"cara_keluar"`
	KetKeluar      *string    `json:"ket_keluar,omitempty" db:"ket_keluar"`
	Keadaan        string     `json:"keadaan" db:"keadaan"`
	KetKeadaan     *string    `json:"ket_keadaan,omitempty" db:"ket_keadaan"`
	Dilanjutkan    string     `json:"dilanjutkan" db:"dilanjutkan"`
	KetDilanjutkan *string    `json:"ket_dilanjutkan,omitempty" db:"ket_dilanjutkan"`
	Kontrol        *time.Time `json:"kontrol,omitempty" db:"kontrol"`
	ObatPulang     string     `json:"obat_pulang" db:"obat_pulang"`
}

// Paginated response
type ResumePasienRanapPageResponse struct {
	Page  int                         `json:"page"`
	Size  int                         `json:"size"`
	Total int                         `json:"total"`
	Data  []ResumePasienRanapResponse `json:"data"`
}
