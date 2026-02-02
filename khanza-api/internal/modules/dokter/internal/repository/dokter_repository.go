package repository

import "github.com/ikti-its/khanza-api/internal/modules/dokter/internal/entity"

type DokterRepository interface {
	FindByKode(kode string) (*entity.Dokter, error)
	GetAll() ([]entity.Dokter, error)
}
