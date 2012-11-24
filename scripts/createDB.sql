use csf;
drop table if exists menu;
create table menu (
	item_name varchar(20), 
	description varchar(1000),
	calories int,
	type varchar(10),
	price dec(5,2),
	imgSrc varchar(100)
);

insert into menu values('Asian Bowl','Jasmine rice with seaweed and vegetables', 300, 'V', 3.50, 'images/sushi.png');

insert into menu values('Pizza Margheritta','Thin crusted pizza with mozzarella cheese, tomato sauce, basil, red peppers, and mushrooms', 350, 'R', 2.00, 'images/pizza.png');

insert into menu values('Roated Vegetables','Seasonal vegetables roasted in olive oil', 100, 'V, GF', 3.50, 'images/asparagus.png');

insert into menu values('Hot Chili Bowl','Beef with beans and spices', 300, 'R', 4.00, 'images/chili.png');

insert into menu values('Best Burger','Organic beef patties with tomato, cheese, and onions', 500, 'R', 5.50, 'images/burger.png');

insert into menu values('Veggie Sandwich','Vegan sandwich containing avocado, sprouts, spinach, and portobello mushrooms', 350, 'V', 4.00, 'images/vegsandwich.png');

insert into menu values('Buddy Dog','Simple hotdog in fresh daily made bun with pickles and mustard', 400, 'R', 2.00, 'images/hotdog.png');

insert into menu values('Sunny Sub','Whole wheat bread with cheese, lettuce, tomatoes, green peppers, and honey ham', 400, 'R', 5.00, 'images/sub.png');

insert into menu values('Seasonal Fruit','Variety of fruis that is in season', 80, 'V, GF', 1.00, 'images/peaches.png');

insert into menu values('Almond Cookies','Almond cookies with a hint of cinnamon', 300, 'R', 1.75, 'images/giantcookie.png');

insert into menu values('Lemon Cake','Slice of luxurious  rich and creamy lemon cake', 3500, 'R', 2.00, 'images/lemoncake.png');

insert into menu values('Blueberry Power Muffin','Freshly baked blueberry muffins made with cage-free eggs', 500, 'R', 2.50, 'images/muffins.png');

insert into menu values('Coffee','Colombian dark roasted coffee', 0, 'V, GF', 1.25, 'images/coffee.png');

insert into menu values('Tea','Premium green tea', 0, 'V, GF', 1.25, 'images/tea.png');

insert into menu values('Orange Juice','Freshly made orange juice', 150, 'V, GF', 1.00, 'images/oj.png');

insert into menu values('Smoothie','Blended bananas, strawberries, peaches, ice, and yoghurt', 200, 'GF', 3.00, 'images/smoothie.png');



drop table if exists users;
create table users(
	userId int,
	password int,
	budget dec(6,2),
	caloricLimit int,
	caloricTracking boolean,
	budgetTracking boolean,
	typeHighlight varchar(10),
    balance dec(6,2)
);

insert into users values(12345, 500, 2500.00, 2000, 1, 1, 'V', 2500.00);


drop table if exists forum;
CREATE TABLE `forum` (
  `id` int(10) NOT NULL auto_increment,
  `tweet` varchar(140) collate utf8_unicode_ci NOT NULL default '',
  `dt` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


drop table if exists orders;
create table orders(
    order_num int,
    date datetime,
    userId int,
    item_name varchar(20),
    qty int
);