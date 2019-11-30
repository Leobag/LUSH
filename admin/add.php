<?php
include_once('../SQL/connect.php');

if(isset($_POST['revert'])){
  header('Location: ABM.php');
  exit();
}

 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/general.css">
    <title>Agregar producto</title>
  </head>
  <body>
    <?php include_once('../includes/header.php');
      include_once('adminvalidation.php');


      if(isset($_POST["submit"])){
      $destination = $_POST["destination"];
      $description = $_POST["description"];
      $price_float = $_POST["price"];
      $stay_length = $_POST["stay"];
      $stock = $_POST["stock"];

      function slugify($string){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
    }

      try {
        $update = $db->prepare("INSERT INTO products(id, destination, description, price, stay_length, stock) VALUES (:id, :destination, :description, :price, :stay_length, :stock)");


        $update->bindValue(':id', null, PDO::PARAM_INT);
        $update->bindValue(':destination', "$destination", PDO::PARAM_STR);
        $update->bindValue(':description', "$description", PDO::PARAM_STR);
        $update->bindValue(':price', "$price_float", PDO::PARAM_INT);
        $update->bindValue(':stay_length', "$stay_length", PDO::PARAM_INT);
        $update->bindValue(':stock', "$stock", PDO::PARAM_INT);
        $update->execute();

      } catch (\Exception $e) {
        echo $e;
      /*  echo "<p>Hubo algun error! Por favor intente de nuevo.</p>"; */
        exit();
      }


          if(isset($_FILES["photos"])){

            $total = count($_FILES['photos']['name']);

            for ($i=0; $i < $total ; $i++):

            $file = $_FILES["photos"];

              if($file["error"][$i] === UPLOAD_ERR_OK){
              $filename = $file["name"][$i];
              $ext = pathinfo($filename, PATHINFO_EXTENSION);

              if($ext != "jpg" && $ext != "jpeg" && $ext != "png"){
                header("Location: ../register/register.php?register=archivo&nombre=$nombre&apellido=$apellido&email=$email");
                exit();
              }
              $profilepic = (slugify($destination) . ($i+1));

              $temp = $_FILES["photos"]["tmp_name"][$i];

              $position =  dirname(__FILE__, 2) . "/trips/img";

              $finalpos = $position ."/". $profilepic . "." . $ext;

              move_uploaded_file($temp, $finalpos);

              $sqlname = $profilepic .".". $ext;

              try {
                $query = $db->query("SELECT * FROM products WHERE destination = '$destination'");
                $product = $query->fetch(PDO::FETCH_ASSOC);

                $upphoto = $db->prepare("INSERT INTO images_product VALUES (:id, :name, :id_product)");

                $upphoto->bindValue(':id', null);
                $upphoto->bindValue(':name', $sqlname, PDO::PARAM_STR);
                $upphoto->bindValue(':id_product', $product["id"], PDO::PARAM_INT);
                $upphoto->execute();

              } catch (\Exception $e) {
                echo $e;
              }


              }
            endfor;
          }



      header('Location:ABM.php');
      }
      ?>

    <main class="container pt-4">


<h1 class="pt-5">Agregar producto</h1>
<h3>En esta pagina podes cambias agregar un producto nuevo al base de datos</h3>

</br>
<div class="row">
  <div class="col-8">


<form method="post" action="add.php" enctype="multipart/form-data">


  <div class="form-group">
    <label for="Destino">Destino</label>
    <input type="text" class="form-control" name="destination" id="Destino" value="" rows="1"></input>
  </div>
  <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <input type="text" class="form-control" name="description" id="descripcion" value="" rows="4"></input>
  </div>
  <div class="form-group">
    <label for="Precio">Precio</label>
    <input type="text" class="form-control" name="price" id="Precio" value="" rows="1"></input>
  </div>
  <div class="form-group">
    <label for="Duracion">Duracion en dias</label>
    <input type="text" class="form-control" name="stay" id="Duracion" value="" rows="1"></input>
  </div>
  <div class="form-group">
    <label for="Stock">Lugares vacantes</label>
    <input type="text" class="form-control" name="stock" id="Stock" value="" rows="1"></input>
  </div>
  <div class="form-group">
    <label for="photos">Fotos del destino</label>
    <input type="file" multiple="multiple" class="form-control" name="photos[]" id="photos" value=""></input>
  </div>
  <button type="submit" name="submit" class="btn btn-primary col-3">Submit</button>
  <button type="submit" name="revert" class="btn btn-secondary col-3">Volver</button>
</form>




</div>

</div>
</main>



<?php include_once('../includes/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
