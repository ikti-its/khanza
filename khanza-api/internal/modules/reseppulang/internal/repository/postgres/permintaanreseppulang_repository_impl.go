package postgres

import (
	"database/sql"
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/repository"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type permintaanResepPulangRepositoryImpl struct {
	DB *sqlx.DB
}

func NewPermintaanResepPulangRepository(db *sqlx.DB) repository.PermintaanResepPulangRepository {
	return &permintaanResepPulangRepositoryImpl{DB: db}
}

func (r *permintaanResepPulangRepositoryImpl) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func (r *permintaanResepPulangRepositoryImpl) FindAll() ([]entity.PermintaanResepPulang, error) {
	query := `SELECT * FROM permintaan_resep_pulang ORDER BY tgl_permintaan DESC, jam DESC`
	var list []entity.PermintaanResepPulang
	err := r.DB.Select(&list, query)
	return list, err
}

func (r *permintaanResepPulangRepositoryImpl) FindByNoRawat(noRawat string) ([]entity.PermintaanResepPulang, error) {
	query := `SELECT * FROM permintaan_resep_pulang WHERE no_rawat = $1 ORDER BY tgl_permintaan DESC, jam DESC`
	var list []entity.PermintaanResepPulang
	err := r.DB.Select(&list, query, noRawat)
	return list, err
}

func (r *permintaanResepPulangRepositoryImpl) FindByNoPermintaan(noPermintaan string) (*entity.PermintaanResepPulang, error) {
	var data entity.PermintaanResepPulang
	query := `SELECT * FROM permintaan_resep_pulang WHERE no_permintaan = $1 LIMIT 1`
	err := r.DB.Get(&data, query, noPermintaan)
	if err != nil {
		if err == sql.ErrNoRows {
			// ✅ Kembalikan error agar usecase tahu data tidak ada
			return nil, fmt.Errorf("data not found for no_permintaan %s", noPermintaan)
		}
		return nil, err
	}
	return &data, nil
}

func (r *permintaanResepPulangRepositoryImpl) InsertMany(c *fiber.Ctx, perms []*entity.PermintaanResepPulang) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	// ✅ Set audit user
	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO permintaan_resep_pulang (
			no_permintaan, tgl_permintaan, jam, no_rawat, kd_dokter,
			status, tgl_validasi, jam_validasi,
			kode_brng, jumlah, aturan_pakai
		) VALUES (
			$1, $2, $3, $4, $5,
			$6, $7, $8,
			$9, $10, $11
		)
	`

	for _, p := range perms {
		_, err := tx.Exec(query,
			p.NoPermintaan, p.TglPermintaan, p.Jam, p.NoRawat, p.KdDokter,
			p.Status, p.TglValidasi, p.JamValidasi,
			p.KodeBrng, p.Jumlah, p.AturanPakai,
		)
		if err != nil {
			return err
		}
	}

	return tx.Commit()
}

func (r *permintaanResepPulangRepositoryImpl) Update(c *fiber.Ctx, p *entity.PermintaanResepPulang) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	// ✅ Set audit user
	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		UPDATE permintaan_resep_pulang SET 
			tgl_permintaan = $2, jam = $3, no_rawat = $4,
			kd_dokter = $5, status = $6, tgl_validasi = $7, jam_validasi = $8,
			kode_brng = $9, jumlah = $10, aturan_pakai = $11
		WHERE no_permintaan = $1 AND kode_brng = $9
	`

	_, err = tx.Exec(query,
		p.NoPermintaan, p.TglPermintaan, p.Jam, p.NoRawat,
		p.KdDokter, p.Status, p.TglValidasi, p.JamValidasi,
		p.KodeBrng, p.Jumlah, p.AturanPakai,
	)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *permintaanResepPulangRepositoryImpl) Delete(c *fiber.Ctx, noPermintaan string) error {
	tx, err := r.DB.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	// ✅ Set audit user
	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `DELETE FROM permintaan_resep_pulang WHERE no_permintaan = $1`
	_, err = tx.Exec(query, noPermintaan)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *permintaanResepPulangRepositoryImpl) GetByNoPermintaan(noPermintaan string) ([]entity.PermintaanResepPulang, error) {
	var results []entity.PermintaanResepPulang
	query := `SELECT * FROM permintaan_resep_pulang WHERE no_permintaan = $1`

	err := r.DB.Select(&results, query, noPermintaan)
	if err != nil {
		return nil, err
	}
	return results, nil
}

func (r *permintaanResepPulangRepositoryImpl) GetByNoPermintaanWithHarga(noPermintaan string) ([]entity.ResepPulangObat, error) {
	var results []entity.ResepPulangObat

	query := `
		SELECT 
			prp.no_permintaan,
			prp.kode_brng,
			prp.jumlah,
			prp.aturan_pakai,
			db.nama_brng AS nama_obat,
			db.dasar AS harga_dasar,
			db.kelas1,
			db.kelas2,
			db.kelas3,
			db.utama,
			db.vip,
			db.vvip
		FROM permintaan_resep_pulang prp
		LEFT JOIN databarang db ON prp.kode_brng = db.kode_brng
		WHERE prp.no_permintaan = $1;
	`

	err := r.DB.Select(&results, query, noPermintaan)
	if err != nil {
		return nil, err
	}
	return results, nil
}
