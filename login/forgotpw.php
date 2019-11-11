<?php
include("loginValidation.php");


if(isset($_POST["forgotpw"])){

  if(filter_var($_POST["email_fp"], FILTER_VALIDATE_EMAIL) == true){

    include_once('../SQL/connect.php');

    $email = $_POST["email_fp"];

    $query = $db->query("SELECT * FROM users WHERE (email = '$email')");
    $user = $query->fetch(PDO::FETCH_ASSOC);


    function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = [];
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

    $passtemp = randomPassword();
    $subject = "Resetear email";
    $body = "Hola Pato! Aca te mandamos el codigo para poder resetear tu correo \r\n \r\n $passtemp \r\n Espero que tenga un buen día, \r\n LUSH";

    if($user != false) {
      if($user["email"] == $_POST["email_fp"]){

        $changepw = $db->prepare("UPDATE users SET pass=:pass WHERE email='$email'");
        $changepw->bindValue(':pass', $passtemp, PDO::PARAM_STR);
        $changepw->execute();



        mail($email, $subject, $body);

        header('../home/index.php');

      } else{header("Location: forgotpw.php?email=false");}
  } else{header("Location: forgotpw.php?email=false");}






  } else{header("Location: forgotpw.php?email=false");}
}

 ?>


<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../includes/general1.css">
    <link rel="stylesheet" href="CSS/pw.css">
    <title>LUSH - Contraseña olvidado</title>
  </head>
  <body>
    <?php include("../includes/header.php"); ?>
    <main id="main" class="container-fluid">
      <section id="preguntas" class="row">
        <div class="col-12">
          <h1 class="mainheader">Has olvidado tu contraseña?</h1>
          <h3 class="mainsubheader">Entrá tu email acá, vas a recibir un codigo de confirmación a tu correo.</h3>
           <form class="" action="forgotpw.php" method="post">

            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" name="email_fp" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Escribir email aca: ">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <button type="submit" name="forgotpw" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </section>
    </main>
    <?php include("../includes/footer.php"); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
