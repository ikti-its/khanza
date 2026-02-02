package kamar

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/kamar/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/kamar/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/kamar/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/kamar/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvideKamar(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	// Initialize repository for Kamar
	kamarRepository := postgres.NewKamarRepository(db)
	// Initialize use case for Kamar
	kamarUseCase := usecase.NewKamarUseCase(kamarRepository)
	// Initialize controller for Kamar
	kamarController := controller.NewKamarController(kamarUseCase)

	// Set up routes for Kamar
	router.KamarRoute(app, kamarController) // Use KamarRoute to set up routes
}
