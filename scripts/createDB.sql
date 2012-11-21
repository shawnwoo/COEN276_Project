DROP DATABASE IF EXISTS csf;
create database csf;

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


insert into menu values('Sunny Sub','lkdjlsjl', 300, 'R', 4.00, 'images/sub.png');

insert into menu values('Hot Chili Bowl','Beef with beans and spices', 300, 'R', 4.00, 'images/peaches.png');


insert into menu values('Hot Chili Bowl','Beef with beans and spices', 300, 'R', 4.00, 'images/giantcookie.png');



insert into menu values('Hot Chili Bowl','Beef with beans and spices', 300, 'R', 4.00, 'images/lemoncake.png');


insert into menu values('Hot Chili Bowl','Beef with beans and spices', 300, 'R', 4.00, 'images/muffins.png');


insert into menu values('Hot Chili Bowl','Beef with beans and spices', 300, 'R', 4.00, 'images/coffee.png');


insert into menu values('Hot Chili Bowl','Beef with beans and spices', 300, 'R', 4.00, 'images/smoothie.png');


insert into menu values('Hot Chili Bowl','Beef with beans and spices', 300, 'R', 4.00, 'images/oj.png');


insert into menu values('Hot Chili Bowl','Beef with beans and spices', 300, 'R', 4.00, 'images/tea.png');

drop table if exists users;
create table users(
	userId int,
	password int,
	budget dec(6,2),
	caloricLimit int,
	caloricTracking boolean,
	budgetTracking boolean,
	typeHighlight varchar(10)
);

insert into users values(12345, 500, 2500.00, 2000, 1, 1, 'V');


CREATE TABLE `forum` (
  `id` int(10) NOT NULL auto_increment,
  `tweet` varchar(140) collate utf8_unicode_ci NOT NULL default '',
  `dt` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
