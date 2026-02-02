package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/organisasi/internal/entity"
)

type OrganisasiRepository interface {
	Find() (entity.Organisasi, error)
	FindById(id uuid.UUID) (entity.Organisasi, error)
	Update(organisasi *entity.Organisasi) error
}
