package postgres

import (
	"github.com/ikti-its/khanza-api/internal/modules/ref/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/ref/internal/repository"
	"github.com/jmoiron/sqlx"
)

type refRepositoryImpl struct {
	DB *sqlx.DB
}

func NewRefRepository(db *sqlx.DB) repository.RefRepository {
	return &refRepositoryImpl{db}
}

func (r refRepositoryImpl) FindRole() ([]entity.Role, error) {
	query := `
		SELECT id, nama
		FROM ref.role
	`

	var records []entity.Role
	err := r.DB.Select(&records, query)

	return records, err
}

func (r refRepositoryImpl) FindJabatan() ([]entity.Jabatan, error) {
	query := `
		SELECT id, nama
		FROM ref.jabatan
	`

	var records []entity.Jabatan
	err := r.DB.Select(&records, query)

	return records, err
}

func (r refRepositoryImpl) FindDepartemen() ([]entity.Departemen, error) {
	query := `
		SELECT id, nama
		FROM ref.departemen
	`

	var records []entity.Departemen
	err := r.DB.Select(&records, query)

	return records, err
}

func (r refRepositoryImpl) FindStatusAktif() ([]entity.StatusAktif, error) {
	query := `
		SELECT id, nama
		FROM ref.status_aktif_pegawai
	`

	var records []entity.StatusAktif
	err := r.DB.Select(&records, query)

	return records, err
}

func (r refRepositoryImpl) InsertShift(shift *entity.Shift) error {
	query := `
		INSERT INTO ref.shift
		VALUES ($1, $2, $3, $4)
	`

	_, err := r.DB.Exec(query, shift.Id, shift.Nama, shift.JamMasuk, shift.JamPulang)

	return err
}

func (r refRepositoryImpl) FindShift() ([]entity.Shift, error) {
	query := `
		SELECT id, nama, jam_masuk, jam_pulang
		FROM ref.shift
	`

	var records []entity.Shift
	err := r.DB.Select(&records, query)

	return records, err
}

func (r refRepositoryImpl) FindShiftById(id string) (entity.Shift, error) {
	query := `
		SELECT id, nama, jam_masuk, jam_pulang
		FROM ref.shift
		WHERE id = $1
	`

	var record entity.Shift
	err := r.DB.Get(&record, query, id)

	return record, err
}

func (r refRepositoryImpl) UpdateShift(shift *entity.Shift) error {
	query := `
		UPDATE ref.shift
		SET id = $1, nama = $2, jam_masuk = $3, jam_pulang = $4
		WHERE id = $1
	`

	_, err := r.DB.Exec(query, shift.Id, shift.Nama, shift.JamMasuk, shift.JamPulang)

	return err
}

func (r refRepositoryImpl) DeleteShift(shift *entity.Shift) error {
	query := `
		DELETE FROM ref.shift
		WHERE id = $1
	`

	_, err := r.DB.Exec(query, shift.Id)

	return err
}

func (r refRepositoryImpl) FindAlasanCuti() ([]entity.AlasanCuti, error) {
	query := `
		SELECT id, nama
		FROM ref.alasan_cuti
	`

	var records []entity.AlasanCuti
	err := r.DB.Select(&records, query)

	return records, err
}

func (r refRepositoryImpl) FindKodePresensi(tanggal string) (entity.KodePresensi, error) {
	query := `
		SELECT kode
		FROM ref.kode_presensi
		WHERE tanggal = $1
	`

	var record entity.KodePresensi
	err := r.DB.Get(&record, query, tanggal)

	return record, err
}

func (r refRepositoryImpl) FindIndustriFarmasi() ([]entity.IndustriFarmasi, error) {
	query := `
		SELECT id, kode, nama, alamat, kota, telepon
		FROM ref.industri_farmasi
	`

	var records []entity.IndustriFarmasi
	err := r.DB.Select(&records, query)

	return records, err
}

func (r refRepositoryImpl) FindSatuanBarangMedis() ([]entity.SatuanBarangMedis, error) {
	query := `
		SELECT id, nama
		FROM ref.satuan_barang_medis
	`

	var records []entity.SatuanBarangMedis
	err := r.DB.Select(&records, query)

	return records, err
}

func (r refRepositoryImpl) FindJenisBarangMedis() ([]entity.JenisBarangMedis, error) {
	query := `
		SELECT id, nama
		FROM ref.jenis_barang_medis
	`

	var records []entity.JenisBarangMedis
	err := r.DB.Select(&records, query)

	return records, err
}

func (r refRepositoryImpl) FindKategoriBarangMedis() ([]entity.KategoriBarangMedis, error) {
	query := `
		SELECT id, nama
		FROM ref.kategori_barang_medis
	`

	var records []entity.KategoriBarangMedis
	err := r.DB.Select(&records, query)

	return records, err
}

func (r refRepositoryImpl) FindGolonganBarangMedis() ([]entity.GolonganBarangMedis, error) {
	query := `
		SELECT id, nama
		FROM ref.golongan_barang_medis
	`

	var records []entity.GolonganBarangMedis
	err := r.DB.Select(&records, query)

	return records, err
}

func (r refRepositoryImpl) FindRuangan() ([]entity.Ruangan, error) {
	query := `
		SELECT id, nama
		FROM ref.ruangan
	`

	var records []entity.Ruangan
	err := r.DB.Select(&records, query)

	return records, err
}

func (r refRepositoryImpl) FindSupplierBarangMedis() ([]entity.SupplierBarangMedis, error) {
	query := `
		SELECT id, nama, alamat, no_telp, kota, nama_bank, no_rekening
		FROM ref.supplier_barang_medis
	`

	var records []entity.SupplierBarangMedis
	err := r.DB.Select(&records, query)

	return records, err
}
