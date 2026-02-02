package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/auth/internal/controller"
)

func Route(app *fiber.App, controller *controller.AuthController) {
	auth := app.Group("/v1/auth")
	{
		auth.Get("/", middleware.Authenticate([]int{0}), controller.Get)
		auth.Get("/refresh", middleware.Authenticate([]int{0}), controller.Refresh)
		auth.Post("/login", controller.Login)
	}
}
