package repository

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/web/internal/entity"
)

type NotificationRepository interface {
	Insert(notification *entity.Notification) error
	FindAllById(id uuid.UUID) ([]entity.Notification, error)
	FindById(id uuid.UUID) (entity.Notification, error)
	Update(id uuid.UUID) error
}
