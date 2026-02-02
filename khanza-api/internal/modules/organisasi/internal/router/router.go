package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/organisasi/internal/controller"
)

func Route(
	app *fiber.App,
	organisasiController *controller.OrganisasiController,
) {
	organisasi := app.Group("/v1/organisasi")
	{
		organisasi.Get("/", middleware.Authenticate([]int{0}), organisasiController.Get)
		organisasi.Put("/:id", middleware.Authenticate([]int{1337, 1}), organisasiController.Update)
	}
}
