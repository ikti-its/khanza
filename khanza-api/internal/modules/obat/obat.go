package obat

import (
	"github.com/gofiber/fiber/v2"
	"github.com/jmoiron/sqlx"

	obatController "github.com/ikti-its/khanza-api/internal/modules/obat/internal/controller"
	obatRepository "github.com/ikti-its/khanza-api/internal/modules/obat/internal/repository"
	obatPostgres "github.com/ikti-its/khanza-api/internal/modules/obat/internal/repository/postgres"
	obatRouter "github.com/ikti-its/khanza-api/internal/modules/obat/internal/router"
	obatUsecase "github.com/ikti-its/khanza-api/internal/modules/obat/internal/usecase"

	gudangController "github.com/ikti-its/khanza-api/internal/modules/obat/internal/controller"
	gudangRepository "github.com/ikti-its/khanza-api/internal/modules/obat/internal/repository"
	gudangPostgres "github.com/ikti-its/khanza-api/internal/modules/obat/internal/repository/postgres"
	gudangRouter "github.com/ikti-its/khanza-api/internal/modules/obat/internal/router"
	gudangUsecase "github.com/ikti-its/khanza-api/internal/modules/obat/internal/usecase"
)

func ProvidePemberianObat(app *fiber.App, db *sqlx.DB) {
	// Pemberian Obat DI
	var pemberianObatRepo obatRepository.PemberianObatRepository = obatPostgres.NewPemberianObatRepository(db)
	pemberianObatUseCase := obatUsecase.NewPemberianObatUseCase(pemberianObatRepo)
	pemberianObatController := obatController.NewPemberianObatController(pemberianObatUseCase)
	obatRouter.PemberianObatRoute(app, pemberianObatController)

	// Gudang Barang DI
	var gudangBarangRepo gudangRepository.GudangBarangRepository = gudangPostgres.NewGudangBarangRepository(db)
	gudangBarangUseCase := gudangUsecase.NewGudangBarangUseCase(gudangBarangRepo)
	gudangBarangController := gudangController.NewGudangBarangController(gudangBarangUseCase)
	gudangRouter.GudangBarangRoute(app, gudangBarangController)
}
