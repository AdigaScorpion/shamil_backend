<?php

include "../connect.php";

$userid = filterRequest("usersid");
$itemid = filterRequest("itemsid");

deleteData("favorite", "favorite_usersid = $userid AND favorite_itemsid = $itemid");

?>