<?php
    session_start();
    if ( !isset($_SESSION['username'])){
      header( "refresh:5;url=index.php");
      die( "Acesso restrito.");
    }
        

    $_SESSION["sensor"]="luz";
    


?>

<!DOCTYPE html>
<html lang="pt">
<head>

 
  
	<meta charset="UTF-8">
  <meta http-equiv="refresh" content="5">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title> Historico-Luminosidade</title>
</head>

<body >
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!--Barra de pesquisa-->
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <div class="container-fluid" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Estacionamento-Inteligente</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Histórico</a>
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
                    <h1 class="card-title">Histórico da Luminosidade</h5>
                    <p class="card-subtitle mb-2 text-muted">Aqui está o histórico <b><?php echo($_SESSION['username']) ?></b></p>
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

            <?php
                if(isset($_SESSION["sensor"])){
                $myfile = file_get_contents("api/files/".$_SESSION["sensor"]."/log.txt");
                $myfile=explode(" ",$myfile);
                $len=count($myfile);
                $i=0;
                while($i<$len) {
                echo "<tr>";
                echo "<td>".$myfile[$i]." ".$myfile[$i+1]."</td>";
                $i=$i+1;
                echo "<td>".$myfile[$i+1]."</td>";
                $i=$i+1;
                echo "<td>".$myfile[$i+1]."</td>";
                echo "</tr>";
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