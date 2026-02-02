package postgres

import (
	"math"
	"time"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/repository"
	"github.com/jmoiron/sqlx"
)

type fotoRepositoryImpl struct {
	DB *sqlx.DB
}

func NewFotoRepository(db *sqlx.DB) repository.FotoRepository {
	return &fotoRepositoryImpl{db}
}

func (r *fotoRepositoryImpl) Insert(foto *entity.Foto) error {
	query := `
		INSERT INTO foto_pegawai (id_pegawai, foto)
		VALUES ($1, $2)
	`

	_, err := r.DB.Exec(query, foto.IdPegawai, foto.Foto)

	return err
}

func (r *fotoRepositoryImpl) Find() ([]entity.Foto, error) {
	query := `
		SELECT id_pegawai, foto
		FROM foto_pegawai
		WHERE deleted_at IS NULL
	`

	var records []entity.Foto
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *fotoRepositoryImpl) FindPage(page, size int) ([]entity.Foto, int, error) {
	query := `
		SELECT id_pegawai, foto
		FROM foto_pegawai
		WHERE deleted_at IS NULL
		LIMIT $1 OFFSET $2
	`
	totalQuery := "SELECT COUNT(*) FROM foto_pegawai WHERE deleted_at IS NULL"

	var total int64
	if err := r.DB.Get(&total, totalQuery); err != nil {
		return nil, 0, err
	}

	totalPage := int(math.Ceil(float64(total) / float64(size)))
	offset := (page - 1) * size

	var records []entity.Foto
	err := r.DB.Select(&records, query, size, offset)

	return records, totalPage, err
}

func (r *fotoRepositoryImpl) FindAkunIdById(id uuid.UUID) (uuid.UUID, error) {
	query := `
		SELECT id_akun
		FROM pegawai
		WHERE id = $1 AND deleted_at IS NULL
	`

	var record struct {
		Id uuid.UUID `db:"id_akun"`
	}
	err := r.DB.Get(&record, query, id)

	return record.Id, err
}

func (r *fotoRepositoryImpl) FindById(id uuid.UUID) (entity.Foto, error) {
	query := `
		SELECT id_pegawai, foto
		FROM foto_pegawai
		WHERE id_pegawai = $1 AND deleted_at IS NULL
	`

	var record entity.Foto
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *fotoRepositoryImpl) Update(foto *entity.Foto) error {
	query := `
		UPDATE foto_pegawai
		SET id_pegawai = $1, foto = $2, updated_at = $3, updater = $4
		WHERE id_pegawai = $5 AND deleted_at IS NULL
	`

	_, err := r.DB.Exec(query, foto.IdPegawai, foto.Foto, time.Now(), foto.Updater, foto.IdPegawai)

	return err
}

func (r *fotoRepositoryImpl) Delete(foto *entity.Foto) error {
	query := `
		UPDATE foto_pegawai
		SET deleted_at = $1, updater = $2
		WHERE id_pegawai = $3
	`

	_, err := r.DB.Exec(query, time.Now(), foto.Updater, foto.IdPegawai)

	return err
}
