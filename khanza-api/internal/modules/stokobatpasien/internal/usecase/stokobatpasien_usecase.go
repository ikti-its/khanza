package usecase

import (
	"database/sql"
	"fmt"

	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/repository"
)

type StokObatPasienUseCase struct {
	Repository repository.StokObatPasienRepository
}

func NewStokObatPasienUseCase(repo repository.StokObatPasienRepository) *StokObatPasienUseCase {
	return &StokObatPasienUseCase{Repository: repo}
}

func (u *StokObatPasienUseCase) Create(request *model.StokObatPasienRequest) (*model.StokObatPasienResponse, error) {
	data := entity.StokObatPasien{
		NoPermintaan: request.NoPermintaan,
		Tanggal:      request.Tanggal,
		Jam:          request.Jam,
		NoRawat:      request.NoRawat,
		KodeBrng:     request.KodeBrng,
		Jumlah:       request.Jumlah,
		KdBangsal:    request.KdBangsal,
		NoBatch:      request.NoBatch,
		NoFaktur:     request.NoFaktur,
		AturanPakai:  request.AturanPakai,
		Jam00:        request.Jam00, Jam01: request.Jam01, Jam02: request.Jam02, Jam03: request.Jam03,
		Jam04: request.Jam04, Jam05: request.Jam05, Jam06: request.Jam06, Jam07: request.Jam07,
		Jam08: request.Jam08, Jam09: request.Jam09, Jam10: request.Jam10, Jam11: request.Jam11,
		Jam12: request.Jam12, Jam13: request.Jam13, Jam14: request.Jam14, Jam15: request.Jam15,
		Jam16: request.Jam16, Jam17: request.Jam17, Jam18: request.Jam18, Jam19: request.Jam19,
		Jam20: request.Jam20, Jam21: request.Jam21, Jam22: request.Jam22, Jam23: request.Jam23,
	}

	if err := u.Repository.Insert(&data); err != nil {
		return nil, fmt.Errorf("failed to insert stok_obat_pasien: %v", err)
	}

	return &model.StokObatPasienResponse{
		Code:   201,
		Status: "Created",
		Data: model.StokObatPasien{
			NoPermintaan: request.NoPermintaan,
			Tanggal:      request.Tanggal,
			Jam:          request.Jam,
			NoRawat:      request.NoRawat,
			KodeBrng:     request.KodeBrng,
			Jumlah:       request.Jumlah,
			KdBangsal:    request.KdBangsal,
			NoBatch:      request.NoBatch,
			NoFaktur:     request.NoFaktur,
			AturanPakai:  request.AturanPakai,
			Jam00:        request.Jam00, Jam01: request.Jam01, Jam02: request.Jam02, Jam03: request.Jam03,
			Jam04: request.Jam04, Jam05: request.Jam05, Jam06: request.Jam06, Jam07: request.Jam07,
			Jam08: request.Jam08, Jam09: request.Jam09, Jam10: request.Jam10, Jam11: request.Jam11,
			Jam12: request.Jam12, Jam13: request.Jam13, Jam14: request.Jam14, Jam15: request.Jam15,
			Jam16: request.Jam16, Jam17: request.Jam17, Jam18: request.Jam18, Jam19: request.Jam19,
			Jam20: request.Jam20, Jam21: request.Jam21, Jam22: request.Jam22, Jam23: request.Jam23,
		},
	}, nil

}

func (u *StokObatPasienUseCase) GetAll() ([]model.StokObatPasien, error) {
	data, err := u.Repository.FindAll()
	if err != nil {
		return nil, err
	}

	var result []model.StokObatPasien
	for _, d := range data {
		namaPasien := "N/A"
		if d.NamaPasien.Valid {
			namaPasien = d.NamaPasien.String
		}

		result = append(result, model.StokObatPasien{
			NoPermintaan: d.NoPermintaan,
			Tanggal:      d.Tanggal,
			Jam:          d.Jam,
			NoRawat:      d.NoRawat,
			KodeBrng:     d.KodeBrng,
			Jumlah:       d.Jumlah,
			KdBangsal:    d.KdBangsal,
			NoBatch:      d.NoBatch,
			NoFaktur:     d.NoFaktur,
			AturanPakai:  d.AturanPakai,
			NamaPasien:   namaPasien,
			Jam00:        d.Jam00, Jam01: d.Jam01, Jam02: d.Jam02, Jam03: d.Jam03,
			Jam04: d.Jam04, Jam05: d.Jam05, Jam06: d.Jam06, Jam07: d.Jam07,
			Jam08: d.Jam08, Jam09: d.Jam09, Jam10: d.Jam10, Jam11: d.Jam11,
			Jam12: d.Jam12, Jam13: d.Jam13, Jam14: d.Jam14, Jam15: d.Jam15,
			Jam16: d.Jam16, Jam17: d.Jam17, Jam18: d.Jam18, Jam19: d.Jam19,
			Jam20: d.Jam20, Jam21: d.Jam21, Jam22: d.Jam22, Jam23: d.Jam23,
		})
	}
	return result, nil
}

func (u *StokObatPasienUseCase) GetByNoPermintaan(noPermintaan string) ([]model.StokObatPasien, error) {
	data, err := u.Repository.FindByNoPermintaan(noPermintaan)
	if err != nil {
		return nil, err
	}

	var result []model.StokObatPasien
	for _, d := range data {
		result = append(result, model.StokObatPasien{
			NoPermintaan: d.NoPermintaan,
			Tanggal:      d.Tanggal,
			Jam:          d.Jam,
			NoRawat:      d.NoRawat,
			KodeBrng:     d.KodeBrng,
			Jumlah:       d.Jumlah,
			KdBangsal:    d.KdBangsal,
			NoBatch:      d.NoBatch,
			NoFaktur:     d.NoFaktur,
			AturanPakai:  d.AturanPakai,
			NamaPasien:   d.NamaPasien.String,
			Jam00:        d.Jam00, Jam01: d.Jam01, Jam02: d.Jam02, Jam03: d.Jam03,
			Jam04: d.Jam04, Jam05: d.Jam05, Jam06: d.Jam06, Jam07: d.Jam07,
			Jam08: d.Jam08, Jam09: d.Jam09, Jam10: d.Jam10, Jam11: d.Jam11,
			Jam12: d.Jam12, Jam13: d.Jam13, Jam14: d.Jam14, Jam15: d.Jam15,
			Jam16: d.Jam16, Jam17: d.Jam17, Jam18: d.Jam18, Jam19: d.Jam19,
			Jam20: d.Jam20, Jam21: d.Jam21, Jam22: d.Jam22, Jam23: d.Jam23,
		})
	}

	return result, nil
}

func (u *StokObatPasienUseCase) Update(request *model.StokObatPasienRequest) (*model.StokObatPasienResponse, error) {
	data := entity.StokObatPasien{
		NoPermintaan: request.NoPermintaan,
		Tanggal:      request.Tanggal,
		Jam:          request.Jam,
		NoRawat:      request.NoRawat,
		KodeBrng:     request.KodeBrng,
		Jumlah:       request.Jumlah,
		KdBangsal:    request.KdBangsal,
		NoBatch:      request.NoBatch,
		NoFaktur:     request.NoFaktur,
		AturanPakai:  request.AturanPakai,
		NamaPasien:   sql.NullString{String: request.NamaPasien, Valid: request.NamaPasien != ""},

		Jam00: request.Jam00, Jam01: request.Jam01, Jam02: request.Jam02, Jam03: request.Jam03,
		Jam04: request.Jam04, Jam05: request.Jam05, Jam06: request.Jam06, Jam07: request.Jam07,
		Jam08: request.Jam08, Jam09: request.Jam09, Jam10: request.Jam10, Jam11: request.Jam11,
		Jam12: request.Jam12, Jam13: request.Jam13, Jam14: request.Jam14, Jam15: request.Jam15,
		Jam16: request.Jam16, Jam17: request.Jam17, Jam18: request.Jam18, Jam19: request.Jam19,
		Jam20: request.Jam20, Jam21: request.Jam21, Jam22: request.Jam22, Jam23: request.Jam23,
	}

	if err := u.Repository.Update(&data); err != nil {
		return nil, fmt.Errorf("update failed: %v", err)
	}

	return &model.StokObatPasienResponse{
		Code:   201,
		Status: "Created",
		Data: model.StokObatPasien{
			NoPermintaan: request.NoPermintaan,
			Tanggal:      request.Tanggal,
			Jam:          request.Jam,
			NoRawat:      request.NoRawat,
			KodeBrng:     request.KodeBrng,
			Jumlah:       request.Jumlah,
			KdBangsal:    request.KdBangsal,
			NoBatch:      request.NoBatch,
			NoFaktur:     request.NoFaktur,
			AturanPakai:  request.AturanPakai,
			NamaPasien:   request.NamaPasien,
			Jam00:        request.Jam00, Jam01: request.Jam01, Jam02: request.Jam02, Jam03: request.Jam03,
			Jam04: request.Jam04, Jam05: request.Jam05, Jam06: request.Jam06, Jam07: request.Jam07,
			Jam08: request.Jam08, Jam09: request.Jam09, Jam10: request.Jam10, Jam11: request.Jam11,
			Jam12: request.Jam12, Jam13: request.Jam13, Jam14: request.Jam14, Jam15: request.Jam15,
			Jam16: request.Jam16, Jam17: request.Jam17, Jam18: request.Jam18, Jam19: request.Jam19,
			Jam20: request.Jam20, Jam21: request.Jam21, Jam22: request.Jam22, Jam23: request.Jam23,
		},
	}, nil

}

func (u *StokObatPasienUseCase) DeleteByNoPermintaan(noPermintaan string) error {
	return u.Repository.DeleteByNoPermintaan(noPermintaan)
}

func (u *StokObatPasienUseCase) GetByNomorRawat(nomorRawat string) ([]model.StokObatPasien, error) {
	data, err := u.Repository.GetByNomorRawat(nomorRawat)
	if err != nil {
		return nil, err
	}

	var result []model.StokObatPasien
	for _, d := range data {
		result = append(result, model.StokObatPasien{
			NoPermintaan: d.NoPermintaan,
			Tanggal:      d.Tanggal,
			Jam:          d.Jam,
			NoRawat:      d.NoRawat,
			KodeBrng:     d.KodeBrng,
			Jumlah:       d.Jumlah,
			KdBangsal:    d.KdBangsal,
			NoBatch:      d.NoBatch,
			NoFaktur:     d.NoFaktur,
			AturanPakai:  d.AturanPakai,
			NamaPasien:   d.NamaPasien.String,
			Jam00:        d.Jam00, Jam01: d.Jam01, Jam02: d.Jam02, Jam03: d.Jam03,
			Jam04: d.Jam04, Jam05: d.Jam05, Jam06: d.Jam06, Jam07: d.Jam07,
			Jam08: d.Jam08, Jam09: d.Jam09, Jam10: d.Jam10, Jam11: d.Jam11,
			Jam12: d.Jam12, Jam13: d.Jam13, Jam14: d.Jam14, Jam15: d.Jam15,
			Jam16: d.Jam16, Jam17: d.Jam17, Jam18: d.Jam18, Jam19: d.Jam19,
			Jam20: d.Jam20, Jam21: d.Jam21, Jam22: d.Jam22, Jam23: d.Jam23,
		})
	}
	return result, nil
}
