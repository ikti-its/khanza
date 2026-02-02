package mobile

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvideMobile(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	homeRepository := postgres.NewHomeRepository(db)
	homeUseCase := usecase.NewHomeUseCase(&homeRepository)
	homeController := controller.NewHomeController(homeUseCase)

	profileRepository := postgres.NewProfileRepository(db)
	profileUseCase := usecase.NewProfileUseCase(&profileRepository)
	profileController := controller.NewProfileController(profileUseCase, validator)

	pegawaiRepository := postgres.NewPegawaiRepository(db)
	pegawaiUseCase := usecase.NewPegawaiUseCase(&pegawaiRepository)
	pegawaiController := controller.NewPegawaiController(pegawaiUseCase)

	ketersediaanRepository := postgres.NewKetersediaanRepository(db)
	ketersediaanUseCase := usecase.NewKetersediaanUseCase(&ketersediaanRepository)
	ketersediaanController := controller.NewKetersediaanController(ketersediaanUseCase)

	kehadiranRepository := postgres.NewKehadiranRepository(db)
	kehadiranUseCase := usecase.NewKehadiranUseCase(&kehadiranRepository)
	kehadiranController := controller.NewKehadiranController(kehadiranUseCase)

	jadwalRepository := postgres.NewJadwalRepository(db)
	jadwalUseCase := usecase.NewJadwalUseCase(&jadwalRepository)
	jadwalController := controller.NewJadwalController(jadwalUseCase)

	tukarRepository := postgres.NewTukarRepository(db)
	tukarUseCase := usecase.NewTukarUseCase(&tukarRepository)
	tukarController := controller.NewTukarController(tukarUseCase)

	router.Route(
		app,
		homeController,
		profileController,
		pegawaiController,
		ketersediaanController,
		kehadiranController,
		jadwalController,
		tukarController,
	)
}
