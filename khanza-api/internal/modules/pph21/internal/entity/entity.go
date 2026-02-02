package entity

type Entity struct {
	No_pph21    string  `json:"no_pph21"    db:"no_pph21"`
	Pkp_bawah   float64 `json:"pkp_bawah"   db:"pkp_bawah"`
	Pkp_atas    float64 `json:"pkp_atas"    db:"pkp_atas"`
 	Tarif_pajak float64 `json:"tarif_pajak" db:"tarif_pajak"`
}
