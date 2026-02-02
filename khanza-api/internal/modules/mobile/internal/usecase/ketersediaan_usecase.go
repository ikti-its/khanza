package usecase

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/repository"
)

type KetersediaanUseCase struct {
	Repository repository.KetersediaanRepository
}

func NewKetersediaanUseCase(repository *repository.KetersediaanRepository) *KetersediaanUseCase {
	return &KetersediaanUseCase{
		Repository: *repository,
	}
}

func (u *KetersediaanUseCase) Get(tanggal string) []model.KetersediaanResponse {
	ketersediaan, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all ketersediaan")

	response := make([]model.KetersediaanResponse, len(ketersediaan))
	for i, ketersediaan := range ketersediaan {
		availability := false
		if cuti, err := u.Repository.ObserveCuti(ketersediaan.Pegawai, tanggal); cuti == uuid.Nil && err != nil {
			availability = true
		}

		response[i] = model.KetersediaanResponse{
			Pegawai:    ketersediaan.Pegawai.String(),
			NIP:        ketersediaan.NIP,
			Telepon:    ketersediaan.Telepon,
			Jabatan:    ketersediaan.Jabatan,
			Departemen: ketersediaan.Departemen,
			Foto:       ketersediaan.Foto,
			Nama:       ketersediaan.Nama,
			Alamat:     ketersediaan.Alamat,
			Latitude:   ketersediaan.Latitude,
			Longitude:  ketersediaan.Longitude,
			Available:  availability,
		}
	}

	return response
}

func (u *KetersediaanUseCase) GetPage(page, size int, tanggal string) model.KetersediaanPageResponse {
	ketersediaan, total, err := u.Repository.FindPage(page, size)
	exception.PanicIfError(err, "Failed to get paged ketersediaan")

	response := make([]model.KetersediaanResponse, len(ketersediaan))
	for i, ketersediaan := range ketersediaan {
		availability := false
		if cuti, err := u.Repository.ObserveCuti(ketersediaan.Pegawai, tanggal); cuti == uuid.Nil && err != nil {
			availability = true
		}

		response[i] = model.KetersediaanResponse{
			Pegawai:    ketersediaan.Pegawai.String(),
			NIP:        ketersediaan.NIP,
			Telepon:    ketersediaan.Telepon,
			Jabatan:    ketersediaan.Jabatan,
			Departemen: ketersediaan.Departemen,
			Foto:       ketersediaan.Foto,
			Nama:       ketersediaan.Nama,
			Alamat:     ketersediaan.Alamat,
			Latitude:   ketersediaan.Latitude,
			Longitude:  ketersediaan.Longitude,
			Available:  availability,
		}
	}

	pagedResponse := model.KetersediaanPageResponse{
		Page:         page,
		Size:         size,
		Total:        total,
		Ketersediaan: response,
	}

	return pagedResponse
}
