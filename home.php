<?php

include   "connect.php";

$alldata = array();

$alldata['status'] = "success PHP";

$categories = getAllData("categories", null , null , false);

$alldata ['categories'] = $categories ;

$items = getAllData("itemsview", null , null , false);

$alldata ['items'] = $items ;

echo json_encode($alldata); 


?>