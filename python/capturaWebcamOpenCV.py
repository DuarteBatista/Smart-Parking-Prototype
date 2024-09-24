

import requests                             
import cv2 as cv                            
import sys                                                             
import msvcrt
from time import strftime, gmtime



def send_file(X):
    url = 'http://127.0.0.1/Projeto_TI/upload.php'                 # LINK PARA O UPLOAD.PHP
    files = {'imagem': open(X, 'rb')}                # VARIAVEL QUE VAI RECEBER APÓS A LEITURA (rb) OS BITS DA IMAGEM

    r = requests.post(url, files=files)                         # PEDIDO POST 
    
    if r.status_code==200:                                      #  |
        print("OK: POST realizado com sucesso")                 #  |
        print(r.status_code)                                    #  |
    else:                                                       #   ----> VERIFICAÇÃO SE O POST FOI FEITO
        print("ERRO: Não foi possível realizar o pedido")       #  |
        print(r.status_code)                                    #  |
    
def send_to_api(data_atuador,valor_atuador):  ## FUNÇÃO QUE PERMITE MANDAR PELO METODO POST OS VALORES DE UM SENSOR
    r=requests.post("http://127.0.0.1/Projeto_Ti/api/api.php", data={'nome': 'webcam' , 'valor': valor_atuador, 'hora': data_atuador})  
                                                                                                                                         
    if r.status_code==200:                                                                                                  
        print("OK: POST realizado com sucesso")
        print(r.status_code)
    else:
        print("ERRO: Não foi possível realizar o pedido")
        print(r.status_code)

def datahora():

    X=strftime("%Y/%m/%d %H:%M:%S")    ## FUNÇÃO QUE PERMITE DAR A HORA DO PC

    return X

def get__from_api():
    r=requests.get('http://127.0.0.1/Projeto_Ti/api/api.php?nome=webcam&ficheiro=valor')


    if r.status_code==200:                                                                                                  
        print("OK: GET realizado com sucesso")
        print(r.status_code)
    else:
        print("ERRO: Não foi possível realizar o pedido")
        print(r.status_code)

    #C=int(r.text)

    return int(r.text)



try:

    X=get__from_api()
    while True :
        camera = cv.VideoCapture(0, cv.CAP_DSHOW)    ## TIRA FOTO COM A CAMERA DO PC
        ret, imagem = camera.read()                  ## GUARDA A IMAGEM NA VARIAVEL (imagem) E O RET FICA COM VALOR BOLEANO (Verdadeiro\Falso)
        print(ret)
        if bool(ret):
            Foto=f"webcam_{str(X)}.jpg"
            cv.imwrite(Foto, imagem)         ## SE A IMAGEM TIVER SIDO TIRADO CRIA-SE O FICHEIRO WEBCAM.JPG
            send_file(Foto)                              ## VAI SE PARA A FUNÇÃO (SEND_FILE) PARA QUE SEJA ENVIADA A IMAGEM
            send_to_api(datahora(),X)
            X=X+1
        else:
            print("Não foi criada a imagem")
        cv.waitKey(5000)
        camera.release()
             

except : # caso haja um erro qualquer

    print( "Ocorreu um erro:", sys.exc_info() )


finally: # executa sempre, independentemente se ocorreu exception

    print( "Fim do programa")   
    cv.destroyAllWindows()   

