package kelahiranbayi

import (
	"github.com/gofiber/fiber/v2"
	"github.com/jmoiron/sqlx"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/kelahiranbayi/public/usecase"
	"github.com/ikti-its/khanza-api/internal/modules/kelahiranbayi/public/repository"
	"github.com/ikti-its/khanza-api/internal/modules/kelahiranbayi/public/controller"
	"github.com/ikti-its/khanza-api/internal/modules/kelahiranbayi/public/router"

	masterrepo "github.com/ikti-its/khanza-api/internal/modules/masterpasien/public/repository"
)

func Provide(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	// Initialize repository 
	kelahiranRepo := repository.NewRepository(db)
	masterRepo := masterrepo.NewRepository(db) // <- tambahkan repo masterpasien
	// Initialize use case 
	UseCase := usecase.NewUseCase(kelahiranRepo, masterRepo)
	// Initialize controller 
	Controller := controller.NewController(UseCase)

	// Set up routes 
	router.Route(app, Controller) 
}
