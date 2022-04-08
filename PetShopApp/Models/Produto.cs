using System.ComponentModel.DataAnnotations;
using System;

namespace PetShopApp.Models
{
    public class Produto
    {
        public int Id {get; set;}
        public string Nome {get; set;}
        public string DescricaoProduto {get; set;}
        public int QtdProduto {get; set;}
        public float PrecoCompra {get; set;}
        public float PrecoVenda {get; set;}
    }
}