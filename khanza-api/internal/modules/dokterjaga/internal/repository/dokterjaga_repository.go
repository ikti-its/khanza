package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/dokterjaga/internal/entity"
)

type DokterJagaRepository interface {
	Insert(c *fiber.Ctx, d *entity.DokterJaga) error
	FindAll() ([]entity.DokterJaga, error)
	FindByKodeDokter(kodeDokter string) ([]entity.DokterJaga, error)
	Update(c *fiber.Ctx, d *entity.DokterJaga) error
	Delete(c *fiber.Ctx, kodeDokter string, hariKerja string) error
	GetByPoliklinik(poliklinik string) ([]entity.DokterJaga, error)
	GetPoliklinikList() ([]string, error)

	// Optional extensions (depending on use case)
	FindByStatus(status string) ([]entity.DokterJaga, error)
	UpdateStatus(kodeDokter string, hariKerja string, newStatus string) error
}
