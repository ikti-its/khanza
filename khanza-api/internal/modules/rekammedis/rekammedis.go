package rekammedis

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/repository"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvideRekamMedis(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	// ===== Pemeriksaan Ranap =====
	var pemeriksaanRanapRepository repository.PemeriksaanRanapRepository = postgres.NewPemeriksaanRanapRepository(db)
	pemeriksaanRanapUseCase := usecase.NewPemeriksaanRanapUseCase(pemeriksaanRanapRepository)
	pemeriksaanRanapController := controller.NewPemeriksaanRanapController(pemeriksaanRanapUseCase)

	// ===== Catatan Observasi Ranap Kebidanan =====
	catatanObservasiRepo := postgres.NewCatatanObservasiRanapKebidananRepository(db)
	catatanObservasiUseCase := usecase.NewCatatanObservasiRanapKebidananUseCase(catatanObservasiRepo)
	catatanObservasiController := controller.NewCatatanObservasiRanapKebidananController(catatanObservasiUseCase)

	// ===== Catatan Observasi Ranap Postpartum =====
	catatanPostpartumRepo := postgres.NewCatatanObservasiRanapPostpartumRepository(db)
	catatanPostpartumUseCase := usecase.NewCatatanObservasiRanapPostpartumUseCase(catatanPostpartumRepo)
	catatanPostpartumController := controller.NewCatatanObservasiRanapPostpartumController(catatanPostpartumUseCase)

	// ===== Catatan Observasi Ranap (Umum) =====
	catatanRanapRepo := postgres.NewCatatanObservasiRanapRepository(db)
	catatanRanapUseCase := usecase.NewCatatanObservasiRanapUseCase(catatanRanapRepo)
	catatanRanapController := controller.NewCatatanObservasiRanapController(catatanRanapUseCase)

	// ===== Diagnosa Pasien =====
	diagnosaPasienRepo := postgres.NewDiagnosaPasienRepository(db)
	diagnosaPasienUseCase := usecase.NewDiagnosaPasienUseCase(diagnosaPasienRepo)
	diagnosaPasienController := controller.NewDiagnosaPasienController(diagnosaPasienUseCase)

	// ===== Resume Pasien Ranap =====
	resumePasienRepo := postgres.NewResumePasienRanapRepository(db)
	resumePasienUseCase := usecase.NewResumePasienRanapUseCase(resumePasienRepo)
	resumePasienController := controller.NewResumePasienRanapController(resumePasienUseCase)

	// ===== Register Routes =====
	router.RekamMedisRoute(
		app,
		pemeriksaanRanapController,
		catatanObservasiController,
		catatanPostpartumController,
		catatanRanapController,
		diagnosaPasienController,
		resumePasienController,
	)
}
