<!DOCTYPE html>
<?php


include("../SQL/connect.php");

$query = $db->prepare("SELECT * from products where id=21");
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);
$destination = $result["destination"];
$description = $result["description"];
$price = $result["price"];

if(isset($_SESSION)){
$_SESSION["cart"] = [
  "destination" => $destination,
  "price" => $price,
  "description" => $description
];
}
?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LUSH - Detalle de producto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../includes/general.css">
    <link rel="stylesheet" href="css/producto.css">
   <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
  </head>
  <body>
  <?php include("../includes/header.php");?>
    <main id="main" class="container-fluid pt-5">
      <section class="container-fluid row pt-5">
        <div class="photos col-12 col-md-12 col-lg-6">
          <div class="photo-big mb-3 p-3">
            <img src="img/mal.jpg" alt="">
          </div>
          <div class="photo-small mb-3 col-12">
            <div class="row mb-3">
              <div class="col-4">
                <img src="img/mal.jpg" alt="">
              </div>
              <div class="col-4">
                <img src="img/malfondo.jpg" alt="">
              </div>
              <div class="col-4">
                <img src="img/mal.jpg" alt="">
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <img src="img/mal.jpg" alt="">
              </div>
              <div class="col-4">
                <img src="img/malfondo.jpg" alt="">
              </div>
              <div class="col-4">
                <img src="img/mal.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="description col-12 col-md-12 col-lg-6">
          <form class="" action="../carrito/carrito.php" method="post">
          <div class="row">
            <div class="col-12 text-center">
              <h1><?=$destination?> </h1>
              <div class="feature_divider">
              </div>
            </div>
            <div class="col-12 p-3">
              <div class="row description_details p-3">
                <div class="col-4">
                  <h2>Highlights</h2>
                </div>
                <div class="col-8">
                  <ul>
                    <li>This</li>
                    <li>That</li>
                    <li>This</li>
                    <li>That</li>
                    <li>This</li>
                  </ul>
                </div>
              </div>
              <div class="row description_details p-3">
                <div class="col-4">
                  <h2>Full Description</h2>
                </div>
                <div class="col-8 pl-5">
                  <p><?=$description?> </p>
                </div>
              </div>
              <div class="row description_details p-3">
                <div class="col-4">
                  <h2>Includes</h2>
                </div>
                <div class="col-8">
                  <ul>
                    <li>This</li>
                    <li>That</li>
                    <li>This</li>
                    <li>That</li>
                    <li>This</li>
                  </ul>
                </div>
              </div>
              <div class="row price-submit">
                <div class="col-5 p-3">
                  <button class="btn btn-primary" type="submit" name="button">agregar al carrito</button>
                </div>
                <div class="p-3 col-7">
                  <h2>precio final: <?=$_SESSION["cart"]["price"]?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>
      </section>
    </main>


<?php include("../includes/footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
