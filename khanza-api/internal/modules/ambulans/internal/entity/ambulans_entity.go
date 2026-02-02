package entity

type Ambulans struct {
	NoAmbulans string `json:"no_ambulans" db:"no_ambulans"` // Primary Key, VARCHAR(20)
	Status     string `json:"status" db:"status"`           // NOT NULL, VARCHAR(20)
	Supir      string `json:"supir" db:"supir"`             // VARCHAR(50)
}
