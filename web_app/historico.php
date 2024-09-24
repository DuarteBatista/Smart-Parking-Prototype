
<?php

    //Se a variavel username estiver errada voltar para o login  
    session_start();
    /*
    if ( !isset($_SESSION['username'])){
      header( "refresh:5;url=index.php");
      die( "Acesso restrito.");
    }
    */

    //Se a variavel sensor estiver errada voltar para  a dashboard
    if ( !isset($_GET["sensor"]) || !isset($_GET["ficheiro"])){
      header( "refresh:5;url=dasboard.php");
      die( "Erro para entrar no historico.");
    }

    if($_SESSION['user']=="Afonso" || $_SESSION['user']=="Luis" ){
  echo"<script>
       alert('Desculpe ".$_SESSION['user']." não tem permissões para aceder ao Histórico') 
       window.location.replace('http://localhost/Projeto_TI/dashboard.php')
</script>";
   }

    $NomeSensor=$_GET["sensor"];
    $TipoFicheiro=$_GET["ficheiro"];

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
     <title> Historico</title>
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
                    <h1 class="card-title">Histórico <?php echo $NomeSensor; ?></h5>
                    <p class="card-subtitle mb-2 text-muted card-body">Aqui está o histórico <b style="color:white"><?php echo($_SESSION['user']); ?></b></p>
                    <small class="card-text">Projeto Tecnologias de internet</small>

            </div>
          </div>

          <br>
          <!-- Tabela com os valores das variaveis -->
 <div class="card">                                 
    <table class="table table-sm;">
            <thead>
              <tr>
                <th scope="col"><b>Data</b></th>
                <th scope="col">Valor</th>
                <th scope="col">Sensor</th>
              </tr>
            </thead>
            <tbody>
            <!-- Função que permite escrever valores do historico -->
            <?php
                if(isset($NomeSensor)){
                $P_CANCELA=['Fechada','Aberta'];
                $P_FUMO=['Baixo','Alto'];
                $P_MOVIMENTO=['Desativo','Ativo'];
                $myfile = file_get_contents("api/files/".$NomeSensor."/".$TipoFicheiro.".txt");
                $myfile=explode(" ",$myfile);
                $len=count($myfile);
                $len=$len-1;
                $i=0;
                while($i<$len) {
                echo ("<tr>");
                echo ("<td>".$myfile[$i]." ".$myfile[$i+1]."</td>");
                $i=$i+1;
                if($myfile[$i+1]!=0 && $myfile[$i+1]!=1 && $NomeSensor!="cancela" && $NomeSensor!="movimento" && $NomeSensor!="fumo")
                {
                echo ("<td>".$myfile[$i+1]."</td>");
                }elseif($NomeSensor=="cancela"){
                echo ("<td>".$P_CANCELA[$myfile[$i+1]]."</td>");
                }elseif($NomeSensor=="fumo"){
                echo ("<td>".$P_FUMO[$myfile[$i+1]]."</td>");
                }elseif($NomeSensor=="movimento"){
                echo ("<td>".$P_MOVIMENTO[$myfile[$i+1]]."</td>");
                }
                
                $i=$i+1;
                echo ("<td>".$myfile[$i+1]."</td>");
                echo ("</tr>")  ;
                $i=$i+2;
                } 
              }else
              echo "Algo de errado aconteceu";
              ?>

            </tbody>
    </table>
                  </div>  

</body>
</html>         