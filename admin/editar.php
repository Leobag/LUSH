<?php
if(!isset($_SESSION)){
  session_start();
}
if(isset($_GET["id"])){
  $_SESSION["id_editar"]=$_GET["id"];
}
elseif(isset($_SESSION["id_editar"])){

}
else{
  header('Location: ABM.php');
}
$id = $_SESSION["id_editar"];


include_once('../SQL/connect.php');

$query_product = $db->query("SELECT * FROM products WHERE id = '$id'");
$product = $query_product->fetch(PDO::FETCH_ASSOC);

 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/general1.css">
    <title></title>
  </head>
  <body>
    <?php include_once('../includes/header.php');
    include_once('adminvalidation.php');
     ?>





    <main class="container">

<h1>Editor de producto</h1>
<h3>En esta pagina podes cambias informacion y detalles de productos</h3>

</br>
<div class="row">
  <div class="col-8">


<form method="post" action="editar.php">


  <div class="form-group">
    <label for="Destino">Destino</label>
    <input type="text" class="form-control" name="destination" id="Destino" value="<?=$product["destination"]?>" rows="1"></input>
  </div>
  <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <input type="text" class="form-control" name="description" id="descripcion" value="<?=$product["description"]?>" rows="4"></input>
  </div>
  <div class="form-group">
    <label for="Precio">Precio</label>
    <input type="text" class="form-control" name="price" id="Precio" value="<?=$product["price"]?>" rows="1"></input>
  </div>
  <div class="form-group">
    <label for="Duracion">Duracion en dias</label>
    <input type="text" class="form-control" name="stay" id="Duracion" value="<?=$product["stay_length"]?>" rows="1"></input>
  </div>
  <div class="form-group">
    <label for="Stock">Lugares vacantes</label>
    <input type="text" class="form-control" name="stock" id="Stock" value="<?=$product["stock"]?>" rows="1"></input>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php

if(isset($_POST["submit"])){
$destination = $_POST["destination"];
$description = $_POST["description"];
$price_float = $_POST["price"];
$stay_length = $_POST["stay"];
$stock = $_POST["stock"];

  /*if($price_float == int){
$price_str = strval($price_float);
}*/

$update = $db->prepare("UPDATE products SET destination = :destination, description = :description, price = :price, stay_length = :stay_length, stock = :stock WHERE id = '$id'");

$update->bindValue(':destination', $destination, PDO::PARAM_STR);
$update->bindValue(':description', $description, PDO::PARAM_STR);
$update->bindValue(':price', $price_float, PDO::PARAM_INT);
$update->bindValue(':stay_length', $stay_length, PDO::PARAM_INT);
$update->bindValue(':stock', $stock, PDO::PARAM_INT);
$update->execute();


unset($_SESSION["id_editar"]);
header('Location:ABM.php');
}

 ?>


</div>

</div>
</main>




<?php include_once('../includes/footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
