package postgres

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
	"github.com/jmoiron/sqlx"
)

type batchRepositoryImpl struct {
	DB *sqlx.DB
}

func NewBatchRepository(db *sqlx.DB) repository.BatchRepository {
	return &batchRepositoryImpl{db}
}

func (r *batchRepositoryImpl) Insert(batch *entity.Batch) error {
	query := "INSERT INTO data_batch VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16, $17, $18, $19, $20)"

	_, err := r.DB.Exec(query, batch.NoBatch, batch.NoFaktur, batch.IdBarangMedis, batch.TanggalDatang, batch.Kadaluwarsa, batch.Asal, batch.HDasar, batch.HBeli, batch.HRalan, batch.HKelasI, batch.HKelasII, batch.HKelasIII, batch.HUtama, batch.HVIP, batch.HVVIP, batch.HBeliLuar, batch.HJualBebas, batch.HKaryawan, batch.JumlahBeli, batch.Sisa)

	return err
}

func (r *batchRepositoryImpl) Find() ([]entity.Batch, error) {
	query := "SELECT * FROM data_batch"

	var records []entity.Batch
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *batchRepositoryImpl) FindByBatch(id string) ([]entity.Batch, error) {
	query := "SELECT * FROM data_batch WHERE no_batch = $1"

	var records []entity.Batch
	err := r.DB.Select(&records, query, id)

	return records, err
}

func (r *batchRepositoryImpl) FindById(batch, faktur string, barang uuid.UUID) (entity.Batch, error) {
	query := "SELECT * FROM data_batch WHERE no_batch = $1 AND no_faktur = $2 AND id_barang_medis = $3"

	var record entity.Batch
	err := r.DB.Get(&record, query, batch, faktur, barang)

	return record, err
}

func (r *batchRepositoryImpl) Update(batch *entity.Batch) error {
	query := "UPDATE data_batch SET tanggal_datang = $4, kadaluwarsa = $5, asal = $6, h_dasar = $7, h_beli = $8, h_ralan = $9, h_kelas1 = $10, h_kelas2 = $11, h_kelas3 = $12, h_utama = $13, h_vip = $14, h_vvip = $15, h_beliluar = $16, h_jualbebas = $17, h_karyawan = $18, jumlahbeli = $19, sisa = $20 WHERE no_batch = $1 AND no_faktur = $2 AND id_barang_medis = $3"

	_, err := r.DB.Exec(query, batch.NoBatch, batch.NoFaktur, batch.IdBarangMedis, batch.TanggalDatang, batch.Kadaluwarsa, batch.Asal, batch.HDasar, batch.HBeli, batch.HRalan, batch.HKelasI, batch.HKelasII, batch.HKelasIII, batch.HUtama, batch.HVIP, batch.HVVIP, batch.HBeliLuar, batch.HJualBebas, batch.HKaryawan, batch.JumlahBeli, batch.Sisa)

	return err
}

func (r *batchRepositoryImpl) Delete(batch *entity.Batch) error {
	query := "DELETE FROM data_batch WHERE no_batch = $1 AND no_faktur = $2 AND id_barang_medis = $3"

	_, err := r.DB.Exec(query, batch.NoBatch, batch.NoFaktur, batch.IdBarangMedis)

	return err
}
