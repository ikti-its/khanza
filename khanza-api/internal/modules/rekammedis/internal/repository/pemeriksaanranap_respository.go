package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/entity"
)

type PemeriksaanRanapRepository interface {
	Insert(c *fiber.Ctx, p *entity.PemeriksaanRanap) error
	FindAll() ([]entity.PemeriksaanRanap, error)
	FindByNomorRawat(nomorRawat string) (entity.PemeriksaanRanap, error)
	FindByTanggal(tanggal string) ([]entity.PemeriksaanRanap, error)
	Update(c *fiber.Ctx, p *entity.PemeriksaanRanap) error
	Delete(c *fiber.Ctx, nomorRawat string) error
}
