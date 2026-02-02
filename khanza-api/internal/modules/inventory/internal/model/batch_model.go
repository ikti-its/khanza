package model

type BatchRequest struct {
	NoBatch       string  `json:"no_batch"`
	NoFaktur      string  `json:"no_faktur"`
	IdBarangMedis string  `json:"id_barang_medis"`
	TanggalDatang string  `json:"tanggal_datang"`
	Kadaluwarsa   string  `json:"kadaluwarsa"`
	Asal          string  `json:"asal"`
	HDasar        float64 `json:"h_dasar"`
	HBeli         float64 `json:"h_beli"`
	HRalan        float64 `json:"h_ralan"`
	HKelasI       float64 `json:"h_kelas1"`
	HKelasII      float64 `json:"h_kelas2"`
	HKelasIII     float64 `json:"h_kelas3"`
	HUtama        float64 `json:"h_utama"`
	HVIP          float64 `json:"h_vip"`
	HVVIP         float64 `json:"h_vvip"`
	HBeliLuar     float64 `json:"h_beliluar"`
	HJualBebas    float64 `json:"h_jualbebas"`
	HKaryawan     float64 `json:"h_karyawan"`
	JumlahBeli    int     `json:"jumlahbeli"`
	Sisa          int     `json:"sisa"`
}

type BatchResponse struct {
	NoBatch       string  `json:"no_batch"`
	NoFaktur      string  `json:"no_faktur"`
	IdBarangMedis string  `json:"id_barang_medis"`
	TanggalDatang string  `json:"tanggal_datang"`
	Kadaluwarsa   string  `json:"kadaluwarsa"`
	Asal          string  `json:"asal"`
	HDasar        float64 `json:"h_dasar"`
	HBeli         float64 `json:"h_beli"`
	HRalan        float64 `json:"h_ralan"`
	HKelasI       float64 `json:"h_kelas1"`
	HKelasII      float64 `json:"h_kelas2"`
	HKelasIII     float64 `json:"h_kelas3"`
	HUtama        float64 `json:"h_utama"`
	HVIP          float64 `json:"h_vip"`
	HVVIP         float64 `json:"h_vvip"`
	HBeliLuar     float64 `json:"h_beliluar"`
	HJualBebas    float64 `json:"h_jualbebas"`
	HKaryawan     float64 `json:"h_karyawan"`
	JumlahBeli    int     `json:"jumlahbeli"`
	Sisa          int     `json:"sisa"`
}
