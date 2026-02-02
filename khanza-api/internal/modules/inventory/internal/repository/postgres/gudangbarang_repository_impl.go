package postgres

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
	"github.com/jmoiron/sqlx"
)

type gudangbarangRepositoryImpl struct {
	DB *sqlx.DB
}

func NewGudangBarangRepository(db *sqlx.DB) repository.GudangBarangRepository {
	return &gudangbarangRepositoryImpl{db}
}

func (r *gudangbarangRepositoryImpl) Insert(gudangbarang *entity.GudangBarang) error {
	query := "INSERT INTO gudang_barang VALUES ($1, $2, $3, $4, $5, $6)"

	_, err := r.DB.Exec(query, gudangbarang.Id, gudangbarang.IdBarangMedis, gudangbarang.IdRuangan, gudangbarang.Stok, gudangbarang.NoBatch, gudangbarang.NoFaktur)

	return err
}

func (r *gudangbarangRepositoryImpl) Find() ([]entity.GudangBarang, error) {
	query := "SELECT * FROM gudang_barang"

	var records []entity.GudangBarang
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *gudangbarangRepositoryImpl) FindByIdMedis(id uuid.UUID) ([]entity.GudangBarang, error) {
	query := "SELECT * FROM gudang_barang WHERE id_barang_medis = $1"

	var records []entity.GudangBarang
	err := r.DB.Select(&records, query, id)

	return records, err
}

func (r *gudangbarangRepositoryImpl) FindById(id uuid.UUID) (entity.GudangBarang, error) {
	query := "SELECT * FROM gudang_barang WHERE id = $1"

	var record entity.GudangBarang
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *gudangbarangRepositoryImpl) Update(gudangbarang *entity.GudangBarang) error {
	query := "UPDATE gudang_barang SET id_barang_medis = $2, id_ruangan = $3, stok = $4, no_batch = $5, no_faktur = $6 WHERE id = $1"

	_, err := r.DB.Exec(query, gudangbarang.Id, gudangbarang.IdBarangMedis, gudangbarang.IdRuangan, gudangbarang.Stok, gudangbarang.NoBatch, gudangbarang.NoFaktur)

	return err
}

func (r *gudangbarangRepositoryImpl) Delete(gudangbarang *entity.GudangBarang) error {
	query := "DELETE FROM gudang_barang WHERE id = $1"

	_, err := r.DB.Exec(query, gudangbarang.Id)

	return err
}

func (r *gudangbarangRepositoryImpl) FindByKodeBarang(kode string) (*entity.GudangBarang, error) {
	var barang entity.GudangBarang
	query := `SELECT * FROM sik.gudang_barang WHERE id_barang_medis = $1 LIMIT 1`
	err := r.DB.Get(&barang, query, kode)
	if err != nil {
		return nil, err
	}
	return &barang, nil
}
