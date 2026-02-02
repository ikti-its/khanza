package repository

import (
	"fmt"
	"math"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rawatinap/internal/entity"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type RawatInapRepository interface {
	Insert(c *fiber.Ctx, rawatInap *entity.RawatInap) error
	FindAll() ([]entity.RawatInap, error)
	FindByNomorRawat(nomorRawat string) (entity.RawatInap, error)
	FindByNomorRM(nomorRM string) ([]entity.RawatInap, error)
	FindByTanggalMasuk(tanggal string) ([]entity.RawatInap, error)
	Update(c *fiber.Ctx, rawatInap *entity.RawatInap) error
	Delete(c *fiber.Ctx, nomorRawat string) error
	setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error
	FindPaginated(page, size int) ([]entity.RawatInap, int, error)
}

type rawatInapRepositoryImpl struct {
	DB *sqlx.DB
}

func NewRawatInapRepository(db *sqlx.DB) RawatInapRepository {
	return &rawatInapRepositoryImpl{DB: db}
}

func (r *rawatInapRepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func (r *rawatInapRepositoryImpl) Insert(c *fiber.Ctx, ri *entity.RawatInap) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}
	query := `
		INSERT INTO rawat_inap (
			nomor_rawat, nomor_rm, nama_pasien, alamat_pasien, penanggung_jawab,
			hubungan_pj, jenis_bayar, kamar, tarif_kamar, diagnosa_awal, diagnosa_akhir,
			tanggal_masuk, jam_masuk, tanggal_keluar, jam_keluar, total_biaya,
			status_pulang, lama_ranap, dokter_pj, status_bayar
		) VALUES (
			:nomor_rawat, :nomor_rm, :nama_pasien, :alamat_pasien, :penanggung_jawab,
			:hubungan_pj, :jenis_bayar, :kamar, :tarif_kamar, :diagnosa_awal, :diagnosa_akhir,
			:tanggal_masuk, :jam_masuk, :tanggal_keluar, :jam_keluar, :total_biaya,
			:status_pulang, :lama_ranap, :dokter_pj, :status_bayar
		)
	`
	_, err = tx.NamedExec(query, ri)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *rawatInapRepositoryImpl) FindAll() ([]entity.RawatInap, error) {
	query := `SELECT * FROM rawat_inap ORDER BY tanggal_masuk DESC`
	var result []entity.RawatInap
	err := r.DB.Select(&result, query)
	return result, err
}

func (r *rawatInapRepositoryImpl) FindByNomorRawat(nomorRawat string) (entity.RawatInap, error) {
	query := `SELECT * FROM rawat_inap WHERE nomor_rawat = $1`
	var result entity.RawatInap
	err := r.DB.Get(&result, query, nomorRawat)
	return result, err
}

func (r *rawatInapRepositoryImpl) FindByNomorRM(nomorRM string) ([]entity.RawatInap, error) {
	query := `SELECT * FROM rawat_inap WHERE nomor_rm = $1 ORDER BY tanggal_masuk DESC`
	var result []entity.RawatInap
	err := r.DB.Select(&result, query, nomorRM)
	return result, err
}

func (r *rawatInapRepositoryImpl) FindByTanggalMasuk(tanggal string) ([]entity.RawatInap, error) {
	query := `SELECT * FROM rawat_inap WHERE tanggal_masuk = $1 ORDER BY jam_masuk`
	var result []entity.RawatInap
	err := r.DB.Select(&result, query, tanggal)
	return result, err
}

func (r *rawatInapRepositoryImpl) Update(c *fiber.Ctx, ri *entity.RawatInap) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}
	query := `
		UPDATE rawat_inap SET
			nomor_rm = :nomor_rm,
			nama_pasien = :nama_pasien,
			alamat_pasien = :alamat_pasien,
			penanggung_jawab = :penanggung_jawab,
			hubungan_pj = :hubungan_pj,
			jenis_bayar = :jenis_bayar,
			kamar = :kamar,
			tarif_kamar = :tarif_kamar,
			diagnosa_awal = :diagnosa_awal,
			diagnosa_akhir = :diagnosa_akhir,
			tanggal_masuk = :tanggal_masuk,
			jam_masuk = :jam_masuk,
			tanggal_keluar = :tanggal_keluar,
			jam_keluar = :jam_keluar,
			total_biaya = :total_biaya,
			status_pulang = :status_pulang,
			lama_ranap = :lama_ranap,
			dokter_pj = :dokter_pj,
			status_bayar = :status_bayar
		WHERE nomor_rawat = :nomor_rawat
	`
	_, err = tx.NamedExec(query, ri)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *rawatInapRepositoryImpl) Delete(c *fiber.Ctx, nomorRawat string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `DELETE FROM rawat_inap WHERE nomor_rawat = $1`
	_, err = tx.Exec(query, nomorRawat)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *rawatInapRepositoryImpl) FindPaginated(page, size int) ([]entity.RawatInap, int, error) {
	offset := (page - 1) * size

	var total int
	err := r.DB.Get(&total, "SELECT COUNT(*) FROM sik.rawat_inap")
	if err != nil {
		return nil, 0, err
	}

	var data []entity.RawatInap
	query := `
		SELECT * FROM sik.rawat_inap
		ORDER BY tanggal_masuk DESC, nomor_rawat DESC
		LIMIT $1 OFFSET $2
	`
	err = r.DB.Select(&data, query, size, offset)
	if err != nil {
		return nil, 0, err
	}

	totalPages := int(math.Ceil(float64(total) / float64(size)))
	return data, totalPages, nil
}
