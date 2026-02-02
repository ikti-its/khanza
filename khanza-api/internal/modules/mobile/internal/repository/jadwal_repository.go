package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/entity"
)

type JadwalRepository interface {
	Find(hari int) ([]entity.Jadwal, error)
	FindByPegawaiId(id uuid.UUID, hari int) (entity.Jadwal, error)
}
