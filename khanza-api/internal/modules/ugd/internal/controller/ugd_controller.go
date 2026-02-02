package controller

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/ugd/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/ugd/internal/usecase"
)

type UGDController struct {
	UseCase *usecase.UGDUseCase
}

func NewUGDController(useCase *usecase.UGDUseCase) *UGDController {
	return &UGDController{
		UseCase: useCase,
	}
}

func (c *UGDController) Create(ctx *fiber.Ctx) error {
	var request model.UGDRequest
	fmt.Println("📩 Received POST /ugd")

	if err := ctx.BodyParser(&request); err != nil {
		fmt.Println("❌ Failed to parse request body:", err)
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

func (c *UGDController) GetAll(ctx *fiber.Ctx) error {
	ugdList, err := c.UseCase.GetAll()
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"code":   500,
			"status": "Internal Server Error",
			"data":   err.Error(),
		})
	}

	return ctx.JSON(fiber.Map{
		"code":   200,
		"status": "OK",
		"data":   ugdList,
	})
}

func (c *UGDController) GetByNomorReg(ctx *fiber.Ctx) error {
	nomorReg := ctx.Params("nomor_reg")
	response, err := c.UseCase.GetByNomorReg(nomorReg)
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

func (c *UGDController) Update(ctx *fiber.Ctx) error {
	nomorReg := ctx.Params("nomor_reg")
	var request model.UGDRequest

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{Message: "Invalid request body"})
	}

	response, err := c.UseCase.Update(ctx, nomorReg, &request)
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

func (c *UGDController) Delete(ctx *fiber.Ctx) error {
	nomorReg := ctx.Params("nomor_reg")
	err := c.UseCase.Delete(ctx, nomorReg)
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
