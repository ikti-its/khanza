package postgres

import (
	"math"
	"time"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai/internal/repository"
	"github.com/jmoiron/sqlx"
)

type pegawaiRepositoryImpl struct {
	DB *sqlx.DB
}

func NewPegawaiRepository(db *sqlx.DB) repository.PegawaiRepository {
	return &pegawaiRepositoryImpl{db}
}

func (r *pegawaiRepositoryImpl) Insert(pegawai *entity.Pegawai) error {
	query := `
		INSERT INTO pegawai (id, id_akun, nip, nama, jenis_kelamin, id_jabatan, id_departemen, id_status_aktif, jenis_pegawai, telepon, tanggal_masuk)
		VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11)
	`

	_, err := r.DB.Exec(query, pegawai.Id, pegawai.IdAkun, pegawai.NIP, pegawai.Nama, pegawai.JenisKelamin, pegawai.Jabatan, pegawai.Departemen, pegawai.StatusAktif, pegawai.JenisPegawai, pegawai.Telepon, pegawai.TanggalMasuk)

	return err
}

func (r *pegawaiRepositoryImpl) Find() ([]entity.Pegawai, error) {
	query := `
		SELECT id, id_akun, nip, nama, jenis_kelamin, id_jabatan, id_departemen, id_status_aktif, jenis_pegawai, telepon, tanggal_masuk
		FROM pegawai
		WHERE deleted_at IS NULL
	`

	var records []entity.Pegawai
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *pegawaiRepositoryImpl) FindPage(page, size int) ([]entity.Pegawai, int, error) {
	query := `
		SELECT id, id_akun, nip, nama, jenis_kelamin, id_jabatan, id_departemen, id_status_aktif, jenis_pegawai, telepon, tanggal_masuk
		FROM pegawai
		WHERE deleted_at IS NULL
		LIMIT $1 OFFSET $2
	`
	totalQuery := "SELECT COUNT(*) FROM pegawai WHERE deleted_at IS NULL"

	var total int64
	if err := r.DB.Get(&total, totalQuery); err != nil {
		return nil, 0, err
	}

	totalPage := int(math.Ceil(float64(total) / float64(size)))
	offset := (page - 1) * size

	var records []entity.Pegawai
	err := r.DB.Select(&records, query, size, offset)

	return records, totalPage, err
}

func (r *pegawaiRepositoryImpl) FindById(id uuid.UUID) (entity.Pegawai, error) {
	query := `
		SELECT id, id_akun, nip, nama, jenis_kelamin, id_jabatan, id_departemen, id_status_aktif, jenis_pegawai, telepon, tanggal_masuk
		FROM pegawai
		WHERE id = $1 AND deleted_at IS NULL
	`

	var record entity.Pegawai
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *pegawaiRepositoryImpl) Update(pegawai *entity.Pegawai) error {
	query := `
		UPDATE pegawai
		SET id_akun = $1, nip = $2, nama = $3, jenis_kelamin = $4, id_jabatan = $5, id_departemen = $6, id_status_aktif = $7, jenis_pegawai = $8, telepon = $9, tanggal_masuk = $10, updated_at = $11, updater = $12
		WHERE id = $13 AND deleted_at IS NULL
	`

	_, err := r.DB.Exec(query, pegawai.IdAkun, pegawai.NIP, pegawai.Nama, pegawai.JenisKelamin, pegawai.Jabatan, pegawai.Departemen, pegawai.StatusAktif, pegawai.JenisPegawai, pegawai.Telepon, pegawai.TanggalMasuk, time.Now(), pegawai.Updater, pegawai.Id)

	return err
}

func (r *pegawaiRepositoryImpl) Delete(pegawai *entity.Pegawai) error {
	query := `
		UPDATE pegawai
		SET deleted_at = $1, updater = $2
		WHERE id = $3
	`

	_, err := r.DB.Exec(query, time.Now(), pegawai.Updater, pegawai.Id)

	return err
}

func (r *pegawaiRepositoryImpl) GetByNIP(nip string) (*entity.Pegawai, error) {
	query := `SELECT nama FROM pegawai WHERE nip = $1 LIMIT 1`
	var result entity.Pegawai
	err := r.DB.Get(&result, query, nip)
	return &result, err
}
