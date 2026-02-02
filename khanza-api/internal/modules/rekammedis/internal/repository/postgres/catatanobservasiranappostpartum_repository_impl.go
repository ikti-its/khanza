package postgres

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/repository"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type catatanObservasiRanapPostpartumRepositoryImpl struct {
	DB *sqlx.DB
}

func NewCatatanObservasiRanapPostpartumRepository(db *sqlx.DB) repository.CatatanObservasiRanapPostpartumRepository {
	return &catatanObservasiRanapPostpartumRepositoryImpl{DB: db}
}

func (r *catatanObservasiRanapPostpartumRepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func (r *catatanObservasiRanapPostpartumRepositoryImpl) Insert(c *fiber.Ctx, data *entity.CatatanObservasiRanapPostpartum) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO catatan_observasi_ranap_postpartum (
			no_rawat, tgl_perawatan, jam_rawat, gcs, td, hr, rr, suhu,
			spo2, tfu, kontraksi, perdarahan, keterangan, nip
		) VALUES (
			:no_rawat, :tgl_perawatan, :jam_rawat, :gcs, :td, :hr, :rr, :suhu,
			:spo2, :tfu, :kontraksi, :perdarahan, :keterangan, :nip
		)
	`
	_, err = tx.NamedExec(query, data)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *catatanObservasiRanapPostpartumRepositoryImpl) FindAll() ([]entity.CatatanObservasiRanapPostpartum, error) {
	var list []entity.CatatanObservasiRanapPostpartum
	query := `SELECT * FROM catatan_observasi_ranap_postpartum ORDER BY tgl_perawatan DESC, jam_rawat DESC`
	err := r.DB.Select(&list, query)
	return list, err
}

func (r *catatanObservasiRanapPostpartumRepositoryImpl) FindByNoRawat(noRawat string) ([]entity.CatatanObservasiRanapPostpartum, error) {
	var list []entity.CatatanObservasiRanapPostpartum
	query := `SELECT * FROM catatan_observasi_ranap_postpartum WHERE no_rawat = $1 ORDER BY tgl_perawatan DESC, jam_rawat DESC`
	err := r.DB.Select(&list, query, noRawat)
	return list, err
}

func (r *catatanObservasiRanapPostpartumRepositoryImpl) FindByTanggal(tanggal string) ([]entity.CatatanObservasiRanapPostpartum, error) {
	var list []entity.CatatanObservasiRanapPostpartum
	query := `SELECT * FROM catatan_observasi_ranap_postpartum WHERE tgl_perawatan = $1 ORDER BY jam_rawat DESC`
	err := r.DB.Select(&list, query, tanggal)
	return list, err
}

func (r *catatanObservasiRanapPostpartumRepositoryImpl) FindByNoRawatAndTanggal(noRawat string, tanggal string) ([]entity.CatatanObservasiRanapPostpartum, error) {
	var list []entity.CatatanObservasiRanapPostpartum
	query := `SELECT * FROM catatan_observasi_ranap_postpartum WHERE no_rawat = $1 AND tgl_perawatan = $2 ORDER BY jam_rawat DESC`
	err := r.DB.Select(&list, query, noRawat, tanggal)
	return list, err
}

func (r *catatanObservasiRanapPostpartumRepositoryImpl) Update(c *fiber.Ctx, data *entity.CatatanObservasiRanapPostpartum) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		UPDATE catatan_observasi_ranap_postpartum SET
			gcs = :gcs, td = :td, hr = :hr, rr = :rr, suhu = :suhu,
			spo2 = :spo2, tfu = :tfu, kontraksi = :kontraksi,
			perdarahan = :perdarahan, keterangan = :keterangan, nip = :nip
		WHERE no_rawat = :no_rawat AND tgl_perawatan = :tgl_perawatan AND jam_rawat = :jam_rawat
	`
	_, err = tx.NamedExec(query, data)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *catatanObservasiRanapPostpartumRepositoryImpl) Delete(c *fiber.Ctx, noRawat string, tglPerawatan string, jamRawat string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `DELETE FROM catatan_observasi_ranap_postpartum WHERE no_rawat = $1 AND tgl_perawatan = $2 AND jam_rawat = $3`
	_, err = tx.Exec(query, noRawat, tglPerawatan, jamRawat)
	if err != nil {
		return err
	}

	return tx.Commit()
}
