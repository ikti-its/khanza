package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/entity"
)

type KetersediaanRepository interface {
	Find() ([]entity.Ketersediaan, error)
	FindPage(page, size int) ([]entity.Ketersediaan, int, error)
	ObserveCuti(id uuid.UUID, tanggal string) (uuid.UUID, error)
}
