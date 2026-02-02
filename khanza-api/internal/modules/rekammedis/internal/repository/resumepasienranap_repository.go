package repository

import "github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/entity"

type ResumePasienRanapRepository interface {
	Insert(resume *entity.ResumePasienRanap) error
	FindAll() ([]entity.ResumePasienRanap, error)
	FindByNoRawat(noRawat string) (*entity.ResumePasienRanap, error)
	Update(resume *entity.ResumePasienRanap) error
	Delete(noRawat string) error
}
