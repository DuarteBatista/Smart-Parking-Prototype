<?php
  session_start();

  require_once 'conecao.php';
  if (isset($_POST['login'])) {
    $username = ($_POST['user']);
    $password = ($_POST['pass']);

    $sql = "SELECT * FROM utilizadores WHERE user='$username' AND pass='$password' /*AND (ativo = 1) LIMIT 1 */";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query)) {
      $_SESSION['user'] = $username;
      $_SESSION['pass'] = $resultado;
      $_SESSION['ativo'] = 1;
      $_SESSION['nivel'] = $nivel;

      header("location: dashboard.php"); exit;
      if (mysqli_num_rows($query) == 1) {
        $resultado = mysql_fetch_assoc($query);

        $_SESSION['id'] = $resultado['id'];
        $_SESSION['user'] = $resultado['nome'];
        $_SESSION['nivel'] = $resultado['nivel'];
      }
  } else {
    echo '<script>';
    echo ' alert("Username ou Password incorreta");';  //not showing an alert box.
    echo '</script>';
  }
}

  /*
  //atribuir variavel e valor
  $_SESSION["nome_variavel"] = "valor_variavel";

  $username="Afonso";       // Utilizador que não pode aceder ao histórico
  $password="pass";          //
                             // 
  $username1="Duarte";       // Utilizador com permisão para todo
  $password1="pass";         //
                             //
  $username2="Luis";        // Utilizador que não pode aceder ao histórico nem a webcam
  $password2="pass";         // 
*/
/*
  if (isset($_POST['username'])&&(isset($_POST['password']))) {
    if (($username == ($_POST["username"]) && $password == ($_POST["password"])) || ($username2 == ($_POST["username"]) && $password2 == ($_POST["password"])) || ($username1 == ($_POST["username"]) && $password1 == ($_POST["password"]))) {
      $_SESSION["username"]=$_POST['username'];
      header("Location: dashboard.php"); exit;
  } else {
    echo '<script>';
    echo ' alert("Username ou Password incorreta");';  //not showing an alert box.
    echo '</script>';
    
  } 
}
*/

?>
<!DOCTYPE html>
<html>
<head>

<style>
body {
  background-image: url('background.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>  
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
  <div class="container">
      <div class="row vh-100 align-items-center justify-content-center">
          <div class="col-sm-8 col-md-6 col-lg-4 bg-white rounded p-4 shadow">
              <div class="row justify-content-center mb-4">
              <img src="estg.png" class="w-70" alt="ESTG"> 
<form method="post">
  <div class="mb-4">
    <label for="username" class="form-label">Username:</label>
    <input type="text" name="user" placeholder="username" class="form-control" id="exampleInputUsername1"  maxlength="25" aria-describedby="username" required>
  </div>
  <div class="mb-4">
    <label for="exampleInputPassword1" class="form-label">Password:</label>
    <input type="password" name="pass" placeholder="password" class="form-control" id="exampleInputPassword1" required>
  </div>
  <button type="submit" name="login" class="btn btn-success w-100">Login</button>
</form>
</div>
</div>
</div>
</div>
</body>
</html>