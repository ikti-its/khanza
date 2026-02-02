package postgres

import (
	"database/sql"
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/repository"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type resepPulangRepositoryImpl struct {
	DB *sqlx.DB
}

func NewResepPulangRepository(db *sqlx.DB) repository.ResepPulangRepository {
	return &resepPulangRepositoryImpl{DB: db}
}

func (r *resepPulangRepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func (r *resepPulangRepositoryImpl) FindAll() ([]entity.ResepPulang, error) {
	query := `SELECT * FROM resep_pulang ORDER BY tanggal DESC, jam DESC`
	var list []entity.ResepPulang
	err := r.DB.Select(&list, query)
	return list, err
}

func (r *resepPulangRepositoryImpl) FindByNoRawat(noRawat string) ([]entity.ResepPulang, error) {
	query := `SELECT * FROM resep_pulang WHERE no_rawat = $1 ORDER BY tanggal DESC, jam DESC`
	var list []entity.ResepPulang
	err := r.DB.Select(&list, query, noRawat)
	return list, err
}

func (r *resepPulangRepositoryImpl) FindByCompositeKey(noRawat, kodeBrng, tanggal, jam string) (*entity.ResepPulang, error) {
	var data entity.ResepPulang
	query := `
		SELECT * FROM resep_pulang 
		WHERE no_rawat = $1 AND kode_brng = $2 AND tanggal = $3 AND jam = $4
	`
	err := r.DB.Get(&data, query, noRawat, kodeBrng, tanggal, jam)
	if err != nil {
		if err == sql.ErrNoRows {
			return nil, nil // ❗ Data not found, not a fatal error
		}
		return nil, err // ❗ Fatal database error
	}
	return &data, nil
}

func (r *resepPulangRepositoryImpl) Insert(c *fiber.Ctx, p *entity.ResepPulang) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO resep_pulang (
			no_rawat, kode_brng, jml_barang, harga, total,
			dosis, tanggal, jam, kd_bangsal, no_batch, no_faktur
		) VALUES (
			$1, $2, $3, $4, $5,
			$6, $7, $8, $9, $10, $11
		)
	`
	_, err = tx.Exec(query,
		p.NoRawat, p.KodeBrng, p.JmlBarang, p.Harga, p.Total,
		p.Dosis, p.Tanggal, p.Jam, p.KdBangsal, p.NoBatch, p.NoFaktur,
	)
	if err != nil {
		return err
	}
	return tx.Commit()
}

func (r *resepPulangRepositoryImpl) Update(c *fiber.Ctx, p *entity.ResepPulang) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		UPDATE resep_pulang SET 
			jml_barang = $5, harga = $6, total = $7,
			dosis = $8, kd_bangsal = $9, no_batch = $10, no_faktur = $11
		WHERE no_rawat = $1 AND kode_brng = $2 AND tanggal = $3 AND jam = $4
	`
	_, err = tx.Exec(query,
		p.NoRawat, p.KodeBrng, p.Tanggal, p.Jam,
		p.JmlBarang, p.Harga, p.Total,
		p.Dosis, p.KdBangsal, p.NoBatch, p.NoFaktur,
	)
	if err != nil {
		return err
	}
	return tx.Commit()
}

func (r *resepPulangRepositoryImpl) Delete(c *fiber.Ctx, noRawat, kodeBrng, tanggal, jam string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		DELETE FROM resep_pulang
		WHERE no_rawat = $1
		AND kode_brng = $2
		AND tanggal = $3::DATE
		AND jam = $4::TIME
	`
	_, err = tx.Exec(query, noRawat, kodeBrng, tanggal, jam)
	if err != nil {
		return err
	}
	return tx.Commit()
}
