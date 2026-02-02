package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
)

type GudangBarangUseCase struct {
	Repository repository.GudangBarangRepository
}

func NewGudangBarangUseCase(repository *repository.GudangBarangRepository) *GudangBarangUseCase {
	return &GudangBarangUseCase{
		Repository: *repository,
	}
}

func (u *GudangBarangUseCase) Create(request *model.GudangBarangRequest) model.GudangBarangResponse {
	opname := entity.GudangBarang{
		Id:            helper.MustNew(),
		IdBarangMedis: helper.MustParse(request.IdBarangMedis),
		IdRuangan:     request.IdRuangan,
		Stok:          request.Stok,
		NoBatch:       request.NoBatch,
		NoFaktur:      request.NoFaktur,
	}

	if err := u.Repository.Insert(&opname); err != nil {
		exception.PanicIfError(err, "Failed to insert gudang barang")
	}

	response := model.GudangBarangResponse{
		Id:            opname.Id.String(),
		IdBarangMedis: opname.IdBarangMedis.String(),
		IdRuangan:     opname.IdRuangan,
		Stok:          opname.Stok,
		NoBatch:       opname.NoBatch,
		NoFaktur:      opname.NoFaktur,
	}

	return response
}

func (u *GudangBarangUseCase) Get() []model.GudangBarangResponse {
	opname, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all gudang barang")

	response := make([]model.GudangBarangResponse, len(opname))
	for i, opname := range opname {
		response[i] = model.GudangBarangResponse{
			Id:            opname.Id.String(),
			IdBarangMedis: opname.IdBarangMedis.String(),
			IdRuangan:     opname.IdRuangan,
			Stok:          opname.Stok,
			NoBatch:       opname.NoBatch,
			NoFaktur:      opname.NoFaktur,
		}
	}

	return response
}

func (u *GudangBarangUseCase) GetByIdMedis(id string) []model.GudangBarangResponse {
	opname, err := u.Repository.FindByIdMedis(helper.MustParse(id))
	exception.PanicIfError(err, "Failed to get all gudang barang")

	response := make([]model.GudangBarangResponse, len(opname))
	for i, opname := range opname {
		response[i] = model.GudangBarangResponse{
			Id:            opname.Id.String(),
			IdBarangMedis: opname.IdBarangMedis.String(),
			IdRuangan:     opname.IdRuangan,
			Stok:          opname.Stok,
			NoBatch:       opname.NoBatch,
			NoFaktur:      opname.NoFaktur,
		}
	}

	return response
}

func (u *GudangBarangUseCase) GetById(id string) model.GudangBarangResponse {
	opname, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Gudang barang not found",
		})
	}

	response := model.GudangBarangResponse{
		Id:            opname.Id.String(),
		IdBarangMedis: opname.IdBarangMedis.String(),
		IdRuangan:     opname.IdRuangan,
		Stok:          opname.Stok,
		NoBatch:       opname.NoBatch,
		NoFaktur:      opname.NoFaktur,
	}

	return response
}

func (u *GudangBarangUseCase) Update(request *model.GudangBarangRequest, id string) model.GudangBarangResponse {
	opname, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Gudang barang not found",
		})
	}

	opname.IdBarangMedis = helper.MustParse(request.IdBarangMedis)
	opname.IdRuangan = request.IdRuangan
	opname.Stok = request.Stok
	opname.NoBatch = request.NoBatch
	opname.NoFaktur = request.NoFaktur

	if err := u.Repository.Update(&opname); err != nil {
		exception.PanicIfError(err, "Failed to update gudang barang")
	}

	response := model.GudangBarangResponse{
		Id:            opname.Id.String(),
		IdBarangMedis: opname.IdBarangMedis.String(),
		IdRuangan:     opname.IdRuangan,
		Stok:          opname.Stok,
		NoBatch:       opname.NoBatch,
		NoFaktur:      opname.NoFaktur,
	}

	return response
}

func (u *GudangBarangUseCase) Delete(id string) {
	opname, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Gudang barang not found",
		})
	}

	if err := u.Repository.Delete(&opname); err != nil {
		exception.PanicIfError(err, "Failed to delete opname")
	}
}

func (u *GudangBarangUseCase) GetByKodeBarang(kode string) (*entity.GudangBarang, error) {
	return u.Repository.FindByKodeBarang(kode)
}
