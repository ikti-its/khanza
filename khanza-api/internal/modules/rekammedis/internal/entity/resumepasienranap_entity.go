package entity

import "time"

type ResumePasienRanap struct {
	NoRawat              string `db:"no_rawat"`
	KodeDokter           string `db:"kd_dokter"`
	DiagnosaAwal         string `db:"diagnosa_awal"`
	Alasan               string `db:"alasan"`
	KeluhanUtama         string `db:"keluhan_utama"`
	PemeriksaanFisik     string `db:"pemeriksaan_fisik"`
	JalannyaPenyakit     string `db:"jalannya_penyakit"`
	PemeriksaanPenunjang string `db:"pemeriksaan_penunjang"`
	HasilLaborat         string `db:"hasil_laborat"`
	TindakanOperasi      string `db:"tindakan_dan_operasi"`
	ObatDiRS             string `db:"obat_di_rs"`

	DiagnosaUtama         string `db:"diagnosa_utama"`
	KodeDiagnosaUtama     string `db:"kd_diagnosa_utama"`
	DiagnosaSekunder      string `db:"diagnosa_sekunder"`
	KodeDiagnosaSekunder  string `db:"kd_diagnosa_sekunder"`
	DiagnosaSekunder2     string `db:"diagnosa_sekunder2"`
	KodeDiagnosaSekunder2 string `db:"kd_diagnosa_sekunder2"`
	DiagnosaSekunder3     string `db:"diagnosa_sekunder3"`
	KodeDiagnosaSekunder3 string `db:"kd_diagnosa_sekunder3"`
	DiagnosaSekunder4     string `db:"diagnosa_sekunder4"`
	KodeDiagnosaSekunder4 string `db:"kd_diagnosa_sekunder4"`

	ProsedurUtama         string `db:"prosedur_utama"`
	KodeProsedurUtama     string `db:"kd_prosedur_utama"`
	ProsedurSekunder      string `db:"prosedur_sekunder"`
	KodeProsedurSekunder  string `db:"kd_prosedur_sekunder"`
	ProsedurSekunder2     string `db:"prosedur_sekunder2"`
	KodeProsedurSekunder2 string `db:"kd_prosedur_sekunder2"`
	ProsedurSekunder3     string `db:"prosedur_sekunder3"`
	KodeProsedurSekunder3 string `db:"kd_prosedur_sekunder3"`

	Alergi   string `db:"alergi"`
	Diet     string `db:"diet"`
	LabBelum string `db:"lab_belum"`
	Edukasi  string `db:"edukasi"`

	CaraKeluar     string     `db:"cara_keluar"`     // ENUM
	KetKeluar      *string    `db:"ket_keluar"`      // Nullable
	Keadaan        string     `db:"keadaan"`         // ENUM
	KetKeadaan     *string    `db:"ket_keadaan"`     // Nullable
	Dilanjutkan    string     `db:"dilanjutkan"`     // ENUM
	KetDilanjutkan *string    `db:"ket_dilanjutkan"` // Nullable
	Kontrol        *time.Time `db:"kontrol"`         // Nullable
	ObatPulang     string     `db:"obat_pulang"`
}
