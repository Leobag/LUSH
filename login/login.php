<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../includes/general1.css">
    <link rel="stylesheet" href="CSS/login.css">
    <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
    <title>LUSH - Log in</title>
  </head>
  <body>
    <?php include("../includes/header.php"); ?>

    <div class="foto container-fluid row pl-5 pt-5">
      <div class="col-8 col-md-5 col-lg-4 offset-1 pt-5">
        <form>
          <div class="form pt-5">
            <label for="email">e-mail</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingrese su e-mail" required>
            <small id="emailHelp" class="form-text text-muted">Lush Luxury Travel no comparte informacion personal con terceros.</small>
          </div>
          <div class="form pt-3">
            <label for="exampleInputPassword1">Contrasena</label>
            <input type="password" class="form-control" id="pass" placeholder="Ingrese su contrasena" required>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
      </div>
    </div>

    <?php include("../includes/footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
