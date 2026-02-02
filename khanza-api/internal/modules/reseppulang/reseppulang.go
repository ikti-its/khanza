package reseppulang

import (
	"github.com/gofiber/fiber/v2"
	"github.com/jmoiron/sqlx"

	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/repository"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/usecase"
)

func ProvidePermintaanResepPulang(app *fiber.App, db *sqlx.DB) {
	// Setup Permintaan Resep Pulang
	var permintaanResepPulangRepo repository.PermintaanResepPulangRepository = postgres.NewPermintaanResepPulangRepository(db)
	permintaanResepPulangUseCase := usecase.NewPermintaanResepPulangUseCase(permintaanResepPulangRepo)
	permintaanResepPulangController := controller.NewPermintaanResepPulangController(permintaanResepPulangUseCase)

	// Setup Resep Pulang
	var resepPulangRepo repository.ResepPulangRepository = postgres.NewResepPulangRepository(db)
	resepPulangUseCase := usecase.NewResepPulangUseCase(resepPulangRepo)
	resepPulangController := controller.NewResepPulangController(resepPulangUseCase)

	// Router
	router.PermintaanResepPulangRoute(app, permintaanResepPulangController)
	router.ResepPulangRoute(app, resepPulangController)
}
