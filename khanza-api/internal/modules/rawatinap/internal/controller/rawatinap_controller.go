package controller

import (
	"strconv"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/rawatinap/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/rawatinap/internal/usecase"
)

type RawatInapController struct {
	UseCase *usecase.RawatInapUseCase
}

func NewRawatInapController(useCase *usecase.RawatInapUseCase) *RawatInapController {
	return &RawatInapController{
		UseCase: useCase,
	}
}

func (c *RawatInapController) Create(ctx *fiber.Ctx) error {
	var request model.RawatInapRequest

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

func (c *RawatInapController) GetAll(ctx *fiber.Ctx) error {
	// Extract `page`, force size = 10
	pageStr := ctx.Query("page", "1")
	page, _ := strconv.Atoi(pageStr)
	size := 10

	// Call paginated use case
	response, totalPages, err := c.UseCase.GetPaginated(page, size)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}

	// Return paginated response
	return ctx.JSON(fiber.Map{
		"data": response,
		"meta_data": fiber.Map{
			"page":  page,
			"size":  size,
			"total": totalPages,
		},
	})
}

func (c *RawatInapController) GetByNomorRawat(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rawat")

	response, err := c.UseCase.GetByNomorRawat(nomorRawat)
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

func (c *RawatInapController) Update(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rawat")
	var request model.RawatInapRequest

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{Message: "Invalid request body"})
	}

	response, err := c.UseCase.Update(ctx, nomorRawat, &request)
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

func (c *RawatInapController) Delete(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rawat")

	err := c.UseCase.Delete(ctx, nomorRawat)
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
