package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/entity"
)

// interface in internal/modules/reseppulang/internal/repository/repository.go (or similar)
type PermintaanResepPulangRepository interface {
	InsertMany(c *fiber.Ctx, perms []*entity.PermintaanResepPulang) error
	FindAll() ([]entity.PermintaanResepPulang, error)
	FindByNoRawat(noRawat string) ([]entity.PermintaanResepPulang, error)
	FindByNoPermintaan(noPermintaan string) (*entity.PermintaanResepPulang, error)
	Update(c *fiber.Ctx, p *entity.PermintaanResepPulang) error
	Delete(c *fiber.Ctx, noPermintaan string) error
	GetByNoPermintaan(noPermintaan string) ([]entity.PermintaanResepPulang, error)
	GetByNoPermintaanWithHarga(noPermintaan string) ([]entity.ResepPulangObat, error)
}
