package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/usecase"
)

type GudangBarangController struct {
	UseCase *usecase.GudangBarangUseCase
}

func NewGudangBarangController(useCase *usecase.GudangBarangUseCase) *GudangBarangController {
	return &GudangBarangController{UseCase: useCase}
}

func (c *GudangBarangController) Create(ctx *fiber.Ctx) error {
	var request model.GudangBarangRequest

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

func (c *GudangBarangController) Get(ctx *fiber.Ctx) error {
	response := c.UseCase.Get()

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *GudangBarangController) GetByIdMedis(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	response := c.UseCase.GetByIdMedis(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *GudangBarangController) GetById(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	response := c.UseCase.GetById(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *GudangBarangController) Update(ctx *fiber.Ctx) error {
	var request model.GudangBarangRequest
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

func (c *GudangBarangController) Delete(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	c.UseCase.Delete(id)

	return ctx.SendStatus(fiber.StatusNoContent)
}

// GetByKodeBarang handles GET /v1/inventory/gudang/barang/kode/:kode_barang
func (c *GudangBarangController) GetByKodeBarang(ctx *fiber.Ctx) error {
	kodeBarang := ctx.Params("kode_barang")

	data, err := c.UseCase.GetByKodeBarang(kodeBarang)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"code":   500,
			"status": "Internal Server Error",
			"data":   err.Error(),
		})
	}

	return ctx.JSON(fiber.Map{
		"code":   200,
		"status": "OK",
		"data":   data,
	})
}
