package postgres

import (
	"log"

	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/repository"
	"github.com/jmoiron/sqlx"
)

type stokObatPasienRepositoryImpl struct {
	DB *sqlx.DB
}

func NewStokObatPasienRepository(db *sqlx.DB) repository.StokObatPasienRepository {
	return &stokObatPasienRepositoryImpl{DB: db}
}

func (r *stokObatPasienRepositoryImpl) Insert(p *entity.StokObatPasien) error {
	query := `
		INSERT INTO stok_obat_pasien (
			no_permintaan, tanggal, jam, no_rawat, kode_brng, jumlah, kd_bangsal,
			no_batch, no_faktur, aturan_pakai,
			jam00, jam01, jam02, jam03, jam04, jam05, jam06, jam07,
			jam08, jam09, jam10, jam11, jam12, jam13, jam14, jam15,
			jam16, jam17, jam18, jam19, jam20, jam21, jam22, jam23
		) VALUES (
			:no_permintaan, :tanggal, :jam, :no_rawat, :kode_brng, :jumlah, :kd_bangsal,
			:no_batch, :no_faktur, :aturan_pakai,
			:jam00, :jam01, :jam02, :jam03, :jam04, :jam05, :jam06, :jam07,
			:jam08, :jam09, :jam10, :jam11, :jam12, :jam13, :jam14, :jam15,
			:jam16, :jam17, :jam18, :jam19, :jam20, :jam21, :jam22, :jam23
		)
	`
	_, err := r.DB.NamedExec(query, p)
	return err
}

func (r *stokObatPasienRepositoryImpl) FindAll() ([]entity.StokObatPasien, error) {
	query := `
		SELECT 
			sop.*,
			ri.nama_pasien,
			COALESCE(db.nama_brng, 'N/A') AS nama_brng
		FROM stok_obat_pasien sop
		LEFT JOIN rawat_inap ri ON sop.no_rawat = ri.nomor_rawat
		LEFT JOIN databarang db ON sop.kode_brng = db.kode_brng
		ORDER BY sop.tanggal DESC, sop.jam DESC
	`
	log.Println("Running stok_obat_pasien query")
	var list []entity.StokObatPasien
	err := r.DB.Select(&list, query)
	if err != nil {
		log.Printf("Query failed: %v", err)
		return nil, err
	}

	return list, nil
}

func (r *stokObatPasienRepositoryImpl) FindByNoPermintaan(noPermintaan string) ([]entity.StokObatPasien, error) {
	query := `
		SELECT 
			sop.*,
			ri.nama_pasien,
			COALESCE(db.nama_brng, 'N/A') AS nama_brng
		FROM stok_obat_pasien sop
		LEFT JOIN rawat_inap ri ON sop.no_rawat = ri.nomor_rawat
		LEFT JOIN databarang db ON sop.kode_brng = db.kode_brng
		ORDER BY sop.tanggal DESC, sop.jam DESC
	`
	log.Println("Running stok_obat_pasien query")
	var result []entity.StokObatPasien
	err := r.DB.Select(&result, query, noPermintaan)
	return result, err
}

func (r *stokObatPasienRepositoryImpl) Update(p *entity.StokObatPasien) error {
	query := `
		UPDATE stok_obat_pasien SET
			tanggal = :tanggal,
			jam = :jam,
			no_rawat = :no_rawat,
			kode_brng = :kode_brng,
			jumlah = :jumlah,
			kd_bangsal = :kd_bangsal,
			no_batch = :no_batch,
			no_faktur = :no_faktur,
			aturan_pakai = :aturan_pakai,
			jam00 = :jam00, jam01 = :jam01, jam02 = :jam02, jam03 = :jam03,
			jam04 = :jam04, jam05 = :jam05, jam06 = :jam06, jam07 = :jam07,
			jam08 = :jam08, jam09 = :jam09, jam10 = :jam10, jam11 = :jam11,
			jam12 = :jam12, jam13 = :jam13, jam14 = :jam14, jam15 = :jam15,
			jam16 = :jam16, jam17 = :jam17, jam18 = :jam18, jam19 = :jam19,
			jam20 = :jam20, jam21 = :jam21, jam22 = :jam22, jam23 = :jam23
		WHERE no_permintaan = :no_permintaan AND kode_brng = :kode_brng AND tanggal = :tanggal AND jam = :jam
	`
	_, err := r.DB.NamedExec(query, p)
	return err
}

func (r *stokObatPasienRepositoryImpl) DeleteByNoPermintaan(noPermintaan string) error {
	query := `DELETE FROM stok_obat_pasien WHERE no_permintaan = $1`
	_, err := r.DB.Exec(query, noPermintaan)
	return err
}

func (r *stokObatPasienRepositoryImpl) GetByNomorRawat(nomorRawat string) ([]entity.StokObatPasien, error) {
	query := `
		SELECT sop.*, ri.nama_pasien
		FROM stok_obat_pasien sop
		LEFT JOIN rawat_inap ri ON sop.no_rawat = ri.nomor_rawat
		WHERE sop.no_rawat = $1
		ORDER BY sop.tanggal DESC, sop.jam DESC
	`
	log.Println("Running stok_obat_pasien query")
	var list []entity.StokObatPasien
	err := r.DB.Select(&list, query, nomorRawat)
	if err != nil {
		log.Printf("Query failed: %v", err) // ✅ log error
		return nil, err
	}

	return list, err
}
