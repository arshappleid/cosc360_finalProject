-- adds a test user : username : test ; password : test
INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `password`) VALUES
('dvader', 'darth', 'vader', 'vader@dark.force', '0f359740bd1cda994f8b55330c86d845'),
('test', 'test', 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6');


-- Add admin  user : user : admin ; pass : admin
INSERT INTO `admins` (`username`, `firstName`, `lastName`, `email`, `password`) VALUES
('admin', 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');


-- Add store data  
INSERT INTO `store` (`id`, `name`, `img_url`) VALUES
( 1, 'Walmart', 'https://pics.paypal.com/00/c/gifts/ca/walmart.png'),
( 2 ,'Fresh Co', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCGAs-tmN__A9Gk1dgbRr8xjz16LEgIi4qaO0_-y4tUj_LCEl1CgLEA_lzkBUwL675_Jg&usqp=CAU'),
( 3, 'Superstore', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBhJrrc4CsR6XFLvybdRzXgndAE2SmUZFeJTOlkiGZBWWd_GL6Qmo7iRmjtyj6MRpVz8M&usqp=CAU');


-- Add item data
INSERT INTO `item` ( `store_id`, `item_name`, `default_price`, `img_url`) VALUES
( 1, 'Eggs', 4, 'https://cdn.britannica.com/94/151894-050-F72A5317/Brown-eggs.jpg'),
( 2, 'Eggs', 4, 'https://cdn.britannica.com/94/151894-050-F72A5317/Brown-eggs.jpg'),
( 3, 'Eggs', 4, 'https://cdn.britannica.com/94/151894-050-F72A5317/Brown-eggs.jpg'),
( 1, 'Milk', 7, 'https://eadn-wc02-3129471.nxedge.io/cdn/media/catalog/product/cache/fbfe4bb16bfdb14e9bacaa2ecf9765b3/5/b/5bc89e2a90c3d.png'),
( 2, 'Milk', 7, 'https://eadn-wc02-3129471.nxedge.io/cdn/media/catalog/product/cache/fbfe4bb16bfdb14e9bacaa2ecf9765b3/5/b/5bc89e2a90c3d.png'),
( 3, 'Milk', 7, 'https://eadn-wc02-3129471.nxedge.io/cdn/media/catalog/product/cache/fbfe4bb16bfdb14e9bacaa2ecf9765b3/5/b/5bc89e2a90c3d.png'),
( 1, 'Chicken', 22, 'https://i5.walmartimages.ca/images/Large/425/323/6000203425323.jpg'),
( 2, 'Chicken', 22, 'https://i5.walmartimages.ca/images/Large/425/323/6000203425323.jpg'),
( 3, 'Chicken', 22, 'https://i5.walmartimages.ca/images/Large/425/323/6000203425323.jpg');


-- Insert into comments 
INSERT INTO comments (item_id, user_name,comment_str) values
(10,"test5","very good"),
(12,"test5","very good"),
(13,"test5","very good"),
(14,"test5","very good"),
(15,"test5","very good"),
(16,"test5","very good");

-- Insert price change values
INSERT INTO price_change (item_id, change_in_price,DATE) values
(10,2,"2023-03-27"),
(10,-2,"2023-04-2"),
(10,3,"2023-04-5"),
(10,0,"2023-04-8");

INSERT INTO price_change (item_id, change_in_price,DATE) values
(12,2,"2023-03-27"),
(12,-2,"2023-04-2"),
(12,3,"2023-04-5"),
(12,0,"2023-04-8");





