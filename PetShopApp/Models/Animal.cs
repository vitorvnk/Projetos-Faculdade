using System;
using System.ComponentModel.DataAnnotations;

namespace PetShopApp.Models
{
    public class Animal
    {
        public int Id {get; set;}

        public string Nome {get; set;}

        [Display(Name="Data de Nascimento")]
        [DataType(DataType.Date)]
        public DateTime DtNascimento {get; set;}

        [Display(Name="Raça")]
        public string Raca {get; set;}
        public string Porte {get; set;}
        public string Sexo {get; set;}
        [Display(Name="Espécie")]
        public string Especie {get; set;}
        public int ProprietarioID {get; set;}

        [Display(Name = "Idade")]
        public string Idade => CalculaIdade();

        public virtual Proprietario Proprietario {get; set;}


        public string CalculaIdade(){
            int idade = DateTime.Now.Year - DtNascimento.Year;
            return $"{idade} anos de idade";
        }
    }

    
}