package usecase

import (
	"fmt"
	"strings"
	"time"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/obat/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/obat/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/obat/internal/repository"
)

type PemberianObatUseCase struct {
	Repository repository.PemberianObatRepository
}

func ptrStr(s string) *string {
	if s == "" {
		return nil
	}
	return &s
}

func ptrFloat(f float64) *float64 {
	if f == 0 {
		return nil
	}
	return &f
}

func derefStr(s *string) string {
	if s == nil {
		return ""
	}
	return *s
}

func derefFloat(f *float64) float64 {
	if f == nil {
		return 0
	}
	return *f
}

func NewPemberianObatUseCase(repo repository.PemberianObatRepository) *PemberianObatUseCase {
	return &PemberianObatUseCase{Repository: repo}
}

func (u *PemberianObatUseCase) Create(c *fiber.Ctx, request *model.PemberianObatRequest) (model.PemberianObatResponse, error) {
	tgl, err := time.Parse("2006-01-02", request.TanggalBeri)
	if err != nil {
		return model.PemberianObatResponse{}, fmt.Errorf("invalid tanggal_beri format: %v", err)
	}
	jam, err := time.Parse("15:04:05", request.JamBeri)
	if err != nil {
		return model.PemberianObatResponse{}, fmt.Errorf("invalid jam_beri format: %v", err)
	}

	obat := entity.PemberianObat{
		TanggalBeri: tgl,
		JamBeri:     jam,
		NomorRawat:  request.NomorRawat,
		NamaPasien:  request.NamaPasien,
		KodeObat:    request.KodeObat,
		NamaObat:    request.NamaObat,
		Embalase:    ptrStr(request.Embalase),
		Tuslah:      ptrStr(request.Tuslah),
		Jumlah:      ptrStr(request.Jumlah),
		BiayaObat:   ptrFloat(request.BiayaObat),
		Total:       ptrFloat(request.Total),
		Gudang:      ptrStr(request.Gudang),
		NoBatch:     ptrStr(request.NoBatch),
		NoFaktur:    ptrStr(request.NoFaktur),
	}

	if err := u.Repository.Insert(c, &obat); err != nil {
		return model.PemberianObatResponse{}, fmt.Errorf("failed to insert pemberian obat: %v", err)
	}

	return model.PemberianObatResponse{
		TanggalBeri: tgl.Format("2006-01-02"),
		JamBeri:     jam.Format("15:04:05"),
		NomorRawat:  obat.NomorRawat,
		NamaPasien:  obat.NamaPasien,
		KodeObat:    obat.KodeObat,
		NamaObat:    obat.NamaObat,
		Embalase:    derefStr(obat.Embalase),
		Tuslah:      derefStr(obat.Tuslah),
		Jumlah:      derefStr(obat.Jumlah),
		BiayaObat:   derefFloat(obat.BiayaObat),
		Total:       derefFloat(obat.Total),
		Gudang:      derefStr(obat.Gudang),
		NoBatch:     derefStr(obat.NoBatch),
		NoFaktur:    derefStr(obat.NoFaktur),
	}, nil
}

func (u *PemberianObatUseCase) GetAll() ([]model.PemberianObatResponse, error) {
	data, err := u.Repository.FindAll()
	if err != nil {
		return nil, err
	}

	var result []model.PemberianObatResponse
	for _, p := range data {
		result = append(result, model.PemberianObatResponse{
			TanggalBeri: p.TanggalBeri.Format("2006-01-02"),
			JamBeri:     p.JamBeri.Format("15:04:05"),
			NomorRawat:  p.NomorRawat,
			NamaPasien:  p.NamaPasien,
			KodeObat:    p.KodeObat,
			NamaObat:    p.NamaObat,
			Embalase:    derefStr(p.Embalase),
			Tuslah:      derefStr(p.Tuslah),
			Jumlah:      derefStr(p.Jumlah),
			BiayaObat:   derefFloat(p.BiayaObat),
			Total:       derefFloat(p.Total),
			Gudang:      derefStr(p.Gudang),
			NoBatch:     derefStr(p.NoBatch),
			NoFaktur:    derefStr(p.NoFaktur),
			Kelas:       derefStr(p.Kelas),
		})
	}
	return result, nil
}

func (u *PemberianObatUseCase) GetByNomorRawat(nomorRawat string) ([]model.PemberianObatResponse, error) {
	data, err := u.Repository.FindByNomorRawat(nomorRawat)
	if err != nil {
		return nil, err
	}

	result := make([]model.PemberianObatResponse, 0)
	for _, p := range data {
		result = append(result, model.PemberianObatResponse{
			TanggalBeri: p.TanggalBeri.Format("2006-01-02"),
			JamBeri:     p.JamBeri.Format("15:04:05"),
			NomorRawat:  p.NomorRawat,
			NamaPasien:  p.NamaPasien,
			KodeObat:    p.KodeObat,
			NamaObat:    p.NamaObat,
			Embalase:    derefStr(p.Embalase),
			Tuslah:      derefStr(p.Tuslah),
			Jumlah:      derefStr(p.Jumlah),
			BiayaObat:   derefFloat(p.BiayaObat),
			Total:       derefFloat(p.Total),
			Gudang:      derefStr(p.Gudang),
			NoBatch:     derefStr(p.NoBatch),
			NoFaktur:    derefStr(p.NoFaktur),
			Kelas:       derefStr(p.Kelas),
		})
	}
	return result, nil
}

func (u *PemberianObatUseCase) Update(c *fiber.Ctx, nomorRawat string, request *model.PemberianObatRequest) (model.PemberianObatResponse, error) {
	records, err := u.Repository.FindByNomorRawat(nomorRawat)
	if err != nil || len(records) == 0 {
		return model.PemberianObatResponse{}, fmt.Errorf("data not found")
	}
	existing := &records[0]

	tgl, err := time.Parse("2006-01-02", request.TanggalBeri)
	if err != nil {
		return model.PemberianObatResponse{}, fmt.Errorf("invalid tanggal_beri format: %v", err)
	}
	jam, err := time.Parse("15:04:05", request.JamBeri)
	if err != nil {
		return model.PemberianObatResponse{}, fmt.Errorf("invalid jam_beri format: %v", err)
	}

	existing.NamaPasien = request.NamaPasien
	existing.KodeObat = request.KodeObat
	existing.NamaObat = request.NamaObat
	existing.Embalase = ptrStr(request.Embalase)
	existing.Tuslah = ptrStr(request.Tuslah)
	existing.Jumlah = ptrStr(request.Jumlah)
	existing.BiayaObat = ptrFloat(request.BiayaObat)
	existing.Total = ptrFloat(request.Total)
	existing.Gudang = ptrStr(request.Gudang)
	existing.NoBatch = ptrStr(request.NoBatch)
	existing.NoFaktur = ptrStr(request.NoFaktur)
	existing.TanggalBeri = tgl
	existing.JamBeri = jam

	if err := u.Repository.Update(c, existing); err != nil {
		return model.PemberianObatResponse{}, fmt.Errorf("update failed: %v", err)
	}

	return model.PemberianObatResponse{
		TanggalBeri: tgl.Format("2006-01-02"),
		JamBeri:     jam.Format("15:04:05"),
		NomorRawat:  existing.NomorRawat,
		NamaPasien:  existing.NamaPasien,
		KodeObat:    existing.KodeObat,
		NamaObat:    existing.NamaObat,
		Embalase:    derefStr(existing.Embalase),
		Tuslah:      derefStr(existing.Tuslah),
		Jumlah:      derefStr(existing.Jumlah),
		BiayaObat:   derefFloat(existing.BiayaObat),
		Total:       derefFloat(existing.Total),
		Gudang:      derefStr(existing.Gudang),
		NoBatch:     derefStr(existing.NoBatch),
		NoFaktur:    derefStr(existing.NoFaktur),
	}, nil
}

func (u *PemberianObatUseCase) Delete(c *fiber.Ctx, nomorRawat string, jamBeri string) error {
	return u.Repository.Delete(c, nomorRawat, jamBeri)
}

func (u *PemberianObatUseCase) GetAllDataBarang() ([]entity.DataBarang, error) {
	return u.Repository.GetAllDataBarang()
}

func (u *PemberianObatUseCase) GetDataBarangByKelas(kelas string) ([]model.ObatWithTarif, error) {
	items, err := u.Repository.GetAllDataBarang()
	if err != nil {
		return nil, err
	}

	var result []model.ObatWithTarif
	for _, item := range items {
		var tarif float64
		switch strings.ToLower(kelas) {
		case "dasar":
			tarif = item.Dasar
		case "kelas1":
			tarif = item.Kelas1
		case "kelas2":
			tarif = item.Kelas2
		case "kelas3":
			tarif = item.Kelas3
		case "utama":
			tarif = item.Utama
		case "vip":
			tarif = item.VIP
		case "vvip":
			tarif = item.VVIP
		case "jualbebas":
			tarif = item.JualBebas
		default:
			tarif = item.Dasar
		}

		result = append(result, model.ObatWithTarif{
			KodeObat:  item.KodeObat,
			NamaObat:  item.NamaObat,
			BiayaObat: tarif,
		})
	}

	return result, nil
}

func (uc *PemberianObatUseCase) GetPaginated(page int, size int) ([]entity.PemberianObat, int, error) {
	return uc.Repository.FindPaginated(page, size)
}
