class Tarefa 
{
  late String nome;
  late DateTime data;
  late bool concluida;

  Tarefa(String nome) {
    this.concluida = false;
    this.nome = nome;
    this.data = DateTime.now();
  } 
}

// Tarefa t = new Tarefa("Fazer um aplicativo")