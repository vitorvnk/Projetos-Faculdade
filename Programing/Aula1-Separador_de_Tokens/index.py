import nltk;

palavrasReservada = [
    "and", "as", "assert", "break", 
    "class", "continue", "def", "del", 
    "elif", "else", "except", "False",
    "finally", "for", "from", "global",
    "if", "import", "in", "is", "lambda", 
    "None", "nonlocal", "not","or", 
    "pass", "raise", "return","True", 
    "try", "while", "with", "yield"
]

simbolosCompostos = [
    "++", "--", ">=", "<=", 
    "+=", "-=", "*=", "/=", 
    "%="
]

separadores = [
    ';', '[', ']', ')', '(', 
    ')', '{', '}', ',', '=', 
    '.'
]

operadores = [
    '-', '+', '/', '*', 
    '^', '>=', '>', '<'
]

letras = [
    "a", "b", "c", "d", 
    "e", "f", "g", "h", 
    "i", "j", "k", "l", 
    "m", "n", "o", "p", 
    "q", "r", "s", "t", 
    "u", "v", "x", "y", 
    "z"
]

numeros = [
    "0", "1", "2", "3", 
    "4", "5", "6", "7", 
    "8", "9"
]


# Alimentando a matriz com dados
array(  [[ '0', 'Id',  'num',  '+',  '-',  '*',  '/',  '(',  ')',  '$'],
        [ 'E',  'E , TS',  'E , TS',  '0',  '0',  '0',  '0',  'E , TS',  '0',  '0'],
        [ 'T',  'F , FG',  'T , FG',  '0',  '0',  '0',  '0',  'T , FG',  '0',  '0'],
        [ 'S',  '0',  '0',  'S , +TS',  'S , -TS',  '0',  '0',  '0',  'S , $',  ' S , $'],
        [ 'G',  '0',  '0',  'G , $',  'G , $',  'g , *FG',  'G , /FG',  '0',  'G , $',  'G , $'],
        [ 'F',  'F , ID',  'F , NUM',  '0',  '0',  '0',  '0',  'F , (E)',  '0',  '0']])


auxLetras = []

with open("arquivos/teste.txt" , "r" ,encoding="utf8") as programa:
    arquivo = programa.readlines()
    lista = []

    for linha in arquivo:
        lista += nltk.word_tokenize(linha)




