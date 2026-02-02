package exception

import (
	"errors"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/model"
)

func Handler(ctx *fiber.Ctx, err error) error {
	var (
		badRequestError     *BadRequestError
		unauthorizedError   *UnauthorizedError
		forbiddenError      *ForbiddenError
		notFoundError       *NotFoundError
		internalServerError *InternalServerError
	)

	switch {
	case errors.As(err, &badRequestError):
		return ctx.Status(fiber.StatusBadRequest).JSON(model.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   badRequestError.Error(),
		})
	case errors.As(err, &unauthorizedError):
		return ctx.Status(fiber.StatusUnauthorized).JSON(model.Response{
			Code:   fiber.StatusUnauthorized,
			Status: "Unauthorized",
			Data:   unauthorizedError.Error(),
		})
	case errors.As(err, &forbiddenError):
		return ctx.Status(fiber.StatusForbidden).JSON(model.Response{
			Code:   fiber.StatusForbidden,
			Status: "Forbidden",
			Data:   forbiddenError.Error(),
		})
	case errors.As(err, &notFoundError):
		return ctx.Status(fiber.StatusNotFound).JSON(model.Response{
			Code:   fiber.StatusNotFound,
			Status: "Not Found",
			Data:   notFoundError.Error(),
		})
	case errors.As(err, &internalServerError):
		return ctx.Status(fiber.StatusInternalServerError).JSON(model.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Internal Server Error",
			Data:   internalServerError.Error(),
		})
	default:
		return ctx.Status(fiber.StatusInternalServerError).JSON(model.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Internal Server Error",
			Data:   err.Error(),
		})
	}
}
