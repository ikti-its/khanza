package usecase

import (
	"context"
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/repository"
)

type ResepObatUseCase struct {
	Repository repository.ResepObatRepository
}

func NewResepObatUseCase(repo repository.ResepObatRepository) *ResepObatUseCase {
	return &ResepObatUseCase{Repository: repo}
}

func (u *ResepObatUseCase) Create(c *fiber.Ctx, request *model.ResepObatRequest) (*model.ResepObatResponse, error) {
	entity := entity.ResepObat{
		NoResep:       request.NoResep,
		TglPerawatan:  request.TglPerawatan,
		Jam:           request.Jam,
		NoRawat:       request.NoRawat,
		KdDokter:      request.KdDokter,
		TglPeresepan:  request.TglPeresepan,
		JamPeresepan:  request.JamPeresepan,
		Status:        request.Status,
		TglPenyerahan: request.TglPenyerahan,
		JamPenyerahan: request.JamPenyerahan,
		Validasi:      request.Validasi,
	}

	if err := u.Repository.Insert(c, &entity); err != nil {
		return nil, fmt.Errorf("failed to insert resep_obat: %v", err)
	}

	return &model.ResepObatResponse{
		Code:   201,
		Status: "Created",
		Data: model.ResepObat{
			NoResep:       entity.NoResep,
			TglPerawatan:  entity.TglPerawatan,
			Jam:           entity.Jam,
			NoRawat:       entity.NoRawat,
			KdDokter:      entity.KdDokter,
			TglPeresepan:  entity.TglPeresepan,
			JamPeresepan:  entity.JamPeresepan,
			Status:        entity.Status,
			TglPenyerahan: entity.TglPenyerahan,
			JamPenyerahan: entity.JamPenyerahan,
			Validasi:      entity.Validasi,
		},
	}, nil

}

func (u *ResepObatUseCase) GetAll() ([]model.ResepObat, error) {
	data, err := u.Repository.FindAll()
	if err != nil {
		return nil, err
	}

	var result []model.ResepObat
	for _, item := range data {
		result = append(result, model.ResepObat{
			NoResep:       item.NoResep,
			TglPerawatan:  item.TglPerawatan,
			Jam:           item.Jam,
			NoRawat:       item.NoRawat,
			KdDokter:      item.KdDokter,
			TglPeresepan:  item.TglPeresepan,
			JamPeresepan:  item.JamPeresepan,
			Status:        item.Status,
			TglPenyerahan: item.TglPenyerahan,
			JamPenyerahan: item.JamPenyerahan,
			Validasi:      item.Validasi,
		})
	}

	return result, nil
}

func (u *ResepObatUseCase) GetByNoResep(noResep string) (*model.ResepObat, error) {
	data, err := u.Repository.FindByNoResep(noResep)
	if err != nil {
		return nil, fmt.Errorf("resep_obat not found: %v", err)
	}

	result := &model.ResepObat{
		NoResep:       data.NoResep,
		TglPerawatan:  data.TglPerawatan,
		Jam:           data.Jam,
		NoRawat:       data.NoRawat,
		KdDokter:      data.KdDokter,
		TglPeresepan:  data.TglPeresepan,
		JamPeresepan:  data.JamPeresepan,
		Status:        data.Status,
		TglPenyerahan: data.TglPenyerahan,
		JamPenyerahan: data.JamPenyerahan,
		Validasi:      data.Validasi,
	}

	return result, nil
}

func (u *ResepObatUseCase) Update(c *fiber.Ctx, noResep string, request *model.ResepObatRequest) (*model.ResepObatResponse, error) {
	entity := entity.ResepObat{
		NoResep:       noResep, // Gunakan nilai dari URL, bukan dari request body
		TglPerawatan:  request.TglPerawatan,
		Jam:           request.Jam,
		NoRawat:       request.NoRawat,
		KdDokter:      request.KdDokter,
		TglPeresepan:  request.TglPeresepan,
		JamPeresepan:  request.JamPeresepan,
		Status:        request.Status,
		TglPenyerahan: request.TglPenyerahan,
		JamPenyerahan: request.JamPenyerahan,
		Validasi:      request.Validasi,
	}

	if err := u.Repository.Update(c, &entity); err != nil {
		return nil, fmt.Errorf("update failed: %v", err)
	}

	return &model.ResepObatResponse{
		Code:   200,
		Status: "Updated",
		Data: model.ResepObat{
			NoResep:       entity.NoResep,
			TglPerawatan:  entity.TglPerawatan,
			Jam:           entity.Jam,
			NoRawat:       entity.NoRawat,
			KdDokter:      entity.KdDokter,
			TglPeresepan:  entity.TglPeresepan,
			JamPeresepan:  entity.JamPeresepan,
			Status:        entity.Status,
			TglPenyerahan: entity.TglPenyerahan,
			JamPenyerahan: entity.JamPenyerahan,
			Validasi:      entity.Validasi,
		},
	}, nil
}

func (u *ResepObatUseCase) Delete(c *fiber.Ctx, noResep string) error {
	return u.Repository.Delete(c, noResep)
}

func (u *ResepObatUseCase) GetByNomorRawat(nomorRawat string) ([]entity.ResepObat, error) {
	return u.Repository.GetByNomorRawat(nomorRawat)
}

func (u *ResepObatUseCase) UpdateValidasi(c *fiber.Ctx, ctx context.Context, noResep string, validasi bool) error {
	return u.Repository.UpdateValidasi(c, noResep, validasi)
}

// func (uc *ResepObatUseCase) GetPaginated(page int, size int) ([]entity.ResepObat, int, error) {
// 	return uc.Repository.FindPaginated(page, size)
// }
