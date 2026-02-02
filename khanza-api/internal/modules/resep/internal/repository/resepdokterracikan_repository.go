package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/entity"
)

type ResepDokterRacikanRepository interface {
	Insert(c *fiber.Ctx, p *entity.ResepDokterRacikan) error
	FindAll() ([]entity.ResepDokterRacikan, error)
	FindByNoResep(noResep string) ([]entity.ResepDokterRacikan, error)
	Update(c *fiber.Ctx, p *entity.ResepDokterRacikan) error
	Delete(c *fiber.Ctx, noResep, noRacik string) error
}
