package templates

var RouterTmpl = `package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/{{.ModuleName}}/internal/controller"
)

func Route(
	app *fiber.App,
) {
	{{.ModuleName}} := app.Group("/v1/{{.ModuleName}}")
}
`
