package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/example/internal/controller"

)

func Route(app *fiber.App, Controller *controller.Controller) {
	modul := app.Group("/v1/example")
	modul.Get("/",       Controller.GetAll)
	modul.Get("/:id",    Controller.GetById)
	modul.Post("/",      Controller.Create)
	modul.Put("/:id",    Controller.Update)
	modul.Delete("/:id", Controller.Delete)
}
