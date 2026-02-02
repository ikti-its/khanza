package usecase

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/obat/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/obat/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/obat/internal/repository"
)

type GudangBarangUseCase struct {
	Repo repository.GudangBarangRepository
}

func NewGudangBarangUseCase(repo repository.GudangBarangRepository) *GudangBarangUseCase {
	return &GudangBarangUseCase{Repo: repo}
}

// Create a new gudang barang entry
func (u *GudangBarangUseCase) Create(c *fiber.Ctx, request *model.GudangBarangRequest) (model.GudangBarangResponse, error) {
	newID := uuid.New()

	entity := &entity.GudangBarang{
		ID:            newID,
		IDBarangMedis: request.IDBarangMedis,
		IDRuangan:     request.IDRuangan,
		Stok:          request.Stok,
		NoBatch:       request.NoBatch,
		NoFaktur:      request.NoFaktur,
	}

	if err := u.Repo.Insert(c, entity); err != nil {
		return model.GudangBarangResponse{}, fmt.Errorf("failed to insert gudang barang: %w", err)
	}

	return model.GudangBarangResponse{
		ID:            entity.ID.String(),
		IDBarangMedis: entity.IDBarangMedis,
		IDRuangan:     entity.IDRuangan,
		Stok:          entity.Stok,
		NoBatch:       entity.NoBatch,
		NoFaktur:      entity.NoFaktur,
	}, nil
}

func (u *GudangBarangUseCase) GetAll() ([]model.GudangBarangResponse, error) {
	entities, err := u.Repo.FindAll()
	if err != nil {
		return nil, err
	}

	var result []model.GudangBarangResponse
	for _, e := range entities {
		result = append(result, model.GudangBarangResponse{
			ID:            e.ID.String(),
			IDBarangMedis: e.IDBarangMedis,
			IDRuangan:     e.IDRuangan,
			Stok:          e.Stok,
			NoBatch:       e.NoBatch,
			NoFaktur:      e.NoFaktur,
		})
	}
	return result, nil
}

func (u *GudangBarangUseCase) GetByID(id string) (model.GudangBarangResponse, error) {
	entity, err := u.Repo.FindByID(id)
	if err != nil {
		return model.GudangBarangResponse{}, err
	}

	return model.GudangBarangResponse{
		ID:            entity.ID.String(),
		IDBarangMedis: entity.IDBarangMedis,
		IDRuangan:     entity.IDRuangan,
		Stok:          entity.Stok,
		NoBatch:       entity.NoBatch,
		NoFaktur:      entity.NoFaktur,
		Kapasitas:     entity.Kapasitas,
	}, nil
}

func (u *GudangBarangUseCase) Update(c *fiber.Ctx, id string, request *model.GudangBarangRequest) (model.GudangBarangResponse, error) {
	entity := &entity.GudangBarang{
		ID:            uuid.MustParse(id),
		IDBarangMedis: request.IDBarangMedis,
		IDRuangan:     request.IDRuangan,
		Stok:          request.Stok,
		NoBatch:       request.NoBatch,
		NoFaktur:      request.NoFaktur,
	}

	if err := u.Repo.Update(c, entity); err != nil {
		return model.GudangBarangResponse{}, err
	}

	return model.GudangBarangResponse{
		ID:            entity.ID.String(),
		IDBarangMedis: entity.IDBarangMedis,
		IDRuangan:     entity.IDRuangan,
		Stok:          entity.Stok,
		NoBatch:       entity.NoBatch,
		NoFaktur:      entity.NoFaktur,
	}, nil
}

func (u *GudangBarangUseCase) Delete(c *fiber.Ctx, id string) error {
	return u.Repo.Delete(c, id)
}
