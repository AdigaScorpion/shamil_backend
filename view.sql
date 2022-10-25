CREATE OR REPLACE VIEW itemsview AS
SELECT items.* , categories.* FROM items 
INNER JOIN categories.* ON categories.categories_id = items.items_cat 


