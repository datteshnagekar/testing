<?php
require "Connection.php";

$user = $_POST['username'];

$pas = $_POST['password'];


$sql = "INSERT INTO login (username, password)
  VALUES ('".$user."', '".$pas."')";
  // use exec() because no results are returned
  $conn->exec($sql);

echo "1";


?>