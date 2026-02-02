package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/kamar/internal/entity"
)

type KamarRepository interface {
	FindAll() ([]entity.Kamar, error)
	FindByNomorBed(nomorReg string) (entity.Kamar, error)
	FindByKodeKamar(nomorRM string) (entity.Kamar, error)
	Insert(c *fiber.Ctx, kamar *entity.Kamar) error
	Update(c *fiber.Ctx, kamar *entity.Kamar) error
	Delete(c *fiber.Ctx, nomorReg string) error
	GetAvailableRooms() ([]entity.Kamar, error)
	UpdateStatusKamar(nomorBed string, status string) error
	GetDistinctKelas() ([]string, error)
	FindPaginated(page, size int) ([]entity.Kamar, int, error)
}
