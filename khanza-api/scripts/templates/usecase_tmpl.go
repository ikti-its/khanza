package templates

var UsecaseTmpl = `package usecase

import (
	"github.com/ikti-its/khanza-api/internal/app/exception"
	"github.com/ikti-its/khanza-api/internal/app/helper"
	"github.com/ikti-its/khanza-api/internal/modules/{{.Module}}/internal/entity"
	"github.com/ikti-its/khanza-api/internal/modules/{{.Module}}/internal/model"
	"github.com/ikti-its/khanza-api/internal/modules/{{.Module}}/internal/repository"
)

type {{.Name}}UseCase struct {
	Repository repository.{{.Name}}Repository
}

func New{{.Name}}UseCase(repository *repository.{{.Name}}Repository) *{{.Name}}UseCase {
	return &{{.Name}}UseCase{
		Repository: *repository,
	}
}

func (u *{{.Name}}UseCase) Create(request *model.{{.Name}}Request, user string) model.{{.Name}}Response {
	updater := helper.MustParse(user)
	{{.ModuleName}} := entity.{{.Name}}{
		Id:      helper.MustNew(),
		Updater: updater,
	}

	if err := u.Repository.Insert(&{{.ModuleName}}); err != nil {
		exception.PanicIfError(err, "Failed to insert {{.ModuleName}}")
	}

	response := model.{{.Name}}Response{
		Id:    {{.ModuleName}}.Id.String(),
	}

	return response
}

func (u *{{.Name}}UseCase) Get() []model.{{.Name}}Response {
	{{.ModuleName}}, err := u.Repository.Find()
	exception.PanicIfError(err, "Failed to get all {{.ModuleName}}")

	response := make([]model.{{.Name}}Response, len({{.ModuleName}}))
	for i, {{.ModuleName}} := range {{.ModuleName}} {
		response[i] = model.{{.Name}}Response{
			Id:    {{.ModuleName}}.Id.String(),
		}
	}

	return response
}

func (u *{{.Name}}UseCase) GetPage(page, size int) model.{{.Name}}PageResponse {
	{{.ModuleName}}, total, err := u.Repository.FindPage(page, size)
	exception.PanicIfError(err, "Failed to get paged {{.ModuleName}}")

	response := make([]model.{{.Name}}Response, len({{.ModuleName}}))
	for i, {{.ModuleName}} := range {{.ModuleName}} {
		response[i] = model.{{.Name}}Response{
			Id:    {{.ModuleName}}.Id.String(),
		}
	}

	pagedResponse := model.{{.Name}}PageResponse{
		Page:  page,
		Size:  size,
		Total: total,
		{{.Name}}: response,
	}

	return pagedResponse
}

func (u *{{.Name}}UseCase) GetById(id string) model.{{.Name}}Response {
	{{.ModuleName}}, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "{{.Name}} not found",
		})
	}

	response := model.{{.Name}}Response{
		Id:    {{.ModuleName}}.Id.String(),
	}

	return response
}

func (u *{{.Name}}UseCase) Update(request *model.{{.Name}}Request, id, user string) model.{{.Name}}Response {
	{{.ModuleName}}, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "{{.Name}} not found",
		})
	}

	{{.ModuleName}}.Updater = helper.MustParse(user)

	if err := u.Repository.Update(&{{.ModuleName}}); err != nil {
		exception.PanicIfError(err, "Failed to update {{.ModuleName}}")
	}

	response := model.{{.Name}}Response{
		Id:    {{.ModuleName}}.Id.String(),
	}

	return response
}

func (u *{{.Name}}UseCase) Delete(id, user string) {
	{{.ModuleName}}, err := u.Repository.FindById(helper.MustParse(id))
	if err != nil {
		panic(&exception.NotFoundError{
			Message: "{{.Name}} not found",
		})
	}

	{{.ModuleName}}.Updater = helper.MustParse(user)

	if err := u.Repository.Delete(&{{.ModuleName}}); err != nil {
		exception.PanicIfError(err, "Failed to delete {{.ModuleName}}")
	}
}
`
