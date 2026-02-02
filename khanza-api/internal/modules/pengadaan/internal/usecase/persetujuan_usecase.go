package usecase

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/repository"
)

type PersetujuanUseCase struct {
	Repository repository.PersetujuanRepository
}

func NewPersetujuanUseCase(repository *repository.PersetujuanRepository) *PersetujuanUseCase {
	return &PersetujuanUseCase{
		Repository: *repository,
	}
}

func (u *PersetujuanUseCase) Create(request *model.PersetujuanCreateRequest, user string) model.PersetujuanResponse {
	updater := helper.MustParse(user)
	persetujuan := entity.Persetujuan{
		IdPengajuan:    helper.MustParse(request.IdPengajuan),
		Status:         "Menunggu Persetujuan",
		StatusApoteker: "Menunggu Persetujuan",
		StatusKeuangan: "Menunggu Persetujuan",
		Updater:        updater,
	}

	if err := u.Repository.Insert(&persetujuan); err != nil {
		exception.PanicIfError(err, "Failed to insert persetujuan")
	}

	var apoteker, keuangan string
	if persetujuan.Apoteker == uuid.Nil {
		apoteker = ""
	} else {
		apoteker = persetujuan.Apoteker.String()
	}

	if persetujuan.Keuangan == uuid.Nil {
		keuangan = ""
	} else {
		keuangan = persetujuan.Keuangan.String()
	}

	response := model.PersetujuanResponse{
		IdPengajuan:    persetujuan.IdPengajuan.String(),
		Status:         persetujuan.Status,
		StatusApoteker: persetujuan.StatusApoteker,
		StatusKeuangan: persetujuan.StatusKeuangan,
		Apoteker:       apoteker,
		Keuangan:       keuangan,
	}

	return response
}

func (u *PersetujuanUseCase) Get() []model.PersetujuanResponse {
	persetujuan, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all persetujuan")

	response := make([]model.PersetujuanResponse, len(persetujuan))
	for i, persetujuan := range persetujuan {
		var apoteker, keuangan string
		if persetujuan.Apoteker == uuid.Nil {
			apoteker = ""
		} else {
			apoteker = persetujuan.Apoteker.String()
		}

		if persetujuan.Keuangan == uuid.Nil {
			keuangan = ""
		} else {
			keuangan = persetujuan.Keuangan.String()
		}

		response[i] = model.PersetujuanResponse{
			IdPengajuan:    persetujuan.IdPengajuan.String(),
			Status:         persetujuan.Status,
			StatusApoteker: persetujuan.StatusApoteker,
			StatusKeuangan: persetujuan.StatusKeuangan,
			Apoteker:       apoteker,
			Keuangan:       keuangan,
		}
	}

	return response
}

func (u *PersetujuanUseCase) GetPage(page, size int) model.PersetujuanPageResponse {
	persetujuan, total, err := u.Repository.FindPage(page, size)
	exception.PanicIfError(err, "Failed to get paged persetujuan")

	response := make([]model.PersetujuanResponse, len(persetujuan))
	for i, persetujuan := range persetujuan {
		var apoteker, keuangan string
		if persetujuan.Apoteker == uuid.Nil {
			apoteker = ""
		} else {
			apoteker = persetujuan.Apoteker.String()
		}

		if persetujuan.Keuangan == uuid.Nil {
			keuangan = ""
		} else {
			keuangan = persetujuan.Keuangan.String()
		}

		response[i] = model.PersetujuanResponse{
			IdPengajuan:    persetujuan.IdPengajuan.String(),
			Status:         persetujuan.Status,
			StatusApoteker: persetujuan.StatusApoteker,
			StatusKeuangan: persetujuan.StatusKeuangan,
			Apoteker:       apoteker,
			Keuangan:       keuangan,
		}
	}

	pagedResponse := model.PersetujuanPageResponse{
		Page:        page,
		Size:        size,
		Total:       total,
		Persetujuan: response,
	}

	return pagedResponse
}

func (u *PersetujuanUseCase) GetById(id string) model.PersetujuanResponse {
	persetujuan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Persetujuan not found",
		})
	}

	var apoteker, keuangan string
	if persetujuan.Apoteker == uuid.Nil {
		apoteker = ""
	} else {
		apoteker = persetujuan.Apoteker.String()
	}

	if persetujuan.Keuangan == uuid.Nil {
		keuangan = ""
	} else {
		keuangan = persetujuan.Keuangan.String()
	}

	response := model.PersetujuanResponse{
		IdPengajuan:    persetujuan.IdPengajuan.String(),
		Status:         persetujuan.Status,
		StatusApoteker: persetujuan.StatusApoteker,
		StatusKeuangan: persetujuan.StatusKeuangan,
		Apoteker:       apoteker,
		Keuangan:       keuangan,
	}

	return response
}

func (u *PersetujuanUseCase) Update(request *model.PersetujuanUpdateRequest, id, user string) model.PersetujuanResponse {
	persetujuan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Persetujuan not found",
		})
	}

	persetujuan.IdPengajuan = helper.MustParse(request.IdPengajuan)
	persetujuan.Status = request.Status
	persetujuan.StatusApoteker = request.StatusApoteker
	persetujuan.StatusKeuangan = request.StatusKeuangan
	persetujuan.Updater = helper.MustParse(user)

	if request.Apoteker != "" {
		persetujuan.Apoteker = helper.MustParse(request.Apoteker)
	} else {
		persetujuan.Apoteker = uuid.Nil
	}

	if request.Keuangan != "" {
		persetujuan.Keuangan = helper.MustParse(request.Keuangan)
	} else {
		persetujuan.Keuangan = uuid.Nil
	}

	if err := u.Repository.Update(&persetujuan); err != nil {
		exception.PanicIfError(err, "Failed to update persetujuan")
	}

	var apoteker, keuangan string
	if persetujuan.Apoteker == uuid.Nil {
		apoteker = ""
	} else {
		apoteker = persetujuan.Apoteker.String()
	}

	if persetujuan.Keuangan == uuid.Nil {
		keuangan = ""
	} else {
		keuangan = persetujuan.Keuangan.String()
	}

	response := model.PersetujuanResponse{
		IdPengajuan:    persetujuan.IdPengajuan.String(),
		Status:         persetujuan.Status,
		StatusApoteker: persetujuan.StatusApoteker,
		StatusKeuangan: persetujuan.StatusKeuangan,
		Apoteker:       apoteker,
		Keuangan:       keuangan,
	}

	return response
}

func (u *PersetujuanUseCase) Delete(id, user string) {
	persetujuan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Persetujuan not found",
		})
	}

	persetujuan.Updater = helper.MustParse(user)

	if err := u.Repository.Delete(&persetujuan); err != nil {
		exception.PanicIfError(err, "Failed to delete persetujuan")
	}
}
