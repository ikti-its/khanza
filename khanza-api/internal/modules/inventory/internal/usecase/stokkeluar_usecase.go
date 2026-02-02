package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
)

type StokKeluarUseCase struct {
	Repository repository.StokKeluarRepository
}

func NewStokKeluarUseCase(repository *repository.StokKeluarRepository) *StokKeluarUseCase {
	return &StokKeluarUseCase{
		Repository: *repository,
	}
}

func (u *StokKeluarUseCase) Create(request *model.StokKeluarRequest) model.StokKeluarResponse {
	stokkeluar := entity.StokKeluar{
		Id:         helper.MustNew(),
		NoKeluar:   request.NoKeluar,
		IdPegawai:  helper.MustParse(request.IdPegawai),
		Tanggal:    helper.ParseTime(request.Tanggal, "2006-01-02"),
		IdRuangan:  request.IdRuangan,
		Keterangan: request.Keterangan,
	}

	if err := u.Repository.Insert(&stokkeluar); err != nil {
		exception.PanicIfError(err, "Failed to insert stok keluar")
	}

	response := model.StokKeluarResponse{
		Id:         stokkeluar.Id.String(),
		NoKeluar:   stokkeluar.NoKeluar,
		IdPegawai:  stokkeluar.IdPegawai.String(),
		Tanggal:    helper.FormatTime(stokkeluar.Tanggal, "2006-01-02"),
		IdRuangan:  stokkeluar.IdRuangan,
		Keterangan: stokkeluar.Keterangan,
	}

	return response
}

func (u *StokKeluarUseCase) Get() []model.StokKeluarResponse {
	stokkeluar, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all stok keluar")

	response := make([]model.StokKeluarResponse, len(stokkeluar))
	for i, stokkeluar := range stokkeluar {
		response[i] = model.StokKeluarResponse{
			Id:         stokkeluar.Id.String(),
			NoKeluar:   stokkeluar.NoKeluar,
			IdPegawai:  stokkeluar.IdPegawai.String(),
			Tanggal:    helper.FormatTime(stokkeluar.Tanggal, "2006-01-02"),
			IdRuangan:  stokkeluar.IdRuangan,
			Keterangan: stokkeluar.Keterangan,
		}
	}

	return response
}

func (u *StokKeluarUseCase) GetById(id string) model.StokKeluarResponse {
	stokkeluar, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Stok keluar not found",
		})
	}

	response := model.StokKeluarResponse{
		Id:         stokkeluar.Id.String(),
		NoKeluar:   stokkeluar.NoKeluar,
		IdPegawai:  stokkeluar.IdPegawai.String(),
		Tanggal:    helper.FormatTime(stokkeluar.Tanggal, "2006-01-02"),
		IdRuangan:  stokkeluar.IdRuangan,
		Keterangan: stokkeluar.Keterangan,
	}

	return response
}

func (u *StokKeluarUseCase) Update(request *model.StokKeluarRequest, id string) model.StokKeluarResponse {
	stokkeluar, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Stok keluar not found",
		})
	}

	stokkeluar.NoKeluar = request.NoKeluar
	stokkeluar.IdPegawai = helper.MustParse(request.IdPegawai)
	stokkeluar.Tanggal = helper.ParseTime(request.Tanggal, "2006-01-02")
	stokkeluar.IdRuangan = request.IdRuangan
	stokkeluar.Keterangan = request.Keterangan

	if err := u.Repository.Update(&stokkeluar); err != nil {
		exception.PanicIfError(err, "Failed to update stok keluar")
	}

	response := model.StokKeluarResponse{
		Id:         stokkeluar.Id.String(),
		NoKeluar:   stokkeluar.NoKeluar,
		IdPegawai:  stokkeluar.IdPegawai.String(),
		Tanggal:    helper.FormatTime(stokkeluar.Tanggal, "2006-01-02"),
		IdRuangan:  stokkeluar.IdRuangan,
		Keterangan: stokkeluar.Keterangan,
	}

	return response
}

func (u *StokKeluarUseCase) Delete(id string) {
	stokkeluar, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Stok keluar not found",
		})
	}

	if err := u.Repository.Delete(&stokkeluar); err != nil {
		exception.PanicIfError(err, "Failed to delete stok keluar")
	}
}
