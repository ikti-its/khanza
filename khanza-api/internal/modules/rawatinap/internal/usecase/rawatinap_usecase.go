package usecase

import (
	"database/sql"
	"fmt"
	"time"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rawatinap/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/rawatinap/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/rawatinap/internal/repository"
)

type RawatInapUseCase struct {
	Repository repository.RawatInapRepository
}

func NewRawatInapUseCase(repo repository.RawatInapRepository) *RawatInapUseCase {
	return &RawatInapUseCase{Repository: repo}
}

// ✅ Create with audit context
func (u *RawatInapUseCase) Create(c *fiber.Ctx, request *model.RawatInapRequest) (model.RawatInapResponse, error) {
	tglMasuk, err := time.Parse("2006-01-02", request.TanggalMasuk)
	if err != nil {
		return model.RawatInapResponse{}, fmt.Errorf("invalid tanggal_masuk format: %v", err)
	}
	jamMasuk, err := time.Parse("15:04:05", request.JamMasuk)
	if err != nil {
		return model.RawatInapResponse{}, fmt.Errorf("invalid jam_masuk format: %v", err)
	}

	var tanggalKeluar, jamKeluar time.Time
	if request.TanggalKeluar != "" {
		tanggalKeluar, err = time.Parse("2006-01-02", request.TanggalKeluar)
		if err != nil {
			return model.RawatInapResponse{}, fmt.Errorf("invalid tanggal_keluar format: %v", err)
		}
	}
	if request.JamKeluar != "" {
		jamKeluar, err = time.Parse("15:04:05", request.JamKeluar)
		if err != nil {
			return model.RawatInapResponse{}, fmt.Errorf("invalid jam_keluar format: %v", err)
		}
	}

	rawat := entity.RawatInap{
		NomorRawat:      request.NomorRawat,
		NomorRM:         request.NomorRM,
		NamaPasien:      request.NamaPasien,
		AlamatPasien:    sql.NullString{String: request.AlamatPasien, Valid: request.AlamatPasien != ""},
		PenanggungJawab: sql.NullString{String: request.PenanggungJawab, Valid: request.PenanggungJawab != ""},
		HubunganPJ:      sql.NullString{String: request.HubunganPJ, Valid: request.HubunganPJ != ""},
		JenisBayar:      sql.NullString{String: request.JenisBayar, Valid: request.JenisBayar != ""},
		Kamar:           sql.NullString{String: request.Kamar, Valid: request.Kamar != ""},
		TarifKamar:      sql.NullFloat64{Float64: request.TarifKamar, Valid: true},
		DiagnosaAwal:    sql.NullString{String: request.DiagnosaAwal, Valid: request.DiagnosaAwal != ""},
		DiagnosaAkhir:   sql.NullString{String: request.DiagnosaAkhir, Valid: request.DiagnosaAkhir != ""},
		TanggalMasuk:    tglMasuk,
		JamMasuk:        sql.NullTime{Time: jamMasuk, Valid: true},
		TanggalKeluar:   sql.NullTime{Time: tanggalKeluar, Valid: request.TanggalKeluar != ""},
		JamKeluar:       sql.NullTime{Time: jamKeluar, Valid: request.JamKeluar != ""},
		TotalBiaya:      sql.NullFloat64{Float64: request.TotalBiaya, Valid: true},
		StatusPulang:    sql.NullString{String: request.StatusPulang, Valid: request.StatusPulang != ""},
		LamaRanap:       sql.NullFloat64{Float64: request.LamaRanap, Valid: true},
		DokterPJ:        sql.NullString{String: request.DokterPJ, Valid: request.DokterPJ != ""},
		StatusBayar:     sql.NullString{String: request.StatusBayar, Valid: request.StatusBayar != ""},
	}

	if err := u.Repository.Insert(c, &rawat); err != nil {
		return model.RawatInapResponse{}, fmt.Errorf("failed to create rawat inap: %v", err)
	}

	return model.FromEntity(rawat), nil
}

// ✅ Update with audit context
func (u *RawatInapUseCase) Update(c *fiber.Ctx, nomorRawat string, request *model.RawatInapRequest) (model.RawatInapResponse, error) {
	rawat, err := u.Repository.FindByNomorRawat(nomorRawat)
	if err != nil {
		return model.RawatInapResponse{}, fmt.Errorf("rawat inap not found")
	}

	if request.TanggalMasuk != "" {
		rawat.TanggalMasuk, _ = time.Parse("2006-01-02", request.TanggalMasuk)
	}
	if request.JamMasuk != "" {
		if parsed, err := time.Parse("15:04:05", request.JamMasuk); err == nil {
			rawat.JamMasuk = sql.NullTime{Time: parsed, Valid: true}
		}
	}
	if request.TanggalKeluar != "" {
		if parsed, err := time.Parse("2006-01-02", request.TanggalKeluar); err == nil {
			rawat.TanggalKeluar = sql.NullTime{Time: parsed, Valid: true}
		}
	}
	if request.JamKeluar != "" {
		if parsed, err := time.Parse("15:04:05", request.JamKeluar); err == nil {
			rawat.JamKeluar = sql.NullTime{Time: parsed, Valid: true}
		}
	}

	rawat.NamaPasien = request.NamaPasien
	rawat.AlamatPasien = sql.NullString{String: request.AlamatPasien, Valid: request.AlamatPasien != ""}
	rawat.PenanggungJawab = sql.NullString{String: request.PenanggungJawab, Valid: request.PenanggungJawab != ""}
	rawat.HubunganPJ = sql.NullString{String: request.HubunganPJ, Valid: request.HubunganPJ != ""}
	rawat.JenisBayar = sql.NullString{String: request.JenisBayar, Valid: request.JenisBayar != ""}
	rawat.Kamar = sql.NullString{String: request.Kamar, Valid: request.Kamar != ""}
	rawat.TarifKamar = sql.NullFloat64{Float64: request.TarifKamar, Valid: true}
	rawat.DiagnosaAwal = sql.NullString{String: request.DiagnosaAwal, Valid: request.DiagnosaAwal != ""}
	rawat.DiagnosaAkhir = sql.NullString{String: request.DiagnosaAkhir, Valid: request.DiagnosaAkhir != ""}
	rawat.TotalBiaya = sql.NullFloat64{Float64: request.TotalBiaya, Valid: true}
	rawat.StatusPulang = sql.NullString{String: request.StatusPulang, Valid: request.StatusPulang != ""}
	rawat.LamaRanap = sql.NullFloat64{Float64: request.LamaRanap, Valid: true}
	rawat.DokterPJ = sql.NullString{String: request.DokterPJ, Valid: request.DokterPJ != ""}
	rawat.StatusBayar = sql.NullString{String: request.StatusBayar, Valid: request.StatusBayar != ""}

	if err := u.Repository.Update(c, &rawat); err != nil {
		return model.RawatInapResponse{}, fmt.Errorf("failed to update rawat inap: %v", err)
	}

	return model.FromEntity(rawat), nil
}

// ✅ Delete with audit context
func (u *RawatInapUseCase) Delete(c *fiber.Ctx, nomorRawat string) error {
	if err := u.Repository.Delete(c, nomorRawat); err != nil {
		return fmt.Errorf("failed to delete rawat inap: %v", err)
	}
	return nil
}

// ✅ No change needed for readonly methods
func (u *RawatInapUseCase) GetAll() ([]model.RawatInapResponse, error) {
	rawats, err := u.Repository.FindAll()
	if err != nil {
		return nil, err
	}

	var responses []model.RawatInapResponse
	for _, r := range rawats {
		responses = append(responses, model.FromEntity(r))
	}
	return responses, nil
}

func (u *RawatInapUseCase) GetByNomorRawat(nomorRawat string) (model.RawatInapResponse, error) {
	rawat, err := u.Repository.FindByNomorRawat(nomorRawat)
	if err != nil {
		return model.RawatInapResponse{}, fmt.Errorf("rawat inap not found")
	}
	return model.FromEntity(rawat), nil
}

func (uc *RawatInapUseCase) GetPaginated(page int, size int) ([]entity.RawatInap, int, error) {
	return uc.Repository.FindPaginated(page, size)
}
