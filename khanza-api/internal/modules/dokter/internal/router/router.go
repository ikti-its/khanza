package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/dokter/internal/controller"
)

func DokterRoute(app *fiber.App, dokterController *controller.DokterController) {
	dokter := app.Group("/v1/dokter")

	dokter.Get("/", dokterController.GetAll)
	dokter.Get("/:kd_dokter", dokterController.GetByKodeDokter)
}
