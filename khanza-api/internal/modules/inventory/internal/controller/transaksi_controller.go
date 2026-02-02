package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/usecase"
)

type TransaksiController struct {
	UseCase *usecase.TransaksiUseCase
}

func NewTransaksiController(useCase *usecase.TransaksiUseCase) *TransaksiController {
	return &TransaksiController{UseCase: useCase}
}

func (c *TransaksiController) Create(ctx *fiber.Ctx) error {
	var request model.TransaksiRequest

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid request body",
		})
	}

	response := c.UseCase.Create(&request)

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *TransaksiController) Get(ctx *fiber.Ctx) error {
	response := c.UseCase.Get()

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *TransaksiController) GetById(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	response := c.UseCase.GetById(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *TransaksiController) GetByStok(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	response := c.UseCase.GetByStok(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *TransaksiController) Update(ctx *fiber.Ctx) error {
	var request model.TransaksiRequest
	id := ctx.Params("id")

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid request body",
		})
	}

	response := c.UseCase.Update(&request, id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *TransaksiController) Delete(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	c.UseCase.Delete(id)

	return ctx.SendStatus(fiber.StatusNoContent)
}
