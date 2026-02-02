package postgres

import (
	"time"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/organisasi/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/organisasi/internal/repository"
	"github.com/jmoiron/sqlx"
)

type organisasiRepositoryImpl struct {
	DB *sqlx.DB
}

func NewOrganisasiRepository(db *sqlx.DB) repository.OrganisasiRepository {
	return &organisasiRepositoryImpl{db}
}

func (r *organisasiRepositoryImpl) Find() (entity.Organisasi, error) {
	query := `
		SELECT id, nama, alamat, latitude, longitude, radius
		FROM ref.organisasi
		LIMIT 1
	`

	var record entity.Organisasi
	err := r.DB.Get(&record, query)

	return record, err
}

func (r *organisasiRepositoryImpl) FindById(id uuid.UUID) (entity.Organisasi, error) {
	query := `
		SELECT id, nama, alamat, latitude, longitude, radius
		FROM ref.organisasi
		WHERE id = $1
	`

	var record entity.Organisasi
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *organisasiRepositoryImpl) Update(organisasi *entity.Organisasi) error {
	query := `
		UPDATE ref.organisasi
		SET nama = $2, alamat = $3, latitude = $4, longitude = $5, radius = $6, updated_at = $7
		WHERE id = $1
	`

	_, err := r.DB.Exec(query, organisasi.Id, organisasi.Nama, organisasi.Alamat, organisasi.Latitude, organisasi.Longitude, organisasi.Radius, time.Now())

	return err
}
