package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/ambulans/internal/entity"
)

type AmbulansRepository interface {
	Insert(ambulans *entity.Ambulans) error
	FindAll() ([]entity.Ambulans, error)
	FindByNoAmbulans(noAmbulans string) (entity.Ambulans, error)
	Update(c *fiber.Ctx, ambulans *entity.Ambulans) error
	Delete(c *fiber.Ctx, noAmbulans string) error
	InsertAmbulansRequest(noAmbulans string) error
	FindPendingRequests() ([]entity.Ambulans, error)
	UpdateAmbulansStatus(noAmbulans string, newStatus string) error
	SetPending(noAmbulans string) error
	InsertWithContext(c *fiber.Ctx, ambulans *entity.Ambulans) error
	FindPaginated(page, size int) ([]entity.Ambulans, int, error)
}
