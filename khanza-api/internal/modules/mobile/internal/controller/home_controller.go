package controller

import (
	"github.com/gofiber/fiber/v2"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/usecase"
)

type HomeController struct {
	UseCase *usecase.HomeUseCase
}

func NewHomeController(useCase *usecase.HomeUseCase) *HomeController {
	return &HomeController{
		UseCase: useCase,
	}
}

func (c *HomeController) GetHome(ctx *fiber.Ctx) error {
	id := ctx.Locals("user").(string)
	tanggal := ctx.Query("tanggal")

	role := ctx.Locals("role").(int)

	if role == 2 {
		response := c.UseCase.GetHomePegawai(id, tanggal)

		return ctx.Status(fiber.StatusOK).JSON(web.Response{
			Code:   fiber.StatusOK,
			Status: "OK",
			Data:   response,
		})
	} else {
		response := c.UseCase.GetHomePegawai(id, tanggal) // Change when get home pasien is ready

		return ctx.Status(fiber.StatusOK).JSON(web.Response{
			Code:   fiber.StatusOK,
			Status: "OK",
			Data:   response,
		})
	}
}
