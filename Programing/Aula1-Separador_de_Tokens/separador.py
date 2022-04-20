import nltk


palavras_reservadas = ["and", "as", "assert", "break", "class", "continue", "def", "del", "elif", "else", "except", "False",
"finally", "for", "from", "global", "if", "import", "in", "is", "lambda", "None", "nonlocal", "not",
"or", "pass", "raise", "return",
"True", "try", "while", "with", "yield"]

simbolos_especiais = [".", ";" , "," , "(", ")", ":", "+", "<", ">", "+", "-", "*", "%", "!"]

letras = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
"x", "y", "z"]

digitos = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"]

simbolos_compostos = ["++", "--", ">=", "<=", "+=", "-=", "*=", "/=", "%="]

with open("arquivos/teste.txt" , "r" ,encoding="utf8") as programa:
    arquivo = programa.readlines()
    lista = []
    for linha in arquivo:
        lista = nltk.word_tokenize(linha)



for a in lista:
    if (a in letras ):
        print(f'{a} é uma Letra')
    elif (a in simbolos_especiais):
        print(f'{a} é um Simbolo Reservado')
    elif (a in simbolos_compostos):
        print(f'{a} é um Simbolo Composto')
    elif (a in digitos):
        print(f' {a} é um Digito')
    elif (a in palavras_reservadas):
        print(f'{a} é uma Palavra Reservada')