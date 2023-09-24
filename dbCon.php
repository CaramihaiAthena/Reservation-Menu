<?php

$servername = "localhost";
$username = "root";
$pass = "";

$datasource = "mysql:host=$servername;dbName=Reservation";
try {
  $conn = new PDO($datasource, $username, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  $conn->rollback();
  echo "Connection failed: " . $e->getMessage();
}


?>