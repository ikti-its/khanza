package usecase

import (
	"fmt"
	"time"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/repository"
)

type RujukanKeluarUseCase struct {
	Repository repository.RujukanKeluarRepository
}

func NewRujukanKeluarUseCase(repo repository.RujukanKeluarRepository) *RujukanKeluarUseCase {
	return &RujukanKeluarUseCase{Repository: repo}
}

func (u *RujukanKeluarUseCase) Create(c *fiber.Ctx, request *model.RujukanKeluarRequest) (model.RujukanKeluarResponse, error) {
	tanggalRujuk, err := time.Parse("2006-01-02", request.TanggalRujuk)
	if err != nil {
		return model.RujukanKeluarResponse{}, fmt.Errorf("invalid tanggal_rujuk format: %v", err)
	}

	jamRujuk, err := time.Parse("15:04", request.JamRujuk)
	if err != nil {
		return model.RujukanKeluarResponse{}, fmt.Errorf("invalid jam_rujuk format: %v", err)
	}

	entityData := entity.RujukanKeluar{
		NomorRujuk:         request.NomorRujuk,
		NomorRawat:         request.NomorRawat,
		NomorRM:            request.NomorRM,
		NamaPasien:         request.NamaPasien,
		TempatRujuk:        request.TempatRujuk,
		TanggalRujuk:       tanggalRujuk,
		JamRujuk:           jamRujuk,
		KeteranganDiagnosa: request.KeteranganDiagnosa,
		DokterPerujuk:      request.DokterPerujuk,
		KategoriRujuk:      request.KategoriRujuk,
		Pengantaran:        request.Pengantaran,
		Keterangan:         request.Keterangan,
	}

	if err := u.Repository.Insert(c, &entityData); err != nil {
		return model.RujukanKeluarResponse{}, fmt.Errorf("failed to insert: %v", err)
	}

	return model.RujukanKeluarResponse{
		NomorRujuk:         entityData.NomorRujuk,
		NomorRawat:         entityData.NomorRawat,
		NomorRM:            entityData.NomorRM,
		NamaPasien:         entityData.NamaPasien,
		TempatRujuk:        entityData.TempatRujuk,
		TanggalRujuk:       entityData.TanggalRujuk.Format("2006-01-02"),
		JamRujuk:           entityData.JamRujuk.Format("15:04"),
		KeteranganDiagnosa: entityData.KeteranganDiagnosa,
		DokterPerujuk:      entityData.DokterPerujuk,
		KategoriRujuk:      entityData.KategoriRujuk,
		Pengantaran:        entityData.Pengantaran,
		Keterangan:         entityData.Keterangan,
	}, nil
}

func (u *RujukanKeluarUseCase) GetAll() ([]model.RujukanKeluarResponse, error) {
	list, err := u.Repository.FindAll()
	if err != nil {
		return nil, err
	}

	var response []model.RujukanKeluarResponse
	for _, r := range list {
		response = append(response, model.RujukanKeluarResponse{
			NomorRujuk:         r.NomorRujuk,
			NomorRawat:         r.NomorRawat,
			NomorRM:            r.NomorRM,
			NamaPasien:         r.NamaPasien,
			TempatRujuk:        r.TempatRujuk,
			TanggalRujuk:       r.TanggalRujuk.Format("2006-01-02"),
			JamRujuk:           r.JamRujuk.Format("15:04"),
			KeteranganDiagnosa: r.KeteranganDiagnosa,
			DokterPerujuk:      r.DokterPerujuk,
			KategoriRujuk:      r.KategoriRujuk,
			Pengantaran:        r.Pengantaran,
			Keterangan:         r.Keterangan,
		})
	}
	return response, nil
}

func (u *RujukanKeluarUseCase) GetByNomorRawat(nomorRawat string) (model.RujukanKeluarResponse, error) {
	r, err := u.Repository.FindByNomorRawat(nomorRawat)
	if err != nil {
		return model.RujukanKeluarResponse{}, err
	}

	return model.RujukanKeluarResponse{
		NomorRujuk:         r.NomorRujuk,
		NomorRawat:         r.NomorRawat,
		NomorRM:            r.NomorRM,
		NamaPasien:         r.NamaPasien,
		TempatRujuk:        r.TempatRujuk,
		TanggalRujuk:       r.TanggalRujuk.Format("2006-01-02"),
		JamRujuk:           r.JamRujuk.Format("15:04"),
		KeteranganDiagnosa: r.KeteranganDiagnosa,
		DokterPerujuk:      r.DokterPerujuk,
		KategoriRujuk:      r.KategoriRujuk,
		Pengantaran:        r.Pengantaran,
		Keterangan:         r.Keterangan,
	}, nil
}

func (u *RujukanKeluarUseCase) Update(c *fiber.Ctx, nomorRawat string, request *model.RujukanKeluarRequest) (model.RujukanKeluarResponse, error) {
	r, err := u.Repository.FindByNomorRawat(nomorRawat)
	if err != nil {
		return model.RujukanKeluarResponse{}, fmt.Errorf("data not found")
	}

	r.NomorRujuk = request.NomorRujuk
	r.NomorRM = request.NomorRM
	r.NamaPasien = request.NamaPasien
	r.TempatRujuk = request.TempatRujuk
	r.KeteranganDiagnosa = request.KeteranganDiagnosa
	r.DokterPerujuk = request.DokterPerujuk
	r.KategoriRujuk = request.KategoriRujuk
	r.Pengantaran = request.Pengantaran
	r.Keterangan = request.Keterangan

	r.TanggalRujuk, err = time.Parse("2006-01-02", request.TanggalRujuk)
	if err != nil {
		return model.RujukanKeluarResponse{}, fmt.Errorf("invalid tanggal_rujuk format")
	}

	r.JamRujuk, err = time.Parse("15:04", request.JamRujuk)
	if err != nil {
		return model.RujukanKeluarResponse{}, fmt.Errorf("invalid jam_rujuk format")
	}

	if err := u.Repository.Update(c, &r); err != nil {
		return model.RujukanKeluarResponse{}, fmt.Errorf("failed to update")
	}

	return u.GetByNomorRawat(nomorRawat)
}

func (u *RujukanKeluarUseCase) Delete(c *fiber.Ctx, nomorRawat string) error {
	return u.Repository.Delete(c, nomorRawat)
}
