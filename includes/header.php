<?php
session_start();
$estilo= "font-family: 'Raleway', sans-serif;
font-weight: 600;
font-style: normal;
font-size: 12px;
text-transform: uppercase;
color: #ffffff;
letter-spacing: 2px;
text-rendering: optimizeLegibility;
text-decoration: none;
text-shadow: rgba(0,0,0,.01) 0 0 0.5px";

$display=null;
if(isset($_COOKIE["autologin"]) || count($_SESSION) != 0){
  $display = "display:none";
}

if(isset($_COOKIE["autologin"])){
  $cookie_array=json_decode($_COOKIE["autologin"], true);
  $nombrecookie = $cookie_array["nombre"];
  $emailcookie = $cookie_array["email"];
  $passwordcookie = $cookie_array["password"];
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
        <li><a href="../preguntasfrecuentes/PreguntasFrecuentes.php">Preguntas Frecuentes</a></li>
        <li><a href="../trips/trips.php">Destinos</a></li>
        <li style=<?php if(isset($_COOKIE["autologin"]) || count($_SESSION) != 0){echo $display;}?>><a href="../register/register.php">Registro</a></li>
      </ul>
    </div>
    <div class="offset col-4 col-md-3 text-right pr-4" style="display:inline-block">
      <ul class="mt-3">
        <li style="<?php if(isset($_COOKIE["autologin"]) || count($_SESSION) != 0){echo $display;}?>" ><a href="../login/login.php">Log in</a></li>

        <?php if(isset($_COOKIE["autologin"])){ ?>

        <div id="dropdown-big" class="dropdown">
              <a style="<?=$estilo?>" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bienvenido <?=$nombrecookie?>
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="../perfil/perfil.php">Perfil</a>
                <a class="dropdown-item" href="../logout/logout.php"> Cerrar Sesion </a>
              </div>
        </div>
        <?php }?>

        <?php if(count($_SESSION) != 0){ ?>

        <div id="dropdown-big" class="dropdown">
              <a style="<?=$estilo?>" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bienvenido <?=$_SESSION["nombre"]?>
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="../perfil/perfil.php">Perfil</a>
                <a class="dropdown-item" href="../logout/logout.php"> Cerrar Sesion </a>
              </div>
        </div>
        <?php }?>

        <li><a href="../carrito/carrito.php"><i class="fas fa-shopping-cart"></i></a></li>
      </ul>
    </div>
  </nav>
  <div id="dropdown-small" class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Menu
    </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="../preguntasfrecuentes/PreguntasFrecuentes.php">Nosotros/FAQ</a>
        <a class="dropdown-item" href="../trips/trips.php">Destinos</a>
        <a style="<?php if(isset($_COOKIE["autologin"]) || count($_SESSION) != 0){echo $display;}?>"class="dropdown-item" href="../register/register.php">Registro</a>
        <a style="<?php if(isset($_COOKIE["autologin"]) || count($_SESSION) != 0){echo $display;}?>" class="dropdown-item" href="../login/login.php">Log in</a>
        <a class="dropdown-item" href="../carrito/carrito.php">Mi carrito</a>
      </div>
    </div>
    <img class="logo-name" src="../img/nombre-blanco.png" alt="">
</header>
