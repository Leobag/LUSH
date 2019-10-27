<?php
include_once("calendario.php");


if ($_GET["adults"] == null && $_GET["children"] == null){
  $_GET['adults'] ? $_GET['adults'] : 2;
  $_GET['children'] ? $_GET['children'] : 0;
}
 ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../includes/general1.css">
    <link rel="stylesheet" href="css/cssprod.css">

    <title>Descubrí Maldivas - LUSH</title>
  </head>
  <body>
    <?php include("../includes/header.php"); ?>

    <div id="photobackground" class="display-sm-none"> <!-- Background photo top -->
      <img src="img/mal.jpg" alt="bckgrnd">
    </div>
    <main id="divTodo" class="container-fluid">


      <section id="left" class="row"> <!-- main div left  -->
        <article id="collapsemain" class="col-12 col-md-8"> <!-- Select guests/CHECKIN/OUT/SEARCH -->

            <a class="btn" data-toggle="collapse" href="#collapseLeft" role="button" aria-expanded="false" aria-controls="collapseLeft">
              Link with href
            </a>
          <div class="collapse" id="collapseLeft">
            <div class="card card-body"> <!-- Div collapse izquierda  -->
              <div id="Calendar" class="row "> <!-- Div Calendar-->
                <div class="CalendarTOP col-12">
                <p>Por favor elija la fecha del check-in</p>
                <p>Precios mostrados en USD </p>
                </div>
                <div class="calendarBOTTOM col-12">
                  <div class="calendar-main">


                   <?php

                   if(isset($_GET['month']) && isset($_GET['year'])){
                   $month = (int) ($_GET['month'] ? $_GET['month'] : date('m'));
                   $year = (int)  ($_GET['year'] ? $_GET['year'] : date('Y'));
                 } else{
                   $currentDate = getdate();
                   $month = $currentDate['mon'];
                   $year = $currentDate['year'];
                 }
                  echo build_calendar($month, $year);

                  $value = "x";


                   ?>
                   </div>
                   <div class="calendar-family">
                     <div class="calendar-family-adults d-flex">
                       <div class="eligir-cantidad-gente">
                             <div class="betweenbtn">
                               <button class="btn-left" type="button" class="btn btn-primary">  </button>

                                   <label class="labelAdults" for="adults">
                                     <input id="adults" name="adults"  placeholder="" value="2">
                                   </label>
                               <button class="btn-right" type="button" class="btn btn-primary"></button>

                             </div>
                       </div>
                     </div>
                     <div class="calendar-family-children">

                     </div>

                   </div>
                </div>
              </div>
            </div>
          </div>
        </article>

        <article class=""> <!-- main section (SELECT ROOMS/ADDONS/DETAILS/CONFIRM)  -->

        </article>

        <article class=""> <!-- EXTRAS (sort by: villas, recommended etc.) -->

        </article>
      </section>
      <panel id="right" class="row  d-sm-none col-md-4"> <!-- main div right -->
        <article class=""> <!-- Static sell window  -->

        </article>
      </panel>
    </main>

    <!-- Footer -->
    <?php include("../includes/footer.php"); ?>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
