package postgres

import (
	"math"
	"time"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/repository"
	"github.com/jmoiron/sqlx"
)

type berkasRepositoryImpl struct {
	DB *sqlx.DB
}

func NewBerkasRepository(db *sqlx.DB) repository.BerkasRepository {
	return &berkasRepositoryImpl{db}
}

func (r *berkasRepositoryImpl) Insert(berkas *entity.Berkas) error {
	query := `
		INSERT INTO berkas_pegawai (id_pegawai, nik, tempat_lahir, tanggal_lahir, agama, pendidikan, ktp, kk, npwp, bpjs, ijazah, skck, str, serkom)
		VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14)
	`

	_, err := r.DB.Exec(query, berkas.IdPegawai, berkas.NIK, berkas.TempatLahir, berkas.TanggalLahir, berkas.Agama, berkas.Pendidikan, berkas.KTP, berkas.KK, berkas.NPWP, berkas.BPJS, berkas.Ijazah, berkas.SKCK, berkas.STR, berkas.SerKom)

	return err
}

func (r *berkasRepositoryImpl) Find() ([]entity.Berkas, error) {
	query := `
		SELECT id_pegawai, nik, tempat_lahir, tanggal_lahir, agama, pendidikan, ktp, kk, npwp, bpjs, ijazah, skck, str, serkom
		FROM berkas_pegawai
		WHERE deleted_at IS NULL
	`

	var records []entity.Berkas
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *berkasRepositoryImpl) FindPage(page, size int) ([]entity.Berkas, int, error) {
	query := `
		SELECT id_pegawai, nik, tempat_lahir, tanggal_lahir, agama, pendidikan, ktp, kk, npwp, bpjs, ijazah, skck, str, serkom
		FROM berkas_pegawai
		WHERE deleted_at IS NULL
		LIMIT $1 OFFSET $2
	`
	totalQuery := "SELECT COUNT(*) FROM berkas_pegawai WHERE deleted_at IS NULL"

	var total int64
	if err := r.DB.Get(&total, totalQuery); err != nil {
		return nil, 0, err
	}

	totalPage := int(math.Ceil(float64(total) / float64(size)))
	offset := (page - 1) * size

	var records []entity.Berkas
	err := r.DB.Select(&records, query, size, offset)

	return records, totalPage, err
}

func (r *berkasRepositoryImpl) FindAkunIdById(id uuid.UUID) (uuid.UUID, error) {
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

func (r *berkasRepositoryImpl) FindById(id uuid.UUID) (entity.Berkas, error) {
	query := `
		SELECT id_pegawai, nik, tempat_lahir, tanggal_lahir, agama, pendidikan, ktp, kk, npwp, bpjs, ijazah, skck, str, serkom
		FROM berkas_pegawai
		WHERE id_pegawai = $1 AND deleted_at IS NULL
	`

	var record entity.Berkas
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *berkasRepositoryImpl) Update(berkas *entity.Berkas) error {
	query := `
		UPDATE berkas_pegawai
		SET nik = $1, tempat_lahir = $2, tanggal_lahir = $3, agama = $4, pendidikan = $5, ktp = $6, kk = $7, npwp = $8, bpjs = $9, ijazah = $10, skck = $11, str = $12, serkom = $13, updated_at = $14, updater = $15
		WHERE id_pegawai = $16 AND deleted_at IS NULL
	`

	_, err := r.DB.Exec(query, berkas.NIK, berkas.TempatLahir, berkas.TanggalLahir, berkas.Agama, berkas.Pendidikan, berkas.KTP, berkas.KK, berkas.NPWP, berkas.BPJS, berkas.Ijazah, berkas.SKCK, berkas.STR, berkas.SerKom, time.Now(), berkas.Updater, berkas.IdPegawai)

	return err
}

func (r *berkasRepositoryImpl) Delete(berkas *entity.Berkas) error {
	query := `
		UPDATE berkas_pegawai
		SET deleted_at = $1, updater = $2
		WHERE id_pegawai = $3
	`

	_, err := r.DB.Exec(query, time.Now(), berkas.Updater, berkas.IdPegawai)

	return err
}
