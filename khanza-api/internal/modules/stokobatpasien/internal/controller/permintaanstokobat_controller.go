package controller

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/usecase"
)

type PermintaanStokObatController struct {
	UseCase *usecase.PermintaanStokObatUseCase
}

func NewPermintaanStokObatController(useCase *usecase.PermintaanStokObatUseCase) *PermintaanStokObatController {
	return &PermintaanStokObatController{
		UseCase: useCase,
	}
}

func (c *PermintaanStokObatController) Create(ctx *fiber.Ctx) error {
	var request model.PermintaanStokObatRequest
	fmt.Println("📥 Received POST /permintaan-stok-obat")

	if err := ctx.BodyParser(&request); err != nil {
		fmt.Println("❌ Error parsing body:", err)
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "Invalid request body",
		})
	}

	response, err := c.UseCase.Create(&request)
	if err != nil {
		fmt.Println("❌ Error in usecase.Create():", err)
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

func (c *PermintaanStokObatController) GetAll(ctx *fiber.Ctx) error {
	response, err := c.UseCase.GetAll()
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

func (c *PermintaanStokObatController) GetByNoPermintaan(ctx *fiber.Ctx) error {
	noPermintaan := ctx.Params("no_permintaan")

	response, err := c.UseCase.GetByNoPermintaan(noPermintaan)
	if err != nil {
		return ctx.Status(fiber.StatusNotFound).JSON(web.Response{
			Code:   fiber.StatusNotFound,
			Status: "Not Found",
			Data:   err.Error(),
		})
	}

	return ctx.JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   response,
	})
}

func (c *PermintaanStokObatController) Update(ctx *fiber.Ctx) error {
	var request model.PermintaanStokObatRequest

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{Message: "Invalid request body"})
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

func (c *PermintaanStokObatController) Delete(ctx *fiber.Ctx) error {
	noPermintaan := ctx.Params("no_permintaan")

	if noPermintaan == "" {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"code":   400,
			"status": "Bad Request",
			"data":   "no_permintaan is required",
		})
	}

	err := c.UseCase.Delete(noPermintaan)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"code":   500,
			"status": "Error",
			"data":   err.Error(),
		})
	}

	return ctx.JSON(fiber.Map{
		"code":   200,
		"status": "Success",
		"data":   "Permintaan stok obat deleted successfully",
	})
}

func (c *PermintaanStokObatController) GetByNomorRawat(ctx *fiber.Ctx) error {
	nomorRawat := ctx.Params("nomor_rawat")
	permintaans, err := c.UseCase.GetByNomorRawat(nomorRawat)
	if err != nil {
		return ctx.Status(fiber.StatusNotFound).JSON(fiber.Map{
			"code":   404,
			"status": "Not Found",
			"data":   fmt.Sprintf("permintaan_stok_obat not found: %v", err),
		})
	}
	return ctx.JSON(fiber.Map{
		"code":   200,
		"status": "OK",
		"data":   permintaans,
	})
}

func (c *PermintaanStokObatController) UpdateValidasi(ctx *fiber.Ctx) error {
	noPermintaan := ctx.Params("no_permintaan")

	var payload struct {
		TglValidasi string `json:"tgl_validasi"`
		JamValidasi string `json:"jam_validasi"`
	}

	if err := ctx.BodyParser(&payload); err != nil {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"status": "error", "message": "invalid JSON",
		})
	}

	err := c.UseCase.UpdateValidasi(ctx.Context(), noPermintaan, payload.TglValidasi, payload.JamValidasi)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"status": "error", "message": err.Error(),
		})
	}

	return ctx.JSON(fiber.Map{
		"status": "success", "message": "Validasi updated",
	})
}

func (c *PermintaanStokObatController) CreateWithDetail(ctx *fiber.Ctx) error {
	fmt.Println("📥 Received POST /permintaan-stok-obat/detail")

	// 1. Parse the flat JSON directly into req
	var req model.PermintaanStokObatRequest
	if err := ctx.BodyParser(&req); err != nil {
		fmt.Println("❌ Error parsing body:", err)
		return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
			Code:   fiber.StatusBadRequest,
			Status: "Bad Request",
			Data:   "Invalid JSON body",
		})
	}

	fmt.Printf("DEBUG controller - stok_obat count: %d\n", len(req.StokObat))

	// 2. Map StokObatRequest to StokObatPasienRequest
	details := make([]model.StokObatPasienRequest, len(req.StokObat))
	for i, d := range req.StokObat {
		detail := model.StokObatPasienRequest{
			Tanggal:     req.TglPermintaan,
			Jam:         req.Jam,
			NoRawat:     req.NoRawat,
			KodeBrng:    d.KodeBarang,
			Jumlah:      float64(d.Jumlah), // assuming both are int now
			KdBangsal:   d.KdBangsal,
			NoBatch:     d.NoBatch,
			NoFaktur:    d.NoFaktur,
			AturanPakai: d.AturanPakai,
		}

		// Optionally: map jam_obat → Jam00 to Jam23
		for _, jam := range d.JamObat {
			switch jam {
			case "00":
				detail.Jam00 = true
			case "01":
				detail.Jam01 = true
			case "02":
				detail.Jam02 = true
			case "03":
				detail.Jam03 = true
			case "04":
				detail.Jam04 = true
			case "05":
				detail.Jam05 = true
			case "06":
				detail.Jam06 = true
			case "07":
				detail.Jam07 = true
			case "08":
				detail.Jam08 = true
			case "09":
				detail.Jam09 = true
			case "10":
				detail.Jam10 = true
			case "11":
				detail.Jam11 = true
			case "12":
				detail.Jam12 = true
			case "13":
				detail.Jam13 = true
			case "14":
				detail.Jam14 = true
			case "15":
				detail.Jam15 = true
			case "16":
				detail.Jam16 = true
			case "17":
				detail.Jam17 = true
			case "18":
				detail.Jam18 = true
			case "19":
				detail.Jam19 = true
			case "20":
				detail.Jam20 = true
			case "21":
				detail.Jam21 = true
			case "22":
				detail.Jam22 = true
			case "23":
				detail.Jam23 = true
			}
		}

		details[i] = detail
	}

	// 3. Call usecase with header + mapped details
	if err := c.UseCase.CreateWithDetail(ctx.Context(), c.UseCase.DB, &req, details); err != nil {
		fmt.Println("❌ Error inserting data:", err)
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}

	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "Created",
		Data:   "Permintaan dan stok obat berhasil disimpan.",
	})
}
