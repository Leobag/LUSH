
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
    <link rel="stylesheet" href="../includes/general.css">
    <link rel="stylesheet" href="css/allstyle.css">
    <title>LUSH - Register</title>
  </head>
  <body>
    <?php include("../includes/header.php"); ?>
    <section class="">
        <article class="container-fluid px-0"> <!-- Background photo -->

            <div class="row photobackground px-0">

                <div class="col-12 formcontain d-flex">
                  <form class="formAll" action="register.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="nombre">Nombre: </label>
                          <input type="text" class="form-control" name="nombre"id="name" aria-describedby="nameHelp" placeholder="Escribir Nombre" value="">
                      </div>
                      <div class="form-group">
                          <label for="apellido">Apellido: </label>
                          <input type="text" class="form-control" name="apellido" id="name" aria-describedby="nameHelp" placeholder="Escribir Apellido" value="">
                      </div>
                      <div class="form-group">
                          <label for="email">Email: </label>
                          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Escribir Email" value="">
                      </div>
                      <div class="form-group">
                          <label for="password">Password: </label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="Escribir Password" value="">
                      </div>
                      <div class="form-group">
                          <label for="verificarpassword">Verificar Password: </label>
                          <input type="password" name="verificarpassword" class="form-control" id="verificarpassword" placeholder="Repetir Password" value="">
                      </div>
                      <div class="form-group">
                          <label for="profilepic">Subir foto de perfil: </label>
                          <input type="file" class="form-control" id="profilepic" aria-describedby="nameHelp" value="">
                      </div>
                      <div class="form-group form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1" value="">
                          <label class="form-check-label" for="check" required>He leído los términos y condiciones</label>
                      </div>
                          <small id="idHelp" class="form-text text-muted">Lush Luxury Travel no comparte informacion personal con terceros. </br></small>
                          </br>
                          <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </form>
                </div>
            </div>
        </article>
    </section>
    <?php include("../includes/footer.php"); ?>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
