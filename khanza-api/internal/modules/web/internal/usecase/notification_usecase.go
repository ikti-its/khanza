package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/web/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/web/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/web/internal/repository"
)

type NotificationUseCase struct {
	Repository repository.NotificationRepository
}

func NewNotificationUseCase(repository *repository.NotificationRepository) *NotificationUseCase {
	return &NotificationUseCase{
		Repository: *repository,
	}
}

func (u *NotificationUseCase) Create(request *model.NotificationRequest, user string) model.NotificationResponse {
	sender := helper.MustParse(user)
	notification := entity.Notification{
		Id:        helper.MustNew(),
		Sender:    sender,
		Recipient: helper.MustParse(request.Recipient),
		Tanggal:   helper.ParseTime(request.Tanggal, "2006-01-02"),
		Judul:     request.Judul,
		Pesan:     request.Pesan,
		Read:      false,
	}

	if err := u.Repository.Insert(&notification); err != nil {
		exception.PanicIfError(err, "Failed to insert notification")
	}

	response := model.NotificationResponse{
		Id:        notification.Id.String(),
		Sender:    notification.Sender.String(),
		Recipient: notification.Recipient.String(),
		Tanggal:   notification.Tanggal.Format("2006-01-02"),
		Judul:     notification.Judul,
		Pesan:     notification.Pesan,
		Read:      notification.Read,
	}

	return response
}

func (u *NotificationUseCase) GetById(id string) []model.NotificationResponse {
	notification, err := u.Repository.FindAllById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Notification not found",
		})
	}

	response := make([]model.NotificationResponse, len(notification))
	for i, notification := range notification {
		response[i] = model.NotificationResponse{
			Id:        notification.Id.String(),
			Sender:    notification.Sender.String(),
			Recipient: notification.Recipient.String(),
			Tanggal:   notification.Tanggal.Format("2006-01-02"),
			Judul:     notification.Judul,
			Pesan:     notification.Pesan,
			Read:      notification.Read,
		}
	}

	return response
}

func (u *NotificationUseCase) Update(id string) model.NotificationResponse {
	notification, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Notification not found",
		})
	}

	if err := u.Repository.Update(helper.MustParse(id)); err != nil {
		exception.PanicIfError(err, "Failed to update notification")
	}

	response := model.NotificationResponse{
		Id:        notification.Id.String(),
		Sender:    notification.Sender.String(),
		Recipient: notification.Recipient.String(),
		Tanggal:   notification.Tanggal.Format("2006-01-02"),
		Judul:     notification.Judul,
		Pesan:     notification.Pesan,
		Read:      true,
	}

	return response
}
