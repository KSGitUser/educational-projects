#CREATE DATABASE IF NOT EXISTS `personnel_db`
#DEFAULT CHAR SET utf8mb4 COLLATE utf8mb4_unicode_ci;

#USE `personnel_db`;

#CREATE TABLE IF NOT EXISTS `department` (
#	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
#    `name` VARCHAR(40) NOT NULL,
#    `head_id` INT,
#    `count` INT DEFAULT 0
#);

#CREATE TABLE IF NOT EXISTS `staff` (
#	`id` INT NOT NULL AUTO_INCREMENT,
#    `name` VARCHAR(25) NOT NULL,
#    `lastname` VARCHAR (30) NOT NULL,
#    `department_id` INT,
#    `salary` INT,
#    `position` VARCHAR(50),
#    PRIMARY KEY (`id`)
#);

#ALTER TABLE `staff` ADD CONSTRAINT `fk_staff_department` FOREIGN KEY
#	(`department_id`) REFERENCES `department`(`id`)
#    ON DELETE RESTRICT
#    ON UPDATE CASCADE;

#INSERT INTO `department`(`name`) VALUES
#	('IT-отдел'),
#   ('Охрана'),
#    ('Бухгалтерия'),
#    ('Маркетинг');

#INSERT INTO `staff` 
#(`name`,`lastname`,`department_id`,`salary`,`position`) VALUES
#('Анатолий','Башлыков',1,45000,'Программист'),
#('Юля','Крылова',1,75000,'Программист'),
#('Владимир','Питерский',3,50000,'Контролер'),
#('Светлана','Музыка',3,55000,'Бухгалтер'),
#('Андрей','Юрченко',2,60000,NULL);

#SELECT * FROM `staff`;

#1. Выбрать среднюю зарплату по отделам.

#SELECT AVG(`salary`) AS 'Средняя зарплата', `department`.`name` AS 'Отдел' 
#	FROM `staff` LEFT JOIN `department` ON staff.department_id = department.id GROUP BY `department_id`;
    
#2. Выбрать максимальную зарплату у сотрудника.
#SELECT `name`,`lastname`, `salary` FROM `staff` WHERE `salary` = (SELECT MAX(`salary`) FROM `staff`);

#3. Удалить одного сотрудника, у которого максимальная зарпла

#DELETE FROM `staff` WHERE `id` = (SELECT `id` FROM (SELECT `id` FROM `staff` `tmp_staff` WHERE `salary` = (SELECT MAX(`salary`) FROM `staff` `tmp_staff2`)) AS x);

#4. Посчитать количество сотрудников во всех отделах.

#SELECT COUNT(`staff`.`name`) AS 'Количество сотрудников', `department`.`name` FROM `staff` 
#	LEFT JOIN `department` ON `staff`.`department_id` = `department`.`id` 
#    GROUP BY `department_id`;

#5. Найти количество сотрудников в отделах и посмотреть, сколько всего денег получает отдел.

#SELECT COUNT(`staff`.`name`) AS 'Количество сотрудников', 
#	   SUM(`staff`.`salary`) AS 'Всего получают в отделе', 
#       `department`.`name` FROM `staff` 
#	LEFT JOIN `department` ON `staff`.`department_id` = `department`.`id` 
#   GROUP BY `department_id`;



