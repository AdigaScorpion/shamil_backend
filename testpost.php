<?php 

include './connect.php';
$table = "users";
// $name = filterRequest("namerequest");
$data = array( 
"users_name" => "shamil",
"users_email" => "shamil@gmail.com",
"users_phone" => "12345678910",
"users_vc" => "12345",       
);
$count = insertData($table , $data);