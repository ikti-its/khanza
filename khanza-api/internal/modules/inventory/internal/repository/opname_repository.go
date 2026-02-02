package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
)

type OpnameRepository interface {
	Insert(opname *entity.Opname) error
	Find() ([]entity.Opname, error)
	FindById(id uuid.UUID) (entity.Opname, error)
	Update(opname *entity.Opname) error
	Delete(opname *entity.Opname) error
}
