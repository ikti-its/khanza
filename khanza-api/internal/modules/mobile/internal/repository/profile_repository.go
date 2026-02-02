package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/entity"
)

type ProfileRepository interface {
	FindById(id uuid.UUID) (entity.Profile, error)
	Update(profile *entity.Profile) error
}
