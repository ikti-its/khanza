package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/usecase"
)

type CutiController struct {
	UseCase   *usecase.CutiUseCase
	Validator *config.Validator
}

func NewCutiController(useCase *usecase.CutiUseCase, validator *config.Validator) *CutiController {
	return &CutiController{
		UseCase:   useCase,
		Validator: validator,
	}
}

func (c *CutiController) Create(ctx *fiber.Ctx) error {
	var request model.CutiRequest

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
	response := c.UseCase.Create(&request, updater)

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *CutiController) Get(ctx *fiber.Ctx) error {
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

func (c *CutiController) GetById(ctx *fiber.Ctx) error {
	id := ctx.Params("id")
	response := c.UseCase.GetById(id)

	return ctx.JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *CutiController) GetByPegawaiId(ctx *fiber.Ctx) error {
	id := ctx.Params("id")
	response := c.UseCase.GetByPegawaiId(id)

	return ctx.JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *CutiController) Update(ctx *fiber.Ctx) error {
	id := ctx.Params("id")
	var request model.CutiRequest

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
	response := c.UseCase.Update(id, &request, updater)

	return ctx.JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *CutiController) Delete(ctx *fiber.Ctx) error {
	id := ctx.Params("id")
	updater := ctx.Locals("user").(string)

	c.UseCase.Delete(id, updater)

	return ctx.SendStatus(fiber.StatusNoContent)
}
