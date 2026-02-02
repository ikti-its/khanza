package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/repository"
)

type TukarUseCase struct {
	Repository repository.TukarRepository
}

func NewTukarUseCase(repository *repository.TukarRepository) *TukarUseCase {
	return &TukarUseCase{
		Repository: *repository,
	}
}

func (u *TukarUseCase) Create(request *model.TukarRequest) model.TukarResponse {

	tukar := entity.Tukar{
		Id:               helper.MustNew(),
		IdSender:         helper.MustParse(request.IdSender),
		IdRecipient:      helper.MustParse(request.IdRecipient),
		IdHari:           request.IdHari,
		IdShiftSender:    request.IdShiftSender,
		IdShiftRecipient: request.IdShiftRecipient,
		Status:           "Menunggu",
	}

	if err := u.Repository.Insert(&tukar); err != nil {
		exception.PanicIfError(err, "Failed to insert tukar")
	}

	response := model.TukarResponse{
		Id:               tukar.Id.String(),
		IdSender:         tukar.IdSender.String(),
		IdRecipient:      tukar.IdRecipient.String(),
		IdHari:           tukar.IdHari,
		IdShiftSender:    tukar.IdShiftSender,
		IdShiftRecipient: tukar.IdShiftRecipient,
		Status:           tukar.Status,
	}

	return response
}

func (u *TukarUseCase) GetSender(id string) []model.TukarResponse {
	tukar, err := u.Repository.FindSender(helper.MustParse(id))
	exception.PanicIfError(err, "Failed to get all sender list")

	response := make([]model.TukarResponse, len(tukar))
	for i, tukar := range tukar {
		response[i] = model.TukarResponse{
			Id:               tukar.Id.String(),
			IdSender:         tukar.IdSender.String(),
			IdRecipient:      tukar.IdRecipient.String(),
			IdHari:           tukar.IdHari,
			IdShiftSender:    tukar.IdShiftSender,
			IdShiftRecipient: tukar.IdShiftRecipient,
			Status:           tukar.Status,
		}
	}

	return response
}

func (u *TukarUseCase) GetRecipient(id string) []model.TukarResponse {
	tukar, err := u.Repository.FindRecipient(helper.MustParse(id))
	exception.PanicIfError(err, "Failed to get all recipient list")

	response := make([]model.TukarResponse, len(tukar))
	for i, tukar := range tukar {
		response[i] = model.TukarResponse{
			Id:               tukar.Id.String(),
			IdSender:         tukar.IdSender.String(),
			IdRecipient:      tukar.IdRecipient.String(),
			IdHari:           tukar.IdHari,
			IdShiftSender:    tukar.IdShiftSender,
			IdShiftRecipient: tukar.IdShiftRecipient,
			Status:           tukar.Status,
		}
	}

	return response
}

func (u *TukarUseCase) GetById(id string) model.TukarResponse {
	tukar, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Tukar not found",
		})
	}

	response := model.TukarResponse{
		Id:               tukar.Id.String(),
		IdSender:         tukar.IdSender.String(),
		IdRecipient:      tukar.IdRecipient.String(),
		IdHari:           tukar.IdHari,
		IdShiftSender:    tukar.IdShiftSender,
		IdShiftRecipient: tukar.IdShiftRecipient,
		Status:           tukar.Status,
	}

	return response
}

func (u *TukarUseCase) Update(request *model.TukarRequest, id string) model.TukarResponse {
	tukar, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Tukar not found",
		})
	}

	tukar.IdHari = request.IdHari
	tukar.Status = request.Status

	if err := u.Repository.Update(&tukar); err != nil {
		exception.PanicIfError(err, "Failed to update tukar")
	}

	response := model.TukarResponse{
		Id:               tukar.Id.String(),
		IdSender:         tukar.IdSender.String(),
		IdRecipient:      tukar.IdRecipient.String(),
		IdHari:           tukar.IdHari,
		IdShiftSender:    tukar.IdShiftSender,
		IdShiftRecipient: tukar.IdShiftRecipient,
		Status:           tukar.Status,
	}

	return response
}

func (u *TukarUseCase) Delete(id string) {
	tukar, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Tukar not found",
		})
	}

	if err := u.Repository.Delete(&tukar); err != nil {
		exception.PanicIfError(err, "Failed to delete tukar")
	}
}
