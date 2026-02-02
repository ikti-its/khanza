package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/akun/internal/entity"
)

type AlamatRepository interface {
	Insert(alamat *entity.Alamat) error
	Find() ([]entity.Alamat, error)
	FindPage(page, size int) ([]entity.Alamat, int, error)
	FindById(id uuid.UUID) (entity.Alamat, error)
	Update(alamat *entity.Alamat) error
	Delete(alamat *entity.Alamat) error
}
