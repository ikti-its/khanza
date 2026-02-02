package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
)

type PenerimaanRepository interface {
	Insert(penerimaan *entity.Penerimaan) error
	Find() ([]entity.Penerimaan, error)
	FindById(id uuid.UUID) (entity.Penerimaan, error)
	Update(penerimaan *entity.Penerimaan) error
	Delete(penerimaan *entity.Penerimaan) error
	DetailInsert(detail *entity.DetailPenerimaan) error
	DetailFind() ([]entity.DetailPenerimaan, error)
	DetailFindById(id uuid.UUID) ([]entity.DetailPenerimaan, error)
	DetailFindByPenerimaanBarang(penerimaan, barang uuid.UUID) (entity.DetailPenerimaan, error)
	DetailUpdate(detail *entity.DetailPenerimaan) error
	DetailDelete(detail *entity.DetailPenerimaan) error
}
