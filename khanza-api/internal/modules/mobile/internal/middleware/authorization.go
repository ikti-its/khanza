package middleware

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
)

func AuthorizeUserAkun(id string) func(ctx *fiber.Ctx) error {
	return func(ctx *fiber.Ctx) error {
		user := ctx.Locals("user").(string)
		role := ctx.Locals("role").(int)

		if role == 1337 || role == 1 {
			return ctx.Next()
		} else if user == id {
			return ctx.Next()
		} else {
			panic(&exception.ForbiddenError{
				Message: "You are not allowed to access this akun",
			})
		}
	}
}
