package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
)

type OpnameUseCase struct {
	Repository repository.OpnameRepository
}

func NewOpnameUseCase(repository *repository.OpnameRepository) *OpnameUseCase {
	return &OpnameUseCase{
		Repository: *repository,
	}
}

func (u *OpnameUseCase) Create(request *model.OpnameRequest) model.OpnameResponse {
	opname := entity.Opname{
		Id:            helper.MustNew(),
		IdBarangMedis: helper.MustParse(request.IdBarangMedis),
		IdRuangan:     request.IdRuangan,
		HBeli:         request.HBeli,
		Tanggal:       helper.ParseTime(request.Tanggal, "2006-01-02"),
		Real:          request.Real,
		Stok:          request.Stok,
		Keterangan:    request.Keterangan,
		NoBatch:       request.NoBatch,
		NoFaktur:      request.NoFaktur,
	}

	if err := u.Repository.Insert(&opname); err != nil {
		exception.PanicIfError(err, "Failed to insert opname")
	}

	response := model.OpnameResponse{
		Id:            opname.Id.String(),
		IdBarangMedis: opname.IdBarangMedis.String(),
		IdRuangan:     opname.IdRuangan,
		HBeli:         opname.HBeli,
		Tanggal:       helper.FormatTime(opname.Tanggal, "2006-01-02"),
		Real:          opname.Real,
		Stok:          opname.Stok,
		Keterangan:    opname.Keterangan,
		NoBatch:       opname.NoBatch,
		NoFaktur:      opname.NoFaktur,
	}

	return response
}

func (u *OpnameUseCase) Get() []model.OpnameResponse {
	opname, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all opname")

	response := make([]model.OpnameResponse, len(opname))
	for i, opname := range opname {
		response[i] = model.OpnameResponse{
			Id:            opname.Id.String(),
			IdBarangMedis: opname.IdBarangMedis.String(),
			IdRuangan:     opname.IdRuangan,
			HBeli:         opname.HBeli,
			Tanggal:       helper.FormatTime(opname.Tanggal, "2006-01-02"),
			Real:          opname.Real,
			Stok:          opname.Stok,
			Keterangan:    opname.Keterangan,
			NoBatch:       opname.NoBatch,
			NoFaktur:      opname.NoFaktur,
		}
	}

	return response
}

func (u *OpnameUseCase) GetById(id string) model.OpnameResponse {
	opname, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Opname not found",
		})
	}

	response := model.OpnameResponse{
		Id:            opname.Id.String(),
		IdBarangMedis: opname.IdBarangMedis.String(),
		IdRuangan:     opname.IdRuangan,
		HBeli:         opname.HBeli,
		Tanggal:       helper.FormatTime(opname.Tanggal, "2006-01-02"),
		Real:          opname.Real,
		Stok:          opname.Stok,
		Keterangan:    opname.Keterangan,
		NoBatch:       opname.NoBatch,
		NoFaktur:      opname.NoFaktur,
	}

	return response
}

func (u *OpnameUseCase) Update(request *model.OpnameRequest, id string) model.OpnameResponse {
	opname, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Opname not found",
		})
	}

	opname.IdBarangMedis = helper.MustParse(request.IdBarangMedis)
	opname.IdRuangan = request.IdRuangan
	opname.HBeli = request.HBeli
	opname.Tanggal = helper.ParseTime(request.Tanggal, "2006-01-02")
	opname.Real = request.Real
	opname.Stok = request.Stok
	opname.Keterangan = request.Keterangan
	opname.NoBatch = request.NoBatch
	opname.NoFaktur = request.NoFaktur

	if err := u.Repository.Update(&opname); err != nil {
		exception.PanicIfError(err, "Failed to update opname")
	}

	response := model.OpnameResponse{
		Id:            opname.Id.String(),
		IdBarangMedis: opname.IdBarangMedis.String(),
		IdRuangan:     opname.IdRuangan,
		HBeli:         opname.HBeli,
		Tanggal:       helper.FormatTime(opname.Tanggal, "2006-01-02"),
		Real:          opname.Real,
		Stok:          opname.Stok,
		Keterangan:    opname.Keterangan,
		NoBatch:       opname.NoBatch,
		NoFaktur:      opname.NoFaktur,
	}

	return response
}

func (u *OpnameUseCase) Delete(id string) {
	opname, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Opname not found",
		})
	}

	if err := u.Repository.Delete(&opname); err != nil {
		exception.PanicIfError(err, "Failed to delete opname")
	}
}
