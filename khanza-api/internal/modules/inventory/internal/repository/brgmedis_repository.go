package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
)

type BrgmedisRepository interface {
	Insert(brgmedis *entity.Brgmedis) error
	Find() ([]entity.Brgmedis, error)
	FindById(id uuid.UUID) (entity.Brgmedis, error)
	Update(brgmedis *entity.Brgmedis) error
	Delete(brgmedis *entity.Brgmedis) error
}
