package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/registrasi/internal/controller"
)

func RegistrasiRoute(app *fiber.App, registrasiController *controller.RegistrasiController) {
	registrasi := app.Group("/v1/registrasi")

	// 🔓 Public or general access (e.g., read-only)
	registrasi.Get("/by-nomor-rm/:nomor_rm", middleware.Authenticate([]int{0, 1, 2, 3, 1337}), registrasiController.GetByNomorRM)
	registrasi.Get("/by-no-rawat/:no_rawat", middleware.Authenticate([]int{0, 1, 2, 3, 1337}), registrasiController.GetByNoRawat)
	registrasi.Get("/pending-room", middleware.Authenticate([]int{1, 2, 3, 1337}), registrasiController.GetPendingRoomRequests)
	registrasi.Get("/dokter", middleware.Authenticate([]int{0, 1, 2, 3, 1337}), registrasiController.GetAllDokter)
	registrasi.Get("/", middleware.Authenticate([]int{0, 1, 2, 3, 1337}), registrasiController.GetAll)
	registrasi.Get("/:nomor_reg", middleware.Authenticate([]int{0, 1, 2, 3, 1337}), registrasiController.GetByNomorReg)
	registrasi.Get("/pasien/:nomor_rm", middleware.Authenticate([]int{0, 1, 2, 3, 1337}), registrasiController.GetAllByNomorRM)


	// 🔐 Restricted to roles that can create/update/delete (e.g., admin, registration, nurse)
	registrasi.Post("/", middleware.Authenticate([]int{0, 1, 2, 1337}), registrasiController.Create)
	registrasi.Post("/submittambah", middleware.Authenticate([]int{0, 1, 2, 1337}), registrasiController.Create)

	registrasi.Put("/:nomor_reg", middleware.Authenticate([]int{0, 1, 2, 1337}), registrasiController.Update)
	registrasi.Delete("/:nomor_reg", middleware.Authenticate([]int{0, 1, 2, 1337}), registrasiController.Delete)

	// 🏨 Room assignment & status updates – typically nurses/admins
	registrasi.Put("/:nomor_reg/assign-kamar", middleware.Authenticate([]int{1, 2, 1337}), registrasiController.AssignKamar)
	registrasi.Put("/:nomor_reg/assign-room/:status", middleware.Authenticate([]int{1, 2, 1337}), registrasiController.AssignRoomStatus)
	registrasi.Put("/status_kamar/:nomor_reg", middleware.Authenticate([]int{1, 2, 1337}), registrasiController.UpdateStatusKamar)
}
