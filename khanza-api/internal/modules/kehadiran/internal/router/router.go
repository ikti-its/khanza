package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/controller"
)

func Route(
	app *fiber.App,
	kehadiranController *controller.KehadiranController,
	jadwalController *controller.JadwalController,
	cutiController *controller.CutiController,
) {
	kehadiran := app.Group("/v1/kehadiran")

	presensi := kehadiran.Group("/presensi")
	{
		presensi.Post("/attend", middleware.Authenticate([]int{0}), kehadiranController.Attend)
		presensi.Post("/leave", middleware.Authenticate([]int{0}), kehadiranController.Leave)
		presensi.Get("/", middleware.Authenticate([]int{1337, 1}), kehadiranController.Get)
		presensi.Get("/pegawai/:id", middleware.Authenticate([]int{0}), kehadiranController.GetByPegawaiId)
		presensi.Get("/:id", middleware.Authenticate([]int{0}), kehadiranController.GetById)
	}

	jadwal := kehadiran.Group("/jadwal")
	{
		jadwal.Get("/", middleware.Authenticate([]int{1337, 1}), jadwalController.Get)
		jadwal.Get("/hari/:id", middleware.Authenticate([]int{1337, 1}), jadwalController.GetByHariId)
		jadwal.Get("/pegawai/:id", middleware.Authenticate([]int{0}), jadwalController.GetByPegawaiId)
		jadwal.Get("/:id", middleware.Authenticate([]int{0}), jadwalController.GetById)
		jadwal.Put("/:id", middleware.Authenticate([]int{1337, 1}), jadwalController.Update)
	}

	cuti := kehadiran.Group("/cuti")
	{
		cuti.Post("/", middleware.Authenticate([]int{0, 1, 1337}), cutiController.Create)
		cuti.Get("/", middleware.Authenticate([]int{1337, 1}), cutiController.Get)
		cuti.Get("/:id", middleware.Authenticate([]int{0}), cutiController.GetById)
		cuti.Get("/pegawai/:id", middleware.Authenticate([]int{0}), cutiController.GetByPegawaiId)
		cuti.Put("/:id", middleware.Authenticate([]int{1337, 1}), cutiController.Update)
		cuti.Delete("/:id", middleware.Authenticate([]int{1337, 1}), cutiController.Delete)
	}
}
