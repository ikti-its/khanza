package templates

var ModelTmpl = `package model

type {{.Name}}Request struct {
}

type {{.Name}}Response struct {
	Id string
}

type {{.Name}}PageResponse struct {
	Page int
	Size int
	Total int
	{{.Name}} []{{.Name}}Response
}
`
