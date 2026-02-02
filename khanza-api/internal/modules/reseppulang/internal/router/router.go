package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/controller"
)

func PermintaanResepPulangRoute(app *fiber.App, controller *controller.PermintaanResepPulangController) {
	permintaan := app.Group("/v1/permintaan-resep-pulang", middleware.Authenticate([]int{1337, 0, 1, 2, 3}))

	permintaan.Put("/status/:no_permintaan", controller.UpdateStatus)
	permintaan.Get("/obat/:no_permintaan", controller.GetObatByNoPermintaan)
	permintaan.Post("/", controller.Create)
	permintaan.Get("/", controller.GetAll)
	permintaan.Get("/rawat/:no_rawat", controller.GetByNoRawat)
	permintaan.Get("/:no_permintaan", controller.GetByNoPermintaan)
	permintaan.Put("/:no_permintaan", controller.Update)
	permintaan.Delete("/:no_permintaan", controller.Delete)
}

func ResepPulangRoute(app *fiber.App, controller *controller.ResepPulangController) {
	resep := app.Group("/v1/resep-pulang", middleware.Authenticate([]int{1337, 0, 1, 2, 3}))

	resep.Post("/", controller.Create)
	resep.Get("/", controller.GetAll)
	resep.Get("/rawat/:no_rawat", controller.GetByNoRawat)
	resep.Get("/:no_rawat/:kode_brng/:tanggal/:jam", controller.GetByCompositeKey)
	resep.Put("/:no_rawat/:kode_brng/:tanggal/:jam", controller.Update)
	resep.Delete("/:no_rawat/:kode_brng/:tanggal/:jam", controller.Delete)
}
