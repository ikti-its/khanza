package usecase

import (
	"fmt"
	"time"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/dokterjaga/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/dokterjaga/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/dokterjaga/internal/repository"
)

type DokterJagaUseCase struct {
	Repository repository.DokterJagaRepository
}

func NewDokterJagaUseCase(repo repository.DokterJagaRepository) *DokterJagaUseCase {
	return &DokterJagaUseCase{Repository: repo}
}

func (u *DokterJagaUseCase) Create(c *fiber.Ctx, request *model.DokterJagaRequest) (model.DokterJagaResponse, error) {
	jamMulai, err := time.Parse("15:04:05", request.JamMulai)
	if err != nil {
		return model.DokterJagaResponse{}, fmt.Errorf("invalid jam_mulai format: %v", err)
	}

	jamSelesai, err := time.Parse("15:04:05", request.JamSelesai)
	if err != nil {
		return model.DokterJagaResponse{}, fmt.Errorf("invalid jam_selesai format: %v", err)
	}

	dokter := entity.DokterJaga{
		KodeDokter: request.KodeDokter,
		NamaDokter: request.NamaDokter,
		HariKerja:  request.HariKerja,
		JamMulai:   jamMulai,
		JamSelesai: jamSelesai,
		Poliklinik: request.Poliklinik,
		Status:     request.Status,
	}

	// 🔁 Call repository with context
	err = u.Repository.Insert(c, &dokter)
	if err != nil {
		return model.DokterJagaResponse{}, fmt.Errorf("failed to create dokter jaga: %v", err)
	}

	return model.DokterJagaResponse{
		KodeDokter: dokter.KodeDokter,
		NamaDokter: dokter.NamaDokter,
		HariKerja:  dokter.HariKerja,
		JamMulai:   dokter.JamMulai.Format("15:04:05"),
		JamSelesai: dokter.JamSelesai.Format("15:04:05"),
		Poliklinik: dokter.Poliklinik,
		Status:     dokter.Status,
	}, nil
}

// Retrieve all dokter_jaga records
func (u *DokterJagaUseCase) GetAll() ([]model.DokterJagaResponse, error) {
	list, err := u.Repository.FindAll()
	if err != nil {
		return nil, fmt.Errorf("failed to retrieve dokter jaga: %v", err)
	}

	var response []model.DokterJagaResponse
	for _, d := range list {
		response = append(response, model.DokterJagaResponse{
			KodeDokter: d.KodeDokter,
			NamaDokter: d.NamaDokter,
			HariKerja:  d.HariKerja,
			JamMulai:   d.JamMulai.Format("15:04:05"),
			JamSelesai: d.JamSelesai.Format("15:04:05"),
			Poliklinik: d.Poliklinik,
			Status:     d.Status,
		})
	}
	return response, nil
}

// Get by kode_dokter
func (u *DokterJagaUseCase) GetByKodeDokter(kode string) ([]model.DokterJagaResponse, error) {
	list, err := u.Repository.FindByKodeDokter(kode)
	if err != nil {
		return nil, fmt.Errorf("dokter jaga not found")
	}

	var response []model.DokterJagaResponse
	for _, d := range list {
		response = append(response, model.DokterJagaResponse{
			KodeDokter: d.KodeDokter,
			NamaDokter: d.NamaDokter,
			HariKerja:  d.HariKerja,
			JamMulai:   d.JamMulai.Format("15:04:05"),
			JamSelesai: d.JamSelesai.Format("15:04:05"),
			Poliklinik: d.Poliklinik,
			Status:     d.Status,
		})
	}
	return response, nil
}

func (u *DokterJagaUseCase) Update(c *fiber.Ctx, request *model.DokterJagaRequest) (model.DokterJagaResponse, error) {
	records, err := u.Repository.FindByKodeDokter(request.KodeDokter)
	if err != nil || len(records) == 0 {
		return model.DokterJagaResponse{}, fmt.Errorf("dokter jaga not found")
	}

	jamMulai, err := time.Parse("15:04:05", request.JamMulai)
	if err != nil {
		return model.DokterJagaResponse{}, fmt.Errorf("invalid jam_mulai format: %v", err)
	}

	jamSelesai, err := time.Parse("15:04:05", request.JamSelesai)
	if err != nil {
		return model.DokterJagaResponse{}, fmt.Errorf("invalid jam_selesai format: %v", err)
	}

	dokter := entity.DokterJaga{
		KodeDokter: request.KodeDokter,
		NamaDokter: request.NamaDokter,
		HariKerja:  request.HariKerja,
		JamMulai:   jamMulai,
		JamSelesai: jamSelesai,
		Poliklinik: request.Poliklinik,
		Status:     request.Status,
	}

	err = u.Repository.Update(c, &dokter)
	if err != nil {
		return model.DokterJagaResponse{}, fmt.Errorf("failed to update dokter jaga: %v", err)
	}

	return model.DokterJagaResponse{
		KodeDokter: dokter.KodeDokter,
		NamaDokter: dokter.NamaDokter,
		HariKerja:  dokter.HariKerja,
		JamMulai:   dokter.JamMulai.Format("15:04:05"),
		JamSelesai: dokter.JamSelesai.Format("15:04:05"),
		Poliklinik: dokter.Poliklinik,
		Status:     dokter.Status,
	}, nil
}

func (u *DokterJagaUseCase) Delete(c *fiber.Ctx, kodeDokter, hariKerja string) error {
	return u.Repository.Delete(c, kodeDokter, hariKerja)
}

// Change status of a shift
func (u *DokterJagaUseCase) UpdateStatus(kodeDokter, hariKerja, status string) error {
	return u.Repository.UpdateStatus(kodeDokter, hariKerja, status)
}

// Get all with a certain status
func (u *DokterJagaUseCase) GetByStatus(status string) ([]model.DokterJagaResponse, error) {
	list, err := u.Repository.FindByStatus(status)
	if err != nil {
		return nil, fmt.Errorf("failed to find dokter jaga with status: %v", err)
	}

	var response []model.DokterJagaResponse
	for _, d := range list {
		response = append(response, model.DokterJagaResponse{
			KodeDokter: d.KodeDokter,
			NamaDokter: d.NamaDokter,
			HariKerja:  d.HariKerja,
			JamMulai:   d.JamMulai.Format("15:04:05"),
			JamSelesai: d.JamSelesai.Format("15:04:05"),
			Poliklinik: d.Poliklinik,
			Status:     d.Status,
		})
	}
	return response, nil
}

func (u *DokterJagaUseCase) GetByPoliklinik(poliklinik string) ([]model.DokterJagaResponse, error) {
	list, err := u.Repository.GetByPoliklinik(poliklinik)
	if err != nil {
		return nil, fmt.Errorf("failed to get dokter jaga by poliklinik: %v", err)
	}

	var response []model.DokterJagaResponse
	for _, d := range list {
		response = append(response, model.DokterJagaResponse{
			KodeDokter: d.KodeDokter,
			NamaDokter: d.NamaDokter,
			HariKerja:  d.HariKerja,
			JamMulai:   d.JamMulai.Format("15:04:05"),
			JamSelesai: d.JamSelesai.Format("15:04:05"),
			Poliklinik: d.Poliklinik,
			Status:     d.Status,
		})
	}
	return response, nil
}

func (u *DokterJagaUseCase) GetPoliklinikList() ([]string, error) {
	return u.Repository.GetPoliklinikList()
}
