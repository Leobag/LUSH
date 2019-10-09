<?php

if(isset($_COOKIE)){
  unset($_COOKIE["autologin"]);
  setcookie("autologin", null, -1, "/");

}
  session_start();
  session_destroy();

header("Location: ../home/index.php");

 ?>
