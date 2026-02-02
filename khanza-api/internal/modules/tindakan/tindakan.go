package tindakan

import (
	"github.com/gofiber/fiber/v2"
	"github.com/jmoiron/sqlx"

	"github.com/ikti-its/khanza-api/internal/modules/tindakan/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/tindakan/internal/repository"
	"github.com/ikti-its/khanza-api/internal/modules/tindakan/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/tindakan/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/tindakan/internal/usecase"
)

func ProvideTindakan(app *fiber.App, db *sqlx.DB) {
	var tindakanRepository repository.TindakanRepository = postgres.NewTindakanRepository(db)
	tindakanUseCase := usecase.NewTindakanUseCase(tindakanRepository)
	tindakanController := controller.NewTindakanController(tindakanUseCase)

	router.TindakanRoute(app, tindakanController)
}
