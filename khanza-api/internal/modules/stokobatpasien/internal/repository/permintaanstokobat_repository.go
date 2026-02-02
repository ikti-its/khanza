package repository

import (
	"context"

	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien/internal/entity"
	"github.com/jmoiron/sqlx"
)

type PermintaanStokObatRepository interface {
	Insert(permintaan *entity.PermintaanStokObat) error
	FindAll() ([]entity.PermintaanStokObat, error)
	FindByNoPermintaan(noPermintaan string) (*entity.PermintaanStokObat, error)
	Update(permintaan *entity.PermintaanStokObat) error
	Delete(noPermintaan string) error
	GetByNomorRawat(nomorRawat string) ([]entity.PermintaanStokObat, error)
	UpdateValidasi(ctx context.Context, noPermintaan string, tglValidasi, jamValidasi string) error
	InsertWithDetail(
		tx *sqlx.Tx,
		permintaan *entity.PermintaanStokObat,
		details []entity.StokObatPasien,
	) error
}
