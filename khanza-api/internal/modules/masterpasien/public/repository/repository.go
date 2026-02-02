package repository

import (
	"fmt"
    "github.com/gofiber/fiber/v2"
    "github.com/lib/pq"
    "github.com/jmoiron/sqlx"
	"github.com/ikti-its/khanza-api/internal/modules/masterpasien/public/entity"
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
		SELECT * FROM pasien ORDER BY no_rkm_medis DESC
	`
	var records []entity.Entity
	err := r.DB.Select(&records, query)
	return records, err
}

func (r *RepositoryImpl) FindById(id string) (entity.Entity, error) {
	query := `SELECT * FROM pasien WHERE no_rkm_medis = $1`

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

	query := `INSERT INTO pasien (
		no_rkm_medis, nm_pasien, no_ktp, jk, tmp_lahir, tgl_lahir,
		nm_ibu, alamat, gol_darah, pekerjaan, stts_nikah, agama,
		tgl_daftar, no_tlp, umur, pnd, asuransi, no_asuransi,
		suku_bangsa, bahasa_pasien, perusahaan_pasien, nip, email, cacat_fisik,
		kd_kel, kd_kec, kd_kab, kd_prop, stts_pasien
	) VALUES (
		$1, $2, $3, $4, $5, $6,
		$7, $8, $9, $10, $11, $12,
		$13, $14, $15, $16, $17, $18,
		$19, $20, $21, $22, $23, $24,
		$25, $26, $27, $28, $29
	)`

	_, err = tx.Exec(query,
		entity.No_rkm_medis,
		entity.Nm_pasien,
		entity.No_ktp,
		entity.Jk,
		entity.Tmp_lahir,
		entity.Tgl_lahir,
		entity.Nm_ibu,
		entity.Alamat,
		entity.Gol_darah,
		entity.Pekerjaan,
		entity.Stts_nikah,
		entity.Agama,
		entity.Tgl_daftar,
		entity.No_tlp,
		entity.Umur,
		entity.Pnd,
		entity.Asuransi,
		entity.No_asuransi,
		entity.Suku_bangsa,
		entity.Bahasa_pasien,
		entity.Perusahaan_pasien,
		entity.Nip,
		entity.Email,
		entity.Cacat_fisik,
		entity.Kd_kel,
		entity.Kd_kec,
		entity.Kd_kab,
		entity.Kd_prop,
		entity.Stts_pasien,
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

	query := `UPDATE pasien SET 
		nm_pasien = $2, no_ktp = $3, jk = $4, tmp_lahir = $5, tgl_lahir = $6,
		nm_ibu = $7, alamat = $8, gol_darah = $9, pekerjaan = $10, stts_nikah = $11,
		agama = $12, tgl_daftar = $13, no_tlp = $14, umur = $15, pnd = $16,
		asuransi = $17, no_asuransi = $18, suku_bangsa = $19, bahasa_pasien = $20,
		perusahaan_pasien = $21, nip = $22, email = $23, cacat_fisik = $24,
		kd_kel = $25, kd_kec = $26, kd_kab = $27, kd_prop = $28, stts_pasien = $29
		WHERE no_rkm_medis = $1`

	_, err = tx.Exec(query,
		entity.No_rkm_medis,
		entity.Nm_pasien,
		entity.No_ktp,
		entity.Jk,
		entity.Tmp_lahir,
		entity.Tgl_lahir,
		entity.Nm_ibu,
		entity.Alamat,
		entity.Gol_darah,
		entity.Pekerjaan,
		entity.Stts_nikah,
		entity.Agama,
		entity.Tgl_daftar,
		entity.No_tlp,
		entity.Umur,
		entity.Pnd,
		entity.Asuransi,
		entity.No_asuransi,
		entity.Suku_bangsa,
		entity.Bahasa_pasien,
		entity.Perusahaan_pasien,
		entity.Nip,
		entity.Email,
		entity.Cacat_fisik,
		entity.Kd_kel,
		entity.Kd_kec,
		entity.Kd_kab,
		entity.Kd_prop,
		entity.Stts_pasien,
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
		DELETE FROM pasien WHERE no_rkm_medis = $1
	`
	_, err = tx.Exec(query, id)
	if err != nil {
		return err
	}

	return tx.Commit()
}
