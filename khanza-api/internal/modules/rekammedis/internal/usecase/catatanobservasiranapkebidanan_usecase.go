package usecase

import (
	"fmt"
	"time"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/repository"
)

type CatatanObservasiRanapKebidananUseCase struct {
	Repository repository.CatatanObservasiRanapKebidananRepository
}

func NewCatatanObservasiRanapKebidananUseCase(repo repository.CatatanObservasiRanapKebidananRepository) *CatatanObservasiRanapKebidananUseCase {
	return &CatatanObservasiRanapKebidananUseCase{Repository: repo}
}

func (u *CatatanObservasiRanapKebidananUseCase) Create(c *fiber.Ctx, request *model.CatatanObservasiRanapKebidananRequest) (*model.CatatanObservasiRanapKebidananResponse, error) {
	tgl, err := time.Parse("2006-01-02", request.Tanggal)
	if err != nil {
		return nil, fmt.Errorf("format tanggal salah: %v", err)
	}
	jam, err := time.Parse("15:04:05", request.Jam)
	if err != nil {
		return nil, fmt.Errorf("format jam salah: %v", err)
	}

	observasi := entity.CatatanObservasiRanapKebidanan{
		NoRawat:      request.NoRawat,
		TglPerawatan: tgl,
		JamRawat:     jam.Format("15:04:05"),
		GCS:          &request.GCS,
		TD:           &request.TD,
		HR:           &request.HR,
		RR:           &request.RR,
		Suhu:         &request.Suhu,
		Spo2:         &request.Spo2,
		Kontraksi:    request.Kontraksi,
		BJJ:          request.BJJ,
		PPV:          request.PPV,
		VT:           request.VT,
		NIP:          request.NIP,
	}

	if err := u.Repository.Insert(c, &observasi); err != nil {
		return nil, fmt.Errorf("gagal insert catatan observasi: %v", err)
	}

	return &model.CatatanObservasiRanapKebidananResponse{
		NoRawat:   observasi.NoRawat,
		Tanggal:   tgl.Format("2006-01-02"),
		Jam:       observasi.JamRawat,
		GCS:       getString(observasi.GCS),
		TD:        getString(observasi.TD),
		HR:        getString(observasi.HR),
		RR:        getString(observasi.RR),
		Suhu:      getString(observasi.Suhu),
		Spo2:      getString(observasi.Spo2),
		Kontraksi: observasi.Kontraksi,
		BJJ:       observasi.BJJ,
		PPV:       observasi.PPV,
		VT:        observasi.VT,
		NIP:       observasi.NIP,
	}, nil
}

func (u *CatatanObservasiRanapKebidananUseCase) GetAll() ([]model.CatatanObservasiRanapKebidananResponse, error) {
	records, err := u.Repository.FindAll()
	if err != nil {
		return nil, fmt.Errorf("gagal mengambil data observasi: %v", err)
	}

	var responses []model.CatatanObservasiRanapKebidananResponse
	for _, r := range records {
		responses = append(responses, model.CatatanObservasiRanapKebidananResponse{
			NoRawat:   r.NoRawat,
			Tanggal:   r.TglPerawatan.Format("2006-01-02"),
			Jam:       r.JamRawat,
			GCS:       getString(r.GCS),
			TD:        getString(r.TD),
			HR:        getString(r.HR),
			RR:        getString(r.RR),
			Suhu:      getString(r.Suhu),
			Spo2:      getString(r.Spo2),
			Kontraksi: r.Kontraksi,
			BJJ:       r.BJJ,
			PPV:       r.PPV,
			VT:        r.VT,
			NIP:       r.NIP,
		})
	}
	return responses, nil
}

func (u *CatatanObservasiRanapKebidananUseCase) GetByNoRawat(noRawat string) ([]model.CatatanObservasiRanapKebidananResponse, error) {
	records, err := u.Repository.FindByNoRawat(noRawat)
	if err != nil {
		return nil, fmt.Errorf("catatan tidak ditemukan: %v", err)
	}

	var responses []model.CatatanObservasiRanapKebidananResponse
	for _, r := range records {
		responses = append(responses, model.CatatanObservasiRanapKebidananResponse{
			NoRawat:   r.NoRawat,
			Tanggal:   r.TglPerawatan.Format("2006-01-02"),
			Jam:       r.JamRawat,
			GCS:       getString(r.GCS),
			TD:        getString(r.TD),
			HR:        getString(r.HR),
			RR:        getString(r.RR),
			Suhu:      getString(r.Suhu),
			Spo2:      getString(r.Spo2),
			Kontraksi: r.Kontraksi,
			BJJ:       r.BJJ,
			PPV:       r.PPV,
			VT:        r.VT,
			NIP:       r.NIP,
		})
	}
	return responses, nil
}

func (u *CatatanObservasiRanapKebidananUseCase) Update(c *fiber.Ctx, noRawat string, request *model.CatatanObservasiRanapKebidananRequest) error {
	tgl, err := time.Parse("2006-01-02", request.Tanggal)
	if err != nil {
		return fmt.Errorf("format tanggal salah: %v", err)
	}
	jam := request.Jam

	entity := entity.CatatanObservasiRanapKebidanan{
		NoRawat:      noRawat,
		TglPerawatan: tgl,
		JamRawat:     jam,
		GCS:          &request.GCS,
		TD:           &request.TD,
		HR:           &request.HR,
		RR:           &request.RR,
		Suhu:         &request.Suhu,
		Spo2:         &request.Spo2,
		Kontraksi:    request.Kontraksi,
		BJJ:          request.BJJ,
		PPV:          request.PPV,
		VT:           request.VT,
		NIP:          request.NIP,
	}

	return u.Repository.Update(c, &entity)
}

func (u *CatatanObservasiRanapKebidananUseCase) Delete(c *fiber.Ctx, noRawat string, tanggal string, jam string) error {
	return u.Repository.Delete(c, noRawat, tanggal, jam)
}

func getString(s *string) string {
	if s != nil {
		return *s
	}
	return ""
}
