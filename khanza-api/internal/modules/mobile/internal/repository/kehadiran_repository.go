package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/entity"
)

type KehadiranRepository interface {
	FindByPegawaiId(id uuid.UUID) (entity.Kehadiran, error)
}
