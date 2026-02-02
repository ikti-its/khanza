package model

type BrgmedisRequest struct {
	KodeBarang  string  `json:"kode_barang"`
	Kandungan   string  `json:"kandungan"`
	IdIndustri  int     `json:"id_industri"`
	Nama        string  `json:"nama"`
	IdSatBesar  int     `json:"id_satbesar"`
	IdSatuan    int     `json:"id_satuan"`
	HDasar      float64 `json:"h_dasar"`
	HBeli       float64 `json:"h_beli"`
	HRalan      float64 `json:"h_ralan"`
	HKelasI     float64 `json:"h_kelas1"`
	HKelasII    float64 `json:"h_kelas2"`
	HKelasIII   float64 `json:"h_kelas3"`
	HUtama      float64 `json:"h_utama"`
	HVIP        float64 `json:"h_vip"`
	HVVIP       float64 `json:"h_vvip"`
	HBeliLuar   float64 `json:"h_beliluar"`
	HJualBebas  float64 `json:"h_jualbebas"`
	HKaryawan   float64 `json:"h_karyawan"`
	StokMinimum int     `json:"stok_minimum"`
	IdJenis     int     `json:"id_jenis"`
	Isi         int     `json:"isi"`
	Kapasitas   int     `json:"kapasitas"`
	Kadaluwarsa string  `json:"kadaluwarsa"`
	IdKategori  int     `json:"id_kategori"`
	IdGolongan  int     `json:"id_golongan"`
}

type BrgmedisResponse struct {
	Id          string  `json:"id"`
	KodeBarang  string  `json:"kode_barang"`
	Kandungan   string  `json:"kandungan"`
	IdIndustri  int     `json:"id_industri"`
	Nama        string  `json:"nama"`
	IdSatBesar  int     `json:"id_satbesar"`
	IdSatuan    int     `json:"id_satuan"`
	HDasar      float64 `json:"h_dasar"`
	HBeli       float64 `json:"h_beli"`
	HRalan      float64 `json:"h_ralan"`
	HKelasI     float64 `json:"h_kelas1"`
	HKelasII    float64 `json:"h_kelas2"`
	HKelasIII   float64 `json:"h_kelas3"`
	HUtama      float64 `json:"h_utama"`
	HVIP        float64 `json:"h_vip"`
	HVVIP       float64 `json:"h_vvip"`
	HBeliLuar   float64 `json:"h_beliluar"`
	HJualBebas  float64 `json:"h_jualbebas"`
	HKaryawan   float64 `json:"h_karyawan"`
	StokMinimum int     `json:"stok_minimum"`
	IdJenis     int     `json:"id_jenis"`
	Isi         int     `json:"isi"`
	Kapasitas   int     `json:"kapasitas"`
	Kadaluwarsa string  `json:"kadaluwarsa"`
	IdKategori  int     `json:"id_kategori"`
	IdGolongan  int     `json:"id_golongan"`
}
