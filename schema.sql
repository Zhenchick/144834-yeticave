CREATE DATABASE `yeticave-144834`
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;
USE `yeticave-144834`;

/*Создаем таблицу пользователей*/
CREATE TABLE `users` (
	`id` 					INT NOT NULL AUTO_INCREMENT,
	`date_of_regisration` DATETIME NOT NULL,
	`email` 				CHAR(128) NOT NULL,
	`name`				CHAR(64) NOT NULL,
	`password`			CHAR(64) NOT NULL,
	`avatar` 				CHAR(64) DEFAULT NULL,
	`contacts` 			TEXT NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `ix_email` (`email`)
);

/*Создаем таблицу с лотами*/
CREATE TABLE `lots` (
	`id` 					INT NOT NULL AUTO_INCREMENT,
	`date_of_create`		DATETIME NOT NULL,
	`name`				CHAR(128) NOT NULL,
	`description`			TEXT NOT NULL,
	`img` 				CHAR(64) NOT NULL,
	`start_price` 		DECIMAL NOT NULL,
	`date_of_end`			DATETIME NOT NULL,
	`step_of_bet`			DECIMAL NOT NULL,
	`user_id`				INT NOT NULL,
	`winner_id`			INT DEFAULT NULL,
	`category_id` 		INT NOT NULL,
	PRIMARY KEY (`id`)
);

/*Создаем таблицу со ставками*/
CREATE TABLE `bets` (
	`id` 					INT NOT NULL AUTO_INCREMENT,
	`date_of_placement`	DATETIME NOT NULL,
	`price`				DECIMAL NOT NULL,
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
