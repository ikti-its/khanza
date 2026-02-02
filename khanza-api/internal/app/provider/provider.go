package provider

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/modules/akun"
	"github.com/ikti-its/khanza-api/internal/modules/ambulans"
	"github.com/ikti-its/khanza-api/internal/modules/auth"
	"github.com/ikti-its/khanza-api/internal/modules/dokter"
	"github.com/ikti-its/khanza-api/internal/modules/dokterjaga"
	"github.com/ikti-its/khanza-api/internal/modules/file"
	"github.com/ikti-its/khanza-api/internal/modules/inventory"
	"github.com/ikti-its/khanza-api/internal/modules/kamar"
	"github.com/ikti-its/khanza-api/internal/modules/kehadiran"
	"github.com/ikti-its/khanza-api/internal/modules/mobile"
	"github.com/ikti-its/khanza-api/internal/modules/obat"
	"github.com/ikti-its/khanza-api/internal/modules/organisasi"
	"github.com/ikti-its/khanza-api/internal/modules/pasien"
	"github.com/ikti-its/khanza-api/internal/modules/pegawai"
	"github.com/ikti-its/khanza-api/internal/modules/pengadaan"
	"github.com/ikti-its/khanza-api/internal/modules/rawatinap"
	"github.com/ikti-its/khanza-api/internal/modules/ref"
	"github.com/ikti-its/khanza-api/internal/modules/registrasi"
	"github.com/ikti-its/khanza-api/internal/modules/rekammedis"
	"github.com/ikti-its/khanza-api/internal/modules/resep"
	permintaanreseppulang "github.com/ikti-its/khanza-api/internal/modules/reseppulang"
	"github.com/ikti-its/khanza-api/internal/modules/rujukan"
	"github.com/ikti-its/khanza-api/internal/modules/stokobatpasien"
	"github.com/ikti-its/khanza-api/internal/modules/tindakan"
	"github.com/ikti-its/khanza-api/internal/modules/ugd"
	"github.com/ikti-its/khanza-api/internal/modules/web"
	"github.com/ikti-its/khanza-api/internal/modules/example"
	"github.com/ikti-its/khanza-api/internal/modules/bpjs"
	"github.com/ikti-its/khanza-api/internal/modules/golongan"
	"github.com/ikti-its/khanza-api/internal/modules/jabatan"
	"github.com/ikti-its/khanza-api/internal/modules/ptkp"
	"github.com/ikti-its/khanza-api/internal/modules/pph21"
	"github.com/ikti-its/khanza-api/internal/modules/lembur"
	"github.com/ikti-its/khanza-api/internal/modules/umr"
	"github.com/ikti-its/khanza-api/internal/modules/thr"
	"github.com/ikti-its/khanza-api/internal/modules/pesangon"	
	"github.com/ikti-its/khanza-api/internal/modules/upmk"		
	"github.com/jmoiron/sqlx"
	"github.com/ikti-its/khanza-api/internal/modules/masterpasien"
	"github.com/ikti-its/khanza-api/internal/modules/instansi"
	"github.com/ikti-its/khanza-api/internal/modules/pasienmeninggal"
	"github.com/ikti-its/khanza-api/internal/modules/kelahiranbayi"
    "github.com/ikti-its/khanza-api/internal/modules/asuransi"


)

type Provider struct {
	App       *fiber.App
	Config    *config.Config
	PG        *sqlx.DB
	Validator *config.Validator
}

func (p *Provider) Provide() {
	akun.ProvideAkun(p.App, p.Config, p.PG, p.Validator)
	auth.ProvideAuth(p.App, p.Config, p.PG, p.Validator)
	file.ProvideFile(p.App, p.Config, p.Validator)
	pegawai.ProvidePegawai(p.App, p.PG, p.Validator)
	kehadiran.ProvideKehadiran(p.App, p.PG, p.Validator)
	inventory.ProvideInventory(p.App, p.PG)
	pengadaan.ProvidePengadaan(p.App, p.PG, p.Validator)
	organisasi.ProvideOrganisasi(p.App, p.PG, p.Validator)
	ref.ProvideRef(p.App, p.PG)
	mobile.ProvideMobile(p.App, p.PG, p.Validator)
	web.ProvideWeb(p.App, p.PG, p.Validator)
	registrasi.ProvideRegistrasi(p.App, p.PG, p.Validator)
	kamar.ProvideKamar(p.App, p.PG, p.Validator)
	rujukan.ProvideRujukan(p.App, p.PG, p.Validator)
	rawatinap.ProvideRawatInap(p.App, p.PG)
	ambulans.ProvideAmbulans(p.App, p.PG, p.Validator)
	ugd.ProvideUGD(p.App, p.PG, p.Validator)
	tindakan.ProvideTindakan(p.App, p.PG)
	dokterjaga.ProvideDokterJaga(p.App, p.PG, p.Validator)
	obat.ProvidePemberianObat(p.App, p.PG)
	resep.ProvideResep(p.App, p.PG)
	dokter.ProvideDokter(p.App, p.PG)
	permintaanreseppulang.ProvidePermintaanResepPulang(p.App, p.PG)
	stokobatpasien.ProvideStokObatPasien(p.App, p.PG, p.Validator)
	rekammedis.ProvideRekamMedis(p.App, p.PG, p.Validator)
	pasien.ProvidePasien(p.App, p.PG, p.Validator)
	example.Provide(p.App, p.PG, p.Validator)
	bpjs.Provide(p.App, p.PG, p.Validator)
	golongan.Provide(p.App, p.PG, p.Validator)
	jabatan.Provide(p.App, p.PG, p.Validator)
	ptkp.Provide(p.App, p.PG, p.Validator)
	pph21.Provide(p.App, p.PG, p.Validator)
	lembur.Provide(p.App, p.PG, p.Validator)
	umr.Provide(p.App, p.PG, p.Validator)
	thr.Provide(p.App, p.PG, p.Validator)
	pesangon.Provide(p.App, p.PG, p.Validator)
	upmk.Provide(p.App, p.PG, p.Validator)
	masterpasien.Provide(p.App, p.PG, p.Validator)
	instansi.ProvideInstansi(p.App, p.PG, p.Validator)
	pasienmeninggal.Provide(p.App, p.PG, p.Validator)
	kelahiranbayi.Provide(p.App, p.PG, p.Validator)
	asuransi.Provide(p.App, p.PG, p.Validator)



}
