package model

type Ambulans struct {
	NoAmbulans string `json:"no_ambulans" db:"no_ambulans"` // Primary Key, VARCHAR(20)
	Status     string `json:"status" db:"status"`           // NOT NULL, VARCHAR(20)
	Supir      string `json:"supir" db:"supir"`             // VARCHAR(50)
}

type AmbulansRequest struct {
	NoAmbulans string `json:"no_ambulans" db:"no_ambulans"` // Primary Key, VARCHAR(20)
	Status     string `json:"status" db:"status"`           // NOT NULL, VARCHAR(20)
	Supir      string `json:"supir" db:"supir"`             // VARCHAR(50)
}

type AmbulansResponse struct {
	NoAmbulans string      `json:"no_ambulans" db:"no_ambulans"` // Primary Key, VARCHAR(20)
	Status     string      `json:"status" db:"status"`           // NOT NULL, VARCHAR(20)
	Supir      string      `json:"supir" db:"supir"`             // VARCHAR(50)
	Code       int         `json:"code"`
	Data       interface{} `json:"data"`
}

type AmbulansPageResponse struct {
	Page  int                `json:"page"`
	Size  int                `json:"size"`
	Total int                `json:"total"`
	Data  []AmbulansResponse `json:"data"`
}
