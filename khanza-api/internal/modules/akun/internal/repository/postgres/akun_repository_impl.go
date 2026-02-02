package postgres

import (
	"math"
	"time"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/akun/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/akun/internal/repository"
	"github.com/jmoiron/sqlx"
)

type akunRepositoryImpl struct {
	DB *sqlx.DB
}

func NewAkunRepository(db *sqlx.DB) repository.AkunRepository {
	return &akunRepositoryImpl{db}
}

func (r *akunRepositoryImpl) Insert(akun *entity.Akun) error {
	query := `
		INSERT INTO akun (id, email, password, foto, role)
		VALUES ($1, $2, $3, $4, $5)
	`

	_, err := r.DB.Exec(query, akun.Id, akun.Email, akun.Password, akun.Foto, akun.Role)

	return err
}

func (r *akunRepositoryImpl) Find() ([]entity.Akun, error) {
	query := `
		SELECT id, email, foto, role
		FROM akun
		WHERE deleted_at IS NULL
	`

	var records []entity.Akun
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *akunRepositoryImpl) FindPage(page, size int) ([]entity.Akun, int, error) {
	query := `
		SELECT id, email, foto, role
		FROM akun
		WHERE deleted_at IS NULL
		LIMIT $1 OFFSET $2
	`
	totalQuery := "SELECT COUNT(*) FROM akun WHERE deleted_at IS NULL"

	var total int64
	if err := r.DB.Get(&total, totalQuery); err != nil {
		return nil, 0, err
	}

	totalPage := int(math.Ceil(float64(total) / float64(size)))
	offset := (page - 1) * size

	var records []entity.Akun
	err := r.DB.Select(&records, query, size, offset)

	return records, totalPage, err
}

func (r *akunRepositoryImpl) FindById(id uuid.UUID) (entity.Akun, error) {
	query := `
		SELECT id, email, foto, role
		FROM akun
		WHERE id = $1 AND deleted_at IS NULL
	`

	var record entity.Akun
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *akunRepositoryImpl) Update(akun *entity.Akun) error {
	query := `
		UPDATE akun
		SET email = $1, password = $2, foto = $3, role = $4, updated_at = $5, updater = $6
		WHERE id = $7 AND deleted_at IS NULL
	`

	_, err := r.DB.Exec(query, akun.Email, akun.Password, akun.Foto, akun.Role, time.Now(), akun.Updater, akun.Id)

	return err
}

func (r *akunRepositoryImpl) Delete(akun *entity.Akun) error {
	query := `
		UPDATE akun
		SET deleted_at = $1, updater = $2
		WHERE id = $3
	`

	_, err := r.DB.Exec(query, time.Now(), akun.Updater, akun.Id)

	return err
}
