using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.DependencyInjection;
using System;
using System.Linq;

namespace PetShopApp.Models
{
    public static class SeedData
    {
        public static void Inicializar(IServiceProvider serviceProvider)
        {
            using(var context = new PetShopAppContext(
                serviceProvider.GetRequiredService<
                    DbContextOptions<PetShopAppContext>>()))
            {
                // verificar se há dados no banco
                if(context.Proprietario.Any()){
                    //return;// há dados no banco
                } else {

                context.Proprietario.AddRange(
                    new Proprietario
                    {
                        Nome ="Agatha Esther da Rocha",
                        Cpf ="081.878.098-33",
                        Endereco ="Rua Independência, 600",
                        Telefone ="(14) 98524-1532",
                        Email ="agatha.esther.darocha@granvale.com.br",
                        DtNascimento = DateTime.Parse("1983-04-01"),
                    },
                    new Proprietario
                    {
                        Nome ="Stefany Vitória Castro",
                        Cpf ="506.802.278-06",
                        Endereco ="Rua Nazaré",
                        Telefone ="(14) 99389-5492",
                        Email ="stefany-castro85@escolajardim.com.br",
                        DtNascimento = DateTime.Parse("1980-02-01"),
                    },
                    new Proprietario
                    {
                        Nome ="Diego Marcos Vinicius Luan Assunção",
                        Cpf ="333.247.388-30",
                        Endereco ="Rua Nicola Mascaro",
                        Telefone ="(14) 99618-1330",
                        Email ="diego-assuncao77@emayl.com",
                        DtNascimento = DateTime.Parse("1959-01-27"),
                    },
                    new Proprietario
                    {
                        Nome ="Roberto Marcos Vinicius da Cruz",
                        Cpf ="198.386.998-88",
                        Endereco ="Rua Jerusalém",
                        Telefone ="(14) 98743-7609",
                        Email ="roberto.marcos.dacruz@alstom.com",
                        DtNascimento = DateTime.Parse("1980-02-03"),
                    }
                );
                
            }

            if (context.Produto.Any()){
                // Há dados no banco
            } else {
                context.Produto.AddRange(
                    new Produto{
                        Nome = "Danone",
                        DescricaoProduto = "Danonão",
                        QtdProduto = 10,
                        PrecoCompra = 5,
                        PrecoVenda = 6
                    },
                    new Produto{
                        Nome = "Coca-Cola",
                        DescricaoProduto = "Coca de 2l",
                        QtdProduto = 10,
                        PrecoCompra = 5,
                        PrecoVenda = 6
                    }
                );
            }
                context.SaveChanges();
            }
        }
    }
}