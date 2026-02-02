package usecase

import (
	"database/sql"
	"errors"
	"fmt"
	"log"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/repository"
)

type ResepDokterRacikanDetailUseCase struct {
	Repository repository.ResepDokterRacikanDetailRepository
}

func NewResepDokterRacikanDetailUseCase(repo repository.ResepDokterRacikanDetailRepository) *ResepDokterRacikanDetailUseCase {
	return &ResepDokterRacikanDetailUseCase{Repository: repo}
}

func (u *ResepDokterRacikanDetailUseCase) Create(c *fiber.Ctx, request *model.ResepDokterRacikanDetailRequest) (model.ResepDokterRacikanDetailResponse, error) {
	entity := entity.ResepDokterRacikanDetail{
		NoResep:   request.NoResep,
		NoRacik:   request.NoRacik,
		KodeBrng:  request.KodeBrng,
		P1:        request.P1,
		P2:        request.P2,
		Kandungan: request.Kandungan,
		Jml:       request.Jml,
	}

	if err := u.Repository.Insert(c, &entity); err != nil {
		return model.ResepDokterRacikanDetailResponse{}, fmt.Errorf("failed to insert detail racikan: %v", err)
	}

	return model.ResepDokterRacikanDetailResponse(entity), nil
}

func (u *ResepDokterRacikanDetailUseCase) GetAll() ([]model.ResepDokterRacikanDetailResponse, error) {
	data, err := u.Repository.FindAll()
	if err != nil {
		return nil, err
	}

	var result []model.ResepDokterRacikanDetailResponse
	for _, item := range data {
		result = append(result, model.ResepDokterRacikanDetailResponse(item))
	}
	return result, nil
}

func (u *ResepDokterRacikanDetailUseCase) GetByNoResepAndNoRacik(noResep, noRacik string) ([]model.ResepDokterRacikanDetailResponse, error) {
	data, err := u.Repository.FindByNoResepAndNoRacik(noResep, noRacik)
	if err != nil {
		return nil, err
	}

	var result []model.ResepDokterRacikanDetailResponse
	for _, item := range data {
		result = append(result, model.ResepDokterRacikanDetailResponse(item))
	}
	return result, nil
}

func (u *ResepDokterRacikanDetailUseCase) Update(c *fiber.Ctx, request *model.ResepDokterRacikanDetailRequest) (model.ResepDokterRacikanDetailResponse, error) {
	entity := entity.ResepDokterRacikanDetail{
		NoResep:   request.NoResep,
		NoRacik:   request.NoRacik,
		KodeBrng:  request.KodeBrng,
		P1:        request.P1,
		P2:        request.P2,
		Kandungan: request.Kandungan,
		Jml:       request.Jml,
	}

	if err := u.Repository.Update(c, &entity); err != nil {
		return model.ResepDokterRacikanDetailResponse{}, fmt.Errorf("update failed: %v", err)
	}

	return model.ResepDokterRacikanDetailResponse(entity), nil
}

func (u *ResepDokterRacikanDetailUseCase) Delete(c *fiber.Ctx, noResep, noRacik, kodeBrng string) error {
	return u.Repository.Delete(c, noResep, noRacik, kodeBrng)
}

func (u *ResepDokterRacikanDetailUseCase) GetByNoResep(noResep string) ([]model.ResepDokterRacikanDetail, error) {
	result, err := u.Repository.FindByNoResep(noResep)
	if err != nil {
		if errors.Is(err, sql.ErrNoRows) {
			// Log tidak ada data, tapi bukan error
			log.Printf("🟡 Tidak ada racikan detail untuk no_resep %s", noResep)
			return []model.ResepDokterRacikanDetail{}, nil
		}
		return nil, err
	}
	return result, nil
}
