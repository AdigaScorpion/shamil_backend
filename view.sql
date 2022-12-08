CREATE OR REPLACE VIEW itemsview AS
SELECT items.* , categories.* FROM items 
INNER JOIN categories ON categories.categories_id = items.items_cat 


SELECT itemsview.* FROM itemsview
INNER JOIN favorite ON favorite.favorite_itemsid = itemsview.items_id AND favorite.favorite_usersid = users_id


SELECT itemsview.* , 1 AS favorite FROM itemsview
INNER JOIN favorite ON favorite.favorite_itemsid = itemsview.items_id AND favorite.favorite_usersid = users_id


SELECT itemsview.* , '1' AS favorite FROM itemsview
INNER JOIN favorite ON favorite.favorite_itemsid = itemsview.items_id AND favorite.favorite_usersid = $userid 
WHERE categories_id = $categoryid
UNION All
SELECT *, '0' as favorite FROM itemsview 
WHERE categories_id = $categoryid AND items_id NOT IN  (SELECT itemsview.items_id FROM itemsview
INNER JOIN favorite ON favorite.favorite_itemsid = items_id AND favorite.favorite_usersid = $userid )