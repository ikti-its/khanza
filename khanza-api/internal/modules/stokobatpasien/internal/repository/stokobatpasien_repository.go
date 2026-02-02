package repository

import (
	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/entity"
)

type StokObatPasienRepository interface {
	Insert(data *entity.StokObatPasien) error
	FindAll() ([]entity.StokObatPasien, error)
	FindByNoPermintaan(noPermintaan string) ([]entity.StokObatPasien, error)
	Update(data *entity.StokObatPasien) error
	DeleteByNoPermintaan(noPermintaan string) error
	GetByNomorRawat(nomorRawat string) ([]entity.StokObatPasien, error)
}
