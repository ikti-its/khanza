package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/file/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/file/internal/usecase"
)

type FileController struct {
	UseCase   *usecase.FileUseCase
	Validator *config.Validator
}

func NewFileController(usecase *usecase.FileUseCase, validator *config.Validator) *FileController {
	return &FileController{
		UseCase:   usecase,
		Validator: validator,
	}
}

func (c *FileController) Upload(ctx *fiber.Ctx) error {
	fileType := ctx.Params("type")
	file, err := ctx.FormFile("file")
	if err != nil {
		panic(&exception.BadRequestError{
			Message: "No file uploaded",
		})
	}

	request := model.FileRequest{
		File: file,
	}

	filePath, response := c.UseCase.Upload(&request, fileType)

	if err := ctx.SaveFile(file, filePath); err != nil {
		exception.PanicIfError(err, "Failed to save file")
	}

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *FileController) View(ctx *fiber.Ctx) error {
	fileType := ctx.Params("type")
	fileName := ctx.Params("name")

	if fileType != "img" {
		middleware.Authenticate([]int{0})
	}

	filePath := c.UseCase.Get(fileType, fileName)

	return ctx.SendFile(filePath)
}

func (c *FileController) Download(ctx *fiber.Ctx) error {
	fileType := ctx.Params("type")
	fileName := ctx.Params("name")

	if fileType != "img" {
		middleware.Authenticate([]int{0})
	}

	filePath := c.UseCase.Get(fileType, fileName)

	return ctx.Download(filePath)
}

func (c *FileController) Delete(ctx *fiber.Ctx) error {
	fileType := ctx.Params("type")
	fileName := ctx.Params("name")

	c.UseCase.Delete(fileType, fileName)

	return ctx.SendStatus(fiber.StatusNoContent)
}
