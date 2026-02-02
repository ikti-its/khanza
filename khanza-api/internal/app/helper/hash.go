package helper

import (
	"golang.org/x/crypto/bcrypt"
)

func EncryptPassword(password string) ([]byte, error) {
	return bcrypt.GenerateFromPassword([]byte(password), bcrypt.DefaultCost)
}

func DecryptPassword(encrypted, password string) bool {
	return bcrypt.CompareHashAndPassword([]byte(encrypted), []byte(password)) == nil
}
