package dokterjaga

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/dokterjaga/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/dokterjaga/internal/repository"
	djpostgres "github.com/ikti-its/khanza-api/internal/modules/dokterjaga/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/dokterjaga/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/dokterjaga/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvideDokterJaga(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	// Initialize repository for Dokter Jaga
	var dokterJagaRepository repository.DokterJagaRepository = djpostgres.NewDokterJagaRepository(db)

	// Initialize use case for Dokter Jaga
	dokterJagaUseCase := usecase.NewDokterJagaUseCase(dokterJagaRepository)

	// Initialize controller for Dokter Jaga
	dokterJagaController := controller.NewDokterJagaController(dokterJagaUseCase)

	// Set up routes for Dokter Jaga
	router.DokterJagaRoute(app, dokterJagaController)
}
