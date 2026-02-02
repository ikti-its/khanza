package usecase

import (
	"database/sql"

	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
)

type BatchUseCase struct {
	Repository repository.BatchRepository
}

func NewBatchUseCase(repository *repository.BatchRepository) *BatchUseCase {
	return &BatchUseCase{
		Repository: *repository,
	}
}

func (u *BatchUseCase) Create(request *model.BatchRequest) model.BatchResponse {
	var kadaluwarsa sql.NullTime
	if request.Kadaluwarsa != "" {
		kadaluwarsa.Valid = true
		kadaluwarsa.Time = helper.ParseTime(request.Kadaluwarsa, "2006-01-02")
	} else {
		kadaluwarsa.Valid = false
	}

	batch := entity.Batch{
		NoBatch:       request.NoBatch,
		NoFaktur:      request.NoFaktur,
		IdBarangMedis: helper.MustParse(request.IdBarangMedis),
		TanggalDatang: helper.ParseTime(request.TanggalDatang, "2006-01-02"),
		Kadaluwarsa:   kadaluwarsa,
		Asal:          request.Asal,
		HDasar:        request.HDasar,
		HBeli:         request.HBeli,
		HRalan:        request.HRalan,
		HKelasI:       request.HKelasI,
		HKelasII:      request.HKelasII,
		HKelasIII:     request.HKelasIII,
		HUtama:        request.HUtama,
		HVIP:          request.HVIP,
		HVVIP:         request.HVVIP,
		HBeliLuar:     request.HBeliLuar,
		HJualBebas:    request.HJualBebas,
		HKaryawan:     request.HKaryawan,
		JumlahBeli:    request.JumlahBeli,
		Sisa:          request.Sisa,
	}

	if err := u.Repository.Insert(&batch); err != nil {
		exception.PanicIfError(err, "Failed to insert batch")
	}

	response := model.BatchResponse{
		NoBatch:       batch.NoBatch,
		NoFaktur:      batch.NoFaktur,
		IdBarangMedis: batch.IdBarangMedis.String(),
		TanggalDatang: helper.FormatTime(batch.TanggalDatang, "2006-01-02"),
		Kadaluwarsa:   helper.FormatTime(batch.Kadaluwarsa.Time, "2006-01-02"),
		Asal:          batch.Asal,
		HDasar:        batch.HDasar,
		HBeli:         batch.HBeli,
		HRalan:        batch.HRalan,
		HKelasI:       batch.HKelasI,
		HKelasII:      batch.HKelasII,
		HKelasIII:     batch.HKelasIII,
		HUtama:        batch.HUtama,
		HVIP:          batch.HVIP,
		HVVIP:         batch.HVVIP,
		HBeliLuar:     batch.HBeliLuar,
		HJualBebas:    batch.HJualBebas,
		HKaryawan:     batch.HKaryawan,
		JumlahBeli:    batch.JumlahBeli,
		Sisa:          batch.Sisa,
	}

	return response
}

func (u *BatchUseCase) Get() []model.BatchResponse {
	batch, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all batch")

	response := make([]model.BatchResponse, len(batch))
	for i, batch := range batch {
		response[i] = model.BatchResponse{
			NoBatch:       batch.NoBatch,
			NoFaktur:      batch.NoFaktur,
			IdBarangMedis: batch.IdBarangMedis.String(),
			TanggalDatang: helper.FormatTime(batch.TanggalDatang, "2006-01-02"),
			Kadaluwarsa:   helper.FormatTime(batch.Kadaluwarsa.Time, "2006-01-02"),
			Asal:          batch.Asal,
			HDasar:        batch.HDasar,
			HBeli:         batch.HBeli,
			HRalan:        batch.HRalan,
			HKelasI:       batch.HKelasI,
			HKelasII:      batch.HKelasII,
			HKelasIII:     batch.HKelasIII,
			HUtama:        batch.HUtama,
			HVIP:          batch.HVIP,
			HVVIP:         batch.HVVIP,
			HBeliLuar:     batch.HBeliLuar,
			HJualBebas:    batch.HJualBebas,
			HKaryawan:     batch.HKaryawan,
			JumlahBeli:    batch.JumlahBeli,
			Sisa:          batch.Sisa,
		}
	}

	return response
}

func (u *BatchUseCase) GetByBatch(id string) []model.BatchResponse {
	batch, err := u.Repository.FindByBatch(id)
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Batch not found",
		})
	}

	response := make([]model.BatchResponse, len(batch))
	for i, batch := range batch {
		response[i] = model.BatchResponse{
			NoBatch:       batch.NoBatch,
			NoFaktur:      batch.NoFaktur,
			IdBarangMedis: batch.IdBarangMedis.String(),
			TanggalDatang: helper.FormatTime(batch.TanggalDatang, "2006-01-02"),
			Kadaluwarsa:   helper.FormatTime(batch.Kadaluwarsa.Time, "2006-01-02"),
			Asal:          batch.Asal,
			HDasar:        batch.HDasar,
			HBeli:         batch.HBeli,
			HRalan:        batch.HRalan,
			HKelasI:       batch.HKelasI,
			HKelasII:      batch.HKelasII,
			HKelasIII:     batch.HKelasIII,
			HUtama:        batch.HUtama,
			HVIP:          batch.HVIP,
			HVVIP:         batch.HVVIP,
			HBeliLuar:     batch.HBeliLuar,
			HJualBebas:    batch.HJualBebas,
			HKaryawan:     batch.HKaryawan,
			JumlahBeli:    batch.JumlahBeli,
			Sisa:          batch.Sisa,
		}
	}

	return response
}

func (u *BatchUseCase) GetById(id, faktur, barang string) model.BatchResponse {
	batch, err := u.Repository.FindById(id, faktur, helper.MustParse(barang))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Batch not found",
		})
	}

	response := model.BatchResponse{
		NoBatch:       batch.NoBatch,
		NoFaktur:      batch.NoFaktur,
		IdBarangMedis: batch.IdBarangMedis.String(),
		TanggalDatang: helper.FormatTime(batch.TanggalDatang, "2006-01-02"),
		Kadaluwarsa:   helper.FormatTime(batch.Kadaluwarsa.Time, "2006-01-02"),
		Asal:          batch.Asal,
		HDasar:        batch.HDasar,
		HBeli:         batch.HBeli,
		HRalan:        batch.HRalan,
		HKelasI:       batch.HKelasI,
		HKelasII:      batch.HKelasII,
		HKelasIII:     batch.HKelasIII,
		HUtama:        batch.HUtama,
		HVIP:          batch.HVIP,
		HVVIP:         batch.HVVIP,
		HBeliLuar:     batch.HBeliLuar,
		HJualBebas:    batch.HJualBebas,
		HKaryawan:     batch.HKaryawan,
		JumlahBeli:    batch.JumlahBeli,
		Sisa:          batch.Sisa,
	}

	return response
}

func (u *BatchUseCase) Update(request *model.BatchRequest, id, faktur, barang string) model.BatchResponse {
	batch, err := u.Repository.FindById(id, faktur, helper.MustParse(barang))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Batch not found",
		})
	}

	var kadaluwarsa sql.NullTime
	if request.Kadaluwarsa != "" {
		kadaluwarsa.Valid = true
		kadaluwarsa.Time = helper.ParseTime(request.Kadaluwarsa, "2006-01-02")
	} else {
		kadaluwarsa.Valid = false
	}

	batch.NoBatch = request.NoBatch
	batch.NoFaktur = request.NoFaktur
	batch.IdBarangMedis = helper.MustParse(request.IdBarangMedis)
	batch.TanggalDatang = helper.ParseTime(request.TanggalDatang, "2006-01-02")
	batch.Kadaluwarsa = kadaluwarsa
	batch.Asal = request.Asal
	batch.HDasar = request.HDasar
	batch.HBeli = request.HBeli
	batch.HRalan = request.HRalan
	batch.HKelasI = request.HKelasI
	batch.HKelasII = request.HKelasII
	batch.HKelasIII = request.HKelasIII
	batch.HUtama = request.HUtama
	batch.HVIP = request.HVIP
	batch.HVVIP = request.HVVIP
	batch.HBeliLuar = request.HBeliLuar
	batch.HJualBebas = request.HJualBebas
	batch.HKaryawan = request.HKaryawan
	batch.JumlahBeli = request.JumlahBeli
	batch.Sisa = request.Sisa

	if err := u.Repository.Update(&batch); err != nil {
		exception.PanicIfError(err, "Failed to update batch")
	}

	response := model.BatchResponse{
		NoBatch:       batch.NoBatch,
		NoFaktur:      batch.NoFaktur,
		IdBarangMedis: batch.IdBarangMedis.String(),
		TanggalDatang: helper.FormatTime(batch.TanggalDatang, "2006-01-02"),
		Kadaluwarsa:   helper.FormatTime(batch.Kadaluwarsa.Time, "2006-01-02"),
		Asal:          batch.Asal,
		HDasar:        batch.HDasar,
		HBeli:         batch.HBeli,
		HRalan:        batch.HRalan,
		HKelasI:       batch.HKelasI,
		HKelasII:      batch.HKelasII,
		HKelasIII:     batch.HKelasIII,
		HUtama:        batch.HUtama,
		HVIP:          batch.HVIP,
		HVVIP:         batch.HVVIP,
		HBeliLuar:     batch.HBeliLuar,
		HJualBebas:    batch.HJualBebas,
		HKaryawan:     batch.HKaryawan,
		JumlahBeli:    batch.JumlahBeli,
		Sisa:          batch.Sisa,
	}

	return response
}

func (u *BatchUseCase) Delete(id, faktur, barang string) {
	batch, err := u.Repository.FindById(id, faktur, helper.MustParse(barang))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Batch not found",
		})
	}

	if err := u.Repository.Delete(&batch); err != nil {
		exception.PanicIfError(err, "Failed to delete batch")
	}
}
