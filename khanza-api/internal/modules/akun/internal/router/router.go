package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/akun/internal/controller"
)

func Route(
	app *fiber.App,
	controller *controller.AkunController,
	alamatController *controller.AlamatController,
) {
	base := app.Group("/v1/akun")

	alamat := base.Group("/alamat")
	{
		alamat.Post("/", middleware.Authenticate([]int{0}), alamatController.Create)
		alamat.Get("/", middleware.Authenticate([]int{1337, 1}), alamatController.Get)
		alamat.Get("/:id", middleware.Authenticate([]int{0}), alamatController.GetById)
		alamat.Put("/:id", middleware.Authenticate([]int{0}), alamatController.Update)
		alamat.Delete("/:id", middleware.Authenticate([]int{1337, 1}), alamatController.Delete)
	}

	akun := base.Group("/")
	{
		akun.Post("/", middleware.Authenticate([]int{1337, 1}), controller.Create)
		akun.Get("/", middleware.Authenticate([]int{0}), controller.Get)
		akun.Get("/:id", middleware.Authenticate([]int{0}), controller.GetById)
		akun.Put("/:id", middleware.Authenticate([]int{0}), controller.Update)
		akun.Delete("/:id", middleware.Authenticate([]int{1337, 1}), controller.Delete)
	}
}
