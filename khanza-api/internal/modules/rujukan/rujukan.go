package rujukan

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/repository"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvideRujukan(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	// Rujukan Masuk setup
	var rujukanMasukRepo repository.RujukanMasukRepository = postgres.NewRujukanMasukRepository(db)
	rujukanMasukUseCase := usecase.NewRujukanMasukUseCase(rujukanMasukRepo)
	rujukanMasukController := controller.NewRujukanMasukController(rujukanMasukUseCase)

	// Rujukan Keluar setup
	var rujukanKeluarRepo repository.RujukanKeluarRepository = postgres.NewRujukanKeluarRepository(db)
	rujukanKeluarUseCase := usecase.NewRujukanKeluarUseCase(rujukanKeluarRepo)
	rujukanKeluarController := controller.NewRujukanKeluarController(rujukanKeluarUseCase)

	// Register routes for both
	router.RujukanRoute(app, rujukanMasukController, rujukanKeluarController)
}
