
<?php
include_once('../SQL/connect.php');

if(isset($_POST["volver"])){
  header('Location: ABM.php');
  exit();
}
if(isset($_SESSION["salir"]) && $_SESSION["salir"] == 1){
  header("Location: ABM.php");
}

 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/general1.css">
    <link rel="stylesheet" href="css/editar1.css">
    <title>Editar producto - LUSH</title>
  </head>
  <body>
    <?php include_once('../includes/header.php');
    include_once('adminvalidation.php');

    if(isset($_GET["id"])){
      $_SESSION["id_editar"]=$_GET["id"];
    }
    elseif(isset($_SESSION["id_editar"])){

    }
    else{
      header('Location: ABM.php');
    }

    function slugify($string){
      return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
  }

    $_SESSION["salir"] = null;
    $id = $_SESSION["id_editar"];

    $query_product = $db->query("SELECT * FROM products WHERE id = '$id'");
    $product = $query_product->fetch(PDO::FETCH_ASSOC);

    $qphoto = $db->query("SELECT products.destination,images_product.id, images_product.name
      FROM products
      INNER JOIN images_product ON products.id = images_product.id_product
      WHERE products.id = '$id'");
      $photos = $qphoto->fetchAll(PDO::FETCH_ASSOC);


if(isset($_GET["borrar"])):
  $borrarid = $_GET["borrar"];

$qname = $db->query("SELECT name FROM images_product WHERE id = '$borrarid'");
$photoname = $qname->fetch(PDO::FETCH_ASSOC);
  unlink("../trips/img/" . $photoname);

$delete = $db->prepare("DELETE FROM images_product WHERE id = '$borrarid'");
$delete->execute();

unset($_GET["borrar"]);

endif;

if(isset($_POST["submit"])){
$destination = $_POST["destination"];
$description = $_POST["description"];
$price_float = $_POST["price"];
$stay_length = $_POST["stay"];
$stock = $_POST["stock"];


try {

  $update = $db->prepare("UPDATE products SET destination = :destination, description = :description, price = :price, stay_length = :stay_length, stock = :stock WHERE id = '$id'");

  $update->bindValue(':destination', $destination, PDO::PARAM_STR);
  $update->bindValue(':description', $description, PDO::PARAM_STR);
  $update->bindValue(':price', $price_float, PDO::PARAM_INT);
  $update->bindValue(':stay_length', $stay_length, PDO::PARAM_INT);
  $update->bindValue(':stock', $stock, PDO::PARAM_INT);
  $update->execute();

  unset($_SESSION["id_editar"]);

} catch (\Exception $e) {
  echo "<p>Hubo algun error, por favor intente mas tarde!</p>";
  exit;
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


} ?>
<main class="container pt-5">

<h1 class="pt-4">Editor de producto</h1>
<h3>En esta pagina podes cambias informacion y detalles de productos</h3>

</br>
<div class="row">
<div class="col-12 col-lg-10">


<form class="container-fluid" method="post" action="editar.php" enctype="multipart/form-data">


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

<?php
if(count($photos) != 0){
for ($i=0; $i < count($photos); $i++):

?>
<div class="row my-3 flex-column flex-lg-row flex-wrap">
  <div class="col-6 col-lg-3 row">
      <img class="formphoto col" src="../trips/img/<?=$photos[$i]["name"]?>" alt="<?=$photos[$i]["destination"] . $i+1?>">
  </div>
  <div class="form-group pt-lg-4 col-8 col-lg-6">
      <label for="photo<?=$i+1?>"></label>
      <input type="file" class="form-control" name="photo<?=$i+1?>" id="photo<?=$i+1?>" rows="1"></input>
      <input type="hidden" class="form-control" name="borrarfoto" value="<?=$photos[$i]["id"]?>"></input>
  </div>
  <div class="col-6 col-lg-3 pt-lg-5 pl-5">
    <a class="abtn" href="editar.php?borrar=<?=$photos[$i]["id"]?>" role="button">Borrar foto</a>
  </div>
</div>

<?php
endfor;
} else{
?>
<div class="form-group mb-4">
<label for="photos">Agregar fotos del destino</label>
<input type="file" multiple="multiple" class="form-control" name="photos[]" id="photos" value=""></input>
</div>
<?php
}
?>
<button type="submit" name="submit" class="btn btn-primary col-3">Submit</button>
<button type="submit" name="volver" class="btn btn-secondary col-3">Volver</button>
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
