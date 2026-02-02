package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/controller"
)

func Route(
	app *fiber.App,
	brgmedisController *controller.BrgmedisController,
	opnameController *controller.OpnameController,
	gudangbarangController *controller.GudangBarangController,
	mutasiController *controller.MutasiController,
	stokkeluarController *controller.StokKeluarController,
	transaksiController *controller.TransaksiController,
	penerimaanController *controller.PenerimaanController,
	batchController *controller.BatchController,
) {
	inventory := app.Group("/v1/inventory")

	brgmedis := inventory.Group("/barang")
	{
		brgmedis.Post("/", middleware.Authenticate([]int{1337, 1, 2}), brgmedisController.Create)
		brgmedis.Get("/", middleware.Authenticate([]int{1337, 1, 2}), brgmedisController.Get)
		brgmedis.Get("/:id", middleware.Authenticate([]int{1337, 1, 2}), brgmedisController.GetById)
		brgmedis.Put("/:id", middleware.Authenticate([]int{1337, 1, 2}), brgmedisController.Update)
		brgmedis.Delete("/:id", middleware.Authenticate([]int{1337, 1, 2}), brgmedisController.Delete)
	}

	opname := inventory.Group("/opname")
	{
		opname.Post("/", middleware.Authenticate([]int{1337, 1, 2}), opnameController.Create)
		opname.Get("/", middleware.Authenticate([]int{1337, 1, 2}), opnameController.Get)
		opname.Get("/:id", middleware.Authenticate([]int{1337, 1, 2}), opnameController.GetById)
		opname.Put("/:id", middleware.Authenticate([]int{1337, 1, 2}), opnameController.Update)
		opname.Delete("/:id", middleware.Authenticate([]int{1337, 1, 2}), opnameController.Delete)
	}

	gudangbarang := inventory.Group("/gudang")
	{
		gudangbarang.Get("/barang/kode/:kode_barang", middleware.Authenticate([]int{1337, 1, 2}), gudangbarangController.GetByKodeBarang)
		gudangbarang.Post("/", middleware.Authenticate([]int{1337, 1, 2}), gudangbarangController.Create)
		gudangbarang.Get("/", middleware.Authenticate([]int{1337, 1, 2}), gudangbarangController.Get)
		gudangbarang.Get("/barang/:id", middleware.Authenticate([]int{1337, 1, 2}), gudangbarangController.GetByIdMedis)
		gudangbarang.Get("/:id", middleware.Authenticate([]int{1337, 1, 2}), gudangbarangController.GetById)
		gudangbarang.Put("/:id", middleware.Authenticate([]int{1337, 1, 2}), gudangbarangController.Update)
		gudangbarang.Delete("/:id", middleware.Authenticate([]int{1337, 1, 2}), gudangbarangController.Delete)
	}

	mutasi := inventory.Group("/mutasi")
	{
		mutasi.Post("/", middleware.Authenticate([]int{1337, 1, 2}), mutasiController.Create)
		mutasi.Get("/", middleware.Authenticate([]int{1337, 1, 2}), mutasiController.Get)
		mutasi.Get("/:id", middleware.Authenticate([]int{1337, 1, 2}), mutasiController.GetById)
		mutasi.Put("/:id", middleware.Authenticate([]int{1337, 1, 2}), mutasiController.Update)
		mutasi.Delete("/:id", middleware.Authenticate([]int{1337, 1, 2}), mutasiController.Delete)
	}

	stokkeluar := inventory.Group("/stok")
	{
		stokkeluar.Post("/", middleware.Authenticate([]int{1337, 1, 2}), stokkeluarController.Create)
		stokkeluar.Get("/", middleware.Authenticate([]int{1337, 1, 2}), stokkeluarController.Get)
		stokkeluar.Get("/:id", middleware.Authenticate([]int{1337, 1, 2}), stokkeluarController.GetById)
		stokkeluar.Put("/:id", middleware.Authenticate([]int{1337, 1, 2}), stokkeluarController.Update)
		stokkeluar.Delete("/:id", middleware.Authenticate([]int{1337, 1, 2}), stokkeluarController.Delete)
	}

	transaksi := inventory.Group("/transaksi")
	{
		transaksi.Post("/", middleware.Authenticate([]int{1337, 1, 2}), transaksiController.Create)
		transaksi.Get("/", middleware.Authenticate([]int{1337, 1, 2}), transaksiController.Get)
		transaksi.Get("/:id", middleware.Authenticate([]int{1337, 1, 2}), transaksiController.GetById)
		transaksi.Get("/stok/:id", middleware.Authenticate([]int{1337, 1, 2}), transaksiController.GetByStok)
		transaksi.Put("/:id", middleware.Authenticate([]int{1337, 1, 2}), transaksiController.Update)
		transaksi.Delete("/:id", middleware.Authenticate([]int{1337, 1, 2}), transaksiController.Delete)
	}

	penerimaan := inventory.Group("/penerimaan")
	{
		penerimaan.Post("/", middleware.Authenticate([]int{1337, 1, 2}), penerimaanController.Create)
		penerimaan.Get("/", middleware.Authenticate([]int{1337, 1, 2}), penerimaanController.Get)
		penerimaan.Get("/:id", middleware.Authenticate([]int{1337, 1, 2}), penerimaanController.GetById)
		penerimaan.Put("/:id", middleware.Authenticate([]int{1337, 1, 2}), penerimaanController.Update)
		penerimaan.Delete("/:id", middleware.Authenticate([]int{1337, 1, 2}), penerimaanController.Delete)
	}

	detail := inventory.Group("/detail")
	{
		detail.Post("/", middleware.Authenticate([]int{1337, 1, 2}), penerimaanController.DetailCreate)
		detail.Get("/", middleware.Authenticate([]int{1337, 1, 2}), penerimaanController.DetailGet)
		detail.Get("/:penerimaan", middleware.Authenticate([]int{1337, 1, 2}), penerimaanController.DetailGetById)
		detail.Get("/:penerimaan/:barang", middleware.Authenticate([]int{1337, 1, 2}), penerimaanController.DetailGetByPenerimaanBarang)
		detail.Put("/:penerimaan/:barang", middleware.Authenticate([]int{1337, 1, 2}), penerimaanController.DetailUpdate)
		detail.Delete("/:penerimaan/:barang", middleware.Authenticate([]int{1337, 1, 2}), penerimaanController.DetailDelete)
	}

	batch := inventory.Group("/batch")
	{
		batch.Post("/", middleware.Authenticate([]int{1337, 1, 2}), batchController.Create)
		batch.Get("/", middleware.Authenticate([]int{1337, 1, 2}), batchController.Get)
		batch.Get("/:batch", middleware.Authenticate([]int{1337, 1, 2}), batchController.GetByBatch)
		batch.Get("/:batch/:faktur/:barang", middleware.Authenticate([]int{1337, 1, 2}), batchController.GetById)
		batch.Put("/:batch/:faktur/:barang", middleware.Authenticate([]int{1337, 1, 2}), batchController.Update)
		batch.Delete("/:batch/:faktur/:barang", middleware.Authenticate([]int{1337, 1, 2}), batchController.Delete)
	}
}
