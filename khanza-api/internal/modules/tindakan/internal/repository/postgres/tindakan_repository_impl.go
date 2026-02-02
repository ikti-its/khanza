package postgres

import (
	"database/sql"
	"errors"
	"fmt"
	"log"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/tindakan/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/tindakan/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/tindakan/internal/repository"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type TindakanRepository interface {
	Insert(c *fiber.Ctx, t *entity.Tindakan) error
	FindAll() ([]entity.Tindakan, error)
	FindByNomorRawat(nomorRawat string) ([]entity.Tindakan, error)
	Update(c *fiber.Ctx, t *entity.Tindakan) error
	Delete(c *fiber.Ctx, nomorRawat, jamRawat string) error
	CheckDokterExists(kodeDokter string) (bool, error)
	GetAllJenisTindakan() ([]entity.JenisTindakan, error)
	FindByNomorRawatAndJamRawat(nomorRawat, jamRawat string) (*entity.Tindakan, error)
}

type tindakanRepositoryImpl struct {
	DB *sqlx.DB
}

func NewTindakanRepository(db *sqlx.DB) repository.TindakanRepository {
	return &tindakanRepositoryImpl{DB: db}
}

func (r *tindakanRepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func (r *tindakanRepositoryImpl) Insert(c *fiber.Ctx, t *entity.Tindakan) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO tindakan (
			nomor_rawat, nomor_rm, nama_pasien, tindakan, kode_dokter, nama_dokter,
			nip, nama_petugas, tanggal_rawat, jam_rawat, biaya
		) VALUES (
			$1, $2, $3, $4, $5, $6,
			$7, $8, $9, $10, $11
		)
	`
	_, err = tx.Exec(query,
		t.NomorRawat, t.NomorRM, t.NamaPasien, t.Tindakan, t.KodeDokter, t.NamaDokter,
		t.NIP, t.NamaPetugas, t.TanggalRawat, t.JamRawat, t.Biaya,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *tindakanRepositoryImpl) FindAll() ([]entity.Tindakan, error) {
	query := `SELECT * FROM tindakan ORDER BY tanggal_rawat DESC`
	var records []entity.Tindakan
	err := r.DB.Select(&records, query)
	return records, err
}

func (r *tindakanRepositoryImpl) FindByNomorRawat(nomorRawat string) ([]entity.Tindakan, error) {
	query := `SELECT * FROM tindakan WHERE nomor_rawat = $1 ORDER BY tanggal_rawat DESC`
	var list []entity.Tindakan
	err := r.DB.Select(&list, query, nomorRawat)
	return list, err
}

func (r *tindakanRepositoryImpl) Update(c *fiber.Ctx, t *entity.Tindakan) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		UPDATE tindakan SET 
			nama_pasien = :nama_pasien,
			tindakan = :tindakan,
			kode_dokter = :kode_dokter,
			nama_dokter = :nama_dokter,
			nip = :nip,
			nama_petugas = :nama_petugas,
			tanggal_rawat = :tanggal_rawat,
			jam_rawat = :jam_rawat,
			biaya = :biaya
		WHERE nomor_rawat = :nomor_rawat AND jam_rawat = :jam_rawat
	`
	_, err = tx.NamedExec(query, t)
	if err != nil {
		return fmt.Errorf("failed to update tindakan: %v", err)
	}

	return tx.Commit()
}

func (r *tindakanRepositoryImpl) Delete(c *fiber.Ctx, nomorRawat, jamRawat string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `DELETE FROM tindakan WHERE nomor_rawat = $1 AND jam_rawat = $2`
	_, err = tx.Exec(query, nomorRawat, jamRawat)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *tindakanRepositoryImpl) CheckDokterExists(kodeDokter string) (bool, error) {
	var exists bool
	query := `SELECT EXISTS (SELECT 1 FROM dokter WHERE kode_dokter = $1)`
	err := r.DB.QueryRow(query, kodeDokter).Scan(&exists)
	return exists, err
}

func (r *tindakanRepositoryImpl) GetAllJenisTindakan() ([]entity.JenisTindakan, error) {
	var result []entity.JenisTindakan
	query := `
	SELECT 
		kode,
		nama_tindakan,
		kode_kategori,
		material,
		bhp,
		tarif_tindakan_dokter,
		tarif_tindakan_perawat,
		kso,
		manajemen,
		total_bayar_dokter,
		total_bayar_perawat,
		(material + bhp + kso + manajemen + total_bayar_dokter + total_bayar_perawat) AS tarif,
		total_bayar_dokter_perawat,
		kode_pj,
		kode_bangsal,
		status,
		kelas
	FROM jenis_tindakan
    ORDER BY nama_tindakan ASC`

	err := r.DB.Select(&result, query)
	log.Printf("[QUERY] %s", query)
	log.Printf("[RESULT] fetched %d rows", len(result))

	if err != nil {
		log.Printf("[ERROR] Select failed: %v", err)
	}
	return result, err
}

func (r *tindakanRepositoryImpl) FindJenisByKode(kode string) (*model.JenisTindakan, error) {
	var jt model.JenisTindakan
	query := `
		SELECT kode, nama_tindakan
		FROM sik.jenis_tindakan
		WHERE kode = $1
		LIMIT 1
	`

	err := r.DB.Get(&jt, query, kode)
	if err != nil {
		if errors.Is(err, sql.ErrNoRows) {
			// No match found
			return nil, nil
		}
		log.Printf("SQL ERROR: %v", err) // Optional: show full DB error
		return nil, err
	}

	return &jt, nil
}

func (r *tindakanRepositoryImpl) FindByNomorRawatAndJamRawat(nomorRawat, jamRawat string) (*entity.Tindakan, error) {
	query := `
		SELECT 
			nomor_rawat, nomor_rm, nama_pasien, tindakan, kode_dokter, nama_dokter,
			nip, nama_petugas, tanggal_rawat, jam_rawat, biaya
		FROM tindakan
		WHERE nomor_rawat = $1 AND jam_rawat = $2
	`

	var result entity.Tindakan
	err := r.DB.Get(&result, query, nomorRawat, jamRawat)
	if err != nil {
		if errors.Is(err, sql.ErrNoRows) {
			return nil, fmt.Errorf("tindakan not found")
		}
		return nil, fmt.Errorf("failed to query tindakan: %v", err)
	}

	return &result, nil
}
