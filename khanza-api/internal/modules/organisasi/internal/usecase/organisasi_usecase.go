package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/organisasi/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/organisasi/internal/repository"
)

type OrganisasiUseCase struct {
	Repository repository.OrganisasiRepository
}

func NewOrganisasiUseCase(repository *repository.OrganisasiRepository) *OrganisasiUseCase {
	return &OrganisasiUseCase{
		Repository: *repository,
	}
}

func (u *OrganisasiUseCase) Get() model.OrganisasiResponse {
	organisasi, err := u.Repository.Find()
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Organisasi not found",
		})
	}

	response := model.OrganisasiResponse{
		Id:        organisasi.Id.String(),
		Nama:      organisasi.Nama,
		Alamat:    organisasi.Alamat,
		Latitude:  organisasi.Latitude,
		Longitude: organisasi.Longitude,
		Radius:    organisasi.Radius,
	}

	return response
}

func (u *OrganisasiUseCase) Update(request *model.OrganisasiRequest, id string) model.OrganisasiResponse {
	organisasi, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Organisasi not found",
		})
	}

	organisasi.Nama = request.Nama
	organisasi.Alamat = request.Alamat
	organisasi.Latitude = request.Latitude
	organisasi.Longitude = request.Longitude
	organisasi.Radius = request.Radius

	if err := u.Repository.Update(&organisasi); err != nil {
		exception.PanicIfError(err, "Failed to update organisasi")
	}

	response := model.OrganisasiResponse{
		Id:        organisasi.Id.String(),
		Nama:      organisasi.Nama,
		Alamat:    organisasi.Alamat,
		Latitude:  organisasi.Latitude,
		Longitude: organisasi.Longitude,
		Radius:    organisasi.Radius,
	}

	return response
}
