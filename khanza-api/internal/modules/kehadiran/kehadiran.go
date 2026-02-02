package kehadiran

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvideKehadiran(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	kehadiranRepository := postgres.NewKehadiranRepository(db)
	kehadiranUseCase := usecase.NewKehadiranUseCase(&kehadiranRepository)
	kehadiranController := controller.NewKehadiranController(kehadiranUseCase, validator)

	jadwalRepository := postgres.NewJadwalRepository(db)
	jadwalUseCase := usecase.NewJadwalUseCase(&jadwalRepository)
	jadwalController := controller.NewJadwalController(jadwalUseCase, validator)

	cutiRepository := postgres.NewCutiRepository(db)
	cutiUseCase := usecase.NewCutiUseCase(&cutiRepository)
	cutiController := controller.NewCutiController(cutiUseCase, validator)

	router.Route(
		app,
		kehadiranController,
		jadwalController,
		cutiController,
	)
}
