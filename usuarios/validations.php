<?php

if(isset($_POST["submit"])){



$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$password = $hash;



if(empty($nombre) || empty($apellido) || empty($email) || empty($password)){
  header("Location: ../register/register.php?register=empty&nombre=$nombre&apellido=$apellido&email=$email");
exit();
}

    elseif(!preg_match("/^[a-zA-Z]*$/", $nombre) || !preg_match("/^[a-zA-Z]*$/", $apellido)){
  header("Location: ../register/register.php?register=char&nombre=$nombre&apellido=$apellido&email=$email");
  exit();
}

    elseif(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false){
      header("Location: ../register/register.php?register=email&nombre=$nombre&apellido=$apellido&email=$email");
      exit();
    }
    elseif(password_verify($_POST["verificarpassword"], $hash) == false){
      header("Location: ../register/register.php?register=verify&nombre=$nombre&apellido=$apellido&email=$email");
      exit();
    }
    elseif (strlen($_POST["password"]) < 6) {
          header("Location: ../register/register.php?register=corto&nombre=$nombre&apellido=$apellido&email=$email");
          exit();}



else{

  function crearUsuario(){
    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $usuario = [

    "nombre" => $_POST["nombre"],
    "apellido" => $_POST["apellido"],
    "email" => $_POST["email"],
    "password" => $hash,
  ];
  return $usuario;
  }

$usuarios = file_get_contents("usuarios.json");
$usuariosArray = json_decode($usuarios, true);

$usuariosArray[] = crearUsuario();

$usuariosFinal = json_encode($usuariosArray);

file_put_contents("usuarios.json", $usuariosFinal);

header("Location: ../home/index.php?register=success");

}  }
?>
