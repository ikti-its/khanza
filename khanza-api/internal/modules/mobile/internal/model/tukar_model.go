package model

type TukarRequest struct {
	IdSender         string `json:"id_sender"`
	IdRecipient      string `json:"id_recipient"`
	IdHari           int    `json:"id_hari"`
	IdShiftSender    string `json:"id_shift_sender"`
	IdShiftRecipient string `json:"id_shift_recipient"`
	Status           string `json:"status"`
}

type TukarResponse struct {
	Id               string `json:"id"`
	IdSender         string `json:"id_sender"`
	IdRecipient      string `json:"id_recipient"`
	IdHari           int    `json:"id_hari"`
	IdShiftSender    string `json:"id_shift_sender"`
	IdShiftRecipient string `json:"id_shift_recipient"`
	Status           string `json:"status"`
}
