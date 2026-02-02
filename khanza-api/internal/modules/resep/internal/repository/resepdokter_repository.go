package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/entity"
)

type ResepDokterRepository interface {
	Insert(c *fiber.Ctx, p *entity.ResepDokter) error
	FindAll() ([]entity.ResepDokter, error)
	FindByNoResep(noResep string) ([]entity.ResepDokter, error)
	Update(c *fiber.Ctx, p *entity.ResepDokter) error
	Delete(c *fiber.Ctx, noResep, kodeBarang string) error
}
