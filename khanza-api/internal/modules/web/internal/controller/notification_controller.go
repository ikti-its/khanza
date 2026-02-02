package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/web/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/web/internal/usecase"
)

type NotificationController struct {
	UseCase   *usecase.NotificationUseCase
	Validator *config.Validator
}

func NewNotificationController(useCase *usecase.NotificationUseCase, validator *config.Validator) *NotificationController {
	return &NotificationController{
		UseCase:   useCase,
		Validator: validator,
	}
}

func (c *NotificationController) Create(ctx *fiber.Ctx) error {
	var request model.NotificationRequest

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

	sender := ctx.Locals("user").(string)
	response := c.UseCase.Create(&request, sender)

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *NotificationController) Get(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	response := c.UseCase.GetById(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *NotificationController) Update(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	response := c.UseCase.Update(id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}
