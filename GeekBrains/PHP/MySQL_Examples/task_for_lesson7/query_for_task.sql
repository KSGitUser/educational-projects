/* Задача 1. У вас есть социальная сеть, где пользователи (id, имя) могут ставить друг другу лайки. 
Создайте необходимые таблицы для хранения данной информации. 

Создайте запрос, который выведет информацию:
id пользователя;
имя;
лайков получено;
лайков поставлено;
взаимные лайки. */

# CREATE DATABASE likes;
# USE likes;
/* CREATE TABLE `user` (
    `id` INT UNIQUE AUTO_INCREMENT,
    `name` VARCHAR(50),
    PRIMARY KEY (`id`)
); */

/* CREATE TABLE `users_likes` (
	`id` INT UNIQUE AUTO_INCREMENT,
    `id_who` INT,
    `id_whom` INT,
     PRIMARY KEY (`id`),
     FOREIGN KEY (`id_who`) REFERENCES `user`(`id`),
     FOREIGN KEY (`id_whom`) REFERENCES `user`(`id`)
); */

# INSERT INTO `user`(`name`) VALUES ('Иван'), ('Петр'), ('Никодим'), ('Ольга'), ('Елизавета'), ('Ефросиния');

# SELECT * FROM `user`;

# INSERT INTO `users_likes`(`id_who`,`id_whom`) VALUES (1,4), (4,1), (2,4), (5,2), (6,1), (1,6);

# SELECT * FROM `users_likes`;

/*
SELECT 
	`user`.`id`, 
	`user`.`name`, 
    (SELECT COUNT(`users_likes`.`id_whom`) FROM `users_likes` WHERE `id_whom` = `user`.`id`) AS `лайков получено` ,
    (SELECT COUNT(`users_likes`.`id_who`) FROM `users_likes` WHERE `id_who` = `user`.`id`) AS `лайков поставлено`,
    (SELECT COUNT(`id_who`) FROM `users_likes` 
		WHERE (`id_who` IN (SELECT DISTINCT `id_whom` FROM `users_likes` WHERE `id_who` IN (SELECT DISTINCT `id_whom` FROM `users_likes`)) 
				AND `user`.`id` = `users_likes`.`id_who`)
		GROUP BY `id_who`) AS `взаимных лайков`
 FROM `user`; 
 */
 
/* Задача 2. Для структуры из задачи 1 выведите список всех пользователей, которые поставили лайк 
пользователям A и B (id задайте произвольно), но при этом не поставили лайк пользователю C. */

/*
DELIMITER //
create procedure select_users (IN `a_id` int, `b_id` int, `c_id` int)
BEGIN
	DROP TABLE IF EXISTS `not_c`;
CREATE TEMPORARY  TABLE  `not_c`
	SELECT * FROM `users_likes` 
		WHERE `users_likes`.`id_who` NOT IN 
			(SELECT `id_who` FROM `users_likes` WHERE`users_likes`.`id_whom` = `c_id`);
 
DROP TABLE IF EXISTS `table_b`;
CREATE TEMPORARY  TABLE  `table_b`
	SELECT * FROM `not_c` 
		WHERE `not_c`.`id_whom` = `b_id`;

DROP TABLE IF EXISTS `table_a`;
CREATE TEMPORARY TABLE `table_a`
	SELECT * FROM `not_c` 
		WHERE `not_c`.`id_whom` = `a_id` and `not_c`.`id_who` = (SELECT `table_b`.`id_who` FROM `table_b`); 

SELECT `user`.`name` FROM `user` JOIN `table_a` ON `user`.`id` = `table_a`.`id_who`;
END //

CALL select_users(4, 6, 2); 
*/

/*
Задача 3. Добавим сущности «Фотография» и «Комментарии к фотографии». Нужно создать функционал для пользователей, 
который позволяет ставить лайки не только пользователям, но и фото или комментариям к фото. 
Учитывайте следующие ограничения:
пользователь не может дважды лайкнуть одну и ту же сущность;
пользователь имеет право отозвать лайк;
необходимо иметь возможность считать число полученных сущностью лайков и выводить список пользователей, поставивших лайки;
в будущем могут появиться новые виды сущностей, которые можно лайкать.
*/


/*
CREATE table `list_of_objects_ids` (
	`id` INT UNIQUE AUTO_INCREMENT PRIMARY KEY,
    `object_name` varchar(100)
); 

INSERT INTO `list_of_objects_ids`(`object_name`) VALUES ('Photos'), ('Comments to photos'); 
*/

/*
SELECT * FROM `list_of_objects_ids`;

CREATE TABLE `photos` (
	`id` INT UNIQUE AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT, 
    `object_id` INT DEFAULT 1,
    `path_to_file` VARCHAR(250),    
     FOREIGN KEY (`user_id`) REFERENCES `user`(`id`),
     FOREIGN KEY (`object_id`) REFERENCES `list_of_objects_ids`(`id`)
);
*/

/*
CREATE TABLE `comment_to_photos` (
	`id` INT UNIQUE AUTO_INCREMENT PRIMARY KEY,
    `photos_id` INT NOT NULL,
    `object_id` INT NOT NULL DEFAULT 2,
    `user_id` INT NOT NULL,
    `text` TEXT,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`),
	FOREIGN KEY (`photos_id`) REFERENCES `photos`(`id`),
    FOREIGN KEY (`object_id`) REFERENCES `list_of_objects_ids`(`id`)
);
*/



/*
CREATE TABLE `object_likes` (
	`id` INT UNIQUE AUTO_INCREMENT PRIMARY KEY,
    `object_id` INT NOT NULL,
    `item_id` INT NOT NULL, 
    `user_id` INT NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`),
	FOREIGN KEY (`object_id`) REFERENCES `list_of_objects_ids`(`id`),
    UNIQUE KEY (`object_id`,`item_id`,`user_id`)
);
*/


/*
INSERT INTO `likes`.`photos` (`user_id`, `path_to_file`) VALUES ('2', 'C:\\photos\\1.jpg');
INSERT INTO `likes`.`photos` (`user_id`, `path_to_file`) VALUES ('1', 'C:\\photos\\2.jpg');
INSERT INTO `likes`.`photos` (`user_id`, `path_to_file`) VALUES ('3', 'C:\\photos\\3.jpg');
*/

# SELECT * FROM `photos`;

/*
INSERT INTO `comment_to_photos`(`photos_id`, `user_id`, `text`) VALUES 
	(1, 4, 'Comment of user 4 to photo 1'),
    (1, 5, 'Comment of user 5 to photo 1'),
	(2, 3, 'Comment of user 3 to photo 2');
*/

# SELECT * FROM `object_likes`; 
# SELECT * FROM `comment_to_photos`;

/*
INSERT INTO `object_likes`(`object_id`, `item_id`, `user_id`) VALUES
	(2, 2, 2), (2, 2, 5), (2, 2, 6);
 */
 
/* 
SELECT `user`.`name` AS 'user who liked comment 2' FROM `user` 
	JOIN (SELECT * FROM `object_likes` WHERE `object_id` = 2 AND `item_id` = 2) AS `like_to_comment_2` 
		ON `user`.`id` = `like_to_comment_2`.`user_id`;
*/



