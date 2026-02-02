package usecase

import (
	"time"

	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/repository"
)

type PesananUseCase struct {
	Repository repository.PesananRepository
}

func NewPesananUseCase(repository *repository.PesananRepository) *PesananUseCase {
	return &PesananUseCase{
		Repository: *repository,
	}
}

func (u *PesananUseCase) Create(request *model.PesananRequest, user string) model.PesananResponse {
	updater := helper.MustParse(user)
	var kadaluwarsa time.Time
	if request.Kadaluwarsa != "" {
		kadaluwarsa = helper.ParseTime(request.Kadaluwarsa, "2006-01-02")
	}
	pesanan := entity.Pesanan{
		Id:             helper.MustNew(),
		IdPengajuan:    helper.MustParse(request.IdPengajuan),
		IdMedis:        helper.MustParse(request.IdMedis),
		Satuan:         request.Satuan,
		HargaPengajuan: request.HargaPengajuan,
		HargaPemesanan: request.HargaPemesanan,
		Pesanan:        request.Pesanan,
		Total:          request.Total,
		Subtotal:       request.Subtotal,
		DiskonPersen:   request.DiskonPersen,
		DiskonJumlah:   request.DiskonJumlah,
		Diterima:       request.Diterima,
		Kadaluwarsa:    kadaluwarsa,
		Batch:          request.Batch,
		Updater:        updater,
	}

	if err := u.Repository.Insert(&pesanan); err != nil {
		exception.PanicIfError(err, "Failed to insert pesanan")
	}

	response := model.PesananResponse{
		Id:             pesanan.Id.String(),
		IdPengajuan:    pesanan.IdPengajuan.String(),
		IdMedis:        pesanan.IdMedis.String(),
		Satuan:         pesanan.Satuan,
		HargaPengajuan: pesanan.HargaPengajuan,
		HargaPemesanan: pesanan.HargaPemesanan,
		Pesanan:        pesanan.Pesanan,
		Total:          pesanan.Total,
		Subtotal:       pesanan.Subtotal,
		DiskonPersen:   pesanan.DiskonPersen,
		DiskonJumlah:   pesanan.DiskonJumlah,
		Diterima:       pesanan.Diterima,
		Kadaluwarsa:    helper.FormatTime(pesanan.Kadaluwarsa, "2006-01-02"),
		Batch:          pesanan.Batch,
	}

	return response
}

func (u *PesananUseCase) Get() []model.PesananResponse {
	pesanan, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all pesanan")

	response := make([]model.PesananResponse, len(pesanan))
	for i, pesanan := range pesanan {
		response[i] = model.PesananResponse{
			Id:             pesanan.Id.String(),
			IdPengajuan:    pesanan.IdPengajuan.String(),
			IdMedis:        pesanan.IdMedis.String(),
			Satuan:         pesanan.Satuan,
			HargaPengajuan: pesanan.HargaPengajuan,
			HargaPemesanan: pesanan.HargaPemesanan,
			Pesanan:        pesanan.Pesanan,
			Total:          pesanan.Total,
			Subtotal:       pesanan.Subtotal,
			DiskonPersen:   pesanan.DiskonPersen,
			DiskonJumlah:   pesanan.DiskonJumlah,
			Diterima:       pesanan.Diterima,
			Kadaluwarsa:    helper.FormatTime(pesanan.Kadaluwarsa, "2006-01-02"),
			Batch:          pesanan.Batch,
		}
	}

	return response
}

func (u *PesananUseCase) GetPage(page, size int) model.PesananPageResponse {
	pesanan, total, err := u.Repository.FindPage(page, size)
	exception.PanicIfError(err, "Failed to get paged pesanan")

	response := make([]model.PesananResponse, len(pesanan))
	for i, pesanan := range pesanan {
		response[i] = model.PesananResponse{
			Id:             pesanan.Id.String(),
			IdPengajuan:    pesanan.IdPengajuan.String(),
			IdMedis:        pesanan.IdMedis.String(),
			Satuan:         pesanan.Satuan,
			HargaPengajuan: pesanan.HargaPengajuan,
			HargaPemesanan: pesanan.HargaPemesanan,
			Pesanan:        pesanan.Pesanan,
			Total:          pesanan.Total,
			Subtotal:       pesanan.Subtotal,
			DiskonPersen:   pesanan.DiskonPersen,
			DiskonJumlah:   pesanan.DiskonJumlah,
			Diterima:       pesanan.Diterima,
			Kadaluwarsa:    helper.FormatTime(pesanan.Kadaluwarsa, "2006-01-02"),
			Batch:          pesanan.Batch,
		}
	}

	pagedResponse := model.PesananPageResponse{
		Page:    page,
		Size:    size,
		Total:   total,
		Pesanan: response,
	}

	return pagedResponse
}

func (u *PesananUseCase) GetByIdPengajuan(id string) []model.PesananResponse {
	pesanan, err := u.Repository.FindByIdPengajuan(helper.MustParse(id))
	exception.PanicIfError(err, "Failed to get all pesanan")

	response := make([]model.PesananResponse, len(pesanan))
	for i, pesanan := range pesanan {
		response[i] = model.PesananResponse{
			Id:             pesanan.Id.String(),
			IdPengajuan:    pesanan.IdPengajuan.String(),
			IdMedis:        pesanan.IdMedis.String(),
			Satuan:         pesanan.Satuan,
			HargaPengajuan: pesanan.HargaPengajuan,
			HargaPemesanan: pesanan.HargaPemesanan,
			Pesanan:        pesanan.Pesanan,
			Total:          pesanan.Total,
			Subtotal:       pesanan.Subtotal,
			DiskonPersen:   pesanan.DiskonPersen,
			DiskonJumlah:   pesanan.DiskonJumlah,
			Diterima:       pesanan.Diterima,
			Kadaluwarsa:    helper.FormatTime(pesanan.Kadaluwarsa, "2006-01-02"),
			Batch:          pesanan.Batch,
		}
	}

	return response
}

func (u *PesananUseCase) GetById(id string) model.PesananResponse {
	pesanan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Pesanan not found",
		})
	}

	response := model.PesananResponse{
		Id:             pesanan.Id.String(),
		IdPengajuan:    pesanan.IdPengajuan.String(),
		IdMedis:        pesanan.IdMedis.String(),
		Satuan:         pesanan.Satuan,
		HargaPengajuan: pesanan.HargaPengajuan,
		HargaPemesanan: pesanan.HargaPemesanan,
		Pesanan:        pesanan.Pesanan,
		Total:          pesanan.Total,
		Subtotal:       pesanan.Subtotal,
		DiskonPersen:   pesanan.DiskonPersen,
		DiskonJumlah:   pesanan.DiskonJumlah,
		Diterima:       pesanan.Diterima,
		Kadaluwarsa:    helper.FormatTime(pesanan.Kadaluwarsa, "2006-01-02"),
		Batch:          pesanan.Batch,
	}

	return response
}

func (u *PesananUseCase) Update(request *model.PesananRequest, id, user string) model.PesananResponse {
	pesanan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Pesanan not found",
		})
	}

	pesanan.IdPengajuan = helper.MustParse(request.IdPengajuan)
	pesanan.IdMedis = helper.MustParse(request.IdMedis)
	pesanan.Satuan = request.Satuan
	pesanan.HargaPengajuan = request.HargaPengajuan
	pesanan.HargaPemesanan = request.HargaPemesanan
	pesanan.Pesanan = request.Pesanan
	pesanan.Total = request.Total
	pesanan.Subtotal = request.Subtotal
	pesanan.DiskonPersen = request.DiskonPersen
	pesanan.DiskonJumlah = request.DiskonJumlah
	pesanan.Diterima = request.Diterima
	pesanan.Kadaluwarsa = helper.ParseTime(request.Kadaluwarsa, "2006-01-02")
	pesanan.Batch = request.Batch
	pesanan.Updater = helper.MustParse(user)

	if err := u.Repository.Update(&pesanan); err != nil {
		exception.PanicIfError(err, "Failed to update pesanan")
	}

	response := model.PesananResponse{
		Id:             pesanan.Id.String(),
		IdPengajuan:    pesanan.IdPengajuan.String(),
		IdMedis:        pesanan.IdMedis.String(),
		Satuan:         pesanan.Satuan,
		HargaPengajuan: pesanan.HargaPengajuan,
		HargaPemesanan: pesanan.HargaPemesanan,
		Pesanan:        pesanan.Pesanan,
		Total:          pesanan.Total,
		Subtotal:       pesanan.Subtotal,
		DiskonPersen:   pesanan.DiskonPersen,
		DiskonJumlah:   pesanan.DiskonJumlah,
		Diterima:       pesanan.Diterima,
		Kadaluwarsa:    helper.FormatTime(pesanan.Kadaluwarsa, "2006-01-02"),
		Batch:          pesanan.Batch,
	}

	return response
}

func (u *PesananUseCase) Delete(id, user string) {
	pesanan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Pesanan not found",
		})
	}

	pesanan.Updater = helper.MustParse(user)

	if err := u.Repository.Delete(&pesanan); err != nil {
		exception.PanicIfError(err, "Failed to delete pesanan")
	}
}
