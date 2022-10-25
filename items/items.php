<?php
include "../connect.php";

$categoryid = filterRequest("id");

getAllData( "itemsview" , "categories_id = $categoryid") ;

?> 