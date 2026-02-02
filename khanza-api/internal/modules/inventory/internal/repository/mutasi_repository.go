package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
)

type MutasiRepository interface {
	Insert(mutasi *entity.Mutasi) error
	Find() ([]entity.Mutasi, error)
	FindById(id uuid.UUID) (entity.Mutasi, error)
	Update(mutasi *entity.Mutasi) error
	Delete(mutasi *entity.Mutasi) error
}
