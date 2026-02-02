package postgres

import (
	"time"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/repository"
	"github.com/jmoiron/sqlx"
)

type profileRepositoryImpl struct {
	DB *sqlx.DB
}

func NewProfileRepository(db *sqlx.DB) repository.ProfileRepository {
	return &profileRepositoryImpl{db}
}

func (r *profileRepositoryImpl) FindById(id uuid.UUID) (entity.Profile, error) {
	query := `
		SELECT a.id AS akun, a.foto, a.email, p.telepon, al.alamat, al.alamat_lat, al.alamat_lon
		FROM akun a
		JOIN alamat al ON a.id = al.id_akun
		JOIN pegawai p ON a.id = p.id_akun
		WHERE a.id = $1 AND p.id_status_aktif = 'A' AND a.deleted_at IS NULL
	`

	var record entity.Profile
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *profileRepositoryImpl) Update(profile *entity.Profile) error {
	akunQuery := `
		UPDATE akun
		SET foto = $2, email = $3, password = $4, updated_at = $5, updater = $6
		WHERE id = $1
	`

	pegawaiQuery := `
		UPDATE pegawai
		SET telepon = $2, updated_at = $3, updater = $4
		WHERE id_akun = $1
	`

	alamatQuery := `
		UPDATE alamat
		SET alamat = $2, alamat_lat = $3, alamat_lon = $4, updated_at = $5, updater = $6
		WHERE id_akun = $1
	`

	_, err := r.DB.Exec(akunQuery, profile.Akun, profile.Foto, profile.Email, profile.Password, time.Now(), profile.Updater)
	_, err = r.DB.Exec(pegawaiQuery, profile.Akun, profile.Telepon, time.Now(), profile.Updater)
	_, err = r.DB.Exec(alamatQuery, profile.Akun, profile.Alamat, profile.AlamatLat, profile.AlamatLon, time.Now(), profile.Updater)

	return err
}
