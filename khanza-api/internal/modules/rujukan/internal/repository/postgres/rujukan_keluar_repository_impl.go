package postgres

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan/internal/entity"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type RujukanKeluarRepository interface {
	Insert(c *fiber.Ctx, rujukan *entity.RujukanKeluar) error
	FindAll() ([]entity.RujukanKeluar, error)
	FindByNomorRawat(nomorRawat string) (entity.RujukanKeluar, error)
	FindByNomorRM(nomorRM string) ([]entity.RujukanKeluar, error)
	FindByTanggalRujuk(tanggal string) ([]entity.RujukanKeluar, error)
	Update(c *fiber.Ctx, rujukan *entity.RujukanKeluar) error
	Delete(c *fiber.Ctx, nomorRawat string) error
}

type rujukanKeluarRepositoryImpl struct {
	DB *sqlx.DB
}

func NewRujukanKeluarRepository(db *sqlx.DB) RujukanKeluarRepository {
	return &rujukanKeluarRepositoryImpl{DB: db}
}

func (r *rujukanKeluarRepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func (r *rujukanKeluarRepositoryImpl) Insert(c *fiber.Ctx, rujukan *entity.RujukanKeluar) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO rujukan_keluar (
			nomor_rujuk, nomor_rawat, nomor_rm, nama_pasien,
			tempat_rujuk, tanggal_rujuk, jam_rujuk,
			keterangan_diagnosa, dokter_perujuk, kategori_rujuk,
			pengantaran, keterangan
		) VALUES (
			$1, $2, $3, $4,
			$5, $6, $7,
			$8, $9, $10,
			$11, $12
		)
	`
	_, err = tx.Exec(query,
		rujukan.NomorRujuk, rujukan.NomorRawat, rujukan.NomorRM, rujukan.NamaPasien,
		rujukan.TempatRujuk, rujukan.TanggalRujuk, rujukan.JamRujuk,
		rujukan.KeteranganDiagnosa, rujukan.DokterPerujuk, rujukan.KategoriRujuk,
		rujukan.Pengantaran, rujukan.Keterangan,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *rujukanKeluarRepositoryImpl) FindAll() ([]entity.RujukanKeluar, error) {
	query := `SELECT * FROM rujukan_keluar ORDER BY tanggal_rujuk DESC`
	var records []entity.RujukanKeluar
	err := r.DB.Select(&records, query)
	return records, err
}

func (r *rujukanKeluarRepositoryImpl) FindByNomorRawat(nomorRawat string) (entity.RujukanKeluar, error) {
	query := `SELECT * FROM rujukan_keluar WHERE nomor_rujuk = $1`
	var record entity.RujukanKeluar
	err := r.DB.Get(&record, query, nomorRawat)
	return record, err
}

func (r *rujukanKeluarRepositoryImpl) FindByNomorRM(nomorRM string) ([]entity.RujukanKeluar, error) {
	query := `SELECT * FROM rujukan_keluar WHERE nomor_rm = $1 ORDER BY tanggal_rujuk DESC`
	var records []entity.RujukanKeluar
	err := r.DB.Select(&records, query, nomorRM)
	return records, err
}

func (r *rujukanKeluarRepositoryImpl) FindByTanggalRujuk(tanggal string) ([]entity.RujukanKeluar, error) {
	query := `SELECT * FROM rujukan_keluar WHERE tanggal_rujuk = $1 ORDER BY nomor_rawat`
	var records []entity.RujukanKeluar
	err := r.DB.Select(&records, query, tanggal)
	return records, err
}

func (r *rujukanKeluarRepositoryImpl) Update(c *fiber.Ctx, rujukan *entity.RujukanKeluar) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		UPDATE rujukan_keluar SET 
			nomor_rujuk = $1,
			nomor_rm = $2,
			nama_pasien = $3,
			tempat_rujuk = $4,
			tanggal_rujuk = $5,
			jam_rujuk = $6,
			keterangan_diagnosa = $7,
			dokter_perujuk = $8,
			kategori_rujuk = $9,
			pengantaran = $10,
			keterangan = $11
		WHERE nomor_rawat = $12
	`
	_, err = tx.Exec(query,
		rujukan.NomorRujuk, rujukan.NomorRM, rujukan.NamaPasien, rujukan.TempatRujuk,
		rujukan.TanggalRujuk, rujukan.JamRujuk, rujukan.KeteranganDiagnosa,
		rujukan.DokterPerujuk, rujukan.KategoriRujuk, rujukan.Pengantaran,
		rujukan.Keterangan, rujukan.NomorRawat,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *rujukanKeluarRepositoryImpl) Delete(c *fiber.Ctx, nomorRawat string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `DELETE FROM rujukan_keluar WHERE nomor_rawat = $1`
	_, err = tx.Exec(query, nomorRawat)
	if err != nil {
		return err
	}

	return tx.Commit()
}
