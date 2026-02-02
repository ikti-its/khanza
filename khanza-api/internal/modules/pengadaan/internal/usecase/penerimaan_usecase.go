package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/repository"
)

type PenerimaanUseCase struct {
	Repository repository.PenerimaanRepository
}

func NewPenerimaanUseCase(repository *repository.PenerimaanRepository) *PenerimaanUseCase {
	return &PenerimaanUseCase{
		Repository: *repository,
	}
}

func (u *PenerimaanUseCase) Create(request *model.PenerimaanRequest, user string) model.PenerimaanResponse {
	updater := helper.MustParse(user)
	penerimaan := entity.Penerimaan{
		Id:          helper.MustNew(),
		IdPengajuan: helper.MustParse(request.IdPengajuan),
		IdPemesanan: helper.MustParse(request.IdPemesanan),
		Nomor:       request.Nomor,
		Datang:      helper.ParseTime(request.Datang, "2006-01-02"),
		Faktur:      helper.ParseTime(request.Faktur, "2006-01-02"),
		JatuhTempo:  helper.ParseTime(request.JatuhTempo, "2006-01-02"),
		IdPegawai:   helper.MustParse(request.IdPegawai),
		Ruangan:     request.Ruangan,
		Updater:     updater,
	}

	if err := u.Repository.Insert(&penerimaan); err != nil {
		exception.PanicIfError(err, "Failed to insert penerimaan")
	}

	response := model.PenerimaanResponse{
		Id:          penerimaan.Id.String(),
		IdPengajuan: penerimaan.IdPengajuan.String(),
		IdPemesanan: penerimaan.IdPemesanan.String(),
		Nomor:       penerimaan.Nomor,
		Datang:      helper.FormatTime(penerimaan.Datang, "2006-01-02"),
		Faktur:      helper.FormatTime(penerimaan.Faktur, "2006-01-02"),
		JatuhTempo:  helper.FormatTime(penerimaan.JatuhTempo, "2006-01-02"),
		IdPegawai:   penerimaan.IdPegawai.String(),
		Ruangan:     penerimaan.Ruangan,
	}

	return response
}

func (u *PenerimaanUseCase) Get() []model.PenerimaanResponse {
	penerimaan, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all penerimaan")

	response := make([]model.PenerimaanResponse, len(penerimaan))
	for i, penerimaan := range penerimaan {
		response[i] = model.PenerimaanResponse{
			Id:          penerimaan.Id.String(),
			IdPengajuan: penerimaan.IdPengajuan.String(),
			IdPemesanan: penerimaan.IdPemesanan.String(),
			Nomor:       penerimaan.Nomor,
			Datang:      helper.FormatTime(penerimaan.Datang, "2006-01-02"),
			Faktur:      helper.FormatTime(penerimaan.Faktur, "2006-01-02"),
			JatuhTempo:  helper.FormatTime(penerimaan.JatuhTempo, "2006-01-02"),
			IdPegawai:   penerimaan.IdPegawai.String(),
			Ruangan:     penerimaan.Ruangan,
		}
	}

	return response
}

func (u *PenerimaanUseCase) GetPage(page, size int) model.PenerimaanPageResponse {
	penerimaan, total, err := u.Repository.FindPage(page, size)
	exception.PanicIfError(err, "Failed to get paged penerimaan")

	response := make([]model.PenerimaanResponse, len(penerimaan))
	for i, penerimaan := range penerimaan {
		response[i] = model.PenerimaanResponse{
			Id:          penerimaan.Id.String(),
			IdPengajuan: penerimaan.IdPengajuan.String(),
			IdPemesanan: penerimaan.IdPemesanan.String(),
			Nomor:       penerimaan.Nomor,
			Datang:      helper.FormatTime(penerimaan.Datang, "2006-01-02"),
			Faktur:      helper.FormatTime(penerimaan.Faktur, "2006-01-02"),
			JatuhTempo:  helper.FormatTime(penerimaan.JatuhTempo, "2006-01-02"),
			IdPegawai:   penerimaan.IdPegawai.String(),
			Ruangan:     penerimaan.Ruangan,
		}
	}

	pagedResponse := model.PenerimaanPageResponse{
		Page:       page,
		Size:       size,
		Total:      total,
		Penerimaan: response,
	}

	return pagedResponse
}

func (u *PenerimaanUseCase) GetById(id string) model.PenerimaanResponse {
	penerimaan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Penerimaan not found",
		})
	}

	response := model.PenerimaanResponse{
		Id:          penerimaan.Id.String(),
		IdPengajuan: penerimaan.IdPengajuan.String(),
		IdPemesanan: penerimaan.IdPemesanan.String(),
		Nomor:       penerimaan.Nomor,
		Datang:      helper.FormatTime(penerimaan.Datang, "2006-01-02"),
		Faktur:      helper.FormatTime(penerimaan.Faktur, "2006-01-02"),
		JatuhTempo:  helper.FormatTime(penerimaan.JatuhTempo, "2006-01-02"),
		IdPegawai:   penerimaan.IdPegawai.String(),
		Ruangan:     penerimaan.Ruangan,
	}

	return response
}

func (u *PenerimaanUseCase) Update(request *model.PenerimaanRequest, id, user string) model.PenerimaanResponse {
	penerimaan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Penerimaan not found",
		})
	}

	penerimaan.IdPengajuan = helper.MustParse(request.IdPengajuan)
	penerimaan.IdPemesanan = helper.MustParse(request.IdPemesanan)
	penerimaan.Nomor = request.Nomor
	penerimaan.Datang = helper.ParseTime(request.Datang, "2006-01-02")
	penerimaan.Faktur = helper.ParseTime(request.Faktur, "2006-01-02")
	penerimaan.JatuhTempo = helper.ParseTime(request.JatuhTempo, "2006-01-02")
	penerimaan.IdPegawai = helper.MustParse(request.IdPegawai)
	penerimaan.Ruangan = request.Ruangan
	penerimaan.Updater = helper.MustParse(user)

	if err := u.Repository.Update(&penerimaan); err != nil {
		exception.PanicIfError(err, "Failed to update penerimaan")
	}

	response := model.PenerimaanResponse{
		Id:          penerimaan.Id.String(),
		IdPengajuan: penerimaan.IdPengajuan.String(),
		IdPemesanan: penerimaan.IdPemesanan.String(),
		Nomor:       penerimaan.Nomor,
		Datang:      helper.FormatTime(penerimaan.Datang, "2006-01-02"),
		Faktur:      helper.FormatTime(penerimaan.Faktur, "2006-01-02"),
		JatuhTempo:  helper.FormatTime(penerimaan.JatuhTempo, "2006-01-02"),
		IdPegawai:   penerimaan.IdPegawai.String(),
		Ruangan:     penerimaan.Ruangan,
	}

	return response
}

func (u *PenerimaanUseCase) Delete(id, user string) {
	penerimaan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Penerimaan not found",
		})
	}

	penerimaan.Updater = helper.MustParse(user)

	if err := u.Repository.Delete(&penerimaan); err != nil {
		exception.PanicIfError(err, "Failed to delete penerimaan")
	}
}
