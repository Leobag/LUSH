<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
   <link rel="stylesheet" href="../includes/general.css">
   <link rel="stylesheet" href="css/Perfil.css">
   <title>LUSH - Tu Perfil</title>
  </head>
  <body class="body">

    <?php include("../includes/header.php"); ?>

<img src="fondo3.jpg" alt="imagenfondo">
<img src="logoblanco.png" alt="logo" class= "logo" width="200">
<section class="falsoheader">
  <img src="Profile-Icon.png" alt="Foto" width="200" class= "icono">
   <img src="circuloperfil.png" alt="circulo" class="circulofondo" width="200">
   <h1>Nombre y Apellido</h1>
    <div class="separador"></div>
    <nav>
      <ul class= "menu">
        <li class="nav"><a style="text-decoration:none" href="Perfil.html">Informacion</a></li>
        <li><a style="text-decoration:none" href="Reservas.html">Reservas</a></li>
        <li><a style="text-decoration:none" href="../PreguntasFrecuentes/PreguntasFrecuentes.html">Preguntas Frecuenes (FAQs)</a></li>
      </ul>
    </nav>
</section>

<section class="informacion">
 <h3>Datos Personales</h3>
  <div class="separador2"></div>
   <ul class="ficha">
     <li>Nombre y Apellido:</li>
     <li>Fecha de Nacimiento:</li>
     <li>Genero:</li>
     <li>Nacionalidad:</li>
     <li>DNI:</li>
     <li>Pasaporte:</li>
   </ul>
</section>

<section class="Contacto">
  <h4>Email Principal</h4>
   <div class="separador3"></div>
    <p class="textoEmail">ejemplo@gmail.com</p>
</section>

<section class="Contacto">
  <h4>Telefonos de Contacto</h4>
   <div class="separador3"></div>
    <p class="textoEmail">1223455678</p>
</section>

<section class="Contraseña">
 <h3>Contraseña</h3>
  <div class="separador2"></div>
  <p class="textopass">*******************</p>
</section>

  <?php include("../includes/footer.php"); ?>

  </body>
</html>
