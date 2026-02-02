package postgres

import (
	"context"
	"fmt"

	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/repository"
	"github.com/jmoiron/sqlx"
)

type permintaanStokObatRepositoryImpl struct {
	DB *sqlx.DB
}

func NewPermintaanStokObatRepository(db *sqlx.DB) repository.PermintaanStokObatRepository {
	return &permintaanStokObatRepositoryImpl{DB: db}
}

func (r *permintaanStokObatRepositoryImpl) Insert(p *entity.PermintaanStokObat) error {
	query := `
		INSERT INTO permintaan_stok_obat (
			no_permintaan, tgl_permintaan, jam, no_rawat, kd_dokter,
			status, tgl_validasi, jam_validasi
		) VALUES (
			$1, $2, $3, $4, $5,
			$6, $7, $8
		)
	`
	_, err := r.DB.Exec(query,
		p.NoPermintaan, p.TglPermintaan, p.JamPermintaan, p.NoRawat, p.KdDokter,
		p.Status, p.TglValidasi, p.JamValidasi,
	)
	return err
}

func (r *permintaanStokObatRepositoryImpl) FindAll() ([]entity.PermintaanStokObat, error) {
	query := `SELECT * FROM permintaan_stok_obat ORDER BY no_permintaan DESC`
	var list []entity.PermintaanStokObat
	err := r.DB.Select(&list, query)
	return list, err
}

func (r *permintaanStokObatRepositoryImpl) FindByNoPermintaan(noPermintaan string) (*entity.PermintaanStokObat, error) {
	query := `SELECT * FROM permintaan_stok_obat WHERE no_permintaan = $1`
	var permintaan entity.PermintaanStokObat
	err := r.DB.Get(&permintaan, query, noPermintaan)
	if err != nil {
		return nil, err
	}
	return &permintaan, nil
}

func (r *permintaanStokObatRepositoryImpl) Update(p *entity.PermintaanStokObat) error {
	query := `
		UPDATE permintaan_stok_obat SET 
			tgl_permintaan = $2,
			jam = $3,
			no_rawat = $4,
			kd_dokter = $5,
			status = $6,
			tgl_validasi = $7,
			jam_validasi = $8
		WHERE no_permintaan = $1
	`
	_, err := r.DB.Exec(query,
		p.NoPermintaan, p.TglPermintaan, p.JamPermintaan, p.NoRawat, p.KdDokter,
		p.Status, p.TglValidasi, p.JamValidasi,
	)
	return err
}

func (r *permintaanStokObatRepositoryImpl) Delete(noPermintaan string) error {
	query := `DELETE FROM permintaan_stok_obat WHERE no_permintaan = $1`
	_, err := r.DB.Exec(query, noPermintaan)
	return err
}

func (r *permintaanStokObatRepositoryImpl) GetByNomorRawat(nomorRawat string) ([]entity.PermintaanStokObat, error) {
	query := `SELECT * FROM permintaan_stok_obat WHERE no_rawat = $1`
	var permintaans []entity.PermintaanStokObat
	err := r.DB.Select(&permintaans, query, nomorRawat)
	return permintaans, err
}

func (r *permintaanStokObatRepositoryImpl) UpdateValidasi(ctx context.Context, noPermintaan string, tglValidasi, jamValidasi string) error {
	query := `
		UPDATE permintaan_stok_obat 
		SET status = 'Sudah', tgl_validasi = $1, jam_validasi = $2
		WHERE no_permintaan = $3
	`
	_, err := r.DB.ExecContext(ctx, query, tglValidasi, jamValidasi, noPermintaan)
	return err
}

func (r *permintaanStokObatRepositoryImpl) InsertWithDetail(
	tx *sqlx.Tx,
	permintaan *entity.PermintaanStokObat,
	details []entity.StokObatPasien,
) error {
	// Insert ke permintaan_stok_obat
	_, err := tx.NamedExec(`
		INSERT INTO sik.permintaan_stok_obat (
			no_permintaan, tgl_permintaan, jam, no_rawat,
			kd_dokter, status, tgl_validasi, jam_validasi
		) VALUES (
			:no_permintaan, :tgl_permintaan, :jam, :no_rawat,
			:kd_dokter, :status, :tgl_validasi, :jam_validasi
		)`, permintaan)
	if err != nil {
		return err
	}
	fmt.Printf("🧪 Repository: inserting %d detail(s)\n", len(details))
	// Insert detail ke stok_obat_pasien
	for _, d := range details {
		_, err := tx.NamedExec(`
			INSERT INTO sik.stok_obat_pasien (
			no_permintaan, tanggal, jam, no_rawat, kode_brng,
			jumlah, kd_bangsal, no_batch, no_faktur, aturan_pakai,
			jam00, jam01, jam02, jam03, jam04, jam05, jam06,
			jam07, jam08, jam09, jam10, jam11, jam12, jam13,
			jam14, jam15, jam16, jam17, jam18, jam19, jam20,
			jam21, jam22, jam23
		) VALUES (
			:no_permintaan, :tanggal, :jam, :no_rawat, :kode_brng,
			:jumlah, :kd_bangsal, :no_batch, :no_faktur, :aturan_pakai,
			:jam00, :jam01, :jam02, :jam03, :jam04, :jam05, :jam06,
			:jam07, :jam08, :jam09, :jam10, :jam11, :jam12, :jam13,
			:jam14, :jam15, :jam16, :jam17, :jam18, :jam19, :jam20,
			:jam21, :jam22, :jam23
		)`, d)
		if err != nil {
			return err
		}
	}

	return nil
}
