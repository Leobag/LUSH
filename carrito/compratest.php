<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../includes/general1.css">
    <link rel="stylesheet" href="CSS/test.css">
    <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
    <title>LUSH - Carrito de compras</title>
  </head>
  <body>

    <?php include("../includes/header.php"); ?>

    <main>
      <section>
        <form class="" action="carrito.php" method="post">
          <img src="img/fuji.jpeg" alt="">
          <input type="text" name="product" value="Mount Fuji">
          <input type="text" name="quantity" value="1">
          <input type="text" name="price" value="$2000.00">
          <input type="submit" name="add_to_cart" class="btn btn-success" style="margin-top:5px" value="Add to Cart">
        </form>
      </section>
    </main>

    <?php include("../includes/footer.php"); ?>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
