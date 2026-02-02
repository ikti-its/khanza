package postgres

import (
	"fmt"
	"log"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/obat/internal/entity"
	gudangEntity "github.com/ikti-its/khanza-api/internal/modules/obat/internal/entity"
	"github.com/jmoiron/sqlx"
	"github.com/lib/pq"
)

type gudangBarangRepository struct {
	db *sqlx.DB
}

type GudangBarangRepository interface {
	Insert(c *fiber.Ctx, barang *entity.GudangBarang) error
	FindAll() ([]entity.GudangBarang, error)
	FindByID(id string) (*entity.GudangBarang, error)
	Update(c *fiber.Ctx, barang *entity.GudangBarang) error
	Delete(c *fiber.Ctx, id string) error
	FindByIDBarangMedis(idBarangMedis string) ([]entity.GudangBarang, error)
}

func NewGudangBarangRepository(db *sqlx.DB) GudangBarangRepository {
	return &gudangBarangRepository{db: db}
}

func (r *gudangBarangRepository) setUserAuditContext(tx *sqlx.Tx, c *fiber.Ctx) error {
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

func (r *gudangBarangRepository) Insert(c *fiber.Ctx, barang *entity.GudangBarang) error {
	tx, err := r.db.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		INSERT INTO sik.gudang_barang (id, id_barang_medis, id_ruangan, stok, no_batch, no_faktur)
		VALUES (:id, :id_barang_medis, :id_ruangan, :stok, :no_batch, :no_faktur)
	`
	_, err = tx.NamedExec(query, barang)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *gudangBarangRepository) FindAll() ([]entity.GudangBarang, error) {
	var result []entity.GudangBarang
	query := `
		SELECT 
			gb.id, 
			gb.id_barang_medis, 
			gb.id_ruangan, 
			gb.stok, 
			gb.no_batch, 
			gb.no_faktur,
			db.kapasitas
		FROM sik.gudang_barang gb
		JOIN sik.databarang db ON gb.id_barang_medis = db.kode_brng
		ORDER BY gb.id ASC
	`
	err := r.db.Select(&result, query)
	return result, err
}

func (r *gudangBarangRepository) FindByID(id string) (*entity.GudangBarang, error) {
	var result entity.GudangBarang

	query := `
		SELECT 
			gb.id, 
			gb.id_barang_medis, 
			gb.id_ruangan, 
			gb.stok, 
			gb.no_batch, 
			gb.no_faktur,
			db.kapasitas
		FROM sik.gudang_barang gb
		JOIN sik.databarang db ON gb.id_barang_medis = db.kode_brng
		WHERE gb.id_barang_medis = $1
		LIMIT 1
	`
	err := r.db.Get(&result, query, id)
	log.Printf("🔍 GudangBarang response: %+v", result)
	if err != nil {
		return nil, err
	}
	return &result, nil
}

func (r *gudangBarangRepository) Update(c *fiber.Ctx, barang *entity.GudangBarang) error {
	tx, err := r.db.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `
		UPDATE sik.gudang_barang
		SET id_barang_medis = :id_barang_medis,
			id_ruangan = :id_ruangan,
			stok = :stok,
			no_batch = :no_batch,
			no_faktur = :no_faktur
		WHERE id = :id
	`
	_, err = tx.NamedExec(query, barang)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *gudangBarangRepository) Delete(c *fiber.Ctx, id string) error {
	tx, err := r.db.Beginx()
	if err != nil {
		return err
	}
	defer tx.Rollback()

	if err := r.setUserAuditContext(tx, c); err != nil {
		return err
	}

	query := `DELETE FROM sik.gudang_barang WHERE id = $1`
	_, err = tx.Exec(query, id)
	if err != nil {
		return err
	}

	return tx.Commit()
}

func (r *gudangBarangRepository) FindByIDBarangMedis(idBarangMedis string) ([]gudangEntity.GudangBarang, error) {
	var result []gudangEntity.GudangBarang
	log.Printf("→ TYPE CHECK: IDBarangMedis is %T\n", result[0].IDBarangMedis)
	log.Printf(">> Using GudangBarang from: %T\n", result)
	query := `
		SELECT id, id_barang_medis, id_ruangan, stok, no_batch, no_faktur
		FROM sik.gudang_barang
		WHERE id_barang_medis = $1
	`

	err := r.db.Select(&result, query, idBarangMedis)
	return result, err
}
