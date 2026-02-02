package postgres

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/ugd/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/ugd/internal/repository"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type UGDRepository interface {
	Insert(c *fiber.Ctx, ugd *entity.UGD) error
	Find() ([]entity.UGD, error)
	FindAll() ([]entity.UGD, error)
	FindByNomorReg(nomorReg string) (entity.UGD, error)
	FindByNomorRM(nomorRM string) (entity.UGD, error)
	FindByTanggal(tanggal string) ([]entity.UGD, error)
	Update(c *fiber.Ctx, ugd *entity.UGD) error
	Delete(nomorReg string) error
	CheckDokterExists(kodeDokter string) (bool, error)
}

type ugdRepositoryImpl struct {
	DB *sqlx.DB
}

func NewUGDRepository(db *sqlx.DB) repository.UGDRepository {
	return &ugdRepositoryImpl{DB: db}
}

func (r *ugdRepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func (r *ugdRepositoryImpl) Insert(c *fiber.Ctx, ugd *entity.UGD) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO ugd (
			nomor_reg, nomor_rawat, tanggal, jam, kode_dokter, dokter_dituju, nomor_rm,
			nama_pasien, jenis_kelamin, umur, poliklinik, jenis_bayar, penanggung_jawab,
			alamat_pj, hubungan_pj, biaya_registrasi, status, status_rawat, status_bayar
		) VALUES (
			$1, $2, $3, $4, $5, $6, $7, $8, $9, $10,
			$11, $12, $13, $14, $15, $16, $17, $18, $19
		)
	`

	_, err = tx.Exec(query,
		ugd.NomorReg, ugd.NomorRawat, ugd.Tanggal, ugd.Jam, ugd.KodeDokter, ugd.DokterDituju,
		ugd.NomorRM, ugd.NamaPasien, ugd.JenisKelamin, ugd.Umur, ugd.Poliklinik,
		ugd.JenisBayar, ugd.PenanggungJawab, ugd.AlamatPJ, ugd.HubunganPJ, ugd.BiayaRegistrasi,
		ugd.Status, ugd.StatusRawat, ugd.StatusBayar,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *ugdRepositoryImpl) Update(c *fiber.Ctx, ugd *entity.UGD) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		UPDATE ugd SET 
			nomor_rawat = $2, tanggal = $3, jam = $4, kode_dokter = $5, dokter_dituju = $6,
			nomor_rm = $7, nama_pasien = $8, jenis_kelamin = $9, umur = $10, poliklinik = $11,
			jenis_bayar = $12, penanggung_jawab = $13, alamat_pj = $14, hubungan_pj = $15,
			biaya_registrasi = $16, status = $17, status_rawat = $18, status_bayar = $19
		WHERE nomor_reg = $1
	`

	_, err = tx.Exec(query,
		ugd.NomorReg, ugd.NomorRawat, ugd.Tanggal, ugd.Jam, ugd.KodeDokter, ugd.DokterDituju,
		ugd.NomorRM, ugd.NamaPasien, ugd.JenisKelamin, ugd.Umur, ugd.Poliklinik,
		ugd.JenisBayar, ugd.PenanggungJawab, ugd.AlamatPJ, ugd.HubunganPJ, ugd.BiayaRegistrasi,
		ugd.Status, ugd.StatusRawat, ugd.StatusBayar,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *ugdRepositoryImpl) Delete(c *fiber.Ctx, nomorReg string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `DELETE FROM ugd WHERE nomor_reg = $1`
	_, err = tx.Exec(query, nomorReg)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *ugdRepositoryImpl) Find() ([]entity.UGD, error) {
	query := `SELECT * FROM ugd ORDER BY tanggal DESC`
	var records []entity.UGD
	err := r.DB.Select(&records, query)
	return records, err
}

func (r *ugdRepositoryImpl) FindAll() ([]entity.UGD, error) {
	return r.Find()
}

func (r *ugdRepositoryImpl) FindByNomorReg(nomorReg string) (entity.UGD, error) {
	query := `SELECT * FROM ugd WHERE nomor_reg = $1`
	var record entity.UGD
	err := r.DB.Get(&record, query, nomorReg)
	return record, err
}

func (r *ugdRepositoryImpl) FindByNomorRM(nomorRM string) (entity.UGD, error) {
	query := `SELECT * FROM ugd WHERE nomor_rm = $1`
	var record entity.UGD
	err := r.DB.Get(&record, query, nomorRM)
	return record, err
}

func (r *ugdRepositoryImpl) FindByTanggal(tanggal string) ([]entity.UGD, error) {
	query := `SELECT * FROM ugd WHERE tanggal = $1`
	var records []entity.UGD
	err := r.DB.Select(&records, query, tanggal)
	return records, err
}

func (r *ugdRepositoryImpl) CheckDokterExists(kodeDokter string) (bool, error) {
	var exists bool
	query := `SELECT EXISTS (SELECT 1 FROM dokter WHERE kode_dokter = $1)`
	err := r.DB.QueryRow(query, kodeDokter).Scan(&exists)
	return exists, err
}
