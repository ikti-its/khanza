package controller

import (
	"fmt"
	"strconv"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/obat/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/obat/internal/usecase"
)

type PemberianObatController struct {
	UseCase *usecase.PemberianObatUseCase
}

func NewPemberianObatController(useCase *usecase.PemberianObatUseCase) *PemberianObatController {
	return &PemberianObatController{
		UseCase: useCase,
	}
}

func (c *PemberianObatController) Create(ctx *fiber.Ctx) error {
	var request model.PemberianObatRequest
	fmt.Println("📥 Received POST /pemberian-obat")

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

func (c *PemberianObatController) GetAll(ctx *fiber.Ctx) error {
	// Extract page from query, force size = 10
	pageStr := ctx.Query("page", "1")
	page, _ := strconv.Atoi(pageStr)
	size := 10 // ✅ force size

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

func (c *PemberianObatController) GetByNomorRawat(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rawat")

	response, err := c.UseCase.GetByNomorRawat(nomorRawat)
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
		Data:   response, // array kosong [] kalau tidak ada data
	})
}

func (c *PemberianObatController) Update(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rawat")
	var request model.PemberianObatRequest

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

func (c *PemberianObatController) Delete(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rawat")
	jamBeri := ctx.Params("jam_beri")

	if nomorRawat == "" || jamBeri == "" {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"code":   400,
			"status": "Bad Request",
			"data":   "nomor_rawat and jam_beri are required",
		})
	}

	err := c.UseCase.Delete(ctx, nomorRawat, jamBeri)
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
		"data":   "Pemberian obat deleted successfully",
	})
}

func (c *PemberianObatController) GetAllDataBarang(ctx *fiber.Ctx) error {
	result, err := c.UseCase.GetAllDataBarang()
	if err != nil {
		return ctx.Status(500).JSON(fiber.Map{
			"code":   500,
			"status": "Error",
			"data":   err.Error(),
		})
	}
	return ctx.JSON(fiber.Map{
		"code":   200,
		"status": "OK",
		"data":   result,
	})
}
