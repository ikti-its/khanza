package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/dokter/internal/usecase"
)

type DokterController struct {
	UseCase *usecase.DokterUseCase
}

func NewDokterController(uc *usecase.DokterUseCase) *DokterController {
	return &DokterController{UseCase: uc}
}

func (c *DokterController) GetByKodeDokter(ctx *fiber.Ctx) error {
	kd := ctx.Params("kd_dokter")
	data, err := c.UseCase.GetByKode(kd)
	if err != nil {
		return ctx.Status(fiber.StatusNotFound).JSON(fiber.Map{
			"code":   404,
			"status": "Not Found",
			"data":   err.Error(),
		})
	}
	return ctx.JSON(fiber.Map{
		"code":   200,
		"status": "OK",
		"data":   data,
	})
}

func (c *DokterController) GetAll(ctx *fiber.Ctx) error {
	result, err := c.UseCase.GetAll()
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"status": "error",
			"data":   err.Error(),
		})
	}

	return ctx.Status(fiber.StatusOK).JSON(fiber.Map{
		"status": "success",
		"data":   result,
	})
}
