package controller

import (
	"fmt"
	"log"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/usecase"
)

type ResepDokterRacikanDetailController struct {
	UseCase *usecase.ResepDokterRacikanDetailUseCase
}

func NewResepDokterRacikanDetailController(useCase *usecase.ResepDokterRacikanDetailUseCase) *ResepDokterRacikanDetailController {
	return &ResepDokterRacikanDetailController{
		UseCase: useCase,
	}
}

func (c *ResepDokterRacikanDetailController) Create(ctx *fiber.Ctx) error {
	var request model.ResepDokterRacikanDetailRequest
	fmt.Println("📥 Received POST /resep-dokter-racikan-detail")

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

func (c *ResepDokterRacikanDetailController) GetAll(ctx *fiber.Ctx) error {
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

func (c *ResepDokterRacikanDetailController) GetByNoResepAndNoRacik(ctx *fiber.Ctx) error {
	noResep := ctx.Params("no_resep")
	noRacik := ctx.Params("no_racik")

	response, err := c.UseCase.GetByNoResepAndNoRacik(noResep, noRacik)
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

func (c *ResepDokterRacikanDetailController) Update(ctx *fiber.Ctx) error {
	var request model.ResepDokterRacikanDetailRequest

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

func (c *ResepDokterRacikanDetailController) Delete(ctx *fiber.Ctx) error {
	noResep := ctx.Params("no_resep")
	noRacik := ctx.Params("no_racik")
	kodeBrng := ctx.Params("kode_brng")

	if noResep == "" || noRacik == "" || kodeBrng == "" {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"code":   400,
			"status": "Bad Request",
			"data":   "no_resep, no_racik, and kode_brng are required",
		})
	}

	err := c.UseCase.Delete(ctx, noResep, noRacik, kodeBrng)
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
		"data":   "Racikan detail deleted successfully",
	})
}

func (c *ResepDokterRacikanDetailController) GetByNoResep(ctx *fiber.Ctx) error {
	noResep := ctx.Params("no_resep")

	data, err := c.UseCase.GetByNoResep(noResep)
	if err != nil {
		// ✅ Instead of 500, return empty array with 200 OK
		log.Printf("🔍 No racikan detail found for no_resep: %s. Error: %v", noResep, err)
		log.Printf("✅ Racikan result: %+v", data)
		return ctx.Status(fiber.StatusOK).JSON(fiber.Map{
			"data": []model.ResepDokterRacikanDetail{},
		})
	}

	return ctx.Status(fiber.StatusOK).JSON(fiber.Map{
		"data": data,
	})
}
