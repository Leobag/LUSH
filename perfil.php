<?php
	session_start();
	include_once 'dbh.php';
 ?>

 <!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LUSH - Perfil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../includes/general.css">
    <link rel="stylesheet" href="css/perfil.css">
   <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Raleway:700&display=swap" rel="stylesheet">
  </head>
  <body>

    <?php

      $sql = "SELECT * FROM user";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
          $resultImg = mysqli_query($conn, $sqlImg);
          while ($rowImg = mysqli_fetch_assoc($resultImg)) {
            echo "<div class='user-container'>";
              if ($rowImg ['status'] == 0) {
                echo "<img src='uploads/profile".$id.".jpg?".mt_rand()."'>";
              } else {
                echo "<img src='uploads/default-profile.jpg'>";
              }
              echo "<p>".$row['username']."</p>";
            echo "</div>";
          }
        }
      } else {
        echo "¡Aún no hay usuarios!";
      }

      if (isset($_SESSION['id'])) {
        if ($_SESSION['id'] == 1) {
          echo "Has iniciado sesión";
        }

        echo "<form action='upload.php' method='POST' enctype='multipart/form-data'>
          <input type='file' name='file'>
          <button type='submit' name='submit'>SUBIR</button>
          </form>";

      } else {
        echo "¡Usted no se ha identificado!";
        echo "<form action='signup.php' method='POST'>
          <input type='text' name='first' placeholder='Nombre'>
          <input type='text' name='last' placeholder='Apellido'>
          <input type='text' name='uid' placeholder='Usuario'>
          <input type='password' name='pwd' placeholder='Contraseña'>
          <button type='submit' name= 'submitSignup'>Registrate</button>

        </form>";
      }
     ?>

   <p>¡Inicia sesión como usuario!</p>
    <form action="login.php" method="POST">
      <button type="submit" name="submitLogin">Login</button>
    </form>

    <p>Cerrar sesión como usuario!</p>
    <form action="logout.php" method="POST">
      <button type="submit" name="submitLogout">Logout</button>
    </form>


<div id="falsoheader">
  <img src="img/foto.jpg" alt="perfil" id="foto">
    <h1 id="nombre">Nombre</h1>
      <h2 id="nacionalidad">Argentina</h2>

<nav>
  <ul class="menu">
    <li id="menu">Informacion</li>
    <li id="menu">Reservas</li>
  </ul>
</nav>
</div>

<div class="informacion">
 <ul>
   <li id="informacion">Edad:</li>
   <li id="informacion">Direccion:</li>
   <li id="informacion">Email:</li>
   <li id="informacion">Celular:</li>
 </ul>
 <ul>
   <li id="datos">29</li>
   <li id="datos">Buenos Aires</li>
   <li id="datos">ejemplo@gmail.com</li>
   <li id="datos">54 9 11 0234 5678</li>
 </ul>
</div>

<div class="fusion">
  </div>

<div class="londres">
  <img src="img/londres.jpg" alt="foto" id="viaje1">
   <h4>Londres</h4>
     <h5>Puente de la Torre</h5>
      <h6>17 - 27 Agosto, 2017</h6>
</div>
 </body>
</html>
