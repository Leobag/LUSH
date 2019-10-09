<?php
if(isset($_POST["login"])){
 $json=file_get_contents("../register/usuarios.json");
 $usuarios=json_decode($json,true);
 $email=$_POST["email"];
 $password=$_POST["password"];
 $existe = null;

 foreach($usuarios as $usuario){
   if($usuario["email"] == $email){
     $existe = $usuario;
   } else{header("Location: login.php?login=error");}
 }

if(isset($existe)){
  if(password_verify($password, $existe["password"]) == true){
    if($_POST["recordar"]){
      $cookie_name = "autologin";
      $usercookie = [
        "nombre" => $existe["nombre"],
        "email" => $existe["email"],
        "password" => $existe["password"]
      ];
      $jsoncookie = json_encode($usercookie);

      setcookie($cookie_name,
      $jsoncookie,
      time() + (365 * 24 * 60 * 60),"/"
    );
    header("Location: ../home/index.php?login=success");
    }

    if(!$_POST["recordar"]){
    session_start();
    $_SESSION["nombre"] = $existe["nombre"];
    $_SESSION["apellido"] = $existe["apellido"];
    $_SESSION["email"] = $existe["email"];

    header("Location: ../home/index.php?login=success");
    }

 }
 else{
   header("Location: login.php?email=$email&login=pass_incorrect");
    }
}

}


 ?>
