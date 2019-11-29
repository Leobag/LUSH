
<?php

session_start();

$displayAdmin = "display:none";
$display=null;
if(isset($_COOKIE["autologin"]) || isset($_SESSION["user"])){
  $display = "display:none";
}

if(isset($_COOKIE["autologin"])){
  $cookie_array=json_decode($_COOKIE["autologin"], true);
  $nombrecookie = $cookie_array["nombre"];
  $emailcookie = $cookie_array["email"];
  if($cookie_array["isadmin"]){
    $displayAdmin = "";
  }
}
elseif(isset($_SESSION["user"])){
  $session = $_SESSION["user"];

  $name = $session["nombre"];
  $surname = $session["apellido"];
  $email = $session["email"];

  if($session["isadmin"]){
    $displayAdmin = "";
  }
}



 ?>

<header id="header" class="container-fluid">
  <nav class="nav row pt-0 navbar-light bg-faded">
    <div class="col-2 col-md-2" style="display:inline-block">
      <a href="../home/index.php"><img class="logo-left pull-left ml-3" src="../img/logo-blanco.png" style="display:inline-block"alt="logo"></a>
    </div>
    <div class="col-6 col-md-7 text-center" style="display:inline-block">
      <ul class="mt-3">
        <li><a href="../about/nosotros.php">Nosotros</a></li>
        <li><a href="../FAQ/PreguntasFrecuentes.php">Preguntas Frecuentes</a></li>
        <li><a href="../trips/trips.php">Destinos</a></li>
        <li style=<?=$display?>><a href="../register/register.php">Registro</a></li>
        <li style=<?=$displayAdmin?>><a href="../admin/ABM.php"> Editar viajes </a></li>
      </ul>
    </div>
    <div class="offset col-4 col-md-3 text-right pr-4" style="display:inline-block">
      <ul class="pl-0 mt-3 mb-0 pb-0">
        <li style="<?=$display?>" ><a href="../login/login.php">Log in</a></li>


        <?php  if(isset($_COOKIE["autologin"])): ?>

        <div id="dropdown-big" class="dropdown">
              <a class="btn dropdown-toggle pr-0 styledropdown" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bienvenido <?=$nombrecookie?>
              </a>

              <div class="dropdown-menu" style="background-color: rgba(108, 108, 106, 0.5);" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item styledropdown" href="../perfil/perfil.php">Perfil</a>
                <a class="dropdown-item" href="../carrito/carrito.php"><i class="fas fa-shopping-cart"></i></a>
                <a style="<?=$displayAdmin?>"class="dropdown-item styledropdown" href="../admin/ABM.php">Editar viajes</a>
                <a class="dropdown-item styledropdown" href="../logout/logout.php"> Cerrar Sesion </a>
              </div>
        </div>
      <?php endif;

      if(isset($_SESSION["user"]) && !isset($_COOKIE["autologin"])) : ?>

        <div id="dropdown-big" class="dropdown">
              <a class="btn dropdown-toggle styledropdown" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bienvenido <?=$name?>
              </a>

              <div class="dropdown-menu" style="background-color: rgba(108, 108, 106, 0.5);" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item styledropdown" href="../perfil/perfil.php">Perfil</a>
                <a class="dropdown-item" href="../carrito/carrito.php"><i class="fas fa-shopping-cart"></i></a>
                <a style="<?=$displayAdmin?>"class="dropdown-item styledropdown" href="../admin/ABM.php">Editar viajes</a>
                <a class="dropdown-item styledropdown" href="../logout/logout.php"> Cerrar Sesion </a>
              </div>
        </div>
      <?php endif;?>

        <li><a style="<?=$display?>"href="../carrito/carrito.php"><i class="fas fa-shopping-cart"></i></a></li>
        <?php
          if(isset($_POST)){
            echo "<span id=\"cart_count\"class=\"text-warning bg-light\"></span>";
         } else{
          echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
        }?>

      </ul>
    </div>
  </nav>
  <div id="dropdown-small" class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Menu
    </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

        <?php if(isset($_COOKIE["autologin"]) || isset($_SESSION["user"])){?>
            <a class="dropdown-item" href="../perfil/perfil.php">Perfil</a>
            <?php } ?>
        <a class="dropdown-item styledropdown" href="../trips/trips.php">Destinos</a>
        <a style="<?=$display?>"class="dropdown-item" href="../register/register.php">Registro</a>
        <a style="<?=$display?>" class="dropdown-item" href="../login/login.php">Log in</a>
        <a class="dropdown-item" href="../carrito/carrito.php">Mi carrito</a>
        <a style="<?=$displayAdmin?>"class="dropdown-item styledropdown" href="../admin/ABM.php">Editar viajes</a>
        <a class="dropdown-item" href="../preguntasfrecuentes/PreguntasFrecuentes.php">Nosotros/FAQ</a>
        <?php if(isset($_COOKIE["autologin"]) || isset($_SESSION["user"])):?>
            <a style=""class="dropdown-item" href="../logout/logout.php"> Cerrar Sesion </a>
          <?php endif; ?>
      </div>
    </div>
    <img class="logo-name" src="../img/nombre-blanco.png" alt="">
</header>
