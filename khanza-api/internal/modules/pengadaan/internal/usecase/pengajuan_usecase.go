package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/repository"
)

type PengajuanUseCase struct {
	Repository repository.PengajuanRepository
}

func NewPengajuanUseCase(repository *repository.PengajuanRepository) *PengajuanUseCase {
	return &PengajuanUseCase{
		Repository: *repository,
	}
}

func (u *PengajuanUseCase) Create(request *model.PengajuanRequest, user string) model.PengajuanResponse {
	updater := helper.MustParse(user)
	pengajuan := entity.Pengajuan{
		Id:      helper.MustNew(),
		Tanggal: helper.ParseTime(request.Tanggal, "2006-01-02"),
		Nomor:   request.Nomor,
		Pegawai: helper.MustParse(request.Pegawai),
		Total:   request.Total,
		Catatan: request.Catatan,
		Status:  request.Status,
		Updater: updater,
	}

	if err := u.Repository.Insert(&pengajuan); err != nil {
		exception.PanicIfError(err, "Failed to insert pengajuan")
	}

	response := model.PengajuanResponse{
		Id:      pengajuan.Id.String(),
		Tanggal: helper.FormatTime(pengajuan.Tanggal, "2006-01-02"),
		Nomor:   pengajuan.Nomor,
		Pegawai: pengajuan.Pegawai.String(),
		Total:   pengajuan.Total,
		Catatan: pengajuan.Catatan,
		Status:  pengajuan.Status,
	}

	return response
}

func (u *PengajuanUseCase) Get() []model.PengajuanResponse {
	pengajuan, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all pengajuan")

	response := make([]model.PengajuanResponse, len(pengajuan))
	for i, pengajuan := range pengajuan {
		response[i] = model.PengajuanResponse{
			Id:      pengajuan.Id.String(),
			Tanggal: helper.FormatTime(pengajuan.Tanggal, "2006-01-02"),
			Nomor:   pengajuan.Nomor,
			Pegawai: pengajuan.Pegawai.String(),
			Total:   pengajuan.Total,
			Catatan: pengajuan.Catatan,
			Status:  pengajuan.Status,
		}
	}

	return response
}

func (u *PengajuanUseCase) GetPage(page, size int) model.PengajuanPageResponse {
	pengajuan, total, err := u.Repository.FindPage(page, size)
	exception.PanicIfError(err, "Failed to get paged pengajuan")

	response := make([]model.PengajuanResponse, len(pengajuan))
	for i, pengajuan := range pengajuan {
		response[i] = model.PengajuanResponse{
			Id:      pengajuan.Id.String(),
			Tanggal: helper.FormatTime(pengajuan.Tanggal, "2006-01-02"),
			Nomor:   pengajuan.Nomor,
			Pegawai: pengajuan.Pegawai.String(),
			Total:   pengajuan.Total,
			Catatan: pengajuan.Catatan,
			Status:  pengajuan.Status,
		}
	}

	pagedResponse := model.PengajuanPageResponse{
		Page:      page,
		Size:      size,
		Total:     total,
		Pengajuan: response,
	}

	return pagedResponse
}

func (u *PengajuanUseCase) GetById(id string) model.PengajuanResponse {
	pengajuan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Pengajuan not found",
		})
	}

	response := model.PengajuanResponse{
		Id:      pengajuan.Id.String(),
		Tanggal: helper.FormatTime(pengajuan.Tanggal, "2006-01-02"),
		Nomor:   pengajuan.Nomor,
		Pegawai: pengajuan.Pegawai.String(),
		Total:   pengajuan.Total,
		Catatan: pengajuan.Catatan,
		Status:  pengajuan.Status,
	}

	return response
}

func (u *PengajuanUseCase) Update(request *model.PengajuanRequest, id, user string) model.PengajuanResponse {
	pengajuan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Pengajuan not found",
		})
	}

	pengajuan.Tanggal = helper.ParseTime(request.Tanggal, "2006-01-02")
	pengajuan.Nomor = request.Nomor
	pengajuan.Pegawai = helper.MustParse(request.Pegawai)
	pengajuan.Total = request.Total
	pengajuan.Catatan = request.Catatan
	pengajuan.Status = request.Status
	pengajuan.Updater = helper.MustParse(user)

	if err := u.Repository.Update(&pengajuan); err != nil {
		exception.PanicIfError(err, "Failed to update pengajuan")
	}

	response := model.PengajuanResponse{
		Id:      pengajuan.Id.String(),
		Tanggal: helper.FormatTime(pengajuan.Tanggal, "2006-01-02"),
		Nomor:   pengajuan.Nomor,
		Pegawai: pengajuan.Pegawai.String(),
		Total:   pengajuan.Total,
		Catatan: pengajuan.Catatan,
		Status:  pengajuan.Status,
	}

	return response
}

func (u *PengajuanUseCase) Delete(id, user string) {
	pengajuan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Pengajuan not found",
		})
	}

	pengajuan.Updater = helper.MustParse(user)

	if err := u.Repository.Delete(&pengajuan); err != nil {
		exception.PanicIfError(err, "Failed to delete pengajuan")
	}
}
