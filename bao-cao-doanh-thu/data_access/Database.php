<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost:3308; dbname=qlks", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

?>
