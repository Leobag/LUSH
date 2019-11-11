<?php

include("../sql/connect.php");


 ?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../includes/general1.css">
    <link rel="stylesheet" href="CSS/estiloperfil.css">
    <title>Perfil de Usuario - LUSH</title>
  </head>
  <body>
    <?php include_once("../includes/header.php");

    if(isset($_COOKIE["autologin"])){
      session_destroy();
      $cookie_array=json_decode($_COOKIE["autologin"], true);
      $nombre = $cookie_array["nombre"];
      $email = $cookie_array["email"];
      $apellido = $cookie_array["apellido"];
    }
    elseif(count($_SESSION) != 0){
      $nombre = $_SESSION['nombre'];
      $apellido = $_SESSION['apellido'];
      $email = $_SESSION['email'];
    }else{
      header('Location: ../home/index.php');
    };

    $query = $db->prepare("SELECT photo_name FROM users WHERE (email = :email)");
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $photo_name = $query->fetch(PDO::FETCH_ASSOC);

     ?>
    <main id="main" class="">
      <div class="page-title row pt-5">
        <div class="title col-12 text-center pt-5 mb-4">
          <h1>Mi Cuenta</h1>
          <div class="feature_divider">
          </div>
        </div>
      </div>
    </div>
    <section id="section-left"class="row">
      <div id= "profile-pic" class="col-12 col-md-4 col-lg-4 text-center">
        <img class="align-self-center col-10" src="../usuarios/profilepics/<?=$photo_name["photo_name"]?>" alt="Vacio">
      </div>
      <div class="section-right col-12 col-md-6 col-md-6 rounded pr-5">
        <h2>Datos personales</h2>
          <div class="row border rounded">
            <div class="field col-sm-12 col-m-5 col-lg-5 pt-2">
              <p>Nombre</p>
            </div>
            <div class="value col-sm-12 col-m-7 col-lg-7 pt-2">
              <p><?=$nombre?></p>
            </div>
            <div class="field col-sm-12 col-m-5 col-lg-5 border-top pt-2">
              <p>Apellido</p>
            </div>
            <div class="value col-sm-12 col-m-7 col-lg-7 border-top pt-2">
                <p><?=$apellido?></p>
            </div>
            <div class="field col-sm-12 col-m-5 col-lg-5 border-top pt-2">
              <p>email</p>
            </div>
            <div class="value col-sm-12 col-m-7 col-lg-7 border-top pt-2">
              <p><?=$email?></p>
            </div>
          </div>
          <div class="section-right mt-3">
            <h2>Direccion</h2>
              <div class="row border rounded">
                <div class="field col-sm-12 col-m-5 col-lg-5 pt-2">
                  <p>Calle</p>
                </div>
                <div class="value col-sm-12 col-m-7 col-lg-7 border-top pt-2">
                  <p>Pergamino 325</p>
                </div>
                <div class="field col-sm-12 col-m-5 col-lg-5 border-top pt-2">
                  <p>Piso/Depto</p>
                </div>
                <div class="value col-sm-12 col-m-7 col-lg-7 border-top pt-2">
                  <p>7B</p>
                </div>
                <div class="field col-sm-12 col-m-5 col-lg-5 border-top pt-2">
                  <p>Codigo Postal</p>
                </div>
                <div class="value col-sm-12 col-m-7 col-lg-7 border-top pt-2">
                  <p>1406</p>
                </div>
              </div>
            </div>
          <div class="section-right mt-3">
            <h2>Tarjetas</h2>
              <div class="row border rounded mb-4">
                <div class="field col-sm-12 col-m-5 col-lg-5 pt-2">
                  <p>Banco</p>
                </div>
                <div class="value col-sm-12 col-m-7 col-lg-7 border-top pt-2">
                  <p>Galicia</p>
                </div>
                <div class="field col-sm-12 col-m-5 col-lg-5 border-top pt-2">
                  <p>Nombre Titular</p>
                </div>
                <div class="value col-sm-12 col-m-7 col-lg-7 border-top pt-2">
                <p>Leonard Bagiu</p>
                </div>
                <div class="field col-sm-12 col-m-5 col-lg-5 border-top pt-2">
                  <p>Numero de tarjeta</p>
                </div>
                <div class="value col-sm-12 col-m-7 col-lg-7 border-top pt-2">
                  <p>4444-4444-4444-4444</p>
                </div>
              </div>
          </div>
        </div>
      </section>
    </main>







    <?php include("../includes/footer.php"); ?>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
