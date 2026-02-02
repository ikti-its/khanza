package postgres

import (
	"database/sql"
	"errors"
	"math"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/repository"
	"github.com/jmoiron/sqlx"
)

type ketersediaanRepositoryImpl struct {
	DB *sqlx.DB
}

func NewKetersediaanRepository(db *sqlx.DB) repository.KetersediaanRepository {
	return &ketersediaanRepositoryImpl{db}
}

func (r *ketersediaanRepositoryImpl) Find() ([]entity.Ketersediaan, error) {
	query := `
		SELECT p.id AS pegawai, p.nip, p.telepon, j.nama AS jabatan, d.nama AS departemen, a.foto, p.nama, al.alamat, al.alamat_lat AS latitude, al.alamat_lon AS longitude
		FROM pegawai p
		JOIN akun a ON p.id_akun = a.id
		JOIN alamat al ON a.id = al.id_akun
		JOIN ref.jabatan j ON p.id_jabatan = j.id
		JOIN ref.departemen d ON p.id_departemen = d.id
		WHERE p.deleted_at IS NULL
	`

	var records []entity.Ketersediaan
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *ketersediaanRepositoryImpl) FindPage(page, size int) ([]entity.Ketersediaan, int, error) {
	query := `
		SELECT p.id AS pegawai, p.nip, p.telepon, j.nama AS jabatan, d.nama AS departemen, a.foto, p.nama, al.alamat, al.alamat_lat AS latitude, al.alamat_lon AS longitude
		FROM pegawai p
		JOIN akun a ON p.id_akun = a.id
		JOIN alamat al ON a.id = al.id_akun
		JOIN ref.jabatan j ON p.id_jabatan = j.id
		JOIN ref.departemen d ON p.id_departemen = d.id
		WHERE p.deleted_at IS NULL
		LIMIT $1 OFFSET $2
	`
	totalQuery := "SELECT COUNT(*) FROM pegawai WHERE deleted_at IS NULL"

	var total int64
	if err := r.DB.Get(&total, totalQuery); err != nil {
		return nil, 0, err
	}

	totalPage := int(math.Ceil(float64(total) / float64(size)))
	offset := (page - 1) * size

	var records []entity.Ketersediaan
	err := r.DB.Select(&records, query, size, offset)

	return records, totalPage, err
}

func (r *ketersediaanRepositoryImpl) ObserveCuti(id uuid.UUID, tanggal string) (uuid.UUID, error) {
	query := `
		SELECT id
		FROM cuti
		WHERE status = 'Diterima' AND id_pegawai = $1 AND $2 BETWEEN tanggal_mulai AND tanggal_selesai AND deleted_at IS NULL
		LIMIT 1
	`

	var record uuid.UUID
	if err := r.DB.Get(&record, query, id, tanggal); errors.Is(err, sql.ErrNoRows) {
		return uuid.Nil, err
	}

	return record, nil
}
