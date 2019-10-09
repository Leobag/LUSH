<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LUSH - Contactános</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../includes/general1.css">
    <link rel="stylesheet" href="css/contacto.css">
   <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
  </head>
  <body>

    <?php include("../includes/header.php"); ?>

    <img src="img/avion-ventana2.jpg" alt="ventana" class="fotoavion">

    <h1 class="frase">NUESTRO VIAJE COMIENZA CON LAS <br> RELACIONES</h1>

    <h2 class="hablemos">Hablemos</h2>

    <hr>

    <h3>DEJA UN MENSAJE</h3>

    <h4>Recibimos todos los mensajes enviados a través de este <br> formulario. Hacemos todo lo posible para responder a la brevedad</h4>

    <form action="/my-handling-form-page" method="post">
        <div>
            <label class="nombre" for="name">Nombre:</label>
            <input type="text" id="name" size="50"/>
        </div>
        <div class="email">
            <label id="email" for="mail">E-mail:</label>
            <input type="email" id="mail" size="50"/>
        </div>
        <div class="mensaje">
            <label id="mensaje" for="msg">Mensaje:</label>
            <input type="mensaje" id="msj" size="50"/>
        </div>
    </form>

    <button type="button" class="btn btn-dark">Enviar</button>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.331313980557!2d-58.38386198423642!3d-34.62106686592425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccb28ea8781cb%3A0xb791570f7236c962!2sDigital%20House%20-%20Campus%20Center!5e0!3m2!1sen!2sar!4v1569956130212!5m2!1sen!2sar" width="1900" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

    <div class="direccion">
    <h5>Nuesta Direccion</h5>
    <p>1007 Swift Avenue<br>
      North Kansas City, MO 64116</p>
    </div>

  <?php include("../includes/footer.php"); ?>


  </body>
</html>
