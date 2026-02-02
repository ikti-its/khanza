package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/repository"
)

type JadwalUseCase struct {
	Repository repository.JadwalRepository
}

func NewJadwalUseCase(repository *repository.JadwalRepository) *JadwalUseCase {
	return &JadwalUseCase{
		Repository: *repository,
	}
}

func (u *JadwalUseCase) Get() []model.JadwalResponse {
	jadwal, err := u.Repository.Find()
	if err != nil {
		exception.PanicIfError(err, "Failed to get jadwal")
	}

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

func (u *JadwalUseCase) GetPage(page, size int) model.JadwalPageResponse {
	jadwal, total, err := u.Repository.FindPage(page, size)
	if err != nil {
		exception.PanicIfError(err, "Failed to get paged jadwal")
	}

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

	pagedResponse := model.JadwalPageResponse{
		Page:   page,
		Size:   size,
		Total:  total,
		Jadwal: response,
	}

	return pagedResponse
}

func (u *JadwalUseCase) GetByHariId(id int) []model.JadwalResponse {
	jadwal, err := u.Repository.FindByHariId(id)
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Jadwal not found",
		})
	}

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

func (u *JadwalUseCase) GetByPegawaiId(id string) []model.JadwalResponse {
	jadwal, err := u.Repository.FindByPegawaiId(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Jadwal not found",
		})
	}

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

func (u *JadwalUseCase) GetById(id string) model.JadwalResponse {
	jadwal, err := u.Repository.FindById(helper.MustParse(id))
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

func (u *JadwalUseCase) Update(request *model.UpdateJadwalRequest, id, user string) model.JadwalResponse {
	jadwal, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Jadwal not found",
		})
	}

	jadwal.Id = helper.MustParse(id)
	jadwal.IdPegawai = helper.MustParse(request.IdPegawai)
	jadwal.IdHari = request.IdHari
	jadwal.IdShift = request.IdShift
	jadwal.Updater = helper.MustParse(user)

	if err := u.Repository.Update(&jadwal); err != nil {
		exception.PanicIfError(err, "Failed to update jadwal")
	}

	response := model.JadwalResponse{
		Id:        jadwal.Id.String(),
		IdPegawai: jadwal.IdPegawai.String(),
		IdHari:    jadwal.IdHari,
		IdShift:   jadwal.IdShift,
	}

	return response
}
