package postgres

import (
	"fmt"
	"log"
	"math"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/ambulans/internal/entity"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type AmbulansRepository interface {
	Insert(ambulans *entity.Ambulans) error
	Find() ([]entity.Ambulans, error)
	FindAll() ([]entity.Ambulans, error)
	FindByNoAmbulans(noAmbulans string) (entity.Ambulans, error)
	Update(c *fiber.Ctx, ambulans *entity.Ambulans) error
	Delete(c *fiber.Ctx, noAmbulans string) error

	InsertAmbulansRequest(noAmbulans string) error
	FindPendingRequests() ([]entity.Ambulans, error)
	UpdateAmbulansStatus(noAmbulans string, newStatus string) error
	SetPending(noAmbulans string) error
	InsertWithContext(c *fiber.Ctx, ambulans *entity.Ambulans) error
	FindPaginated(page, size int) ([]entity.Ambulans, int, error)
}

type ambulansRepositoryImpl struct {
	DB *sqlx.DB
}

func NewAmbulansRepository(db *sqlx.DB) AmbulansRepository {
	return &ambulansRepositoryImpl{DB: db}
}

func (r *ambulansRepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
	userIDRaw := c.Locals("user_id")
	userID, ok := userIDRaw.(string)
	if !ok {
		return fmt.Errorf("invalid user_id type: %T", userIDRaw)
	}
	safeUserID := pq.QuoteLiteral(userID)
	_, err := tx.Exec(fmt.Sprintf(`SET LOCAL my.user_id = %s`, safeUserID))

	ip_address_Raw := c.Locals("ip_address")
	ip_address, ok2 := ip_address_Raw.(string)
	if !ok2 {
		return fmt.Errorf("invalid ip_address type: %T", ip_address_Raw)
	}
	safe_ip_address := pq.QuoteLiteral(ip_address)
	_, err = tx.Exec(fmt.Sprintf(`SET LOCAL my.ip_address = %s`, safe_ip_address))

	mac_address_Raw := c.Locals("mac_address")
	mac_address, ok2 := mac_address_Raw.(string)
	if !ok2 {
		return fmt.Errorf("invalid mac_address type: %T", mac_address_Raw)
	}
	safe_mac_address := pq.QuoteLiteral(mac_address)
	_, err = tx.Exec(fmt.Sprintf(`SET LOCAL my.mac_address = %s`, safe_mac_address))

	_, err = tx.Exec(fmt.Sprintf(`SET LOCAL my.encryption_key = %s`, c.Locals("encryption_key")))

	return err
}

func (r *ambulansRepositoryImpl) InsertWithContext(c *fiber.Ctx, ambulans *entity.Ambulans) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO sik.ambulans (
			no_ambulans, status, supir
		) VALUES (
			$1, $2, $3
		)
	`
	_, err = tx.Exec(query, ambulans.NoAmbulans, ambulans.Status, ambulans.Supir)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *ambulansRepositoryImpl) Insert(ambulans *entity.Ambulans) error {
	query := `
		INSERT INTO ambulans (
			no_ambulans, status, supir
		) VALUES (
			$1, $2, $3
		)
	`
	_, err := r.DB.Exec(query,
		ambulans.NoAmbulans,
		ambulans.Status,
		ambulans.Supir,
	)
	return err
}

func (r *ambulansRepositoryImpl) Find() ([]entity.Ambulans, error) {
	query := `SELECT * FROM ambulans ORDER BY no_ambulans DESC`
	var records []entity.Ambulans
	err := r.DB.Select(&records, query)
	return records, err
}

func (r *ambulansRepositoryImpl) FindAll() ([]entity.Ambulans, error) {
	query := `SELECT * FROM ambulans ORDER BY no_ambulans DESC`
	var records []entity.Ambulans
	err := r.DB.Select(&records, query)
	return records, err
}

func (r *ambulansRepositoryImpl) FindByNoAmbulans(noAmbulans string) (entity.Ambulans, error) {
	query := `SELECT * FROM ambulans WHERE no_ambulans = $1`
	var record entity.Ambulans
	err := r.DB.Get(&record, query, noAmbulans)
	return record, err
}

func (r *ambulansRepositoryImpl) Update(c *fiber.Ctx, ambulans *entity.Ambulans) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		log.Printf("❌ Failed to begin transaction: %v", err)
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		log.Printf("❌ setUserAuditContext failed: %v", err)
		return err
	}

	log.Printf("🛠️  Updating ambulans: no=%s, status=%s, supir=%s", ambulans.NoAmbulans, ambulans.Status, ambulans.Supir)

	query := `
		UPDATE ambulans SET 
			status = $2, supir = $3
		WHERE no_ambulans = $1
	`
	_, err = tx.Exec(query,
		ambulans.NoAmbulans,
		ambulans.Status,
		ambulans.Supir,
	)
	if err != nil {
		log.Printf("❌ Failed to execute update query: %v", err)
		return err
	}

	if err := tx.Commit(); err != nil {
		log.Printf("❌ Commit failed: %v", err)
		return err
	}

	log.Printf("✅ Successfully updated ambulans %s", ambulans.NoAmbulans)
	return nil
}

func (r *ambulansRepositoryImpl) Delete(c *fiber.Ctx, noAmbulans string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `DELETE FROM ambulans WHERE no_ambulans = $1`
	_, err = tx.Exec(query, noAmbulans)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *ambulansRepositoryImpl) InsertAmbulansRequest(noAmbulans string) error {
	query := `INSERT INTO ambulans (no_ambulans, status) VALUES ($1, 'available')`
	_, err := r.DB.Exec(query, noAmbulans)
	return err
}

func (r *ambulansRepositoryImpl) FindPendingRequests() ([]entity.Ambulans, error) {
	query := `SELECT * FROM ambulans`
	var records []entity.Ambulans
	err := r.DB.Select(&records, query)
	return records, err
}

func (r *ambulansRepositoryImpl) UpdateAmbulansStatusWithContext(c *fiber.Ctx, noAmbulans string, newStatus string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `UPDATE ambulans SET status = $1 WHERE no_ambulans = $2`
	_, err = tx.Exec(query, newStatus, noAmbulans)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *ambulansRepositoryImpl) UpdateAmbulansStatus(noAmbulans string, newStatus string) error {
	query := `UPDATE ambulans SET status = $1 WHERE no_ambulans = $2`
	_, err := r.DB.Exec(query, newStatus, noAmbulans)
	return err
}

func (r *ambulansRepositoryImpl) SetPending(noAmbulans string) error {
	query := `UPDATE ambulans SET status = 'pending' WHERE no_ambulans = $1`
	_, err := r.DB.Exec(query, noAmbulans)
	return err
}

func (r *ambulansRepositoryImpl) UpdateStatus(noAmbulans string, status string) (int64, error) {
	result, err := r.DB.Exec(`UPDATE ambulans SET status = $1 WHERE no_ambulans = $2`, status, noAmbulans)
	if err != nil {
		return 0, err
	}
	return result.RowsAffected()
}

func (r *ambulansRepositoryImpl) FindPaginated(page, size int) ([]entity.Ambulans, int, error) {
	offset := (page - 1) * size

	var total int
	err := r.DB.Get(&total, "SELECT COUNT(*) FROM sik.ambulans")
	if err != nil {
		return nil, 0, err
	}

	var list []entity.Ambulans
	err = r.DB.Select(&list, `
		SELECT * FROM sik.ambulans
		ORDER BY no_ambulans
		LIMIT $1 OFFSET $2
	`, size, offset)
	if err != nil {
		return nil, 0, err
	}

	totalPages := int(math.Ceil(float64(total) / float64(size)))
	return list, totalPages, nil
}
