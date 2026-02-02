package repository

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/registrasi/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/registrasi/internal/model"
)

type RegistrasiRepository interface {
	Insert(c *fiber.Ctx, registrasi *entity.Registrasi) error
	Update(c *fiber.Ctx, registrasi *entity.Registrasi) error
	Delete(c *fiber.Ctx, nomorReg string) error
	UpdateStatusKamar(c *fiber.Ctx, nomorReg string, status string) error
	AssignKamar(c *fiber.Ctx, nomorReg string, nomorBed string) error

	Find() ([]entity.Registrasi, error)
	FindAll() ([]entity.Registrasi, error)
	FindByNomorReg(nomorReg string) (entity.Registrasi, error)
	FindByNomorRM(nomorReg string) (entity.Registrasi, error)
	FindByTanggal(nomorReg string) (entity.Registrasi, error)
	GetByNoRawat(noRawat string) (model.RegistrasiResponse, error)
	GetAllDokter() ([]model.DokterResponse, error)
	GetNamaDokter(kode string) (string, error)
	CheckDokterExists(kodeDokter string) (bool, error)
	FindPendingRoomRequests() ([]entity.Registrasi, error)
	FindAllByNomorRM(nomorRM string) ([]entity.Registrasi, error)
}
