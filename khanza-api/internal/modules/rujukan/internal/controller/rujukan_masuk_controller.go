package controller

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/usecase"
)

type RujukanMasukController struct {
	UseCase *usecase.RujukanMasukUseCase
}

func NewRujukanMasukController(useCase *usecase.RujukanMasukUseCase) *RujukanMasukController {
	return &RujukanMasukController{
		UseCase: useCase,
	}
}

func (c *RujukanMasukController) Create(ctx *fiber.Ctx) error {
	var request model.RujukanMasukRequest
	fmt.Println("Received a POST request to /rujukan-masuk")

	if err := ctx.BodyParser(&request); err != nil {
		fmt.Println("Failed to parse request body:", err)
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

func (c *RujukanMasukController) GetAll(ctx *fiber.Ctx) error {
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

func (c *RujukanMasukController) GetByNomorRawat(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rujuk")
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

func (c *RujukanMasukController) Update(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rujuk")
	var request model.RujukanMasukRequest

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

func (c *RujukanMasukController) Delete(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rujuk")
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
