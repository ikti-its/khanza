package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/akun/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/akun/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/akun/internal/repository"
)

type AlamatUseCase struct {
	Repository repository.AlamatRepository
}

func NewAlamatUseCase(repository *repository.AlamatRepository) *AlamatUseCase {
	return &AlamatUseCase{
		Repository: *repository,
	}
}

func (u *AlamatUseCase) Create(request *model.AlamatRequest, user string) model.AlamatResponse {
	updater := helper.MustParse(user)
	alamat := entity.Alamat{
		IdAkun:    helper.MustParse(request.IdAkun),
		Alamat:    request.Alamat,
		AlamatLat: request.AlamatLat,
		AlamatLon: request.AlamatLon,
		Updater:   updater,
	}

	if err := u.Repository.Insert(&alamat); err != nil {
		exception.PanicIfError(err, "Failed to create alamat")
	}

	response := model.AlamatResponse{
		IdAkun:    alamat.IdAkun.String(),
		Alamat:    alamat.Alamat,
		AlamatLat: alamat.AlamatLat,
		AlamatLon: alamat.AlamatLon,
	}

	return response
}

func (u *AlamatUseCase) Get() []model.AlamatResponse {
	alamat, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all alamat")

	response := make([]model.AlamatResponse, len(alamat))
	for i, alamat := range alamat {
		response[i] = model.AlamatResponse{
			IdAkun:    alamat.IdAkun.String(),
			Alamat:    alamat.Alamat,
			AlamatLat: alamat.AlamatLat,
			AlamatLon: alamat.AlamatLon,
		}
	}

	return response
}

func (u *AlamatUseCase) GetPage(page, size int) model.AlamatPageResponse {
	alamat, total, err := u.Repository.FindPage(page, size)
	exception.PanicIfError(err, "Failed to get paged alamat")

	response := make([]model.AlamatResponse, len(alamat))
	for i, alamat := range alamat {
		response[i] = model.AlamatResponse{
			IdAkun:    alamat.IdAkun.String(),
			Alamat:    alamat.Alamat,
			AlamatLat: alamat.AlamatLat,
			AlamatLon: alamat.AlamatLon,
		}
	}

	pagedResponse := model.AlamatPageResponse{
		Page:   page,
		Size:   size,
		Total:  total,
		Alamat: response,
	}

	return pagedResponse
}

func (u *AlamatUseCase) GetById(id string) model.AlamatResponse {
	alamat, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Alamat not found",
		})
	}

	response := model.AlamatResponse{
		IdAkun:    alamat.IdAkun.String(),
		Alamat:    alamat.Alamat,
		AlamatLat: alamat.AlamatLat,
		AlamatLon: alamat.AlamatLon,
	}

	return response
}

func (u *AlamatUseCase) Update(request *model.AlamatRequest, id, user string) model.AlamatResponse {
	alamat, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Alamat not found",
		})
	}

	alamat.IdAkun = helper.MustParse(request.IdAkun)
	alamat.Alamat = request.Alamat
	alamat.AlamatLat = request.AlamatLat
	alamat.AlamatLon = request.AlamatLon
	alamat.Updater = helper.MustParse(user)

	if err := u.Repository.Update(&alamat); err != nil {
		exception.PanicIfError(err, "Failed to update alamat")
	}

	response := model.AlamatResponse{
		IdAkun:    alamat.IdAkun.String(),
		Alamat:    alamat.Alamat,
		AlamatLat: alamat.AlamatLat,
		AlamatLon: alamat.AlamatLon,
	}

	return response
}

func (u *AlamatUseCase) Delete(id, updater string) {
	alamat, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Alamat not found",
		})
	}

	alamat.Updater = helper.MustParse(updater)

	if err := u.Repository.Delete(&alamat); err != nil {
		exception.PanicIfError(err, "Failed to delete alamat")
	}
}
