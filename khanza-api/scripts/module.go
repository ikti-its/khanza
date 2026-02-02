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
	if len(os.Args) < 2 {
		println("Usage: go run scripts/module.go <module name>")
		return
	}

	module := os.Args[1]
	modulePath := fmt.Sprintf("internal/modules/%s", module)

	directories := []string{
		modulePath,
		path.Join(modulePath, "internal/entity"),
		path.Join(modulePath, "internal/model"),
		path.Join(modulePath, "internal/repository"),
		path.Join(modulePath, "internal/repository/postgres"),
		path.Join(modulePath, "internal/usecase"),
		path.Join(modulePath, "internal/controller"),
		path.Join(modulePath, "internal/router"),
	}

	for _, directory := range directories {
		err := os.MkdirAll(directory, os.ModePerm)
		if err != nil {
			fmt.Printf("Failed to create directory %s: %v\n", directory, err)
			return
		}
	}

	files := map[string]string{
		path.Join(modulePath, "internal/router", "router.go"): templates.RouterTmpl,
		path.Join(modulePath, fmt.Sprintf("%s.go", module)):   templates.ProviderTmpl,
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
			ModuleName string
			Name       string
		}{
			ModuleName: module,
			Name:       cases.Title(language.Indonesian).String(module),
		}

		if err = tmpl.Execute(f, data); err != nil {
			fmt.Printf("Failed to execute template %s: %v\n", file, err)
			return
		}

		fmt.Printf("Created %s\n", file)
	}

	fmt.Printf("Module %s has been initialized\n", module)
}
