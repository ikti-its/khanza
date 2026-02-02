package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/dokterjaga/internal/controller"
)

func DokterJagaRoute(app *fiber.App, dokterJagaController *controller.DokterJagaController) {
	dokter := app.Group("/v1/dokterjaga")

	dokter.Get("/poliklinik/:nama", middleware.Authenticate([]int{0, 1, 2, 3, 1337}), dokterJagaController.GetByPoliklinik)
	dokter.Get("/poliklinik-list", middleware.Authenticate([]int{0, 1, 2, 3, 1337}), dokterJagaController.GetPoliklinikList)

	dokter.Post("/", middleware.Authenticate([]int{1337, 1}), dokterJagaController.Create)
	dokter.Get("/", middleware.Authenticate([]int{0, 1, 2, 3, 1337}), dokterJagaController.GetAll)
	dokter.Get("/:kode_dokter", middleware.Authenticate([]int{0, 1, 2, 3, 1337}), dokterJagaController.GetByKodeDokter)

	dokter.Put("/", middleware.Authenticate([]int{1337, 1}), dokterJagaController.Update)
	dokter.Delete("/:kode_dokter", middleware.Authenticate([]int{1337, 1}), dokterJagaController.Delete) // expects query param ?hari_kerja=YYYY-MM-DD

	dokter.Get("/status/:status", middleware.Authenticate([]int{1337, 1}), dokterJagaController.GetByStatus)
	dokter.Put("/update-status", middleware.Authenticate([]int{1337, 1}), dokterJagaController.UpdateStatus)
}
