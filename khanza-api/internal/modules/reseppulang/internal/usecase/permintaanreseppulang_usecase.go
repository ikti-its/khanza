package usecase

import (
	"fmt"
	"log"
	"time"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/reseppulang/internal/repository"
)

type PermintaanResepPulangUseCase struct {
	Repository repository.PermintaanResepPulangRepository
}

func NewPermintaanResepPulangUseCase(repo repository.PermintaanResepPulangRepository) *PermintaanResepPulangUseCase {
	return &PermintaanResepPulangUseCase{Repository: repo}
}

func (u *PermintaanResepPulangUseCase) Create(c *fiber.Ctx, requests []*model.PermintaanResepPulangRequest) ([]model.PermintaanResepPulangResponse, error) {
	var responses []model.PermintaanResepPulangResponse

	for _, req := range requests {
		// Parse tanggal dan jam
		var tglPermintaan *time.Time
		if req.TglPermintaan != "" {
			t, err := time.Parse("2006-01-02", req.TglPermintaan)
			if err != nil {
				return nil, fmt.Errorf("invalid tgl_permintaan format: %v", err)
			}
			tglPermintaan = &t
		}

		jam, err := time.Parse("15:04:05", req.Jam)
		if err != nil {
			return nil, fmt.Errorf("invalid jam format: %v", err)
		}

		tglValidasi, err := time.Parse("2006-01-02", req.TglValidasi)
		if err != nil {
			return nil, fmt.Errorf("invalid tgl_validasi format: %v", err)
		}

		jamValidasi, err := time.Parse("15:04:05", req.JamValidasi)
		if err != nil {
			return nil, fmt.Errorf("invalid jam_validasi format: %v", err)
		}

		data := entity.PermintaanResepPulang{
			NoPermintaan:  req.NoPermintaan,
			TglPermintaan: tglPermintaan,
			Jam:           jam,
			NoRawat:       req.NoRawat,
			KdDokter:      req.KdDokter,
			Status:        req.Status,
			TglValidasi:   &tglValidasi,
			JamValidasi:   &jamValidasi,
			KodeBrng:      req.KodeBrng,
			Jumlah:        req.Jumlah,
			AturanPakai:   req.AturanPakai,
		}

		// Insert ke DB
		if err := u.Repository.InsertMany(c, []*entity.PermintaanResepPulang{&data}); err != nil {
			return nil, fmt.Errorf("failed to insert permintaan resep pulang: %v", err)
		}

		// Append ke hasil response
		responses = append(responses, model.PermintaanResepPulangResponse{
			NoPermintaan:  data.NoPermintaan,
			TglPermintaan: formatDatePtr(data.TglPermintaan),
			Jam:           data.Jam.Format("15:04:05"),
			NoRawat:       data.NoRawat,
			KdDokter:      data.KdDokter,
			Status:        data.Status,
			TglValidasi:   formatTimePtr(data.TglValidasi, "2006-01-02"),
			JamValidasi:   formatTimePtr(data.JamValidasi, "15:04:05"),
			KodeBrng:      data.KodeBrng,
			Jumlah:        data.Jumlah,
			AturanPakai:   data.AturanPakai,
		})

	}

	return responses, nil
}

func (u *PermintaanResepPulangUseCase) GetAll() ([]model.PermintaanResepPulangResponse, error) {
	data, err := u.Repository.FindAll()
	if err != nil {
		return nil, fmt.Errorf("failed to fetch permintaan resep pulang: %w", err)
	}

	var result []model.PermintaanResepPulangResponse
	for _, p := range data {
		result = append(result, model.PermintaanResepPulangResponse{
			NoPermintaan:  p.NoPermintaan,
			TglPermintaan: formatDatePtr(p.TglPermintaan),
			Jam:           p.Jam.Format("15:04:05"),
			NoRawat:       p.NoRawat,
			KdDokter:      p.KdDokter,
			Status:        p.Status,
			TglValidasi:   formatTimePtr(p.TglValidasi, "2006-01-02"),
			JamValidasi:   formatTimePtr(p.JamValidasi, "15:04:05"),
			KodeBrng:      p.KodeBrng,
			Jumlah:        p.Jumlah,
			AturanPakai:   p.AturanPakai,
		})
	}

	return result, nil
}

func (u *PermintaanResepPulangUseCase) GetByNoRawat(noRawat string) ([]model.PermintaanResepPulangResponse, error) {
	data, err := u.Repository.FindByNoRawat(noRawat)
	if err != nil {
		return nil, err
	}

	var result []model.PermintaanResepPulangResponse
	for _, p := range data {
		result = append(result, model.PermintaanResepPulangResponse{
			NoPermintaan:  p.NoPermintaan,
			TglPermintaan: formatDatePtr(p.TglPermintaan),
			Jam:           p.Jam.Format("15:04:05"),
			NoRawat:       p.NoRawat,
			KdDokter:      p.KdDokter,
			Status:        p.Status,
			TglValidasi:   formatTimePtr(p.TglValidasi, "2006-01-02"),
			JamValidasi:   formatTimePtr(p.JamValidasi, "15:04:05"),
			KodeBrng:      p.KodeBrng,
			Jumlah:        p.Jumlah,
			AturanPakai:   p.AturanPakai,
		})
	}

	return result, nil
}

func formatTimePtr(t *time.Time, layout string) *string {
	if t == nil {
		return nil
	}
	s := t.Format(layout)
	return &s
}

func (u *PermintaanResepPulangUseCase) GetByNoPermintaan(noPermintaan string) (model.PermintaanResepPulangResponse, error) {
	log.Printf("🔍 UseCase.GetByNoPermintaan called with: %s", noPermintaan)

	data, err := u.Repository.FindByNoPermintaan(noPermintaan)
	if err != nil {
		log.Printf("❌ Repository.FindByNoPermintaan failed: %v", err)
		return model.PermintaanResepPulangResponse{}, fmt.Errorf("data not found")
	}

	log.Printf("✅ Repository returned: %+v", data)

	var tglValidasiStr *string
	if data.TglValidasi != nil {
		str := data.TglValidasi.Format("2006-01-02")
		tglValidasiStr = &str
	}

	var jamValidasiStr *string
	if data.JamValidasi != nil {
		str := data.JamValidasi.Format("15:04:05")
		jamValidasiStr = &str
	}

	return model.PermintaanResepPulangResponse{
		NoPermintaan:  data.NoPermintaan,
		TglPermintaan: formatDatePtr(data.TglPermintaan),
		Jam:           data.Jam.Format("15:04:05"),
		NoRawat:       data.NoRawat,
		KdDokter:      data.KdDokter,
		Status:        data.Status,
		TglValidasi:   tglValidasiStr,
		JamValidasi:   jamValidasiStr,
		KodeBrng:      data.KodeBrng,
		Jumlah:        data.Jumlah,
		AturanPakai:   data.AturanPakai,
	}, nil
}

func (u *PermintaanResepPulangUseCase) Update(c *fiber.Ctx, noPermintaan string, request *model.PermintaanResepPulangRequest) (model.PermintaanResepPulangResponse, error) {
	data, err := u.Repository.FindByNoPermintaan(noPermintaan)
	if err != nil {
		return model.PermintaanResepPulangResponse{}, fmt.Errorf("data not found")
	}

	// Update fields
	if request.TglPermintaan != "" {
		t, err := time.Parse("2006-01-02", request.TglPermintaan)
		if err != nil {
			return model.PermintaanResepPulangResponse{}, fmt.Errorf("invalid tgl_permintaan format: %v", err)
		}
		data.TglPermintaan = &t
	}

	jam, err := time.Parse("15:04:05", request.Jam)
	if err != nil {
		return model.PermintaanResepPulangResponse{}, fmt.Errorf("invalid jam format: %v", err)
	}
	tglValidasi, err := time.Parse("2006-01-02", request.TglValidasi)
	if err != nil {
		return model.PermintaanResepPulangResponse{}, fmt.Errorf("invalid tgl_validasi format: %v", err)
	}
	jamValidasi, err := time.Parse("15:04:05", request.JamValidasi)
	if err != nil {
		return model.PermintaanResepPulangResponse{}, fmt.Errorf("invalid jam_validasi format: %v", err)
	}

	data.Jam = jam
	data.NoRawat = request.NoRawat
	data.KdDokter = request.KdDokter
	data.Status = request.Status
	data.TglValidasi = &tglValidasi
	data.JamValidasi = &jamValidasi

	if err := u.Repository.Update(c, data); err != nil {
		return model.PermintaanResepPulangResponse{}, fmt.Errorf("update failed: %v", err)
	}

	return model.PermintaanResepPulangResponse{
		NoPermintaan:  data.NoPermintaan,
		TglPermintaan: formatDatePtr(data.TglPermintaan),
		Jam:           data.Jam.Format("15:04:05"),
		NoRawat:       data.NoRawat,
		KdDokter:      data.KdDokter,
		Status:        data.Status,
		TglValidasi:   formatTimePtr(data.TglValidasi, "2006-01-02"),
		JamValidasi:   formatTimePtr(data.JamValidasi, "15:04:05"),
		KodeBrng:      data.KodeBrng,
		Jumlah:        data.Jumlah,
		AturanPakai:   data.AturanPakai,
	}, nil

}

func (u *PermintaanResepPulangUseCase) Delete(c *fiber.Ctx, noPermintaan string) error {
	return u.Repository.Delete(c, noPermintaan)
}

// Utilities
func formatDatePtr(t *time.Time) string {
	if t == nil {
		return ""
	}
	return t.Format("2006-01-02")
}

// TODO: implement your own logic for this
func generateNoPermintaan() string {
	return fmt.Sprintf("PRP%s", time.Now().Format("20060102150405"))
}

func (u *PermintaanResepPulangUseCase) UpdateStatus(c *fiber.Ctx, noPermintaan string, status string) (model.PermintaanResepPulangResponse, error) {
	fmt.Println("🚀 [DEBUG] UpdateStatus UseCase. no_permintaan:", noPermintaan)

	data, err := u.Repository.FindByNoPermintaan(noPermintaan)
	if err != nil {
		return model.PermintaanResepPulangResponse{}, fmt.Errorf("error while fetching data: %w", err)
	}
	if data == nil {
		return model.PermintaanResepPulangResponse{}, fmt.Errorf("data permintaan tidak ditemukan")
	}

	fmt.Println("✅ [DEBUG] Data ditemukan:", data)

	// Update status
	data.Status = status

	if err := u.Repository.Update(c, data); err != nil {
		return model.PermintaanResepPulangResponse{}, fmt.Errorf("failed to update status: %w", err)
	}

	return model.PermintaanResepPulangResponse{
		NoPermintaan:  data.NoPermintaan,
		TglPermintaan: formatDatePtr(data.TglPermintaan),
		Jam:           data.Jam.Format("15:04:05"),
		NoRawat:       data.NoRawat,
		KdDokter:      data.KdDokter,
		Status:        data.Status,
		TglValidasi:   formatTimePtr(data.TglValidasi, "2006-01-02"),
		JamValidasi:   formatTimePtr(data.JamValidasi, "15:04:05"),
		KodeBrng:      data.KodeBrng,
		Jumlah:        data.Jumlah,
		AturanPakai:   data.AturanPakai,
	}, nil

}

func (u *PermintaanResepPulangUseCase) GetObatByNoPermintaan(noPermintaan string) ([]entity.PermintaanResepPulang, error) {
	return u.Repository.GetByNoPermintaan(noPermintaan)
}

func (u *PermintaanResepPulangUseCase) GetObatByNoPermintaanWithHarga(noPermintaan string) ([]entity.ResepPulangObat, error) {
	return u.Repository.GetByNoPermintaanWithHarga(noPermintaan)
}
