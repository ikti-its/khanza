package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/entity"
)

type CutiRepository interface {
	Insert(cuti *entity.Cuti) error
	Find() ([]entity.Cuti, error)
	FindPage(page, size int) ([]entity.Cuti, int, error)
	FindById(id uuid.UUID) (entity.Cuti, error)
	FindByPegawaiId(id uuid.UUID) ([]entity.Cuti, error)
	Update(cuti *entity.Cuti) error
	Delete(cuti *entity.Cuti) error
}
