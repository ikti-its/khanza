package controller

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/usecase"
)

type ResepDokterController struct {
	UseCase *usecase.ResepDokterUseCase
}

func NewResepDokterController(useCase *usecase.ResepDokterUseCase) *ResepDokterController {
	return &ResepDokterController{
		UseCase: useCase,
	}
}

func (c *ResepDokterController) Create(ctx *fiber.Ctx) error {
	var request model.ResepDokterRequest
	fmt.Println("📥 Received POST /resep-dokter")

	if err := ctx.BodyParser(&request); err != nil {
		fmt.Println("❌ Error parsing body:", err)
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "Invalid request body",
		})
	}

	response, err := c.UseCase.Create(ctx, &request)
	if err != nil {
		fmt.Println("❌ Error in usecase.Create():", err)
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

func (c *ResepDokterController) GetAll(ctx *fiber.Ctx) error {
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

func (c *ResepDokterController) GetByNoResep(ctx *fiber.Ctx) error {
	noResep := ctx.Params("no_resep")

	response, err := c.UseCase.GetByNoResep(noResep)
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

func (c *ResepDokterController) Update(ctx *fiber.Ctx) error {
	var request model.ResepDokterRequest

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{Message: "Invalid request body"})
	}

	response, err := c.UseCase.Update(ctx, &request)
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

func (c *ResepDokterController) Delete(ctx *fiber.Ctx) error {
	noResep := ctx.Params("no_resep")
	kodeBarang := ctx.Params("kode_barang")

	if noResep == "" || kodeBarang == "" {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"code":   400,
			"status": "Bad Request",
			"data":   "no_resep and kode_barang are required",
		})
	}

	err := c.UseCase.Delete(ctx, noResep, kodeBarang)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"code":   500,
			"status": "Error",
			"data":   err.Error(),
		})
	}

	return ctx.JSON(fiber.Map{
		"code":   200,
		"status": "Success",
		"data":   "Resep dokter entry deleted successfully",
	})
}
