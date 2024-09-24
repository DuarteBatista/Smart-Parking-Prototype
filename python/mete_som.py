import sys
import time

import requests ## biblioteca para os pedidos

import winsound

## Função que faz tocar (musica).wav
def play_sound(x):
    winsound.PlaySound(x, winsound.SND_ALIAS | winsound.SND_NODEFAULT | winsound.SND_ASYNC)
    
try :

    print( "Prima CTRL+C para terminar")

    

    while True: # ciclo para o programa executar sem parar…

        cont=0

        print("*** LER Estado do som no servidor ***")

        #Vai buscar o valor a api
        r=requests.get('http://127.0.0.1/Projeto_TI/api/api.php?nome=som&ficheiro=valor')  

        if r.status_code==200:

            
            print(r.text)
            if int(r.text) == 1:            #Verifica se o valor está a 1
                play_sound("FUNDO.wav")     #Toca a musica
                while int(r.text)==1 and cont<111 :     #Vai ao longo do ciclo verificar se o valor ainda continua a 1 se sim
                    r=requests.get('http://127.0.0.1/Projeto_TI/api/api.php?nome=som&ficheiro=valor')   #a musica toca até ao final
                    if int(r.text) == 1:                                                                # se não para a musica e continua a 
                        cont=cont+1                                                                     #verificar os valores
                        print(cont)
                        time.sleep(1)
            if int(r.text) == 0:
                play_sound(None)
                

        else:
            print("O pedido HTTP não foi bem sucedido")

        #time.sleep(2.5)    


except KeyboardInterrupt: # caso haja interrupção de teclado CTRL+C

    print( "Programa terminado pelo utilizador")

except : # caso haja um erro qualquer

    print( "Ocorreu um erro:", sys.exc_info() )

finally : # executa sempre, independentemente se ocorreu exception

    print( "Fim do programa") 