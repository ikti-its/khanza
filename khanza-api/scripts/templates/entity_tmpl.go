package templates

var EntityTmpl = `package entity

type {{.Name}} struct {
	Id uuid.UUID
	Updater uuid.UUID
}
`
