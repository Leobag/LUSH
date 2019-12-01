<?php
include("../SQL/connect.php");

 ?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../includes/general.css">
    <link rel="stylesheet" href="CSS/carrito.css">
    <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
    <title>LUSH - Carrito de compras</title>
  </head>
  <body>

    <?php include("../includes/header.php");

  /*  $query = $db->prepare("SELECT * from products");
    $query->execute();
    $products = $query->fetchAll(PDO::FETCH_ASSOC);


    $query = $db->prepare("SELECT * from images_product");
    $query->execute();
    $images = $query->fetchAll(PDO::FETCH_ASSOC); */




    if(isset($_SESSION["cart"])){

          /*INNER JOIN images_product ON products.id = images_product.id_product */
    ?>

    <main id="main" class="container-fluid">
      <div class="row">
        <div class="col-12 text-center mt-5 pt-5">
          <h1>mi carrito</h1>
          </div>
          <div class="feature_divider">
          </div>
        </div>
        <div class="row">
          <div class="products col-12 col-m-6 col-lg-6">
            <h2>productos</h2>



            <?php
            for ($i=0; $i < count($_SESSION["cart"]); $i++) {
            $product_id = $_SESSION["cart"][$i];

            $query = $db->query("SELECT *
              FROM products
              WHERE id = '$product_id'");
            $products[] = $query->fetch(PDO::FETCH_ASSOC);


          }

              foreach ($products as $product){

                $photid = $product["id"];
                $qphoto = $db->query("SELECT *
                  FROM images_product
                  WHERE id_product = '$photid'");

                $photos = $qphoto->fetch(PDO::FETCH_ASSOC);


              ?>

            <div class="detalle mt-3">
                <img src="../trips/img/<?=$photos["name"]?>" alt="<?=$product["destination"]?>">
                <form class="" action="carrito.php" method="post">
                  <ul>
                    <li class="product-name mb-2"><?=$product["destination"]?></li>
                    <li class="description">Precio:$<?=$product["price"]?></li>
                    <li class="description">Cantidad: 1</li>
                    <button class="btn btn-primary" type="submit" name="empty_cart">vaciar carrito</button>
                    </ul>
                </form>
            </div>
          <?php } ?>
          </div>
            <div class="total col-12 col-m-6 col-lg-6">
              <h2>subtotal</h2>
              <p>$<?=$product["price"]?></p>
              <button class="btn btn-primary" type="button" name="button">Confirmar Compra</button>
            </div>
              <div class="vacio">
                <?php
              }else{?>
                  <h1>Su carrito esta vacio</h1>
              <?php }
                ?>
              </div>
        </div>
      </main>

    <?php include("../includes/footer.php"); ?>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    </html>
