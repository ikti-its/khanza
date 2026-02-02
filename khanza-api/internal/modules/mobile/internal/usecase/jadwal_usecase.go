package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/repository"
)

type JadwalUseCase struct {
	Repository repository.JadwalRepository
}

func NewJadwalUseCase(repository *repository.JadwalRepository) *JadwalUseCase {
	return &JadwalUseCase{
		Repository: *repository,
	}
}

func (u *JadwalUseCase) Get(hari int) []model.JadwalResponse {
	jadwal, err := u.Repository.Find(hari)
	exception.PanicIfError(err, "Failed to get all jadwal")

	response := make([]model.JadwalResponse, len(jadwal))
	for i, jadwal := range jadwal {
		response[i] = model.JadwalResponse{
			Id:        jadwal.Id.String(),
			IdPegawai: jadwal.IdPegawai.String(),
			IdHari:    jadwal.IdHari,
			IdShift:   jadwal.IdShift,
			JamMasuk:  helper.FormatTime(jadwal.JamMasuk, "15:04:05"),
			JamPulang: helper.FormatTime(jadwal.JamPulang, "15:04:05"),
		}
	}

	return response
}

func (u *JadwalUseCase) GetByPegawaiId(id string, hari int) model.JadwalResponse {
	jadwal, err := u.Repository.FindByPegawaiId(helper.MustParse(id), hari)
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Jadwal not found",
		})
	}

	response := model.JadwalResponse{
		Id:        jadwal.Id.String(),
		IdPegawai: jadwal.IdPegawai.String(),
		IdHari:    jadwal.IdHari,
		IdShift:   jadwal.IdShift,
		JamMasuk:  helper.FormatTime(jadwal.JamMasuk, "15:04:05"),
		JamPulang: helper.FormatTime(jadwal.JamPulang, "15:04:05"),
	}

	return response
}
