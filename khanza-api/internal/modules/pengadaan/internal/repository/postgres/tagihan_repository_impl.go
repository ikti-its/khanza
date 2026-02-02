package postgres

import (
	"math"
	"time"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/repository"
	"github.com/jmoiron/sqlx"
)

type tagihanRepositoryImpl struct {
	DB *sqlx.DB
}

func NewTagihanRepository(db *sqlx.DB) repository.TagihanRepository {
	return &tagihanRepositoryImpl{db}
}

func (r *tagihanRepositoryImpl) Insert(tagihan *entity.Tagihan) error {
	query := `
		INSERT INTO tagihan_barang_medis (id, id_pengajuan, id_pemesanan, id_penerimaan, tanggal_bayar, jumlah_bayar, id_pegawai, keterangan, no_bukti, id_akun_bayar, updater)
		VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11)
	`

	_, err := r.DB.Exec(query, tagihan.Id, tagihan.IdPengajuan, tagihan.IdPemesanan, tagihan.IdPenerimaan, tagihan.Tanggal, tagihan.Jumlah, tagihan.IdPegawai, tagihan.Keterangan, tagihan.Nomor, tagihan.AkunBayar, tagihan.Updater)

	return err
}

func (r *tagihanRepositoryImpl) Find() ([]entity.Tagihan, error) {
	query := `
		SELECT id, id_pengajuan, id_pemesanan, id_penerimaan, tanggal_bayar, jumlah_bayar, id_pegawai, keterangan, no_bukti, id_akun_bayar
		FROM tagihan_barang_medis
		WHERE deleted_at IS NULL
	`

	var records []entity.Tagihan
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *tagihanRepositoryImpl) FindPage(page, size int) ([]entity.Tagihan, int, error) {
	query := `
		SELECT id, id_pengajuan, id_pemesanan, id_penerimaan, tanggal_bayar, jumlah_bayar, id_pegawai, keterangan, no_bukti, id_akun_bayar
		FROM tagihan_barang_medis
		WHERE deleted_at IS NULL
		LIMIT $1 OFFSET $2
	`
	totalQuery := "SELECT COUNT(*) FROM tagihan_barang_medis WHERE deleted_at IS NULL"

	var total int64
	if err := r.DB.Get(&total, totalQuery); err != nil {
		return nil, 0, err
	}

	totalPage := int(math.Ceil(float64(total) / float64(size)))
	offset := (page - 1) * size

	var records []entity.Tagihan
	err := r.DB.Select(&records, query, size, offset)

	return records, totalPage, err
}

func (r *tagihanRepositoryImpl) FindById(id uuid.UUID) (entity.Tagihan, error) {
	query := `
		SELECT id, id_pengajuan, id_pemesanan, id_penerimaan, tanggal_bayar, jumlah_bayar, id_pegawai, keterangan, no_bukti, id_akun_bayar
		FROM tagihan_barang_medis
		WHERE id = $1 AND deleted_at IS NULL
	`

	var record entity.Tagihan
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *tagihanRepositoryImpl) Update(tagihan *entity.Tagihan) error {
	query := `
		UPDATE tagihan_barang_medis
		SET id_pengajuan = $2, id_pemesanan = $3, id_penerimaan = $4, tanggal_bayar = $5, jumlah_bayar = $6, id_pegawai = $7, keterangan = $8, no_bukti = $9, id_akun_bayar = $10, updated_at = $11, updater = $12
		WHERE id = $1 AND deleted_at IS NULL
	`

	_, err := r.DB.Exec(query, tagihan.Id, tagihan.IdPengajuan, tagihan.IdPemesanan, tagihan.IdPenerimaan, tagihan.Tanggal, tagihan.Jumlah, tagihan.IdPegawai, tagihan.Keterangan, tagihan.Nomor, tagihan.AkunBayar, time.Now(), tagihan.Updater)

	return err
}

func (r *tagihanRepositoryImpl) Delete(tagihan *entity.Tagihan) error {
	query := `
		UPDATE tagihan_barang_medis
		SET deleted_at = $2, updater = $3
		WHERE id = $1
	`

	_, err := r.DB.Exec(query, tagihan.Id, time.Now(), tagihan.Updater)

	return err
}
