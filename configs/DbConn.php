<?php
$hostname = "localhost";
$username = "root";
$userpass = "";
require_once"constants.php";

try {
  $Dbconn = new PDO("mysql:host=$hostname; dbname=$dbname", $username, $userpass);
  // set the PDO error mode to exception
  $Dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>
