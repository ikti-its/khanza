package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/entity"
)

type HomeRepository interface {
	HomePegawai(id uuid.UUID, hari int) (entity.Home, error)
	ObserveKehadiran(id, jadwal uuid.UUID, tanggal string) (uuid.UUID, error)
}
