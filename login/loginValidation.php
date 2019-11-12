<?php
if(isset($_POST["login"])){

include_once('../SQL/connect.php');

$email=$_POST["email"];
$password=$_POST["password"];

$query = $db->prepare("SELECT * FROM users WHERE (email = :email)");
$query->bindValue(':email', $email, PDO::PARAM_STR);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);


if($user['email'] == $email){
  if(password_verify($password, $user["pass"]) == true){
    if($_POST["recordar"]){
      $cookie_name = "autologin";
      $usercookie = [
        "nombre" => $user["name"],
        "email" => $user["surname"],
        "password" => $user["pass"],
        "isadmin" => $user["isadmin"]
      ];
      $jsoncookie = json_encode($usercookie);

      setcookie($cookie_name,
      $jsoncookie,
      time() + (365 * 24 * 60 * 60),"/"
    );
    header("Location: ../home/index.php?login=success");

}

    else{
    session_start();
    $_SESSION["user"] = [
      "nombre" => $user["name"],
      "apellido" => $user["surname"],
      "email" => $user["email"],
      "isadmin" => $user["isadmin"]
    ];

    header("Location: ../home/index.php?login=success");
    }

}

 else{
   header("Location: login.php?email=$email&login=pass_incorrect");
    }

}
else{
  header("Location: login.php?login=error");
}
}


 ?>
