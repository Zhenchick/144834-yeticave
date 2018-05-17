CREATE DATABASE `yeticave-144834`
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;
USE `yeticave-144834`;

/*Создаем таблицу пользователей*/
CREATE TABLE `users` (
	`id` 					INT AUTO_INCREMENT,
	`date_of_regisration` 	DATETIME NOT NULL,
	`email` 				CHAR(128) NOT NULL,
	`name`					CHAR(64) NOT NULL,
	`password`				CHAR(64) NOT NULL,
	`avatar` 				CHAR(64) DEFAULT NULL,
	`contacts` 				TEXT NOT NULL,
	`bet_id`				INT NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `ix_email` (`email`)
);

/*Создаем таблицу с лотами*/
CREATE TABLE `lots` (
	`id` 					INT AUTO_INCREMENT,
	`date_of_create`		DATETIME NOT NULL,
	`name`					CHAR(128) NOT NULL,
	`description`			TEXT NOT NULL,
	`img` 					CHAR(64)  NOT NULL,
	`start_price` 			DECIMAL NOT NULL,
	`date_of_end`			DATETIME NOT NULL,
	`step_of_bet`			DECIMAL NOT NULL,
	`user_id`				INT NOT NULL,
	`winner_id`				INT DEFAULT NULL,
	`category_id` 			INT NOT NULL,
	PRIMARY KEY (`id`)
);

/*Создаем таблицу со ставками*/
CREATE TABLE `bets` (
	`id` 					INT AUTO_INCREMENT,
	`date_of_placement`		DATETIME NOT NULL,
	`price`					DECIMAL NOT NULL,
	`user_id`				INT NOT NULL,
	`lot_id`				INT NOT NULL,
	PRIMARY KEY (`id`)
);

/*Создаем таблицу с категориями*/
CREATE TABLE `category` (
	`id` 					INT AUTO_INCREMENT,
	`title`					CHAR(64) NOT NULL,
	PRIMARY KEY (`id`)
);

/*Добавляем записи в таблицу с категориями*/
INSERT INTO `category`
SET `title` = 'Доски и лыжи'; 

INSERT INTO `category`
SET `title` = 'Крепления';

INSERT INTO `category`
SET `title` = 'Ботинки';

INSERT INTO `category`
SET `title` = 'Одежда';

INSERT INTO `category`
SET `title` = 'Инструменты';

INSERT INTO `category`
SET `title` = 'Разное';


/*Добавляем записи в таблицу с лотами*/
INSERT INTO `lots` (`name`, `img`, `start_price`, `category_id`) 
VALUES ('2014 Rossignol District Snowboard', 'img/lot-1.jpg', 10999, 1);

INSERT INTO `lots` (`name`, `img`, `start_price`, `category_id`) 
VALUES ('DC Ply Mens 2016/2017 Snowboard', 'img/lot-2.jpg', 159999, 1);

INSERT INTO `lots` (`name`, `img`, `start_price`, `category_id`) 
VALUES ('Крепления Union Contact Pro 2015 года размер L/XL', 'img/lot-3.jpg', 8000, 2);

INSERT INTO `lots` (`name`, `img`, `start_price`, `category_id`) 
VALUES ('Ботинки для сноуборда DC Mutiny Charocal', 'img/lot-4.jpg', 10999, 3);

INSERT INTO `lots` (`name`, `img`, `start_price`, `category_id`) 
VALUES ('Куртка для сноуборда DC Mutiny Charocal', 'img/lot-5.jpg', 7000, 4);

INSERT INTO `lots` (`name`, `img`, `start_price`, `category_id`) 
VALUES ('Маска Oakley Canopy', 'img/lot-6.jpg', 5400, 6);

/*Добавляем записи в таблицу с пользователями*/
INSERT INTO `users` (`name`) 
VALUES ('Иван');

INSERT INTO `users` (`name`) 
VALUES ('Константин');

INSERT INTO `users` (`name`) 
VALUES ('Евгений');

INSERT INTO `users` (`name`) 
VALUES ('Семён');

/*Добавляем записи в таблицу со ставками*/
INSERT INTO `bets` (`price`, `user_id`) 
VALUES (11500, 1);

INSERT INTO `bets` (`price`, `user_id`) 
VALUES (11000, 2);

INSERT INTO `bets` (`price`, `user_id`) 
VALUES (10500, 3);

INSERT INTO `bet`s (`price`, `user_id`) 
VALUES (10000, 4);


UPDATE `users` SET `email` = 0 WHERE `email` IS NULL