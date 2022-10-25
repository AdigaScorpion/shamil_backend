<?php

include '../connect.php';

$email = filterRequest("email");
$vc = filterRequest("vc");

$stmt = $con->prepare("SELECT * FROM users WHERE users_email = '$email' AND users_vc = '$vc'");
$stmt->execute();

$count = $stmt->rowcount();

result($count);

?>