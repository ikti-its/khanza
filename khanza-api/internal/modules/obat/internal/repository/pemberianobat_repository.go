package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/obat/internal/entity"
)

type PemberianObatRepository interface {
	Insert(c *fiber.Ctx, p *entity.PemberianObat) error
	FindAll() ([]entity.PemberianObat, error)
	FindByNomorRawat(nomorRawat string) ([]entity.PemberianObat, error)
	Update(c *fiber.Ctx, p *entity.PemberianObat) error
	Delete(c *fiber.Ctx, nomorRawat, jamBeri string) error
	GetAllDataBarang() ([]entity.DataBarang, error)
	FindPaginated(page int, size int) ([]entity.PemberianObat, int, error)
}
