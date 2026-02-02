package pegawai

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvidePegawai(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	pegawaiRepository := postgres.NewPegawaiRepository(db)
	pegawaiUseCase := usecase.NewPegawaiUseCase(&pegawaiRepository)
	pegawaiController := controller.NewPegawaiController(pegawaiUseCase, validator)

	berkasRepository := postgres.NewBerkasRepository(db)
	berkasUseCase := usecase.NewBerkasUseCase(&berkasRepository)
	berkasController := controller.NewBerkasController(berkasUseCase, validator)

	fotoRepository := postgres.NewFotoRepository(db)
	fotoUseCase := usecase.NewFotoUseCase(&fotoRepository)
	fotoController := controller.NewFotoController(fotoUseCase, validator)

	router.Route(
		app,
		pegawaiController,
		berkasController,
		fotoController,
	)
}
