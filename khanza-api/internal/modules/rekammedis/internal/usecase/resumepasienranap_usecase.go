package usecase

import (
	"fmt"

	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/repository"
)

type ResumePasienRanapUseCase struct {
	Repository repository.ResumePasienRanapRepository
}

func NewResumePasienRanapUseCase(repo repository.ResumePasienRanapRepository) *ResumePasienRanapUseCase {
	return &ResumePasienRanapUseCase{Repository: repo}
}

func (u *ResumePasienRanapUseCase) Create(request *model.ResumePasienRanapRequest) error {
	entity := modelToEntity(request)
	return u.Repository.Insert(&entity)
}

func (u *ResumePasienRanapUseCase) GetAll() ([]model.ResumePasienRanapResponse, error) {
	data, err := u.Repository.FindAll()
	if err != nil {
		return nil, fmt.Errorf("failed to fetch data: %w", err)
	}

	var result []model.ResumePasienRanapResponse
	for _, r := range data {
		result = append(result, entityToResponse(&r))
	}
	return result, nil
}

func (u *ResumePasienRanapUseCase) GetByNoRawat(noRawat string) (*model.ResumePasienRanapResponse, error) {
	data, err := u.Repository.FindByNoRawat(noRawat)
	if err != nil {
		return nil, fmt.Errorf("data not found: %w", err)
	}
	resp := entityToResponse(data)
	return &resp, nil
}

func (u *ResumePasienRanapUseCase) Update(noRawat string, request *model.ResumePasienRanapRequest) error {
	entity := modelToEntity(request)
	entity.NoRawat = noRawat
	return u.Repository.Update(&entity)
}

func (u *ResumePasienRanapUseCase) Delete(noRawat string) error {
	return u.Repository.Delete(noRawat)
}

// Helper functions
func modelToEntity(req *model.ResumePasienRanapRequest) entity.ResumePasienRanap {
	return entity.ResumePasienRanap{
		NoRawat:              req.NoRawat,
		KodeDokter:           req.KodeDokter,
		DiagnosaAwal:         req.DiagnosaAwal,
		Alasan:               req.Alasan,
		KeluhanUtama:         req.KeluhanUtama,
		PemeriksaanFisik:     req.PemeriksaanFisik,
		JalannyaPenyakit:     req.JalannyaPenyakit,
		PemeriksaanPenunjang: req.PemeriksaanPenunjang,
		HasilLaborat:         req.HasilLaborat,
		TindakanOperasi:      req.TindakanOperasi,
		ObatDiRS:             req.ObatDiRS,

		DiagnosaUtama:         req.DiagnosaUtama,
		KodeDiagnosaUtama:     req.KodeDiagnosaUtama,
		DiagnosaSekunder:      req.DiagnosaSekunder,
		KodeDiagnosaSekunder:  req.KodeDiagnosaSekunder,
		DiagnosaSekunder2:     req.DiagnosaSekunder2,
		KodeDiagnosaSekunder2: req.KodeDiagnosaSekunder2,
		DiagnosaSekunder3:     req.DiagnosaSekunder3,
		KodeDiagnosaSekunder3: req.KodeDiagnosaSekunder3,
		DiagnosaSekunder4:     req.DiagnosaSekunder4,
		KodeDiagnosaSekunder4: req.KodeDiagnosaSekunder4,

		ProsedurUtama:         req.ProsedurUtama,
		KodeProsedurUtama:     req.KodeProsedurUtama,
		ProsedurSekunder:      req.ProsedurSekunder,
		KodeProsedurSekunder:  req.KodeProsedurSekunder,
		ProsedurSekunder2:     req.ProsedurSekunder2,
		KodeProsedurSekunder2: req.KodeProsedurSekunder2,
		ProsedurSekunder3:     req.ProsedurSekunder3,
		KodeProsedurSekunder3: req.KodeProsedurSekunder3,

		Alergi:         req.Alergi,
		Diet:           req.Diet,
		LabBelum:       req.LabBelum,
		Edukasi:        req.Edukasi,
		CaraKeluar:     req.CaraKeluar,
		KetKeluar:      req.KetKeluar,
		Keadaan:        req.Keadaan,
		KetKeadaan:     req.KetKeadaan,
		Dilanjutkan:    req.Dilanjutkan,
		KetDilanjutkan: req.KetDilanjutkan,
		Kontrol:        req.Kontrol,
		ObatPulang:     req.ObatPulang,
	}
}

func entityToResponse(e *entity.ResumePasienRanap) model.ResumePasienRanapResponse {
	return model.ResumePasienRanapResponse{
		NoRawat:              e.NoRawat,
		KodeDokter:           e.KodeDokter,
		DiagnosaAwal:         e.DiagnosaAwal,
		Alasan:               e.Alasan,
		KeluhanUtama:         e.KeluhanUtama,
		PemeriksaanFisik:     e.PemeriksaanFisik,
		JalannyaPenyakit:     e.JalannyaPenyakit,
		PemeriksaanPenunjang: e.PemeriksaanPenunjang,
		HasilLaborat:         e.HasilLaborat,
		TindakanOperasi:      e.TindakanOperasi,
		ObatDiRS:             e.ObatDiRS,

		DiagnosaUtama:         e.DiagnosaUtama,
		KodeDiagnosaUtama:     e.KodeDiagnosaUtama,
		DiagnosaSekunder:      e.DiagnosaSekunder,
		KodeDiagnosaSekunder:  e.KodeDiagnosaSekunder,
		DiagnosaSekunder2:     e.DiagnosaSekunder2,
		KodeDiagnosaSekunder2: e.KodeDiagnosaSekunder2,
		DiagnosaSekunder3:     e.DiagnosaSekunder3,
		KodeDiagnosaSekunder3: e.KodeDiagnosaSekunder3,
		DiagnosaSekunder4:     e.DiagnosaSekunder4,
		KodeDiagnosaSekunder4: e.KodeDiagnosaSekunder4,

		ProsedurUtama:         e.ProsedurUtama,
		KodeProsedurUtama:     e.KodeProsedurUtama,
		ProsedurSekunder:      e.ProsedurSekunder,
		KodeProsedurSekunder:  e.KodeProsedurSekunder,
		ProsedurSekunder2:     e.ProsedurSekunder2,
		KodeProsedurSekunder2: e.KodeProsedurSekunder2,
		ProsedurSekunder3:     e.ProsedurSekunder3,
		KodeProsedurSekunder3: e.KodeProsedurSekunder3,

		Alergi:         e.Alergi,
		Diet:           e.Diet,
		LabBelum:       e.LabBelum,
		Edukasi:        e.Edukasi,
		CaraKeluar:     e.CaraKeluar,
		KetKeluar:      e.KetKeluar,
		Keadaan:        e.Keadaan,
		KetKeadaan:     e.KetKeadaan,
		Dilanjutkan:    e.Dilanjutkan,
		KetDilanjutkan: e.KetDilanjutkan,
		Kontrol:        e.Kontrol,
		ObatPulang:     e.ObatPulang,
	}
}
