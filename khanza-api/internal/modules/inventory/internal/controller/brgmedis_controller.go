package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/usecase"
)

type BrgmedisController struct {
	UseCase *usecase.BrgmedisUseCase
}

func NewBrgmedisController(useCase *usecase.BrgmedisUseCase) *BrgmedisController {
	return &BrgmedisController{UseCase: useCase}
}

func (c *BrgmedisController) Create(ctx *fiber.Ctx) error {
	var request model.BrgmedisRequest

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

func (c *BrgmedisController) Get(ctx *fiber.Ctx) error {
	response := c.UseCase.Get()

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *BrgmedisController) GetById(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	response := c.UseCase.GetById(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *BrgmedisController) Update(ctx *fiber.Ctx) error {
	var request model.BrgmedisRequest
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

func (c *BrgmedisController) Delete(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	c.UseCase.Delete(id)

	return ctx.SendStatus(fiber.StatusNoContent)
}
