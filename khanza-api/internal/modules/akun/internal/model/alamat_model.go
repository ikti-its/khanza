package model

type AlamatRequest struct {
	IdAkun    string  `json:"id_akun" validate:"required,uuid4"`
	Alamat    string  `json:"alamat" validate:"required"`
	AlamatLat float64 `json:"alamat_lat" validate:"required,latitude"`
	AlamatLon float64 `json:"alamat_lon" validate:"required,longitude"`
}

type AlamatResponse struct {
	IdAkun    string  `json:"id_akun"`
	Alamat    string  `json:"alamat"`
	AlamatLat float64 `json:"alamat_lat"`
	AlamatLon float64 `json:"alamat_lon"`
}

type AlamatPageResponse struct {
	Page   int              `json:"page"`
	Size   int              `json:"size"`
	Total  int              `json:"total"`
	Alamat []AlamatResponse `json:"alamat"`
}
