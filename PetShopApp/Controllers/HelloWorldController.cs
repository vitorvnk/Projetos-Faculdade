using Microsoft.AspNetCore.Mvc; // Define que estamos utilizando o type MVC
using System.Text.Encodings.Web; // Define que essa classe retornará uma página

namespace PetShopApp.Controllers{
    public class HelloWorldController : Controller{
        public IActionResult Index(){
            return View();
        }

        public IActionResult Welcome(string name, int vezes = 1){
            ViewData["Mensagem"] = name;
            ViewData["Vezes"] = vezes;

            return View();
        }
    }
}