

palavraReservada = [
    'if', 'elif', 'else',
    'for', 'while', 'True',
    'False', 'print', 'input',
    'and', 'def', 'finally',
    'in', 'pass', 'yield',
    'as', 'del', 'is', 'boolean',
    'raise', 'assert', 'from',
    'lambda', 'return', 'break',
    'global', 'nonlocal', 'try',
    'None', 'except', 'not',
    'continue', 'exec', 'import',
    'or', 'with', 'yield',
    'int', 'float', 'str'
]

numeros = [
    '0', '1', '2', '3', '4', 
    '5', '6', '7', '8', '9'
]

separadores = [
    ';', '[', ']', ')', '(', 
    ')', '{', '}', ',', '=', '.'
]

operadores = [
    '-', '+', '/', '*', '^', '>=', '>', '<'
]

letras = 'a', 'b', 'c', 'd', 'e', 'i', 'f'

linha = "if(a>=b)"
lexema = []

print("startou")
for i in range(len(linha)):
    if list(linha)[i] in letras:
        print(f"{list(linha)[i]} é uma letra!")
    elif list(linha)[i] in separadores:
        print(f"{list(linha)[i]} é um separador!")
    elif list(linha)[i] in operadores:
        print(f"{list(linha)[i]} é um operador!")
        


listaAux = []
sepAux = []

for i in range(len(linha)):
    if list(linha)[i] not in separadores:
        listaAux.append(str(list(linha)[i]))
    else:
        sepAux.append(str(list(linha)[i]))
    
print(listaAux)
print("---")
print(sepAux)


