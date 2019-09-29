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
    <link rel="stylesheet" href="../includes/general1.css">
    <link rel="stylesheet" href="css/allstyle.css">
    <title>Viajá a Maldivas</title>
  </head>

  <body>
    <?php include("../includes/header.php"); ?>
    <main>
      <section class="mx-1 row">
        <article  id="allfather" class="container-fluid">
          <div class="row backgroundphoto w-100">
            <div id="centertext" class="text-center col-12">
              <h1 class="title">Maldivas</h1>
            </div>
          </div>
        </article>



        <article id="buttons" class="container my-2">
              <div id="buttongrp"class="row">
                <button class="btn btn-primary col-3 in" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="#collapse1">
                  GENERAL
                </button>

                <button class="btn btn-primary col-3" type="button"  data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="#collapse2">
                  MAS FOTOS
                </button>

                <button class="btn btn-primary col-3" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="#collapse3">
                  SOBRE EL VIAJE
                </button>

                <button class="btn btn-primary col-3" type="button"  data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="#collapse4">
                  RESERVAR
                </button>
              </div>

          </article>


        <article id="aboutDiv" class="collapse container-fluid p-0">
          <div id="collapse1" class="collapse show row reverse" data-parent="#buttongrp">

            <div class="col-12 col-md-6 rightside mt-1 py-0">
              <h4>Posición:</h4>
              <div class="mapouter">
                <div class="gmap_canvas">
                  <iframe class="rounded" height="400" width="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=Constance%20Halaveli&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
              </div>
            </div>

            <div class="col-md-5 paragraph">
              <h2> Información general: </h2>
              <ul class="px-1">

                <li>
                  <h6>Descripción corto: </h6>
                  <?=$infotrip["infolugar"];?>
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
                  <h6> Mejor epoca del año: </h6>
                   <?=$infotrip["bestseason"];?>
                </li>
              </br>
              </ul>

            </div>

          </div>
        </article>

        <article id="photoDiv" class="container-fluid mb-2">
          <div id="collapse2" class="row collapse" data-parent="#buttongrp">

            <?php for($i=0; $i < count($infotrip["photos"]); $i++):
              ?>
            <div class="col-6 col-md-3">
              <img class="rounded img-fluid img-thumbnail mx-auto" src="<?=$infotrip["photos"][$i]?>" alt="mal<?=$i+1?>">
            </div>
          <?php endfor; ?>
          </div>
        </article>

        <article id="incluidoDiv" class="container-fluid">
          <div id="collapse3" class="row collapse" data-parent="#buttongrp">
            <div class="col-md-1">
              <span></span>
            </div>
            <div class="bar2headline col-12 col-md-7">
                <h2 class="mb-1">Viajar con nosotros</h2>
                <p><?=$infotrip["descripcioncorto"]?></p>

                <h3>Personalizacion posible:</h3>
                <ul class="list-style pl-1">
                <?php for($i=0; $i < count($infotrip["Personalizacion"]); $i++){
                  $trip = $infotrip["Personalizacion"];
                  ?>
                  <li>
                    <i class="fas fa-plane"></i>
                    <?= $trip[$i]; ?>
                  </li>
                <?php } ?>
                </ul>

            </div>
              <div class="bar2headline col-12 col-md-3">
                <h3>Incluido en el viaje:</h3>
                <ul class="list-style pl-1">

                  <?php for($i=0; $i < count($infotrip["incluido"]); $i++){
                    $trip = $infotrip["incluido"];

                    ?>
                    <li>
                    <i class="fas fa-plane"></i>
                      <?= $trip[$i]; ?>
                    </li>
                  <?php } ?>
                </ul>
              </br>

                  <h3>Si viajas por jet privado el viaje incluye: </h3>

                  <ul class="list-style pl-1">

                    <?php for($i=0; $i < count($infotrip["jetprivado"]); $i++){
                      $trip = $infotrip["jetprivado"];

                      ?>
                      <li>
                      <i class="fas fa-plane"></i>
                        <?= $trip[$i]; ?>
                      </li>
                    <?php } ?>
                  </ul>
            </div>

          </div>
        </article>

        <article id="reservarDiv" class="container-fluid">
            <div id="collapse4" class="row collapse" data-parent="#buttongrp">
              <div class="col-md-1">
                <span></span> <!-- Margin left -->
              </div>
              <div class="col-6 mt-1">
                <h2>Reservar:</h2>
                <p><?=$infotrip["comoreservar"]?></p>
                  </br>

                  <form class="" action="maldivas.php" method="post">

                      <div class="form-group">
                        <label for="ControlSelect1">Cuantas personas son?</label>
                        <select class="form-control" id="ControlSelect1">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="ControlSelect2">Por cuantos dias viajan?</label>
                        <select class="form-control" id="ControlSelect2">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="ControlTextarea1">Escribí un poco de Ustedes. </br> Quisieramos saber esto para poder hacerles un viaje según sus intereses. </label>
                        <textarea class="form-control" id="ControlTextarea1" rows="5"></textarea>
                      </div>
                      <input class="btn btn-primary" type="submit" value="Submit">
                  </form>
              </div>
            </div>

        </article>

      </section>
    </main>

    <?php include("../includes/footer.php"); ?>

<?php } ?>
  </body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
