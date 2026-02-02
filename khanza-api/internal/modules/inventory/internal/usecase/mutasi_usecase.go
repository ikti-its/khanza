package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
)

type MutasiUseCase struct {
	Repository repository.MutasiRepository
}

func NewMutasiUseCase(repository *repository.MutasiRepository) *MutasiUseCase {
	return &MutasiUseCase{
		Repository: *repository,
	}
}

func (u *MutasiUseCase) Create(request *model.MutasiRequest) model.MutasiResponse {
	mutasi := entity.Mutasi{
		Id:            helper.MustNew(),
		IdBarangMedis: helper.MustParse(request.IdBarangMedis),
		Jumlah:        request.Jumlah,
		Harga:         request.Harga,
		IdRuanganDari: request.IdRuanganDari,
		IdRuanganKe:   request.IdRuanganKe,
		Tanggal:       helper.ParseTime(request.Tanggal, "2006-01-02"),
		Keterangan:    request.Keterangan,
		NoBatch:       request.NoBatch,
		NoFaktur:      request.NoFaktur,
	}

	if err := u.Repository.Insert(&mutasi); err != nil {
		exception.PanicIfError(err, "Failed to insert mutasi")
	}

	response := model.MutasiResponse{
		Id:            mutasi.Id.String(),
		IdBarangMedis: mutasi.IdBarangMedis.String(),
		Jumlah:        mutasi.Jumlah,
		Harga:         mutasi.Harga,
		IdRuanganDari: mutasi.IdRuanganDari,
		IdRuanganKe:   mutasi.IdRuanganKe,
		Tanggal:       helper.FormatTime(mutasi.Tanggal, "2006-01-02"),
		Keterangan:    mutasi.Keterangan,
		NoBatch:       mutasi.NoBatch,
		NoFaktur:      mutasi.NoFaktur,
	}

	return response
}

func (u *MutasiUseCase) Get() []model.MutasiResponse {
	mutasi, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all mutasi")

	response := make([]model.MutasiResponse, len(mutasi))
	for i, mutasi := range mutasi {
		response[i] = model.MutasiResponse{
			Id:            mutasi.Id.String(),
			IdBarangMedis: mutasi.IdBarangMedis.String(),
			Jumlah:        mutasi.Jumlah,
			Harga:         mutasi.Harga,
			IdRuanganDari: mutasi.IdRuanganDari,
			IdRuanganKe:   mutasi.IdRuanganKe,
			Tanggal:       helper.FormatTime(mutasi.Tanggal, "2006-01-02"),
			Keterangan:    mutasi.Keterangan,
			NoBatch:       mutasi.NoBatch,
			NoFaktur:      mutasi.NoFaktur,
		}
	}

	return response
}

func (u *MutasiUseCase) GetById(id string) model.MutasiResponse {
	mutasi, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Mutasi not found",
		})
	}

	response := model.MutasiResponse{
		Id:            mutasi.Id.String(),
		IdBarangMedis: mutasi.IdBarangMedis.String(),
		Jumlah:        mutasi.Jumlah,
		Harga:         mutasi.Harga,
		IdRuanganDari: mutasi.IdRuanganDari,
		IdRuanganKe:   mutasi.IdRuanganKe,
		Tanggal:       helper.FormatTime(mutasi.Tanggal, "2006-01-02"),
		Keterangan:    mutasi.Keterangan,
		NoBatch:       mutasi.NoBatch,
		NoFaktur:      mutasi.NoFaktur,
	}

	return response
}

func (u *MutasiUseCase) Update(request *model.MutasiRequest, id string) model.MutasiResponse {
	mutasi, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Mutasi not found",
		})
	}

	mutasi.IdBarangMedis = helper.MustParse(request.IdBarangMedis)
	mutasi.Jumlah = request.Jumlah
	mutasi.Harga = request.Harga
	mutasi.IdRuanganDari = request.IdRuanganDari
	mutasi.IdRuanganKe = request.IdRuanganKe
	mutasi.Tanggal = helper.ParseTime(request.Tanggal, "2006-01-02")
	mutasi.Keterangan = request.Keterangan
	mutasi.NoBatch = request.NoBatch
	mutasi.NoFaktur = request.NoFaktur

	if err := u.Repository.Update(&mutasi); err != nil {
		exception.PanicIfError(err, "Failed to update mutasi")
	}

	response := model.MutasiResponse{
		Id:            mutasi.Id.String(),
		IdBarangMedis: mutasi.IdBarangMedis.String(),
		Jumlah:        mutasi.Jumlah,
		Harga:         mutasi.Harga,
		IdRuanganDari: mutasi.IdRuanganDari,
		IdRuanganKe:   mutasi.IdRuanganKe,
		Tanggal:       helper.FormatTime(mutasi.Tanggal, "2006-01-02"),
		Keterangan:    mutasi.Keterangan,
		NoBatch:       mutasi.NoBatch,
		NoFaktur:      mutasi.NoFaktur,
	}

	return response
}

func (u *MutasiUseCase) Delete(id string) {
	mutasi, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Mutasi not found",
		})
	}

	if err := u.Repository.Delete(&mutasi); err != nil {
		exception.PanicIfError(err, "Failed to delete mutasi")
	}
}
