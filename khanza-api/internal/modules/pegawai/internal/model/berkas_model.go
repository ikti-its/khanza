package model

type BerkasRequest struct {
	IdPegawai    string `json:"id_pegawai" validate:"required,uuid4"`
	NIK          string `json:"nik" validate:"required,numeric,max=16"`
	TempatLahir  string `json:"tempat_lahir" validate:"required"`
	TanggalLahir string `json:"tanggal_lahir" validate:"required"`
	Agama        string `json:"agama" validate:"required,oneof=Islam Kristen Katolik Hindu Buddha Konghucu Lainnya"`
	Pendidikan   string `json:"pendidikan" validate:"required,oneof='Tidak Sekolah' SD SMP SMA D3 D4 S1 S2 S3"`
	KTP          string `json:"ktp" validate:"required"`
	KK           string `json:"kk" validate:"required"`
	NPWP         string `json:"npwp" validate:"required"`
	BPJS         string `json:"bpjs"`
	Ijazah       string `json:"ijazah"`
	SKCK         string `json:"skck"`
	STR          string `json:"str"`
	SerKom       string `json:"serkom"`
}

type BerkasResponse struct {
	IdPegawai    string `json:"id_pegawai"`
	NIK          string `json:"nik"`
	TempatLahir  string `json:"tempat_lahir"`
	TanggalLahir string `json:"tanggal_lahir"`
	Agama        string `json:"agama"`
	Pendidikan   string `json:"pendidikan"`
	KTP          string `json:"ktp"`
	KK           string `json:"kk"`
	NPWP         string `json:"npwp"`
	BPJS         string `json:"bpjs,omitempty"`
	Ijazah       string `json:"ijazah,omitempty"`
	SKCK         string `json:"skck,omitempty"`
	STR          string `json:"str,omitempty"`
	SerKom       string `json:"serkom,omitempty"`
}

type BerkasPageResponse struct {
	Page   int              `json:"page"`
	Size   int              `json:"size"`
	Total  int              `json:"total"`
	Berkas []BerkasResponse `json:"berkas_pegawai"`
}
