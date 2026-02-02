package postgres

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
	"github.com/jmoiron/sqlx"
)

type penerimaanRepositoryImpl struct {
	DB *sqlx.DB
}

func NewPenerimaanRepository(db *sqlx.DB) repository.PenerimaanRepository {
	return &penerimaanRepositoryImpl{db}
}

func (r *penerimaanRepositoryImpl) Insert(penerimaan *entity.Penerimaan) error {
	query := "INSERT INTO penerimaan_barang_medis VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13)"

	_, err := r.DB.Exec(query, penerimaan.Id, penerimaan.NoFaktur, penerimaan.NoPemesanan, penerimaan.IdSupplier, penerimaan.TanggalDatang, penerimaan.TanggalFaktur, penerimaan.TanggalJatuhTempo, penerimaan.IdPegawai, penerimaan.IdRuangan, penerimaan.PajakPersen, penerimaan.PajakJumlah, penerimaan.Tagihan, penerimaan.Materai)

	return err
}

func (r *penerimaanRepositoryImpl) Find() ([]entity.Penerimaan, error) {
	query := "SELECT * FROM penerimaan_barang_medis"

	var records []entity.Penerimaan
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *penerimaanRepositoryImpl) FindById(id uuid.UUID) (entity.Penerimaan, error) {
	query := "SELECT * FROM penerimaan_barang_medis WHERE id = $1"

	var record entity.Penerimaan
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *penerimaanRepositoryImpl) Update(penerimaan *entity.Penerimaan) error {
	query := "UPDATE penerimaan_barang_medis SET no_faktur = $2, no_pemesanan = $3, id_supplier = $4, tanggal_datang = $5, tanggal_faktur = $6, tanggal_jthtempo = $7, id_pegawai = $8, id_ruangan = $9, pajak_persen = $10, pajak_jumlah = $11, tagihan = $12, materai = $13 WHERE id = $1"

	_, err := r.DB.Exec(query, penerimaan.Id, penerimaan.NoFaktur, penerimaan.NoPemesanan, penerimaan.IdSupplier, penerimaan.TanggalDatang, penerimaan.TanggalFaktur, penerimaan.TanggalJatuhTempo, penerimaan.IdPegawai, penerimaan.IdRuangan, penerimaan.PajakPersen, penerimaan.PajakJumlah, penerimaan.Tagihan, penerimaan.Materai)

	return err
}

func (r *penerimaanRepositoryImpl) Delete(penerimaan *entity.Penerimaan) error {
	query := "DELETE FROM penerimaan_barang_medis WHERE id = $1"

	_, err := r.DB.Exec(query, penerimaan.Id)

	return err
}

func (r *penerimaanRepositoryImpl) DetailInsert(detail *entity.DetailPenerimaan) error {
	query := "INSERT INTO detail_penerimaan_barang_medis VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13)"

	_, err := r.DB.Exec(query, detail.IdPenerimaan, detail.IdBarangMedis, detail.IdSatuan, detail.UbahMaster, detail.Jumlah, detail.HPesan, detail.SubtotalPerItem, detail.DiskonPersen, detail.DiskonJumlah, detail.TotalPerItem, detail.JumlahDiterima, detail.Kadaluwarsa, detail.NoBatch)

	return err
}

func (r *penerimaanRepositoryImpl) DetailFind() ([]entity.DetailPenerimaan, error) {
	query := "SELECT * FROM detail_penerimaan_barang_medis"

	var records []entity.DetailPenerimaan
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *penerimaanRepositoryImpl) DetailFindById(id uuid.UUID) ([]entity.DetailPenerimaan, error) {
	query := "SELECT * FROM detail_penerimaan_barang_medis WHERE id_penerimaan = $1"

	var records []entity.DetailPenerimaan
	err := r.DB.Select(&records, query, id)

	return records, err
}

func (r *penerimaanRepositoryImpl) DetailFindByPenerimaanBarang(penerimaan, barang uuid.UUID) (entity.DetailPenerimaan, error) {
	query := "SELECT * FROM detail_penerimaan_barang_medis WHERE id_penerimaan = $1 AND id_barang_medis = $2"

	var record entity.DetailPenerimaan
	err := r.DB.Get(&record, query, penerimaan, barang)

	return record, err
}

func (r *penerimaanRepositoryImpl) DetailUpdate(detail *entity.DetailPenerimaan) error {
	query := "UPDATE detail_penerimaan_barang_medis SET id_satuan = $3, ubah_master = $4, jumlah = $5, h_pesan = $6, subtotal_per_item = $7, diskon_persen = $8, diskon_jumlah = $9, total_per_item = $10, jumlah_diterima = $11, kadaluwarsa = $12, no_batch = $13 WHERE id_penerimaan = $1 AND id_barang_medis = $2"

	_, err := r.DB.Exec(query, detail.IdPenerimaan, detail.IdBarangMedis, detail.IdSatuan, detail.UbahMaster, detail.Jumlah, detail.HPesan, detail.SubtotalPerItem, detail.DiskonPersen, detail.DiskonJumlah, detail.TotalPerItem, detail.JumlahDiterima, detail.Kadaluwarsa, detail.NoBatch)

	return err
}

func (r *penerimaanRepositoryImpl) DetailDelete(detail *entity.DetailPenerimaan) error {
	query := "DELETE FROM detail_penerimaan_barang_medis WHERE id_penerimaan = $1 AND id_barang_medis = $2"

	_, err := r.DB.Exec(query, detail.IdPenerimaan, detail.IdBarangMedis)

	return err
}
