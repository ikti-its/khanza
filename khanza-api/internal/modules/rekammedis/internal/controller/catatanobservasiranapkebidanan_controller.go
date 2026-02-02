package controller

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/usecase"
)

type CatatanObservasiRanapKebidananController struct {
	UseCase *usecase.CatatanObservasiRanapKebidananUseCase
}

func NewCatatanObservasiRanapKebidananController(useCase *usecase.CatatanObservasiRanapKebidananUseCase) *CatatanObservasiRanapKebidananController {
	return &CatatanObservasiRanapKebidananController{
		UseCase: useCase,
	}
}

func (c *CatatanObservasiRanapKebidananController) Create(ctx *fiber.Ctx) error {
	var request model.CatatanObservasiRanapKebidananRequest
	fmt.Println("📥 Received POST /catatan-observasi-ranap-kebidanan")

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
		Status: "OK",
		Data:   response,
	})
}

func (c *CatatanObservasiRanapKebidananController) GetAll(ctx *fiber.Ctx) error {
	response, err := c.UseCase.GetAll()
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}
	return ctx.JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *CatatanObservasiRanapKebidananController) GetByNoRawat(ctx *fiber.Ctx) error {
	noRawat := ctx.Params("no_rawat")
	response, err := c.UseCase.GetByNoRawat(noRawat)
	if err != nil {
		return ctx.Status(fiber.StatusNotFound).JSON(web.Response{
			Code:   fiber.StatusNotFound,
			Status: "Not Found",
			Data:   err.Error(),
		})
	}
	return ctx.JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *CatatanObservasiRanapKebidananController) Update(ctx *fiber.Ctx) error {
	noRawat := ctx.Params("no_rawat")
	var request model.CatatanObservasiRanapKebidananRequest

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{Message: "Invalid request body"})
	}

	err := c.UseCase.Update(ctx, noRawat, &request)
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
		Data:   "Record successfully updated",
	})
}

func (c *CatatanObservasiRanapKebidananController) Delete(ctx *fiber.Ctx) error {
	noRawat := ctx.Params("no_rawat")
	tanggal := ctx.Query("tanggal")
	jam := ctx.Query("jam")

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
