<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LUSH - Contactános</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../includes/general.css">
    <link rel="stylesheet" href="css/contacto.css">
   <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
  </head>
  <body>

    <?php include("../includes/header.php"); ?>

   <h1>Contacto</h1>
   <p>Complete el siguiente formulario con sus datos y a la brevedad será contactado.</p>

   <form>
    <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre">
        <small id="emailHelp" class="form-text text-muted"></small>
     </div>
     <div class="form-group">
         <label for="exampleInputEmail1">Apellido</label>
         <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apellido">
         <small id="emailHelp" class="form-text text-muted"></small>
      </div>
     <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresar Email">
      <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
    </div>
    <div class="form-group">
     <label for="exampleInputEmail1">Telefono</label>
     <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresar Telefono">
     <small id="emailHelp" class="form-text text-muted"></small>
   </div>
   <div class="form-group">
     <label for="exampleFormControlTextarea1">Consulta</label>
     <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
   </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
  </form>

  <?php include("../includes/footer.php"); ?>


  </body>
</html>
