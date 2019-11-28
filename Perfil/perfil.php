<?php

include("../sql/connect.php");

 ?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
    <link rel="stylesheet" href="../includes/general1.css">
    <link rel="stylesheet" href="CSS/estiloperfil.css">
    <title>Perfil de Usuario - LUSH</title>
  </head>
  <body>
    <?php include_once("../includes/header.php");



    $query = $db->prepare("SELECT photo_name FROM users WHERE (email = :email)");
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);


    $qdir = $db->query("SELECT *
       FROM direccion
       INNER JOIN users
       ON users.id = direccion.user_id
       WHERE users.email = '$email'");
     $direccion = $qdir->fetch(PDO::FETCH_ASSOC);

     $qcard = $db->query("SELECT *
        FROM card_details
        INNER JOIN users
        ON users.id = card_details.user_id
        WHERE users.email = '$email'");
      $card = $qcard->fetch(PDO::FETCH_ASSOC);

      if($card){
        $card_number = $card["card_number"];
        $bank = $card["bank"];
        $owner = $card["card_nameowner"];
      } else{
        $card_number = "No definida";
        $bank = "No definida";
        $owner = "No definida";
      }


     if($direccion){
       $street = $direccion["street"];
       $apartment = $direccion["apartment"];
       $postcode = $direccion["postal_code"];
     } else{
       $street = "No definida";
       $apartment = "No definida";
       $postcode = "No definida";
     }

    include_once('subirFoto.php');
    include_once("validarUsuario.php");
    include_once('cambiarDatos.php');

    function photoname($user){
      if(!$user["photo_name"]){
        echo "empty.png";
      }
      else{
        echo $user["photo_name"];
      }
    }   ?>
    <main id="main" class="container-fluid">
      <div class="page-title row pt-5">
        <div class="title col-12 text-center pt-5 mb-4">
          <h1>Mi Cuenta</h1>
          <div class="feature_divider">
          </div>
        </div>
      </div>
    </div>
    <form  id="form" action="perfil.php" method="post" class="mb-0 d-flex" enctype="multipart/form-data">


    <section id="section-left"class="row d-flex">
      <div id= "profile-pic" class="col-12 col-md-4 col-lg-4 text-center m-0">
        <img class="align-self-center col-10" src="../usuarios/profilepics/<?=photoname($user)?>" alt="Profile">

        <div id="changephoto" class="flex-md-column col-12">
            <label for="profpic" class="mt-3" for="profpic">Click aqui para cambiar foto</label>
            <input style="display:none"type="file" name="profpic" id="profpic">
            <br>
            <button class="btn btn-primary mb-3" type="submit" name="submitprofile">SUBIR FOTO</button>
        </div>

      </div>
      <div class="section-right col-12 col-md-6 col-md-6 rounded pr-5">
        <h2>Datos personales</h2>


          <div class="row border rounded">
            <div class="field col-sm-12 col-m-5 col-lg-5 border-top pt-2">
              <p>Nombre</p>
            </div>
            <div class="value col-sm-12 col-m-7 col-lg-7 border-top pt-2">
                <p><?=$nombre?></p>
            </div>
            <div class="field col-sm-12 col-m-5 col-lg-5 border-top pt-2">
              <p>Apellido</p>
            </div>
            <div class="value col-sm-12 col-m-7 col-lg-7 border-top pt-2">
                <p><?=$apellido?></p>
            </div>
            <div class="field col-sm-12 col-m-5 col-lg-5 border-top pt-2">
              <p>email</p>
            </div>
            <div class="value col-sm-12 col-m-7 col-lg-7 border-top pt-2">
              <p><?=$email?></p>
            </div>
          </div>


          <div class="section-right mt-3">
            <h2>Direccion</h2>
              <div class="row border rounded">




                     <div class="field col-sm-12 col-m-5 col-lg-5 pt-2">
                       <p>Calle</p>
                     </div>
                     <div class="form-group value col-sm-12 col-m-7 col-lg-7 pt-2">
                         <input type="text" class="form-control transparent" name="calle" id="calle" value="<?=$street?>" rows="1"></input>
                     </div>

                    <div class="field col-sm-12 col-m-5 col-lg-5 border-top pt-2">
                      <p>Piso/Depto</p>
                    </div>
                    <div class="form-group value col-sm-12 col-m-7 col-lg-7 pt-2">
                        <input type="text" class="form-control transparent" name="apartment" id="apartment" value="<?=$apartment?>" rows="1"></input>
                    </div>
                    <div class="field col-sm-12 col-m-5 col-lg-5 border-top pt-2">
                      <p>Codigo Postal</p>
                    </div>
                    <div class="form-group value col-sm-12 col-m-7 col-lg-7 pt-2">
                        <input type="text" class="form-control transparent" name="postcode" id="postcode" value="<?=$postcode?>" rows="1"></input>
                    </div>

              </div>
            </div>


          <div class="section-right mt-3">
            <h2>Tarjetas</h2>

              <div class="row border rounded mb-4">
                <div class="field col-sm-12 col-m-5 col-lg-5 pt-2">
                  <p>Banco</p>
                </div>
                <div class="form-group value col-sm-12 col-m-7 col-lg-7 pt-2">
                    <input type="text" class="form-control transparent" name="bank" id="bank" value="<?=$bank?>" rows="1"></input>
                </div>
                <div class="field col-sm-12 col-m-5 col-lg-5 border-top pt-2">
                  <p>Nombre Titular</p>
                </div>
                <div class="form-group value col-sm-12 col-m-7 col-lg-7 pt-2">
                    <input type="text" class="form-control transparent" name="owner" id="owner" value="<?=$owner?>" rows="1"></input>
                </div>
                <div class="field col-sm-12 col-m-5 col-lg-5 border-top pt-2">
                  <p>Numero de tarjeta</p>
                </div>
                <div class="form-group value col-sm-12 col-m-7 col-lg-7 pt-2">
                    <input type="text" class="form-control transparent" name="card_number" id="card_number" value="<?=$card_number?>" rows="1"></input>
                </div>
              </div>
              <button type="submit" name="submit-datos" class="btn btn-primary mb-4">Actualizar datos</button>
          </div>


        </div>
      </section>
      </form>
    </main>







    <?php include("../includes/footer.php"); ?>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
