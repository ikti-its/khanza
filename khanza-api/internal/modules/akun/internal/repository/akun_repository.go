package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/akun/internal/entity"
)

type AkunRepository interface {
	Insert(akun *entity.Akun) error
	Find() ([]entity.Akun, error)
	FindPage(page, size int) ([]entity.Akun, int, error)
	FindById(id uuid.UUID) (entity.Akun, error)
	Update(akun *entity.Akun) error
	Delete(akun *entity.Akun) error
}
