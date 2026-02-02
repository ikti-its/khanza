package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/web/internal/controller"
)

func Route(
	app *fiber.App,
	homeController *controller.HomeController,
	notificationController *controller.NotificationController,
) {
	web := app.Group("/v1/w")

	home := web.Group("/home")
	{
		home.Get("/pegawai", middleware.Authenticate([]int{1337, 1, 2, 3}), homeController.GetHomePegawai)
	}

	notification := web.Group("/notification")
	{
		notification.Post("/", middleware.Authenticate([]int{1337, 1, 2, 3}), notificationController.Create)
		notification.Get("/:id", middleware.Authenticate([]int{1337, 1, 2, 3}), notificationController.Get)
		notification.Put("/:id", middleware.Authenticate([]int{1337, 1, 2, 3}), notificationController.Update)
	}
}
