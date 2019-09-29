<?php

if($_POST){
$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
function validarNombre(){
  if(strlen($_POST["nombre"]) == 0){
    echo "el campo de Nombre esta vacio";
  }
}

function validarApellido(){
  if(strlen($_POST["apellido"]) == 0){
    echo "el campo de Apellido esta vacio";
  }
}

function validarEmail(){
  if(strlen($_POST["email"]) == 0){
    echo "el campo de email esta vacio";
  }
  elseif(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false){
    echo "el formato de email es incorrecto";
  }
}
function validarPassword(){
  if(strlen($hash) == 0){
    echo "el campo de password esta vacio";
  }
  if(strlen($hash) < 6){
    echo "el campo de password nesecita por lo menos 6 caracteres";
}
if(password_verify($_POST["verificarpassword"], $hash) == false){
  echo "el campo de verificar contrasena tiene que ser igual a la contrasena";
}}


}
?>
