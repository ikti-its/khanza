package usecase

import (
	"fmt"
	"time"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/repository"
)

type CatatanObservasiRanapPostpartumUseCase struct {
	Repository repository.CatatanObservasiRanapPostpartumRepository
}

func NewCatatanObservasiRanapPostpartumUseCase(repo repository.CatatanObservasiRanapPostpartumRepository) *CatatanObservasiRanapPostpartumUseCase {
	return &CatatanObservasiRanapPostpartumUseCase{
		Repository: repo,
	}
}

func (u *CatatanObservasiRanapPostpartumUseCase) Create(c *fiber.Ctx, request *model.CatatanObservasiRanapPostpartumRequest) (*model.CatatanObservasiRanapPostpartumResponse, error) {
	entity := &entity.CatatanObservasiRanapPostpartum{
		NoRawat:      request.NoRawat,
		TglPerawatan: parseDate(request.TglPerawatan),
		JamRawat:     request.JamRawat,
		GCS:          nullableString(request.GCS),
		TD:           request.TD,
		HR:           nullableString(request.HR),
		RR:           nullableString(request.RR),
		Suhu:         nullableString(request.Suhu),
		SPO2:         request.Spo2,
		TFU:          request.TFU,
		Kontraksi:    request.Kontraksi,
		Perdarahan:   request.Perdarahan,
		Keterangan:   request.Keterangan,
		NIP:          request.NIP,
	}

	if err := u.Repository.Insert(c, entity); err != nil {
		return nil, err
	}

	// Convert to response
	response := &model.CatatanObservasiRanapPostpartumResponse{
		NoRawat:      entity.NoRawat,
		TglPerawatan: entity.TglPerawatan.Format("2006-01-02"),
		JamRawat:     entity.JamRawat,
		GCS:          deref(entity.GCS),
		TD:           entity.TD,
		HR:           deref(entity.HR),
		RR:           deref(entity.RR),
		Suhu:         deref(entity.Suhu),
		Spo2:         entity.SPO2,
		TFU:          entity.TFU,
		Kontraksi:    entity.Kontraksi,
		Perdarahan:   entity.Perdarahan,
		Keterangan:   entity.Keterangan,
		NIP:          entity.NIP,
	}

	return response, nil
}

func (u *CatatanObservasiRanapPostpartumUseCase) GetAll() ([]model.CatatanObservasiRanapPostpartumResponse, error) {
	records, err := u.Repository.FindAll()
	if err != nil {
		return nil, err
	}

	var responses []model.CatatanObservasiRanapPostpartumResponse
	for _, r := range records {
		responses = append(responses, model.CatatanObservasiRanapPostpartumResponse{
			NoRawat:      r.NoRawat,
			TglPerawatan: r.TglPerawatan.Format("2006-01-02"),
			JamRawat:     r.JamRawat,
			GCS:          deref(r.GCS),
			TD:           r.TD,
			HR:           deref(r.HR),
			RR:           deref(r.RR),
			Suhu:         deref(r.Suhu),
			Spo2:         r.SPO2,
			TFU:          r.TFU,
			Kontraksi:    r.Kontraksi,
			Perdarahan:   r.Perdarahan,
			Keterangan:   r.Keterangan,
			NIP:          r.NIP,
		})
	}
	return responses, nil
}

func (u *CatatanObservasiRanapPostpartumUseCase) GetByNoRawat(noRawat string) ([]model.CatatanObservasiRanapPostpartumResponse, error) {
	records, err := u.Repository.FindByNoRawat(noRawat)
	if err != nil {
		return nil, err
	}

	var responses []model.CatatanObservasiRanapPostpartumResponse
	for _, r := range records {
		responses = append(responses, model.CatatanObservasiRanapPostpartumResponse{
			NoRawat:      r.NoRawat,
			TglPerawatan: r.TglPerawatan.Format("2006-01-02"),
			JamRawat:     r.JamRawat,
			GCS:          deref(r.GCS),
			TD:           r.TD,
			HR:           deref(r.HR),
			RR:           deref(r.RR),
			Suhu:         deref(r.Suhu),
			Spo2:         r.SPO2,
			TFU:          r.TFU,
			Kontraksi:    r.Kontraksi,
			Perdarahan:   r.Perdarahan,
			Keterangan:   r.Keterangan,
			NIP:          r.NIP,
		})
	}
	return responses, nil
}

func (u *CatatanObservasiRanapPostpartumUseCase) Update(c *fiber.Ctx, request *model.CatatanObservasiRanapPostpartumRequest) error {
	entity := &entity.CatatanObservasiRanapPostpartum{
		NoRawat:      request.NoRawat,
		TglPerawatan: parseDate(request.TglPerawatan),
		JamRawat:     request.JamRawat,
		GCS:          nullableString(request.GCS),
		TD:           request.TD,
		HR:           nullableString(request.HR),
		RR:           nullableString(request.RR),
		Suhu:         nullableString(request.Suhu),
		SPO2:         request.Spo2,
		TFU:          request.TFU,
		Kontraksi:    request.Kontraksi,
		Perdarahan:   request.Perdarahan,
		Keterangan:   request.Keterangan,
		NIP:          request.NIP,
	}
	return u.Repository.Update(c, entity)
}

func (u *CatatanObservasiRanapPostpartumUseCase) Delete(c *fiber.Ctx, noRawat, tanggal, jam string) error {
	if _, err := time.Parse("2006-01-02", tanggal); err != nil {
		return fmt.Errorf("invalid date format: %v", err)
	}
	if _, err := time.Parse("15:04:05", jam); err != nil {
		return fmt.Errorf("invalid time format: %v", err)
	}
	return u.Repository.Delete(c, noRawat, tanggal, jam)
}

func nullableString(s string) *string {
	if s == "" {
		return nil
	}
	return &s
}

func deref(s *string) string {
	if s == nil {
		return ""
	}
	return *s
}

func parseDate(s string) time.Time {
	t, _ := time.Parse("2006-01-02", s)
	return t
}
