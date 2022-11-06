<?php
include "../connect.php";

$categoryid = filterRequest("id");
$userid = filterRequest("userid");

// getAllData( "itemsview" , "categories_id = $categoryid") ;

$stmt = $con->prepare("SELECT itemsview.* , '1' AS favorite FROM itemsview
INNER JOIN favorite ON favorite.favorite_itemsid = itemsview.items_id AND favorite.favorite_usersid = $userid 
WHERE categories_id = $categoryid
UNION All
SELECT *, '0' as favorite FROM itemsview 
WHERE categories_id = $categoryid AND items_id NOT IN  (SELECT itemsview.items_id FROM itemsview
INNER JOIN favorite ON favorite.favorite_itemsid = items_id AND favorite.favorite_usersid = $userid )");

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if ($count > 0){
        echo json_encode(array("status" => "success PHP", "data" => $data));
    } else {
        echo json_encode(array("status" => "failure PHP"));
    }
    

?> 