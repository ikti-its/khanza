package postgres

import (
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis/internal/repository"
	"github.com/jmoiron/sqlx"
)

type resumePasienRanapRepositoryImpl struct {
	DB *sqlx.DB
}

func NewResumePasienRanapRepository(db *sqlx.DB) repository.ResumePasienRanapRepository {
	return &resumePasienRanapRepositoryImpl{DB: db}
}

func (r *resumePasienRanapRepositoryImpl) Insert(data *entity.ResumePasienRanap) error {
	query := `
		INSERT INTO resume_pasien_ranap (
			no_rawat, kondisi_keluar, keluhan_utama, jalannya_penyakit,
			pemeriksaan_penunjang, hasil_laborat, hasil_radiologi,
			diagnosis, terapi, tindak_lanjut, edukasi, nip
		) VALUES (
			:no_rawat, :kondisi_keluar, :keluhan_utama, :jalannya_penyakit,
			:pemeriksaan_penunjang, :hasil_laborat, :hasil_radiologi,
			:diagnosis, :terapi, :tindak_lanjut, :edukasi, :nip
		)
	`
	_, err := r.DB.NamedExec(query, data)
	return err
}

func (r *resumePasienRanapRepositoryImpl) FindAll() ([]entity.ResumePasienRanap, error) {
	var result []entity.ResumePasienRanap
	query := `SELECT * FROM resume_pasien_ranap ORDER BY no_rawat DESC`
	err := r.DB.Select(&result, query)
	return result, err
}

func (r *resumePasienRanapRepositoryImpl) FindByNoRawat(noRawat string) (*entity.ResumePasienRanap, error) {
	var resume entity.ResumePasienRanap
	query := `SELECT * FROM resume_pasien_ranap WHERE no_rawat = $1 LIMIT 1`
	err := r.DB.Get(&resume, query, noRawat)
	if err != nil {
		return nil, err
	}
	return &resume, nil
}

func (r *resumePasienRanapRepositoryImpl) Update(data *entity.ResumePasienRanap) error {
	query := `
		UPDATE resume_pasien_ranap SET
			kondisi_keluar = :kondisi_keluar,
			keluhan_utama = :keluhan_utama,
			jalannya_penyakit = :jalannya_penyakit,
			pemeriksaan_penunjang = :pemeriksaan_penunjang,
			hasil_laborat = :hasil_laborat,
			hasil_radiologi = :hasil_radiologi,
			diagnosis = :diagnosis,
			terapi = :terapi,
			tindak_lanjut = :tindak_lanjut,
			edukasi = :edukasi,
			nip = :nip
		WHERE no_rawat = :no_rawat
	`
	_, err := r.DB.NamedExec(query, data)
	return err
}

func (r *resumePasienRanapRepositoryImpl) Delete(noRawat string) error {
	query := `DELETE FROM resume_pasien_ranap WHERE no_rawat = $1`
	_, err := r.DB.Exec(query, noRawat)
	return err
}
