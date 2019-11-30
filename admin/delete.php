<?php
  include_once('../SQL/connect.php');

  if(isset($_POST['revert'])){
    header('Location: ABM.php');
    exit();
  }
 ?>


<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../includes/general1.css">
    <link rel="stylesheet" href="css/ABM.css">
    <title>ADMIN</title>
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


if(isset($_POST['confirm'])){
  $id = $_SESSION["id_editar"];
try {
  $local = $db->query("SELECT name FROM images_product WHERE id_product = $id");
  $localphotos = $local->fetchAll(PDO::FETCH_ASSOC);

} catch (\Exception $e) {
  echo "Hubo algun error!";
}


foreach ($localphotos as $localphoto):
$photoname = $localphoto["name"];

unlink("../trips/img/" . $photoname);

endforeach;


try {
  $delphot = $db->prepare("DELETE FROM images_product WHERE id_product = $id");
  $delete1 = $delphot->execute();
  $q = $db->prepare("DELETE FROM products WHERE id='$id'");
  $delete2 = $q->execute();

} catch (\Exception $e) {
  echo "Hubo algun error!";
}



  header('Location: ABM.php');

}



  ?>
<main id="mainDel" class="container pt-5">
  <div class="row d-flex pt-5">
    <div class="col-8 justify-content-center">
      <h2 id="maintext">Estas seguro que quisieras borrar el producto del base de datos?</h2>
      <form method="post" action="delete.php" class="justify-content-between">
        <button type="submit" name="confirm" id="yes" class="btn btn-primary col-3">Si</button>
        <button type="submit" name="revert" id="no" class="btn btn-secondary col-3">No</button>
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
