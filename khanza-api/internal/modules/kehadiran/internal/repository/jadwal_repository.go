package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/entity"
)

type JadwalRepository interface {
	Find() ([]entity.Jadwal, error)
	FindPage(page, size int) ([]entity.Jadwal, int, error)
	FindByHariId(id int) ([]entity.Jadwal, error)
	FindByPegawaiId(id uuid.UUID) ([]entity.Jadwal, error)
	FindById(id uuid.UUID) (entity.Jadwal, error)
	Update(jadwal *entity.Jadwal) error
}
