<?php
if(isset($_COOKIE["autologin"])){
  $cookie_array=json_decode($_COOKIE["autologin"], true);
  $nombre = $cookie_array["nombre"];
  $email = $cookie_array["email"];
  $apellido = $cookie_array["apellido"];
}
elseif(isset($_SESSION["user"])){
  $session = $_SESSION["user"];
  $nombre = $session['nombre'];
  $apellido = $session['apellido'];
  $email = $session['email'];
}else{
  header('Location: ../home/index.php');
};

 ?>
