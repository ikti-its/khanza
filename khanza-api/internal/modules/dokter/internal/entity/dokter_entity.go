package entity

type Dokter struct {
	KodeDokter    string `db:"kode_dokter" json:"kode_dokter"`
	NamaDokter    string `db:"nama_dokter" json:"nama_dokter"`
	JenisKelamin  string `db:"jenis_kelamin" json:"jenis_kelamin"`
	AlamatTinggal string `db:"alamat_tinggal" json:"alamat_tinggal"`
	NoTelp        string `db:"no_telp" json:"no_telp"`
	Spesialis     string `db:"spesialis" json:"spesialis"`
	IzinPraktik   string `db:"izin_praktik" json:"izin_praktik"`
}
