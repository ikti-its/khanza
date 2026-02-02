package controller

import (
	"fmt"
	"log"
	"net/url"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/dokterjaga/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/dokterjaga/internal/usecase"
)

type DokterJagaController struct {
	UseCase *usecase.DokterJagaUseCase
}

func NewDokterJagaController(useCase *usecase.DokterJagaUseCase) *DokterJagaController {
	return &DokterJagaController{
		UseCase: useCase,
	}
}

func (c *DokterJagaController) Create(ctx *fiber.Ctx) error {
	var request model.DokterJagaRequest
	fmt.Println("Received a POST request to /dokterjaga") // Debug log

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
		Status: "OK",
		Data:   response,
	})
}

func (c *DokterJagaController) GetAll(ctx *fiber.Ctx) error {
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

func (c *DokterJagaController) GetByKodeDokter(ctx *fiber.Ctx) error {
	kode := ctx.Params("kode_dokter")
	response, err := c.UseCase.GetByKodeDokter(kode)
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

func (c *DokterJagaController) Update(ctx *fiber.Ctx) error {
	var request model.DokterJagaRequest
	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{Message: "Invalid request body"})
	}

	response, err := c.UseCase.Update(ctx, &request)
	if err != nil {
		log.Println("[Update DokterJaga ERROR]", err.Error()) // log it to console
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

func (c *DokterJagaController) Delete(ctx *fiber.Ctx) error {
	kode := ctx.Params("kode_dokter")
	hari := ctx.Query("hari_kerja")
	if kode == "" || hari == "" {
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "kode_dokter and hari_kerja are required",
		})
	}

	err := c.UseCase.Delete(ctx, kode, hari)
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

func (c *DokterJagaController) GetByStatus(ctx *fiber.Ctx) error {
	status := ctx.Params("status")
	if status == "" {
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "status is required",
		})
	}

	data, err := c.UseCase.GetByStatus(status)
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
		Data:   data,
	})
}

func (c *DokterJagaController) UpdateStatus(ctx *fiber.Ctx) error {
	type Payload struct {
		KodeDokter string `json:"kode_dokter"`
		HariKerja  string `json:"hari_kerja"`
		Status     string `json:"status"`
	}

	var body Payload
	if err := ctx.BodyParser(&body); err != nil {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"message": "Invalid payload",
		})
	}

	err := c.UseCase.UpdateStatus(body.KodeDokter, body.HariKerja, body.Status)
	if err != nil {
		log.Println("[UpdateStatus] DB error:", err)
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"message": "Failed to update status",
		})
	}

	return ctx.JSON(fiber.Map{
		"message": "Status updated successfully",
	})
}

// GET /v1/dokter-jaga/poliklinik/:nama
func (h *DokterJagaController) GetByPoliklinik(c *fiber.Ctx) error {
	rawPoliklinik := c.Params("nama")
	poliklinik, err := url.QueryUnescape(rawPoliklinik)
	if err != nil {
		fmt.Println("❌ Failed to decode poliklinik param:", rawPoliklinik)
		return c.Status(400).JSON(fiber.Map{
			"status": "error",
			"data":   "Invalid poliklinik name",
		})
	}

	fmt.Println("📥 Decoded poliklinik:", poliklinik)

	result, err := h.UseCase.GetByPoliklinik(poliklinik)
	if err != nil {
		return c.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"status":  "error",
			"message": err.Error(),
		})
	}

	return c.JSON(fiber.Map{
		"status": "success",
		"data":   result,
	})
}

func (h *DokterJagaController) GetPoliklinikList(c *fiber.Ctx) error {
	list, err := h.UseCase.GetPoliklinikList()
	if err != nil {
		return c.Status(500).JSON(fiber.Map{
			"status":  "error",
			"message": err.Error(),
		})
	}

	return c.JSON(fiber.Map{
		"status": "success",
		"data":   list,
	})
}
