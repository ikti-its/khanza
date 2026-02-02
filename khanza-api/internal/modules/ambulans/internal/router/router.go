package router

import (
	"github.com/gofiber/fiber/v2"
	"github.com/ikti-its/khanza-api/internal/app/middleware"
	"github.com/ikti-its/khanza-api/internal/modules/ambulans/internal/controller"
)

func AmbulansRoute(app *fiber.App, ambulansController *controller.AmbulansController) {
	ambulans := app.Group("/v1/ambulans")

	// ✅ Order matters
	ambulans.Post("/", middleware.Authenticate([]int{1337, 1, 0, 2, 3}), ambulansController.Create)
	ambulans.Get("/", middleware.Authenticate([]int{0}), ambulansController.GetAll)

	// ✅ Always put parameterized routes AFTER fixed ones
	ambulans.Post("/request", middleware.Authenticate([]int{0, 2}), ambulansController.RequestAmbulans)
	ambulans.Get("/request/pending", middleware.Authenticate([]int{1337, 1}), ambulansController.GetPendingRequests)
	ambulans.Put("/terima/:no_ambulans", middleware.Authenticate([]int{1337, 1}), ambulansController.AcceptAmbulansRequest)
	ambulans.Put("/status", middleware.Authenticate([]int{1337, 1}), ambulansController.UpdateStatus)

	ambulans.Get("/:no_ambulans", middleware.Authenticate([]int{0}), ambulansController.GetByNoAmbulans)
	ambulans.Put("/:no_ambulans", middleware.Authenticate([]int{1337, 1}), ambulansController.Update)
	ambulans.Delete("/:no_ambulans", middleware.Authenticate([]int{1337, 1}), ambulansController.Delete)
}
