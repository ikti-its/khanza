package stokobatpasien

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/controller"
	permRepo "github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/repository/postgres"
	stokRepo "github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/router"
	permUse "github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/usecase"
	stokUse "github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvideStokObatPasien(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	// ✅ Setup for permintaan_stok_obat_pasien
	permintaanRepo := permRepo.NewPermintaanStokObatRepository(db)
	permintaanUsecase := permUse.NewPermintaanStokObatUseCase(permintaanRepo, db)
	permintaanController := controller.NewPermintaanStokObatController(permintaanUsecase)
	router.RegisterPermintaanStokObatRoutes(app, permintaanController)

	// ✅ Setup for stok_obat_pasien
	stokRepo := stokRepo.NewStokObatPasienRepository(db)
	stokUsecase := stokUse.NewStokObatPasienUseCase(stokRepo)
	stokController := controller.NewStokObatPasienController(stokUsecase)
	router.RegisterStokObatPasienRoutes(app, stokController)
}
