package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/ugd/internal/entity"
)

type UGDRepository interface {
	Insert(c *fiber.Ctx, ugd *entity.UGD) error
	FindAll() ([]entity.UGD, error)
	FindByNomorReg(nomorReg string) (entity.UGD, error)
	FindByTanggal(tanggal string) ([]entity.UGD, error)
	FindByNomorRM(nomorRM string) (entity.UGD, error)
	Update(c *fiber.Ctx, ugd *entity.UGD) error
	Delete(c *fiber.Ctx, nomorReg string) error

	CheckDokterExists(kodeDokter string) (bool, error)
}
