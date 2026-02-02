package controller

import (
	"fmt"
	// "strconv"

	"github.com/gofiber/fiber/v2"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/usecase"
)

type ResepObatController struct {
	UseCase *usecase.ResepObatUseCase
}

func NewResepObatController(useCase *usecase.ResepObatUseCase) *ResepObatController {
	return &ResepObatController{
		UseCase: useCase,
	}
}

func (c *ResepObatController) Create(ctx *fiber.Ctx) error {
	var request model.ResepObatRequest
	fmt.Println("📥 Received POST /resep-obat")

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

func (c *ResepObatController) GetAll(ctx *fiber.Ctx) error {
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

func (c *ResepObatController) GetByNoResep(ctx *fiber.Ctx) error {
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

func (c *ResepObatController) Update(ctx *fiber.Ctx) error {
	noResep := ctx.Params("no_resep")
	if noResep == "" {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"code":    400,
			"status":  "Bad Request",
			"message": "no_resep is required in URL",
		})
	}

	var request model.ResepObatRequest
	if err := ctx.BodyParser(&request); err != nil {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"code":    400,
			"status":  "Bad Request",
			"message": "Invalid request body",
		})
	}

	result, err := c.UseCase.Update(ctx, noResep, &request)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"code":    500,
			"status":  "Internal Server Error",
			"message": err.Error(),
		})
	}

	return ctx.JSON(result)
}

func (c *ResepObatController) Delete(ctx *fiber.Ctx) error {
	noResep := ctx.Params("no_resep")

	if noResep == "" {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"code":   400,
			"status": "Bad Request",
			"data":   "no_resep is required",
		})
	}

	err := c.UseCase.Delete(ctx, noResep)
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
		"data":   "Resep obat deleted successfully",
	})
}

func (c *ResepObatController) GetByNomorRawat(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rawat")
	reseps, err := c.UseCase.GetByNomorRawat(nomorRawat)
	if err != nil {
		return ctx.Status(fiber.StatusNotFound).JSON(fiber.Map{
			"code":   404,
			"status": "Not Found",
			"data":   fmt.Sprintf("resep_obat not found: %v", err),
		})
	}
	return ctx.JSON(fiber.Map{
		"code":   200,
		"status": "OK",
		"data":   reseps,
	})
}

func (c *ResepObatController) UpdateValidasi(ctx *fiber.Ctx) error {
	noResep := ctx.Params("no_resep")

	var payload struct {
		Validasi bool `json:"validasi"`
	}

	if err := ctx.BodyParser(&payload); err != nil {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"status": "error", "message": "invalid JSON",
		})
	}

	err := c.UseCase.UpdateValidasi(ctx, ctx.Context(), noResep, payload.Validasi)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"status": "error", "message": err.Error(),
		})
	}

	return ctx.JSON(fiber.Map{
		"status": "success", "message": "Validasi updated",
	})
}
