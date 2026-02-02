package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/repository"
)

type KehadiranUseCase struct {
	Repository repository.KehadiranRepository
}

func NewKehadiranUseCase(repository *repository.KehadiranRepository) *KehadiranUseCase {
	return &KehadiranUseCase{
		Repository: *repository,
	}
}

func (u *KehadiranUseCase) Attend(request *model.AttendKehadiranRequest, updater string) model.KehadiranResponse {
	limit, err := u.Repository.FindByPegawaiTanggal(helper.MustParse(request.IdPegawai), request.Tanggal)
	if err != nil {
		exception.PanicIfError(err, "Failed to get kehadiran")
	}

	if limit >= 3 {
		panic(&exception.ForbiddenError{
			Message: "Reached maximum allowed attendance",
		})
	}

	kehadiran := entity.Kehadiran{
		Id:              helper.MustNew(),
		IdPegawai:       helper.MustParse(request.IdPegawai),
		IdJadwalPegawai: helper.MustParse(request.IdJadwalPegawai),
		Tanggal:         helper.ParseTime(request.Tanggal, "2006-01-02"),
		JamMasuk:        helper.ParseNow(),
		Keterangan:      request.Keterangan,
		Foto:            request.Foto,
		Updater:         helper.MustParse(updater),
	}

	err = u.Repository.Insert(&kehadiran)
	if err != nil {
		exception.PanicIfError(err, "Failed to attend kehadiran")
	}

	response := model.KehadiranResponse{
		Id:        kehadiran.Id.String(),
		IdPegawai: kehadiran.IdPegawai.String(),
		Tanggal:   kehadiran.Tanggal.Format("2006-01-02"),
		JamMasuk:  helper.FormatTime(kehadiran.JamMasuk, "15:04:05 +07:00"),
		Foto:      kehadiran.Foto,
	}

	return response
}

func (u *KehadiranUseCase) AttendByKode(request *model.AttendKehadiranRequest, kode, updater string) model.KehadiranResponse {
	pin, err := u.Repository.FindKode(request.Tanggal)
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Kode presensi not found",
		})
	}

	if kode != pin.Kode {
		panic(&exception.UnauthorizedError{
			Message: "Invalid pin",
		})
	}

	limit, err := u.Repository.FindByPegawaiTanggal(helper.MustParse(request.IdPegawai), request.Tanggal)
	if err != nil {
		exception.PanicIfError(err, "Failed to get kehadiran")
	}

	if limit >= 3 {
		panic(&exception.ForbiddenError{
			Message: "Reached maximum allowed attendance",
		})
	}

	kehadiran := entity.Kehadiran{
		Id:              helper.MustNew(),
		IdPegawai:       helper.MustParse(request.IdPegawai),
		IdJadwalPegawai: helper.MustParse(request.IdJadwalPegawai),
		Tanggal:         helper.ParseTime(request.Tanggal, "2006-01-02"),
		JamMasuk:        helper.ParseNow(),
		Keterangan:      request.Keterangan,
		Foto:            request.Foto,
		Updater:         helper.MustParse(updater),
	}

	err = u.Repository.Insert(&kehadiran)
	if err != nil {
		exception.PanicIfError(err, "Failed to attend kehadiran")
	}

	response := model.KehadiranResponse{
		Id:        kehadiran.Id.String(),
		IdPegawai: kehadiran.IdPegawai.String(),
		Tanggal:   kehadiran.Tanggal.Format("2006-01-02"),
		JamMasuk:  helper.FormatTime(kehadiran.JamMasuk, "15:04:05 +07:00"),
		Foto:      kehadiran.Foto,
	}

	return response
}

func (u *KehadiranUseCase) Leave(request *model.LeaveKehadiranRequest, emergency bool, updater string) model.KehadiranResponse {
	kehadiran, err := u.Repository.FindById(helper.MustParse(request.Id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Kehadiran not found",
		})
	}

	kehadiran.JamPulang.Time = helper.ParseNow()
	kehadiran.JamPulang.Valid = true
	kehadiran.Updater = helper.MustParse(updater)

	err = u.Repository.Update(&kehadiran, emergency)
	if err != nil {
		exception.PanicIfError(err, "Failed to leave kehadiran")
	}

	response := model.KehadiranResponse{
		Id:         kehadiran.Id.String(),
		IdPegawai:  kehadiran.IdPegawai.String(),
		Tanggal:    kehadiran.Tanggal.Format("2006-01-02"),
		JamMasuk:   helper.FormatTime(kehadiran.JamMasuk, "15:04:05 +07:00"),
		JamPulang:  helper.FormatTime(kehadiran.JamPulang.Time, "15:04:05 +07:00"),
		Keterangan: kehadiran.Keterangan,
		Foto:       kehadiran.Foto,
	}

	return response
}

func (u *KehadiranUseCase) Get() []model.KehadiranResponse {
	kehadiran, err := u.Repository.Find()
	if err != nil {
		exception.PanicIfError(err, "Failed to get kehadiran")
	}

	response := make([]model.KehadiranResponse, len(kehadiran))
	for i, kehadiran := range kehadiran {
		if kehadiran.JamPulang.Valid {
			response[i] = model.KehadiranResponse{
				Id:         kehadiran.Id.String(),
				IdPegawai:  kehadiran.IdPegawai.String(),
				Tanggal:    kehadiran.Tanggal.Format("2006-01-02"),
				JamMasuk:   helper.FormatTime(kehadiran.JamMasuk, "15:04:05 +07:00"),
				JamPulang:  helper.FormatTime(kehadiran.JamPulang.Time, "15:04:05 +07:00"),
				Keterangan: kehadiran.Keterangan,
				Foto:       kehadiran.Foto,
			}
		} else {
			response[i] = model.KehadiranResponse{
				Id:        kehadiran.Id.String(),
				IdPegawai: kehadiran.IdPegawai.String(),
				Tanggal:   kehadiran.Tanggal.Format("2006-01-02"),
				JamMasuk:  helper.FormatTime(kehadiran.JamMasuk, "15:04:05 +07:00"),
				Foto:      kehadiran.Foto,
			}
		}
	}

	return response
}

func (u *KehadiranUseCase) GetPage(page, size int) model.KehadiranPageResponse {
	kehadiran, total, err := u.Repository.FindPage(page, size)
	if err != nil {
		exception.PanicIfError(err, "Failed to get paged kehadiran")
	}

	response := make([]model.KehadiranResponse, len(kehadiran))
	for i, kehadiran := range kehadiran {
		if kehadiran.JamPulang.Valid {
			response[i] = model.KehadiranResponse{
				Id:         kehadiran.Id.String(),
				IdPegawai:  kehadiran.IdPegawai.String(),
				Tanggal:    kehadiran.Tanggal.Format("2006-01-02"),
				JamMasuk:   helper.FormatTime(kehadiran.JamMasuk, "15:04:05 +07:00"),
				JamPulang:  helper.FormatTime(kehadiran.JamPulang.Time, "15:04:05 +07:00"),
				Keterangan: kehadiran.Keterangan,
				Foto:       kehadiran.Foto,
			}
		} else {
			response[i] = model.KehadiranResponse{
				Id:        kehadiran.Id.String(),
				IdPegawai: kehadiran.IdPegawai.String(),
				Tanggal:   kehadiran.Tanggal.Format("2006-01-02"),
				JamMasuk:  helper.FormatTime(kehadiran.JamMasuk, "15:04:05 +07:00"),
				Foto:      kehadiran.Foto,
			}
		}
	}

	pagedResponse := model.KehadiranPageResponse{
		Page:      page,
		Size:      size,
		Total:     total,
		Kehadiran: response,
	}

	return pagedResponse
}

func (u *KehadiranUseCase) GetById(id string) model.KehadiranResponse {
	kehadiran, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Kehadiran not found",
		})
	}

	if kehadiran.JamPulang.Valid {
		response := model.KehadiranResponse{
			Id:         kehadiran.Id.String(),
			IdPegawai:  kehadiran.IdPegawai.String(),
			Tanggal:    kehadiran.Tanggal.Format("2006-01-02"),
			JamMasuk:   helper.FormatTime(kehadiran.JamMasuk, "15:04:05 +07:00"),
			JamPulang:  helper.FormatTime(kehadiran.JamPulang.Time, "15:04:05 +07:00"),
			Keterangan: kehadiran.Keterangan,
			Foto:       kehadiran.Foto,
		}

		return response
	} else {
		response := model.KehadiranResponse{
			Id:        kehadiran.Id.String(),
			IdPegawai: kehadiran.IdPegawai.String(),
			Tanggal:   kehadiran.Tanggal.Format("2006-01-02"),
			JamMasuk:  helper.FormatTime(kehadiran.JamMasuk, "15:04:05 +07:00"),
			Foto:      kehadiran.Foto,
		}

		return response
	}
}

func (u *KehadiranUseCase) GetByPegawaiId(id string) []model.KehadiranResponse {
	kehadiran, err := u.Repository.FindByPegawaiId(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Kehadiran not found",
		})
	}

	response := make([]model.KehadiranResponse, len(kehadiran))
	for i, kehadiran := range kehadiran {
		if kehadiran.JamPulang.Valid {
			response[i] = model.KehadiranResponse{
				Id:         kehadiran.Id.String(),
				IdPegawai:  kehadiran.IdPegawai.String(),
				Tanggal:    kehadiran.Tanggal.Format("2006-01-02"),
				JamMasuk:   helper.FormatTime(kehadiran.JamMasuk, "15:04:05 +07:00"),
				JamPulang:  helper.FormatTime(kehadiran.JamPulang.Time, "15:04:05 +07:00"),
				Keterangan: kehadiran.Keterangan,
				Foto:       kehadiran.Foto,
			}
		} else {
			response[i] = model.KehadiranResponse{
				Id:        kehadiran.Id.String(),
				IdPegawai: kehadiran.IdPegawai.String(),
				Tanggal:   kehadiran.Tanggal.Format("2006-01-02"),
				JamMasuk:  helper.FormatTime(kehadiran.JamMasuk, "15:04:05 +07:00"),
				Foto:      kehadiran.Foto,
			}
		}
	}

	return response
}

func (u *KehadiranUseCase) GetByTanggal(tanggal string) []model.KehadiranResponse {
	kehadiran, err := u.Repository.FindByTanggal(tanggal)
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Kehadiran not found",
		})
	}

	response := make([]model.KehadiranResponse, len(kehadiran))
	for i, kehadiran := range kehadiran {
		if kehadiran.JamPulang.Valid {
			response[i] = model.KehadiranResponse{
				Id:         kehadiran.Id.String(),
				IdPegawai:  kehadiran.IdPegawai.String(),
				Tanggal:    kehadiran.Tanggal.Format("2006-01-02"),
				JamMasuk:   helper.FormatTime(kehadiran.JamMasuk, "15:04:05 +07:00"),
				JamPulang:  helper.FormatTime(kehadiran.JamPulang.Time, "15:04:05 +07:00"),
				Keterangan: kehadiran.Keterangan,
				Foto:       kehadiran.Foto,
			}
		} else {
			response[i] = model.KehadiranResponse{
				Id:        kehadiran.Id.String(),
				IdPegawai: kehadiran.IdPegawai.String(),
				Tanggal:   kehadiran.Tanggal.Format("2006-01-02"),
				JamMasuk:  helper.FormatTime(kehadiran.JamMasuk, "15:04:05 +07:00"),
				Foto:      kehadiran.Foto,
			}
		}
	}

	return response
}
