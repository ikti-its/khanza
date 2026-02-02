package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/auth/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/auth/internal/repository"
)

type AuthUseCase struct {
	Repository repository.AuthRepository
	Config     *config.Config
}

func NewAuthUseCase(repository *repository.AuthRepository, cfg *config.Config) *AuthUseCase {
	return &AuthUseCase{
		Repository: *repository,
		Config:     cfg,
	}
}

func (u *AuthUseCase) Refresh(id string, role int) model.AuthResponse {
	token, err := helper.GenerateJWT(helper.MustParse(id), role, u.Config)
	exception.PanicIfError(err, "Failed to generate JWT")

	response := model.AuthResponse{
		Token: token,
	}

	return response
}

func (u *AuthUseCase) GetUser(id string) model.UserResponse {
	user, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "User not found",
		})
	}

	response := model.UserResponse{
		Id:    user.Id.String(),
		Email: user.Email,
		Foto:  user.Foto,
		Role:  user.Role,
	}

	return response
}

func (u *AuthUseCase) Login(request *model.AuthRequest) model.AuthResponse {
	akun, err := u.Repository.FindByEmail(request.Email)
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Akun not found",
		})
	}

	if !helper.DecryptPassword(akun.Password, request.Password) {
		panic(&exception.UnauthorizedError{
			Message: "Invalid password",
		})
	}

	token, err := helper.GenerateJWT(akun.Id, akun.Role, u.Config)
	exception.PanicIfError(err, "Failed to generate JWT")

	response := model.AuthResponse{
		Token: token,
	}

	return response
}
