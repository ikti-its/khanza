package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/rawatinap/internal/controller"
)

func RawatInapRoute(app *fiber.App, rawatInapController *controller.RawatInapController) {
	rawat := app.Group("/v1/rawatinap")

	// 🔐 Only authorized roles can create, update, delete
	rawat.Post("/", middleware.Authenticate([]int{0, 1, 2, 1337}), rawatInapController.Create)
	rawat.Put("/:nomor_rawat", middleware.Authenticate([]int{0, 1, 2, 1337}), rawatInapController.Update)
	rawat.Delete("/:nomor_rawat", middleware.Authenticate([]int{0, 1, 2, 1337}), rawatInapController.Delete)

	// 🔓 Allow broader access to view data
	rawat.Get("/", middleware.Authenticate([]int{0, 1, 2, 3, 1337}), rawatInapController.GetAll)
	rawat.Get("/:nomor_rawat", middleware.Authenticate([]int{0, 1, 2, 3, 1337}), rawatInapController.GetByNomorRawat)
}
