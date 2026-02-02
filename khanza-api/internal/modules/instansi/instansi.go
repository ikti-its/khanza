package instansi

import (
	"github.com/gofiber/fiber/v2"
	"github.com/jmoiron/sqlx"

	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/instansi/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/instansi/internal/repository"
	"github.com/ikti-its/khanza-api/internal/modules/instansi/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/instansi/internal/usecase"
)

func ProvideInstansi(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	repo := repository.NewRepository(db)
	uc := usecase.NewUseCase(repo)
	ctrl := controller.NewController(uc)

	router.Route(app, ctrl)
}
