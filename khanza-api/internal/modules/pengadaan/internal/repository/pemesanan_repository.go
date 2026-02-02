package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
)

type PemesananRepository interface {
	Insert(pemesanan *entity.Pemesanan) error
	Find() ([]entity.Pemesanan, error)
	FindPage(page, size int) ([]entity.Pemesanan, int, error)
	FindById(id uuid.UUID) (entity.Pemesanan, error)
	Update(pemesanan *entity.Pemesanan) error
	Delete(pemesanan *entity.Pemesanan) error
}
