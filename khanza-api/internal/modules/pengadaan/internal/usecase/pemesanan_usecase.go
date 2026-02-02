package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/repository"
)

type PemesananUseCase struct {
	Repository repository.PemesananRepository
}

func NewPemesananUseCase(repository *repository.PemesananRepository) *PemesananUseCase {
	return &PemesananUseCase{
		Repository: *repository,
	}
}

func (u *PemesananUseCase) Create(request *model.PemesananRequest, user string) model.PemesananResponse {
	updater := helper.MustParse(user)
	pemesanan := entity.Pemesanan{
		Id:          helper.MustNew(),
		Tanggal:     helper.ParseTime(request.Tanggal, "2006-01-02"),
		Nomor:       request.Nomor,
		IdPengajuan: helper.MustParse(request.IdPengajuan),
		Supplier:    request.Supplier,
		IdPegawai:   helper.MustParse(request.IdPegawai),
		PajakPersen: request.PajakPersen,
		PajakJumlah: request.PajakJumlah,
		Materai:     request.Materai,
		Total:       request.Total,
		Updater:     updater,
	}

	if err := u.Repository.Insert(&pemesanan); err != nil {
		exception.PanicIfError(err, "Failed to insert pemesanan")
	}

	response := model.PemesananResponse{
		Id:          pemesanan.Id.String(),
		Tanggal:     helper.FormatTime(pemesanan.Tanggal, "2006-01-02"),
		Nomor:       pemesanan.Nomor,
		IdPengajuan: pemesanan.IdPengajuan.String(),
		Supplier:    pemesanan.Supplier,
		IdPegawai:   pemesanan.IdPegawai.String(),
		PajakPersen: pemesanan.PajakPersen,
		PajakJumlah: pemesanan.PajakJumlah,
		Materai:     pemesanan.Materai,
		Total:       pemesanan.Total,
	}

	return response
}

func (u *PemesananUseCase) Get() []model.PemesananResponse {
	pemesanan, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all pemesanan")

	response := make([]model.PemesananResponse, len(pemesanan))
	for i, pemesanan := range pemesanan {
		response[i] = model.PemesananResponse{
			Id:          pemesanan.Id.String(),
			Tanggal:     helper.FormatTime(pemesanan.Tanggal, "2006-01-02"),
			Nomor:       pemesanan.Nomor,
			IdPengajuan: pemesanan.IdPengajuan.String(),
			Supplier:    pemesanan.Supplier,
			IdPegawai:   pemesanan.IdPegawai.String(),
			PajakPersen: pemesanan.PajakPersen,
			PajakJumlah: pemesanan.PajakJumlah,
			Materai:     pemesanan.Materai,
			Total:       pemesanan.Total,
		}
	}

	return response
}

func (u *PemesananUseCase) GetPage(page, size int) model.PemesananPageResponse {
	pemesanan, total, err := u.Repository.FindPage(page, size)
	exception.PanicIfError(err, "Failed to get paged pemesanan")

	response := make([]model.PemesananResponse, len(pemesanan))
	for i, pemesanan := range pemesanan {
		response[i] = model.PemesananResponse{
			Id:          pemesanan.Id.String(),
			Tanggal:     helper.FormatTime(pemesanan.Tanggal, "2006-01-02"),
			Nomor:       pemesanan.Nomor,
			IdPengajuan: pemesanan.IdPengajuan.String(),
			Supplier:    pemesanan.Supplier,
			IdPegawai:   pemesanan.IdPegawai.String(),
			PajakPersen: pemesanan.PajakPersen,
			PajakJumlah: pemesanan.PajakJumlah,
			Materai:     pemesanan.Materai,
			Total:       pemesanan.Total,
		}
	}

	pagedResponse := model.PemesananPageResponse{
		Page:      page,
		Size:      size,
		Total:     total,
		Pemesanan: response,
	}

	return pagedResponse
}

func (u *PemesananUseCase) GetById(id string) model.PemesananResponse {
	pemesanan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Pemesanan not found",
		})
	}

	response := model.PemesananResponse{
		Id:          pemesanan.Id.String(),
		Tanggal:     helper.FormatTime(pemesanan.Tanggal, "2006-01-02"),
		Nomor:       pemesanan.Nomor,
		IdPengajuan: pemesanan.IdPengajuan.String(),
		Supplier:    pemesanan.Supplier,
		IdPegawai:   pemesanan.IdPegawai.String(),
		PajakPersen: pemesanan.PajakPersen,
		PajakJumlah: pemesanan.PajakJumlah,
		Materai:     pemesanan.Materai,
		Total:       pemesanan.Total,
	}

	return response
}

func (u *PemesananUseCase) Update(request *model.PemesananRequest, id, user string) model.PemesananResponse {
	pemesanan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Pemesanan not found",
		})
	}

	pemesanan.Tanggal = helper.ParseTime(request.Tanggal, "2006-01-02")
	pemesanan.Nomor = request.Nomor
	pemesanan.IdPengajuan = helper.MustParse(request.IdPengajuan)
	pemesanan.Supplier = request.Supplier
	pemesanan.IdPegawai = helper.MustParse(request.IdPegawai)
	pemesanan.PajakPersen = request.PajakPersen
	pemesanan.PajakJumlah = request.PajakJumlah
	pemesanan.Materai = request.Materai
	pemesanan.Total = request.Total
	pemesanan.Updater = helper.MustParse(user)

	if err := u.Repository.Update(&pemesanan); err != nil {
		exception.PanicIfError(err, "Failed to update pemesanan")
	}

	response := model.PemesananResponse{
		Id:          pemesanan.Id.String(),
		Tanggal:     helper.FormatTime(pemesanan.Tanggal, "2006-01-02"),
		Nomor:       pemesanan.Nomor,
		IdPengajuan: pemesanan.IdPengajuan.String(),
		Supplier:    pemesanan.Supplier,
		IdPegawai:   pemesanan.IdPegawai.String(),
		PajakPersen: pemesanan.PajakPersen,
		PajakJumlah: pemesanan.PajakJumlah,
		Materai:     pemesanan.Materai,
		Total:       pemesanan.Total,
	}

	return response
}

func (u *PemesananUseCase) Delete(id, user string) {
	pemesanan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Pemesanan not found",
		})
	}

	pemesanan.Updater = helper.MustParse(user)

	if err := u.Repository.Delete(&pemesanan); err != nil {
		exception.PanicIfError(err, "Failed to delete pemesanan")
	}
}
