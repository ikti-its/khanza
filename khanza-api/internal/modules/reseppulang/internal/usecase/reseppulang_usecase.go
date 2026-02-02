package usecase

import (
	"fmt"
	"time"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/repository"
)

type ResepPulangUseCase struct {
	Repository repository.ResepPulangRepository
}

func NewResepPulangUseCase(repo repository.ResepPulangRepository) *ResepPulangUseCase {
	return &ResepPulangUseCase{Repository: repo}
}

func (u *ResepPulangUseCase) Create(c *fiber.Ctx, request *model.ResepPulangRequest) (model.ResepPulangResponse, error) {
	tanggal, err := time.Parse("2006-01-02", request.Tanggal)
	if err != nil {
		return model.ResepPulangResponse{}, fmt.Errorf("invalid tanggal format: %v", err)
	}

	jam, err := time.Parse("15:04:05", request.Jam)
	if err != nil {
		return model.ResepPulangResponse{}, fmt.Errorf("invalid jam format: %v", err)
	}

	data := entity.ResepPulang{
		NoRawat:   request.NoRawat,
		KodeBrng:  request.KodeBrng,
		JmlBarang: request.JmlBarang,
		Harga:     request.Harga,
		Total:     request.Total,
		Dosis:     request.Dosis,
		Tanggal:   tanggal,
		Jam:       jam,
		KdBangsal: request.KdBangsal,
		NoBatch:   request.NoBatch,
		NoFaktur:  request.NoFaktur,
	}

	if err := u.Repository.Insert(c, &data); err != nil {
		return model.ResepPulangResponse{}, fmt.Errorf("failed to insert resep pulang: %v", err)
	}

	return mapToResepPulangResponse(&data), nil
}

func (u *ResepPulangUseCase) GetAll() ([]model.ResepPulangResponse, error) {
	data, err := u.Repository.FindAll()
	if err != nil {
		return nil, err
	}

	var result []model.ResepPulangResponse
	for _, p := range data {
		result = append(result, mapToResepPulangResponse(&p))
	}
	return result, nil
}

func (u *ResepPulangUseCase) GetByNoRawat(noRawat string) ([]model.ResepPulangResponse, error) {
	data, err := u.Repository.FindByNoRawat(noRawat)
	if err != nil {
		return nil, err
	}

	var result []model.ResepPulangResponse
	for _, p := range data {
		result = append(result, mapToResepPulangResponse(&p))
	}
	return result, nil
}

func (u *ResepPulangUseCase) GetByCompositeKey(noRawat, kodeBrng, tanggal, jam string) (model.ResepPulangResponse, error) {
	data, err := u.Repository.FindByCompositeKey(noRawat, kodeBrng, tanggal, jam)
	if err != nil {
		return model.ResepPulangResponse{}, fmt.Errorf("data not found")
	}
	if data == nil {
		return model.ResepPulangResponse{}, fmt.Errorf("data not found")
	}

	return mapToResepPulangResponse(data), nil
}

func (u *ResepPulangUseCase) Update(c *fiber.Ctx, noRawat, kodeBrng, tanggal, jam string, request *model.ResepPulangRequest) (model.ResepPulangResponse, error) {
	data, err := u.Repository.FindByCompositeKey(noRawat, kodeBrng, tanggal, jam)
	if err != nil || data == nil {
		return model.ResepPulangResponse{}, fmt.Errorf("data not found")
	}

	// Update fields
	data.JmlBarang = request.JmlBarang
	data.Harga = request.Harga
	data.Total = request.Total
	data.Dosis = request.Dosis
	data.KdBangsal = request.KdBangsal
	data.NoBatch = request.NoBatch
	data.NoFaktur = request.NoFaktur

	if err := u.Repository.Update(c, data); err != nil {
		return model.ResepPulangResponse{}, fmt.Errorf("update failed: %v", err)
	}

	return mapToResepPulangResponse(data), nil
}

func (u *ResepPulangUseCase) Delete(c *fiber.Ctx, noRawat, kodeBrng, tanggal, jam string) error {
	return u.Repository.Delete(c, noRawat, kodeBrng, tanggal, jam)
}

// Helper
func mapToResepPulangResponse(data *entity.ResepPulang) model.ResepPulangResponse {
	return model.ResepPulangResponse{
		NoRawat:   data.NoRawat,
		KodeBrng:  data.KodeBrng,
		JmlBarang: data.JmlBarang,
		Harga:     data.Harga,
		Total:     data.Total,
		Dosis:     data.Dosis,
		Tanggal:   data.Tanggal.Format("2006-01-02"),
		Jam:       data.Jam.Format("15:04:05"),
		KdBangsal: data.KdBangsal,
		NoBatch:   data.NoBatch,
		NoFaktur:  data.NoFaktur,
	}
}
