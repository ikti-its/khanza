package templates

var ControllerTmpl = `package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/{{.Module}}/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/{{.Module}}/internal/usecase"
)

type {{.Name}}Controller struct {
	UseCase   *usecase.{{.Name}}UseCase
	Validator *config.Validator
}

func New{{.Name}}Controller(useCase *usecase.{{.Name}}UseCase, validator *config.Validator) *{{.Name}}Controller {
	return &{{.Name}}Controller{
		UseCase:   useCase,
		Validator: validator,
	}
}

func (c *{{.Name}}Controller) Create(ctx *fiber.Ctx) error {
	var request model.{{.Name}}Request

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

func (c *{{.Name}}Controller) Get(ctx *fiber.Ctx) error {
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

func (c *{{.Name}}Controller) GetById(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	response := c.UseCase.GetById(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *{{.Name}}Controller) Update(ctx *fiber.Ctx) error {
	var request model.{{.Name}}Request
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

func (c *{{.Name}}Controller) Delete(ctx *fiber.Ctx) error {
	id := ctx.Params("id")
	updater := ctx.Locals("user").(string)

	c.UseCase.Delete(id, updater)

	return ctx.SendStatus(fiber.StatusNoContent)
}
`
