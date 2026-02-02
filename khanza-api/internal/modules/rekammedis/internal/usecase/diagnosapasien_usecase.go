package usecase

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/repository"
)

type DiagnosaPasienUseCase struct {
	Repository repository.DiagnosaPasienRepository
}

func NewDiagnosaPasienUseCase(repo repository.DiagnosaPasienRepository) *DiagnosaPasienUseCase {
	return &DiagnosaPasienUseCase{Repository: repo}
}

func (u *DiagnosaPasienUseCase) Create(c *fiber.Ctx, request *model.DiagnosaPasienRequest) (*model.DiagnosaPasienResponse, error) {
	var statusPenyakit *string
	if request.StatusPenyakit != "" {
		statusPenyakit = &request.StatusPenyakit
	}

	diagnosa := entity.DiagnosaPasien{
		NoRawat:        request.NoRawat,
		KodePenyakit:   request.KodePenyakit,
		Status:         request.Status,
		Prioritas:      request.Prioritas,
		StatusPenyakit: statusPenyakit,
	}

	if err := u.Repository.Insert(c, &diagnosa); err != nil {
		return nil, fmt.Errorf("gagal insert diagnosa pasien: %v", err)
	}

	return &model.DiagnosaPasienResponse{
		NoRawat:        diagnosa.NoRawat,
		KodePenyakit:   diagnosa.KodePenyakit,
		Status:         diagnosa.Status,
		Prioritas:      diagnosa.Prioritas,
		StatusPenyakit: getString(diagnosa.StatusPenyakit),
	}, nil
}

func (u *DiagnosaPasienUseCase) GetAll() ([]model.DiagnosaPasienResponse, error) {
	records, err := u.Repository.FindAll()
	if err != nil {
		return nil, fmt.Errorf("gagal mengambil data diagnosa: %v", err)
	}

	var responses []model.DiagnosaPasienResponse
	for _, r := range records {
		responses = append(responses, model.DiagnosaPasienResponse{
			NoRawat:        r.NoRawat,
			KodePenyakit:   r.KodePenyakit,
			Status:         r.Status,
			Prioritas:      r.Prioritas,
			StatusPenyakit: getString(r.StatusPenyakit),
		})
	}
	return responses, nil
}

func (u *DiagnosaPasienUseCase) GetByNoRawat(noRawat string) ([]model.DiagnosaPasienResponse, error) {
	records, err := u.Repository.FindByNoRawat(noRawat)
	if err != nil {
		return nil, fmt.Errorf("data diagnosa tidak ditemukan: %v", err)
	}

	var responses []model.DiagnosaPasienResponse
	for _, r := range records {
		responses = append(responses, model.DiagnosaPasienResponse{
			NoRawat:        r.NoRawat,
			KodePenyakit:   r.KodePenyakit,
			Status:         r.Status,
			Prioritas:      r.Prioritas,
			StatusPenyakit: getString(r.StatusPenyakit),
		})
	}
	return responses, nil
}

func (u *DiagnosaPasienUseCase) GetByNoRawatAndStatus(noRawat string, status string) ([]model.DiagnosaPasienResponse, error) {
	records, err := u.Repository.FindByNoRawatAndStatus(noRawat, status)
	if err != nil {
		return nil, fmt.Errorf("data diagnosa tidak ditemukan: %v", err)
	}

	var responses []model.DiagnosaPasienResponse
	for _, r := range records {
		responses = append(responses, model.DiagnosaPasienResponse{
			NoRawat:        r.NoRawat,
			KodePenyakit:   r.KodePenyakit,
			Status:         r.Status,
			Prioritas:      r.Prioritas,
			StatusPenyakit: getString(r.StatusPenyakit),
		})
	}
	return responses, nil
}

func (u *DiagnosaPasienUseCase) Update(c *fiber.Ctx, request *model.DiagnosaPasienRequest) error {
	var statusPenyakit *string
	if request.StatusPenyakit != "" {
		statusPenyakit = &request.StatusPenyakit
	}

	diagnosa := entity.DiagnosaPasien{
		NoRawat:        request.NoRawat,
		KodePenyakit:   request.KodePenyakit,
		Status:         request.Status,
		Prioritas:      request.Prioritas,
		StatusPenyakit: statusPenyakit,
	}

	return u.Repository.Update(c, &diagnosa)
}

func (u *DiagnosaPasienUseCase) Delete(c *fiber.Ctx, noRawat, kdPenyakit string) error {
	return u.Repository.Delete(c, noRawat, kdPenyakit)
}
