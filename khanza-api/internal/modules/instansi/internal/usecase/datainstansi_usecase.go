package usecase

import (
	"fmt"
	"github.com/jinzhu/copier"
	"github.com/ikti-its/khanza-api/internal/modules/instansi/internal/repository"
	"github.com/ikti-its/khanza-api/internal/modules/instansi/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/instansi/internal/entity"
)

type UseCase struct {
	Repository repository.Repository
}

func NewUseCase(repo repository.Repository) *UseCase {
	return &UseCase{Repository: repo}
}

func (u *UseCase) Create(request *model.Request) (model.Response, error) {
	var data entity.Entity
	copier.Copy(&data, &request)

	err := u.Repository.Insert(&data)
	if err != nil {
		return model.Response{}, fmt.Errorf("failed to create: %v", err)
	}

	var response model.Response
	copier.Copy(&response, &data)
	return response, nil
}

func (u *UseCase) GetAll() ([]model.Response, error) {
	List, err := u.Repository.FindAll()
	if err != nil {
		return nil, fmt.Errorf("failed to retrieve: %v", err)
	}

	var response []model.Response
	for _, data := range List {
		var r model.Response
		copier.Copy(&r, &data)
		response = append(response, r)
	}
	return response, nil
}

func (u *UseCase) GetById(id string) (model.Response, error) {
	data, err := u.Repository.FindById(id)
	if err != nil {
		return model.Response{}, fmt.Errorf("data not found")
	}

	var response model.Response
	copier.Copy(&response, &data)
	return response, nil
}

func (u *UseCase) Update(id string, request *model.Request) (model.Response, error) {
	data, err := u.Repository.FindById(id)
	if err != nil {
		return model.Response{}, fmt.Errorf("not found")
	}

	copier.Copy(&data, &request)

	err = u.Repository.Update(&data)
	if err != nil {
		return model.Response{}, fmt.Errorf("failed to update: %v", err)
	}

	var response model.Response
	copier.Copy(&response, &data)
	return response, nil
}

func (u *UseCase) Delete(id string) error {
	err := u.Repository.Delete(id)
	if err != nil {
		return fmt.Errorf("failed to delete: %v", err)
	}
	return nil
}
