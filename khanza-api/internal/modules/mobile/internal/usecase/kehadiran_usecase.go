package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/repository"
)

type KehadiranUseCase struct {
	Repository repository.KehadiranRepository
}

func NewKehadiranUseCase(repository *repository.KehadiranRepository) *KehadiranUseCase {
	return &KehadiranUseCase{
		Repository: *repository,
	}
}

func (u *KehadiranUseCase) GetByPegawaiId(id string) model.StatusKehadiranResponse {
	kehadiran, err := u.Repository.FindByPegawaiId(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Kehadiran not found",
		})
	}

	response := model.StatusKehadiranResponse{
		Id:        kehadiran.Id.String(),
		IdPegawai: kehadiran.IdPegawai.String(),
	}

	return response
}
