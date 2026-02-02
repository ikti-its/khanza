package controller

import (
	"fmt"
	"strconv"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/kamar/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/kamar/internal/usecase"
)

type KamarController struct {
	UseCase *usecase.KamarUseCase
}

func NewKamarController(useCase *usecase.KamarUseCase) *KamarController {
	return &KamarController{
		UseCase: useCase,
	}
}

func (c *KamarController) Create(ctx *fiber.Ctx) error {
	var request model.KamarRequest
	fmt.Println("Received a POST request to /kamar") // Debugging log

	if err := ctx.BodyParser(&request); err != nil {
		fmt.Println("Failed to parse request body:", err) // Debugging log
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "Invalid request body",
		})
	}

	// Call the Create method of the KamarUseCase
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
		Status: "OK",
		Data:   response,
	})
}

func (c *KamarController) GetAll(ctx *fiber.Ctx) error {
	// Extract query params
	pageStr := ctx.Query("page", "1")
	sizeStr := ctx.Query("size", "10")

	page, _ := strconv.Atoi(pageStr)
	size, _ := strconv.Atoi(sizeStr)

	response, totalPages, err := c.UseCase.GetPaginated(page, size)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}

	return ctx.JSON(fiber.Map{
		"data": response,
		"meta_data": fiber.Map{
			"page":  page,
			"size":  size,
			"total": totalPages,
		},
	})
}

func (c *KamarController) GetByNomorBed(ctx *fiber.Ctx) error {
	nomorBed := ctx.Params("nomor_bed")
	response, err := c.UseCase.GetByNomorBed(nomorBed)
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

func (c *KamarController) Update(ctx *fiber.Ctx) error {
	nomorBed := ctx.Params("nomor_bed")
	var request model.KamarRequest

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{Message: "Invalid request body"})
	}

	response, err := c.UseCase.Update(ctx, nomorBed, &request)
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

func (c *KamarController) Delete(ctx *fiber.Ctx) error {
	nomorBed := ctx.Params("nomor_bed")
	err := c.UseCase.Delete(ctx, nomorBed)
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

func (c *KamarController) GetAvailableRooms(ctx *fiber.Ctx) error {
	rooms, err := c.UseCase.GetAvailableRooms()
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"status": "error",
			"data":   "failed to fetch rooms",
		})
	}

	return ctx.Status(fiber.StatusOK).JSON(fiber.Map{
		"status": "success",
		"data":   rooms,
	})
}

func (c *KamarController) UpdateStatusKamar(ctx *fiber.Ctx) error {
	nomorBed := ctx.Params("nomor_bed")
	var req struct {
		Status string `json:"status_kamar"`
	}

	if err := ctx.BodyParser(&req); err != nil {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"status":  "fail",
			"message": "invalid request body",
		})
	}

	err := c.UseCase.UpdateStatusKamar(nomorBed, req.Status)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"status":  "error",
			"message": "failed to update status_kamar",
		})
	}

	return ctx.JSON(fiber.Map{
		"status":  "success",
		"message": "status_kamar updated",
	})
}

func (c *KamarController) GetKelasOptions(ctx *fiber.Ctx) error {
	kelasList, err := c.UseCase.GetDistinctKelas()
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"code":    500,
			"status":  "Error",
			"message": err.Error(),
		})
	}

	return ctx.JSON(fiber.Map{
		"code":   200,
		"status": "Success",
		"data":   kelasList,
	})
}
