package usecase

import (
	"fmt"
	"time"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/repository"
)

type RujukanMasukUseCase struct {
	Repository repository.RujukanMasukRepository
}

func NewRujukanMasukUseCase(repo repository.RujukanMasukRepository) *RujukanMasukUseCase {
	return &RujukanMasukUseCase{Repository: repo}
}

// Create a new RujukanMasuk entry
func (u *RujukanMasukUseCase) Create(c *fiber.Ctx, request *model.RujukanMasukRequest) (model.RujukanMasukResponse, error) {
	tanggalMasuk, err := time.Parse("2006-01-02", request.TanggalMasuk)
	if err != nil {
		return model.RujukanMasukResponse{}, fmt.Errorf("invalid tanggal_masuk format: %v", err)
	}

	var tanggalKeluar *time.Time
	if request.TanggalKeluar != nil && *request.TanggalKeluar != "" {
		parsed, err := time.Parse("2006-01-02", *request.TanggalKeluar)
		if err != nil {
			return model.RujukanMasukResponse{}, fmt.Errorf("invalid tanggal_keluar format: %v", err)
		}
		tanggalKeluar = &parsed
	}

	entityData := entity.RujukanMasuk{
		NomorRujuk:    request.NomorRujuk,
		Perujuk:       request.Perujuk,
		AlamatPerujuk: request.AlamatPerujuk,
		NomorRawat:    request.NomorRawat,
		NomorRM:       request.NomorRM,
		NamaPasien:    request.NamaPasien,
		Alamat:        request.Alamat,
		Umur:          request.Umur,
		TanggalMasuk:  tanggalMasuk,
		TanggalKeluar: tanggalKeluar,
		DiagnosaAwal:  request.DiagnosaAwal,
	}

	if err := u.Repository.Insert(c, &entityData); err != nil {
		return model.RujukanMasukResponse{}, fmt.Errorf("failed to insert: %v", err)
	}

	var formattedKeluar *string
	if entityData.TanggalKeluar != nil {
		str := entityData.TanggalKeluar.Format("2006-01-02")
		formattedKeluar = &str
	}

	return model.RujukanMasukResponse{
		NomorRujuk:    entityData.NomorRujuk,
		Perujuk:       entityData.Perujuk,
		AlamatPerujuk: entityData.AlamatPerujuk,
		NomorRawat:    entityData.NomorRawat,
		NomorRM:       entityData.NomorRM,
		NamaPasien:    entityData.NamaPasien,
		Alamat:        entityData.Alamat,
		Umur:          entityData.Umur,
		TanggalMasuk:  entityData.TanggalMasuk.Format("2006-01-02"),
		TanggalKeluar: formattedKeluar,
		DiagnosaAwal:  entityData.DiagnosaAwal,
	}, nil
}

// Get all RujukanMasuk entries
func (u *RujukanMasukUseCase) GetAll() ([]model.RujukanMasukResponse, error) {
	list, err := u.Repository.FindAll()
	if err != nil {
		return nil, err
	}

	var response []model.RujukanMasukResponse
	for _, r := range list {
		var formattedKeluar *string
		if r.TanggalKeluar != nil {
			str := r.TanggalKeluar.Format("2006-01-02")
			formattedKeluar = &str
		}

		response = append(response, model.RujukanMasukResponse{
			NomorRujuk:    r.NomorRujuk,
			Perujuk:       r.Perujuk,
			AlamatPerujuk: r.AlamatPerujuk,
			NomorRawat:    r.NomorRawat,
			NomorRM:       r.NomorRM,
			NamaPasien:    r.NamaPasien,
			Alamat:        r.Alamat,
			Umur:          r.Umur,
			TanggalMasuk:  r.TanggalMasuk.Format("2006-01-02"),
			TanggalKeluar: formattedKeluar,
			DiagnosaAwal:  r.DiagnosaAwal,
		})
	}
	return response, nil
}

// Get by nomor_rawat
func (u *RujukanMasukUseCase) GetByNomorRawat(nomorRawat string) (model.RujukanMasukResponse, error) {
	r, err := u.Repository.FindByNomorRawat(nomorRawat)
	if err != nil {
		return model.RujukanMasukResponse{}, err
	}

	var formattedKeluar *string
	if r.TanggalKeluar != nil {
		str := r.TanggalKeluar.Format("2006-01-02")
		formattedKeluar = &str
	}

	return model.RujukanMasukResponse{
		NomorRujuk:    r.NomorRujuk,
		Perujuk:       r.Perujuk,
		AlamatPerujuk: r.AlamatPerujuk,
		NomorRawat:    r.NomorRawat,
		NomorRM:       r.NomorRM,
		NamaPasien:    r.NamaPasien,
		Alamat:        r.Alamat,
		Umur:          r.Umur,
		TanggalMasuk:  r.TanggalMasuk.Format("2006-01-02"),
		TanggalKeluar: formattedKeluar,
		DiagnosaAwal:  r.DiagnosaAwal,
	}, nil
}

// Update by nomor_rawat
func (u *RujukanMasukUseCase) Update(c *fiber.Ctx, nomorRawat string, request *model.RujukanMasukRequest) (model.RujukanMasukResponse, error) {
	r, err := u.Repository.FindByNomorRawat(nomorRawat)
	if err != nil {
		return model.RujukanMasukResponse{}, fmt.Errorf("data not found")
	}

	r.NomorRujuk = request.NomorRujuk
	r.Perujuk = request.Perujuk
	r.AlamatPerujuk = request.AlamatPerujuk
	r.NomorRM = request.NomorRM
	r.NamaPasien = request.NamaPasien
	r.Alamat = request.Alamat
	r.Umur = request.Umur
	r.DiagnosaAwal = request.DiagnosaAwal

	r.TanggalMasuk, err = time.Parse("2006-01-02", request.TanggalMasuk)
	if err != nil {
		return model.RujukanMasukResponse{}, fmt.Errorf("invalid tanggal_masuk format")
	}

	if request.TanggalKeluar != nil && *request.TanggalKeluar != "" {
		parsed, err := time.Parse("2006-01-02", *request.TanggalKeluar)
		if err != nil {
			return model.RujukanMasukResponse{}, fmt.Errorf("invalid tanggal_keluar format")
		}
		r.TanggalKeluar = &parsed
	} else {
		r.TanggalKeluar = nil
	}

	if err := u.Repository.Update(c, &r); err != nil {
		return model.RujukanMasukResponse{}, fmt.Errorf("failed to update")
	}

	return u.GetByNomorRawat(nomorRawat)
}

// Delete by nomor_rawat
func (u *RujukanMasukUseCase) Delete(c *fiber.Ctx, nomorRawat string) error {
	return u.Repository.Delete(c, nomorRawat)
}
