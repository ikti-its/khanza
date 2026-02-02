package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/entity"
)

type TukarRepository interface {
	Insert(tukar *entity.Tukar) error
	FindSender(id uuid.UUID) ([]entity.Tukar, error)
	FindRecipient(id uuid.UUID) ([]entity.Tukar, error)
	FindById(id uuid.UUID) (entity.Tukar, error)
	Update(tukar *entity.Tukar) error
	Delete(tukar *entity.Tukar) error
}
