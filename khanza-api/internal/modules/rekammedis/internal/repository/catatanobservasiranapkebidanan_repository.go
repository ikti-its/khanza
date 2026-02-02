package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/entity"
)

type CatatanObservasiRanapKebidananRepository interface {
	Insert(c *fiber.Ctx, data *entity.CatatanObservasiRanapKebidanan) error
	FindAll() ([]entity.CatatanObservasiRanapKebidanan, error)
	FindByNoRawat(noRawat string) ([]entity.CatatanObservasiRanapKebidanan, error)
	FindByTanggal(tanggal string) ([]entity.CatatanObservasiRanapKebidanan, error)
	FindByNoRawatAndTanggal(noRawat string, tanggal string) ([]entity.CatatanObservasiRanapKebidanan, error)
	Update(c *fiber.Ctx, data *entity.CatatanObservasiRanapKebidanan) error
	Delete(c *fiber.Ctx, noRawat, tglPerawatan, jamRawat string) error
}
