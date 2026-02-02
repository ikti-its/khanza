package postgres

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/mobile/internal/repository"
	"github.com/jmoiron/sqlx"
)

type tukarRepositoryImpl struct {
	DB *sqlx.DB
}

func NewTukarRepository(db *sqlx.DB) repository.TukarRepository {
	return &tukarRepositoryImpl{db}
}

func (r *tukarRepositoryImpl) Insert(tukar *entity.Tukar) error {
	query := `
		INSERT INTO tukar_jadwal
		VALUES ($1, $2, $3, $4, $5, $6, $7)
	`

	_, err := r.DB.Exec(query, tukar.Id, tukar.IdSender, tukar.IdRecipient, tukar.IdHari, tukar.IdShiftSender, tukar.IdShiftRecipient, "Menunggu")

	return err
}

func (r *tukarRepositoryImpl) FindSender(id uuid.UUID) ([]entity.Tukar, error) {
	query := `
		SELECT * FROM tukar_jadwal WHERE id_sender = $1
	`

	var records []entity.Tukar
	err := r.DB.Select(&records, query, id)

	return records, err
}

func (r *tukarRepositoryImpl) FindRecipient(id uuid.UUID) ([]entity.Tukar, error) {
	query := `
		SELECT * FROM tukar_jadwal WHERE id_recipient = $1
	`

	var records []entity.Tukar
	err := r.DB.Select(&records, query, id)

	return records, err
}

func (r *tukarRepositoryImpl) FindById(id uuid.UUID) (entity.Tukar, error) {
	query := `
		SELECT * FROM tukar_jadwal WHERE id = $1
	`

	var record entity.Tukar
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r *tukarRepositoryImpl) Update(tukar *entity.Tukar) error {
	if tukar.Status == "Diterima" {
		query := `
			UPDATE tukar_jadwal
			SET status = $2
			WHERE id = $1
		`

		senderQuery := `
			UPDATE jadwal_pegawai
			SET id_shift = $3
			WHERE id_pegawai = $1 AND id_hari = $2
		`

		recipientQuery := `
			UPDATE jadwal_pegawai
			SET id_shift = $3
			WHERE id_pegawai = $1 AND id_hari = $2
		`

		_, err := r.DB.Exec(query, tukar.Id, tukar.Status)
		_, err = r.DB.Exec(senderQuery, tukar.IdSender, tukar.IdHari, tukar.IdShiftRecipient)
		_, err = r.DB.Exec(recipientQuery, tukar.IdRecipient, tukar.IdHari, tukar.IdShiftSender)

		return err
	} else {
		query := `
			UPDATE tukar_jadwal
			SET status = $2
			WHERE id = $1
		`

		_, err := r.DB.Exec(query, tukar.Id, tukar.Status)

		return err
	}
}

func (r *tukarRepositoryImpl) Delete(tukar *entity.Tukar) error {
	query := `
		DELETE FROM tukar_jadwal
		WHERE id = $1
	`

	_, err := r.DB.Exec(query, tukar.Id)

	return err
}
