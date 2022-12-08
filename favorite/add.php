<?php

include "../connect.php";

$userid = filterRequest("usersid");
$itemid = filterRequest("itemsid");

$data = array(
    "favorite_usersid" => $userid,
    "favorite_itemsid" => $itemid
);

insertData("favorite" , $data);

?>