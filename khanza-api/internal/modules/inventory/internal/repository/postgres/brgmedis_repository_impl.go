package postgres

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/inventory/internal/repository"
	"github.com/jmoiron/sqlx"
)

type brgmedisRepositoryImpl struct {
	DB *sqlx.DB
}

func NewBrgmedisRepository(db *sqlx.DB) repository.BrgmedisRepository {
	return &brgmedisRepositoryImpl{db}
}

func (r *brgmedisRepositoryImpl) Insert(brgmedis *entity.Brgmedis) error {
	query := "INSERT INTO barang_medis VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16, $17, $18, $19, $20, $21, $22, $23, $24, $25, $26)"

	_, err := r.DB.Exec(query, brgmedis.Id, brgmedis.KodeBarang, brgmedis.Kandungan, brgmedis.IdIndustri, brgmedis.Nama, brgmedis.IdSatBesar, brgmedis.IdSatuan, brgmedis.HDasar, brgmedis.HBeli, brgmedis.HRalan, brgmedis.HKelasI, brgmedis.HKelasII, brgmedis.HKelasIII, brgmedis.HUtama, brgmedis.HVIP, brgmedis.HVVIP, brgmedis.HBeliLuar, brgmedis.HJualBebas, brgmedis.HKaryawan, brgmedis.StokMinimum, brgmedis.IdJenis, brgmedis.Isi, brgmedis.Kapasitas, brgmedis.Kadaluwarsa, brgmedis.IdKategori, brgmedis.IdGolongan)

	return err
}

func (r *brgmedisRepositoryImpl) Find() ([]entity.Brgmedis, error) {
	query := "SELECT * FROM barang_medis"

	var records []entity.Brgmedis
	err := r.DB.Select(&records, query)

	return records, err
}

func (r *brgmedisRepositoryImpl) FindById(id uuid.UUID) (entity.Brgmedis, error) {
	query := "SELECT * FROM barang_medis WHERE id = $1"

	var record entity.Brgmedis
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *brgmedisRepositoryImpl) Update(brgmedis *entity.Brgmedis) error {
	query := "UPDATE barang_medis SET kode_barang = $2, kandungan = $3, id_industri = $4, nama = $5, id_satbesar = $6, id_satuan = $7, h_dasar = $8, h_beli = $9, h_ralan = $10, h_kelas1 = $11, h_kelas2 = $12, h_kelas3 = $13, h_utama = $14, h_vip = $15, h_vvip = $16, h_beliluar = $17, h_jualbebas = $18, h_karyawan = $19, stok_minimum = $20, id_jenis = $21, isi = $22, kapasitas = $23, kadaluwarsa = $24, id_kategori = $25, id_golongan = $26 WHERE id = $1"

	_, err := r.DB.Exec(query, brgmedis.Id, brgmedis.KodeBarang, brgmedis.Kandungan, brgmedis.IdIndustri, brgmedis.Nama, brgmedis.IdSatBesar, brgmedis.IdSatuan, brgmedis.HDasar, brgmedis.HBeli, brgmedis.HRalan, brgmedis.HKelasI, brgmedis.HKelasII, brgmedis.HKelasIII, brgmedis.HUtama, brgmedis.HVIP, brgmedis.HVVIP, brgmedis.HBeliLuar, brgmedis.HJualBebas, brgmedis.HKaryawan, brgmedis.StokMinimum, brgmedis.IdJenis, brgmedis.Isi, brgmedis.Kapasitas, brgmedis.Kadaluwarsa, brgmedis.IdKategori, brgmedis.IdGolongan)

	return err
}

func (r *brgmedisRepositoryImpl) Delete(brgmedis *entity.Brgmedis) error {
	query := "DELETE FROM barang_medis WHERE id = $1"

	_, err := r.DB.Exec(query, brgmedis.Id)

	return err
}
