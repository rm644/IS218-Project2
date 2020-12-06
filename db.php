<?php

$servername = "localhost";
$dbname = "php_questions";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connection successful";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>
