package usecase

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/repository"
)

type ResepDokterRacikanUseCase struct {
	Repository repository.ResepDokterRacikanRepository
}

func NewResepDokterRacikanUseCase(repo repository.ResepDokterRacikanRepository) *ResepDokterRacikanUseCase {
	return &ResepDokterRacikanUseCase{Repository: repo}
}

func (u *ResepDokterRacikanUseCase) Create(c *fiber.Ctx, request *model.ResepDokterRacikanRequest) (model.ResepDokterRacikanResponse, error) {
	entity := entity.ResepDokterRacikan{
		NoResep:     request.NoResep,
		NoRacik:     request.NoRacik,
		NamaRacik:   request.NamaRacik,
		KdRacik:     request.KdRacik,
		JmlDr:       request.JmlDr,
		AturanPakai: request.AturanPakai,
		Keterangan:  request.Keterangan,
	}

	if err := u.Repository.Insert(c, &entity); err != nil {
		return model.ResepDokterRacikanResponse{}, fmt.Errorf("failed to insert resep dokter racikan: %v", err)
	}

	return model.ResepDokterRacikanResponse(entity), nil
}

func (u *ResepDokterRacikanUseCase) GetAll() ([]model.ResepDokterRacikanResponse, error) {
	data, err := u.Repository.FindAll()
	if err != nil {
		return nil, err
	}

	var result []model.ResepDokterRacikanResponse
	for _, item := range data {
		result = append(result, model.ResepDokterRacikanResponse(item))
	}
	return result, nil
}

func (u *ResepDokterRacikanUseCase) GetByNoResep(noResep string) ([]model.ResepDokterRacikanResponse, error) {
	data, err := u.Repository.FindByNoResep(noResep)
	if err != nil {
		return nil, err
	}

	var result []model.ResepDokterRacikanResponse
	for _, item := range data {
		result = append(result, model.ResepDokterRacikanResponse(item))
	}
	return result, nil
}

func (u *ResepDokterRacikanUseCase) Update(c *fiber.Ctx, request *model.ResepDokterRacikanRequest) (model.ResepDokterRacikanResponse, error) {
	entity := entity.ResepDokterRacikan{
		NoResep:     request.NoResep,
		NoRacik:     request.NoRacik,
		NamaRacik:   request.NamaRacik,
		KdRacik:     request.KdRacik,
		JmlDr:       request.JmlDr,
		AturanPakai: request.AturanPakai,
		Keterangan:  request.Keterangan,
	}

	if err := u.Repository.Update(c, &entity); err != nil {
		return model.ResepDokterRacikanResponse{}, fmt.Errorf("update failed: %v", err)
	}

	return model.ResepDokterRacikanResponse(entity), nil
}

func (u *ResepDokterRacikanUseCase) Delete(c *fiber.Ctx, noResep, noRacik string) error {
	return u.Repository.Delete(c, noResep, noRacik)
}
