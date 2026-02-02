package postgres

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/repository"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type resepDokterRepositoryImpl struct {
	DB *sqlx.DB
}

func NewResepDokterRepository(db *sqlx.DB) repository.ResepDokterRepository {
	return &resepDokterRepositoryImpl{DB: db}
}

func (r *resepDokterRepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func (r *resepDokterRepositoryImpl) FindAll() ([]entity.ResepDokter, error) {
	query := `SELECT * FROM resep_dokter ORDER BY no_resep DESC`
	var list []entity.ResepDokter
	err := r.DB.Select(&list, query)
	return list, err
}

func (r *resepDokterRepositoryImpl) FindByNoResep(noResep string) ([]entity.ResepDokter, error) {
	query := `SELECT * FROM resep_dokter WHERE no_resep = $1 ORDER BY kode_barang ASC`
	var list []entity.ResepDokter
	err := r.DB.Select(&list, query, noResep)
	return list, err
}

func (r *resepDokterRepositoryImpl) Insert(c *fiber.Ctx, p *entity.ResepDokter) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO resep_dokter (
			no_resep, kode_barang, jumlah, aturan_pakai
		) VALUES (
			$1, $2, $3, $4
		)
	`
	_, err = tx.Exec(query, p.NoResep, p.KodeBarang, p.Jumlah, p.AturanPakai)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *resepDokterRepositoryImpl) Update(c *fiber.Ctx, p *entity.ResepDokter) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		UPDATE resep_dokter SET 
			jumlah = $3, aturan_pakai = $4
		WHERE no_resep = $1 AND kode_barang = $2
	`
	_, err = tx.Exec(query, p.NoResep, p.KodeBarang, p.Jumlah, p.AturanPakai)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *resepDokterRepositoryImpl) Delete(c *fiber.Ctx, noResep, kodeBarang string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `DELETE FROM resep_dokter WHERE no_resep = $1 AND kode_barang = $2`
	_, err = tx.Exec(query, noResep, kodeBarang)
	if err != nil {
		return err
	}

	return tx.Commit()
}
