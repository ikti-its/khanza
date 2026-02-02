package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/usecase"
)

type FotoController struct {
	UseCase   *usecase.FotoUseCase
	Validator *config.Validator
}

func NewFotoController(useCase *usecase.FotoUseCase, validator *config.Validator) *FotoController {
	return &FotoController{
		UseCase:   useCase,
		Validator: validator,
	}
}

func (c *FotoController) Create(ctx *fiber.Ctx) error {
	var request model.FotoRequest

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid request body",
		})
	}

	akunId := c.UseCase.GetAkunId(request.IdPegawai)
	middleware.AuthorizeUserFoto(akunId)

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

func (c *FotoController) Get(ctx *fiber.Ctx) error {
	page := ctx.QueryInt("page")
	size := ctx.QueryInt("size")

	if size < 10 {
		size = 10
	}

	if page < 1 {
		response := c.UseCase.Get()

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

func (c *FotoController) GetById(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	middleware.AuthorizeUserFoto(id)

	response := c.UseCase.GetById(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *FotoController) Update(ctx *fiber.Ctx) error {
	var request model.FotoRequest
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

	middleware.AuthorizeUserFoto(id)

	updater := ctx.Locals("user").(string)
	response := c.UseCase.Update(&request, id, updater)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *FotoController) Delete(ctx *fiber.Ctx) error {
	id := ctx.Params("id")
	updater := ctx.Locals("user").(string)

	c.UseCase.Delete(id, updater)

	return ctx.SendStatus(fiber.StatusNoContent)
}
