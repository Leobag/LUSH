<?php

function randomPassword() {
$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$pass = [];
$alphaLength = strlen($alphabet) - 1;
for ($i = 0; $i < 7; $i++) {
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
}
return implode($pass);
}

$profilepic = null;

if(isset($_POST["submitprofile"])){
if(isset($_FILES["profpic"])){
    $file = $_FILES["profpic"];
      if($_FILES["profpic"]["error"] === 0){
      $filename = $file["name"];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);

      if($ext != "jpg" && $ext != "jpeg" && $ext != "png"){
        header("Location: ../register/register.php?register=archivo&nombre=$nombre&apellido=$apellido&email=$email");
        exit();
      }
      $profilepic = randomPassword();

      $temp = $_FILES["profpic"]["tmp_name"];

      $position = dirname(__FILE__) . "/../usuarios/profilepics";

      $finalpos = $position ."/". $profilepic . "." . $ext;

      move_uploaded_file($temp, $finalpos);
    } else{header('Location: perfil.php'); exit();}
  }

  $q = $db->prepare("UPDATE users SET photo_name = :photo WHERE email='$email'");
  $q->bindValue(':photo',"$profilepic.$ext");
  $q->execute();

  header('Location: perfil.php');
}
 ?>
