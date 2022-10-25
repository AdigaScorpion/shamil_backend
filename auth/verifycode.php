<?php

include '../connect.php';


$email = filterRequest("email");
$vc = filterRequest("vc");


$stmt = $con->prepare("SELECT * FROM users WHERE users_email = '$email' AND users_vc = '$vc'");
$stmt->execute();

$count = $stmt->rowCount();

if ($count > 0) {

    $data = array("users_approve" => "1");

    updateData("users", $data , "users_email = '$email'");
} else  {
    printfailure("verifycode is not correct");
}
