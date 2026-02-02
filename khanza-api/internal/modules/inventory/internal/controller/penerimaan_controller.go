package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/usecase"
)

type PenerimaanController struct {
	UseCase *usecase.PenerimaanUseCase
}

func NewPenerimaanController(useCase *usecase.PenerimaanUseCase) *PenerimaanController {
	return &PenerimaanController{UseCase: useCase}
}

func (c *PenerimaanController) Create(ctx *fiber.Ctx) error {
	var request model.PenerimaanRequest

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

func (c *PenerimaanController) Get(ctx *fiber.Ctx) error {
	response := c.UseCase.Get()

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *PenerimaanController) GetById(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	response := c.UseCase.GetById(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *PenerimaanController) Update(ctx *fiber.Ctx) error {
	var request model.PenerimaanRequest
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

func (c *PenerimaanController) Delete(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	c.UseCase.Delete(id)

	return ctx.SendStatus(fiber.StatusNoContent)
}

func (c *PenerimaanController) DetailCreate(ctx *fiber.Ctx) error {
	var request model.DetailPenerimaanRequest

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid request body",
		})
	}

	response := c.UseCase.DetailCreate(&request)

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *PenerimaanController) DetailGet(ctx *fiber.Ctx) error {
	response := c.UseCase.DetailGet()

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *PenerimaanController) DetailGetById(ctx *fiber.Ctx) error {
	penerimaan := ctx.Params("penerimaan")

	response := c.UseCase.DetailGetById(penerimaan)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *PenerimaanController) DetailGetByPenerimaanBarang(ctx *fiber.Ctx) error {
	penerimaan := ctx.Params("penerimaan")
	barang := ctx.Params("barang")

	response := c.UseCase.DetailGetByPenerimaanBarang(penerimaan, barang)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *PenerimaanController) DetailUpdate(ctx *fiber.Ctx) error {
	var request model.DetailPenerimaanRequest
	penerimaan := ctx.Params("penerimaan")
	barang := ctx.Params("barang")

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid request body",
		})
	}

	response := c.UseCase.DetailUpdate(&request, penerimaan, barang)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *PenerimaanController) DetailDelete(ctx *fiber.Ctx) error {
	penerimaan := ctx.Params("penerimaan")
	barang := ctx.Params("barang")

	c.UseCase.DetailDelete(penerimaan, barang)

	return ctx.SendStatus(fiber.StatusNoContent)
}
