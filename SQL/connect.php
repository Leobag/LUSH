<?php
try {

$dsn = 'mysql:host=127.0.0.1;dbname=lush_db;port=8889';
$db_user = 'root';
$db_pass = 'root';
$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
}

catch (\Exception $e) {
?> <p>Hubo algun error, por favor vuelve mas tarde.</p> <?php
}
$db = new PDO($dsn, $db_user, $db_pass, $opt);

 ?>
