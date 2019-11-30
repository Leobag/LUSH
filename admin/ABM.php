<?php

include_once('../SQL/connect.php');

$query_product = $db->query("SELECT * FROM products WHERE (destination != 'null')");
$products = $query_product->fetchAll(PDO::FETCH_ASSOC);

 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/f6dd545c25.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../includes/general.css">
    <link rel="stylesheet" href="css/ABM.css">
    <title>ADMIN</title>
</head>

<body>
  <?php include_once('../includes/header.php');

  include_once('adminvalidation.php');

  ?>

    <main id="main" class="container-fluid">
          <div class="row pt-5">
            <div class="col-12 pt-5">
              <table style="width:100%" border="1">

                <tr>
                   <th>ID</th>
                   <th>Destination</th>
                   <th>Description</th>
                   <th>Price</th>
                   <th>Stay Length</th>
                   <th>Stock</th>
                   <th></th>
                  <th> </th>
                </tr>

                <?php
                foreach ($products as $id => $producto) :

                  ?>

                  <tr>

                  <?php foreach ($producto as $key => $value): ?>
                    <td class="">

                    <?=$value;?>

                      </td>
                  <?php endforeach;
                  $id = $producto['id']?>


                <td>  <a href="editar.php?id=<?=$id?>"><i class="far fa-edit"></i></a></td>

                <td><a href="delete.php?id=<?=$id?>"><i class="far fa-trash-alt"></i></a></td>



                </tr>
              <?php endforeach; ?>
              </table>
                <a class="plus" href="add.php"><i class="fas fa-plus fa-2x"></i></a>
            </div>
          </div>



    </main>

          <?php include_once('../includes/footer.php'); ?>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
