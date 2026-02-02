package config

import (
	"net/http"

	"github.com/goccy/go-json"
	"github.com/gofiber/fiber/v2"
	"github.com/gofiber/fiber/v2/middleware/cors"
	"github.com/gofiber/fiber/v2/middleware/healthcheck"
	"github.com/gofiber/fiber/v2/middleware/logger"
	"github.com/gofiber/fiber/v2/middleware/recover"
	"github.com/ikti-its/khanza-api/internal/app/exception"
)

func NewFiber(cfg *Config) *fiber.App {
	config := fiber.Config{
		ErrorHandler: exception.Handler,
		JSONEncoder:  json.Marshal,
		JSONDecoder:  json.Unmarshal,
	}
	app := fiber.New(config)
	app.Use(cors.New())
	app.Use(recover.New())

	app.Get("/", func(ctx *fiber.Ctx) error {
		return ctx.Status(http.StatusOK).SendString("Endpoint `/` is not set.")
	})

	app.Use(healthcheck.New(healthcheck.Config{
		LivenessProbe: func(ctx *fiber.Ctx) bool {
			return true
		},
		LivenessEndpoint: "/healthz",
	}))

	if cfg.GetBool("APP_DEBUG", false) {
		log := logger.Config{
			Format:     "[${time}] ${status} - ${method} ${path}\n",
			TimeFormat: "2006-01-02 15:04:05",
			TimeZone:   "Asia/Jakarta",
		}
		app.Use(logger.New(log))
	}

	return app
}
