package usecase

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/repository"
)

type ResepDokterUseCase struct {
	Repository repository.ResepDokterRepository
}

func NewResepDokterUseCase(repo repository.ResepDokterRepository) *ResepDokterUseCase {
	return &ResepDokterUseCase{Repository: repo}
}

func (u *ResepDokterUseCase) Create(c *fiber.Ctx, request *model.ResepDokterRequest) (model.ResepDokterResponse, error) {
	entity := entity.ResepDokter{
		NoResep:     request.NoResep,
		KodeBarang:  request.KodeBarang,
		Jumlah:      request.Jumlah,
		AturanPakai: request.AturanPakai,
	}

	if err := u.Repository.Insert(c, &entity); err != nil {
		return model.ResepDokterResponse{}, fmt.Errorf("failed to insert resep dokter: %v", err)
	}

	return model.ResepDokterResponse(entity), nil
}

func (u *ResepDokterUseCase) GetAll() ([]model.ResepDokterResponse, error) {
	data, err := u.Repository.FindAll()
	if err != nil {
		return nil, err
	}

	var result []model.ResepDokterResponse
	for _, item := range data {
		result = append(result, model.ResepDokterResponse(item))
	}
	return result, nil
}

func (u *ResepDokterUseCase) GetByNoResep(noResep string) ([]model.ResepDokterResponse, error) {
	data, err := u.Repository.FindByNoResep(noResep)
	if err != nil {
		return nil, err
	}

	var result []model.ResepDokterResponse
	for _, item := range data {
		result = append(result, model.ResepDokterResponse(item))
	}
	return result, nil
}

func (u *ResepDokterUseCase) Update(c *fiber.Ctx, request *model.ResepDokterRequest) (model.ResepDokterResponse, error) {
	entity := entity.ResepDokter{
		NoResep:     request.NoResep,
		KodeBarang:  request.KodeBarang,
		Jumlah:      request.Jumlah,
		AturanPakai: request.AturanPakai,
	}

	if err := u.Repository.Update(c, &entity); err != nil {
		return model.ResepDokterResponse{}, fmt.Errorf("update failed: %v", err)
	}

	return model.ResepDokterResponse(entity), nil
}

func (u *ResepDokterUseCase) Delete(c *fiber.Ctx, noResep, kodeBarang string) error {
	return u.Repository.Delete(c, noResep, kodeBarang)
}
