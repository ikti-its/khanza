package rawatinap

import (
	"github.com/gofiber/fiber/v2"
	"github.com/jmoiron/sqlx"

	"github.com/ikti-its/khanza-api/internal/modules/rawatinap/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/rawatinap/internal/repository"
	postgres "github.com/ikti-its/khanza-api/internal/modules/rawatinap/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/rawatinap/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/rawatinap/internal/usecase"
)

func ProvideRawatInap(app *fiber.App, db *sqlx.DB) {
	var rawatinapRepository repository.RawatInapRepository = postgres.NewRawatInapRepository(db) // Already a pointer
	rawatinapUseCase := usecase.NewRawatInapUseCase(rawatinapRepository)                         // No need for &
	rawatinapController := controller.NewRawatInapController(rawatinapUseCase)                   // Removed validator

	// Ensure the function name matches the one in router.go
	router.RawatInapRoute(app, rawatinapController)
}
