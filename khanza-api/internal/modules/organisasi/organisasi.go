package organisasi

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/organisasi/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/organisasi/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/organisasi/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/organisasi/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvideOrganisasi(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	organisasiRepository := postgres.NewOrganisasiRepository(db)
	organisasiUseCase := usecase.NewOrganisasiUseCase(&organisasiRepository)
	organisasiController := controller.NewOrganisasiController(organisasiUseCase, validator)

	router.Route(
		app,
		organisasiController,
	)
}
