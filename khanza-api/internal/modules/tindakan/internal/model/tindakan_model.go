package model

type Tindakan struct {
	NomorRawat   string  `json:"nomor_rawat"`
	NomorRM      string  `json:"nomor_rm"`
	NamaPasien   string  `json:"nama_pasien"`
	Tindakan     string  `json:"tindakan"`
	KodeDokter   string  `json:"kode_dokter"`
	NamaDokter   string  `json:"nama_dokter"`
	NIP          string  `json:"nip"`
	NamaPetugas  string  `json:"nama_petugas"`
	TanggalRawat string  `json:"tanggal_rawat"` // e.g., "2025-04-13"
	JamRawat     string  `json:"jam_rawat"`     // e.g., "14:30:00"
	Biaya        float64 `json:"biaya"`
	CreatedAt    string  `json:"created_at"` // e.g., "2025-07-10T12:00:00Z"
}

type TindakanRequest struct {
	NomorRawat   string  `json:"nomor_rawat" validate:"required"`
	NomorRM      string  `json:"nomor_rm"`
	NamaPasien   string  `json:"nama_pasien"`
	Tindakan     string  `json:"tindakan"`
	KodeDokter   string  `json:"kode_dokter"`
	NamaDokter   string  `json:"nama_dokter"`
	NIP          string  `json:"nip"`
	NamaPetugas  string  `json:"nama_petugas"`
	TanggalRawat string  `json:"tanggal_rawat" validate:"required"` // format: yyyy-mm-dd
	JamRawat     string  `json:"jam_rawat" validate:"required"`     // format: HH:mm:ss
	Biaya        float64 `json:"biaya"`
	// Note: created_at is usually auto-generated, so it's typically omitted from request
}

type TindakanResponse struct {
	NomorRawat   string  `json:"nomor_rawat"`
	NomorRM      string  `json:"nomor_rm"`
	NamaPasien   string  `json:"nama_pasien"`
	Tindakan     string  `json:"tindakan"`
	KodeDokter   string  `json:"kode_dokter"`
	NamaDokter   string  `json:"nama_dokter"`
	NIP          string  `json:"nip"`
	NamaPetugas  string  `json:"nama_petugas"`
	TanggalRawat string  `json:"tanggal_rawat"`
	JamRawat     string  `json:"jam_rawat"`
	Biaya        float64 `json:"biaya"`
	CreatedAt    string  `json:"created_at"` // included in response
}

type JenisTindakan struct {
	KodeJenis    string  `db:"kode" json:"kode_jenis"`
	NamaTindakan string  `db:"nama_tindakan" json:"nama_tindakan"`
	Kategori     string  `db:"kategori" json:"kategori"`
	Kelas        string  `db:"kelas" json:"kelas"`
	Biaya        float64 `db:"biaya" json:"biaya"`
}

type TindakanPageResponse struct {
	Page     int                `json:"page"`
	Size     int                `json:"size"`
	Total    int                `json:"total"`
	Tindakan []TindakanResponse `json:"tindakan"`
}
