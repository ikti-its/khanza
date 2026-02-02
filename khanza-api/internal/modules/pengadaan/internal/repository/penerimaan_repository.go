package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
)

type PenerimaanRepository interface {
	Insert(penerimaan *entity.Penerimaan) error
	Find() ([]entity.Penerimaan, error)
	FindPage(page, size int) ([]entity.Penerimaan, int, error)
	FindById(id uuid.UUID) (entity.Penerimaan, error)
	Update(penerimaan *entity.Penerimaan) error
	Delete(penerimaan *entity.Penerimaan) error
}
