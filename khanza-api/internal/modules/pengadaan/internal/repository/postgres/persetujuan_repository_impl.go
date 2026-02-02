package postgres

import (
	"math"
	"time"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/repository"
	"github.com/jmoiron/sqlx"
)

type persetujuanRepositoryImpl struct {
	DB *sqlx.DB
}

func NewPersetujuanRepository(db *sqlx.DB) repository.PersetujuanRepository {
	return &persetujuanRepositoryImpl{db}
}

func (r *persetujuanRepositoryImpl) Insert(persetujuan *entity.Persetujuan) error {
	query := `
		INSERT INTO persetujuan_pengajuan (id_pengajuan, updater)
		VALUES ($1, $2)
	`

	_, err := r.DB.Exec(query, persetujuan.IdPengajuan, persetujuan.Updater)

	return err
}

func (r *persetujuanRepositoryImpl) Find() ([]entity.Persetujuan, error) {
	query := `
		SELECT id_pengajuan, status, status_apoteker, status_keuangan, id_apoteker, id_keuangan
		FROM persetujuan_pengajuan
		WHERE deleted_at IS NULL
	`

	var records []entity.Persetujuan
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *persetujuanRepositoryImpl) FindPage(page, size int) ([]entity.Persetujuan, int, error) {
	query := `
		SELECT id_pengajuan, status, status_apoteker, status_keuangan, id_apoteker, id_keuangan
		FROM persetujuan_pengajuan
		WHERE deleted_at IS NULL
		LIMIT $1 OFFSET $2
	`
	totalQuery := "SELECT COUNT(*) FROM persetujuan_pengajuan WHERE deleted_at IS NULL"

	var total int64
	if err := r.DB.Get(&total, totalQuery); err != nil {
		return nil, 0, err
	}

	totalPage := int(math.Ceil(float64(total) / float64(size)))
	offset := (page - 1) * size

	var records []entity.Persetujuan
	err := r.DB.Select(&records, query, size, offset)

	return records, totalPage, err
}

func (r *persetujuanRepositoryImpl) FindById(id uuid.UUID) (entity.Persetujuan, error) {
	query := `
		SELECT id_pengajuan, status, status_apoteker, status_keuangan, id_apoteker, id_keuangan
		FROM persetujuan_pengajuan
		WHERE id_pengajuan = $1 AND deleted_at IS NULL
	`

	var record entity.Persetujuan
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *persetujuanRepositoryImpl) Update(persetujuan *entity.Persetujuan) error {
	query := `
		UPDATE persetujuan_pengajuan
		SET status = $2, status_apoteker = $3, status_keuangan = $4, id_apoteker = $5, id_keuangan = $6, updated_at = $7, updater = $8
		WHERE id_pengajuan = $1 AND deleted_at IS NULL
	`

	var apoteker, keuangan any
	if persetujuan.Apoteker == uuid.Nil {
		apoteker = nil
	} else {
		apoteker = persetujuan.Apoteker
	}

	if persetujuan.Keuangan == uuid.Nil {
		keuangan = nil
	} else {
		keuangan = persetujuan.Keuangan
	}

	_, err := r.DB.Exec(query, persetujuan.IdPengajuan, persetujuan.Status, persetujuan.StatusApoteker, persetujuan.StatusKeuangan, apoteker, keuangan, time.Now(), persetujuan.Updater)

	return err
}

func (r *persetujuanRepositoryImpl) Delete(persetujuan *entity.Persetujuan) error {
	query := `
		UPDATE persetujuan_pengajuan
		SET deleted_at = $2, updater = $3
		WHERE id_pengajuan = $1
	`

	_, err := r.DB.Exec(query, persetujuan.IdPengajuan, time.Now(), persetujuan.Updater)

	return err
}
