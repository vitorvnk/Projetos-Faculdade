tabela = {
    'E' : {
        'ID' : 'ST',
        'NUM' : 'ST',
        '(' :  'ST',
    },
    'T' : {
        'ID' : 'GF',
        'NUM' : 'GF',
        '(' : 'GF'
    },
    'S' : {
        '+' : 'ST+',
        '-' : 'ST-',
        ')' : '$',
        '$' : '$'
    },
    'G' : {
        '+' : '$',
        '-' : '$',
        '*' : 'GF*',
        '/' : 'GF/',
        ')' : '$',
        '$' : '$'
    },
    'F' : {
        'ID' : 'ID',
        'NUM' : 'NUM',
        '(' : '(E)'
    }
}


file = open("teste.txt", "r", encoding="utf-8")
tokens = ["id", "+", "-", "*", "/", "(", ")", "$", "num"]
comparador = []
linhas = file.readlines()
cont = 0
cadeia=[]
pilha=["E"]
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
            cadeia.append(concatenation)
            continue
        if concatenation in tokens:
            comparador.clear()
            cadeia.append(concatenation)




print(tabela['E']['ID'])


#print(tabela[pilha[0]+cadeia[0]][::-1])









