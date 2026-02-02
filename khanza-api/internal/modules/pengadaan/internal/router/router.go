package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/controller"
)

func Route(
	app *fiber.App,
	pengajuanController *controller.PengajuanController,
	persetujuanController *controller.PersetujuanController,
	pesananController *controller.PesananController,
	pemesananController *controller.PemesananController,
	penerimaanController *controller.PenerimaanController,
	tagihanController *controller.TagihanController,
) {
	pengadaan := app.Group("/v1/pengadaan")

	pengajuan := pengadaan.Group("/pengajuan")
	{
		pengajuan.Post("/", middleware.Authenticate([]int{1337, 1, 4001, 4003}), pengajuanController.Create)
		pengajuan.Get("/", middleware.Authenticate([]int{1337, 1, 2}), pengajuanController.Get)
		pengajuan.Get("/:id", middleware.Authenticate([]int{1337, 1, 2}), pengajuanController.GetById)
		pengajuan.Put("/:id", middleware.Authenticate([]int{1337, 1, 4001, 4003, 4004, 5001}), pengajuanController.Update)
		pengajuan.Delete("/:id", middleware.Authenticate([]int{1337, 1, 4001, 4003}), pengajuanController.Delete)
	}

	persetujuan := pengadaan.Group("/persetujuan")
	{
		persetujuan.Post("/", middleware.Authenticate([]int{1337, 1, 4001, 4003, 5001}), persetujuanController.Create)
		persetujuan.Get("/", middleware.Authenticate([]int{1337, 1, 2}), persetujuanController.Get)
		persetujuan.Get("/:id", middleware.Authenticate([]int{1337, 1, 2}), persetujuanController.GetById)
		persetujuan.Put("/:id", middleware.Authenticate([]int{1337, 1, 4001, 5001}), persetujuanController.Update)
		persetujuan.Delete("/:id", middleware.Authenticate([]int{1337, 1, 4001, 4003, 5001}), persetujuanController.Delete)
	}

	pesanan := pengadaan.Group("/pesanan")
	{
		pesanan.Post("/", middleware.Authenticate([]int{1337, 1, 4001, 4003}), pesananController.Create)
		pesanan.Get("/", middleware.Authenticate([]int{1337, 1, 2}), pesananController.Get)
		pesanan.Get("/pengajuan/:id", middleware.Authenticate([]int{1337, 1, 2}), pesananController.GetByIdPengajuan)
		pesanan.Get("/:id", middleware.Authenticate([]int{1337, 1, 2}), pesananController.GetById)
		pesanan.Put("/:id", middleware.Authenticate([]int{1337, 1, 4001, 4003, 4004}), pesananController.Update)
		pesanan.Delete("/:id", middleware.Authenticate([]int{1337, 1, 4001, 4003}), pesananController.Delete)
	}

	pemesanan := pengadaan.Group("/pemesanan")
	{
		pemesanan.Post("/", middleware.Authenticate([]int{1337, 1, 4001, 4003}), pemesananController.Create)
		pemesanan.Get("/", middleware.Authenticate([]int{1337, 1, 2}), pemesananController.Get)
		pemesanan.Get("/:id", middleware.Authenticate([]int{1337, 1, 2}), pemesananController.GetById)
		pemesanan.Put("/:id", middleware.Authenticate([]int{1337, 1, 4001, 4003}), pemesananController.Update)
		pemesanan.Delete("/:id", middleware.Authenticate([]int{1337, 1, 4001, 4003}), pemesananController.Delete)
	}

	penerimaan := pengadaan.Group("/penerimaan")
	{
		penerimaan.Post("/", middleware.Authenticate([]int{1337, 1, 4001, 4004}), penerimaanController.Create)
		penerimaan.Get("/", middleware.Authenticate([]int{1337, 1, 2}), penerimaanController.Get)
		penerimaan.Get("/:id", middleware.Authenticate([]int{1337, 1, 2}), penerimaanController.GetById)
		penerimaan.Put("/:id", middleware.Authenticate([]int{1337, 1, 4001, 4004}), penerimaanController.Update)
		penerimaan.Delete("/:id", middleware.Authenticate([]int{1337, 1, 4001, 4004}), penerimaanController.Delete)
	}

	tagihan := pengadaan.Group("/tagihan")
	{
		tagihan.Post("/", middleware.Authenticate([]int{1337, 1, 5001}), tagihanController.Create)
		tagihan.Get("/", middleware.Authenticate([]int{1337, 1, 2}), tagihanController.Get)
		tagihan.Get("/:id", middleware.Authenticate([]int{1337, 1, 2}), tagihanController.GetById)
		tagihan.Put("/:id", middleware.Authenticate([]int{1337, 1, 5001}), tagihanController.Update)
		tagihan.Delete("/:id", middleware.Authenticate([]int{1337, 1, 5001}), tagihanController.Delete)
	}
}
