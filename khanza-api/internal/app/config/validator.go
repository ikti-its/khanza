package config

import (
	"fmt"
	"strings"

	"github.com/go-playground/validator/v10"
	"github.com/ikti-its/khanza-api/internal/app/exception"
)

type Validator struct {
	Validator *validator.Validate
}

func NewValidator() *Validator {
	return &Validator{
		Validator: validator.New(),
	}
}

func (v *Validator) Validate(data any) []exception.ValidationError {
	var validationErrors []exception.ValidationError

	errs := v.Validator.Struct(data)
	if errs != nil {
		for _, err := range errs.(validator.ValidationErrors) {
			var elem exception.ValidationError

			elem.FailedField = err.Field()
			elem.Tag = err.Tag()
			elem.Value = err.Value()

			validationErrors = append(validationErrors, elem)
		}
	}

	return validationErrors
}

func (v *Validator) Message(err []exception.ValidationError) string {
	var messages []string

	for _, message := range err {
		messages = append(messages, fmt.Sprintf(
			"[%s]: '%v' | Needs to implement '%s'",
			message.FailedField,
			message.Value,
			message.Tag,
		))
	}

	return strings.Join(messages, " and ")
}
