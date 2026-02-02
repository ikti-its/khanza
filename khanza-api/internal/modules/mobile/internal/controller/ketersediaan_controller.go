package controller

import (
	"github.com/gofiber/fiber/v2"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/usecase"
)

type KetersediaanController struct {
	UseCase *usecase.KetersediaanUseCase
}

func NewKetersediaanController(useCase *usecase.KetersediaanUseCase) *KetersediaanController {
	return &KetersediaanController{
		UseCase: useCase,
	}
}

func (c *KetersediaanController) Get(ctx *fiber.Ctx) error {
	tanggal := ctx.Query("tanggal")
	page := ctx.QueryInt("page")
	size := ctx.QueryInt("size")

	if size < 5 {
		size = 5
	}

	if page < 1 {
		response := c.UseCase.Get(tanggal)

		return ctx.Status(fiber.StatusOK).JSON(web.Response{
			Code:   fiber.StatusOK,
			Status: "OK",
			Data:   response,
		})
	} else {
		response := c.UseCase.GetPage(page, size, tanggal)

		return ctx.Status(fiber.StatusOK).JSON(web.Response{
			Code:   fiber.StatusOK,
			Status: "OK",
			Data:   response,
		})
	}
}
