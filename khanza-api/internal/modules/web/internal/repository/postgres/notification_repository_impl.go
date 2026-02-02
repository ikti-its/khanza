package postgres

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/web/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/web/internal/repository"
	"github.com/jmoiron/sqlx"
)

type notificationRepositoryImpl struct {
	DB *sqlx.DB
}

func NewNotificationRepository(db *sqlx.DB) repository.NotificationRepository {
	return &notificationRepositoryImpl{db}
}

func (r *notificationRepositoryImpl) Insert(notification *entity.Notification) error {
	query := `
		INSERT INTO notifikasi (id, sender, recipient, tanggal, judul, pesan, read)
		VALUES ($1, $2, $3, $4, $5, $6, false)
	`

	_, err := r.DB.Exec(query, notification.Id, notification.Sender, notification.Recipient, notification.Tanggal, notification.Judul, notification.Pesan)

	return err
}

func (r *notificationRepositoryImpl) FindAllById(id uuid.UUID) ([]entity.Notification, error) {
	query := `
		SELECT id, sender, recipient, tanggal, judul, pesan, read
		FROM notifikasi
		WHERE recipient = $1
	`

	var records []entity.Notification
	err := r.DB.Select(&records, query, id)

	return records, err
}

func (r *notificationRepositoryImpl) FindById(id uuid.UUID) (entity.Notification, error) {
	query := `
		SELECT id, sender, recipient, tanggal, judul, pesan, read
		FROM notifikasi
		WHERE id = $1
	`

	var record entity.Notification
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *notificationRepositoryImpl) Update(id uuid.UUID) error {
	query := `
		UPDATE notifikasi
		SET read = true
		WHERE id = $1
	`

	_, err := r.DB.Exec(query, id)

	return err
}
