package postgres

import (
	"math"
	"time"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/akun/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/akun/internal/repository"
	"github.com/jmoiron/sqlx"
)

type alamatRepositoryImpl struct {
	DB *sqlx.DB
}

func NewAlamatRepository(db *sqlx.DB) repository.AlamatRepository {
	return &alamatRepositoryImpl{db}
}

func (r *alamatRepositoryImpl) Insert(alamat *entity.Alamat) error {
	query := `
		INSERT INTO alamat (id_akun, alamat, alamat_lat, alamat_lon)
		VALUES ($1, $2, $3, $4)
	`

	_, err := r.DB.Exec(query, alamat.IdAkun, alamat.Alamat, alamat.AlamatLat, alamat.AlamatLon)

	return err
}

func (r *alamatRepositoryImpl) Find() ([]entity.Alamat, error) {
	query := `
		SELECT id_akun, alamat, alamat_lat, alamat_lon
		FROM alamat
		WHERE deleted_at IS NULL
	`

	var records []entity.Alamat
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *alamatRepositoryImpl) FindPage(page, size int) ([]entity.Alamat, int, error) {
	query := `
		SELECT id_akun, alamat, alamat_lat, alamat_lon
		FROM alamat
		WHERE deleted_at IS NULL
		LIMIT $1 OFFSET $2
	`
	totalQuery := "SELECT COUNT(*) FROM alamat WHERE deleted_at IS NULL"

	var total int64
	if err := r.DB.Get(&total, totalQuery); err != nil {
		return nil, 0, err
	}

	totalPage := int(math.Ceil(float64(total) / float64(size)))
	offset := (page - 1) * size

	var records []entity.Alamat
	err := r.DB.Select(&records, query, size, offset)

	return records, totalPage, err
}

func (r *alamatRepositoryImpl) FindById(id uuid.UUID) (entity.Alamat, error) {
	query := `
		SELECT id_akun, alamat, alamat_lat, alamat_lon
		FROM alamat
		WHERE id_akun = $1 AND deleted_at IS NULL
	`

	var record entity.Alamat
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *alamatRepositoryImpl) Update(alamat *entity.Alamat) error {
	query := `
		UPDATE alamat
		SET alamat = $2, alamat_lat = $3, alamat_lon = $4, updated_at = $5, updater = $6
		WHERE id_akun = $1 AND deleted_at IS NULL
	`

	_, err := r.DB.Exec(query, alamat.IdAkun, alamat.Alamat, alamat.AlamatLat, alamat.AlamatLon, time.Now(), alamat.Updater)

	return err
}

func (r *alamatRepositoryImpl) Delete(alamat *entity.Alamat) error {
	query := `
		UPDATE alamat
		SET deleted_at = $2, updater = $3
		WHERE id_akun = $1
	`

	_, err := r.DB.Exec(query, alamat.IdAkun, time.Now(), alamat.Updater)

	return err
}
