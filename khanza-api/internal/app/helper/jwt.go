package helper

import (
	"time"

	"github.com/golang-jwt/jwt/v5"
	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/app/config"
)

func GenerateJWT(userId uuid.UUID, role int, cfg *config.Config) (string, error) {
	var (
		expire = cfg.GetInt("JWT_EXPIRE", 24)
		secret = cfg.Get("JWT_SECRET", "secret")
		iat    = time.Now().Unix()
		exp    = time.Now().Add(time.Hour * time.Duration(expire)).Unix()
	)

	sub := userId.String()
	claims := jwt.MapClaims{
		"sub":  sub,
		"role": role,
		"iat":  iat,
		"exp":  exp,
	}

	token := jwt.NewWithClaims(jwt.SigningMethodHS512, claims)

	return token.SignedString([]byte(secret))
}
