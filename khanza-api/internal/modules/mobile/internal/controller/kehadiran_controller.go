package controller

import (
	"github.com/gofiber/fiber/v2"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/usecase"
)

type KehadiranController struct {
	UseCase *usecase.KehadiranUseCase
}

func NewKehadiranController(useCase *usecase.KehadiranUseCase) *KehadiranController {
	return &KehadiranController{
		UseCase: useCase,
	}
}

func (c *KehadiranController) GetByPegawaiId(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	response := c.UseCase.GetByPegawaiId(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}
