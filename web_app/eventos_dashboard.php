<?php

//Pagina utilizada para modar os valores dos butões da dasboard permitindo que as funcinalidades butões trabalhem

header('Content-Type: text/html; charset=utf-8');

//Verifica se o metodo é um get
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $hora = date('Y/m/d H:i:s.');
 
    //Verifica se vem todos os valores certos no url
    if(isset($_GET['nome']) && isset($_GET['valor']))
    {
        file_put_contents("api/files/".$_GET['nome']."/nome.txt",$_GET['nome']);
        file_put_contents("api/files/".$_GET['nome']."/valor.txt",$_GET['valor']);
        file_put_contents("api/files/".$_GET['nome']."/hora.txt",$hora);
        file_put_contents("api/files/".$_GET['nome']."/log.txt",$hora." ".$_GET['valor']." ".$_GET['nome']." ",FILE_APPEND);
    }
}
    else {
        echo "Metodo nao permitido";
    }
    
    //Volta para a dashboard não permitindo ao utilizador notar a diferença de que veio a esta página
    header("location: dashboard.php")
?>