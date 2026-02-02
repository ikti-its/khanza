package model

type KetersediaanResponse struct {
	Pegawai    string  `json:"pegawai"`
	NIP        string  `json:"nip"`
	Telepon    string  `json:"telepon"`
	Jabatan    string  `json:"jabatan"`
	Departemen string  `json:"departemen"`
	Foto       string  `json:"foto"`
	Nama       string  `json:"nama"`
	Alamat     string  `json:"alamat"`
	Latitude   float64 `json:"latitude"`
	Longitude  float64 `json:"longitude"`
	Available  bool    `json:"available"`
}

type KetersediaanPageResponse struct {
	Page         int                    `json:"page"`
	Size         int                    `json:"size"`
	Total        int                    `json:"total"`
	Ketersediaan []KetersediaanResponse `json:"ketersediaan"`
}
