package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/entity"
)

type DiagnosaPasienRepository interface {
	Insert(c *fiber.Ctx, data *entity.DiagnosaPasien) error
	FindAll() ([]entity.DiagnosaPasien, error)
	FindByNoRawat(noRawat string) ([]entity.DiagnosaPasien, error)
	FindByKodePenyakit(kode string) ([]entity.DiagnosaPasien, error)
	FindByNoRawatAndStatus(noRawat string, status string) ([]entity.DiagnosaPasien, error)
	Update(c *fiber.Ctx, data *entity.DiagnosaPasien) error
	Delete(c *fiber.Ctx, noRawat string, kdPenyakit string) error
}
