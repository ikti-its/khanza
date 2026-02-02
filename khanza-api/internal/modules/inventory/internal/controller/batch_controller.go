package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/usecase"
)

type BatchController struct {
	UseCase *usecase.BatchUseCase
}

func NewBatchController(useCase *usecase.BatchUseCase) *BatchController {
	return &BatchController{UseCase: useCase}
}

func (c *BatchController) Create(ctx *fiber.Ctx) error {
	var request model.BatchRequest

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

func (c *BatchController) Get(ctx *fiber.Ctx) error {
	response := c.UseCase.Get()

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *BatchController) GetByBatch(ctx *fiber.Ctx) error {
	batch := ctx.Params("batch")

	response := c.UseCase.GetByBatch(batch)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *BatchController) GetById(ctx *fiber.Ctx) error {
	batch := ctx.Params("batch")
	faktur := ctx.Params("faktur")
	barang := ctx.Params("barang")

	response := c.UseCase.GetById(batch, faktur, barang)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *BatchController) Update(ctx *fiber.Ctx) error {
	var request model.BatchRequest
	batch := ctx.Params("batch")
	faktur := ctx.Params("faktur")
	barang := ctx.Params("barang")

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid request body",
		})
	}

	response := c.UseCase.Update(&request, batch, faktur, barang)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *BatchController) Delete(ctx *fiber.Ctx) error {
	batch := ctx.Params("batch")
	faktur := ctx.Params("faktur")
	barang := ctx.Params("barang")

	c.UseCase.Delete(batch, faktur, barang)

	return ctx.SendStatus(fiber.StatusNoContent)
}
