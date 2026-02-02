package postgres

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
	"github.com/jmoiron/sqlx"
)

type mutasiRepositoryImpl struct {
	DB *sqlx.DB
}

func NewMutasiRepository(db *sqlx.DB) repository.MutasiRepository {
	return &mutasiRepositoryImpl{db}
}

func (r *mutasiRepositoryImpl) Insert(mutasi *entity.Mutasi) error {
	query := "INSERT INTO mutasi_barang VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)"

	_, err := r.DB.Exec(query, mutasi.Id, mutasi.IdBarangMedis, mutasi.Jumlah, mutasi.Harga, mutasi.IdRuanganDari, mutasi.IdRuanganKe, mutasi.Tanggal, mutasi.Keterangan, mutasi.NoBatch, mutasi.NoFaktur)

	return err
}

func (r *mutasiRepositoryImpl) Find() ([]entity.Mutasi, error) {
	query := "SELECT * FROM mutasi_barang"

	var records []entity.Mutasi
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *mutasiRepositoryImpl) FindById(id uuid.UUID) (entity.Mutasi, error) {
	query := "SELECT * FROM mutasi_barang WHERE id = $1"

	var record entity.Mutasi
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *mutasiRepositoryImpl) Update(mutasi *entity.Mutasi) error {
	query := "UPDATE mutasi_barang SET id_barang_medis = $2, jumlah = $3, harga = $4, id_ruangandari = $5, id_ruanganke = $6, tanggal = $7, keterangan = $8, no_batch = $9, no_faktur = $10 WHERE id = $1"

	_, err := r.DB.Exec(query, mutasi.Id, mutasi.IdBarangMedis, mutasi.Jumlah, mutasi.Harga, mutasi.IdRuanganDari, mutasi.IdRuanganKe, mutasi.Tanggal, mutasi.Keterangan, mutasi.NoBatch, mutasi.NoFaktur)

	return err
}

func (r *mutasiRepositoryImpl) Delete(mutasi *entity.Mutasi) error {
	query := "DELETE FROM mutasi_barang WHERE id = $1"

	_, err := r.DB.Exec(query, mutasi.Id)

	return err
}
