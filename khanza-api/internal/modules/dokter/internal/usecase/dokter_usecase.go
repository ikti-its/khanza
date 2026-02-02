package usecase

import (
	"github.com/ikti-its/khanza-api/internal/modules/dokter/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/dokter/internal/repository"
)

type DokterUseCase struct {
	Repo repository.DokterRepository
}

func NewDokterUseCase(r repository.DokterRepository) *DokterUseCase {
	return &DokterUseCase{Repo: r}
}

func (u *DokterUseCase) GetByKode(kode string) (*entity.Dokter, error) {
	return u.Repo.FindByKode(kode)
}

func (u *DokterUseCase) GetAll() ([]entity.Dokter, error) {
	return u.Repo.GetAll()
}
