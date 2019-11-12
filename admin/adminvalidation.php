<?php

if (isset($_COOKIE["autologin"]) || isset($_SESSION["user"])) {
  if (isset($_COOKIE["autologin"])) {
      $cookie_array=json_decode($_COOKIE["autologin"], true);
      if($cookie_array["isadmin"]){
        /* Continues to code*/
      }
  }
  elseif (isset($_SESSION["user"])) {
    if($_SESSION["user"]['isadmin']){
      /* Continues to code*/
    }
  }
  else {
    header('Location: ../home/index.php');
    exit();
  }
} else{
  header('Location: ../home/index.php');
  exit();
}
 ?>
