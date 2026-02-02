package postgres

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
	"github.com/jmoiron/sqlx"
)

type transaksiRepositoryImpl struct {
	DB *sqlx.DB
}

func NewTransaksiRepository(db *sqlx.DB) repository.TransaksiRepository {
	return &transaksiRepositoryImpl{db}
}

func (r *transaksiRepositoryImpl) Insert(transaksi *entity.Transaksi) error {
	query := "INSERT INTO transaksi_keluar_barang_medis VALUES ($1, $2, $3, $4, $5, $6)"

	_, err := r.DB.Exec(query, transaksi.Id, transaksi.IdStokKeluar, transaksi.IdBarangMedis, transaksi.NoBatch, transaksi.NoFaktur, transaksi.JumlahKeluar)

	return err
}

func (r *transaksiRepositoryImpl) Find() ([]entity.Transaksi, error) {
	query := "SELECT * FROM transaksi_keluar_barang_medis"

	var records []entity.Transaksi
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *transaksiRepositoryImpl) FindById(id uuid.UUID) (entity.Transaksi, error) {
	query := "SELECT * FROM transaksi_keluar_barang_medis WHERE id = $1"

	var record entity.Transaksi
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *transaksiRepositoryImpl) FindByStok(id uuid.UUID) (entity.Transaksi, error) {
	query := "SELECT * FROM transaksi_keluar_barang_medis WHERE id_stok_keluar = $1"

	var record entity.Transaksi
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *transaksiRepositoryImpl) Update(transaksi *entity.Transaksi) error {
	query := "UPDATE transaksi_keluar_barang_medis SET id_stok_keluar = $2, id_barang_medis = $3, no_batch = $4, no_faktur = $5, jumlah_keluar = $6 WHERE id = $1"

	_, err := r.DB.Exec(query, transaksi.Id, transaksi.IdStokKeluar, transaksi.IdBarangMedis, transaksi.NoBatch, transaksi.NoFaktur, transaksi.JumlahKeluar)

	return err
}

func (r *transaksiRepositoryImpl) Delete(transaksi *entity.Transaksi) error {
	query := "DELETE FROM transaksi_keluar_barang_medis WHERE id = $1"

	_, err := r.DB.Exec(query, transaksi.Id)

	return err
}
