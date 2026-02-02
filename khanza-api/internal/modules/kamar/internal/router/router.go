package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/kamar/internal/controller"
)

func KamarRoute(app *fiber.App, kamarController *controller.KamarController) {
	kamar := app.Group("/v1/kamar")

	// Public endpoints (optional – if not needed, remove)
	kamar.Get("/available", middleware.Authenticate([]int{1337, 0, 1, 2, 3}), kamarController.GetAvailableRooms)
	kamar.Get("/kelas", middleware.Authenticate([]int{1337, 0, 1, 2, 3}), kamarController.GetKelasOptions)

	// Protected CRUD operations
	kamar.Post("/", middleware.Authenticate([]int{1337, 1}), kamarController.Create)
	kamar.Get("/", middleware.Authenticate([]int{1337, 0, 1, 2, 3}), kamarController.GetAll)
	kamar.Get("/:nomor_bed", middleware.Authenticate([]int{1337, 0, 1, 2, 3}), kamarController.GetByNomorBed)
	kamar.Put("/:nomor_bed", middleware.Authenticate([]int{1337, 1}), kamarController.Update)
	kamar.Delete("/:nomor_bed", middleware.Authenticate([]int{1337, 1}), kamarController.Delete)
	kamar.Put("/:nomor_bed/status", middleware.Authenticate([]int{1337, 1}), kamarController.UpdateStatusKamar)
}
