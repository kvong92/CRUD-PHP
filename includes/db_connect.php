<?php
$hostname = "localhost";
$username = "root";
$password = "root";
$dbname = "DB_CRUD";
$connection = "mysql:host=$hostname;dbname=$dbname";

try {   
  $db = new PDO($connection, $username, $password);
  // set the PDO error mode to exception
  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} 
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  die();
}
// echo "Connected successfully";
?>