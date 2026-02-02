package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/auth/internal/entity"
)

type AuthRepository interface {
	FindById(id uuid.UUID) (entity.User, error)
	FindByEmail(email string) (entity.Auth, error)
}
