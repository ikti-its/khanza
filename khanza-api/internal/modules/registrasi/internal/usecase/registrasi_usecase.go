package usecase

import (
	"fmt"
	"log"
	"time"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/registrasi/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/registrasi/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/registrasi/internal/repository"
)

type RegistrasiUseCase struct {
	Repository repository.RegistrasiRepository
}

func NewRegistrasiUseCase(repo repository.RegistrasiRepository) *RegistrasiUseCase {
	return &RegistrasiUseCase{Repository: repo}
}

// Create a new registrasi entry
func (u *RegistrasiUseCase) Create(c *fiber.Ctx, request *model.RegistrasiRequest) (model.RegistrasiResponse, error) {
	// ✅ Validate if kode_dokter exists
	exists, err := u.Repository.CheckDokterExists(request.KodeDokter)
	if err != nil {
		return model.RegistrasiResponse{}, fmt.Errorf("database error: %v", err)
	}
	if !exists {
		return model.RegistrasiResponse{}, fmt.Errorf("dokter with kode_dokter '%s' does not exist", request.KodeDokter)
	}

	// ✅ Fetch nama_dokter from database
	namaDokter, err := u.Repository.GetNamaDokter(request.KodeDokter)
	if err != nil {
		return model.RegistrasiResponse{}, fmt.Errorf("failed to retrieve nama_dokter: %v", err)
	}

	// ✅ Parse or set the default date
	var parsedDate time.Time
	if request.Tanggal == "" {
		parsedDate = time.Now()
	} else {
		parsedDate, err = time.Parse("2006-01-02", request.Tanggal)
		if err != nil {
			return model.RegistrasiResponse{}, fmt.Errorf("invalid date format: %v", err)
		}
	}

	parsedJam, err := time.Parse("15:04:05", request.Jam)
	if err != nil {
		log.Println("❌ Invalid jam format:", request.Jam)
		return model.RegistrasiResponse{}, fmt.Errorf("invalid date format: %v", err)
	}

	// ✅ Convert request model to entity model
	registrasiEntity := entity.Registrasi{
		NomorReg:         request.NomorReg,
		NomorRawat:       request.NomorRawat,
		Tanggal:          parsedDate,
		Jam:              parsedJam,
		KodeDokter:       request.KodeDokter,
		NamaDokter:       namaDokter, // ✅ auto-filled here
		NomorRM:          request.NomorRM,
		Nama:             request.Nama,
		JenisKelamin:     request.JenisKelamin,
		Umur:             request.Umur,
		Poliklinik:       request.Poliklinik,
		JenisBayar:       request.JenisBayar,
		PenanggungJawab:  request.PenanggungJawab,
		Alamat:           request.Alamat,
		HubunganPJ:       request.HubunganPJ,
		BiayaRegistrasi:  request.BiayaRegistrasi,
		StatusRegistrasi: request.StatusRegistrasi,
		NoTelepon:        request.NoTelepon,
		StatusRawat:      request.StatusRawat,
		StatusPoli:       request.StatusPoli,
		StatusBayar:      request.StatusBayar,
		StatusKamar:      request.StatusKamar,
		PekerjaanPJ:      request.PekerjaanPJ,
	    KelurahanPJ:      request.KelurahanPJ,
	    KecamatanPJ:      request.KecamatanPJ,
	    KabupatenPJ:      request.KabupatenPJ,
	    PropinsiPJ:       request.PropinsiPJ,
	    NoTelpPJ:         request.NoTelpPJ,
		No_asuransi:      request.No_asuransi,
	}

	// ✅ Insert into database
	err = u.Repository.Insert(c, &registrasiEntity)

	if err != nil {
		return model.RegistrasiResponse{}, fmt.Errorf("failed to create registrasi: %v", err)
	}

	// ✅ Return response
	return model.RegistrasiResponse{
		NomorReg:         registrasiEntity.NomorReg,
		NomorRawat:       registrasiEntity.NomorRawat,
		Tanggal:          parsedDate.Format("2006-01-02"),
		Jam:              parsedDate.Format("15:04:05"),
		KodeDokter:       registrasiEntity.KodeDokter,
		NamaDokter:       registrasiEntity.NamaDokter,
		NomorRM:          registrasiEntity.NomorRM,
		Nama:             registrasiEntity.Nama,
		JenisKelamin:     registrasiEntity.JenisKelamin,
		Umur:             registrasiEntity.Umur,
		Poliklinik:       registrasiEntity.Poliklinik,
		JenisBayar:       registrasiEntity.JenisBayar,
		PenanggungJawab:  registrasiEntity.PenanggungJawab,
		Alamat:           registrasiEntity.Alamat,
		HubunganPJ:       registrasiEntity.HubunganPJ,
		BiayaRegistrasi:  registrasiEntity.BiayaRegistrasi,
		StatusRegistrasi: registrasiEntity.StatusRegistrasi,
		NoTelepon:        registrasiEntity.NoTelepon,
		StatusRawat:      registrasiEntity.StatusRawat,
		StatusPoli:       registrasiEntity.StatusPoli,
		StatusBayar:      registrasiEntity.StatusBayar,
		StatusKamar:      registrasiEntity.StatusKamar,
		PekerjaanPJ:   registrasiEntity.PekerjaanPJ,
	    KelurahanPJ:   registrasiEntity.KelurahanPJ,
	    KecamatanPJ:   registrasiEntity.KecamatanPJ,
	    KabupatenPJ:   registrasiEntity.KabupatenPJ,
	    PropinsiPJ:    registrasiEntity.PropinsiPJ,
	    NoTelpPJ:      registrasiEntity.NoTelpPJ,
	}, nil
}

// Retrieve all registrasi records from PostgreSQL
func (u *RegistrasiUseCase) GetAll() ([]model.RegistrasiResponse, error) {
	fmt.Println("📥 Fetching all registrasi...")

	registrasiList, err := u.Repository.FindAll()
	if err != nil {
		fmt.Println("❌ DB error:", err)
		return nil, fmt.Errorf("failed to retrieve registrasi: %v", err)
	}

	var response []model.RegistrasiResponse
	for _, registrasi := range registrasiList {
		response = append(response, model.RegistrasiResponse{
			NomorReg:         registrasi.NomorReg,
			NomorRawat:       registrasi.NomorRawat,
			Tanggal:          registrasi.Tanggal.Format("2006-01-02"),
			Jam:              registrasi.Jam.Format("15:04:05"),
			KodeDokter:       registrasi.KodeDokter,
			NamaDokter:       registrasi.NamaDokter,
			NomorRM:          registrasi.NomorRM,
			Nama:             registrasi.Nama,
			JenisKelamin:     registrasi.JenisKelamin,
			Umur:             registrasi.Umur,
			Poliklinik:       registrasi.Poliklinik,
			JenisBayar:       registrasi.JenisBayar,
			PenanggungJawab:  registrasi.PenanggungJawab,
			Alamat:           registrasi.Alamat,
			HubunganPJ:       registrasi.HubunganPJ,
			BiayaRegistrasi:  registrasi.BiayaRegistrasi,
			StatusRegistrasi: registrasi.StatusRegistrasi,
			NoTelepon:        registrasi.NoTelepon,
			StatusRawat:      registrasi.StatusRawat,
			StatusPoli:       registrasi.StatusPoli,
			StatusBayar:      registrasi.StatusBayar,
			PekerjaanPJ:      registrasi.PekerjaanPJ,
	        KelurahanPJ:      registrasi.KelurahanPJ,
         	KecamatanPJ:      registrasi.KecamatanPJ,
        	KabupatenPJ:      registrasi.KabupatenPJ,
	        PropinsiPJ:       registrasi.PropinsiPJ,
	        NoTelpPJ:         registrasi.NoTelpPJ,
			No_asuransi:      registrasi.No_asuransi,
		})
	}

	return response, nil
}

// Retrieve a specific registrasi record by NomorReg
func (u *RegistrasiUseCase) GetByNomorReg(nomorReg string) (model.RegistrasiResponse, error) {
	registrasi, err := u.Repository.FindByNomorReg(nomorReg)
	if err != nil {
		return model.RegistrasiResponse{}, fmt.Errorf("registrasi not found")
	}

	return model.RegistrasiResponse{
		NomorReg:         registrasi.NomorReg,
		NomorRawat:       registrasi.NomorRawat,
		Tanggal:          registrasi.Tanggal.Format("2006-01-02"),
		Jam:              registrasi.Jam.Format("15:04:05"),
		KodeDokter:       registrasi.KodeDokter,
		NamaDokter:       registrasi.NamaDokter,
		NomorRM:          registrasi.NomorRM,
		Nama:             registrasi.Nama,
		JenisKelamin:     registrasi.JenisKelamin,
		Umur:             registrasi.Umur,
		Poliklinik:       registrasi.Poliklinik,
		JenisBayar:       registrasi.JenisBayar,
		PenanggungJawab:  registrasi.PenanggungJawab,
		Alamat:           registrasi.Alamat,
		HubunganPJ:       registrasi.HubunganPJ,
		BiayaRegistrasi:  registrasi.BiayaRegistrasi,
		StatusRegistrasi: registrasi.StatusRegistrasi,
		NoTelepon:        registrasi.NoTelepon,
		StatusRawat:      registrasi.StatusRawat,
		StatusPoli:       registrasi.StatusPoli,
		StatusBayar:      registrasi.StatusBayar,
		PekerjaanPJ:      registrasi.PekerjaanPJ,
	    KelurahanPJ:      registrasi.KelurahanPJ,
        KecamatanPJ:      registrasi.KecamatanPJ,
        KabupatenPJ:      registrasi.KabupatenPJ,
	    PropinsiPJ:       registrasi.PropinsiPJ,
	    NoTelpPJ:         registrasi.NoTelpPJ,
		No_asuransi:      registrasi.No_asuransi,
	}, nil

}

// Update an existing registrasi record
func (u *RegistrasiUseCase) Update(c *fiber.Ctx, nomorReg string, request *model.RegistrasiRequest) (model.RegistrasiResponse, error) {
	registrasi, err := u.Repository.FindByNomorReg(nomorReg)
	if err != nil {
		return model.RegistrasiResponse{}, fmt.Errorf("registrasi not found")
	}

	var parsedDate time.Time
	if request.Tanggal == "" {
		parsedDate = time.Now()
	} else {
		parsedDate, err = time.Parse("2006-01-02", request.Tanggal)
		if err != nil {
			return model.RegistrasiResponse{}, fmt.Errorf("invalid date format: %v", err)
		}
	}

	registrasi.Nama = request.Nama
	registrasi.Alamat = request.Alamat
	registrasi.Tanggal = parsedDate

	err = u.Repository.Update(c, &registrasi)
	if err != nil {
		return model.RegistrasiResponse{}, fmt.Errorf("failed to update registrasi: %v", err)
	}

	return model.RegistrasiResponse{
		NomorReg:         registrasi.NomorReg,
		NomorRawat:       registrasi.NomorRawat,
		Tanggal:          registrasi.Tanggal.Format("2006-01-02"),
		Jam:              registrasi.Jam.Format("15:04:05"),
		KodeDokter:       registrasi.KodeDokter,
		NamaDokter:       registrasi.NamaDokter,
		NomorRM:          registrasi.NomorRM,
		Nama:             registrasi.Nama,
		JenisKelamin:     registrasi.JenisKelamin,
		Umur:             registrasi.Umur,
		Poliklinik:       registrasi.Poliklinik,
		JenisBayar:       registrasi.JenisBayar,
		PenanggungJawab:  registrasi.PenanggungJawab,
		Alamat:           registrasi.Alamat,
		HubunganPJ:       registrasi.HubunganPJ,
		BiayaRegistrasi:  registrasi.BiayaRegistrasi,
		StatusRegistrasi: registrasi.StatusRegistrasi,
		NoTelepon:        registrasi.NoTelepon,
		StatusRawat:      registrasi.StatusRawat,
		StatusPoli:       registrasi.StatusPoli,
		StatusBayar:      registrasi.StatusBayar,
		PekerjaanPJ:      registrasi.PekerjaanPJ,
	    KelurahanPJ:      registrasi.KelurahanPJ,
        KecamatanPJ:      registrasi.KecamatanPJ,
        KabupatenPJ:      registrasi.KabupatenPJ,
	    PropinsiPJ:       registrasi.PropinsiPJ,
	    NoTelpPJ:         registrasi.NoTelpPJ,
		No_asuransi:      registrasi.No_asuransi,
	}, nil

}

// Delete a registrasi record by NomorReg
func (u *RegistrasiUseCase) Delete(c *fiber.Ctx, nomorReg string) error {
	err := u.Repository.Delete(c, nomorReg)
	if err != nil {
		return fmt.Errorf("failed to delete registrasi: %v", err)
	}
	return nil
}

func (u *RegistrasiUseCase) GetPendingRoomRequests(c *fiber.Ctx) ([]model.RegistrasiResponse, error) {
	list, err := u.Repository.FindPendingRoomRequests()
	fmt.Printf("🧠 Usecase received %d pending room requests\n", len(list))
	if err != nil {
		return nil, err
	}
	if len(list) == 0 {
		fmt.Println("⚠️ No pending rooms found in usecase")
	}

	var responses []model.RegistrasiResponse
	for _, r := range list {
		responses = append(responses, model.RegistrasiResponse{
			NomorReg:         r.NomorReg,
			NomorRawat:       r.NomorRawat,
			Tanggal:          r.Tanggal.Format("2006-01-02"),
			Jam:              r.Jam.Format("15:04:05"),
			KodeDokter:       r.KodeDokter,
			NamaDokter:       r.NamaDokter,
			NomorRM:          r.NomorRM,
			Nama:             r.Nama,
			JenisKelamin:     r.JenisKelamin,
			Umur:             r.Umur,
			Poliklinik:       r.Poliklinik,
			JenisBayar:       r.JenisBayar,
			PenanggungJawab:  r.PenanggungJawab,
			Alamat:           r.Alamat,
			HubunganPJ:       r.HubunganPJ,
			BiayaRegistrasi:  r.BiayaRegistrasi,
			StatusRegistrasi: r.StatusRegistrasi,
			NoTelepon:        r.NoTelepon,
			StatusRawat:      r.StatusRawat,
			StatusPoli:       r.StatusPoli,
			StatusBayar:      r.StatusBayar,
			StatusKamar:      r.StatusKamar,
			Kelas:            r.Kelas, 
			PekerjaanPJ:      r.PekerjaanPJ,
	        KelurahanPJ:      r.KelurahanPJ,
         	KecamatanPJ:      r.KecamatanPJ,
        	KabupatenPJ:      r.KabupatenPJ,
	        PropinsiPJ:       r.PropinsiPJ,
	        NoTelpPJ:         r.NoTelpPJ,
			No_asuransi:      r.No_asuransi,
		})
	}

	return responses, nil
}

func (uc *RegistrasiUseCase) UpdateStatusKamar(c *fiber.Ctx, nomorReg, status string) error {
	return uc.Repository.UpdateStatusKamar(c, nomorReg, status)
}

func (u *RegistrasiUseCase) AssignKamar(c *fiber.Ctx, nomorReg string, kamarID string) error {
	return u.Repository.AssignKamar(c, nomorReg, kamarID)
}

func (u *RegistrasiUseCase) GetAllDokter() ([]model.DokterResponse, error) {
	return u.Repository.GetAllDokter()
}

func (u *RegistrasiUseCase) GetByNomorRM(nomorRM string) (model.RegistrasiResponse, error) {
	registrasi, err := u.Repository.FindByNomorRM(nomorRM)
	if err != nil {
		return model.RegistrasiResponse{}, fmt.Errorf("pasien tidak ditemukan: %v", err)
	}

	return model.RegistrasiResponse{
		NomorReg:     registrasi.NomorReg,
		NomorRawat:   registrasi.NomorRawat,
		Tanggal:      registrasi.Tanggal.Format("2006-01-02"),
		Nama:         registrasi.Nama,
		JenisKelamin: registrasi.JenisKelamin,
		Umur:         registrasi.Umur,
	}, nil
}

func (u *RegistrasiUseCase) GetByNoRawat(noRawat string) (model.RegistrasiResponse, error) {
	return u.Repository.GetByNoRawat(noRawat)
}

func (u *RegistrasiUseCase) GetAllByNomorRM(nomorRM string) ([]model.RegistrasiResponse, error) {
	registrasiList, err := u.Repository.FindAllByNomorRM(nomorRM)
	if err != nil {
		return nil, fmt.Errorf("registrasi tidak ditemukan: %v", err)
	}

	var response []model.RegistrasiResponse
	for _, r := range registrasiList {
		response = append(response, model.RegistrasiResponse{
			NomorReg:         r.NomorReg,
			NomorRawat:       r.NomorRawat,
			Tanggal:          r.Tanggal.Format("2006-01-02"),
			Jam:              r.Jam.Format("15:04:05"),
			KodeDokter:       r.KodeDokter,
			NamaDokter:       r.NamaDokter,
			NomorRM:          r.NomorRM,
			Nama:             r.Nama,
			JenisKelamin:     r.JenisKelamin,
			Umur:             r.Umur,
			Poliklinik:       r.Poliklinik,
			JenisBayar:       r.JenisBayar,
			PenanggungJawab:  r.PenanggungJawab,
			Alamat:           r.Alamat,
			HubunganPJ:       r.HubunganPJ,
			BiayaRegistrasi:  r.BiayaRegistrasi,
			StatusRegistrasi: r.StatusRegistrasi,
			NoTelepon:        r.NoTelepon,
			StatusRawat:      r.StatusRawat,
			StatusPoli:       r.StatusPoli,
			StatusBayar:      r.StatusBayar,
			StatusKamar:      r.StatusKamar,
			Kelas:            r.Kelas,
			PekerjaanPJ:      r.PekerjaanPJ,
			KelurahanPJ:      r.KelurahanPJ,
			KecamatanPJ:      r.KecamatanPJ,
			KabupatenPJ:      r.KabupatenPJ,
			PropinsiPJ:       r.PropinsiPJ,
			NoTelpPJ:         r.NoTelpPJ,
			No_asuransi:      r.No_asuransi,
		})
	}

	return response, nil
}

