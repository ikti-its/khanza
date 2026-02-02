package postgres

import (
	"math"
	"time"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/repository"
	"github.com/jmoiron/sqlx"
)

type cutiRepositoryImpl struct {
	DB *sqlx.DB
}

func NewCutiRepository(db *sqlx.DB) repository.CutiRepository {
	return &cutiRepositoryImpl{db}
}

func (r *cutiRepositoryImpl) Insert(cuti *entity.Cuti) error {
	query := `
		INSERT INTO cuti (id, id_pegawai, tanggal_mulai, tanggal_selesai, id_alasan_cuti, status)
		VALUES ($1, $2, $3, $4, $5, 'Diproses')
	`

	_, err := r.DB.Exec(query, cuti.Id, cuti.IdPegawai, cuti.TanggalMulai, cuti.TanggalSelesai, cuti.IdAlasan)

	return err
}

func (r *cutiRepositoryImpl) Find() ([]entity.Cuti, error) {
	query := `
		SELECT id, id_pegawai, tanggal_mulai, tanggal_selesai, id_alasan_cuti, status
		FROM cuti
		WHERE deleted_at IS NULL
		ORDER BY created_at DESC
	`

	var records []entity.Cuti
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *cutiRepositoryImpl) FindPage(page, size int) ([]entity.Cuti, int, error) {
	query := `
		SELECT id, id_pegawai, tanggal_mulai, tanggal_selesai, id_alasan_cuti, status
		FROM cuti
		WHERE deleted_at IS NULL
		ORDER BY created_at DESC
		LIMIT $1 OFFSET $2
	`
	totalQuery := "SELECT COUNT(*) FROM cuti WHERE deleted_at IS NULL"

	var total int64
	if err := r.DB.Get(&total, totalQuery); err != nil {
		return nil, 0, err
	}

	totalPage := int(math.Ceil(float64(total) / float64(size)))
	offset := (page - 1) * size

	var records []entity.Cuti
	err := r.DB.Select(&records, query, size, offset)

	return records, totalPage, err
}

func (r *cutiRepositoryImpl) FindById(id uuid.UUID) (entity.Cuti, error) {
	query := `
		SELECT id, id_pegawai, tanggal_mulai, tanggal_selesai, id_alasan_cuti, status
		FROM cuti
		WHERE id = $1 AND deleted_at IS NULL
	`

	var record entity.Cuti
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *cutiRepositoryImpl) FindByPegawaiId(id uuid.UUID) ([]entity.Cuti, error) {
	query := `
		SELECT id, id_pegawai, tanggal_mulai, tanggal_selesai, id_alasan_cuti, status
		FROM cuti
		WHERE id_pegawai = $1 AND deleted_at IS NULL
		ORDER BY created_at DESC
	`

	var records []entity.Cuti
	err := r.DB.Select(&records, query, id)

	return records, err
}

func (r *cutiRepositoryImpl) Update(cuti *entity.Cuti) error {
	query := `
		UPDATE cuti
		SET tanggal_mulai = $1, tanggal_selesai = $2, id_alasan_cuti = $3, status = $4, updated_at = $5, updater = $6
		WHERE id = $7 AND deleted_at IS NULL
	`

	_, err := r.DB.Exec(query, cuti.TanggalMulai, cuti.TanggalSelesai, cuti.IdAlasan, cuti.Status, time.Now(), cuti.Updater, cuti.Id)

	return err
}

func (r *cutiRepositoryImpl) Delete(cuti *entity.Cuti) error {
	query := `
		UPDATE cuti
		SET deleted_at = $1, updater = $2
		WHERE id = $3 AND deleted_at IS NULL
	`

	_, err := r.DB.Exec(query, time.Now(), cuti.Updater, cuti.Id)

	return err
}
