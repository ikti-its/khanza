package masterpasien

import (
	"github.com/gofiber/fiber/v2"
	"github.com/jmoiron/sqlx"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/masterpasien/public/usecase"
	"github.com/ikti-its/khanza-api/internal/modules/masterpasien/public/repository"
	"github.com/ikti-its/khanza-api/internal/modules/masterpasien/public/controller"
	"github.com/ikti-its/khanza-api/internal/modules/masterpasien/public/router"
	kelahiranrepo "github.com/ikti-its/khanza-api/internal/modules/kelahiranbayi/public/repository"
)

func Provide(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	// Init repo
	repo := repository.NewRepository(db)
	kelahiranRepo := kelahiranrepo.NewRepository(db)

	// Pass 2 argumen ke usecase
	useCase := usecase.NewUseCase(repo, kelahiranRepo)

	// Init controller + route
	controller := controller.NewController(useCase)
	router.Route(app, controller)
}
