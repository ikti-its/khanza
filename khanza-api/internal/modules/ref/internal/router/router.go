package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/ref/internal/controller"
)

func Route(
	app *fiber.App,
	refController *controller.RefController,
) {
	ref := app.Group("/v1/ref")
	{
		ref.Get("/role", middleware.Authenticate([]int{0}), refController.GetRole)
		ref.Get("/jabatan", middleware.Authenticate([]int{0}), refController.GetJabatan)
		ref.Get("/departemen", middleware.Authenticate([]int{0}), refController.GetDepartemen)
		ref.Get("/status-aktif", middleware.Authenticate([]int{0}), refController.GetStatusAktif)
		ref.Get("/alasan-cuti", middleware.Authenticate([]int{0}), refController.GetAlasanCuti)
		ref.Get("/kode", middleware.Authenticate([]int{0}), refController.GetKodePresensi)
	}

	inventory := ref.Group("/inventory")
	{
		inventory.Get("/industri", middleware.Authenticate([]int{0}), refController.GetIndustriFarmasi)
		inventory.Get("/satuan", middleware.Authenticate([]int{0}), refController.GetSatuanBarangMedis)
		inventory.Get("/jenis", middleware.Authenticate([]int{0}), refController.GetJenisBarangMedis)
		inventory.Get("/kategori", middleware.Authenticate([]int{0}), refController.GetKategoriBarangMedis)
		inventory.Get("/golongan", middleware.Authenticate([]int{0}), refController.GetGolonganBarangMedis)
		inventory.Get("/ruangan", middleware.Authenticate([]int{0}), refController.GetRuangan)
		inventory.Get("/supplier", middleware.Authenticate([]int{0}), refController.GetSupplierBarangMedis)
	}

	shift := ref.Group("/shift")
	{
		shift.Post("/", middleware.Authenticate([]int{1337, 1}), refController.CreateShift)
		shift.Get("/", middleware.Authenticate([]int{0}), refController.GetShift)
		shift.Get("/:id", middleware.Authenticate([]int{0}), refController.GetShiftById)
		shift.Put("/:id", middleware.Authenticate([]int{1337, 1}), refController.UpdateShift)
		shift.Delete("/:id", middleware.Authenticate([]int{1337, 1}), refController.DeleteShift)
	}
}
