package registrasi

import (
	"github.com/gofiber/fiber/v2"
	"github.com/jmoiron/sqlx"

	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/registrasi/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/registrasi/internal/repository"          // ✅ Use interface
	"github.com/ikti-its/khanza-api/internal/modules/registrasi/internal/repository/postgres" // ✅ Use struct
	"github.com/ikti-its/khanza-api/internal/modules/registrasi/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/registrasi/internal/usecase"
)

func ProvideRegistrasi(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	var registrasiRepository repository.RegistrasiRepository = postgres.NewRegistrasiRepository(db) // Already a pointer
	registrasiUseCase := usecase.NewRegistrasiUseCase(registrasiRepository)                         // No need for &
	registrasiController := controller.NewRegistrasiController(registrasiUseCase)                   // Removed validator

	// Ensure the function name matches the one in router.go
	router.RegistrasiRoute(app, registrasiController)
}
