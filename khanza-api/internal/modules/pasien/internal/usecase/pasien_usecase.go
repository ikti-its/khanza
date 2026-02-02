package usecase

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/pasien/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pasien/internal/repository"
)

type PasienUseCase struct {
	Repo repository.PasienRepository
}

func NewPasienUseCase(repo repository.PasienRepository) *PasienUseCase {
	return &PasienUseCase{
		Repo: repo,
	}
}

func (u *PasienUseCase) Create(c *fiber.Ctx, pasien *entity.Pasien) error {
	// Validasi sederhana (misalnya no_rkm_medis tidak boleh kosong)
	if pasien.NoRkmMedis == "" || pasien.NmPasien == "" {
		return fmt.Errorf("no_rkm_medis dan nm_pasien wajib diisi")
	}

	return u.Repo.Insert(c, pasien)
}

func (u *PasienUseCase) GetAll() ([]entity.Pasien, error) {
	return u.Repo.Find()
}

func (u *PasienUseCase) GetPaginated(page, size int) ([]entity.Pasien, int, error) {
	return u.Repo.FindPage(page, size)
}

func (u *PasienUseCase) GetByNoRkmMedis(noRkm string) (entity.Pasien, error) {
	return u.Repo.FindByNoRkmMedis(noRkm)
}

func (u *PasienUseCase) Delete(c *fiber.Ctx, noRkmMedis string) error {
	if noRkmMedis == "" {
		return fmt.Errorf("no_rkm_medis wajib diisi")
	}
	return u.Repo.Delete(c, noRkmMedis)
}

func (u *PasienUseCase) GetByNoKTP(noKTP string) (*entity.Pasien, error) {
	return u.Repo.GetByNoKTP(noKTP)
}

func (u *PasienUseCase) GetByNoPeserta(noPeserta string) (*entity.Pasien, error) {
	return u.Repo.GetByNoPeserta(noPeserta)
}

func (u *PasienUseCase) Update(c *fiber.Ctx, pasien *entity.Pasien) error {
	// Validasi dasar
	if pasien.NoRkmMedis == "" {
		return fmt.Errorf("no_rkm_medis wajib diisi")
	}

	// (Opsional) Validasi data eksis dulu
	_, err := u.Repo.FindByNoRkmMedis(pasien.NoRkmMedis)
	if err != nil {
		return fmt.Errorf("pasien dengan no_rkm_medis %s tidak ditemukan", pasien.NoRkmMedis)
	}

	// Eksekusi update
	return u.Repo.Update(c, pasien)
}
