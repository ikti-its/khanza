package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/usecase"
)

type KehadiranController struct {
	UseCase   *usecase.KehadiranUseCase
	Validator *config.Validator
}

func NewKehadiranController(useCase *usecase.KehadiranUseCase, validator *config.Validator) *KehadiranController {
	return &KehadiranController{
		UseCase:   useCase,
		Validator: validator,
	}
}

func (c *KehadiranController) Attend(ctx *fiber.Ctx) error {
	var request model.AttendKehadiranRequest
	kode := ctx.Query("kode")

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
	if kode != "" {
		response := c.UseCase.AttendByKode(&request, kode, updater)

		return ctx.Status(fiber.StatusCreated).JSON(web.Response{
			Code:   fiber.StatusCreated,
			Status: "OK",
			Data:   response,
		})
	} else {
		response := c.UseCase.Attend(&request, updater)

		return ctx.Status(fiber.StatusCreated).JSON(web.Response{
			Code:   fiber.StatusCreated,
			Status: "OK",
			Data:   response,
		})
	}
}

func (c *KehadiranController) Leave(ctx *fiber.Ctx) error {
	emergency := ctx.QueryBool("emergency", false)

	var request model.LeaveKehadiranRequest

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
	response := c.UseCase.Leave(&request, emergency, updater)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *KehadiranController) Get(ctx *fiber.Ctx) error {
	page := ctx.QueryInt("page")
	size := ctx.QueryInt("size")
	tanggal := ctx.Query("tanggal")

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
		if tanggal != "" && !helper.ParseTime(tanggal, "2006-01-02").IsZero() {
			response := c.UseCase.GetByTanggal(tanggal)

			return ctx.Status(fiber.StatusOK).JSON(web.Response{
				Code:   fiber.StatusOK,
				Status: "OK",
				Data:   response,
			})
		} else {
			response := c.UseCase.GetPage(page, size)

			return ctx.Status(fiber.StatusOK).JSON(web.Response{
				Code:   fiber.StatusOK,
				Status: "OK",
				Data:   response,
			})
		}
	}
}

func (c *KehadiranController) GetByPegawaiId(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	response := c.UseCase.GetByPegawaiId(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *KehadiranController) GetById(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	response := c.UseCase.GetById(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}
