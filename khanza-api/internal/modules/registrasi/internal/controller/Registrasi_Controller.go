package controller

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	web "github.com/ikti-its/khanza-api/internal/app/model"
	"github.com/ikti-its/khanza-api/internal/modules/registrasi/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/registrasi/internal/usecase"
)

type RegistrasiController struct {
	UseCase *usecase.RegistrasiUseCase
}

func NewRegistrasiController(useCase *usecase.RegistrasiUseCase) *RegistrasiController {
	return &RegistrasiController{
		UseCase: useCase,
	}
}

func (c *RegistrasiController) Create(ctx *fiber.Ctx) error {
	var request model.RegistrasiRequest
	fmt.Println("Received a POST request to /registrasi") // Debugging log
	fmt.Printf("📨 Parsed request: %+v\n", request)

	if err := ctx.BodyParser(&request); err != nil {
		fmt.Println("Failed to parse request body:", err) // Debugging log
		if err := ctx.BodyParser(&request); err != nil {
			return ctx.Status(fiber.StatusBadRequest).JSON(web.Response{
				Code:   fiber.StatusBadRequest,
				Status: "Bad Request",
				Data:   "Invalid request body",
			})
		}

	}

	response, err := c.UseCase.Create(ctx, &request)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}
	return ctx.Status(fiber.StatusCreated).JSON(web.Response{
		Code:   fiber.StatusCreated,
		Status: "OK",
		Data:   response,
	})
}

func (c *RegistrasiController) GetAll(ctx *fiber.Ctx) error {
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

func (c *RegistrasiController) GetByNomorReg(ctx *fiber.Ctx) error {
	nomorReg := ctx.Params("nomor_reg")
	response, err := c.UseCase.GetByNomorReg(nomorReg)
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

func (c *RegistrasiController) Update(ctx *fiber.Ctx) error {
	nomorReg := ctx.Params("nomor_reg")
	var request model.RegistrasiRequest

	if err := ctx.BodyParser(&request); err != nil {
		panic(&exception.BadRequestError{Message: "Invalid request body"})
	}

	response, err := c.UseCase.Update(ctx, nomorReg, &request)
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

func (c *RegistrasiController) Delete(ctx *fiber.Ctx) error {
	nomorReg := ctx.Params("nomor_reg")
	err := c.UseCase.Delete(ctx, nomorReg)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   err.Error(),
		})
	}
	return ctx.Status(fiber.StatusNoContent).JSON(web.Response{
		Code:   fiber.StatusNoContent,
		Status: "Deleted",
	})
}

func (r *RegistrasiController) GetPendingRoomRequests(c *fiber.Ctx) error {
	results, err := r.UseCase.GetPendingRoomRequests(c)
	fmt.Println("📥 Received GET /pending-room")

	if err != nil {
		fmt.Println("❌ Usecase returned error:", err)
		return c.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"code":   500,
			"status": "error",
			"data":   "internal error",
		})
	}

	if len(results) == 0 {
		fmt.Println("⚠️ No results found")
		return c.Status(fiber.StatusOK).JSON(fiber.Map{
			"code":   200,
			"status": "OK",
			"data":   []any{},
		})
	}

	fmt.Println("✅ Found pending rooms:", len(results))
	return c.JSON(fiber.Map{
		"code":   200,
		"status": "OK",
		"data":   results,
	})
}

func (c *RegistrasiController) UpdateStatusKamar(ctx *fiber.Ctx) error {
	nomorReg := ctx.Params("nomor_reg")

	type StatusUpdate struct {
		StatusKamar string `json:"status_kamar"`
	}

	var req StatusUpdate
	if err := ctx.BodyParser(&req); err != nil {
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"status": "fail",
			"error":  err.Error(),
		})
	}

	err := c.UseCase.UpdateStatusKamar(ctx, nomorReg, req.StatusKamar)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"status":  "error",
			"message": "Failed to update status kamar",
		})
	}

	return ctx.JSON(fiber.Map{
		"status":  "success",
		"message": "Status kamar updated successfully",
	})
}

func (c *RegistrasiController) AssignRoomStatus(ctx *fiber.Ctx) error {
	nomorReg := ctx.Params("nomor_reg")
	status := ctx.Params("status") // "menunggu", "selesai", etc.

	err := c.UseCase.UpdateStatusKamar(ctx, nomorReg, status)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"status":  "error",
			"message": "Failed to update status kamar",
		})
	}

	return ctx.JSON(fiber.Map{
		"status":  "success",
		"message": "Status kamar updated successfully",
	})
}

type AssignKamarRequest struct {
	KamarID string `json:"kamar_id"`
}

func (c *RegistrasiController) AssignKamar(ctx *fiber.Ctx) error {
	nomorReg := ctx.Params("nomor_reg")
	var req AssignKamarRequest

	fmt.Println("📥 Assigning kamar to:", nomorReg)

	if err := ctx.BodyParser(&req); err != nil {
		fmt.Println("❌ Failed to parse body:", err)
		return ctx.Status(fiber.StatusBadRequest).JSON(fiber.Map{
			"status":  "error",
			"message": "Invalid request body",
		})
	}

	fmt.Println("➡️ Kamar to assign:", req.KamarID)

	err := c.UseCase.AssignKamar(ctx, nomorReg, req.KamarID)
	if err != nil {
		fmt.Println("❌ Error assigning kamar:", err)
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"status":  "error",
			"message": "Failed to assign room",
		})
	}

	return ctx.JSON(fiber.Map{
		"status":  "success",
		"message": "Room assigned successfully",
	})
}

func (c *RegistrasiController) GetAllDokter(ctx *fiber.Ctx) error {
	dokters, err := c.UseCase.GetAllDokter()
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"code":    500,
			"status":  "error",
			"message": err.Error(),
		})
	}

	return ctx.JSON(fiber.Map{
		"code":   200,
		"status": "success",
		"data":   dokters,
	})

}

func (c *RegistrasiController) GetByNomorRM(ctx *fiber.Ctx) error {
	nomorRM := ctx.Params("nomor_rm")

	data, err := c.UseCase.GetByNomorRM(nomorRM)
	if err != nil {
		return ctx.Status(fiber.StatusNotFound).JSON(fiber.Map{
			"status":  "error",
			"message": "Data tidak ditemukan",
		})
	}

	return ctx.JSON(fiber.Map{
		"status": "success",
		"data":   data,
	})
}

func (c *RegistrasiController) GetByNoRawat(ctx *fiber.Ctx) error {
	noRawat := ctx.Params("no_rawat")
	result, err := c.UseCase.GetByNoRawat(noRawat)
	if err != nil {
		return ctx.Status(fiber.StatusNotFound).JSON(fiber.Map{
			"status":  "error",
			"message": "Data not found",
		})
	}

	return ctx.JSON(fiber.Map{
		"status": "success",
		"data":   result,
	})
}

func (c *RegistrasiController) GetRegistrasi(ctx *fiber.Ctx) error {
	data, err := c.UseCase.GetAll()
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(fiber.Map{
			"code":   500,
			"status": "Internal Server Error",
			"data":   err.Error(),
		})
	}

	return ctx.JSON(fiber.Map{
		"code":   200,
		"status": "success",
		"data":   data,
		"meta_data": fiber.Map{
			"page":  1,
			"size":  len(data),
			"total": len(data),
		},
	})
}

func (c *RegistrasiController) GetAllByNomorRM(ctx *fiber.Ctx) error {
	nomorRM := ctx.Params("nomor_rm")

	dataList, err := c.UseCase.GetAllByNomorRM(nomorRM)
	if err != nil {
		return ctx.Status(fiber.StatusInternalServerError).JSON(web.Response{
			Code:   fiber.StatusInternalServerError,
			Status: "Error",
			Data:   fmt.Sprintf("Gagal mengambil data registrasi untuk RM %s", nomorRM),
		})
	}

	return ctx.JSON(web.Response{
		Code:   fiber.StatusOK,
		Status: "OK",
		Data:   dataList,
	})
}



