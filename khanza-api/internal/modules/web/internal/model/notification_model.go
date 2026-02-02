package model

type NotificationRequest struct {
	Recipient string `json:"recipient" validate:"required,uuid4"`
	Tanggal   string `json:"tanggal" validate:"required"`
	Judul     string `json:"judul"`
	Pesan     string `json:"pesan"`
}

type NotificationResponse struct {
	Id        string `json:"id"`
	Sender    string `json:"sender"`
	Recipient string `json:"recipient"`
	Tanggal   string `json:"tanggal"`
	Judul     string `json:"judul"`
	Pesan     string `json:"pesan"`
	Read      bool   `json:"read"`
}
