package postgres

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/repository"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type catatanObservasiRanapKebidananRepositoryImpl struct {
	DB *sqlx.DB
}

func NewCatatanObservasiRanapKebidananRepository(db *sqlx.DB) repository.CatatanObservasiRanapKebidananRepository {
	return &catatanObservasiRanapKebidananRepositoryImpl{DB: db}
}

func (r *catatanObservasiRanapKebidananRepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func (r *catatanObservasiRanapKebidananRepositoryImpl) Insert(c *fiber.Ctx, data *entity.CatatanObservasiRanapKebidanan) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO catatan_observasi_ranap_kebidanan (
			no_rawat, tgl_perawatan, jam_rawat, gcs, td, hr, rr, suhu, spo2,
			kontraksi, bjj, ppv, vt, nip
		) VALUES (
			:no_rawat, :tgl_perawatan, :jam_rawat, :gcs, :td, :hr, :rr, :suhu, :spo2,
			:kontraksi, :bjj, :ppv, :vt, :nip
		)`
	_, err = tx.NamedExec(query, data)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *catatanObservasiRanapKebidananRepositoryImpl) FindAll() ([]entity.CatatanObservasiRanapKebidanan, error) {
	var list []entity.CatatanObservasiRanapKebidanan
	query := `SELECT * FROM catatan_observasi_ranap_kebidanan ORDER BY tgl_perawatan DESC, jam_rawat DESC`
	err := r.DB.Select(&list, query)
	return list, err
}

func (r *catatanObservasiRanapKebidananRepositoryImpl) FindByNoRawat(noRawat string) ([]entity.CatatanObservasiRanapKebidanan, error) {
	var list []entity.CatatanObservasiRanapKebidanan
	query := `SELECT * FROM catatan_observasi_ranap_kebidanan WHERE no_rawat = $1 ORDER BY tgl_perawatan DESC, jam_rawat DESC`
	err := r.DB.Select(&list, query, noRawat)
	return list, err
}

func (r *catatanObservasiRanapKebidananRepositoryImpl) FindByTanggal(tanggal string) ([]entity.CatatanObservasiRanapKebidanan, error) {
	var list []entity.CatatanObservasiRanapKebidanan
	query := `SELECT * FROM catatan_observasi_ranap_kebidanan WHERE tgl_perawatan = $1 ORDER BY jam_rawat DESC`
	err := r.DB.Select(&list, query, tanggal)
	return list, err
}

func (r *catatanObservasiRanapKebidananRepositoryImpl) FindByNoRawatAndTanggal(noRawat string, tanggal string) ([]entity.CatatanObservasiRanapKebidanan, error) {
	var list []entity.CatatanObservasiRanapKebidanan
	query := `SELECT * FROM catatan_observasi_ranap_kebidanan WHERE no_rawat = $1 AND tgl_perawatan = $2 ORDER BY jam_rawat DESC`
	err := r.DB.Select(&list, query, noRawat, tanggal)
	return list, err
}

func (r *catatanObservasiRanapKebidananRepositoryImpl) Update(c *fiber.Ctx, data *entity.CatatanObservasiRanapKebidanan) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		UPDATE catatan_observasi_ranap_kebidanan SET
			gcs = :gcs, td = :td, hr = :hr, rr = :rr, suhu = :suhu, spo2 = :spo2,
			kontraksi = :kontraksi, bjj = :bjj, ppv = :ppv, vt = :vt, nip = :nip
		WHERE no_rawat = :no_rawat AND tgl_perawatan = :tgl_perawatan AND jam_rawat = :jam_rawat
	`
	_, err = tx.NamedExec(query, data)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *catatanObservasiRanapKebidananRepositoryImpl) Delete(c *fiber.Ctx, noRawat, tglPerawatan, jamRawat string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `DELETE FROM catatan_observasi_ranap_kebidanan WHERE no_rawat = $1 AND tgl_perawatan = $2 AND jam_rawat = $3`
	_, err = tx.Exec(query, noRawat, tglPerawatan, jamRawat)
	if err != nil {
		return err
	}

	return tx.Commit()
}
