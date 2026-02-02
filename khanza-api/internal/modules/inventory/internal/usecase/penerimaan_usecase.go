package usecase

import (
	"database/sql"

	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
)

type PenerimaanUseCase struct {
	Repository repository.PenerimaanRepository
}

func NewPenerimaanUseCase(repository *repository.PenerimaanRepository) *PenerimaanUseCase {
	return &PenerimaanUseCase{
		Repository: *repository,
	}
}

func (u *PenerimaanUseCase) Create(request *model.PenerimaanRequest) model.PenerimaanResponse {
	penerimaan := entity.Penerimaan{
		Id:                helper.MustNew(),
		NoFaktur:          request.NoFaktur,
		NoPemesanan:       request.NoPemesanan,
		IdSupplier:        request.IdSupplier,
		TanggalDatang:     helper.ParseTime(request.TanggalDatang, "2006-01-02"),
		TanggalFaktur:     helper.ParseTime(request.TanggalFaktur, "2006-01-02"),
		TanggalJatuhTempo: helper.ParseTime(request.TanggalJatuhTempo, "2006-01-02"),
		IdPegawai:         helper.MustParse(request.IdPegawai),
		IdRuangan:         request.IdRuangan,
		PajakPersen:       request.PajakPersen,
		PajakJumlah:       request.PajakJumlah,
		Tagihan:           request.Tagihan,
		Materai:           request.Materai,
	}

	if err := u.Repository.Insert(&penerimaan); err != nil {
		exception.PanicIfError(err, "Failed to insert penerimaan")
	}

	response := model.PenerimaanResponse{
		Id:                penerimaan.Id.String(),
		NoFaktur:          penerimaan.NoFaktur,
		NoPemesanan:       penerimaan.NoPemesanan,
		IdSupplier:        penerimaan.IdSupplier,
		TanggalDatang:     helper.FormatTime(penerimaan.TanggalDatang, "2006-01-02"),
		TanggalFaktur:     helper.FormatTime(penerimaan.TanggalFaktur, "2006-01-02"),
		TanggalJatuhTempo: helper.FormatTime(penerimaan.TanggalJatuhTempo, "2006-01-02"),
		IdPegawai:         penerimaan.IdPegawai.String(),
		IdRuangan:         penerimaan.IdRuangan,
		PajakPersen:       penerimaan.PajakPersen,
		PajakJumlah:       penerimaan.PajakJumlah,
		Tagihan:           penerimaan.Tagihan,
		Materai:           penerimaan.Materai,
	}

	return response
}

func (u *PenerimaanUseCase) Get() []model.PenerimaanResponse {
	penerimaan, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all penerimaan")

	response := make([]model.PenerimaanResponse, len(penerimaan))
	for i, penerimaan := range penerimaan {
		response[i] = model.PenerimaanResponse{
			Id:                penerimaan.Id.String(),
			NoFaktur:          penerimaan.NoFaktur,
			NoPemesanan:       penerimaan.NoPemesanan,
			IdSupplier:        penerimaan.IdSupplier,
			TanggalDatang:     helper.FormatTime(penerimaan.TanggalDatang, "2006-01-02"),
			TanggalFaktur:     helper.FormatTime(penerimaan.TanggalFaktur, "2006-01-02"),
			TanggalJatuhTempo: helper.FormatTime(penerimaan.TanggalJatuhTempo, "2006-01-02"),
			IdPegawai:         penerimaan.IdPegawai.String(),
			IdRuangan:         penerimaan.IdRuangan,
			PajakPersen:       penerimaan.PajakPersen,
			PajakJumlah:       penerimaan.PajakJumlah,
			Tagihan:           penerimaan.Tagihan,
			Materai:           penerimaan.Materai,
		}
	}

	return response
}

func (u *PenerimaanUseCase) GetById(id string) model.PenerimaanResponse {
	penerimaan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Penerimaan not found",
		})
	}

	response := model.PenerimaanResponse{
		Id:                penerimaan.Id.String(),
		NoFaktur:          penerimaan.NoFaktur,
		NoPemesanan:       penerimaan.NoPemesanan,
		IdSupplier:        penerimaan.IdSupplier,
		TanggalDatang:     helper.FormatTime(penerimaan.TanggalDatang, "2006-01-02"),
		TanggalFaktur:     helper.FormatTime(penerimaan.TanggalFaktur, "2006-01-02"),
		TanggalJatuhTempo: helper.FormatTime(penerimaan.TanggalJatuhTempo, "2006-01-02"),
		IdPegawai:         penerimaan.IdPegawai.String(),
		IdRuangan:         penerimaan.IdRuangan,
		PajakPersen:       penerimaan.PajakPersen,
		PajakJumlah:       penerimaan.PajakJumlah,
		Tagihan:           penerimaan.Tagihan,
		Materai:           penerimaan.Materai,
	}

	return response
}

func (u *PenerimaanUseCase) Update(request *model.PenerimaanRequest, id string) model.PenerimaanResponse {
	penerimaan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Penerimaan not found",
		})
	}

	penerimaan.NoFaktur = request.NoFaktur
	penerimaan.NoPemesanan = request.NoPemesanan
	penerimaan.IdSupplier = request.IdSupplier
	penerimaan.TanggalDatang = helper.ParseTime(request.TanggalDatang, "2006-01-02")
	penerimaan.TanggalFaktur = helper.ParseTime(request.TanggalFaktur, "2006-01-02")
	penerimaan.TanggalJatuhTempo = helper.ParseTime(request.TanggalJatuhTempo, "2006-01-02")
	penerimaan.IdPegawai = helper.MustParse(request.IdPegawai)
	penerimaan.IdRuangan = request.IdRuangan
	penerimaan.PajakPersen = request.PajakPersen
	penerimaan.PajakJumlah = request.PajakJumlah
	penerimaan.Tagihan = request.Tagihan
	penerimaan.Materai = request.Materai

	if err := u.Repository.Update(&penerimaan); err != nil {
		exception.PanicIfError(err, "Failed to update penerimaan")
	}

	response := model.PenerimaanResponse{
		Id:                penerimaan.Id.String(),
		NoFaktur:          penerimaan.NoFaktur,
		NoPemesanan:       penerimaan.NoPemesanan,
		IdSupplier:        penerimaan.IdSupplier,
		TanggalDatang:     helper.FormatTime(penerimaan.TanggalDatang, "2006-01-02"),
		TanggalFaktur:     helper.FormatTime(penerimaan.TanggalFaktur, "2006-01-02"),
		TanggalJatuhTempo: helper.FormatTime(penerimaan.TanggalJatuhTempo, "2006-01-02"),
		IdPegawai:         penerimaan.IdPegawai.String(),
		IdRuangan:         penerimaan.IdRuangan,
		PajakPersen:       penerimaan.PajakPersen,
		PajakJumlah:       penerimaan.PajakJumlah,
		Tagihan:           penerimaan.Tagihan,
		Materai:           penerimaan.Materai,
	}

	return response
}

func (u *PenerimaanUseCase) Delete(id string) {
	penerimaan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Penerimaan not found",
		})
	}

	if err := u.Repository.Delete(&penerimaan); err != nil {
		exception.PanicIfError(err, "Failed to delete penerimaan")
	}
}

func (u *PenerimaanUseCase) DetailCreate(request *model.DetailPenerimaanRequest) model.DetailPenerimaanResponse {
	var kadaluwarsa sql.NullTime
	if request.Kadaluwarsa != "" {
		kadaluwarsa.Valid = true
		kadaluwarsa.Time = helper.ParseTime(request.Kadaluwarsa, "2006-01-02")
	} else {
		kadaluwarsa.Valid = false
	}

	detail := entity.DetailPenerimaan{
		IdPenerimaan:    helper.MustParse(request.IdPenerimaan),
		IdBarangMedis:   helper.MustParse(request.IdBarangMedis),
		IdSatuan:        request.IdSatuan,
		UbahMaster:      request.UbahMaster,
		Jumlah:          request.Jumlah,
		HPesan:          request.HPesan,
		SubtotalPerItem: request.SubtotalPerItem,
		DiskonPersen:    request.DiskonPersen,
		DiskonJumlah:    request.DiskonJumlah,
		TotalPerItem:    request.TotalPerItem,
		JumlahDiterima:  request.JumlahDiterima,
		Kadaluwarsa:     kadaluwarsa,
		NoBatch:         request.NoBatch,
	}

	if err := u.Repository.DetailInsert(&detail); err != nil {
		exception.PanicIfError(err, "Failed to insert detail penerimaan")
	}

	response := model.DetailPenerimaanResponse{
		IdPenerimaan:    detail.IdPenerimaan.String(),
		IdBarangMedis:   detail.IdBarangMedis.String(),
		IdSatuan:        detail.IdSatuan,
		UbahMaster:      detail.UbahMaster,
		Jumlah:          detail.Jumlah,
		HPesan:          detail.HPesan,
		SubtotalPerItem: detail.SubtotalPerItem,
		DiskonPersen:    detail.DiskonPersen,
		DiskonJumlah:    detail.DiskonJumlah,
		TotalPerItem:    detail.TotalPerItem,
		JumlahDiterima:  detail.JumlahDiterima,
		Kadaluwarsa:     helper.FormatTime(detail.Kadaluwarsa.Time, "2006-01-02"),
		NoBatch:         detail.NoBatch,
	}

	return response
}

func (u *PenerimaanUseCase) DetailGet() []model.DetailPenerimaanResponse {
	detail, err := u.Repository.DetailFind()
	exception.PanicIfError(err, "Failed to get all detail penerimaan")

	response := make([]model.DetailPenerimaanResponse, len(detail))
	for i, detail := range detail {
		response[i] = model.DetailPenerimaanResponse{
			IdPenerimaan:    detail.IdPenerimaan.String(),
			IdBarangMedis:   detail.IdBarangMedis.String(),
			IdSatuan:        detail.IdSatuan,
			UbahMaster:      detail.UbahMaster,
			Jumlah:          detail.Jumlah,
			HPesan:          detail.HPesan,
			SubtotalPerItem: detail.SubtotalPerItem,
			DiskonPersen:    detail.DiskonPersen,
			DiskonJumlah:    detail.DiskonJumlah,
			TotalPerItem:    detail.TotalPerItem,
			JumlahDiterima:  detail.JumlahDiterima,
			Kadaluwarsa:     helper.FormatTime(detail.Kadaluwarsa.Time, "2006-01-02"),
			NoBatch:         detail.NoBatch,
		}
	}

	return response
}

func (u *PenerimaanUseCase) DetailGetById(id string) []model.DetailPenerimaanResponse {
	detail, err := u.Repository.DetailFindById(helper.MustParse(id))
	exception.PanicIfError(err, "Failed to get all detail penerimaan")

	response := make([]model.DetailPenerimaanResponse, len(detail))
	for i, detail := range detail {
		response[i] = model.DetailPenerimaanResponse{
			IdPenerimaan:    detail.IdPenerimaan.String(),
			IdBarangMedis:   detail.IdBarangMedis.String(),
			IdSatuan:        detail.IdSatuan,
			UbahMaster:      detail.UbahMaster,
			Jumlah:          detail.Jumlah,
			HPesan:          detail.HPesan,
			SubtotalPerItem: detail.SubtotalPerItem,
			DiskonPersen:    detail.DiskonPersen,
			DiskonJumlah:    detail.DiskonJumlah,
			TotalPerItem:    detail.TotalPerItem,
			JumlahDiterima:  detail.JumlahDiterima,
			Kadaluwarsa:     helper.FormatTime(detail.Kadaluwarsa.Time, "2006-01-02"),
			NoBatch:         detail.NoBatch,
		}
	}

	return response
}

func (u *PenerimaanUseCase) DetailGetByPenerimaanBarang(penerimaan, barang string) model.DetailPenerimaanResponse {
	detail, err := u.Repository.DetailFindByPenerimaanBarang(helper.MustParse(penerimaan), helper.MustParse(barang))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Detail penerimaan not found",
		})
	}

	response := model.DetailPenerimaanResponse{
		IdPenerimaan:    detail.IdPenerimaan.String(),
		IdBarangMedis:   detail.IdBarangMedis.String(),
		IdSatuan:        detail.IdSatuan,
		UbahMaster:      detail.UbahMaster,
		Jumlah:          detail.Jumlah,
		HPesan:          detail.HPesan,
		SubtotalPerItem: detail.SubtotalPerItem,
		DiskonPersen:    detail.DiskonPersen,
		DiskonJumlah:    detail.DiskonJumlah,
		TotalPerItem:    detail.TotalPerItem,
		JumlahDiterima:  detail.JumlahDiterima,
		Kadaluwarsa:     helper.FormatTime(detail.Kadaluwarsa.Time, "2006-01-02"),
		NoBatch:         detail.NoBatch,
	}

	return response
}

func (u *PenerimaanUseCase) DetailUpdate(request *model.DetailPenerimaanRequest, penerimaan, barang string) model.DetailPenerimaanResponse {
	detail, err := u.Repository.DetailFindByPenerimaanBarang(helper.MustParse(penerimaan), helper.MustParse(barang))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Detail penerimaan not found",
		})
	}

	var kadaluwarsa sql.NullTime
	if request.Kadaluwarsa != "" {
		kadaluwarsa.Valid = true
		kadaluwarsa.Time = helper.ParseTime(request.Kadaluwarsa, "2006-01-02")
	} else {
		kadaluwarsa.Valid = false
	}

	detail.IdSatuan = request.IdSatuan
	detail.UbahMaster = request.UbahMaster
	detail.Jumlah = request.Jumlah
	detail.HPesan = request.HPesan
	detail.SubtotalPerItem = request.SubtotalPerItem
	detail.DiskonPersen = request.DiskonPersen
	detail.DiskonJumlah = request.DiskonJumlah
	detail.TotalPerItem = request.TotalPerItem
	detail.JumlahDiterima = request.JumlahDiterima
	detail.Kadaluwarsa = kadaluwarsa
	detail.NoBatch = request.NoBatch

	if err := u.Repository.DetailUpdate(&detail); err != nil {
		exception.PanicIfError(err, "Failed to update detail penerimaan")
	}

	response := model.DetailPenerimaanResponse{
		IdPenerimaan:    detail.IdPenerimaan.String(),
		IdBarangMedis:   detail.IdBarangMedis.String(),
		IdSatuan:        detail.IdSatuan,
		UbahMaster:      detail.UbahMaster,
		Jumlah:          detail.Jumlah,
		HPesan:          detail.HPesan,
		SubtotalPerItem: detail.SubtotalPerItem,
		DiskonPersen:    detail.DiskonPersen,
		DiskonJumlah:    detail.DiskonJumlah,
		TotalPerItem:    detail.TotalPerItem,
		JumlahDiterima:  detail.JumlahDiterima,
		Kadaluwarsa:     helper.FormatTime(detail.Kadaluwarsa.Time, "2006-01-02"),
		NoBatch:         detail.NoBatch,
	}

	return response
}

func (u *PenerimaanUseCase) DetailDelete(penerimaan, barang string) {
	detail, err := u.Repository.DetailFindByPenerimaanBarang(helper.MustParse(penerimaan), helper.MustParse(barang))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Detail penerimaan not found",
		})
	}

	if err := u.Repository.DetailDelete(&detail); err != nil {
		exception.PanicIfError(err, "Failed to delete detail penerimaan")
	}
}
