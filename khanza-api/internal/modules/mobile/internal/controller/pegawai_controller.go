package controller

import (
	"github.com/gofiber/fiber/v2"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/usecase"
)

type PegawaiController struct {
	UseCase *usecase.PegawaiUseCase
}

func NewPegawaiController(useCase *usecase.PegawaiUseCase) *PegawaiController {
	return &PegawaiController{
		UseCase: useCase,
	}
}

func (c *PegawaiController) GetById(ctx *fiber.Ctx) error {
	id := ctx.Locals("user").(string)

	response := c.UseCase.GetById(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}
