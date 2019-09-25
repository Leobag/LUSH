<?php

include("info_producto/info_destinos.php");

if($destinos["maldivas"]){
  $infotrip = $destinos["maldivas"];
 ?>


<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
    <link rel="stylesheet" href="../includes/general.css">
    <link rel="stylesheet" href="css/allstyles.css">
    <title>Viajá a las Maldivas</title>
  </head>

  <body>
    <?php include("../includes/header.php"); ?>
    <main>
      <section class="row">
        <article  id="allfather" class="container-fluid">
          <div class="row backgroundphoto w-100">
            <div id="centertext" class="text-center col-12">
              <h1 class="title">Las Maldivas</h1>
            </div>
          </div>
        </article>

        <article id="bodyDiv" class="container-fluid">
          <div class="row">
            <div class="col-6">
              <h2> Información sobre el viaje: </h2>



              <ul>

                <li>
                  <h6> Mejor epoca del año: </h6>
                   <?=$infotrip["bestseason"];?>
                </li>
                  </br>
                <li>
                  <h6> Tiempo ideal:</h6>
                  <?=$infotrip["tiempoideal"];?>
                </li>
                  </br>
                <li>
                <h6>  Donde queda?</h6>
                  <?=$infotrip["lugar"];?>
                </li>
                  </br>
                <li>
                  <h6>Descripción corto: </h6>
                  <?=$infotrip["infolugar"];?>
                </li>
                  </br>
              </ul>

            </div>
            <div class="col-6 rightside">
              <h4>Posición:</h4>
              <div class="mapouter"><div class="gmap_canvas"><iframe width="550" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=Constance%20Halaveli&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/nordvpn-coupon-code/">code vpn</a></div></div>
              

            </div>
          </div>
        </article>
      </section>
    </main>

    <?php include("../includes/footer.php"); ?>

  </body>
</html>
<?php }?>
