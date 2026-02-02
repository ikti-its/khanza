package model

type OrganisasiRequest struct {
	Nama      string  `json:"nama" validate:"required"`
	Alamat    string  `json:"alamat" validate:"required"`
	Latitude  float64 `json:"latitude" validate:"required,latitude"`
	Longitude float64 `json:"longitude" validate:"required,longitude"`
	Radius    float64 `json:"radius" validate:"required"`
}

type OrganisasiResponse struct {
	Id        string  `json:"id"`
	Nama      string  `json:"nama"`
	Alamat    string  `json:"alamat"`
	Latitude  float64 `json:"latitude"`
	Longitude float64 `json:"longitude"`
	Radius    float64 `json:"radius"`
}
