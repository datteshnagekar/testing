<?php
require "connection.php";

$id_user = $_POST['id_user'];
$user = $_POST['username'];

$pass = $_POST['password'];


$sql = "UPDATE login SET username=:username, password=:password where id=:id_ok";
  $stmt1 = $conn->prepare($sql);
  $result=  $stmt1->execute(array(
    ':username' => $user,
    ':password' => $pass,
    ':id_ok' => $id_user
  ));
  // use exec() because no results are returned


echo "1";


?>