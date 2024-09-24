<?php
                                                    // API QUE RECEBE AS FOTOS DA WEBCAM E ENVIA-AS PARA A PASTA DO PROJETO
header('Content-Type: text/html; charset=utf-8');      // QUE MAIS TARDE SÃO ACEDIDAS NA DASBOARD PELA WEBCAM.JPG

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(isset($_FILES['imagem']['size'])) {              // VERIFICA SE A VARIAVEL (IMAGEM) TRAS ALGUMA INFORMAÇÃO

        $arquivo = $_FILES['imagem'];

        $arquivoNovo = explode('.',$arquivo['name']);

        
        //Verifica se o arquivo é jpg ou png
        if ($arquivoNovo[sizeof($arquivoNovo)-1] != 'jpg' && $arquivoNovo[sizeof($arquivoNovo)-1] != 'png'){
            die('O tipo de arquivo inserido não é permitido por favor insira um ficheiro .jpg ou .png');
        
            // Verifica se o tamanho do ficheiro é o correto
        }else if($_FILES['imagem']['size'] > 1000000){
            die('O arquivo inserido tem mais de 1000kB por favor insira outro ficheiro ');
        }
        else{
              
            move_uploaded_file($arquivo['tmp_name'],$arquivo['name']);

            copy($arquivo['name'], "webcam.jpg");  // ENVIA A FOTA PARA O PROJETO COM O NOME DE WEBCAM.JPG

            // print_r($_FILES['imagem']);  // ARRAY QUE APRESENTA OS DADOS DA FOTO
            
            // echo $_FILES['imagem']['name'],"<br>";   // CARACTERISTICA NOME DE FOTO
            
            // echo $_FILES['imagem']['size'],"<br>";   // CARACTERISTICA TAMANHO DA FOTO
            
            // echo $_FILES['imagem']['type'];          // CARACTERISTICA TIPO DA FOTO
        }
    }
    else{
        echo "A imagem enviada não traz informação.";
    }

}else{
    
    echo "O pedido não foi um POST";

}


                

 
?>    