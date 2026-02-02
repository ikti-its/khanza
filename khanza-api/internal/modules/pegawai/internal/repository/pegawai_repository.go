package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/entity"
)

type PegawaiRepository interface {
	Insert(pegawai *entity.Pegawai) error
	Find() ([]entity.Pegawai, error)
	FindPage(page, size int) ([]entity.Pegawai, int, error)
	FindById(id uuid.UUID) (entity.Pegawai, error)
	Update(pegawai *entity.Pegawai) error
	Delete(pegawai *entity.Pegawai) error
	GetByNIP(nip string) (*entity.Pegawai, error)
}
