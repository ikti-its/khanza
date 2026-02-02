package repository

import (
	"fmt"
    "github.com/gofiber/fiber/v2"
    "github.com/lib/pq"
    "github.com/jmoiron/sqlx"
	"github.com/ikti-its/khanza-api/internal/modules/pasienmeninggal/internal/entity"
)

type Repository interface {
	FindAll() ([]entity.Entity, error)
	FindById(id string) (entity.Entity, error)
	Insert(c *fiber.Ctx, entity *entity.Entity) error
	Update(c *fiber.Ctx, entity *entity.Entity) error
	Delete(c *fiber.Ctx, id string) error 
    setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error
}

type RepositoryImpl struct {
	DB *sqlx.DB
}

func (r *RepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func NewRepository(db *sqlx.DB) Repository {
	return &RepositoryImpl{DB: db}
}

func (r *RepositoryImpl) FindAll() ([]entity.Entity, error) {
	query := `
		SELECT * FROM pasien_meninggal ORDER BY no_rkm_medis DESC
	`
	var records []entity.Entity
	err := r.DB.Select(&records, query)
	return records, err
}

func (r *RepositoryImpl) FindById(id string) (entity.Entity, error) {
	query := `SELECT * FROM pasien_meninggal WHERE no_rkm_medis = $1`

	var record entity.Entity
	err := r.DB.Get(&record, query, id)
	return record, err
}

func (r *RepositoryImpl) Insert(c *fiber.Ctx, entity *entity.Entity) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO pasien_meninggal (
			no_rkm_medis, nm_pasien, jk, tgl_lahir, umur,
			gol_darah, stts_nikah, agama, tanggal, jam,
			icdx, icdx_antara1, icdx_antara2, icdx_langsung,
			keterangan, nama_dokter, kode_dokter
		) VALUES (
			$1, $2, $3, $4, $5,
			$6, $7, $8, $9, $10,
			$11, $12, $13, $14,
			$15, $16, $17
		)
	`
	_, err = tx.Exec(query,
		entity.No_rkm_medis, entity.Nm_pasien, entity.Jk, entity.Tgl_lahir, entity.Umur,
		entity.Gol_darah, entity.Stts_nikah, entity.Agama, entity.Tanggal, entity.Jam,
		entity.Icdx, entity.Icdx_antara1, entity.Icdx_antara2, entity.Icdx_langsung,
		entity.Keterangan, entity.Nama_dokter, entity.Kode_dokter,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *RepositoryImpl) Update(c *fiber.Ctx, entity *entity.Entity) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}
	query := `
		UPDATE pasien_meninggal SET
			nm_pasien = $2,
			jk = $3,
			tgl_lahir = $4,
			umur = $5,
			gol_darah = $6,
			stts_nikah = $7,
			agama = $8,
			tanggal = $9,
			jam = $10,
			icdx = $11,
			icdx_antara1 = $12,
			icdx_antara2 = $13,
			icdx_langsung = $14,
			keterangan = $15,
			nama_dokter = $16,
			kode_dokter = $17
		WHERE no_rkm_medis = $1
	`
	_, err = tx.Exec(query,
		entity.No_rkm_medis, entity.Nm_pasien, entity.Jk, entity.Tgl_lahir, entity.Umur,
		entity.Gol_darah, entity.Stts_nikah, entity.Agama, entity.Tanggal, entity.Jam,
		entity.Icdx, entity.Icdx_antara1, entity.Icdx_antara2, entity.Icdx_langsung,
		entity.Keterangan, entity.Nama_dokter, entity.Kode_dokter,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *RepositoryImpl) Delete(c *fiber.Ctx, id string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

    query := `
		DELETE FROM pasien_meninggal WHERE no_rkm_medis = $1
	`
	_, err = tx.Exec(query, id)
	if err != nil {
		return err
	}

	return tx.Commit()
}
