package controller

import (
	"fmt"
	"net/http"
	"strconv"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/pasien/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pasien/internal/usecase"
)

type PasienController struct {
	UseCase *usecase.PasienUseCase
}

func NewPasienController(uc *usecase.PasienUseCase) *PasienController {
	return &PasienController{
		UseCase: uc,
	}
}

// GET /v1/pasien
func (c *PasienController) GetAll(ctx *fiber.Ctx) error {
	data, err := c.UseCase.GetAll()
	if err != nil {
		return ctx.Status(http.StatusInternalServerError).JSON(fiber.Map{
			"status":  "error",
			"message": "Gagal mengambil data pasien",
			"error":   err.Error(),
		})
	}
	return ctx.JSON(fiber.Map{
		"status": "success",
		"data":   data,
	})
}

// GET /v1/pasien/page?page=1&size=10
func (c *PasienController) GetPaginated(ctx *fiber.Ctx) error {
	page, _ := strconv.Atoi(ctx.Query("page", "1"))
	size, _ := strconv.Atoi(ctx.Query("size", "10"))

	data, total, err := c.UseCase.GetPaginated(page, size)
	if err != nil {
		return ctx.Status(http.StatusInternalServerError).JSON(fiber.Map{
			"status":  "error",
			"message": "Gagal mengambil data pasien",
			"error":   err.Error(),
		})
	}
	return ctx.JSON(fiber.Map{
		"status": "success",
		"data":   data,
		"total":  total,
	})
}

// GET /v1/pasien/:no_rkm_medis
func (c *PasienController) GetByNoRkmMedis(ctx *fiber.Ctx) error {
	noRkm := ctx.Params("no_rkm_medis")
	data, err := c.UseCase.GetByNoRkmMedis(noRkm)
	if err != nil {
		return ctx.Status(http.StatusNotFound).JSON(fiber.Map{
			"status":  "error",
			"message": "Pasien tidak ditemukan",
			"error":   err.Error(),
		})
	}
	return ctx.JSON(fiber.Map{
		"status": "success",
		"data":   data,
	})
}

// POST /v1/pasien
func (c *PasienController) Create(ctx *fiber.Ctx) error {
	var pasien entity.Pasien
	if err := ctx.BodyParser(&pasien); err != nil {
		return ctx.Status(http.StatusBadRequest).JSON(fiber.Map{
			"status":  "error",
			"message": "Invalid request body",
			"error":   err.Error(),
		})
	}

	err := c.UseCase.Create(ctx, &pasien)
	if err != nil {
		return ctx.Status(http.StatusInternalServerError).JSON(fiber.Map{
			"status":  "error",
			"message": "Gagal menyimpan data pasien",
			"error":   err.Error(),
		})
	}

	return ctx.Status(http.StatusCreated).JSON(fiber.Map{
		"status": "success",
		"data":   pasien,
	})
}

// PUT /v1/pasien/:no_rkm_medis
func (c *PasienController) Update(ctx *fiber.Ctx) error {
	noRkm := ctx.Params("no_rkm_medis")
	if noRkm == "" {
		fmt.Println("🚫 no_rkm_medis parameter missing in URL")
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"status":  "error",
			"message": "no_rkm_medis is required in URL",
		})
	}

	var pasien entity.Pasien

	// ✅ DEBUG LOG request body raw string
	rawBody := ctx.Body()
	fmt.Println("📥 Raw Request Body:", string(rawBody))

	// ✅ Parse body
	if err := ctx.BodyParser(&pasien); err != nil {
		fmt.Println("❌ Failed to parse body:", err)
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"status":  "error",
			"message": "Invalid request body",
			"error":   err.Error(),
		})
	}

	// ✅ DEBUG: log mapped data
	fmt.Printf("✅ Parsed Pasien Struct: %+v\n", pasien)

	// ⬅ inject no_rkm_medis from URL
	pasien.NoRkmMedis = noRkm

	// ✅ Call usecase update
	err := c.UseCase.Update(ctx, &pasien)
	if err != nil {
		fmt.Println("❌ Failed to update pasien:", err)
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"status":  "error",
			"message": "Gagal memperbarui data pasien",
			"error":   err.Error(),
		})
	}

	// ✅ Success
	return ctx.JSON(fiber.Map{
		"status": "success",
		"data":   pasien,
	})
}

// DELETE /v1/pasien/:no_rkm_medis
func (c *PasienController) Delete(ctx *fiber.Ctx) error {
	noRkm := ctx.Params("no_rkm_medis")

	err := c.UseCase.Delete(ctx, noRkm)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"status":  "error",
			"message": "Gagal menghapus data pasien",
			"error":   err.Error(),
		})
	}

	return ctx.JSON(fiber.Map{
		"status":  "success",
		"message": "Data pasien berhasil dihapus",
	})
}
