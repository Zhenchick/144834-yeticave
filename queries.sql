/*Добавляем записи в таблицу с категориями*/
INSERT INTO `category` (`title`)
VALUES ('Доски и лыжи'), ('Крепления'), ('Ботинки'), ('Одежда'), ('Инструменты'), ('Разное');


/*Добавляем записи в таблицу с лотами*/
INSERT INTO `lots` (`date_of_create`, `name`, `description`, `img`, `start_price`, `date_of_end`, `step_of_bet`, `user_id`, `category_id`) 
VALUES 
('2018-05-17 00:00:00', '2014 Rossignol District Snowboard', '2014 Rossignol District Snowboard', 'img/lot-1.jpg', 10999, '2018-05-25 00:00:00', 100, 2, 1), 
('2018-05-16 00:00:00', 'DC Ply Mens 2016/2017 Snowboard', 'DC Ply Mens 2016/2017 Snowboard', 'img/lot-2.jpg', 159999, '2018-05-21', 200, 1, 1), 
('2018-05-13 00:00:00', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Крепления Union Contact Pro 2015 года размер L/XL', 'img/lot-3.jpg', 8000, '2018-05-19 00:00:00', 150, 3, 2), 
('2018-05-13 00:00:00', 'Ботинки для сноуборда DC Mutiny Charocal', 'Ботинки для сноуборда DC Mutiny Charocal', 'img/lot-4.jpg', 10999, '2018-05-19 00:00:00', 150, 3, 3), 
('2018-05-14 00:00:00', 'Куртка для сноуборда DC Mutiny Charocal', 'Куртка для сноуборда DC Mutiny Charocal', 'img/lot-5.jpg', 7000, '2018-05-20 00:00:00', 170, 1, 4), 
('2018-05-15 00:00:00', 'Маска Oakley Canopy', 'Маска Oakley Canopy', 'img/lot-6.jpg', 5400, '2018-05-24 00:00:00', 55, 2, 6);

/*Добавляем записи в таблицу с пользователями*/
INSERT INTO `users` (`name`, `email`, `password`, `date_of_regisration`, `contacts`) 
VALUES 
('Игнат', 'ignat.v@gmail.com', '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka', '2018-05-17 00:00:00', 'Москва'), 
('Леночка', 'kitty_93@li.ru', '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa', '2018-05-13 00:00:00', 'Рязань'), 
('Руслан', 'warrior07@mail.ru', '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW', '2018-05-14 00:00:00', 'Иваново');

/*Добавляем записи в таблицу со ставками*/
INSERT INTO `bets` (`date_of_placement`, `price`, `user_id`, `lot_id`) 
VALUES 
('2018-05-18 00:00:00', 11500, 1, 1), 
('2018-05-17 00:00:00', 11000, 2, 2), 
('2018-05-13 00:00:00', 10500, 2, 3), 
('2018-05-14 00:00:00', 10000, 3, 4);

/*Получить все категории*/
SELECT * FROM `category`;

/*Получить самые новые открытые лоты*/
SELECT * FROM `lots` WHERE NOW() < `date_of_end` ORDER BY `date_of_create` ASC;

/*Показать лот по его id*/
SELECT * FROM `lots` WHERE `id` = 3;

/*Название категории к которой принадлежит лот*/
SELECT `category`.`title` FROM `category` JOIN `lots` ON `category`.`id` = `lots`.`category_id`  WHERE `lots`.`id` = 6;

/*Обновить название лота по id*/
UPDATE `lots` SET `name` = 'new name' WHERE `id` = 1;

/*Получить список самых свежих ставок для лота по его id*/

SELECT * FROM `bets` WHERE `lot_id` = 1 ORDER BY `date_of_placement` ASC;