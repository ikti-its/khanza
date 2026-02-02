package controller

import (
	"github.com/gofiber/fiber/v2"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/usecase"
)

type JadwalController struct {
	UseCase *usecase.JadwalUseCase
}

func NewJadwalController(useCase *usecase.JadwalUseCase) *JadwalController {
	return &JadwalController{
		UseCase: useCase,
	}
}

func (c *JadwalController) Get(ctx *fiber.Ctx) error {
	hari := ctx.QueryInt("hari")

	response := c.UseCase.Get(hari)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *JadwalController) GetByPegawaiId(ctx *fiber.Ctx) error {
	id := ctx.Params("id")
	hari := ctx.QueryInt("hari")

	response := c.UseCase.GetByPegawaiId(id, hari)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}
