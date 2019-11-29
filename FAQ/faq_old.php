<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LUSH - FAQ</title>
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
     <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
     <link rel="stylesheet" href="../includes/general1.css">
     <link rel="stylesheet" href="css/PreguntasFrecuentes1.css">
  </head>
<body class="body">

  <?php include("../includes/header.php"); ?>

  <img src="img/pasaporte.jpg" alt="pasaporte" id= "pasaporte">

  <img src="img/logoblanco.png" alt="logo" id= "logo">

  <h1>Preguntas Frecuentes</h1>
  <hr id="separadorprincipal">

  <p>A Collapsible:</p>
  <button type="button" class="collapsible">Open Collapsible</button>
  <div class="content">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  </div>


  <p>Collapsible Set:</p>
  <button type="button" class="collapsible">Open Section 1</button>
  <div class="content">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  </div>
  <button type="button" class="collapsible">Open Section 2</button>
  <div class="content">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  </div>
  <button type="button" class="collapsible">Open Section 3</button>
  <div class="content">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  </div>

  <div class="">
  <hr>
    <h2>¿Cuales son las formas de Pago?</h2>
     <p>Las compras podrán abonarse con tarjeta de crédito, depósito bancario o transferencia electrónica a través de la web o bien en cualquiera de nuestras sucursales. Luego de elegir el paquete<br>
      correspondiente, se te informarán las opciones para que realices el pago con tu tarjeta de crédito de forma fácil y segura. En caso de realizar la compra a través de Ventas Telefónicas<br>
       o en una de Nuestras Sucursales, la misma podrá ser realizada en efectivo o con cualquiera de los medios de pago mencionados anteriormente.</p>
        <hr>
  </div>

  <div class="">
    <h2>¿Como puedo cancelar mi reserva?</h2>
      <p>La cancelación de las reservas realizadas podrán hacerse por medio fehaciente. Dicha cancelación queda sujeta a lo establecido en el ítem cancelaciones, dentro de las Condiciones Generales<br>
       e Contratación.</p>
        <hr>
  </div>

  <div class="">
    <h2>¿Que documentacion debo llevar para viajar al exterior?</h2>
      <p>En la web oficial de MIGRACIONES puede conocer cuales son los documentos válidos para viajes en el exterior.</p>
        <hr>
  </div>

  <div class="">
     <h2>¿En que momento recibo mi voucher?</h2>
      <p>Los voucher estan disponibles aproximadamente una semana antes de la fecha de Salida del viaje. Pueden ser retirados personalmente en nuestras oficinas o solicitar el envio del mismo
        por mail</p>
          <hr>
  </div>

  <div class="">
    <h2>¿Los menores de edad abonan la misma tarifa?</h2>
      <p>Los menores de 2 años no abonan y no tienen servicio. Con 2 años cumplidos abonan la totalidad del tour. Se toma como referencia ela fecha de salida del viaje.</p>
        <hr>
  </div>

  <div class="">
    <h2>¿Se puede elegir la ubicacion del avion/bus?</h2>
      <p>No otorgamos numeros de butacas y ubicacion predestinada. El asiento lo otorga el coordinador en el momento de subir al bus. De todas maneras tratamos de tener en cuenta los requerimientos<br>
        de nuestros pasajeros en el armado de la taquilla.</p>
          <hr>
  </div>

  <div class="">
    <h2>¿Las comidas en el viaje estan incluidas?</h2>
      <p>Las comidas en el viaje no están incluidas dentro del paquete. En el viaje se realizan paradas en paradores turisticos donde brindan el servicio de comidas ya sea para desayuno, almuerzo o cena.</p>
        <hr>
  </div>

  <?php include("../includes/footer.php"); ?>


  <script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
  </body>
</html>
