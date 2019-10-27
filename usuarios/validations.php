<?php
if(isset($_POST["submit"])){

  $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $nombre = $_POST["nombre"];
  $apellido = $_POST["apellido"];
  $email = $_POST["email"];
  $password = $hash;


if(empty($nombre) || empty($apellido) || empty($email) || empty($password)){
  header("Location: ../register/register.php?register=vacio&nombre=$nombre&apellido=$apellido&email=$email");
exit();
}

    elseif(!preg_match("/^[a-zA-Z]*$/", $nombre) || !preg_match("/^[a-zA-Z]*$/", $apellido)){
  header("Location: ../register/register.php?register=char&nombre=$nombre&apellido=$apellido&email=$email");
  exit();
}

    elseif(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false){
      header("Location: ../register/register.php?register=error&nombre=$nombre&apellido=$apellido&email=$email");
      exit();
    }
    elseif(password_verify($_POST["verificarpassword"], $hash) == false){
      header("Location: ../register/register.php?register=verificar&nombre=$nombre&apellido=$apellido&email=$email");
      exit();
    }
    elseif (strlen($_POST["password"]) < 6) {
          header("Location: ../register/register.php?register=password&nombre=$nombre&apellido=$apellido&email=$email");
          exit();}
    elseif (!isset($_POST["checkfinal"])){
            header("Location: ../register/register.php?register=error&nombre=$nombre&apellido=$apellido&email=$email");
            exit();
    }




else{


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


  $usuarios = file_get_contents("usuarios.json");
  $usuariosArray = json_decode($usuarios, true);


$user_id = randomPassword();

foreach($usuariosArray as $array){
  if($array["email"] == $_POST["email"]){
    header("Location: register.php?register=existe&nombre=$nombre&apellido=$apellido&email=$email");
    exit();
  }
  if($array["userID"] == $user_id){
    $user_id = randomPassword();
    continue;
  }
}

    if(isset($_FILES["profilepic"])){
      $file = $_FILES["profilepic"];
        if($file["error"] === UPLOAD_ERR_OK){
        $filename = $file["name"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if($ext != "jpg" && $ext != "jpeg" && $ext != "png"){
          header("Location: ../register/register.php?register=archivo&nombre=$nombre&apellido=$apellido&email=$email");
          exit();
        }

        $temp = $_FILES["profilepic"]["tmp_name"];

        $position = dirname(__FILE__) . "\profilepics";

        $finalpos = $position ."/". $user_id . "." . $ext;

        move_uploaded_file($temp, $finalpos);
        }
    }


    $usuario = [
    "nombre" => $_POST["nombre"],
    "apellido" => $_POST["apellido"],
    "email" => $_POST["email"],
    "password" => $hash,
    "userId" => $user_id

  ];


$usuariosArray[] = $usuario;

$usuariosFinal = json_encode($usuariosArray);

file_put_contents("usuarios.json", $usuariosFinal);

header("Location: ../login/login.php?register=success");

}  }
?>
