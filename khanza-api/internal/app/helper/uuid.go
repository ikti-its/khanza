package helper

import (
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/app/exception"
)

func MustNew() uuid.UUID {
	id, err := uuid.NewRandom()
	exception.PanicIfError(err, "Failed to generate UUID")

	return id
}

func MustParse(s string) uuid.UUID {
	id, err := uuid.Parse(s)
	exception.PanicIfError(err, "Failed to parse UUID")

	return id
}
