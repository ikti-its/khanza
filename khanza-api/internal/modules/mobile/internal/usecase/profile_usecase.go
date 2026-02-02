package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/repository"
)

type ProfileUseCase struct {
	Repository repository.ProfileRepository
}

func NewProfileUseCase(repository *repository.ProfileRepository) *ProfileUseCase {
	return &ProfileUseCase{
		Repository: *repository,
	}
}

func (u *ProfileUseCase) Update(request *model.ProfileRequest, id, user string) model.ProfileResponse {
	profile, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Profile not found",
		})
	}

	profile.Foto = request.Foto
	profile.Email = request.Email

	encrypted, err := helper.EncryptPassword(request.Password)
	exception.PanicIfError(err, "Failed to encrypt password")

	profile.Password = string(encrypted)

	profile.Telepon = request.Telepon
	profile.Alamat = request.Alamat
	profile.AlamatLat = request.AlamatLat
	profile.AlamatLon = request.AlamatLon
	profile.Updater = helper.MustParse(user)

	if err := u.Repository.Update(&profile); err != nil {
		exception.PanicIfError(err, "Failed to update profile")
	}

	response := model.ProfileResponse{
		Akun:      profile.Akun.String(),
		Foto:      profile.Foto,
		Email:     profile.Email,
		Telepon:   profile.Telepon,
		Alamat:    profile.Alamat,
		AlamatLat: profile.AlamatLat,
		AlamatLon: profile.AlamatLon,
	}

	return response
}
