// internal/modules/rujukan/internal/repository/rujukan_keluar_repository.go

package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/entity"
)

type RujukanKeluarRepository interface {
	Insert(c *fiber.Ctx, rujukan *entity.RujukanKeluar) error
	FindAll() ([]entity.RujukanKeluar, error)
	FindByNomorRawat(nomorRawat string) (entity.RujukanKeluar, error)
	FindByNomorRM(nomorRM string) ([]entity.RujukanKeluar, error)
	FindByTanggalRujuk(tanggal string) ([]entity.RujukanKeluar, error)
	Update(c *fiber.Ctx, rujukan *entity.RujukanKeluar) error
	Delete(c *fiber.Ctx, nomorRawat string) error
}
