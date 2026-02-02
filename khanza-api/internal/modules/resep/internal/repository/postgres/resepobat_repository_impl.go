package postgres

import (
	"fmt"
	"log"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/resep/internal/repository"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type resepObatRepositoryImpl struct {
	DB *sqlx.DB
}

func NewResepObatRepository(db *sqlx.DB) repository.ResepObatRepository {
	return &resepObatRepositoryImpl{DB: db}
}

func (r *resepObatRepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func (r *resepObatRepositoryImpl) FindAll() ([]entity.ResepObat, error) {
	query := `SELECT * FROM resep_obat ORDER BY no_resep DESC `
	var list []entity.ResepObat
	err := r.DB.Select(&list, query)
	return list, err
}

func (r *resepObatRepositoryImpl) FindByNoResep(noResep string) (*entity.ResepObat, error) {
	query := `SELECT * FROM resep_obat WHERE no_resep = $1`
	var resep entity.ResepObat
	err := r.DB.Get(&resep, query, noResep)
	if err != nil {
		return nil, err
	}
	return &resep, nil
}

func (r *resepObatRepositoryImpl) Insert(c *fiber.Ctx, p *entity.ResepObat) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO resep_obat (
			no_resep, tgl_perawatan, jam, no_rawat, kd_dokter,
			tgl_peresepan, jam_peresepan, status, tgl_penyerahan, jam_penyerahan, validasi
		) VALUES (
			$1, $2, $3, $4, $5,
			$6, $7, $8, $9, $10, $11
		)
	`
	_, err = tx.Exec(query,
		p.NoResep, p.TglPerawatan, p.Jam, p.NoRawat, p.KdDokter,
		p.TglPeresepan, p.JamPeresepan, p.Status, p.TglPenyerahan, p.JamPenyerahan, p.Validasi,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *resepObatRepositoryImpl) Update(c *fiber.Ctx, p *entity.ResepObat) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		UPDATE resep_obat SET 
			tgl_perawatan = $2,
			jam = $3,
			no_rawat = $4,
			kd_dokter = $5,
			tgl_peresepan = $6,
			jam_peresepan = $7,
			status = $8,
			tgl_penyerahan = $9,
			jam_penyerahan = $10,
			validasi = $11
		WHERE no_resep = $1
	`
	_, err = tx.Exec(query,
		p.NoResep, p.TglPerawatan, p.Jam, p.NoRawat, p.KdDokter,
		p.TglPeresepan, p.JamPeresepan, p.Status, p.TglPenyerahan, p.JamPenyerahan, p.Validasi,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *resepObatRepositoryImpl) Delete(c *fiber.Ctx, noResep string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `DELETE FROM resep_obat WHERE no_resep = $1`
	_, err = tx.Exec(query, noResep)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *resepObatRepositoryImpl) GetByNomorRawat(nomorRawat string) ([]entity.ResepObat, error) {
	var resepObats []entity.ResepObat
	query := `SELECT * FROM sik.resep_obat WHERE no_rawat = $1`
	err := r.DB.Select(&resepObats, query, nomorRawat)
	return resepObats, err
}

func (r *resepObatRepositoryImpl) UpdateValidasi(c *fiber.Ctx, noResep string, validasi bool) error {
	log.Printf("🧪 Update resep_obat: noResep=%s, validasi=%v", noResep, validasi)

	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `UPDATE resep_obat SET validasi = $1 WHERE no_resep = $2`
	res, err := tx.Exec(query, validasi, noResep)
	if err != nil {
		log.Printf("❌ DB Exec Error: %v", err)
		return err
	}

	rows, _ := res.RowsAffected()
	if rows == 0 {
		log.Printf("⚠️ No matching resep found: %s", noResep)
		return fmt.Errorf("no resep found with ID %s", noResep)
	}

	return tx.Commit()
}
