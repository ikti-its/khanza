package postgres

import (
	"database/sql"
	"errors"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/repository"
	"github.com/jmoiron/sqlx"
)

type homeRepositoryImpl struct {
	DB *sqlx.DB
}

func NewHomeRepository(db *sqlx.DB) repository.HomeRepository {
	return &homeRepositoryImpl{db}
}

func (r *homeRepositoryImpl) HomePegawai(id uuid.UUID, hari int) (entity.Home, error) {
	query := `
		SELECT a.id AS akun, p.id AS pegawai, p.nama, p.nip, r.nama AS role, a.email, p.telepon, a.foto AS profil, al.alamat, al.alamat_lat, al.alamat_lon, fp.foto, jp.id AS jadwal, s.nama AS shift, s.jam_masuk, s.jam_pulang
		FROM akun a
		JOIN pegawai p ON a.id = p.id_akun
		JOIN ref.role r ON a.role = r.id
		JOIN alamat al ON a.id = al.id_akun
		JOIN foto_pegawai fp ON p.id = fp.id_pegawai
		JOIN jadwal_pegawai jp ON p.id = jp.id_pegawai
		JOIN ref.shift s ON jp.id_shift = s.id
		WHERE a.id = $1 AND jp.id_hari = $2 AND p.id_status_aktif = 'A' AND a.deleted_at IS NULL
	`

	var record entity.Home
	err := r.DB.Get(&record, query, id, hari)

	return record, err
}

func (r *homeRepositoryImpl) ObserveKehadiran(id, jadwal uuid.UUID, tanggal string) (uuid.UUID, error) {
	query := `
		SELECT id
		FROM presensi
		WHERE id_pegawai = $1 AND id_jadwal_pegawai = $2 AND tanggal = $3 AND deleted_at IS NULL
	`

	var record uuid.UUID
	if err := r.DB.Get(&record, query, id, jadwal, tanggal); errors.Is(err, sql.ErrNoRows) {
		return uuid.Nil, err
	}

	return record, nil
}
