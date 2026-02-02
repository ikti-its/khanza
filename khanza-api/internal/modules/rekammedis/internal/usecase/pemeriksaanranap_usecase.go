package usecase

import (
	"fmt"
	"time"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/repository"
)

type PemeriksaanRanapUseCase struct {
	Repository repository.PemeriksaanRanapRepository
}

func NewPemeriksaanRanapUseCase(repo repository.PemeriksaanRanapRepository) *PemeriksaanRanapUseCase {
	return &PemeriksaanRanapUseCase{Repository: repo}
}

func (u *PemeriksaanRanapUseCase) Create(c *fiber.Ctx, request *model.PemeriksaanRanapRequest) (*model.PemeriksaanRanapResponse, error) {
	// Check if the doctor exists

	// Parse the date and time strings into time.Time (for internal use)
	tgl, err := time.Parse("2006-01-02", request.Tanggal)
	if err != nil {
		return nil, fmt.Errorf("format tanggal salah: %v", err)
	}
	jam, err := time.Parse("15:04:05", request.Jam)
	if err != nil {
		return nil, fmt.Errorf("format jam salah: %v", err)
	}

	// Prepare the entity to insert
	entityData := entity.PemeriksaanRanap{
		NoRawat:      request.NoRawat,
		TglPerawatan: tgl.Format("2006-01-02"), // Store as string in the model
		JamRawat:     jam.Format("15:04:05"),   // Store as string in the model
		SuhuTubuh:    request.SuhuTubuh,
		Tensi:        request.Tensi,
		Nadi:         request.Nadi,
		Respirasi:    request.Respirasi,
		Tinggi:       request.Tinggi,
		Berat:        request.Berat,
		Spo2:         request.Spo2,
		GCS:          request.GCS,
		Kesadaran:    request.Kesadaran,
		Keluhan:      request.Keluhan,
		Pemeriksaan:  request.Pemeriksaan,
		Alergi:       request.Alergi,
		Penilaian:    request.Penilaian,
		RTL:          request.RTL,
		Instruksi:    request.Instruksi,
		Evaluasi:     request.Evaluasi,
		NIP:          request.NIP,
	}

	// Insert the data into the repository
	if err := u.Repository.Insert(c, &entityData); err != nil {
		return nil, fmt.Errorf("gagal insert pemeriksaan ranap: %v", err)
	}

	tglFormatted := tgl.Format("2006-01-02") // Format to string as YYYY-MM-DD
	jamFormatted := jam.Format("15:04:05")   // Format to string as HH:MM:SS

	// Return the response after successful insertion
	return &model.PemeriksaanRanapResponse{
		NoRawat:     entityData.NoRawat,
		Tanggal:     tglFormatted, // Use the formatted string
		Jam:         jamFormatted, // Use the formatted string
		SuhuTubuh:   entityData.SuhuTubuh,
		Tensi:       entityData.Tensi,
		Nadi:        entityData.Nadi,
		Respirasi:   entityData.Respirasi,
		Tinggi:      entityData.Tinggi,
		Berat:       entityData.Berat,
		Spo2:        entityData.Spo2,
		GCS:         entityData.GCS,
		Kesadaran:   entityData.Kesadaran,
		Keluhan:     entityData.Keluhan,
		Pemeriksaan: entityData.Pemeriksaan,
		Alergi:      entityData.Alergi,
		Penilaian:   entityData.Penilaian,
		RTL:         entityData.RTL,
		Instruksi:   entityData.Instruksi,
		Evaluasi:    entityData.Evaluasi,
		NIP:         entityData.NIP,
	}, nil
}

func (u *PemeriksaanRanapUseCase) GetAll() ([]model.PemeriksaanRanapResponse, error) {
	records, err := u.Repository.FindAll()
	if err != nil {
		return nil, fmt.Errorf("gagal mendapatkan data: %v", err)
	}

	var responses []model.PemeriksaanRanapResponse
	for _, r := range records {
		// Return records as responses
		responses = append(responses, model.PemeriksaanRanapResponse{
			NoRawat:     r.NoRawat,
			Tanggal:     r.TglPerawatan,
			Jam:         r.JamRawat,
			SuhuTubuh:   r.SuhuTubuh,
			Tensi:       r.Tensi,
			Nadi:        r.Nadi,
			Respirasi:   r.Respirasi,
			Tinggi:      r.Tinggi,
			Berat:       r.Berat,
			Spo2:        r.Spo2,
			GCS:         r.GCS,
			Kesadaran:   r.Kesadaran,
			Keluhan:     r.Keluhan,
			Pemeriksaan: r.Pemeriksaan,
			Alergi:      r.Alergi,
			Penilaian:   r.Penilaian,
			RTL:         r.RTL,
			Instruksi:   r.Instruksi,
			Evaluasi:    r.Evaluasi,
			NIP:         r.NIP,
		})
	}
	return responses, nil
}

func (u *PemeriksaanRanapUseCase) GetByNomorRawat(nomorRawat string) (*model.PemeriksaanRanapResponse, error) {
	r, err := u.Repository.FindByNomorRawat(nomorRawat)
	if err != nil {
		return nil, fmt.Errorf("pemeriksaan tidak ditemukan")
	}

	// Return single record
	return &model.PemeriksaanRanapResponse{
		NoRawat:     r.NoRawat,
		Tanggal:     r.TglPerawatan,
		Jam:         r.JamRawat,
		SuhuTubuh:   r.SuhuTubuh,
		Tensi:       r.Tensi,
		Nadi:        r.Nadi,
		Respirasi:   r.Respirasi,
		Tinggi:      r.Tinggi,
		Berat:       r.Berat,
		Spo2:        r.Spo2,
		GCS:         r.GCS,
		Kesadaran:   r.Kesadaran,
		Keluhan:     r.Keluhan,
		Pemeriksaan: r.Pemeriksaan,
		Alergi:      r.Alergi,
		Penilaian:   r.Penilaian,
		RTL:         r.RTL,
		Instruksi:   r.Instruksi,
		Evaluasi:    r.Evaluasi,
		NIP:         r.NIP,
	}, nil
}

func (u *PemeriksaanRanapUseCase) Update(c *fiber.Ctx, nomorRawat string, request *model.PemeriksaanRanapRequest) error {
	// Parse tanggal and jam
	tgl, err := time.Parse("2006-01-02", request.Tanggal)
	if err != nil {
		return fmt.Errorf("format tanggal salah: %v", err)
	}
	jam, err := time.Parse("15:04:05", request.Jam)
	if err != nil {
		return fmt.Errorf("format jam salah: %v", err)
	}

	// Build updated record from request
	record := &entity.PemeriksaanRanap{
		NoRawat:      nomorRawat,
		TglPerawatan: tgl.Format("2006-01-02"),
		JamRawat:     jam.Format("15:04:05"),
		SuhuTubuh:    request.SuhuTubuh,
		Tensi:        request.Tensi,
		Nadi:         request.Nadi,
		Respirasi:    request.Respirasi,
		Tinggi:       request.Tinggi,
		Berat:        request.Berat,
		Spo2:         request.Spo2,
		GCS:          request.GCS,
		Kesadaran:    request.Kesadaran,
		Keluhan:      request.Keluhan,
		Pemeriksaan:  request.Pemeriksaan,
		Alergi:       request.Alergi,
		Penilaian:    request.Penilaian,
		RTL:          request.RTL,
		Instruksi:    request.Instruksi,
		Evaluasi:     request.Evaluasi,
		NIP:          request.NIP,
	}

	// Call repository to update
	if err := u.Repository.Update(c, record); err != nil {
		return fmt.Errorf("gagal update data: %v", err)
	}

	return nil
}

func (u *PemeriksaanRanapUseCase) Delete(c *fiber.Ctx, nomorRawat string) error {
	return u.Repository.Delete(c, nomorRawat)
}
