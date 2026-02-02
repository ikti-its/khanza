package postgres

import (
	"github.com/ikti-its/khanza-api/internal/modules/dokter/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/dokter/internal/repository"
	"github.com/jmoiron/sqlx"
)

type dokterRepositoryImpl struct {
	DB *sqlx.DB
}

func NewDokterRepository(db *sqlx.DB) repository.DokterRepository {
	return &dokterRepositoryImpl{DB: db}
}

func (r *dokterRepositoryImpl) FindByKode(kode string) (*entity.Dokter, error) {
	dokter := &entity.Dokter{}
	query := `
		SELECT 
			kode_dokter, nama_dokter, jenis_kelamin, 
			alamat_tinggal, no_telp, spesialis, izin_praktik
		FROM dokter 
		WHERE kode_dokter = $1
	`
	err := r.DB.Get(dokter, query, kode)
	if err != nil {
		return nil, err
	}
	return dokter, nil
}

func (r *dokterRepositoryImpl) GetAll() ([]entity.Dokter, error) {
	var dokters []entity.Dokter
	query := `SELECT * FROM dokter`
	err := r.DB.Select(&dokters, query)
	return dokters, err
}
