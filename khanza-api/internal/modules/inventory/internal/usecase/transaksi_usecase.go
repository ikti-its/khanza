package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
)

type TransaksiUseCase struct {
	Repository repository.TransaksiRepository
}

func NewTransaksiUseCase(repository *repository.TransaksiRepository) *TransaksiUseCase {
	return &TransaksiUseCase{
		Repository: *repository,
	}
}

func (u *TransaksiUseCase) Create(request *model.TransaksiRequest) model.TransaksiResponse {
	transaksi := entity.Transaksi{
		Id:            helper.MustNew(),
		IdStokKeluar:  helper.MustParse(request.IdStokKeluar),
		IdBarangMedis: helper.MustParse(request.IdBarangMedis),
		NoBatch:       request.NoBatch,
		NoFaktur:      request.NoFaktur,
		JumlahKeluar:  request.JumlahKeluar,
	}

	if err := u.Repository.Insert(&transaksi); err != nil {
		exception.PanicIfError(err, "Failed to insert transaksi")
	}

	response := model.TransaksiResponse{
		Id:            transaksi.Id.String(),
		IdStokKeluar:  transaksi.IdStokKeluar.String(),
		IdBarangMedis: transaksi.IdBarangMedis.String(),
		NoBatch:       transaksi.NoBatch,
		NoFaktur:      transaksi.NoFaktur,
		JumlahKeluar:  transaksi.JumlahKeluar,
	}

	return response
}

func (u *TransaksiUseCase) Get() []model.TransaksiResponse {
	transaksi, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all transaksi")

	response := make([]model.TransaksiResponse, len(transaksi))
	for i, transaksi := range transaksi {
		response[i] = model.TransaksiResponse{
			Id:            transaksi.Id.String(),
			IdStokKeluar:  transaksi.IdStokKeluar.String(),
			IdBarangMedis: transaksi.IdBarangMedis.String(),
			NoBatch:       transaksi.NoBatch,
			NoFaktur:      transaksi.NoFaktur,
			JumlahKeluar:  transaksi.JumlahKeluar,
		}
	}

	return response
}

func (u *TransaksiUseCase) GetById(id string) model.TransaksiResponse {
	transaksi, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Transaksi not found",
		})
	}

	response := model.TransaksiResponse{
		Id:            transaksi.Id.String(),
		IdStokKeluar:  transaksi.IdStokKeluar.String(),
		IdBarangMedis: transaksi.IdBarangMedis.String(),
		NoBatch:       transaksi.NoBatch,
		NoFaktur:      transaksi.NoFaktur,
		JumlahKeluar:  transaksi.JumlahKeluar,
	}

	return response
}

func (u *TransaksiUseCase) GetByStok(id string) model.TransaksiResponse {
	transaksi, err := u.Repository.FindByStok(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Transaksi not found",
		})
	}

	response := model.TransaksiResponse{
		Id:            transaksi.Id.String(),
		IdStokKeluar:  transaksi.IdStokKeluar.String(),
		IdBarangMedis: transaksi.IdBarangMedis.String(),
		NoBatch:       transaksi.NoBatch,
		NoFaktur:      transaksi.NoFaktur,
		JumlahKeluar:  transaksi.JumlahKeluar,
	}

	return response
}

func (u *TransaksiUseCase) Update(request *model.TransaksiRequest, id string) model.TransaksiResponse {
	transaksi, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Transaksi not found",
		})
	}

	transaksi.IdStokKeluar = helper.MustParse(request.IdStokKeluar)
	transaksi.IdBarangMedis = helper.MustParse(request.IdBarangMedis)
	transaksi.NoBatch = request.NoBatch
	transaksi.NoFaktur = request.NoFaktur
	transaksi.JumlahKeluar = request.JumlahKeluar

	if err := u.Repository.Update(&transaksi); err != nil {
		exception.PanicIfError(err, "Failed to update transaksi")
	}

	response := model.TransaksiResponse{
		Id:            transaksi.Id.String(),
		IdStokKeluar:  transaksi.IdStokKeluar.String(),
		IdBarangMedis: transaksi.IdBarangMedis.String(),
		NoBatch:       transaksi.NoBatch,
		NoFaktur:      transaksi.NoFaktur,
		JumlahKeluar:  transaksi.JumlahKeluar,
	}

	return response
}

func (u *TransaksiUseCase) Delete(id string) {
	transaksi, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Transaksi not found",
		})
	}

	if err := u.Repository.Delete(&transaksi); err != nil {
		exception.PanicIfError(err, "Failed to delete transaksi")
	}
}
