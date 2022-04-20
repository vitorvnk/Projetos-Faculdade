file = open("arquivos/transicao.txt", "r", encoding="utf-8")
tokens = ["id", "+", "-", "*", "/", "(", ")", "$", "num"]
comparador = []
linhas = file.readlines()
cont = 0
for linha in linhas:
    cont += 1
    for caracteres in linha:
        comparador.append(caracteres)
        concatenation = "".join(comparador)
        if caracteres == "\n":
            comparador.clear()
            continue
        if caracteres in tokens:
            comparador.clear()
            print(caracteres)
            continue
        if concatenation in tokens:
            comparador.clear()
            print(concatenation)


