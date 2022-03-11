using Microsoft.AspNetCore.Mvc; // Define que estamos utilizando o type MVC
using System.Text.Encodings.Web; // Define que essa classe retornará uma página

namespace PetShopApp.Controllers{
    public class HelloWorldController : Controller{
        public IActionResult Index(){
            return View();
        }

        public string Welcome(string name, int id = 1){
            return HtmlEncoder.Default.Encode($"Nome: {name} ID:{id}");
        }
    }
}