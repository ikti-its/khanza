package postgres

import (
	"math"
	"time"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/repository"
	"github.com/jmoiron/sqlx"
)

type pesananRepositoryImpl struct {
	DB *sqlx.DB
}

func NewPesananRepository(db *sqlx.DB) repository.PesananRepository {
	return &pesananRepositoryImpl{db}
}

func (r *pesananRepositoryImpl) Insert(pesanan *entity.Pesanan) error {
	query := `
		INSERT INTO pesanan_barang_medis (id, id_pengajuan, id_barang_medis, id_satuan, harga_satuan_pengajuan, harga_satuan_pemesanan, jumlah_pesanan, total_per_item, subtotal_per_item, diskon_persen, diskon_jumlah, jumlah_diterima, kadaluwarsa, no_batch, updater)
		VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15)
	`

	_, err := r.DB.Exec(query, pesanan.Id, pesanan.IdPengajuan, pesanan.IdMedis, pesanan.Satuan, pesanan.HargaPengajuan, pesanan.HargaPemesanan, pesanan.Pesanan, pesanan.Total, pesanan.Subtotal, pesanan.DiskonPersen, pesanan.DiskonJumlah, pesanan.Diterima, pesanan.Kadaluwarsa, pesanan.Batch, pesanan.Updater)

	return err
}

func (r *pesananRepositoryImpl) Find() ([]entity.Pesanan, error) {
	query := `
		SELECT id, id_pengajuan, id_barang_medis, id_satuan, harga_satuan_pengajuan, harga_satuan_pemesanan, jumlah_pesanan, total_per_item, subtotal_per_item, diskon_persen, diskon_jumlah, jumlah_diterima, kadaluwarsa, no_batch
		FROM pesanan_barang_medis
		WHERE deleted_at IS NULL
	`

	var records []entity.Pesanan
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *pesananRepositoryImpl) FindPage(page, size int) ([]entity.Pesanan, int, error) {
	query := `
		SELECT id, id_pengajuan, id_barang_medis, id_satuan, harga_satuan_pengajuan, harga_satuan_pemesanan, jumlah_pesanan, total_per_item, subtotal_per_item, diskon_persen, diskon_jumlah, jumlah_diterima, kadaluwarsa, no_batch
		FROM pesanan_barang_medis
		WHERE deleted_at IS NULL
		LIMIT $1 OFFSET $2
	`
	totalQuery := "SELECT COUNT(*) FROM pesanan_barang_medis WHERE deleted_at IS NULL"

	var total int64
	if err := r.DB.Get(&total, totalQuery); err != nil {
		return nil, 0, err
	}

	totalPage := int(math.Ceil(float64(total) / float64(size)))
	offset := (page - 1) * size

	var records []entity.Pesanan
	err := r.DB.Select(&records, query, size, offset)

	return records, totalPage, err
}

func (r *pesananRepositoryImpl) FindByIdPengajuan(id uuid.UUID) ([]entity.Pesanan, error) {
	query := `
		SELECT id, id_pengajuan, id_barang_medis, id_satuan, harga_satuan_pengajuan, harga_satuan_pemesanan, jumlah_pesanan, total_per_item, subtotal_per_item, diskon_persen, diskon_jumlah, jumlah_diterima, kadaluwarsa, no_batch
		FROM pesanan_barang_medis
		WHERE id_pengajuan = $1 AND deleted_at IS NULL
	`

	var records []entity.Pesanan
	err := r.DB.Select(&records, query, id)

	return records, err
}

func (r *pesananRepositoryImpl) FindById(id uuid.UUID) (entity.Pesanan, error) {
	query := `
		SELECT id, id_pengajuan, id_barang_medis, id_satuan, harga_satuan_pengajuan, harga_satuan_pemesanan, jumlah_pesanan, total_per_item, subtotal_per_item, diskon_persen, diskon_jumlah, jumlah_diterima, kadaluwarsa, no_batch
		FROM pesanan_barang_medis
		WHERE id = $1 AND deleted_at IS NULL
	`

	var record entity.Pesanan
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *pesananRepositoryImpl) Update(pesanan *entity.Pesanan) error {
	query := `
		UPDATE pesanan_barang_medis
		SET id_pengajuan = $2, id_barang_medis = $3, id_satuan = $4, harga_satuan_pengajuan = $5, harga_satuan_pemesanan = $6, jumlah_pesanan = $7, total_per_item = $8, subtotal_per_item = $9, diskon_persen = $10, diskon_jumlah = $11, jumlah_diterima = $12, kadaluwarsa = $13, no_batch = $14, updated_at = $15, updater = $16
		WHERE id = $1
	`

	_, err := r.DB.Exec(query, pesanan.Id, pesanan.IdPengajuan, pesanan.IdMedis, pesanan.Satuan, pesanan.HargaPengajuan, pesanan.HargaPemesanan, pesanan.Pesanan, pesanan.Total, pesanan.Subtotal, pesanan.DiskonPersen, pesanan.DiskonJumlah, pesanan.Diterima, pesanan.Kadaluwarsa, pesanan.Batch, time.Now(), pesanan.Updater)

	return err
}

func (r *pesananRepositoryImpl) Delete(pesanan *entity.Pesanan) error {
	query := `
		UPDATE pesanan_barang_medis
		SET deleted_at = $2, updater = $3
		WHERE id = $1
	`

	_, err := r.DB.Exec(query, pesanan.Id, time.Now(), pesanan.Updater)

	return err
}
