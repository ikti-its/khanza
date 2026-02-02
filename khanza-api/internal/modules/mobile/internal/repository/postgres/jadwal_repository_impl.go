package postgres

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/repository"
	"github.com/jmoiron/sqlx"
)

type jadwalRepositoryImpl struct {
	DB *sqlx.DB
}

func NewJadwalRepository(db *sqlx.DB) repository.JadwalRepository {
	return &jadwalRepositoryImpl{db}
}

func (r *jadwalRepositoryImpl) Find(hari int) ([]entity.Jadwal, error) {
	query := `
		SELECT jp.id, jp.id_pegawai, jp.id_hari, jp.id_shift, s.jam_masuk, s.jam_pulang
		FROM jadwal_pegawai jp
		JOIN ref.shift s ON jp.id_shift = s.id
		WHERE jp.id_hari = $1 AND deleted_at IS NULL
	`

	var records []entity.Jadwal
	err := r.DB.Select(&records, query, hari)

	return records, err
}

func (r *jadwalRepositoryImpl) FindByPegawaiId(id uuid.UUID, hari int) (entity.Jadwal, error) {
	query := `
		SELECT jp.id, jp.id_pegawai, jp.id_hari, jp.id_shift, s.jam_masuk, s.jam_pulang
		FROM jadwal_pegawai jp
		JOIN ref.shift s ON jp.id_shift = s.id
		WHERE jp.id_pegawai = $1 AND jp.id_hari = $2 AND deleted_at IS NULL
	`

	var record entity.Jadwal
	err := r.DB.Get(&record, query, id, hari)

	return record, err
}
