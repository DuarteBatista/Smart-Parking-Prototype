import sys
import time

import random

import requests ## biblioteca para os pedidos

import winsound

## Função que faz tocar (musica).wav
def play_sound(x):
    winsound.PlaySound(x, winsound.SND_ALIAS | winsound.SND_NODEFAULT | winsound.SND_ASYNC)
    
try :

    print( "Prima CTRL+C para terminar")

    falas = ['Brazil_welcome.wav','B_welcome.wav','21_welcome.wav']

    while True: # ciclo para o programa executar sem parar…

        cont=0

        som = random.choice(falas)

        print("*** LER Estado do welcome no servidor ***")

        r=requests.get('http://127.0.0.1/Projeto_TI/api/api.php?nome=movimento&ficheiro=valor')  

        if r.status_code==200:

            
            print(r.text)
            if int(r.text) == 1:            #Se vir que o sensor de movimento está a dar 1 toca uma musica de fundo
                play_sound(som)
                time.sleep(6)
            if int(r.text) == 0:            #Se vir que o sensor de movimento está a dar 0 não toca uma musica de fundo 
                play_sound(None)
                

        else:
            print("O pedido HTTP não foi bem sucedido")

        time.sleep(0.5)    


except KeyboardInterrupt: # caso haja interrupção de teclado CTRL+C

    print( "Programa terminado pelo utilizador")

except : # caso haja um erro qualquer

    print( "Ocorreu um erro:", sys.exc_info() )

finally : # executa sempre, independentemente se ocorreu exception

    print( "Fim do programa") 