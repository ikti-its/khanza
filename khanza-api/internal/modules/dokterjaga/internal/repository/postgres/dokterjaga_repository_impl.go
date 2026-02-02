package repository

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/dokterjaga/internal/entity"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type DokterJagaRepository interface {
	Insert(c *fiber.Ctx, d *entity.DokterJaga) error
	FindAll() ([]entity.DokterJaga, error)
	FindByKodeDokter(kodeDokter string) ([]entity.DokterJaga, error)
	Update(c *fiber.Ctx, d *entity.DokterJaga) error
	Delete(c *fiber.Ctx, kodeDokter string, hariKerja string) error
	FindByStatus(status string) ([]entity.DokterJaga, error)
	UpdateStatus(kodeDokter string, hariKerja string, status string) error
	GetByPoliklinik(poliklinik string) ([]entity.DokterJaga, error)
	GetPoliklinikList() ([]string, error)
}

type dokterJagaRepositoryImpl struct {
	DB *sqlx.DB
}

func NewDokterJagaRepository(db *sqlx.DB) DokterJagaRepository {
	return &dokterJagaRepositoryImpl{DB: db}
}

func (r *dokterJagaRepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func (r *dokterJagaRepositoryImpl) Insert(c *fiber.Ctx, d *entity.DokterJaga) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO dokter_jaga (
			kode_dokter, nama_dokter, hari_kerja,
			jam_mulai, jam_selesai, poliklinik, status
		) VALUES ($1, $2, $3, $4, $5, $6, $7)
	`
	_, err = tx.Exec(query,
		d.KodeDokter, d.NamaDokter, d.HariKerja,
		d.JamMulai, d.JamSelesai, d.Poliklinik, d.Status,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *dokterJagaRepositoryImpl) FindAll() ([]entity.DokterJaga, error) {
	query := `SELECT * FROM dokter_jaga ORDER BY hari_kerja DESC`
	var records []entity.DokterJaga
	err := r.DB.Select(&records, query)
	return records, err
}

func (r *dokterJagaRepositoryImpl) FindByKodeDokter(kode string) ([]entity.DokterJaga, error) {
	query := `SELECT * FROM dokter_jaga WHERE kode_dokter = $1 ORDER BY hari_kerja DESC`
	var records []entity.DokterJaga
	err := r.DB.Select(&records, query, kode)
	return records, err
}

func (r *dokterJagaRepositoryImpl) Update(c *fiber.Ctx, d *entity.DokterJaga) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		UPDATE dokter_jaga SET 
			nama_dokter = $2,
			jam_mulai = $3,
			jam_selesai = $4,
			poliklinik = $5,
			status = $6
		WHERE kode_dokter = $1 AND hari_kerja = $7
	`
	_, err = tx.Exec(query,
		d.KodeDokter,
		d.NamaDokter,
		d.JamMulai,
		d.JamSelesai,
		d.Poliklinik,
		d.Status,
		d.HariKerja,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *dokterJagaRepositoryImpl) Delete(c *fiber.Ctx, kodeDokter string, hariKerja string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `DELETE FROM dokter_jaga WHERE kode_dokter = $1 AND hari_kerja = $2`
	_, err = tx.Exec(query, kodeDokter, hariKerja)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *dokterJagaRepositoryImpl) FindByStatus(status string) ([]entity.DokterJaga, error) {
	query := `SELECT * FROM dokter_jaga WHERE status = $1 ORDER BY hari_kerja DESC`
	var records []entity.DokterJaga
	err := r.DB.Select(&records, query, status)
	return records, err
}

func (r *dokterJagaRepositoryImpl) UpdateStatus(kodeDokter string, hariKerja string, status string) error {
	query := `UPDATE dokter_jaga SET status = $1 WHERE kode_dokter = $2 AND hari_kerja = $3`
	_, err := r.DB.Exec(query, status, kodeDokter, hariKerja)
	return err
}

func (r *dokterJagaRepositoryImpl) GetByPoliklinik(poliklinik string) ([]entity.DokterJaga, error) {
	fmt.Println("📦 Executing query WHERE poliklinik =:", poliklinik)
	result := []entity.DokterJaga{}
	query := `
	SELECT 
		kode_dokter, 
		nama_dokter, 
		hari_kerja, 
		jam_mulai, 
		jam_selesai, 
		poliklinik, 
		status
	FROM dokter_jaga 
	WHERE poliklinik = $1
	`
	err := r.DB.Select(&result, query, poliklinik)
	return result, err
}

func (r *dokterJagaRepositoryImpl) GetPoliklinikList() ([]string, error) {
	var list []string
	query := `SELECT DISTINCT poliklinik FROM dokter_jaga ORDER BY poliklinik`
	err := r.DB.Select(&list, query)
	return list, err
}
