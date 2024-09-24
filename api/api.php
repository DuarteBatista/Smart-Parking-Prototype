<?php

header('Content-Type: text/html; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    //HTTP POST             #### No file_put_contents é necessário por o post pos é esta variavel global que traz o valor e as informações ####
    if(isset($_POST['nome']) && isset($_POST['valor']) && isset($_POST['hora']))
    {
        file_put_contents("files/".$_POST['nome']."/nome.txt",$_POST['nome']);
        file_put_contents("files/".$_POST['nome']."/valor.txt",$_POST['valor']);
        file_put_contents("files/".$_POST['nome']."/hora.txt",$_POST['hora']);
        file_put_contents("files/".$_POST['nome']."/log.txt",$_POST['hora']." ".$_POST['valor']." ".$_POST['nome']." ",FILE_APPEND);
    }

}
    elseif ($_SERVER["REQUEST_METHOD"] == "GET") {

        if(isset($_GET['nome']) && isset($_GET['ficheiro'])){
         
            //echo file_get_contents("files/".$_GET['nome']."/nome.txt");   (Serve para dar o nome)
            echo file_get_contents("files/".$_GET['nome']."/".$_GET['ficheiro'].".txt");
            //echo file_get_contents("files/".$_GET['nome']./hora.txt");   (Serve para dar a hora)
        }    
        else {
            http_response_code(400);        
              }
    }
    else {

        echo "Metodo nao permitido";
    }

?>


