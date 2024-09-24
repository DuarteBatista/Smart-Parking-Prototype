<?php
  
    //ATENÇÃO CASO PRETENDA MOSTRAR FOTOS NOVAS ELIMINADO AS QUE ESTÃO NÃO ESQUECER DE COLOCAR O VALOR.TXT DA WEBCAM A ZERO 

    // Pagina muito semelhante ao historico.php com a diferença que esta mostra as imagens da camera

    //Se a variavel username estiver errada voltar para o login  
    session_start();
    if ( !isset($_SESSION['user'])){
      header( "refresh:5;url=index.php");
      die( "Acesso restrito.");
    }
    
    if($_SESSION['user']=="Afonso" || $_SESSION['user']=="Luis" ){
       echo"<script>
        alert('Desculpe ".$_SESSION['user']." não tem permissões para aceder ao Histórico') 
        window.location.replace('http://localhost/Projeto_TI/dashboard.php')
       </script>";
    }
    

    

?>
<!DOCTYPE html>
<html lang="pt">
<head>
<style>
body {
  background-image: url('Estacinamento.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
 
  
	<meta charset="UTF-8">
  <meta http-equiv="refresh" content="5">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="Style.css">
     <title> Historico Camera</title>
</head>

<body class="bg-dark" >
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!--Barra de pesquisa-->
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <div class="container-fluid" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" >Estacionamento-Inteligente</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Primeiro card com o logotipo da ESTG -->
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <img src="Logótipo_Politécnico_Leiria_01.png" class="float-end" alt="Imagem do currículo" width="300px">
                    <h1 class="card-title">Histórico Da Camera </h5>
                    <p class="card-subtitle mb-2 text-muted card-body">Aqui está o histórico <b style="color:white"><?php echo($_SESSION['user']); ?></b></p>
                    <small class="card-text">Projeto Tecnologias de internet</small>

            </div>
          </div>

          <br>

    
          <div class='container'>
          <div class='row'>

    <?php

    // A pagina vai buscar a api o valor a que vai o contador da webcam colcando de seguida 
    // as imagens que estão no projeto por ordem cronológica


    $X=0;
    $Y = intval(file_get_contents("api/files/webcam/valor.txt"));

    do{
    //<!-- Single item -->
   
    $filename='webcam_'.$X.'.jpg';

    echo"
          <div class='col-lg-4 col-md-12' style='padding-bottom: 15px'>
            <div class='card'>
              <img
                src='webcam_$X.jpg' 
                class='card-img-top'
                alt='imagem Camera'
                width=21%
              >
              <div class='card-body'>
                <h5 class='card-title'>Foto $X</h5>
                <p class='card-text'>
                 Data da Imagem: ".date("Y/m/d H:i:s.", filemtime($filename))."
                </p>           
             </div>
           </div>
         </div>
      <br>";
    $X=$X+1;
    }while ($X<=$Y);
          ?>

</body>
</html>