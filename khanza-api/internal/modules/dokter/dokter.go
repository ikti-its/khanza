package dokter

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/dokter/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/dokter/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/dokter/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/dokter/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvideDokter(app *fiber.App, db *sqlx.DB) {
	dokterRepo := postgres.NewDokterRepository(db)
	dokterUseCase := usecase.NewDokterUseCase(dokterRepo)
	dokterController := controller.NewDokterController(dokterUseCase)

	router.DokterRoute(app, dokterController)
}
