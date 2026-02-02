package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/entity"
)

type CatatanObservasiRanapPostpartumRepository interface {
	Insert(c *fiber.Ctx, data *entity.CatatanObservasiRanapPostpartum) error
	FindAll() ([]entity.CatatanObservasiRanapPostpartum, error)
	FindByNoRawat(noRawat string) ([]entity.CatatanObservasiRanapPostpartum, error)
	FindByTanggal(tanggal string) ([]entity.CatatanObservasiRanapPostpartum, error)
	FindByNoRawatAndTanggal(noRawat, tanggal string) ([]entity.CatatanObservasiRanapPostpartum, error)
	Update(c *fiber.Ctx, data *entity.CatatanObservasiRanapPostpartum) error
	Delete(c *fiber.Ctx, noRawat string, tglPerawatan string, jamRawat string) error
}
