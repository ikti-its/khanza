package lembur

import (
	"github.com/gofiber/fiber/v2"
	"github.com/jmoiron/sqlx"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/lembur/internal/usecase"
	"github.com/ikti-its/khanza-api/internal/modules/lembur/internal/repository"
	"github.com/ikti-its/khanza-api/internal/modules/lembur/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/lembur/internal/router"
)

func Provide(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	// Initialize repository for Kamar
	Repository := repository.NewRepository(db)
	// Initialize use case for Kamar
	UseCase := usecase.NewUseCase(Repository)
	// Initialize controller for Kamar
	Controller := controller.NewController(UseCase)

	// Set up routes for Kamar
	router.Route(app, Controller) // Use KamarRoute to set up routes
}
