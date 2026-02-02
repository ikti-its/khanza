package ref

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/ref/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/ref/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/ref/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/ref/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvideRef(app *fiber.App, db *sqlx.DB) {
	refRepository := postgres.NewRefRepository(db)
	refUseCase := usecase.NewRefUseCase(&refRepository)
	refController := controller.NewRefController(refUseCase)

	router.Route(
		app,
		refController,
	)
}
