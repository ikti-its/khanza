package postgres

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/repository"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type resepDokterRacikanRepositoryImpl struct {
	DB *sqlx.DB
}

func NewResepDokterRacikanRepository(db *sqlx.DB) repository.ResepDokterRacikanRepository {
	return &resepDokterRacikanRepositoryImpl{DB: db}
}

func (r *resepDokterRacikanRepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func (r *resepDokterRacikanRepositoryImpl) FindAll() ([]entity.ResepDokterRacikan, error) {
	query := `SELECT * FROM resep_dokter_racikan ORDER BY no_resep DESC, no_racik ASC`
	var list []entity.ResepDokterRacikan
	err := r.DB.Select(&list, query)
	return list, err
}

func (r *resepDokterRacikanRepositoryImpl) FindByNoResep(noResep string) ([]entity.ResepDokterRacikan, error) {
	query := `SELECT * FROM resep_dokter_racikan WHERE no_resep = $1 ORDER BY no_racik ASC`
	var list []entity.ResepDokterRacikan
	err := r.DB.Select(&list, query, noResep)
	return list, err
}

func (r *resepDokterRacikanRepositoryImpl) Insert(c *fiber.Ctx, p *entity.ResepDokterRacikan) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO resep_dokter_racikan (
			no_resep, no_racik, nama_racik, kd_racik, jml_dr, aturan_pakai, keterangan
		) VALUES (
			$1, $2, $3, $4, $5, $6, $7
		)
	`
	_, err = tx.Exec(query,
		p.NoResep, p.NoRacik, p.NamaRacik, p.KdRacik, p.JmlDr, p.AturanPakai, p.Keterangan,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *resepDokterRacikanRepositoryImpl) Update(c *fiber.Ctx, p *entity.ResepDokterRacikan) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		UPDATE resep_dokter_racikan SET 
			nama_racik = $3,
			kd_racik = $4,
			jml_dr = $5,
			aturan_pakai = $6,
			keterangan = $7
		WHERE no_resep = $1 AND no_racik = $2
	`
	_, err = tx.Exec(query,
		p.NoResep, p.NoRacik, p.NamaRacik, p.KdRacik, p.JmlDr, p.AturanPakai, p.Keterangan,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *resepDokterRacikanRepositoryImpl) Delete(c *fiber.Ctx, noResep, noRacik string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `DELETE FROM resep_dokter_racikan WHERE no_resep = $1 AND no_racik = $2`
	_, err = tx.Exec(query, noResep, noRacik)
	if err != nil {
		return err
	}

	return tx.Commit()
}
