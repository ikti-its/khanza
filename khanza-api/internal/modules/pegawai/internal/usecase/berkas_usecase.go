package usecase

import (
	"time"

	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/repository"
)

type BerkasUseCase struct {
	Repository repository.BerkasRepository
}

func NewBerkasUseCase(repository *repository.BerkasRepository) *BerkasUseCase {
	return &BerkasUseCase{
		Repository: *repository,
	}
}

func (u *BerkasUseCase) Create(request *model.BerkasRequest, user string) model.BerkasResponse {
	tanggalLahir, err := time.Parse("2006-01-02", request.TanggalLahir)
	if err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid date format",
		})

	}

	updater := helper.MustParse(user)
	berkas := entity.Berkas{
		IdPegawai:    helper.MustParse(request.IdPegawai),
		NIK:          request.NIK,
		TempatLahir:  request.TempatLahir,
		TanggalLahir: tanggalLahir,
		Agama:        request.Agama,
		Pendidikan:   request.Pendidikan,
		KTP:          request.KTP,
		KK:           request.KK,
		NPWP:         request.NPWP,
		BPJS:         request.BPJS,
		Ijazah:       request.Ijazah,
		SKCK:         request.SKCK,
		STR:          request.STR,
		SerKom:       request.SerKom,
		Updater:      updater,
	}

	if err := u.Repository.Insert(&berkas); err != nil {
		exception.PanicIfError(err, "Failed to create berkas")
	}

	response := model.BerkasResponse{
		IdPegawai:    berkas.IdPegawai.String(),
		NIK:          berkas.NIK,
		TempatLahir:  berkas.TempatLahir,
		TanggalLahir: berkas.TanggalLahir.Format("2006-01-02"),
		Agama:        berkas.Agama,
		Pendidikan:   berkas.Pendidikan,
		KTP:          berkas.KTP,
		KK:           berkas.KK,
		NPWP:         berkas.NPWP,
		BPJS:         berkas.BPJS,
		Ijazah:       berkas.Ijazah,
		SKCK:         berkas.SKCK,
		STR:          berkas.STR,
		SerKom:       berkas.SerKom,
	}

	return response
}

func (u *BerkasUseCase) Get() []model.BerkasResponse {
	berkas, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all berkas")

	response := make([]model.BerkasResponse, len(berkas))
	for i, berkas := range berkas {
		response[i] = model.BerkasResponse{
			IdPegawai:    berkas.IdPegawai.String(),
			NIK:          berkas.NIK,
			TempatLahir:  berkas.TempatLahir,
			TanggalLahir: berkas.TanggalLahir.Format("2006-01-02"),
			Agama:        berkas.Agama,
			Pendidikan:   berkas.Pendidikan,
			KTP:          berkas.KTP,
			KK:           berkas.KK,
			NPWP:         berkas.NPWP,
			BPJS:         berkas.BPJS,
			Ijazah:       berkas.Ijazah,
			SKCK:         berkas.SKCK,
			STR:          berkas.STR,
			SerKom:       berkas.SerKom,
		}
	}

	return response
}

func (u *BerkasUseCase) GetPage(page, size int) model.BerkasPageResponse {
	berkas, total, err := u.Repository.FindPage(page, size)
	exception.PanicIfError(err, "Failed to get paged berkas")

	response := make([]model.BerkasResponse, len(berkas))
	for i, berkas := range berkas {
		response[i] = model.BerkasResponse{
			IdPegawai:    berkas.IdPegawai.String(),
			NIK:          berkas.NIK,
			TempatLahir:  berkas.TempatLahir,
			TanggalLahir: berkas.TanggalLahir.Format("2006-01-02"),
			Agama:        berkas.Agama,
			Pendidikan:   berkas.Pendidikan,
			KTP:          berkas.KTP,
			KK:           berkas.KK,
			NPWP:         berkas.NPWP,
			BPJS:         berkas.BPJS,
			Ijazah:       berkas.Ijazah,
			SKCK:         berkas.SKCK,
			STR:          berkas.STR,
			SerKom:       berkas.SerKom,
		}
	}

	pagedResponse := model.BerkasPageResponse{
		Page:   page,
		Size:   size,
		Total:  total,
		Berkas: response,
	}

	return pagedResponse
}

func (u *BerkasUseCase) GetAkunId(id string) string {
	akunId, err := u.Repository.FindAkunIdById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Berkas not found",
		})
	}

	return akunId.String()
}

func (u *BerkasUseCase) GetById(id string) model.BerkasResponse {
	berkas, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Berkas not found",
		})
	}

	response := model.BerkasResponse{
		IdPegawai:    berkas.IdPegawai.String(),
		NIK:          berkas.NIK,
		TempatLahir:  berkas.TempatLahir,
		TanggalLahir: berkas.TanggalLahir.Format("2006-01-02"),
		Agama:        berkas.Agama,
		Pendidikan:   berkas.Pendidikan,
		KTP:          berkas.KTP,
		KK:           berkas.KK,
		NPWP:         berkas.NPWP,
		BPJS:         berkas.BPJS,
		Ijazah:       berkas.Ijazah,
		SKCK:         berkas.SKCK,
		STR:          berkas.STR,
		SerKom:       berkas.SerKom,
	}

	return response
}

func (u *BerkasUseCase) Update(request *model.BerkasRequest, id, user string) model.BerkasResponse {
	berkas, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Berkas not found",
		})
	}

	tanggalLahir, err := time.Parse("2006-01-02", request.TanggalLahir)
	if err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid date format",
		})
	}

	berkas.IdPegawai = helper.MustParse(request.IdPegawai)
	berkas.NIK = request.NIK
	berkas.TempatLahir = request.TempatLahir
	berkas.TanggalLahir = tanggalLahir
	berkas.Agama = request.Agama
	berkas.Pendidikan = request.Pendidikan
	berkas.KTP = request.KTP
	berkas.KK = request.KK
	berkas.NPWP = request.NPWP
	berkas.BPJS = request.BPJS
	berkas.Ijazah = request.Ijazah
	berkas.SKCK = request.SKCK
	berkas.STR = request.STR
	berkas.SerKom = request.SerKom
	berkas.Updater = helper.MustParse(user)

	if err := u.Repository.Update(&berkas); err != nil {
		exception.PanicIfError(err, "Failed to update berkas")
	}

	response := model.BerkasResponse{
		IdPegawai:    berkas.IdPegawai.String(),
		NIK:          berkas.NIK,
		TempatLahir:  berkas.TempatLahir,
		TanggalLahir: berkas.TanggalLahir.Format("2006-01-02"),
		Agama:        berkas.Agama,
		Pendidikan:   berkas.Pendidikan,
		KTP:          berkas.KTP,
		KK:           berkas.KK,
		NPWP:         berkas.NPWP,
		BPJS:         berkas.BPJS,
		Ijazah:       berkas.Ijazah,
		SKCK:         berkas.SKCK,
		STR:          berkas.STR,
		SerKom:       berkas.SerKom,
	}

	return response
}

func (u *BerkasUseCase) Delete(id, updater string) {
	berkas, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Berkas not found",
		})
	}

	berkas.Updater = helper.MustParse(updater)

	if err := u.Repository.Delete(&berkas); err != nil {
		exception.PanicIfError(err, "Failed to delete berkas")
	}
}
