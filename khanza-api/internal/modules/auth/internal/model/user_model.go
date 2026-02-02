package model

type UserResponse struct {
	Id    string `json:"id"`
	Email string `json:"email"`
	Foto  string `json:"foto"`
	Role  int    `json:"role"`
}
