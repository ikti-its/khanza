package usecase

import (
	"fmt"
	"path"

	"github.com/ikti-its/khanza-api/internal/app/config"
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/file/internal/model"
)

type FileUseCase struct {
	Config *config.Config
}

func NewFileUseCase(cfg *config.Config) *FileUseCase {
	return &FileUseCase{
		Config: cfg,
	}
}

func (u *FileUseCase) generateFileName(request *model.FileRequest, fileType string) string {
	switch fileType {
	case "img":
		ext := path.Ext(request.File.Filename)
		if ext != ".png" && ext != ".jpg" && ext != ".jpeg" {
			panic(&exception.BadRequestError{
				Message: fmt.Sprintf("Invalid file extension: %s is not supported", ext),
			})
		}

		if request.File.Size > 3*1024*1024 {
			panic(&exception.BadRequestError{
				Message: "File size exceeds limit",
			})
		}
	case "doc":
		ext := path.Ext(request.File.Filename)
		if ext != ".pdf" && ext != ".doc" && ext != ".docx" {
			panic(&exception.BadRequestError{
				Message: fmt.Sprintf("Invalid file extension: %s is not supported", ext),
			})
		}

		if request.File.Size > 5*1024*1024 {
			panic(&exception.BadRequestError{
				Message: "File size exceeds limit",
			})
		}
	default:
		panic(&exception.BadRequestError{
			Message: fmt.Sprintf("Invalid file type: %s is not supported", fileType),
		})
	}

	fileExt := path.Ext(request.File.Filename)

	return helper.GenerateFile(fileType, fileExt)
}

func (u *FileUseCase) Upload(request *model.FileRequest, fileType string) (string, model.FileResponse) {
	var (
		baseURL  = u.Config.Get("APP_URL", "http://localhost:8080/v1")
		storage  = u.Config.Get("APP_STORAGE", "storage")
		fileName = u.generateFileName(request, fileType)

		filePath = path.Join(storage, fileName)
		fileURL  = fmt.Sprintf("%s/file/%s", baseURL, fileName)
	)

	return filePath, model.FileResponse{
		URL: fileURL,
	}
}

func (u *FileUseCase) Get(fileType, fileName string) string {
	file := helper.GetFile(fileType, fileName)

	return file
}

func (u *FileUseCase) Delete(fileType, fileName string) {
	file := helper.GetFile(fileType, fileName)

	if err := helper.RemoveFile(file); err != nil {
		exception.PanicIfError(err, "Failed to delete file")
	}
}
