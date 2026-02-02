package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/organisasi/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/organisasi/internal/usecase"
)

type OrganisasiController struct {
	UseCase   *usecase.OrganisasiUseCase
	Validator *config.Validator
}

func NewOrganisasiController(useCase *usecase.OrganisasiUseCase, validator *config.Validator) *OrganisasiController {
	return &OrganisasiController{
		UseCase:   useCase,
		Validator: validator,
	}
}

func (c *OrganisasiController) Get(ctx *fiber.Ctx) error {
	response := c.UseCase.Get()

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *OrganisasiController) Update(ctx *fiber.Ctx) error {
	var request model.OrganisasiRequest
	id := ctx.Params("id")

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

	response := c.UseCase.Update(&request, id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}
