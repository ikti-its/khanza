package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan/internal/repository"
)

type TagihanUseCase struct {
	Repository repository.TagihanRepository
}

func NewTagihanUseCase(repository *repository.TagihanRepository) *TagihanUseCase {
	return &TagihanUseCase{
		Repository: *repository,
	}
}

func (u *TagihanUseCase) Create(request *model.TagihanRequest, user string) model.TagihanResponse {
	updater := helper.MustParse(user)
	tagihan := entity.Tagihan{
		Id:           helper.MustNew(),
		IdPengajuan:  helper.MustParse(request.IdPengajuan),
		IdPemesanan:  helper.MustParse(request.IdPemesanan),
		IdPenerimaan: helper.MustParse(request.IdPenerimaan),
		Tanggal:      helper.ParseTime(request.Tanggal, "2006-01-02"),
		Jumlah:       request.Jumlah,
		IdPegawai:    helper.MustParse(request.IdPegawai),
		Keterangan:   request.Keterangan,
		Nomor:        request.Nomor,
		AkunBayar:    request.AkunBayar,
		Updater:      updater,
	}

	if err := u.Repository.Insert(&tagihan); err != nil {
		exception.PanicIfError(err, "Failed to insert tagihan")
	}

	response := model.TagihanResponse{
		Id:           tagihan.Id.String(),
		IdPengajuan:  tagihan.IdPengajuan.String(),
		IdPemesanan:  tagihan.IdPemesanan.String(),
		IdPenerimaan: tagihan.IdPenerimaan.String(),
		Tanggal:      helper.FormatTime(tagihan.Tanggal, "2006-01-02"),
		Jumlah:       tagihan.Jumlah,
		IdPegawai:    tagihan.IdPegawai.String(),
		Keterangan:   tagihan.Keterangan,
		Nomor:        tagihan.Nomor,
		AkunBayar:    tagihan.AkunBayar,
	}

	return response
}

func (u *TagihanUseCase) Get() []model.TagihanResponse {
	tagihan, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all tagihan")

	response := make([]model.TagihanResponse, len(tagihan))
	for i, tagihan := range tagihan {
		response[i] = model.TagihanResponse{
			Id:           tagihan.Id.String(),
			IdPengajuan:  tagihan.IdPengajuan.String(),
			IdPemesanan:  tagihan.IdPemesanan.String(),
			IdPenerimaan: tagihan.IdPenerimaan.String(),
			Tanggal:      helper.FormatTime(tagihan.Tanggal, "2006-01-02"),
			Jumlah:       tagihan.Jumlah,
			IdPegawai:    tagihan.IdPegawai.String(),
			Keterangan:   tagihan.Keterangan,
			Nomor:        tagihan.Nomor,
			AkunBayar:    tagihan.AkunBayar,
		}
	}

	return response
}

func (u *TagihanUseCase) GetPage(page, size int) model.TagihanPageResponse {
	tagihan, total, err := u.Repository.FindPage(page, size)
	exception.PanicIfError(err, "Failed to get paged tagihan")

	response := make([]model.TagihanResponse, len(tagihan))
	for i, tagihan := range tagihan {
		response[i] = model.TagihanResponse{
			Id:           tagihan.Id.String(),
			IdPengajuan:  tagihan.IdPengajuan.String(),
			IdPemesanan:  tagihan.IdPemesanan.String(),
			IdPenerimaan: tagihan.IdPenerimaan.String(),
			Tanggal:      helper.FormatTime(tagihan.Tanggal, "2006-01-02"),
			Jumlah:       tagihan.Jumlah,
			IdPegawai:    tagihan.IdPegawai.String(),
			Keterangan:   tagihan.Keterangan,
			Nomor:        tagihan.Nomor,
			AkunBayar:    tagihan.AkunBayar,
		}
	}

	pagedResponse := model.TagihanPageResponse{
		Page:    page,
		Size:    size,
		Total:   total,
		Tagihan: response,
	}

	return pagedResponse
}

func (u *TagihanUseCase) GetById(id string) model.TagihanResponse {
	tagihan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Tagihan not found",
		})
	}

	response := model.TagihanResponse{
		Id:           tagihan.Id.String(),
		IdPengajuan:  tagihan.IdPengajuan.String(),
		IdPemesanan:  tagihan.IdPemesanan.String(),
		IdPenerimaan: tagihan.IdPenerimaan.String(),
		Tanggal:      helper.FormatTime(tagihan.Tanggal, "2006-01-02"),
		Jumlah:       tagihan.Jumlah,
		IdPegawai:    tagihan.IdPegawai.String(),
		Keterangan:   tagihan.Keterangan,
		Nomor:        tagihan.Nomor,
		AkunBayar:    tagihan.AkunBayar,
	}

	return response
}

func (u *TagihanUseCase) Update(request *model.TagihanRequest, id, user string) model.TagihanResponse {
	tagihan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Tagihan not found",
		})
	}

	tagihan.IdPengajuan = helper.MustParse(request.IdPengajuan)
	tagihan.IdPemesanan = helper.MustParse(request.IdPemesanan)
	tagihan.IdPenerimaan = helper.MustParse(request.IdPenerimaan)
	tagihan.Tanggal = helper.ParseTime(request.Tanggal, "2006-01-02")
	tagihan.Jumlah = request.Jumlah
	tagihan.IdPegawai = helper.MustParse(request.IdPegawai)
	tagihan.Keterangan = request.Keterangan
	tagihan.Nomor = request.Nomor
	tagihan.AkunBayar = request.AkunBayar
	tagihan.Updater = helper.MustParse(user)

	if err := u.Repository.Update(&tagihan); err != nil {
		exception.PanicIfError(err, "Failed to update tagihan")
	}

	response := model.TagihanResponse{
		Id:           tagihan.Id.String(),
		IdPengajuan:  tagihan.IdPengajuan.String(),
		IdPemesanan:  tagihan.IdPemesanan.String(),
		IdPenerimaan: tagihan.IdPenerimaan.String(),
		Tanggal:      helper.FormatTime(tagihan.Tanggal, "2006-01-02"),
		Jumlah:       tagihan.Jumlah,
		IdPegawai:    tagihan.IdPegawai.String(),
		Keterangan:   tagihan.Keterangan,
		Nomor:        tagihan.Nomor,
		AkunBayar:    tagihan.AkunBayar,
	}

	return response
}

func (u *TagihanUseCase) Delete(id, user string) {
	tagihan, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "Tagihan not found",
		})
	}

	tagihan.Updater = helper.MustParse(user)

	if err := u.Repository.Delete(&tagihan); err != nil {
		exception.PanicIfError(err, "Failed to delete tagihan")
	}
}
