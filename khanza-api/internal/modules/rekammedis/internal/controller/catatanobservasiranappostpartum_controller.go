package controller

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/usecase"
)

type CatatanObservasiRanapPostpartumController struct {
	UseCase *usecase.CatatanObservasiRanapPostpartumUseCase
}

func NewCatatanObservasiRanapPostpartumController(useCase *usecase.CatatanObservasiRanapPostpartumUseCase) *CatatanObservasiRanapPostpartumController {
	return &CatatanObservasiRanapPostpartumController{UseCase: useCase}
}

func (c *CatatanObservasiRanapPostpartumController) Create(ctx *fiber.Ctx) error {
	var request model.CatatanObservasiRanapPostpartumRequest
	fmt.Println("📥 Received POST /catatan-observasi-ranap-postpartum")

	if err := ctx.BodyParser(&request); err != nil {
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "Invalid request body",
		})
	}

	response, err := c.UseCase.Create(ctx, &request)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *CatatanObservasiRanapPostpartumController) GetAll(ctx *fiber.Ctx) error {
	response, err := c.UseCase.GetAll()
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}
	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *CatatanObservasiRanapPostpartumController) GetByNoRawat(ctx *fiber.Ctx) error {
	noRawat := ctx.Params("no_rawat")

	if noRawat == "" {
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "Missing no_rawat parameter",
		})
	}

	response, err := c.UseCase.GetByNoRawat(noRawat)
	if err != nil {
		return ctx.Status(fiber.StatusNotFound).JSON(web.Response{
			Code:   fiber.StatusNotFound,
			Status: "Not Found",
			Data:   err.Error(),
		})
	}

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *CatatanObservasiRanapPostpartumController) Update(ctx *fiber.Ctx) error {
	noRawat := ctx.Params("no_rawat")
	if noRawat == "" {
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "Nomor rawat is required",
		})
	}

	var request model.CatatanObservasiRanapPostpartumRequest
	if err := ctx.BodyParser(&request); err != nil {
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "Invalid request body",
		})
	}

	// Set no_rawat from route param
	request.NoRawat = noRawat

	if err := c.UseCase.Update(ctx, &request); err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   "Record successfully updated",
	})
}

func (c *CatatanObservasiRanapPostpartumController) Delete(ctx *fiber.Ctx) error {
	noRawat := ctx.Params("no_rawat")
	tanggal := ctx.Query("tanggal")
	jam := ctx.Query("jam")

	if noRawat == "" || tanggal == "" || jam == "" {
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "Missing one or more required query parameters: no_rawat, tanggal, jam",
		})
	}

	err := c.UseCase.Delete(ctx, noRawat, tanggal, jam)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}

	return ctx.Status(fiber.StatusNoContent).JSON(web.Response{
		Code:   fiber.StatusNoContent,
		Status: "Deleted",
	})
}
