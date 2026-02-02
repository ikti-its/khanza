package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
)

type StokKeluarRepository interface {
	Insert(stokkeluar *entity.StokKeluar) error
	Find() ([]entity.StokKeluar, error)
	FindById(id uuid.UUID) (entity.StokKeluar, error)
	Update(stokkeluar *entity.StokKeluar) error
	Delete(stokkeluar *entity.StokKeluar) error
}
