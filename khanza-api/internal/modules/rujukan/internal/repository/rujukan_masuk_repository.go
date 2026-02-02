package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/entity"
)

type RujukanMasukRepository interface {
	Insert(c *fiber.Ctx, rujukan *entity.RujukanMasuk) error
	FindAll() ([]entity.RujukanMasuk, error)
	FindByNomorRawat(nomorRawat string) (entity.RujukanMasuk, error)
	FindByNomorRM(nomorRM string) ([]entity.RujukanMasuk, error)
	FindByTanggalMasuk(tanggal string) ([]entity.RujukanMasuk, error)
	Update(c *fiber.Ctx, rujukan *entity.RujukanMasuk) error
	Delete(c *fiber.Ctx, nomorRawat string) error
}
