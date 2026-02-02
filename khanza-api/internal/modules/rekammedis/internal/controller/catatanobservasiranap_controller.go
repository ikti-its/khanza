package controller

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/usecase"
)

type CatatanObservasiRanapController struct {
	UseCase *usecase.CatatanObservasiRanapUseCase
}

func NewCatatanObservasiRanapController(useCase *usecase.CatatanObservasiRanapUseCase) *CatatanObservasiRanapController {
	return &CatatanObservasiRanapController{
		UseCase: useCase,
	}
}

func (c *CatatanObservasiRanapController) Create(ctx *fiber.Ctx) error {
	var request model.CatatanObservasiRanapRequest
	fmt.Println("📥 Received POST /catatan-observasi-ranap")

	if err := ctx.BodyParser(&request); err != nil {
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

func (c *CatatanObservasiRanapController) GetAll(ctx *fiber.Ctx) error {
	response, err := c.UseCase.GetAll()
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
		Data:   response,
	})
}

func (c *CatatanObservasiRanapController) GetByNoRawat(ctx *fiber.Ctx) error {
	noRawat := ctx.Params("no_rawat")
	response, err := c.UseCase.GetByNoRawat(noRawat)
	if err != nil {
		return ctx.Status(fiber.StatusNotFound).JSON(web.Response{
			Code:   fiber.StatusNotFound,
			Status: "Not Found",
			Data:   err.Error(),
		})
	}
	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *CatatanObservasiRanapController) Update(ctx *fiber.Ctx) error {
	var request model.CatatanObservasiRanapRequest

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{Message: "Invalid request body"})
	}

	// ⛔ Important: assign `no_rawat` from URL param
	request.NoRawat = ctx.Params("no_rawat")

	err := c.UseCase.Update(ctx, &request)
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
		Data:   "Record successfully updated",
	})
}

func (c *CatatanObservasiRanapController) Delete(ctx *fiber.Ctx) error {
	noRawat := ctx.Params("no_rawat")
	tanggal := ctx.Query("tanggal")
	jam := ctx.Query("jam")

	err := c.UseCase.Delete(ctx, noRawat, tanggal, jam)
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

func (c *CatatanObservasiRanapController) GetByRawatAndTanggal(ctx *fiber.Ctx) error {
	noRawat := ctx.Params("no_rawat")
	tanggal := ctx.Params("tgl_perawatan")
	fmt.Println("📥 GET request:", noRawat, tanggal)

	if noRawat == "" || tanggal == "" {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"code":    400,
			"status":  "Bad Request",
			"message": "no_rawat dan tgl_perawatan wajib diisi",
		})
	}

	data, err := c.UseCase.FindByNoRawatAndTanggal(noRawat, tanggal)
	if err != nil {
		fmt.Println("❌ Error saat query observasi:", err)
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"code":    500,
			"status":  "Internal Server Error",
			"message": err.Error(),
		})
	}

	return ctx.JSON(fiber.Map{
		"code":   200,
		"status": "OK",
		"data":   data,
	})
}

func (c *CatatanObservasiRanapController) UpdateByNoRawatAndTanggal(ctx *fiber.Ctx) error {
	noRawat := ctx.Params("no_rawat")
	tanggal := ctx.Params("tgl_perawatan")

	var req model.CatatanObservasiRanapRequest
	if err := ctx.BodyParser(&req); err != nil {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"code":    400,
			"status":  "Bad Request",
			"message": "Invalid body: " + err.Error(),
		})
	}

	err := c.UseCase.UpdateByNoRawatAndTanggal(noRawat, tanggal, &req)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"code":    500,
			"status":  "Internal Server Error",
			"message": err.Error(),
		})
	}

	return ctx.JSON(fiber.Map{
		"code":    200,
		"status":  "Success",
		"message": "Catatan observasi updated",
	})
}
