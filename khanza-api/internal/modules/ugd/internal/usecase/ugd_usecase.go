package usecase

import (
	"fmt"
	"time"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/ugd/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/ugd/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/ugd/internal/repository"
)

type UGDUseCase struct {
	Repository repository.UGDRepository
}

func NewUGDUseCase(repo repository.UGDRepository) *UGDUseCase {
	return &UGDUseCase{Repository: repo}
}

// Create a new UGD entry
func (u *UGDUseCase) Create(c *fiber.Ctx, request *model.UGDRequest) (model.UGDResponse, error) {
	// Validate if kode_dokter exists
	exists, err := u.Repository.CheckDokterExists(request.KodeDokter)
	if err != nil {
		return model.UGDResponse{}, fmt.Errorf("database error: %v", err)
	}
	if !exists {
		return model.UGDResponse{}, fmt.Errorf("dokter with kode_dokter '%s' does not exist", request.KodeDokter)
	}

	// Parse tanggal and jam
	var parsedDate time.Time
	if request.Tanggal == "" {
		parsedDate = time.Now()
	} else {
		parsedDate, err = time.Parse("2006-01-02", request.Tanggal)
		if err != nil {
			return model.UGDResponse{}, fmt.Errorf("invalid date format: %v", err)
		}
	}

	var parsedTime time.Time
	if request.Jam == "" {
		parsedTime = time.Now()
	} else {
		parsedTime, err = time.Parse("15:04", request.Jam)
		if err != nil {
			return model.UGDResponse{}, fmt.Errorf("invalid jam format: %v", err)
		}
	}

	ugdEntity := entity.UGD{
		NomorReg:        request.NomorReg,
		NomorRawat:      request.NomorRawat,
		Tanggal:         parsedDate,
		Jam:             parsedTime,
		KodeDokter:      request.KodeDokter,
		DokterDituju:    request.DokterDituju,
		NomorRM:         request.NomorRM,
		NamaPasien:      request.NamaPasien,
		JenisKelamin:    request.JenisKelamin,
		Umur:            request.Umur,
		Poliklinik:      request.Poliklinik,
		JenisBayar:      request.JenisBayar,
		PenanggungJawab: request.PenanggungJawab,
		AlamatPJ:        request.AlamatPJ,
		HubunganPJ:      request.HubunganPJ,
		BiayaRegistrasi: request.BiayaRegistrasi,
		Status:          request.Status,
		StatusRawat:     request.StatusRawat,
		StatusBayar:     request.StatusBayar,
	}

	err = u.Repository.Insert(c, &ugdEntity)
	if err != nil {
		return model.UGDResponse{}, fmt.Errorf("failed to create UGD: %v", err)
	}

	return model.UGDResponse{
		NomorReg:        ugdEntity.NomorReg,
		NomorRawat:      ugdEntity.NomorRawat,
		Tanggal:         ugdEntity.Tanggal.Format("2006-01-02"),
		Jam:             ugdEntity.Jam.Format("15:04"),
		KodeDokter:      ugdEntity.KodeDokter,
		DokterDituju:    ugdEntity.DokterDituju,
		NomorRM:         ugdEntity.NomorRM,
		NamaPasien:      ugdEntity.NamaPasien,
		JenisKelamin:    ugdEntity.JenisKelamin,
		Umur:            ugdEntity.Umur,
		Poliklinik:      ugdEntity.Poliklinik,
		JenisBayar:      ugdEntity.JenisBayar,
		PenanggungJawab: ugdEntity.PenanggungJawab,
		AlamatPJ:        ugdEntity.AlamatPJ,
		HubunganPJ:      ugdEntity.HubunganPJ,
		BiayaRegistrasi: ugdEntity.BiayaRegistrasi,
		Status:          ugdEntity.Status,
		StatusRawat:     ugdEntity.StatusRawat,
		StatusBayar:     ugdEntity.StatusBayar,
	}, nil
}

func (u *UGDUseCase) GetAll() ([]model.UGDResponse, error) {
	records, err := u.Repository.FindAll()
	if err != nil {
		return nil, fmt.Errorf("failed to retrieve UGD: %v", err)
	}

	var response []model.UGDResponse
	for _, ugd := range records {
		response = append(response, model.UGDResponse{
			NomorReg:        ugd.NomorReg,
			NomorRawat:      ugd.NomorRawat,
			Tanggal:         ugd.Tanggal.Format("2006-01-02"),
			Jam:             ugd.Jam.Format("15:04"),
			KodeDokter:      ugd.KodeDokter,
			DokterDituju:    ugd.DokterDituju,
			NomorRM:         ugd.NomorRM,
			NamaPasien:      ugd.NamaPasien,
			JenisKelamin:    ugd.JenisKelamin,
			Umur:            ugd.Umur,
			Poliklinik:      ugd.Poliklinik,
			JenisBayar:      ugd.JenisBayar,
			PenanggungJawab: ugd.PenanggungJawab,
			AlamatPJ:        ugd.AlamatPJ,
			HubunganPJ:      ugd.HubunganPJ,
			BiayaRegistrasi: ugd.BiayaRegistrasi,
			Status:          ugd.Status,
			StatusRawat:     ugd.StatusRawat,
			StatusBayar:     ugd.StatusBayar,
		})
	}

	return response, nil
}

func (u *UGDUseCase) GetByNomorReg(nomorReg string) (model.UGDResponse, error) {
	ugd, err := u.Repository.FindByNomorReg(nomorReg)
	if err != nil {
		return model.UGDResponse{}, fmt.Errorf("UGD not found")
	}

	return model.UGDResponse{
		NomorReg:        ugd.NomorReg,
		NomorRawat:      ugd.NomorRawat,
		Tanggal:         ugd.Tanggal.Format("2006-01-02"),
		Jam:             ugd.Jam.Format("15:04"),
		KodeDokter:      ugd.KodeDokter,
		DokterDituju:    ugd.DokterDituju,
		NomorRM:         ugd.NomorRM,
		NamaPasien:      ugd.NamaPasien,
		JenisKelamin:    ugd.JenisKelamin,
		Umur:            ugd.Umur,
		Poliklinik:      ugd.Poliklinik,
		JenisBayar:      ugd.JenisBayar,
		PenanggungJawab: ugd.PenanggungJawab,
		AlamatPJ:        ugd.AlamatPJ,
		HubunganPJ:      ugd.HubunganPJ,
		BiayaRegistrasi: ugd.BiayaRegistrasi,
		Status:          ugd.Status,
		StatusRawat:     ugd.StatusRawat,
		StatusBayar:     ugd.StatusBayar,
	}, nil
}

func (u *UGDUseCase) Update(c *fiber.Ctx, nomorReg string, request *model.UGDRequest) (model.UGDResponse, error) {
	ugd, err := u.Repository.FindByNomorReg(nomorReg)
	if err != nil {
		return model.UGDResponse{}, fmt.Errorf("UGD not found")
	}

	parsedDate, err := time.Parse("2006-01-02", request.Tanggal)
	if err != nil {
		return model.UGDResponse{}, fmt.Errorf("invalid date format")
	}

	ugd.NamaPasien = request.NamaPasien
	ugd.AlamatPJ = request.AlamatPJ
	ugd.Tanggal = parsedDate

	err = u.Repository.Update(c, &ugd)
	if err != nil {
		return model.UGDResponse{}, fmt.Errorf("failed to update UGD: %v", err)
	}

	return u.GetByNomorReg(nomorReg)
}

func (u *UGDUseCase) Delete(c *fiber.Ctx, nomorReg string) error {
	err := u.Repository.Delete(c, nomorReg)
	if err != nil {
		return fmt.Errorf("failed to delete UGD: %v", err)
	}
	return nil
}
