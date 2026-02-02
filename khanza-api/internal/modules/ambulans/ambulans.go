package ambulans

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/ambulans/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/ambulans/internal/repository"
	"github.com/ikti-its/khanza-api/internal/modules/ambulans/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/ambulans/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/ambulans/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvideAmbulans(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	// Initialize repository for Ambulans
	var ambulansRepository repository.AmbulansRepository = postgres.NewAmbulansRepository(db)

	// Initialize use case for Ambulans
	ambulansUseCase := usecase.NewAmbulansUseCase(ambulansRepository)
	// Initialize controller for Ambulans
	ambulansController := controller.NewAmbulansController(ambulansUseCase)

	// Set up routes for Ambulans
	router.AmbulansRoute(app, ambulansController)
}
