package ugd

import (
	"github.com/gofiber/fiber/v2"
	"github.com/jmoiron/sqlx"

	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/ugd/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/ugd/internal/repository"          // ✅ Interface
	"github.com/ikti-its/khanza-api/internal/modules/ugd/internal/repository/postgres" // ✅ Implementation
	"github.com/ikti-its/khanza-api/internal/modules/ugd/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/ugd/internal/usecase"
)

func ProvideUGD(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	var ugdRepository repository.UGDRepository = postgres.NewUGDRepository(db)
	ugdUseCase := usecase.NewUGDUseCase(ugdRepository)
	ugdController := controller.NewUGDController(ugdUseCase)

	router.UGDRoute(app, ugdController)
}
