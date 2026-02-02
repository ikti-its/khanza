package main

import (
	"fmt"
	"os"
	"path"
	"text/template"

	"github.com/ikti-its/khanza-api/scripts/templates"
	"golang.org/x/text/cases"
	"golang.org/x/text/language"
)

func main() {
	if len(os.Args) < 3 {
		println("Usage: go run scripts/submodule.go <module name> <submodule name>")
		return
	}

	module := os.Args[1]
	submodule := os.Args[2]
	modulePath := fmt.Sprintf("internal/modules/%s", module)

	files := map[string]string{
		path.Join(modulePath, "internal/entity", fmt.Sprintf("%s.go", submodule)):                              templates.EntityTmpl,
		path.Join(modulePath, "internal/model", fmt.Sprintf("%s_model.go", submodule)):                         templates.ModelTmpl,
		path.Join(modulePath, "internal/repository", fmt.Sprintf("%s_repository.go", submodule)):               templates.RepositoryTmpl,
		path.Join(modulePath, "internal/repository/postgres", fmt.Sprintf("%s_repository_impl.go", submodule)): templates.PostgresTmpl,
		path.Join(modulePath, "internal/usecase", fmt.Sprintf("%s_usecase.go", submodule)):                     templates.UsecaseTmpl,
		path.Join(modulePath, "internal/controller", fmt.Sprintf("%s_controller.go", submodule)):               templates.ControllerTmpl,
	}

	for file, content := range files {
		tmpl, err := template.New(file).Parse(content)
		if err != nil {
			fmt.Printf("Failed to parse template %s: %v\n", file, err)
			return
		}

		f, err := os.Create(file)
		if err != nil {
			fmt.Printf("Failed to create file %s: %v\n", file, err)
			return
		}
		defer f.Close()

		data := struct {
			Module     string
			ModuleName string
			Name       string
		}{
			Module:     module,
			ModuleName: submodule,
			Name:       cases.Title(language.Indonesian).String(submodule),
		}

		if err = tmpl.Execute(f, data); err != nil {
			fmt.Printf("Failed to execute template %s: %v\n", file, err)
			return
		}

		fmt.Printf("Created %s\n", file)
	}

	fmt.Printf("Submodule %s of module %s has been initialized\n", submodule, module)
}
