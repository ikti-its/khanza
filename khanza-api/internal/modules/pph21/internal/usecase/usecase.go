package usecase

import (
	"fmt" 
	"github.com/jinzhu/copier"
    "github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/pph21/internal/repository"
	"github.com/ikti-its/khanza-api/internal/modules/pph21/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/pph21/internal/entity"
)

type UseCase struct {
	Repository repository.Repository
}

func NewUseCase(repo repository.Repository) *UseCase {
	return &UseCase{Repository: repo}
}

// Create a new kamar entry
func (u *UseCase) Create(c *fiber.Ctx, request *model.Request) (model.Response, error) {

	// Convert request model to entity model
	var Entity entity.Entity
	copier.Copy(&Entity, &request)

	// Insert into database
	err := u.Repository.Insert(c, &Entity)
	if err != nil {
		return model.Response{}, fmt.Errorf("failed to create: %v", err)
	}

	// Return response
	var response model.Response
	copier.Copy(&response, &Entity)

	return response, nil
}

// Retrieve all kamar records from PostgreSQL
func (u *UseCase) GetAll() ([]model.Response, error) {
	List, err := u.Repository.FindAll()
	if err != nil {
		return nil, fmt.Errorf("failed to retrieve: %v", err)
	}

	var response []model.Response
	for _, Entity := range List {
		var response_i model.Response
		copier.Copy(&response_i, &Entity)
		response = append(response, response_i)
	}

	return response, nil
}

// Retrieve a specific kamar record by NomorBed
func (u *UseCase) GetById(id string) (model.Response, error) {
	Entity, err := u.Repository.FindById(id)
	if err != nil {
		return model.Response{}, fmt.Errorf("Entity not found")
	}

	var response model.Response
	copier.Copy(&response, &Entity)
	return response, nil
}

// Update an existing kamar record
func (u *UseCase) Update(c *fiber.Ctx, id string, request *model.Request) (model.Response, error) {
	Entity, err := u.Repository.FindById(id)
	if err != nil {
		return model.Response{}, fmt.Errorf("not found")
	}

	copier.Copy(&Entity, &request)
	
	err = u.Repository.Update(c, &Entity)
	if err != nil {
		return model.Response{}, fmt.Errorf("failed to update: %v", err)
	}

	var response model.Response
	copier.Copy(&response, &Entity)

	return response, nil
}

// Delete a kamar record by NomorBed
func (u *UseCase) Delete(c *fiber.Ctx, id string) error {
	err := u.Repository.Delete(c, id)
	if err != nil {
		return fmt.Errorf("failed to delete: %v", err)
	}
	return nil
}
