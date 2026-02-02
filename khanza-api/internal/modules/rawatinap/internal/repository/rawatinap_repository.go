package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rawatinap/internal/entity"
)

type RawatInapRepository interface {
	Insert(c *fiber.Ctx, rawatInap *entity.RawatInap) error
	FindAll() ([]entity.RawatInap, error)
	FindByNomorRawat(nomorRawat string) (entity.RawatInap, error)
	FindByTanggalMasuk(tanggal string) ([]entity.RawatInap, error)
	FindByNomorRM(nomorRM string) ([]entity.RawatInap, error)
	Update(c *fiber.Ctx, rawatInap *entity.RawatInap) error
	Delete(c *fiber.Ctx, nomorRawat string) error
	FindPaginated(page, size int) ([]entity.RawatInap, int, error)
}
