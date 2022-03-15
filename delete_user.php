<?php
require "connection.php";

$id_user = $_POST['id_user'];

  $sql11 = "DELETE FROM login where id=:id_user";
  $stmt1 = $conn->prepare($sql11);
  $stmt1->setFetchMode(PDO::FETCH_ASSOC);
  $result=  $stmt1->execute(array(

    // ':product_code' => $item_code,
    // ':product_name' => $item_name,
    ':id_user' => $id_user,
  ));


echo "1";


?>