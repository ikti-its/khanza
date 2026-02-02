package controller

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/usecase"
)

type StokObatPasienController struct {
	UseCase *usecase.StokObatPasienUseCase
}

func NewStokObatPasienController(useCase *usecase.StokObatPasienUseCase) *StokObatPasienController {
	return &StokObatPasienController{
		UseCase: useCase,
	}
}

func (c *StokObatPasienController) Create(ctx *fiber.Ctx) error {
	var request model.StokObatPasienRequest

	if err := ctx.BodyParser(&request); err != nil {
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "Invalid request body",
		})
	}

	response, err := c.UseCase.Create(&request)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   response,
	})
}

func (c *StokObatPasienController) GetAll(ctx *fiber.Ctx) error {
	data, err := c.UseCase.GetAll()
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "error",
			Data:   err.Error(),
		})
	}

	// Convert entity.StokObatPasien to model.StokObatPasienResponse
	var result []model.StokObatPasien
	for _, d := range data {
		result = append(result, model.StokObatPasien{
			NoPermintaan: d.NoPermintaan,
			Tanggal:      d.Tanggal,
			Jam:          d.Jam,
			NoRawat:      d.NoRawat,
			KodeBrng:     d.KodeBrng,
			Jumlah:       d.Jumlah,
			KdBangsal:    d.KdBangsal,
			NoBatch:      d.NoBatch,
			NoFaktur:     d.NoFaktur,
			AturanPakai:  d.AturanPakai,
			NamaPasien:   d.NamaPasien,
			NamaBrng:     d.NamaBrng,
			Jam00:        d.Jam00,
			Jam01:        d.Jam01,
			Jam02:        d.Jam02,
			Jam03:        d.Jam03,
			Jam04:        d.Jam04,
			Jam05:        d.Jam05,
			Jam06:        d.Jam06,
			Jam07:        d.Jam07,
			Jam08:        d.Jam08,
			Jam09:        d.Jam09,
			Jam10:        d.Jam10,
			Jam11:        d.Jam11,
			Jam12:        d.Jam12,
			Jam13:        d.Jam13,
			Jam14:        d.Jam14,
			Jam15:        d.Jam15,
			Jam16:        d.Jam16,
			Jam17:        d.Jam17,
			Jam18:        d.Jam18,
			Jam19:        d.Jam19,
			Jam20:        d.Jam20,
			Jam21:        d.Jam21,
			Jam22:        d.Jam22,
			Jam23:        d.Jam23,
		})
	}

	return ctx.JSON(model.StokObatPasienListResponse{
		Code:   fiber.StatusOK,
		Status: "success",
		Data:   result,
	})
}

func (c *StokObatPasienController) GetByNoPermintaan(ctx *fiber.Ctx) error {
	noPermintaan := ctx.Params("no_permintaan")

	result, err := c.UseCase.GetByNoPermintaan(noPermintaan)
	if err != nil {
		return ctx.Status(fiber.StatusNotFound).JSON(web.Response{
			Code:   fiber.StatusNotFound,
			Status: "Not Found",
			Data:   fmt.Sprintf("no_permintaan not found: %v", err),
		})
	}
	return ctx.JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   result,
	})
}

func (c *StokObatPasienController) Update(ctx *fiber.Ctx) error {
	var request model.StokObatPasienRequest

	if err := ctx.BodyParser(&request); err != nil {
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "Invalid request",
		})
	}

	response, err := c.UseCase.Update(&request)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}

	return ctx.JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *StokObatPasienController) Delete(ctx *fiber.Ctx) error {
	noPermintaan := ctx.Params("no_permintaan")

	if noPermintaan == "" {
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "no_permintaan is required",
		})
	}

	err := c.UseCase.DeleteByNoPermintaan(noPermintaan)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}

	return ctx.JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   "Stok obat pasien deleted successfully",
	})
}

func (c *StokObatPasienController) GetByNomorRawat(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rawat")

	data, err := c.UseCase.GetByNomorRawat(nomorRawat)
	if err != nil {
		return ctx.Status(fiber.StatusNotFound).JSON(web.Response{
			Code:   fiber.StatusNotFound,
			Status: "Not Found",
			Data:   fmt.Sprintf("no_rawat not found: %v", err),
		})
	}

	return ctx.JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   data,
	})
}
