package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
)

type TagihanRepository interface {
	Insert(tagihan *entity.Tagihan) error
	Find() ([]entity.Tagihan, error)
	FindPage(page, size int) ([]entity.Tagihan, int, error)
	FindById(id uuid.UUID) (entity.Tagihan, error)
	Update(tagihan *entity.Tagihan) error
	Delete(tagihan *entity.Tagihan) error
}
