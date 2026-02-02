package postgres

import (
	"math"
	"time"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran/internal/repository"
	"github.com/jmoiron/sqlx"
)

type jadwalRepositoryImpl struct {
	DB *sqlx.DB
}

func NewJadwalRepository(db *sqlx.DB) repository.JadwalRepository {
	return &jadwalRepositoryImpl{DB: db}
}

func (r *jadwalRepositoryImpl) Find() ([]entity.Jadwal, error) {
	query := `
		SELECT jp.id, jp.id_pegawai, jp.id_hari, jp.id_shift, s.jam_masuk, s.jam_pulang
		FROM jadwal_pegawai jp
		JOIN ref.shift s ON jp.id_shift = s.id
		WHERE deleted_at IS NULL
		ORDER BY jp.id_hari
	`

	var records []entity.Jadwal
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *jadwalRepositoryImpl) FindPage(page, size int) ([]entity.Jadwal, int, error) {
	query := `
		SELECT jp.id, jp.id_pegawai, jp.id_hari, jp.id_shift, s.jam_masuk, s.jam_pulang
		FROM jadwal_pegawai jp
		JOIN ref.shift s ON jp.id_shift = s.id
		WHERE deleted_at IS NULL
		ORDER BY jp.id_hari
		LIMIT $1 OFFSET $2
	`
	totalQuery := "SELECT COUNT(*) FROM jadwal_pegawai WHERE deleted_at IS NULL"

	var total int64
	if err := r.DB.Get(&total, totalQuery); err != nil {
		return nil, 0, err
	}

	totalPage := int(math.Ceil(float64(total) / float64(size)))
	offset := (page - 1) * size

	var records []entity.Jadwal
	err := r.DB.Select(&records, query, size, offset)

	return records, totalPage, err
}

func (r *jadwalRepositoryImpl) FindByHariId(id int) ([]entity.Jadwal, error) {
	query := `
		SELECT jp.id, jp.id_pegawai, jp.id_hari, jp.id_shift, s.jam_masuk, s.jam_pulang
		FROM jadwal_pegawai jp
		JOIN ref.shift s ON jp.id_shift = s.id
		WHERE jp.id_hari = $1 AND deleted_at IS NULL
		ORDER BY jp.id_pegawai
	`

	var records []entity.Jadwal
	err := r.DB.Select(&records, query, id)

	return records, err
}

func (r *jadwalRepositoryImpl) FindByPegawaiId(id uuid.UUID) ([]entity.Jadwal, error) {
	query := `
		SELECT jp.id, jp.id_pegawai, jp.id_hari, jp.id_shift, s.jam_masuk, s.jam_pulang
		FROM jadwal_pegawai jp
		JOIN ref.shift s ON jp.id_shift = s.id
		WHERE jp.id_pegawai = $1 AND deleted_at IS NULL
		ORDER BY jp.id_hari
	`

	var records []entity.Jadwal
	err := r.DB.Select(&records, query, id)

	return records, err
}

func (r *jadwalRepositoryImpl) FindById(id uuid.UUID) (entity.Jadwal, error) {
	query := `
		SELECT jp.id, jp.id_pegawai, jp.id_hari, jp.id_shift, s.jam_masuk, s.jam_pulang
		FROM jadwal_pegawai jp
		JOIN ref.shift s ON jp.id_shift = s.id
		WHERE jp.id = $1 AND deleted_at IS NULL
	`

	var record entity.Jadwal
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *jadwalRepositoryImpl) Update(jadwal *entity.Jadwal) error {
	query := `
		UPDATE jadwal_pegawai
		SET id_pegawai = $1, id_hari = $2, id_shift = $3, updated_at = $4, updater = $5
		WHERE id = $6 AND deleted_at IS NULL
	`

	_, err := r.DB.Exec(query, jadwal.IdPegawai, jadwal.IdHari, jadwal.IdShift, time.Now(), jadwal.Updater, jadwal.Id)

	return err
}
