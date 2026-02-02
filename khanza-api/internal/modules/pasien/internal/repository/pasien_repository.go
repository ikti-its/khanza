package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/pasien/internal/entity"
)

type PasienRepository interface {
	// CRUD dasar
	Insert(c *fiber.Ctx, pasien *entity.Pasien) error
	Find() ([]entity.Pasien, error)
	FindPage(page, size int) ([]entity.Pasien, int /*total*/, error)
	FindByNoRkmMedis(noRkmMedis string) (entity.Pasien, error)
	Update(c *fiber.Ctx, pasien *entity.Pasien) error
	Delete(c *fiber.Ctx, noRkmMedis string) error

	// Lookup tambahan yang sering dipakai
	GetByNoKTP(noKTP string) (*entity.Pasien, error)
	GetByNoPeserta(noPeserta string) (*entity.Pasien, error)
}
