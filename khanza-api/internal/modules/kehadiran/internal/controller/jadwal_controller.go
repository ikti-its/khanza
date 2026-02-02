package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/usecase"
)

type JadwalController struct {
	UseCase   *usecase.JadwalUseCase
	Validator *config.Validator
}

func NewJadwalController(useCase *usecase.JadwalUseCase, validator *config.Validator) *JadwalController {
	return &JadwalController{
		UseCase:   useCase,
		Validator: validator,
	}
}

func (c *JadwalController) Get(ctx *fiber.Ctx) error {
	page := ctx.QueryInt("page")
	size := ctx.QueryInt("size")

	if size < 5 {
		size = 5
	}

	if page < 1 {
		response := c.UseCase.Get()
		return ctx.JSON(web.Response{
			Code:   fiber.StatusOK,
			Status: "OK",
			Data:   response,
		})
	} else {
		response := c.UseCase.GetPage(page, size)
		return ctx.JSON(web.Response{
			Code:   fiber.StatusOK,
			Status: "OK",
			Data:   response,
		})
	}
}

func (c *JadwalController) GetByHariId(ctx *fiber.Ctx) error {
	id, err := ctx.ParamsInt("id")
	if err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid request parameter",
		})
	}

	jadwal := c.UseCase.GetByHariId(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   jadwal,
	})
}

func (c *JadwalController) GetByPegawaiId(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	jadwal := c.UseCase.GetByPegawaiId(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   jadwal,
	})
}

func (c *JadwalController) GetById(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	jadwal := c.UseCase.GetById(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   jadwal,
	})
}

func (c *JadwalController) Update(ctx *fiber.Ctx) error {
	var request model.UpdateJadwalRequest
	id := ctx.Params("id")

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid request body",
		})
	}

	if err := c.Validator.Validate(&request); err != nil {
		message := c.Validator.Message(err)
		panic(&exception.BadRequestError{
			Message: message,
		})
	}

	updater := ctx.Locals("user").(string)
	response := c.UseCase.Update(&request, id, updater)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}
