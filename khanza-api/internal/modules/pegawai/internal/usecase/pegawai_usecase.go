package usecase

import (
	"time"

	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/repository"
)

type PegawaiUseCase struct {
	Repository repository.PegawaiRepository
}

func NewPegawaiUseCase(repository *repository.PegawaiRepository) *PegawaiUseCase {
	return &PegawaiUseCase{
		Repository: *repository,
	}
}

func (u *PegawaiUseCase) Create(request *model.PegawaiRequest, user string) model.PegawaiResponse {
	tanggalMasuk, err := time.Parse("2006-01-02", request.TanggalMasuk)
	if err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid date format",
		})
	}

	updater := helper.MustParse(user)
	pegawai := entity.Pegawai{
		Id:           helper.MustNew(),
		IdAkun:       helper.MustParse(request.IdAkun),
		NIP:          request.NIP,
		Nama:         request.Nama,
		JenisKelamin: request.JenisKelamin,
		Jabatan:      request.Jabatan,
		Departemen:   request.Departemen,
		StatusAktif:  request.StatusAktif,
		JenisPegawai: request.JenisPegawai,
		Telepon:      request.Telepon,
		TanggalMasuk: tanggalMasuk,
		Updater:      updater,
	}

	if err := u.Repository.Insert(&pegawai); err != nil {
		exception.PanicIfError(err, "Failed to create pegawai")
	}

	response := model.PegawaiResponse{
		Id:           pegawai.Id.String(),
		IdAkun:       pegawai.IdAkun.String(),
		NIP:          pegawai.NIP,
		Nama:         pegawai.Nama,
		JenisKelamin: pegawai.JenisKelamin,
		Jabatan:      pegawai.Jabatan,
		Departemen:   pegawai.Departemen,
		StatusAktif:  pegawai.StatusAktif,
		JenisPegawai: pegawai.JenisPegawai,
		Telepon:      pegawai.Telepon,
		TanggalMasuk: pegawai.TanggalMasuk.Format("2006-01-02"),
	}

	return response
}

func (u *PegawaiUseCase) Get() []model.PegawaiResponse {
	pegawai, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all pegawai")

	response := make([]model.PegawaiResponse, len(pegawai))
	for i, pegawai := range pegawai {
		response[i] = model.PegawaiResponse{
			Id:           pegawai.Id.String(),
			IdAkun:       pegawai.IdAkun.String(),
			NIP:          pegawai.NIP,
			Nama:         pegawai.Nama,
			JenisKelamin: pegawai.JenisKelamin,
			Jabatan:      pegawai.Jabatan,
			Departemen:   pegawai.Departemen,
			StatusAktif:  pegawai.StatusAktif,
			JenisPegawai: pegawai.JenisPegawai,
			Telepon:      pegawai.Telepon,
			TanggalMasuk: pegawai.TanggalMasuk.Format("2006-01-02"),
		}
	}

	return response
}

func (u *PegawaiUseCase) GetPage(page, size int) model.PegawaiPageResponse {
	pegawai, total, err := u.Repository.FindPage(page, size)
	exception.PanicIfError(err, "Failed to get paged pegawai")

	response := make([]model.PegawaiResponse, len(pegawai))
	for i, pegawai := range pegawai {
		response[i] = model.PegawaiResponse{
			Id:           pegawai.Id.String(),
			IdAkun:       pegawai.IdAkun.String(),
			NIP:          pegawai.NIP,
			Nama:         pegawai.Nama,
			JenisKelamin: pegawai.JenisKelamin,
			Jabatan:      pegawai.Jabatan,
			Departemen:   pegawai.Departemen,
			StatusAktif:  pegawai.StatusAktif,
			JenisPegawai: pegawai.JenisPegawai,
			Telepon:      pegawai.Telepon,
			TanggalMasuk: pegawai.TanggalMasuk.Format("2006-01-02"),
		}
	}

	pagedResponse := model.PegawaiPageResponse{
		Page:    page,
		Size:    size,
		Total:   total,
		Pegawai: response,
	}

	return pagedResponse
}

func (u *PegawaiUseCase) GetById(id string) model.PegawaiResponse {
	pegawai, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Pegawai not found",
		})
	}

	response := model.PegawaiResponse{
		Id:           pegawai.Id.String(),
		IdAkun:       pegawai.IdAkun.String(),
		NIP:          pegawai.NIP,
		Nama:         pegawai.Nama,
		JenisKelamin: pegawai.JenisKelamin,
		Jabatan:      pegawai.Jabatan,
		Departemen:   pegawai.Departemen,
		StatusAktif:  pegawai.StatusAktif,
		JenisPegawai: pegawai.JenisPegawai,
		Telepon:      pegawai.Telepon,
		TanggalMasuk: pegawai.TanggalMasuk.Format("2006-01-02"),
	}

	return response
}

func (u *PegawaiUseCase) Update(request *model.PegawaiRequest, id, user string) model.PegawaiResponse {
	pegawai, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Pegawai not found",
		})
	}

	tanggalMasuk, err := time.Parse("2006-01-02", request.TanggalMasuk)
	if err != nil {
		panic(&exception.BadRequestError{
			Message: "Invalid date format",
		})
	}

	pegawai.IdAkun = helper.MustParse(request.IdAkun)
	pegawai.NIP = request.NIP
	pegawai.Nama = request.Nama
	pegawai.JenisKelamin = request.JenisKelamin
	pegawai.Jabatan = request.Jabatan
	pegawai.Departemen = request.Departemen
	pegawai.StatusAktif = request.StatusAktif
	pegawai.JenisPegawai = request.JenisPegawai
	pegawai.Telepon = request.Telepon
	pegawai.TanggalMasuk = tanggalMasuk
	pegawai.Updater = helper.MustParse(user)

	if err := u.Repository.Update(&pegawai); err != nil {
		exception.PanicIfError(err, "Failed to update pegawai")
	}

	response := model.PegawaiResponse{
		Id:           pegawai.Id.String(),
		IdAkun:       pegawai.IdAkun.String(),
		NIP:          pegawai.NIP,
		Nama:         pegawai.Nama,
		JenisKelamin: pegawai.JenisKelamin,
		Jabatan:      pegawai.Jabatan,
		Departemen:   pegawai.Departemen,
		StatusAktif:  pegawai.StatusAktif,
		JenisPegawai: pegawai.JenisPegawai,
		Telepon:      pegawai.Telepon,
		TanggalMasuk: pegawai.TanggalMasuk.Format("2006-01-02"),
	}

	return response
}

func (u *PegawaiUseCase) Delete(id, updater string) {
	pegawai, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Pegawai not found",
		})
	}

	pegawai.Updater = helper.MustParse(updater)

	if err := u.Repository.Delete(&pegawai); err != nil {
		exception.PanicIfError(err, "Failed to delete pegawai")
	}
}

func (u *PegawaiUseCase) GetByNIP(nip string) (*entity.Pegawai, error) {
	return u.Repository.GetByNIP(nip)
}
