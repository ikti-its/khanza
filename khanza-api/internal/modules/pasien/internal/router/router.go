package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/pasien/internal/controller"
)

func RegisterPasienRoutes(router fiber.Router, controller *controller.PasienController) {
	pasien := router.Group("/v1/pasien", middleware.Authenticate([]int{1337, 0, 1, 2, 3}))

	pasien.Get("/", controller.GetAll)
	pasien.Get("/page", controller.GetPaginated)
	pasien.Get("/:no_rkm_medis", controller.GetByNoRkmMedis)
	pasien.Post("/", controller.Create)
	pasien.Put("/:no_rkm_medis", controller.Update)
	pasien.Delete("/:no_rkm_medis", controller.Delete)
}
