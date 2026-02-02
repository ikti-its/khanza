package helper

import (
	"fmt"
	"os"
	"path"
	"strings"

	"github.com/google/uuid"
	"github.com/ikti-its/khanza-api/internal/app/exception"
)

func GenerateFile(fileType string, fileExt string) string {
	fileName := strings.ReplaceAll(uuid.New().String(), "-", "") + fileExt
	return path.Join(fileType, fileName)
}

func RemoveFile(filePath string) error {
	return os.Remove(filePath)
}

func GetFile(fileType string, fileName string) string {
	storage := os.Getenv("APP_STORAGE")
	filePath := path.Join(storage, fileType, fileName)

	if _, err := os.Stat(filePath); os.IsNotExist(err) {
		panic(&exception.NotFoundError{
			Message: fmt.Sprintf("File %s not found", fileName),
		})
	}

	return filePath
}
