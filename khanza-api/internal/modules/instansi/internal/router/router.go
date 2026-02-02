package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/instansi/internal/controller"
)

func Route(app *fiber.App, controller *controller.Controller) {
	modul := app.Group("/v1/instansi")
	modul.Get("/",       controller.GetAll)
	modul.Get("/:id",    controller.GetById)
	modul.Post("/",      controller.Create)
	modul.Put("/:id",    controller.Update)
	modul.Delete("/:id", controller.Delete)
}
