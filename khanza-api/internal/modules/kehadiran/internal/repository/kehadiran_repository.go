package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/entity"
)

type KehadiranRepository interface {
	Insert(kehadiran *entity.Kehadiran) error
	Find() ([]entity.Kehadiran, error)
	FindPage(page, size int) ([]entity.Kehadiran, int, error)
	FindByPegawaiId(id uuid.UUID) ([]entity.Kehadiran, error)
	FindByTanggal(tanggal string) ([]entity.Kehadiran, error)
	FindByPegawaiTanggal(id uuid.UUID, tanggal string) (int, error)
	FindById(id uuid.UUID) (entity.Kehadiran, error)
	FindKode(tanggal string) (entity.KodePresensi, error)
	Update(kehadiran *entity.Kehadiran, emergency bool) error
}
