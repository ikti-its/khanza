package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/entity"
)

type ResepPulangRepository interface {
	Insert(c *fiber.Ctx, p *entity.ResepPulang) error
	FindAll() ([]entity.ResepPulang, error)
	FindByNoRawat(noRawat string) ([]entity.ResepPulang, error)
	FindByCompositeKey(noRawat, kodeBrng string, tanggal string, jam string) (*entity.ResepPulang, error)
	Update(c *fiber.Ctx, p *entity.ResepPulang) error
	Delete(c *fiber.Ctx, noRawat, kodeBrng, tanggal, jam string) error
}
