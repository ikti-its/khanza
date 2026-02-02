package router

import (
	"github.com/gofiber/fiber/v2"
	permintaanstokobatController "github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/controller"
	stokobatpasienController "github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/controller"
)

// 📦 Route for permintaan_stok_obat_pasien
func RegisterPermintaanStokObatRoutes(app *fiber.App, controller *permintaanstokobatController.PermintaanStokObatController) {
	permintaan := app.Group("/v1/permintaan-stok-obat")

	permintaan.Post("/", controller.Create)
	permintaan.Get("/", controller.GetAll)
	permintaan.Post("/detail", controller.CreateWithDetail)
	permintaan.Get("/:no_permintaan", controller.GetByNoPermintaan)
	permintaan.Put("/", controller.Update)
	permintaan.Delete("/:no_permintaan", controller.Delete)
	permintaan.Get("/nomor-rawat/:nomor_rawat", controller.GetByNomorRawat)
	permintaan.Put("/:no_permintaan/validasi", controller.UpdateValidasi)
}

// 💊 Route for stok_obat_pasien
func RegisterStokObatPasienRoutes(app *fiber.App, controller *stokobatpasienController.StokObatPasienController) {
	stok := app.Group("/v1/stok-obat-pasien")

	stok.Get("/nomor-rawat/:nomor_rawat", controller.GetByNomorRawat)
	stok.Post("/", controller.Create)
	stok.Get("/", controller.GetAll)
	stok.Get("/:no_permintaan", controller.GetByNoPermintaan)
	stok.Put("/", controller.Update)
	stok.Delete("/:no_permintaan", controller.Delete)
}
