package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
)

type PesananRepository interface {
	Insert(pesanan *entity.Pesanan) error
	Find() ([]entity.Pesanan, error)
	FindPage(page, size int) ([]entity.Pesanan, int, error)
	FindByIdPengajuan(id uuid.UUID) ([]entity.Pesanan, error)
	FindById(id uuid.UUID) (entity.Pesanan, error)
	Update(pesanan *entity.Pesanan) error
	Delete(pesanan *entity.Pesanan) error
}
