package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/repository"
)

type CutiUseCase struct {
	Repository repository.CutiRepository
}

func NewCutiUseCase(repository *repository.CutiRepository) *CutiUseCase {
	return &CutiUseCase{
		Repository: *repository,
	}
}

func (u *CutiUseCase) Create(request *model.CutiRequest, updater string) model.CutiResponse {
	if request.Status != "Diproses" {
		panic(&exception.BadRequestError{
			Message: "Pengajuan cuti harus diproses terlebih dahulu",
		})
	}

	cuti := entity.Cuti{
		Id:             helper.MustNew(),
		IdPegawai:      helper.MustParse(request.IdPegawai),
		TanggalMulai:   helper.ParseTime(request.TanggalMulai, "2006-01-02"),
		TanggalSelesai: helper.ParseTime(request.TanggalSelesai, "2006-01-02"),
		IdAlasan:       request.IdAlasan,
		Status:         request.Status,
		Updater:        helper.MustParse(updater),
	}

	if err := u.Repository.Insert(&cuti); err != nil {
		exception.PanicIfError(err, "Failed to insert cuti")
	}

	response := model.CutiResponse{
		Id:             cuti.Id.String(),
		IdPegawai:      cuti.IdPegawai.String(),
		TanggalMulai:   helper.FormatTime(cuti.TanggalMulai, "2006-01-02"),
		TanggalSelesai: helper.FormatTime(cuti.TanggalSelesai, "2006-01-02"),
		IdAlasan:       cuti.IdAlasan,
		Status:         cuti.Status,
	}

	return response
}

func (u *CutiUseCase) Get() []model.CutiResponse {
	cuti, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all cuti")

	response := make([]model.CutiResponse, len(cuti))
	for i, cuti := range cuti {
		response[i] = model.CutiResponse{
			Id:             cuti.Id.String(),
			IdPegawai:      cuti.IdPegawai.String(),
			TanggalMulai:   helper.FormatTime(cuti.TanggalMulai, "2006-01-02"),
			TanggalSelesai: helper.FormatTime(cuti.TanggalSelesai, "2006-01-02"),
			IdAlasan:       cuti.IdAlasan,
			Status:         cuti.Status,
		}
	}

	return response
}

func (u *CutiUseCase) GetPage(page, size int) model.CutiPageResponse {
	cuti, total, err := u.Repository.FindPage(page, size)
	if err != nil {
		exception.PanicIfError(err, "Failed to get paged cuti")
	}

	response := make([]model.CutiResponse, len(cuti))
	for i, cuti := range cuti {
		response[i] = model.CutiResponse{
			Id:             cuti.Id.String(),
			IdPegawai:      cuti.IdPegawai.String(),
			TanggalMulai:   helper.FormatTime(cuti.TanggalMulai, "2006-01-02"),
			TanggalSelesai: helper.FormatTime(cuti.TanggalSelesai, "2006-01-02"),
			IdAlasan:       cuti.IdAlasan,
			Status:         cuti.Status,
		}
	}

	pagedResponse := model.CutiPageResponse{
		Page:  page,
		Size:  size,
		Total: total,
		Cuti:  response,
	}

	return pagedResponse
}

func (u *CutiUseCase) GetById(id string) model.CutiResponse {
	cuti, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Cuti not found",
		})
	}

	response := model.CutiResponse{
		Id:             cuti.Id.String(),
		IdPegawai:      cuti.IdPegawai.String(),
		TanggalMulai:   helper.FormatTime(cuti.TanggalMulai, "2006-01-02"),
		TanggalSelesai: helper.FormatTime(cuti.TanggalSelesai, "2006-01-02"),
		IdAlasan:       cuti.IdAlasan,
		Status:         cuti.Status,
	}

	return response
}

func (u *CutiUseCase) GetByPegawaiId(id string) []model.CutiResponse {
	cuti, err := u.Repository.FindByPegawaiId(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Cuti not found",
		})
	}

	response := make([]model.CutiResponse, len(cuti))
	for i, cuti := range cuti {
		response[i] = model.CutiResponse{
			Id:             cuti.Id.String(),
			IdPegawai:      cuti.IdPegawai.String(),
			TanggalMulai:   helper.FormatTime(cuti.TanggalMulai, "2006-01-02"),
			TanggalSelesai: helper.FormatTime(cuti.TanggalSelesai, "2006-01-02"),
			IdAlasan:       cuti.IdAlasan,
			Status:         cuti.Status,
		}
	}

	return response

}

func (u *CutiUseCase) Update(id string, request *model.CutiRequest, updater string) model.CutiResponse {
	cuti, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Cuti not found",
		})
	}

	cuti.IdPegawai = helper.MustParse(request.IdPegawai)
	cuti.TanggalMulai = helper.ParseTime(request.TanggalMulai, "2006-01-02")
	cuti.TanggalSelesai = helper.ParseTime(request.TanggalSelesai, "2006-01-02")
	cuti.IdAlasan = request.IdAlasan
	cuti.Status = request.Status
	cuti.Updater = helper.MustParse(updater)

	if err := u.Repository.Update(&cuti); err != nil {
		exception.PanicIfError(err, "Failed to update cuti")
	}

	response := model.CutiResponse{
		Id:             cuti.Id.String(),
		IdPegawai:      cuti.IdPegawai.String(),
		TanggalMulai:   helper.FormatTime(cuti.TanggalMulai, "2006-01-02"),
		TanggalSelesai: helper.FormatTime(cuti.TanggalSelesai, "2006-01-02"),
		IdAlasan:       cuti.IdAlasan,
		Status:         cuti.Status,
	}

	return response
}

func (u *CutiUseCase) Delete(id, updater string) {
	cuti, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Cuti not found",
		})
	}

	cuti.Updater = helper.MustParse(updater)

	if err := u.Repository.Delete(&cuti); err != nil {
		exception.PanicIfError(err, "Failed to delete cuti")
	}
}
