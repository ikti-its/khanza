package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
)

type PengajuanRepository interface {
	Insert(pengajuan *entity.Pengajuan) error
	Find() ([]entity.Pengajuan, error)
	FindPage(page, size int) ([]entity.Pengajuan, int, error)
	FindById(id uuid.UUID) (entity.Pengajuan, error)
	Update(pengajuan *entity.Pengajuan) error
	Delete(pengajuan *entity.Pengajuan) error
}
