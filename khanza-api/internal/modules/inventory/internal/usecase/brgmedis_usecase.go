package usecase

import (
	"database/sql"

	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
)

type BrgmedisUseCase struct {
	Repository repository.BrgmedisRepository
}

func NewBrgmedisUseCase(repository *repository.BrgmedisRepository) *BrgmedisUseCase {
	return &BrgmedisUseCase{
		Repository: *repository,
	}
}

func (u *BrgmedisUseCase) Create(request *model.BrgmedisRequest) model.BrgmedisResponse {
	var kadaluwarsa sql.NullTime
	if request.Kadaluwarsa != "" {
		kadaluwarsa.Valid = true
		kadaluwarsa.Time = helper.ParseTime(request.Kadaluwarsa, "2006-01-02")
	} else {
		kadaluwarsa.Valid = false
	}

	brgmedis := entity.Brgmedis{
		Id:          helper.MustNew(),
		KodeBarang:  request.KodeBarang,
		Kandungan:   request.Kandungan,
		IdIndustri:  request.IdIndustri,
		Nama:        request.Nama,
		IdSatBesar:  request.IdSatBesar,
		IdSatuan:    request.IdSatuan,
		HDasar:      request.HDasar,
		HBeli:       request.HBeli,
		HRalan:      request.HRalan,
		HKelasI:     request.HKelasI,
		HKelasII:    request.HKelasII,
		HKelasIII:   request.HKelasIII,
		HUtama:      request.HUtama,
		HVIP:        request.HVIP,
		HVVIP:       request.HVVIP,
		HBeliLuar:   request.HBeliLuar,
		HJualBebas:  request.HJualBebas,
		HKaryawan:   request.HKaryawan,
		StokMinimum: request.StokMinimum,
		IdJenis:     request.IdJenis,
		Isi:         request.Isi,
		Kapasitas:   request.Kapasitas,
		Kadaluwarsa: kadaluwarsa,
		IdKategori:  request.IdKategori,
		IdGolongan:  request.IdGolongan,
	}

	if err := u.Repository.Insert(&brgmedis); err != nil {
		exception.PanicIfError(err, "Failed to insert brgmedis")
	}

	response := model.BrgmedisResponse{
		Id:          brgmedis.Id.String(),
		KodeBarang:  brgmedis.KodeBarang,
		Kandungan:   brgmedis.Kandungan,
		IdIndustri:  brgmedis.IdIndustri,
		Nama:        brgmedis.Nama,
		IdSatBesar:  brgmedis.IdSatBesar,
		IdSatuan:    brgmedis.IdSatuan,
		HDasar:      brgmedis.HDasar,
		HBeli:       brgmedis.HBeli,
		HRalan:      brgmedis.HRalan,
		HKelasI:     brgmedis.HKelasI,
		HKelasII:    brgmedis.HKelasII,
		HKelasIII:   brgmedis.HKelasIII,
		HUtama:      brgmedis.HUtama,
		HVIP:        brgmedis.HVIP,
		HVVIP:       brgmedis.HVVIP,
		HBeliLuar:   brgmedis.HBeliLuar,
		HJualBebas:  brgmedis.HJualBebas,
		HKaryawan:   brgmedis.HKaryawan,
		StokMinimum: brgmedis.StokMinimum,
		IdJenis:     brgmedis.IdJenis,
		Isi:         brgmedis.Isi,
		Kapasitas:   brgmedis.Kapasitas,
		Kadaluwarsa: helper.FormatTime(brgmedis.Kadaluwarsa.Time, "2006-01-02"),
		IdKategori:  brgmedis.IdKategori,
		IdGolongan:  brgmedis.IdGolongan,
	}

	return response
}

func (u *BrgmedisUseCase) Get() []model.BrgmedisResponse {
	brgmedis, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all brgmedis")

	response := make([]model.BrgmedisResponse, len(brgmedis))
	for i, brgmedis := range brgmedis {
		response[i] = model.BrgmedisResponse{
			Id:          brgmedis.Id.String(),
			KodeBarang:  brgmedis.KodeBarang,
			Kandungan:   brgmedis.Kandungan,
			IdIndustri:  brgmedis.IdIndustri,
			Nama:        brgmedis.Nama,
			IdSatBesar:  brgmedis.IdSatBesar,
			IdSatuan:    brgmedis.IdSatuan,
			HDasar:      brgmedis.HDasar,
			HBeli:       brgmedis.HBeli,
			HRalan:      brgmedis.HRalan,
			HKelasI:     brgmedis.HKelasI,
			HKelasII:    brgmedis.HKelasII,
			HKelasIII:   brgmedis.HKelasIII,
			HUtama:      brgmedis.HUtama,
			HVIP:        brgmedis.HVIP,
			HVVIP:       brgmedis.HVVIP,
			HBeliLuar:   brgmedis.HBeliLuar,
			HJualBebas:  brgmedis.HJualBebas,
			HKaryawan:   brgmedis.HKaryawan,
			StokMinimum: brgmedis.StokMinimum,
			IdJenis:     brgmedis.IdJenis,
			Isi:         brgmedis.Isi,
			Kapasitas:   brgmedis.Kapasitas,
			Kadaluwarsa: helper.FormatTime(brgmedis.Kadaluwarsa.Time, "2006-01-02"),
			IdKategori:  brgmedis.IdKategori,
			IdGolongan:  brgmedis.IdGolongan,
		}
	}

	return response
}

func (u *BrgmedisUseCase) GetById(id string) model.BrgmedisResponse {
	brgmedis, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Brgmedis not found",
		})
	}

	response := model.BrgmedisResponse{
		Id:          brgmedis.Id.String(),
		KodeBarang:  brgmedis.KodeBarang,
		Kandungan:   brgmedis.Kandungan,
		IdIndustri:  brgmedis.IdIndustri,
		Nama:        brgmedis.Nama,
		IdSatBesar:  brgmedis.IdSatBesar,
		IdSatuan:    brgmedis.IdSatuan,
		HDasar:      brgmedis.HDasar,
		HBeli:       brgmedis.HBeli,
		HRalan:      brgmedis.HRalan,
		HKelasI:     brgmedis.HKelasI,
		HKelasII:    brgmedis.HKelasII,
		HKelasIII:   brgmedis.HKelasIII,
		HUtama:      brgmedis.HUtama,
		HVIP:        brgmedis.HVIP,
		HVVIP:       brgmedis.HVVIP,
		HBeliLuar:   brgmedis.HBeliLuar,
		HJualBebas:  brgmedis.HJualBebas,
		HKaryawan:   brgmedis.HKaryawan,
		StokMinimum: brgmedis.StokMinimum,
		IdJenis:     brgmedis.IdJenis,
		Isi:         brgmedis.Isi,
		Kapasitas:   brgmedis.Kapasitas,
		Kadaluwarsa: helper.FormatTime(brgmedis.Kadaluwarsa.Time, "2006-01-02"),
		IdKategori:  brgmedis.IdKategori,
		IdGolongan:  brgmedis.IdGolongan,
	}

	return response
}

func (u *BrgmedisUseCase) Update(request *model.BrgmedisRequest, id string) model.BrgmedisResponse {
	brgmedis, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Brgmedis not found",
		})
	}

	var kadaluwarsa sql.NullTime
	if request.Kadaluwarsa != "" {
		kadaluwarsa.Valid = true
		kadaluwarsa.Time = helper.ParseTime(request.Kadaluwarsa, "2006-01-02")
	} else {
		kadaluwarsa.Valid = false
	}

	brgmedis.KodeBarang = request.KodeBarang
	brgmedis.Kandungan = request.Kandungan
	brgmedis.IdIndustri = request.IdIndustri
	brgmedis.Nama = request.Nama
	brgmedis.IdSatBesar = request.IdSatBesar
	brgmedis.IdSatuan = request.IdSatuan
	brgmedis.HDasar = request.HDasar
	brgmedis.HBeli = request.HBeli
	brgmedis.HRalan = request.HRalan
	brgmedis.HKelasI = request.HKelasI
	brgmedis.HKelasII = request.HKelasII
	brgmedis.HKelasIII = request.HKelasIII
	brgmedis.HUtama = request.HUtama
	brgmedis.HVIP = request.HVIP
	brgmedis.HVVIP = request.HVVIP
	brgmedis.HBeliLuar = request.HBeliLuar
	brgmedis.HJualBebas = request.HJualBebas
	brgmedis.HKaryawan = request.HKaryawan
	brgmedis.StokMinimum = request.StokMinimum
	brgmedis.IdJenis = request.IdJenis
	brgmedis.Isi = request.Isi
	brgmedis.Kapasitas = request.Kapasitas
	brgmedis.Kadaluwarsa = kadaluwarsa
	brgmedis.IdKategori = request.IdKategori
	brgmedis.IdGolongan = request.IdGolongan

	if err := u.Repository.Update(&brgmedis); err != nil {
		exception.PanicIfError(err, "Failed to update brgmedis")
	}

	response := model.BrgmedisResponse{
		Id:          brgmedis.Id.String(),
		KodeBarang:  brgmedis.KodeBarang,
		Kandungan:   brgmedis.Kandungan,
		IdIndustri:  brgmedis.IdIndustri,
		Nama:        brgmedis.Nama,
		IdSatBesar:  brgmedis.IdSatBesar,
		IdSatuan:    brgmedis.IdSatuan,
		HDasar:      brgmedis.HDasar,
		HBeli:       brgmedis.HBeli,
		HRalan:      brgmedis.HRalan,
		HKelasI:     brgmedis.HKelasI,
		HKelasII:    brgmedis.HKelasII,
		HKelasIII:   brgmedis.HKelasIII,
		HUtama:      brgmedis.HUtama,
		HVIP:        brgmedis.HVIP,
		HVVIP:       brgmedis.HVVIP,
		HBeliLuar:   brgmedis.HBeliLuar,
		HJualBebas:  brgmedis.HJualBebas,
		HKaryawan:   brgmedis.HKaryawan,
		StokMinimum: brgmedis.StokMinimum,
		IdJenis:     brgmedis.IdJenis,
		Isi:         brgmedis.Isi,
		Kapasitas:   brgmedis.Kapasitas,
		Kadaluwarsa: helper.FormatTime(brgmedis.Kadaluwarsa.Time, "2006-01-02"),
		IdKategori:  brgmedis.IdKategori,
		IdGolongan:  brgmedis.IdGolongan,
	}

	return response
}

func (u *BrgmedisUseCase) Delete(id string) {
	brgmedis, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Brgmedis not found",
		})
	}

	if err := u.Repository.Delete(&brgmedis); err != nil {
		exception.PanicIfError(err, "Failed to delete brgmedis")
	}
}
