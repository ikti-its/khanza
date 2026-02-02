package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/ugd/internal/controller"
)

func UGDRoute(app *fiber.App, UGDController *controller.UGDController) {
	ugd := app.Group("/v1/ugd", middleware.Authenticate([]int{1337, 0, 1, 2, 3}))

	ugd.Post("/", UGDController.Create)
	ugd.Get("/", UGDController.GetAll)
	ugd.Get("/:nomor_reg", UGDController.GetByNomorReg)
	ugd.Put("/:nomor_reg", UGDController.Update)
	ugd.Delete("/:nomor_reg", UGDController.Delete)
}
