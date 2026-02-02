package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/entity"
)

type BerkasRepository interface {
	Insert(berkas *entity.Berkas) error
	Find() ([]entity.Berkas, error)
	FindPage(page, size int) ([]entity.Berkas, int, error)
	FindAkunIdById(id uuid.UUID) (uuid.UUID, error)
	FindById(id uuid.UUID) (entity.Berkas, error)
	Update(berkas *entity.Berkas) error
	Delete(berkas *entity.Berkas) error
}
