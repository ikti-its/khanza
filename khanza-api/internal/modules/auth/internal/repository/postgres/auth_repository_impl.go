package postgres

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/auth/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/auth/internal/repository"
	"github.com/jmoiron/sqlx"
)

type authRepositoryImpl struct {
	DB *sqlx.DB
}

func NewAuthRepository(db *sqlx.DB) repository.AuthRepository {
	return &authRepositoryImpl{db}
}

func (r *authRepositoryImpl) FindById(id uuid.UUID) (entity.User, error) {
	query := `
		SELECT id, email, foto, role
		FROM akun 
		WHERE id = $1 AND deleted_at IS NULL
	`

	var record entity.User
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *authRepositoryImpl) FindByEmail(email string) (entity.Auth, error) {
	query := `
		SELECT id, email, password, role 
		FROM akun 
		WHERE email = $1 AND deleted_at IS NULL
	`

	var record entity.Auth
	err := r.DB.Get(&record, query, email)

	return record, err
}
