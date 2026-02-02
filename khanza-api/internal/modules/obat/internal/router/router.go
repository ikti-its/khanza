package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/obat/internal/controller"
)

func PemberianObatRoute(app *fiber.App, pemberianObatController *controller.PemberianObatController) {
	obat := app.Group("/v1/pemberian-obat")

	obat.Get("/databarang", middleware.Authenticate([]int{1337, 0, 1, 2, 3}), pemberianObatController.GetAllDataBarang)
	obat.Post("/", middleware.Authenticate([]int{1337, 1, 0}), pemberianObatController.Create)
	obat.Get("/", middleware.Authenticate([]int{1337, 0, 1, 2, 3}), pemberianObatController.GetAll)
	obat.Get("/:nomor_rawat", middleware.Authenticate([]int{1337, 0, 1, 2, 3}), pemberianObatController.GetByNomorRawat)
	obat.Put("/:nomor_rawat", middleware.Authenticate([]int{1337, 1}), pemberianObatController.Update)
	obat.Delete("/:nomor_rawat/:jam_beri", middleware.Authenticate([]int{1337, 1}), pemberianObatController.Delete)
}

func GudangBarangRoute(app *fiber.App, gudangBarangController *controller.GudangBarangController) {
	gudang := app.Group("/v1/gudang-barang")

	gudang.Post("/", middleware.Authenticate([]int{1337, 1}), gudangBarangController.Create)
	gudang.Get("/", middleware.Authenticate([]int{1337, 0, 1, 2, 3}), gudangBarangController.GetAll)
	gudang.Get("/:id", middleware.Authenticate([]int{1337, 0, 1, 2, 3}), gudangBarangController.GetByID)
	gudang.Put("/:id", middleware.Authenticate([]int{1337, 1}), gudangBarangController.Update)
	gudang.Delete("/:id", middleware.Authenticate([]int{1337, 1}), gudangBarangController.Delete)
}
