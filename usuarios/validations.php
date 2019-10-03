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
    $errores["nombre"] = "<p>El campo de Nombre esta vacio </p>";

  }

  if(strlen($_POST["apellido"]) == 0){
    $errores["apellido"] = "<p> El campo de Apellido esta vacio </p>";
  }


  if(strlen($_POST["email"]) == 0){
    $errores["email"] = " <p> El campo de email esta vacio </p>" ;
  }
  if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false){
    $errores["email"] = "<p> El formato de email es incorrecto </p>";
  }

  if(strlen($_POST["password"]) == 0){
  $errores["password"] = "<p> El campo de password esta vacio</p>";
  }
  if(strlen($_POST["password"]) < 6 && strlen($_POST["password"]) != 0){
  $errores["password"] = "<p> El campo de password nesecita por lo menos 6 caracteres</p>";
}
if(password_verify($_POST["verificarpassword"], $hash) == false){
    $errores["password"] = "<p> El campo de verificar contrasena tiene que ser igual a la contrasena</p>";
}
return $errores;
}

if(count(validarUsuario()) != 0) {
  return validarUsuario();
  header("Location: ../register/register.php");
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
