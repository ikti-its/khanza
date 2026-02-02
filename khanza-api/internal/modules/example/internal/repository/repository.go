package repository

import (
	"github.com/jmoiron/sqlx"
	"github.com/ikti-its/khanza-api/internal/modules/example/internal/entity"
)

type Repository interface {
	FindAll() ([]entity.Entity, error)
	FindById(id string) (entity.Entity, error)
	Insert(entity *entity.Entity) error
	Update(entity *entity.Entity) error
	Delete(id string) error
}

type RepositoryImpl struct {
	DB *sqlx.DB
}

func NewRepository(db *sqlx.DB) Repository {
	return &RepositoryImpl{DB: db}
}

func (r *RepositoryImpl) FindAll() ([]entity.Entity, error) {
	query := `
		SELECT * FROM kamar ORDER BY nomor_bed DESC
	`
	var records []entity.Entity
	err := r.DB.Select(&records, query)
	return records, err
}

func (r *RepositoryImpl) FindById(id string) (entity.Entity, error) {
	query := `SELECT * FROM kamar WHERE nomor_bed = $1`

	var record entity.Entity
	err := r.DB.Get(&record, query, id)
	return record, err
}

func (r *RepositoryImpl) Insert(entity *entity.Entity) error {
	query := `
		INSERT INTO kamar (
			nomor_bed, kode_kamar, nama_kamar, kelas, tarif_kamar, status_kamar
		) VALUES (
			$1, $2, $3, $4, $5, $6
		)
	`
	_, err := r.DB.Exec(query,
		entity.NomorBed,    // Corresponds to nomor_bed
		entity.KodeKamar,   // Corresponds to kode_kamar
		entity.NamaKamar,   // Corresponds to nama_kamar
		entity.Kelas,       // Corresponds to kelas
		entity.TarifKamar,  // Corresponds to tarif_kamar
		entity.StatusKamar, // Corresponds to status_kamar
	)
	return err
}

func (r *RepositoryImpl) Update(entity *entity.Entity) error {
	query := `
		UPDATE kamar SET 
			kode_kamar = $2, nama_kamar = $3, kelas = $4, tarif_kamar = $5, status_kamar = $6
		WHERE nomor_bed = $1
	`
	_, err := r.DB.Exec(query,
		entity.NomorBed,    // Corresponds to nomor_bed
		entity.KodeKamar,   // Corresponds to kode_kamar
		entity.NamaKamar,   // Corresponds to nama_kamar
		entity.Kelas,       // Corresponds to kelas
		entity.TarifKamar,  // Corresponds to tarif_kamar
		entity.StatusKamar, // Corresponds to status_kamar
	)
	return err
}

func (r *RepositoryImpl) Delete(id string) error {
	query := `
		DELETE FROM kamar WHERE nomor_bed = $1
	`
	_, err := r.DB.Exec(query, id)
	return err
}

func (r *RepositoryImpl) GetAvailableRooms() ([]entity.Entity, error) {
	query := `SELECT * FROM kamar WHERE status_kamar = 'available'`
	var results []entity.Entity
	err := r.DB.Select(&results, query)
	return results, err
}

func (r *RepositoryImpl) UpdateStatusKamar(nomorBed, status string) error {
	query := `UPDATE kamar SET status_kamar = $1 WHERE nomor_bed = $2`
	_, err := r.DB.Exec(query, status, nomorBed)
	return err
}

func (r *RepositoryImpl) GetDistinctKelas() ([]string, error) {
	var kelasList []string
	query := "SELECT DISTINCT kelas FROM kamar"

	err := r.DB.Select(&kelasList, query)
	if err != nil {
		return nil, err
	}

	return kelasList, nil
}
