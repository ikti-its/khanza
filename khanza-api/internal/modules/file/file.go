package file

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/file/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/file/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/file/internal/usecase"
)

func ProvideFile(app *fiber.App, cfg *config.Config, validator *config.Validator) {
	fileUseCase := usecase.NewFileUseCase(cfg)
	fileController := controller.NewFileController(fileUseCase, validator)

	router.Route(app, fileController)
}
