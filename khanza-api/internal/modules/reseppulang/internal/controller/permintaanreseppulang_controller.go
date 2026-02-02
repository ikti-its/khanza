package controller

import (
	"bytes"
	"encoding/json"
	"fmt"
	"log"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/usecase"
)

type PermintaanResepPulangController struct {
	UseCase *usecase.PermintaanResepPulangUseCase
}

func NewPermintaanResepPulangController(useCase *usecase.PermintaanResepPulangUseCase) *PermintaanResepPulangController {
	return &PermintaanResepPulangController{
		UseCase: useCase,
	}
}

func (c *PermintaanResepPulangController) Create(ctx *fiber.Ctx) error {
	fmt.Println("📥 Received POST /permintaan-resep-pulang")

	var requests []*model.PermintaanResepPulangRequest

	if err := json.NewDecoder(bytes.NewReader(ctx.Body())).Decode(&requests); err != nil {
		fmt.Println("❌ Error decoding JSON:", err)
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "Invalid request body format. Must be an array of objects.",
		})
	}

	responses, err := c.UseCase.Create(ctx, requests)
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
		Data:   responses,
	})
}

func (c *PermintaanResepPulangController) GetAll(ctx *fiber.Ctx) error {
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

func (c *PermintaanResepPulangController) GetByNoRawat(ctx *fiber.Ctx) error {
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

func (c *PermintaanResepPulangController) GetByNoPermintaan(ctx *fiber.Ctx) error {
	noPermintaan := ctx.Params("no_permintaan")
	log.Printf("📥 Incoming GET /v1/permintaan-resep-pulang/%s", noPermintaan)

	if noPermintaan == "" {
		log.Println("⚠️ no_permintaan param is missing")
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "no_permintaan is required",
		})
	}

	response, err := c.UseCase.GetByNoPermintaan(noPermintaan)
	if err != nil {
		log.Printf("❌ UseCase.GetByNoPermintaan failed: %v", err)
		return ctx.Status(fiber.StatusNotFound).JSON(web.Response{
			Code:   fiber.StatusNotFound,
			Status: "Not Found",
			Data:   err.Error(),
		})
	}

	log.Printf("✅ Successfully fetched data for no_permintaan %s: %+v", noPermintaan, response)

	return ctx.JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *PermintaanResepPulangController) Update(ctx *fiber.Ctx) error {
	noPermintaan := ctx.Params("no_permintaan")
	var request model.PermintaanResepPulangRequest

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{Message: "Invalid request body"})
	}

	response, err := c.UseCase.Update(ctx, noPermintaan, &request)
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

func (c *PermintaanResepPulangController) Delete(ctx *fiber.Ctx) error {
	noPermintaan := ctx.Params("no_permintaan")

	if noPermintaan == "" {
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "no_permintaan is required",
		})
	}

	err := c.UseCase.Delete(ctx, noPermintaan)
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
		Data:   "Permintaan resep pulang deleted successfully",
	})
}

func (c *PermintaanResepPulangController) UpdateStatus(ctx *fiber.Ctx) error {
	noPermintaan := ctx.Params("no_permintaan")

	var request struct {
		Status string `json:"status"`
	}

	if err := ctx.BodyParser(&request); err != nil {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"code":   400,
			"status": "Bad Request",
			"data":   "Invalid request body",
		})
	}

	response, err := c.UseCase.UpdateStatus(ctx, noPermintaan, request.Status)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"code":   500,
			"status": "Error",
			"data":   err.Error(),
		})
	}

	return ctx.JSON(fiber.Map{
		"code":   200,
		"status": "OK",
		"data":   response,
	})
}

func (ctrl *PermintaanResepPulangController) GetObatByNoPermintaan(c *fiber.Ctx) error {
	noPermintaan := c.Params("no_permintaan")

	result, err := ctrl.UseCase.GetObatByNoPermintaanWithHarga(noPermintaan)
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
