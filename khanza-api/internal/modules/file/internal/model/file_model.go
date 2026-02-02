package model

import "mime/multipart"

type FileRequest struct {
	File *multipart.FileHeader `json:"file" validate:"required"`
}

type FileResponse struct {
	URL string `json:"url"`
}
