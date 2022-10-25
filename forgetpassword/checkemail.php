<?php

include "../connect.php";

$email = filterRequest("email");
$vc = rand(10000 , 99999);

$stmt = $con->prepare(
  "SELECT * FROM users WHERE users_email = ? AND users_approve = 1");
$stmt->execute(array($email));
$count = $stmt->rowCount(); 

result($count);

  if($count > 0 ){
  $data = array("users_vc" => $vc);
  updateData("users", $data , "users_email = '$email'",false);
  }

