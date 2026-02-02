package entity

import "time"

type Tindakan struct {
	NomorRawat   string     `db:"nomor_rawat"`
	NomorRM      string     `db:"nomor_rm"`
	NamaPasien   string     `db:"nama_pasien"`
	Tindakan     *string    `db:"tindakan"`
	KodeDokter   *string    `db:"kode_dokter"`
	NamaDokter   *string    `db:"nama_dokter"`
	NIP          *string    `db:"nip"`
	NamaPetugas  *string    `db:"nama_petugas"`
	TanggalRawat time.Time  `db:"tanggal_rawat"`
	JamRawat     time.Time  `db:"jam_rawat"`
	Biaya        *int64     `db:"biaya"`
	CreatedAt    *time.Time `db:"created_at"`
}

type JenisTindakan struct {
	Kode                    string  `db:"kode" json:"kode"`
	NamaTindakan            string  `db:"nama_tindakan" json:"nama_tindakan"`
	KodeKategori            string  `db:"kode_kategori" json:"kode_kategori"`
	Material                float64 `db:"material" json:"material"`
	BHP                     float64 `db:"bhp" json:"bhp"`
	TarifTindakanDokter     float64 `db:"tarif_tindakan_dokter" json:"tarif_tindakan_dokter"`
	TarifTindakanPerawat    float64 `db:"tarif_tindakan_perawat" json:"tarif_tindakan_perawat"`
	KSO                     float64 `db:"kso" json:"kso"`
	Manajemen               float64 `db:"manajemen" json:"manajemen"`
	TotalBayarDokter        float64 `db:"total_bayar_dokter" json:"total_bayar_dokter"`
	TotalBayarPerawat       float64 `db:"total_bayar_perawat" json:"total_bayar_perawat"`
	TotalBayarDokterPerawat float64 `db:"total_bayar_dokter_perawat" json:"total_bayar_dokter_perawat"`
	KodePJ                  string  `db:"kode_pj" json:"kode_pj"`
	KodeBangsal             string  `db:"kode_bangsal" json:"kode_bangsal"`
	Status                  string  `db:"status" json:"status"`
	Kelas                   string  `db:"kelas" json:"kelas"`
	Tarif                   float64 `db:"tarif" json:"tarif"`
}
