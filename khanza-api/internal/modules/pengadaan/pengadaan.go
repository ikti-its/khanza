package pengadaan

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/controller"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/repository/postgres"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/router"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/usecase"
	"github.com/jmoiron/sqlx"
)

func ProvidePengadaan(app *fiber.App, db *sqlx.DB, validator *config.Validator) {
	pengajuanRepository := postgres.NewPengajuanRepository(db)
	pengajuanUseCase := usecase.NewPengajuanUseCase(&pengajuanRepository)
	pengajuanController := controller.NewPengajuanController(pengajuanUseCase, validator)

	persetujuanRepository := postgres.NewPersetujuanRepository(db)
	persetujuanUseCase := usecase.NewPersetujuanUseCase(&persetujuanRepository)
	persetujuanController := controller.NewPersetujuanController(persetujuanUseCase, validator)

	pesananRepository := postgres.NewPesananRepository(db)
	pesananUseCase := usecase.NewPesananUseCase(&pesananRepository)
	pesananController := controller.NewPesananController(pesananUseCase, validator)

	pemesananRepository := postgres.NewPemesananRepository(db)
	pemesananUseCase := usecase.NewPemesananUseCase(&pemesananRepository)
	pemesananController := controller.NewPemesananController(pemesananUseCase, validator)

	penerimaanRepository := postgres.NewPenerimaanRepository(db)
	penerimaanUseCase := usecase.NewPenerimaanUseCase(&penerimaanRepository)
	penerimaanController := controller.NewPenerimaanController(penerimaanUseCase, validator)

	tagihanRepository := postgres.NewTagihanRepository(db)
	tagihanUseCase := usecase.NewTagihanUseCase(&tagihanRepository)
	tagihanController := controller.NewTagihanController(tagihanUseCase, validator)

	router.Route(
		app,
		pengajuanController,
		persetujuanController,
		pesananController,
		pemesananController,
		penerimaanController,
		tagihanController,
	)
}
