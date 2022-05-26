tabela = {
    'E' : {
        'ID' : ['S','T'],
        'NUM' : ['S','T'],
        '(' :  ['S','T'],
    },
    'T' : {
        'ID' : ['G','F'],
        'NUM' : ['G','F'],
        '(' : ['G','F']
    },
    'S' : {
        '+' : ['S','T','+'],
        '-' : ['S','T','-'],
        ')' : ['$'],
        '$' : ['$']
    },
    'G' : {
        '+' : ['$'],
        '-' : ['$'],
        '*' : ['G','F','*'],
        '/' : ['G','F','/'],
        ')' : ['$'],
        '$' : ['$']
    },
    'F' : {
        'ID' : ['ID'],
        'NUM' : ['NUM'],
        '(' : [')', 'E', '('],
    }
}

def getList(dict):
    return list(dict.keys())


file = open("teste.txt", "r", encoding="utf-8")
tokens = ["ID", "+", "-", "*", "/", "(", ")", "$", "NUM"]
comparador = []
linhas = file.readlines()
cadeia=[]
pilha=["E"]
status=True

for linha in linhas:
    for caracteres in linha:
        comparador.append(caracteres.upper())
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

i = 0
while True:
    try:
        if (cadeia[0] in tabela.get(pilha[len(pilha)-1])):
            pilha.extend(tabela[pilha[len(pilha)-1]][cadeia[0]])
            pilha.pop(i)
        else:
            print(f'ERRO! O valor {cadeia[0]} não existe.')
            break
    except TypeError as e:
        if (pilha[len(pilha)-1] == cadeia[0]):
            print(f'REMOVEU - CADEIA:{cadeia[0]}\n')
            pilha.pop(len(pilha)-1)
            cadeia.pop(0)
        i = len(pilha)-1
    except:
        if (len(cadeia) == 0 and len(pilha) == 2):
            print('Cadeia vazia, senhores. Finalizado com sucesso!')
            break
        else :
            print('Erro em tempo de execução.')
            break

    if (len(cadeia) == 0):
        print('Cadeia vazia, senhores. Finalizado com sucesso!')
        break
    elif (pilha[len(pilha)-1] == cadeia[0]):
        print(f'REMOVEU - CADEIA: {cadeia[0]}\n')
        pilha.pop(len(pilha)-1)
        cadeia.pop(0)
    elif ('$' in pilha):
        pilha.remove('$')

    i = len(pilha)-1

    print('\n')
    print(f'PILHA: {pilha}')
    print(f'CADEIA: {cadeia}')
    print('\n')









