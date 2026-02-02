package postgres

import (
	"fmt"
	"math"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/obat/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/obat/internal/repository"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type pemberianObatRepositoryImpl struct {
	DB *sqlx.DB
}

func NewPemberianObatRepository(db *sqlx.DB) repository.PemberianObatRepository {
	return &pemberianObatRepositoryImpl{DB: db}
}

func (r *pemberianObatRepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func (r *pemberianObatRepositoryImpl) Insert(c *fiber.Ctx, p *entity.PemberianObat) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO pemberian_obat (
			tanggal_beri, jam_beri, nomor_rawat, nama_pasien, kode_obat, 
			nama_obat, embalase, tuslah, jumlah, biaya_obat, total, 
			gudang, no_batch, no_faktur, kelas
		) VALUES (
			$1, $2, $3, $4, $5,
			$6, $7, $8, $9, $10, $11,
			$12, $13, $14, $15
		)
	`
	_, err = tx.Exec(query,
		p.TanggalBeri, p.JamBeri, p.NomorRawat, p.NamaPasien, p.KodeObat,
		p.NamaObat, p.Embalase, p.Tuslah, p.Jumlah, p.BiayaObat, p.Total,
		p.Gudang, p.NoBatch, p.NoFaktur, p.Kelas,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *pemberianObatRepositoryImpl) FindAll() ([]entity.PemberianObat, error) {
	query := `SELECT * FROM pemberian_obat ORDER BY tanggal_beri DESC, jam_beri DESC`
	var list []entity.PemberianObat
	err := r.DB.Select(&list, query)
	return list, err
}

func (r *pemberianObatRepositoryImpl) FindByNomorRawat(nomorRawat string) ([]entity.PemberianObat, error) {
	query := `SELECT * FROM pemberian_obat WHERE nomor_rawat = $1 ORDER BY tanggal_beri DESC, jam_beri DESC`
	var list []entity.PemberianObat
	err := r.DB.Select(&list, query, nomorRawat)
	return list, err
}

func (r *pemberianObatRepositoryImpl) Update(c *fiber.Ctx, p *entity.PemberianObat) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		UPDATE pemberian_obat SET 
			nama_pasien = $4, kode_obat = $5, nama_obat = $6, embalase = $7,
			tuslah = $8, jumlah = $9, biaya_obat = $10, total = $11,
			gudang = $12, no_batch = $13, no_faktur = $14, kelas = $15
		WHERE nomor_rawat = $3 AND tanggal_beri = $1 AND jam_beri = $2
	`
	_, err = tx.Exec(query,
		p.TanggalBeri, p.JamBeri, p.NomorRawat, p.NamaPasien, p.KodeObat,
		p.NamaObat, p.Embalase, p.Tuslah, p.Jumlah, p.BiayaObat, p.Total,
		p.Gudang, p.NoBatch, p.NoFaktur, p.Kelas,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *pemberianObatRepositoryImpl) Delete(c *fiber.Ctx, nomorRawat, jamBeri string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `DELETE FROM pemberian_obat WHERE nomor_rawat = $1 AND jam_beri = $2`
	_, err = tx.Exec(query, nomorRawat, jamBeri)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *pemberianObatRepositoryImpl) GetAllDataBarang() ([]entity.DataBarang, error) {
	query := `
		SELECT 
			kode_brng, 
			nama_brng, 
			dasar, 
			kelas1, 
			kelas2, 
			kelas3, 
			utama, 
			vip, 
			vvip, 
			jualbebas,
			stokminimal,
			kapasitas
		FROM databarang
		ORDER BY nama_brng ASC
	`

	var list []entity.DataBarang
	err := r.DB.Select(&list, query)
	return list, err
}

func (r *pemberianObatRepositoryImpl) FindPaginated(page, size int) ([]entity.PemberianObat, int, error) {
	offset := (page - 1) * size

	// Get total record count
	var total int
	err := r.DB.Get(&total, "SELECT COUNT(*) FROM sik.pemberian_obat")
	if err != nil {
		return nil, 0, err
	}

	// Fetch paginated data
	var result []entity.PemberianObat
	query := `
		SELECT * FROM sik.pemberian_obat
		ORDER BY tanggal DESC, jam DESC
		LIMIT $1 OFFSET $2
	`
	err = r.DB.Select(&result, query, size, offset)
	if err != nil {
		return nil, 0, err
	}

	totalPages := int(math.Ceil(float64(total) / float64(size)))
	return result, totalPages, nil
}
