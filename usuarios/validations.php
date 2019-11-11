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


  include_once('../SQL/connect.php');


$query = $db->query("SELECT * FROM users WHERE (email='$email')");

$user = $query->fetch(PDO::FETCH_ASSOC);

 /*var_dump($user); exit;*/

if($user != false){
    header("Location: register.php?register=existe&nombre=$nombre&apellido=$apellido&email=$email");
    exit();
  }

  $profilepic = null;

    if(isset($_FILES["profilepic"])){
      $file = $_FILES["profilepic"];
        if($file["error"] === UPLOAD_ERR_OK){
        $filename = $file["name"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if($ext != "jpg" && $ext != "jpeg" && $ext != "png"){
          header("Location: ../register/register.php?register=archivo&nombre=$nombre&apellido=$apellido&email=$email");
          exit();
        }
        $profilepic = randomPassword();

        $temp = $_FILES["profilepic"]["tmp_name"];

        $position = dirname(__FILE__) . "/profilepics";

        $finalpos = $position ."/". $profilepic . "." . $ext;

        move_uploaded_file($temp, $finalpos);
        }
    }


$register = $db->prepare("INSERT INTO users VALUES (:id, :name, :surname, :email, :pass, :photo_name)");

    $register->bindValue(':id', null);
    $register->bindValue(':name', $nombre, PDO::PARAM_STR);
    $register->bindValue(':surname', $apellido, PDO::PARAM_STR);
    $register->bindValue(':email', $email, PDO::PARAM_STR);
    $register->bindValue(':pass', $hash, PDO::PARAM_STR);
    $register->bindValue(':photo_name', $profilepic);

    $register->execute();




header("Location: ../login/login.php?register=success");

}  }
?>
