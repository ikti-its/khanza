package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/entity"
)

type CatatanObservasiRanapRepository interface {
	Insert(c *fiber.Ctx, data *entity.CatatanObservasiRanap) error
	FindAll() ([]entity.CatatanObservasiRanap, error)
	FindByNoRawat(noRawat string) ([]entity.CatatanObservasiRanap, error)
	FindByTanggal(tanggal string) ([]entity.CatatanObservasiRanap, error)
	FindByNoRawatAndTanggal(noRawat string, tanggal string) ([]entity.CatatanObservasiRanap, error)
	FindByNoRawatAndTanggal2(noRawat, tanggal string) (*entity.CatatanObservasiRanap, error)
	UpdateByNoRawatAndTanggal(noRawat string, tgl string, entity *entity.CatatanObservasiRanap) error
	Update(c *fiber.Ctx, data *entity.CatatanObservasiRanap) error
	Delete(c *fiber.Ctx, noRawat string, tglPerawatan string, jamRawat string) error
}
