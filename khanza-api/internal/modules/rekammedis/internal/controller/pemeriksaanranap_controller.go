package controller

import (
	"fmt"
	"log"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/usecase"
)

type PemeriksaanRanapController struct {
	UseCase *usecase.PemeriksaanRanapUseCase
}

func NewPemeriksaanRanapController(useCase *usecase.PemeriksaanRanapUseCase) *PemeriksaanRanapController {
	return &PemeriksaanRanapController{
		UseCase: useCase,
	}
}

// Create handles the creation of a new pemeriksaan rawat inap (inpatient examination)
func (c *PemeriksaanRanapController) Create(ctx *fiber.Ctx) error {
	var request model.PemeriksaanRanapRequest
	fmt.Println("Received a POST request to /pemeriksaanranap") // Debugging log
	if err := ctx.BodyParser(&request); err != nil {
		fmt.Println("Failed to parse request body:", err) // Debugging log
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "Invalid request body",
		})
	}

	// Debugging log to check the parsed request
	fmt.Printf("📨 Parsed request: %+v\n", request)

	// Call the use case to handle the business logic
	response, err := c.UseCase.Create(ctx, &request)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}

	// Return the created response
	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "OK",
		Data:   response,
	})
}

// GetAll retrieves all pemeriksaan rawat inap records
func (c *PemeriksaanRanapController) GetAll(ctx *fiber.Ctx) error {
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

// GetByNomorRawat retrieves a specific pemeriksaan rawat inap record by nomor_rawat
func (c *PemeriksaanRanapController) GetByNomorRawat(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rawat")
	response, err := c.UseCase.GetByNomorRawat(nomorRawat)
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

func (c *PemeriksaanRanapController) Update(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rawat")
	var request model.PemeriksaanRanapRequest

	// Parse the request body
	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{Message: "Invalid request body"})
	}
	log.Printf("[DEBUG] Parsed request body: %+v", request)
	// Call the use case to update the record
	err := c.UseCase.Update(ctx, nomorRawat, &request) // Only error returned, not response
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}

	// Return success response (No response data needed here)
	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   "Record successfully updated",
	})
}

// Delete handles the deletion of a pemeriksaan rawat inap record
func (c *PemeriksaanRanapController) Delete(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rawat")
	err := c.UseCase.Delete(ctx, nomorRawat)
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
