<?php

if($_POST){



function validarUsuario(){
$errores = [
"nombre" => [],
"apellido" => [],
"email" => [],
"password" => []
];
  $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

  if(strlen($_POST["nombre"]) == 0){
    $errores["nombre"] = "El campo de Nombre esta vacio" . "</br>";

  }

  if(strlen($_POST["apellido"]) == 0){
    $errores["apellido"] = "el campo de Apellido esta vacio" . "</br>";
  }


  if(strlen($_POST["email"]) == 0){
    $errores["email"] = "el campo de email esta vacio" . "</br>";
  }
  if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false){
    $errores["email"] = "el formato de email es incorrecto" . "</br>";
  }

  if(strlen($_POST["password"]) == 0){
  $errores["password"] = "el campo de password esta vacio" . "</br>";
  }
  if(strlen($_POST["password"]) < 6 && strlen($_POST["password"]) != 0){
  $errores["password"] = "el campo de password nesecita por lo menos 6 caracteres" . "</br>";
}
if(password_verify($_POST["verificarpassword"], $hash) == false){
    $errores["password"] = "el campo de verificar contrasena tiene que ser igual a la contrasena" . "</br>";
}
return $errores;
}

if(count(validarUsuario()) != 0) {
  header("Location: ../register/register.php");
return validarUsuario();
}

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

header("Location: ../home/index.php");
}

}
?>
