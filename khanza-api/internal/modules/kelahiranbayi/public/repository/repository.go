package repository

import (
	"fmt"
    "github.com/gofiber/fiber/v2"
    "github.com/lib/pq"
    "github.com/jmoiron/sqlx"
	"github.com/ikti-its/khanza-api/internal/modules/kelahiranbayi/public/entity"
)

type Repository interface {
	FindAll() ([]entity.Entity, error)
	FindById(id string) (entity.Entity, error)
	Insert(c *fiber.Ctx, entity *entity.Entity) error
	Update(c *fiber.Ctx, entity *entity.Entity) error
	Delete(c *fiber.Ctx, id string) error 
    setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error
	UpdateIfExists(c *fiber.Ctx, entity *entity.Entity) error
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
		SELECT * FROM kelahiran_bayi ORDER BY no_rkm_medis DESC
	`
	var records []entity.Entity
	err := r.DB.Select(&records, query)
	return records, err
}

func (r *RepositoryImpl) FindById(id string) (entity.Entity, error) {
	query := `SELECT * FROM kelahiran_bayi WHERE no_rkm_medis = $1`

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
		INSERT INTO kelahiran_bayi (
			no_rkm_medis, nm_pasien, jk, tmp_lahir, tgl_lahir, jam, umur, tgl_daftar,
			no_rm_ibu, nm_ibu, umur_ibu, nm_ayah, umur_ayah, alamat,
			bb, pb, proses_lahir, kelahiran_ke, keterangan, diagnosa, penyulit_kehamilan, ketuban,
			lk_perut, lk_kepala, lk_dada, penolong, no_skl, gravida, para, abortus,
			f1, u1, t1, r1, w1, n1,
			f5, u5, t5, r5, w5, n5,
			f10, u10, t10, r10, w10, n10,
			resusitas, obat, mikasi, mikonium
		) VALUES (
			$1, $2, $3, $4, $5, $6, $7,
			$8, $9, $10, $11, $12,
			$13, $14, $15, $16, $17, $18, $19, $20,
			$21, $22, $23, $24, $25, $26, $27,
			$28, $29, $30, $31, $32, $33,
			$34, $35, $36, $37, $38, $39,
			$40, $41, $42, $43, $44, $45,
			$46, $47, $48, $49, $50, $51, $52
		)
	`

	_, err = tx.Exec(query,
		entity.No_rkm_medis, entity.Nm_pasien, entity.Jk, entity.Tmp_lahir, entity.Tgl_lahir, entity.Jam, entity.Umur, entity.Tgl_daftar,
		entity.No_rm_ibu, entity.Nm_ibu, entity.Umur_ibu, entity.Nm_ayah, entity.Umur_ayah, entity.Alamat,
		entity.Bb, entity.Pb, entity.Proses_lahir, entity.Kelahiran_ke, entity.Keterangan, entity.Diagnosa, entity.Penyulit_kehamilan, entity.Ketuban,
		entity.Lk_perut, entity.Lk_kepala, entity.Lk_dada, entity.Penolong, entity.No_skl, entity.Gravida, entity.Para, entity.Abortus,
		entity.F1, entity.U1, entity.T1, entity.R1, entity.W1, entity.N1,
		entity.F5, entity.U5, entity.T5, entity.R5, entity.W5, entity.N5,
		entity.F10, entity.U10, entity.T10, entity.R10, entity.W10, entity.N10,
		entity.Resusitas, entity.Obat, entity.Mikasi, entity.Mikonium,
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
		UPDATE kelahiran_bayi SET
            nm_pasien = $2, jk = $3, tmp_lahir = $4, tgl_lahir = $5, jam = $6, umur = $7, tgl_daftar = $8,
            no_rm_ibu = $9, nm_ibu = $10, umur_ibu = $11, nm_ayah = $12, umur_ayah = $13, alamat = $14,
            bb = $15, pb = $16, proses_lahir = $17, kelahiran_ke = $18, keterangan = $19, diagnosa = $20,
            penyulit_kehamilan = $21, ketuban = $22, lk_perut = $23, lk_kepala = $24, lk_dada = $25, penolong = $26, no_skl = $27,
            gravida = $28, para = $29, abortus = $30,
            f1 = $31, u1 = $32, t1 = $33, r1 = $34, w1 = $35, n1 = $36,
            f5 = $37, u5 = $38, t5 = $39, r5 = $40, w5 = $41, n5 = $42,
            f10 = $43, u10 = $44, t10 = $45, r10 = $46, w10 = $47, n10 = $48,
            resusitas = $49, obat = $50, mikasi = $51, mikonium = $52
        WHERE no_rkm_medis = $1;
`
	_, err = tx.Exec(query,
		entity.No_rkm_medis, entity.Nm_pasien, entity.Jk, entity.Tmp_lahir, entity.Tgl_lahir, entity.Jam, entity.Umur, entity.Tgl_daftar,
		entity.No_rm_ibu, entity.Nm_ibu, entity.Umur_ibu, entity.Nm_ayah, entity.Umur_ayah, entity.Alamat,
		entity.Bb, entity.Pb, entity.Proses_lahir, entity.Kelahiran_ke, entity.Keterangan, entity.Diagnosa, entity.Penyulit_kehamilan, entity.Ketuban,
		entity.Lk_perut, entity.Lk_kepala, entity.Lk_dada, entity.Penolong, entity.No_skl, entity.Gravida, entity.Para, entity.Abortus,
		entity.F1, entity.U1, entity.T1, entity.R1, entity.W1, entity.N1,
		entity.F5, entity.U5, entity.T5, entity.R5, entity.W5, entity.N5,
		entity.F10, entity.U10, entity.T10, entity.R10, entity.W10, entity.N10,
		entity.Resusitas, entity.Obat, entity.Mikasi, entity.Mikonium,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *RepositoryImpl) UpdateIfExists(c *fiber.Ctx, bayi *entity.Entity) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	// Audit context (jika ada)
	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	// Cek apakah record ada
	var count int
	err = tx.Get(&count, "SELECT COUNT(*) FROM kelahiran_bayi WHERE no_rkm_medis = $1", bayi.No_rkm_medis)
	if err != nil {
		return err
	}
	if count == 0 {
		return nil // Skip kalau data tidak ditemukan
	}

	// Update data jika ditemukan
	query := `
		UPDATE kelahiran_bayi SET 
			nm_pasien = $1,
			jk = $2,
			tmp_lahir = $3,
			tgl_lahir = $4,
			alamat = $5,
			nm_ibu = $6
		WHERE no_rkm_medis = $7
	`
	_, err = tx.Exec(query,
		bayi.Nm_pasien,
		bayi.Jk,
		bayi.Tmp_lahir,
		bayi.Tgl_lahir,
		bayi.Alamat,
		bayi.Nm_ibu,
		bayi.No_rkm_medis,
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
		DELETE FROM kelahiran_bayi WHERE no_rkm_medis = $1
	`
	_, err = tx.Exec(query, id)
	if err != nil {
		return err
	}

	return tx.Commit()
}
