package postgres

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
	"github.com/jmoiron/sqlx"
)

type stokKeluarRepositoryImpl struct {
	DB *sqlx.DB
}

func NewStokKeluarRepository(db *sqlx.DB) repository.StokKeluarRepository {
	return &stokKeluarRepositoryImpl{db}
}

func (r *stokKeluarRepositoryImpl) Insert(stokKeluar *entity.StokKeluar) error {
	query := "INSERT INTO stok_keluar_barang_medis VALUES ($1, $2, $3, $4, $5, $6)"

	_, err := r.DB.Exec(query, stokKeluar.Id, stokKeluar.NoKeluar, stokKeluar.IdPegawai, stokKeluar.Tanggal, stokKeluar.IdRuangan, stokKeluar.Keterangan)

	return err
}

func (r *stokKeluarRepositoryImpl) Find() ([]entity.StokKeluar, error) {
	query := "SELECT * FROM stok_keluar_barang_medis"

	var records []entity.StokKeluar
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *stokKeluarRepositoryImpl) FindById(id uuid.UUID) (entity.StokKeluar, error) {
	query := "SELECT * FROM stok_keluar_barang_medis WHERE id = $1"

	var record entity.StokKeluar
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *stokKeluarRepositoryImpl) Update(stokKeluar *entity.StokKeluar) error {
	query := "UPDATE stok_keluar_barang_medis SET no_keluar = $2, id_pegawai = $3, tanggal_stok_keluar = $4, id_ruangan = $5, keterangan = $6 WHERE id = $1"

	_, err := r.DB.Exec(query, stokKeluar.Id, stokKeluar.NoKeluar, stokKeluar.IdPegawai, stokKeluar.Tanggal, stokKeluar.IdRuangan, stokKeluar.Keterangan)

	return err
}

func (r *stokKeluarRepositoryImpl) Delete(stokKeluar *entity.StokKeluar) error {
	query := "DELETE FROM sik.stok_keluar_barang_medis WHERE id = $1"

	_, err := r.DB.Exec(query, stokKeluar.Id)

	return err
}
