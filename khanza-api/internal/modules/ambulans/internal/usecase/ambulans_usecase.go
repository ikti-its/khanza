package usecase

import (
	"fmt"

	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/modules/ambulans/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/ambulans/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/ambulans/internal/repository"
)

type AmbulansUseCase struct {
	Repository repository.AmbulansRepository
}

func NewAmbulansUseCase(repo repository.AmbulansRepository) *AmbulansUseCase {
	return &AmbulansUseCase{Repository: repo}
}

// Create a new ambulans entry
func (u *AmbulansUseCase) Create(ctx *fiber.Ctx, request *model.AmbulansRequest) (model.AmbulansResponse, error) {
	ambulansEntity := entity.Ambulans{
		NoAmbulans: request.NoAmbulans,
		Status:     request.Status,
		Supir:      request.Supir,
	}

	// 🆕 Use repository method that accepts Fiber context for audit tracking
	err := u.Repository.InsertWithContext(ctx, &ambulansEntity)
	if err != nil {
		return model.AmbulansResponse{}, fmt.Errorf("failed to create ambulans: %v", err)
	}

	return model.AmbulansResponse{
		NoAmbulans: ambulansEntity.NoAmbulans,
		Status:     ambulansEntity.Status,
		Supir:      ambulansEntity.Supir,
	}, nil
}

// Retrieve all ambulans records from PostgreSQL
func (u *AmbulansUseCase) GetAll() ([]model.AmbulansResponse, error) {
	ambulansList, err := u.Repository.FindAll()
	if err != nil {
		return nil, fmt.Errorf("failed to retrieve ambulans: %v", err)
	}

	var response []model.AmbulansResponse
	for _, a := range ambulansList {
		response = append(response, model.AmbulansResponse{
			NoAmbulans: a.NoAmbulans,
			Status:     a.Status,
			Supir:      a.Supir,
		})
	}

	return response, nil
}

// Retrieve a specific ambulans record by NoAmbulans
func (u *AmbulansUseCase) GetByNoAmbulans(noAmbulans string) (model.AmbulansResponse, error) {
	ambulans, err := u.Repository.FindByNoAmbulans(noAmbulans)
	if err != nil {
		return model.AmbulansResponse{}, fmt.Errorf("ambulans not found")
	}

	return model.AmbulansResponse{
		NoAmbulans: ambulans.NoAmbulans,
		Status:     ambulans.Status,
		Supir:      ambulans.Supir,
	}, nil
}

// Update ambulans dengan audit context
func (u *AmbulansUseCase) Update(c *fiber.Ctx, noAmbulans string, request *model.AmbulansRequest) (model.AmbulansResponse, error) {
	ambulans, err := u.Repository.FindByNoAmbulans(noAmbulans)
	if err != nil {
		return model.AmbulansResponse{}, fmt.Errorf("ambulans not found")
	}

	ambulans.Status = request.Status
	ambulans.Supir = request.Supir

	err = u.Repository.Update(c, &ambulans)
	if err != nil {
		return model.AmbulansResponse{}, fmt.Errorf("failed to update ambulans: %v", err)
	}

	return model.AmbulansResponse{
		NoAmbulans: ambulans.NoAmbulans,
		Status:     ambulans.Status,
		Supir:      ambulans.Supir,
	}, nil
}

// Delete ambulans dengan audit context
func (u *AmbulansUseCase) Delete(c *fiber.Ctx, noAmbulans string) error {
	err := u.Repository.Delete(c, noAmbulans)
	if err != nil {
		return fmt.Errorf("failed to delete ambulans: %v", err)
	}
	return nil
}

func (u *AmbulansUseCase) Notify(req *entity.Ambulans) error {
	err := u.Repository.SetPending(req.NoAmbulans)
	if err != nil {
		return fmt.Errorf("failed to update ambulance status: %v", err)
	}
	return nil
}

func (u *AmbulansUseCase) GetPendingRequests() ([]entity.Ambulans, error) {
	return u.Repository.FindPendingRequests()
}

func (u *AmbulansUseCase) MarkRequestAccepted(noAmbulans string) error {
	return u.Repository.UpdateAmbulansStatus(noAmbulans, "accepted")
}

func (u *AmbulansUseCase) UpdateStatus(noAmbulans, status string) error {
	return u.Repository.UpdateAmbulansStatus(noAmbulans, status)
}

func (uc *AmbulansUseCase) GetPaginated(page int, size int) ([]entity.Ambulans, int, error) {
	return uc.Repository.FindPaginated(page, size)
}
