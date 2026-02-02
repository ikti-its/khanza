package model

type ProfileRequest struct {
	Akun      string  `json:"akun" validate:"required,uuid4"`
	Foto      string  `json:"foto" validate:"required"`
	Email     string  `json:"email" validate:"required"`
	Password  string  `json:"password" validate:"required,min=6,max=20"`
	Telepon   string  `json:"telepon" validate:"required,min=10,max=15"`
	Alamat    string  `json:"alamat" validate:"required"`
	AlamatLat float64 `json:"alamat_lat" validate:"required,latitude"`
	AlamatLon float64 `json:"alamat_lon" validate:"required,longitude"`
}

type ProfileResponse struct {
	Akun      string  `json:"akun"`
	Foto      string  `json:"foto"`
	Email     string  `json:"email"`
	Telepon   string  `json:"telepon"`
	Alamat    string  `json:"alamat"`
	AlamatLat float64 `json:"alamat_lat"`
	AlamatLon float64 `json:"alamat_lon"`
}
