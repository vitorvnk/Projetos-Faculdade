
    try:
        if ((cadeia[0] in tabela[pilha[len(pilha)-1]])):
            pilha.extend(tabela[pilha[len(pilha)-1]][cadeia[0]])
            pilha.pop(len(pilha)-1)
        else:
            if(i >= len(pilha)):
                break
            else:
                i += 1
    except :
        if (len(cadeia) != 0):
            try:
                pilha.extend(tabela[pilha[len(pilha)-1]][cadeia[0]])
                pilha.pop(len(pilha)-1)
                i = 0
            except KeyError as e:
                print('Não encontrada a letra:', e)
                break
            except:
                print('Não reconhecido')
                break