package inventory

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvideInventory(app *fiber.App, db *sqlx.DB) {
	brgmedisRepository := postgres.NewBrgmedisRepository(db)
	brgmedisUseCase := usecase.NewBrgmedisUseCase(&brgmedisRepository)
	brgmedisController := controller.NewBrgmedisController(brgmedisUseCase)

	opnameRepository := postgres.NewOpnameRepository(db)
	opnameUseCase := usecase.NewOpnameUseCase(&opnameRepository)
	opnameController := controller.NewOpnameController(opnameUseCase)

	gudangbarangRepository := postgres.NewGudangBarangRepository(db)
	gudangbarangUseCase := usecase.NewGudangBarangUseCase(&gudangbarangRepository)
	gudangbarangController := controller.NewGudangBarangController(gudangbarangUseCase)

	mutasiRepository := postgres.NewMutasiRepository(db)
	mutasiUseCase := usecase.NewMutasiUseCase(&mutasiRepository)
	mutasiController := controller.NewMutasiController(mutasiUseCase)

	stokkeluarRepository := postgres.NewStokKeluarRepository(db)
	stokkeluarUseCase := usecase.NewStokKeluarUseCase(&stokkeluarRepository)
	stokkeluarController := controller.NewStokKeluarController(stokkeluarUseCase)

	transaksiRepository := postgres.NewTransaksiRepository(db)
	transaksiUseCase := usecase.NewTransaksiUseCase(&transaksiRepository)
	transaksiController := controller.NewTransaksiController(transaksiUseCase)

	penerimaanRepository := postgres.NewPenerimaanRepository(db)
	penerimaanUseCase := usecase.NewPenerimaanUseCase(&penerimaanRepository)
	penerimaanController := controller.NewPenerimaanController(penerimaanUseCase)

	batchRepository := postgres.NewBatchRepository(db)
	batchUseCase := usecase.NewBatchUseCase(&batchRepository)
	batchController := controller.NewBatchController(batchUseCase)

	router.Route(
		app,
		brgmedisController,
		opnameController,
		gudangbarangController,
		mutasiController,
		stokkeluarController,
		transaksiController,
		penerimaanController,
		batchController,
	)
}
