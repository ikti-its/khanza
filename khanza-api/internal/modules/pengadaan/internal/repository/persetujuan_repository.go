package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
)

type PersetujuanRepository interface {
	Insert(persetujuan *entity.Persetujuan) error
	Find() ([]entity.Persetujuan, error)
	FindPage(page, size int) ([]entity.Persetujuan, int, error)
	FindById(id uuid.UUID) (entity.Persetujuan, error)
	Update(persetujuan *entity.Persetujuan) error
	Delete(persetujuan *entity.Persetujuan) error
}
