using Microsoft.EntityFrameworkCore;
using System;


// Faz a conexão com o Banco de dados
namespace ClickJogos.Models
{
    public class JogoContext : DbContext
    {
        public JogoContext(DbContextOptions<JogoContext>
            options): base(options) {

            }
            public DbSet<Jogo> Jogos {get; set;}
            
    }
}