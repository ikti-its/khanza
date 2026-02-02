package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/controller"
)

func RujukanRoute(
	app *fiber.App,
	masukCtrl *controller.RujukanMasukController,
	keluarCtrl *controller.RujukanKeluarController,
) {
	// Group for Rujukan Masuk with authentication middleware
	rujukanMasuk := app.Group("/v1/rujukanmasuk", middleware.Authenticate([]int{1337, 0, 1, 2, 3}))
	rujukanMasuk.Post("/", masukCtrl.Create)
	rujukanMasuk.Get("/", masukCtrl.GetAll)
	rujukanMasuk.Get("/:nomor_rujuk", masukCtrl.GetByNomorRawat)
	rujukanMasuk.Put("/:nomor_rujuk", masukCtrl.Update)
	rujukanMasuk.Delete("/:nomor_rujuk", masukCtrl.Delete)

	// Group for Rujukan Keluar with authentication middleware
	rujukanKeluar := app.Group("/v1/rujukankeluar", middleware.Authenticate([]int{1337, 0, 1, 2, 3}))
	rujukanKeluar.Post("/", keluarCtrl.Create)
	rujukanKeluar.Get("/", keluarCtrl.GetAll)
	rujukanKeluar.Get("/:nomor_rujuk", keluarCtrl.GetByNomorRawat)
	rujukanKeluar.Put("/:nomor_rujuk", keluarCtrl.Update)
	rujukanKeluar.Delete("/:nomor_rujuk", keluarCtrl.Delete)
}
