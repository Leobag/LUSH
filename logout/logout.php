<?php

  if(isset($_COOKIE["autologin"])){
    setcookie("autologin", "", -1, "/");
  }
  session_start();
  session_destroy();

header("Location: ../home/index.php");

 ?>
