package repository

import (
	"github.com/jmoiron/sqlx"
	"github.com/ikti-its/khanza-api/internal/modules/instansi/internal/entity"
)

type Repository interface {
	FindAll() ([]entity.Entity, error)
	FindById(id string) (entity.Entity, error)
	Insert(data *entity.Entity) error
	Update(data *entity.Entity) error
	Delete(id string) error
}

type RepositoryImpl struct {
	DB *sqlx.DB
}

func NewRepository(db *sqlx.DB) Repository {
	return &RepositoryImpl{DB: db}
}

func (r *RepositoryImpl) FindAll() ([]entity.Entity, error) {
	query := `SELECT * FROM sik.data_instansi ORDER BY kode_instansi ASC`

	var records []entity.Entity
	err := r.DB.Select(&records, query)
	return records, err
}

func (r *RepositoryImpl) FindById(id string) (entity.Entity, error) {
	query := `SELECT * FROM sik.data_instansi WHERE kode_instansi = $1`

	var record entity.Entity
	err := r.DB.Get(&record, query, id)
	return record, err
}

func (r *RepositoryImpl) Insert(data *entity.Entity) error {
	query := `
		INSERT INTO sik.data_instansi (
			kode_instansi, nama_instansi, alamat_instansi, kota, no_telp
		) VALUES (
			$1, $2, $3, $4, $5
		)
	`
	_, err := r.DB.Exec(query,
		data.KodeInstansi,
		data.NamaInstansi,
		data.AlamatInstansi,
		data.Kota,
		data.NoTelp,
	)
	return err
}

func (r *RepositoryImpl) Update(data *entity.Entity) error {
	query := `
		UPDATE sik.data_instansi SET
			nama_instansi = $2,
			alamat_instansi = $3,
			kota = $4,
			no_telp = $5
		WHERE kode_instansi = $1
	`
	_, err := r.DB.Exec(query,
		data.KodeInstansi,
		data.NamaInstansi,
		data.AlamatInstansi,
		data.Kota,
		data.NoTelp,
	)
	return err
}

func (r *RepositoryImpl) Delete(id string) error {
	query := `DELETE FROM sik.data_instansi WHERE kode_instansi = $1`
	_, err := r.DB.Exec(query, id)
	return err
}
