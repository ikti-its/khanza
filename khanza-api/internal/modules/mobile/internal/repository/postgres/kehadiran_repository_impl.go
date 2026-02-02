package postgres

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/repository"
	"github.com/jmoiron/sqlx"
)

type kehadiranRepositoryImpl struct {
	DB *sqlx.DB
}

func NewKehadiranRepository(db *sqlx.DB) repository.KehadiranRepository {
	return &kehadiranRepositoryImpl{DB: db}
}

func (r *kehadiranRepositoryImpl) FindByPegawaiId(id uuid.UUID) (entity.Kehadiran, error) {
	query := `
		SELECT id, id_pegawai
		FROM presensi
		WHERE id_pegawai = $1 AND jam_pulang IS NULL AND deleted_at IS NULL
		ORDER BY tanggal
		LIMIT 1
	`

	var record entity.Kehadiran
	err := r.DB.Get(&record, query, id)

	return record, err
}
