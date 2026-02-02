package controller

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/usecase"
)

type ResepPulangController struct {
	UseCase *usecase.ResepPulangUseCase
}

func NewResepPulangController(useCase *usecase.ResepPulangUseCase) *ResepPulangController {
	return &ResepPulangController{
		UseCase: useCase,
	}
}

func (c *ResepPulangController) Create(ctx *fiber.Ctx) error {
	var request model.ResepPulangRequest
	fmt.Println("📥 Received POST /resep-pulang")

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

func (c *ResepPulangController) GetAll(ctx *fiber.Ctx) error {
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

func (c *ResepPulangController) GetByNoRawat(ctx *fiber.Ctx) error {
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

func (c *ResepPulangController) GetByCompositeKey(ctx *fiber.Ctx) error {
	noRawat := ctx.Params("no_rawat")
	kodeBrng := ctx.Params("kode_brng")
	tanggal := ctx.Params("tanggal")
	jam := ctx.Params("jam")

	response, err := c.UseCase.GetByCompositeKey(noRawat, kodeBrng, tanggal, jam)
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

func (c *ResepPulangController) Update(ctx *fiber.Ctx) error {
	noRawat := ctx.Params("no_rawat")
	kodeBrng := ctx.Params("kode_brng")
	tanggal := ctx.Params("tanggal")
	jam := ctx.Params("jam")

	var request model.ResepPulangRequest
	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{Message: "Invalid request body"})
	}

	response, err := c.UseCase.Update(ctx, noRawat, kodeBrng, tanggal, jam, &request)
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

func (c *ResepPulangController) Delete(ctx *fiber.Ctx) error {
	noRawat := ctx.Params("no_rawat")
	kodeBrng := ctx.Params("kode_brng")
	tanggal := ctx.Params("tanggal")
	jam := ctx.Params("jam")

	// Debug log
	// fmt.Println("[DEBUG] Delete reseppulang params:", noRawat, kodeBrng, tanggal, jam)

	err := c.UseCase.Delete(ctx, noRawat, kodeBrng, tanggal, jam)
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
		Data:   "Resep pulang berhasil dihapus",
	})
}
