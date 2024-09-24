<?php
    session_start();
  

  
  if ( !isset($_SESSION['user'])){
      header( "refresh:5;url=index.php");
      die( "Acesso restrito.");
  }
  

  /*
  require_once 'conecao.php';
  $query = "SELECT * FROM utilizadores";
  $result = mysqli_query($conn, $query);
  */
  
  header( "refresh:5;url=dashboard.php");  

    //Temperatura
    $valor_temperatura = file_get_contents("api/files/temperatura/valor.txt");
    $hora_temperatura = file_get_contents("api/files/temperatura/hora.txt");
    $nome_temperatura = file_get_contents("api/files/temperatura/nome.txt");
    

    //humidade
    $valor_humidade = file_get_contents("api/files/humidade/valor.txt");
    $hora_humidade = file_get_contents("api/files/humidade/hora.txt");
    $nome_humidade = file_get_contents("api/files/humidade/nome.txt");
    

    //Lugares
    $lugares_lugares = file_get_contents("api/files/lugares/valor.txt");
    $hora_lugares = file_get_contents("api/files/lugares/hora.txt");
    $nome_lugares = file_get_contents("api/files/lugares/nome.txt");
    
    //Incapacitados
    $valor_incapacitados = file_get_contents("api/files/incapacitados/valor.txt");
    $hora_incapacitados = file_get_contents("api/files/incapacitados/hora.txt");
    $nome_incapacitados = file_get_contents("api/files/incapacitados/nome.txt");

    //Fumo
    $valor_fumo = file_get_contents("api/files/fumo/valor.txt");
    $hora_fumo = file_get_contents("api/files/fumo/hora.txt");
    $nome_fumo = file_get_contents("api/files/fumo/nome.txt");

    //Sensor
    $valor_movimento = file_get_contents("api/files/movimento/valor.txt");
    $hora_movimento = file_get_contents("api/files/movimento/hora.txt");
    $nome_movimento = file_get_contents("api/files/movimento/nome.txt");

//########################################################################################

    //cancela
    $cancela_cancela = file_get_contents("api/files/cancela/valor.txt");
    $hora_cancela = file_get_contents("api/files/cancela/hora.txt");
    $nome_cancela = file_get_contents("api/files/cancela/nome.txt");
      
    //Alarme
    $valor_alarme = file_get_contents("api/files/alarme/valor.txt");  
    $hora_alarme = file_get_contents("api/files/alarme/hora.txt");
    $nome_alarme = file_get_contents("api/files/alarme/nome.txt");
  
    //Ar condicionado
    $valor_AC = file_get_contents("api/files/AC/valor.txt");
    $hora_AC = file_get_contents("api/files/AC/hora.txt");
    $nome_AC = file_get_contents("api/files/AC/nome.txt");
    
    //led
    $valor_led = file_get_contents("api/files/led/valor.txt");
    $hora_led = file_get_contents("api/files/led/hora.txt");
    $nome_led = file_get_contents("api/files/led/nome.txt");

    //LCD
    $valor_LCD = file_get_contents("api/files/LCD/valor.txt");
    $hora_LCD = file_get_contents("api/files/LCD/hora.txt");
    $nome_LCD = file_get_contents("api/files/LCD/nome.txt");



/*
if ($valor_humidade < 10){
  $back_image="Estacionamento_noite.png";
}
else{
  $back_image="Estacinamento.png";
}
*/

$back_image="Estacinamento.png";

?>


<!DOCTYPE html>
<html lang="pt">
<head>




  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="ajax.js"></script>
  <!--
  <script type="text/javascript">

    function datahora(){
    var data = new Date().toISOString().split('T')[0];
    var resto = new Date().toISOString().split('T')[1];
    var time = resto.split(".")[0];
    return data+" "+time;
    }

  function trata_som(X) {
    var url_1= "http://127.0.0.1/Projeto_TI/api/api.php";

    var valores_f = {'nome': 'som' , 'valor': X , 'hora': datahora() };
	  RealHTTPClient.post(url_1, valores_f, function(status, data){
          	Serial.println("resposta: " + status);
     	});
  }
      
    
       const btn = document.getElementById('btn');

       if(btn){
          btn.addEventListener('click', trata_som(1));
        }

        const bt = document.getElementById('bt');

        if(bt){
          bt.addEventListener('click', trata_som(0));
        }

      

  </script>
      -->
  <script type="text/javascript" >
    google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Temperatura', <?= $valor_temperatura ?>]
      ]);

      var options = {
        width: 400, height: 120,
        redFrom: 90, redTo: 100,
        yellowFrom:75, yellowTo: 90,
        minorTicks: 5
      };

      var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

      chart.draw(data, options);
}

</script>

<style>
body {
  background-image: url(<?php echo $back_image ?>);   
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
 
  
	<meta charset="UTF-8">
  <meta http-equiv="refresh" content="500">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="Style.css">	
     <title> Estacionamento Inteligente </title>
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
    <a class="navbar-brand" href="#">Dashboard EI-TI</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="eventos_dashboard.php?nome=som&valor=1" ><button  type="button" id="btn">Ligar Som</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="eventos_dashboard.php?nome=som&valor=0" ><button  type="button" id="bt">Desligar Som</button></a>
        </li>
      </ul>
      <form class="d-flex">
      <a href="logout.php" ><button  type="button">Lougout</button></a>
      </form>
    </div>
  </div>
</nav>

<!-- Primeiro card com o logotipo da ESTG -->
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <img src="Logótipo_Politécnico_Leiria_01.png" class="float-end" alt="Imagem do currículo" width="300px">
                    <h1 class="card-title">Estacionamento Inteligente</h5>
                    <p class="card-subtitle mb-2 text-muted card-body">Bem vindo <b style="color:white"><?php echo $_SESSION['user'] ?></b></p>
                    <small class="card-text">Projeto Tecnologias de internet</small>
            </div>
          </div>
          
          <br>

          <div class="text-center">
          <div class="container">
            <div class="card" >
                <div class="card-body">
                <h1 class="card-title">Sensores</h5>
            </div>
          </div> 
          </div>   
                                         <!-- Conjunto dos cards ao meio da pagina (remember-> a tela está dividida em 12 por isso se usou o col-sm-3) -->       
        <div class="text-center">
        <div class="container">
            <div class="row">
                <div class="card-group">

                    <div class="col-sm-3">
                        <div class="card">
                                                <!-- Humidade -->
                            <div class="card-header"><b>Humidade: </b><span class='js-humidade'><?php echo $valor_humidade; ?></span>%</div>
                            <div class="card-body"><img src="humidade.png" alt="lum" width="128px"></div>
                            <div class="card-footer"><b>Atualização: </b><span class='js-hora-humidade'>: <?php echo $hora_humidade ?></span> -<a href="historico.php?sensor=humidade&ficheiro=log" style="color:white" >Histórico</a></div>
                        </div>
                    </div>
                                                      <!-- Lugares Incapacitados -->
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header"><b>Lugares para inacapacitados: </b><span class='js-incapacitados'> <?php echo $valor_incapacitados; ?></span>/4</div>
                            <div class="card-body"><img src="inacapacitado.png" alt="temp" width="128px" ></div>
                            <div class="card-footer"><b>Atualização: </b><span class='js-hora-incapacitados'>: <?php echo $hora_incapacitados ?></span> -<a href="historico.php?sensor=incapacitados&ficheiro=log" style="color:white" >Histórico</a></div>
                        </div>
                    </div>

                                                              <!-- LUGARES -->
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-header"><b>Lugares: </b><span class='js-lugares'> <?php echo $lugares_lugares; ?></span> /6</div>
                        <div class="card-body"><img src="parking.png" alt="parking" width="128px"></div>
                        <div class="card-footer"><b>Atualização: </b> <span class='js-hora-lugares'><?php echo $hora_lugares ?></span> -<a href="historico.php?sensor=lugares&ficheiro=log" style="color:white">Histórico</a></div>
                      </div>
                    </div>   
                                                                    <!-- TEMPERATURA -->
                                                                    <div class="col-sm-3">
                      <div class="card">
                            <div class="card-header"><b>Temperatura:</b><span class='js-temperatura'> <?php echo $valor_temperatura; ?>º</span></div>
                            <div class="card-body" id="chart_div" style="text-align: center" ></div>
                            <div class="card-footer"><b>Atualização</b>:<span class='js-hora-temperatura'> <?php echo $hora_temperatura ?></span> -<a href="historico.php?sensor=Temperatura&ficheiro=log" style="color:white" >Histórico</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="text-center">
        <div class="container">
         <div class="row">
          <div class="card-group">    
                                              <!-- SENSOR DE FUMO -->
            <div class="col-sm-3">
                        <div class="card">
                            <?php 
                                  if($valor_fumo==0){
                                    $imagem="certo.png";
                                    $card_fumo="Baixo";
                                  }
                                  else{
                                    $imagem="errado.png";
                                    $card_fumo="Alto";                            
                                  }
                            ?>
                            <div class="card-header"><b>Estado Do fumo: </b><?php echo $card_fumo; ?></div>
                            <div class="card-body"><img src=<?php echo $imagem ?> alt="parking" width="122px"></div>
                            <div class="card-footer"><b>Atualização: </b> <?php echo $hora_fumo ?> -<a href="historico.php?sensor=fumo&ficheiro=log" style="color:white">Histórico</a></div>
                        </div>
            </div> 
                                               <!-- SENSOR DE MOVIMENTO -->
              <div class="col-sm-3">
                        <div class="card">
                            <?php 
                                  if($valor_movimento == 1){
                                    $imagem="movimento.png";
                                    $card_movimento="Ativo";
                                  }
                                  else{
                                    $imagem="sem_movimento.png"; 
                                    $card_movimento="Desativo";                                   
                                  }
                            ?>
                            <div class="card-header"><b>Estado Do Movimento: </b><?php echo $card_movimento ?></div>
                            <div class="card-body"><img src=<?php echo $imagem ?> alt="parking" width="122px"></div>
                            <div class="card-footer"><b>Atualização: </b> <?php echo $hora_movimento ?> -<a href="historico.php?sensor=movimento&ficheiro=log" style="color:white">Histórico</a></div>
                        </div>
            </div> 
            </div>
        </div>
    </div>

    <br>

    <div class="container">
            <div class="card" >
                <div class="card-body">
                <h1 class="card-title">Atuadores</h5>
            </div>
          </div> 
          </div>                           
                                         <!-- Conjunto dos cards ao meio da pagina (remember-> a tela está dividida em 12 por isso se usou o col-sm-3) -->       
        <div class="text-center">
        <div class="container">
            <div class="row" >
                <div class="card-group">
                  
                                                                    <!-- CANCELA -->
                    <div class="col-sm-3">
                     <div class="card">
                            <?php 
                                  if($cancela_cancela == 1 ){
                                    $card_cancela="Aberta";
                                  }
                                  else{
                                    $card_cancela="Fechada";                                    
                                  }
                            ?>
                        <div class="card-header"><b>Cancela: </b><?php echo $card_cancela ?></div>
                        <div class="card-body"><img src="cancela.png" alt="cancela" width="128px">
                        <a class="nav-link active" aria-current="page" href="eventos_dashboard.php?nome=cancela&valor=1" ><button  type="button" id="btn">Abrir Cancela</button></a>
                              <a class="nav-link active" aria-current="page" href="eventos_dashboard.php?nome=cancela&valor=0" ><button  type="button" id="btn">Fechar Cncela</button></a>
                              </div>
                        <div class="card-footer"><b>Atualização</b><span class='js-hora-cancela'><?php echo $hora_cancela ?></span>  -<a href="historico.php?sensor=cancela&ficheiro=log" style="color:white">Histórico</a></div>
                     </div>  
                    </div> 
                                                          <!-- ESTADO DO ALARME-->
            <div class="col-sm-3">
                        <div class="card">

                            <?php 
                                  if($valor_alarme=="Ativo"){
                                    $imagem="sirene_on.png";

                                  }
                                  else{
                                    $imagem="sirene_off.png";

                                  }
                            ?>
                            <div class="card-header"><b>Estado Do Alarme: </b><span class='js-alarme'> <?php echo $valor_alarme?></span></div>
                            <div class="card-body"><img src=<?php echo $imagem ?> alt="parking" width="230px"></div>
                            <div class="card-footer"><b>Atualização: </b><span class='js-hora-alarme'><?php echo $hora_alarme ?></span> -<a href="historico.php?sensor=alarme&ficheiro=log" style="color:white">Histórico</a></div>
                        </div>
              </div>

                                                              <!-- Ar Condicionado -->
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-header"><b>Estado Do AC: </b><span class='js-AC'><?php echo $valor_AC; ?></span></div>
                        <div class="card-body"><img src="AC.png" alt="parking" width="128px"></div>
                        <div class="card-footer"><b>Atualização: </b><span class='js-hora-AC'><?php echo $hora_AC ?></span> -<a href="historico.php?sensor=AC&ficheiro=log" style="color:white">Histórico</a></div>
                      </div>
                    </div>   
                                                                    <!-- LED -->

                            <?php 
                                  if($valor_led=="Ligado"){
                                    $imagem="led_on.png";;
                                  }
                                  else{
                                    $imagem="led_off.png";
                                  }
                            ?>

                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-header"><b>Estado Do LED: </b><span class='js-led'><?php echo  $valor_led; ?></span></div>
                        <div class="card-body"><img src=<?php echo $imagem ?> alt="parking" width="128px"></div>
                        <div class="card-footer"><b>Atualização: </b><span class='js-hora-led'><?php echo $hora_led ?></span> -<a href="historico.php?sensor=led&ficheiro=log" style="color:white">Histórico</a></div>
                      </div>
                    </div> 
                </div>
            </div>
        </div>
    </div> 

    <div class="text-center">
        <div class="container">
         <div class="row">
          <div class="card-group">    
                                              <!-- LCD -->
            <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header"><b>LCD Diz: </b><span class='js-LCD'><?php echo $valor_LCD ?></span></div>
                            <div class="card-body"><img src="LCD.png" alt="parking" width="122px"></div>
                            <div class="card-footer"><b>Atualização: </b><span class='js-hora-led'><?php echo $hora_LCD ?></span> -<a href="historico.php?sensor=LCD&ficheiro=log" style="color:white">Histórico</a></div>
                        </div>
            </div> 
            

            </div>
            </div>
            </div>
          
            <br>
                                                          <!-- WEBCAM -->
              <?php
              //Comenta a webcam não permitindo que o utilizador Luis tenha a permissão de a usar
                                  if($_SESSION['user']=="Luis"){
                                    echo"<!--";
                                  }
              
              ?>
             
                <div class="container">
                <div class="row">
                <div class="card-group">
                <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header"><b> Webcam </b></div>
                            <?php
                            echo "<div class='card-body'><img src='webcam.jpg?id=".time()."alt='parking' width='100%' >";
                              // CODIGO QUE PERMITE ESCREVER A DATA A QUE O FICEHIRO FOI FEITO
                            $filename = 'webcam.jpg';
                            if (file_exists($filename)) {
                                echo "<div class='card-footer'><b>Atualização</b>:".date ("Y/m/d H:i:s.", filemtime($filename))."-<a href='historico_camera.php' style='color:white'>Histórico</a></div>";
                            }
                            ?>

                            
                        </div>
              </div>                    
            </div>
          </div>
          </div>
          <?php   
              
              if($_SESSION['user']=="Luis"){
                echo"-->";
              }
              
              ?>
          
    <br>
    <br>

                                  <!-- Tabela com os valores das variaveis -->
<div class="container">
<div class="row">
<div class="card-group">
                               
    <table class="table table-sm;">
            <thead>
              <tr>
                <th scope="col"><b>Tipo de Dispositivo IoT</b></th>
                <th scope="col">Valor</th>
                <th scope="col">Data de Atualização</th>
                <th scope="col">Estados Alertas</th>
              </tr>
            </thead>
            <tbody>
              <!-- humidade -->
              <tr>
                <td>Humidade</td>
                <td><span class='js-humidade'><?php echo $valor_humidade ?></span>%</td>
                <td><span class='js-hora-humidade'><?php echo $hora_humidade ?></span></td>
                <td><span class="badge rounded-pill bg-success">Ativo</span></td>
              </tr>

              <!-- Lugares Incapacitados -->
              <tr>
              <td>Lugares Incapacitados</td>
                <td><span class='js-incapacitados'><?php echo $valor_incapacitados ?></span></td>
                <td><span class='js-hora-incapacitados'><?php echo $hora_incapacitados ?></span></td>
                <?php
                  if ($valor_incapacitados == 0){
                    print "<td><span class='badge rounded-pill bg-danger'>Sem lugares</span></td>";
                  }else{
                    print "<td><span class='badge rounded-pill bg-success'>Com lugares</span></td>";
                    }
                ?>
              </tr>

              <!-- Lugares  -->
              </tr>
              <td>Lugares Vagos</td>
                <td><span class='js-lugares'> <?php echo $lugares_lugares ?></span></td>
                <td><span class='js-hora-lugares'><?php echo $hora_lugares ?></span></td>
                <?php
                  if ($lugares_lugares==0){
                    print "<td><span class='badge rounded-pill bg-danger'>Sem lugares</span></td>";
                  }else{
                    print "<td><span class='badge rounded-pill bg-success'>Com lugares</span></td>";
                    }
                ?>
              </tr>

                    <!-- temperatura -->
              <tr>
              <td>Temperatura</td>
                <td><span class='js-temperatura'><?php echo $valor_temperatura ?></span>º</td>
                <td><span class='js-hora-humidade'><?php echo $hora_temperatura ?></span></td>
                <td><span class='badge rounded-pill bg-success'>Ativo</span></td>
                <!--<td><span class="badge rounded-pill bg-success">Desativo</span></td>-->
              </tr>

                      <!-- Fumo -->
              <tr>
              <td>Quantidade de Fumo</td>
                <td><?php echo $card_fumo ?></td>
                <td><?php echo $hora_fumo ?></td>
                <?php
                  if ($valor_fumo =="Alto"){
                    print "<td><span class='badge rounded-pill bg-danger'>Alto</span></td>";
                  }else{
                    print "<td><span class='badge rounded-pill bg-success'>Baixo</span></td>";
                    }
                ?>
              </tr>

                     <!-- Movimento -->
                <tr>
              <td>Estado do movimento</td>
                <td><?php echo $card_movimento ?></td>
                <td><?php echo $hora_movimento  ?></td>
                <?php
                  if ($card_movimento =="Desativo"){
                    print "<td><span class='badge rounded-pill bg-danger'>Desativo</span></td>";
                  }else{
                    print "<td><span class='badge rounded-pill bg-success'>Ativo</span></td>";
                    }
                ?>
              </tr>

              <!-- Cancela -->
              <tr>
              <td>Cancela</td>
                <td><?php echo $card_cancela ?></td>
                <td><?php echo $hora_cancela ?></td>
                <?php
                  if ($card_cancela=="Fechada"){
                    print "<td><span class='badge rounded-pill bg-danger'>Fechada</span></td>";
                  }else{
                    print "<td><span class='badge rounded-pill bg-success'>Aberta</span></td>";
                    }
                ?>
              </tr>

              </tr>
              <td>Estado Alarme</td>
                <td><span class='js-alarme'> <?php echo $valor_alarme ?></span></td>
                <td><span class='js-hora-alarme'><?php echo $hora_alarme ?></span></td>
                <?php
                  if ($valor_alarme=="Desativo"){
                    print "<td><span class='badge rounded-pill bg-danger'>Ativo</span></td>";
                  }else{
                    print "<td><span class='badge rounded-pill bg-success'>Desativo</span></td>";
                    }
                ?>
              </tr>

              </tr>
              <td>Estado Do AC</td>
                <td><span class='js-AC'> <?php echo $valor_AC ?></span></td>
                <td><span class='js-hora-AC'><?php echo $hora_AC ?></span></td>
                <?php
                  if ($valor_AC=="Desligado"){
                    print "<td><span class='badge rounded-pill bg-danger'>Desligado</span></td>";
                  }else{
                    print "<td><span class='badge rounded-pill bg-success'>Ligado</span></td>";
                    }
                ?>
              </tr>

              </tr>
              <td>Estado Do LED</td>
                <td><span class='js-led'> <?php echo $valor_led ?></span></td>
                <td><span class='js-hora-led'><?php echo $hora_led ?></span></td>
                <?php
                  if ($valor_AC=="Desligado"){
                    print "<td><span class='badge rounded-pill bg-danger'>Desligado</span></td>";
                  }else{
                    print "<td><span class='badge rounded-pill bg-success'>Ligado</span></td>";
                    }
                ?>
              </tr>

              </tr>
              <td>LCD</td>
                <td><span class='js-LCD'> <?php echo $valor_LCD ?></span></td>
                <td><span class='js-hora-LCD'><?php echo $hora_LCD ?></span></td>
                <td><span class='badge rounded-pill bg-success'>Ativo</span></td>
              </tr>


            </tbody>
    </table>
  </div> 
</div> 
</div>

  
</body>
</html> 
