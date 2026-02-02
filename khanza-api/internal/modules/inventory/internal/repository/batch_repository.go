package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
)

type BatchRepository interface {
	Insert(batch *entity.Batch) error
	Find() ([]entity.Batch, error)
	FindByBatch(id string) ([]entity.Batch, error)
	FindById(batch, faktur string, barang uuid.UUID) (entity.Batch, error)
	Update(batch *entity.Batch) error
	Delete(batch *entity.Batch) error
}
