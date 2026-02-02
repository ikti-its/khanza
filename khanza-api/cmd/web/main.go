package main

import (
	"fmt"
	"log"

	fiberv2 "github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/app/provider"
	"github.com/jmoiron/sqlx"
	_ "github.com/joho/godotenv/autoload"
)

func main() {
	var (
		cfg       = config.NewConfig()
		fiber     = config.NewFiber(cfg)
		postgres  = config.NewPostgres(cfg)
		validator = config.NewValidator()
		bootstrap = provider.Provider{App: fiber, Config: cfg, PG: postgres, Validator: validator}
	)

	defer func(postgres *sqlx.DB) {
		err := postgres.Close()
		if err != nil {
			log.Fatalf("Failed to close database connection: %v", err)
		}
	}(postgres)

	fiber.Use(func(c *fiberv2.Ctx) error {
		log.Printf("📥 Incoming Request: %s %s", c.Method(), c.OriginalURL())
		return c.Next()
	})

	bootstrap.Provide()

	// routes := fiber.GetRoutes()
	// for _, route := range routes {
	// 	log.Printf("METHOD: %s | PATH: %s", route.Method, route.Path)
	// }

	err := fiber.Listen(fmt.Sprintf("%s:%d",
		cfg.GetString("APP_URL", "localhost"),
		cfg.GetInt("APP_PORT", 8080)))
	if err != nil {
		log.Fatalf("Failed to start server: %v", err)
	}

}
