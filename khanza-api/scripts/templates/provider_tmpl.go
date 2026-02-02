package templates

var ProviderTmpl = `package {{.ModuleName}}

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/{{.ModuleName}}/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/{{.ModuleName}}/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/{{.ModuleName}}/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/{{.ModuleName}}/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func Provide(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	{{.ModuleName}}Repository := postgres.New{{.Name}}Repository(db)
	{{.ModuleName}}UseCase := usecase.New{{.Name}}UseCase(&{{.ModuleName}}Repository)
	{{.ModuleName}}Controller := controller.New{{.Name}}Controller({{.ModuleName}}UseCase, validator)

	router.Route(
		app,
		{{.ModuleName}}Controller,
	)
}
`
