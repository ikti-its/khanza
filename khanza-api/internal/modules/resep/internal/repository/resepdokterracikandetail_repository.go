package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/model"
)

type ResepDokterRacikanDetailRepository interface {
	Insert(c *fiber.Ctx, d *entity.ResepDokterRacikanDetail) error
	FindAll() ([]entity.ResepDokterRacikanDetail, error)
	FindByNoResepAndNoRacik(noResep, noRacik string) ([]entity.ResepDokterRacikanDetail, error)
	Update(c *fiber.Ctx, d *entity.ResepDokterRacikanDetail) error
	Delete(c *fiber.Ctx, noResep, noRacik, kodeBrng string) error
	FindByNoResep(noResep string) ([]model.ResepDokterRacikanDetail, error)
}
