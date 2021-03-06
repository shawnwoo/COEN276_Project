use csf;
drop table if exists menu;
create table menu (
	item_name varchar(40), 
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

insert into users values(12345, 500, 2500.00, 2000, 1, 1, 'V', 2000.00);
insert into users values(23456, 500, 1500.00, 2500, 0, 0, 'V', 1500.00);
insert into users values(123, 500, 1000.00, 1666, 1, 0, 'V', 1000.00);
insert into users values(999, 500, 2500.00, 1000, 0, 1, 'V', 90.00);

drop table if exists forum;
CREATE TABLE `forum` (
  `id` int(10) NOT NULL auto_increment,
  `tweet` varchar(140) collate utf8_unicode_ci NOT NULL default '',
  `dt` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



drop table if exists orderNumbers;
create table orderNumbers(
    order_num  int not null auto_increment unique
);

drop table if exists orders;
create table orders(
    order_num int,
    date datetime NOT NULL default '0000-00-00 00:00:00',
    userId int,
    item_name varchar(40),
    qty int
);

insert into orders values(1,'2012-11-23 12:00:00',12345,'Asian Bowl',1);
insert into orders values(1,'2012-11-23 12:00:00',12345,'Pizza Margheritta',1);
insert into orders values(1,'2012-11-23 12:00:00',12345,'Roated Vegetables',1);
insert into orders values(1,'2012-11-23 12:00:00',12345,'Buddy Dog',1);
insert into orders values(1,'2012-11-23 12:00:00',12345,'Blueberry Power Muffin',1);
insert into orders values(1,'2012-11-23 12:00:00',12345,'Orange Juice',2);
insert into orders values(1,'2012-11-25 12:00:00',12345,'Lemon Cake',1);

insert into forum values(300,'I love Smart Cafe','2012-11-10 12:00:00');
insert into forum values(301,'Good but not great!','2012-11-11 12:00:00');
insert into forum values(302,'Definitely good','2012-11-12 12:00:00');
insert into forum values(303,'I will never go back!','2012-11-13 12:00:00');
insert into forum values(304,'Some foods are good but some are bad','2012-11-17 12:00:00');
insert into forum values(305,'Go for it','2012-11-18 12:00:00');
insert into forum values(306,'Haha, I know it.','2012-11-20 12:00:00');