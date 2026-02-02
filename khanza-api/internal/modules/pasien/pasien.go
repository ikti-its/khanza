package pasien

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/pasien/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/pasien/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/pasien/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/pasien/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvidePasien(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	// 🔧 Inisialisasi repository
	pasienRepository := postgres.NewPasienRepository(db)

	// 🧠 Inisialisasi usecase
	pasienUseCase := usecase.NewPasienUseCase(pasienRepository)

	// 🎮 Inisialisasi controller
	pasienController := controller.NewPasienController(pasienUseCase)

	// 🌐 Daftarkan route
	router.RegisterPasienRoutes(app, pasienController)
}
