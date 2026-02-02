package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/tindakan/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/tindakan/internal/model"
)

type TindakanRepository interface {
	Insert(c *fiber.Ctx, t *entity.Tindakan) error
	FindAll() ([]entity.Tindakan, error)
	FindByNomorRawat(nomorRawat string) ([]entity.Tindakan, error)
	Update(c *fiber.Ctx, t *entity.Tindakan) error
	Delete(c *fiber.Ctx, nomorRawat, jamRawat string) error
	GetAllJenisTindakan() ([]entity.JenisTindakan, error)
	FindJenisByKode(kode string) (*model.JenisTindakan, error)
	FindByNomorRawatAndJamRawat(nomorRawat, jamRawat string) (*entity.Tindakan, error)

	CheckDokterExists(kodeDokter string) (bool, error)
}
