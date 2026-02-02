package entity

type ResepObat struct {
	NoResep       string `db:"no_resep" json:"no_resep"`
	TglPerawatan  string `db:"tgl_perawatan" json:"tgl_perawatan"` // use string if you're parsing date manually
	Jam           string `db:"jam" json:"jam"`                     // time as string, e.g., "14:30:00"
	NoRawat       string `db:"no_rawat" json:"no_rawat"`
	KdDokter      string `db:"kd_dokter" json:"kd_dokter"`
	TglPeresepan  string `db:"tgl_peresepan" json:"tgl_peresepan"`   // nullable date
	JamPeresepan  string `db:"jam_peresepan" json:"jam_peresepan"`   // nullable time
	Status        string `db:"status" json:"status"`                 // expected: "ralan" or "ranap"
	TglPenyerahan string `db:"tgl_penyerahan" json:"tgl_penyerahan"` // not null
	JamPenyerahan string `db:"jam_penyerahan" json:"jam_penyerahan"` // not null
	Validasi      bool   `db:"validasi" json:"validasi"`
}
