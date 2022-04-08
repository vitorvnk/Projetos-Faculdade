using Microsoft.EntityFrameworkCore.Migrations;

namespace PetShopApp.Migrations
{
    public partial class Produtos : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.CreateTable(
                name: "Produto",
                columns: table => new
                {
                    Id = table.Column<int>(type: "INTEGER", nullable: false)
                        .Annotation("Sqlite:Autoincrement", true),
                    Nome = table.Column<string>(type: "TEXT", nullable: true),
                    DescricaoProduto = table.Column<string>(type: "TEXT", nullable: true),
                    QtdProduto = table.Column<int>(type: "INTEGER", nullable: false),
                    PrecoCompra = table.Column<float>(type: "REAL", nullable: false),
                    PrecoVenda = table.Column<float>(type: "REAL", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Produto", x => x.Id);
                });
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "Produto");
        }
    }
}
