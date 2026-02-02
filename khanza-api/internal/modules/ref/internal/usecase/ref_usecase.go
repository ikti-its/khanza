package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/ref/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/ref/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/ref/internal/repository"
)

type RefUseCase struct {
	Repository repository.RefRepository
}

func NewRefUseCase(repository *repository.RefRepository) *RefUseCase {
	return &RefUseCase{
		Repository: *repository,
	}
}

func (u *RefUseCase) GetRole() []model.RoleResponse {
	role, err := u.Repository.FindRole()
	exception.PanicIfError(err, "Failed to get all role")

	response := make([]model.RoleResponse, len(role))
	for i, role := range role {
		response[i] = model.RoleResponse{
			Id:   role.Id,
			Nama: role.Nama,
		}
	}

	return response
}

func (u *RefUseCase) GetJabatan() []model.JabatanResponse {
	jabatan, err := u.Repository.FindJabatan()
	exception.PanicIfError(err, "Failed to get all jabatan")

	response := make([]model.JabatanResponse, len(jabatan))
	for i, jabatan := range jabatan {
		response[i] = model.JabatanResponse{
			Id:   jabatan.Id,
			Nama: jabatan.Nama,
		}
	}

	return response
}

func (u *RefUseCase) GetDepartemen() []model.DepartemenResponse {
	departemen, err := u.Repository.FindDepartemen()
	exception.PanicIfError(err, "Failed to get all departemen")

	response := make([]model.DepartemenResponse, len(departemen))
	for i, departemen := range departemen {
		response[i] = model.DepartemenResponse{
			Id:   departemen.Id,
			Nama: departemen.Nama,
		}
	}

	return response
}

func (u *RefUseCase) GetStatusAktif() []model.StatusAktifResponse {
	status, err := u.Repository.FindStatusAktif()
	exception.PanicIfError(err, "Failed to get all status")

	response := make([]model.StatusAktifResponse, len(status))
	for i, status := range status {
		response[i] = model.StatusAktifResponse{
			Id:   status.Id,
			Nama: status.Nama,
		}
	}

	return response
}

func (u *RefUseCase) CreateShift(request *model.ShiftRequest) model.ShiftResponse {
	shift := entity.Shift{
		Id:        request.Id,
		Nama:      request.Nama,
		JamMasuk:  helper.ParseTime(request.JamMasuk, "15:04:05"),
		JamPulang: helper.ParseTime(request.JamPulang, "15:04:05"),
	}

	if err := u.Repository.InsertShift(&shift); err != nil {
		exception.PanicIfError(err, "Failed to insert shift")
	}

	response := model.ShiftResponse{
		Id:        shift.Id,
		Nama:      shift.Nama,
		JamMasuk:  helper.FormatTime(shift.JamMasuk, "15:04:05"),
		JamPulang: helper.FormatTime(shift.JamPulang, "15:04:05"),
	}

	return response
}

func (u *RefUseCase) GetShift() []model.ShiftResponse {
	shift, err := u.Repository.FindShift()
	exception.PanicIfError(err, "Failed to get all shift")

	response := make([]model.ShiftResponse, len(shift))
	for i, shift := range shift {
		response[i] = model.ShiftResponse{
			Id:        shift.Id,
			Nama:      shift.Nama,
			JamMasuk:  helper.FormatTime(shift.JamMasuk, "15:04:05"),
			JamPulang: helper.FormatTime(shift.JamPulang, "15:04:05"),
		}
	}

	return response
}

func (u *RefUseCase) GetShiftById(id string) model.ShiftResponse {
	shift, err := u.Repository.FindShiftById(id)
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Shift not found",
		})
	}

	response := model.ShiftResponse{
		Id:        shift.Id,
		Nama:      shift.Nama,
		JamMasuk:  helper.FormatTime(shift.JamMasuk, "15:04:05"),
		JamPulang: helper.FormatTime(shift.JamPulang, "15:04:05"),
	}

	return response
}

func (u *RefUseCase) UpdateShift(request *model.ShiftRequest, id string) model.ShiftResponse {
	shift, err := u.Repository.FindShiftById(id)
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Shift not found",
		})
	}

	shift.Id = request.Id
	shift.Nama = request.Nama
	shift.JamMasuk = helper.ParseTime(request.JamMasuk, "15:04:05")
	shift.JamPulang = helper.ParseTime(request.JamPulang, "15:04:05")

	if err := u.Repository.UpdateShift(&shift); err != nil {
		exception.PanicIfError(err, "Failed to update shift")
	}

	response := model.ShiftResponse{
		Id:        shift.Id,
		Nama:      shift.Nama,
		JamMasuk:  helper.FormatTime(shift.JamMasuk, "15:04:05"),
		JamPulang: helper.FormatTime(shift.JamPulang, "15:04:05"),
	}

	return response
}

func (u *RefUseCase) DeleteShift(id string) {
	shift, err := u.Repository.FindShiftById(id)
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Shift not found",
		})
	}

	if err := u.Repository.DeleteShift(&shift); err != nil {
		exception.PanicIfError(err, "Failed to delete shift")
	}
}

func (u *RefUseCase) GetAlasanCuti() []model.AlasanCutiResponse {
	alasan, err := u.Repository.FindAlasanCuti()
	exception.PanicIfError(err, "Failed to get all alasan")

	response := make([]model.AlasanCutiResponse, len(alasan))
	for i, alasan := range alasan {
		response[i] = model.AlasanCutiResponse{
			Id:   alasan.Id,
			Nama: alasan.Nama,
		}
	}

	return response
}

func (u *RefUseCase) GetKodePresensi(tanggal string) model.KodePresensiResponse {
	kode, err := u.Repository.FindKodePresensi(tanggal)
	exception.PanicIfError(err, "Failed to get kode presensi")

	response := model.KodePresensiResponse{
		Kode: kode.Kode,
	}

	return response
}

func (u *RefUseCase) GetIndustriFarmasi() []model.IndustriFarmasiResponse {
	industri, err := u.Repository.FindIndustriFarmasi()
	exception.PanicIfError(err, "Failed to get all industri farmasi")

	response := make([]model.IndustriFarmasiResponse, len(industri))
	for i, industri := range industri {
		response[i] = model.IndustriFarmasiResponse{
			Id:      industri.Id,
			Kode:    industri.Kode,
			Nama:    industri.Nama,
			Alamat:  industri.Alamat,
			Kota:    industri.Kota,
			Telepon: industri.Telepon,
		}
	}

	return response
}

func (u *RefUseCase) GetSatuanBarangMedis() []model.SatuanBarangMedisResponse {
	satuan, err := u.Repository.FindSatuanBarangMedis()
	exception.PanicIfError(err, "Failed to get all satuan")

	response := make([]model.SatuanBarangMedisResponse, len(satuan))
	for i, satuan := range satuan {
		response[i] = model.SatuanBarangMedisResponse{
			Id:   satuan.Id,
			Nama: satuan.Nama,
		}
	}

	return response
}

func (u *RefUseCase) GetJenisBarangMedis() []model.JenisBarangMedisResponse {
	jenis, err := u.Repository.FindJenisBarangMedis()
	exception.PanicIfError(err, "Failed to get all jenis")

	response := make([]model.JenisBarangMedisResponse, len(jenis))
	for i, jenis := range jenis {
		response[i] = model.JenisBarangMedisResponse{
			Id:   jenis.Id,
			Nama: jenis.Nama,
		}
	}

	return response
}

func (u *RefUseCase) GetKategoriBarangMedis() []model.KategoriBarangMedisResponse {
	kategori, err := u.Repository.FindKategoriBarangMedis()
	exception.PanicIfError(err, "Failed to get all kategori")

	response := make([]model.KategoriBarangMedisResponse, len(kategori))
	for i, kategori := range kategori {
		response[i] = model.KategoriBarangMedisResponse{
			Id:   kategori.Id,
			Nama: kategori.Nama,
		}
	}

	return response
}

func (u *RefUseCase) GetGolonganBarangMedis() []model.GolonganBarangMedisResponse {
	golongan, err := u.Repository.FindGolonganBarangMedis()
	exception.PanicIfError(err, "Failed to get all golongan")

	response := make([]model.GolonganBarangMedisResponse, len(golongan))
	for i, golongan := range golongan {
		response[i] = model.GolonganBarangMedisResponse{
			Id:   golongan.Id,
			Nama: golongan.Nama,
		}
	}

	return response
}

func (u *RefUseCase) GetRuangan() []model.RuanganResponse {
	ruangan, err := u.Repository.FindRuangan()
	exception.PanicIfError(err, "Failed to get all ruangan")

	response := make([]model.RuanganResponse, len(ruangan))
	for i, ruangan := range ruangan {
		response[i] = model.RuanganResponse{
			Id:   ruangan.Id,
			Nama: ruangan.Nama,
		}
	}

	return response
}

func (u *RefUseCase) GetSupplierBarangMedis() []model.SupplierBarangMedisResponse {
	supplier, err := u.Repository.FindSupplierBarangMedis()
	exception.PanicIfError(err, "Failed to get all supplier")

	response := make([]model.SupplierBarangMedisResponse, len(supplier))
	for i, supplier := range supplier {
		response[i] = model.SupplierBarangMedisResponse{
			Id:         supplier.Id,
			Nama:       supplier.Nama,
			Alamat:     supplier.Alamat,
			NoTelp:     supplier.NoTelp,
			Kota:       supplier.Kota,
			NamaBank:   supplier.NamaBank,
			NoRekening: supplier.NoRekening,
		}
	}

	return response
}
