<?php

if(isset($_POST["submit-datos"])){

  $fetchid = $db->query("SELECT id FROM users WHERE email = '$email'");
  $id_array = $fetchid->fetch(PDO::FETCH_ASSOC);

  $id = implode($id_array);


  $street = $_POST["calle"];
  $postcode = $_POST["postcode"];
  $apartment = $_POST["apartment"];
  $bank = $_POST["bank"];
  $owner = $_POST["owner"];
  $card_number = $_POST["card_number"];

  try {
    if($direccion){
  $actualizarDir = $db->prepare("UPDATE direccion SET street = :street, postal_code = :postcode, apartment = :apartment, user_id = :id WHERE user_id = '$id'");
}else{
  $actualizarDir = $db->prepare("INSERT INTO direccion(street, apartment, postal_code, user_id) VALUES (:street, :apartment, :postcode, :id)");
}
  $actualizarDir->bindValue(':street', $street, PDO::PARAM_STR);
  $actualizarDir->bindValue(':postcode', $postcode, PDO::PARAM_INT);
  $actualizarDir->bindValue(':apartment', $apartment, PDO::PARAM_STR);
  $actualizarDir->bindValue(':id', $id);
  $actualizarDir->execute();

if($card){
  $actCard = $db->prepare("UPDATE card_details SET card_number = :card_number, bank = :bank, card_nameowner = :owner, user_id = :user_id WHERE user_id = '$id'");
}else{
  $actCard = $db->prepare("INSERT INTO card_details(card_number, bank, card_nameowner, user_id) VALUES (:card_number, :bank, :owner, :user_id)");
}

$actCard->bindValue(':card_number', $card_number, PDO::PARAM_INT);
$actCard->bindValue(':bank', $bank, PDO::PARAM_STR);
$actCard->bindValue(':owner', $owner, PDO::PARAM_STR);
$actCard->bindValue(':user_id', $id);
$actCard->execute();


} catch (\Exception $e) {
  echo "<p> Hubo algun error! Por favor intente de nuevo </p>";
}
}

 ?>
