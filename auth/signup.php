<?php

include "../connect.php";

$username = filterRequest("username");
$password = sha1($_POST["password"]);
$email = filterRequest("email");
$phone = filterRequest("phone");
$vc = rand(10000 , 99999);

$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? OR users_phone = ? ");
$stmt->execute(array($email , $phone));
$count = $stmt->rowcount();
if ($count > 0){
    printfailure("PHONE OR EMAIL");
} else {

  $data = array(
    "users_name" => $username,
    "users_password" => $password,
    "users_email" => $email,
    "users_phone" => $phone,
    "users_vc" => $vc,
  );
  insertData("users" , $data);
}


?>