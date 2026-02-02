package postgres

import (
	"math"
	"time"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/repository"
	"github.com/jmoiron/sqlx"
)

type penerimaanRepositoryImpl struct {
	DB *sqlx.DB
}

func NewPenerimaanRepository(db *sqlx.DB) repository.PenerimaanRepository {
	return &penerimaanRepositoryImpl{db}
}

func (r *penerimaanRepositoryImpl) Insert(penerimaan *entity.Penerimaan) error {
	query := `
		INSERT INTO penerimaan_barang_medis (id, id_pengajuan, id_pemesanan, no_faktur, tanggal_datang, tanggal_faktur, tanggal_jthtempo, id_pegawai, id_ruangan, updater)
		VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)
	`

	_, err := r.DB.Exec(query, penerimaan.Id, penerimaan.IdPengajuan, penerimaan.IdPemesanan, penerimaan.Nomor, penerimaan.Datang, penerimaan.Faktur, penerimaan.JatuhTempo, penerimaan.IdPegawai, penerimaan.Ruangan, penerimaan.Updater)

	return err
}

func (r *penerimaanRepositoryImpl) Find() ([]entity.Penerimaan, error) {
	query := `
		SELECT id, id_pengajuan, id_pemesanan, no_faktur, tanggal_datang, tanggal_faktur, tanggal_jthtempo, id_pegawai, id_ruangan
		FROM penerimaan_barang_medis
		WHERE deleted_at IS NULL
	`

	var records []entity.Penerimaan
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *penerimaanRepositoryImpl) FindPage(page, size int) ([]entity.Penerimaan, int, error) {
	query := `
		SELECT id, id_pengajuan, id_pemesanan, no_faktur, tanggal_datang, tanggal_faktur, tanggal_jthtempo, id_pegawai, id_ruangan
		FROM penerimaan_barang_medis
		WHERE deleted_at IS NULL
		LIMIT $1 OFFSET $2
	`
	totalQuery := "SELECT COUNT(*) FROM penerimaan_barang_medis WHERE deleted_at IS NULL"

	var total int64
	if err := r.DB.Get(&total, totalQuery); err != nil {
		return nil, 0, err
	}

	totalPage := int(math.Ceil(float64(total) / float64(size)))
	offset := (page - 1) * size

	var records []entity.Penerimaan
	err := r.DB.Select(&records, query, size, offset)

	return records, totalPage, err
}

func (r *penerimaanRepositoryImpl) FindById(id uuid.UUID) (entity.Penerimaan, error) {
	query := `
		SELECT id, id_pengajuan, id_pemesanan, no_faktur, tanggal_datang, tanggal_faktur, tanggal_jthtempo, id_pegawai, id_ruangan
		FROM penerimaan_barang_medis
		WHERE id = $1 AND deleted_at IS NULL
	`

	var record entity.Penerimaan
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *penerimaanRepositoryImpl) Update(penerimaan *entity.Penerimaan) error {
	query := `
		UPDATE penerimaan_barang_medis
		SET id_pengajuan = $2, id_pemesanan = $3, no_faktur = $4, tanggal_datang = $5, tanggal_faktur = $6, tanggal_jthtempo = $7, id_pegawai = $8, id_ruangan = $9, updated_at = $10, updater = $11
		WHERE id = $1 AND deleted_at IS NULL
	`

	_, err := r.DB.Exec(query, penerimaan.Id, penerimaan.IdPengajuan, penerimaan.IdPemesanan, penerimaan.Nomor, penerimaan.Datang, penerimaan.Faktur, penerimaan.JatuhTempo, penerimaan.IdPegawai, penerimaan.Ruangan, time.Now(), penerimaan.Updater)

	return err
}

func (r *penerimaanRepositoryImpl) Delete(penerimaan *entity.Penerimaan) error {
	query := `
		UPDATE penerimaan_barang_medis
		SET deleted_at = $2, updater = $3
		WHERE id = $1
	`

	_, err := r.DB.Exec(query, penerimaan.Id, time.Now(), penerimaan.Updater)

	return err
}
