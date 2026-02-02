package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/usecase"
)

type ProfileController struct {
	UseCase   *usecase.ProfileUseCase
	Validator *config.Validator
}

func NewProfileController(useCase *usecase.ProfileUseCase, validator *config.Validator) *ProfileController {
	return &ProfileController{
		UseCase:   useCase,
		Validator: validator,
	}
}

func (c *ProfileController) Update(ctx *fiber.Ctx) error {
	var request model.ProfileRequest
	id := ctx.Params("id")

	middleware.AuthorizeUserAkun(id)

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid request body",
		})
	}

	if err := c.Validator.Validate(&request); err != nil {
		message := c.Validator.Message(err)
		panic(&exception.BadRequestError{
			Message: message,
		})
	}

	updater := ctx.Locals("user").(string)
	response := c.UseCase.Update(&request, id, updater)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}
