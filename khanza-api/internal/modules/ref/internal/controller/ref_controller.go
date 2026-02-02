package controller

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/ref/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/ref/internal/usecase"
)

type RefController struct {
	UseCase *usecase.RefUseCase
}

func NewRefController(useCase *usecase.RefUseCase) *RefController {
	return &RefController{
		UseCase: useCase,
	}
}

func (c *RefController) GetRole(ctx *fiber.Ctx) error {
	response := c.UseCase.GetRole()

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *RefController) GetJabatan(ctx *fiber.Ctx) error {
	response := c.UseCase.GetJabatan()

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *RefController) GetDepartemen(ctx *fiber.Ctx) error {
	response := c.UseCase.GetDepartemen()

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *RefController) GetStatusAktif(ctx *fiber.Ctx) error {
	response := c.UseCase.GetStatusAktif()

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *RefController) CreateShift(ctx *fiber.Ctx) error {
	var request model.ShiftRequest

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid request body",
		})
	}

	response := c.UseCase.CreateShift(&request)

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *RefController) GetShift(ctx *fiber.Ctx) error {
	response := c.UseCase.GetShift()

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *RefController) GetShiftById(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	response := c.UseCase.GetShiftById(id)

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *RefController) UpdateShift(ctx *fiber.Ctx) error {
	var request model.ShiftRequest
	id := ctx.Params("id")

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid request body",
		})
	}

	response := c.UseCase.UpdateShift(&request, id)

	return ctx.Status(fiber.StatusOK).JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *RefController) DeleteShift(ctx *fiber.Ctx) error {
	id := ctx.Params("id")

	c.UseCase.DeleteShift(id)

	return ctx.SendStatus(fiber.StatusNoContent)
}

func (c *RefController) GetAlasanCuti(ctx *fiber.Ctx) error {
	response := c.UseCase.GetAlasanCuti()

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *RefController) GetKodePresensi(ctx *fiber.Ctx) error {
	tanggal := ctx.Query("tanggal")

	response := c.UseCase.GetKodePresensi(tanggal)

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *RefController) GetIndustriFarmasi(ctx *fiber.Ctx) error {
	response := c.UseCase.GetIndustriFarmasi()

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}
func (c *RefController) GetSatuanBarangMedis(ctx *fiber.Ctx) error {
	response := c.UseCase.GetSatuanBarangMedis()

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}
func (c *RefController) GetJenisBarangMedis(ctx *fiber.Ctx) error {
	response := c.UseCase.GetJenisBarangMedis()

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}
func (c *RefController) GetKategoriBarangMedis(ctx *fiber.Ctx) error {
	response := c.UseCase.GetKategoriBarangMedis()

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}
func (c *RefController) GetGolonganBarangMedis(ctx *fiber.Ctx) error {
	response := c.UseCase.GetGolonganBarangMedis()

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}
func (c *RefController) GetRuangan(ctx *fiber.Ctx) error {
	response := c.UseCase.GetRuangan()

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}
func (c *RefController) GetSupplierBarangMedis(ctx *fiber.Ctx) error {
	response := c.UseCase.GetSupplierBarangMedis()

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}
