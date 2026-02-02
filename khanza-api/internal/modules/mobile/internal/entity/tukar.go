package entity

import "github.com/google/uuid"

type Tukar struct {
	Id               uuid.UUID `db:"id"`
	IdSender         uuid.UUID `db:"id_sender"`
	IdRecipient      uuid.UUID `db:"id_recipient"`
	IdHari           int       `db:"id_hari"`
	IdShiftSender    string    `db:"id_shift_sender"`
	IdShiftRecipient string    `db:"id_shift_recipient"`
	Status           string    `db:"status"`
}
