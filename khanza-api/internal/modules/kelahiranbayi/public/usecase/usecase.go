package usecase

import (
	"fmt" 
	"github.com/jinzhu/copier"
    "github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/kelahiranbayi/public/repository"
	"github.com/ikti-its/khanza-api/internal/modules/kelahiranbayi/public/model"
	"github.com/ikti-its/khanza-api/internal/modules/kelahiranbayi/public/entity"

	masterrepo "github.com/ikti-its/khanza-api/internal/modules/masterpasien/public/repository"
    masterentity "github.com/ikti-its/khanza-api/internal/modules/masterpasien/public/entity"
)

type UseCase struct {
	Repository repository.Repository
	MasterPasienRepo  masterrepo.Repository
}

func NewUseCase(repo repository.Repository, master masterrepo.Repository) *UseCase {
    return &UseCase{
        Repository: repo,
        MasterPasienRepo: master,
    }
}

// Create 
func (u *UseCase) Create(c *fiber.Ctx, request *model.Request) (model.Response, error) {
    // Step 1: Copy ke entity kelahiran_bayi
    var bayiEntity entity.Entity
    copier.Copy(&bayiEntity, &request)

    // Step 2: Simpan ke kelahiran_bayi
    if err := u.Repository.Insert(c, &bayiEntity); err != nil {
        return model.Response{}, fmt.Errorf("failed to create kelahiran bayi: %v", err)
    }

    // Step 3: Bangun entity untuk masterpasien (hanya field yang perlu)
    pasien := &masterentity.Entity{
        No_rkm_medis: request.No_rkm_medis,
        Nm_pasien:    request.Nm_pasien,
        Jk:           request.Jk,
        Tmp_lahir:    request.Tmp_lahir,
        Tgl_lahir:    request.Tgl_lahir,
        Nm_ibu:       request.Nm_ibu,
        Alamat:       request.Alamat,
        Tgl_daftar:   request.Tgl_daftar,
        Umur:         request.Umur,
        // Opsional default kosong
        No_ktp: "", Gol_darah: "", Pekerjaan: "", Stts_nikah: "", Agama: "",
        No_tlp: "", Pnd: "", Asuransi: "", No_asuransi: "",
        Kd_kel: "", Kd_kec: "", Kd_kab: "", Kd_prop: "",
        Suku_bangsa: "", Bahasa_pasien: "", Perusahaan_pasien: "",
        Nip: "", Email: "", Cacat_fisik: "",
    }

    // Step 4: Simpan ke masterpasien
    if err := u.MasterPasienRepo.Insert(c, pasien); err != nil {
        return model.Response{}, fmt.Errorf("failed to create masterpasien: %v", err)
    }

    // Step 5: Copy response
    var response model.Response
    copier.Copy(&response, &bayiEntity)

    return response, nil
}


// Retrieve all from PostgreSQL
func (u *UseCase) GetAll() ([]model.Response, error) {
	List, err := u.Repository.FindAll()
	if err != nil {
		return nil, fmt.Errorf("failed to retrieve: %v", err)
	}

	var response []model.Response
	for _, Entity := range List {
		var response_i model.Response
		copier.Copy(&response_i, &Entity)
		response = append(response, response_i)
	}

	return response, nil
}

// Retrieve 
func (u *UseCase) GetById(id string) (model.Response, error) {
	Entity, err := u.Repository.FindById(id)
	if err != nil {
		return model.Response{}, fmt.Errorf("Entity not found")
	}

	var response model.Response
	copier.Copy(&response, &Entity)
	return response, nil
}

// Update 
func (u *UseCase) Update(c *fiber.Ctx, id string, request *model.Request) (model.Response, error) {
	Entity, err := u.Repository.FindById(id)
	if err != nil {
		return model.Response{}, fmt.Errorf("not found")
	}

	existingNoRM := Entity.No_rkm_medis
	copier.Copy(&Entity, &request)
	Entity.No_rkm_medis = existingNoRM

	err = u.Repository.Update(c, &Entity)
	if err != nil {
		return model.Response{}, fmt.Errorf("failed to update: %v", err)
	}

	// ✅ Ambil data masterpasien lama dulu
	existingPasien, err := u.MasterPasienRepo.FindById(Entity.No_rkm_medis)
	if err != nil {
		return model.Response{}, fmt.Errorf("failed fetch masterpasien: %v", err)
	}

	// Hanya update field dari kelahiranbayi yang relevan
	existingPasien.Nm_pasien = Entity.Nm_pasien
	existingPasien.Jk        = Entity.Jk
	existingPasien.Tmp_lahir = Entity.Tmp_lahir
	existingPasien.Tgl_lahir = Entity.Tgl_lahir
	existingPasien.Nm_ibu    = Entity.Nm_ibu
	existingPasien.Alamat    = Entity.Alamat
	existingPasien.Umur      = Entity.Umur
	existingPasien.Tgl_daftar = Entity.Tgl_daftar

	// ✅ Field opsional tidak disentuh, tetap utuh

	if err := u.MasterPasienRepo.Update(c, &existingPasien); err != nil {
		return model.Response{}, fmt.Errorf("failed update masterpasien: %v", err)
	}

	var response model.Response
	copier.Copy(&response, &Entity)
	return response, nil
}



// Delete 
func (u *UseCase) Delete(c *fiber.Ctx, id string) error {
	err := u.Repository.Delete(c, id)
	if err != nil {
		return fmt.Errorf("failed to delete: %v", err)
	}
	return nil
}



