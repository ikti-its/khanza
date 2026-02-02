package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/entity"
)

type PegawaiRepository interface {
	FindById(id uuid.UUID) (entity.Pegawai, error)
}
