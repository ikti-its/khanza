package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/file/internal/controller"
)

func Route(app *fiber.App, controller *controller.FileController) {
	file := app.Group("/v1/file")
	{
		file.Post("/:type", middleware.Authenticate([]int{0}), controller.Upload)
		file.Get("/:type/:name", controller.View)
		file.Get("/:type/:name/download", controller.Download)
		file.Delete("/:type/:name", middleware.Authenticate([]int{1337, 1}), controller.Delete)
	}
}
