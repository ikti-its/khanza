package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/obat/internal/entity"
)

type GudangBarangRepository interface {
	Insert(c *fiber.Ctx, barang *entity.GudangBarang) error
	FindAll() ([]entity.GudangBarang, error)
	FindByID(id string) (*entity.GudangBarang, error)
	Update(c *fiber.Ctx, barang *entity.GudangBarang) error
	Delete(c *fiber.Ctx, id string) error
	FindByIDBarangMedis(idBarangMedis string) ([]entity.GudangBarang, error)
}
