package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/repository"
)

type FotoUseCase struct {
	Repository repository.FotoRepository
}

func NewFotoUseCase(repository *repository.FotoRepository) *FotoUseCase {
	return &FotoUseCase{
		Repository: *repository,
	}
}

func (u *FotoUseCase) Create(request *model.FotoRequest, user string) model.FotoResponse {
	updater := helper.MustParse(user)
	foto := entity.Foto{
		IdPegawai: helper.MustParse(request.IdPegawai),
		Foto:      request.Foto,
		Updater:   updater,
	}

	if err := u.Repository.Insert(&foto); err != nil {
		exception.PanicIfError(err, "Failed to create foto")
	}

	response := model.FotoResponse{
		IdPegawai: foto.IdPegawai.String(),
		Foto:      foto.Foto,
	}

	return response
}

func (u *FotoUseCase) Get() []model.FotoResponse {
	foto, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all foto")

	response := make([]model.FotoResponse, len(foto))
	for i, foto := range foto {
		response[i] = model.FotoResponse{
			IdPegawai: foto.IdPegawai.String(),
			Foto:      foto.Foto,
		}
	}

	return response
}

func (u *FotoUseCase) GetPage(page, size int) model.FotoPageResponse {
	foto, total, err := u.Repository.FindPage(page, size)
	exception.PanicIfError(err, "Failed to get paged foto")

	response := make([]model.FotoResponse, len(foto))
	for i, foto := range foto {
		response[i] = model.FotoResponse{
			IdPegawai: foto.IdPegawai.String(),
			Foto:      foto.Foto,
		}
	}

	pagedResponse := model.FotoPageResponse{
		Page:  page,
		Size:  size,
		Total: total,
		Foto:  response,
	}

	return pagedResponse
}

func (u *FotoUseCase) GetAkunId(id string) string {
	akunId, err := u.Repository.FindAkunIdById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Akun not found",
		})
	}

	return akunId.String()
}

func (u *FotoUseCase) GetById(id string) model.FotoResponse {
	foto, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Foto not found",
		})
	}

	response := model.FotoResponse{
		IdPegawai: foto.IdPegawai.String(),
		Foto:      foto.Foto,
	}

	return response
}

func (u *FotoUseCase) Update(request *model.FotoRequest, id, user string) model.FotoResponse {
	foto, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Foto not found",
		})
	}

	foto.IdPegawai = helper.MustParse(request.IdPegawai)
	foto.Foto = request.Foto
	foto.Updater = helper.MustParse(user)

	if err := u.Repository.Update(&foto); err != nil {
		exception.PanicIfError(err, "Failed to update foto")
	}

	response := model.FotoResponse{
		IdPegawai: foto.IdPegawai.String(),
		Foto:      foto.Foto,
	}

	return response
}

func (u *FotoUseCase) Delete(id, updater string) {
	foto, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Foto not found",
		})
	}

	foto.Updater = helper.MustParse(updater)

	if err := u.Repository.Delete(&foto); err != nil {
		exception.PanicIfError(err, "Failed to delete foto")
	}
}
