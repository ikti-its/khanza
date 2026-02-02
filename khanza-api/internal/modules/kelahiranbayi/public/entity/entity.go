package entity

type Entity struct {
	No_rkm_medis         string `json:"no_rkm_medis" db:"no_rkm_medis"`
	Nm_pasien            string `json:"nm_pasien" db:"nm_pasien"`
	Jk                   string `json:"jk" db:"jk"`
	Tmp_lahir            string `json:"tmp_lahir" db:"tmp_lahir"`
	Tgl_lahir            string `json:"tgl_lahir" db:"tgl_lahir"`
	Jam                  string `json:"jam" db:"jam"`
	Umur                 string `json:"umur" db:"umur"`
	Tgl_daftar           string `json:"tgl_daftar" db:"tgl_daftar"`

	No_rm_ibu            string `json:"no_rm_ibu" db:"no_rm_ibu"`
	Nm_ibu               string `json:"nm_ibu" db:"nm_ibu"`
	Umur_ibu             string `json:"umur_ibu" db:"umur_ibu"`
	Nm_ayah              string `json:"nm_ayah" db:"nm_ayah"`
	Umur_ayah            string `json:"umur_ayah" db:"umur_ayah"`
	Alamat               string `json:"alamat" db:"alamat"`

	Bb                   int    `json:"bb" db:"bb"`
	Pb                   float64 `json:"pb" db:"pb"`

	Proses_lahir         string `json:"proses_lahir" db:"proses_lahir"`
	Kelahiran_ke         int    `json:"kelahiran_ke" db:"kelahiran_ke"`
	Keterangan           string `json:"keterangan" db:"keterangan"`
	Diagnosa             string `json:"diagnosa" db:"diagnosa"`
	Penyulit_kehamilan   string `json:"penyulit_kehamilan" db:"penyulit_kehamilan"`
	Ketuban              string `json:"ketuban" db:"ketuban"`

	Lk_perut             float64 `json:"lk_perut" db:"lk_perut"`
	Lk_kepala            float64 `json:"lk_kepala" db:"lk_kepala"`
	Lk_dada              float64 `json:"lk_dada" db:"lk_dada"`

	Penolong             string `json:"penolong" db:"penolong"`
	No_skl               string `json:"no_skl" db:"no_skl"`
	Gravida              int    `json:"gravida" db:"gravida"`
	Para                 int    `json:"para" db:"para"`
	Abortus              int    `json:"abortus" db:"abortus"`

	F1                   int    `json:"f1" db:"f1"`
	U1                   int    `json:"u1" db:"u1"`
	T1                   int    `json:"t1" db:"t1"`
	R1                   int    `json:"r1" db:"r1"`
	W1                   int    `json:"w1" db:"w1"`
	N1                   int    `json:"n1" db:"n1"`

	F5                   int    `json:"f5" db:"f5"`
	U5                   int    `json:"u5" db:"u5"`
	T5                   int    `json:"t5" db:"t5"`
	R5                   int    `json:"r5" db:"r5"`
	W5                   int    `json:"w5" db:"w5"`
	N5                   int    `json:"n5" db:"n5"`

	F10                  int    `json:"f10" db:"f10"`
	U10                  int    `json:"u10" db:"u10"`
	T10                  int    `json:"t10" db:"t10"`
	R10                  int    `json:"r10" db:"r10"`
	W10                  int    `json:"w10" db:"w10"`
	N10                  int    `json:"n10" db:"n10"`

	Resusitas            string `json:"resusitas" db:"resusitas"`
	Obat                 string `json:"obat" db:"obat"`
	Mikasi               string `json:"mikasi" db:"mikasi"`
	Mikonium             string `json:"mikonium" db:"mikonium"`
}
