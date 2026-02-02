package usecase

import (
	"context"
	"fmt"

	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/repository"
	"github.com/jmoiron/sqlx"
)

type PermintaanStokObatUseCase struct {
	Repository repository.PermintaanStokObatRepository
	DB         *sqlx.DB
}

func NewPermintaanStokObatUseCase(repo repository.PermintaanStokObatRepository, db *sqlx.DB) *PermintaanStokObatUseCase {
	return &PermintaanStokObatUseCase{Repository: repo, DB: db}
}

func nilIfEmpty(s *string) *string {
	if s == nil || *s == "" {
		return nil
	}
	return s
}

func (u *PermintaanStokObatUseCase) Create(request *model.PermintaanStokObatRequest) (*model.PermintaanStokObatResponse, error) {
	entity := entity.PermintaanStokObat{
		NoPermintaan:  request.NoPermintaan,
		TglPermintaan: request.TglPermintaan,
		JamPermintaan: request.Jam,
		NoRawat:       request.NoRawat,
		KdDokter:      request.KdDokter,
		Status:        request.Status,
		TglValidasi:   nilIfEmpty(request.TglValidasi),
		JamValidasi:   nilIfEmpty(request.JamValidasi),
	}

	if err := u.Repository.Insert(&entity); err != nil {
		return nil, fmt.Errorf("failed to insert permintaan_stok_obat: %v", err)
	}

	return &model.PermintaanStokObatResponse{
		Code:   201,
		Status: "Created",
		Data: model.PermintaanStokObat{
			NoPermintaan:  entity.NoPermintaan,
			TglPermintaan: entity.TglPermintaan,
			Jam:           entity.JamPermintaan,
			NoRawat:       entity.NoRawat,
			KdDokter:      entity.KdDokter,
			Status:        entity.Status,
			TglValidasi:   entity.TglValidasi,
			JamValidasi:   entity.JamValidasi,
		},
	}, nil
}

func (u *PermintaanStokObatUseCase) GetAll() ([]model.PermintaanStokObat, error) {
	data, err := u.Repository.FindAll()
	if err != nil {
		return nil, err
	}

	var result []model.PermintaanStokObat
	for _, item := range data {
		result = append(result, model.PermintaanStokObat{
			NoPermintaan:  item.NoPermintaan,
			TglPermintaan: item.TglPermintaan,
			Jam:           item.JamPermintaan,
			NoRawat:       item.NoRawat,
			KdDokter:      item.KdDokter,
			Status:        item.Status,
			TglValidasi:   item.TglValidasi,
			JamValidasi:   item.JamValidasi,
		})
	}

	return result, nil
}

func (u *PermintaanStokObatUseCase) GetByNoPermintaan(noPermintaan string) (*model.PermintaanStokObat, error) {
	data, err := u.Repository.FindByNoPermintaan(noPermintaan)
	if err != nil {
		return nil, fmt.Errorf("permintaan_stok_obat not found: %v", err)
	}

	result := &model.PermintaanStokObat{
		NoPermintaan:  data.NoPermintaan,
		TglPermintaan: data.TglPermintaan,
		Jam:           data.JamPermintaan,
		NoRawat:       data.NoRawat,
		KdDokter:      data.KdDokter,
		Status:        data.Status,
		TglValidasi:   data.TglValidasi,
		JamValidasi:   data.JamValidasi,
	}

	return result, nil
}

func (u *PermintaanStokObatUseCase) Update(request *model.PermintaanStokObatRequest) (*model.PermintaanStokObatResponse, error) {
	entity := entity.PermintaanStokObat{
		NoPermintaan:  request.NoPermintaan,
		TglPermintaan: request.TglPermintaan,
		JamPermintaan: request.Jam,
		NoRawat:       request.NoRawat,
		KdDokter:      request.KdDokter,
		Status:        request.Status,
		TglValidasi:   nilIfEmpty(request.TglValidasi),
		JamValidasi:   nilIfEmpty(request.JamValidasi),
	}

	if err := u.Repository.Update(&entity); err != nil {
		return nil, fmt.Errorf("update failed: %v", err)
	}

	return &model.PermintaanStokObatResponse{
		Code:   200,
		Status: "Updated",
		Data: model.PermintaanStokObat{
			NoPermintaan:  entity.NoPermintaan,
			TglPermintaan: entity.TglPermintaan,
			Jam:           entity.JamPermintaan,
			NoRawat:       entity.NoRawat,
			KdDokter:      entity.KdDokter,
			Status:        entity.Status,
			TglValidasi:   entity.TglValidasi,
			JamValidasi:   entity.JamValidasi,
		},
	}, nil
}

func (u *PermintaanStokObatUseCase) Delete(noPermintaan string) error {
	return u.Repository.Delete(noPermintaan)
}

func (u *PermintaanStokObatUseCase) GetByNomorRawat(nomorRawat string) ([]entity.PermintaanStokObat, error) {
	return u.Repository.GetByNomorRawat(nomorRawat)
}

func (u *PermintaanStokObatUseCase) UpdateValidasi(ctx context.Context, noPermintaan, tglValidasi, jamValidasi string) error {
	return u.Repository.UpdateValidasi(ctx, noPermintaan, tglValidasi, jamValidasi)
}

func (u *PermintaanStokObatUseCase) CreateWithDetail(
	ctx context.Context,
	db *sqlx.DB,
	request *model.PermintaanStokObatRequest,
	detailReq []model.StokObatPasienRequest,
) error {
	tx, err := db.Beginx()
	if err != nil {
		return fmt.Errorf("failed to begin transaction: %w", err)
	}
	defer tx.Rollback() // in case of panic or failure
	fmt.Printf("🧪 DETAILS COUNT: %d\n", len(detailReq))
	for i, d := range detailReq {
		fmt.Printf("➡️  detail[%d]: %+v\n", i, d)
	}

	// 1. Map permintaan
	permintaan := &entity.PermintaanStokObat{
		NoPermintaan:  request.NoPermintaan,
		TglPermintaan: request.TglPermintaan,
		JamPermintaan: request.Jam,
		NoRawat:       request.NoRawat,
		KdDokter:      request.KdDokter,
		Status:        request.Status,
		TglValidasi:   nilIfEmpty(request.TglValidasi),
		JamValidasi:   nilIfEmpty(request.JamValidasi),
	}

	// 2. Map detail stok obat pasien
	var details []entity.StokObatPasien
	for _, d := range detailReq {
		details = append(details, entity.StokObatPasien{
			NoPermintaan: request.NoPermintaan,
			Tanggal:      d.Tanggal,
			Jam:          d.Jam,
			NoRawat:      d.NoRawat,
			KodeBrng:     d.KodeBrng,
			Jumlah:       d.Jumlah,
			KdBangsal:    d.KdBangsal,
			NoBatch:      d.NoBatch,
			NoFaktur:     d.NoFaktur,
			AturanPakai:  d.AturanPakai,
			Jam00:        d.Jam00,
			Jam01:        d.Jam01,
			Jam02:        d.Jam02,
			Jam03:        d.Jam03,
			Jam04:        d.Jam04,
			Jam05:        d.Jam05,
			Jam06:        d.Jam06,
			Jam07:        d.Jam07,
			Jam08:        d.Jam08,
			Jam09:        d.Jam09,
			Jam10:        d.Jam10,
			Jam11:        d.Jam11,
			Jam12:        d.Jam12,
			Jam13:        d.Jam13,
			Jam14:        d.Jam14,
			Jam15:        d.Jam15,
			Jam16:        d.Jam16,
			Jam17:        d.Jam17,
			Jam18:        d.Jam18,
			Jam19:        d.Jam19,
			Jam20:        d.Jam20,
			Jam21:        d.Jam21,
			Jam22:        d.Jam22,
			Jam23:        d.Jam23,
		})
	}

	// 3. Insert ke dua tabel dalam satu transaksi
	err = u.Repository.InsertWithDetail(tx, permintaan, details)
	if err != nil {
		return fmt.Errorf("failed to insert permintaan and stok_obat_pasien: %w", err)
	}

	return tx.Commit()
}

func (u *PermintaanStokObatUseCase) GetDB() *sqlx.DB {
	return u.DB
}
