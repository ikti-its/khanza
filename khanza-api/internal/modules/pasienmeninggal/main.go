package pasienmeninggal

import (
	"github.com/gofiber/fiber/v2"
	"github.com/jmoiron/sqlx"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/pasienmeninggal/internal/usecase"
	"github.com/ikti-its/khanza-api/internal/modules/pasienmeninggal/internal/repository"
	"github.com/ikti-its/khanza-api/internal/modules/pasienmeninggal/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/pasienmeninggal/internal/router"
)

func Provide(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	// Initialize repository 
	Repository := repository.NewRepository(db)
	// Initialize use case 
	UseCase := usecase.NewUseCase(Repository)
	// Initialize controller 
	Controller := controller.NewController(UseCase)

	// Set up routes 
	router.Route(app, Controller) 
}
