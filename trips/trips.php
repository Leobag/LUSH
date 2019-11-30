
<?php include("includes.php");

include_once('../SQL/connect.php');

$query_all = $db->query("SELECT * FROM images_product
INNER JOIN products ON products.id = images_product.id_product
");
$images = $query_all->fetchAll(PDO::FETCH_ASSOC);

$q = $db->query("SELECT * FROM products WHERE ")

var_dump($images); exit();

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../includes/general.css">
    <link rel="stylesheet" href="css/trip.css">
    <title>LUSH - Ofertas</title>
  </head>
  <body>
    <?php include("../includes/header.php"); ?>

      <div class="container-fluid backgroundphoto pb-3"> <!-- Foto de fondo arriba-->
        <div class="row photodad">
            <div id="centertext" class="text-center col-12">
              <h1 class="title">NUESTROS VIAJES</h1>
              <p class="undertitle">Cada viaje necesita un primer paso</p>
            </div>
        </div>
      </div>
    <main>
      <div class="container-fluid contphot pt-5">

      <section class="dad d-flex">

        <div class="row embodiment w-100">

          <?php foreach($trips as $number => $trip): ?>
          <div class="col-12 col-md-5 carouselparent">

        <div id="carouselhead<?=$number?>" class="carousel slide w-100" data-interval="0" data-ride="carousel"> <!-- First slideshow -->


              <ol class="carousel-indicators">
                <?php for ($i=0; $i <count($trip["image"]); $i++):
                $active = "";

                ?>

                <li data-target="#carouselhead<?=$number?>" data-slide-to="<?=$i?>" class="<?php if($i<1){$active="active";}  echo $active; ?>"></li>

              <?php  endfor; ?>
              </ol>
              <div class="carousel-inner">

                <?php for ($i=0; $i < count($trip["image"]); $i++):
                    $active="";

                      ?>

                    <div class="carousel-item <?php if($i<1){$active="active";}  echo $active; ?>">
                      <img class="img-thumbnail rounded d-block innerphoto" src="<?=$trip["image"][$i]?>" alt="Maldives<?=$i+1?>">
                    </div>

                  <?php  endfor; ?>

              </div>

                  <a class="carousel-control-prev" href="#carouselhead<?=$number?>" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselhead<?=$number?>" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                  </a>
                </div>

                <div class="col-12 bottomtext py-3">

                  <h2 class="photoheader"><?=$trip["destination"]?></h2>
                    <p class=""> <?=$trip["description"]?></p>
                    <a href="<?=$trip["url"]?>"> VER MÁS </a>

                </div>
            </div>
          <?php endforeach; ?>




            </div>


      </section>

      </div>
    </main>

    <?php include("../includes/footer.php"); ?>
  </body>
</html>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
