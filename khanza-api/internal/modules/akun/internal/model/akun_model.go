package model

type CreateAkunRequest struct {
	Email    string `json:"email" validate:"required,email,max=50"`
	Password string `json:"password" validate:"required,min=6,max=20"`
	Foto     string `json:"foto"`
	Role     int    `json:"role" validate:"required,numeric"`
}

type UpdateAkunRequest struct {
	Email    string `json:"email" validate:"required,email,max=50"`
	Password string `json:"password" validate:"required,min=6,max=20"`
	Foto     string `json:"foto" validate:"required"`
}

type AkunResponse struct {
	Id    string `json:"id"`
	Email string `json:"email"`
	Foto  string `json:"foto"`
	Role  int    `json:"role"`
}

type AkunPageResponse struct {
	Page  int            `json:"page"`
	Size  int            `json:"size"`
	Total int            `json:"total"`
	Akun  []AkunResponse `json:"akun"`
}
